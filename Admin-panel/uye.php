<?php 

if($_POST){
	
	$isim = $_POST["isim"];
	$sifre = $_POST["sifre"];
	
	if(!$isim || !$sifre){
		
		echo "<span style='color:red;'>uye adı yada sifre bos bırakılamaz</span>";
		
	}else{
		
		$v = $db->prepare("select * from uyeler where uye_adi=? and uye_sifre=?");
		
		$v->execute(array($isim,$sifre));
		
	  $c =	$v->fetch(PDO::FETCH_ASSOC);
	  $x = $v->rowCount();
	  
	  if($x){
		  
		  $_SESSION["uye"] = $c["uye_adi"];
		  $_SESSION["id"] = $c["uye_id"];
		  $_SESSION["eposta"] = $c["uye_eposta"];
		  $_SESSION["durum"] = $c["uye_durum"];
		  
		  header("location:index.php");
		  
	  }else{
		  
		  echo "<span style='color:red;'>uye adı yada sifreniz yanlıs</span>";
		  
	  }
		
		
		
		
	}
	
	
	
	
}



?>
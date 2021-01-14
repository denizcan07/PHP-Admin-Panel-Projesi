<?php 

session_start();

try{
	
	$da = new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","Deniz.07");
}catch(PDOException $mesaj){
	
	
	echo $mesaj->getmessage();
	
}
   
					$id  = $_POST["idid"];
					$name   = $_POST["ad"];
					$sifre = $_POST["pass"];
					$mail = $_POST["mail"];
                    $onay = $_POST["onay"];
					if(!$id || !$name||!$sifre||!$mail||!$onay){
				   
				   header("refresh: 2; url=kayit.php");
               echo "<div style='font-size:15px;color:red;position:relative; left:250px;'><h2 class=>Lutfen bos alan birakmayiniz.<h2></div>";

             
			  }
			  else{
              $ekle = "insert into uyeler(uye_id,uye_adi,uye_sifre,uye_eposta,uye_onay) values('$id','$name','$sifre','$mail','$onay')";
			  
			  if($da->query($ekle)){
              

               header("refresh: 3; url=index.php");
               echo"kaydiniz yapildi.Ana Sayfaya Yonlendiriliyorsunuz....";
			  }
			  
			  }
		  
		  
		  
		 

   
?>
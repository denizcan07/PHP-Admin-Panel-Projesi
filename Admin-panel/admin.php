<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Admin Paneli</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>PHP</title>
	<link rel="stylesheet" href="style.css"/>
	<link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
</head>
<body>
	
	<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>Anasayfa</span></a></li>
   <span style="float:right;"><li><a>PHP Admin Paneli Projesi</a></li></span>
  <span style="float:right;"><li class='last'><a href='Hakkimda.php'><span>Hakkimda</span></a></li></span>
  
  
</ul>
</div>
<style type="text/css"> 
body {
	
	background:#eee;
	
}
</style>
<body>
	 <?php 
	 session_start();
	 
	 if($_SESSION){
		 
		try{
	
	$db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8","root","Deniz.07");
	
}catch(PDOException $mesaj){
	
	
	echo $mesaj->getmessage();
	
} 
		 
		 
		
       if($_SESSION["durum"] == 1){
		   
		   ?>
		   <div class="header">
		   
		   <h3>Admin Paneline Hoş Geldin <span><?php echo $_SESSION["uye"];?></span> 
		   </div>
		   <div class="genel">
		   <div class="menu">
		   <ul> 
		   <li><a href="index.php">Anasayfa</a></li>
		   <li><a href="?do=konu">Konular</a></li>
		   <li><a href="cikis.php">Çıkış yap</a></li>
		   </ul>
		   </div>
		   <div class="icerik">
		   <?php
            $do = @$_GET["do"];
			
			switch($do){
				
				case "konu":
				
				$v = $db->prepare("select * from konular  inner join kategoriler on kategoriler.kategori_id = konular.konu_kategori order by konu_id desc limit 20");
				$v->execute(array());
				$c = $v->fetchAll(PDO::FETCH_ASSOC);
				$x = $v->rowCount();
				
				?>
				<h2>Konular <span style="float:right;"><a href="?do=konu_ekle">Konu ekle</a></span></h2>
				<div class="admin_konular"> 
				<table cellpadding="0" cellspacing="0">
				<thead> 
				<tr><th>Konu baslıkları</th><th>Konu onayları</th><th>Konu kategorileri</th><th>Işlemler</th> 
				</tr>
				</thead>
				
				
				<?php 
				
				if($x){
				    
					foreach($c as $m){
						?>
						<tbody> 
						<tr> 
						<td width="600"><?php echo $m["konu_baslik"];?></td><td width="250"> 
						<?php 
						
						if($m["konu_durum"] == 1){
							
							echo '<span style="color:green">onaylı</span>';
							
						}else {
							
							echo '<span style="color:red">onaylı deyil</span>';
							
						}
						
						?>
						
						</td><td width="300"><?php echo $m["kategori_adi"];?></td><td align="center" width="250"><a onclick="return confirm('konuyu silmek istediğinize eminmisiniz');"  href="?do=konu_sil&id=<?php echo $m["konu_id"];?>">sil</a> <a href="?do=konu_duzenle&id=<?php echo $m["konu_id"];?>">duzenle</a></td>
						</tr>
						</tbody>
						<?php
						
						
					}	
				
					
				}else {
					
					echo '<tr><td width="1300" colspan="4"><h3 class="admin_dikkat">henuz siteye hiç konu eklenmemis</h3></td></tr>';
					
				}
				
				?>
				
				</table>
				</div>
				<?php
				break;
				
				case "konu_ekle":
				?>
				<h2>konu ekle</h2>
				<?php
				if($_POST){
					
					$baslik   = $_POST["baslik"];
					$kategori = $_POST["kategori"];
					$aciklama = $_POST["aciklama"];
					$onay     = $_POST["onay"];
					
					if(!$baslik || !$aciklama){
					   
                        echo '<h3 class="admin_dikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						$v = $db->prepare("select * from konular where konu_baslik=?");
						$v->execute(array($baslik));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
						
						if($x){
							
							echo "<h3 class='admin_dikkat'>".$baslik." adinda bir konu zaten var baska bir konu ekleyin</h3>";
							
						}else {
						$insert = $db->prepare("insert into konular set 
						
						            konu_baslik=?,
									konu_kategori=?,
						            konu_aciklama=?,
									konu_durum=?,
									konu_ekleyen=?
						");
						
						$kayit = $insert->execute(array($baslik,$kategori,$aciklama,$onay,$_SESSION["uye"]));
						
						if($kayit){
							
							echo '<h4 class="admin_basarili">konu basarıyla eklendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=konu");
							
						}else {
							
							echo '<h3 class="admin_dikkat">konu eklenirken bir hata olustu</h3>';
							
						}
						}
					}
					
					
				}else {
					$z = $db->prepare("select * from kategoriler");
					$z->execute(array());
					$c = $z->fetchAll(PDO::FETCH_ASSOC);
					?>
					<div class="admin_konu_ekle"> 
					<form action="" method="post">
					<ul> 
					<li>konu baslık</li>
					<li><input type="text" name="baslik" /></li>
					<li> 
					<select name="kategori" id="">
					<?php 
					
					foreach($c as $m){
						
						echo '<option value="'.$m["kategori_id"].'">'.$m["kategori_adi"].'</option>';
						
					}
					
					?>
					
					</select>
					</li>
					<li>konu acıklaması</li>
					<li><textarea name="aciklama"  cols="50" rows="10"></textarea></li>
					<li><select name="onay" id=""> 
					<option value="1">onaylı</option>
					<option value="0">onaylı deyil</option>
					</select></li>
					<li><button type="submit">konu ekle</button></li>
					</ul>
					</form>
					</div>
					<?php
					
					
				}
				
				break;
				
				case "konu_duzenle":
				$id = $_GET["id"];
				?>
				<h2>konu ekle</h2>
				<?php
				if($_POST){
					
					$baslik   = $_POST["baslik"];
					$kategori = $_POST["kategori"];
					$aciklama = $_POST["aciklama"];
					$onay     = $_POST["onay"];
					
					if(!$baslik || !$aciklama){
					   
                        echo '<h3 class="admin_dikkat">bos alan bırakmayın</h3>';					   
						
					}else {
						
						
						
						
						$update = $db->prepare("update  konular set 
						
						            konu_baslik=?,
									konu_kategori=?,
						            konu_aciklama=?,
									konu_durum=?
									where konu_id=?
									
						");
						
						$guncelle = $update->execute(array($baslik,$kategori,$aciklama,$onay,$id));
						
						if($guncelle){
							
							echo '<h4 class="admin_basarili">konu basarıyla guncellendi yonlendiriliyorsunuz</h4>';
							
							header("refresh: 2; url=?do=konu");
							
						}else {
							
							echo '<h3 class="admin_dikkat">konu guncellenirken bir hata olustu</h3>';
							
						}
						
					}
					
					
				}else { 
				
				    
				
					$z = $db->prepare("select * from kategoriler");
					$z->execute(array());
					$c = $z->fetchAll(PDO::FETCH_ASSOC);
					
					 $v = $db->prepare("select * from konular where konu_id=?");
						$v->execute(array($id));
						$z = $v->fetch(PDO::FETCH_ASSOC);
						$x = $v->rowCount();
					
					?>
					<div class="admin_konu_ekle"> 
					<form action="" method="post">
					<ul> 
					<li>konu baslık</li>
					<li><input type="text" value="<?php echo $z["konu_baslik"];?>" name="baslik" /></li>
					<li> 
					<select name="kategori" id="">
					<?php 
					
					foreach($c as $m){
						
						echo '<option value="'.$m["kategori_id"].'"'; 
						
						echo $m["kategori_id"] == $z["konu_kategori"] ? 'selected' : null;
						echo '>'.$m["kategori_adi"].'</option>';
						
					}
					
					?>
					
					</select>
					</li>
					<li>konu acıklaması</li>
					<li><textarea name="aciklama"  cols="50" rows="10"><?php echo $z["konu_aciklama"];?></textarea></li>
					<li><select name="onay" id=""> 
					<option value="1"<?php echo $z["konu_durum"] == 1 ? 'selected' : null; ?>>onaylı</option>
					<option value="0"<?php echo $z["konu_durum"] == 0 ? 'selected' : null; ?> >onaylı deyil</option>
					</select></li>
					<li><button type="submit">konu duzenle</button></li>
					</ul>
					</form>
					</div>
					<?php
					
					
				}
				
				break;
				
				case "konu_sil":
				?>
				<h2>konu sil</h2>
				<?php
				$id = $_GET["id"];
				
				$delete = $db->prepare("delete from konular where konu_id=?");
				$sil = $delete->execute(array($id));
				$x = $delete->rowCount();
				
				if($x){
					
					if($sil){
						
           echo '<h4 class="admin_basarili">konu basarıyla silindi yonlendiriliyorsunuz</h4>';
                      
					  header("refresh: 2; url=?do=konu");
						
					}else {
						
					  echo '<h3 class="admin_dikkat">konu silinirken bir hata olustu</h3>';
						
							
					}
					
					
					
				}else {
					
      echo '<h3 class="admin_dikkat">boye bir konu bulunmuyor</h3>';

					
				}
				
				break;
				
				case "uye":
				echo "uye";
				break;
				
				case "kategori":
				
				break;
				
				case "yorum":
				
				break;
				
				default:
				
				break;
				
			}
              
		   ?>
		   </div>
		   </div>
		   
		   <?php
		   
	   }else {
		   
		 echo "<div style='border:1px solid #ddd;width:500px;height:20px;margin:5px;padding:12px;
		 position:relative;top:200px;left:400px;font-size:20px;background:red;
		 '>bu sayfada yetkiniz bulunmuyor</div>";  
		   header ("refresh: 3; url=index.php");
	   }		
		 
		 
	 }else {
		 
		 echo "<div style='border:1px solid #ddd;width:500px;height:20px;margin:5px;padding:12px;
		 position:relative;top:200px;left:400px;font-size:20px;background:lightyellow;
		 '>uye girisi yapmanız gerekiyor</div>";
		 
	 }
	 
	 
      ?>
	 
	 
</body>
</html>
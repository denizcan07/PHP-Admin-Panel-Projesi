	<!doctype html>
<html>
<head>
<link rel="stylesheet" href="style.css"/>
<link rel="stylesheet" href="styles.css">
 <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
<title>Uye Kayit Formu</title>
<meta charset="utf-8">   
</head>

	<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>anasayfa</span></a></li>
   <span style="float:right;"><li><a>PHP Admin Paneli Projesi</a></li></span>
  
   
</ul>
</div>


<body>
<form class="" action="test.php" method="post">
<div class="kaydol">
   
   <input type="text" name="idid" placeholder="Tc'nizin son 3 rakamini giriniz..." value=""><br>
   <input type="text" name="ad" placeholder="Ad giriniz..." value=""><br>
   <input type="password" name="pass" placeholder="Sifre giriniz..." value=""><br>
   <input type="text" name="mail" placeholder="Mail giriniz..." value=""><br><br>
   <label> Robot degilseniz asagidaki kutucugu 1 yapin.</label><br><br>
   <select  name="onay" id="">
   
     <option></option>
   <option>1</option>

 </select><br>
   <br><input type="submit" class="btn" name="gonder" value="Kaydol">
   
  </div>
  </form>
</body>
 
</html>

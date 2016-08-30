<?php
session_start();
error_reporting(0);
include "timeout.php";

if($_SESSION[login]==1){
	if(!cek_login()){
		$_SESSION[login] = 0;
	}
}
if($_SESSION[login]==0){
  header('location:logout.php');
}
else{
if (empty($_SESSION['username']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
<head>
<title>Administrator CMS Lokomedia</title>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
  <script src="../tinymcpuk/jscripts/tiny_mce/tiny_lokomedia.js" type="text/javascript"></script>

<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">  	

	<div id="menu">
		<div class="left">
		<?php 
        include "menu.php"; ?>
		</div>
		<div class="right">
		 <ul class="topmenu">
         <li><a target='_blank' href=../index.php>View Web</a></li>
		     <li><a href=logout.php>Logout</a></li>
     </ul>
		</div>
	</div>
</div>
<div id="wrap">
  <div id="content">
		<?php include "content.php"; ?>
  </div>
  
		<div id="footer">
			Copyright &copy; 2016 by Rangga Whiki Pangestu. All rights reserved. [ admin theme edited by <a href='http://griya-batik.com'>Codax Family</a> ]
		</div>
</div>
</body>
</html>
<?php
}
}
?>

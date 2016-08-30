<?php
  include "config/koneksi.php";

$s = mysql_query("SELECT * FROM gallery WHERE id_gallery='".$val->validasi($_GET['id'],'sql')."'");
$r = mysql_fetch_array($s);
echo "<p align=center><img src='img_galeri/$r[gbr_gallery]' border=0></p>";
?>

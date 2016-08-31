<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

// definisikan koneksi ke database
$server = "https://pma.passionit.net/index.php?token=e1c83276cef28cd2003cdc6f93ef320c#PMAURL-1:db_structure.php?db=notif&table=&server=1&target=&token=e1c83276cef28cd2003cdc6f93ef320c";
$username = "notif";
$password = "JangkrikBos";
$database = "notif";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Lokovalidasi;
?>

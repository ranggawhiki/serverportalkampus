<?php
include '../config/koneksi.php';
$query = mysql_query("SELECT * FROM users ORDER BY username desc");
$json  = '{"user": [';

// bikin looping dech array yang di fetch
while ($row = mysql_fetch_array ($query)) {

//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
//strip_tag berfungsi untuk menghilangkan tag-tag html pada string  

$char = '"';

$json .= '{"username":"'.$row['username'].'","password":"'.str_replace($char,'`',strip_tags($row['password'])).'","nama_lengkap":"'.$row['nama_lengkap'].'"},';
}

// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';

// print json
echo $json;

?>

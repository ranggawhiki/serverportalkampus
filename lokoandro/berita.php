<?php
include '../config/koneksi.php';
$query = mysql_query("SELECT * FROM berita ORDER BY id_berita desc");
$json  = '{"berita": [';

// bikin looping dech array yang di fetch
while ($row = mysql_fetch_array ($query)) {

//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
//strip_tag berfungsi untuk menghilangkan tag-tag html pada string  

$char = '"';

$json .= '{"id":"'.$row['id_berita'].'","judul":"'.str_replace($char,'`',strip_tags($row['judul'])).'","gambar":"http://notif.passionit.net/foto_berita/small_'.$row['gambar'].'"},';
}

// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';

// print json
echo $json;

?>

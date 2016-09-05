<?php

include '../config/koneksi.php';
$kd = $_GET['idberita'];
$query = mysql_query('SELECT * FROM berita where id_berita="'.$kd.'"');
$json  = '{"berita": [';

while($row=mysql_fetch_array($query))
{

//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
//strip_tag berfungsi untuk menghilangkan tag-tag html pada string  

$char = '"';

$json .='{"id":"'.$row['id_berita'].'","judul":"'.str_replace($char,'`',strip_tags($row["judul"])).'","hari":"'.strip_tags($row["hari"]).'","username":"'.strip_tags($row["username"]).'","isi":"'.str_replace($char,'`',strip_tags($row["isi_berita"])).'","tanggal":"'.strip_tags($row["tanggal"]).'","jam":"'.strip_tags($row["jam"]).'","gambar":"http://notif.passionit.net/foto_berita/'.$row['gambar'].'"},';

}
// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';

// print json
echo $json;
?>

<?php

include '../config/koneksi.php';
$kd = $_GET['username'];
$query = mysql_query('SELECT * FROM users where username="'.$kd.'"');
$json  = '{"login": [';

while($row=mysql_fetch_array($query))
{

//tanda kutip dua (") tidak diijinkan oleh string json, maka akan kita replace dengan karakter `
//strip_tag berfungsi untuk menghilangkan tag-tag html pada string  

$char = '"';

$json .='{"username":"'.$row['username'].'","password":"'.str_replace($char,'`',strip_tags($row["password"])).'","nama_lengkap":"'.strip_tags($row["nama_lengkap"]).'","level":"'.strip_tags($row["level"]).'"}';

}
// buat menghilangkan koma diakhir array
$json = substr($json,0,strlen($json)-1);

$json .= ']}';

// print json
echo $json;
?>
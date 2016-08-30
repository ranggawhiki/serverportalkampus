<?php
if (isset($_GET['id'])){
    $sql = mysql_query("select judul from berita where id_berita='$_GET[id]'");
    $j   = mysql_fetch_array($sql);
    if ($j) {
        echo "$j[judul]";
    } else{
      $sql2 = mysql_query("select nama_website from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[nama_website]";
  }
}
else{
      $sql2 = mysql_query("select nama_website from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[nama_website]";
}
?>

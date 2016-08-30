<?php
if (isset($_GET['id'])){
  $sql = mysql_query("select tag from berita where id_berita='$_GET[id]'");
  $j   = mysql_fetch_array($sql);
	echo "$j[tag]";
}
else{
      $sql2 = mysql_query("select meta_keyword from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_keyword]";
}
?>

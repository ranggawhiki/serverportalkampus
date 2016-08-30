<?php    
    if (isset($_GET['id'])){
      $sql = mysql_query("select judul from berita where id_berita='$_GET[id]'");
      $j   = mysql_fetch_array($sql);
		  echo "$j[judul]";
    }
    else{
      $sql2 = mysql_query("select meta_deskripsi from identitas LIMIT 1");
      $j2   = mysql_fetch_array($sql2);
		  echo "$j2[meta_deskripsi]";
    }
?>

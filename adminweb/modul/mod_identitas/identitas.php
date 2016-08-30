<?php
$aksi="modul/mod_identitas/aksi_identitas.php";
switch($_GET[act]){
  // Tampil identitas
  default:
    $sql  = mysql_query("SELECT * FROM identitas LIMIT 1");
    $r    = mysql_fetch_array($sql);

    echo "<h2>Profil Website</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=identitas&act=update>
          <input type=hidden name=id value=$r[id_identitas]>
          <table class='list'><tbody>
          <tr><td class='left'>Nama Website</td><td> : <input type=text name='nama_website' value='$r[nama_website]' size=75></td></tr>
          <tr><td class='left'>Alamat Website</td><td> : <input type=text name='alamat_website' value='$r[alamat_website]' size=75></td></tr>
          <tr><td class='left'>Meta Deskripsi</td><td> : <textarea name='meta_deskripsi' style='width: 500px; height: 50px;'>$r[meta_deskripsi]</textarea></td></tr>
          <tr><td class='left'>Meta Keyword</td><td> : <textarea name='meta_keyword' style='width: 500px; height: 50px;'>$r[meta_keyword]</textarea></td></tr>
          <tr><td class='left'>Gambar Favicon</td><td> : <img src=../$r[favicon]></td></tr>
          <tr><td class='left'>Ganti Favicon</td><td> : <input type=file size=20 name=fupload>
          &nbsp;NB: nama file gambar favicon harus favicon.ico
          </td></tr>
          <tr><td colspan=2><input type=submit value=Update>
                           <input type=button value=Batal onclick=self.history.back()></td></tr>
         <tbody></form></table>";
    break;  
}
?>

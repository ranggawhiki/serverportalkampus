<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_album/aksi_album.php";
switch($_GET[act]){
  // Tampil Album
  default:
    echo "<h2>Album</h2>
          <input type=button value='Tambah Album' 
          onclick=\"window.location.href='?module=album&act=tambahalbum';\">
          <table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>gambar</td>
          <td class='left'>judul album</td>
          <td class='center'>aksi</td>
          </tr></thead><tbody>"; 
    $tampil=mysql_query("SELECT * FROM album ORDER BY id_album DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>             
             <td class='left' width='120'><img src='../img_album/kecil_$r[gbr_album]'></td>
             <td class='left'>$r[jdl_album]</td>
             <td class='left' width='50'><a href=?module=album&act=editalbum&id=$r[id_album]><img src='images/edit.png' border='0' title='edit' /></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    echo "<div id=paging>*) Data pada Album tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Album.</div><br>";
    break;
  
  // Form Tambah Album
  case "tambahalbum":
    echo "<h2>Tambah Album</h2>
          <form method=POST action='$aksi?module=album&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
          <tr><td class='left'>Judul Album</td><td class='left'> : <input type=text name='jdl_album'></td></tr>
          <tr><td class='left'>Gambar</td><td class='left'> : <input type=file name='fupload' size=40></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
  
  // Form Edit Album  
  case "editalbum":
    $edit=mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Album</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=album&act=update>
          <input type=hidden name=id value='$r[id_album]'>
          <table class='list'><tbody>
          <tr><td class='left'>Judul Album</td><td class='left'> : <input type=text name='jdl_album' value='$r[jdl_album]'></td></tr>
          <tr><td class='left'>Gambar</td><td>    : <img src='../img_album/kecil_$r[gbr_album]'></td></tr>
          <tr><td class='left'>Ganti Gbr</td><td class='left'> : <input type=file name='fupload' size=30></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td class='left'>Aktif</td> <td class='left'> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Aktif</td> <td class='left'> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }         
    echo "<tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>

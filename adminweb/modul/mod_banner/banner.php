<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_banner/aksi_banner.php";
switch($_GET[act]){
  // Tampil Banner
  default:
    echo "<h2>Banner</h2>
          <input type=button value='Tambah Banner' onclick=location.href='?module=banner&act=tambahbanner'>
          <table class='list'><thead>
          <tr><td class='left'>no</td>
          <td class='left'>gambar</td>
          <td class='left'>judul</td>
          <td class='left'>url</td>
          <td class='left'>tgl. posting</td>
          <td class='center'>aksi</td></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'><img src='../foto_banner/$r[gambar]'></td>
                <td class='left'>$r[judul]</td>
                <td class='left'><a href=$r[url] target=_blank>$r[url]</a></td>
                <td class='left'>$tgl</td>
                <td class='center' width='85'><a href=?module=banner&act=editbanner&id=$r[id_banner]><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href='$aksi?module=banner&act=hapus&id=$r[id_banner]&namafile=$r[gambar]'><img src='images/del.png' border='0' title='hapus' /></a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahbanner":
    echo "<h2>Tambah Banner</h2>
          <form method=POST action='$aksi?module=banner&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
          <tr><td class='left'>Judul</td><td class='left'>  : <input type=text name='judul' size=30></td></tr>
          <tr><td class='left'>Url</td><td class='left'>   : <input type=text name='url' size=50 value='http://'></td></tr>
          <tr><td class='left'>Gambar</td><td class='left'> : <input type=file name='fupload' size=40></td></tr>
          <tr><td class='left' colspan='2'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form><br><br><br>";
     break;
    
  case "editbanner":
    $edit = mysql_query("SELECT * FROM banner WHERE id_banner='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Banner</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=banner&act=update>
          <input type=hidden name=id value=$r[id_banner]>
          <table class='list'><tbody>
          <tr><td class='left'>Judul</td><td class='left'>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td class='left'>Url</td><td class='left'>      : <input type=text name='url' size=50 value='$r[url]'></td></tr>
          <tr><td class='left'>Gambar</td><td class='left'>    : <img src='../foto_banner/$r[gambar]'></td></tr>
          <tr><td class='left'>Ganti Gbr</td><td class='left'> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td class='left' colspan=2>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>

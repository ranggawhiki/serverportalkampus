<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_download/aksi_download.php";
switch($_GET[act]){
  // Tampil Download
  default:
    echo "<h2>Download</h2>
          <input type=button value='Tambah Download' onclick=location.href='?module=download&act=tambahdownload'>
          <table class='list'><thead>
          <tr><td class='left'>no</td>
          <td class='left'>judul</td>
          <td class='left'>nama file</td>
          <td class='left'>tgl. posting</td>
          <td class='center'>aksi</td></tr></thead><tbody>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[judul]</td>
                <td class='left'>$r[nama_file]</td>
                <td class='left'>$tgl</td>
                <td class='center'><a href=?module=download&act=editdownload&id=$r[id_download]><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href=$aksi?module=download&act=hapus&id=$r[id_download]><img src='images/del.png' border='0' title='hapus' /></a>
		        </tr>";
    $no++;
    }
    echo "</tbody></table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM download"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>$linkHalaman</div><br>";    
    break;
  
  case "tambahdownload":
    echo "<h2>Tambah Download</h2>
          <form method=POST action='$aksi?module=download&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
          <tr><td class='left'>Judul</td><td class='left'>  : <input type=text name='judul' size=30></td></tr>
          <tr><td class='left'>File</td><td class='left'> : <input type=file name='fupload' size=40></td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form><br><br><br>";
     break;
    
  case "editdownload":
    $edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Download</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=download&act=update>
          <input type=hidden name=id value=$r[id_download]>
          <table class='list'><tbody>
          <tr><td class='left'>Judul</td><td class='left'>     : <input type=text name='judul' size=30 value='$r[judul]'></td></tr>
          <tr><td class='left'>File</td><td class='left'>    : $r[nama_file]</td></tr>
          <tr><td class='left'>Ganti File</td><td class='left'> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td class='left'colspan=2>*) Apabila file tidak diubah, dikosongkan saja.</td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>

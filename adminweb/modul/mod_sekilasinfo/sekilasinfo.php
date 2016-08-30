<?php
$aksi="modul/mod_sekilasinfo/aksi_sekilasinfo.php";
switch($_GET[act]){
  // Tampil Sekilas Info
  default:
    echo "<h2>Sekilas Info</h2>
          <input type=button value='Tambah Sekilas Info' onclick=location.href='?module=sekilasinfo&act=tambahsekilasinfo'>
          <table class='list'><thead>
          <tr><td class='center'>no</td>
          <td class='left'>info</td>
          <td class='left'>tgl. posting</td>
          <td class='center'>aksi</td></tr></thead><tbody>";
    $tampil=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=tgl_indo($r[tgl_posting]);
      echo "<tr><td class='center' width='25'>$no</td>
                <td class='left'>$r[info]</td>
                <td class='left' width='75'>$tgl</td>
                <td class='center' width='85'><a href=?module=sekilasinfo&act=editsekilasinfo&id=$r[id_sekilas]><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href='$aksi?module=sekilasinfo&act=hapus&id=$r[id_sekilas]&namafile=$r[gambar]'><img src='images/del.png' border='0' title='hapus' /></a>
		        </tr>";
    $no++;
    }
    echo "</table>";
    break;
  
  case "tambahsekilasinfo":
      echo "<h2>Tambah Sekilas Info</h2>
          <form method=POST action='$aksi?module=sekilasinfo&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
          <tr><td class='left'>Info</td><td class='left'>  : <input type=text name='info' size=100></td></tr>
          <tr><td class='left'>Gambar</td><td class='left'> : <input type=file name='fupload' size=40></td></tr>
          <tr><td colspan=2 'left'><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
    
  case "editsekilasinfo":
    $edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilas='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Sekilas Info</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=sekilasinfo&act=update>
          <input type=hidden name=id value=$r[id_sekilas]>
          <table class='list'><tbody>          <tr><td class='left'>Info</td><td class='left'>     : <input type=text name='info' size=100 value='$r[info]'></td></tr>
          <tr><td class='left'>Gambar</td><td class='left'>    : <img src='../foto_info/$r[gambar]'></td></tr>
          <tr><td class='left'>Ganti Gbr</td><td class='left'> : <input type=file name='fupload' size=30> *)</td></tr>
          <tr><td colspan=2  class='left'>*) Apabila gambar tidak diubah, dikosongkan saja.</td></tr>
          <tr><td colspan=2  class='left'><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
?>

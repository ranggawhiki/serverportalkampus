<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_templates/aksi_templates.php";
switch($_GET[act]){
  // Tampil Templates
  default:
    echo "<h2>Templates</h2>
          <input type=button value='Tambah Templates' 
          onclick=\"window.location.href='?module=templates&act=tambahtemplates';\">
          <table class='list'><thead>
          <tr>
          <td class='center'>no</td>
          <td class='left'>nama templates</td>
          <td class='left'>pembuat</td>
          <td class='left'>folder</td>
          <td class='center'>aktif</td>
          <td class='center'>aksi</td>
          </tr></thead>";

    $p      = new Paging;
    $batas  = 15;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM templates ORDER BY id_templates DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td class='center' width='25'>$no</td>
                <td class='left'>$r[judul]</td>
                <td class='left'>$r[pembuat]</td>
                <td class='left'>$r[folder]</td>
                <td class='center'>$r[aktif]</td>
                <td class='center' width='85'><a href=?module=templates&act=edittemplates&id=$r[id_templates]><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href=$aksi?module=templates&act=aktifkan&id=$r[id_templates]><img src='images/aktif.png' border='0' title='aktifkan' /></a>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM templates"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=\"pagination\"> $linkHalaman</div>";
    break;
  
  
  // Form Tambah Templates
  case "tambahtemplates":
    echo "<h2>Tambah Templates</h2>
          <form method=POST action='$aksi?module=templates&act=input'>
          <table class='list'><tbody>
          <tr><td class='left' width='150'>Nama Templates</td><td> : <input type=text name='judul'></td></tr>
          <tr><td class='left'>Pembuat</td><td> : <input type=text name='pembuat'></td></tr>
          <tr><td class='left'>Folder</td><td> : <input type=text name='folder' value='templates/'></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
  
  // Form Edit Templates 
  case "edittemplates":
    $edit=mysql_query("SELECT * FROM templates WHERE id_templates='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Templates</h2>
          <form method=POST action=$aksi?module=templates&act=update>
          <input type=hidden name=id value='$r[id_templates]'>
          <table class='list'><tbody>
          <tr><td class='left' width='150'>Nama Templates</td><td> : <input type=text name='judul' value='$r[judul]'></td></tr>
          <tr><td class='left'>Pembuat</td><td> : <input type=text name='pembuat' value='$r[pembuat]'></td></tr>
          <tr><td class='left'>Folder</td><td> : <input type=text name='folder' value='$r[folder]'></td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>

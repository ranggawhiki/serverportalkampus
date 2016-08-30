<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_komentar/aksi_komentar.php";
switch($_GET[act]){
  // Tampil Komentar
  default:
    echo "<h2>Komentar</h2>
          <table class='list'><thead>
          <tr><td class='left'>no</td>
          <td class='left'>nama</td>
          <td class='left'>komentar</td>
          <td class='center'>aktif</td>
          <td class='center'>aksi</td></tr></thead>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left' width='80'>$r[nama_komentar]</td>
                <td class='left'>$r[isi_komentar]</td>
                <td class='center'>$r[aktif]</td>
                <td class='center' width='85'><a href=?module=komentar&act=editkomentar&id=$r[id_komentar]><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href=$aksi?module=komentar&act=hapus&id=$r[id_komentar]><img src='images/del.png' border='0' title='hapus' /></a>
		        </tr>";
      $no++;
    }
    echo "</table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM komentar"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=\"pagination\"> $linkHalaman</div>";
    break;
  
  case "editkomentar":
    $edit = mysql_query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Komentar</h2>
          <form method=POST action=$aksi?module=komentar&act=update>
          <input type=hidden name=id value=$r[id_komentar]>
          <table class='list'><tbody>
          <tr><td class='left'>Nama</td><td class='left'>     : <input type=text name='nama_komentar' size=30 value='$r[nama_komentar]'></td></tr>
          <tr><td class='left'>Website</td><td class='left'>  : <input type=text name='url' size=30 value='$r[url]'></td></tr>
          <tr><td class='left'>Isi Komentar</td><td class='left'> <textarea name='isi_komentar' id='loko' style='width: 600px; height: 150px;'>$r[isi_komentar]</textarea></td></tr>";

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

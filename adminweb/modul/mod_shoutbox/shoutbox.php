<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

$aksi="modul/mod_shoutbox/aksi_shoutbox.php";
switch($_GET[act]){
  // Tampil Shoutbox
  default:
    echo "<h2>Shoutbox</h2>
          <table class='list'><thead> 
          <tr><td class='center'>no</td>
          <td class='left'>nama</td><td class='left'>pesan</td><td class='center'>aktif</td><td class='center'>aksi</td></tr></thead><tbody>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    $tampil=mysql_query("SELECT * FROM shoutbox ORDER BY id_shoutbox DESC LIMIT $posisi,$batas");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td class='center' width='25'>$no</td>
                <td class='left' width='80'>$r[nama]</td>
                <td class='left'>$r[pesan]</td>
                <td class='center'>$r[aktif]</td>
                <td class='center' width='85'><img src='images/edit.png' border='0' title='edit' /></a>
	                  <a href=$aksi?module=shoutbox&act=hapus&id=$r[id_shoutbox]><img src='images/del.png' border='0' title='hapus' /></a>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    $jmldata=mysql_num_rows(mysql_query("SELECT * FROM shoutbox"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

    echo "<div class=pagination>Hal: $linkHalaman</div><br>";
    break;
  
  case "editshoutbox":
    $edit = mysql_query("SELECT * FROM shoutbox WHERE id_shoutbox='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Shoutbox</h2>
          <form method=POST action=$aksi?module=shoutbox&act=update>
          <input type=hidden name=id value=$r[id_shoutbox]>
          <table>
          <tr><td>Nama</td><td>     : <input type=text name='nama' size=30 value='$r[nama]'></td></tr>
          <tr><td>Website</td><td>  : <input type=text name='website' size=30 value='$r[website]'></td></tr>
          <tr><td>Pesan</td><td> <textarea name=pesan style='width: 600px; height: 150px;'>$r[pesan]</textarea></td></tr>";

    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>

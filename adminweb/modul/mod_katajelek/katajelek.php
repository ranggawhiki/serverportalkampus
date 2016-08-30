<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_katajelek/aksi_katajelek.php";
switch($_GET[act]){
  // Tampil Kata Jelek
  default:
    echo "<h2>Kata Jelek</h2>
          <input type=button value='Tambah Kata Jelek' 
          onclick=\"window.location.href='?module=katajelek&act=tambahkatajelek';\">
          <table class='list'><thead>
          <tr>
          <td class='left'>no</td>
          <td class='left'>kata jelek</td>
          <td class='left'>ganti</td>
          <td class='center'>aksi</td>
          </tr></thead><tbody>"; 
    $tampil=mysql_query("SELECT * FROM katajelek ORDER BY id_jelek DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='left' width='25'>$no</td>
             <td class='left'>$r[kata]</td>
             <td class='left'>$r[ganti]</td>
             <td class='left' width='85'><a href=?module=katajelek&act=editkatajelek&id=$r[id_jelek]><img src='images/edit.png' border='0' title='edit' /></a>
	               <a href=$aksi?module=katajelek&act=hapus&id=$r[id_jelek]><img src='images/del.png' border='0' title='hapus' /></a>
             </td></tr>";
      $no++;
    }
    echo "</table>";
    break;
  
  // Form Tambah Kata Jelek
  case "tambahkatajelek":
    echo "<h2>Tambah Kata Jelek</h2>
          <form method=POST action='$aksi?module=katajelek&act=input'>
          <table class='list'><tbody>
          <tr><td class='left'>Kata Jelek</td><td class='left'> : <input type=text name='kata'></td></tr>
          <tr><td class='left'>Ganti</td><td class='left'> : <input type=text name='ganti'></td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
  
  // Form Edit Kata Jelek 
  case "editkatajelek":
    $edit=mysql_query("SELECT * FROM katajelek WHERE id_jelek='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Kata Jelek</h2>
          <form method=POST action=$aksi?module=katajelek&act=update>
          <input type=hidden name=id value='$r[id_jelek]'>
          <table class='list'><tbody>
          <tr><td class='left'>Kata Jelek</td><td class='left'> : <input type=text name='kata' value='$r[kata]'></td></tr>
          <tr><td class='left'>Ganti</td><td class='left'> : <input type=text name='ganti' value='$r[ganti]'></td></tr>
          <tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
    break;  
}
}
?>

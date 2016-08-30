<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_menuutama/aksi_menuutama.php";
switch($_GET[act]){
  // Tampil Menu Utama
  default:
    echo "<h2>Menu Utama</h2>
          <input type=button value='Tambah Menu Utama' 
          onclick=\"window.location.href='?module=menuutama&act=tambahmenuutama';\">
          <table class='list'><thead>
          <tr><td class='center'>no</td>
          <td class='center'>menu utama</td>
          <td class='left'>link</td>
          <td class='center'>aktif</td>
          <td class='center'>admin menu</td>
          <td class='center'>aksi</td></tr></thead><tbody>";
          
    $tampil=mysql_query("SELECT * FROM mainmenu");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr><td class='center' width='25'>$no</td>
             <td class='left'>$r[nama_menu]</td>
             <td class='left'>$r[link]</td>
             <td class='center'>$r[aktif]</td>
             <td class='center'>$r[adminmenu]</td>
             <td class='center' width='50'><a href=?module=menuutama&act=editmenuutama&id=$r[id_main]><img src='images/edit.png' border='0' title='edit' /></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    echo "<div id=paging>*) Data pada Menu tidak bisa dihapus, tapi bisa di non-aktifkan melalui Edit Menu Utama.<br>
                         **) Untuk link menu Beranda (Home) harus diubah ketika online menjadi http://NamaDomainAnda.com
          </div><br>";
    break;
  
  // Form Tambah Menu Utama
  case "tambahmenuutama":
    echo "<h2>Tambah Menu Utama</h2>
          <form method=POST action='$aksi?module=menuutama&act=input'>
          <table class='list'><tbody>
          <tr><td class='left' width='70'>Nama Menu</td><td class='left'> : <input type=text name='nama_menu'></td></tr>
          <tr><td class='left'>Link</td><td class='left'> : <input type=text name='link'></td></tr>
          <tr><td class='left'>Aktif</td><td class='left'> : <input type=radio name='aktif' value='Y' checked>Y 
                                                             <input type=radio name='aktif' value='N'>N</td></tr>
          <tr><td class='left'>Admin Menu</td><td class='left'> : <input type=radio name='adminmenu' value='Y'>Y 
                                                                  <input type=radio name='adminmenu' value='N' checked>N</td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>
          <div id=paging>*) Apabila Aktif = Y dan Admin Menu = N, maka Menu Utama akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Menu = Y, maka Menu Utama akan ditampilkan di halaman administrator.
         </div><br>";
     break;
  
  // Form Edit Menu Utama
  case "editmenuutama":
    $edit=mysql_query("SELECT * FROM mainmenu WHERE id_main='$_GET[id]'");
    $r=mysql_fetch_array($edit);

    echo "<h2>Edit Menu Utama</h2>
          <form method=POST action=$aksi?module=menuutama&act=update>
          <input type=hidden name=id value='$r[id_main]'>
          <table class='list'><tbody>
          <tr><td class='left' width='70'>Nama Menu</td><td class='left'> : <input type=text name='nama_menu' value='$r[nama_menu]'></td></tr>
          <tr><td class='left'>Link</td><td class='left'> : <input type=text name='link' value='$r[link]'></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td class='left'>Aktif</td> <td class='left'> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Aktif</td> <td class='left'> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    if ($r[adminmenu]=='Y'){
      echo "<tr><td class='left'>Admin Menu</td> <td class='left'> : <input type=radio name='adminmenu' value='Y' checked>Y  
                                      <input type=radio name='adminmenu' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Admin Menu</td> <td class='left'> : <input type=radio name='adminmenu' value='Y'>Y  
                                      <input type=radio name='adminmenu' value='N' checked>N</td></tr>";
    }

    echo "<tr><td class='left'colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          <tbody></table></form>
          <div id=paging>*) Apabila Aktif = Y dan Admin Menu = N, maka Menu Utama akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Menu = Y, maka Menu Utama akan ditampilkan di halaman administrator.
         </div><br>";
    break;  
}
}
?>

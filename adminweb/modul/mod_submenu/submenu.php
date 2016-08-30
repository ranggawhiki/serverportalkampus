<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_submenu/aksi_submenu.php";
switch($_GET[act]){
  // Tampil Sub Menu
  default:
    echo "<h2>Sub Menu</h2>
          <input type=button value='Tambah Sub Menu' onclick=\"window.location.href='?module=submenu&act=tambahsubmenu';\">
          <table class='list'><thead>
          <tr><td class='center'>no</td>
          <td class='center'>sub menu</td>
          <td class='center'>menu utama</td>
          <td class='left'>link submenu</td>
          <td class='center'>aktif</td>
          <td class='center'>admin sub menu</td>
          <td class='center'>aksi</td></tr></thead><tbody>";          

    $tampil = mysql_query("SELECT * FROM submenu,mainmenu WHERE submenu.id_main=mainmenu.id_main");
  
    $no = 1;
    while($r=mysql_fetch_array($tampil)){
	if($r[id_submain]!=0){
		$sub = mysql_fetch_array(mysql_query("SELECT * FROM submenu WHERE id_sub=$r[id_submain]"));
		$mainmenu = $r[nama_menu]." &gt; ".$sub[nama_sub];
	} else {
		$mainmenu = $r[nama_menu];
	}
      echo "<tr><td class='left' width='25'>$no</td>
                <td class='left'>$r[nama_sub]</td>
                <td class='left'>$mainmenu</td>
                <td class='left'>$r[link_sub]</td>
                <td class='center'>$r[aktif]</td>
                <td class='center'>$r[adminsubmenu]</td>
		            <td class='center' width='85'><a href=?module=submenu&act=editsubmenu&id=$r[id_sub]><img src='images/edit.png' border='0' title='edit' /></a>
		                <a href=$aksi?module=submenu&act=hapus&id=$r[id_sub]><img src='images/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahsubmenu":
    echo "<h2>Tambah Sub Menu</h2>
          <form method=POST action='$aksi?module=submenu&act=input'>
          <table class='list'><tbody>
          <tr><td class='left' width='100'>Sub Menu</td>     <td class='left'> : <input type=text name='nama_sub' size='40'></td></tr>
          <tr><td class='left'>Menu Utama</td>  <td class='left'> : 
          <select name='menu_utama'>
            <option value=0 selected>- Pilih Menu Utama -</option>";
            $tampil=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_main]>$r[nama_menu]</option>";
            }
    echo "</select></td></tr>
          <tr><td class='left'>Pilih Sub Menu</td>  <td> : 
          <select name='sub_menu'>
            <option value=0 selected>- Pilih Sub Menu -</option>";
            $tampil=mysql_query("SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_sub]>$r[nama_sub]</option>";
            }
    echo "</select></td></tr>
          <tr><td class='left'>Link Sub Menu</td><td class='left'> : <input type=text name='link_sub' size='60'></td></tr>
          
          <tr><td class='left'>Aktif</td><td class='left'> : <input type=radio name='aktif' value='Y' checked>Y 
                                                             <input type=radio name='aktif' value='N'>N</td></tr>
          <tr><td class='left'>Admin Sub Menu</td><td class='left'> : <input type=radio name='adminsubmenu' value='Y'>Y 
                                                                  <input type=radio name='adminsubmenu' value='N' checked>N</td></tr>
          <tr><td class='left' colspan=2><input type=submit name=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>
          <div id=paging>*) Apabila Aktif = Y dan Admin Sub Menu = N, maka Sub Menu akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Sub Menu = Y, maka Sub Menu akan ditampilkan di halaman administrator. <br /><br />
                        ***) Pilih <b>Menu Utama</b> jika ingin membuat Sub Menu dari Menu Utama <br />
	                      ****) Pilih <b>Sub Menu</b> jika ingin membuat Sub Menu dari Sub Menu (hanya berlaku untuk halaman pengunjung)
         </div><br>";
     break;
    
  case "editsubmenu":
    $edit = mysql_query("SELECT * FROM submenu WHERE id_sub='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Sub Menu</h2>
          <form method=POST action=$aksi?module=submenu&act=update>
          <input type=hidden name=id value=$r[id_sub]>
          <table class='list'><tbody>
          <tr><td class='left' width=100>Sub Menu</td>     <td> : <input type=text name='nama_sub' value='$r[nama_sub]'></td></tr>
          <tr><td class='left'>Menu Utama</td>  <td> : <select name='menu_utama'>";
 
          $tampil=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y' ORDER BY nama_menu");
          if ($r[id_main]==0){
            echo "<option value=0 selected>- Pilih Menu Utama -</option>";
          }   
          while($w=mysql_fetch_array($tampil)){
            if ($r[id_main]==0 || ($r[id_main]!=0 && $r[id_submain]!=0)){
              echo "<option value=$w[id_main] selected>$w[nama_menu]</option>";
            }
            else{
              echo "<option value=$w[id_main]>$w[nama_menu]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td class='left'>Pilih Sub Menu</td>  <td> : <select name='sub_menu'>";
 
      		$tampil2=mysql_query("SELECT * FROM submenu WHERE id_submain=0 AND aktif='Y' ORDER BY nama_sub");
          if ($r[id_submain]==0){
            echo "<option value=0 selected>- Pilih Sub Menu -</option>";
          }   
          while($s=mysql_fetch_array($tampil2)){
            if ($r[id_submain]==$s[id_sub]){
              echo "<option value=$s[id_sub] selected>$s[nama_sub]</option>";
            }
            else{
              echo "<option value=$s[id_sub]>$s[nama_sub]</option>";
            }
          }
    echo "</select></td></tr>
          <tr><td class='left'>Link Sub Menu</td><td> : <input type=text name='link_sub' value='$r[link_sub]'></td></tr>";
    if ($r[aktif]=='Y'){
      echo "<tr><td class='left'>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }
          
    if ($r[adminsubmenu]=='Y'){
      echo "<tr><td class='left'>Admin Sub Menu</td> <td> : <input type=radio name='adminsubmenu' value='Y' checked>Y  
                                      <input type=radio name='adminsubmenu' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td class='left'>Admin Sub Menu</td> <td> : <input type=radio name='adminsubmenu' value='Y'>Y  
                                      <input type=radio name='adminsubmenu' value='N' checked>N</td></tr>";
    }

    echo "<tr><td class='left' colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>
          <div id=paging>*) Apabila Aktif = Y dan Admin Sub Menu = N, maka Sub Menu akan ditampilkan di halaman pengunjung. <br />
 	                      **) Apabila Aktif = N dan Admin Sub Menu = Y, maka Sub Menu akan ditampilkan di halaman administrator. <br /><br />
                        ***) Pilih <b>Menu Utama</b> jika ingin membuat Sub Menu dari Menu Utama <br />
	                      ****) Pilih <b>Sub Menu</b> jika ingin membuat Sub Menu dari Sub Menu (hanya berlaku untuk halaman pengunjung)
         </div><br>";
    break;  
}
}
?>

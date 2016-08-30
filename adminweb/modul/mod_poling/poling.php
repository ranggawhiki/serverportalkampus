<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/mod_poling/aksi_poling.php";
switch($_GET[act]){
  // Tampil Modul
  default:
    echo "<h2>Poling</h2>
          <input type=button value='Tambah Poling' onclick=\"window.location.href='?module=poling&act=tambahpoling';\">
          <table class='list'><thead>
          <tr><td class='left' width='25'>no</td>
          <td class='left'>pilihan</td>
          <td class='center'>status</td>
          <td class='center'>rating</td>
          <td class='center'>aktif</td>
          <td class='center' width='50'>aksi</td></tr></thead><tbody>";
          
    $no = 1;
    $tampil=mysql_query("SELECT * FROM poling ORDER BY id_poling DESC");
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr>
            <td class='left'>$no</td>
            <td class='left'>$r[pilihan]</td>
            <td class='center'>$r[status]</td>
            <td class='center'>$r[rating]</td>
            <td class='center'>$r[aktif]</td>
            <td class='center'><a href=?module=poling&act=editpoling&id=$r[id_poling]><img src='images/edit.png' border='0' title='edit' /></a>
            </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;

  case "tambahpoling":
    echo "<h2>Tambah Poling</h2>
          <form method=POST action='$aksi?module=poling&act=input'>
          <table>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan' size=50></td></tr>
          <tr><td>Status</td>   <td> : <input type=radio name='status' value='Jawaban' checked>Jawaban 
                                      <input type=radio name='status' value='Pertanyaan'>Pertanyaan  </td></tr>
          <tr><td>Aktif</td>   <td> : <input type=radio name='aktif' value='Y' checked>Y 
                                      <input type=radio name='aktif' value='N'>N  </td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
     break;
 
  case "editpoling":
    $edit = mysql_query("SELECT * FROM poling WHERE id_poling='$_GET[id]'");
    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Poling</h2>
          <form method=POST action=$aksi?module=poling&act=update>
          <input type=hidden name=id value='$r[id_poling]'>
          <table>
          <tr><td>Pilihan</td> <td> : <input type=text name='pilihan' value='$r[pilihan]' size=50></td></tr>";
          
    if ($r[aktif]=='Y'){
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y' checked>Y  
                                      <input type=radio name='aktif' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Aktif</td> <td> : <input type=radio name='aktif' value='Y'>Y  
                                      <input type=radio name='aktif' value='N' checked>N</td></tr>";
    }

    if ($r[status]=='Jawaban'){
      echo "<tr><td>Status</td> <td> : <input type=radio name='status' value='Jawaban' checked>Jawaban  
                                       <input type=radio name='status' value='Pertanyaan'> Pertanyaan</td></tr>";
    }
    else{
      echo "<tr><td>Status</td> <td> : <input type=radio name='status' value='Jawaban'>Jawaban  
                                      <input type=radio name='status' value='Pertanyaan' checked>Pertanyaan</td></tr>";
    }

    echo "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table></form>";
    break;  
}
}
?>

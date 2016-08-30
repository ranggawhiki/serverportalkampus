<?php    
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

function GetCheckboxes($table, $key, $Label, $Nilai='') {
  $s = "select * from $table order by nama_tag";
  $r = mysql_query($s);
  $_arrNilai = explode(',', $Nilai);
  $str = '';
  while ($w = mysql_fetch_array($r)) {
    $_ck = (array_search($w[$key], $_arrNilai) === false)? '' : 'checked';
    $str .= "<input type=checkbox name='".$key."[]' value='$w[$key]' $_ck>$w[$Label] ";
  }
  return $str;
}

$aksi="modul/mod_berita/aksi_berita.php";
switch($_GET[act]){
  // Tampil Berita
  default:
    echo "<h2>Berita</h2>";
	echo" <div class='box'><div class='left'><input type=button value='Tambah Berita' onclick=\"window.location.href='?module=berita&act=tambahberita';\"></div>
		  <div class='right'><form method=get action='$_SERVER[PHP_SELF]'>
          <input type=hidden name=module value=berita>
          Masukkan Judul Berita : <input type=text name='kata'> <input type=submit value=Cari>
          </form></div></div>";
    if (empty($_GET['kata'])){
    echo "<table class='list'><thead>  
          <tr><td class='center'>no</td>
          <td class='left'>judul</td>
          <td class='left'>tgl. posting</td>
          <td class='center'>aksi</td>
          </tr></thead>";

    $p      = new Paging;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td class='center' width='25'>$no</td>
                <td class='left'>$r[judul]</td>
                <td class='left'>$tgl_posting</td>
		            <td class='center' width='85'><a href=?module=berita&act=editberita&id=$r[id_berita]><img src='images/edit.png' border='0' title='edit' /></a>
		                <a href=\"$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><img src='images/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=\"pagination\"> $linkHalaman</div>";
 
    break;    
    }
    else{
    echo "<table class='list'><thead>  
          <tr><td class='left'>no</td>
          <td class='left'>judul</td>
          <td class='left'>tgl. posting</td>
          <td class='center'>aksi</td>
          </tr></thead>";

    $p      = new Paging9;
    $batas  = 10;
    $posisi = $p->cariPosisi($batas);

    if ($_SESSION[leveluser]=='admin'){
      $tampil = mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%' ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
    else{
      $tampil=mysql_query("SELECT * FROM berita 
                           WHERE username='$_SESSION[namauser]'
                           AND judul LIKE '%$_GET[kata]%'       
                           ORDER BY id_berita DESC LIMIT $posisi,$batas");
    }
  
    $no = $posisi+1;
    while($r=mysql_fetch_array($tampil)){
      $tgl_posting=tgl_indo($r[tanggal]);
      echo "<tr><td class='left'>$no</td>
                <td class='left'>$r[judul]</td>
                <td class='left'>$tgl_posting</td>
		            <td class='left'><a href=?module=berita&act=editberita&id=$r[id_berita]><img src='images/edit.png' border='0' title='edit' /></a>
		                <a href='$aksi?module=berita&act=hapus&id=$r[id_berita]&namafile=$r[gambar]'><img src='images/del.png' border='0' title='hapus' /></a></td>
		        </tr>";
      $no++;
    }
    echo "</table>";

    if ($_SESSION[leveluser]=='admin'){
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE judul LIKE '%$_GET[kata]%'"));
    }
    else{
      $jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE username='$_SESSION[namauser]' AND judul LIKE '%$_GET[kata]%'"));
    }  
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div class=\"pagination\"> $linkHalaman</div>";
 
    break;    
    }

  
  case "tambahberita":
    echo "<h2>Tambah Berita</h2>
          <form method=POST action='$aksi?module=berita&act=input' enctype='multipart/form-data'>
          <table class='list'><tbody>
          <tr><td width=70>Judul</td>     <td> : <input type=text name='judul' size=60></td></tr>
          <tr><td>Kategori</td>  <td> : 
          <select name='kategori'>
            <option value=0 selected>- Pilih Kategori -</option>";
            $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
            while($r=mysql_fetch_array($tampil)){
              echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
            }
    echo "</select></td></tr>
           <tr><td>Headline</td>    <td> : <input type=radio name='headline' value='Y' checked>Y  
                                         <input type=radio name='headline' value='N'> N 
                                         <br>(Apabila berita ada gambarnya dan ingin dijadikan headline, pilih Headline = Y)</td></tr>
          <tr><td>Isi Berita</td>  <td> <textarea name='isi_berita' id='loko' style='width: 800px; height: 350px;'></textarea></td></tr>
          <tr><td>Gambar</td>      <td> : <input type=file name='fupload' size=40> 
                                          <br>Tipe gambar harus JPG/JPEG dan ukuran lebar maks: 400 px</td></tr>";

    $tag = mysql_query("SELECT * FROM tag ORDER BY tag_seo");
    echo "<tr><td>Tag (Label)</td><td> ";
    while ($t=mysql_fetch_array($tag)){
      echo "<input type=checkbox value='$t[tag_seo]' name=tag_seo[]>$t[nama_tag] ";
    }
    
    echo "</td></tr>
          <tr><td colspan=2><input type=submit value=Simpan>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
          </tbody></table></form>";
     break;
    
    
  case "editberita":
    if ($_SESSION[leveluser]=='admin'){
      $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]'");
    }
    else{
      $edit = mysql_query("SELECT * FROM berita WHERE id_berita='$_GET[id]' AND username='$_SESSION[namauser]'");
    }

    $r    = mysql_fetch_array($edit);

    echo "<h2>Edit Berita</h2>
          <form method=POST enctype='multipart/form-data' action=$aksi?module=berita&act=update>
          <input type=hidden name=id value=$r[id_berita]>
          <table class='list'><tbody>
          <tr><td width=70>Judul</td>     <td> : <input type=text name=\"judul\" size=60 value=\"$r[judul]\"></td></tr>
          <tr><td>Kategori</td>  <td> : <select name='kategori'>";
 
          $tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
          if ($r[id_kategori]==0){
            echo "<option value=0 selected>- Pilih Kategori -</option>";
          }   

          while($w=mysql_fetch_array($tampil)){
            if ($r[id_kategori]==$w[id_kategori]){
              echo "<option value=$w[id_kategori] selected>$w[nama_kategori]</option>";
            }
            else{
              echo "<option value=$w[id_kategori]>$w[nama_kategori]</option>";
            }
          }

    echo "</select></td></tr>";

   if ($r[headline]=='Y'){
      echo "<tr><td>Headline</td> <td> : <input type=radio name='headline' value='Y' checked>Y  
                                        <input type=radio name='headline' value='N'> N</td></tr>";
    }
    else{
      echo "<tr><td>Headline</td> <td> : <input type=radio name='headline' value='Y'>Y  
                                        <input type=radio name='headline' value='N' checked>N</td></tr>";
    }
      echo "<tr><td>Isi Berita</td>   <td> <textarea id='loko' name='isi_berita' style='width: 800px; height: 350px;'>$r[isi_berita]</textarea></td></tr>
          <tr><td>Gambar</td>       <td> :  ";
          if ($r[gambar]!=''){
              echo "<img src='../foto_berita/small_$r[gambar]'>";  
          }
    echo "</td></tr>
          <tr><td>Ganti Gbr</td>    <td> : <input type=file name='fupload' size=30> *)Apabila gambar tidak diubah, dikosongkan saja.</td></tr>";

    $d = GetCheckboxes('tag', 'tag_seo', 'nama_tag', $r[tag]);


    echo "<tr><td>Tag (Label)</td><td> $d </td></tr>";
 
    echo  "<tr><td colspan=2><input type=submit value=Update>
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
         </tbody></table></form>";
    break;  
}

}
?>

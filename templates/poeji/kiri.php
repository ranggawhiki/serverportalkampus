 <?php
 if ($_GET['module']=='home'){
	 ?>
     <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Headline News
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                                
                                                
<div id="lofslidecontent45" class="lof-slidecontent">
<div style="display: none;" class="preload"><div></div></div>
 <!-- MAIN CONTENT --> 
  <div class="lof-main-outer">
  	<ul style="left: -747.701px; width: 3000px;" class="lof-main-wapper">
              <?php
                $terkini=mysql_query("SELECT * FROM berita 
                                      WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
                $no=1;
              	while($t=mysql_fetch_array($terkini)){      
                
                $isi_berita = strip_tags($t['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_berita,0,135); // ambil sebanyak 200 karakter
                $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
       	    
                  echo "<li>
                          <img src=foto_berita/$t[gambar] />
                          <div class='lof-main-item-desc'>
                          <h5>&nbsp;&nbsp;<a href='berita-$t[id_berita]-$t[judul_seo].html'><font color=#FFFFFF>$t[judul]</font></a></h5>
                          <p><font-size=2>$isi<br /></font></p>
                          </div>
                        </li>";           
                  $no++;
                } 
              ?>
              </ul>
            </div>          
          
            <div style="height: 300px; width: 310px;" class="lof-navigator-outer">
  		      <ul style="height: 500px; top: -94.88px;" class="lof-navigator">
            
              <?php
                $terkini2=mysql_query("SELECT * FROM berita 
                                      WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5");
                $no=1;
              	while($t=mysql_fetch_array($terkini2)){      
               	$tgl = tgl_indo($t[tanggal]);

                $isi_berita = strip_tags($t['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_berita,0,120); // ambil sebanyak 200 karakter
                $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
       	    
                  echo "<li>
                          <div><img src=foto_berita/small_$t[gambar] />
                          <br /><span class=tanggal>$t[hari], $tgl - $t[jam]</span>
                          <h3>$t[judul]</h3>
                          </div>
                        </li>";           
                  $no++;
                } 
              ?>
           </ul>
           </div> 
</div>

        <!-- / end content-kiri untuk headline berita -->   


                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                              
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                                                        
 <?php
	      $terkini=mysql_query("SELECT * FROM berita 
                                      WHERE headline='Y' ORDER BY id_berita DESC LIMIT 5,7");
                $no=1;
              	while($t=mysql_fetch_array($terkini)){      
                
				$tgl_posting   = tgl_indo($t[tanggal]);
				
                $isi_berita = strip_tags($t['isi_berita']); // membuat paragraf pada isi berita dan mengabaikan tag html
                $isi = substr($isi_berita,0,590); // ambil sebanyak 200 karakter
                $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
				
				// cek ada berapa komentar
				$komentar = "SELECT * FROM komentar WHERE id_berita = '".$t['id_berita']."'";
				$rskomentar = mysql_query($komentar);
				$total_komentar = mysql_num_rows($rskomentar);
       	    	?>
                <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$t['judul']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                                <span class=tanggal><?=$tgl_posting?> - <?=$t['jam']?> WIB | 
                                                Sudah di lihat <b><?=$t['dibaca']?></b>x | Ada <b><?=$total_komentar?></b> Komentar
                                                </span><br /><br />
                                                
                                               <img src=foto_berita/small_<?=$t['gambar']?> align="left" /><?=$isi?>
                                              <br /><br /><a href='berita-<?=$t['id_berita']?>-<?=$t['judul_seo']?>.html' class="art-button">Selengkapnya</a>
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                        <?php

$no++;
                } 
				

              ?>
           

<?php 
}
elseif ($_GET['module']=='detailberita'){
	echo "<div id='content'>          
           <div id='content-detail'>";            

	$detail=mysql_query("SELECT * FROM berita,users,kategori    
                      WHERE users.username=berita.username 
                      AND kategori.id_kategori=berita.id_kategori 
                      AND id_berita='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
	$tgl = tgl_indo($d[tanggal]);
	$baca = $d[dibaca]+1;
	?>
    <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$d['judul']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
               <span class=posting>Diposting oleh : <b><?=$d['nama_lengkap']?></b>
                Kategori: <a href=kategori-<?=$d['id_kategori']?>-<?=$d['kategori_seo']?>.html><b><?=$d['nama_kategori']?></b></a> 
				- Dibaca: <b><?=$baca?></b> kali</span><br />
                
                <p><span class=image><img src='foto_berita/<?=$d['gambar']?>' border=0 align="left"></span></p>
                 
                 <?=$d['isi_berita']?>
                 <br /><br />
                 <?php
				   echo "<img src=$f[folder]/images/berita_terkait.jpg><br /><ul>";
  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata  = explode(",",$d[tag]);
  $jml_katakan = (integer)count($pisah_kata);

  $jml_kata = $jml_katakan-1; 
  $ambil_id = substr($_GET[id],0,4);

  // Looping query sebanyak jml_kata
  $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "tag LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
   $cari .= ") ORDER BY id_berita DESC LIMIT 5";
 
  $hasil  = mysql_query($cari);
  while($h=mysql_fetch_array($hasil)){
  		echo "<li><a href=berita-$h[id_berita]-$h[judul_seo].html>$h[judul]</a></li>";
  }      
	echo "</ul>";
?>
<br />
<!-- AddThis Button BEGIN -->
 <div align="right">
  <a class="addthis_button" href="http://addthis.com/bookmark.php?v=250&amp;username=xa-4b5a60186220d9f0">
  <img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" alt="Bookmark and Share" style="border: 0pt none ;" width="125" height="16"></a><script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4b5a60186220d9f0"></script>
  </div>
  <!-- AddThis Button END -->
  <br />
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
    <?php
  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE berita SET dibaca=$d[dibaca]+1 
              WHERE id_berita='$_GET[id]'"); 

?>
    <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                           <?php
						  // Hitung jumlah komentar
  $komentar = mysql_query("select count(komentar.id_komentar) as jml from komentar WHERE id_berita='$_GET[id]' AND aktif='Y'");
  $k = mysql_fetch_array($komentar); 
  ?>
  <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$k[jml]?> Komentar
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->

<?php

  // Paging komentar
  $p      = new Paging7;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Komentar berita
  $sql = mysql_query("SELECT * FROM komentar WHERE id_berita='$_GET[id]' AND aktif='Y' LIMIT $posisi,$batas");
	$jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
    while ($s = mysql_fetch_array($sql)){
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
 	    if ($s[url]!=''){
        echo "<span class=komentar><a name=$s[id_komentar] id=$s[id_komentar]><a href='http://$s[url]' target='_blank'><b><font color=red>$s[nama_komentar]</font></b></a></a></span><br />";  
	    }
	    else{
        echo "<span class=komentar><b><font color=red>$s[nama_komentar]</font></b></span><br />";  
      }

  		echo "<span class=tanggal>$tanggal - $s[jam_komentar] WIB</span><br /><br />";
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
      $isikan=sensor($isian); 
 
  	  echo autolink($isikan);
      echo "<hr color=#CCC noshade=noshade />";	 		  
    }

   	$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM komentar WHERE id_berita='$_GET[id]' AND aktif='Y'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);

    echo "$linkHalaman";
  }
  // Form komentar
  
        
  echo "</div>";            
?>

                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>                            
                                <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                           
  <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Isi Komentar
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->

<?php  // Form komentar
  
  echo "<table width=100%'>
        <form name='form' action=simpankomentar.php method=POST onSubmit=\"return validasi(this)\">
        <input type=hidden name=id value=$_GET[id]>
        <tr><td>Nama</td><td> : <input type=text name=nama_komentar size=40 maxlength=50></td></tr>
        <tr><td>Website</td><td> : <input type=text name=url size=40 maxlength=50></td></tr>
        <tr><td valign=top>Komentar</td><td> <textarea name='isi_komentar' style='width: 300px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 maxlength=6><br /></td></tr>
        <tr><td>&nbsp;</td><td><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";        
  echo "</div>";            
?>

                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
}

// Modul berita per kategori
elseif ($_GET['module']=='detailkategori'){
  // Tampilkan nama kategori
  $sq = mysql_query("SELECT nama_kategori from kategori where id_kategori='$_GET[id]'");
  $n = mysql_fetch_array($sq);
  
  $p      = new Paging3;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);
  
  // Tampilkan daftar berita sesuai dengan kategori yang dipilih
 	$sql   = "SELECT * FROM berita WHERE id_kategori='$_GET[id]' 
            ORDER BY id_berita DESC LIMIT $posisi,$batas";		 

	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	// Apabila ditemukan berita dalam kategori
	if ($jumlah > 0){
   while($r=mysql_fetch_array($hasil)){
	   $tgl = tgl_indo($r[tanggal]);
  ?>
   <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$r[judul]?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
                                <?php
    if ($r[gambar]!=''){
			echo "<img src='foto_berita/small_$r[gambar]' width=110 border=0 align=left>";
		}
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,590); // ambil sebanyak 220 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
    echo "$isi ...";
	?>
    <br /><br />
    <a href="berita-<?=$r['id_berita']?>-<?=$r['judul_seo']?>.html" class="art-button">Selengkapnya</a>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
 <?php  
  }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halkategori], $jmlhalaman);

  echo "Hal: $linkHalaman";
  }
  else{ ?>
  
   <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">&nbsp;
                                                  
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              <b><font size="3">Belum ada berita pada kategori ini.</font></b>
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                            
  <?php
   //echo "Belum ada berita pada kategori ini.";
  }
}

// Modul hasil pencarian berita 
elseif ($_GET['module']=='hasilcari'){
	?>
       <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hasil Pencarian
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
<?php
  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM berita WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "judul OR isi_berita LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY id_berita DESC LIMIT 7";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

  if ($ketemu > 0){
    echo "<p>Ditemukan <b>$ketemu</b> berita dengan kata <font style='background-color:#00FFFF'><b>$kata</b></font> : </p>"; 
    while($t=mysql_fetch_array($hasil)){
		echo "<table><tr><td><span class=judul><a href=berita-$t[id_berita]-$t[judul_seo].html><b><font color='blue'>$t[judul]</font></b></a></span><br /><br />";
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($t[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,250); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <a href=berita-$t[id_berita]-$t[judul_seo].html>Selengkapnya</a>
            <br /></td></tr>
            </table><hr color=#CCC noshade=noshade />";
    }                                                          
  }
  else{
    echo "<p></p><p align=center>Tidak ditemukan berita dengan kata <b>$kata</b></p>";
  }

?>                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php 

}


// Modul hasil poling
elseif ($_GET['module']=='hasilpoling'){
	?>
       <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hasil Polling
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
  <?php
     if (isset($_COOKIE["poling"])) {
   echo "Sorry, anda sudah pernah melakukan voting terhadap poling ini.";
 }
 else{
  // membuat cookie dengan nama poling
  // cookie akan secara otomatis terhapus dalam waktu 24 jam
  setcookie("poling", "sudah poling", time() + 3600 * 24);

  $u=mysql_query("UPDATE poling SET rating=rating+1 WHERE id_poling='$_POST[pilihan]'");

  echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";
  
  echo "<table width=100% style='border: 1pt dashed #0000CC;padding: 10px;'>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=$f[folder]/images/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>";
 }
	
    
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
}


// Modul hasil poling
elseif ($_GET['module']=='lihatpoling'){
	?>
           <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hasil Polling
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
  <?php
  echo "<p align=center>Terimakasih atas partisipasi Anda mengikuti poling kami<br /><br />
        Hasil poling saat ini: </p><br />";
  
  echo "<table width=100%>";

  $jml=mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
  $j=mysql_fetch_array($jml);
  
  $jml_vote=$j[jml_vote];
  
  $sql=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
  while ($s=mysql_fetch_array($sql)){
  	
  	$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
  	$gbr_vote   = $prosentase * 3;

    echo "<tr><td width=120>$s[pilihan] ($s[rating]) </td><td> 
          <img src=$f[folder]/images/blue.png width=$gbr_vote height=18 border=0> $prosentase % 
          </td></tr>";  
  }
  echo "</table>
        <p>Jumlah Voting: <b>$jml_vote</b></p>";
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>


<?php

}

// Menu utama di header

// Modul profil
elseif ($_GET['module']=='profilkami'){
	
 /* echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Profil</b></span><br /><br />"; 

	$profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
	$r      = mysql_fetch_array($profil);

  echo "<tr><td class=isi>";
  if ($r[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$r[gambar]'></span>";
	}
  echo "$r[static_content]";  
  echo "</div>
    </div>";   */         
?>

   <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Profil
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
<?php
$profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
	$r      = mysql_fetch_array($profil);

  
  if ($r[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$r[gambar]'></span>";
	}
  echo "$r[static_content]"; 
  ?>

                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>


<?php }

// Modul halaman statis
elseif ($_GET['module']=='halamanstatis'){

$detail=mysql_query("SELECT * FROM halamanstatis 
                      WHERE id_halaman='$_GET[id]'");
	$d   = mysql_fetch_array($detail);
  $tgl_posting   = tgl_indo($d[tgl_posting]);
?>
   <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$d['judul']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                              Diposting tanggal: <?=$tgl_posting  ?><br />              

                               <?php
							   if ($d[gambar]!=''){
		echo "<span class=image><img src='foto_banner/$d[gambar]'></span>";
	}
	echo "$d[isi_halaman] <br />";
	?>
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php	
}

// Modul semua berita
elseif ($_GET['module']=='semuaberita'){
  /*echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Berita</b></span><br /><br />"; */
  $p      = new Paging2;
  $batas  = 12;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysql_query("select count(komentar.id_komentar) as jml, judul, judul_seo, jam, 
                       berita.id_berita, hari, tanggal, gambar, isi_berita    
                       from berita left join komentar 
                       on berita.id_berita=komentar.id_berita
                       and aktif='Y' 
                       group by berita.id_berita DESC LIMIT $posisi,$batas");
  while($r=mysql_fetch_array($sql)){
		$tgl = tgl_indo($r[tanggal]);
		?>
           <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;<?=$r['judul']?>
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->

<?php
		echo "<span class=tanggal> $r[hari], $tgl - $r[jam] WIB</span><br /><br />";
 		
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

      echo "$isi ... <br><br><a href=berita-$r[id_berita]-$r[judul_seo].html>Selengkapnya</a> (<b>$r[jml] komentar</b>)";
	 
?>

                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                            
                            <?php	
  }
  
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM berita"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
}

// Modul semua agenda
/*elseif ($_GET['module']=='semuaagenda'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Agenda</b></span><br /><br />"; 
  $p      = new Paging4;
  $batas  = 6;
  $posisi = $p->cariPosisi($batas); 
  // Tampilkan semua agenda
 	$sql = mysql_query("SELECT * FROM agenda  
                      ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
  while($d=mysql_fetch_array($sql)){
    $tgl_posting = tgl_indo($d[tgl_posting]);
    $tgl_mulai   = tgl_indo($d[tgl_mulai]);
    $tgl_selesai = tgl_indo($d[tgl_selesai]);
    $isi_agenda  = nl2br($d[isi_agenda]);
	
    echo "<table>";
		echo "<tr><td colspan=2><span class=tanggal>$tgl_posting</span></td></tr>";
    echo "<tr><td colspan=2><span class=judul>$d[tema]</span></td></tr>";
	  echo "<tr><td valign=top><b>Topik</b>  </td><td> : $isi_agenda </td></tr>";
 	  echo "<tr><td><b>Tanggal</b> </td><td> : $tgl_mulai s/d $tgl_selesai </td></tr>";
 	  echo "<tr><td><b>Pukul</b> </td><td> : $d[jam] </td></tr>";
 	  echo "<tr><td><b>Tempat</b> </td><td> : $d[tempat] </td></tr>";
 	  echo "<tr><td><b>Pengirim</b> </td><td> : $d[pengirim] 
          </td></tr></table><hr color=#CCC noshade=noshade />";
	 }
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halagenda], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
  echo "</div>
    </div>";            
}*/


// Modul semua download
/*elseif ($_GET['module']=='semuadownload'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Download</b></span><br /><br />"; 
  $p      = new Paging5;
  $batas  = 20;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua download
 	$sql = mysql_query("SELECT * FROM download  
                      ORDER BY id_download DESC LIMIT $posisi,$batas");		 

  echo "<ul>";   
   while($d=mysql_fetch_array($sql)){
      echo "<li><a href='downlot.php?file=$d[nama_file]'>$d[judul]</a> ($d[hits])</li>";
	 }
  echo "</ul><hr color=#CCC noshade=noshade />";
	
  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM download"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
  echo "</div>
    </div>";            
}
*/

// Modul semua album
/*elseif ($_GET['module']=='semuaalbum'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <b>Album</b></span><br />"; 
  // Tentukan kolom
  $col = 3;

  $a = mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
                  COUNT(gallery.id_gallery) as jumlah 
                  FROM album LEFT JOIN gallery 
                  ON album.id_album=gallery.id_album 
                  WHERE album.aktif='Y'  
                  GROUP BY jdl_album");
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($a)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
  }
  $cnt++;


 echo "<td align=center valign=top><br />
    <a href=album-$w[id_album]-$w[album_seo].html>
    <img class='img2' src='img_album/kecil_$w[gbr_album]' border=0 width=120 height=90><br />
    $w[jdl_album]</a><br />($w[jumlah] Foto)<br /></td>";
}
echo "</tr></table>";
  echo "</div>
    </div>";            
}
*/

// Modul galeri foto berdasarkan album
/*elseif ($_GET['module']=='detailalbum'){
  echo "<div id='content'>          
          <div id='content-detail'>";
  echo "<span class=judul_head>&#187; <a href=semua-album.html><b>Album</b></a> &#187; <b>Galeri Foto</b></span><br />"; 
  $p      = new Paging6;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Tentukan kolom
  $col = 5;

  $g = mysql_query("SELECT * FROM gallery WHERE id_album='$_GET[id]' ORDER BY id_gallery DESC LIMIT $posisi,$batas");
  $ada = mysql_num_rows($g);
  
  if ($ada > 0) {
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($g)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
    }
    $cnt++;

   echo "<td align=center valign=top><br />
         <a href='img_galeri/$w[gbr_gallery]' title='$w[keterangan]' class='lightbox' rel='group1'>
         <img src='img_galeri/kecil_$w[gbr_gallery]' alt='$w[keterangan]' /></a><br />
         <b>$w[jdl_gallery]</b></a></td>";
  }
  echo "</tr></table><br />";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery WHERE id_album='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halgaleri], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
  }else{
    echo "<p>Belum ada foto.</p>";
  }
  echo "</div>
    </div>";            
}
*/

// Modul hubungi kami
elseif ($_GET['module']=='hubungikami'){
	?>
       <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hubungi Kami
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
                                <?php
  
  echo "<b>Hubungi kami secara online dengan mengisi form dibawah ini:</b><br><br>
        <table width=100%>
        <form action=hubungi-aksi.html method=POST>
        <tr><td>Nama</td><td> : <input type=text name=nama size=40></td></tr>
        <tr><td>Email</td><td> : <input type=text name=email size=40></td></tr>
        <tr><td>Subjek</td><td> : <input type=text name=subjek size=55></td></tr>
        <tr><td valign=top>Pesan</td><td> <textarea name=pesan  style='width: 315px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><img src='captcha.php'></td></tr>
        <tr><td>&nbsp;</td><td>(Masukkan 6 kode diatas)<br /><input type=text name=kode size=6 maxlength=6><br /></td></tr>
        </td><td colspan=2><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
}


// Modul hubungi aksi
elseif ($_GET['module']=='hubungiaksi'){
	?>
       <div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">
                                                  &nbsp;Hubungi Kami
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
                                <?php
$nama=trim($_POST[nama]);
$email=trim($_POST[email]);
$subjek=trim($_POST[subjek]);
$pesan=trim($_POST[pesan]);

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($email)){
  echo "Anda belum mengisikan EMAIL<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($subjek)){
  echo "Anda belum mengisikan SUBJEK<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($pesan)){
  echo "Anda belum mengisikan PESAN<br /><br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
	if(!empty($_POST['kode'])){
		if($_POST['kode']==$_SESSION['captcha_session']){

  mysql_query("INSERT INTO hubungi(nama,
                                   email,
                                   subjek,
                                   pesan,
                                   tanggal) 
                        VALUES('$_POST[nama]',
                               '$_POST[email]',
                               '$_POST[subjek]',
                               '$_POST[pesan]',
                               '$tgl_sekarang')");
  echo "<span class=posting>&#187; <b>Hubungi Kami</b></span><br /><br />"; 
  echo "<p align=center><b>Terimakasih telah menghubungi kami. <br /> Kami akan segera meresponnya.</b></p>";
		}else{
			echo "Kode yang Anda masukkan tidak cocok<br />
			      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
		}
	}else{
		echo "Anda belum memasukkan kode<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b></a>";
	}
}
    
	?>
                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>

<?php
} else {

?>      
<div class="art-post">
                                <div class="art-post-tl"></div>
                                <div class="art-post-tr"></div>
                                <div class="art-post-bl"></div>
                                <div class="art-post-br"></div>
                                <div class="art-post-tc"></div>
                                <div class="art-post-bc"></div>
                                <div class="art-post-cl"></div>
                                <div class="art-post-cr"></div>
                                <div class="art-post-cc"></div>
                                <div class="art-post-body">
                            <div class="art-post-inner art-article">
                                            <div class="art-postmetadataheader">
                                                <h2 class="art-postheader">&nbsp;
                                                  
                                                </h2>
                                            </div>
                                            <div class="art-postcontent">
                                                <!-- article-content -->
                                              
Halaman tidak di temukan                                               
                                                <!-- /article-content -->
                                            </div>
                                            <div class="cleared"></div>
                            </div>
                            
                            
                            
                            		<div class="cleared"></div>
                                    
                                    
                                </div>
                            </div>
                            
                            <?php } ?>
<?php if($_GET['module'] == 'home') { ?>
    <div id="content">
        <div class="title">
            <h2>Berita Terbaru</h2>
        </div>
        <?php
        // Berita Sebelumnya (tampilkan 5 berita terbaru) 
        $sebelum = mysql_query("SELECT COUNT(komentar.id_komentar) AS jml, judul, judul_seo, jam, 
                                berita.id_berita, hari, tanggal, gambar, isi_berita    
                                FROM berita LEFT JOIN komentar 
                                ON berita.id_berita = komentar.id_berita
                                AND aktif = 'Y' 
                                GROUP BY berita.id_berita DESC LIMIT 0,5");		 
        while($t = mysql_fetch_array($sebelum)) {
        ?>
            <div id="post">
                <?php
                // Apabila ada gambar dalam berita, tampilkan
                if ($t['gambar']!='') {
                ?>
                    <a class="thumb" href="berita-<?php echo $t[id_berita] ?>-<?php echo $t[judul_seo] ?>.html">
                    <img src="<?php echo $f[folder] ?>/script/timthumb.php?src=foto_berita/<?php echo $t[gambar] ?>&amp;w=150&amp;h=105">
                    </a>
                <?php } ?>
                <div class="content">
                    <h3>
                    <a class="ease" href="berita-<?php echo $t[id_berita] . '-' .$t[judul_seo] ?>.html"><?php echo $t[judul] ?></a>
                    </h3>
                <?php
                    $tgl = tgl_indo($t['tanggal']);
                    echo '<div class="post-meta">';
                    echo $t[hari] .', ' . $tgl . ' - ' . $t[jam] .' WIB';
                    echo '</div>';
                    // Tampilkan hanya sebagian isi berita
                    $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
                    $isi = substr($isi_berita,0,180); // ambil sebanyak 180 karakter
                    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
                ?>
                    <p><?php echo $isi ?>... <a class="ease" href="berita-<?php echo $t[id_berita] . '-' .$t[judul_seo] ?>.html">Selengkapnya &rarr;</a></p>

					<?php 
					      echo '<span class=comment>'. $t[jml]; 
                          echo '</span>';
						  
						  echo '<span class=comment_text>'.' Komentar'; 
                          echo '</span>';
					?>

                </div><!-- END #post .content -->
            </div><!-- END #post -->
        <?php } ?>
    </div><!-- END #content -->
<?php
// Modul semua berita
} elseif($_GET['module'] == 'semuaberita') {
?>
	<div id="content">
        <div class="title">
        	<h2>Berita</h2>
        </div>
		<?php
		$p = new pageNavi_All;
		$batas = 8;
		$posisi = $p->cariPosisi($batas);
		// Tampilkan semua berita
		$sql = mysql_query("SELECT COUNT(komentar.id_komentar) AS jml, judul, judul_seo, jam, 
							berita.id_berita, hari, tanggal, gambar, isi_berita    
							FROM berita LEFT JOIN komentar 
							ON berita.id_berita = komentar.id_berita
							AND aktif = 'Y' 
							GROUP BY berita.id_berita DESC LIMIT ".$posisi.",".$batas."");
		  while($r = mysql_fetch_array($sql)){
			?>
        <div id="post">
			<?php
            // Apabila ada gambar dalam berita, tampilkan
            if ($r['gambar']!='') {
            ?>
                <a class="thumb" href="berita-<?php echo $r[id_berita] ?>-<?php echo $r[judul_seo] ?>.html">
                <img src="<?php echo $f[folder] ?>/script/timthumb.php?src=foto_berita/<?php echo $r[gambar] ?>&amp;w=150&amp;h=105">
                </a>
            <?php } ?>
            <div class="content">
                <h3>
                <a class="ease" href="berita-<?php echo $r[id_berita] . '-' .$r[judul_seo] ?>.html"><?php echo $r[judul] ?></a>
                </h3>
            <?php
				$tgl = tgl_indo($r[tanggal]);
                echo '<div class="post-meta">';
				echo $r[hari] .', ' . $tgl . ' - ' . $r[jam] .' WIB | ' . $r[jml] .' Komentar';
				echo '</div>';
      // Tampilkan hanya sebagian isi berita
      $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,180); // ambil sebanyak 180 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat

            ?>
                <p><?php echo $isi ?>... <a class="ease" href="berita-<?php echo $r[id_berita] . '-' .$r[judul_seo] ?>.html">Selengkapnya &rarr;</a></p>
            </div><!-- END #post .content -->
        </div><!-- END #post -->
<?php }

	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita"));
	$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET['halberita'], $jmlhalaman);
?>
	<!-- Page Navigation -->
	<div class="light">
        <div class="pageNavi">
			<?php echo $linkHalaman ?>
		</div>
	</div>      
	<!-- END Page Navigation -->
</div><!-- END #content -->
<?php
// Modul berita per kategori
} elseif($_GET['module'] == 'detailkategori') {
	// Tampilkan nama kategori
  	$sq = mysql_query("SELECT nama_kategori FROM kategori WHERE id_kategori='".$val->validasi($_GET['id'],'sql')."'");
  	$n = mysql_fetch_array($sq);
?>
<div id="content">
	<div class="title">
    	<h2>Kategori &raquo; <?php echo $n[nama_kategori] ?></h2>
    </div>
	<?php  
	$p = new pageNavi_Cat;
	$batas = 8;
	$posisi = $p->cariPosisi($batas);
  
	// Tampilkan daftar berita sesuai dengan kategori yang dipilih
 	$sql = "SELECT * FROM berita WHERE id_kategori = '".$val->validasi($_GET['id'],'sql')."' ORDER BY id_berita DESC LIMIT ".$posisi.",".$batas."";		 

	$hasil = mysql_query($sql);
	$jumlah = mysql_num_rows($hasil);
	
	// Apabila ditemukan berita dalam kategori
	if($jumlah > 0) {
		while($r = mysql_fetch_array($hasil)) {
	?>
        <div id="post">
            <?php
            // Apabila ada gambar dalam berita, tampilkan
            if ($r['gambar']!='') {
            ?>
                <a class="thumb" href="berita-<?php echo $r[id_berita].'-'.$r[judul_seo] ?>.html">
                <img src="<?php echo $f[folder] ?>/script/timthumb.php?src=foto_berita/<?php echo $r[gambar] ?>&amp;w=150&amp;h=105">
                </a>
            <?php } ?>
            <div class="content">
                <h3>
                <a class="ease" href="berita-<?php echo $r[id_berita] . '-' .$r[judul_seo] ?>.html"><?php echo $r[judul] ?></a>
                </h3>
            <?php
				$tgl = tgl_indo($r[tanggal]);
                echo '<div class="post-meta">';
				echo $r[hari] .', ' . $tgl . ' - ' . $r[jam] .' WIB';
				echo '</div>';
    // Tampilkan hanya sebagian isi berita
    $isi_berita = htmlentities(strip_tags($r[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
    $isi = substr($isi_berita,0,180); // ambil sebanyak 180 karakter
    $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
            ?>
                <p><?php echo $isi ?>... <a class="ease" href="berita-<?php echo $r[id_berita] . '-' .$r[judul_seo] ?>.html">Selengkapnya &rarr;</a></p>
            </div><!-- END #post .content -->
        </div><!-- END #post -->
<?php }
	
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM berita WHERE id_kategori = '".$_GET['id']."'"));
		$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET['halkategori'], $jmlhalaman);
?>
        <!-- Page Navigation -->
        <div class="light">
            <div class="pageNavi">
                <?php echo $linkHalaman ?>
            </div>
        </div>      
        <!-- END Page Navigation -->
		<?php
		} else {
		echo '<h2>Belum ada berita pada kategori ini.</h2>';
		}
		?>
</div>
<?php
} elseif($_GET['module'] == 'detailberita') {
?>
	<div id="content">          
		<?php
        $detail = mysql_query("SELECT * FROM berita,users,kategori    
                               WHERE users.username = berita.username 
                               AND kategori.id_kategori = berita.id_kategori 
                               AND id_berita = '".abs((int)$_GET[id])."'");
        $d = mysql_fetch_array($detail);
        $tgl = tgl_indo($d[tanggal]);
        $baca = $d[dibaca] + 1;
    ?>
        <div class="title">
            <h2><?php echo $d[judul] ?></h2>
        </div>
    
        <div id="post">
        <?php
            echo '<div class="post-meta">';
            echo $d[hari] .', ' . $tgl . ' - ' . $d[jam] .' WIB <br/>';
            echo 'Diposting oleh : <b>'.$d[nama_lengkap].'</b> | ';
            echo 'Kategori: <a class="ease" href="kategori-'.$d[id_kategori].'-'.$d[kategori_seo].'.html"><b>'.$d[nama_kategori].'</b></a> - ';
            echo 'Dibaca: <b>'.$baca.'</b> kali<br/>';
            echo '</div>';

            // Share to Gmail, Email, Facebook, Twitter, etc
            echo "<div class='section'>    
                  <div class='addthis_toolbox addthis_default_style'>
                  <a class='addthis_button_preferred_1'></a>
                  <a class='addthis_button_preferred_2'></a>
                  <a class='addthis_button_preferred_3'></a>
                  <a class='addthis_button_preferred_4'></a>
                  <a class='addthis_button_compact'></a>
                  <a class='addthis_counter addthis_bubble_style'></a>
                  </div>
                  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>
                  </div>";
                  
            // Apabila ada gambar dalam berita, tampilkan   
            if($d[gambar] != '') {
        ?>
            <img style="float:left; padding: 7px 10px 7px 0;" src="<?php echo $f[folder] ?>/script/timthumb.php?src=foto_berita/<?php echo $d[gambar] ?>&amp;w=200&amp;h=150">
            <?php
            }
            //$isi_berita=nl2br($d[isi_berita]); // membuat paragraf pada isi berita
            echo $d[isi_berita];

            //dapatkan nama domain
            $domain=mysql_fetch_array(mysql_query("SELECT alamat_website FROM identitas"));
            
            //tombol like fb
            $base_url = "http://cms.bukulokomedia.com/";
            echo "<div class='fb-like' data-href='$domain[alamat_website]/berita-$d[id_berita]-$d[judul_seo].html' data-send='true' data-show-faces='true' data-width='600'></div>";

           // echo "<iframe src=\"https://www.facebook.com/plugins/like.php?href=".$base_url."berita-$d[id_berita]-$d[judul_seo].html&amp;show_faces=true\" 
             //     scrolling=\"no\" frameborder=\"0\" style=\"border:none; width:450px; height:80px\"></iframe>"; 
            ?>
        
        </div>
  
		<?php // Tampilkan judul berita yang terkait (maks: 5) ?>    
        <?php	 		  
        // pisahkan kata per kalimat lalu hitung jumlah kata
        $pisah_kata  = explode(",",$d[tag]);
        $jml_katakan = (integer)count($pisah_kata);
    
        $jml_kata = $jml_katakan - 1; 
        $ambil_id = substr($val->validasi($_GET['id'],'sql'),0,4);
    
        // Looping query sebanyak jml_kata
        $cari = "SELECT * FROM berita WHERE (id_berita<'$ambil_id') and (id_berita!='$ambil_id') and (" ;
        for ($i = 0; $i <= $jml_kata; $i++){
            $cari .= "tag LIKE '%$pisah_kata[$i]%'";
            if ($i < $jml_kata ){
                $cari .= " OR ";
            }
        }
        $cari .= ") ORDER BY id_berita DESC LIMIT 5";
     
        $hasil  = mysql_query($cari);
        echo '<div id="related-post">';
            echo '<h3>Berita Terkait</h3>';
            while($h = mysql_fetch_array($hasil)){
                    echo '<a class="ease" href="berita-'.$h[id_berita].'-'.$h[judul_seo].'.html">';
					echo '<div class="related">';
                    echo '<img style="float:left; padding: 5px 10px 5px 0;" src="'.$f[folder].'/script/timthumb.php?src=foto_berita/'.$h[gambar].'&amp;w=100&amp;h=80">';
                    echo '<h3>'.$h[judul].'</h3>';
					echo '</div>';
					echo '</a>';
            }
        echo "</div>";
		echo '<div class="clearboth"></div>';
	echo '</div>';
	
	// Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
	mysql_query("UPDATE berita SET dibaca = '".$baca."' WHERE id_berita = '".$val->validasi($_GET['id'],'sql')."'"); 

// Modul detail agenda
} elseif($_GET['module'] == 'detailagenda') {

	$detail = mysql_query("SELECT * FROM agenda 
						   WHERE id_agenda = '".$val->validasi($_GET['id'],'sql')."'");
	$d = mysql_fetch_array($detail);
	$tgl_posting = tgl_indo($d[tgl_posting]);
	$tgl_mulai = tgl_indo($d[tgl_mulai]);
	$tgl_selesai = tgl_indo($d[tgl_selesai]);
	$isi_agenda=nl2br($d[isi_agenda]);
?>
	<div id="content">               
        <div class="title">
            <h2><?php echo $d[tema] ?></h2>
        </div>
		Diposting tanggal: <b><?php echo $tgl_posting ?></b>
        <table>
            <tr>
                <td width="160px"><b>Topik</b></td><td width="5px">: </td><td><?php echo $isi_agenda ?></td>
            </tr>
            <tr>
                <td width="160px"><b>Tanggal</b></td> <td width="5px">: </td><td><?php echo $tgl_mulai ?> s/d <?php echo $tgl_selesai ?></td>
            </tr>
            <tr>
                <td width="160px"><b>Tempat</b></td> <td width="5px">: </td><td><?php echo $d[tempat] ?></td>
            </tr>
            <tr>
                <td width="160px"><b>Pukul</b></td> <td width="5px">: </td><td><?php echo $d[jam] ?></td>
            </tr>
            <tr>
                <td width="160px"><b>Pengirim (Contact Person)</b></td width="5px"> <td>: </td><td><?php echo $d[pengirim] ?></td>
            </tr>
            </tr>
        </table>    
    </div>
<?php
// Modul hasil pencarian berita 
} elseif($_GET['module'] == 'hasilcari') {

  // menghilangkan spasi di kiri dan kanannya
  $kata = trim($_POST['kata']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);
?>
	<div id="content">          
        <div class="title">
			<h2>Hasil Pencarian untuk "<?php echo $kata ?>"</h2>
        </div>
		<?php
		// pisahkan kata per kalimat lalu hitung jumlah kata
		$pisah_kata = explode(" ",$kata);
		$jml_katakan = (integer)count($pisah_kata);
		$jml_kata = $jml_katakan-1;

		$cari = "SELECT * FROM berita WHERE ";
		
		for($i = 0; $i <= $jml_kata; $i++) {
			$cari .= "judul OR isi_berita LIKE '%$pisah_kata[$i]%'";
			if($i < $jml_kata ) {
				$cari .= " OR ";
			}
		}
		$cari .= " ORDER BY id_berita DESC LIMIT 10";
		$hasil  = mysql_query($cari);
		$ketemu = mysql_num_rows($hasil);

		if($ketemu > 0) {
    		echo '<div class="post-meta">Ditemukan <b>'.$ketemu.'</b> berita teratas dengan kata <font style="background-color:#feea36"><b>'.$kata.'</b></font> : </div>'; 
			while($t = mysql_fetch_array($hasil)) {
			?>
                <div id="post">
                    <?php
                    // Apabila ada gambar dalam berita, tampilkan
                    if ($t['gambar']!='') {
                    ?>
                        <a class="thumb" href="berita-<?php echo $t[id_berita] . '-' .$t[judul_seo] ?>.html">
                        <img src="<?php echo $f[folder] ?>/script/timthumb.php?src=foto_berita/<?php echo $t[gambar] ?>&amp;w=150&amp;h=105">
                        </a>
                    <?php } ?>
                    <div class="content">
                        <h3>
                        <a class="ease" href="berita-<?php echo $t[id_berita] . '-' .$t[judul_seo] ?>.html"><?php echo $t[judul] ?></a>
                        </h3>
                    <?php
                        $tgl = tgl_indo($t['tanggal']);
                        echo '<div class="post-meta">';
                        echo $t[hari] .', ' . $tgl . ' - ' . $t[jam] .' WIB';
                        echo '</div>';
                        // Tampilkan hanya sebagian isi berita
                        $isi_berita = htmlentities(strip_tags($t['isi_berita'])); // membuat paragraf pada isi berita dan mengabaikan tag html
                        $isi = substr($isi_berita,0,180); // ambil sebanyak 180 karakter
                        $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
                    ?>
                        <p><?php echo $isi ?>... <a class="ease" href="berita-<?php echo $t[id_berita] . '-' .$t[judul_seo] ?>.html">Selengkapnya &rarr;</a></p>
                    </div><!-- END #post .content -->
                </div><!-- END #post -->
            	<?php
		}                                                          
		} else {
			echo '<h2>Tidak ditemukan berita dengan kata "'.$kata.'"</h2>';
		}
	echo '</div>';   
	         
// Modul hasil poling
} elseif ($_GET['module'] == 'hasilpoling') {
?>
	<div id="content">          
        <div class="title">
			<h2>Hasil Poling</h2>
        </div>
<?php
	if(isset($_COOKIE["poling"])) {
		echo '<h2>Maaf, anda sudah pernah melakukan voting terhadap poling ini.</h2>';
	} else {
		// membuat cookie dengan nama poling
		// cookie akan secara otomatis terhapus dalam waktu 24 jam
		
		setcookie("poling", "sudah poling", time() + 3600 * 24);

		$u = mysql_query("UPDATE poling SET rating = rating+1 WHERE id_poling= '".$_POST[pilihan]."'");

		echo '<p align="center"><b>Terimakasih atas partisipasi Anda mengikuti poling kami<br />
        Hasil poling saat ini: </b></p>';
  
		echo '<div style="border-top: 1px solid #eee;margin: 15px 0;"></div>';
		$jml = mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
		$j = mysql_fetch_array($jml);
  
		$jml_vote = $j[jml_vote];
  
		$sql = mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
  
		while($s = mysql_fetch_array($sql)) {
			echo '<table width="100%">';			
			$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
			$gbr_vote   = $prosentase * 3;

			echo '<tr><td>'.$s[pilihan].'</td><td style="text-align:right;">'.$s[rating].' Vote</td></tr>';
			echo '</table>';
			echo '<div style="background: #f9f9f9;width: 100%; height: 22px;margin-top:-20px;border:1px solid #ddd;">';
			echo '<div class="poll-bar" style="width: '.$prosentase.'%; height: 22px;"></div>';
			echo '</div>';
		}
		echo '<div align="right" style="border-top: 1px solid #eee;padding-top: 15px;margin-top: 10px;padding-bottom: -10px;">Jumlah Voting: <b>'.$jml_vote.'</b></div>';
	}
	echo '</div>';
// Modul hasil poling
} elseif($_GET['module'] == 'lihatpoling') {
?>
	<div id="content">          
        <div class="title">
			<h2>Hasil Poling</h2>
        </div>
		<?php
		$sql = mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
		$p = mysql_fetch_array($sql);
		echo '<h3><center>'.$p[pilihan].'</center></h3>';
  
		echo '<div style="border-top: 1px solid #eee;margin: 15px 0;"></div>';
		$jml = mysql_query("SELECT SUM(rating) as jml_vote FROM poling WHERE aktif='Y'");
		$j = mysql_fetch_array($jml);
  
		$jml_vote = $j[jml_vote];  

		$sql = mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
		while($s = mysql_fetch_array($sql)) {
			echo '<table width="100%">';			
			$prosentase = sprintf("%2.1f",(($s[rating]/$jml_vote)*100));
			$gbr_vote   = $prosentase * 3;

			echo '<tr><td>'.$s[pilihan].'</td><td style="text-align:right;">'.$s[rating].' Vote</td></tr>';
			echo '</table>';
			echo '<div style="background: #f9f9f9;width: 100%; height: 22px;margin-top:-20px;border:1px solid #ddd;">';
			echo '<div class="poll-bar" style="width: '.$prosentase.'%; height: 22px;"></div>';
			echo '</div>';
		}
		echo '<div align="right" style="border-top: 1px solid #eee;padding-top: 15px;margin-top: 10px;padding-bottom: -10px;">Jumlah Voting: <b>'.$jml_vote.'</b></div>';
	echo '</div>';            

// Menu utama di header
// Modul profil
} elseif($_GET['module'] == 'profilkami') {
?>
	<div id="content">          
        <div class="title">
			<h2>Profil</h2>
        </div>
		<?php
        $profil = mysql_query("SELECT * FROM modul WHERE id_modul='37'");
        $r = mysql_fetch_array($profil);
    
        if($r[gambar]!=''){
            echo '<center><img style="text-align:center;" src="foto_banner/'.$r[gambar].'"></center><br/>';
        }
        echo $r[static_content];  
	echo '</div>';            

// Modul halaman statis
} elseif($_GET['module'] == 'halamanstatis') {
	$detail = mysql_query("SELECT * FROM halamanstatis 
                      WHERE id_halaman='".$val->validasi($_GET['id'],'sql')."'");
	$d = mysql_fetch_array($detail);
	$tgl_posting = tgl_indo($d[tgl_posting]);
?>
	<div id="content">          
        <div class="title">
			<h2><?php echo $d[judul] ?></h2>
        </div>
	<?php
	if($d[gambar]!=''){
        echo '<center><img src="foto_banner/'.$d[gambar].'"></center><br/>';
	}
	echo $d[isi_halaman];
            
	echo '</div>';

// Modul semua agenda
} elseif($_GET['module'] == 'semuaagenda') {
?>
	<div id="content">          
        <div class="title">
			<h2>Agenda</h2>
        </div>
		<?php
		$p = new pageNavi_Agenda;
		$batas = 8;
		$posisi = $p->cariPosisi($batas); 
		// Tampilkan semua agenda
		$sql = mysql_query("SELECT * FROM agenda  
                      		ORDER BY id_agenda DESC LIMIT $posisi,$batas");		 
		while($d = mysql_fetch_array($sql)) {
			$tgl_posting = tgl_indo($d[tgl_posting]);
			$tgl_mulai = tgl_indo($d[tgl_mulai]);
			$tgl_selesai = tgl_indo($d[tgl_selesai]);
			$isi_agenda = nl2br($d[isi_agenda]);
		?>
            <h2>[<?php echo $tgl_posting ?>] - <?php echo $d[tema] ?></h2>
            <table>
                <tr>
                    <td width="120px"></td>
                </tr>
                <tr>
                    <td valign=top><b>Topik</b></td><td> : <td> <?php echo $isi_agenda ?></td>
                </tr>
                <tr>
                    <td><b>Tanggal</b></td><td>: </td><td> <?php echo $tgl_mulai ?> s/d <?php echo $tgl_selesai ?></td>
                </tr>
                <tr>
                    <td><b>Pukul</b></td><td>: </td><td> <?php echo $d[jam] ?> </td>
                </tr>
                <tr>
                    <td><b>Tempat</b></td><td>: </td><td> <?php echo $d[tempat] ?> </td>
                </tr>
                <tr>
                    <td><b>Pengirim</b></td><td>: </td><td> <?php echo $d[pengirim] ?> </td>
                </tr>
            </table>
            <div style="border-bottom:1px solid #eee;margin: 5px 0 10px;"></div>
		<?php
        }
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET[halagenda], $jmlhalaman);
        ?>
	<!-- Page Navigation -->
	<div class="light">
        <div class="pageNavi">
			<?php echo $linkHalaman ?>
		</div>
	</div>      
	<!-- END Page Navigation -->
</div><!-- END #content -->
<?php
// Modul semua download
} elseif($_GET['module'] == 'semuadownload') {
?>
	<div id="content">          
        <div class="title">
			<h2>Download</h2>
        </div>
		<?php
		$p = new pageNavi_Download;
		$batas = 20;
		$posisi = $p->cariPosisi($batas);
		// Tampilkan semua download
		$sql = mysql_query("SELECT * FROM download  
                      		ORDER BY id_download DESC LIMIT $posisi,$batas");		 

		echo '<ul>';   
		while($d = mysql_fetch_array($sql)) {
			echo '<li><a class="ease" href="downlot.php?file='.$d[nama_file].'">'.$d[judul].'</a> ('.$d[hits].')</li>';
		}
		echo '</ul>';
	
		$jmldata	= mysql_num_rows(mysql_query("SELECT * FROM download"));
		$jmlhalaman	= $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[haldownload], $jmlhalaman);
		?>
        <div style="border-bottom:1px solid #eee;margin: 5px 0 10px;"></div>
        <!-- Page Navigation -->
        <div class="light">
            <div class="pageNavi">
                <?php echo $linkHalaman ?>
            </div>
        </div>      
        <!-- END Page Navigation -->
    </div><!-- END #content -->
<?php
// Modul semua album
} elseif($_GET['module'] == 'semuaalbum') {
?>
        <div id="gallery">          
            <div class="title">
                <h2>Album</h2>
            </div>
		<?php
		// Tentukan kolom
		$col = 4;

		$a = mysql_query("SELECT jdl_album, album.id_album, gbr_album, album_seo,  
						  COUNT(gallery.id_gallery) as jumlah 
						  FROM album LEFT JOIN gallery 
						  ON album.id_album = gallery.id_album 
						  WHERE album.aktif = 'Y'  
						  GROUP BY jdl_album");
		echo '<table><tr>';
		$cnt = 0;
		while($w = mysql_fetch_array($a)) {
			if($cnt >= $col) {
				echo '</tr><tr>';
				$cnt = 0;
			}
			$cnt++;
	
			echo '<td style="padding:10px 15px; text-align:center;" valign="top">';
			echo '<a href="album-'.$w[id_album].'-'.$w[album_seo].'.html">';
			echo '<img src="img_album/kecil_'.$w[gbr_album].'" border="0" width="120" height="90"><br/>';
			echo '<a class="ease" href="album-'.$w[id_album].'-'.$w[album_seo].'.html">';
			echo $w[jdl_album].'</a><br />('.$w[jumlah].' Foto)<br /></td>';
		}
		echo '</tr></table>';
	echo '</div>';            
// Modul galeri foto berdasarkan album
} elseif($_GET['module'] == 'detailalbum') {

		$t = mysql_fetch_assoc(mysql_query("SELECT jdl_album FROM album WHERE id_album='".$val->validasi($_GET['id'],'sql')."'"));

		$p = new pageNavi_Album;
		$batas = 9;
		$posisi = $p->cariPosisi($batas);

		// Tentukan kolom
		$col = 3;

		$g = mysql_query("SELECT * FROM gallery WHERE id_album='".$val->validasi($_GET['id'],'sql')."' ORDER BY id_gallery DESC LIMIT ".$posisi.",".$batas."");
		$ada = mysql_num_rows($g); 
?>
        <div id="gallery">          
            <div class="title">
                <h2><a href="semua-album.html">Album</a> &#187; <?php echo $t[jdl_album] ?></h2>
            </div>
		<?php
		if($ada > 0) {
			echo '<ul class="gallery clearfix">';
			$cnt = 0;
			while($w = mysql_fetch_array($g)) {
				echo '<li>';
				echo '<a href="img_galeri/'.$w[gbr_gallery].'" title="'.$w[keterangan].'" rel="prettyPhoto[gallery]">';
				echo '<img src="'.$f[folder].'/script/timthumb.php?src=img_galeri/'.$w[gbr_gallery].'&amp;w=160&amp;h=120" alt="'.$w[jdl_gallery].'" /></a>';
				echo '</li>';
			}
			echo '</ul>';

      $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM gallery WHERE id_album='".$val->validasi($_GET['id'],'sql')."'"));	
			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halgaleri], $jmlhalaman);
		?>
        <div class="clearboth"></div>
        <div style="border-bottom:1px solid #eee;margin: 5px 0 10px;"></div>
        <!-- Page Navigation -->
        <div class="light">
            <div class="pageNavi">
                <?php echo $linkHalaman ?>
            </div>
        </div>      
        <!-- END Page Navigation -->
		<?php
	} else {
		echo '<h2>Belum ada foto.</h2>';
	}
	echo '</div>';
       
// Modul hubungi kami
} elseif($_GET['module'] == 'hubungikami') {
?>
	<div id="content">          
        <div class="title">
			<h2>Hubungi Kami</h2>
        </div>
		<p align="center">Hubungi kami secara online dengan mengisi form dibawah ini:</p>
        <div style="border-bottom:1px solid #eee;margin: 5px 0 10px;"></div>
		<form action="hubungi-aksi.html" method="POST" id="contactForm">
		<label for="nama">Nama</label><br/>
		<input type="text" name="nama" size="40"><br/>
		<label for="email">Email</label><br/>
		<input type="text" name="email" size="40"><br/>
		<label for="subjek">Subjek</label><br/>
		<input type="text" name="subjek" size="55"><br/>
		<label for="pesan">Pesan</label><br/>
		<textarea name="pesan" style="width: 315px; height: 100px;"></textarea><br/>
		<img src="captcha.php"><br/>
		<label for="captcha">(Masukkan 6 kode diatas)</label><br />
		<input type="text" name="kode" size="6" maxlength="6"><br />
		<input type="submit" name="submit" value="Kirim">
		</form><br />
		</div>          
<?php
// Modul hubungi aksi
} elseif ($_GET['module']=='hubungiaksi'){
?>
	<div id="content">          
        <div class="title">
			<h2>Hubungi Kami</h2>
        </div>
		<?php

		$nama = trim($_POST['nama']);
		$email = trim($_POST['email']);
		$subjek = trim($_POST['subjek']);
		$pesan = trim($_POST['pesan']);

		if(empty($nama)) {
			echo 'Anda belum mengisikan NAMA<br/>';
			$err = TRUE;
		}
		if(empty($email)) {
			echo 'Anda belum mengisikan EMAIL<br/>';
			$err = TRUE;
		}
		if(empty($subjek)) {
			echo 'Anda belum mengisikan SUBJEK<br/>';
			$err = TRUE;
		}
		if(empty($pesan)) {
			echo 'Anda belum mengisikan PESAN<br/>';
			$err = TRUE;
		}
		if($err) {
			echo'<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b><br/>';
		} elseif(!$err) {
			if(!empty($_POST['kode'])) {
				if($_POST['kode'] == $_SESSION['captcha_session']) {

					mysql_query("INSERT INTO hubungi(nama, email, subjek, pesan, tanggal) 
								 VALUES('$_POST[nama]', '$_POST[email]', '$_POST[subjek]', '$_POST[pesan]', '$tgl_sekarang')");
					echo '<p align="center"><b>Terimakasih telah menghubungi kami. <br/>Kami akan segera meresponnya.</b></p>';
				} else {
					echo 'Kode yang Anda masukkan tidak cocok<br/>';
					echo '<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b></a>';
				}
			} else {
				echo 'Anda belum memasukkan kode<br/>';
				echo '<a href="javascript:history.go(-1)"><b>Ulangi Lagi</b></a>';
			}
		}
		echo "</div>";            
}

?>      

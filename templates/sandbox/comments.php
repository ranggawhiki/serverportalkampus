<div id="comments">
<?php
	// Hitung jumlah komentar
	$komentar = mysql_query("SELECT COUNT(komentar.id_komentar) AS jml FROM komentar WHERE id_berita = '".$val->validasi($_GET['id'],'sql')."' AND aktif = 'Y'");
	$k = mysql_fetch_array($komentar); 
	if($k[jml] == 0) $jmlk = "Belum Ada";
	else $jmlk = $k[jml];
?>
        <div class="title">
            <h2><?php echo $jmlk ?>  Komentar</h2>
        </div>
<?php
	// Komentar berita
	$sql = mysql_query("SELECT * FROM komentar WHERE id_berita = '".$val->validasi($_GET['id'],'sql')."' AND aktif = 'Y' ORDER BY tgl ASC");
	$jml = mysql_num_rows($sql);
	// Apabila sudah ada komentar, tampilkan 
	if ($jml > 0){
		while ($s = mysql_fetch_array($sql)){
			echo '<div class="comment-content">';
			$tanggal = tgl_indo($s[tgl]);
			// Apabila ada link website diisi, tampilkan dalam bentuk link   
			if ($s[url]!=''){
				echo '<a name="'.$s[id_komentar].'" id="'.$s[id_komentar].'"><a class="ease" href="http://'.$s[url].'" target="_blank">'.$s[nama_komentar].'</a></a>';  
			} else {
				echo ''.$s[nama_komentar].'';  
			}
	
			echo ' | <span class="comment-meta">'.$tanggal.' - '.$s[jam_komentar].' WIB</span><br />';
			$isian = nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
			$isikan = sensor($isian); 
	 
			echo autolink($isikan);
			
			echo '</div>';
		}
	}
?>
</div>
<div id="comments">
	<div class="title">
		<h2>Isi Komentar</h2>
	</div>
		<form id="commentForm" name="form" action="simpankomentar.php" method="POST" onSubmit="return validasi(this)">
		<input type="hidden" name="id" value="<?php echo $val->validasi($_GET['id'],'sql') ?>">
		<input type="hidden" name="judul_seo" value="<?php echo $d[judul_seo] ?>">
        <label for="nama">Nama</label><br />
		<input type="text" name="nama_komentar" size="40" maxlength="50" placeholder="Nama Anda"><br />
        <label for="website">Website</label><br />
		<input type="text" name="url" size="40" maxlength="50" placeholder="www.yoursite.com"><br />
        <label for="komentar">Komentar</label><br />
        <textarea name="isi_komentar" style="color: #666; font-size: 12px; width: 300px; height: 100px;" placeholder="Komentar Anda"></textarea><br />
		<img src="captcha.php"><br />
        <label for="captcha">(Masukkan 6 kode diatas)</label><br />
        <input type="text" name="kode" size="6" maxlength="6"><br />
        <input type="submit" name="submit" value="Kirim">
        </form>
</div>          


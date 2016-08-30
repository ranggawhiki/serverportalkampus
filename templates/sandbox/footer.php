<?php
/* Widget List

$tipe = cari		| Form Pencarian
$tipe = populer		| Postingan Terpopuler
$tipe = kategori	| List Katergori
$tipe = poling		| Polling / Voting
$tipe = download	| List Download
$tipe = agenda		| List Agenda
$tipe = komentar	| Komentar Terbaru
$tipe = banner		| Banner List

Edit Widget => FolderTemplate/widgets.php
*/
?>
<div id="footer">
	<div class="inner">
	<?php 
	/* 
	Menambahkan widget di sidebar
	  
	echo add_widget('$tipe','sidebar');
	
	MAX WIDGET = 3
	*/
	echo add_widget('populer','footer');
	echo add_widget('komentar','footer');
	echo add_widget('agenda','footer');
	?>   
		<div class="clearboth"></div>
    </div>
</div>
<div id="footer-copyright">
	<div class="inner">
        Copyright &copy; 2011 <a href="http://nugi.me/">Ahmad Nugraha</a> - Powered by <a href="http://bukulokomedia.com">CMS Lokomedia</a>
    </div>
</div>

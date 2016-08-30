<?php error_reporting(0) ?>
<?php include "".$f[folder]."/header.php" ?>
<?php include "".$f[folder]."/widgets.php" ?>
<?php include "".$f[folder]."/script/pageNavi.php" ?>
    <div id="page">
    	<div class="inner">
			<?php include "".$f[folder]."/content.php" ?>
 			<?php include "".$f[folder]."/sidebar.php" ?>
 			<?php 
			if($_GET['module'] == 'detailberita') {
				include "".$f[folder]."/comments.php";
			}
			?>
            
			<?php
			if($_GET['module']=='home') {
			?>
				<div id="gallery">
					<div class="title"><h2>Galeri</h2></div>
					<?php
					$g = mysql_query("SELECT * FROM gallery ORDER BY id_gallery DESC LIMIT 3");
              
					echo '<ul class="gallery clearfix">';              
					$cnt = 0;
					while ($w = mysql_fetch_array($g)) {
						$cnt++;
						echo '<li>
							  <p>
							      <a href="img_galeri/'.$w[gbr_gallery].'" title="'.$w[keterangan].'" rel="prettyPhoto[gallery]">
							      <img src="'.$f[folder].'/script/timthumb.php?src=img_galeri/'.$w[gbr_gallery].'&amp;w=160&amp;h=120" alt="'.$w[jdl_gallery].'" />
							      </a>
							  </p>
							  </li>';

					}
              			echo '</ul>';
					echo '<div class="clearboth"></div>';
				echo '</div>';
			}
?>
			<div class="clearboth"></div>
		</div>
    </div>
 	<?php include "".$f[folder]."/footer.php" ?>
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$("area[rel^='prettyPhoto']").prettyPhoto();
			
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'pp_default',slideshow:10000, autoplay_slideshow: true});
			$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
	
			$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
				custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
				changepicturecallback: function(){ initialize(); }
			});

			$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
				custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
				changepicturecallback: function(){ _bsap.exec(); }
			});
		});
	</script>
</body>
</html>

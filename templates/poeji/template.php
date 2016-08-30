<?php 
  error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title><?php include "dina_titel.php"; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow">
    <meta name="description" content="<?php include "dina_meta1.php"; ?>">
    <meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
    <meta http-equiv="Copyright" content="daftarjualbeli.com">
    <meta name="author" content="Poeji">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="language" content="Indonesia">
    <meta name="revisit-after" content="7">
    <meta name="webcrawlers" content="all">
    <meta name="rating" content="general">
    <meta name="spiders" content="all">
    
    <link rel="shortcut icon" href="<?=$f['folder']?>/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />

    <link rel="stylesheet" href="<?=$f['folder']?>/style.css" type="text/css" media="screen" />
    <?php /*?><link rel="stylesheet" type="text/css" href="<?=$f['folder']?>/layout.css" /><?php */?>
    <link rel="stylesheet" type="text/css" href="<?=$f['folder']?>/style_slider.css" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->
    
   <?php /*?> <script language="javascript" type="text/javascript" src="<?=$f['folder']?>/js/jquery.js"></script><?php */?>
	<script src="<?php echo "$f[folder]/js/jquery-1.4.js" ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?=$f['folder']?>/script.js"></script>
    <script src="<?php echo "$f[folder]/js/newsticker.js" ?>" type="text/javascript"></script>

<script language="JavaScript" type="text/javascript">
  function addSmiley(textToAdd){
  document.formshout.pesan.value += textToAdd;
  document.formshout.pesan.focus();
}
</script>
<script src="<?php echo "$f[folder]/js/jquery.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/skrip.js" ?>" type="text/javascript"></script>

<script type="text/javascript"> 
 $(document).ready( function()
 {	
		$('#lofslidecontent45').lofJSidernews( { interval:4000,
											 	easing:'easeInOutQuad',
												duration:1200,
												auto:true } );						
	});
</script>	
  <style>	
	ul.lof-main-wapper li{
		position:relative;	
	}
  div#copyright { display: none; }
  
  .line {
    background: url("<?=$f['folder']?>/images//line.gif") no-repeat scroll 22px 100% transparent;
    float: left;
    line-height: 16px;
    margin: -1px 0 0;
    width: 200px;
}
</style>
</head>
<body>
    <div id="art-page-background-gradient"></div>
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-header">
                    <div class="art-header-jpeg"></div>
                    <script type="text/javascript" src="<?=$f['folder']?>/swfobject.js"></script>
                    <div id="art-flash-area">
                    <div id="art-flash-container">
                    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="980" height="245" id="art-flash-object">
                        <param name="movie" value="images/flash.swf" />
                        <param name="quality" value="high" />
                    	<param name="scale" value="exactfit" />
                    	<param name="wmode" value="transparent" />
                    	<param name="flashvars" value="color1=0xFFFFFF&amp;alpha1=.70&amp;framerate1=24" />
                        <param name="swfliveconnect" value="true" />
                        <!--[if !IE]>-->
                        <object type="application/x-shockwave-flash" data="<?=$f['folder']?>/images/flash.swf" width="980" height="245">
                            <param name="quality" value="high" />
                    	    <param name="scale" value="exactfit" />
                    	    <param name="wmode" value="transparent" />
                    	    <param name="flashvars" value="color1=0xFFFFFF&amp;alpha1=.70&amp;framerate1=24" />
                            <param name="swfliveconnect" value="true" />
                        <!--<![endif]-->
                          	<div class="art-flash-alt"><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></div>
                        <!--[if !IE]>-->
                        </object>
                        <!--<![endif]-->
                    </object>
                    </div>
                    </div>
                    <script type="text/javascript">swfobject.switchOffAutoHideShow();swfobject.registerObject("art-flash-object", "9.0.0", "expressInstall.swf");</script>
                    <div class="art-logo">
                        <h1 id="name-text" class="art-logo-name"><a href="#">Cahaya Pilihan</a></h1>
                        <div id="slogan-text" class="art-logo-text">catatan - catatan kecil</div>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                    <?php               
              $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

              while($r=mysql_fetch_array($main)){
				  if($r['nama_menu']=="Beranda") {
				echo "<li><a href='$r[link]' class=\"active\"><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">$r[nama_menu]</span></a>";  
				  } else {
				 echo "<li><a href='$r[link]'><span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">$r[nama_menu]</span></a>"; //class="active"	  
				  }
	            
	             $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                                 WHERE submenu.id_main=mainmenu.id_main 
                                 AND submenu.id_main=$r[id_main]");
               $jml=mysql_num_rows($sub);
                // apabila sub menu ditemukan
                if ($jml > 0){
                  echo "<div><ul>";
	                while($w=mysql_fetch_array($sub)){
                    echo "<li><a href='$w[link_sub]'><span>&#187; $w[nama_sub]</span></a></li>";
	                }           
	                echo "</ul></div>
                        </li>";
                }
                else{
                  echo "</li>";
                }
              }        
            ?>
                		
                	</ul>
                </div>
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-sidebar1">
                            <div class="art-vmenublock">
                                <div class="art-vmenublock-body">
                                            <div class="art-vmenublockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Kategori</div>
                                            </div>
                                            <div class="art-vmenublockcontent">
                                                <div class="art-vmenublockcontent-tl"></div>
                                                <div class="art-vmenublockcontent-tr"></div>
                                                <div class="art-vmenublockcontent-bl"></div>
                                                <div class="art-vmenublockcontent-br"></div>
                                                <div class="art-vmenublockcontent-tc"></div>
                                                <div class="art-vmenublockcontent-bc"></div>
                                                <div class="art-vmenublockcontent-cl"></div>
                                                <div class="art-vmenublockcontent-cr"></div>
                                                <div class="art-vmenublockcontent-cc"></div>
                                                <div class="art-vmenublockcontent-body">
                                            <!-- block-content -->
                                                            <ul class="art-vmenu">
      <?php
          include "$f[folder]/kategori.php";      
      ?>
                                                            	
                                                            </ul>
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>

                           <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">My Profile</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          



                                <!-- Facebook Badge START -->
                                <a href="http://id-id.facebook.com/poeji.exact" target="_TOP" title="Poeji Exact">
                                <img src="http://badge.facebook.com/badge/1081179069.714.319944494.png" style="border: 0px;" width="205" />
                                </a><br/>
                                <!-- Facebook Badge END -->   
                                <br />
                                <div align="center">
                                <a href="ymsgr:sendIM?poeji_kartono">
                                <img src="http://opi.yahoo.com/online?u=poeji_kartono&amp;m=g&amp;t=14" border="0" vspace="3">
                                </a>
                                </div>
                                         
                     
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                            
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Pencarian</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          



<form method="POST" id="searchform" action="hasil-pencarian.html"> <!-- form pencarian -->
					<div>
					   <input class="searchField" type="text" name="kata" maxlength="50" value="Pencarian..." onblur="if(this.value=='') this.value='Pencarian...';" onfocus="if(this.value=='Pencarian...') this.value='';" /><br />
					   <input type="submit" value="Search" class="art-button" />
					</div>
				</form>            
            
                     
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                            
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Polling</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          


            <ul id="listsidebar">
              <?php
                $tanya=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Pertanyaan'");
                $t=mysql_fetch_array($tanya);

                echo "<br /><span class='news-title'> $t[pilihan]</span><br /><br />";
                echo "<form method=POST action='hasil-poling.html'>";

                $poling=mysql_query("SELECT * FROM poling WHERE aktif='Y' and status='Jawaban'");
                while ($p=mysql_fetch_array($poling)){
                  echo "<span class='news-text'><input type=radio name=pilihan value='$p[id_poling]' />$p[pilihan]</span><br />";
                } ?>
                <p align=center><input type="submit" value="vote" class="art-button" /></p>
                      </form>
					 
                      <a href="lihat-poling.html"><span class='news-title2'>Lihat Hasil Poling</span></a>
              
            </ul><br />
            
            
                     
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                            
                            <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Statistik User</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          
            <?php
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time(); // 

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hits) FROM statistik"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hits) as hitstoday FROM statistik WHERE tanggal='$tanggal' GROUP BY tanggal")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hits) FROM statistik"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM statistik WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "
                    <table align=center>
					<tr><td class='news-title'>$tothitsgbr</td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Pengunjung hari ini </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    
                    <tr><td class='news-title'><img src=counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
          
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                             <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Banner</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          
<?php
              // Tampilkan banner
              $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 3");
              while($b=mysql_fetch_array($banner)){
                  echo "<p align=center><a href=$b[url] target='_blank' title='$b[judul]'>
                        <img src='foto_banner/$b[gambar]' border='0'></a></p>";
              }
            ?>          
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                            
                             <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Shoutbox</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
          
<?php // Shoutbox
$qshoutbox=mysql_num_rows(mysql_query("select * from modul where nama_modul='Shoutbox' and publish='Y'"));
// Apabila modul poling diaktifkan Publish=Y, maka tampilkan modul Poling
if ($qshoutbox > 0){
  echo "<iframe src='shoutbox.php' width=210 height=250 border=1 solid></iframe><br /><br />";
  echo "<form name=formshout action=simpanshoutbox.php method=POST>
  		<table class=shout width=100%>
        <tr><td>Nama :</td><td> <input class=shout type=text name=nama size=17></td></tr>
        <tr><td>Website :</td><td><input class=shout type=text name=website size=17></td></tr>
        <tr><td valign=top>Pesan :</td><td> <textarea class=shout name='pesan' style='width: 135px; height: 35px;'></textarea></td></tr>";
  ?>
        <tr><td colspan=2>
        <a onClick="addSmiley(':-)')"><img src='smiley/1.gif'></a> 
        <a onClick="addSmiley(':-(')"><img src='smiley/2.gif'></a>
        <a onClick="addSmiley(';-)')"><img src='smiley/3.gif'></a>
        <a onClick="addSmiley(';-D')"><img src='smiley/4.gif'></a>
        <a onClick="addSmiley(';;-)')"><img src='smiley/5.gif'></a>
        <a onClick="addSmiley('<:D>')"><img src='smiley/6.gif'></a>
        </td></tr>
  <?php
  echo "<tr><td colspan=2>"; ?>
  <input class="art-button" type="submit" name="submit" value="Kirim"><input class="art-button" type="reset" name="reset" value="Reset">
  <?php echo "</td></tr>
        </table></form><br />";
}
?>
        
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                            
                             <div class="art-block">
                                <div class="art-block-body">
                                            <div class="art-blockheader">
                                                <div class="l"></div>
                                                <div class="r"></div>
                                                 <div class="t">Sekilas Info</div>
                                            </div>
                                            <div class="art-blockcontent">
                                                <div class="art-blockcontent-tl"></div>
                                                <div class="art-blockcontent-tr"></div>
                                                <div class="art-blockcontent-bl"></div>
                                                <div class="art-blockcontent-br"></div>
                                                <div class="art-blockcontent-tc"></div>
                                                <div class="art-blockcontent-bc"></div>
                                                <div class="art-blockcontent-cl"></div>
                                                <div class="art-blockcontent-cr"></div>
                                                <div class="art-blockcontent-cc"></div>
                                                <div class="art-blockcontent-body">
                                            <!-- block-content -->
                                                            <!-- SIDEBAR -->
			
				
          <ul id="listticker">
            <?php
              $sekilas=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilas DESC LIMIT 5");
              while($s=mysql_fetch_array($sekilas)){
                echo "<li><span class='line'>- $s[info]<br><br></span></li>";
              }
            ?>
          </ul>
                                            <!-- /block-content -->
                                            
                                            		<div class="cleared"></div>
                                                </div>
                                            </div>
                            		<div class="cleared"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="art-layout-cell art-content">

       <?php
          include "$f[folder]/kiri.php";      
      ?>
                                                    


                        </div>
                    </div>
                </div>
                <div class="cleared"></div><div class="art-footer">
                    <div class="art-footer-inner">
                        <a href="rss.xml" target="_blank" class="art-rss-tag-icon" title="RSS"></a>
                        <div class="art-footer-text">
                            <p><b>&copy;copyright template by <a href="http://poeji.ciganjur.com">poeji</a></b></p>
                        </div>
                    </div>
                    <div class="art-footer-background"></div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer"></p>
    </div>
    
</body>
</html>
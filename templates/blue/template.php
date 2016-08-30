<?php 
  error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php include "dina_titel.php"; ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow">
<meta name="description" content="<?php include "dina_meta1.php"; ?>">
<meta name="keywords" content="<?php include "dina_meta2.php"; ?>">
<meta http-equiv="Copyright" content="lokomedia">
<meta name="author" content="Lukmanul Hakim">
<meta http-equiv="imagetoolbar" content="no">
<meta name="language" content="Indonesia">
<meta name="revisit-after" content="7">
<meta name="webcrawlers" content="all">
<meta name="rating" content="general">
<meta name="spiders" content="all">

<link rel="shortcut icon" href="favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
<link rel="stylesheet" href="<?php echo "$f[folder]/css/style.css" ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo "$f[folder]/css/css62948.css" ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo "$f[folder]/css/prettyPhoto.css" ?>" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/jqueryslidemenu.css" rel="stylesheet" type="text/css" />
<link href="css/css62948.css" rel="stylesheet" type="text/css" />

<script src="<?php echo "$f[folder]/js/jquery-1.4.js" ?>" type="text/javascript"></script>


<script src="<?php echo "$f[folder]/js/jquery.tipsy.js" ?>" type="text/javascript"></script>

<script type='text/javascript'>
  $(function($) {        
	   $('.tips a').tipsy({fade: true, gravity: 'w'});
	   $('.tipsatas a').tipsy({fade: true, gravity: 's'});	
  });
</script>

<script src="<?php echo "$f[folder]/js/superfish.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/hoverIntent.js" ?>" type="text/javascript"></script>
	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>

<script src="<?php echo "$f[folder]/js/headline.js" ?>" type="text/javascript"></script>
  <script type="text/javascript"> 
      $(document).ready(function(){
	  		bukaContent($('#slideAwal'),'div1');			
	    });
	</script>	

<script src="<?php echo "$f[folder]/js/jquery.fancybox.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/jquery.mousewhell.js" ?>" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("a#galeri").fancybox({
				'titlePosition'	: 'inside'
			});
		});
		</script>
<script src="<?php echo "$f[folder]/js/jquery_002.js" ?>" type="text/javascript"></script> 
<script src="<?php echo "$f[folder]/js/jquery.js" ?>" type="text/javascript"></script> 
<script src="<?php echo "$f[folder]/js/slider-wrapper.js" ?>" type="text/javascript"></script> 
<script src="<?php echo "$f[folder]/js/jsnivislider.js" ?>" type="text/javascript"></script> 
<script src="<?php echo "$f[folder]/js/clock.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/tabs.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/newsticker.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/jquery.prettyPhoto.js" ?>" type="text/javascript"></script>
<script src="<?php echo "$f[folder]/js/prettyphoto.js" ?>" type="text/javascript"></script>

</head>

<body onload="startclock()">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="winged3"></div>

    <div class="winged25"></div>
    <div class="grunge5" ></div>
      
   <div class="abstract" ></div> 
<div class="shadow" ></div>

	<div id="container">
     
		<div id="wrapper">

        <div id="top">      		
				<!-- motto -->
				 <!-- / motto -->
        </div> 
        <!-- / top -->
                                                                          
          <div class="motto">Just Another Simple Templates For Us ... |^_^|</div>

      <!-- MENU -->
     
<script type="text/javascript">
$(document).ready(function() {
		
	$("#topnav li").prepend("<span></span>"); //Throws an empty span tag right before the a tag
	
	$("#topnav li").each(function() { //For each list item...
		var linkText = $(this).find("a").html(); //Find the text inside of the a tag
		$(this).find("span").show().html(linkText); //Add the text in the span tag
	}); 
	
	$("#topnav li").hover(function() {	//On hover...
		$(this).find("span").stop().animate({ 
			marginTop: "-40" //Find the span tag and move it up 40 pixels
		}, 250);
	} , function() { //On hover out...
		$(this).find("span").stop().animate({
			marginTop: "0" //Move the span back to its original state (0px)
		}, 250);
	});
	
	
});
</script>

 <script src="<?php echo "$f[folder]/js/jqueryslidemenu.js" ?>" type="text/javascript"></script>
 
      <div class="jqueryslidemenu" id="mainmenu">
     <ul>
     <li class="left">&nbsp;</li>	
	   			
      <?php   
	           
        $main=mysql_query("SELECT * FROM mainmenu WHERE aktif='Y'");

        while($r=mysql_fetch_array($main)){
	         echo "<li><div id=menubr><a href='$r[link]'>
			 <div class=separatornav>$r[nama_menu]</div></a>
                    <ul display: none; visibility: visible; left: 0px; padding-left: 5px; width: 105px; ><div class=containborder><div class=containborder2><div class=border2><div class=border1>";
	         $sub=mysql_query("SELECT * FROM submenu, mainmenu  
                            WHERE submenu.id_main=mainmenu.id_main 
                            AND submenu.id_main=$r[id_main] AND submenu.aktif='Y'");
	         while($w=mysql_fetch_array($sub)){
			
              echo "<li><div class=bullet></div><div class=subnavi><a href='$w[link_sub]'> $w[nama_sub]</a></div></li>";
	         }
	       echo "</div></div></div></div></ul>
            </li>";
        }        
      ?>
	   <li class="sep">&nbsp;</li>
	   <li class="right">&nbsp;</li>
        </ul></div>    
         
  <!-- / END MENU -->

			<!-- HEADER -->
			<div id="header">
				<div class="intro">
			<div class="searchku"></div>
				<form method="POST" id="searchform" action="hasil-pencarian.html"> <!-- form pencarian -->
<div>
					   <input class="searchField" type="text" name="kata" maxlength="50" value="Pencarian..." onblur="if(this.value=='') this.value='Pencarian...';" onfocus="if(this.value=='Pencarian...') this.value='';" />
					   <input class="searchSubmit" type="submit" value="" style="outline:none" />
					</div>
				</form>
				
                <div class="jam"><span id="date"></span>, <span id="clock"></span></div>
			  </div> <!-- / intro -->				
			</div> <!-- /header -->


			<!-- CONTENT -->
            
      <?php
          include "$f[folder]/kiri.php";      
      ?>

			<!-- SIDEBAR -->
			<div id="sidebar">
            <div class="bordersidebar"><div class="sidebar1"></div>
				<h2 class="space20">META</h2>
              <div id="listku">
          <ul >
           <div class="lisidebar"><li><a href="">Register</a></li></div>
           <div class="lisidebar"> <li><a href="">Log in</a></li></div>
           <div class="lisidebar"> <li><a href="rss.xml" target="_blank" style="outline:none;">RSS</a></li></div>
           <div class="lisidebar"> <li><a href="">Wordpress</a></li></div>
           <div class="lisidebar"> <li><a href="">Joomla</a></li></div>
          </ul>
         </div>
         
         <div class="sidebar2"></div>
			  <h2 class="space20">other<div class="sbr"></div>contact</h2>
                <div id="listku">
          
           <ul >
           <div class="lisidebar"><li><a href="">Tweetter</a></li></div>
           <div class="lisidebar"> <li><a href="">Facebook</a></li></div>
           
           <div class="lisidebar"> <li><a href="">Yahoo Messanger</a></li></div>
           <div class="lisidebar"> <li><a href="">Email</a></li></div>
          </ul>
          
          </div>
          
			  <h2 class="space20"></h2>
                    <div id="listku">
            </div><br />
            <div class="bannerku">
            <div id="listku">
            <?php
              // Tampilkan banner
              $banner=mysql_query("SELECT * FROM banner ORDER BY id_banner DESC LIMIT 5");
              while($b=mysql_fetch_array($banner)){
                  echo "<p align=center><a href=$b[url] target='_blank' title='$b[judul]'>
                        <img src='foto_banner/$b[gambar]' border='0'></a></p>";
              }
            ?></div></div>
            
			</div></div> <!-- / end sidebar -->

			<!-- FOOTER -->
			<div id="footer">
			
				<div class="foot_content">
				  <p>&nbsp;</p>
					<p>Copyright &copy; 2010 by bukulokomedia.com. All rights reserved.</p>
				</div>
			</div>
			<!-- / end footer -->
		</div><!-- / end wrapper -->
	</div><!-- / end container -->
    
    <div class="shadowfooter" ></div>
   
</body>
</html>

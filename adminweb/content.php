<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "class_paging.php";

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='admin'){

$jam=date("H:i:s");
$tgl=tgl_indo(date("Y m d")); 	
  echo "<br /><p align=center>Hai <b>$_SESSION[namauser]</b>, selamat datang di halaman Administrator. 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola content website. <br /> <b>$hari_ini, $tgl, $jam </b>WIB</p><br />";

echo "  <div style=\"display: inline-block; width: 100%; margin-bottom: 15px; clear: both;\">
        <div style=\"float: left; width: 49%;\">
        <div style=\"background: #FFF; color: #547C96; border: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;\">Komentar Terbaru</div>";          
echo "<table class=\"list\">
            <thead>
            <tr>
             <td class=\"left\">Nama</td>
              <td class=\"left\">Isi Komentar</td>
              <td class=\"left\">Tanggal</td>
              <td class=\"left\">Aksi</td>
            </tr>
          </thead>";
    $tampil=mysql_query("SELECT * FROM komentar ORDER BY id_komentar DESC LIMIT 2");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
		$tgl=$r[tgl];
      echo "<tbody><tr>
                <td class=\"left\">$r[nama_komentar]</td>
                <td class=\"left\">$r[isi_komentar]</td>
                <td class=\"left\" width='70'>$tgl</td>
                <td class=\"left\"><a href=?module=komentar&act=editkomentar&id=$r[id_komentar]>edit</a></td>                
                </tr>";
    $no++;
    }
    echo "</tbody></table>";
echo "</div>";
echo "<div style=\"float: right; width: 49%;\">
        <div style=\"background: #FFF; color: #547C96; border: 1px solid #8EAEC3; padding: 5px; font-size: 14px; font-weight: bold;\">Hubungi Kami Terbaru</div>";          
  echo "<table class=\"list\">
            <thead>
            <tr>
             <td class=\"left\">Nama </td>
              <td class=\"left\">Email</td>
              <td class=\"left\">Tanggal</td>
              <td class=\"left\">Aksi</td>
            </tr>
          </thead>";
    $tampil=mysql_query("SELECT * FROM hubungi ORDER BY id_hubungi DESC LIMIT 2");

    $no = $posisi+1;
    while ($r=mysql_fetch_array($tampil)){
      $tgl=$r[tanggal];
  
      echo "<tbody><tr>
                <td class=\"left\">$r[nama]</td>
                <td class=\"left\">$r[email]</td>
                <td class=\"left\">$tgl</td>
                <td class=\"left\"><a href=?module=hubungi&act=balasemail&id=$r[id_hubungi]>balas</a></td>                
                </tr>";
    $no++;
    }
    echo "</tbody></table>";
    echo "</div></div>";

  echo "<table class='list'><thead>
		<td class='center' colspan=5><center>Control Panel</center></td></thead>
		<tr>
		  <td width=120 align=center><a href=media.php?module=user><img src=images/user.jpg border=none><br /><b>Manajemen User</b></a></td>
		  <td width=120 align=center><a href=media.php?module=modul><img src=images/modul.png border=none><br /><b>Manajemen Modul</b></a></td>
		  <td width=120 align=center><a href=media.php?module=berita><img src=images/berita.png border=none><br /><b>Berita</b></a></td>
		  <td width=120 align=center><a href=media.php?module=komentar><img src=images/komentar.png border=none><br /><b>Komentar</b></a></td>
		  <td width=120 align=center><a href=media.php?module=download><img src=images/download.png border=none><br /><b>Download</b></a></td>
    </tr>
		<tr>
		  <td width=120 align=center><a href=media.php?module=agenda><img src=images/agenda.png border=none><br /><b>Agenda</b></a></td>
		  <td width=120 align=center><a href=media.php?module=banner><img src=images/banner.png border=none><br /><b>Banner</b></a></td>
		  <td width=120 align=center><a href=media.php?module=galerifoto><img src=images/galeri.png border=none><br /><b>Galeri Foto</b></a></td>
		  <td width=120 align=center><a href=media.php?module=poling><img src=images/poling.png border=none><br /><b>Poling</b></a></td>
		  <td width=120 align=center><a href=media.php?module=hubungi><img src=images/hubungi.png border=none><br /><b>Hubungi Kami</b></a></td>
    </tr>
    </table>";
  }
  elseif ($_SESSION['leveluser']=='user'){
  echo "<h2>Selamat Datang</h2>
          <p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Administrator.<br> 
          Silahkan klik menu pilihan yang berada di bagian header untuk mengelola website. </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>


          <p align=right>Login : $hari_ini, ";
  echo tgl_indo(date("Y m d")); 
  echo " | "; 
  echo date("H:i:s");
  echo " WIB</p>";
 	}
}

// Bagian User
elseif ($_GET['module']=='profil'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_profil/profil.php";
  }
}

// Bagian User
elseif ($_GET['module']=='user'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION[leveluser]=='user'){
    include "modul/mod_users/users.php";
  }
}

// Bagian Modul
elseif ($_GET['module']=='modul'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_modul/modul.php";
  }
}

// Bagian Kategori
elseif ($_GET['module']=='kategori'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_kategori/kategori.php";
  }
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_berita/berita.php";                            
  }
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_komentar/komentar.php";
  }
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_tag/tag.php";
  }
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user'){
    include "modul/mod_agenda/agenda.php";
  }
}

// Bagian Banner
elseif ($_GET['module']=='banner'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_banner/banner.php";
  }
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_poling/poling.php";
  }
}

// Bagian Download
elseif ($_GET['module']=='download'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_download/download.php";
  }
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_hubungi/hubungi.php";
  }
}

// Bagian Templates
elseif ($_GET['module']=='templates'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_templates/templates.php";
  }
}

// Bagian Shoutbox
elseif ($_GET['module']=='shoutbox'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_shoutbox/shoutbox.php";
  }
}

// Bagian Album
elseif ($_GET['module']=='album'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_album/album.php";
  }
}

// Bagian Galeri Foto
elseif ($_GET['module']=='galerifoto'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_galerifoto/galerifoto.php";
  }
}

// Bagian Kata Jelek
elseif ($_GET['module']=='katajelek'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_katajelek/katajelek.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Menu Utama
elseif ($_GET['module']=='menuutama'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_menuutama/menuutama.php";
  }
}

// Bagian Sub Menu
elseif ($_GET['module']=='submenu'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_submenu/submenu.php";
  }
}

// Bagian Halaman Statis
elseif ($_GET['module']=='halamanstatis'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_halamanstatis/halamanstatis.php";
  }
}

// Bagian Sekilas Info
elseif ($_GET['module']=='sekilasinfo'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_sekilasinfo/sekilasinfo.php";
  }
}

// Bagian Identitas Website
elseif ($_GET['module']=='identitas'){
  if ($_SESSION['leveluser']=='admin'){
    include "modul/mod_identitas/identitas.php";
  }
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>

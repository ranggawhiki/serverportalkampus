-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 11:02 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblokomedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE IF NOT EXISTS `agenda` (
  `id_agenda` int(5) NOT NULL,
  `tema` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tema_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_agenda` text COLLATE latin1_general_ci NOT NULL,
  `tempat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengirim` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_posting` date NOT NULL,
  `jam` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `tema`, `tema_seo`, `isi_agenda`, `tempat`, `pengirim`, `tgl_mulai`, `tgl_selesai`, `tgl_posting`, `jam`, `username`) VALUES
(30, 'Seminar "Membangun Portal Berita ala Detik.com"', 'seminar-membangun-portal-berita-ala-detikcom', 'Seminar ini akan membahas tentang konsep, proses, dan implementasi dalam membangun portal berita sekelas detik.com.<br>', 'Lab. Universitas Atmajaya Yogyakarta', 'HMJ TI (081843092580)', '2009-03-14', '2009-03-14', '2009-01-31', '11.00 s/d 13.00 WIB', 'admin'),
(31, 'Bedah Buku "Membongkar Trik Rahasia Master PHP"', 'bedah-buku-membongkar-trik-rahasia-master-php', 'Acara bedah buku terbaru dari Lukmanul Hakim yang berjudul Membongkar Trik Rahasia Para Master PHP.\r\n', 'Toko Buku Gramedia Sudirman', 'Enda (08192839849)', '2009-10-29', '2009-10-30', '2009-01-31', '08.00 s/d 12.00 WIB', 'joko'),
(29, 'Workshop "3 Hari Menjadi Master PHP"', 'workshop-3-hari-menjadi-master-php', 'Workshop ini bertujuan untuk bla .. bla .. bla<br>', 'Jogja Expo Center', 'Adi (081893274848)', '2009-02-21', '2009-02-23', '2009-01-31', '15.00 s/d Selesai', 'sinto'),
(36, 'Workshop VBA Programming for Excel', 'workshop-vba-programming-for-excel', 'Tes\r\n', 'Lab. Pusat Komputer UII', 'Aci (08189320984)', '2009-10-29', '2009-10-29', '2009-10-26', '09.00 s/d Selesai', 'wiro'),
(38, 'Workshop Kolaborasi PHP dan jQuery', 'workshop-kolaborasi-php-dan-jquery', 'Materinya mengenai cara mengkolaborasikan pemrograman PHP dan jQuery\r\n', 'Hotel Santika Yogyakarta', 'Rendy (08787768768)', '2010-01-15', '2010-01-15', '2010-01-15', '09.00 s/d 16.00 WIB', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id_album` int(5) NOT NULL,
  `jdl_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `album_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id_album`, `jdl_album`, `album_seo`, `gbr_album`, `aktif`) VALUES
(21, 'Kartun', 'kartun', '476928sonic.jpg', 'Y'),
(20, 'Pernikahan', 'pernikahan', '146667nikah.jpg', 'Y'),
(18, 'Bayi', 'bayi', '246551silvestree.jpg', 'Y'),
(12, 'Ilustrator', 'ilustrator', '987701family.jpg', 'Y'),
(19, 'Binatang', 'binatang', '391479burung.jpg', 'Y'),
(17, 'Arsitektur', 'arsitektur', '741638arche090.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id_banner` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(4, 'Fresh Book', 'http://freshbooks.com', 'freshbook.jpg', '2009-02-05'),
(7, 'Cinema 21', 'http://21cineplex.com', 'cinema21.jpg', '2008-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `username` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `headline` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `username`, `judul`, `judul_seo`, `headline`, `isi_berita`, `hari`, `tanggal`, `jam`, `gambar`, `dibaca`, `tag`) VALUES
(142, 2, 'admin', 'test webserver', 'test-webserver', 'Y', '<p>ini untuk test</p>', 'Senin', '2016-08-29', '22:21:41', '60danbo_and_the_rainbow_by_musashigyo-d49c0qo.jpg', 1, 'komputer'),
(143, 23, 'admin', 'test test', 'test-test', 'Y', '<p>test</p>', 'Selasa', '2016-08-30', '10:28:46', '51.jpg', 1, ''),
(144, 23, 'admin', 'test lagi', 'test-lagi', 'Y', '<p>test lagi</p>', 'Selasa', '2016-08-30', '10:29:48', '693.jpg', 1, ''),
(145, 23, 'admin', 'test lag itest', 'test-lag-itest', 'Y', '<p>test</p>', 'Selasa', '2016-08-30', '10:30:27', '24Data UKM.jpg', 1, ''),
(64, 19, 'wiro', 'Timnas Futsal Poltekpos Meraih Juara 3', 'timnas-futsal-poltekpos-meraih-juara-3', 'Y', '<p>Timnas Futsal Poltekpos Mampu meraih juara 3</p>', 'Minggu', '2009-01-25', '20:35:26', '18safari.jpg', 4, 'browser,sepakbola'),
(141, 19, 'admin', 'test', 'test', 'Y', '<p>test buat android saja,test buat update mau diliat mas yusup diliatin pak rolly</p>', 'Selasa', '2016-08-23', '12:52:40', '88timthumb.jpg', 1, 'amerika');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id_download` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_file` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `hits` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id_download`, `judul`, `nama_file`, `tgl_posting`, `hits`) VALUES
(3, 'Membuat Shopping Cart dengan PHP', 'shopping cart.pdf', '2009-02-17', 3),
(5, 'Skrip Captcha', 'captcha.rar', '2009-02-06', 2),
(1, 'Kalender Tahun 2009', 'kalender2009.rar', '2009-02-06', 8),
(8, 'Wallpaper PHP', 'PHP_weapon.jpg', '2009-10-28', 3),
(9, 'Slide  Pemrograman VBA Excell', 'Excell_VBA.ppt', '2009-11-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(5) NOT NULL,
  `id_album` int(5) NOT NULL,
  `jdl_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gallery_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `gbr_gallery` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `id_album`, `jdl_gallery`, `gallery_seo`, `keterangan`, `gbr_gallery`) VALUES
(3, 12, 'Duduk di Sofa', 'duduk-di-sofa', 'Sekeluarga sedang duduk di sofa.', '27587family sofa.jpg'),
(4, 12, 'Didepan Rumah', 'didepan-rumah', 'Sekeluarga sedang berada di ladang.', '258819family field.jpg'),
(5, 12, 'Keluarga Bahagia', 'keluarga-bahagia', 'Si anak memperlihatkan lukisan.', '697448family.jpg'),
(7, 19, 'Lebah', 'lebah', 'Lebah besar terbang.', '322906lebah.jpg'),
(8, 17, 'Bangunan Jepang', 'bangunan-jepang', 'Bangunan khas jepang', '370422arche037.jpg'),
(9, 17, 'Candi Merang', 'candi-merang', 'Bangunan candi khas kerajaan', '346527arche014.jpg'),
(10, 18, 'Cukur Janggut', 'cukur-janggut', 'Bayi unik sedang cukur rambut', '892395macho4.jpg'),
(11, 18, 'Push Up', 'push-up', 'Bayi unik sedang melakukan push-up', '991546macho1.jpg'),
(12, 19, 'Kuda Nyengir', 'kuda-nyengir', 'Gini nih kalau kuda lagi nyengir.', '658447kuda.jpg'),
(13, 21, 'Super Mario Bross', 'super-mario-bross', 'Game klasik 3D Mario Bross.', '601318mario bros.jpg'),
(32, 21, 'Naruto', 'naruto', 'Kartun ninja jepang Naruto', '45440naruto.jpg'),
(15, 21, 'Superman', 'superman', 'Superman kecil mau beraksi', '689147superman.jpg'),
(27, 21, 'Sonic', 'sonic', 'Sonic and Friend', '152618sonic.jpg'),
(31, 21, 'Kungfu Panda', 'kungfu-panda', 'Jack Black', '550598panda2.jpg'),
(33, 21, 'Maskot Euro 2008', 'maskot-euro-2008', 'Trix dan Flix di Euro 2008', '816528mascot.jpg'),
(14, 21, 'Harry Potter', 'harry-potter', 'Game Harry Potter', '735687potter.jpg'),
(42, 21, 'Avatar', 'avatar', 'Eng si Gundul Avatar', '874877avatar.jpg'),
(16, 21, 'Shrek', 'shrek', 'Film 3D Shrek 2', '527801shrek06_800.jpg'),
(44, 21, 'Kenshin', 'kenshin', 'Kenshin Himura', '494110himura.jpg'),
(45, 21, 'Sun Goku', 'sun-goku', 'Goku Cilik', '266845goku.JPG'),
(46, 21, 'Virtual Girl', 'virtual-girl', 'Gadis Cantik 3D', '837921Girl.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `halamanstatis`
--

CREATE TABLE IF NOT EXISTS `halamanstatis` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halamanstatis`
--

INSERT INTO `halamanstatis` (`id_halaman`, `judul`, `isi_halaman`, `tgl_posting`, `gambar`) VALUES
(1, 'Profil', '<p>\r\n<strong>Bukulokomedia.com</strong> merupakan website resmi dari penerbit\r\nLokomedia yang bermarkas di Jl. Jambon. Perum. Pesona Alam Hijau 2 Blok B-4 Kricak, Jatimulyo, Yogyakarta\r\n55242. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret\r\n2008.<br />\r\n<br />\r\nProduk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema Web, terutama PHP (<span style="font-weight: bold; font-style: italic">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.\r\n</p>\r\n', '2010-05-31', 'gedungku.jpg'),
(2, 'Visi dan Misi', '<p>\r\nVisi :\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nMisi :\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n', '2010-05-31', ''),
(3, 'Struktur Organisasi', 'Isikan struktur organisasi di bagian ini\r\n', '2010-05-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE IF NOT EXISTS `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `alamat_website` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `alamat_website`, `meta_deskripsi`, `meta_keyword`, `favicon`) VALUES
(1, 'Politeknik Pos Indonesia - Go Global With Us ', 'http://localhost/lokomedia', 'Politeknik Pos Indonesia', 'Politeknik Pos Indonesia', 'favicon.ico');

-- --------------------------------------------------------

--
-- Table structure for table `katajelek`
--

CREATE TABLE IF NOT EXISTS `katajelek` (
  `id_jelek` int(11) NOT NULL,
  `kata` varchar(60) COLLATE latin1_general_ci DEFAULT NULL,
  `ganti` varchar(60) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `katajelek`
--

INSERT INTO `katajelek` (`id_jelek`, `kata`, `ganti`) VALUES
(4, 'sex', 's**'),
(2, 'bajingan', 'b*******'),
(3, 'bangsat', 'b******');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kategori_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kategori_seo`, `aktif`) VALUES
(19, 'UKM', 'ukm', 'Y'),
(2, 'Kampus', 'kampus', 'Y'),
(22, 'BAU', 'bau', 'Y'),
(23, 'BAAK', 'baak', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_main` int(5) NOT NULL,
  `nama_menu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminmenu` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_main`, `nama_menu`, `link`, `aktif`, `adminmenu`) VALUES
(2, 'Beranda', 'http://localhost/lokomedia', 'Y', 'N'),
(3, 'Profil', 'statis-1-profil.html', 'Y', 'N'),
(4, 'Agenda', 'semua-agenda.html', 'Y', 'N'),
(5, 'Berita', 'semua-berita.html', 'Y', 'N'),
(6, 'Download', 'semua-download.html', 'Y', 'N'),
(7, 'Galeri Foto', 'semua-album.html', 'Y', 'N'),
(8, 'Hubungi Kami', 'hubungi-kami.html', 'Y', 'N'),
(14, 'Setting Web', '', 'N', 'Y'),
(15, 'Setting Menu', '', 'N', 'Y'),
(16, 'Manajemen Berita', '', 'N', 'Y'),
(54, 'Hubungi Kami', '?module=hubungi', 'N', 'Y'),
(53, 'Interaksi', '', 'N', 'Y'),
(52, 'Media', '', 'N', 'Y'),
(59, 'Banner', '?module=banner', 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', '?module=user', '', '', 'N', 'user', 'Y', 1, ''),
(18, 'Berita', '?module=berita', '', '', 'Y', 'user', 'Y', 6, 'semua-berita.html'),
(19, 'Banner', '?module=banner', '', '', 'Y', 'admin', 'Y', 9, ''),
(37, 'Profil', '?module=profil', '<b>Bukulokomedia.com</b> merupakan website resmi dari penerbit Lokomedia yang bermarkas di Jl. Arwana No.24 Minomartani Yogyakarta 55581. Dirintis pertama kali oleh Lukmanul Hakim pada tanggal 14 Maret 2008.<br><br>Produk unggulan dari penerbit Lokomedia adalah buku-buku serta aksesoris bertema PHP (<span style="font-weight: bold; font-style: italic;">PHP: Hypertext Preprocessor</span>) yang merupakan pemrograman Internet paling handal saat ini.\r\n', 'gedungku.jpg', 'N', 'admin', 'N', 3, 'profil-kami.html'),
(10, 'Manajemen Modul', '?module=modul', '', '', 'N', 'admin', 'Y', 2, ''),
(31, 'Kategori', '?module=kategori', '', '', 'Y', 'admin', 'Y', 5, ''),
(33, 'Poling', '?module=poling', '', '', 'Y', 'admin', 'Y', 10, ''),
(34, 'Tag (Label)', '?module=tag', '', '', 'N', 'admin', 'Y', 7, ''),
(35, 'Komentar', '?module=komentar', '', '', 'Y', 'admin', 'Y', 8, ''),
(36, 'Download', '?module=download', '', '', 'Y', 'admin', 'Y', 11, 'semua-download.html'),
(40, 'Hubungi Kami', '?module=hubungi', '', '', 'Y', 'admin', 'Y', 12, 'hubungi-kami.html'),
(41, 'Agenda', ' ?module=agenda', '', '', 'Y', 'user', 'Y', 31, 'semua-agenda.html'),
(42, 'Shoutbox', '?module=shoutbox', '', '', 'Y', 'admin', 'Y', 13, ''),
(43, 'Album', '?module=album', '', '', 'N', 'admin', 'Y', 14, ''),
(44, 'Galeri Foto', '?module=galerifoto', '', '', 'Y', 'admin', 'Y', 15, ''),
(45, 'Templates', '?module=templates', '', '', 'N', 'admin', 'Y', 16, ''),
(46, 'Kata Jelek', '?module=katajelek', '', '', 'N', 'admin', 'Y', 17, ''),
(47, 'RSS', '-', '', '', 'Y', 'admin', 'N', 18, ''),
(48, 'YM', '-', '', '', 'Y', 'admin', 'N', 19, ''),
(49, 'Indeks Berita', '-', '', '', 'Y', 'admin', 'N', 20, ''),
(50, 'Kalender', '-', '', '', 'Y', 'admin', 'N', 21, ''),
(51, 'Statistik User', '-', '', '', 'Y', 'admin', 'N', 22, ''),
(52, 'Pencarian', '-', '', '', 'Y', 'admin', 'N', 23, ''),
(53, 'Berita Teratas', '-', '', '', 'Y', 'admin', 'N', 24, ''),
(54, 'Arsip Berita', '-', '', '', 'Y', 'admin', 'N', 25, ''),
(55, 'Berita Sebelumnya', '-', '', '', 'Y', 'admin', 'N', 26, ''),
(60, 'Sekilas Info', '?module=sekilasinfo', '', '', 'Y', 'admin', 'Y', 13, ''),
(57, 'Menu Utama', '?module=menuutama', '', '', 'Y', 'admin', 'Y', 28, ''),
(58, 'Sub Menu', '?module=submenu', '', '', 'Y', 'admin', 'Y', 29, ''),
(59, 'Halaman Statis', '?module=halamanstatis', '', '', 'Y', 'admin', 'Y', 30, ''),
(61, 'Identitas Website', '?module=identitas', '', '', 'N', 'admin', 'Y', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE IF NOT EXISTS `poling` (
  `id_poling` int(5) NOT NULL,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL DEFAULT '0',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `pilihan`, `status`, `rating`, `aktif`) VALUES
(1, 'Internet Explorer', 'Jawaban', 23, 'Y'),
(2, 'Mozilla Firefox', 'Jawaban', 81, 'Y'),
(3, 'Google Chrome', 'Jawaban', 21, 'Y'),
(4, 'Opera', 'Jawaban', 22, 'Y'),
(8, 'Apa Browser Favorit Anda?', 'Pertanyaan', 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sekilasinfo`
--

CREATE TABLE IF NOT EXISTS `sekilasinfo` (
  `id_sekilas` int(5) NOT NULL,
  `info` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sekilasinfo`
--

INSERT INTO `sekilasinfo` (`id_sekilas`, `info`, `tgl_posting`, `gambar`) VALUES
(1, 'Anak yang mengalami gangguan tidur, cenderung memakai obat2an dan alkohol berlebih saat dewasa.', '2010-04-11', 'news5.jpg'),
(2, 'WHO merilis, 30 persen anak-anak di dunia kecanduan menonton televisi dan bermain komputer.', '2010-04-11', 'news4.jpg'),
(3, 'Menurut peneliti di Detroit, orang yang selalu tersenyum lebar cenderung hidup lebih lama.', '2010-04-11', 'news3.jpg'),
(4, 'Menurut United Stated Trade Representatives, 25% obat yang beredar di Indonesia adalah palsu.', '2010-04-11', 'news2.jpg'),
(5, 'Presiden AS Barack Obama memesan Nasi Goreng di restoran Bali langsung dari Amerika', '2010-04-11', 'news1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shoutbox`
--

CREATE TABLE IF NOT EXISTS `shoutbox` (
  `id_shoutbox` int(5) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `shoutbox`
--

INSERT INTO `shoutbox` (`id_shoutbox`, `nama`, `website`, `pesan`, `tanggal`, `jam`, `aktif`) VALUES
(1, 'lukman', 'lukman.com', 'tes :-) aja ;-D ha ha ha <:D>', '2009-11-02', '00:00:00', 'Y'),
(2, 'hakim', 'hakim.com', 'tes :-) aja ;-D ha ha ha <:D>\r\ndfa\r\nfdas\r\nfdsa\r\nfdasf\r\n:-(', '2009-11-02', '00:00:00', 'Y'),
(3, 'daryono', 'bukulokomedia.com', 'ku tes lagi<br>\r\ntes :-) aja ;-D ha ha ha &lt;:D&gt;<br>\r\nkeren euy<br>\r\n:-(', '2009-11-02', '13:55:00', 'Y'),
(5, 'iin', 'uin-suka.ac.id', 'tes aja euy ;-D boi', '2009-11-03', '11:36:06', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tanggal` date NOT NULL,
  `hits` int(10) NOT NULL DEFAULT '1',
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistik`
--

INSERT INTO `statistik` (`ip`, `tanggal`, `hits`, `online`) VALUES
('127.0.0.2', '2009-09-11', 1, '1252681630'),
('127.0.0.1', '2009-09-11', 17, '1252734209'),
('127.0.0.3', '2009-09-12', 8, '1252817594'),
('127.0.0.1', '2009-10-24', 8, '1256381921'),
('127.0.0.1', '2009-10-26', 108, '1256620074'),
('127.0.0.1', '2009-10-27', 52, '1256686769'),
('127.0.0.1', '2009-10-28', 124, '1256792223'),
('127.0.0.1', '2009-10-29', 9, '1256828032'),
('127.0.0.1', '2009-10-31', 3, '1257047101'),
('127.0.0.1', '2009-11-01', 85, '1257113554'),
('127.0.0.1', '2009-11-02', 11, '1257207543'),
('127.0.0.1', '2009-11-03', 165, '1257292312'),
('127.0.0.1', '2009-11-04', 59, '1257403499'),
('127.0.0.1', '2009-11-05', 10, '1257433172'),
('127.0.0.1', '2009-11-11', 13, '1258006911'),
('127.0.0.1', '2009-11-12', 10, '1258048069'),
('127.0.0.1', '2009-11-14', 14, '1258222519'),
('127.0.0.1', '2009-11-17', 2, '1258473856'),
('127.0.0.1', '2009-11-19', 16, '1258635469'),
('127.0.0.1', '2009-11-21', 4, '1258863505'),
('127.0.0.1', '2009-11-25', 3, '1259216216'),
('127.0.0.1', '2009-11-26', 1, '1259222467'),
('127.0.0.1', '2009-11-30', 11, '1259651841'),
('127.0.0.1', '2009-12-02', 9, '1259746407'),
('127.0.0.1', '2009-12-03', 17, '1259906128'),
('127.0.0.1', '2009-12-10', 69, '1260423794'),
('127.0.0.1', '2009-12-12', 26, '1260560082'),
('127.0.0.1', '2009-12-11', 5, '1260508621'),
('127.0.0.1', '2009-12-13', 8, '1260716786'),
('127.0.0.1', '2009-12-14', 9, '1260772698'),
('127.0.0.1', '2009-12-15', 9, '1260837158'),
('127.0.0.1', '2009-12-16', 7, '1260905627'),
('127.0.0.1', '2009-12-17', 48, '1261026791'),
('127.0.0.1', '2009-12-18', 11, '1261088534'),
('127.0.0.1', '2009-12-22', 3, '1261477278'),
('127.0.0.1', '2009-12-25', 2, '1261686043'),
('127.0.0.1', '2009-12-26', 29, '1261835507'),
('127.0.0.1', '2009-12-27', 7, '1261920445'),
('127.0.0.1', '2009-12-28', 3, '1261965611'),
('127.0.0.1', '2009-12-29', 21, '1262024011'),
('127.0.0.1', '2009-12-30', 24, '1262146708'),
('127.0.0.1', '2010-01-01', 12, '1262286131'),
('127.0.0.1', '2010-01-03', 38, '1262529325'),
('127.0.0.1', '2010-01-12', 89, '1263264291'),
('127.0.0.1', '2010-01-14', 54, '1263482540'),
('127.0.0.1', '2010-01-15', 57, '1263506901'),
('127.0.0.1', '2010-02-11', 30, '1265831568'),
('127.0.0.1', '2010-02-13', 2, '1266032303'),
('127.0.0.1', '2010-02-14', 3, '1266115347'),
('127.0.0.1', '2010-02-15', 15, '1266195235'),
('127.0.0.1', '2010-02-18', 1, '1266499945'),
('127.0.0.1', '2010-02-22', 5, '1266856332'),
('127.0.0.1', '2010-02-25', 46, '1267103145'),
('127.0.0.1', '2010-05-12', 10, '1273654648'),
('127.0.0.1', '2010-05-16', 195, '1274026185'),
('127.0.0.1', '2010-05-17', 2, '1274029517'),
('127.0.0.1', '2010-05-19', 1, '1274279374'),
('127.0.0.1', '2010-05-27', 16, '1274967085'),
('127.0.0.1', '2010-05-30', 4, '1275192045'),
('127.0.0.1', '2010-05-31', 13, '1275271939'),
('127.0.0.1', '2010-06-05', 1, '1275676869'),
('127.0.0.1', '2010-06-06', 2, '1275842170'),
('127.0.0.1', '2010-06-15', 3, '1276572924'),
('127.0.0.1', '2010-06-22', 206, '1277221605'),
('127.0.0.1', '2010-08-02', 17, '1280754660'),
('127.0.0.1', '2010-08-20', 7, '1282285305'),
('127.0.0.1', '2010-08-30', 21, '1283185430'),
('127.0.0.1', '2010-08-31', 53, '1283207455'),
('127.0.0.1', '2010-09-02', 133, '1283402651'),
('127.0.0.1', '2010-09-05', 35, '1283702206'),
('127.0.0.1', '2010-09-13', 10, '1284370291'),
('127.0.0.1', '2010-09-17', 12, '1284662303'),
('127.0.0.1', '2010-09-22', 2, '1285091212'),
('127.0.0.1', '2010-09-23', 47, '1285254071'),
('127.0.0.1', '2010-09-26', 32, '1285512806'),
('127.0.0.1', '2010-09-27', 48, '1285529871'),
('127.0.0.1', '2011-01-19', 18, '1295395096'),
('127.0.0.1', '2011-01-21', 6, '1295580166'),
('127.0.0.1', '2011-01-22', 3, '1295639704'),
('127.0.0.1', '2011-01-25', 2, '1295895420'),
('127.0.0.1', '2011-01-27', 20, '1296145564'),
('127.0.0.1', '2011-01-28', 5, '1296150116'),
('127.0.0.1', '2011-02-01', 10, '1296555613'),
('127.0.0.1', '2011-02-02', 1, '1296657225'),
('127.0.0.1', '2011-02-05', 3, '1296875908'),
('127.0.0.1', '2011-02-07', 5, '1297090649'),
('127.0.0.1', '2011-02-09', 182, '1297254341'),
('127.0.0.1', '2011-02-10', 268, '1297355704'),
('127.0.0.1', '2011-02-16', 6, '1297824002'),
('127.0.0.1', '2011-02-17', 2, '1297945065'),
('127.0.0.1', '2011-12-28', 12, '1325081007'),
('127.0.0.1', '2011-12-29', 13, '1325167281'),
('127.0.0.1', '2011-12-31', 34, '1325296088'),
('127.0.0.1', '2012-01-02', 1, '1325449458'),
('127.0.0.1', '2012-01-03', 55, '1325601219'),
('127.0.0.1', '2012-01-04', 1, '1325630436'),
('127.0.0.1', '2012-02-08', 86, '1328720292'),
('127.0.0.1', '2012-02-09', 110, '1328798857'),
('127.0.0.1', '2012-02-10', 87, '1328871532'),
('127.0.0.1', '2012-02-11', 16, '1328899301'),
('127.0.0.1', '2012-03-31', 87, '1333186737'),
('127.0.0.1', '2012-04-01', 69, '1333248528'),
('127.0.0.1', '2012-04-02', 9, '1333338582'),
('127.0.0.1', '2012-04-03', 31, '1333456570'),
('127.0.0.1', '2012-04-04', 2, '1333498207'),
('127.0.0.1', '2012-04-05', 5, '1333628029'),
('127.0.0.1', '2012-04-08', 22, '1333871463'),
('127.0.0.1', '2012-04-09', 109, '1333972788'),
('127.0.0.1', '2012-04-10', 70, '1334024998'),
('127.0.0.1', '2012-05-01', 8, '1335889888'),
('127.0.0.1', '2012-05-02', 17, '1335935829'),
('127.0.0.1', '2012-05-27', 6, '1338133681'),
('127.0.0.1', '2012-05-29', 22, '1338304361'),
('127.0.0.1', '2012-05-30', 5, '1338389383'),
('127.0.0.1', '2012-05-31', 5, '1338408772'),
('127.0.0.1', '2012-06-01', 5, '1338567612'),
('127.0.0.1', '2012-07-01', 10, '1341152776'),
('127.0.0.1', '2012-07-29', 12, '1343572702'),
('127.0.0.1', '2012-07-30', 15, '1343658587'),
('127.0.0.1', '2012-07-31', 179, '1343743877'),
('127.0.0.1', '2012-08-03', 11, '1344000498'),
('127.0.0.1', '2012-08-08', 28, '1344364863'),
('127.0.0.1', '2012-08-09', 7, '1344477542'),
('127.0.0.1', '2012-08-10', 1, '1344601882'),
('::1', '2016-08-10', 5, '1470847090'),
('::1', '2016-08-11', 6, '1470905350'),
('::1', '2016-08-23', 20, '1471936652'),
('::1', '2016-08-24', 3, '1472006952'),
('::1', '2016-08-26', 9, '1472225905'),
('::1', '2016-08-27', 9, '1472312808'),
('::1', '2016-08-28', 5, '1472360575'),
('::1', '2016-08-29', 6, '1472488993'),
('127.0.0.1', '2016-08-29', 11, '1472489073'),
('::1', '2016-08-30', 8, '1472547550');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_sub` int(5) NOT NULL,
  `nama_sub` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `link_sub` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_main` int(5) NOT NULL,
  `id_submain` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y',
  `adminsubmenu` enum('Y','N') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `link_sub`, `id_main`, `id_submain`, `aktif`, `adminsubmenu`) VALUES
(2, 'Visi dan Misi', 'statis-2-visidanmisi.html', 3, 0, 'Y', 'N'),
(3, 'Struktur Organisasi', 'statis-3-strukturorganisasi.html', 3, 0, 'Y', 'N'),
(4, 'Ekonomi', 'kategori-21-ekonomi.html', 5, 0, 'N', 'N'),
(5, 'Hiburan', 'kategori-23-hiburan.html', 5, 0, 'Y', 'N'),
(6, 'Olahraga', 'kategori-2-olahraga.html', 5, 0, 'Y', 'N'),
(7, 'Politik', 'kategori-22-politik.html', 5, 0, 'Y', 'N'),
(8, 'Teknologi', 'kategori-19-teknologi.html', 5, 0, 'Y', 'N'),
(11, 'Manajemen Modul', '?module=modul', 14, 0, 'N', 'Y'),
(10, 'Identitas Web', '?module=identitas', 14, 0, 'N', 'Y'),
(12, 'Manajemen User', '?module=user', 14, 0, 'N', 'Y'),
(13, 'Manajemen Template', '?module=templates', 14, 0, 'N', 'Y'),
(14, 'Menu Utama', '?module=menuutama', 15, 0, 'N', 'Y'),
(15, 'Sub Menu', '?module=submenu', 15, 0, 'N', 'Y'),
(16, 'Kategori Berita', '?module=kategori', 16, 0, 'N', 'Y'),
(17, 'Berita', '?module=berita', 16, 0, 'N', 'Y'),
(18, 'Komentar', '?module=komentar', 16, 0, 'N', 'Y'),
(19, 'Halaman Statis', '?module=halamanstatis', 16, 0, 'N', 'Y'),
(20, 'Tag / Label', '?module=tag', 16, 0, 'N', 'Y'),
(21, 'Sensor Kata', '?module=katajelek', 16, 0, 'N', 'Y'),
(22, 'Album', '?module=album', 52, 0, 'N', 'Y'),
(23, 'Galeri Foto', '?module=galerifoto', 52, 0, 'N', 'Y'),
(24, 'Download', '?module=download', 52, 0, 'N', 'Y'),
(25, 'Agenda', '?module=agenda', 53, 0, 'N', 'Y'),
(26, 'Poling', '?module=poling', 53, 0, 'N', 'Y'),
(27, 'Sekilas Info', '?module=sekilasinfo', 53, 0, 'N', 'Y'),
(30, 'ShoutBox', '?module=shoutbox', 53, 0, 'N', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tag_seo` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `nama_tag`, `tag_seo`, `count`) VALUES
(1, 'Palestina', 'palestina', 7),
(2, 'Gaza', 'gaza', 11),
(9, 'Tenis', 'tenis', 5),
(10, 'Sepakbola', 'sepakbola', 7),
(8, 'Laskar Pelangi', 'laskar-pelangi', 2),
(11, 'Amerika', 'amerika', 19),
(12, 'George Bush', 'george-bush', 3),
(13, 'Browser', 'browser', 9),
(14, 'Google', 'google', 3),
(15, 'Israel', 'israel', 5),
(16, 'Komputer', 'komputer', 25),
(17, 'Film', 'film', 9),
(19, 'Mobil', 'mobil', 0),
(21, 'Gayus', 'gayus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `pembuat`, `folder`, `aktif`) VALUES
(1, 'Standar', 'Lukmanul Hakim', 'templates/standar', 'N'),
(2, 'Building', 'Lukmanul Hakim', 'templates/building', 'N'),
(3, 'eL jQuery', 'Lukmanul Hakim', 'templates/eljquery', 'N'),
(4, 'eL jQuery versi 2', 'Lukmanul Hakim', 'templates/eljquery2', 'N'),
(5, 'eL jQuery ala Yahoo', 'Lukmanul Hakim', 'templates/eljquery-yahoo', 'Y'),
(7, 'Sandbox', 'Ahmad Nugraha', 'templates/sandbox', 'N'),
(8, 'Just Simple Blue', 'Dian Pamungkas', 'templates/blue', 'N'),
(10, 'Poeji', 'Puji Kartono', 'templates/poeji', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@detik.com', '08238923848', 'admin', 'N', '5eqoh02e7hjknsj76u84qio1t1'),
('sinto ', '958f62f9f8b7f348d08943189fda3b15', 'Sinto Gendeng', 'sinto@detik.com', '09945849545', 'user', 'N', 'bc6538b608d50de51baed7e8642d8186'),
('joko', '4e5ad0dc4d478726661c8c2b3ea31777', 'Joko Sembung', 'joko@detik.com', '0895485045958', 'user', 'N', '4e5ad0dc4d478726661c8c2b3ea31777'),
('wiro', '7577bfe4fecd40c43e6140344d90ce0e', 'Wiro Sableng', 'wiro@detik.com', '038039403948', 'user', 'N', 'fb8c1878ba35faf15d16dc46ff599c42'),
('wiros', 'dcdd932ea3418387ef2f06644303389e', 'wiryo', 'wiryo@sableng', '98797', 'user', 'N', '25005d71e4f9a670ebf111888a0916b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indexes for table `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `katajelek`
--
ALTER TABLE `katajelek`
  ADD PRIMARY KEY (`id_jelek`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id_main`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`id_poling`);

--
-- Indexes for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  ADD PRIMARY KEY (`id_sekilas`);

--
-- Indexes for table `shoutbox`
--
ALTER TABLE `shoutbox`
  ADD PRIMARY KEY (`id_shoutbox`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `halamanstatis`
--
ALTER TABLE `halamanstatis`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `katajelek`
--
ALTER TABLE `katajelek`
  MODIFY `id_jelek` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id_main` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `poling`
--
ALTER TABLE `poling`
  MODIFY `id_poling` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sekilasinfo`
--
ALTER TABLE `sekilasinfo`
  MODIFY `id_sekilas` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shoutbox`
--
ALTER TABLE `shoutbox`
  MODIFY `id_shoutbox` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

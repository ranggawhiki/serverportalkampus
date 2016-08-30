<?php
	//Custom Page Navigation untuk semua berita
	class pageNavi_All{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halberita'])) {
				$posisi = 0;
				$_GET['halberita'] = 1;
			} else {
				$posisi = ($_GET['halberita'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"halberita-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"halberita-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"halberita-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"halberita-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"halberita-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"halberita-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"halberita-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}
	
	//Custom Page Navigation untuk detail kategori
	class pageNavi_Cat{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halkategori'])) {
				$posisi = 0;
				$_GET['halkategori'] = 1;
			} else {
				$posisi = ($_GET['halkategori'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"halkategori-".$_GET[id]."-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"halkategori-".$_GET[id]."-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"halkategori-".$_GET[id]."-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"halkategori-".$_GET[id]."-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"halkategori-".$_GET[id]."-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"halkategori-".$_GET[id]."-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"halkategori-".$_GET[id]."-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}
	
	//Custom Page Navigation untuk semua agenda
	class pageNavi_Agenda{
		
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halagenda'])) {
				$posisi = 0;
				$_GET['halagenda'] = 1;
			} else {
				$posisi = ($_GET['halagenda'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"halagenda-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"halagenda-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"halagenda-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"halagenda-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"halagenda-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"halagenda-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"halagenda-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}

	//Custom Page Navigation untuk semua agenda
	class pageNavi_Download{

		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['haldownload'])) {
				$posisi = 0;
				$_GET['haldownload'] = 1;
			} else {
				$posisi = ($_GET['haldownload'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"haldownload-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"haldownload-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"haldownload-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"haldownload-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"haldownload-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"haldownload-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"haldownload-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}

	//Custom Page Navigation
	class pageNavi_Album{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halgaleri'])) {
				$posisi = 0;
				$_GET['halgaleri'] = 1;
			} else {
				$posisi = ($_GET['halgaleri'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"halgaleri-".$_GET[id]."-1.html\"></a>";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"halgaleri-".$_GET[id]."-".$prev.".html\"></a>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"halgaleri-".$_GET[id]."-".$i.".html\">".$i."</a>";
			}
			$angka .= "<span class=\"current\">".$halaman_aktif."</span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"halgaleri-".$_GET[id]."-".$i.".html\">".$i."</a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"halgaleri-".$_GET[id]."-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<a class=\"nextpostslink\" href=\"halgaleri-".$_GET[id]."-".$next.".html\"></a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<a class=\"last\" href=\"halgaleri-".$_GET[id]."-".$jmlhalaman.".html\"></a>";
				}
			}
			
			return $link_halaman;
		}
	}

?>
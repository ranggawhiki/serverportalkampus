<?php
                  $kategori=mysql_query("SELECT nama_kategori, kategori.id_kategori, kategori_seo,  
                                         COUNT(berita.id_kategori) AS jml 
                                         FROM kategori LEFT JOIN berita 
                                         ON berita.id_kategori=kategori.id_kategori 
                                         WHERE kategori.aktif='Y'  
                                         GROUP BY nama_kategori");
                  while($k=mysql_fetch_array($kategori)){
                    $nama_kategori=strtoupper($k[nama_kategori]);
                    echo "<li><a href=kategori-$k[id_kategori]-$k[kategori_seo].html title='Ada $k[jml] berita pada kategori $k[nama_kategori]'> 
                    <span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">$nama_kategori</a></li>";
                  }
?>

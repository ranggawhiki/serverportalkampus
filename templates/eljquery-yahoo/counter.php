<?php

// diadaptasi dari griya-parfum.co.cc

// proteksi IP
$counter_expire = 600;

// setting database 
$counter_host = "localhost";
$counter_user = "root";
$counter_password = "";
$counter_database = "dblokomedia";

$counter_connected = true;

// konek database
$link = @mysql_connect($counter_host, $counter_user, $counter_password);
if (!$link) 
{
 	// klo gak konek
	$counter_connected = false;
	echo "Counter: " . mysql_error();
}
else
{
	// seleksi database
	$db_selected = @mysql_select_db($counter_database, $link);
	if (!$db_selected) 
	{
		// klo gak keseleksi
		$counter_connected = false;
		echo "Counter: " . mysql_error();
	}
}

if ($counter_connected == true) 
{
   $ignore = false; 
   
   // dapetin info counter
   $sql = "select * from counter_values";
   $res = mysql_query($sql);
   
   // bila kosong
   if (mysql_num_rows($res) == 0)
   {	  
	  $sql = "INSERT INTO `counter_values` (`id`, `day_id`, `day_value`, `week_id`, `week_value`, `month_id`, `month_value`, `year_id`, `year_value`, `all_value`, `record_date`, `record_value`) VALUES ('1', '" . date("z") . "',  '1', '" . date("W") . "', '1', '" . date("n") . "', '1', '" . date("Y") . "',  '1',  '1',  NOW(),  '1')";
	  mysql_query($sql);

	  $sql = "select * from counter_values";
      $res = mysql_query($sql);
	  
	  $ignore = true;
   }   
   $row = mysql_fetch_assoc($res);
   
   $day_id = $row['day_id'];
   $day_value = $row['day_value'];
   $week_id = $row['week_id'];
   $week_value = $row['week_value'];
   $month_id = $row['month_id'];
   $month_value = $row['month_value'];
   $year_id = $row['year_id'];
   $year_value = $row['year_value'];
   $all_value = $row['all_value'];
   $record_date = $row['record_date'];
   $record_value = $row['record_value'];
   
   $counter_agent = (isset($_SERVER['HTTP_USER_AGENT'])) ? addslashes(trim($_SERVER['HTTP_USER_AGENT'])) : "";
   $counter_time = time();
   $counter_ip = trim(addslashes($_SERVER['REMOTE_ADDR'])); 
   
   // coret bots
   if (substr_count($counter_agent, "bot") > 0)
      $ignore = true;
      
   // hapus sisa IP
   if ($ignore == false)
   {
      $sql = "delete from counter_ips where unix_timestamp(NOW())-unix_timestamp(visit) > $counter_expire"; 
      mysql_query($sql);
   }
      
   // cek yg masuk
   if ($ignore == false)
   {
      $sql = "select * from counter_ips where ip = '$counter_ip'";
      $res = mysql_query($sql);
      if (mysql_num_rows($res) == 0)
      {
         // insert
	     $sql = "INSERT INTO counter_ips (ip, visit) VALUES ('$counter_ip', NOW())";
   	     mysql_query($sql);
      }
      else
      {
         $ignore = true;
	     $sql = "update counter_ips set visit = NOW() where ip = '$counter_ip'";
	     mysql_query($sql);
      }
   }
   
   // online?
   $sql = "select * from counter_ips";
   $res = mysql_query($sql);
   $online = mysql_num_rows($res);
      
   // add counter
   if ($ignore == false)
   {     	  
      // Hari
	  if ($day_id == date("z")) 
	  {
	     $day_value++; 
	  }
	  else 
	  {
	     $day_value = 1;
		 $day_id = date("z");
	  }
	  
	  // minggu
	  if ($week_id == date("W")) 
	  {
	     $week_value++; 
	  }
	  else 
	  { 
	     $week_value = 1;
		 $week_id = date("W");
      }
	  
      // bulan
	  if ($month_id == date("n")) 
	  {
	     $month_value++; 
	  }
	  else 
	  {
	     $month_value = 1;
		 $month_id = date("n");
      }
	  
	  // tahun
	  if ($year_id == date("Y")) 
	  {
	     $year_value++; 
	  }
	  else 
	  {
	     $year_value = 1;
		 $year_id = date("Y");
      }
	  
	  // total
	  $all_value++;
		 
	  // rekam jejak
	  if ($day_value > $record_value)
	  {
	     $record_value = $day_value;
	     $record_date = date("Y-m-d H:i:s");
	  }
		 
	  
	  $sql = "update counter_values set day_id = '$day_id', day_value = '$day_value', week_id = '$week_id', week_value = '$week_value', month_id = '$month_id', month_value = '$month_value', year_id = '$year_id', year_value = '$year_value', all_value = '$all_value', record_date = '$record_date', record_value = '$record_value' where id = 1";
	  mysql_query($sql);  
   }	  
   
   
// DAFTAR COUNTER-NYA 	
?>
       <li>Pengunjung Online &nbsp;&nbsp;: &nbsp;<? echo $online; ?></li>
       <li>Hits Hari Ini &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<? echo $day_value; ?></li>
	   <li>Hits Minggu Ini &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<? echo $week_value; ?></li>
	   <li>Hits Bulan Ini &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<? echo $month_value; ?></li>
	   <li>Hits Tahun Ini &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<? echo $year_value; ?></li>
	   <li>IP Anda: <? echo $record_value; ?> (<? echo date("d.m.Y", strtotime($record_date)) ?>) </li>
    
   
<?
}
?>


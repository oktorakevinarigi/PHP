<?php
// Misal sekarang adalah tanggal 10 Maret, 2001, 5:16:18 pm

$today = date("F j, Y, g:i a");                 // March 10, 2001, 5:16 pm
echo $today;
echo "<br>";

$today = date("m.d.y");                         // 03.10.01 (Bulan Tanggal Tahun)
echo $today;
echo "<br>";

$today = date("j, n, Y");                       // 10, 3, 2001 (Tanggal Bulan Tahun)
echo $today;
echo "<br>";

$today = date("Ymd");                           // 20010310 (Tahun Bulan Tanggal)
echo $today;
echo "<br>";

$today = date('h-i-s, j-m-y, it is w Day');     // 05-16-18, 10-03-01,
// 1631 1618 6 Satpm01
echo $today;
echo "<br>";

$today = date('\i\t \i\s \t\h\e jS \d\a\y.');   // it is the 10th day.
echo $today;
echo "<br>";

$today = date("D M j G:i:s T Y");               // Sat Mar 10 17:16:18 MST 2001
echo $today;
echo "<br>";

$today = date('H:m:s \m \i\s\ \m\o\n\t\h');     // 17:03:18 m is month
echo $today;
echo "<br>";

$today = date("H:i:s");                         // 17:16:18
echo $today;
echo "<br>";

$today = getdate();                             //menampilakn dalam bentuk array
print_r($today);
echo "<br>";

echo date("M-d-Y", mktime(0, 0, 0, 10, 25, 1994))."<br>";
echo date("M-d-Y", mktime(0, 0, 0, 13, 1, 1997))."<br>";
echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 1998))."<br>";
echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 98))."<br>";

$besok  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
$bulankemaren = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
$tahundepan  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);

echo "Besok : ".date("d M Y",$besok)."<br>";
echo "Bulan kemaren : ".date("M Y", $bulankemaren)."<br>";
echo "Tahun depan: ".date("Y", $tahundepan)."<br>";


//Fungsi ini digunakan untuk mengubah string tanggal/waktu (bahasa inggris) ke timestamp Unix.
echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";


$minggudepan = time() + (7 * 24 * 60 * 60);
                   // 7 hari; 24 jam; 60 menit; 60 detik
echo 'Sekarang:       '. date('Y-m-d') ."\n<br>";
echo 'Minggu Depan: '. date('Y-m-d', $minggudepan) ."\n<br>";
// atau menggunakan strtotime():
echo 'Minggu Depan: '. date('Y-m-d', strtotime('+1 week')) ."\n<br>";


//Mencari selisih hari antara 2 tanggal
$tgl1 = "25-10-2010";
$tgl2 = "27-10-2010";

$selisih = strtotime($tgl2) -  strtotime($tgl1);
echo $selisih;
$hari = $selisih/(60*60*24);
                //60 detik * 60 menit * 24 jam = 1 hari

echo "Selisih tanggal $tgl2 dan $tgl1 adalah $hari hari <br>";








function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");

		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}

	echo(DateToIndo("2011-08-25")); //Akan menghasilkan 25 Agustus 2011
  echo "<br>";




  function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
      if (trim ($timestamp) == '')
      {
              $timestamp = time ();
      }
      elseif (!ctype_digit ($timestamp))
      {
          $timestamp = strtotime ($timestamp);
      }
      # remove S (st,nd,rd,th) there are no such things in indonesia :p
      $date_format = preg_replace ("/S/", "", $date_format);
      $pattern = array (
          '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
          '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
          '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
          '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
          '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
          '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
          '/April/','/June/','/July/','/August/','/September/','/October/',
          '/November/','/December/',
      );
      $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
          'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
          'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
          'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
          'Oktober','November','Desember',
      );
      $date = date ($date_format, $timestamp);
      $date = preg_replace ($pattern, $replace, $date);
      $date = "{$date} {$suffix}";
      return $date;
  }


  $tanggal = date("y-m-d g:i a"); 
  echo indonesian_date ($tanggal);

?>

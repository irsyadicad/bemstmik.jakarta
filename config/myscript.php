<?php
function readmore($text, $length){
	$y = trim(strip_tags($text));
	if(strlen($y)<=$length){
		echo $y;
	}else{
		$y = substr($y,0,$length) . '...';
		echo $y;
	}
}
function seo_title($s) {
    $c = array (' ');
    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    
    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}
function tglberita($tgl){
					$tanggal = substr($tgl,8,2);
					$bulan   = ambilbulan(substr($tgl,5,2)); // konversi menjadi nama bulan bahasa indonesia
					$tahun   = substr($tgl,0,4);
					$tgl2 = $tanggal." ".$bulan." ".$tahun;
					return $tgl2;
}
function tglindo($tgl){
  $tanggal = substr($tgl,8,2);
  $bulan   = ambilbulanx(substr($tgl,5,2)); // konversi menjadi nama bulan bahasa indonesia
  $tahun   = substr($tgl,0,4);
  $day = date("D", strtotime(substr($tgl,0,10)));
  $day = ambilharix($day);
  return $day.", ".$tanggal.' '.$bulan.' '.$tahun;     
}
function ambilbulan($bln){
  if ($bln=="01") return "Januari";
  elseif ($bln=="02") return "Februari";
  elseif ($bln=="03") return "Maret";
  elseif ($bln=="04") return "April";
  elseif ($bln=="05") return "Mei";
  elseif ($bln=="06") return "Juni";
  elseif ($bln=="07") return "Juli";
  elseif ($bln=="08") return "Agustus";
  elseif ($bln=="09") return "September";
  elseif ($bln=="10") return "Oktober";
  elseif ($bln=="11") return "November";
  elseif ($bln=="12") return "Desember";
}
function ambilhari($day){
  if ($day=="Mon") return "Senin";
  elseif ($day=="Tue") return "Selasa";
  elseif ($day=="Wed") return "Rabu";
  elseif ($day=="Thu") return "Kamis";
  elseif ($day=="Fri") return "Jumat";
  elseif ($day=="Sat") return "Sabtu";
  elseif ($day=="Sun") return "Minggu";
}
?>

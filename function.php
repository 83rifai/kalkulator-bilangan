
<?php
$bilangan = array(0 => 'nol', 1=>'satu', 2=>'dua', 3=>'tiga', 4=>'empat', 5=>'lima',6=>'enam', 7=>'tujuh', 8=>'delapan', 9=>'sembilan' );

if($_POST){
	$explode = explode(' ',$_POST['bilangan']);
	echo $_POST['bilangan'] . " adalah ". $_GET['f']($explode);
}


function operator($explode){
	$operator = $explode[1];
	$hasil = 0;
	switch($operator){
		case "tambah":
			$hasil = array_search($explode[0],$GLOBALS['bilangan']) + array_search($explode[2],$GLOBALS['bilangan']) ;
			return terbilang($hasil);
		break;
		case "kali":
			$hasil = array_search($explode[0],$GLOBALS['bilangan']) * array_search($explode[2],$GLOBALS['bilangan']) ;
			return terbilang($hasil);
		break;
		case "kurang":
			$hasil = array_search($explode[0],$GLOBALS['bilangan']) - array_search($explode[2],$GLOBALS['bilangan']) ;
			return terbilang($hasil);
		break;
		case "bagi":
			$hasil = array_search($explode[0],$GLOBALS['bilangan']) / array_search($explode[2],$GLOBALS['bilangan']) ;
			return terbilang($hasil);
		break;
	}
}

function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}

function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} 
		
		return $temp;
	}

?>
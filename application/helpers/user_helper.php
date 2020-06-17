<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Fungsi ubah format tanggal
if ( !function_exists('format_tanggal') ) {
	
	function format_tanggal($tgl){
		if (!empty($tgl)) {
			$pecah = explode('-', $tgl);
			$hasil = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];

			return $hasil;
		}
	}

}


// Fungsi format angka ke rupiah
if ( !function_exists('format_rupiah') ) {

	function format_rupiah($angka){
		$rupiah = number_format($angka,0,',','.');
		return $rupiah;
	}

}

// Fungsi ubah format tanggal Indonesia
if ( !function_exists('format_tanggal_indo') ) {
	
	function format_tanggal_indo($tgllengkap){
		if (!empty($tgllengkap)) {
			$pecah = explode(' ', $tgllengkap);
			$tanggal = $pecah[0];
			$jam = $pecah[1];
			$waktu = explode(':', $jam);
			$j = $waktu[0];
			$m = $waktu[1];
			$d = $waktu[2];

			$BulanIndo = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);

			$hasil = $j.':'.$m.' &bull; '.$tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun;

			return $hasil;
		}
	}

}
// Fungsi ubah format tanggal Indonesia
if ( !function_exists('date_indo') ) {
	
	function date_indo($date){
		if (!empty($date)) {
			$tanggal = $date;

			$BulanIndo = array(0 => "00", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);

			$hasil = $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.' ';

			return $hasil;
		}
	}

}

// Fungsi Footer
if ( !function_exists('date_ago') ) {
	
	function date_ago($datetime, $full = FALSE){
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'Year',
			'm' => 'Month',
			'w' => 'Week',
			'd' => 'Day',
			'h' => 'Hour',
			'i' => 'Minute',
			's' => 'Second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

}

// Fungsi Year Footer
if ( !function_exists('version') ) {
	
	function version(){
		$version = '1.0.0';

		return $version;
	}

}

// Fungsi Footer
if ( !function_exists('footer') ) {
	
	function footer(){
		$copyright = 'Copyright &copy; ';
		$year = date('Y');
		$bullet = '<div class="bullet"></div>';
		$by = 'by <a href="https://mondayy.site/">Khai Zulfa</a>';

		$footer = $copyright.$year.$bullet.$by;

		return $footer;
	}

}
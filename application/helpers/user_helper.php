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

			$BulanIndo = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);
 
			$hasil = $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.$jam;

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
<?php
date_default_timezone_set('Asia/Jakarta');

$query_kursus = mysqli_query($koneksi,"select * from kursus where status='tersedia'");
if(mysqli_num_rows($query_kursus)>0){
	while($hasil = mysqli_fetch_assoc($query_kursus)){
	
		//cek tanggal
			$tanggal_kursus = strtotime(date("Y-m-d h:i A", strtotime($hasil['tanggal']." ".$hasil['waktu_mulai'])));
			$sekarang = strtotime(date("Y-m-d h:i A"));
			if($sekarang >= $tanggal_kursus){
				$query_update_kursus = mysqli_query($koneksi,"update kursus set status = 'tidak tersedia' where kode_kursus = '".$hasil['kode_kursus']."'");
			}
		

		//cek max peserta
		$query_jadwal = mysqli_query($koneksi,"select * from jadwal where kode_kursus = '".$hasil['kode_kursus']."' AND status = 'belum terlaksana' ");
		$total_peserta_jadwal = mysqli_num_rows($query_jadwal);
		if($total_peserta_jadwal>=$hasil['max_peserta']){
			$query_update_kursus = mysqli_query($koneksi,"update kursus set status = 'tidak tersedia' where kode_kursus = '".$hasil['kode_kursus']."'");
		}
		
	}
	
}
?>
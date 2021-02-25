<?php
include "koneksi.php";
$query_kursus = mysqli_query($koneksi,"select * from kursus");
if(mysqli_num_rows($query_kursus)>0){
	while($hasil = mysqli_fetch_assoc($query_kursus)){
		$tanggal_kursus = strtotime($hasil['tanggal']);
		$sekarang = strtotime(date("Y-m-d"));
		if($sekarang > $tanggal_kursus){
			$query_update_kursus = mysqli_query($koneksi,"update kursus set status = 'tidak tersedia' where kode_kursus = '".$hasil['kode_kursus']."'");
		}
	}
	
}
?>
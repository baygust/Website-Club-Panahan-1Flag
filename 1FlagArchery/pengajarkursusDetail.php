<!DOCTYPE html>
<html lang="en">
<head>
  <title>1Flag Archery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bs4/1_bootstrap-4.3.1.min.css" >
<style>
.nav-item:hover {
		background-color: black;
	}

	.nav-item .active{
		background-color: white;
	}

	#warna_navigasi{
	background-color:dark;
	}

	#konten{
		background-color:#F8F8FF; 
		color:black;
	}
</style>
<?php 
session_start();
include "koneksi.php"; 

if(isset($_SESSION['hak_akses'])){
	if($_SESSION['hak_akses']=="peserta"||$_SESSION['hak_akses']=="admin"){
		header('Location: logout.php');
	}
}else{
	header('Location: logout.php');
}

if(!isset($_REQUEST['kode_kursus'])){
		echo "<script>alert('data tidak ada'); window.location.href='akunPengajarJadwal.php';</script>";
}else{
	$query_ambil_kursus= mysqli_query($koneksi,"select * from kursus where kode_kursus = '".$_REQUEST['kode_kursus']."' and 
	status = 'tidak tersedia' and kode_pengajar = '".$_SESSION['kode_pengajar']."'");
	if(mysqli_num_rows($query_ambil_kursus)>0){
		$hasil_kursus = mysqli_fetch_assoc($query_ambil_kursus);
		
		$query_pengajar =  mysqli_query($koneksi, "select * from pengajar where kode_pengajar='".$hasil_kursus['kode_pengajar']."'");
		$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
		
	}else{
		echo "<script>alert('data tidak ada'); window.location.href='akunPengajarJadwal.php';</script>";
	}
}

?>

</head>
<?php
if(isset($_POST['terlaksana'])){
	$query_update_jadwal = mysqli_query($koneksi,"update jadwal set status = 'sudah terlaksana' where kode_kursus='".$_REQUEST['kode_kursus']."'");
	if($query_update_jadwal){
		$query_update_kursus = mysqli_query($koneksi,"update kursus set status = 'sudah terlaksana' where kode_kursus='".$_REQUEST['kode_kursus']."'");
		if($query_update_jadwal){
			echo "<script>alert('data berhasil diperbaharui'); window.location.href='akunPengajarJadwal.php';</script>";
		}else{
			echo "<script>alert('gagal perbaharui tabel kursus');</script>";
		}
	}else{
		echo "<script>alert('gagal perbaharui tabel jadwal');</script>";
	}
}

?>
<body >

	<!-- awal Bagian navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="warna_navigasi" >
	<!-- Brand -->
	<span class="navbar-brand" ><img src="logo.png" width="50" height="50" class="rounded-circle"></span>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="navigasi">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item ">
        <a class="nav-link" href="akunPengajarJadwal.php">Jadwal Mengajar</a>
		</li>
		<li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
		</li>
    </ul>
  </div>
</nav>
<!-- Akhir Bagian navbar -->

<br>
<div class="container-fluid">
<h3><b>Detail Data Kursus</b></h3>
<hr> 
<form action="" method="post">
  <div class="row py-3" id="konten">
    <div class="col-sm-6">
	  <div class="form-group">
			<label>Nama Kursus :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['nama_kursus']; ?>" autocomplete="off"  readonly>
	  </div>

	  <div class="form-group">
			<label>Jenis Kursus :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['jenis_kursus']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Nama Pengajar:</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_pengajar['nama']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Status Kursus:</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['status']; ?>" autocomplete="off" readonly>
	  </div>
	  	  <div class="form-group">
			<label>Tanggal (Hari-Bulan-Tahun):</label> 
			<input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($hasil_kursus['tanggal'])); ?> " autocomplete="off" readonly>
	  </div>
	</div>
 
	<div class="col-sm-6">

	  <div class="form-group">
			<label>Maximal Peserta (max 99 peserta):</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['max_peserta']; ?>" autocomplete="off" readonly>
	  </div>
	  
	  <div class="form-group">
			<label>Waktu Mulai :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['waktu_mulai']; ?>" autocomplete="off" readonly>
	  </div>
	   <div class="form-group">
			<label>Waktu Selesai :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['waktu_selesai']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Biaya :</label> 
			<input type="text" class="form-control" value="Rp.<?php echo $hasil_kursus['biaya']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<input type="submit" class="btn btn-success" value="Sudah Terlaksana" name="terlaksana">

	  </div>
		
	</div>
  </div>
</form>

	<br>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>

<?php mysqli_close($koneksi);?>
</body>
</html>
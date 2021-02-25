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
	footer{
	position:absolute;
	bottom:0;
	width:100%;
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
		if($_SESSION['hak_akses']=="pengajar"||$_SESSION['hak_akses']=="admin"){
			header('Location: logout.php');
		}
	}else{
		header('Location: logout.php');
	}

	?>

	</head>

	<body>
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
		<li class="nav-item">
			<a class="nav-link" href="index.php">Beranda</a>
		</li>
		<?php 
		if(isset($_SESSION['hak_akses'])){
			echo '
			<li class="nav-item active">
			<a class="nav-link" href="akunPeserta.php">Akun( '.$_SESSION['username'].' )</a>
			</li>';
		}else{
			echo'
			<li class="nav-item ">
			<a class="nav-link" href="akun.php">Akun</a>
			</li>';
		}
		?>
		<li class="nav-item">
			<a class="nav-link" href="tentangkami.php">Tentang Kami</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="bantuan.php">Bantuan</a>
		</li>
		<?php 
		if(isset($_SESSION['hak_akses'])){
			echo '
			<li class="nav-item">
			<a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
			</li>';
		}
		?>
		</ul>
	</div>
	</nav>
	<!-- Akhir Bagian navbar -->
	<?php
	$query_jadwal = mysqli_query($koneksi,"select * from jadwal where kode_peserta = '".$_SESSION['kode_peserta']."'");


	?>
	<div class="container-fluid"> 
	<?php 
	if(mysqli_num_rows($query_jadwal)>0){
	?>  
		<div class="col-sm-12 pt-2">
		<h3><b>Jadwal Anda</b></h3>
		<hr>
			<div class="table-responsive " >
				<table class="table table-bordered" id="konten">
				<thead>
					<tr>
						<th><center>Kode Jadwal</center></th>
						<th><center>Nama Kursus</center></th>
						<th><center>Jenis Kursus</center></th>
						<th><center>Nama Pengajar</center></th>
						<th><center>Tanggal Kursus</center></th>
						<th><center>Waktu</center></th>
						<th><center>Biaya</center></th>
						<th><center>Status</center></th>
						<th><center>Tanggal Pesan</center></th>
						<th><center>Cetak</center></th>
					</tr>
				</thead>
			<?php
			while($hasil_jadwal = mysqli_fetch_assoc($query_jadwal)){
				$query_kursus = mysqli_query($koneksi,"select * from kursus where kode_kursus = '".$hasil_jadwal['kode_kursus']."'");
				$hasil_kursus = mysqli_fetch_assoc($query_kursus);
				$query_pengajar = mysqli_query($koneksi,"select * from pengajar where kode_pengajar = '".$hasil_kursus['kode_pengajar']."'");
				$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
			?>
				<tbody>
					<tr>
						<td><?php echo $hasil_jadwal['kode_jadwal']?> </td>
						<td><?php echo $hasil_kursus['nama_kursus']?> </td>
						<td><?php echo $hasil_kursus['jenis_kursus']?> </td>
						<td><?php echo $hasil_pengajar['nama']?> </td>
						<td><?php echo date('d M Y', strtotime($hasil_kursus['tanggal'])); ?></td>
						<td><?php echo $hasil_kursus['waktu_mulai'];?> - <?php echo $hasil_kursus['waktu_selesai'];?>  </td>
						<td><?php echo $hasil_kursus['biaya']?></td>
						<td><?php echo $hasil_jadwal['status']?> </td>
						<td><?php echo date('d M Y', strtotime($hasil_jadwal['tanggal_pesan']));?> </td>
						<td><a href="cetak.php?kode_jadwal=<?php echo $hasil_jadwal["kode_jadwal"]; ?>"><button id="tombol">Cetak</button></a></td>
					</tr>
				</tbody>
			<?php
			}
			?>
				</table>
			</div>
		</div>
	<?php
	}else{
		echo "tidak ada jadwal";
	}
	?>
	</div>
	<footer class="bg-dark text-white mt-4 " >
		<div class="container">
			<div class="row pt-3">
				<div class="col text-center">
				<p>Copyright 2019</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
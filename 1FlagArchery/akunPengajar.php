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
	?>
	</head>
	<?php
	if(isset($_POST['ubah'])){
		header("Location: akunPengajarUbah.php");
	}
	if(isset($_POST['password'])){
		header("Location: akunPengajarUbahPass.php");
	}
	?>

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
			<li class="nav-item active">
			<a class="nav-link" href="akunPengajar.php">Pengajar ( <?php echo $_SESSION['username']; ?> )</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="akunPengajarJadwal.php">Jadwal Mengajar</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
			</li>
		</ul>
	</div>
	</nav>
	<!-- Akhir Bagian navbar -->
	<?php
	$query_pengajar = mysqli_query($koneksi,"select * from pengajar where username = '".$_SESSION['username']."'");
	$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
	?>
	<div class="container-fluid">   
		<div class="col-sm-12 pt-3" >
		<label><h3><b>Data Diri Anda (<?php echo $_SESSION['username']?>)</b></h3></label>

			<div class="col-sm-5 border border-dark py-2" id="konten" >
			<form action="" method="post">
				<div class="form-group">
					<label>Username Anda : </label>
					<input type="text" class="form-control" name="username" value="<?php echo $hasil_pengajar['username']; ?>" autocomplete="off" readonly>
				</div>
				<div class="form-group">
					<label>Nama Anda : </label>
					<input type="text" class="form-control" name="nama" value="<?php echo $hasil_pengajar['nama']; ?>" autocomplete="off" readonly>
				</div>
				<div class="form-group">
					<label>Nomor Telepon Anda : </label>
					<input type="number" class="form-control" name="no_telp" value="<?php echo $hasil_pengajar['no_telp']; ?>" autocomplete="off" readonly>
				</div>
				<div class="form-group">
					<label>Email Anda : </label>
					<input type="email" class="form-control" name="email" value="<?php echo $hasil_pengajar['email']; ?>" autocomplete="off" readonly>
				</div>
				<div class="form-group">
					<label>Alamat Anda : </label>
					<textarea class="form-control" name="alamat" rows="3" autocomplete="off" readonly><?php echo $hasil_pengajar['alamat']; ?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning" name="ubah">Ubah Data Diri</button>
			
					<button type="submit" class="btn btn-warning" name="password">Ubah Password</button>
				</div>
			</form>
			</div>
		</div>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
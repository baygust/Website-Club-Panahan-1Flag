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
	footer{
	position:absolute;
	bottom:0;
	width:100%;
	}
	</style>
	<?php 
	session_start();
	include "koneksi.php"; 
	if(isset($_SESSION['hak_akses'])){
		header('Location: logout.php');
	}
	?>

	</head>
	<?php
	if(isset($_POST['daftar'])){
		$query_cek = mysqli_query($koneksi,"select * from login where username = '".$_POST['username']."'");
		if(mysqli_num_rows($query_cek)){
			echo "<script>alert('username sudah digunakan');</script>";
		}else{
			$query_login = mysqli_query($koneksi,"insert into login values('".$_POST['username']."','".$_POST['password']."','peserta')");
			if($query_login){
				$query_login = mysqli_query($koneksi,"insert into peserta values('','".$_POST['username']."','".$_POST['nama']."',
				'".$_POST['no_telp']."','".$_POST['email']."','".$_POST['alamat']."')");
				if($query_login){
					echo "<script>alert('anda berhasil daftar silahkan login'); window.location.href='akun.php';</script>";
				}else{
					echo "<script>alert('gagal masuk data tabel peserta');</script>";
				}
			}else{
				echo "<script>alert('gagal masuk data tabel login');</script>";
			}
		}
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

		<li class="nav-item">
			<a class="nav-link" href="akun.php">Akun</a>
		</li>
		</ul>
	</div>
	</nav>
	<!-- Akhir Bagian navbar -->

	<div class="container-fluid">
		<div class="col-sm-12 ">
		<label class="mt-3"><h3><b>Daftar Peserta</b></h3></label>
			<form action="" method="post">
			<div class="row mb-3 py-3 border border-dark" id="konten">
			<!--awal kiri-->
			<div class="col-sm-6 ">
				<div class="form-group">
					<label>Nama :</label> <input type="text" name="nama" class="form-control" value="" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>No Telp :</label> <input type="number" name="no_telp" class="form-control" value=""autocomplete="off" required >
				</div>
				<div class="form-group">
				<label>Email :</label> <input type="email" name="email" class="form-control" value=""autocomplete="off" required>
				</div>
				<div class="form-group">
				<label>Alamat :</label> <textarea name="alamat" class="form-control" rows="5" autocomplete="off" required></textarea>
				</div>
			</div>
			<!--akhir kiri-->
			<!--awal kanan-->
			<div class="col-sm-6">
			
				<div class="form-group">
					<label>Username :</label> <input type="text" name="username" class="form-control" value="" autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>Password :</label> <input type="password" name="password" class="form-control" value=""autocomplete="off" required>
				</div>
				<div class="form-group">
					<label>Konfirmasi Password :</label> <input type="password" name="konfirmasi_password" class="form-control" value="" autocomplete="off" required>
				</div>
			
			</div>
			<!--akhir kanan-->
			<div class="col-sm-12">
			<input type="submit" class="btn btn-primary" value="Daftar" name="daftar" >
			</div>
		
			</div>
			</form>
		</div>
	</div>



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
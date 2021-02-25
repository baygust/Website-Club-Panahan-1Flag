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
	#konten{
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
	if(isset($_POST['login'])){
		if($_POST['username'] == "" || $_POST['password'] == ""){
		echo "<script>alert('data masih ada yang kosong');</script>";
		}else{
			$query = mysqli_query($koneksi, "select * from login where username = '".$_POST['username']."'");
			$hasil = mysqli_fetch_assoc($query);
				if($hasil['hak_akses']=="peserta"){
					if($_POST['password']===$hasil['password']){
						$query_peserta = mysqli_query($koneksi, "select * from peserta where username = '".$_POST['username']."'");
						$hasil_peserta = mysqli_fetch_assoc($query_peserta);
						
						$_SESSION['hak_akses']= $hasil['hak_akses'];
						$_SESSION['username']= $hasil['username'];
						$_SESSION['kode_peserta']= $hasil_peserta['kode_peserta'];
						
						echo "<script>alert('berhasil login peserta');</script>";
						header('Location: index.php');
					}else{
						echo "<script>alert('data salah');</script>";
					}
				}else if($hasil['hak_akses']=="pengajar"){
					if($_POST['password']===$hasil['password']){
						$query_pengajar = mysqli_query($koneksi, "select * from pengajar where username = '".$_POST['username']."'");
						$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
						
						$_SESSION['hak_akses']= $hasil['hak_akses'];
						$_SESSION['username']= $hasil['username'];
						$_SESSION['kode_pengajar']= $hasil_pengajar['kode_pengajar'];
						
						echo "<script>alert('berhasil login pengajar');</script>";
						header('Location: akunPengajar.php');
					}else{
						echo "<script>alert('data salah');</script>";
					}
				}else if($hasil['hak_akses']=="admin"){
					echo "<script>alert('anda tidak berhak mengakses halaman ini');</script>";
				}else{
					echo "<script>alert('data salah');</script>";
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
			<a class="nav-link" href="index.php">Beranda</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="akun.php">Akun</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="tentangkami.php">Tentang Kami</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="bantuan.php">Bantuan</a>
		</li>
		</ul>
	</div>
	</nav>
	<!-- Akhir Bagian navbar -->

	<div class="container-fluid">   
		<div class="col-sm-4 offset-sm-4 border border-dark mt-5" id="konten">
		<br>
			<form action="" method="post">
				<div class="form-group">
					<label for="data_username"><b>Username</b></label>
					<input type="text" class="form-control" id="data_username" name="username" placeholder="Username" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="data_password"><b>Password</b></label>
					<input type="password" class="form-control" id="data_password" name="password" placeholder="Password" autocomplete="off">
				</div>
				<label><a href="daftar.php">Belum Daftar ?</a></label>
				<center><button type="submit" class="btn btn-primary" id="tombol" name="login">Login</button></center>
			</form>
		<br>
		</div>
	</div>

	<footer class="bg-dark text-white >
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
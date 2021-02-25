	<!DOCTYPE html>
	<html lang="en">
	<head>
	<title>Admin</title>
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


	if($_SESSION['hak_akses']!= "admin"){
		header('Location: index.php');
	}


	?>

	</head>
	<?php

	if(!isset($_REQUEST['kode_gambar'])){
			echo "<script>alert('data tidak ada'); window.location.href='datagaleri.php';</script>";
	}else{
		$query_ambil= mysqli_query($koneksi,"select * from galeri where kode_gambar = '".$_REQUEST['kode_gambar']." '");
		if(mysqli_num_rows($query_ambil)>0){
			$hasil = mysqli_fetch_assoc($query_ambil);
		}else{
			echo "<script>alert('data tidak ada'); window.location.href='datagaleri.php';</script>";
		}
	}

	if(isset($_POST['ya'])){
		if(unlink("gambar_galeri/".$hasil['gambar']."")){
			$query_delete = mysqli_query($koneksi, "delete from galeri where kode_gambar = '".$_REQUEST['kode_gambar']."'");
			if(!$query_delete){
				echo "<script>alert('data galeri gagal dihapus');</script>";
			}else{
				echo "<script>alert('data galeri berhasil dihapus'); window.location.href='datagaleri.php';</script>";
			}
		}
	}
	if(isset($_POST['tidak'])){
		echo "<script>window.location.href='datagaleri.php';</script>";
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
		<ul class="navbar-nav">

		<li class="nav-item ">
			<a class="nav-link" href="datagaleri.php">Data Galeri</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
		</li>
		</ul>
	</div>
	</nav>
	<br>
	<div class="container-fluid">
	<h3><b>Hapus Data Galeri</b></h3>
	<hr>
	</div>
	<br>
	<div class="container">
		<div class="table-responsive "> 

	<table class="table table-bordered" id="konten">
		<thead>
		<tr>
		
			<th><center>Kode Foto</center></th>
			<th><center>Foto</center></th>
			<th><center>Tanggal Masuk<br>D-M-Y</center></th>
		</tr>
		</thead>
		<tbody>
			<tr>
			<td><?php echo $hasil['kode_gambar']; ?></td>
			<td><center><img src="gambar_galeri/<?php echo $hasil['gambar']; ?>" width="100" height="100"/></center></td>
			<td><?php echo date('d-m-Y', strtotime($hasil['tanggal'])); ?> </td>

		</tr>
		</tbody>

	</table>

	</div>
	<center>
	<label>Yakin Data ini Dihapus ?</label>
	<form action="" method="post" class="form-inline justify-content-center">
		<input type="submit" class="btn btn-dark" value="Ya" name="ya">&nbsp;
		<input type="submit" class="btn btn-dark" value="Tidak" name="tidak">
	</form>
	</center>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
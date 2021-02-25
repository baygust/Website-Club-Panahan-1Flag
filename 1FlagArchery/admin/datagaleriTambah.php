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
		<li class="nav-item">
			<a class="nav-link" href="datagaleri.php">Data Galeri</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php"><button id="tombol">Logout</button></a>
		</li>
		</ul>
	</div>
	</nav>
	<br>
	<?php
	if(isset($_POST['tambah'])){
		$target_dir = "gambar_galeri/";
		$target_file = $target_dir . basename($_FILES["file_foto"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			echo "<script>alert('Format file salah , hanya foto berformat JPG, JPEG & PNG  yang diperbolehkan.');</script>";
		}else{
			$temp = explode(".", $_FILES["file_foto"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$query_tambah_galeri = mysqli_query($koneksi,"insert into galeri values(null,'".$newfilename."',now())");
			if(!$query_tambah_galeri){
				echo "<script>alert('Gagal tambah nama foto ditabel galeri');</script>";
			}else{
				if (move_uploaded_file($_FILES["file_foto"]["tmp_name"],$target_dir.$newfilename)) {			
					echo "<script>alert('gambar telah ditambahkan.'); window.location.href='datagaleri.php';</script>";
				} else {
					echo "<script>alert('Gagal Tambah gambar');</script>";
				}
			}
		}
	}
	?>
	<div class="container-fluid">
	<h3><b>Tambah Data Galeri</b></h3>
	<hr>
		<div class="col-sm-4">
		<form action="" method="post" enctype="multipart/form-data" >
			<div class="form-group">
				<label for="data_file">File Foto</label>
				<input type="file" class="form-control-file" name="file_foto" id="data_file" accept="image/*" onchange="tampilkanPreview(this,'preview')" required>
			</div>
			<div class="form-group" >
				<img src="" style="background-color:white;" id="preview" width="250" height="250"/>
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-success" value="Tambah Foto" name="tambah">
			</div>
		</form>
		</div>
	</div>
	<br>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<script src = "previewImage.js"></script>


	<?php mysqli_close($koneksi);?>
	</body>
	</html>
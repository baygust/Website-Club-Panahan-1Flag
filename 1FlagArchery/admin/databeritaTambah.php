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
			<a class="nav-link" href="databerita.php">Data Berita</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
		</li>
		</ul>
	</div>
	</nav>
	<br>
	<?php
	if(isset($_POST['tambah'])){
		$target_dir = "gambar_berita/";
		$target_file = $target_dir . basename($_FILES["file_foto"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
			echo "<script>alert('Format file salah , hanya foto berformat JPG, JPEG & PNG  yang diperbolehkan.');</script>";
		}else{
			$temp = explode(".", $_FILES["file_foto"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$query_tambah_berita = mysqli_query($koneksi,"insert into berita values(null,'".$_POST['judul_berita']."','".$_POST['isi_berita']."',
			'".$newfilename."',now())");
			if(!$query_tambah_berita){
				echo "<script>alert('Gagal tambah nama foto ditabel berita');</script>";
				
			}else{
				if (move_uploaded_file($_FILES["file_foto"]["tmp_name"],$target_dir.$newfilename)) {			
					echo "<script>alert('data berita telah ditambahkan.'); window.location.href='databerita.php';</script>";
				} else {
					echo "<script>alert('Gagal Tambah Foto');</script>";
				}
			}
		}
	}
	?>
	<div class="container-fluid">
	<?php 

	?>
	<h3><b>Tambah Data Berita</b></h3>
	<hr>
		<div class="col-sm-4 pt-2 pb-1" id="konten">
		<form action="" method="post" enctype="multipart/form-data" >
			<div class="form-group">
				<label for="data_judul_berita">Judul Berita</label>
				<input type="text" class="form-control" name="judul_berita" id="data_judul_berita" required>
			</div>
			<div class="form-group">
				<label for="data_isi_berita">Isi Berita</label>
				<textarea class="form-control" name="isi_berita" id="data_isi_berita" rows="5" required></textarea>
			</div>
			<div class="form-group">
				<label for="data_file">File Foto</label>
				<input type="file" class="form-control-file" name="file_foto" id="data_file" accept="image/*" onchange="tampilkanPreview(this,'preview')" required>
				<br>
				<img src="" id="preview" width="250" height="250"/>
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-dark" value="Tambah Berita" name="tambah">
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
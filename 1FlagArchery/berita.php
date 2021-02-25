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
		if($_SESSION['hak_akses']=="pengajar"||$_SESSION['hak_akses']=="admin"){
			header('Location: logout.php');
		}
	}

	if(!isset($_REQUEST['kode_berita'])){
			echo "<script>alert('data tidak ada'); window.location.href='index.php';</script>";
	}else{
		$query_ambil= mysqli_query($koneksi,"select * from berita where kode_berita = '".$_REQUEST['kode_berita']." '");
		if(mysqli_num_rows($query_ambil)>0){
			$hasil = mysqli_fetch_assoc($query_ambil);
		}else{
			echo "<script>alert('data tidak ada'); window.location.href='index.php';</script>";
		}
	}
	?>

		</head  >
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
			<li class="nav-item">
			<a class="nav-link" href="akunPeserta.php">Akun( '.$_SESSION['username'].' )</a>
			</li>';
		}else{
			echo'
			<li class="nav-item ">
			<a class="nav-link" href="akun.php">Akun</a>
			</li>';
		}
		?>
		<li class="nav-item ">
			<a class="nav-link" href="tentangkami.php">Tentang Kami</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="bantuan.php">Bantuan</a>
		</li>
		<?php if(isset($_SESSION['hak_akses'])){
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

	<div class="container-fluid ">   
		<div class="col-sm-6 offset-sm-3 mt-3 py-2 border border-dark " id="konten">
		<label><h3><?php echo $hasil['judul'];?></h3></label><br>
		<label>Tanggal Terbit : <?php echo date('d M Y', strtotime($hasil['tanggal'])); ?></label> 	
		<br>
		<center><img src="admin/gambar_berita/<?php echo $hasil['gambar'];?>" class="img-fluid"></center>
		<br>
		<label><?php echo $hasil['isi'];?></label>
		</div>
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
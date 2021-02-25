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
	include "cek_waktu_kursus.php";


	if(isset($_SESSION['hak_akses'])){
		if($_SESSION['hak_akses']=="pengajar"||$_SESSION['hak_akses']=="admin"){
			header('Location: logout.php');
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
		<li class="nav-item active">
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
		<li class="nav-item ">
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

	<div class="jumbotron text-center">
	<h1 class="display-4">Selamat Datang Di Website 1Flag Archery</h1>
	<hr class="my-4">
	<!-- awal Bagian Carousel -->
	<?php 
	$a=0;
	$query_gambar_carousel = mysqli_query($koneksi,"select * from galeri");
	if(mysqli_num_rows($query_gambar_carousel)>0){

	?>

		<div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
			<div class="carousel-inner">
	<?php 

		while($data_gambar_carousel = mysqli_fetch_assoc($query_gambar_carousel)){
		
	?>
				<div class="carousel-item <?php if ($a==0){ echo "active"; } ?>">
					<img class="d-block w-100" src="admin/gambar_galeri/<?php echo $data_gambar_carousel['gambar']; ?>" 
					style="width:100%; height: 500px;">
				</div>
	<?php
		$a++;
		}

	?>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon bg-danger" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<?php
		}else{
			echo '
			<div class="container-fluid my-3">
				<div class="col-sm-12">
					<h3>Tidak ada Gambar Carousel</h3>
				</div>
			</div>
			';
		}
	?>
	<!-- akhir Bagian Carousel -->
	</div>


	<!-- awal Bagian kursus -->
	<?php
	$query_kursus = mysqli_query($koneksi,"select * from kursus where status = 'tersedia'");
	if(mysqli_num_rows($query_kursus)>0){	
	?>
	<div class="container-fluid pt-3 pb-3"  >
			<div class="col mb-5 text-center ">
	        <h3><b>Kursus Kami</b></h3>
			</div>
		<div class="row">	
	<?php
	while ($hasil_kursus = mysqli_fetch_assoc($query_kursus)) {
	$query_pengajar = mysqli_query($koneksi,"select nama from pengajar where kode_pengajar = '".$hasil_kursus['kode_pengajar']."'");
	$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
	?>	
    <div class="row px-4 mx-4 py-4">
	<div class="card" style="width: 18rem;">
		<div class="card-body">
			<h5 class="card-title text-center font-weight-bold"><?php echo $hasil_kursus['jenis_kursus'];?></h5>
			<label><b>Nama Kursus</b></label> 
			<br> 
			<?php echo $hasil_kursus['nama_kursus']; ?>
			<br> 
			<label><b>Nama Pengajar</b></label> 
			<br> 
			<?php echo $hasil_pengajar['nama']; ?>
			<br> 
			<a href="kursus.php?kode_kursus=<?php echo $hasil_kursus['kode_kursus']; ?>" ><button class="btn btn-info " "> Detail Kursus</button></a>
		</div>
	</div>
	</div>
			<?php
			}
			?>
	</div>	
	</div>
	<?php 
	}else{
		echo '
		<div class="container-fluid my-3">
			<div class="col-sm-12">
				<h3>Tidak ada jadwal kursus</h3>
			</div>
		</div>
		';
	}
	?>
	<!-- akhir Bagian kursus -->

	<!-- awal Bagian Berita -->

	<?php
	$query_berita = mysqli_query($koneksi,"select * from berita ORDER BY tanggal DESC");
	if(mysqli_num_rows($query_berita)>0){	
	?>
	<div class="container-fluid pb-4">
    <div class="row pt-4 mb-4">
        <div class="col text-center">
	        <h3><b>Berita klub</b></h3>
        </div>
    </div>
	<div class="row">
	<?php
	while ($hasil_berita = mysqli_fetch_assoc($query_berita)) {
	?>	
	<div class="row">
        <div class="col-3 mx-5 my-3">
        <div class="card" style="width:18rem;">
            <img class="card-img-top" src="admin/gambar_berita/<?php echo $hasil_berita['gambar']; ?>" width="100" height="150" >
            <div class="card-body">
                <h5 class="card-title"><?php echo $hasil_berita['judul']; ?></h5>
                <p class="card-text">Tanggal Terbit : <?php echo date('d M Y', strtotime($hasil_berita['tanggal']));?></p>
                <a href="berita.php?kode_berita=<?php echo $hasil_berita['kode_berita']; ?>" ><button class="btn btn-info" > Detail Berita</button></a>
            </div>
		</div>
    	</div>
    </div> 
			<?php
			}
			?>
			</div>
		</div>
	</div>
	<?php 
	}else{
		echo '
		<div class="container-fluid my-3">
			<div class="col-sm-12">
				<h3>Tidak ada Berita</h3>
			</div>
		</div>
		';
	}
	?>
	<!-- akhir Bagian berita -->

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
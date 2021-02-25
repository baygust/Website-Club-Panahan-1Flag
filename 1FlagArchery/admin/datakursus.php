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
	$record_per_page = 5;
	$page='';
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page = 1;
	}

	$start_from = ($page - 1)*$record_per_page;

	?>
	</head>
	<?php
	if(isset($_POST['cari'])){
		$querytabel = "select * from kursus where nama_kursus like '%$_POST[nama_kursus]%' LIMIT $start_from, $record_per_page";
		$page_query = "select * from kursus where nama_kursus like '%$_POST[nama_kursus]%'";
		
	}else{
		$querytabel = "select * from kursus LIMIT $start_from, $record_per_page";
		$page_query ="select * from kursus";
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
			<a class="nav-link" href="datapeserta.php">Data Peserta</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="datapengajar.php">Data Pengajar</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="datajadwal.php">Data Jadwal</a>
		</li>
		<li class="nav-item active">
			<a class="nav-link" href="datakursus.php">Data Kursus</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="datagaleri.php">Data Galeri</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="databerita.php">Data Berita</a>
		</li> 
		<li class="nav-item">
			<a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
		</li>
		</ul>
	</div>
	</nav>
	<br>
	<div class="container-fluid">
	<h3><b>Data Kursus</b></h3>
	<hr>
	<form class="form form-inline" action="" method="post">
		<div class="col-sm-12">
		Nama Kursus : &nbsp;
		<input type="text" class="form-control" name="nama_kursus">&nbsp;
		<input type="submit" class="btn btn-info"  name="cari" value="Cari">&nbsp;
			<input type="submit" class="btn btn-info" name="tampilkan_semua" value="Tampilkan Semua"> 
		

		</div>
	</form>
			<hr>
		<div class="col-sm-12">
			<a href="datakursusTambah.php"><button class="btn btn-success">Tambah Data Kursus</button></a>&nbsp;
		
		</div>
	</div>
	<br>
	<div class="container">
		<?php 
			$hasil= mysqli_query($koneksi, $querytabel);

			if(mysqli_num_rows($hasil) > 0) {
		?>
		<div class="table-responsive "> 

	<table class="table table-bordered" id="konten">
		<thead>
		<tr>
		
			<th><center>Kode Kursus</center></th>
			<th><center>Nama Kursus</center></th>
			<th><center>Jenis Kursus</center></th>
			<th><center>Nama Pengajar</center></th>
			<th><center>Status</center></th>
			<th><center>Aksi</center></th>
		</tr>
		</thead>
		<tbody>
		
		<?php
				while($baris = mysqli_fetch_assoc($hasil)) {
		?>
			<tr>
			<td><?php echo $baris['kode_kursus']; ?></td>
			<td> <?php echo $baris['nama_kursus']; ?></td>
			<td><?php echo $baris['jenis_kursus']; ?></td>
	<?php
	$query_pengajar = "select * from pengajar where kode_pengajar='$baris[kode_pengajar]'";
	$data_pengajar= mysqli_query($koneksi, $query_pengajar);
	$hasil_pengajar = mysqli_fetch_assoc($data_pengajar);
	?>
			<td><?php echo $hasil_pengajar['nama']; ?></td>
			<td><?php echo $baris['status']; ?></td>
			<td>
				<center>
					<a href="datakursusDetail.php?kode_kursus=<?php echo $baris["kode_kursus"]; ?>"><button class="btn-dark">Detail</button></a>
				</center>
				
			</td>
		</tr>
		</tbody>
		<?php 
				} 
		?>
	</table>
	<center>
		<ul class="pagination justify-content-center">
	<?php 
			$page_result = mysqli_query($koneksi, $page_query);
			$total_records= mysqli_num_rows($page_result);
			$total_pages = ceil($total_records/$record_per_page);
			for ($i=1; $i<=$total_pages; $i++)
				{
				echo '<li class="page-item"><a class="page-link"  href="datakursus.php?page='.$i.'">'.$i.'</a></li>';	
				}
	?>
		</ul> 
	</center>
	</div>
	<?php 
			}else{
				echo "Data Kosong";
			}
			
			?>

	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="bs4/2_jquery-3.3.1.min.js"></script>
	<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
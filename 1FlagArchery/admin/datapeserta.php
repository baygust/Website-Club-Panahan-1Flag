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
	</head>
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
	<?php
	if(isset($_POST['cari'])){
		$querytabel = "select * from peserta where nama=
		'$_POST[nama]' LIMIT $start_from, $record_per_page";
		$page_query = "select * from peserta where nama='$_POST[nama]'";
		
	}else{
		
			$querytabel = "select * from peserta LIMIT $start_from, $record_per_page";
			$page_query ="select * from peserta";
		
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
		<li class="nav-item active">
			<a class="nav-link" href="datapeserta.php">Data Peserta</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="datapengajar.php">Data Pengajar</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="datajadwal.php">Data Jadwal</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="datakursus.php">Data Kursus</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="datagaleri.php">Data Galeri</a>
		</li>
		<li class="nav-item ">
			<a class="nav-link" href="databerita.php">Data Berita</a>
		</li> 
		<li class="nav-item">
			<a class="nav-link" href="logout.php"><button id="tombol">Logout</button></a>
		</li>
		</ul>
	</div>
	</nav>
	<br>
	<div class="container-fluid">
	<h3><b>Data Peserta</b></h3>
	<hr>
		<div class="col-sm-12">
		<form class="form form-inline" action="" method="post">
		Nama Peserta: &nbsp; 
		<input type="text" class="form-control" name="nama">&nbsp; 
		<input type="submit" class="btn btn-info" name="cari" value="Cari">&nbsp; 
		
			<input type="submit" class="btn btn-info" name="tampilkan_semua" value="Tampilkan Semua">
		</form>
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
		
			<th><center>Kode Peserta</center></th>
			<th><center>Username</center></th>
			<th><center>Nama</center></th>
			<th><center>Email</center></th>
			<th><center>No Telp</center></th>
			<th><center>Alamat</center></th>
			<th><center>Aksi</center></th>
			
		</tr>
		</thead>
		<tbody>
		
		<?php
				while($baris = mysqli_fetch_assoc($hasil)) {
		?>
			<tr>
			<td><?php echo $baris['kode_peserta']; ?></td>
			<td><?php echo $baris['username']; ?></td>
			<td><?php echo $baris['nama']; ?></td>
			<td><?php echo $baris['email']; ?></td>
			<td><?php echo $baris['no_telp']; ?></td>
			<td><?php echo $baris['alamat']; ?></td>
			<td>
				<center>
					<a href="datapesertahapus.php?kode_peserta=<?php echo $baris["kode_peserta"]; ?>"><button class="btn btn-danger">Hapus</button></a>
					<a href="datapesertaLupaPassword.php?kode_peserta=<?php echo $baris["kode_peserta"]; ?>"><button class="btn btn-secondary">Lupa Password</button></a>
				</center>
			</td>
		</tr>
		</tbody>
		<?php 
				} 
		?>
	</table>
	</div>
		<ul class="pagination justify-content-center">
	<?php 
			$page_result = mysqli_query($koneksi, $page_query);
			$total_records= mysqli_num_rows($page_result);
			$total_pages = ceil($total_records/$record_per_page);
			for ($i=1; $i<=$total_pages; $i++)
				{
				echo '<li class="page-item"><a class="page-link" href="datapeserta.php?page='.$i.'">'.$i.'</a></li>';	
				}
	?>
		</ul> 

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
	</body>
	<?php mysqli_close($koneksi);?>
	</body>
	</html>
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

		<body >
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
				<li class="nav-item ">
				<a class="nav-link" href="akunPengajar.php">Pengajar ( <?php echo $_SESSION['username']; ?> )</a>
				</li>
				<li class="nav-item active">
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
		$querytabel ="select * from kursus where kode_pengajar = '".$_SESSION['kode_pengajar']."' LIMIT $start_from, $record_per_page";
		$page_query ="select * from kursus where kode_pengajar = '".$_SESSION['kode_pengajar']."'";
		?>

		<div class="container mt-3">
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
				<td><?php echo $baris['nama_kursus']; ?></td>
				<td><?php echo $baris['jenis_kursus']; ?></td>
		<?php
		$query_pengajar = "select * from pengajar where kode_pengajar='$baris[kode_pengajar]'";
		$data_pengajar= mysqli_query($koneksi, $query_pengajar);
		$hasil_pengajar = mysqli_fetch_assoc($data_pengajar);
		?>
				<td><?php echo $hasil_pengajar['nama']; ?></td>
				<td><?php echo $baris['status']; ?></td>
				<td>
				<?php 
				if($baris['status']=="tidak tersedia"){
					?>
					<center>
						<a href="pengajarkursusDetail.php?kode_kursus=<?php echo $baris["kode_kursus"]; ?>"><button id="tombol">Detail</button></a>
					</center>	
				<?php
				}	
				?>	
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
					echo '<li class="page-item"><a class="page-link"  href="akunPengajarJadwal.php?page='.$i.'">'.$i.'</a></li>';	
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
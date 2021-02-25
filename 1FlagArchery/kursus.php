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
		date_default_timezone_set('Asia/Jakarta');
		if(isset($_SESSION['hak_akses'])){
			if($_SESSION['hak_akses']=="pengajar"||$_SESSION['hak_akses']=="admin"){
				header('Location: logout.php');
			}
		}


		if(!isset($_REQUEST['kode_kursus'])){
				echo "<script>alert('data tidak ada'); window.location.href='index.php';</script>";
		}else{
			$query_ambil= mysqli_query($koneksi,"select * from kursus where kode_kursus = '".$_REQUEST['kode_kursus']."' and status = 'tersedia'");
			if(mysqli_num_rows($query_ambil)>0){
				$hasil = mysqli_fetch_assoc($query_ambil);
				$query_pengajar= mysqli_query($koneksi,"select * from pengajar where kode_pengajar = '".$hasil['kode_pengajar']." '");
				if($query_pengajar){
					$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
				}else{
					echo "<script>alert('gagal ambil data pengajar');</script>";
				}
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
		<?php 
		if(isset($_POST['daftar'])){
			$query_cek_jadwal = mysqli_query($koneksi,"select * from jadwal where kode_peserta = '".$_SESSION['kode_peserta']."'AND status='belum terlaksana'");
			if(mysqli_num_rows($query_cek_jadwal)>0){
				echo "<script>alert('anda sudah terdaftar di jadwal latihan, selesaikan terlebih dahulu latihan yang telah dipilih sebelumnya');</script>";
			}else{
				$sekarang = date("Y-m-d");
				$query_insert = mysqli_query($koneksi,"insert into jadwal values(null,'".$_SESSION['kode_peserta']."','".$hasil['kode_kursus']."','belum terlaksana','".$sekarang."')");
				if($query_insert){
					echo "<script>alert('anda berhasil daftar'); window.location.href='index.php';</script>";
				}else{
						echo "<script>alert('gagal daftar');</script>";
				}
			}

			
		}

		?>
		<div class="container-fluid">
			<div class="col-sm-4 offset-sm-4 border border-dark  my-3 pt-2" id="konten">
					
					<div class="col-sm-12">
					<form method="post" action="">
						<div class="form-group">
							<b>Nama Kursus</b>
							<br>
							<?php echo $hasil['nama_kursus']; ?>
						</div>
						
						
						<div class="form-group">
							<b>Jenis Kursus</b>
							<br>
							<?php echo $hasil['jenis_kursus']; ?>
						</div>
						
						<div class="form-group">
							<b>Nama Pengajar</b>
							<br>
							<?php echo $hasil_pengajar['nama']; ?>
						</div>
						
						<div class="form-group">
							<b>Status Kursus</b>
							<br>
							<?php echo $hasil['status']; ?>
						</div>
						
						<div class="form-group">
							<b>Tanggal Kursus</b>
							<br>
							<?php echo date('d M Y', strtotime($hasil['tanggal'])); ?>
						</div>
						
						<div class="form-group">
							<b>Waktu Kursus</b>
							<br>
							<?php echo $hasil['waktu_mulai']; ?> - <?php echo $hasil['waktu_selesai']; ?>
						</div>
						
						<div class="form-group">
							<b>Biaya</b>
							<br>
							<?php echo "Rp.".$hasil['biaya']; ?>
						</div>
						<?php 
						if(isset($_SESSION['hak_akses'])){
						
						?>
						<center>
							<div class="form-group">
								<button type="submit" class="btn btn-success" name="daftar" >Daftar Kursus</button>
							</div>
						</center>
						<?php } ?>
					</form>
					</div>
					
			</div>	
		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="bs4/2_jquery-3.3.1.min.js"></script>
		<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
		<?php mysqli_close($koneksi);?>
		</body>
		</html>
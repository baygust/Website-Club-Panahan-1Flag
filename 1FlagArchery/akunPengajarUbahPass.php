<!DOCTYPE html>
<html lang="en">
<head>
  <title>Padma Yoga</title>
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

?>

</head>
<?php
	if(isset($_POST['ubah'])){
		if($_POST['password_lama']=="" ||$_POST['password_baru']=="" ||$_POST['konf_password_baru']==""){
			echo "<script>alert('data masih ada yang kosong');</script>";
		}else{
			//cek password sama dengan konfirmasi password  atau engga
			if($_POST['password_baru']===$_POST['konf_password_baru']){
				//cek password sama dengan database atau engga
				$query_cek_password = mysqli_query($koneksi,"select * from login where username = '".$_SESSION['username']."' and hak_akses = 'pengajar'");
				$hasil_cek_password = mysqli_fetch_assoc($query_cek_password);
				if($hasil_cek_password['password']=== $_POST['password_lama']){
					$query_update = mysqli_query($koneksi, "update login set password='".$_POST['password_baru']."'
					where username = '".$_SESSION['username']."'");
					if($query_update){
						echo "<script>alert('data berhasil diperbaharui'); window.location.href='akunPengajar.php';</script>";
					}else{
						echo "<script>alert('gagal update tabel peserta');</script>";
					}
				}else{
					echo "<script>alert('password lama salah');</script>";
				}
			}else{
				echo "<script>alert('password baru tidak sama dengan konfirmasi password baru');</script>";
			}
			
		}
		
	}
if(isset($_POST['batal'])){
	header('Location: akunPengajar.php');
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
		<li class="nav-item ">
        <a class="nav-link" href="akunPengajar.php">Pengajar ( <?php echo $_SESSION['username']; ?> )</a>
		</li>
		<li class="nav-item">
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
$query_pengajar = mysqli_query($koneksi,"select * from pengajar where username = '".$_SESSION['username']."'");
$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
?>
<div class="container-fluid">   
	<div class="col-sm-12 pt-3" >
	<label><h3><b>Data Diri Anda (<?php echo $_SESSION['username']?>)</b></h3></label>

		<div class="col-sm-5 border border-dark py-2" id="konten">
		<form action="" method="post">
			<div class="form-group">
				<label>Username Anda : </label>
				<input type="text" class="form-control" name="username" value="<?php echo $hasil_pengajar['username']; ?>" autocomplete="off" readonly>
			</div>
			<div class="form-group">
				<label>Password Lama : </label>
				<input type="password" class="form-control" name="password_lama" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Password Baru : </label>
				<input type="password" class="form-control" name="password_baru" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Konfirmasi Password Baru : </label>
				<input type="password" class="form-control" name="konf_password_baru" autocomplete="off">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-warning"name="ubah">Ubah Password</button>
				<button type="submit" class="btn btn-dark" name="batal" >Batal</button>
			</div>
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
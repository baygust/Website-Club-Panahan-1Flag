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
	footer{
	position:absolute;
	bottom:0;
	width:100%;
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
	  <li class="nav-item active">
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
<section class="about" id="konten">
      <div class="container">
        <div class="row mb-3 pt-3 ">
          <div class="col text-center">
            <h2>Cara Daftar Kursus</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 ">
		  <ol type="1">
			<li>Sebelum melakukan pendaftaran kursus memanah anda harus melakukan login</li>
			<li>Bila belum memiliki akun silahkan klik Akun pada bagian navbar website kemudian klik link "belum daftar?"</li>
			<li>Isi nama, nomor telepon, email, alamat, username dan ketik password anda lalu klik daftar </li>
			<li>Lalu lakukan login dengan akun yang sudah anda buat</li>
			<li>Klik Beranda di bagian navbar website dan pilih salah satu kursus yang tersedia yang anda mau ikuti dengan cara klik detail kursus</li>
			<li>Kemudian klik Daftar Kurus</li>
			<li>Klik Akun kemudian klik jadwal kursus saya untuk melihat detail kursus yang sudah didaftarkan</li>
			<li>Silahkan datang ke tempat latihan kami dan menunjukkan jadwal latihan anda untuk melakukan pembayaran dan memulai latihan</li>
		</ol> 
          </div>
        </div>
      </div>
    </section>

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
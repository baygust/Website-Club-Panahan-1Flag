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
	  <li class="nav-item active">
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

<div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="logo.png" class="rounded-circle img-thumbnail">
          <h1 class="display-4">1Flag Archery</h1>
          <h3 class="lead">We Fight 👊, We Learn 📖 to Achieve Glory 🏅.</h3>
        </div>
      </div>
    </div>

    <section class="about" >
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Tentang Kami</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 mb-4 text-center">
          <p class="text-justify"> 1Flag Archery merupakan klub olahraga memanah yang melatih keterampilan memanah dengan teknik yang benar. Seperti yang telah kita semua tahu, olahraga memanah adalah salah satu olahraga yang simple, namun memiliki teknis yang cukup rumit. Untuk bisa menembak, olahraga panahan cukup membutuhkan 2 alat saja, yaitu busur dan anak panah. Dalam metode memanah, agar bisa memanah dengan tepat, semua peserta yang ikut andil dalam panahan wajib hukumnya untuk bisa mengukur berapa derajat arah sudut antar celah sang pemanah dengan target, belum lagi mengukur petunjuk arah dan tingkat kecepatan anginnya. Tujuannya adalah, para peserta untuk menembak sejumlah lingkaran yang terdapat di dalam target, yang masing - masing dari lingkaran tersebut sudah ada beberapa nilai, dan juga tidak lupa jarak yang sudah ditentukan sebelumnya.</p>
          </div>
        </div>
      </div>
    </section>

        <section class="visi" >
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center ">
            <h2>Visi</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 mb-4 text-center ">
          <p>Menjadi tempat pelatihan olahraga panahan terbaik berbasis prestasi.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="misi">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Misi</h2>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-10 mb-4 ">
		  <ol type="1">
			<li>Memberikan pelatihan kepada atlet dengan tenaga profesional</li>
			<li>Mengedukasi atlet agar memahami olahraga panahan secara keseluruhan</li>
      <li>Membangun organisasi panahan yang terarah</li>
      <li>Sebagai wadah insan pemanah-pemanah berbakat</li>
      <li>Membuka wawasan masyarakat terhadap olahraga panahan yang sesungguhnya</li>
		  </ol> 
          </div>
        </div>
      </div>
    </section>

    <section class="fasilitas">
      <div class="container">
        <div class="row  mb-4">
          <div class="col text-center">
            <h2>Fasilitas Yang Disediakan</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 ">
		  <ol type="1">
			<li>Lapangan outdoor hingga 70m</li>
			<li>Peralatan memanah</li>
      <li>Target panahan</li>
      <li>Pelatih bersertifikat</li>
      <li>Jenis kursus yang ditawarkan pada klub kami antara lain Bronze, Silver, dan Gold. Perbedaan diantara ketiganya adalah dari segi durasi latihan, tingkatan pelatih, dan biaya yang harus dibayar.  </li>
		</ol> 
          </div>
        </div>
      </div>
    </section>

    <section class="tempat latihan" >
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Tempat Latihan</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 text-center ">
            <p>Lapangan Komplek Timah RT 001 RW 06 Pondok Labu Cilandak Jakarta Selatan DKI Jakarta, Pangkalan Jati Baru, Kec. Cinere, Kota Depok, Jawa Barat 16514</p>
          </div>
        </div>
      </div>
    </section>
    <div class="row justify-content-center mb-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2804.097912040728!2d106.80132053711796!3d-6.3170331500199195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee110fd158ad%3A0x4f979c64f147cb51!2sKomplek%20Timah%20Pondok%20Labu!5e0!3m2!1sid!2sid!4v1568833037219!5m2!1sid!2sid" width="800" height="600" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>

	<section class="informasi">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Informasi Lebih Lanjut</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 mb-4 ">
            <p>+62 878-8436-9871 (Sulthansyah)</p>
			      <p>+62 856-7411-115 (Sandhi)</p>
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
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
<?php mysqli_close($koneksi);?>
</body>
</html>
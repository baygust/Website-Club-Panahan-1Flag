
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
if(!isset($_REQUEST['kode_kursus'])){
		echo "<script>alert('data tidak ada'); window.location.href='datakursus.php';</script>";
}else{
	$query_ambil_kursus= mysqli_query($koneksi,"select * from kursus where kode_kursus = '".$_REQUEST['kode_kursus']." '");
	if(mysqli_num_rows($query_ambil_kursus)>0){
		$hasil_kursus = mysqli_fetch_assoc($query_ambil_kursus);
		
		$query_pengajar =  mysqli_query($koneksi, "select * from pengajar where kode_pengajar='".$hasil_kursus['kode_pengajar']."'");
		$hasil_pengajar = mysqli_fetch_assoc($query_pengajar);
		
	}else{
		echo "<script>alert('data tidak ada'); window.location.href='datakursus.php';</script>";
	}
}

?>

</head>
<?php
if(isset($_POST['ubah'])){
	header("Location: datakursusUbah.php?kode_kursus=".$hasil_kursus['kode_kursus']."");
}
if(isset($_POST['hapus'])){
	header("Location: datakursusHapus.php?kode_kursus=".$hasil_kursus['kode_kursus']."");
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
	  <li class="nav-item">
        <a class="nav-link" href="datakursus.php">Data Kursus</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container-fluid">
<h3><b>Detail Data Kursus</b></h3>

<form action="" method="post"> 
  <div class="row mt-4 py-2" id="konten">
    <div class="col-sm-6 ">
	  <div class="form-group">
			<label>Nama Kursus :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['nama_kursus']; ?>" autocomplete="off"  readonly>
	  </div>

	  <div class="form-group">
			<label>Jenis Kursus :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['jenis_kursus']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Nama Pengajar:</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_pengajar['nama']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Status Kursus:</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['status']; ?>" autocomplete="off" readonly>
	  </div>
	  	  <div class="form-group">
			<label>Tanggal (Hari-Bulan-Tahun):</label> 
			<input type="text" class="form-control" value="<?php echo date('d-m-Y', strtotime($hasil_kursus['tanggal'])); ?> " autocomplete="off" readonly>
	  </div>
	</div>
	<div class="col-sm-6">
	  <div class="form-group">
			<label>Maximal Peserta (max 99 peserta):</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['max_peserta']; ?>" autocomplete="off" readonly>
	  </div>
	  
	  <div class="form-group">
			<label>Waktu Mulai :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['waktu_mulai']; ?>" autocomplete="off" readonly>
	  </div>
	   <div class="form-group">
			<label>Waktu Selesai :</label> 
			<input type="text" class="form-control" value="<?php echo $hasil_kursus['waktu_selesai']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<label>Biaya :</label> 
			<input type="text" class="form-control" value="Rp.<?php echo $hasil_kursus['biaya']; ?>" autocomplete="off" readonly>
	  </div>
	  <div class="form-group">
			<input type="submit" class="btn btn-dark" value="Ubah" name="ubah">
			<input type="submit" class="btn btn-dark" value="Hapus" name="hapus">
	  </div>
	</div>
  </div>
</form>
	<br>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>

<?php mysqli_close($koneksi);?>
</body>
</html>
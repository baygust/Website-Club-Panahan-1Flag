
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

?>

</head>
<?php
if(isset($_POST['tambah'])){
	if($_POST['nama_kursus']==""  ||$_POST['jenis_kursus']=="" || $_POST['pengajar']=="" ||$_POST['tanggal']=="" || 
	$_POST['waktu_mulai']=="" ||$_POST['waktu_selesai']=="" || $_POST['biaya']=="" ){
		echo "<script>alert('Data masih ada yang kosong')</script>";
	}else{
		$waktu_mulai = date('h:i A', strtotime($_POST['waktu_mulai']));
		$waktu_selesai = date('h:i A', strtotime($_POST['waktu_selesai']));
		$query_kursus_tambah = mysqli_query($koneksi, "insert into kursus values (null,'".$_POST['nama_kursus']."','".$_POST['jenis_kursus']."',
		'".$_POST['pengajar']."','tersedia','".$_POST['tanggal']."','".$_POST['max_peserta']."','".$waktu_mulai."','".$waktu_selesai."',
		'".$_POST['biaya']."')");
		if($query_kursus_tambah){
			echo "<script>alert('data kursus berhasil ditambahkan'); window.location.href='datakursus.php';</script>";
		}else{
			echo "<script>alert('data kursus gagal ditambahkan');</script>";
			echo ("Error description: " . mysqli_error($koneksi));
		}
	}
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
 <h3><b>Tambah Data Kursus</b></h3>
<form class="form" action="" method="post">
  	 <div class="col-sm-4 mt-4 py-2" id="konten">
	
     
	  <div class="form-group">
			<label>Nama Kursus :</label> <input type="text" name="nama_kursus" class="form-control" value="" autocomplete="off" >
	  </div>


	  <div class="form-group">
			<label>Jenis Kursus :</label> 
			<select name="jenis_kursus" class="form-control">
				<option value="bronze">bronze</option>
				<option value="silver">silver</option>
				<option value="gold">gold</option>
			</select>
	  </div>
	  <div class="form-group">
			<label>Nama Pengajar:</label> 
			<select name="pengajar" class="form-control">
			<?php 
			echo "<option value=''>Pilih Pengajar</option>";
			$query_pengajar = mysqli_query($koneksi,"select * from pengajar");
			while($data_pengajar = mysqli_fetch_assoc($query_pengajar)){
				echo "<option value='".$data_pengajar['kode_pengajar']."'>".$data_pengajar['nama']."</option>";
			}
			?>
			</select>
	  </div>
	  <div class="form-group">
			<label>Tanggal (Bulan-Hari-Tahun):</label> <input type="date" name="tanggal" class="form-control" value=""autocomplete="off" >
	  </div>
	   <div class="form-group">
			<label>Maximal Peserta (max 10 peserta):</label> <input type="number" name="max_peserta" class="form-control" max="99" value=""autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Waktu Mulai :</label> <input type="time" name="waktu_mulai"  class="form-control" >
	  </div>
	   <div class="form-group">
			<label>Waktu Selesai :</label> <input type="time" name="waktu_selesai"  class="form-control" value=""autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Biaya :</label> <input type="number" name="biaya" class="form-control" value=""autocomplete="off" >
	  </div>

	
	  <input class="btn btn-success" type="submit" name="tambah" value="Simpan Data" > 
	  
    </div>

</form>	
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>

<?php mysqli_close($koneksi);?>
</body>
</html>
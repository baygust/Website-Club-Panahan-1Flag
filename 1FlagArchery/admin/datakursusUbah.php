
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
	$query_cek_jadwal = mysqli_query($koneksi,"select * from jadwal where kode_kursus = '".$_REQUEST['kode_kursus']."'");
	if(mysqli_num_rows($query_cek_jadwal)>0){
		echo "<script>alert('data tidak bisa diubah, data masih digunakan ditabel jadwal'); window.location.href='datakursusDetail.php?kode_kursus=".$_REQUEST['kode_kursus']."';</script>";
	}else{
		$query_ambil_kursus= mysqli_query($koneksi,"select * from kursus where kode_kursus = '".$_REQUEST['kode_kursus']." '");
		if(mysqli_num_rows($query_ambil_kursus)>0){
			$hasil_kursus = mysqli_fetch_assoc($query_ambil_kursus);
		}else{
			echo "<script>alert('data tidak ada'); window.location.href='datakursus.php';</script>";
		}
	}
}

?>

</head>
<?php
if(isset($_POST['ubah'])){
	if($_POST['nama_kursus']==""  ||$_POST['jenis_kursus']=="" || $_POST['pengajar']=="" ||$_POST['tanggal']=="" || 
	$_POST['waktu_mulai']=="" ||$_POST['waktu_selesai']=="" || $_POST['biaya']=="" ){
		echo "<script>alert('data masih ada yang kosong');</script>";
	}else{
	$waktu_mulai = date('h:i A', strtotime($_POST['waktu_mulai']));
	$waktu_selesai = date('h:i A', strtotime($_POST['waktu_selesai']));
	$query_ubah = mysqli_query($koneksi,"update kursus set nama_kursus='".$_POST['nama_kursus']."',
	jenis_kursus='".$_POST['jenis_kursus']."', kode_pengajar='".$_POST['pengajar']."', status='".$_POST['status']."',tanggal='".$_POST['tanggal']."',
	max_peserta='".$_POST['max_peserta']."',waktu_mulai='".$waktu_mulai."',waktu_selesai='".$waktu_selesai."',biaya='".$_POST['biaya']."' where
	kode_kursus = '".$_REQUEST['kode_kursus']."'");
	if($query_ubah){
		echo "<script>alert('data berhasil diubah'); window.location.href='datakursusDetail.php?kode_kursus=".$_REQUEST['kode_kursus']."';</script>";
	}else{
		echo "<script>alert('data gagal diubah'); </script>";
		echo ("error :".mysqli_error($koneksi));
	}
	}
}
if(isset($_POST['batal'])){
	header("Location: datakursusDetail.php?kode_kursus=".$hasil_kursus['kode_kursus']."");
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
<h3><b>Ubah Data Kursus</b></h3>
<form class="form" action="" method="post">
<div class="row mt-4 py-2" id="konten">
  	 <div class="col-sm-6">
	  <div class="form-group">
			<label>Nama Kursus :</label> 
			<input type="text" name="nama_kursus" class="form-control" value="<?php echo $hasil_kursus['nama_kursus']; ?>" autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Jenis Kursus :</label> 
			<select name="jenis_kursus" class="form-control">
				<option value="bronze" <?php if($hasil_kursus['jenis_kursus']=="bronze"){ echo "selected"; } ?>>bronze</option>
				<option value="silver"<?php if($hasil_kursus['jenis_kursus']=="silver"){ echo "selected"; } ?>>silver</option>
				<option value="gold"<?php if($hasil_kursus['jenis_kursus']=="gold"){ echo "selected"; } ?>>gold</option>
			</select>
	  </div>
	  <div class="form-group">
			<label>Nama Pengajar:</label> 
			<select name="pengajar" class="form-control" >
			<?php 
			$query_pengajar = mysqli_query($koneksi,"select kode_pengajar,nama from pengajar");
			while($data_pengajar = mysqli_fetch_assoc($query_pengajar)){
				echo "<option value='".$data_pengajar['kode_pengajar']."'";
				if($hasil_kursus['kode_pengajar'] == $data_pengajar['kode_pengajar']){
					echo "selected";
				}
				echo ">".$data_pengajar['nama']."</option>";
			}
			?>
			</select>
	  </div>
	  <div class="form-group">
			<label>Status Kursus :</label> 
			<select name="status" class="form-control" >
				<option value="tersedia" <?php if($hasil_kursus['status']=="tersedia"){ echo "selected";} ?>>tersedia</option>
				<option value="tidak tersedia"<?php if($hasil_kursus['status']=="tidak tersedia"){ echo "selected";} ?>>tidak tersedia</option>
			</select>
	  </div>
	  <div class="form-group">
			<label>Tanggal (Bulan-Hari-Tahun):</label> <input type="date" name="tanggal" class="form-control" value="<?php echo $hasil_kursus['tanggal']; ?>" autocomplete="off" >
	  </div>
	  </div>
	  <div class="col-sm-6">

	   <div class="form-group">
			<label>Maximal Peserta (max 99 peserta):</label> <input type="number" name="max_peserta" class="form-control" max="99" value="<?php echo $hasil_kursus['max_peserta']; ?>"autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Waktu Mulai :</label> <input type="time" name="waktu_mulai" value="<?php echo date("H:i",strtotime($hasil_kursus['waktu_mulai']));?>"  class="form-control" >
	  </div>
	   <div class="form-group">
			<label>Waktu Selesai :</label> <input type="time" name="waktu_selesai" class="form-control" value="<?php echo date("H:i",strtotime($hasil_kursus['waktu_selesai']));?>" autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Biaya :</label> <input type="number" name="biaya" class="form-control" value="<?php echo $hasil_kursus['biaya']; ?>" autocomplete="off" >
	  </div>
	  <div class="form-group">
			<input type="submit" class="btn btn-dark" value="Ubah Data" name="ubah">
			<input type="submit" class="btn btn-dark" value="Batal" name="batal">
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
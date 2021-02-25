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

?>
</head>
<?php


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
        <a class="nav-link" href="datapengajar.php">Data Pengajar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button id="tombol">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<?php 

if(!isset($_REQUEST['kode_pengajar'])){
		echo "<script>alert('data tidak ada'); window.location.href='datapengajar.php';</script>";
}else{
	$query_cek_kursus= mysqli_query($koneksi,"select * from kursus where kode_pengajar = '".$_REQUEST['kode_pengajar']." '");
	if(mysqli_num_rows($query_cek_kursus)>0){
		echo "<script>alert('data pengajar tidak bisa dihapus, masih ada ditabel kursus'); window.location.href='datapengajar.php';</script>";
	}else{
		$query_ambil_pengajar= mysqli_query($koneksi,"select * from pengajar where kode_pengajar = '".$_REQUEST['kode_pengajar']." '");
		if(mysqli_num_rows($query_ambil_pengajar)>0){
			$hasil_pengajar = mysqli_fetch_assoc($query_ambil_pengajar);
		}else{
			echo "<script>alert('data tidak ada'); window.location.href='datapengajar.php';</script>";
		}
	}
	
}

if(isset($_POST['ya'])){
	$ambil_pengajar = "select * from pengajar where kode_pengajar='$_REQUEST[kode_pengajar]'";
	$data_pengajar = mysqli_query($koneksi, $ambil_pengajar);
	$data = mysqli_fetch_assoc($data_pengajar);
	$username = $data['username'];
	
	$query_pengajar= "delete from pengajar where username='$username'";
	$delete_pengajar = mysqli_query($koneksi, $query_pengajar);
	if($delete_pengajar){
		$query_login= "delete from login where username='$username'";
		$delete_login = mysqli_query($koneksi, $query_login);
		if($delete_login){
			echo "<script> alert('Data Berhasil dihapus'); window.location.href='datapengajar.php'; </script>";
		}else{
			echo "delete login gagal";
		}	
	}else{
		echo "delete pengajar gagal";
	}

}
if(isset($_POST['tidak'])){
	header('Location: datapengajar.php');
	exit;
}
?>
<br>
<div class="container">

  	<div class="table-responsive "> 

  <table class="table table-bordered" id="konten">
    <thead>
      <tr>
	  
        <th><center>Kode Pengajar</center></th>
		<th><center>Username</center></th>
		<th><center>Nama</center></th>
		<th><center>No Telp</center></th>
		<th><center>Email</center></th>
		<th><center>Alamat</center></th>
		
      </tr>
    </thead>
    <tbody>

        <tr>
        <td><?php echo $hasil_pengajar['kode_pengajar']; ?></td>
		<td><?php echo $hasil_pengajar['username']; ?></td>
		<td><?php echo $hasil_pengajar['nama']; ?></td>
		<td><?php echo $hasil_pengajar['email']; ?></td>
		<td><?php echo $hasil_pengajar['no_telp']; ?></td>
		<td><?php echo $hasil_pengajar['alamat']; ?></td>
		
      </tr>
    </tbody>

  </table>
	<center>
	<label>Yakin Data ini Dihapus</label>
		<form action="" method="post" class="form-inline justify-content-center">
		<input type="submit" class="btn btn-dark" value="Ya" name="ya">&nbsp;
		<input type="submit" class="btn btn-dark" value="Tidak" name="tidak">
		</form>
	</center>

  </div>

</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
<?php mysqli_close($koneksi);?>
</body>
</html>
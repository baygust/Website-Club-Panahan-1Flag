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
if(isset($_POST['tambah'])){
	if($_POST['username']=="" ||$_POST['nama']=="" ||$_POST['no_telp']==""||$_POST['email']=="" || $_POST['alamat']=="" ){
		echo "<script>alert('Data masih ada yang kosong')</script>";
	}else{
		$cek_username= mysqli_query($koneksi, "select * from login where username = '$_POST[username]'");
		if(mysqli_num_rows($cek_username)>0){
			echo "<script>alert('Username sudah digunakan, ganti yang lain');</script>";
		}else{
				$query_login = mysqli_query($koneksi, "insert into login values ('$_POST[username]','12345','pengajar')");
				if($query_login){
					$query_pengajar = mysqli_query($koneksi, "insert into pengajar values (null,'$_POST[username]','$_POST[nama]','$_POST[no_telp]','$_POST[email]','$_POST[email]')");
					if($query_pengajar){
						echo "<script>alert('data pengajar berhasil ditambahkan, password 12345'); window.location.href='datapengajar.php';</script>";
					}else{
						echo "<script>alert('insert tabel pengajar gagal');</script>";
					}
				}else{
					echo "<script>alert('insert tabel login gagal');</script>";
				}
			
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
        <a class="nav-link" href="datapengajar.php">Data Pengajar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<br>
<div class="container-fluid">
  	<h3>Tambah Data Pengajar</h3>
	<hr>
	 <div class="col-sm-4 py-2 mb-2" id="konten">
	 
      <form class="form" action="" method="post">
	  <div class="form-group">
			<label>Username :</label> <input type="text" name="username" class="form-control" value="" autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Nama :</label> <input type="text" name="nama" class="form-control" value="" autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>No Telp :</label> <input type="number" name="no_telp" class="form-control" value=""autocomplete="off" >
	  </div>
	  <div class="form-group">
			<label>Email :</label> <input type="email" name="email" class="form-control" value=""autocomplete="off" >
	  </div>
	   <div class="form-group">
			<label>Alamat :</label> <textarea name="alamat" class="form-control" rows="5" autocomplete="off"></textarea>
	  </div>
	
	  <input class="btn btn-success" type="submit" name="tambah" value="Simpan Data" > 
	  </form>
    </div>	
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="bs4/2_jquery-3.3.1.min.js"></script>
<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
<?php mysqli_close($koneksi);?>
</body>
</html>
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

	$querytabel = "select * from peserta where kode_peserta= '$_REQUEST[kode_peserta]'";

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
        <a class="nav-link" href="datapeserta.php">Data Peserta</a>
      </li>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="logout.php"><button class="btn-light">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<?php 
//cek data ada di kursus atau tidak



//proses hapus
if(isset($_POST['ya'])){
	$query_cek_jadwal = mysqli_query($koneksi, "select * from jadwal where kode_peserta = '$_REQUEST[kode_peserta]' and status = 'belum terlaksana'");
	if($query_cek_jadwal){
		$ambil_peserta = "select * from peserta where kode_peserta='$_REQUEST[kode_peserta]'";
		$data_peserta = mysqli_query($koneksi, $ambil_peserta);
		$data = mysqli_fetch_assoc($data_peserta);
		$username = $data['username'];
		
		$query_jadwal = "delete from jadwal where kode_peserta = '$_REQUEST[kode_peserta]'";
		$delete_jadwal = mysqli_query($koneksi, $query_jadwal);
		if($delete_jadwal){
			$query_peserta= "delete from peserta where username='$username'";
			$delete_peserta = mysqli_query($koneksi, $query_peserta);
			if($delete_peserta){
				$query_login= "delete from login where username='$username'";
				$delete_login = mysqli_query($koneksi, $query_login);
				if($delete_login){
					echo "<script> alert('Data Berhasil dihapus'); window.location.href='datapeserta.php'; </script>";
				}else{
					echo "delete login gagal";
					echo mysqli_error($koneksi);
				}	
			}else{
				echo "delete peserta gagal";
				echo mysqli_error($koneksi);
			}
		}else{
			echo "delete peserta jadwal";
			echo mysqli_error($koneksi);
		}
	}
	

}
if(isset($_POST['tidak'])){
	header('Location: datapeserta.php');
	exit;
}
?>
<br>
<div class="container">
	<?php 
		$hasil= mysqli_query($koneksi, $querytabel);

		if(mysqli_num_rows($hasil) > 0) {
	?>
  	<div class="table-responsive "> 

  <table class="table table-bordered" id="konten">
    <thead>
      <tr>
	  
        <th><center>Kode Peserta</center></th>
		<th><center>Username</center></th>
		<th><center>Nama</center></th>
		<th><center>Email</center></th>
		<th><center>No Telp</center></th>
		<th><center>Alamat</center></th>
		
      </tr>
    </thead>
    <tbody>
	
	<?php
			while($baris = mysqli_fetch_assoc($hasil)) {
	?>
        <tr>
        <td><?php echo $baris['kode_peserta']; ?></td>
		<td><?php echo $baris['username']; ?></td>
		<td><?php echo $baris['nama']; ?></td>
		<td><?php echo $baris['email']; ?></td>
		<td><?php echo $baris['no_telp']; ?></td>
		<td><?php echo $baris['alamat']; ?></td>
		
      </tr>
    </tbody>
	<?php 
			} 
	?>
  </table>
	<center>
		<label>Yakin Data ini Dihapus ?</label>
		<form action="" method="post" class="form-inline justify-content-center">
		<br>
		<input type="submit" class="btn btn-dark" value="Ya" name="ya">&nbsp;
		<input type="submit" class="btn btn-dark" value="Tidak" name="tidak">
		</form>
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
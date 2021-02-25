<!DOCTYPE html>
<html lang="en">
<head>
  <title>Judul</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="bs4/1_bootstrap-4.3.1.min.css" >
<style>
.nav-item:hover {
	background-color: white;
 }
 .nav-item .active{
	 background-color: white;
 }

</style>

</head>
<body style="background-color:#ececec;">
<!-- awal Bagian navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#b5b6b8;" >
  <!-- Brand -->
  <span class="navbar-brand" ><img src="logo.png" width="50" height="50"></span>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigasi">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="navigasi">
    <ul class="navbar-nav mr-auto">

	  <li class="nav-item">
        <a class="nav-link" href="akun.php">Akun</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Akhir Bagian navbar -->

<div class="container-fluid">
	<div class="col-sm-12">
	<label class="mt-3"><h3><b>Daftar Peserta</b></h3></label>
	<hr>
		<form action="" method="post">
		<div class="row mb-3">
	
		<div class="col-sm-8 offset-sm-2">
		
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
		
		
			<div class="form-group">
				<label>Username :</label> <input type="text" name="username" class="form-control" value="" autocomplete="off" >
			</div>
			<div class="form-group">
				<label>Password :</label> <input type="password" name="password" class="form-control" value=""autocomplete="off" >
			</div>
			<div class="form-group">
				<label>Konfirmasi Password :</label> <input type="password" name="konfirmasi_password" class="form-control" value="" autocomplete="off">
			</div>
		<input  type="submit" class="btn btn-primary" value="Daftar" name="daftar">
		</div>
	
		</div>
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
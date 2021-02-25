
		<!DOCTYPE html>
		<html lang="en">
		<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="bs4/1_bootstrap-4.3.1.min.css" >
		<style>
		#border{
			border:solid;
		}
		#kotak_login {
			
				padding-top: 20vh;
			}	
		@media screen and (max-width: 767px){
			#kotak_login {
				padding-top: 1vh;
			}	
		}
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
		include "cek_waktu_kursus.php";

		if(isset($_SESSION['hak_akses'])){
			if($_SESSION['hak_akses']!= "admin"){
				echo "<script type='text/javascript'>alert('tidak berhak mengakses halaman ini'); window.location.href='index.php';</script>";
			}
		}

		?>
		</head>

		<body>
		<?php
		if(isset($_POST['login'])){
			if($_POST['username'] == "" || $_POST['password'] == ""){
			echo "<script>alert('data masih ada kosong');</script>";
				
				
			}else{
				$query = mysqli_query($koneksi, "select * from login where username = '$_POST[username]'");
				if(mysqli_num_rows($query)>0){
					$hasil = mysqli_fetch_assoc($query);
					if($hasil['hak_akses']=="admin"){
						if($_POST['password']===$hasil['password']){
							echo "<script>alert('berhasil login');</script>";
							$_SESSION['hak_akses']= $hasil['hak_akses'];
							header('Location: datapeserta.php');
						}else{
							echo "<script>alert('data salah');</script>";
						}
					}else{
						echo "<script>alert('tidak berhak mengakses halaman ini');</script>";
					}
				}else{
					echo "<script>alert('data salah');</script>";
				}
			}	
		}
		?>

		<div class="container-fluid " id="kotak_login">   
			<div class="col-sm-4 offset-sm-4 border border-dark" id="konten" >
			<br>
				<form action="" method="post">
					<div class="form-group">
						<label for="data_username"><b>Username</b></label>
						<input type="text" class="form-control" id="data_username" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="data_password"><b>Password</b></label>
						<input type="password" class="form-control" id="data_password" name="password" placeholder="Password">
					</div>
					<center><button type="submit" class="btn btn-dark" name="login">Login</button></center>
				</form>
			<br>
			</div>
		</div>

		<footer class="bg-dark text-white >
			<div class="container">
				<div class="row pt-3">
					<div class="col text-center">
					<p>Copyright 2019</p>
					</div>
				</div>
			</div>
		</footer>

		<?php mysqli_close($koneksi);?>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="bs4/2_jquery-3.3.1.min.js"></script>
		<script src="bs4/3_bootstrap-4.3.1.min.js"></script>
		</body>
		</html>

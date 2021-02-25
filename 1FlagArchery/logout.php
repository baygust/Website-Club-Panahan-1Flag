<?php 
include "koneksi.php";
session_start();
//clear session from globals
$_SESSION = array();
//clear session from disk
session_destroy();	
mysqli_close($koneksi);
header('Location: index.php');
?>
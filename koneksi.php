<?php 
$servername = "localhost";
$user		= "root";
$password	= "";
$db			= "perpus";

$koneksi = mysqli_connect($servername,$user, $password, $db);

if (!$koneksi) {
	die("Koneksi gagal : ". mysqli_connect_error());
}
?>
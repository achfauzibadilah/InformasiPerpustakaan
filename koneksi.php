<?php 
session_start();

$servername = "103.58.102.44";
$user		= "admriver_admino";
$password	= "KQ?d2[;KMS42";
$db			= "admriver_perpus";

$koneksi = mysqli_connect($servername, $user, $password, $db);

if (!$koneksi) {
	die("Koneksi gagal : ". mysqli_connect_error());
}
?>
<?php
$host = "localhost"; 
$user = "root"; 
$password = "W@rsaftharith7704"; 
$database = "universitas_hamzanwadi"; 

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>

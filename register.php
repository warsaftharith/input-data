<?php
session_start();
require_once("koneksi.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Cek jika email sudah ada
    $query = "SELECT * FROM tbl_pengguna WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email sudah terdaftar'); window.location.href = 'index.php';</script>";
    } else {
        // Simpan ke database
        $query = "INSERT INTO tbl_pengguna (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Pendaftaran berhasil'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran gagal'); window.location.href = 'index.php';</script>";
        }
    }
}
?>

<?php
session_start();
require_once("koneksi.php");

// Check if user is not logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Handle form submission
if (isset($_POST["submit"])) {
    $npm = $_POST["npm"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $kirim = "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat) VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')";
    mysqli_query($koneksi, $kirim);
    $hasil = mysqli_affected_rows($koneksi);

    if ($hasil > 0) {
        echo "<script>
            alert('Data Berhasil disimpan');
            window.location.href = 'tampilkan-data.php';
            </script>";
    } else {
        echo "<script>
            alert('Data Gagal disimpan');
            window.location.href = 'tampil-data.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="tampilkan-data.php">Universitas Hamzanwadi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tampilkan-data.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link" id="logout-link">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>

    <!-- Konten -->
    <div class="container mt-4">
        <div class="form-container">
            <h1>Masukkan Data Mahasiswa</h1>
            <p>Silahkan masukkan data mahasiswa berdasarkan formulir berikut:</p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label dark">Nama</label>
                    <p class="contoh"><i>*Input Nama Contoh "budi"*</i></p>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="npm" class="form-label">NIM</label>
                    <p class="contoh"><i>*Input Menggunakan Angka*</i></p>
                    <input type="text" class="form-control" id="npm" name="npm" pattern="\d{11}" title="NIM terdiri dari 11 angka atau lebih" placeholder="Masukkan Angka" required>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <p class="contoh"><i>*Pilih Salah Satu*</i></p>
                    <select class="form-select" id="prodi" name="prodi" required>
                        <option value="Pendidikan Informatika">Pendidikan Informatika</option>
                        <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                        <option value="Pendidikan Biologi">Pendidikan Biologi</option>
                        <option value="Pendidikan Fisika">Pendidikan Fisika</option>
                        <option value="Pendidikan IPA">Pendidikan IPA</option>
                        <option value="Statistika">Statistika</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p class="contoh"><i>*Input Email Contoh "budi@gmail.com"*</i></p>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <p class="contoh"><i>*Contoh "Selong"*</i></p>
                    <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="Masukkan Alamat"required></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
                <br>
            </form>
        </div>
    </div>
    

    <!-- Bootstrap JS Bundle (popper.js and bootstrap.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Validasi input NIM
        document.getElementById('npm').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, ''); 
        });
    </script>
</body>
</html>

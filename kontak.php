<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #121212; /* Warna latar belakang gelap */
            color: #ffffff; /* Warna teks putih */
            padding-top: 70px; 
            position: relative;
            min-height: 100vh; 
        }
        .navbar, .form-container, .card {
            background-color: #1f1f1f; /* Warna latar belakang elemen */
            color: #ffffff; /* Warna teks elemen */
        }
        .navbar-brand, .nav-link, .footer a {
            color: #ffffff; /* Warna teks elemen */
        }
        .nav-link:hover, .footer a:hover {
            color: #cccccc; /* Warna teks elemen saat hover */
        }
        .form-container {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Warna bayangan gelap */
        }
        .form-control, .btn-primary {
            background-color: #2c2c2c; /* Warna latar belakang input */
            color: #ffffff; /* Warna teks input */
            border-color: #444444; /* Warna border input */
        }
        .form-control::placeholder {
            color: #aaaaaa; /* Warna placeholder input */
        }
        .footer {
            background-color: #343a40; /* Warna latar belakang footer */
            color: #ffffff; /* Warna teks footer */
            padding: 10px 0; 
            margin-top: 12%;
            text-align: center;
            width: 100%;
            bottom: 0; 
        }
        .form-label {
            color: white;
        }
    </style>
</head>
<body>
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

    <br>
    <!-- Konten -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Kontak</h5>
                        <p class="card-text">
                            Jl. Universitas No. 123<br>
                            Kota Universitas<br>
                            Hamzanwadi<br><br>
                            Email: info@univ-hamzanwadi.ac.id<br>
                            Telepon: +62 877 445 862 39
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Hubungi Kami</h5>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="pesan" class="form-label">Pesan</label>
                                <textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>Visit my GitHub: <a href="https://github.com/warsaftharith" target="_blank">Github.com/warsaftharith</a></p>
            <p>Visit my Website: <a href="https://warsa.online" target="_blank">Klik me</a></p>
            <p>&copy; <?php echo date('Y'); ?> Universitas Hamzanwadi. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle (popper.js and bootstrap.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

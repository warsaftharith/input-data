<?php
session_start();
require_once("koneksi.php");

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data mahasiswa berdasarkan id
    $query = "SELECT * FROM tbl_mahasiswa WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query Error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        die("Data tidak ditemukan.");
    }
} else {
    header('Location: tampilkan-data.php');
    exit();
}

// Proses update data
if (isset($_POST['update'])) {
    $npm = mysqli_real_escape_string($koneksi, $_POST['npm']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

    $query = "UPDATE tbl_mahasiswa SET npm = '$npm', nama = '$nama', prodi = '$prodi', email = '$email', alamat = '$alamat' WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        header('Location: tampilkan-data.php');
        exit();
    } else {
        die("Update Error: " . mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

<style>
    .add-data-icon {
        display: inline-block;
        width: 50px;
        height: 50px;
        background-color: #007bff;
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        font-size: 24px;
        text-decoration: none;
    }
    .add-data-icon:hover {
        background-color: #0056b3;
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
    <br><br> <br>
    <div class="container">
        <h2>Edit Data Mahasiswa</h2>
        <form action="edit-data.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="npm" class="form-label">NIM</label>
                <input type="text" class="form-control" id="npm" name="npm" value="<?php echo htmlspecialchars($row['npm']); ?>" pattern="\d{11}" title="NIM terdiri dari 11 angka atau lebih" required>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="prodi" class="form-label">Program Studi</label>
                <select class="form-select" id="prodi" name="prodi" required>
                    <option value="Pendidikan Informatika" <?php echo ($row['prodi'] == 'Pendidikan Informatika') ? 'selected' : ''; ?>>Pendidikan Informatika</option>
                    <option value="Pendidikan Matematika" <?php echo ($row['prodi'] == 'Pendidikan Matematika') ? 'selected' : ''; ?>>Pendidikan Matematika</option>
                    <option value="Pendidikan Biologi" <?php echo ($row['prodi'] == 'Pendidikan Biologi') ? 'selected' : ''; ?>>Pendidikan Biologi</option>
                    <option value="Pendidikan Fisika" <?php echo ($row['prodi'] == 'Pendidikan Fisika') ? 'selected' : ''; ?>>Pendidikan Fisika</option>
                    <option value="Pendidikan IPA" <?php echo ($row['prodi'] == 'Pendidikan IPA') ? 'selected' : ''; ?>>Pendidikan IPA</option>
                    <option value="Statistika" <?php echo ($row['prodi'] == 'Statistika') ? 'selected' : ''; ?>>Statistika</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary" name="update">Update</button>
            <a href="tampilkan-data.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

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

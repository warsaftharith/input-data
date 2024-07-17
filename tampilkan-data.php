<?php
session_start();
require_once("koneksi.php");

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Proses pencarian
$search = isset($_GET['search']) ? $_GET['search'] : '';
if (!empty($search)) {
    // Pastikan untuk melarikan nilai variabel yang digunakan dalam query
    $search = mysqli_real_escape_string($koneksi, $search);

    $query = "SELECT * FROM tbl_mahasiswa WHERE npm LIKE '%$search%'";
} else {
    $query = "SELECT * FROM tbl_mahasiswa";
}

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query Error: " . mysqli_error($koneksi)); // Tampilkan pesan error jika query gagal dieksekusi
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
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

<br><br><br>

<div class="container">
    <br>
    <h2>DATA MAHASISWA</h2>
    <br>
    <form action="tampilkan-data.php" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari NIM" name="search">
            <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <?php if (mysqli_num_rows($result) == 0 && !empty($search)) : ?>
        <div class="alert alert-warning mt-3" role="alert">
            Tidak ada mahasiswa dengan NIM '<?php echo htmlspecialchars($search); ?>'.
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td style="color: blue"><?php echo htmlspecialchars($row['npm']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['prodi']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td>
                            <a href="edit-data.php?id=<?php echo $row['id']; ?>">
                                <i class="fas fa-edit" style="font-size: 18px; color: blue;"></i>
                            </a>
                        </td>
                        <td>
                            <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <i class="fas fa-trash-alt" style="font-size: 18px; color: red;"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div style="margin-right: 20px; margin-top: 20px;">
    <a href="tambah-data.php" class="btn btn-primary">Tambahkan data
    </a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();
require_once("koneksi.php");

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM tbl_mahasiswa WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $npm = $_POST["npm"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $email = $_POST["email"];
    $alamat = $_POST["alamat"];

    $update = "UPDATE tbl_mahasiswa SET npm = '$npm', nama = '$nama', prodi = '$prodi', email = '$email', alamat = '$alamat' WHERE id = $id";
    mysqli_query($koneksi, $update);
    
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
            alert('Berhasil');
            document.location.href = 'tampil-data.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal diubah');
            document.location.href = 'tampil-data.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <form action="" method="POST">
        <table style="width: 80%; padding: 10px;">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $data['nama']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="npm">NPM</label></td>
                <td><input type="text" name="npm" id="npm" value="<?= $data['npm']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi</label></td>
                <td>
                    <select name="prodi" id="prodi" required>
                        <option value="Pendidikan Informatika" <?= $data['prodi'] == 'Pendidikan Informatika' ? 'selected' : ''; ?>>Pendidikan Informatika</option>
                        <option value="Pendidikan Matematika" <?= $data['prodi'] == 'Pendidikan Matematika' ? 'selected' : ''; ?>>Pendidikan Matematika</option>
                        <option value="Pendidikan Biologi" <?= $data['prodi'] == 'Pendidikan Biologi' ? 'selected' : ''; ?>>Pendidikan Biologi</option>
                        <option value="Pendidikan Fisika" <?= $data['prodi'] == 'Pendidikan Fisika' ? 'selected' : ''; ?>>Pendidikan Fisika</option>
                        <option value="Pendidikan IPA" <?= $data['prodi'] == 'Pendidikan IPA' ? 'selected' : ''; ?>>Pendidikan IPA</option>
                        <option value="Statistika" <?= $data['prodi'] == 'Statistika' ? 'selected' : ''; ?>>Statistika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" id="email" value="<?= $data['email']; ?>" required></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat</label></td>
                <td><input type="text" name="alamat" id="alamat" value="<?= $data['alamat']; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="submit">Ubah Data</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

<?php
session_start();
require_once("koneksi.php");

// Check if user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure ID is an integer

    // Prepare DELETE query
    $query = "DELETE FROM tbl_mahasiswa WHERE id = ?";
    
    // Prepare statement
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        // Bind parameter (i = integer)
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data berhasil dihapus'); window.location.href = 'tampilkan-data.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data'); window.location.href = 'data-mahasiswa.php';</script>";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Gagal menyiapkan kueri'); window.location.href = 'tampilkan-data.php';</script>";
    }
} else {
    echo "<script>alert('ID tidak valid'); window.location.href = 'data-mahasiswa.php';</script>";
}

// Close connection
mysqli_close($koneksi);
?>

<?php 
    include '../header.php';
    include '../koneksi.php'; // Pastikan koneksi ke database disertakan

    // Mengambil parameter id dari URL
    $id = $_GET['id'];

    // Menggunakan prepared statement untuk menghapus data
    $sql = "DELETE FROM tblKategori WHERE idKategori = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $delete = $stmt->execute();

    // Menangani hasil penghapusan
    if ($delete) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
?>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dbberita";

    // Membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        echo "Connection successful"; // Pesan ini akan muncul jika koneksi berhasil
    }
?>

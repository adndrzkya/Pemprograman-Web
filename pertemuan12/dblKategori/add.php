<?php 
    include '../header.php';
    include '../koneksi.php'; // Pastikan koneksi ke database disertakan

    if (isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        // Using prepared statements to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO tblKategori (nama_Kategori) VALUES (?)");
        $stmt->bind_param("s", $kategori);
        $tambah = $stmt->execute();

        if ($tambah) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>

<section>
    <form action="add.php" method="POST">
        <fieldset>
            <legend>Tambah Kategori</legend>

            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" required>
            <br>

            <input type="submit" value="Simpan" name="simpan">
        </fieldset>
    </form>
</section>

<?php 
    include '../footer.php';
?>

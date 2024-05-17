<?php 
    include '../header.php';
    include '../koneksi.php'; // Pastikan koneksi ke database disertakan

    // Mendapatkan ID kategori dari URL
    $id = $_GET['id'];

    // Memilih data kategori dengan ID yang sesuai
    $query = "SELECT * FROM tblKategori WHERE idKategori = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    // Menyimpan perubahan jika formulir disubmit
    if(isset($_POST['simpan'])) {
        $kategori = $_POST['kategori'];

        // Menggunakan prepared statement untuk menghindari SQL injection
        $query = "UPDATE tblKategori SET nama_Kategori = ? WHERE idKategori = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $kategori, $id);
        $tambah = $stmt->execute();

        if($tambah) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>

<section>
    <form action="edit.php?id=<?= $id; ?>" method="POST">
        <fieldset>
            <legend>Edit Kategori</legend>

            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" value="<?= htmlspecialchars($data['nama_Kategori']); ?>" required>
            <br>

            <input type="submit" value="Simpan" name="simpan">
        </fieldset>
    </form>
</section>

<?php 
    include '../footer.php';
?>

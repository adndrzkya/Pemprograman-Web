<?php 
    include '../header.php';
    include '../koneksi.php'; 

    // Fetching categories
    $sql = "SELECT * FROM tblKategori";
    $query = mysqli_query($conn, $sql);
    $kategori = $query->fetch_all(MYSQLI_ASSOC);

    if (isset($_POST['simpan'])) {
        $judul = $_POST['judul'];
        $idKategori = $_POST['kategori'];
        $isi = $_POST['isi'];
        $penulis = $_POST['penulis'];
        $tanggal = $_POST['tanggal'];

        // Using prepared statements to avoid SQL injection
        $stmt = $conn->prepare("INSERT INTO tblBerita (judulberita, isiberita, penulis, tgldipublish, idKategori) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $judul, $isi, $penulis, $tanggal, $idKategori);
        $tambah = $stmt->execute();

        if ($tambah) {
            header("Location: index.php");
        }
    }
?>

<section>
    <form action="add.php" method="POST">
        <fieldset>
            <legend>Tambah Kategori</legend>

            <label for="judul">Judul Berita</label>
            <input type="text" name="judul" id="judul" required>
            <br>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori">
                <option>Pilih Kategori</option>
                <?php foreach ($kategori as $key => $value) : ?>
                    <option value="<?= $value['idKategori'] ?>"><?= $value['nama_Kategori'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="isi">Isi Berita</label>
            <textarea name="isi" id="isi" cols="30" rows="10" required></textarea>
            <br>

            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" required>
            <br>

            <label for="tanggal">Tanggal Publish</label>
            <input type="date" name="tanggal" id="tanggal" required>
            <br>

            <input type="submit" value="Simpan" name="simpan">
        </fieldset>
    </form>
</section>

<?php 
    include '../footer.php';
?>

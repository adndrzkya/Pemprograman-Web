<?php
include "koneksi.php";

if (isset($_GET['idBerita'])) {
    $idBerita = $_GET['idBerita'];

    // Using prepared statements to avoid SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM tblBerita WHERE idBerita = ?");
    $stmt->bind_param("i", $idBerita);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <form method="post" action="update_berita.php">
            <input type="hidden" name="idBerita" value="<?php echo htmlentities($row['idBerita']); ?>">
            Kategori: <select name="idKategori">
                <?php
                $kategori_query = "SELECT * FROM tblKategori";
                $kategori_result = mysqli_query($koneksi, $kategori_query);
                while ($kategori_row = mysqli_fetch_assoc($kategori_result)) { ?>
                    <option value="<?php echo htmlentities($kategori_row['idKategori']); ?>" <?php if ($kategori_row['idKategori'] == $row['idKategori']) echo 'selected'; ?>><?php echo htmlentities($kategori_row['nama_kategori']); ?></option>
                <?php } ?>
            </select><br>
            Judul Berita: <input type="text" name="judulberita" value="<?php echo htmlentities($row['judulberita']); ?>"><br>
            Isi Berita: <textarea name="isiberita"><?php echo htmlentities($row['isiberita']); ?></textarea><br>
            Penulis: <input type="text" name="penulis" value="<?php echo htmlentities($row['penulis']); ?>"><br>
            <input type="submit" value="Update">
        </form>
        <?php
    } else {
        echo "No record found.";
    }

    $stmt->close();
} else {
    echo "No ID provided.";
}

$koneksi->close();
?>

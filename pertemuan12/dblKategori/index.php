<?php 
    include '../header.php';
    include '../koneksi.php'; // Pastikan koneksi ke database disertakan

    // Mengambil data kategori dari database
    $query = "SELECT * FROM tblKategori";
    $result = mysqli_query($conn, $query);

    // Memastikan query berhasil
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Mengambil data hasil query dalam bentuk array asosiatif
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<section>
    <h1>Data Kategori</h1>
    <a href="add.php">Tambah</a>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Kategori</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $key => $value) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= htmlspecialchars($value['nama_Kategori']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $value['idKategori'] ?>">Edit</a>
                        <a href="delete.php?id=<?= $value['idKategori'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php 
    include '../footer.php';
?>

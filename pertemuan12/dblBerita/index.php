<?php 
    include '../header.php';
    include '../koneksi.php'; // Pastikan koneksi ke database disertakan

    // Query to select data from tblBerita joined with tblKategori
    $query = "SELECT * FROM tblBerita JOIN tblKategori USING(idKategori) ORDER BY tgldipublish DESC";
    $data = mysqli_query($conn, $query);
    $data = $data->fetch_all(MYSQLI_ASSOC);
?>

<section>
    <h1>Daftar Berita</h1>

    <a href="addberita.php">Tambah</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $value) : ?>
                <tr>
                    <td><?= htmlspecialchars($value['nama_kategori']) ?></td>
                    <td><?= htmlspecialchars($value['judulberita']) ?></td>
                    <td><?= htmlspecialchars($value['isiberita']) ?></td>
                    <td><?= htmlspecialchars($value['penulis']) ?></td>
                    <td><?= htmlspecialchars($value['tgldipublish']) ?></td>
                    <td>
                        <a href="edit.php?idBerita=<?= $value['idBerita'] ?>">Edit</a>
                        <a href="delete.php?idBerita=<?= $value['idBerita'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<?php 
    include '../footer.php';
?>

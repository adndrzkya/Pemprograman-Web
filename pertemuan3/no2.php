<!DOCTYPE html>
<html>
<head>
    <title>Form Nilai Akademik</title>
</head>
<body>
    <h2>Nilai Akademik Pemrograman Web</h2>
    <form method="POST">
        <p>Nama : Adinda Razkya</p>
        <P>Nim : 211011400993</p>
        <label for="jumlah_kehadiran">Jumlah Kehadiran:</label><br>
        <input type="number" id="jumlah_kehadiran" name="jumlah_kehadiran" required><br><br>
        <label for="nilai_tugas">Nilai Tugas:</label><br>
        <input type="number" id="nilai_tugas" name="nilai_tugas" required><br><br>
        
        <label for="nilai_uts">Nilai UTS:</label><br>
        <input type="number" id="nilai_uts" name="nilai_uts" required><br><br>
        
        <label for="nilai_uas">Nilai UAS:</label><br>
        <input type="number" id="nilai_uas" name="nilai_uas" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function hitungNilaiAkhir($jumlah_kehadiran, $nilai_tugas, $nilai_uts, $nilai_uas) {
            $bobot_kehadiran = 0.1;
            $bobot_tugas = 0.2;
            $bobot_uts = 0.3;
            $bobot_uas = 0.4;
            if ($jumlah_kehadiran > 18) {
                $jumlah_kehadiran = 18;
            }
            $nilai_akhir = ($jumlah_kehadiran * $bobot_kehadiran) +
                           ($nilai_tugas * $bobot_tugas) +
                           ($nilai_uts * $bobot_uts) +
                           ($nilai_uas * $bobot_uas);

            return $nilai_akhir;
        }
        function tentukanGrade($nilai_akhir) {
            if ($nilai_akhir >= 80) {
                return 'A';
            } elseif ($nilai_akhir >= 70) {
                return 'B';
            } elseif ($nilai_akhir >= 60) {
                return 'C';
            } elseif ($nilai_akhir >= 50) {
                return 'D';
            } else {
                return 'E';
            }
        }
        function berikanKeterangan($nilai_akhir) {
            if ($nilai_akhir > 65) {
                return 'Lulus';
            } else {
                return 'Tidak Lulus';
            }
        }
        $nama_matakuliah = "Pemrograman Web";
        $nama_mahasiswa = "Adinda Razkya";
        $nim_mahasiswa = "211011400993";
        $jumlah_kehadiran = $_POST['jumlah_kehadiran'];
        $nilai_tugas = $_POST['nilai_tugas'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $nilai_akhir = hitungNilaiAkhir($jumlah_kehadiran, $nilai_tugas, $nilai_uts, $nilai_uas);
        $grade = tentukanGrade($nilai_akhir);
        $keterangan = berikanKeterangan($nilai_akhir);
        echo "<h2>Hasil Perhitungan</h2>";
        echo "<p>Nama Mata Kuliah: $nama_matakuliah</p>";
        echo "<p>Nama Mahasiswa: $nama_mahasiswa</p>";
        echo "<p>NIM Mahasiswa: $nim_mahasiswa</p>";
        echo "<p>Jumlah Kehadiran: $jumlah_kehadiran</p>";
        echo "<p>Nilai Tugas: $nilai_tugas</p>";
        echo "<p>Nilai UTS: $nilai_uts</p>";
        echo "<p>Nilai UAS: $nilai_uas</p>";
        echo "<p>Nilai Akhir: $nilai_akhir</p>";
        echo "<p>Grade: $grade</p>";
        echo "<p>Keterangan: $keterangan</p>";
    }
    ?>
</body>
</html>

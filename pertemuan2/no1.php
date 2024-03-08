<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2 NO.1</title>
    <style>
        fieldset {
            border: 2px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        legend {
            border: 1px solid #ccc;
            padding: 5px 10px;
            font-weight: bold;
        }
        label {
            display: inline-block;
            width: 100px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <?php
        // Inisialisasi variabel
        $nama = $jurusan = $nilai_tugas = $nilai_uts = $nilai_uas = $rata_rata = "";

        // Memproses formulir saat dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $jurusan = $_POST["jurusan"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_uts = $_POST["nilai_uts"];
            $nilai_uas = $_POST["nilai_uas"];

            // Menghitung rata-rata
            $rata_rata = ($nilai_tugas + $nilai_uts + $nilai_uas) / 3;
        }
    ?>
    <fieldset>
        <legend>Data Input</legend>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" value="<?php echo $nama; ?>"><br/>
            <label for="jurusan">Jurusan : </label>
            <input type="text" name="jurusan" value="<?php echo $jurusan; ?>"><br/>
            <label for="nilai_tugas">Nilai Tugas : </label>
            <input type="text" name="nilai_tugas" value="<?php echo $nilai_tugas; ?>"><br/>
            <label for="nilai_uts">Nilai UTS : </label>
            <input type="text" name="nilai_uts" value="<?php echo $nilai_uts; ?>"><br/>
            <label for="nilai_uas">Nilai UAS : </label>
            <input type="text" name="nilai_uas" value="<?php echo $nilai_uas; ?>"><br/>
            <input type="submit" name="submit" value="Hitung">
        </form>
    </fieldset>

    <section>
        <fieldset>
            <legend>Informasi Data</legend>
            <table>
                <tr>
                    <th>Nama</th>
                    <td>: <?php echo $nama; ?></td>
                    <th>Jurusan</th>
                    <td>: <?php echo $jurusan; ?></td>
                </tr>
                <tr>
                    <th>Nilai Tugas</th>
                    <td>: <?php echo $nilai_tugas; ?>0</td>
                    <th>Nilai UTS</th>
                    <td>: <?php echo $nilai_uts; ?>0</td>
                </tr>
                <tr>
                    <th>Nilai UAS</th>
                    <td>: <?php echo $nilai_uas; ?>0</td>
                    <th>Rata-rata</th>
                    <td>: <?php echo $rata_rata; ?>0</td>
                </tr>
            </table>
        </fieldset>
    </section>
</body>
</html>

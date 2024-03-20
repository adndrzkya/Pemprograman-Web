<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga (Cara 2 - Input Form)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f7f7f7;
        }
        h2 {
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: calc(100% - 10px);
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        h3 {
            margin-top: 20px;
        }
        .result {
            margin-top: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h2>Hitung Luas Segitiga (Cara 2 - Input Form)</h2>
    <form method="post" action="">
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div id="seg<?= $i + 1 ?>" <?php if ($i != 0) echo 'style="display: none;"'; ?>>
                <label for="alas<?= $i ?>">Alas Segitiga <?= ($i + 1) ?>:</label>
                <input type="number" name="alas<?= $i ?>" id="alas<?= $i ?>" required><br>
                <label for="tinggi<?= $i ?>">Tinggi Segitiga <?= ($i + 1) ?>:</label>
                <input type="number" name="tinggi<?= $i ?>" id="tinggi<?= $i ?>" required><br>
            </div>
            <button type="button" onclick="displayNextSegitiga(<?= $i + 1 ?>)" <?php if ($i == 4) echo 'style="display: none;"'; ?>>Segitiga <?= $i + 2 ?></button>
        <?php } ?>
        <br>
        <input type="submit" name="submit" value="Hitung" style="display: none;">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Mengambil data alas dan tinggi dari form
        $data_alas = array();
        $data_tinggi = array();
        for ($i = 0; $i < 5; $i++) {
            $data_alas[] = $_POST['alas' . $i];
            $data_tinggi[] = $_POST['tinggi' . $i];
        }

        // Fungsi untuk menghitung luas segitiga
        function hitungLuasSegitiga($alas, $tinggi) {
            return 0.5 * $alas * $tinggi;
        }

        // Tampilkan hasil perhitungan luas segitiga
        echo "<div class='result'>";
        echo "<h3>Hasil Perhitungan:</h3>";
        for ($i = 0; $i < count($data_alas); $i++) {
            $luas = hitungLuasSegitiga($data_alas[$i], $data_tinggi[$i]);
            echo "<p>Segitiga ke-" . ($i + 1) . ": Alas = " . $data_alas[$i] . ", Tinggi = " . $data_tinggi[$i] . ", Luas = " . $luas . "</p>";
        }
        echo "</div>";
    }
    ?>

    <script>
        function displayNextSegitiga(currentSegitiga) {
            document.getElementById('seg' + currentSegitiga).style.display = 'none';
            document.getElementById('seg' + (currentSegitiga + 1)).style.display = 'block';
            if (currentSegitiga == 4) {
                document.querySelector('input[type="submit"]').style.display = 'block';
            }
        }
    </script>
</body>
</html>

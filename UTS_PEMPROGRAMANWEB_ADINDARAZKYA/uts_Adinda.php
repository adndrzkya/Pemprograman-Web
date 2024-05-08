<?php
// Memulai session
session_start();

// Fungsi untuk menghitung jumlah poin berdasarkan kriteria yang diberikan
function hitungPoin($menang, $seri, $kalah) {
    return ($menang * 3) + ($seri * 1) + ($kalah * 0);
}

// Jika tombol submit ditekan
if(isset($_POST['submit'])){
    // Mengambil data dari form
    $negara = $_POST['negara'];
    $pertandingan = $_POST['pertandingan'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = hitungPoin($menang, $seri, $kalah);
    $operator = $_POST['operator'];
    $nim = $_POST['nim'];

    // Menyimpan data ke dalam array
    $data = array(
        'negara' => $negara,
        'pertandingan' => $pertandingan,
        'menang' => $menang,
        'seri' => $seri,
        'kalah' => $kalah,
        'poin' => $poin,
        'operator' => $operator,
        'nim' => $nim
    );

    // Menambahkan data ke dalam session
    $_SESSION['data'][] = $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasemen Piala Asia U-23 Qatar Group D</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Input Data</h2>
    <form method="post">
        <label for="negara">Nama Negara:</label>
        <select name="negara" id="negara">
            <option value="Uzbekistan U-23">Uzbekistan U-23</option>
            <option value="Vietnam U-23">Vietnam U-23</option>
            <option value="Kuwait U-23">Kuwait U-23</option>
            <option value="Malaysia U-23">Malaysia U-23</option>
        </select><br><br>
        <label for="pertandingan">Jumlah Pertandingan (P):</label>
        <input type="number" name="pertandingan" id="pertandingan"><br><br>
        <label for="menang">Jumlah Menang (M):</label>
        <input type="number" name="menang" id="menang"><br><br>
        <label for="seri">Jumlah Seri (S):</label>
        <input type="number" name="seri" id="seri"><br><br>
        <label for="kalah">Jumlah Kalah (K):</label>
        <input type="number" name="kalah" id="kalah"><br><br>
        <label for="operator">Nama Operator:</label>
        <input type="text" name="operator" id="operator"><br><br>
        <label for="nim">NIM Mahasiswa:</label>
        <input type="text" name="nim" id="nim"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    // Menampilkan hasil input
    if(isset($_SESSION['data'])) {
        echo "<h2>Data Group D Piala Asia Qatar U-23</h2>";
        date_default_timezone_set('Asia/Jakarta');
        echo date("d F Y H:i:s");        
        echo "<p>Nama Operator/NIM/IP Address: {$_SESSION['data'][0]['operator']} / {$_SESSION['data'][0]['nim']} / " . $_SERVER['REMOTE_ADDR'] . "</p>";
        echo "<table>";
        echo "<tr><th>Negara</th><th>P</th><th>M</th><th>S</th><th>K</th><th>Poin</th>";
        foreach($_SESSION['data'] as $data) {
            echo "<tr>";
            echo "<td>{$data['negara']}</td>";
            echo "<td>{$data['pertandingan']}</td>";
            echo "<td>{$data['menang']}</td>";
            echo "<td>{$data['seri']}</td>";
            echo "<td>{$data['kalah']}</td>";
            echo "<td>{$data['poin']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>


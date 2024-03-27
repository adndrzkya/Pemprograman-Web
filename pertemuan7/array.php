<!DOCTYPE html>
<html>
<head>
    <title>Hitung Luas Segitiga (Cara 1 - Definisi Array Langsung)</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Luas Segitiga (Cara 1 - Definisi Array Langsung)</h2>
    <table>
        <tr>
            <th>Segitiga ke-</th>
            <th>Alas</th>
            <th>Tinggi</th>
            <th>Luas</th>
        </tr>
        <?php
        // Definisikan data alas dan tinggi segitiga dalam array
        $data_seg1 = array(5, 6, 7, 8, 9); // Contoh data alas
        $data_seg2 = array(3, 4, 5, 6, 7); // Contoh data tinggi

        // Fungsi untuk menghitung luas segitiga
        function hitungLuasSegitiga($alas, $tinggi) {
            return 0.5 * $alas * $tinggi;
        }

        // Hitung dan tampilkan luas segitiga untuk setiap data
        for ($i = 0; $i < count($data_seg1); $i++) {
            $luas = hitungLuasSegitiga($data_seg1[$i], $data_seg2[$i]);
            echo "<tr>";
            echo "<td>Segitiga " . ($i + 1) . "</td>";
            echo "<td>" . $data_seg1[$i] . "</td>";
            echo "<td>" . $data_seg2[$i] . "</td>";
            echo "<td>" . $luas . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

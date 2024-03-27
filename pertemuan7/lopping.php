<!DOCTYPE html>
<html>
<head>
    <title>Tabel Perkalian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 50%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Tabel Perkalian</h2>

<table>
    <tr>
        <th>Angka</th>
        <?php
        // Menampilkan judul kolom hasil perkalian
        for ($i = 1; $i <= 10; $i++) {
            echo "<th>$i</th>";
        }
        ?>
    </tr>

    <?php
    for ($j = 1; $j <= 10; $j++) {
        echo "<tr>";
        echo "<td>$j</td>";
        for ($k = 1; $k <= 10; $k++) {
            $hasil = $j * $k;
            echo "<td>$hasil</td>";
        }

        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

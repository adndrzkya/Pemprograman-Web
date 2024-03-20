<!DOCTYPE html>
<html>
<head>
    <title>Deret Bilangan Ganjil Habis Dibagi 3</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center;
        }
        form {
            text-align: center;
        }
        input[type="number"] {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }
        li {
            padding: 5px 0;
        }
        p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Deret Bilangan Ganjil Habis Dibagi 3</h2>
        <form method="post" action="">
            Nilai Awal: <input type="number" name="awal"><br><br>
            Nilai Akhir: <input type="number" name="akhir"><br><br>
            <button type="submit" name="submit">Hitung</button>
        </form>

        <?php
        function isGanjilHabisDibagiTiga($n) {
            return ($n % 2 != 0 && $n % 3 == 0);
        }

        if(isset($_POST['submit'])) {
            $awal = $_POST['awal'];
            $akhir = $_POST['akhir'];

            if ($awal <= $akhir) {
                $jumlah = 0;
                $jumlahNilai = 0;

                echo "<h2>Maka deret bilangan yang tampil:</h2>";
                echo "<ul>";

                for ($i = $awal; $i <= $akhir; $i++) {
                    if (isGanjilHabisDibagiTiga($i)) {
                        echo "<li>$i</li>";
                        $jumlah++;
                        $jumlahNilai += $i;
                    }
                }

                echo "</ul>";
                echo "<p>Jumlah bilangan: $jumlah</p>";
                echo "<p>Jumlah nilai bilangan: $jumlahNilai</p>";
            } else {
                echo "<p style='color: red;'>Nilai akhir harus lebih besar dari nilai awal.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

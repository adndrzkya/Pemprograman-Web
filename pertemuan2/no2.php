<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Nilai</title>
</head>
<body>
    <h2>Kalkulator Nilai</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="number" name="nilai1" required>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="nilai2" required>
        <input type="submit" value="Hitung">
    </form>

    <?php
        // Fungsi untuk menghitung hasil berdasarkan operator
        function hitung($nilai1, $nilai2, $operator) {
            switch ($operator) {
                case '+':
                    return $nilai1 + $nilai2;
                case '-':
                    return $nilai1 - $nilai2;
                case '*':
                    return $nilai1 * $nilai2;
                case '/':
                    // Menghindari pembagian dengan nol
                    if ($nilai2 != 0)
                        return $nilai1 / $nilai2;
                    else
                        return "Error: Pembagian dengan nol tidak dapat dilakukan.";
                default:
                    return "Error: Operator tidak valid.";
            }
        }

        // Memproses formulir saat dikirimkan
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nilai1 = $_POST["nilai1"];
            $nilai2 = $_POST["nilai2"];
            $operator = $_POST["operator"];
            
            // Memanggil fungsi hitung dan menampilkan hasilnya
            $hasil = hitung($nilai1, $nilai2, $operator);
            echo "<p>Hasil: $nilai1 $operator $nilai2 = $hasil</p>";
        }
    ?>
</body>
</html>

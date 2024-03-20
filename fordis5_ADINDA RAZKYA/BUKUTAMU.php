<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Adinda Razkya</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        #container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #e6e6e6;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Added */
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
            box-sizing: border-box; /* Added */
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .success {
            color: #4CAF50;
            text-align: center;
            margin-top: 20px;
        }
        /* Custom Styles */
        #nama {
            border-color: #ff7f50; /* Coral */
        }
        #email {
            border-color: #6495ed; /* Cornflower Blue */
        }
        #komentar {
            border-color: #ff1493; /* Deep Pink */
        }
        input[type="submit"] {
            background-color: #008080; /* Teal */
        }
        input[type="submit"]:hover {
            background-color: #20b2aa; /* Light Sea Green */
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Buku Tamu</h1>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="komentar">Komentar:</label>
            <textarea id="komentar" name="komentar" required></textarea>
            
            <input type="submit" name="submit" value="Simpan">
        </form>

        <?php
        $nameFile = "bukutamu.dat";
        if(isset($_POST['submit'])) {
            if(!file_exists($nameFile)) {
                $file = fopen($nameFile, 'w');
                fclose($file);
            }
            
            $name = $_POST['nama'];
            $email = $_POST['email'];
            $komentar = $_POST['komentar'];

            $file = fopen($nameFile, 'a+');
            $txt = "Nama : $name\n" . 
                    "Email : $email\n" . 
                    "Komentar : $komentar\n\n";

            fwrite($file, $txt);
            fclose($file);
            
            echo "<p class='success'>Data berhasil disimpan</p>";
        }
        ?>
    </div>
</body>
</html>

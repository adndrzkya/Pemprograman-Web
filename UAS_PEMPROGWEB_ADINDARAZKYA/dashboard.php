<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "uaspemprog"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate points
function hitungPoin($menang, $seri, $kalah) {
    return ($menang * 3) + ($seri * 1) + ($kalah * 0);
}

// Handle form submission
if(isset($_POST['submit'])){
    $tim = $_POST['tim'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = hitungPoin($menang, $seri, $kalah);
    $nim = $_POST['nim'];

    // Insert data into database
    $sql = "INSERT INTO teams (tim, menang, seri, kalah, poin) VALUES ('$tim', '$menang', '$seri', '$kalah', '$poin')";

    if ($conn->query($sql) === TRUE) {
        // Data inserted successfully, add to session
        $data = array(
            'tim' => $tim,
            'menang' => $menang,
            'seri' => $seri,
            'kalah' => $kalah,
            'poin' => $poin,
            'nim' => $nim,
            'username' => $_SESSION['username']
        );

        $_SESSION['data'][] = $data;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Hapus data
if (isset($_POST['delete'])) {
    $index = $_POST['index'];
    array_splice($_SESSION['data'], $index, 1);
}

// Edit data
$editIndex = -1;
if (isset($_POST['edit'])) {
    $editIndex = $_POST['index'];
    $editData = $_SESSION['data'][$editIndex];
}

// Update data
if (isset($_POST['update'])) {
    $index = $_POST['index'];
    $tim = $_POST['tim'];
    $menang = $_POST['menang'];
    $seri = $_POST['seri'];
    $kalah = $_POST['kalah'];
    $poin = hitungPoin($menang, $seri, $kalah);
    $nim = $_POST['nim'];

    $_SESSION['data'][$index] = array(
        'tim' => $tim,
        'menang' => $menang,
        'seri' => $seri,
        'kalah' => $kalah,
        'poin' => $poin,
        'nim' => $nim,
        'operator' => $_SESSION['username']
    );
}

// Pencarian data
$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        .dashboard-container {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            padding: 8px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .actions form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Aplikasi Uas Pemprograman Web, <?= $_SESSION['username'] ?></h2>
    </div>

    <h2>Input Data</h2>
    <form method="post">
        <label for="tim">TIM:</label>
        <select name="tim" id="tim">
            <option value="Austria" <?= $editIndex !== -1 && $editData['tim'] == 'Austria' ? 'selected' : '' ?>>Austria</option>
            <option value="Prancis" <?= $editIndex !== -1 && $editData['tim'] == 'Prancis' ? 'selected' : '' ?>>Prancis</option>
            <option value="Belanda" <?= $editIndex !== -1 && $editData['tim'] == 'Belanda' ? 'selected' : '' ?>>Belanda</option>
            <option value="Polandia" <?= $editIndex !== -1 && $editData['tim'] == 'Polandia' ? 'selected' : '' ?>>Polandia</option>
        </select><br><br>
        <label for="menang">Jumlah Menang:</label>
        <input type="number" name="menang" id="menang" value="<?= $editIndex !== -1 ? $editData['menang'] : '' ?>"><br><br>
        <label for="seri">Jumlah Seri:</label>
        <input type="number" name="seri" id="seri" value="<?= $editIndex !== -1 ? $editData['seri'] : '' ?>"><br><br>
        <label for="kalah">Jumlah Kalah:</label>
        <input type="number" name="kalah" id="kalah" value="<?= $editIndex !== -1 ? $editData['kalah'] : '' ?>"><br><br>
        <label for="nim">NIM Mahasiswa:</label>
        <input type="text" name="nim" id="nim" value="<?= $editIndex !== -1 ? $editData['nim'] : '' ?>"><br><br>
        <?php if ($editIndex !== -1): ?>
            <input type="hidden" name="index" value="<?= $editIndex ?>">
            <input type="submit" name="update" value="Update">
        <?php else: ?>
            <input type="submit" name="submit" value="Submit">
        <?php endif; ?>
        <input type="submit" name="logout" value="Logout">
    </form>

    <form method="post">
        <input type="text" name="search" placeholder="Cari Tim..." value="<?= htmlspecialchars($search) ?>">
        <input type="submit" value="Search">
    </form>

    <?php
    if(isset($_SESSION['data'])) {
        echo "<h2>Klasemen Eropa UEFA 2024</h2>";
        date_default_timezone_set('Asia/Jakarta');
        echo date("d F Y H:i:s");
        echo "<table>";
        echo "<tr><th>Negara</th><th>Menang</th><th>Seri</th><th>Kalah</th><th>Poin</th><th>Aksi</th></tr>";
        foreach($_SESSION['data'] as $index => $data) {
            if ($search == '' || stripos($data['tim'], $search) !== false) {
                echo "<tr>";
                echo "<td>{$data['tim']}</td>";
                echo "<td>{$data['menang']}</td>";
                echo "<td>{$data['seri']}</td>";
                echo "<td>{$data['kalah']}</td>";
                echo "<td>{$data['poin']}</td>";
                echo "<td class='actions'>
                        <form method='post'>
                            <input type='hidden' name='index' value='$index'>
                            <input type='submit' name='edit' value='Edit'>
                        </form>
                        <form method='post'>
                            <input type='hidden' name='index' value='$index'>
                            <input type='submit' name='delete' value='Hapus'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        }
        echo "</table>";
    }
    ?>
</body>
</html>

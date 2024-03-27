<?php 
    session_start();
    
    function menu($menu) {
        // Sanitize user input to prevent vulnerabilities
        $menu = filter_var($menu, FILTER_SANITIZE_NUMBER_INT);
        
        // Ensure the input is within the expected range
        if ($menu >= 1 && $menu <= 4) {
            // Return the file name based on the menu selection
            switch ($menu) {
                case '1':
                    return 'If.php';
                case '2':
                    return 'switchcase.php';
                case '3':
                    return 'lopping.php';
                    case '4':
                        return 'array.php';
            }
        } else {
            // Handle invalid input
            return 'error.php';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Selector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #333;
        }
        ol {
            padding-left: 20px;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Pilih Menu Yang Ingin Dipilih</h3>
        <ol>
            <li>IF Else</li>
            <li>Switch CASE</li>
            <li>Looping</li>
            <li>Array</li>
        </ol>

        <form action="" method="POST">
            <input type="text" name="menu" placeholder="Masukkan nomor menu di sini">
            <br>
            <input type="submit" name="pilih" value="Pilih">
            <input type="submit" name="reset" value="Reset">
        </form>

        <br>
    <?php 
        if (isset($_POST['pilih'])) {
            // Get the selected menu and store it in the session
            $_SESSION['menu'] = $_POST['menu'];
            // Include the corresponding file based on the menu selection
            $file = menu($_POST['menu']);
            include $file;
        } else {
            // If form is not submitted, but there's a stored menu selection in the session, include the corresponding file
            if (!empty($_SESSION['menu'])) {
                $file = menu($_SESSION['menu']);
                include $file;
            }
        }

        if (isset($_POST['reset'])) {
            // Destroy the session on Reset button click
            session_destroy();
        }
    ;?>
</body>
</html>

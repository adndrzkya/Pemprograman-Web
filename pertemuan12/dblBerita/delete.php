<?php 

    include '../header.php';
    include '../koneksi.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Using prepared statements to avoid SQL injection
        $stmt = $conn->prepare("DELETE FROM tblBerita WHERE idBerita = ?");
        $stmt->bind_param("i", $id);
        $delete = $stmt->execute();

        if ($delete) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "No ID provided.";
    }

    $conn->close();
?>

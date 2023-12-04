<?php
include 'connect.php';
cek_login();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus film berdasarkan ID
    $query = "DELETE FROM `films` WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: filmdisplay.php");
        exit();
    } else {
        echo "Error deleting film: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>

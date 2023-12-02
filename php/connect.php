<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "uas_pemweb"; // Ganti dengan nama database yang digunakan

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
// echo "Koneksi berhasil";

// // Query untuk membuat tabel films jika belum ada
// $sql = "CREATE TABLE IF NOT EXISTS films (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     poster VARCHAR(255) NOT NULL,
//     judul VARCHAR(100) NOT NULL,
//     genre VARCHAR(50) NOT NULL,
//     sutradara VARCHAR(100) NOT NULL,
//     sinopsis TEXT,
//     rating FLOAT
// )";

// // Eksekusi query
// if ($conn->query($sql) === TRUE) {
//     echo "Tabel films berhasil dibuat atau sudah ada.";
// } else {
//     echo "Error creating table: " . $conn->error;
// }

// // Tutup koneksi
// $conn->close();
// ?>

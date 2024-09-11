<?php
// db.php
$host = 'localhost';  // Ganti dengan host database Anda
$user = 'root';       // Ganti dengan username MySQL Anda
$pass = '';           // Ganti dengan password MySQL Anda
$dbname = 'warung_esteh';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>

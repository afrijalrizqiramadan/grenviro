<?php
$servername = "localhost";
$dbname = "u442898688_smartcng";
$username = "u442898688_smartcng";
$password = "Smartcng2024";
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
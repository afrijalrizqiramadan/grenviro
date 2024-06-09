<?php
include 'koneksi.php';

// Ambil nilai yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Melindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query untuk mencari user dengan username dan password yang sesuai
$sql = "SELECT * FROM user WHERE email='$username' AND password='$password'";
$result = $conn->query($sql);

// Memeriksa hasil query
if ($result->num_rows > 0) {
    // Jika ditemukan, user berhasil login
    session_start();
    $_SESSION['username'] = $username;
    echo "1";
} else {
    // Jika tidak ditemukan, user gagal login
    echo "Akun Tidak Ditemukan";
}

// Menutup koneksi
$conn->close();
?>
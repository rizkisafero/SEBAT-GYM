<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "root"; // Username MySQL
$pass = ""; // Password MySQL
$db = "sebat_gym"; // Nama database
$port = 3037; // Port MySQL

// Membuat koneksi menggunakan mysqli
$conn = new mysqli($host, $user, $pass, $db, $port);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil, maka koneksi akan siap digunakan di seluruh aplikasi.
?>
<?php
// Konfigurasi koneksi database
$host = "localhost";
$user = "sebatgym_admin"; // Username MySQL
$pass = "Kdmcity23!"; // Password MySQL
$db = "sebatgym_sebat_gym"; // Nama database

// Membuat koneksi menggunakan mysqli
$conn = new mysqli($host, $user, $pass, $db,);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Jika koneksi berhasil, maka koneksi akan siap digunakan di seluruh aplikasi.
?>
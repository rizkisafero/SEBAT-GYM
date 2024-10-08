<?php
session_start(); // Mulai sesi

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke login.php
    exit;
}

// Jika sudah login, tampilkan halaman dashboard
echo "Selamat datang, " . $_SESSION['username'] . "!";
?>
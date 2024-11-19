<?php
// Mulai sesi
session_start();

// Memasukkan file koneksi
include('koneksi.php');

// Periksa apakah form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Harap isi semua kolom!";
        header("Location: register.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password dan Konfirmasi Password tidak cocok!";
        header("Location: register.php");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Periksa apakah username sudah ada
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = "Username sudah terdaftar!";
        $stmt->close();
        header("Location: register.php");
        exit();
    }
    $stmt->close();

    // Simpan ke database
    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: login.php");
    } else {
        $_SESSION['error'] = "Terjadi kesalahan. Coba lagi.";
    }
    $stmt->close();
}
?>
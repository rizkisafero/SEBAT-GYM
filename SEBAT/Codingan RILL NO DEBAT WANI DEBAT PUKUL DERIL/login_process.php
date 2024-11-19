<?php
// Mulai sesi
session_start();

// Masukkan file koneksi
include('koneksi.php');

// Periksa apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Validasi input
    if (empty($user) || empty($pass)) {
        $_SESSION['error'] = "Username dan Password harus diisi!";
        header("Location: login.php");
        exit();
    }

    // Query untuk memeriksa username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_data = $result->fetch_assoc();

    // Periksa apakah username ada dan password cocok
    if ($user_data && password_verify($pass, $user_data['password'])) {
        // Set session jika login berhasil
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];

        // Redirect ke halaman utama atau dashboard
        header("Location: index.php");
        exit();
    } else {
        // Jika login gagal
        $_SESSION['error'] = "Username atau Password salah!";
        header("Location: login.php");
        exit();
    }
}
?>
<?php
session_start(); // Memulai sesi untuk menyimpan data login

// Konfigurasi koneksi database
$host = 'localhost';
$dbname = 'login_system';
$user = 'root';
$pass = '';

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $pass, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Mengamankan input (menghindari SQL Injection)
$username = $conn->real_escape_string($username);

// Query untuk mencari pengguna di database
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Jika username ditemukan di database
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc(); // Ambil data pengguna
    
    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Jika login berhasil
        $_SESSION['username'] = $user['username']; // Menyimpan username di session
        header("Location: dashboard.php"); // Arahkan ke halaman dashboard
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}

$conn->close(); // Tutup koneksi ke database
?>
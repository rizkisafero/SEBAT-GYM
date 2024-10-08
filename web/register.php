<?php
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

// Mendapatkan data dari form registrasi
$username = $_POST['username'];
$password = $_POST['password'];

// Hash password sebelum disimpan di database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Menyimpan data ke database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
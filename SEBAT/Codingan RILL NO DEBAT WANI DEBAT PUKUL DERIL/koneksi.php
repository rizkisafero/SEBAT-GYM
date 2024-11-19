<?php
$host = "localhost";
$user = "root"; // Ubah sesuai username MySQL
$pass = ""; // Ubah sesuai password MySQL
$db = "sebat_gym";
$port = 3037; // Port MySQL

// Membuat koneksi
$mysqli = new mysqli($host, $user, $pass, $db, $port);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi ke database gagal: " . $mysqli->connect_error);
}

// Fungsi untuk mendapatkan koneksi secara global
function getConnection() {
    global $mysqli;
    return $mysqli;
}

// Fungsi untuk escape string (keamanan input)
function escapeInput($input) {
    $connection = getConnection();
    return $connection->real_escape_string($input);
}

// Fungsi untuk menjalankan query dengan handling error
function executeQuery($query) {
    $connection = getConnection();
    $result = $connection->query($query);
    if (!$result) {
        die("Query error: " . $connection->error);
    }
    return $result;
}

// Contoh fungsi untuk menutup koneksi jika diperlukan
function closeConnection() {
    global $mysqli;
    $mysqli->close();
}
?>
<?php
session_start();
include('../koneksi/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $workout = htmlspecialchars(trim($_POST['workout']));
    $userId = $_SESSION['user_id'] ?? null; // Pastikan user sudah login

    // Validasi data
    if (empty($workout)) {
        $_SESSION['error'] = "Pilih salah satu program latihan.";
        header('Location: workout.php');
        exit();
    }

    if (!$userId) {
        $_SESSION['error'] = "Anda harus login untuk memilih program latihan.";
        header('Location: ../login/login.php');
        exit();
    }

    // Periksa apakah user sudah memilih program ini sebelumnya
    $checkQuery = "SELECT id FROM workout_selections WHERE user_id = ? AND workout = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("is", $userId, $workout);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Anda sudah memilih program ini sebelumnya.";
        header('Location: workout.php');
        exit();
    }

    // Simpan pilihan ke dalam database
    $insertQuery = "INSERT INTO workout_selections (user_id, workout, selected_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("is", $userId, $workout);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Program latihan berhasil dipilih!";
        header('Location: workout_confirmation.php');
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menyimpan pilihan program latihan.";
        header('Location: workout.php');
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: workout.php');
    exit();
}
?>
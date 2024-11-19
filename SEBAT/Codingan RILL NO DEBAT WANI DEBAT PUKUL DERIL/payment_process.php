<?php
// Mulai sesi
session_start();

// Sertakan koneksi database
include('koneksi.php');

// Periksa apakah data dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil koneksi dari koneksi.php
    $koneksi = getConnection();

    // Ambil data dari form
    $name = trim($_POST['name']);
    $membership_type = trim($_POST['membership_type']);
    $amount = trim($_POST['amount']);
    $payment_method = trim($_POST['payment_method']);

    // Validasi input
    if (empty($name) || empty($membership_type) || empty($amount) || empty($payment_method)) {
        $_SESSION['error'] = "Semua field harus diisi.";
        header('Location: payment.php');
        exit();
    }

    if (!is_numeric($amount) || $amount <= 0) {
        $_SESSION['error'] = "Jumlah pembayaran harus berupa angka positif.";
        header('Location: payment.php');
        exit();
    }

    // Gunakan prepared statement untuk query
    $query = "INSERT INTO pembayaran (name, membership_type, amount, payment_method) 
              VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);

    if ($stmt) {
        // Bind parameter
        $stmt->bind_param("ssis", $name, $membership_type, $amount, $payment_method);

        // Eksekusi statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Pembayaran berhasil disimpan.";
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat menyimpan data pembayaran: " . $stmt->error;
        }

        // Tutup statement
        $stmt->close();
    } else {
        $_SESSION['error'] = "Gagal mempersiapkan query: " . $koneksi->error;
    }

    // Redirect kembali ke halaman pembayaran
    header('Location: payment.php');
    exit();
} else {
    // Jika bukan metode POST, redirect ke halaman pembayaran
    $_SESSION['error'] = "Akses tidak valid.";
    header('Location: payment.php');
    exit();
}
?>
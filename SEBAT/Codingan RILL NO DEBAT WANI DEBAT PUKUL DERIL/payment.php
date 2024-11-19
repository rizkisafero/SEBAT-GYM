<?php
// Mulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Gym</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Gaya Umum */
        body, html {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/bg1.jpg') no-repeat center center fixed; /* Gambar latar */
            background-size: cover;
            overflow-x: hidden; /* Mencegah scroll horizontal */
        }

        /* Styling Header */
        header {
            position: relative;
            padding: 20px 0;
        }

        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        nav {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            z-index: 2;
            margin-top: 20px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin-left: 20px;
        }

        nav a:hover {
            color: #ffcc00;
            text-decoration: underline;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: space-between;
            position: relative;
            z-index: 2;
        }

        .logo {
            margin-left: 20px;
            width: 200px;
            height: auto;
        }
        /* Menempatkan form pembayaran di tengah */
        .payment-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            width: 100%;
        }

        .payment-box {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 8px;
            width: 350px;
            margin-bottom: 30px; /* Adding space between payment form and history */
        }

        .payment-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-box input, .payment-box select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .payment-box input[type="submit"] {
            background-color: #ffcc00;
            color: white;
            cursor: pointer;
            border: none;
        }

        .payment-box p {
            text-align: center;
        }

        .payment-box p a {
            color: #ffcc00;
            text-decoration: none;
        }

        
        .history-box {
            background-color: #FFFFFF;
            padding: 20px;
            border-radius: 8px;
            width: 100%;
            max-width: 800px;
            overflow-x: auto;
            margin-top: 30px;
        }

        .history-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .history-box table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-box th, .history-box td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .history-box th {
            background-color: #f2f2f2;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .payment-container {
                align-items: center;
            }

            .payment-box {
                margin-bottom: 30px;
                width: 90%;
            }

            .history-box {
                width: 90%;
            }
        }

        /* Footer Adjustment */
        footer {
            text-align: center;
            padding: 20px;
            background-color: rgba(0,0,0,0.7);
            color: white;
            margin-top: 50px; /* Added margin-top for space before footer */
            width: 100%;
        }
    </style>
</head>
<body>

<?php include('header.php'); ?>

<!-- Menampilkan Pesan Error atau Sukses -->
<?php
if (isset($_SESSION['error'])) {
    echo "<p style='color: red; text-align: center;'>" . htmlspecialchars($_SESSION['error']) . "</p>";
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<p style='color: green; text-align: center;'>" . htmlspecialchars($_SESSION['success']) . "</p>";
    unset($_SESSION['success']);
}
?>

<!-- Kontainer Utama -->
<div class="container">
    <div class="payment-container">
        <!-- Form Pembayaran -->
        <div class="payment-box">
            <h2>Form Pembayaran</h2>
            <form action="payment_process.php" method="POST">
                <input type="text" name="name" placeholder="Nama Lengkap" required>
                <select name="membership_type" required>
                    <option value="" disabled selected>Pilih Jenis Keanggotaan</option>
                    <option value="monthly">Bulanan - Rp 200,000</option>
                    <option value="quarterly">Triwulan - Rp 500,000</option>
                    <option value="yearly">Tahunan - Rp 1,800,000</option>
                </select>
                <input type="text" name="amount" placeholder="Jumlah Pembayaran" required>
                <input type="text" name="payment_method" placeholder="Metode Pembayaran (contoh: Transfer Bank)" required>
                <input type="submit" value="Bayar">
            </form>
            <p><a href="index.php">Kembali ke Beranda</a></p>
        </div>

        <!-- Sejarah Pembayaran -->
        <div class="history-box">
            <h2>History</h2>
            <?php
            // Sertakan koneksi database
            include('koneksi.php');
            $koneksi = getConnection();

            // Query untuk mengambil data pembayaran, misalnya diurutkan terbaru terlebih dahulu
            $query = "SELECT name, membership_type, amount, payment_method, created_at FROM pembayaran ORDER BY created_at DESC";
            $result = $koneksi->query($query);

            if ($result) {
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr>
                            <th>Nama</th>
                            <th>Jenis Keanggotaan</th>
                            <th>Jumlah</th>
                            <th>Metode Pembayaran</th>
                            <th>Tanggal</th>
                          </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars(ucfirst($row['membership_type'])) . "</td>
                                <td>Rp " . number_format($row['amount'], 0, ',', '.') . "</td>
                                <td>" . htmlspecialchars($row['payment_method']) . "</td>
                                <td>" . htmlspecialchars(date("d M Y H:i", strtotime($row['created_at']))) . "</td>
                              </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='text-align: center;'>Belum ada pembayaran yang dilakukan.</p>";
                }
            } else {
                echo "<p style='color: red; text-align: center;'>Terjadi kesalahan saat mengambil data pembayaran: " . htmlspecialchars($koneksi->error) . "</p>";
            }

            // Tutup koneksi jika diperlukan
            // $koneksi->close();
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>SEBAT GYM</p>
</footer>

</body>
</html>

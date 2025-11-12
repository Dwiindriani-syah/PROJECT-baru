<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$barang = [
    ["kode" => "BRG001", "nama" => "Luna Tote Bag", "harga" => 55000, "jumlah" => 3],
    ["kode" => "BRG002", "nama" => "Aurora Mug", "harga" => 30000, "jumlah" => 5],
    ["kode" => "BRG003", "nama" => "Estelle Keychain", "harga" => 10000, "jumlah" => 2],
    ["kode" => "BRG004", "nama" => "Celestia Pen", "harga" => 15000, "jumlah" => 4],
    ["kode" => "BRG005", "nama" => "Blush Journal", "harga" => 25000, "jumlah" => 1]
];

shuffle($barang);
$totalBelanja = 0;
foreach ($barang as &$b) {
    $b["total"] = $b["harga"] * $b["jumlah"];
    $totalBelanja += $b["total"];
}

if ($totalBelanja < 50000) {
    $diskonPersen = 5;
} elseif ($totalBelanja <= 100000) {
    $diskonPersen = 10;
} else {
    $diskonPersen = 15;
}
$diskon = $totalBelanja * ($diskonPersen / 100);
$totalBayar = $totalBelanja - $diskon;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - LUNAVIA MART</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: linear-gradient(to right, #b3e5fc, #f8bbd0);
            text-align: center;
            margin: 0;
            padding: 0;
        }
        h1 { color: #e91e63; margin-top: 40px; }
        .container {
            background: white;
            width: 80%;
            margin: 40px auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            padding: 20px 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #f8bbd0;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f8bbd0;
            color: #333;
        }
        tr:nth-child(even) td {
            background-color: #fff8fa;
        }
        .summary td {
            font-weight: bold;
            border: none;
            padding: 6px;
        }
        .summary td:first-child { text-align: right; }
        .highlight { color: #e91e63; }
        .logout-btn {
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 25px;
        }
        .logout-btn:hover { background-color: #d81b60; }
    </style>
</head>
<body>
    <h1>🌸 LUNAVIA MART 🌸</h1>
    <h3>Selamat datang, <b><?= $_SESSION['username']; ?></b> 💕</h3>
    <p><b>Daftar Penjualan Hari Ini</b></p>

    <div class="container">
        <table>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            <?php foreach ($barang as $b): ?>
            <tr>
                <td><?= $b["kode"]; ?></td>
                <td><?= $b["nama"]; ?></td>
                <td>Rp <?= number_format($b["harga"], 0, ',', '.'); ?></td>
                <td><?= $b["jumlah"]; ?></td>
                <td>Rp <?= number_format($b["total"], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <table class="summary">
            <tr><td>Total Belanja:</td><td>Rp <?= number_format($totalBelanja, 0, ',', '.'); ?></td></tr>
            <tr><td>Diskon (<?= $diskonPersen; ?>%):</td><td>Rp <?= number_format($diskon, 0, ',', '.'); ?></td></tr>
            <tr><td>Total Bayar:</td><td class="highlight">Rp <?= number_format($totalBayar, 0, ',', '.'); ?></td></tr>
        </table>
    </div>

    <form action="logout.php" method="POST">
        <button class="logout-btn">Logout</button>
    </form>
</body>
</html>

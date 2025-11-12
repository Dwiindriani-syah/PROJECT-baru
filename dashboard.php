<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
}

// Data barang
$kode_barang = ["BRC001", "BRC002", "BRC003", "BRC004", "BRC005"];
$nama_barang = ["Aurora Mug", "Blush Journal", "Celestia Pen", "Dawn Tote Bag", "Estelle Keychain"];
$harga_barang = [30000, 25000, 15000, 40000, 10000];

// Acak urutan index barang
$indeks = array_keys($kode_barang);
shuffle($indeks);

// Ambil 3 barang acak
$indeks_terpilih = array_slice($indeks, 0, 3);

$total_harga = [];
$jumlah_beli = [];
$grand_total = 0;

foreach ($indeks_terpilih as $i) {
  $jumlah = rand(1, 3);
  $jumlah_beli[] = $jumlah;
  $total = $harga_barang[$i] * $jumlah;
  $total_harga[] = $total;
  $grand_total += $total;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - LUNAVIA MART</title>
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
      margin: 0;
      padding: 20px;
    }
    h2 { text-align: center; color: #333; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    th, td { padding: 12px; text-align: center; }
    th { background-color: #ff8fab; color: white; }
    tr:nth-child(even) { background-color: #fff0f5; }
    .total-box {
      margin-top: 20px;
      text-align: right;
      background: #fff;
      padding: 15px;
      border-radius: 15px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 300px;
      float: right;
    }
    .logout-btn {
      background-color: #ff8fab;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      float: left;
      margin-top: 20px;
      transition: 0.3s;
    }
    .logout-btn:hover { background-color: #ffb3c6; }
  </style>
</head>
<body>

  <h2>🌸 Selamat datang, <?= $_SESSION['username']; ?> 🌸</h2>
  <h3 style="text-align:center;">Daftar Penjualan Acak Hari Ini</h3>

  <table>
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga (Rp)</th>
      <th>Jumlah Beli</th>
      <th>Total Harga (Rp)</th>
    </tr>

    <?php for ($x = 0; $x < count($indeks_terpilih); $x++) {
      $i = $indeks_terpilih[$x]; ?>
      <tr>
        <td><?= $kode_barang[$i]; ?></td>
        <td><?= $nama_barang[$i]; ?></td>
        <td><?= number_format($harga_barang[$i], 0, ',', '.'); ?></td>
        <td><?= $jumlah_beli[$x]; ?></td>
        <td><?= number_format($total_harga[$x], 0, ',', '.'); ?></td>
      </tr>
    <?php } ?>
  </table>

  <div class="total-box">
    <p><strong>Total Belanja:</strong></p>
    <p>Rp <?= number_format($grand_total, 0, ',', '.'); ?></p>
  </div>

  <form method="POST" action="logout.php">
    <button type="submit" class="logout-btn">Logout</button>
  </form>

</body>
</html>

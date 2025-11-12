<?php
session_start();

// Kalau belum login, kembalikan ke halaman login
if(!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit;
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
      padding: 40px;
      text-align: center;
    }
    h1 {
      color: #ff8fab;
    }
    table {
      margin: 20px auto;
      border-collapse: collapse;
      width: 80%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 8px;
    }
    th {
      background-color: #ffb3c6;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #fff0f5;
    }
  </style>
</head>
<body>
  <h1>🌸 LUNAVIA MART 🌸</h1>
  <h3>Daftar Produk</h3>

  <?php
  $kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
  $nama_barang = ["Luna Tote Bag", "Vivi Scrunchie", "Aurora Mug", "Blush Journal", "Estelle Keychain"];
  $harga_barang = [55000, 15000, 30000, 25000, 10000];
  ?>

  <table>
    <tr>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Harga (Rp)</th>
    </tr>
    <?php
    for($i = 0; $i < count($kode_barang); $i++) {
      echo "<tr>
              <td>{$kode_barang[$i]}</td>
              <td>{$nama_barang[$i]}</td>
              <td>" . number_format($harga_barang[$i], 0, ',', '.') . "</td>
            </tr>";
    }
    ?>
  </table>
</body>
</html>

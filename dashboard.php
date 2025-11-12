<?php
session_start();

// Cek login
if (!isset($_SESSION['username'])) {
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
            width: 85%;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
        }
        th {
            background-color: #ffb3c6;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #fff0f5;
        }
        .logout-btn {
            background: #ff8fab;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .logout-btn:hover {
            background: #ffb3c6;
        }
    </style>
</head>
<body>

    <h1>🌸 LUNAVIA MART 🌸</h1>
    <h3>Selamat datang, <?php echo $_SESSION['username']; ?> 💕</h3>
    <h4>Daftar Penjualan Acak Hari Ini</h4>

    <?php
    // Daftar barang (dari commit 5)
    $kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
    $nama_barang = ["Luna Tote Bag", "Vivi Scrunchie", "Aurora Mug", "Blush Journal", "Estelle Keychain"];
    $harga_barang = [55000, 15000, 30000, 25000, 10000];

    // Array tambahan (commit 6)
    $beli = [];
    $jumlah = [];
    $total = [];
    $grandtotal = 0;

    // Logika pembelian random
    $barang_acak = array_rand($kode_barang, 3); // ambil 3 barang acak

    foreach ($barang_acak as $i => $index) {
        $beli[$i] = [
            "kode" => $kode_barang[$index],
            "nama" => $nama_barang[$index],
            "harga" => $harga_barang[$index],
            "jumlah" => rand(1, 5)
        ];
        $beli[$i]["total"] = $beli[$i]["harga"] * $beli[$i]["jumlah"];
    }
    ?>

    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga (Rp)</th>
            <th>Jumlah Beli</th>
            <th>Total Harga (Rp)</th>
        </tr>

        <?php
        foreach ($beli as $barang) {
            echo "<tr>
                    <td>{$barang['kode']}</td>
                    <td>{$barang['nama']}</td>
                    <td>" . number_format($barang['harga'], 0, ',', '.') . "</td>
                    <td>{$barang['jumlah']}</td>
                    <td>" . number_format($barang['total'], 0, ',', '.') . "</td>
                  </tr>";
        }
        ?>
    </table>

    <form action='logout.php' method='post'>
        <button class='logout-btn' type='submit'>Logout</button>
    </form>

</body>
</html>

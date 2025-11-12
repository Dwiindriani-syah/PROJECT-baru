<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
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
      background: linear-gradient(135deg, #fbc2eb, #a6c1ee);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .dashboard {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
      width: 360px;
      transition: 0.3s;
    }

    .dashboard:hover {
      transform: scale(1.02);
    }

    h2 {
      color: #333;
      margin-bottom: 10px;
    }

    p {
      color: #777;
      font-size: 14px;
      margin-bottom: 20px;
    }

    .logout-btn {
      background: #ff8fab;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
      transition: 0.3s;
      text-decoration: none;
    }

    .logout-btn:hover {
      background: #ffb3c6;
    }
  </style>
</head>
<body>

  <div class="dashboard">
    <h2>🌸 Selamat Datang, <?= $_SESSION['username']; ?>!</h2>
    <p>Hari yang indah untuk berjualan di Lunavia Mart 💕</p>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>

</body>
</html>

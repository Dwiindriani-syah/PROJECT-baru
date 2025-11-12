<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - LUNAVIA MART</title>

  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #a8edea, #fed6e3);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .login-container {
      background: white;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      width: 320px;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .login-container:hover {
      transform: scale(1.02);
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 90%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #ff8fab;
      box-shadow: 0 0 8px rgba(255, 192, 203, 0.5);
    }

    button {
      background: #ff8fab;
      border: none;
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-size: 15px;
      margin-top: 10px;
      transition: 0.3s;
    }

    button:hover {
      background: #ffb3c6;
    }

    p {
      color: #777;
      font-size: 13px;
      margin-top: 15px;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>🌷 Login LUNAVIA MART</h2>
    <form method="POST" action="index.php">
      <input type="text" name="username" placeholder="Masukkan Username" required><br>
      <input type="password" name="password" placeholder="Masukkan Password" required><br>
      <button type="submit" name="login">Login</button>
    </form>
    <p>Masuklah dan temukan keindahan dalam setiap langkah 🌸</p>
  </div>

</body>
</html>

<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  // Query untuk mencari user berdasarkan email
  $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->store_result();

  // Jika email ditemukan di database
  if ($stmt->num_rows > 0) {
    $stmt->bind_result($user_id, $full_name, $db_password);
    $stmt->fetch();

    // Cek apakah password sesuai
    if ($password == $db_password) {
      $_SESSION['user_id'] = $user_id;
      $_SESSION['full_name'] = $full_name;

      // Redirect ke halaman dashboard atau halaman utama
      header("Location: /apps/home.php");
      exit();
    } else {
      $error_message = "Password salah!";
    }
  } else {
    $error_message = "Email tidak ditemukan!";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="/assets/css/style-login.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="container">
    <img src="/assets/img/login/kostin.svg" alt="Logo" class="logo" />
    <h2 id="judultxt">Login</h2>
    <p id="txt1">Masukkan email dan password untuk melanjutkan</p>

    <?php if (isset($error_message)): ?>
      <p style="color: red;"><?= $error_message; ?></p>
    <?php endif; ?>

    <form method="POST">
      <div class="input-group">
        <img src="/assets/img/login/email.svg" class="logo1" />
        <input type="email" name="email" placeholder="Email" required />
      </div>
      <div class="input-group">
        <img src="/assets/img/login/password.svg" class="logo2" />
        <input type="password" name="password" placeholder="Password" required />
      </div>
      <button type="submit" class="login-btn">Login</button>
    </form>

    <p class="register-text">
      Belum punya akun? <a href="/apps/register.php">Daftar sekarang!</a>
    </p>
    <p class="forgot-password"><a href="lupa-password.php">Lupa Password?</a></p>
  </div>
</body>

</html>
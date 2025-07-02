<?php
session_start();
include 'config.php'; // Koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Cek apakah email ada di database
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['reset_email'] = $email; // Simpan email ke session
        header("Location: password-baru.php"); // Redirect ke halaman ubah password
        exit();
    } else {
        $error_message = "Email tidak ditemukan!";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="/assets/css/style-lupa-password.css">
    <link rel="icon" href="/assets/img/home/kostin.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="/assets/img/login/kostin.svg" alt="Logo" class="logo">
        <h2 class="title">Lupa Password</h2>
        <p class="subtitle">Masukkan email untuk verifikasi pembuatan password baru</p>
        <form method="POST">
            <div class="input-group">
                <img src="../assets/img/login/email.svg" alt="Email Icon" class="icon">
                <input name="email" type="email" placeholder="Email" required>
            </div>
            <button type="submit" class="submit-btn">Kirim</button>
        </form>
        <p class="info-text">Kode verifikasi akan dikirim ke akun email Anda</p>
    </div>
</body>

</html>
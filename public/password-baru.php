<?php
session_start();
include 'config.php'; // Koneksi database

if (!isset($_SESSION['reset_email'])) {
    header("Location: lupa-password.php"); // Jika tidak ada email di session, kembali ke halaman awal
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['reset_email'];
    $new_password = $_POST['newpass'];
    $confirm_password = $_POST['confirmpass'];

    // Validasi password baru
    if ($new_password != $confirm_password) {
        echo "Password tidak cocok!";
        exit();
    }

    if (strlen($new_password) < 8) {
        echo "Password harus minimal 8 karakter!";
        exit();
    }

    // Update password di database (tanpa hash)
    $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
    $stmt->bind_param("ss", $new_password, $email);
    $stmt->execute();

    // Hapus session agar tidak bisa diakses lagi
    unset($_SESSION['reset_email']);

    echo "Password berhasil diubah! Silakan <a href='/public/login.php'>login</a>.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link rel="stylesheet" href="css/password-baru.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="kostin.svg" alt="Logo" class="logo">
        <h2 class="title">Buat Password Baru</h2>
        <p class="subtitle">Password baru harus memiliki minimal 8 karakter</p>
        <form method="POST">
            <div class="input-group">
                <img src="view.png" alt="View Icon" class="icon">
                <input name="newpass" type="newpass" placeholder="Password Baru" required>
            </div>
            <div class="input-group">
                <img src="view.png" alt="View Icon" class="icon">
                <input name="confirmpass" type="confirpass" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>
</html>
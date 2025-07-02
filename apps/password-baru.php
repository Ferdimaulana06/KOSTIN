<?php
session_start();
include 'config.php'; // Koneksi database

// Jika tidak ada email di session, kembali ke halaman lupa password
if (!isset($_SESSION['reset_email'])) {
    header("Location: lupa-password.php");
    exit();
}

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['reset_email'];
    $new_password = trim($_POST['newpass']);
    $confirm_password = trim($_POST['confirmpass']);

    // Validasi password baru
    if ($new_password !== $confirm_password) {
        $error_message = "Password tidak cocok!";
    } elseif (strlen($new_password) < 8) {
        $error_message = "Password harus minimal 8 karakter!";
    } else {
        // Update password di database (disarankan menambahkan hash)
        $stmt = $conn->prepare("UPDATE users SET password=? WHERE email=?");
        $stmt->bind_param("ss", $new_password, $email);
        if ($stmt->execute()) {
            // Hapus session agar tidak bisa diakses lagi
            unset($_SESSION['reset_email']);
            // Redirect ke halaman sukses
            header("Location: password-berhasil.php");
            exit();
        } else {
            $error_message = "Terjadi kesalahan saat mengubah password. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Baru</title>
    <link rel="stylesheet" href="/assets/css/style-password-baru.css">
    <link rel="icon" href="/assets/img/home/kostin.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <img src="/assets/img/login/kostin.svg" alt="Logo" class="logo">
        <h2 class="title">Buat Password Baru</h2>
        <p class="subtitle">Password baru harus memiliki minimal 8 karakter</p>

        <?php if (isset($error_message)): ?>
        <div class="info-text" style="color: #c0392b;"><?= htmlspecialchars($error_message) ?></div>
        <?php elseif (isset($success_message)): ?>
        <div class="info-text" style="color: #27ae60;"><?= $success_message ?></div>
        <?php endif; ?>

        <form id="newPasswordForm" action="" method="POST">
            <div class="input-group password-group">
                <input id="newpass" name="newpass" type="password" placeholder="Password Baru" required />
                <img id="toggle-newpass" src="/assets/img/register/eye-closed.png" class="eye-icon" alt="Toggle visibility" />
            </div>
            <div class="input-group password-group">
                <input id="confirmpass" name="confirmpass" type="password" placeholder="Ulangi Password" required />
                <img id="toggle-confirmpass" src="/assets/img/register/eye-closed.png" class="eye-icon"
                alt="Toggle visibility" />
            </div>
            <button type="submit" class="submit-btn">Submit</button>
        </form>        
    </div>

    <script src="/assets/js/script-password-baru.js"></script>
</body>
</html>
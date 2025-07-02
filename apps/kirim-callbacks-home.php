<?php
// kirim-callbacks-home.php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: home.php");
    exit();
}

$first = trim($_POST['first_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['telepon'] ?? '');

$errors = [];
if ($first === '') {
    $errors[] = 'Nama wajib diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}

if ($errors) {
    foreach ($errors as $e) {
        echo "<p style='color:red;'>$e</p>";
    }
    echo "<p><a href='home.php'>Kembali</a></p>";
    exit();
}

// Simpan ke tabel callbacks_home
$stmt = $conn->prepare(
  "INSERT INTO callbacks_home (full_name, email, telepon) VALUES (?, ?, ?)"
);
$stmt->bind_param("sss", $first, $email, $phone);
$stmt->execute();
$stmt->close();

// (Opsional) Kirim notifikasi via email
$to      = 'support@kostin.com';     // ganti sesuai alamat tim Kamu
$subject = 'New Callback Request (Home)';
$message = "Nama: $first\nEmail: $email\nTelepon: $phone\n";
$headers = "From: no-reply@kostin.com\r\n";
@mail($to, $subject, $message, $headers);

// Tampilkan konfirmasi dan tautan kembali
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CallBack</title>
    <link rel="stylesheet" href="/assets/css/style-callback.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="/assets/img/login/kostin.svg" alt="Logo" class="logo">
        <h2 class="title">Terima Kasih</h2>
        <p class="subtitle">Tim kami akan menghubungi anda segera</p>
        <button class="submit-btn" onclick="window.location.href='home.php'">Kembali ke Beranda</button>
    </div>
</body>

</html>

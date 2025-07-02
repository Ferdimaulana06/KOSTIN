<?php
// kirim-kontak.php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: kontak.php");
    exit();
}

$first   = trim($_POST['first_name'] ?? '');
$last    = trim($_POST['last_name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$phone   = trim($_POST['telepon'] ?? '');
$message = trim($_POST['pesan'] ?? '');

$errors = [];
if ($first === '')   $errors[] = 'First Name wajib diisi.';
if ($last === '')    $errors[] = 'Last Name wajib diisi.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
if ($message === '') $errors[] = 'Pesan tidak boleh kosong.';

if ($errors) {
    foreach ($errors as $e) {
        echo "<p style='color:red;'>$e</p>";
    }
    echo "<p><a href='kontak.php'>Kembali</a></p>";
    exit();
}

// Simpan ke tabel kontak
$stmt = $conn->prepare(
  "INSERT INTO kontak (first_name, last_name, email, telepon, pesan)
   VALUES (?, ?, ?, ?, ?)"
);
$stmt->bind_param("sssss", $first, $last, $email, $phone, $message);
$stmt->execute();
$stmt->close();

// Kirim notifikasi email ke tim support
$to      = 'support@kostin.com';  // ganti sesuai alamat support Kamu
$subject = 'Pesan Baru dari Kontak';
$body    = "Nama: $first $last\nEmail: $email\nTelepon: $phone\n\nPesan:\n$message\n";
$headers = "From: no-reply@kostin.com\r\n";
@mail($to, $subject, $body, $headers);

// (Opsional) Autoresponder ke pengirim
$autoSubj = 'Terima kasih telah menghubungi kami';
$autoBody = "Halo $first,\n\nTerima kasih atas pesan Anda. Kami akan membalas secepatnya.\n\nSalam,\nTim Kostin";
@mail($email, $autoSubj, $autoBody, "From: support@kostin.com\r\n");

// Tampilkan halaman konfirmasi
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima kasih</title>
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
        <p class="subtitle">Pesan anda sudah kami terima<br>
        Kami akan segera menindaklanjutnya</p>
        <button class="submit-btn" onclick="window.location.href='home.php'">Kembali ke Beranda</button>
    </div>
</body>

</html>

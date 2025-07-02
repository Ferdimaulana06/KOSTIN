<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$kos_id = intval($_GET['id'] ?? 0);
$user_id = $_SESSION['user_id'];

// Cek kepemilikan
$chk = $conn->prepare("SELECT user_id FROM data_kos WHERE id = ?");
$chk->bind_param("i", $kos_id);
$chk->execute();
$chk->bind_result($owner_id);
if (!$chk->fetch() || $owner_id !== $user_id) {
    die("Akses ditolak atau Kos tidak ditemukan.");
}
$chk->close();

// Hapus folder gambar
$dir = __DIR__ . "/uploads/gambar_kos/{$kos_id}/";
if (is_dir($dir)) {
    foreach (glob($dir . '*') as $file) {
        unlink($file);
    }
    rmdir($dir);
}

// Hapus record (cascade akan menangani gambar_kos & daftar_fasilitas)
$del = $conn->prepare("DELETE FROM data_kos WHERE id = ?");
$del->bind_param("i", $kos_id);
$del->execute();
$del->close();

$conn->close();
header("Location: profil.php");
exit();

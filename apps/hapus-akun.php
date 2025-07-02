<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    // Hapus session & redirect
    session_destroy();
    header("Location: login.php");
    exit();
} else {
    echo "Gagal menghapus akun: " . htmlspecialchars($stmt->error);
    exit();
}

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    echo "Berhasil hapus akun";
    $stmt->close();
    $conn->close();
    session_destroy();
    header("Location: home.php"); // atau redirect ke halaman login
    exit();
} else {
    echo "Gagal menghapus akun: " . $stmt->error;
    $stmt->close();
    $conn->close();
}
?>
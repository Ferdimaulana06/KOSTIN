<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /apps/login.php");
    exit();
}

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE users SET full_name = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $full_name, $email, $user_id);

    if ($stmt->execute()) {
        // Perbarui data di session agar data baru langsung terlihat di halaman lain
        $_SESSION['full_name'] = $full_name;
        $_SESSION['email'] = $email;
        $stmt->close();
        $conn->close();
        header("Location: sukses.php");
        exit();
    } else {
        echo "Gagal menyimpan perubahan: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

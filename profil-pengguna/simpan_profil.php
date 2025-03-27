<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];

    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE pengguna SET nama_depan=?, nama_belakang=?, email=?, no_hp=?, password=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $nama_depan, $nama_belakang, $email, $no_hp, $password, $id);
    } else {
        $sql = "INSERT INTO pengguna (nama_depan, nama_belakang, email, no_hp, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $nama_depan, $nama_belakang, $email, $no_hp, $password);
    }

    if ($stmt->execute()) {
        header("Location: sukses.html"); // Redirect ke halaman sukses
        exit();
    } else {
        echo "Gagal menyimpan perubahan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
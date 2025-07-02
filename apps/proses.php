<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input
    if (isset($_POST['namalengkap'], $_POST['email'], $_POST['password'])) {
        $namalengkap = $conn->real_escape_string($_POST['namalengkap']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        // Hash password
        $hashed_password = $password;

        // Simpan ke database
        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$namalengkap', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect ke login.php setelah berhasil
            header("Location: login.php");
            exit(); // Pastikan tidak ada kode yang dieksekusi setelah redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
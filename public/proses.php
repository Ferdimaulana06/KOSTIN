<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'] )) {
        $namalengkap = $_POST['namalengkap'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (full_name,email,password) VALUES
('$namalengkap','$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan, silahkan <a href=/public/login.php>Login</a>.";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
}
?>
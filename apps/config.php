<?php
$host = "localhost";
$user = "ferdi";
$password = "Ferdi040605";
$database = "kostin";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
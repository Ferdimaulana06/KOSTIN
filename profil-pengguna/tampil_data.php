<?php
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : 1;

$sql = "SELECT * FROM pengguna WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["error" => "Data tidak ditemukan untuk ID $id"]);
}

$stmt->close();
$conn->close();
?>

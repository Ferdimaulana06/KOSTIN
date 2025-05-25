<?php
include 'config.php';
$sql = "SELECT * FROM akun";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "Email: " . $row["email"] . " - Password: " .
$row["password"];
}
} else {
echo "Tidak ada data.";
}
$conn->close();
?>
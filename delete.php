<?php
include 'connect.php';

$id = $_GET['id'];

// Hapus data berdasarkan ID
$sql = "DELETE FROM users WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    // Reset ID agar tetap berurutan (opsional)
    $conn->query("SET @num := 0");
    $conn->query("UPDATE users SET id = @num := (@num+1)");
    $conn->query("ALTER TABLE users AUTO_INCREMENT = 1");

    echo "<script>alert('Data berhasil dihapus!'); window.location='read.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>

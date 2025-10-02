<?php
include 'connect.php';

$data = [
    $_POST['usr'],
    $_POST['psw'],
    $_POST['fname'],
    $_POST['role']
];

$sql = "INSERT INTO users (username, password, fullname, role) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$types = str_repeat("s", count($data));

$stmt->bind_param($types, ...$data);

if ($stmt->execute()) {
    echo "<script>alert('User berhasil didaftarkan!'); window.location='read.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

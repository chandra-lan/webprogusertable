<?php
include 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $fname = $_POST['fullname'];
    $role = $_POST['role'];

    // Jika password baru tidak cocok dengan konfirmasi
    if ($new_password != $confirm_password) {
        echo "<script>alert('Konfirmasi password baru tidak cocok!');</script>";
    } else {
        // Jika password baru tidak kosong → hash baru, jika kosong → tetap lama
        if (!empty($new_password)) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = $row['password']; // tetap gunakan password lama
        }

        // Update data
        $update = "UPDATE users SET password='$hashed_password', fullname='$fname', role='$role' WHERE id=$id";
        if ($conn->query($update) === TRUE) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location='read.php';</script>";
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <script>
    function confirmUpdate() {
      return confirm("Apakah kamu yakin ingin merubah data ini?");
    }
  </script>
</head>
<body>
  <h2>Edit Data User</h2>
  <form method="post" onsubmit="return confirmUpdate()">

    <label>Username:</label><br>
    <input type="text" value="<?= $row['username'] ?>" readonly><br><br>

    <label>Password Baru:</label><br>
    <input type="password" name="new_password" placeholder="Kosongkan jika tidak ingin ganti"><br><br>

    <label>Konfirmasi Password Baru:</label><br>
    <input type="password" name="confirm_password"><br><br>

    <label>Fullname:</label><br>
    <input type="text" name="fullname" value="<?= $row['fullname'] ?>" required><br><br>

    <label>Role:</label><br>
    <select name="role" required>
      <option value="admin" <?= $row['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
      <option value="operator" <?= $row['role'] == 'operator' ? 'selected' : '' ?>>Operator</option>
      <option value="user" <?= $row['role'] == 'user' ? 'selected' : '' ?>>User</option>
    </select><br><br>

    <button type="submit">Update</button>
  </form>
</body>
</html>

<?php
include 'connect.php';
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data User</title>
</head>
<body>
  <h2>Daftar User</h2>
  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Fullname</th>
      <th>Role</th>
      <th>Reg Date</th>
      <th>Opsi</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['fullname'] ?></td>
        <td><?= $row['role'] ?></td>
        <td><?= $row['reg_date'] ?></td>
        <td>
          <a href="update.php?id=<?= $row['id'] ?>">Edit</a> | 
          <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Delete</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>

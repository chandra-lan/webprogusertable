<?php
  include 'connect.php';

  // SQL untuk membuat tabel users
  $sql = "CREATE TABLE users (
      id INT(11) NOT NULL AUTO_INCREMENT,
      username VARCHAR(50) UNIQUE NOT NULL,
      password VARCHAR(100) NOT NULL,
      fullname VARCHAR(50) NOT NULL,
      role VARCHAR(20) NOT NULL,
      status ENUM('active', 'inactive') DEFAULT 'inactive',
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      PRIMARY KEY (id)
  )";

  // Mengeksekusi query dan menampilkan hasil
  if ($conn->query($sql) === TRUE) {
      echo "Table 'users' created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

  $conn->close();
?>

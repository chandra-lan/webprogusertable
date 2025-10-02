
<h2>Add New User Account</h2>
<form action="create.php" method="post">
  <br>Username: <input type="email" name="usr" placeholder="your email" required><br>
  <br>Password: <input type="password" name="psw" minlength = "8" placeholder="Minimal 8 Character" required><br>
  <br>Fullname: <input type="text" name="fname" required><br>
  <br>Role:
  <br><select name="role" required>
    <option value="">=== Choose your role ===</option>
    <option value="admin">Admin</option>
    <option value="operator">Operator</option>
    <option value="visitor">visitor</option>
  </select>
  <br>
  <br><input type="submit" value="Daftar">
  
</form>

<?php
// jalankan session
session_start();
// cek user setelah login 
if (isset($_SESSION['login'])) {
  # code...
  header("Location: index.php");
  exit;
}
// hubungkan ke functions
require 'functions.php';
// ketika tombol login ditekan
if (isset($_POST['login'])) {
  $login = login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <h3>Form Login</h3>
  <?php if (isset($login['error'])) : ?>
    <p style="color: red; font-style:italic"><?= $login['pesan']; ?></p>
  <?php endif; ?>
  <form action="" method="post">
    <ul>
      <li>
        <label>
          Username :<br>
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password :<br>
          <input type="password" name="password" required>
        </label>
      </li><br>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
      <li>
        <a href="registrasi.php">Registrasi</a>
      </li>
    </ul>
  </form>
</body>

</html>
<?php
// menghubungkan ke function
require 'functions.php';
// logika registrasi
if (isset($_POST['registrasi'])) {
  if (registrasi($_POST) > 0) {
    # code...
    echo "<script>
            alert('user baru berhasil ditambahkan!');
            document.location.href = 'login.php';
        </script>";
  } else {
    # code...
    echo "user gagal ditambahkan";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
</head>

<body>
  <!-- 00.02.20 -->
  <h3>Form Registrasi</h3>
  <form action="" method="post">
    <ul>
      <li>
        <label>
          Username : <br>
          <input type="text" name="username" autofocus autocomplete="off" required>
        </label>
      </li>
      <li>
        <label>
          Password : <br>
          <input type="password" name="password1" required>
        </label>
      </li>
      <li>
        <label>
          Confirm Password : <br>
          <input type="password" name="password2" required>
        </label>
      </li><br>
      <li>
        <button type="submit" name="registrasi">Registrasi</button>
      </li>
    </ul>
  </form>
</body>

</html>
<?php
// jalankan session
session_start();
// cek apakah user sudah login atau belum
if (!isset($_SESSION['login'])) {
  # code...
  header("location: login.php");
  exit;
}
// sambungkan ke function
require 'functions.php';
// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  # code...
  if (tambah($_POST) > 0) {
    # code.
    echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>";
  } else {
    # code.
    echo "Data Gagal Ditambahkan";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Service</title>
</head>

<body>
  <h3>Form Tambah Data Service</h3>
  <br>
  <a href="index.php">back</a>
  <form action="" method="post" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          nopol :
          <br><input type="text" name="nopol" autofocus required>
        </label>
      </li>
      <li>
        <label>
          sa :
          <br><input type="text" name="sa" required>
        </label>
      </li>
      <li>
        <label>
          sp :
          <br><input type="text" name="sp">
        </label>
      </li>
      <li>
        <label>
          bl :
          <br><input type="text" name="bl">
        </label>
      </li>
      <li>
        <label>
          nitro :
          <br><input type="text" name="nitro">
        </label>
      </li>
      <li>
        <label>
          bp :
          <br><input type="text" name="bp">
        </label>
      </li>
      <li>
        <label>
          type :
          <br><input type="text" name="type" required>
        </label>
      </li>
      <li>
        <label>
          gambar :
          <br><input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/noimage.png" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <label>
          keluhan :
          <br><input type="text" name="keluhan">
        </label>
      </li>
      <li>
        <br><button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>
  <script src="js/script.js"></script>
</body>

</html>
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
// jika tidak ada id diurl
if (!isset($_GET['id'])) {
  # code...
  header("Location: index.php");
  exit;
}
// ambil id dari url
$id = $_GET['id'];
// query service berdasarkan id
$service = query("SELECT*FROM service WHERE id=$id");
// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  # code...
  if (ubah($_POST) > 0) {
    # code.
    echo "<script>
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php';
          </script>";
  } else {
    # code.
    echo "Data Gagal Diubah";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data Service</title>
</head>

<body>
  <h3>Form Update Data Service</h3>
  <br>
  <a href="index.php">back</a>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $service['id']; ?>">
    <ul>
      <li>
        <label>
          nopol :
          <br><input type="text" name="nopol" autofocus required value="<?= $service['nopol']; ?>">
        </label>
      </li>
      <li>
        <label>
          sa :
          <br><input type="text" name="sa" required value="<?= $service['sa']; ?>">
        </label>
      </li>
      <li>
        <label>
          sp :
          <br><input type="text" name="sp" value="<?= $service['sp']; ?>">
        </label>
      </li>
      <li>
        <label>
          bl :
          <br><input type="text" name="bl" value="<?= $service['bl']; ?>">
        </label>
      </li>
      <li>
        <label>
          nitro :
          <br><input type="text" name="nitro" value="<?= $service['nitro']; ?>">
        </label>
      </li>
      <li>
        <label>
          bp :
          <br><input type="text" name="bp" value="<?= $service['bp']; ?>">
        </label>
      </li>
      <li>
        <label>
          type :
          <br><input type="text" name="type" required value="<?= $service['type']; ?>">
        </label>
      </li>
      <li>
        <input type="hidden" name="gambar_lama" value="<?= $service['gambar']; ?>">
        <label>
          gambar :
          <br><input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $service['gambar']; ?>" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <label>
          keluhan :
          <br><input type="text" name="keluhan" value="<?= $service['keluhan']; ?>">
        </label>
      </li>
      <li>
        <br><button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>
  <script src="js/script.js"></script>
</body>

</html>
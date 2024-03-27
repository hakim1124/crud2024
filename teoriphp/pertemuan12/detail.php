<?php
// jalankan session
session_start();
// cek apakah user sudah login atau belum
if (!isset($_SESSION['login'])) {
  # code...
  header("location: login.php");
  exit;
}
require 'functions.php';
// ambil id dari url
$id = $_GET['id'];
// query service berdasarkan id
$service = query("SELECT*FROM service WHERE id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Service</title>
</head>

<body>
  <h3>Detail Service</h3>
  <ul>
    <li>1</li>
    <li><a href="ubah.php?id=<?= $service['id']; ?>">ubah</a> | <a href="hapus.php?id=<?= $service['id']; ?>" onclick="return confirm('yakin data dihapus');">hapus</a></li>
    <li><img src="img/<?= $service['gambar']; ?>" width="50"></li>
    <li>Nopol : <?= $service['nopol']; ?></li>
    <li>Sa : <?= $service['sa']; ?></li>
    <li>Sp : <?= $service['sp']; ?></li>
    <li>Bl : <?= $service['bl']; ?></li>
    <li>Nitro : <?= $service['nitro']; ?></li>
    <li>Bp : <?= $service['bp']; ?></li>
    <li>Type : <?= $service['type']; ?></li>
    <li>Keluhan : <?= $service['keluhan']; ?></li>
    <li><a href="index.php">kembali</a></li>
  </ul>
</body>

</html>
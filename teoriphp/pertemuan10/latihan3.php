<?php
// hubungkan halaman ini ke functions.php
require "functions.php";
// tampung atau simpan ke variabel service
$service = query("SELECT*FROM service");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Order</title>
</head>

<body>
  <h3>Perintah Kerja Spooring & Balancing</h3>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nopol</th>
    </tr>
    <?php $i = 1;
    foreach ($service as $s) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><a href="detail.php?id=<?= $s['id']; ?>">Lihat Detail</a>
        <td><img src="img/<?= $s['gambar']; ?>" width="50"></td>
        <td><?= $s['nopol']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
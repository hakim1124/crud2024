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
      <th>Sa</th>
      <th>Sp</th>
      <th>Bl</th>
      <th>Nitro</th>
      <th>Bp</th>
      <th>Type</th>
      <th>Keluhan</th>
    </tr>
    <?php $i = 1;
    foreach ($service as $s) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><a href="#">ubah</a> | <a href="#">hapus</a></td>
        <td><img src="img/<?= $s['gambar']; ?>" width="50"></td>
        <td><?= $s['nopol']; ?></td>
        <td><?= $s['sa']; ?></td>
        <td><?= $s['sp']; ?></td>
        <td><?= $s['bl']; ?></td>
        <td><?= $s['nitro']; ?></td>
        <td><?= $s['bp']; ?></td>
        <td><?= $s['type']; ?></td>
        <td><?= $s['keluhan']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>
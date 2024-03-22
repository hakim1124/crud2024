<?php
// hubungkan halaman ini ke functions.php
require "functions.php";
// tampung atau simpan ke variabel service
$service = query("SELECT*FROM service");
// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  # code...
  $service = cari($_POST['keyword']);
}
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
  <a href="tambah.php">Tambah Data Service</a>
  <br><br>
  <form action="" method="post">
    <input type="text" name="keyword" placeholder="cari disini" autocomplete="off" autofocus>
    <button type="submit" name="cari">Cari!</button>
  </form>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>#</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nopol</th>
    </tr>

    <!-- kondisi saat searcing data service namun tidak ada datanya -->
    <?php if (empty($service)) : ?>
      <tr>
        <td colspan="4">
          <p style="color: red; font-style:italic">Data Service Tidak Ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

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
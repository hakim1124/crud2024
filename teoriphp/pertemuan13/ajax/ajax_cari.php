<?php
require '../functions.php';
$service = cari($_GET['keyword']);
?>
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
<?php
function koneksi()
{
  // koneksi ke DB & pilih database
  return mysqli_connect('localhost', 'root', '', 'bengkel');
}

function query($query)
{
  $conn = koneksi();
  // Query isi tabel service
  $result = mysqli_query($conn, $query);
  // if jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  // ubah data kedalam array
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  $conn = koneksi();
  $nopol = htmlspecialchars($data['nopol']);
  $sa = htmlspecialchars($data['sa']);
  $sp = htmlspecialchars($data['sp']);
  $bl = htmlspecialchars($data['bl']);
  $nitro = htmlspecialchars($data['nitro']);
  $bp = htmlspecialchars($data['bp']);
  $type = htmlspecialchars($data['type']);
  $gambar = htmlspecialchars($data['gambar']);
  $keluhan = htmlspecialchars($data['keluhan']);
  $query = "INSERT INTO service VALUES(null,'$nopol','$sa','$sp','$bl','$nitro','$bp','$type','$gambar','$keluhan')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

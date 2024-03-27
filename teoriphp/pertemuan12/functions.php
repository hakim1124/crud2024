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

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM service WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id = htmlspecialchars($data['id']);
  $nopol = htmlspecialchars($data['nopol']);
  $sa = htmlspecialchars($data['sa']);
  $sp = htmlspecialchars($data['sp']);
  $bl = htmlspecialchars($data['bl']);
  $nitro = htmlspecialchars($data['nitro']);
  $bp = htmlspecialchars($data['bp']);
  $type = htmlspecialchars($data['type']);
  $gambar = htmlspecialchars($data['gambar']);
  $keluhan = htmlspecialchars($data['keluhan']);
  $query = "UPDATE service SET 
  nopol='$nopol',
  sa='$sa',
  sp='$sp',
  bl='$bl',
  nitro='$nitro',
  bp='$bp',
  type='$type',
  gambar='$gambar',
  keluhan='$keluhan' 
  WHERE id=$id";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM service WHERE nopol LIKE '%$keyword%' OR sa LIKE '%$keyword%' OR type LIKE '%$keyword%' OR keluhan LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
  // cek dulu username
  if ($users = query("SELECT*FROM users WHERE username = '$username'")) {
    // jika username ada cek passwordnya
    if (password_verify($password, $users['password'])) {
      # setsession terlebih dahulu
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    }
  }
  # jikalau terjadi error tampilkan pesan
  return [
    'error' => true,
    'pesan' => 'Username/Password Salah'
  ];
}

function registrasi($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username atau password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    # code...
    echo "<script>
            alert('username/password tidak boleh kosong');
            document.location.href = 'registrasi.php';
        </script>";
    return false;
  }
  // jika username sudah ada
  if (query("SELECT*FROM users WHERE username='$username'")) {
    # code...
    echo "<script>
            alert('username sudah ada/terdaftar');
            document.location.href = 'registrasi.php';
        </script>";
    return false;
  }
  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    # code...
    echo "<script>
            alert('konfirmasi password tidak sesuai!');
            document.location.href = 'registrasi.php';
        </script>";
    return false;
  }
  // jika password < 5 digit tidak boleh
  if (strlen($password1 < 5)) {
    # code...
    echo "<script>
            alert('password terlalu pendek!');
            document.location.href = 'registrasi.php';
        </script>";
    return false;
  }
  // jika password dan username sudah sesuai
  // enkripsi passwordnya
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // lalu insert ke tabel users
  $query = "INSERT INTO users VALUES(null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

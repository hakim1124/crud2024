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
  // $gambar = htmlspecialchars($data['gambar']);

  // gambar akan diambil dari functions upload
  $gambar = upload();
  if (!$gambar) {
    # code... 
    return false;
  }

  $keluhan = htmlspecialchars($data['keluhan']);
  $query = "INSERT INTO service VALUES(null,'$nopol','$sa','$sp','$bl','$nitro','$bp','$type','$gambar','$keluhan')";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $type_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    # code...
    // echo "<script>alert('pilih gambar terlebih dahulu!');</script>";
    return 'noimage.png';
  }
  // cek extensi file 
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    # code...
    echo "<script>alert('yang anda pilih bukan gambar!');</script>";
    return false;
  }
  // cek type file
  if ($type_file != 'image/jpeg' && $type_file != 'image/png') {
    # code...
    echo "<script>alert('yang anda pilih bukan gambar!');</script>";
    return false;
  }
  // cek ukuran file max 5 mb
  if ($ukuran_file > 5000000) {
    # code...
    echo "<script>alert('ukuran terlalu besar!');</script>";
    return false;
  }
  // lolos pengecekan upload file
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar difolder image
  $service = query("SELECT * FROM service WHERE id=$id");
  if ($service['gambar'] != 'noimage.png') {
    unlink('img/' . $service['gambar']);
  }

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
  $gambar_lama = htmlspecialchars($data['gambar_lama']);
  $keluhan = htmlspecialchars($data['keluhan']);

  $gambar = upload();
  if (!$gambar) {
    # code...
    return false;
  }

  if ($gambar == 'noimage.png') {
    # code...
    $gambar = $gambar_lama;
  }

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

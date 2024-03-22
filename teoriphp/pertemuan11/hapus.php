<?php
// hubungkan ke functions
require 'functions.php';
// jika tidak ada id diurl
if (!isset($_GET['id'])) {
  # code...
  header("Location: index.php");
  exit;
}
// mengambil id dari url
$id = $_GET['id'];
if (hapus($id) > 0) {
  # code.
  echo "<script>
   alert('Data Berhasil Dihapus');
   document.location.href = 'index.php';
 </script>";
} else {
  # code.
  echo "Data Gagal Dihapus";
}

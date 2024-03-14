-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2024 pada 22.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alifstok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `awal` varchar(100) NOT NULL,
  `masuk` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `keluar` varchar(100) NOT NULL,
  `sisa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id`, `tanggal`, `nama_barang`, `gambar`, `satuan`, `awal`, `masuk`, `total`, `keluar`, `sisa`) VALUES
(1, '2024-03-09', 'Alumunium Foil', 'aluminium.jpg', 'ROOL', '1', '0', '1', '0', '1'),
(2, '2024-03-05', 'Bayclean', 'bayclin.jpg', 'Botol', '0', '0', '0', '0', '0'),
(3, '2024-03-05', 'Baygon', 'baygon.jpeg', 'Botol', '0', '0', '0', '0', '0'),
(4, '2024-03-05', 'Box Super Box', 'SUPERBOX.PNG', 'PCS', '0', '0', '0', '0', '0'),
(5, '2024-03-05', 'Mika Dalam Super Box', 'mika.jpeg', 'Pcs', '0', '0', '0', '0', '0'),
(6, '2024-03-06', 'Cup Kuah', 'cupkuah.jpeg', 'PerKarton', '0', '0', '0', '0', '0'),
(7, '2024-03-06', 'Garbu Plastik', 'garbu.jpeg', 'Pack', '0', '0', '0', '0', '0'),
(8, '2024-03-06', 'Gelas Cup', 'gelas.jpeg', 'Pack', '0', '0', '0', '0', '0'),
(9, '2024-03-06', 'Hand Soap', 'handsoap.jpg', 'JRGN', '0', '0', '0', '0', '0'),
(10, '2024-03-06', 'Isolasi Warung', 'isolasi_sedang.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(11, '2024-03-06', 'Kertas Bungkus Nasi', 'bungkus.jpg', 'Pack', '0', '0', '0', '0', '0'),
(12, '2024-03-06', 'Kertas Printer Kasir', 'kertas.jpg', 'Roll', '0', '0', '0', '0', '0'),
(13, '2024-03-06', 'Lunch Box Small', 'lunch.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(14, '2024-03-06', 'Lunch Box Medium', 'medium.jpeg', 'Pcs', '0', '0', '0', '0', '0'),
(15, '2024-03-06', 'Metal Scouring Pad', 'metal.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(16, '2024-03-06', 'Nota Steak 1 Play', 'nota.jpg', 'Bendel', '0', '0', '0', '0', '0'),
(17, '2024-03-06', 'Nota Titipan Suplier', 'nota.jpg', 'Bendel', '0', '0', '0', '0', '0'),
(18, '2024-03-06', 'Nota TTB', 'nota.jpg', 'Bendel', '0', '0', '0', '0', '0'),
(19, '2024-03-06', 'Pisau Plastik', 'pisau.jpg', 'Pack', '0', '0', '0', '0', '0'),
(20, '2024-03-06', 'Plastik BO', 'plastik.jpeg', 'Pcs', '0', '0', '0', '0', '0'),
(21, '2024-03-06', 'Plastik Jumbo', 'jumbo.jpeg', 'Pack', '0', 'o', '0', '0', '0'),
(22, '2024-03-06', 'Plastik Klip', 'klip.jpg', 'Pack', '0', '0', '0', '0', '0'),
(23, '2024-03-06', 'Plastik KO', 'ko.jpg', 'Pack', '0', '0', '0', '0', '0'),
(24, '2024-03-06', 'Plastik Sampah', 'sampah.jpeg', 'Pcs', '0', '0', '0', '0', '0'),
(25, '2024-03-06', 'Plastik TO', 'ko.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(26, '2024-03-06', 'Sedotan Steril', 'sedotan.jpeg', 'Pack', '0', '0', '0', '0', '0'),
(27, '2024-03-06', 'Sendok Plastik', 'sendok.jpg', 'Pack', '0', '0', '0', '0', '0'),
(28, '2024-03-06', 'Serabut Jaring', 'serabut.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(29, '2024-03-06', 'Spon Cuci', 'spon.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(30, '2024-03-06', 'Sunlight Cair', 'sunlight.jpg', 'Pack', '0', '0', '0', '0', '0'),
(31, '2024-03-06', 'Super Pal', 'superpell.jpg', 'Pack', '0', '0', '0', '0', '0'),
(32, '2024-03-06', 'Tissu Makan', 'tissu.jpg', 'Karton', '0', '0', '0', '0', '0'),
(33, '2024-03-06', 'Tusuk Gigi', 'tusuk.png', 'Pack', '0', '0', '0', '0', '0'),
(34, '2024-03-06', 'Tutup Cembung', 'tutup.jpg', 'Pcs', '0', '0', '0', '0', '0'),
(35, '2024-03-06', 'Vixal', 'vixal.jpg', 'Pack', '0', '0', '0', '0', '0'),
(36, '2024-03-06', 'Wipol', 'wipol.jpg', 'Pack', '0', '0', '0', '0', '0'),
(37, '2024-03-06', 'Gas LPG', 'lpg.jpeg', 'Tabung', '0', '0', '0', '0', '0'),
(38, '2024-03-08', 'Blueband', '65eb041ec3644.jpeg', 'Pcs', '1', '1', '2', '0', '2'),
(39, '2024-03-09', 'hakim', '65ec5679cb12a.jpeg', 'pcs', '1', '1', '2', '0', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'alif', '$2y$10$u4BiAEcttSq9lL7RJKg6.eAI7T1Xg.hzmIGwApQu2QfdwmRyS3XTy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

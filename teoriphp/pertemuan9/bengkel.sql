-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Mar 2024 pada 22.39
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
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `sa` varchar(100) NOT NULL,
  `sp` varchar(100) NOT NULL,
  `bl` varchar(100) NOT NULL,
  `nitro` varchar(100) NOT NULL,
  `bp` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keluhan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `nopol`, `sa`, `sp`, `bl`, `nitro`, `bp`, `type`, `gambar`, `keluhan`) VALUES
(1, 'N 1155 B', 'Imam Budi', 'ya', '5', '5', '2', 'Land Cruiser', '65dd1b6c59adb.jpg', 'stir miring kiri'),
(2, 'N 1255 A', 'Abdul Wakid', 'ya', '5', '5', '2', 'Calya', 'calya.png', 'stir berat'),
(3, 'N 1111 AYE', 'Suprapto', 'ya', '5', '5', '2', 'HIACE', 'hiace.jpg', 'STER GETAR'),
(4, 'N 1111 AYE', 'khusairi', 'ya', '5', '5', '2', 'HIACE', 'hiace.jpg', 'STER GETAR'),
(10, 'N 112 AB', 'SUPRAPTO', 'ya', '5', '5', '2', 'HIACE', 'honda_crider.jpg', 'STER GETAR'),
(12, 'N 1111 AYE', 'SUPRAPTO', 'ya', '5', '5', '2', 'HIACE', '65e48bc8bc57b.jpg', 'STER GETAR'),
(14, 'N 1111 AYE', 'SUPRAPTO', 'ya', '5', '5', '2', 'HIACE', '65eb95da9356a.jpeg', 'STER GETAR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'hakim', '$2y$10$oxQtgDypupSK4FZnxKs9L./s9BDFQDrBCqx2xBOvlU7jlG2RItJLa'),
(2, 'admin', '$2y$10$x3LA93bX3Eu72BuU3IZ4p.Bl3jU4h6dA3r/7WsrRb2K2elm3RdBPy'),
(3, 'alif', '$2y$10$9R9iP6obS1NtXl6uXWPxrO2CM5LuIixdUralPl6EncWEPqL9Rn512');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

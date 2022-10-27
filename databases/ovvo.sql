-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 06.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovvo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` char(1) NOT NULL,
  `status_nikah` char(1) NOT NULL,
  `no_izin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `kode`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `telp`, `alamat`, `agama`, `status_nikah`, `no_izin`) VALUES
(1, '123', 'Endro', 'Sukoharjo', '2022-10-27 08:20:23', 'L', '123654789', 'Solo', '1', 'S', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_right`
--

CREATE TABLE `user_right` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` char(2) NOT NULL,
  `register` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_right`
--

INSERT INTO `user_right` (`id`, `kode`, `nama`, `username`, `password`, `type`, `register`, `last_login`) VALUES
(27, 'A11666671000', 'Administrator', 'Administrator', '202cb962ac59075b964b07152d234b70', 'A1', '2022-10-25 11:10:00', NULL),
(28, 'D21666830088', 'Endro Setiawan', 'Endro', '202cb962ac59075b964b07152d234b70', 'D2', '2022-10-27 07:21:28', NULL),
(31, 'P01666842550', 'Plakat Champion', 'Plakat Champion', '202cb962ac59075b964b07152d234b70', 'P0', '2022-10-27 10:49:10', NULL),
(32, 'P31666842929', 'Abdullah', 'Dullah', '202cb962ac59075b964b07152d234b70', 'P3', '2022-10-27 10:55:29', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_right`
--
ALTER TABLE `user_right`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user_right`
--
ALTER TABLE `user_right`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

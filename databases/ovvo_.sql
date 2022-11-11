-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2022 pada 07.52
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
  `no_izin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `kode`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `telp`, `alamat`, `agama`, `status_nikah`, `no_izin`) VALUES
(4, 'D21667199748', 'Juna ksatria naga__', 'majapahit', '2022-10-31', 'P', '789', 'mojomahit tapi legi', '1', 'B', 'asdasd'),
(5, 'D21667533803', 'Juna ksatria naga__', 'asdsad', '2022-11-15', 'L', 'asd', 'asd', '4', 'S', 'sstttt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id` int(7) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `agama` int(1) NOT NULL,
  `status_nikah` char(1) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alergi_obat` varchar(255) NOT NULL,
  `jenis_kunjungan` char(1) NOT NULL,
  `tgl_daftar` varchar(20) NOT NULL,
  `diagnosa_awal` varchar(255) NOT NULL,
  `telp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `status_nikah`, `pekerjaan`, `alergi_obat`, `jenis_kunjungan`, `tgl_daftar`, `diagnosa_awal`, `telp`) VALUES
(4, 'P31667534004', 'Endro Setiawan', 'L', 'Sukoharjo', '2022-11-09', 'MojoGedang', 1, 'B', 'Programer', 'paracetamol', 'I', '2022-11-04', 'Flu', 4545456),
(5, 'P31667534172', 'Edro KASINO', 'P', 'Boyolali', '2022-11-02', 'Pengging', 4, 'S', 'Programer', 'paracetamol, bodrek', 'J', '2022-11-16', 'Flu burung\r\npanas smpe mo mati', 123456),
(9, 'P31667786644', 'Zaky', 'L', 'Baki', '2005-06-14', 'Banten', 1, 'B', 'Siswa', 'bodrek, panadol', 'I', '2022-11-07', 'flu, batuk, panas, demam', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
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
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id`, `kode`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `telp`, `alamat`, `agama`, `status_nikah`, `ket`) VALUES
(5, 'P01667533803', 'Plakat Champion', 'Selo', '2022-11-10', 'L', '132564987', 'Boyolali', '4', 'S', 'Yeyyy'),
(7, 'P01668052928', 'ANu', 'kebon', '2022-10-30', 'P', '654987', 'mbuh', '6', 'B', 'Majnun');

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
(27, 'A11666671000', 'Administrator', 'Administrator', '202cb962ac59075b964b07152d234b70', 'A1', '2022-10-25 11:10:00', '2022-11-10 08:56:23'),
(28, 'D21666830088', 'Endro Setiawan', 'Endro', '202cb962ac59075b964b07152d234b70', 'D2', '2022-10-27 07:21:28', '2022-11-07 09:17:25'),
(31, 'P01666842550', 'Plakat Champion', 'Plakat Champion', '202cb962ac59075b964b07152d234b70', 'P0', '2022-10-27 10:49:10', '2022-11-07 09:17:25'),
(32, 'P31666842929', 'Abdullah', 'Dullah', '202cb962ac59075b964b07152d234b70', 'P3', '2022-10-27 10:55:29', '2022-11-07 09:17:25'),
(34, 'D21666928250', 'Plakat Champion', 'asd', '49f0bad299687c62334182178bfd75d8', 'D2', '2022-10-28 10:37:30', '2022-11-07 09:17:25'),
(37, 'A11667198755', 'Endro Setiawan', 'Dullah', 'b4b147bc522828731f1a016bfa72c073', 'A1', '2022-10-31 13:45:55', '2022-11-07 09:17:25'),
(40, 'D21668048983', 'D21667199748', 'juna', '5f039b4ef0058a1d652f13d612375a5b', 'D2', '2022-11-10 09:56:23', NULL),
(41, 'D21667199748', 'Juna ksatria naga__', 'asdasd', 'f1cf78e0ba9acd143c5a70df995544e5', 'D2', '2022-11-10 10:01:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_right`
--
ALTER TABLE `user_right`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

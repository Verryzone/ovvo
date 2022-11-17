-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 17, 2022 at 03:48 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `dokter`
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
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `kode`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `telp`, `alamat`, `agama`, `status_nikah`, `no_izin`) VALUES
(6, 'D21668493619', 'Dr.Aziz', 'Surakarta', '2022-11-15', 'L', '321654987', 'Manahan', '1', 'S', 'DOKTERHERBAL'),
(7, 'D21668493706', 'Dr. Audy', 'Solo', '2022-11-15', 'P', '085124369741', 'Palur', '2', 'S', 'DOKTER GIGI'),
(8, 'D21668493760', 'Dr. Diky', 'Solo', '2022-11-15', 'L', '085321654987', 'Solo', '5', 'B', 'DOKTER TULANG'),
(9, 'D21668493826', 'Dr. Jojooo', 'Wakanda', '2022-11-15', 'L', '08556416278', 'Asgard', '2', 'B', 'DOKTER KUWAT');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `stok` int(10) NOT NULL,
  `tgl_exp` varchar(20) NOT NULL,
  `harga` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `kode`, `nama`, `stok`, `tgl_exp`, `harga`) VALUES
(2, 'OB1668136898', 'Paracetamol', 2000, '2026-07-15', '32000'),
(3, 'OB1668137332', 'Panadol EXtra Panas', 50, '2040-06-05', '2000'),
(4, 'OB1668496879', 'Bodrexxxx', 100, '2022-12-08', '123123'),
(5, 'OB1668497916', 'Madu', 123, '2038-06-15', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
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
  `telp` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `kode`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `agama`, `status_nikah`, `pekerjaan`, `alergi_obat`, `jenis_kunjungan`, `tgl_daftar`, `diagnosa_awal`, `telp`) VALUES
(4, 'P31667534004', 'Endro Setiawan', 'L', 'Sukoharjo', '2022-11-09', 'MojoGedang', 1, 'B', 'Programer', 'paracetamol', 'I', '2022-11-04', 'Flu', '4545456'),
(5, 'P31667534172', 'Budi', 'P', 'Boyolali', '2022-11-02', 'Pengging', 4, 'S', 'Programer', 'paracetamol, bodrek', 'J', '2022-11-16', 'Flu burung\r\npanas smpe mo mati', '123456'),
(9, 'P31667786644', 'Zaky', 'L', 'Baki', '2005-06-14', 'Banten', 1, 'B', 'Siswa', 'bodrek, panadol', 'I', '2022-11-07', 'flu, batuk, panas, demam', '2147483647'),
(14, 'P31668496301', 'Furqon', 'L', 'Kali', '2022-11-17', 'Sumber', 1, 'B', 'Siswa', 'alergi effort', 'J', '2022-11-16', 'gejala sakit hati', '085124369741');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `biaya` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode`, `nama`, `biaya`) VALUES
(2, 'PYKT1668411538', 'Kanker', '100000000'),
(3, 'PYKT1668411711', 'Radang', '10000'),
(4, 'PYKT1668411724', 'Panas', '25000'),
(5, 'PYKT1668493465', 'Batuk', '12000'),
(6, 'PYKT1668497973', 'Diabetes', '25000000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
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
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `kode`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `telp`, `alamat`, `agama`, `status_nikah`, `ket`) VALUES
(5, 'P01667533803', 'Plakat Champion', 'Selo', '2022-11-10', 'L', '132564987', 'Boyolali', '4', 'S', 'Yeyyy'),
(7, 'P01668052928', 'ANu', 'kebon', '2022-10-30', 'P', '654987', 'mbuh', '6', 'B', 'Majnun');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `pasien` varchar(30) NOT NULL,
  `penyakit` varchar(30) NOT NULL,
  `obat` varchar(30) NOT NULL,
  `dokter` varchar(30) NOT NULL,
  `total_harga` decimal(12,0) NOT NULL,
  `dibayar` decimal(12,0) NOT NULL,
  `kembali` decimal(12,0) NOT NULL,
  `tgl_bayar` varchar(20) NOT NULL,
  `cara_bayar` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode`, `tgl_transaksi`, `pasien`, `penyakit`, `obat`, `dokter`, `total_harga`, `dibayar`, `kembali`, `tgl_bayar`, `cara_bayar`, `status`) VALUES
(4, 'TR1668484122', '2022-11-15', 'P31667786644', 'PYKT1668493465', 'OB1668496879', 'D21668494698', '12000', '20000', '-8000', '-', 0, 0),
(5, 'TR1668485767', '2022-11-15', 'P31667534004', 'PYKT1668411538', 'OB1668137332', 'D21668493619', '100000000', '15000', '99985000', '-', 1, 0),
(6, 'TR1668493260', '2022-11-15', 'P31667534172', 'PYKT1668411538', 'O-001', 'D21668493706', '100000000', '100000000', '0', '-', 1, 0),
(7, 'TR1668497240', '2022-11-11', 'P31668496301', 'PYKT1668493465', 'OB1668496879', 'D21668493826', '12000', '15000', '-3000', '-', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_right`
--

CREATE TABLE `user_right` (
  `id` int(7) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` char(2) NOT NULL,
  `register` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `view_menu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_right`
--

INSERT INTO `user_right` (`id`, `kode`, `nama`, `username`, `password`, `type`, `register`, `last_login`, `view_menu`) VALUES
(27, 'A11666671000', 'Administrator', 'Administrator', '202cb962ac59075b964b07152d234b70', 'A1', '2022-10-25 11:10:00', '2022-11-16 07:35:33', 0),
(28, 'D21666830088', 'Endro Setiawan', 'Endro', '202cb962ac59075b964b07152d234b70', 'D2', '2022-10-27 07:21:28', '2022-11-07 09:17:25', 0),
(31, 'P01666842550', 'Plakat Champion', 'Plakat Champion', '202cb962ac59075b964b07152d234b70', 'P0', '2022-10-27 10:49:10', '2022-11-07 09:17:25', 0),
(32, 'P31666842929', 'Abdullah', 'Dullah', '202cb962ac59075b964b07152d234b70', 'P3', '2022-10-27 10:55:29', '2022-11-07 09:17:25', 0),
(34, 'D21666928250', 'Plakat Champion', 'asd', '49f0bad299687c62334182178bfd75d8', 'D2', '2022-10-28 10:37:30', '2022-11-07 09:17:25', 0),
(37, 'A11667198755', 'Endro Setiawan', 'Dullah', 'b4b147bc522828731f1a016bfa72c073', 'A1', '2022-10-31 13:45:55', '2022-11-07 09:17:25', 0),
(40, 'D21668048983', 'D21667199748', 'juna', '5f039b4ef0058a1d652f13d612375a5b', 'D2', '2022-11-10 09:56:23', NULL, 0),
(41, 'D21667199748', 'Hora Miroyo', 'asdasd', 'f1cf78e0ba9acd143c5a70df995544e5', 'D2', '2022-11-10 10:01:35', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_right`
--
ALTER TABLE `user_right`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_right`
--
ALTER TABLE `user_right`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

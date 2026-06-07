-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2026 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` varchar(5) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `id_ruangan` varchar(5) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tahun_beli` int(4) NOT NULL,
  `kondisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `id_kategori`, `id_ruangan`, `nama_barang`, `merk`, `jumlah`, `tahun_beli`, `kondisi`) VALUES
('BR001', 'KG001', 'RG001', 'Mouse', 'logitec', 10, 2025, 'Baik'),
('BR002', 'KG001', 'RG001', 'Keyboard', 'logitec', 10, 2024, 'Baik'),
('BR003', 'KG001', 'RG001', 'Monitor', 'Acer', 10, 2025, 'baik'),
('BR006', 'KG002', 'RG001', 'Monitor', 'Acer', 1, 2011, 'rusak ringan');

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori`
--

CREATE TABLE `data_kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kategori`
--

INSERT INTO `data_kategori` (`id_kategori`, `kategori`) VALUES
('KG001', 'Komputer'),
('KG002', 'Printer'),
('KG003', 'Peripheral'),
('KG004', 'Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `data_maintenance`
--

CREATE TABLE `data_maintenance` (
  `id_maintenance` int(11) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `tanggal_maintenance` date NOT NULL,
  `jenis_kerusakan` text DEFAULT NULL,
  `tindakan` text DEFAULT NULL,
  `biaya` decimal(10,2) DEFAULT NULL,
  `status` enum('proses','selesai') DEFAULT 'proses',
  `teknisi` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_maintenance`
--

INSERT INTO `data_maintenance` (`id_maintenance`, `id_barang`, `tanggal_maintenance`, `jenis_kerusakan`, `tindakan`, `biaya`, `status`, `teknisi`, `keterangan`) VALUES
(1, 'BR001', '2026-05-20', 'Komputer tidak dapat menyala', 'Pembersihan RAM dan penggantian power supply', 350000.00, 'selesai', 'Budi Teknisi', 'Komputer kembali normal setelah penggantian PSU'),
(2, 'BR002', '2026-05-22', 'Keyboard beberapa tombol tidak berfungsi', 'Pembersihan keyboard dan pengecekan konektor', 50000.00, 'proses', 'Andi Service', 'Masih menunggu penggantian sparepart');

-- --------------------------------------------------------

--
-- Table structure for table `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id_ruangan` varchar(5) NOT NULL,
  `nama_ruangan` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kapasitas` int(3) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_ruangan`
--

INSERT INTO `data_ruangan` (`id_ruangan`, `nama_ruangan`, `lokasi`, `kapasitas`, `keterangan`) VALUES
('RG001', 'Ruang Komputer G.12', 'Lantai 2 gedung G', 15, 'kondisi baik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `name`, `username`, `email`, `password`, `jk`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Najwa Latifah', 'najwa01', 'najwalatifah@gmail.com', 'najwa123', 'Perempuan', 'admin', 'aktif', '2026-05-22 02:34:31', '2026-05-22 02:34:31'),
(2, 'Muhamad Dahlan ', 'dahlan23', 'dahlan34@gmail.com', 'dahlan12345', 'Laki-Laki', 'admin', 'aktif', '2026-05-22 13:15:43', '2026-05-22 13:15:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `fk_kategori` (`id_kategori`),
  ADD KEY `fk_ruangan` (`id_ruangan`);

--
-- Indexes for table `data_kategori`
--
ALTER TABLE `data_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `data_maintenance`
--
ALTER TABLE `data_maintenance`
  ADD PRIMARY KEY (`id_maintenance`),
  ADD KEY `fk_main` (`id_barang`);

--
-- Indexes for table `data_ruangan`
--
ALTER TABLE `data_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_maintenance`
--
ALTER TABLE `data_maintenance`
  MODIFY `id_maintenance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `data_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ruangan` FOREIGN KEY (`id_ruangan`) REFERENCES `data_ruangan` (`id_ruangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_maintenance`
--
ALTER TABLE `data_maintenance`
  ADD CONSTRAINT `fk_main` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

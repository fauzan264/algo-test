-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 02:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_jual` int(11) UNSIGNED NOT NULL,
  `harga_beli` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `kode_barang`, `nama_barang`, `harga_jual`, `harga_beli`, `stok`, `kategori`) VALUES
(1, 'B001', 'Kaos tangan panjang', 50000, 40000, 500, 'Baju'),
(2, 'B002', 'Kaos tangan pendek', 40000, 30000, 200, 'Baju'),
(3, 'B003', 'Celana denim', 100000, 70000, 200, 'Celana'),
(4, 'B004', 'Sweater Hoodie', 150000, 90000, 250, 'Sweater');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan`
--

CREATE TABLE `tb_detail_penjualan` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah` int(11) UNSIGNED NOT NULL,
  `harga_satuan` int(11) UNSIGNED NOT NULL,
  `harga_total` int(11) UNSIGNED NOT NULL,
  `id_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_penjualan`
--

INSERT INTO `tb_detail_penjualan` (`id`, `kode_barang`, `jumlah`, `harga_satuan`, `harga_total`, `id_penjualan`) VALUES
(1, 'B003', 30, 100000, 3000000, 1),
(2, 'B002', 10, 40000, 1200000, 1),
(3, 'B003', 20, 100000, 2000000, 2),
(4, 'B004', 10, 150000, 1500000, 2),
(5, 'B001', 30, 50000, 1500000, 3),
(6, 'B003', 10, 100000, 1000000, 5),
(7, 'B004', 10, 150000, 1500000, 3),
(8, 'B002', 20, 40000, 800000, 4),
(9, 'B001', 2, 50000, 100000, 6),
(10, 'B003', 5, 100000, 500000, 6),
(11, 'B004', 3, 150000, 450000, 6),
(12, 'B001', 3, 50000, 150000, 7),
(13, 'B002', 3, 40000, 120000, 7),
(14, 'B003', 7, 100000, 700000, 7),
(15, 'B004', 3, 150000, 450000, 7),
(16, 'B001', 5, 50000, 250000, 8),
(17, 'B004', 2, 150000, 300000, 8),
(18, 'B001', 8, 50000, 400000, 9),
(19, 'B003', 5, 100000, 500000, 9),
(20, 'B004', 4, 150000, 600000, 9),
(21, 'B002', 9, 40000, 360000, 10),
(22, 'B003', 3, 100000, 300000, 10),
(23, 'B001', 9, 50000, 450000, 11),
(24, 'B003', 6, 100000, 600000, 11),
(25, 'B001', 10, 50000, 500000, 12),
(26, 'B002', 8, 40000, 320000, 12),
(27, 'B003', 5, 100000, 500000, 12),
(28, 'B004', 4, 150000, 600000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `nama_konsumen` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `nama_konsumen`, `alamat`, `tanggal`) VALUES
(1, 'Fauzan', 'Bekasi', '2021-12-09 00:00:00'),
(2, 'Haris', 'Jakarta Timur', '2021-12-16 00:00:00'),
(3, 'Jovan', 'Bekasi', '2021-12-23 00:00:00'),
(4, 'Pebri', 'Depok', '2022-01-03 00:00:00'),
(5, 'Dulfi', 'Bekasi', '2022-01-04 00:00:00'),
(6, 'Ahmad', 'Jakarta Barat', '2022-01-03 00:00:00'),
(7, 'Yogi', 'Bekasi', '2022-01-03 00:00:00'),
(8, 'Muhammad', 'Jakarta Timur', '2022-01-03 00:00:00'),
(9, 'Roni', 'Tangerang', '2022-01-05 00:00:00'),
(10, 'Mustofa', 'Tegal', '2022-01-05 00:00:00'),
(11, 'Juang', 'Bekasi', '2022-01-05 00:00:00'),
(12, 'Maroni', 'Bogor', '2022-01-06 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_data_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `view_data_penjualan` (
`id` int(11)
,`nama_konsumen` varchar(100)
,`alamat` varchar(100)
,`tanggal` datetime
,`total_penjualan` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_kategori`
-- (See below for the actual view)
--
CREATE TABLE `view_stok_kategori` (
`kategori` varchar(50)
,`stok_kategori` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_data_penjualan`
--
DROP TABLE IF EXISTS `view_data_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_penjualan`  AS SELECT `penjualan`.`id` AS `id`, `penjualan`.`nama_konsumen` AS `nama_konsumen`, `penjualan`.`alamat` AS `alamat`, `penjualan`.`tanggal` AS `tanggal`, sum(distinct `detail_penjualan`.`jumlah`) AS `total_penjualan` FROM ((`tb_penjualan` `penjualan` join `tb_detail_penjualan` `detail_penjualan` on(`penjualan`.`id` = `detail_penjualan`.`id_penjualan`)) join `tb_barang` `barang` on(`barang`.`kode_barang` = `barang`.`kode_barang`)) GROUP BY `detail_penjualan`.`id_penjualan` ORDER BY `penjualan`.`tanggal` DESC LIMIT 0, 10 ;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_kategori`
--
DROP TABLE IF EXISTS `view_stok_kategori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_kategori`  AS SELECT `tb_barang`.`kategori` AS `kategori`, sum(distinct `tb_barang`.`stok`) AS `stok_kategori` FROM `tb_barang` GROUP BY `tb_barang`.`kategori` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_detail_penjualan`
--
ALTER TABLE `tb_detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

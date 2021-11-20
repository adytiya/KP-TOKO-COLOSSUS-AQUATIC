-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 10:53 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_ikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(11) NOT NULL,
  `id_ikan` int(11) NOT NULL,
  `nama_ikan` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_trs` varchar(11) NOT NULL,
  `id_ikan` varchar(11) NOT NULL,
  `nama_ikan` varchar(225) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `total` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_trs`, `id_ikan`, `nama_ikan`, `jumlah`, `total`, `tanggal`, `admin`) VALUES
(32, 'TRX001', '5', 'Chana Yellow Setarum', '1', '40000', '2021-11-01', 'adit'),
(33, 'TRX001', '1', 'Oscar Tiger', '1', '26000', '2021-11-01', 'adit'),
(34, 'TRX002', '4', 'Arwana', '1', '2100000', '2021-11-02', 'adit'),
(35, 'TRX002', '1', 'Oscar Tiger', '10', '260000', '2021-11-02', 'adit'),
(36, 'TRX002', '2', 'Discus', '1', '20000', '2021-11-02', 'adit'),
(37, 'TRX002', '7', 'Mas Koki', '10', '70000', '2021-11-02', 'adit'),
(38, 'TRX003', '11', 'Oscar Tiger Albino', '5', '100000', '2021-11-03', 'adit'),
(39, 'TRX003', '1', 'Oscar Tiger', '5', '130000', '2021-11-03', 'adit'),
(40, 'TRX003', '12', 'Polypterus endlicher', '10', '200000', '2021-11-03', 'adit'),
(41, 'TRX003', '13', 'Polypterus Lapradei', '2', '100000', '2021-11-03', 'adit'),
(42, 'TRX004', '1', 'Oscar Tiger', '1', '26000', '2021-11-03', 'adit'),
(43, 'TRX004', '10', 'Sapu-Sapu', '1', '5000', '2021-11-03', 'adit'),
(44, 'TRX004', '4', 'Arwana', '1', '2100000', '2021-11-03', 'adit'),
(45, 'TRX005', '1', 'Oscar Tiger', '50', '1300000', '2021-11-03', 'adit'),
(46, 'TRX006', '8', 'Aligator Florida', '10', '150000', '2021-11-04', 'adit'),
(47, 'TRX007', '4', 'Arwana', '2', '4200000', '2021-11-05', 'adit'),
(48, 'TRX008', '9', 'Neon Tetra', '100', '1000000', '2021-11-05', 'adit'),
(49, 'TRX009', '6', 'Ikan Mas', '10', '10000', '2021-11-05', 'adit'),
(50, 'TRX009', '12', 'Polypterus endlicher', '2', '40000', '2021-11-05', 'adit'),
(51, 'TRX009', '5', 'Chana Yellow Setarum', '1', '40000', '2021-11-05', 'adit'),
(53, 'TRX010', '13', 'Polypterus Lapradei', '5', '250000', '2021-11-20', 'adit'),
(54, 'TRX011', '10', 'Sapu-Sapu', '10', '50000', '2021-11-21', 'adit'),
(55, 'TRX011', '2', 'Discus', '1', '20000', '2021-11-21', 'adit'),
(56, 'TRX011', '6', 'Ikan Mas', '3', '3000', '2021-11-21', 'adit'),
(57, 'TRX012', '11', 'Oscar Tiger Albino', '1', '20000', '2021-11-21', 'adit'),
(58, 'TRX012', '11', 'Oscar Tiger Albino', '1', '20000', '2021-11-21', 'adit');

--
-- Triggers `nota`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `nota` FOR EACH ROW BEGIN

UPDATE stk_ikn SET stok = stok - NEW.jumlah

   WHERE id_ikan = NEW.id_ikan;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plgn` int(11) NOT NULL,
  `nm_plgn` varchar(20) NOT NULL,
  `alamat_plgn` varchar(25) NOT NULL,
  `tlp_plgn` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stk_ikn`
--

CREATE TABLE `stk_ikn` (
  `id_ikan` varchar(11) NOT NULL,
  `nama_ikan` varchar(20) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stk_ikn`
--

INSERT INTO `stk_ikn` (`id_ikan`, `nama_ikan`, `harga_beli`, `harga_jual`, `stok`, `tanggal_input`) VALUES
('1', 'Oscar Tiger', 15000, 26000, 49, '2021-10-25'),
('10', 'Sapu-Sapu', 3000, 5000, 89, '2021-10-17'),
('11', 'Oscar Tiger Albino', 10000, 20000, 98, '2021-10-17'),
('12', 'Polypterus endlicher', 10000, 20000, 8, '2021-10-17'),
('13', 'Polypterus Lapradei', 25000, 50000, 90, '2021-10-17'),
('2', 'Discus', 10000, 20000, 99, '2021-07-10'),
('3', 'Cupang Aduan', 500, 3000, 100, '2021-05-01'),
('4', 'Arwana', 1000000, 2100000, 7, '2021-08-12'),
('5', 'Chana Yellow Setarum', 25000, 40000, 98, '2021-07-12'),
('6', 'Ikan Mas', 500, 1000, 987, '2021-06-10'),
('7', 'Mas Koki', 5000, 7000, 90, '2021-08-24'),
('8', 'Aligator Florida', 10000, 15000, 10, '2021-10-17'),
('9', 'Neon Tetra', 5000, 10000, 0, '2021-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(10) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pemilik` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `nama_pemilik`) VALUES
('1', 'COLOSSUS AQUATIC', 'Jl.Kotambambu Utara IV, Rt.017,  Rw.009, \r\nJatipulo, Palmerah, Jakarta Barat, Dki Jakarta', 'Agus Adriansyah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trx` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `jml_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `tanggal`, `jumlah`, `total`, `bayar`, `kembali`, `admin`, `jml_jenis`) VALUES
('TRX001', '2021-11-01', 2, 66000, 70000, 4000, 'adit', '2'),
('TRX002', '2021-11-02', 22, 2450000, 2500000, 50000, 'adit', '4'),
('TRX003', '2021-11-03', 22, 530000, 600000, 70000, 'adit', '4'),
('TRX004', '2021-11-03', 3, 2131000, 2200000, 69000, 'adit', '3'),
('TRX005', '2021-11-03', 50, 1300000, 1500000, 200000, 'adit', '1'),
('TRX006', '2021-11-04', 10, 150000, 150000, 0, 'adit', '1'),
('TRX007', '2021-11-05', 2, 4200000, 5000000, 800000, 'adit', '1'),
('TRX008', '2021-11-05', 100, 1000000, 1000000, 0, 'adit', '1'),
('TRX009', '2021-11-06', 13, 90000, 100000, 10000, 'adit', '3'),
('TRX010', '2021-11-20', 5, 250000, 300000, 50000, 'adit', '1'),
('TRX011', '2021-11-21', 14, 73000, 75000, 2000, 'adit', '3'),
('TRX012', '2021-11-21', 2, 40000, 50000, 10000, 'adit', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `level`) VALUES
(1, 'adit', 'adit', '1234', 'admin'),
(2, 'admin', 'admin', '1234', 'super_admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jual`
--
ALTER TABLE `jual`
  ADD UNIQUE KEY `id_jual` (`id_jual`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plgn`);

--
-- Indexes for table `stk_ikn`
--
ALTER TABLE `stk_ikn`
  ADD UNIQUE KEY `id` (`id_ikan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD UNIQUE KEY `id_trx` (`id_trx`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_plgn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

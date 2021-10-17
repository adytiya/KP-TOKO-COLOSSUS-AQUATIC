-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 03:05 PM
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
  `tanggal` varchar(225) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_trs`, `id_ikan`, `nama_ikan`, `jumlah`, `total`, `tanggal`, `admin`) VALUES
(32, 'TRX001', '5', 'Chana Yellow Setarum', '1', '40000', '17 October 2021, 17:59 ', 'adit'),
(33, 'TRX001', '1', 'Oscar Tiger', '1', '26000', '17 October 2021, 17:59 ', 'adit'),
(34, 'TRX002', '4', 'Arwana', '1', '2100000', '17 October 2021, 18:15 ', 'adit'),
(35, 'TRX002', '1', 'Oscar Tiger', '10', '260000', '17 October 2021, 18:15 ', 'adit'),
(36, 'TRX002', '2', 'Discus', '1', '20000', '17 October 2021, 18:15 ', 'adit'),
(37, 'TRX002', '7', 'Mas Koki', '10', '70000', '17 October 2021, 18:15 ', 'adit'),
(38, 'TRX003', '11', 'Oscar Tiger Albino', '5', '100000', '18 October 2021, 19:31 ', 'adit'),
(39, 'TRX003', '1', 'Oscar Tiger', '5', '130000', '18 October 2021, 19:31 ', 'adit'),
(40, 'TRX003', '12', 'Polypterus endlicher', '10', '200000', '18 October 2021, 19:31 ', 'adit'),
(41, 'TRX003', '13', 'Polypterus Lapradei', '2', '100000', '18 October 2021, 19:31 ', 'adit');

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
('1', 'Oscar Tiger', 15000, 26000, 84, '2021-10-25'),
('10', 'Sapu-Sapu', 3000, 5000, 100, '2021-10-17'),
('11', 'Oscar Tiger Albino', 10000, 20000, 95, '2021-10-17'),
('12', 'Polypterus endlicher', 10000, 20000, 10, '2021-10-17'),
('13', 'Polypterus Lapradei', 25000, 50000, 98, '2021-10-17'),
('2', 'Discus', 10000, 20000, 99, '2021-07-10'),
('3', 'Cupang Aduan', 500, 3000, 100, '2021-05-01'),
('4', 'Arwana', 1000000, 2100000, 9, '2021-08-12'),
('5', 'Chana Yellow Setarum', 25000, 40000, 99, '2021-07-12'),
('6', 'Ikan Mas', 500, 1000, 1000, '2021-06-10'),
('7', 'Mas Koki', 5000, 7000, 90, '2021-08-24'),
('8', 'Aligator Florida', 10000, 15000, 20, '2021-10-17'),
('9', 'Neon Tetra', 5000, 10000, 100, '2021-10-17');

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
  `tanggal` varchar(225) NOT NULL,
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
('TRX001', '17 October 2021, 17:59', 2, 66000, 70000, 4000, 'adit', '2'),
('TRX002', '17 October 2021, 18:15', 22, 2450000, 2500000, 50000, 'adit', '4'),
('TRX003', '17 October 2021, 19:31', 22, 530000, 600000, 70000, 'adit', '4');

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
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2021 pada 15.10
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

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
-- Struktur dari tabel `jual`
--

CREATE TABLE `jual` (
  `id_jual` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `nama_stok` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_trs` varchar(11) NOT NULL,
  `id_stok` varchar(11) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `nama_stok` varchar(225) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `total` varchar(225) NOT NULL,
  `tanggal` date NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nota`
--

INSERT INTO `nota` (`id_nota`, `id_trs`, `id_stok`, `jenis`, `nama_stok`, `jumlah`, `satuan`, `total`, `tanggal`, `admin`) VALUES
(67, 'TRX001', '1', 'Power Head', 'AMARA AA-1800', '1', 'Buah', '500000', '2021-11-27', 'adit'),
(68, 'TRX001', '2', 'Power Head', 'AMARA WP-1200', '1', 'Buah', '80000', '2021-11-27', 'adit'),
(6059, 'TRX002', '1', 'Power Head', 'AMARA AA-1800', '1', 'Buah', '500000', '2021-12-03', 'adit');

--
-- Trigger `nota`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `nota` FOR EACH ROW BEGIN

UPDATE stok SET stok = stok - NEW.jumlah

   WHERE id_stok = NEW.id_stok;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` varchar(11) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `nama_stok` varchar(20) NOT NULL,
  `harga_beli` int(20) NOT NULL,
  `harga_jual` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok`, `jenis`, `nama_stok`, `harga_beli`, `harga_jual`, `stok`, `satuan`, `tanggal_input`) VALUES
('1', 'Power Head', 'AMARA AA-1800', 450000, 500000, 23, 'Buah', '2021-11-28'),
('2', 'Power Head', 'AMARA WP-1200', 72000, 80000, 19, 'Buah', '2021-11-27'),
('3', 'Pasir', 'Pasir Malang Merah ', 10000, 15000, 30, 'Kg', '2021-11-29'),
('4', 'Pasir', 'Pasir Malang Hitam', 13000, 16000, 30, 'Kg', '2021-11-29'),
('5', 'tanaman', 'hygrophila pinnatifi', 1500, 2000, 50, 'Buah', '2021-11-29'),
('6', 'tanaman', 'Tinatifida', 10000, 13500, 30, 'Buah', '2021-11-29'),
('7', 'aquarium', 'aquarium 100x30x30', 100000, 150000, 5, 'Buah', '2021-11-29'),
('8', 'aquarium', 'aquarium 30x30x30', 30000, 45000, 5, 'Buah', '2021-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` varchar(10) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_pemilik` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `nama_pemilik`) VALUES
('1', 'COLOSSUS AQUATIC', 'Jl.Kotambambu Utara IV, Rt.017,  Rw.009, \r\nJatipulo, Palmerah, Jakarta Barat, Dki Jakarta', 'Agus Adriansyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trx`, `tanggal`, `jumlah`, `total`, `bayar`, `kembali`, `admin`, `jml_jenis`) VALUES
('TRX001', '2021-11-27', 2, 580000, 600000, 20000, 'adit', '2'),
('TRX002', '2021-12-03', 1, 500000, 600000, 100000, 'adit', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `pass`, `level`) VALUES
(1, 'adit', 'adit', '1234', 'admin'),
(2, 'admin', 'admin', '1234', 'super_admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jual`
--
ALTER TABLE `jual`
  ADD UNIQUE KEY `id_jual` (`id_jual`);

--
-- Indeks untuk tabel `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD UNIQUE KEY `id` (`id_stok`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD UNIQUE KEY `id_trx` (`id_trx`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jual`
--
ALTER TABLE `jual`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT untuk tabel `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6060;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

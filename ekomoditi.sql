-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24 Des 2020 pada 10.21
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekomoditi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_kriteria_buah`
--

CREATE TABLE `master_kriteria_buah` (
  `id` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createby` varchar(20) NOT NULL,
  `createdate` varchar(20) NOT NULL,
  `lastby` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_kriteria_buah`
--

INSERT INTO `master_kriteria_buah` (`id`, `name`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(5, 'Busuk', '', '', '', ''),
(8, 'Matang', '', '', '1', '2020-12-23 08:10:07'),
(9, 'Lewat Matang', '', '', '', ''),
(10, 'Tangkai Panjang', '', '', '', ''),
(11, 'Buah Keras', '', '', '2', '2020-12-23 10:57:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `notrans` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `divisi` int(1) NOT NULL,
  `totalbuah` int(1) NOT NULL,
  `createby` varchar(20) NOT NULL,
  `createdate` varchar(20) NOT NULL,
  `lastby` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`notrans`, `tanggal`, `divisi`, `totalbuah`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
('EPCS0010120000001', '24-12-2020', 3, 8, '2', '2020-12-24 12:41:26', '2', '2020-12-24 12:41:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `notrans` varchar(20) NOT NULL,
  `idbuah` int(1) NOT NULL,
  `jumlah` int(1) NOT NULL,
  `lastby` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `notrans`, `idbuah`, `jumlah`, `lastby`, `lastupdate`) VALUES
(77, 'EPCS0010120000001', 8, 3, '2', '2020-12-24 12:41:26'),
(78, 'EPCS0010120000001', 8, 5, '2', '2020-12-24 12:41:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createby` varchar(20) NOT NULL,
  `createdate` varchar(20) NOT NULL,
  `lastby` varchar(20) NOT NULL,
  `lastupdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `createby`, `createdate`, `lastby`, `lastupdate`) VALUES
(1, 'admin', '$2y$10$tonZkQrnGnp9n38rWeMTieLPNxtDfvy4Z/35Q4rlFObsm/xFnSae.', '2', '', '', ''),
(2, 'Yogi', '$2y$10$UflFe11wHZfp0lNZnLmc.OOC9GxYKhmj.cJdTVqs6pOINH5deDLTq', '2', '', '', ''),
(4, 'rudi', '$2y$10$W0Uok0xKdCRE8t59c3Yf2eECoWuJ3we2CS65/vJ5Bq7J8wNmcDPiu', '2', '', '', ''),
(5, 'r', '$2y$10$kkQQ0.GfQkfWCnGQbY.ROuMoT4cqwR109ZLXB4hsRR.ij3srpVsES', '2', '2020-12-23 09:52:10', '2', '2020-12-23 02:24:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kriteria_buah`
--
ALTER TABLE `master_kriteria_buah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`notrans`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kriteria_buah`
--
ALTER TABLE `master_kriteria_buah`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

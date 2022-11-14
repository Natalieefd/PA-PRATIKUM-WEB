-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 03:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feel_my_bag`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` blob NOT NULL,
  `konfirmasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `username`, `psw`, `konfirmasi`) VALUES
('2', '2', 0x24327924313024367a3779667341524e2f7851745236687a5a776d454f6c2f4c4a54467a5a493972476e54712f3053436876727a4b7241325472526d, ''),
('kayla@gmail.com', 'kayla78', 0x2432792431302455514d4a367230484e39633942756c317946456f624f7355354268595332385370426f346446304c35574751316d543854697a4f6d, ''),
('lyly@gmail.com', 'lyly', 0x243279243130246775617a546544676465426b6a68553439704e4c564f4b462f53706c7451325233426832546a5a796f6c52527a42424a6972456b43, ''),
('wonwoo@gmail.com', 'wonwoo17', 0x243279243130244e506a43635a4e5a703676596c356f6332614c796d654c57384863323074657865464e65556b774e326d4970475165776379596b43, '');

-- --------------------------------------------------------

--
-- Table structure for table `fmb`
--

CREATE TABLE `fmb` (
  `id_tas` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `merk_tas` varchar(50) NOT NULL,
  `deskripsi_tas` text NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jumlah_tas` int(11) NOT NULL,
  `tanggal_stok` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fmb`
--

INSERT INTO `fmb` (`id_tas`, `id_kategori`, `merk_tas`, `deskripsi_tas`, `warna`, `jumlah_tas`, `tanggal_stok`, `harga`, `gambar`) VALUES
(11, 23, 'rubi', 'tote bag cute', 'white blue', 3, '11-11-2022', 68000, 'rubi.png'),
(12, 65, 'stella rossa', 'simple sling bag', 'green', 4, '11-11-2022', 96000, 'stella-rossa-green.png'),
(15, 22, 'michael kors', 'cute pink bag', 'pink', 4, '11-11-2022', 102000, 'michael-kors-.png'),
(21, 44, 'hush puppies', 'sling bag blue cute', 'blue', 2, '11-11-2022', 92000, 'hush-puppies-blue.png'),
(38, 0, 'enji', 'beauty backpack', 'cream', 1, '11-11-22 11:30:10 am', 156000, 'enji.png'),
(39, 1, 'hush puppies', 'elegan', 'maroon', 5, '14-11-22 22:52:52 pm', 127000, 'hush puppies.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sling Bag'),
(18, 'Ransel'),
(19, 'Shoulder Bag');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `psw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`email`, `nama`, `username`, `psw`) VALUES
('1', '1', '1', '$2y$10$ZoZnQ8zfFxV.BQdmLvozGO57dIY4QmdL.9A.AYpqWGx'),
('5', '5', '5', '$2y$10$1S/C9xI75V2QtgbqALgbL.eTu/RxUiEabq4bIqLGMSl'),
('a', 'a', 'a', '$2y$10$n17qDdK.GLs0XMeh0AK67OyX2145zUhu54eIP/6R1Kk'),
('r@gmail.com', 'r', 'r', '$2y$10$p1P.U0L7vUx/SP.IBHAo6e.2rJIIX4Yzgs3DLLBnGbmRX9JYI4AkK'),
('re@gmail.com', 're', 're', '$2y$10$3RYSh01YOwdDGienrADCb.5MYzBRml5Fcpb9Fhf6.BSEJSAoJJEFG'),
('r@gmail.com', 's', 's', '$2y$10$S6caPORx7KIUYIV0SFpkIuqJ9FiN82Kz3mXJ4YizBrc1hMv.12P7e'),
('wonwoo@gmail.com', 'w', 'w', '$2y$10$mMNYfZ3Xor2MFR.XnMWZBuAqhClgnJNyC0WepOKWZqWcYBxViCSku');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_keranjang` int(11) NOT NULL,
  `id_tas` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `merk_tas` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `jumlah_tas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `struk`
--

CREATE TABLE `struk` (
  `id_tas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `merk_tas` varchar(30) NOT NULL,
  `jumlah_tas` int(4) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `fmb`
--
ALTER TABLE `fmb`
  ADD PRIMARY KEY (`id_tas`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_tas` (`id_tas`,`username`);

--
-- Indexes for table `struk`
--
ALTER TABLE `struk`
  ADD UNIQUE KEY `id_tas` (`id_tas`),
  ADD KEY `kode_tas` (`id_tas`),
  ADD KEY `id_pengguna` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fmb`
--
ALTER TABLE `fmb`
  MODIFY `id_tas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

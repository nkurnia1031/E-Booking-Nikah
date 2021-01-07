-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 05:18 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `idpesan` int(11) NOT NULL COMMENT 'ID Pesan',
  `idpemesanan` varchar(15) DEFAULT NULL COMMENT 'ID Pemesanan',
  `iduser` varchar(15) DEFAULT NULL COMMENT 'ID User',
  `pesan` varchar(100) DEFAULT NULL COMMENT 'Pesan',
  `terkirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Waktu Terkirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`idpesan`, `idpemesanan`, `iduser`, `pesan`, `terkirim`) VALUES
(5, 'PP00014', 'U00014', 'assalamu\'alaikum bunda..', '2020-08-25 00:48:51'),
(6, 'PP00014', 'U00003', 'wa\'alaikumussalam\r\n', '2020-08-25 00:50:38'),
(7, 'PP00015', 'U00015', 'halo bunda..saya ingin memesan paket 2 bun..', '2020-08-25 03:02:13'),
(8, 'PP00016', 'U00016', 'assalamu\'alaikum', '2020-08-25 09:28:24'),
(9, 'PP00016', 'U00003', 'wa\'alaikumussalm', '2020-08-25 09:45:44'),
(10, 'PP00016', 'U00016', 'saya pesan paket 2 ya kak', '2020-08-25 09:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `idpaket` varchar(15) NOT NULL COMMENT 'ID Paket',
  `nama_paket` varchar(30) DEFAULT NULL COMMENT 'Nama Paket',
  `desk` varchar(500) DEFAULT NULL COMMENT 'Deskripsi',
  `harga` int(9) DEFAULT NULL COMMENT 'Harga',
  `url` text DEFAULT NULL COMMENT 'Gambar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`idpaket`, `nama_paket`, `desk`, `harga`, `url`) VALUES
('P00001', 'Paket 1', 'Pelaminan Dalam + 1 kursi tengah\r\nDekor Kamar pengantin\r\nMake Up + 4-5 pasang baju', 5000000, '5f40b7b832a7d.jpg'),
('P00002', 'Paket 2', 'Pelaminan Luar + Panggung Pelaminan\r\nTaman Bunga\r\nDekor Kamar Pengantin\r\nDekor Rumah + Pelaminan Latar dalam rumah\r\nMake Up + 4-5 pasang baju\r\nGratis Make up kelurga 2 orang', 7500000, '5f40be6138b40.jpg'),
('P00003', 'Paket 3', 'Pelaminan Luar + Panggung Pelaminan\r\nTaman Bunga\r\nDekor Kamar pengantin+ Dekor Rumah \r\nTenda Standart uk. 6x6=4 pcs, 3x3= 2 pcs\r\nKursi 200 pcs + Blower 1\r\nmeja bulat 10pcs + meja hidangan 6pcs\r\nMake Up + 4-5 pasang baju\r\nGratis Makeup 2 orang', 10000000, '5f40b94e20ef9.jpg'),
('P00004', 'Paket 4', 'Pelaminan Luar + Panggung Pelaminan\r\nTaman Bunga + Gerbang Bunga depan\r\nDekor Kamar pengantin+ Dekor Rumah \r\nTenda  Tutup sebagian uk. 6x6=4 pcs, 3x3= 2 pcs\r\nKursi 200 pcs + Blower 2 pcs\r\nmeja bulat 10pcs + meja hidangan 6pcs\r\nMake Up + 4-5 pasang baju\r\nGratis Makeup 2 orang', 13500000, '5f40bfed12d94.jpg'),
('P00005', 'Paket 5', 'Pelaminan Luar + Panggung Pelaminan\r\nTaman Bunga , Gazebo + Gerbang Bunga depan\r\nDekor Kamar pengantin+ Dekor Rumah \r\nTenda  Tutup sebagian uk. 6x6=4 pcs, 3x3= 2 pcs\r\nKursi 200 pcs + Blower 2 pcs\r\nmeja bulat 10pcs + meja hidangan 6pcs\r\nStanding Bunga + Foto Box + Karpet Jalan\r\nMake Up + 4-5 pasang baju\r\nGratis Makeup 2 orang', 17500000, '5f4235ff180ed.jpg'),
('P00006', 'Paket 6', 'Pelaminan Luar + Panggung Pelaminan\r\nTaman Bunga , Gazebo + Gerbang Bunga depan\r\nDekor Kamar pengantin+ Dekor Rumah \r\nTenda  Tutup Keliling uk. 6x6=4 pcs, 3x3= 2 pcs\r\nKursi 200 pcs + Blower 3 pcs\r\nmeja bulat 10pcs + meja hidangan 6pcs\r\nStanding Bunga + Foto Box +  Full Karpet Jalan\r\nMake Up + 4-5 pasang baju\r\nGratis Makeup 2 orang', 19000000, '5f4236b18d0d6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paket_tambahan`
--

CREATE TABLE `paket_tambahan` (
  `idpt` varchar(15) NOT NULL COMMENT 'ID Paket',
  `nama_pt` varchar(25) DEFAULT NULL COMMENT 'Nama Paket',
  `satuan` varchar(10) DEFAULT NULL COMMENT 'Satuan',
  `harga` int(11) DEFAULT NULL COMMENT 'Harga Satuan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_tambahan`
--

INSERT INTO `paket_tambahan` (`idpt`, `nama_pt`, `satuan`, `harga`) VALUES
('PT00001', 'Kursi Plastik', 'Lusin', 42000),
('PT00002', 'Meja', 'pcs', 35000),
('PT00003', 'Make Up', '', 200000),
('PT00004', 'Make up + Prewed', '', 2000000),
('PT00005', 'Fotografer', '', 3000000),
('PT00006', 'Foto + Video', '', 2000000),
('PT00007', 'Foto Hard Cover', '', 5000000),
('PT00008', 'Orgen Siang', '', 1500000),
('PT00009', 'Orgen Siang + Malam', '', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` varchar(15) NOT NULL,
  `nominal` int(15) NOT NULL COMMENT 'Nominal Pembayaran',
  `bank` varchar(20) NOT NULL COMMENT 'Bank',
  `no_rek` varchar(50) NOT NULL COMMENT 'Nomor Rekening',
  `url` text NOT NULL COMMENT 'Gambar Bukti Transfer',
  `idpemesanan` varchar(15) NOT NULL,
  `status` varchar(5) DEFAULT NULL COMMENT 'Status Pembayaran',
  `validasi` varchar(12) DEFAULT '...' COMMENT 'Validasi Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `nominal`, `bank`, `no_rek`, `url`, `idpemesanan`, `status`, `validasi`) VALUES
('Pay-00001', 7000000, 'BNI', '0309888520 | A.n Mariantini', '5f42794e01b58.jpg', 'PP00001', 'DP', 'Valid'),
('Pay-00002', 7000000, 'BNI', '0309888520 | A.n Mariantini', '5f42796ab4e88.jpg', 'PP00001', 'Lunas', 'Valid'),
('Pay-00003', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f427b365c878.jpg', 'PP00002', 'DP', 'Valid'),
('Pay-00004', 20612000, 'BNI', '0309888520 | A.n Mariantini', '5f427b7d06978.jpg', 'PP00002', 'Lunas', 'Valid'),
('Pay-00005', 7000000, 'BNI', '0309888520 | A.n Mariantini', '5f427be32a3c8.jpg', 'PP00003', 'DP', 'Valid'),
('Pay-00006', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f427c3a68fb0.jpg', 'PP00003', 'Lunas', 'Valid'),
('Pay-00007', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f427cb28fcc8.jpg', 'PP00004', 'DP', 'Valid'),
('Pay-00008', 11700000, 'BNI', '0309888520 | A.n Mariantini', '5f427d36c5440.jpg', 'PP00004', 'Lunas', 'Valid'),
('Pay-00009', 8042000, 'BNI', '0309888520 | A.n Mariantini', '5f427daea8b38.jpg', 'PP00005', 'DP', 'Valid'),
('Pay-00010', 10000000, 'BNI', '0309888520 | A.n Mariantini', '5f427dd10dac0.jpg', 'PP00005', 'Lunas', 'Valid'),
('Pay-00011', 7500000, 'BNI', '0309888520 | A.n Mariantini', '5f427e294fd58.jpg', 'PP00006', 'DP', 'Valid'),
('Pay-00012', 15000000, 'BNI', '0309888520 | A.n Mariantini', '5f427e6e9cbd0.jpg', 'PP00006', 'Lunas', 'Valid'),
('Pay-00013', 4000000, 'BNI', '0309888520 | A.n Mariantini', '5f427ec1cf850.jpg', 'PP00007', 'DP', 'Valid'),
('Pay-00014', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f427eda318f8.jpg', 'PP00007', 'Lunas', 'Valid'),
('Pay-00015', 4000000, 'BNI', '0309888520 | A.n Mariantini', '5f427f191c138.jpg', 'PP00008', 'DP', 'Valid'),
('Pay-00016', 9000000, 'BNI', '0309888520 | A.n Mariantini', '5f427f37dcb40.jpg', 'PP00008', 'Lunas', 'Valid'),
('Pay-00017', 10000000, 'BNI', '0309888520 | A.n Mariantini', '5f427fa273b90.jpg', 'PP00009', 'DP', 'Valid'),
('Pay-00018', 10000000, 'BNI', '0309888520 | A.n Mariantini', '5f427fb8537f0.jpg', 'PP00009', 'Lunas', 'Valid'),
('Pay-00019', 3000000, 'BNI', '0309888520 | A.n Mariantini', '5f428019bac48.jpg', 'PP00010', 'DP', 'Valid'),
('Pay-00020', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f4280337faf8.jpg', 'PP00010', 'Lunas', 'Valid'),
('Pay-00021', 3000000, 'BNI', '0309888520 | A.n Mariantini', '5f4280e1f3e58.jpg', 'PP00011', 'DP', 'Valid'),
('Pay-00022', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f42812116f30.jpg', 'PP00011', 'Lunas', 'Valid'),
('Pay-00023', 5500000, 'BNI', '0309888520 | A.n Mariantini', '5f445fd229fe7.jpg', 'PP00014', 'DP', 'Valid'),
('Pay-00024', 3000000, 'BNI', '0309888520 | A.n Mariantini', '5f447f6d4594f.jpg', 'PP00015', 'DP', 'Valid'),
('Pay-00025', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f44d9fc1dfc4.jpg', 'PP00016', 'DP', 'Valid'),
('Pay-00026', 5500000, 'BNI', '0309888520 | A.n Mariantini', '5f5d787d80b61.jpg', 'PP00016', 'Lunas', 'Valid'),
('Pay-00027', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f5d79fdb9282.jpg', 'PP00014', 'Lunas', 'Valid'),
('Pay-00028', 5000000, 'BNI', '0309888520 | A.n Mariantini', '5f5d7d442d057.jpg', 'PP00017', 'DP', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `idpemesanan` varchar(15) NOT NULL COMMENT 'ID Pemesanan',
  `iduser` varchar(15) DEFAULT NULL COMMENT 'ID User',
  `tgl_pesan` date DEFAULT NULL COMMENT 'Tanggal Pesan',
  `tgl_acara` date DEFAULT NULL COMMENT 'Tanggal Acara',
  `idpaket` varchar(15) DEFAULT NULL COMMENT 'Paket',
  `status` varchar(25) DEFAULT 'Menunggu Pembayaran' COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`idpemesanan`, `iduser`, `tgl_pesan`, `tgl_acara`, `idpaket`, `status`) VALUES
('PP00001', 'U00002', '2019-12-02', '2020-01-04', 'P00002', 'Selesai'),
('PP00002', 'U00004', '2019-12-11', '2020-01-05', 'P00006', 'Selesai'),
('PP00003', 'U00005', '2019-12-30', '2020-01-18', 'P00003', 'Selesai'),
('PP00004', 'U00006', '2020-01-09', '2020-01-27', 'P00003', 'Selesai'),
('PP00005', 'U00007', '2020-01-11', '2020-01-31', 'P00004', 'Selesai'),
('PP00006', 'U00008', '2020-01-11', '2020-02-02', 'P00005', 'Selesai'),
('PP00007', 'U00009', '2020-01-25', '2020-02-15', 'P00002', 'Selesai'),
('PP00008', 'U00010', '2020-02-20', '2020-03-01', 'P00003', 'Selesai'),
('PP00009', 'U00011', '2020-02-29', '2020-03-14', 'P00004', 'Selesai'),
('PP00010', 'U00012', '2020-06-01', '2020-06-12', 'P00001', 'Selesai'),
('PP00011', 'U00013', '2020-07-13', '2020-07-17', 'P00001', 'Selesai'),
('PP00012', 'U00014', '2020-08-24', '2020-08-31', 'P00003', 'Dibatalkan'),
('PP00013', 'U00014', '2020-08-24', '2020-08-30', 'P00003', 'Dibatalkan'),
('PP00014', 'U00014', '2020-08-25', '2020-08-28', 'P00002', 'Selesai'),
('PP00015', 'U00015', '2020-08-25', '2020-08-29', 'P00002', 'Dibatalkan'),
('PP00016', 'U00016', '2020-08-25', '2020-09-10', 'P00002', 'Selesai'),
('PP00017', 'U00018', '2020-09-13', '2020-09-26', 'P00003', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tambahan`
--

CREATE TABLE `tambahan` (
  `id` int(11) NOT NULL COMMENT 'ID Tambahan',
  `idpt` varchar(15) DEFAULT NULL COMMENT 'ID Paket Tambahan',
  `qty` int(11) DEFAULT NULL COMMENT 'Jumlah',
  `idpemesanan` varchar(15) DEFAULT NULL COMMENT 'ID Pemesanan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tambahan`
--

INSERT INTO `tambahan` (`id`, `idpt`, `qty`, `idpemesanan`) VALUES
(9, 'PT00005', 1, 'PP00001'),
(10, 'PT00006', 1, 'PP00001'),
(11, 'PT00008', 1, 'PP00001'),
(12, 'PT00001', 1, 'PP00002'),
(13, 'PT00002', 2, 'PP00002'),
(14, 'PT00007', 1, 'PP00002'),
(15, 'PT00008', 1, 'PP00002'),
(16, 'PT00009', 1, 'PP00003'),
(17, 'PT00003', 1, 'PP00004'),
(18, 'PT00005', 1, 'PP00004'),
(19, 'PT00006', 1, 'PP00004'),
(20, 'PT00008', 1, 'PP00004'),
(21, 'PT00001', 1, 'PP00005'),
(22, 'PT00008', 1, 'PP00005'),
(23, 'PT00005', 1, 'PP00005'),
(24, 'PT00005', 1, 'PP00006'),
(25, 'PT00006', 1, 'PP00006'),
(26, 'PT00008', 1, 'PP00007'),
(27, 'PT00005', 1, 'PP00008'),
(28, 'PT00005', 1, 'PP00009'),
(29, 'PT00006', 1, 'PP00009'),
(30, 'PT00008', 1, 'PP00009'),
(31, 'PT00005', 1, 'PP00010'),
(32, 'PT00005', 1, 'PP00011'),
(33, 'PT00005', 1, 'PP00014'),
(34, 'PT00003', 1, 'PP00015'),
(35, 'PT00005', 1, 'PP00016'),
(36, 'PT00005', 1, 'PP00017'),
(37, 'PT00006', 1, 'PP00017');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` varchar(15) NOT NULL COMMENT 'ID User',
  `nama` varchar(30) DEFAULT NULL COMMENT 'Nama Lengkap',
  `alamat` varchar(40) DEFAULT NULL COMMENT 'Alamat',
  `jk` varchar(10) DEFAULT NULL COMMENT 'Jenis Kelamin',
  `hp` varchar(12) DEFAULT NULL COMMENT 'No HP',
  `user` varchar(15) DEFAULT NULL COMMENT 'Username',
  `pass` varchar(15) DEFAULT NULL COMMENT 'Password',
  `akses` varchar(20) DEFAULT NULL COMMENT 'Level Akses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `alamat`, `jk`, `hp`, `user`, `pass`, `akses`) VALUES
('U00001', 'Bunda Tini', 'Bumi Ayu', 'Perempuan', '011111111111', 'Owner', 'Owner', 'Owner'),
('U00002', 'Desi Puspita Sari', 'Jl. Rambutan', 'Perempuan', '081345871223', 'pelanggan', '123456', 'Pelanggan'),
('U00003', 'Administrator', 'Bumi Ayu', 'Perempuan', '082345672123', 'admin', 'admin', 'Admin'),
('U00004', 'Mery Aisyah Ulfa', 'Jl. Sudirman ', 'Perempuan', '082376141008', 'mery', 'mery', 'Pelanggan'),
('U00005', 'Fitri Handayani', 'Jl. Gunung Bromo Gg. Damai', 'Perempuan', '085218761902', 'fitri', 'fitri', 'Pelanggan'),
('U00006', 'Nurul Wahyuni', 'Simp. Perwira, Bagan Besar', 'Perempuan', '085365430812', 'nurul', 'nurul', 'Pelanggan'),
('U00007', 'Anissa Rahmania Putri', 'Jl. Bintan Gg. Kuini', 'Perempuan', '083183740107', 'rahma', 'rahma', 'Pelanggan'),
('U00008', 'Nadia Rilika Putri', 'Jl. Pauh Jaya, Jaya Mukti', 'Perempuan', '085367281023', 'nadia', 'nadia', 'Pelanggan'),
('U00009', 'Mutiara Sany', 'Jl. Teladan, Jaya Mukti', 'Perempuan', '082314361778', 'muti', 'muti', 'Pelanggan'),
('U00010', 'Putri Nabilah', 'Jl. Tunas Muda', 'Perempuan', '081287151954', 'putri', 'putri', 'Pelanggan'),
('U00011', 'Mia Adriyana', 'Jl. Gunung Merapi, Bumi Ayu', 'Perempuan', '085312348102', 'mia', 'mia', 'Pelanggan'),
('U00012', 'Robiatul Adawiyah', 'Purnama', 'Perempuan', '082387138102', 'robi', 'robi', 'Pelanggan'),
('U00013', 'Desi Fitriani', 'Jl. Gunung Bromo, Bumi ayu', 'Perempuan', '082273810102', 'desi', 'desi', 'Pelanggan'),
('U00014', 'Tika Lutfhiana', 'bumi ayu', 'Perempuan', '08125368910', 'tika', 'tika', 'Pelanggan'),
('U00015', 'novita sari', 'sukajadi', 'Perempuan', '081234874586', 'vita', 'vita', 'Pelanggan'),
('U00016', 'wardahtul Khodijah', 'bumiayu', 'Perempuan', '082376458765', 'warda', 'warda', 'Pelanggan'),
('U00017', 'intan', 'sudirman', 'Perempuan', '0976', 'intan', 'intan', 'Pelanggan'),
('U00018', 'Juliana', 'Jl. Gunung Merbabu', 'Perempuan', '081289371087', 'juliana', 'juliana', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`idpesan`),
  ADD KEY `idpemesanan` (`idpemesanan`,`iduser`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indexes for table `paket_tambahan`
--
ALTER TABLE `paket_tambahan`
  ADD PRIMARY KEY (`idpt`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idpemesanan` (`idpemesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpaket` (`idpaket`);

--
-- Indexes for table `tambahan`
--
ALTER TABLE `tambahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpt` (`idpt`),
  ADD KEY `idpemesanan` (`idpemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Pesan', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tambahan`
--
ALTER TABLE `tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Tambahan', AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 26 Jun 2020 pada 04.11
-- Versi server: 10.3.23-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buildweb_rahma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskusi`
--

CREATE TABLE `diskusi` (
  `idpesan` int(11) NOT NULL COMMENT 'ID Pesan',
  `idpemesanan` varchar(15) DEFAULT NULL COMMENT 'ID Pemesanan',
  `iduser` varchar(15) DEFAULT NULL COMMENT 'ID User',
  `pesan` varchar(100) DEFAULT NULL COMMENT 'Pesan',
  `terkirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Waktu Terkirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskusi`
--

INSERT INTO `diskusi` (`idpesan`, `idpemesanan`, `iduser`, `pesan`, `terkirim`) VALUES
(1, 'PP00001', 'U00001', 'tes', '2020-06-25 09:56:26'),
(2, 'PP00001', 'U00001', 'kirim\r\n', '2020-06-25 10:06:22'),
(3, 'PP00001', 'U00002', 'kk bisa kok', '2020-06-25 10:30:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `idpaket` varchar(15) NOT NULL COMMENT 'ID Paket',
  `nama_paket` varchar(30) DEFAULT NULL COMMENT 'Nama Paket',
  `desk` varchar(100) DEFAULT NULL COMMENT 'Deskripsi',
  `harga` int(9) DEFAULT NULL COMMENT 'Harga',
  `url` text DEFAULT NULL COMMENT 'Gambar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`idpaket`, `nama_paket`, `desk`, `harga`, `url`) VALUES
('P00001', 'Paket 1', 'benefit 1\r\nbenefit2\r\nbenefit3', 10000000, '5ef3f589d9412.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_tambahan`
--

CREATE TABLE `paket_tambahan` (
  `idpt` varchar(15) NOT NULL COMMENT 'ID Paket',
  `nama_pt` varchar(25) DEFAULT NULL COMMENT 'Nama Paket',
  `satuan` varchar(10) DEFAULT NULL COMMENT 'Satuan',
  `harga` int(11) DEFAULT NULL COMMENT 'Harga Satuan',
  `ket` varchar(100) DEFAULT NULL COMMENT 'Keterangan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket_tambahan`
--

INSERT INTO `paket_tambahan` (`idpt`, `nama_pt`, `satuan`, `harga`, `ket`) VALUES
('PT00001', 'Kursi', 'Lusin', 650000, ''),
('PT00002', 'Fotografer', '', 3000000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` varchar(15) NOT NULL,
  `nominal` int(15) NOT NULL COMMENT 'Nominal Pembayaran',
  `bank` varchar(20) NOT NULL COMMENT 'Bank',
  `no_rek` varchar(20) NOT NULL COMMENT 'Nomor Rekening',
  `url` text NOT NULL COMMENT 'Gambar Bukti Transfer',
  `idpemesanan` varchar(15) NOT NULL,
  `status` varchar(5) DEFAULT NULL COMMENT 'Status Pembayaran',
  `validasi` varchar(12) DEFAULT '...' COMMENT 'Validasi Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `nominal`, `bank`, `no_rek`, `url`, `idpemesanan`, `status`, `validasi`) VALUES
('Pay-00001', 10000000, 'Tahun', 'Coklat', '5ef55a381dcc1.png', 'PP00001', 'DP', 'Tidak Valid'),
('Pay-00002', 5000000, 'Tahun', 'Coklat', '5ef563ee33383.png', 'PP00001', 'DP', 'Valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
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
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`idpemesanan`, `iduser`, `tgl_pesan`, `tgl_acara`, `idpaket`, `status`) VALUES
('PP00001', 'U00002', '2020-06-25', '2020-06-27', 'P00001', 'Diproses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambahan`
--

CREATE TABLE `tambahan` (
  `id` int(11) NOT NULL COMMENT 'ID Tambahan',
  `idpt` varchar(15) DEFAULT NULL COMMENT 'ID Paket Tambahan',
  `qty` int(11) DEFAULT NULL COMMENT 'Jumlah',
  `idpemesanan` varchar(15) DEFAULT NULL COMMENT 'ID Pemesanan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tambahan`
--

INSERT INTO `tambahan` (`id`, `idpt`, `qty`, `idpemesanan`) VALUES
(3, 'PT00002', 1, 'PP00001'),
(5, 'PT00001', 2, 'PP00001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` varchar(15) NOT NULL COMMENT 'ID User',
  `nama` varchar(30) DEFAULT NULL COMMENT 'Nama Lengkap',
  `alamat` varchar(40) DEFAULT NULL COMMENT 'Alamat',
  `jk` varchar(10) DEFAULT NULL COMMENT 'Jenis Kelamin',
  `hp` varchar(12) DEFAULT NULL COMMENT 'No HP',
  `email` varchar(35) DEFAULT NULL COMMENT 'Email',
  `user` varchar(15) DEFAULT NULL COMMENT 'Username',
  `pass` varchar(15) DEFAULT NULL COMMENT 'Password',
  `akses` varchar(20) DEFAULT NULL COMMENT 'Level Akses'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama`, `alamat`, `jk`, `hp`, `email`, `user`, `pass`, `akses`) VALUES
('U00001', 'Bunda Tini', 'alamat', 'Laki-Laki', '011111111111', 'admin@admin.com', 'admin', 'admin', 'Owner'),
('U00002', 'pelanggan', 'alamat', NULL, '081188181881', 'pelanggan@pelanggan.com', 'pelanggan', '123456', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`idpesan`),
  ADD KEY `idpemesanan` (`idpemesanan`,`iduser`),
  ADD KEY `iduser` (`iduser`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indeks untuk tabel `paket_tambahan`
--
ALTER TABLE `paket_tambahan`
  ADD PRIMARY KEY (`idpt`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD KEY `idpemesanan` (`idpemesanan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpaket` (`idpaket`);

--
-- Indeks untuk tabel `tambahan`
--
ALTER TABLE `tambahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpt` (`idpt`),
  ADD KEY `idpemesanan` (`idpemesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `idpesan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Pesan', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tambahan`
--
ALTER TABLE `tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Tambahan', AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

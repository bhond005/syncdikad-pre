-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Des 2019 pada 14.50
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `syncdikad-pre`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kat` int(2) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tgl_input_kat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kat`, `kategori`, `tgl_input_kat`) VALUES
(1, 'SEPATU', '2015-06-13 09:20:34'),
(2, 'PAKAIAN', '2015-06-13 09:42:49'),
(3, 'TOPI', '2019-07-23 13:16:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(2) NOT NULL,
  `judul` varchar(220) NOT NULL,
  `harga` int(20) NOT NULL,
  `jml` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_produk`, `judul`, `harga`, `jml`) VALUES
(13, 14, 'MOTOR HONDA 70 UNGU', 20000000, 1),
(14, 15, 'KEMEJA ', 350000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(5) NOT NULL,
  `komentar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `komentar`) VALUES
(1, 'pengiriman cepat, barang ori mantapp abis'),
(2, 'barang diterima dengan baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` int(2) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `pass_user` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `nama_user`, `pass_user`, `nama`, `level`, `email`, `status`, `foto`) VALUES
(1, 'admin', 'admin', 'Saya adalah Administrator', 'admin', 'admin@admin.com', '1', 'admin.PNG'),
(2, 'TRISNA', 'TRISNA', 'Trisnatya Mahardhika', 'admin', 'trisnatya@gmail.com', '1', 'bhond005.jpg'),
(3, 'user', 'user', 'Saya Adalah User Pembeli', 'user', 'user@user.com', '1', 'user8-128x1281.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merk`
--

CREATE TABLE `tb_merk` (
  `id_merk` int(2) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `tgl_input_merk` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merk`
--

INSERT INTO `tb_merk` (`id_merk`, `merk`, `tgl_input_merk`) VALUES
(1, 'HONDA', '2019-07-23 13:18:13'),
(2, 'NIKE', '2019-07-23 13:23:10'),
(3, 'CONVERSE', '2019-07-23 13:23:34'),
(4, 'NECKTIE', '2019-07-23 14:12:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(2) NOT NULL,
  `judul` varchar(220) NOT NULL,
  `harga` int(20) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `id_merk` int(2) NOT NULL,
  `id_kat` int(2) NOT NULL,
  `ket` text NOT NULL,
  `status` enum('publish','draft') NOT NULL,
  `counter` int(5) NOT NULL,
  `tgl_input_pro` datetime NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `judul`, `harga`, `jumlah`, `kondisi`, `id_merk`, `id_kat`, `ket`, `status`, `counter`, `tgl_input_pro`, `foto`) VALUES
(11, 'MOTOR HONDA 70 COKLAT', 20000000, 5, 'BEKAS', 3, 4, 'Motor Honda Classic\r\nSTNK sampai dengan 2025\r\nKondisi fisik 85% mulus', 'publish', 9, '2019-07-23 14:14:35', 'honda_70_coklat.jpg'),
(12, 'SEPATU CONVERSE', 350000, 10, 'BARU', 5, 1, '100% ORIGINAL', 'publish', 11, '2019-07-23 16:38:10', 'Sepatu_Converse.jpg'),
(14, 'MOTOR HONDA 70 UNGU', 20000000, 3, 'BEKAS', 3, 4, 'lengkap', 'publish', 7, '2019-07-23 21:17:42', 'honda_70_ungu.jpg'),
(15, 'KEMEJA ', 350000, 33, 'KEMEJA ', 4, 3, 'baru', 'publish', 25, '2019-07-23 23:08:40', '5422.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `testimoni` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_testimoni`
--

INSERT INTO `tb_testimoni` (`id_testimoni`, `testimoni`) VALUES
(1, 'olshop yang sangat terpercaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_trans` int(2) NOT NULL,
  `id_user` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_produk` int(2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tgl_input_trans` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_trans`, `id_user`, `nama`, `alamat`, `kota`, `no_telp`, `jumlah`, `harga`, `id_produk`, `foto`, `tgl_input_trans`) VALUES
(1, 3, 'ardi', 'bogor', 'Bogor', '08978566779', 1, 350000, 15, '5422.jpg', '2019-07-29');

--
-- Trigger `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `tg_up_jumlah` AFTER INSERT ON `tb_transaksi` FOR EACH ROW BEGIN
	UPDATE tb_produk SET jumlah=jumlah-NEW.jumlah
    WHERE id_produk=New.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_visitor`
--

CREATE TABLE `tb_visitor` (
  `no` int(7) NOT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `os` varchar(40) DEFAULT NULL,
  `browser` varchar(40) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_visitor`
--

INSERT INTO `tb_visitor` (`no`, `ip`, `os`, `browser`, `tanggal`) VALUES
(15, '::1', 'Unknown Windows OS', 'Chrome 43.0.2357.124', '2015-06-14 14:31:32'),
(16, '::1', 'Unknown Windows OS', 'Firefox 22.0', '2015-06-14 14:32:35'),
(17, '::1', 'Unknown Windows OS', 'Firefox 53.0', '2017-04-26 06:21:39'),
(18, '::1', 'Unknown Windows OS', 'Firefox 54.0', '2017-07-05 02:04:59'),
(19, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-23 12:22:30'),
(20, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-23 14:09:56'),
(21, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-23 21:10:36'),
(22, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-23 21:10:42'),
(23, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-24 11:19:16'),
(24, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-24 11:19:31'),
(25, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-25 11:20:53'),
(26, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-26 15:41:22'),
(27, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-28 12:19:28'),
(28, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-29 12:19:58'),
(29, '::1', 'Unknown Windows OS', 'Chrome 75.0.3770.142', '2019-07-29 12:20:03'),
(30, '::1', 'Unknown Windows OS', 'Firefox 70.0', '2019-12-07 02:36:15'),
(31, '::1', 'Unknown Windows OS', 'Firefox 70.0', '2019-12-07 02:37:45'),
(32, '::1', 'Unknown Windows OS', 'Firefox 70.0', '2019-12-09 01:08:57'),
(33, '::1', 'Unknown Windows OS', 'Firefox 70.0', '2019-12-09 01:16:31'),
(34, '::1', 'Unknown Windows OS', 'Firefox 70.0', '2019-12-09 01:21:18'),
(35, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-11 03:07:45'),
(36, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-11 03:19:49'),
(37, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-13 14:58:54'),
(38, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-13 16:17:01'),
(39, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-20 10:44:06'),
(40, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-21 10:44:34'),
(41, '127.0.0.1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-21 15:15:19'),
(42, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-23 12:07:27'),
(43, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-24 14:22:05'),
(44, '::1', 'Unknown Windows OS', 'Firefox 71.0', '2019-12-24 14:23:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indeks untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `tb_visitor`
--
ALTER TABLE `tb_visitor`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_merk`
--
ALTER TABLE `tb_merk`
  MODIFY `id_merk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_trans` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_visitor`
--
ALTER TABLE `tb_visitor`
  MODIFY `no` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2022 pada 04.39
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lele`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(25) NOT NULL,
  `id_transaksi` varchar(255) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(25) NOT NULL,
  `harga_produk` int(25) NOT NULL,
  `jumlah_produk` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_produk`, `nama_produk`, `harga_produk`, `jumlah_produk`) VALUES
(47, '999447', 'BRG001', 'Lele Sangkuriang', 500, 50),
(48, '999447', 'BRG003', 'Lele Dumbo', 400, 50),
(49, '212130', 'BRG002', 'Lele Lokal', 350, 50),
(50, '393366', 'BRG002', 'Lele Lokal', 350, 50),
(51, '393366', 'BRG001', 'Lele Sangkuriang', 500, 50),
(52, '745159', 'BRG002', 'Lele Lokal', 350, 50),
(53, '361076', 'BRG001', 'Lele Sangkuriang', 500, 150),
(54, '447868', 'BRG002', 'Lele Lokal', 350, 50),
(55, '285725', 'BRG002', 'Lele Lokal', 350, 50),
(56, '285725', 'BRG001', 'Lele Sangkuriang', 500, 50),
(57, '310446', 'BRG001', 'Lele Sangkuriang', 500, 100),
(58, '108044', 'BRG003', 'Lele Dumbo', 400, 50),
(59, '695435', 'BRG001', 'Lele Sangkuriang', 500, 50),
(60, '706466', 'BRG002', 'Lele Lokal', 350, 50),
(61, '136476', 'BRG002', 'Lele Lokal', 350, 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('01', '3cm - 4 cm'),
('02', '5cm- 6cm'),
('03', '7cm - 8cm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_login` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipe_login` enum('A','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `email`, `password`, `tipe_login`) VALUES
('US001', 'Rudi Subono', 'Rudisubono99@gmail.com', 'qwerty123', 'P'),
('US002', 'Yunan Dewa A.S', 'yunandewa07@gmail.com', 'qwerty123', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(8) NOT NULL,
  `nama_depan` varchar(30) NOT NULL,
  `nama_belakang` varchar(30) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `kode_pos` varchar(8) NOT NULL,
  `no_telp` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_depan`, `nama_belakang`, `alamat`, `kode_pos`, `no_telp`, `email`, `password`) VALUES
('PLG003', 'Wisnu', 'Ardiyanto', 'Karangdowo, Klaten', '64372', 8347734672, 'wisnuardi12@gmail.com', 'qwerty123'),
('PLG004', 'Thomas', 'Jeri', 'Laweyan, Solo', '64576', 6282144344439, 'thomasjeri17@gmail.com', 'qwerty123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` double NOT NULL,
  `id_kategori` varchar(11) NOT NULL,
  `foto_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `id_kategori`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
('BRG001', 'Bibit Lele Sangkuriang 7-8cm', 500, '03', 'lele sangkuriang 7-8.jpg', 'Lele Sangkuriang merupaka', '2850'),
('BRG002', 'Bibit Lele Lokal 3-4cm', 350, '01', 'lele lokal 3-4.png', 'lele lokal', '250'),
('BRG003', 'Bibit Lele Dumbo 5-6cm', 400, '02', 'Lele Dumbob 5-6.png', 'Lele Dumbo merupakan jeni', '500');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_order` int(50) NOT NULL,
  `id_pelanggan` varchar(25) NOT NULL,
  `total_tagihan` int(20) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `waktu_transaksi` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `resi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_order`, `id_pelanggan`, `total_tagihan`, `metode_pembayaran`, `waktu_transaksi`, `status`, `pdf_url`, `kurir`, `resi`) VALUES
('108044', 2147483647, 'PLG003', 30097, 'null', '2022-08-18', 'Pending', 'Pugeran Karangdowo', 'Diambil', 'null'),
('136476', 2147483647, 'PLG003', 45085, 'null', '2022-08-23', 'Pending', '', 'Diambil', 'null'),
('212130', 2147483647, 'PLG003', 27522, 'null', '2022-08-13', 'Dibayar', 'sini', 'Diambil', 'null'),
('285725', 1906716665, 'PLG003', 52522, 'bahan baner.jpg', '2022-08-17', 'Selesai', 'semarang', 'Diambil', '170822RABU'),
('310446', 2147483647, 'PLG003', 60021, 'null', '2022-08-17', 'Pending', 'Carikan, Juwiring', 'Diambil', 'null'),
('361076', 2147483647, 'PLG003', 85097, 'Screenshot 2022-07-05 002908.png', '2022-08-17', 'Dikirim', 'upload saja', 'Diambil', '24356'),
('393366', 2147483647, 'PLG004', 52567, 'null', '2022-08-15', 'Dibayar', 'Colomadu', 'Diambil', 'null'),
('447868', 2147483647, 'PLG003', 27518, 'Screenshot 2022-07-08 014501.png', '2022-08-17', 'Dikirim', 'jogja', 'Diambil', '170822RABU1'),
('695435', 2147483647, 'PLG003', 35095, 'null', '2022-08-18', 'Pending', 'banyuwangi', 'Diambil', 'null'),
('706466', 2147483647, 'PLG003', 27542, 'Bukti Transfer 2.jpg', '2022-08-21', 'Pending', 'solo', 'Diambil', 'null'),
('745159', 2147483647, 'PLG003', 27594, '01', '2022-08-17', 'Gagal', 'gagal', 'Diambil', 'null'),
('999447', 2147483647, 'PLG003', 55049, 'Bukti Transfer 1.jpg', '2022-08-10', 'Pending', 'KONO', 'Diambil', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

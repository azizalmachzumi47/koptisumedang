-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Sep 2024 pada 09.15
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koptismd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_kacang` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_kacang`, `ket`, `gambar`) VALUES
(1, 1, 'gambar 1', 'kedelai (1).jpg'),
(2, 1, 'gambar 2', 'kedelai (2).jpg'),
(3, 1, 'gambar 3', 'kedelai (3).jpg'),
(4, 1, 'gambar 4', 'kedelai (4).jpg'),
(5, 1, 'gambar 5', 'kedelai (5).jpg'),
(6, 2, 'kedelai hitam', 'kedelai_hitam.jpg'),
(8, 3, 'kedelai hijau', 'kedelai_hijauu.jpg'),
(9, 3, 'kedelai hijau2', 'kedelai_hijaau.jpg'),
(10, 6, 'Kacang Tanah Merah', 'Kacang-Merah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kacang`
--

CREATE TABLE `tbl_kacang` (
  `id_kacang` int(11) NOT NULL,
  `nama_kacang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` mediumtext,
  `gambar` text,
  `berat` int(11) NOT NULL,
  `berat_satuan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kacang`
--

INSERT INTO `tbl_kacang` (`id_kacang`, `nama_kacang`, `id_kategori`, `harga`, `deskripsi`, `gambar`, `berat`, `berat_satuan`) VALUES
(1, 'kedelai kuning', 1, 16000, 'Minimal pembelian 10kilo, dibawah 10kilo tidak akan kami proses, pemesanan akan kami proses setelah melakukan pembayaran. harap melakukan pembayaran sebelum pukul 12.00 wib. terimakasi', 'kacangkedelai_kuning.jpg', 500, 'Kg'),
(2, 'kedelai hitam bean black soy', 2, 12000, 'Minimal pembelian 10kilo, dibawah 10kilo tidak akan kami proses, pemesanan akan kami proses setelah melakukan pembayaran. harap melakukan pembayaran sebelum pukul 12.00 wib. terimakasi', 'kedelaihitam.jpg', 600, 'Kg'),
(3, 'kedelai hijau', 1, 12000, 'Minimal pembelian 10kilo, dibawah 10kilo tidak akan kami proses, pemesanan akan kami proses setelah melakukan pembayaran. harap melakukan pembayaran sebelum pukul 12.00 wib. terimakasi', 'kedelai_hijau.jpg', 100, 'Kg'),
(4, 'kedelai hitam organik', 2, 13000, 'Minimal pembelian 10kilo, dibawah 10kilo tidak akan kami proses, pemesanan akan kami proses setelah melakukan pembayaran. harap melakukan pembayaran sebelum pukul 12.00 wib. terimakasi', 'kedelaihitam_organik.jpg', 800, 'Kg'),
(5, 'kedelai hitam saus', 2, 35000, 'Minimal pembelian 10kilo, dibawah 10kilo tidak akan kami proses, pemesanan akan kami proses setelah melakukan pembayaran. harap melakukan pembayaran sebelum pukul 12.00 wib. terimakasi', 'kedelaihitam_saus.jpg', 11, ''),
(6, 'Kacang Merah', 3, 20000, 'Kacang Merah', 'kacangtanah_merah.jpg', 1000, 'Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Kedelai'),
(2, 'Kedelai Hitam'),
(3, 'Kacang Tanah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `foto`) VALUES
(1, 'King Tiger', 'kingtiger@gmail.com', '1234', 'uchiha.jpg'),
(2, 'aziz', 'aziz@gmail.com', '123', 'User_Circle.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '5434-4382-3434-43-45', 'Almachzumi'),
(2, 'BNI', '3342-3456-2346', 'Almachzumi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_transaksi`
--

CREATE TABLE `tbl_rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_transaksi`
--

INSERT INTO `tbl_rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(16, '20211126VYDBGHVJ', 4, 1),
(17, '20211126ZFJEYGB7', 5, 1),
(18, '20211126HFLZ1KTG', 6, 1),
(19, '20211126HFLZ1KTG', 5, 1),
(20, '20211126HFLZ1KTG', 4, 1),
(21, '20211126HFLZ1KTG', 3, 1),
(22, '20211128RSH2PGYX', 4, 1),
(23, '20231121IX92LQSG', 6, 1),
(24, '20231125VFFRSJVG', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text,
  `no_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_telpon`) VALUES
(1, 'Toko Almachzumi', 440, 'Jl. Pagarsih No.77, Kota Bandung', '082222456999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(7, 1, '20211126VYDBGHVJ', '2021-11-26', 'tiger', '3213214', 'Bangka Belitung', 'Bangka', 'bangka', '232', 'jne', 'OKE', '3-6 Hari', 38000, 800, 13000, 51000, 1, '0bd5ef9c768b91993461ff6733dd1536.jpg', 'Tiger', 'BNI', '1234-1234-1234', 1, NULL),
(8, 2, '20211126ZFJEYGB7', '2021-11-26', 'almachzumi', '0897967967', 'Bangka Belitung', 'Bangka', 'bangka', '1333', 'jne', 'OKE', '3-6 Hari', 38000, 11, 35000, 73000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(9, 1, '20211126HFLZ1KTG', '2021-11-26', 'tiger', '56565', 'Jawa Barat', 'Sumedang', 'ujungjaya', '34553', 'jne', 'CTC', '2-3 Hari', 14000, 1911, 80000, 94000, 1, '3ca233120bd26f74e6145fdef5371c111.jpg', 'Tiger', 'BRI', '2938-1212-1212-1212', 1, NULL),
(10, 1, '20211128RSH2PGYX', '2021-11-28', 'Uchiha', '088977664433', 'Jawa Barat', 'Majalengka', 'Alun MJL', '35342', 'tiki', 'REG', '2 Hari', 14000, 800, 13000, 27000, 0, NULL, NULL, NULL, NULL, 0, NULL),
(11, 2, '20231121IX92LQSG', '2023-11-21', 'aziz', '08757463532', 'Jawa Barat', 'Bandung', 'Sumedang', '4512', 'jne', 'OKE', '6-8 Hari', 8000, 1000, 20000, 28000, 1, 'avatar_147142.png', 'aziz', 'bri', '454364743', 3, '45436'),
(12, 2, '20231125VFFRSJVG', '2023-11-25', 'natsu', '08227824', 'Jawa Barat', 'Bandung', 'bandung', '32435', 'tiki', 'ECO', '4 Hari', 10000, 22, 70000, 80000, 0, NULL, NULL, NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `level_user` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `level_user`) VALUES
(1, 'aziz', 'admin', 'admin', 1),
(2, 'almachzumi', 'user', 'user', 2),
(4, 'sasuke', 'sasuke', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_kacang` (`id_kacang`);

--
-- Indexes for table `tbl_kacang`
--
ALTER TABLE `tbl_kacang`
  ADD PRIMARY KEY (`id_kacang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kacang`
--
ALTER TABLE `tbl_kacang`
  MODIFY `id_kacang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD CONSTRAINT `tbl_gambar_ibfk_1` FOREIGN KEY (`id_kacang`) REFERENCES `tbl_kacang` (`id_kacang`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kacang`
--
ALTER TABLE `tbl_kacang`
  ADD CONSTRAINT `tbl_kacang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD CONSTRAINT `tbl_pelanggan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD CONSTRAINT `tbl_rekening_ibfk_1` FOREIGN KEY (`id_rekening`) REFERENCES `tbl_user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_rinci_transaksi`
--
ALTER TABLE `tbl_rinci_transaksi`
  ADD CONSTRAINT `tbl_rinci_transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_kacang` (`id_kacang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD CONSTRAINT `tbl_setting_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tbl_kacang` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD CONSTRAINT `tbl_transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `tbl_pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_kacang` (`id_kacang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

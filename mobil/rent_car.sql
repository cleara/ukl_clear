-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2019 pada 15.39
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_car`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sewa`
--

CREATE TABLE `detail_sewa` (
  `id_sewa` varchar(100) NOT NULL,
  `id_mobil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(100) NOT NULL,
  `nama_karyawan` varchar(300) NOT NULL,
  `alamat_karyawan` varchar(300) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat_karyawan`, `kontak`, `foto`, `username`, `password`) VALUES
(1, 'Cinta', 'mlg', '0964224567', '1.82.jpg', 'cin', '1234'),
(2, 'Anisa', 'Kediri', '082746984137', '5. ANISA PUSPITA SARI.jpg', 'nis', '1234'),
(3, 'Cleara', 'Tulungagung', '0884524677', '3.26.jpg', '1234', '.260.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(100) NOT NULL,
  `nomor_mobil` varchar(100) NOT NULL,
  `merk` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `warna` varchar(200) NOT NULL,
  `tahun_pembuatan` varchar(20) NOT NULL,
  `biaya_sewa_per_hari` double NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nomor_mobil`, `merk`, `jenis`, `warna`, `tahun_pembuatan`, `biaya_sewa_per_hari`, `gambar`, `jumlah`) VALUES
(1, 'A1', 'calya', 'mobil MPV', 'putih', '2010', 300, 'calya.jpg', 5),
(2, 'A2', 'kijang', 'mobil MPV', 'silver', '2001', 250, 'kijang-innova-04.jpg', 3),
(3, 'A3', 'rush', 'mobil SUV', 'putih', '2008', 500, 'Rush.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(200) NOT NULL,
  `nama_pelanggan` varchar(300) NOT NULL,
  `alamat_pelanggan` varchar(400) NOT NULL,
  `kontak` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `kontak`, `foto`) VALUES
(1, 'Syifa', 'magetan', '085123762339', 'SYIFA\' AULIYA ASH-SHOLIHAH.jpg'),
(2, 'Dewi', 'Banyuwangi', '085235169999', '9.Dewi Sartika.jpg'),
(3, 'Cleara', 'Tulungagung', '089125118645', '3-842.jpg'),
(4, 'Dita', 'surabaya', '085271883999', '4-397.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` int(200) NOT NULL,
  `id_mobil` int(100) NOT NULL,
  `id_karyawan` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_mobil`, `id_karyawan`, `id_pelanggan`, `tgl_sewa`, `tgl_kembali`, `total_bayar`) VALUES
(101, 1, 2, 1, '2019-05-03', '2019-05-04', 300),
(102, 2, 1, 2, '2019-05-06', '2019-05-08', 500);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_karyawan_2` (`id_karyawan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

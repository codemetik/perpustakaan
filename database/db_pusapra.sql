-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2022 pada 01.04
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pusapra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

DROP TABLE IF EXISTS `tb_buku`;
CREATE TABLE `tb_buku` (
  `no_database` int(10) NOT NULL,
  `no_buku` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `catg_buku` int(10) NOT NULL,
  `pemilik_buku` varchar(27) NOT NULL,
  `img` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`no_database`, `no_buku`, `tanggal`, `judul`, `pengarang`, `penerbit`, `tahun`, `jumlah`, `deskripsi`, `catg_buku`, `pemilik_buku`, `img`) VALUES
(70, '119', '2022-08-18', 'Pemrograman php Versi 18', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(71, '120', '2022-08-19', 'Pemrograman php Versi 19', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(72, '900', '2022-07-28', 'Belajar Android', 'Muhammad Danu', 'PT. Codemetik', 2022, 10, 'Belajar Android itu menyenangkan', 3, 'SMK Satya Praja 2 Petarukan', ''),
(73, '900', '2022-07-28', 'Belajar Android', 'Muhammad Danu', 'PT. Codemetik', 2022, 10, 'Belajar Android itu menyenangkan', 3, 'SMK Satya Praja 2 Petarukan', ''),
(74, '901', '2022-07-28', 'Kerja Di Jaman Now', 'Nina Kurnia Dewi, S.T.P.', 'Erlangga', 2014, 10, 'Berbagi', 1, 'SMK Satya Praja 2 Petarukan', '28072022220819remote2.PNG'),
(75, '901', '2022-07-28', 'Kerja Di Jaman Now', 'Nina Kurnia Dewi, S.T.P.', 'Erlangga', 2014, 10, 'Berbagi', 1, 'SMK Satya Praja 2 Petarukan', '28072022220733update halaman siswa keluar.PNG'),
(76, '201', '2022-08-01', 'Pemrograman php Versi 01', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(77, '202', '2022-08-02', 'Pemrograman php Versi 02', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(78, '203', '2022-08-03', 'Pemrograman php Versi 03', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(79, '204', '2022-08-04', 'Pemrograman php Versi 04', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(80, '205', '2022-08-05', 'Pemrograman php Versi 05', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(81, '206', '2022-08-06', 'Pemrograman php Versi 06', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 1, 'SMK Satya Praja 2 Petarukan', ''),
(82, '207', '2022-08-07', 'Pemrograman php Versi 07', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(83, '208', '2022-08-08', 'Pemrograman php Versi 08', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(84, '209', '2022-08-09', 'Pemrograman php Versi 09', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(85, '210', '2022-08-10', 'Pemrograman php Versi 10', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(86, '211', '2022-08-11', 'Pemrograman php Versi 11', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(87, '212', '2022-08-12', 'Pemrograman php Versi 12', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(88, '213', '2022-08-13', 'Pemrograman php Versi 13', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(89, '214', '2022-08-14', 'Pemrograman php Versi 14', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 2, 'SMK Satya Praja 2 Petarukan', ''),
(90, '215', '2022-08-15', 'Pemrograman php Versi 15', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(91, '216', '2022-08-16', 'Pemrograman php Versi 16', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(92, '217', '2022-08-17', 'Pemrograman php Versi 17', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(93, '218', '2022-08-18', 'Pemrograman php Versi 18', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', ''),
(94, '219', '2022-08-19', 'Pemrograman php Versi 19', 'M. Nufaiyal', 'PT. Codemetik', 2022, 20, 'Buku Praktisi Programmer', 3, 'SMK Satya Praja 2 Petarukan', '');

--
-- Trigger `tb_buku`
--
DROP TRIGGER IF EXISTS `delete_input_trash`;
DELIMITER $$
CREATE TRIGGER `delete_input_trash` BEFORE DELETE ON `tb_buku` FOR EACH ROW BEGIN
	insert into tb_trash(
	no_database, 
	no_buku, 
	tanggal, 
	judul, 
	pengarang, 
	penerbit, 
	tahun, 
	jumlah, 
	deskripsi, 
	catg_buku, 
	pemilik_buku)values(
	null, 
	OLD.no_buku, 
	OLD.tanggal, 
	OLD.judul, 
	OLD.pengarang, 
	OLD.penerbit, 
	OLD.tahun, 
	OLD.jumlah, 
	OLD.deskripsi, 
	OLD.catg_buku, 
	OLD.pemilik_buku);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_catg_buku`
--

DROP TABLE IF EXISTS `tb_catg_buku`;
CREATE TABLE `tb_catg_buku` (
  `id_catg` int(10) NOT NULL,
  `nama_catg` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_catg_buku`
--

INSERT INTO `tb_catg_buku` (`id_catg`, `nama_catg`) VALUES
(1, 'Produktif'),
(2, 'Non Produktif'),
(3, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam_buku`
--

DROP TABLE IF EXISTS `tb_pinjam_buku`;
CREATE TABLE `tb_pinjam_buku` (
  `id_pinjam` int(10) NOT NULL,
  `no_database` int(10) NOT NULL,
  `peminjam` varchar(20) NOT NULL,
  `nama_peminjam` varchar(225) NOT NULL,
  `tanggal_pinjam` varchar(225) NOT NULL,
  `jumlah_pinjam` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pinjam_buku`
--

INSERT INTO `tb_pinjam_buku` (`id_pinjam`, `no_database`, `peminjam`, `nama_peminjam`, `tanggal_pinjam`, `jumlah_pinjam`) VALUES
(16, 1, 'guru', 'Irfa', '2022-07-17', 1),
(17, 7, 'siswa', 'Bayu', '2022-07-18', 40),
(18, 5, 'lain-lain', 'Nufaiyal', '2022-07-19', 1),
(19, 3, 'guru', 'Kharish', '2022-07-17', 1),
(20, 56, 'lain-lain', 'Irfa', '2022-07-28', 3),
(21, 108, 'siswa', 'Dudung', '2022-07-28', 20);

--
-- Trigger `tb_pinjam_buku`
--
DROP TRIGGER IF EXISTS `tambah_jumlah_buku`;
DELIMITER $$
CREATE TRIGGER `tambah_jumlah_buku` BEFORE DELETE ON `tb_pinjam_buku` FOR EACH ROW BEGIN
	update tb_buku set jumlah = jumlah + OLD.jumlah_pinjam where no_database = OLD.no_database;
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `ubah_jumlah_buku`;
DELIMITER $$
CREATE TRIGGER `ubah_jumlah_buku` AFTER INSERT ON `tb_pinjam_buku` FOR EACH ROW BEGIN
	update tb_buku set jumlah = jumlah - NEW.jumlah_pinjam where no_database = NEW.no_database;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trash`
--

DROP TABLE IF EXISTS `tb_trash`;
CREATE TABLE `tb_trash` (
  `no_database` int(10) NOT NULL,
  `no_buku` char(20) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `deskripsi` varchar(225) NOT NULL,
  `catg_buku` int(10) NOT NULL,
  `pemilik_buku` varchar(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin2022', 'admin2022', 'Muhammad Irfa Nufaiyal Kharish, S.Kom');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no_database`,`no_buku`);

--
-- Indeks untuk tabel `tb_catg_buku`
--
ALTER TABLE `tb_catg_buku`
  ADD PRIMARY KEY (`id_catg`);

--
-- Indeks untuk tabel `tb_pinjam_buku`
--
ALTER TABLE `tb_pinjam_buku`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `tb_pinjam_buku_ibfk_1` (`no_database`);

--
-- Indeks untuk tabel `tb_trash`
--
ALTER TABLE `tb_trash`
  ADD PRIMARY KEY (`no_database`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `no_database` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `tb_catg_buku`
--
ALTER TABLE `tb_catg_buku`
  MODIFY `id_catg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam_buku`
--
ALTER TABLE `tb_pinjam_buku`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_trash`
--
ALTER TABLE `tb_trash`
  MODIFY `no_database` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

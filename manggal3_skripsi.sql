-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Sep 2022 pada 20.19
-- Versi server: 10.3.35-MariaDB-cll-lve
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manggal3_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`, `status`) VALUES
(1, 'regina@gmail.com', 'regina_manggala', '1234', 'Admin'),
(2, 'silvi@gmail.com', 'silvi_marketing', '1234', 'Manager Marketing'),
(3, 'yohans@gmail.com', 'yohanes_manggala', '1234', 'Manager Warehouse'),
(4, 'dian@gmail.com', 'dian', '2345', 'Manager Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) UNSIGNED NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `id_keterangan` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL,
  `id_grade` int(11) NOT NULL,
  `jenis_box` varchar(10) NOT NULL,
  `berat` int(11) DEFAULT NULL,
  `max_berat` float NOT NULL,
  `penyimpanan_barang` varchar(100) NOT NULL,
  `posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `id_ukuran`, `id_keterangan`, `id_supplier`, `id_lot`, `id_grade`, `jenis_box`, `berat`, `max_berat`, `penyimpanan_barang`, `posisi`) VALUES
(8, 2, 6, 1, 6, 21, 1, 'Standar', 33, 6468, 'F10-F11', 3),
(9, 2, 6, 1, 6, 22, 1, 'Standar', 33, 6468, 'F11-F12', 3),
(10, 2, 6, 1, 5, 1, 2, 'Standar', 32, 6272, 'B5-B6', 1),
(11, 2, 6, 1, 5, 1, 1, 'Standar', 33, 6468, 'B3-B4', 1),
(12, 1, 6, 4, 5, 2, 1, 'Standar', 33, 6468, 'A9-B9', 1),
(13, 1, 6, 4, 5, 3, 8, 'Standar', 33, 6468, 'B1-B2', 1),
(14, 2, 7, 7, 5, 4, 2, 'Standar', 32, 6272, 'C3-C4', 1),
(15, 2, 7, 7, 5, 5, 1, 'Standar', 33, 6468, 'B7-B8', 1),
(16, 2, 7, 7, 5, 6, 2, 'Standar', 32, 6272, 'C5-C6', 1),
(17, 2, 7, 7, 5, 7, 2, 'Standar', 32, 6272, 'C7-C8', 1),
(18, 2, 7, 7, 5, 7, 1, 'Standar', 33, 6468, 'C1-C2', 1),
(19, 2, 7, 8, 6, 23, 1, 'Standar', 33, 6468, 'F14-F15', 1),
(20, 2, 10, 7, 5, 8, 10, 'Standar', 33, 6468, 'D7-D8', 1),
(21, 2, 10, 7, 5, 9, 1, 'Standar', 33, 6468, 'D5-D6', 1),
(22, 2, 8, 9, 5, 10, 1, 'Standar', 33, 6468, 'D1-D2', 1),
(23, 2, 8, 1, 7, 28, 1, 'Small', 30, 10080, 'J1-J3', 1),
(24, 2, 8, 1, 7, 29, 1, 'Small', 30, 10080, 'K1-K3', 2),
(25, 2, 8, 1, 5, 11, 1, 'Standar', 33, 6468, 'C9-D9', 1),
(26, 2, 9, 10, 5, 12, 1, 'Standar', 33, 6468, 'D3-D4', 1),
(27, 2, 11, 9, 5, 13, 1, 'Standar', 33, 6468, 'E1-E2', 1),
(28, 2, 12, 1, 7, 30, 1, 'Small', 30, 10080, 'L1-L3', 2),
(29, 2, 13, 1, 8, 34, 1, 'Standar', 33, 6468, 'E9-F1', 1),
(30, 2, 14, 1, 5, 14, 2, 'Standar', 32, 6272, 'E3-E4', 1),
(31, 2, 14, 1, 5, 14, 10, 'Standar', 33, 6468, 'E7-E8', 1),
(32, 2, 14, 1, 5, 15, 2, 'Standar', 32, 6272, 'E5-E6', 1),
(33, 2, 4, 5, 5, 16, 1, 'Standar', 33, 6468, 'A5-A6', 1),
(34, 2, 4, 1, 7, 32, 1, 'Small', 30, 10080, 'H1-H3', 2),
(35, 2, 4, 1, 6, 24, 1, 'Standar', 33, 6468, 'F4-F5', 1),
(36, 2, 4, 1, 6, 25, 10, 'Standar', 33, 6468, 'F6-F7', 1),
(37, 2, 4, 1, 6, 26, 1, 'Standar', 33, 6468, 'F2-F3', 1),
(38, 2, 4, 1, 5, 17, 1, 'Standar', 33, 6468, 'A3-A4', 1),
(39, 1, 4, 4, 5, 18, 1, 'Standar', 33, 6468, 'A1-A2', 1),
(40, 1, 4, 3, 5, 19, 8, 'Jumbo', 500, 33000, 'M1-M22', 4),
(41, 1, 4, 3, 5, 19, 1, 'Jumbo', 520, 20280, 'N1-N12', 4),
(42, 2, 5, 6, 7, 33, 1, 'Small', 30, 10080, 'I1-I3', 1),
(43, 2, 5, 7, 5, 20, 1, 'Standar', 33, 6468, 'A7-A8', 1),
(44, 1, 5, 3, 6, 27, 1, 'Standar', 33, 6468, 'F8-F9', 1),
(45, 2, 4, 1, 7, 31, 1, 'Small', 30, 10080, 'G1-G3', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_grade`
--

CREATE TABLE `barang_grade` (
  `id_barang_grade` int(11) UNSIGNED NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_grade`
--

INSERT INTO `barang_grade` (`id_barang_grade`, `grade`) VALUES
(1, 'ASTD'),
(2, 'ANST'),
(8, 'A2'),
(9, 'A3'),
(10, 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_jenis`
--

CREATE TABLE `barang_jenis` (
  `id_barang_jenis` int(11) UNSIGNED NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_jenis`
--

INSERT INTO `barang_jenis` (`id_barang_jenis`, `jenis`) VALUES
(1, 'SDY'),
(2, 'DTY'),
(3, 'ITY');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keterangan`
--

CREATE TABLE `barang_keterangan` (
  `id_barang_keterangan` int(11) UNSIGNED NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_keterangan`
--

INSERT INTO `barang_keterangan` (`id_barang_keterangan`, `keterangan`) VALUES
(1, 'DH'),
(3, 'SDC'),
(4, 'SBT'),
(5, 'DH DDB'),
(6, 'DH LIM'),
(7, 'DH SIM'),
(8, 'SH SIM'),
(9, 'DH ROTO'),
(10, 'DH DDB INT EX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_lot`
--

CREATE TABLE `barang_lot` (
  `id_barang_lot` int(11) UNSIGNED NOT NULL,
  `lot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_lot`
--

INSERT INTO `barang_lot` (`id_barang_lot`, `lot`) VALUES
(1, '4R1281'),
(2, '93228'),
(3, '93235'),
(4, '4P559'),
(5, '4R1459'),
(6, '4R1476'),
(7, '4R1584'),
(8, '4Q2108'),
(9, '4P141'),
(10, '4R1688'),
(11, '4T883'),
(12, '4Y1821'),
(13, '4S1806'),
(14, '4P449'),
(15, '4P518'),
(16, '4Y1827'),
(17, '4R1195'),
(18, '93234'),
(19, '711109-J'),
(20, '4R1508'),
(21, '232100'),
(22, '232102'),
(23, '636570'),
(24, '222222'),
(25, '222450'),
(26, '222672'),
(27, '754025'),
(28, '139044-S'),
(29, '139118-S'),
(30, '139129-S'),
(31, '137628-S'),
(32, '151307-S'),
(33, '151381-S'),
(34, '1P1374125A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_ukuran`
--

CREATE TABLE `barang_ukuran` (
  `id_barang_ukuran` int(11) UNSIGNED NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang_ukuran`
--

INSERT INTO `barang_ukuran` (`id_barang_ukuran`, `ukuran`) VALUES
(4, '75/36'),
(5, '75/72'),
(6, '100/36'),
(7, '100/96'),
(8, '150/48'),
(9, '150/72'),
(10, '150/144'),
(11, '2/150/144'),
(12, '200/72'),
(13, '300/72'),
(14, '300/96');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bpb`
--

CREATE TABLE `bpb` (
  `id_bpb` int(11) UNSIGNED NOT NULL,
  `no_bpb` varchar(20) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `tgl_bpb` date NOT NULL,
  `id_po_detail` int(11) NOT NULL,
  `no_mobil` varchar(20) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `quantitas` int(11) NOT NULL,
  `berat` float NOT NULL,
  `packing_list` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bpb`
--

INSERT INTO `bpb` (`id_bpb`, `no_bpb`, `no_surat_jalan`, `no_po`, `tgl_bpb`, `id_po_detail`, `no_mobil`, `supir`, `quantitas`, `berat`, `packing_list`) VALUES
(18, 'BPB22080001', 'SJ08210001', 'PO22080001', '2021-08-24', 48, 'D 2343 AB', 'Ahmad', 160, 5120, 'BPB22080001.pdf'),
(19, 'BPB22080002', 'SJ08210002', 'PO22080001', '2021-08-24', 49, 'D 2343 AB', 'Ahmad', 123, 4059, 'BPB22080002.pdf'),
(20, 'BPB22080003', 'SJ08210003', 'PO22080001', '2021-08-24', 50, 'D 2343 AB', 'Ahmad', 90, 2970, 'BPB22080003.pdf'),
(21, 'BPB22080004', 'SJ08210004', 'PO22080001', '2021-08-24', 51, 'D 2343 AB', 'Ahmad', 88, 2904, 'BPB22080004.pdf'),
(22, 'BPB22080005', 'SJ08210005', 'PO22080001', '2021-08-24', 52, 'D 2343 AB', 'Ahmad', 132, 4224, 'BPB22080005.pdf'),
(23, 'BPB22080006', 'SJ08210006', 'PO22080001', '2021-08-24', 53, 'D 2343 AB', 'Ahmad', 119, 3927, 'BPB22080006.pdf'),
(24, 'BPB22080007', 'SJ08210007', 'PO22080001', '2021-08-24', 54, 'D 2343 AB', 'Ahmad', 68, 2176, 'BPB22080007.pdf'),
(25, 'BPB22080008', 'SJ08210008', 'PO22080001', '2021-08-24', 55, 'D 2343 AB', 'Ahmad', 131, 4192, 'BPB22080008.pdf'),
(26, 'BPB22080009', 'SJ08210009', 'PO22080001', '2021-08-24', 56, 'D 2343 AB', 'Ahmad', 65, 2145, 'BPB22080009.pdf'),
(27, 'BPB22080010', 'SJ08210010', 'PO22080001', '2021-08-24', 57, 'D 2343 AB', 'Ahmad', 106, 3498, 'BPB22080010.pdf'),
(28, 'BPB22080011', 'SJ08210011', 'PO22080001', '2021-08-24', 58, 'D 2343 AB', 'Ahmad', 80, 2640, 'BPB22080011.pdf'),
(29, 'BPB22080012', 'SJ08210012', 'PO22080001', '2021-08-24', 59, 'D 2344 AB', 'Budi', 115, 3795, 'BPB22080012.pdf'),
(30, 'BPB22080013', 'SJ08210013', 'PO22080001', '2021-08-24', 60, 'D 2344 AB', 'Budi', 90, 2970, 'BPB22080013.pdf'),
(31, 'BPB22080014', 'SJ08210014', 'PO22080001', '2021-08-24', 61, 'D 2344 AB', 'Budi', 106, 3498, 'BPB22080014.pdf'),
(32, 'BPB22080015', 'SJ08210015', 'PO22080001', '2021-08-24', 62, 'D 2344 AB', 'Budi', 139, 4587, 'BPB22080015.pdf'),
(33, 'BPB22080016', 'SJ08210016', 'PO22080001', '2021-08-24', 52, 'D 2344 AB', 'Budi', 138, 4416, 'BPB22080016.pdf'),
(34, 'BPB22080017', 'SJ08210017', 'PO22080001', '2021-08-24', 63, 'D 2344 AB', 'Budi', 138, 4416, 'BPB22080017.pdf'),
(35, 'BPB22080018', 'SJ08210017', 'PO22080001', '2021-08-24', 64, 'D 2344 AB', 'Budi', 55, 1815, 'BPB22080018.pdf'),
(36, 'BPB22080019', 'SJ08210018', 'PO22080001', '2021-08-24', 65, 'D 2344 AB', 'Budi', 131, 4192, 'BPB22080019.pdf'),
(37, 'BPB22080020', 'SJ08210019', 'PO22080001', '2021-08-24', 67, 'D 2344 AB', 'Budi', 99, 3267, 'BPB22080020.pdf'),
(38, 'BPB22080021', 'SJ08210020', 'PO22080001', '2021-08-24', 68, 'D 2344 AB', 'Budi', 118, 3894, 'BPB22080021.pdf'),
(39, 'BPB22080022', 'SJ08210021', 'PO22080001', '2021-08-24', 70, 'D 2344 AB', 'Budi', 121, 3993, 'BPB22080022.pdf'),
(40, 'BPB22080023', 'SJ08210022', 'PO22080001', '2021-08-24', 71, 'D 2344 AB', 'Budi', 5, 2500, 'BPB22080023.pdf'),
(41, 'BPB22080024', 'SJ08210023', 'PO22080001', '2021-08-24', 73, 'D 2344 AB', 'Budi', 7, 3120, 'BPB22080024.pdf'),
(42, 'BPB22080025', 'SJ08210024', 'PO22080001', '2021-08-24', 74, 'D 2344 AB', 'Budi', 119, 3927, 'BPB22080025.pdf'),
(43, 'BPB22080026', 'SJ08210025', 'PO22080002', '2021-08-24', 75, 'D 2829 DC', 'Rizki', 102, 3366, 'BPB22080026.pdf'),
(44, 'BPB22080027', 'SJ08210026', 'PO22080002', '2021-08-24', 76, 'D 2829 DC', 'Rizki', 105, 3465, 'BPB22080027.pdf'),
(45, 'BPB22080028', 'SJ08210027', 'PO22080002', '2021-08-24', 77, 'D 2829 DC', 'Rizki', 100, 3300, 'BPB22080028.pdf'),
(46, 'BPB22080029', 'SJ08210028', 'PO22080002', '2021-08-24', 78, 'D 2829 DC', 'Rizki', 124, 4092, 'BPB22080029.pdf'),
(47, 'BPB22080030', 'SJ08210029', 'PO22080002', '2021-08-24', 79, 'D 2829 DC', 'Rizki', 84, 2772, 'BPB22080030.pdf'),
(48, 'BPB22080031', 'SJ08210030', 'PO22080002', '2021-08-24', 80, 'D 2829 DC', 'Rizki', 143, 4719, 'BPB22080031.pdf'),
(49, 'BPB22080032', 'SJ08210031', 'PO22080002', '2021-08-24', 81, 'D 2829 DC', 'Rizki', 133, 4389, 'BPB22080032.pdf'),
(50, 'BPB22080033', 'SJ08210032', 'PO22080003', '2021-08-24', 82, 'D 4589 AF', 'Agus', 132, 3960, 'BPB22080033.pdf'),
(51, 'BPB22080034', 'SJ08210033', 'PO22080003', '2021-08-24', 83, 'D 4589 AF', 'Agus', 104, 3120, 'BPB22080034.pdf'),
(52, 'BPB22080035', 'SJ08210035', 'PO22080003', '2021-08-24', 85, 'D 4589 AF', 'Agus', 140, 4200, 'BPB22080035.pdf'),
(53, 'BPB22080036', 'SJ08210034', 'PO22080003', '2021-08-24', 84, 'D 4589 AF', 'Agus', 110, 3300, 'BPB22080036.pdf'),
(54, 'BPB22080037', 'SJ08210036', 'PO22080003', '2021-08-24', 86, 'D 4589 AF', 'Agus', 144, 4320, 'BPB22080037.pdf'),
(55, 'BPB22080038', 'SJ08210037', 'PO22080003', '2021-08-24', 87, 'D 4589 AF', 'Agus', 143, 4410, 'BPB22080038.pdf'),
(56, 'BPB22080039', 'SJ08210038', 'PO22080004', '2021-08-24', 88, 'D 9821 FG', 'Surya', 153, 5049, 'BPB22080039.pdf'),
(57, 'BPB22080040', 'SJ08210040', 'PO22080001', '2021-08-26', 48, 'D 2343 AB', 'Ahmad', 92, 2944, 'BPB22080040.pdf'),
(58, 'BPB22080041', 'SJ08210041', 'PO22080001', '2021-08-26', 49, 'D 2343 AB', 'Ahmad', 70, 2310, 'BPB22080041.pdf'),
(59, 'BPB22080042', 'SJ08210042', 'PO22080001', '2021-08-26', 50, 'D 2343 AB', 'Ahmad', 57, 1881, 'BPB22080042.pdf'),
(60, 'BPB22080043', 'SJ08210043', 'PO22080001', '2021-08-26', 51, 'D 2343 AB', 'Ahmad', 37, 1221, 'BPB22080043.pdf'),
(61, 'BPB22080044', 'SJ08210044', 'PO22080001', '2021-08-26', 52, 'D 2343 AB', 'Ahmad ', 74, 2368, 'BPB22080044.pdf'),
(62, 'BPB22080045', 'SJ08210045', 'PO22080001', '2021-08-26', 53, 'D 2343 AB', 'Ahmad', 71, 2343, 'BPB22080045.pdf'),
(63, 'BPB22080046', 'SJ08210046', 'PO22080001', '2021-08-26', 54, 'D 2343 AB', 'Ahmad ', 58, 1856, 'BPB22080046.pdf'),
(64, 'BPB22080047', 'SJ08210047', 'PO22080001', '2021-08-25', 55, 'D 2343 AB', 'Ahmad ', 61, 1952, 'BPB22080047.pdf'),
(65, 'BPB22080048', 'SJ08210048', 'PO22080001', '2021-08-26', 56, 'D 2343 AB', 'Ahmad', 55, 1815, 'BPB22080048.pdf'),
(66, 'BPB22080049', 'SJ08210049', 'PO22080001', '2021-08-26', 57, 'D 2343 AB', 'Ahmad ', 65, 2145, 'BPB22080049.pdf'),
(67, 'BPB22080050', 'SJ08210050', 'PO22080001', '2021-08-26', 58, 'D 2343 AB', 'Ahmad ', 65, 2145, 'BPB22080050.pdf'),
(68, 'BPB22080051', 'SJ08210051', 'PO22080001', '2021-08-25', 59, 'D 2343 AB', 'Ahmad ', 55, 1815, 'BPB22080051.pdf'),
(69, 'BPB22080052', 'SJ08210052', 'PO22080001', '2021-08-25', 60, 'D 2343 AB', 'Ahmad', 61, 2013, 'BPB22080052.pdf'),
(70, 'BPB22080053', 'SJ08210053', 'PO22080001', '2021-08-25', 61, 'D 2343 AB', 'Ahmad', 61, 2013, 'BPB22080053.pdf'),
(71, 'BPB22080054', 'SJ08210054', 'PO22080001', '2021-08-25', 62, 'D 2343 AB', 'Ahmad', 62, 2046, 'BPB22080054.pdf'),
(72, 'BPB22080055', 'SJ08210055', 'PO22080001', '2021-08-26', 64, 'D 2344 AB', 'Budi', 70, 2310, 'BPB22080055.pdf'),
(73, 'BPB22080056', 'SJ08210056', 'PO22080001', '2021-08-26', 67, 'D 2344 AB', 'Budi', 43, 1419, 'BPB22080056.pdf'),
(74, 'BPB22080057', 'SJ08210057', 'PO22080001', '2021-08-26', 68, 'D 2344 AB', 'Budi', 58, 1914, 'BPB22080057.pdf'),
(75, 'BPB22080058', 'SJ08210058', 'PO22080001', '2021-08-25', 70, 'D 2344 AB', 'Budi', 52, 1716, 'BPB22080058.pdf'),
(76, 'BPB22080059', 'SJ08210059', 'PO22080001', '2021-08-26', 71, 'D 2344 AB', 'Budi', 1, 500, 'BPB22080059.pdf'),
(77, 'BPB22080060', 'SJ08210060', 'PO22080001', '2021-08-25', 73, 'D 2344 AB', 'Budi', 1, 520, 'BPB22080060.pdf'),
(78, 'BPB22080061', 'SJ08210061', 'PO22080001', '2021-08-26', 74, 'D 2344 AB', 'Budi', 28, 924, 'BPB22080061.pdf'),
(79, 'BPB22080062', 'SJ08210062', 'PO22080002', '2021-08-26', 75, 'D 2829 DC', 'Rizki', 34, 1122, 'BPB22080062.pdf'),
(80, 'BPB22080063', 'SJ08210063', 'PO22080002', '2021-08-26', 76, 'D 2829 DC', 'Rizki ', 31, 1023, 'BPB22080063.pdf'),
(81, 'BPB22080064', 'SJ08210064', 'PO22080002', '2021-08-26', 80, 'D 2829 DC', 'Rizki', 57, 1881, 'BPB22080064.pdf'),
(82, 'BPB22080065', 'SJ08210065', 'PO22080001', '2021-08-29', 48, 'D 2343 AB', 'Ahmad', 61, 1952, 'BPB22080065.pdf'),
(83, 'BPB22080066', 'SJ08210066', 'PO22080001', '2021-08-29', 49, 'D 2343 AB', 'Ahmad', 47, 1551, 'BPB22080066.pdf'),
(84, 'BPB22080067', 'SJ08210067', 'PO22080001', '2021-08-29', 50, 'D 2343 AB', 'Ahmad', 38, 1254, 'BPB22080067.pdf'),
(85, 'BPB22080068', 'SJ08210068', 'PO22080001', '2021-08-29', 51, 'D 2343 AB', 'Ahmad', 25, 825, 'BPB22080068.pdf'),
(86, 'BPB22080069', 'SJ08210069', 'PO22080001', '2021-08-29', 52, 'D 2343 AB', 'Ahmad', 49, 1568, 'BPB22080069.pdf'),
(87, 'BPB22080070', 'SJ08210070', 'PO22080001', '2021-08-29', 53, 'D 2343 AB', 'Ahmad', 47, 1551, 'BPB22080070.pdf'),
(88, 'BPB22080071', 'SJ08210071', 'PO22080001', '2021-08-29', 54, 'D 2343 AB', 'Ahmad ', 38, 1216, 'BPB22080071.pdf'),
(89, 'BPB22080072', 'SJ08210072', 'PO22080001', '2021-08-28', 55, 'D 2343 AB', 'Ahmad ', 41, 1312, 'BPB22080072.pdf'),
(90, 'BPB22080073', 'SJ08210073', 'PO22080001', '2021-08-29', 56, 'D 2343 AB', 'Ahmad ', 37, 1221, 'BPB22080073.pdf'),
(91, 'BPB22080074', 'SJ08210074', 'PO22080001', '2021-08-29', 57, 'D 2343 AB', 'Ahmad ', 43, 1419, 'BPB22080074.pdf'),
(92, 'BPB22080075', 'SJ08210075', 'PO22080001', '2021-08-29', 58, 'D 2343 AB', 'Ahmad', 42, 1386, 'BPB22080075.pdf'),
(93, 'BPB22080076', 'SJ08210076', 'PO22080001', '2021-08-28', 59, 'D 2343 AB', 'Ahmad ', 37, 1221, 'BPB22080076.pdf'),
(94, 'BPB22080077', 'SJ08210077', 'PO22080001', '2021-08-28', 60, 'D 2343 AB', 'Ahmad ', 40, 1320, 'BPB22080077.pdf'),
(95, 'BPB22080078', 'SJ08210078', 'PO22080001', '2021-08-28', 61, 'D 2343 AB', 'Ahmad', 40, 1320, 'BPB22080078.pdf'),
(96, 'BPB22080079', 'SJ08210079', 'PO22080001', '2021-08-28', 62, 'D 2343 AB', 'Ahmad ', 41, 1353, 'BPB22080079.pdf'),
(97, 'BPB22080080', 'SJ08210080', 'PO22080001', '2021-08-28', 63, 'D 2343 AB', 'Ahmad ', 29, 928, 'BPB22080080.pdf'),
(98, 'BPB22080081', 'SJ08210081', 'PO22080001', '2021-08-29', 64, ' D 2344 A', 'Budi', 46, 1518, 'BPB22080081.pdf'),
(99, 'BPB22080082', 'SJ08210082', 'PO22080001', '2021-08-29', 65, ' D 2344 A', 'Budi', 40, 1280, 'BPB22080082.pdf'),
(100, 'BPB22080083', 'SJ08210083', 'PO22080001', '2021-08-29', 67, ' D 2344 A', 'Budi', 28, 924, 'BPB22080083.pdf'),
(101, 'BPB22080084', 'SJ08210084', 'PO22080001', '2021-08-29', 68, ' D 2344 A', 'Budi', 39, 1287, 'BPB22080084.pdf'),
(102, 'BPB22080085', 'SJ08210085', 'PO22080001', '2021-08-28', 70, ' D 2344 A', 'Budi', 34, 1122, 'BPB22080085.pdf'),
(103, 'BPB22080086', 'SJ08210086', 'PO22080001', '2021-08-29', 71, ' D 2344 A', 'Budi', 1, 500, 'BPB22080086.pdf'),
(104, 'BPB22080087', 'SJ08210087', 'PO22080001', '2021-08-28', 73, ' D 2344 A', 'Budi', 1, 520, 'BPB22080087.pdf'),
(105, 'BPB22080088', 'SJ08210088', 'PO22080001', '2021-08-29', 74, ' D 2344 A', 'Budi', 19, 627, 'BPB22080088.pdf'),
(106, 'BPB22080089', 'SJ08210089', 'PO22080002', '2021-08-29', 75, 'D 2829 DC', 'Budi', 23, 759, 'BPB22080089.pdf'),
(107, 'BPB22080090', 'SJ08210090', 'PO22080002', '2021-08-28', 76, 'D 2829 DC', 'Rizki', 21, 693, 'BPB22080090.pdf'),
(108, 'BPB22080091', 'SJ08210091', 'PO22080002', '2021-08-28', 77, 'D 2829 DC', 'Rizki', 29, 957, 'BPB22080091.pdf'),
(109, 'BPB22080092', 'SJ08210092', 'PO22080002', '2021-08-29', 78, 'D 2829 DC', 'Rizki', 36, 1188, 'BPB22080092.pdf'),
(110, 'BPB22080093', 'SJ08210093', 'PO22080002', '2021-08-29', 79, 'D 2829 DC', 'Rizki', 37, 1221, 'BPB22080093.pdf'),
(111, 'BPB22080094', 'SJ08210094', 'PO22080002', '2021-08-29', 80, 'D 2829 DC', 'Rizki', 37, 1221, 'BPB22080094.pdf'),
(112, 'BPB22080095', 'SJ08210095', 'PO22080002', '2021-08-29', 81, 'D 2829 DC', 'Rizki', 38, 1254, 'BPB22080095.pdf'),
(113, 'BPB22080096', 'SJ08210096', 'PO22080003', '2021-08-29', 82, 'D 4589 AF', 'Agus', 26, 780, 'BPB22080096.pdf'),
(114, 'BPB22080097', 'SJ08210097', 'PO22080003', '2021-08-30', 83, 'D 4589 AF', 'Agus', 29, 870, 'BPB22080097.pdf'),
(115, 'BPB22080098', 'SJ08210098', 'PO22080003', '2021-08-30', 84, 'D 4589 AF', 'Agus', 18, 540, 'BPB22080098.pdf'),
(116, 'BPB22080099', 'SJ08210099', 'PO22080003', '2021-08-30', 85, 'D 4589 AF', 'Agus', 22, 660, 'BPB22080099.pdf'),
(117, 'BPB22080100', 'SJ08210100', 'PO22080003', '2021-08-30', 86, 'D 4589 AF', 'Agus', 26, 780, 'BPB22080100.pdf'),
(118, 'BPB22080101', 'SJ08210101', 'PO22080003', '2021-08-30', 87, 'D 4589 AF', 'Agus', 31, 930, 'BPB22080101.pdf'),
(119, 'BPB22080102', 'SJ08210102', 'PO22080004', '2021-08-30', 88, 'D 9821 FG', 'Surya', 27, 891, 'BPB22080102.pdf'),
(120, 'BPB22080103', 'SJ09210001', 'PO22080001', '2021-09-01', 48, 'D 2343 A', 'Ahmad', 43, 1376, 'BPB22080103.pdf'),
(121, 'BPB22080104', 'SJ09210002', 'PO22080001', '2021-09-01', 49, 'D 2343 A', 'Ahmad', 33, 1089, 'BPB22080104.pdf'),
(122, 'BPB22080105', 'SJ09210003', 'PO22080001', '2021-09-01', 50, 'D 2343 A', 'Ahmad ', 27, 891, 'BPB22080105.pdf'),
(123, 'BPB22080106', 'JS09210004', 'PO22080001', '2021-09-01', 53, 'D 2343 AB', 'Ahmad ', 33, 1089, 'BPB22080106.pdf'),
(124, 'BPB22080107', 'SJ09210005', 'PO22080001', '2021-09-01', 54, 'D 2343 AB', 'Ahmad ', 27, 864, 'BPB22080107.pdf'),
(125, 'BPB22080108', 'SJ08210006', 'PO22080001', '2021-08-31', 55, 'D 2343 AB', 'Ahmad ', 29, 928, 'BPB22080108.pdf'),
(126, 'BPB22080109', 'SJ09210007', 'PO22080001', '2021-09-01', 51, 'D 2343 AB', 'Ahmad', 17, 561, 'BPB22080109.pdf'),
(127, 'BPB22080110', 'SJ09210008', 'PO22080001', '2021-09-01', 52, 'D 2343 AB', 'Ahmad', 35, 1120, 'BPB22080110.pdf'),
(128, 'BPB22080111', 'SJ09210009', 'PO22080001', '2021-09-01', 70, 'D 2343 AB', 'Ahmad', 26, 858, 'BPB22080111.pdf'),
(129, 'BPB22080112', 'SJ09210010', 'PO22080001', '2021-09-01', 57, 'D 2343 AB', 'Ahmad', 31, 1023, 'BPB22080112.pdf'),
(130, 'BPB22080113', 'SJ09210011', 'PO22080001', '2021-09-01', 58, 'D 2343 AB', 'Ahmad', 30, 990, 'BPB22080113.pdf'),
(131, 'BPB22080114', 'SJ08210012', 'PO22080001', '2021-08-31', 59, 'D 2343 AB', 'Ahmad ', 56, 1848, 'BPB22080114.pdf'),
(132, 'BPB22080115', 'SJ08210013', 'PO22080001', '2021-08-31', 60, 'D 2343 AB', 'Ahmad', 29, 957, 'BPB22080115.pdf'),
(133, 'BPB22080116', 'SJ08210014', 'PO22080001', '2021-08-31', 61, 'D 2343 AB', 'Ahmad', 29, 957, 'BPB22080116.pdf'),
(134, 'BPB22080117', 'SJ08210015', 'PO22080001', '2021-08-31', 62, 'D 2344 AB', 'Budi', 29, 957, 'BPB22080117.pdf'),
(135, 'BPB22080118', 'SJ08210016', 'PO22080001', '2021-08-31', 63, 'D 2344 AB', 'Budi', 65, 2080, 'BPB22080118.pdf'),
(136, 'BPB22080119', 'SJ09210017', 'PO22080001', '2021-09-01', 64, 'D 2344 AB', 'Budi', 33, 1089, 'BPB22080119.pdf'),
(137, 'BPB22080120', 'SJ09210018', 'PO22080001', '2021-09-01', 65, 'D 2344 AB', 'Budi', 90, 2880, 'BPB22080120.pdf'),
(138, 'BPB22080121', 'SJ09210019', 'PO22080001', '2021-09-01', 67, 'D 2344 AB', 'Budi', 37, 1221, 'BPB22080121.pdf'),
(139, 'BPB22080122', 'SJ09210020', 'PO22080001', '2021-09-01', 68, 'D 2344 AB', 'Budi', 27, 891, 'BPB22080122.pdf'),
(140, 'BPB22080123', 'SJ08210021', 'PO22080001', '2021-08-31', 70, 'D 2344 AB', 'Budi', 55, 1815, 'BPB22080123.pdf'),
(141, 'BPB22080124', 'SJ09210022', 'PO22080001', '2021-09-01', 71, 'D 2344 AB', 'Budi', 1, 500, 'BPB22080124.pdf'),
(142, 'BPB22080125', 'SJ08210023', 'PO22080001', '2021-08-31', 73, 'D 2344 AB', 'Budi', 1, 520, 'BPB22080125.pdf'),
(143, 'BPB22080126', 'SJ09210024', 'PO22080001', '2021-09-01', 74, 'D 2344 AB', 'Budi', 13, 429, 'BPB22080126.pdf'),
(144, 'BPB22080127', 'SJ09210025', 'PO22080002', '2021-09-01', 75, 'D 2829 DC', 'Rizki', 13, 429, 'BPB22080127.pdf'),
(145, 'BPB22080128', 'SJ08210026', 'PO22080002', '2021-08-30', 76, 'D 2829 DC', 'Rizki', 15, 495, 'BPB22080128.pdf'),
(146, 'BPB22080129', 'SJ08210027', 'PO22080002', '2021-08-30', 77, 'D 2829 DC', 'Rizki ', 36, 1188, 'BPB22080129.pdf'),
(147, 'BPB22080130', 'SJ08210028', 'PO22080002', '2021-08-31', 78, 'D 2829 DC', 'Rizki', 48, 1584, 'BPB22080130.pdf'),
(148, 'BPB22080131', 'SJ08210029', 'PO22080002', '2021-08-31', 79, 'D 2829 DC', 'Rizki', 20, 660, 'BPB22080131.pdf'),
(149, 'BPB22080132', 'SJ08210030', 'PO22080002', '2021-08-31', 80, 'D 2829 DC', 'Rizki', 26, 858, 'BPB22080132.pdf'),
(150, 'BPB22080133', 'SJ08210031', 'PO22080002', '2021-08-31', 81, 'D 2829 DC', 'Rizki', 55, 1815, 'BPB22080133.pdf'),
(151, 'BPB22080134', 'SJ08210032', 'PO22080003', '2021-08-31', 82, ' D 4589 AF', 'Agus', 25, 750, 'BPB22080134.pdf'),
(152, 'BPB22080135', 'SJ09210033', 'PO22080003', '2021-09-02', 83, ' D 4589 AF', 'Agus', 13, 390, 'BPB22080135.pdf'),
(153, 'BPB22080136', 'SJ09210034', 'PO22080003', '2021-09-02', 84, ' D 4589 AF', 'Agus', 26, 780, 'BPB22080136.pdf'),
(154, 'BPB22080137', 'SJ09210035', 'PO22080003', '2021-09-02', 85, ' D 4589 AF', 'Agus', 38, 1140, 'BPB22080137.pdf'),
(155, 'BPB22080138', 'SJ09210036', 'PO22080003', '2021-09-02', 86, ' D 4589 AF', 'Agus', 24, 720, 'BPB22080138.pdf'),
(156, 'BPB22080139', 'SJ09210037', 'PO22080003', '2021-09-02', 87, ' D 4589 AF', 'Agus', 32, 960, 'BPB22080139.pdf'),
(157, 'BPB22080140', 'SJ09210038', 'PO22080004', '2021-09-02', 88, ' D 9821 FG', 'Surya', 34, 1122, 'BPB22080140.pdf'),
(158, 'BPB22080141', 'SJ09210001', 'PO22080005', '2021-09-07', 117, 'D 2343 AB', 'Ahmad', 117, 3861, 'BPB22080141.pdf'),
(159, 'BPB22080142', 'SJ04210001', 'PO22080006', '2021-09-04', 118, 'D 883 AB', 'Agus', 137, 4500, 'BPB22080142.pdf'),
(160, 'BPB22090001', 'SJ01', 'PO22090001', '2022-09-04', 142, 'D 1234 AB', 'Agus', 135, 4455, 'BPB22090001.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) UNSIGNED NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat_npwp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `telp`, `alamat_npwp`) VALUES
(1, 'PT.JIN MYOUNG', '022 686 8507', 'KOMP.BATUJAJAR PERMAI II NO.27'),
(2, 'PT.DAYA PRATAMA LESTARI', '022 68686181', 'JL.INDUSTRI BATUJAJAR PERMAI II.NO.29 RT 03/04\r\n'),
(3, 'KO BUDY KURNIAWAN', '0821 7366 7231', 'JL. CIBINGBIN, No. 23'),
(4, 'PT. LEADING GARMENT', '022 5200638', 'Jl.Mengger No.97 Kel.Pasawahan Km 5,6, Kec.Dayeuh Kolot'),
(6, 'PT.PANASIA FILAMENT INTI', '022 5202930', 'Jl. Garuda No.135/74 Kota Bandung\r\n'),
(7, 'CV. INSANI JAYA MANDIRI', '022 - 6040788', 'Jl. Raya Cimindi No.115 Cimahi Bandung'),
(9, 'PT.ASIA PENTA GARMENT', '022 - 7800398', 'Jl. MEKAR MULIA NO.11 KOTA BANDUNG\r\n'),
(10, 'PT. TROST GARMENT', '021 - 8971018', 'Jl. Cibarusah, No. 73 Cikarang'),
(14, 'UNIKOM', '1234', 'Alamat A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_detail`
--

CREATE TABLE `customer_detail` (
  `id_customer_detail` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer_detail`
--

INSERT INTO `customer_detail` (`id_customer_detail`, `id_customer`, `alamat`) VALUES
(1, 6, 'Jln. Metro No. 44'),
(2, 4, 'Jln. Hang No. 40 Jakarta'),
(3, 1, 'Jln. Budi  No. 33, Cimareme 23376'),
(4, 4, 'Jln. Supono No. 171 Sumedang'),
(5, 8, 'Ki. Jakarta No. 369, Padang 31697, Kalbar'),
(6, 6, 'Jln. Baranang No. 664'),
(7, 7, 'Jln. Moh Hatta No. 158'),
(8, 8, 'Jln. Gardujati No. 72, Tidore Kepulauan 10043, Kalsel'),
(9, 4, 'Jln. Alibasa No. 591'),
(10, 6, 'Jln. Gading No. 393'),
(11, 6, 'Jln. Wahidin No. 847, Cikaarang'),
(12, 6, 'Jl. Bahagia No. 707, Cigereleng'),
(13, 2, 'Jl. Sutarto No. 805'),
(14, 8, 'Jln. Sudiarto No. 274, Administrasi Jakarta Utara 14002, Malut'),
(15, 2, 'Jr. Salak No. 626, Cicalengka'),
(16, 7, 'Jln. Uluwatu No. 344 Rancaekek'),
(17, 4, 'Jln. Pamulihan No. 33 Sumedang'),
(18, 3, 'Jl. Fajar No. 425, Cicaheum'),
(19, 3, 'Jl. Labu No. 447, Bekasi'),
(20, 9, 'Jl. Baranangsiang No. 97 Bekasi'),
(21, 1, 'Jln. Ciumbuleuit No. 871'),
(30, 10, 'Jl. Cibarusah, No. 73 Cikarang'),
(32, 1, 'KOMP.BATUJAJAR PERMAI II NO.27'),
(33, 2, 'JL.INDUSTRI BATUJAJAR PERMAI II.NO.29 RT 03/04'),
(34, 3, 'JL. CIBINGBIN, No. 23'),
(35, 4, 'Jl.Mengger No.97 Kel.Pasawahan Km 5,6, Kec.Dayeuh Kolot'),
(36, 6, 'Jl. Garuda No.135/74 Kota Bandung'),
(37, 7, 'Jl. Raya Cimindi No.115 Cimahi Bandung'),
(38, 9, 'Jl. MEKAR MULIA NO.11 KOTA BANDUNG'),
(39, 1, 'Jl. Raya Dayeuhkolot No.33, Pasawahan, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40258'),
(40, 2, 'Jl. Moh. Toha No.147, Pasawahan, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat 40256'),
(41, 3, 'Jl. Banten No.12, Kebonwaru, Kec. Batununggal, Kota Bandung, Jawa Barat 40272'),
(42, 14, 'Alamat A'),
(43, 14, 'Alamat B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `do`
--

CREATE TABLE `do` (
  `id_do` int(11) NOT NULL,
  `no_do` varchar(50) NOT NULL,
  `tgl_do` date NOT NULL,
  `id_so` int(11) NOT NULL,
  `no_po` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `do`
--

INSERT INTO `do` (`id_do`, `no_do`, `tgl_do`, `id_so`, `no_po`, `catatan`, `id_supir`, `id_kendaraan`) VALUES
(27, 'DO22080001', '2021-08-30', 35, 'PO08210001', '', 1, 1),
(28, 'DO22080002', '2021-08-30', 36, 'PO08210002', '', 2, 2),
(29, 'DO22080003', '2021-08-30', 37, 'PO08210003', '', 3, 3),
(30, 'DO22080004', '2021-08-30', 38, 'PO08210004', '', 4, 4),
(31, 'DO22080005', '2021-08-30', 41, 'PO08210005', '', 13, 5),
(32, 'DO22080006', '2021-08-30', 42, 'PO08210006', '', 14, 6),
(33, 'DO22080007', '2021-08-30', 43, 'PO08210007', '', 15, 7),
(34, 'DO22080008', '2021-08-31', 35, 'PO08210001', '', 16, 8),
(35, 'DO22080009', '2021-08-31', 36, 'PO08210002', '', 1, 1),
(36, 'DO22080010', '2021-08-31', 37, 'PO08210003', '', 2, 2),
(37, 'DO22080011', '2021-08-31', 38, 'PO08210004', '', 3, 3),
(38, 'DO22080012', '2021-08-31', 41, 'PO08210005', '', 4, 4),
(39, 'DO22080013', '2021-08-31', 42, 'PO08210006', '', 13, 5),
(40, 'DO22080014', '2021-08-31', 43, 'PO08210007', '', 15, 6),
(41, 'DO22080015', '2021-09-01', 35, 'PO09210001', '', 16, 8),
(42, 'DO22080016', '2021-09-01', 36, 'PO09210002', '', 1, 1),
(43, 'DO22080017', '2021-09-01', 37, 'PO09210003', '', 2, 2),
(44, 'DO22080018', '2021-09-01', 38, 'PO09210004', '', 3, 3),
(45, 'DO22080019', '2021-09-01', 41, 'PO09210005', '', 4, 4),
(46, 'DO22080020', '2021-09-01', 42, 'PO09210006', '', 13, 5),
(47, 'DO22080021', '2021-09-01', 43, 'PO09210007', '', 15, 7),
(48, 'DO22080022', '2021-09-01', 44, 'PO08210008', '', 14, 1),
(49, 'DO22080023', '2021-09-01', 44, 'PO08210008', '', 13, 1),
(50, 'DO22080024', '2022-09-01', 45, 'PO08210009', '', 16, 1),
(51, 'DO22080025', '2021-09-01', 46, 'PO08210010', '', 3, 2),
(52, 'DO22080026', '2021-08-30', 47, 'PO08210009', '', 4, 3),
(53, 'DO22080027', '2022-09-20', 48, 'PO08210012', '', 2, 3),
(54, 'DO22080028', '2021-09-01', 49, 'PO08210013', '', 15, 6),
(55, 'DO22080029', '2022-09-01', 50, 'PO09210001', '', 13, 2),
(56, 'DO22080030', '2021-09-01', 51, 'PO09210002', '', 2, 2),
(57, 'DO22080031', '2021-09-04', 52, 'PO09012021', '', 2, 1),
(58, 'DO22080032', '2021-09-09', 53, 'POAPF09210001', '', 3, 1),
(59, 'DO22080033', '2022-08-30', 54, '2', '', 3, 2),
(60, 'DO22080034', '2022-08-31', 54, 'r', '', 4, 1),
(61, 'DO22090001', '2022-09-04', 54, 'POA', '', 4, 1),
(62, 'DO22090002', '2022-09-05', 54, 'po02', '', 13, 1),
(63, 'DO22090003', '2022-09-05', 54, 'POA', '', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `do_detail`
--

CREATE TABLE `do_detail` (
  `id_do_detail` int(11) NOT NULL,
  `id_do` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `box` int(11) NOT NULL,
  `do_berat_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `do_detail`
--

INSERT INTO `do_detail` (`id_do_detail`, `id_do`, `id_barang`, `box`, `do_berat_total`) VALUES
(62, 27, 10, 45, 1440),
(63, 27, 11, 34, 1122),
(64, 27, 12, 25, 825),
(65, 27, 13, 25, 825),
(66, 27, 14, 39, 1248),
(67, 28, 15, 36, 1188),
(68, 28, 16, 21, 672),
(69, 28, 17, 40, 1280),
(70, 28, 18, 20, 660),
(71, 28, 20, 32, 1056),
(72, 29, 21, 24, 792),
(73, 29, 22, 34, 1122),
(74, 29, 25, 27, 891),
(75, 29, 26, 32, 1056),
(76, 29, 27, 39, 1287),
(77, 34, 10, 53, 1696),
(78, 34, 11, 41, 1353),
(79, 30, 30, 38, 1216),
(80, 34, 12, 30, 990),
(81, 30, 31, 18, 594),
(82, 34, 13, 29, 957),
(83, 30, 32, 42, 1344),
(84, 30, 33, 27, 891),
(85, 34, 14, 47, 1504),
(86, 30, 38, 33, 1089),
(87, 35, 15, 42, 1386),
(88, 35, 16, 24, 768),
(89, 35, 17, 46, 1472),
(90, 35, 18, 23, 759),
(91, 35, 20, 37, 1221),
(92, 31, 39, 34, 1122),
(93, 31, 40, 1, 500),
(94, 31, 41, 2, 1040),
(95, 31, 43, 34, 1122),
(96, 36, 21, 28, 924),
(97, 31, 8, 32, 1056),
(98, 32, 9, 33, 1089),
(99, 32, 19, 31, 1023),
(100, 32, 35, 39, 1287),
(101, 32, 36, 26, 858),
(102, 32, 37, 45, 1485),
(103, 36, 22, 41, 1353),
(104, 33, 44, 37, 1221),
(105, 36, 25, 32, 1056),
(106, 36, 26, 37, 1221),
(107, 33, 23, 37, 1110),
(108, 36, 27, 46, 1518),
(109, 33, 24, 29, 870),
(110, 37, 30, 46, 1472),
(111, 37, 31, 21, 693),
(112, 33, 28, 31, 930),
(113, 37, 32, 50, 1600),
(114, 33, 45, 40, 1200),
(115, 37, 33, 33, 1089),
(116, 33, 34, 41, 1230),
(117, 37, 38, 39, 1287),
(118, 33, 42, 40, 1240),
(119, 33, 29, 42, 1386),
(120, 38, 39, 40, 1320),
(121, 38, 40, 2, 1000),
(122, 38, 41, 2, 1040),
(123, 38, 43, 39, 1287),
(124, 38, 8, 37, 1221),
(125, 39, 9, 38, 1254),
(126, 39, 19, 37, 1221),
(127, 39, 35, 45, 1485),
(128, 39, 36, 31, 1023),
(129, 39, 37, 52, 1716),
(130, 40, 44, 44, 1452),
(131, 40, 23, 44, 1320),
(132, 40, 24, 34, 1020),
(134, 40, 28, 36, 1080),
(136, 40, 45, 46, 1380),
(137, 40, 34, 47, 1410),
(139, 40, 42, 48, 1488),
(141, 40, 29, 51, 1683),
(178, 48, 10, 62, 1984),
(179, 48, 11, 48, 1584),
(180, 50, 12, 35, 1155),
(181, 50, 13, 34, 1122),
(182, 50, 14, 46, 1472),
(183, 51, 16, 23, 736),
(184, 51, 15, 41, 1353),
(185, 51, 17, 45, 1440),
(186, 51, 18, 22, 726),
(187, 51, 20, 37, 1221),
(189, 52, 22, 40, 1320),
(190, 52, 21, 28, 924),
(191, 52, 25, 31, 1023),
(192, 52, 26, 37, 1221),
(193, 52, 27, 54, 1782),
(194, 53, 30, 54, 1728),
(195, 53, 31, 16, 528),
(196, 53, 32, 39, 1248),
(197, 53, 33, 39, 1287),
(198, 53, 38, 46, 1518),
(199, 54, 39, 47, 1551),
(200, 54, 40, 2, 1000),
(201, 54, 41, 2, 1040),
(202, 54, 43, 46, 1518),
(203, 54, 8, 33, 1089),
(204, 55, 9, 34, 1122),
(205, 55, 19, 32, 1056),
(206, 55, 35, 40, 1320),
(207, 55, 36, 27, 891),
(208, 55, 37, 46, 1518),
(209, 56, 44, 52, 1716),
(210, 56, 23, 51, 1530),
(211, 56, 24, 41, 1230),
(212, 56, 28, 43, 1290),
(213, 56, 45, 54, 1620),
(214, 56, 34, 56, 1680),
(215, 56, 42, 57, 1710),
(216, 56, 29, 60, 1980),
(217, 57, 37, 30, 990),
(218, 58, 13, 107, 3531),
(219, 59, 11, 61, 2013);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) UNSIGNED NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `tipe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nopol`, `tipe`) VALUES
(1, 'D 8358 DP', 'Engkel'),
(2, 'D 8245 DP', 'Double'),
(3, 'D 8246 DP', 'Double'),
(4, 'D 8530 ES', 'Engkel'),
(5, 'D 8531 ES', 'Engkel'),
(6, 'D 8533 ES', 'Engkel'),
(7, 'D 8534 ES', 'Engkel'),
(8, 'D 8535 ES', 'Losbak'),
(9, 'D 8537 ES', 'SS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(8, '2021-12-06-064739', 'App\\Database\\Migrations\\MigrateKaryawan', 'default', 'App', 1638860522, 1),
(9, '2021-12-07-064042', 'App\\Database\\Migrations\\User', 'default', 'App', 1638860522, 1),
(10, '2021-12-07-064438', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1638860522, 1),
(17, '2021-12-10-033059', 'App\\Database\\Migrations\\Role', 'default', 'App', 1639185570, 2),
(18, '2021-12-11-010710', 'App\\Database\\Migrations\\Supir', 'default', 'App', 1639185570, 2),
(19, '2021-12-11-010735', 'App\\Database\\Migrations\\Kenek', 'default', 'App', 1639185570, 2),
(20, '2021-12-11-010750', 'App\\Database\\Migrations\\Supplier', 'default', 'App', 1639185570, 2),
(21, '2021-12-11-010802', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1639185570, 2),
(22, '2021-12-11-010823', 'App\\Database\\Migrations\\Kendaraan', 'default', 'App', 1639185570, 2),
(23, '2021-12-11-012754', 'App\\Database\\Migrations\\Supir', 'default', 'App', 1639186085, 3),
(24, '2021-12-11-012828', 'App\\Database\\Migrations\\Kenek', 'default', 'App', 1639186127, 4),
(25, '2021-12-11-012904', 'App\\Database\\Migrations\\Role', 'default', 'App', 1639186261, 5),
(26, '2021-12-11-012935', 'App\\Database\\Migrations\\Supplier', 'default', 'App', 1639186261, 5),
(27, '2021-12-11-012953', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1639186261, 5),
(28, '2021-12-11-012959', 'App\\Database\\Migrations\\Kendaraan', 'default', 'App', 1639186261, 5),
(33, '2021-12-11-013157', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1639205520, 6),
(34, '2021-12-11-020423', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1639205520, 6),
(35, '2021-12-11-072634', 'App\\Database\\Migrations\\Status', 'default', 'App', 1639207655, 7),
(36, '2021-12-12-025009', 'App\\Database\\Migrations\\CustomerDetail', 'default', 'App', 1639277530, 8),
(37, '2021-12-12-124717', 'App\\Database\\Migrations\\Karyawan', 'default', 'App', 1639313385, 9),
(38, '2021-12-15-122533', 'App\\Database\\Migrations\\BarangJenis', 'default', 'App', 1639571685, 10),
(39, '2021-12-15-122634', 'App\\Database\\Migrations\\BarangKeterangan', 'default', 'App', 1639571685, 10),
(40, '2021-12-15-122651', 'App\\Database\\Migrations\\BarangGrade', 'default', 'App', 1639571685, 10),
(41, '2021-12-15-123558', 'App\\Database\\Migrations\\BarangJenis', 'default', 'App', 1639571770, 11),
(42, '2021-12-15-132618', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1639575727, 12),
(43, '2021-12-16-021839', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1639621136, 13),
(44, '2021-12-20-005926', 'App\\Database\\Migrations\\BarangUkuran', 'default', 'App', 1639962115, 14),
(45, '2021-12-20-010032', 'App\\Database\\Migrations\\BarangLot', 'default', 'App', 1639962115, 14),
(46, '2021-12-20-010233', 'App\\Database\\Migrations\\BarangKeterangan', 'default', 'App', 1639962162, 15),
(47, '2021-12-20-015856', 'App\\Database\\Migrations\\Barang', 'default', 'App', 1639965779, 16),
(48, '2021-12-22-080111', 'App\\Database\\Migrations\\SO', 'default', 'App', 1640160309, 17),
(49, '2021-12-22-080139', 'App\\Database\\Migrations\\SODetail', 'default', 'App', 1640160309, 17),
(50, '2021-12-22-080843', 'App\\Database\\Migrations\\SODetail', 'default', 'App', 1640160556, 18),
(51, '2021-12-30-062223', 'App\\Database\\Migrations\\PO', 'default', 'App', 1640845461, 19),
(52, '2021-12-30-062519', 'App\\Database\\Migrations\\PODetail', 'default', 'App', 1640845717, 20),
(53, '2022-01-10-215921', 'App\\Database\\Migrations\\BPB', 'default', 'App', 1641852410, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `id_penyimpanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `posisi_barang` varchar(10) NOT NULL,
  `berat_penyimpanan` float NOT NULL,
  `disimpan` float NOT NULL,
  `status_penyimpanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyimpanan`
--

INSERT INTO `penyimpanan` (`id_penyimpanan`, `id_barang`, `posisi_barang`, `berat_penyimpanan`, `disimpan`, `status_penyimpanan`) VALUES
(2, 11, 'A2', 6468, 2937, 0),
(3, 11, 'A3', 6468, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id_po` int(11) UNSIGNED NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `tgl_po` date NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `keterangan_po` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id_po`, `no_po`, `tgl_po`, `id_supplier`, `keterangan_po`, `status`) VALUES
(25, 'PO22080001', '2022-08-24', 5, '', 1),
(26, 'PO22080002', '2022-08-24', 6, '', 1),
(27, 'PO22080003', '2021-08-24', 7, '', 1),
(28, 'PO22080004', '2022-08-24', 8, '', 1),
(33, 'PO22080005', '2021-09-04', 6, '', 1),
(35, 'PO22080006', '2021-09-03', 5, '', 1),
(36, 'PO22080007', '2022-08-29', 5, '', 0),
(37, 'PO22090001', '2022-09-03', 8, '', 1),
(38, 'PO22090002', '2022-09-03', 7, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `po_detail`
--

CREATE TABLE `po_detail` (
  `id_po_detail` int(11) UNSIGNED NOT NULL,
  `id_po` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `quantitas` int(11) NOT NULL,
  `berat_total` float NOT NULL,
  `quantitas_mutasi` int(11) NOT NULL,
  `berat_total_mutasi` float NOT NULL,
  `keterangan_po_detail` varchar(255) NOT NULL,
  `status_po` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `po_detail`
--

INSERT INTO `po_detail` (`id_po_detail`, `id_po`, `id_barang`, `quantitas`, `berat_total`, `quantitas_mutasi`, `berat_total_mutasi`, `keterangan_po_detail`, `status_po`) VALUES
(48, 25, 10, 356, 11392, 356, 11392, '', 1),
(49, 25, 11, 273, 9009, 273, 9009, '', 1),
(50, 25, 12, 212, 6996, 212, 6996, '', 1),
(51, 25, 13, 168, 5544, 168, 5544, '', 1),
(52, 25, 14, 290, 9280, 290, 9280, '', 1),
(53, 25, 15, 270, 8910, 270, 8910, '', 1),
(54, 25, 16, 191, 6112, 191, 6112, '', 1),
(55, 25, 17, 262, 8384, 262, 8384, '', 1),
(56, 25, 18, 183, 6039, 183, 6039, '', 1),
(57, 25, 20, 245, 8085, 245, 8085, '', 1),
(58, 25, 21, 217, 7161, 217, 7161, '', 1),
(59, 25, 22, 263, 8679, 263, 8679, '', 1),
(60, 25, 25, 220, 7260, 220, 7260, '', 1),
(61, 25, 26, 236, 7788, 236, 7788, '', 1),
(62, 25, 27, 271, 8943, 271, 8943, '', 1),
(63, 25, 30, 232, 7424, 232, 7424, '', 1),
(64, 25, 31, 204, 6732, 204, 6732, '', 1),
(65, 25, 32, 261, 8352, 261, 8352, '', 1),
(67, 25, 33, 208, 6831, 207, 6831, '', 1),
(68, 25, 38, 241, 7953, 242, 7986, '', 1),
(70, 25, 39, 262, 8646, 288, 9504, '', 1),
(71, 25, 40, 8, 4000, 8, 4000, '', 1),
(73, 25, 41, 10, 4680, 10, 4680, '', 1),
(74, 25, 43, 179, 5907, 179, 5907, '', 1),
(75, 26, 8, 172, 5676, 172, 5676, '', 1),
(76, 26, 9, 172, 5676, 172, 5676, '', 1),
(77, 26, 19, 165, 5445, 165, 5445, '', 1),
(78, 26, 35, 207, 6831, 207, 6831, '', 1),
(79, 26, 36, 141, 4653, 141, 4653, '', 1),
(80, 26, 37, 263, 8679, 263, 8679, '', 1),
(81, 26, 44, 225, 7425, 226, 7425, '', 1),
(82, 27, 23, 182, 5460, 182, 5460, '', 1),
(83, 27, 24, 146, 4380, 146, 4380, '', 1),
(84, 27, 28, 155, 4650, 155, 4650, '', 1),
(85, 27, 45, 200, 6000, 200, 6000, '', 1),
(86, 27, 34, 193, 5790, 193, 5790, '', 1),
(87, 27, 42, 204, 6300, 204, 6300, '', 1),
(88, 28, 29, 214, 7062, 214, 7062, '', 1),
(117, 33, 13, 117, 3861, 117, 3861, '', 1),
(118, 35, 12, 122, 4000, 137, 4521, '', 1),
(119, 35, 27, 64, 2100, 0, 0, '', 0),
(120, 36, 13, 107, 3531, 0, 0, '', 0),
(121, 36, 17, 65, 2080, 0, 0, '', 0),
(122, 36, 27, 64, 2112, 0, 0, '', 0),
(123, 36, 30, 102, 3264, 0, 0, '', 0),
(124, 36, 32, 66, 2112, 0, 0, '', 0),
(125, 36, 33, 88, 2904, 0, 0, '', 0),
(126, 36, 38, 72, 2376, 0, 0, '', 0),
(127, 36, 40, 63, 31500, 0, 0, '', 0),
(128, 36, 41, 36, 18720, 0, 0, '', 0),
(129, 36, 43, 136, 4488, 0, 0, '', 0),
(138, 38, 23, 285, 8550, 0, 0, '', 0),
(139, 38, 24, 294, 8820, 0, 0, '', 0),
(140, 38, 28, 292, 8760, 0, 0, '', 0),
(141, 38, 34, 286, 8580, 0, 0, '', 0),
(142, 37, 29, 135, 4455, 135, 4455, '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_penerimaan`
--

CREATE TABLE `schedule_penerimaan` (
  `id_schedule_penerimaan` int(11) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `id_po` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `berat_penerimaan` float NOT NULL,
  `status_penerimaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule_penerimaan`
--

INSERT INTO `schedule_penerimaan` (`id_schedule_penerimaan`, `tgl_penerimaan`, `id_po`, `id_supplier`, `id_barang`, `berat_penerimaan`, `status_penerimaan`) VALUES
(8, '2021-09-07', 33, 5, 12, 3861, 1),
(9, '2021-09-04', 35, 5, 12, 4000, 1),
(10, '2022-09-04', 37, 8, 29, 4000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_pengeluaran`
--

CREATE TABLE `schedule_pengeluaran` (
  `id_schedule_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `id_so` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_customer_detail` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `berat_pengeluaran` float NOT NULL,
  `status_pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule_pengeluaran`
--

INSERT INTO `schedule_pengeluaran` (`id_schedule_pengeluaran`, `tgl_pengeluaran`, `id_so`, `id_customer`, `id_customer_detail`, `id_barang`, `berat_pengeluaran`, `status_pengeluaran`) VALUES
(7, '2021-09-09', 53, 6, 1, 13, 3531, 1),
(8, '2021-09-06', 54, 1, 21, 13, 1000, 1),
(9, '2022-09-05', 54, 14, 43, 11, 2000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `so`
--

CREATE TABLE `so` (
  `id_so` int(11) UNSIGNED NOT NULL,
  `no_so` varchar(20) NOT NULL,
  `tgl_so` date NOT NULL,
  `id_customer` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `so`
--

INSERT INTO `so` (`id_so`, `no_so`, `tgl_so`, `id_customer`, `keterangan`, `status`) VALUES
(35, 'SO22080001', '2021-08-30', 1, '', 1),
(36, 'SO22080002', '2021-08-30', 2, '', 1),
(37, 'SO22080003', '2021-08-30', 3, '', 1),
(38, 'SO22080004', '2021-08-30', 4, '', 1),
(41, 'SO22080005', '2021-08-30', 6, '', 1),
(42, 'SO22080006', '2021-08-30', 7, '', 1),
(43, 'SO22080007', '2021-08-30', 9, '', 1),
(44, 'SO22080008', '2021-08-30', 1, '', 1),
(45, 'SO22080009', '2021-08-30', 2, '', 1),
(46, 'SO22080010', '2021-08-30', 7, '', 1),
(47, 'SO22080011', '2021-08-30', 9, '', 1),
(48, 'SO22080012', '2021-08-30', 3, '', 1),
(49, 'SO22080013', '2022-08-30', 1, '', 1),
(50, 'SO22080014', '2021-08-30', 10, '', 1),
(51, 'SO22080015', '2021-08-30', 1, '', 1),
(52, 'SO22080016', '2021-09-03', 10, '', 1),
(53, 'SO22080017', '2021-09-08', 6, '', 1),
(54, 'SO22080018', '2021-09-05', 1, '', 0),
(55, 'SO22090001', '0000-00-00', 14, '', 0),
(56, 'SO22090002', '2022-09-04', 14, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `so_detail`
--

CREATE TABLE `so_detail` (
  `id_so_detail` int(11) UNSIGNED NOT NULL,
  `id_so` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `quantitas` int(11) NOT NULL,
  `berat_total` float NOT NULL,
  `quantitas_mutasi` int(11) NOT NULL,
  `berat_total_mutasi` float NOT NULL,
  `keterangan_so` varchar(255) NOT NULL,
  `status_so` int(11) NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `so_detail`
--

INSERT INTO `so_detail` (`id_so_detail`, `id_so`, `id_barang`, `quantitas`, `berat_total`, `quantitas_mutasi`, `berat_total_mutasi`, `keterangan_so`, `status_so`, `tgl_kirim`) VALUES
(63, 35, 10, 160, 5120, 160, 5120, '3', 1, '0000-00-00'),
(64, 35, 11, 123, 4059, 123, 4059, '21', 1, '0000-00-00'),
(65, 35, 12, 90, 2970, 90, 2970, '3', 1, '0000-00-00'),
(66, 35, 13, 88, 2904, 88, 2904, '21', 1, '0000-00-00'),
(67, 35, 14, 132, 4224, 132, 4224, '21', 1, '0000-00-00'),
(68, 36, 15, 119, 3927, 119, 3927, '13', 1, '0000-00-00'),
(69, 36, 16, 68, 2176, 68, 2176, '15', 1, '0000-00-00'),
(70, 36, 17, 131, 4192, 131, 4192, '13', 1, '0000-00-00'),
(71, 36, 18, 65, 2145, 65, 2145, '13', 1, '0000-00-00'),
(72, 36, 20, 106, 3498, 106, 3498, '13', 1, '0000-00-00'),
(73, 37, 21, 80, 2640, 80, 2640, '18', 1, '0000-00-00'),
(74, 37, 22, 115, 3795, 115, 3795, '19', 1, '0000-00-00'),
(75, 37, 25, 90, 2970, 90, 2970, '18', 1, '0000-00-00'),
(76, 37, 26, 106, 3498, 106, 3498, '18', 1, '0000-00-00'),
(77, 37, 27, 139, 4587, 139, 4587, '19', 1, '0000-00-00'),
(78, 38, 30, 138, 4416, 138, 4416, '2', 1, '0000-00-00'),
(79, 38, 31, 55, 1815, 55, 1815, '4', 1, '0000-00-00'),
(80, 38, 32, 131, 4192, 131, 4192, '9', 1, '0000-00-00'),
(81, 38, 33, 99, 3267, 99, 3267, '17', 1, '0000-00-00'),
(82, 38, 38, 118, 3894, 118, 3894, '2', 1, '0000-00-00'),
(83, 41, 39, 121, 3993, 121, 3993, '1', 1, '0000-00-00'),
(84, 41, 40, 5, 2500, 5, 2500, '5', 1, '0000-00-00'),
(85, 41, 41, 7, 3120, 6, 3120, '6', 1, '0000-00-00'),
(86, 41, 43, 119, 3927, 119, 3927, '12', 1, '0000-00-00'),
(87, 41, 8, 102, 3366, 102, 3366, '12', 1, '0000-00-00'),
(88, 42, 9, 105, 3465, 105, 3465, '7', 1, '0000-00-00'),
(89, 42, 19, 100, 3300, 100, 3300, '16', 1, '0000-00-00'),
(90, 42, 35, 124, 4092, 124, 4092, '7', 1, '0000-00-00'),
(91, 42, 36, 84, 2772, 84, 2772, '16', 1, '0000-00-00'),
(95, 42, 37, 143, 4719, 143, 4719, '7', 1, '0000-00-00'),
(96, 43, 44, 133, 4389, 133, 4389, '20', 1, '0000-00-00'),
(97, 43, 23, 132, 3960, 132, 3960, '20', 1, '0000-00-00'),
(98, 43, 24, 104, 3120, 104, 3120, '20', 1, '0000-00-00'),
(99, 43, 28, 110, 3300, 110, 3300, '20', 1, '0000-00-00'),
(100, 43, 45, 140, 4200, 140, 4200, '20', 1, '0000-00-00'),
(101, 43, 34, 144, 4320, 144, 4320, '20', 1, '0000-00-00'),
(102, 43, 42, 143, 4433, 144, 4464, '20', 1, '0000-00-00'),
(103, 43, 29, 153, 5049, 153, 5049, '20', 1, '0000-00-00'),
(104, 44, 10, 62, 1984, 62, 1984, '3', 1, '0000-00-00'),
(105, 44, 11, 48, 1584, 48, 1584, '21', 1, '0000-00-00'),
(107, 45, 12, 35, 1155, 35, 1155, '13', 1, '0000-00-00'),
(108, 45, 13, 34, 1122, 34, 1122, '13', 1, '0000-00-00'),
(109, 45, 14, 46, 1472, 46, 1472, '15', 1, '0000-00-00'),
(110, 46, 16, 23, 736, 23, 736, '7', 1, '0000-00-00'),
(111, 46, 15, 41, 1353, 41, 1353, '16', 1, '0000-00-00'),
(112, 46, 17, 45, 1440, 45, 1440, '7', 1, '0000-00-00'),
(113, 46, 18, 22, 726, 22, 726, '7', 1, '0000-00-00'),
(114, 46, 20, 37, 1221, 37, 1221, '16', 1, '0000-00-00'),
(115, 47, 21, 28, 924, 29, 957, '20', 1, '0000-00-00'),
(116, 47, 22, 40, 1320, 40, 1320, '20', 1, '0000-00-00'),
(117, 47, 25, 31, 1023, 31, 1023, '20', 1, '0000-00-00'),
(118, 47, 26, 37, 1221, 37, 1221, '20', 1, '0000-00-00'),
(119, 47, 27, 54, 1782, 54, 1782, '20', 1, '0000-00-00'),
(120, 48, 30, 54, 1728, 54, 1728, '19', 1, '0000-00-00'),
(121, 48, 31, 16, 528, 16, 528, '19', 1, '0000-00-00'),
(122, 48, 32, 39, 1248, 39, 1248, '18', 1, '0000-00-00'),
(123, 48, 33, 39, 1287, 39, 1287, '18', 1, '0000-00-00'),
(124, 48, 38, 46, 1518, 46, 1518, '18', 1, '0000-00-00'),
(125, 49, 39, 47, 1551, 47, 1551, '3', 1, '0000-00-00'),
(126, 49, 40, 2, 1000, 2, 1000, '21', 1, '0000-00-00'),
(127, 49, 41, 2, 1040, 2, 1040, '3', 1, '0000-00-00'),
(128, 49, 43, 46, 1518, 46, 1518, '3', 1, '0000-00-00'),
(129, 49, 8, 33, 1089, 33, 1089, '3', 1, '0000-00-00'),
(130, 50, 9, 34, 1122, 34, 1122, '30', 1, '0000-00-00'),
(131, 50, 19, 32, 1056, 32, 1056, '30', 1, '0000-00-00'),
(132, 50, 35, 40, 1320, 40, 1320, '30', 1, '0000-00-00'),
(133, 50, 36, 27, 891, 27, 891, '30', 1, '0000-00-00'),
(134, 50, 37, 46, 1518, 46, 1518, '30', 1, '0000-00-00'),
(135, 51, 44, 52, 1716, 52, 1716, '21', 1, '0000-00-00'),
(136, 51, 23, 51, 1530, 51, 1530, '3', 1, '0000-00-00'),
(137, 51, 24, 41, 1230, 41, 1230, '21', 1, '0000-00-00'),
(138, 51, 28, 43, 1290, 43, 1290, '3', 1, '0000-00-00'),
(139, 51, 45, 54, 1620, 54, 1620, '3', 1, '0000-00-00'),
(140, 51, 34, 56, 1680, 56, 1680, '3', 1, '0000-00-00'),
(141, 51, 42, 57, 1710, 57, 1710, '3', 1, '0000-00-00'),
(142, 51, 29, 60, 1980, 60, 1980, '3', 1, '0000-00-00'),
(143, 52, 37, 30, 990, 30, 990, '30', 1, '0000-00-00'),
(144, 53, 13, 107, 3531, 107, 3531, '1', 1, '0000-00-00'),
(146, 54, 11, 61, 2000, 0, 0, '3', 0, '2022-08-29'),
(147, 56, 11, 607, 20000, 0, 0, '43', 0, '2022-09-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id_stock` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `box` int(11) NOT NULL,
  `berat_total` float NOT NULL,
  `keterangan_stock` varchar(50) NOT NULL,
  `lokasi_stock` varchar(20) NOT NULL,
  `safetystock` float NOT NULL,
  `rop` float NOT NULL,
  `status_pengadaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock_barang`
--

INSERT INTO `stock_barang` (`id_stock`, `id_barang`, `box`, `berat_total`, `keterangan_stock`, `lokasi_stock`, `safetystock`, `rop`, `status_pengadaan`) VALUES
(14, 10, 196, 6272, '', '', 631.662, 5751.66, 0),
(15, 11, 89, 2937, '', '', 777.317, 5727.32, 0),
(16, 12, 259, 8547, '', '', 382.956, 3352.96, 0),
(17, 13, 89, 2937, '', '', 3344.1, 8954.1, 0),
(18, 14, 158, 5056, '', '', 323.737, 4547.74, 0),
(19, 15, 151, 4983, '', '', 246.207, 4173.21, 0),
(20, 16, 123, 3936, '', '', 113.45, 2289.45, 0),
(21, 17, 131, 4192, '', '', 238.746, 4430.75, 0),
(22, 18, 92, 3036, '', '', 116.995, 2262, 1),
(23, 20, 139, 4587, '', '', 221.1, 3719.1, 0),
(24, 21, 137, 4521, '', '', 176.88, 2816.88, 0),
(25, 22, 148, 4884, '', '', 289.97, 4084.97, 0),
(26, 25, 130, 4290, '', '', 202.641, 3172.64, 0),
(27, 26, 130, 4290, '', '', 221.1, 3719.1, 1),
(28, 27, 132, 4356, '', '', 574.86, 5161.86, 1),
(29, 30, 94, 3008, '', '', 594.163, 5010.16, 1),
(30, 31, 149, 4917, '', '', 192.751, 2007.75, 0),
(31, 32, 130, 4160, '', '', 422.319, 4614.32, 1),
(32, 33, 108, 3564, '', '', 459.548, 3726.55, 1),
(33, 38, 124, 4092, '', '', 498.334, 4392.33, 0),
(34, 39, 167, 5511, '', '', 498.334, 4491.33, 0),
(35, 40, 3, 1500, '', '', 670, 3170, 0),
(36, 41, 3, 1560, '', '', 0, 3120, 0),
(37, 43, 60, 1980, '', '', 461.67, 4388.67, 1),
(38, 8, 70, 2310, '', '', 165.456, 2409.46, 0),
(39, 9, 67, 2211, '', '', 165.456, 2475.46, 0),
(40, 19, 65, 2145, '', '', 201.027, 2401.03, 0),
(41, 35, 84, 2772, '', '', 201.027, 2929.03, 0),
(42, 36, 57, 1881, '', '', 165.456, 2013.46, 0),
(43, 37, 90, 2970, '', '', 711.195, 3527.2, 0),
(44, 44, 93, 3069, '', '', 469.371, 3395.37, 0),
(45, 23, 51, 1530, '', '', 281.4, 1601.4, 1),
(46, 24, 42, 1260, '', '', 242.314, 1282.31, 1),
(47, 45, 60, 1800, '', '', 282.356, 1682.36, 0),
(48, 28, 44, 1320, '', '', 242.314, 1342.31, 1),
(49, 34, 50, 1500, '', '', 303.503, 1743.5, 1),
(50, 42, 63, 1890, '', '', 315.061, 1794.39, 1),
(51, 29, 196, 6468, '', '', 397.98, 2080.98, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_detail`
--

CREATE TABLE `stock_detail` (
  `id_stock_detail` int(11) NOT NULL,
  `id_stock` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `berat_detail` float NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stock_detail`
--

INSERT INTO `stock_detail` (`id_stock_detail`, `id_stock`, `tgl_masuk`, `berat_detail`, `posisi`) VALUES
(52, 14, '2021-08-26', 2944, 'B5'),
(53, 15, '2021-08-26', 297, 'A2'),
(54, 16, '2021-08-26', 4026, 'A9'),
(56, 17, '2021-08-26', 1444, 'C3'),
(57, 19, '2021-08-26', 2343, 'B7'),
(58, 20, '2021-08-26', 1856, 'C5-C6'),
(59, 21, '2021-08-25', 1952, 'C7'),
(60, 22, '2021-08-26', 1815, 'C1'),
(61, 23, '2021-08-26', 2145, 'D7'),
(62, 24, '2021-08-26', 2145, 'D5'),
(63, 25, '2021-08-25', 1815, 'D1'),
(64, 26, '2021-08-25', 2013, 'C9'),
(65, 27, '2021-08-25', 2013, 'D3'),
(66, 28, '2021-08-25', 2046, 'E1'),
(67, 30, '2021-08-26', 2310, 'E7'),
(68, 32, '2021-08-26', 1419, 'A5'),
(69, 33, '2021-08-26', 1914, 'A3'),
(70, 34, '2021-08-25', 1716, 'A1'),
(71, 35, '2021-08-26', 500, 'M1'),
(72, 36, '2021-08-25', 520, 'N1'),
(73, 37, '2021-08-26', 924, 'A7'),
(74, 38, '2021-08-26', 1122, 'F10'),
(75, 39, '2021-08-26', 1023, 'F11'),
(76, 43, '2021-08-26', 891, 'F2'),
(77, 14, '2021-09-01', 1952, 'B6'),
(78, 15, '2021-09-01', 1551, 'A2'),
(79, 16, '2021-09-01', 1254, 'A10'),
(80, 17, '2021-09-01', 825, 'B1'),
(81, 18, '2021-08-29', 1568, 'C3-C4'),
(82, 19, '2021-08-29', 1551, 'B7-B8'),
(83, 20, '2021-08-29', 1216, 'C6'),
(84, 21, '2021-08-29', 1312, 'C7'),
(85, 22, '2021-08-29', 1221, 'C1'),
(86, 23, '2021-08-29', 1419, 'D7-D8'),
(87, 24, '2021-08-29', 1386, 'D6'),
(88, 25, '2021-08-28', 1221, 'D1-D2'),
(89, 26, '2021-08-28', 1320, 'C9'),
(90, 27, '2021-08-28', 1320, 'D3'),
(91, 28, '2021-08-28', 1353, 'E1'),
(92, 29, '2021-08-28', 928, 'E3'),
(93, 30, '2021-08-29', 1518, 'E7-E8'),
(94, 31, '2021-08-29', 1280, 'E5'),
(95, 32, '2021-08-29', 924, 'A5'),
(96, 33, '2021-08-29', 1287, 'A3'),
(97, 34, '2021-08-28', 1122, 'A1'),
(98, 35, '2021-08-29', 500, 'M1'),
(99, 36, '2021-08-28', 520, 'N1'),
(100, 37, '2021-08-29', 627, 'A7'),
(101, 38, '2021-08-29', 759, 'F10'),
(102, 39, '2021-08-28', 693, 'F11'),
(103, 40, '2021-08-28', 957, 'F14'),
(104, 41, '2021-08-29', 1188, 'F4'),
(105, 42, '2021-08-29', 1221, 'F6'),
(106, 43, '2021-08-29', 1221, 'F2'),
(107, 44, '2021-08-29', 1254, 'F8'),
(108, 45, '2021-08-29', 780, 'J1'),
(109, 46, '2021-08-30', 870, ''),
(110, 48, '2021-08-30', 540, 'L1'),
(111, 47, '2021-08-30', 660, 'G1'),
(112, 49, '2021-08-30', 780, 'H1'),
(113, 50, '2021-08-30', 930, 'I1'),
(114, 51, '2021-08-30', 891, 'E9'),
(115, 14, '2021-09-01', 1376, 'B6'),
(116, 15, '2021-09-01', 1089, 'A2'),
(117, 16, '2021-09-01', 891, 'A10'),
(118, 19, '2021-09-01', 1089, 'B8'),
(119, 20, '2021-09-01', 864, 'C6'),
(120, 21, '2021-08-31', 928, 'C8'),
(121, 17, '2021-09-01', 561, 'B2'),
(122, 18, '2021-09-01', 1120, 'C4'),
(123, 34, '2021-09-01', 858, 'A2'),
(124, 23, '2021-09-01', 1023, 'D8'),
(125, 24, '2021-09-01', 990, ''),
(126, 25, '2021-08-31', 1848, 'D2'),
(127, 26, '2021-08-31', 957, 'D9'),
(128, 27, '2021-08-31', 957, 'D4'),
(129, 28, '2021-08-31', 957, 'E2'),
(130, 29, '2021-08-31', 2080, 'E3'),
(131, 30, '2021-09-01', 1089, 'E8'),
(132, 31, '2021-09-01', 2880, 'E5-E6'),
(133, 32, '2021-09-01', 1221, 'A5-A6'),
(134, 33, '2021-09-01', 891, 'A4'),
(135, 34, '2021-08-31', 1815, 'A2'),
(136, 35, '2021-09-01', 500, 'M1'),
(137, 36, '2021-08-31', 520, 'N1'),
(138, 37, '2021-09-01', 429, 'A7'),
(139, 38, '2021-09-01', 429, 'F10'),
(140, 39, '2021-08-30', 495, 'F11'),
(141, 40, '2021-08-30', 1188, ''),
(142, 41, '2021-08-31', 1584, 'F4'),
(143, 42, '2021-08-31', 660, 'F6'),
(144, 43, '2021-08-31', 858, 'F2'),
(145, 44, '2021-08-31', 1815, 'F8'),
(146, 45, '2021-08-31', 750, 'J1'),
(147, 46, '2021-09-02', 390, ''),
(148, 48, '2021-09-02', 780, 'L1'),
(149, 47, '2021-09-02', 1140, 'G1'),
(150, 49, '2021-09-02', 720, 'H1'),
(151, 50, '2021-09-02', 960, 'I1'),
(152, 51, '2021-09-02', 1122, 'E9'),
(153, 17, '2021-09-07', 3861, 'B2'),
(154, 16, '2021-09-04', 4500, 'B9'),
(155, 51, '2022-09-04', 4455, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) UNSIGNED NOT NULL,
  `nama_supir` varchar(255) NOT NULL,
  `telp_supir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nama_supir`, `telp_supir`) VALUES
(1, 'Elon Waluyo ', '0283 3522 0406'),
(2, 'Lutfan Galar Ramadan', '0824 4830 1233'),
(3, 'Adika Jefri Waskita', '0858 1338 9399'),
(4, 'Caket Narpati', '0821 4161 0681'),
(13, 'Wahyu Nashiruddin', '0894 2318 9083'),
(14, 'Udin Edwin\r\n', '0858 3329 8123'),
(15, 'Upar Wiryansyah\r\n', '0891 1239 8367'),
(16, 'Deri Sulistyo', '0873 0323 2133');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `singkatan` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lead_time` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `singkatan`, `telp`, `alamat`, `lead_time`) VALUES
(5, 'Asia Pasific Fiber', 'APF', '(+62) 228888636', 'Jl Oma Anggawisastra No 292, Semarang, Jawa Barat, Indonesia', 3),
(6, 'CV Tekad Jaya\r\n', 'CTJ', '(+62) 822459050', 'Jalan Kedungdoro 92F, Solo, Jawa Timur, Indonesia\n', 2),
(7, 'UD. Sumber Sejati Jaya\r\n', 'SDJ', '021 2902 4788', 'Komplek Pergudangan Pantai Indah Dadap Blok HB 15 JL Raya Perancis No 2 Dadap , Kota Tangerang, Banten, Indonesia\r\n', 1),
(8, 'PT SURTA KARYA SAMPOERNA\r\n', 'SKS', '(022)5432885', 'KOPO PERMAI BLOK 52A NO.9 BANDUNG 40226, Jawa Barat Indonesia, Bandung, Jawa Barat, Indonesia\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_grade`
--
ALTER TABLE `barang_grade`
  ADD PRIMARY KEY (`id_barang_grade`);

--
-- Indeks untuk tabel `barang_jenis`
--
ALTER TABLE `barang_jenis`
  ADD PRIMARY KEY (`id_barang_jenis`);

--
-- Indeks untuk tabel `barang_keterangan`
--
ALTER TABLE `barang_keterangan`
  ADD PRIMARY KEY (`id_barang_keterangan`);

--
-- Indeks untuk tabel `barang_lot`
--
ALTER TABLE `barang_lot`
  ADD PRIMARY KEY (`id_barang_lot`);

--
-- Indeks untuk tabel `barang_ukuran`
--
ALTER TABLE `barang_ukuran`
  ADD PRIMARY KEY (`id_barang_ukuran`);

--
-- Indeks untuk tabel `bpb`
--
ALTER TABLE `bpb`
  ADD PRIMARY KEY (`id_bpb`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`id_customer_detail`);

--
-- Indeks untuk tabel `do`
--
ALTER TABLE `do`
  ADD PRIMARY KEY (`id_do`),
  ADD KEY `no_so` (`id_so`),
  ADD KEY `no_po` (`no_po`),
  ADD KEY `id_supir` (`id_supir`),
  ADD KEY `id_mobil` (`id_kendaraan`);

--
-- Indeks untuk tabel `do_detail`
--
ALTER TABLE `do_detail`
  ADD PRIMARY KEY (`id_do_detail`),
  ADD KEY `id_do` (`id_do`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`id_penyimpanan`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`);

--
-- Indeks untuk tabel `po_detail`
--
ALTER TABLE `po_detail`
  ADD PRIMARY KEY (`id_po_detail`);

--
-- Indeks untuk tabel `schedule_penerimaan`
--
ALTER TABLE `schedule_penerimaan`
  ADD PRIMARY KEY (`id_schedule_penerimaan`);

--
-- Indeks untuk tabel `schedule_pengeluaran`
--
ALTER TABLE `schedule_pengeluaran`
  ADD PRIMARY KEY (`id_schedule_pengeluaran`);

--
-- Indeks untuk tabel `so`
--
ALTER TABLE `so`
  ADD PRIMARY KEY (`id_so`);

--
-- Indeks untuk tabel `so_detail`
--
ALTER TABLE `so_detail`
  ADD PRIMARY KEY (`id_so_detail`);

--
-- Indeks untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `stock_detail`
--
ALTER TABLE `stock_detail`
  ADD PRIMARY KEY (`id_stock_detail`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `barang_grade`
--
ALTER TABLE `barang_grade`
  MODIFY `id_barang_grade` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `barang_jenis`
--
ALTER TABLE `barang_jenis`
  MODIFY `id_barang_jenis` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `barang_keterangan`
--
ALTER TABLE `barang_keterangan`
  MODIFY `id_barang_keterangan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `barang_lot`
--
ALTER TABLE `barang_lot`
  MODIFY `id_barang_lot` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `barang_ukuran`
--
ALTER TABLE `barang_ukuran`
  MODIFY `id_barang_ukuran` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `bpb`
--
ALTER TABLE `bpb`
  MODIFY `id_bpb` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `id_customer_detail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `do`
--
ALTER TABLE `do`
  MODIFY `id_do` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `do_detail`
--
ALTER TABLE `do_detail`
  MODIFY `id_do_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `id_penyimpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `po`
--
ALTER TABLE `po`
  MODIFY `id_po` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `po_detail`
--
ALTER TABLE `po_detail`
  MODIFY `id_po_detail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `schedule_penerimaan`
--
ALTER TABLE `schedule_penerimaan`
  MODIFY `id_schedule_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `schedule_pengeluaran`
--
ALTER TABLE `schedule_pengeluaran`
  MODIFY `id_schedule_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `so`
--
ALTER TABLE `so`
  MODIFY `id_so` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `so_detail`
--
ALTER TABLE `so_detail`
  MODIFY `id_so_detail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `id_stock_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT untuk tabel `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 01:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `baca`
--

CREATE TABLE `baca` (
  `id_baca` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_baca` varchar(50) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_baca` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baca`
--

INSERT INTO `baca` (`id_baca`, `id_user`, `nama_baca`, `id_buku`, `tgl_baca`) VALUES
(1, NULL, 'andi', 5, '2022-07-31 01:46:37'),
(2, NULL, 'andi', 3, '2022-07-31 02:22:39'),
(3, NULL, 'andi', 3, '2022-07-31 06:12:46'),
(4, NULL, 'andi', 3, '2021-07-31 06:46:34'),
(5, NULL, 'andi', 3, '2021-07-31 06:47:22'),
(6, NULL, 'andi', 3, '2023-07-31 06:48:25'),
(7, NULL, 'andi', 3, '2023-07-31 06:51:35'),
(8, NULL, 'andi', 3, '2023-07-31 06:54:10'),
(9, NULL, 'andi', 3, '2023-07-31 07:08:24'),
(10, NULL, 'jamal', 3, '2023-05-31 07:23:52'),
(11, NULL, 'jamal', 3, '2023-05-31 07:51:08'),
(12, 6, 'Jaka', 3, '2023-08-11 03:00:07'),
(13, 6, 'Jaka', 5, '2023-08-11 02:59:54'),
(14, NULL, 'andri', 5, '2023-08-29 03:24:52'),
(15, NULL, 'andri', 4, '2023-08-29 03:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `no_buku` varchar(50) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `sampul` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `no_buku`, `judul`, `pengarang`, `penerbit`, `isbn`, `sampul`, `file`, `stok`, `status`) VALUES
(3, 'AFDS981', 'Komik', 'Naruto', 'Sasuke', 'ASN124JSL', 'cat-3.jpg', 'cerita_rakyat.pdf', 1, 1),
(4, 'ASE9819NA', 'Senibudaya', 'jesica', 'Sundar', 'ISN9812AZJ', '01e473522a5e61c5b281646d61562ac4.jpg', 'prog_web.pdf', 0, 1),
(5, 'ASE9819NS', 'sejarah indonesia', 'martin', 'Media Patner', 'ASND9128NA', '5f6aba91c76bb.jpg', 'prog_web2.pdf', 7, 1),
(7, 'ASE9819NAS', 'Bahasa Indonesia', 'Supriadi', 'pustaka buku', 'ASND9128NAS', '24.jpg', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pengembalian` varchar(50) DEFAULT NULL,
  `jml_pembayaran` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_pembayaran`, `id_pengembalian`, `jml_pembayaran`) VALUES
(1, '20230811J3JBIXSH', 0),
(2, '20231030IHGHLZCB', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_buku` varchar(50) DEFAULT NULL,
  `nama_peminjam` varchar(50) DEFAULT NULL,
  `tgl_peminjaman` datetime NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `jml_pinjam` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman`, `id_user`, `no_buku`, `nama_peminjam`, `tgl_peminjaman`, `tgl_pengembalian`, `jml_pinjam`, `status`) VALUES
(1, 6, 'ASE9819NS', 'jaka', '2023-08-09 09:00:00', '2023-08-17', 1, 2),
(2, 5, 'AFDS981', 'jaka', '2023-08-10 13:00:00', '2023-08-17', 1, 1),
(3, 7, 'AFDS981', 'Jaka', '2023-08-11 05:36:16', '2023-08-18', 1, 1),
(4, 6, 'AFDS981', 'Jaka', '2023-08-13 14:49:53', '2023-08-20', 1, 1),
(5, NULL, 'ASE9819NAS', 'andri', '2023-08-29 05:25:32', '2023-09-05', 1, 2),
(6, 6, 'ASE9819NS', 'Jaka', '2023-10-30 04:07:06', '2023-11-06', 1, 1);

--
-- Triggers `peminjaman_buku`
--
DELIMITER $$
CREATE TRIGGER `pengurangan jumlah buku` AFTER INSERT ON `peminjaman_buku` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok-NEW.jml_pinjam
WHERE no_buku = NEW.no_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_pengembalian` varchar(50) NOT NULL,
  `no_buku` varchar(50) DEFAULT NULL,
  `id_peminjaman` int(11) DEFAULT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `jml_kembali` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_pengembalian`, `no_buku`, `id_peminjaman`, `tgl_pengembalian`, `jml_kembali`, `status`) VALUES
('20230811J3JBIXSH', 'ASE9819NS', 1, '2023-08-11 08:13:45', 1, '1'),
('20231030IHGHLZCB', 'ASE9819NAS', 5, '2023-10-30 04:07:55', 1, '1');

--
-- Triggers `pengembalian_buku`
--
DELIMITER $$
CREATE TRIGGER `penambahan stok buku` AFTER INSERT ON `pengembalian_buku` FOR EACH ROW BEGIN
UPDATE buku SET stok = stok+NEW.jml_kembali
WHERE no_buku = NEW.no_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `isi1` varchar(50) DEFAULT NULL,
  `isi2` varchar(50) DEFAULT NULL,
  `isi3` varchar(50) DEFAULT NULL,
  `isi4` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `isi1`, `isi2`, `isi3`, `isi4`) VALUES
(1, 'apakah anda merasa bahwa perpustakaan ini selalu rapi dan teratur ?', 'sangat baik', 'baik', 'cukup', 'buruk'),
(2, 'apakah anda merasa bahwa staff perpustakaan selalu berprilaku rapi dan sopan ?', 'sangat baik', 'baik', 'cukup', 'buruk'),
(3, 'seberapa puas anda dengan tingkat kebersihan di perpustakaan umum, termasuk kebersihan kursi, meja belajar, lemari koleksi buku, lantai dll ?', 'sangat baik', 'baik', 'cukup', 'buruk'),
(4, 'seberapa baik perpustakaan ini menjaga kebersihan buku dan materi pustaka ?', 'sangat baik', 'baik', 'cukup', 'buruk');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `id_pengembalian` varchar(50) DEFAULT NULL,
  `p1` varchar(50) DEFAULT NULL,
  `p2` varchar(50) DEFAULT NULL,
  `p3` varchar(50) DEFAULT NULL,
  `p4` varchar(50) DEFAULT NULL,
  `rating` varchar(50) DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `status_saran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `id_pengembalian`, `p1`, `p2`, `p3`, `p4`, `rating`, `saran`, `status_saran`) VALUES
(1, '20230811J3JBIXSH', 'buruk', 'cukup', 'baik', 'sangat baik', '3', 'banyakin buku', 2),
(2, '20231030IHGHLZCB', 'sangat baik', 'buruk', 'baik', 'baik', '2', 'banyakin buku lagi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL,
  `usia` date DEFAULT NULL,
  `level_user` int(11) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `alamat`, `no_hp`, `jenis_kelamin`, `usia`, `level_user`, `foto`) VALUES
(1, 'jesica', 'staff11', 'admin', 'kuningan', '089121212121', NULL, NULL, 2, NULL),
(2, 'daniel', 'staff', 'staff', 'kuningan', '089121212121', NULL, NULL, 2, NULL),
(3, 'martin', 'perpus', 'perpus', 'kuningan', '089121212121', NULL, NULL, 3, NULL),
(4, 'M.FAIZAKHMALUDIN', 'faiz', '12341234', 'DESA GANDASALI RT 08 RW 02 KEC.KRAMATMULYA KAB.KUNINGAN', '089121212121', 'perempuan', '2023-03-28', 4, '15.png'),
(5, 'ROBI ISKANDAR', 'ROBI', '12341234', 'DUSUN WAGE RT/RW 016/004', '089121212121', 'laki-laki', '2023-03-30', 6, NULL),
(6, 'ILAH NURLAELAH S.Pd, M.Si', 'ILAH', '12341234', 'Dsn Manis rt02 RW 01 desa gunungkeling kec. Cigugur', '089121212121', 'laki-laki', '2023-04-05', 5, '15.png'),
(7, 'ANDA SUANDA', 'ANDA', '12341234', 'LINGK. CIARJA BLOK BOUGENVILE 1 RT/RW 17/03 CIPORANG', '089121212121', 'laki-laki', '2023-04-06', 6, NULL),
(8, 'ONI SHARONI', 'ONI', '12341234', 'DESA BOJONG KE. KRAMATMULYA RT02 RW 01', '089121212121', 'perempuan', '2023-04-06', 6, NULL),
(9, 'HASNA AISYAH PUTRI', 'HASNA', '12341234', 'DUSUN PUHUN DESA KADUAGUNG KEC.SINDANGAGUNG KUNINGAN', '089121212121', 'perempuan', '2023-04-06', 2, NULL),
(10, 'DINDA MAHARANI', 'DINDA', '12341234', 'JL.PUSPALUBIS RT/RW 05/07 SAWAHWARU', '089121212121', 'laki-laki', '2023-04-06', 6, ''),
(11, 'DANDY MAULANA SAPUTRA', 'DANDY', '12341234', 'LINGK.LAMEPAYUNG KARANGASEM RT/RW 04/08 KUNINGAN', '089121212121', 'laki-laki', '2023-04-06', 6, ''),
(12, 'YANA SURYANA', 'YANA', '12341234', 'DUSUN KLIWON RT/RW 06/03 SUKAMULYA GARAWANGI', '089121212121', 'laki-laki', '2023-04-06', 6, ''),
(13, 'CECEP DURAHIM', 'CECEP', '12341234', 'DUSUN 03 RT/RW 16/03 KEL.JALAKSANA KEC.JALAKSANA', '089121212121', 'perempuan', '2023-04-07', 6, ''),
(14, 'INTAN DITA PRATIWI', 'INTAN', '12341234', 'DUSUN MANIS RT/RW 04/01 DESA CIHERANG KEC.KADUGEDE', '089121212121', 'perempuan', '2023-04-07', 6, ''),
(15, 'NABINTANG N.A.Z', 'NABINTANG', '12341234', 'JLN.OTISTA CIGODEG BARU RT/RW 07/06', '089121212121', 'laki-laki', '2023-04-08', 6, ''),
(16, 'GHAILYNA NAFISAH RAHMAN', 'GHAILYNA', '12341234', 'Jl. Pramauka Gg. Cempaka Rt 04 Rw 02', '089121212121', 'laki-laki', '2023-04-11', 6, ''),
(17, 'ANI SITI NURJANAH', 'ANI', '12341234', 'DESA LENGKONG KEC. GARAWANGI RT 04 RW 02', '089121212121', 'laki-laki', '2023-04-11', 6, ''),
(18, 'WAWAN SETIAWAN', 'WAWAN', '12341234', 'BTN Kasturi Perdana RT 021 RW 004 Desa Kasturi Kec. Kuningan', '089121212121', 'perempuan', '2023-04-12', 6, ''),
(19, 'ERIN VIJIANSYAH', 'ERIN', '12341234', 'JL.IR.H..JJUANDA RT 06 RW 02 LEBAK KARDIN KEL. PURWAWINANGUN KEC. KUNINGAN', '089121212121', 'perempuan', '2023-04-13', 6, ''),
(20, 'Muhammad Nizar Malik', 'Muhammad', '12341234', 'Jl desa cirahayu, samping Masjid Darussalam, belakang puskesmas desa, Luragung, Kuningan', '089121212121', 'laki-laki', '2023-04-18', 6, ''),
(21, 'VITA NOVITA', 'VITA', '12341234', 'BLOK KAPLING RT 04 RW 02 DESA KLANGENAN CIREBON', '089121212121', 'laki-laki', '2023-04-18', 6, ''),
(22, 'SURYA RAMADHAN', 'SURYA', '12341234', 'Dusun Wage RT 02 RW 04 Desa Cipancur Kec. Kalimanggis', '089121212121', 'laki-laki', '2023-04-18', 6, ''),
(23, 'LIDYA AISMALA ASRI', 'LIDYA', '12341234', 'DUSUN WAGE RT 09 RW 04 DESA GUNUNGKELING KEC. CIGUGUR', '089121212121', 'perempuan', '2023-04-18', 6, ''),
(24, 'ANATASHYA MAHARANI UTAMI', 'ANATASHYA', '12341234', 'LINK CIGINTUNG RT03 RW01', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(25, 'FHANIA SUSANTI', 'FHANIA', '12341234', 'JL RAYA CIRENDANG RT020 RW02 LINK CILAME', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(26, 'ZAHARA PUTRI MEILANI', 'ZAHARA', '12341234', 'ALAM ASRI. JL JATI N0 3 BLOK B RT27 RW 7', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(27, 'KAYLA SHIVA', 'KAYLA', '12341234', 'PURWAWINANGUN GG PERHUTANI', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(28, 'NADA PUJA MAHARANI', 'NADA', '12341234', 'PURWAWINANGUN', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(29, 'Yaman', 'Yaman', '12341234', 'KUNINGAN JAWA BARAT SIDAPURNA RT 7 RW08', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(30, 'Marsel Gunawan', 'Marsel', '12341234', 'Karang asem', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(31, 'Bintang Oeyna', 'Bintang', '12341234', 'Cijoho Jl Siliwangi 306 Rt5Rw5', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(32, 'MARTHALIA', 'MARTHALIA', '12341234', 'PURWAWINANGUN', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(33, 'Ihsan Maulana', 'Ihsan', '12341234', 'Awirarangan', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(34, 'khaila oktaviarani', 'khaila', '12341234', 'lamepayung', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(35, 'tasya', 'tasya', '12341234', 'purwawinangun', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(36, 'BANG BANG DENTA', 'BANG', '12341234', 'karang asem', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(37, 'Muhammad Teguh Pribadi', 'Muhammad', '12341234', 'Pesona Mutiara Kasturi B5/24', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(38, 'Kindi naufal alfaridzi', 'Kindi', '12341234', 'Jln.ir hj juanda RT2/RW8 lamepayung kuningan (belakang yamsik no 50)', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(39, 'ARIEL', 'ARIEL', '12341234', 'PURWAWINANGUN', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(40, 'Bintang Dharma Wiratama', 'Bintang', '12341234', 'sukamulya,cigugur,kuningan,jawa barat', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(41, 'Rissa nur fauziah', 'Rissa', '12341234', 'Awirarangan', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(42, 'zahra aulia yurzaq', 'zahra', '12341234', 'jln.ir.h.juanda gang cemara rt 04 rw 04 awirarangan', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(43, 'M.dzaki', 'M.dzaki', '12341234', 'Bojong serang RT 05 RW 01', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(44, 'JILAN RANIYA HIDAYAT', 'JILAN', '12341234', 'ling cisampih 01/04 winduhaji,jawa barat,kab.kuningan', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(45, 'M. deka', 'M.', '12341234', 'jalan ir h. juanda gang cemara rt 01/04 ling eyang weri kel awirarangan', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(46, 'Mega Apriliani', 'Mega', '12341234', 'Bojong serang awirarangan', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(47, 'ALVIN', 'ALVIN', '12341234', 'PERUMAHAN KASTURI', '089121212121', 'laki-laki', '2024-03-08', 6, ''),
(48, 'Haykal Ferdiansyah', 'Haykal', '12341234', 'Awirarangan', '089121212121', 'perempuan', '2024-03-08', 6, ''),
(49, 'WINDI MAHARANI', 'WINDI', '12341234', 'JL CIGUGUR / JL MOERTASIAH SOEPOMO', '089121212121', 'perempuan', '2024-03-09', 6, ''),
(50, 'Fauziah Retno H.', 'Fauziah', '12341234', 'Dusun Kliwon RT/RW 006/002 Kec Nusaherang', '089121212121', 'laki-laki', '2024-03-09', 6, ''),
(51, 'SALSABILA', 'SALSABILA', '12341234', 'Desa Kasturi RT.06 RW 03', '089121212121', 'laki-laki', '2024-03-09', 6, ''),
(52, 'EGI ANEU WIDIANI', 'EGI', '12341234', 'Desa Gewok RT.012 RW.003 Kec.Garawangi', '089121212121', 'laki-laki', '2024-03-09', 6, ''),
(53, 'Pegi Yulandari', 'Pegi', '12341234', 'Desa Sukamukti Kec.Jalaksana Kab.Kuningan', '089121212121', 'perempuan', '2024-03-09', 6, ''),
(54, 'WAFA SITI NURFADILAH', 'WAFA', '12341234', 'DUSUN DUA DESA CIKETAK KEC KADUGEDE', '089121212121', 'perempuan', '2024-03-09', 6, ''),
(55, 'INDAH AULIA PUTRI', 'INDAH', '12341234', 'Desa Bandorasa Kulon', '089121212121', 'laki-laki', '2024-03-10', 6, ''),
(56, 'INTAN NUR AISYAH', 'INTAN', '12341234', 'Desa Tundagan RT.002 RW.001 Kec.Hantara', '089121212121', 'laki-laki', '2024-03-10', 6, ''),
(57, 'NOK MAMAH', 'NOK', '12341234', 'Awirarangan Rt 1/ Rw 3 Kuningan', '089121212121', 'laki-laki', '2024-03-13', 6, ''),
(58, 'NOK MAMAH', 'NOK', '12341234', 'Awirarangan Rt 1/ Rw 3 Kuningan', '089121212121', 'perempuan', '2024-03-13', 6, ''),
(59, 'ALYA APRIANI', 'ALYA', '12341234', 'lingk. serang 005/001 kelurahan awirarangan kecamatan kuningan', '089121212121', 'perempuan', '2024-03-13', 6, ''),
(60, 'EUIS RAHMAWATI R', 'EUIS', '12341234', 'Desa Sadamantra RT.005 RW.002 Kec.Jalaksana', '089121212121', 'laki-laki', '2024-03-14', 6, ''),
(61, 'MUHAMMAD ABDULOH AR', 'MUHAMMAD', '12341234', 'Desa Sadamantra RT.005 RW.002 Kec.Jalaksana', '089121212121', 'laki-laki', '2024-03-14', 6, ''),
(62, 'Michael FH', 'Michael', '12341234', 'DUSUN IV RT016 RW04 DESA BENDUNGAN KECAMATAN LEBAKWANGI', '089121212121', 'laki-laki', '2024-03-14', 6, ''),
(63, 'ANDIYANI TAKHSYA PRATIWI', 'ANDIYANI', '12341234', 'DESA GARAJATI-CIWARU', '089121212121', 'perempuan', '2024-03-16', 6, ''),
(64, 'IRNA SABILILLAH', 'IRNA', '12341234', 'DUSUN TARIKOLOT RT/RW 013/007 DESA CIBUNTU KECAMATAN CIGANDAMEKAR', '089121212121', 'perempuan', '2024-03-16', 6, ''),
(65, 'MUTIARA YULIANTI', 'MUTIARA', '12341234', 'DUSUN TARIKOLOT RT/RW 013/007 DESA CIBUNTU KECAMATAN CIGANDAMEKAR', '089121212121', 'laki-laki', '2024-03-16', 6, ''),
(66, 'ANDINI AULIA RAHMA', 'ANDINI', '12341234', 'DESA TARAJU KEC.SINDANGAGUNG', '089121212121', 'laki-laki', '2024-03-17', 6, ''),
(67, 'DEA CAHAYA RAMDONA', 'DEA', '12341234', 'Sindangagung, Kuningan', '089121212121', 'laki-laki', '2024-03-21', 6, ''),
(68, 'AJENG RIDHA SUCI', 'AJENG', '12341234', 'Perumnas Ciporang Jln Nusa Indah 3 No 45', '089121212121', 'perempuan', '2024-03-24', 6, ''),
(69, 'IWAN SETIAWAN', 'IWAN', '12341234', 'Dusun Manis RT/RW 008/00 Desa Cikeleng', '089121212121', 'perempuan', '2024-03-24', 6, ''),
(70, 'IRFAN DWI CAHYA', 'IRFAN', '12341234', 'DUSUN WAGE,DESA SINDANGSARI,KEC SINDANGAGUNG', '089121212121', 'laki-laki', '2024-03-27', 6, ''),
(71, 'ANNISA', 'ANNISA', '12341234', 'Cikopo Rt 13 Rw 05 Cibinuang', '089121212121', 'laki-laki', '2024-03-28', 6, ''),
(72, 'ISAH NUR AISYAH', 'ISAH', '12341234', 'Jl. Pramuka RT/RW 02/01 Ling. Pahing, Purwawinangun', '089121212121', 'laki-laki', '2024-03-30', 6, ''),
(73, 'M. RANGGA JAYA SAPUTRA', 'M.', '12341234', 'LING. GIBUG RT/RW 30/07 CIGADUNG', '089121212121', 'perempuan', '2024-03-30', 6, ''),
(74, 'AHMAD MUSTOFA AL BAQI', 'AHMAD', '12341234', 'RT 013/RW 003, DESA CIKELENG KECAMATAN JAPARA', '089121212121', 'perempuan', '2024-03-31', 6, ''),
(75, 'KEYSSA SALSABILA DWINTARI', 'KEYSSA', '12341234', 'JL SILIWANGI NO 74', '089121212121', 'laki-laki', '2024-03-31', 6, ''),
(76, 'MELANI PUTRI', 'MELANI', '12341234', 'Link. Perum Korpri Rt 017 Rw 006 Cigintung Kuningan Jawa Barat', '089121212121', 'laki-laki', '2024-04-03', 6, ''),
(77, 'BALQIS AULIA RAHMAT ZIRZIS', 'BALQIS', '12341234', 'DS. Sadamantra Kec. Jalaksana', '089121212121', 'laki-laki', '2024-04-04', 6, ''),
(78, 'ZEVANNA KHRISNA DEANTY', 'ZEVANNA', '12341234', 'Ds. Tanjungkarta Kec. Karangkancana', '089121212121', 'perempuan', '2024-04-04', 6, ''),
(79, 'RINI NURHAENI', 'RINI', '12341234', 'Ds. Citundun Kec. Ciwaru', '089121212121', 'perempuan', '2024-04-04', 6, ''),
(80, 'IMA SITI FATIMAH', 'IMA', '12341234', 'Komplek Cihaur Kel. Sukamenak Kec. Sukarame', '089121212121', 'laki-laki', '2024-04-04', 6, ''),
(81, 'NIDHA RAIHANI AULIA', 'NIDHA', '12341234', 'Link. Pahing Rt 007 Rw 002 Citangtu Kuningan', '089121212121', 'laki-laki', '2024-04-14', 6, ''),
(82, 'SRI NOVIYANTI FADILAH', 'SRI', '12341234', 'Jln Cikawung 2 RT 12 Rw 01 Cijoho Kuningan', '089121212121', 'laki-laki', '2024-04-14', 6, ''),
(83, 'LIA YULIANAWATI', 'LIA', '12341234', 'PERUM KASTURI II BLOK A3 NO. 73', '089121212121', 'perempuan', '2024-04-26', 6, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baca`
--
ALTER TABLE `baca`
  ADD PRIMARY KEY (`id_baca`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baca`
--
ALTER TABLE `baca`
  MODIFY `id_baca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

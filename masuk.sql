-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 03:26 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Lidia Rati Nduet', 'lidiarati', '5a39ba619439c95e4d925bec0a930dde', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `tgl_daftar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `nama`, `tgl_daftar`) VALUES
(1, 'rafirahman@gmail.com', 'b2f0d9e408eccecc0edb74d654d36a72', 'Muhammad Rafi Rahman Habibi2', 'Monday, 29-Nov-2021 05:17:07'),
(2, 'rahui@gmail.com', 'b2f0d9e408eccecc0edb74d654d36a72', 'Muhammad Rafi Rahman Habibi', 'Sunday, 05-Dec-2021 10:17:28'),
(3, 'ratinduet99@gmail.com', 'c885f6629596599e74d82ea3b5fdf234', 'rati', 'Thursday, 02-Jun-2022 15:04:14'),
(4, 'rival@gmail.com', 'bee50a640736422aa1d7037188b2acb8', 'Hilarius', 'Saturday, 04-Jun-2022 12:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal1`
--

CREATE TABLE `jadwal1` (
  `id_jadwal` int(11) NOT NULL,
  `sesi` varchar(200) NOT NULL,
  `antrian` varchar(200) NOT NULL,
  `tempat` varchar(222) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal1`
--

INSERT INTO `jadwal1` (`id_jadwal`, `sesi`, `antrian`, `tempat`, `jam`, `tanggal`) VALUES
(1, 'Sesi 1', '1 - 250', 'Borong', '08.00 WIB - 10.00 WIB', '23 Januari 2022'),
(2, 'Sesi 2', '251 - 500', 'Stadion Gajayana Malang', '10.00 WIB - 12.00 WIB', '21 Januari 2022'),
(3, '1', '1-300', 'Puskesmas Sita', '10:00 WIT - 12:00 WIT', '23 Junii 2022');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_vaksin`
--

CREATE TABLE `jenis_vaksin` (
  `id_jenis` int(11) NOT NULL,
  `jenis_vaksin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_vaksin`
--

INSERT INTO `jenis_vaksin` (`id_jenis`, `jenis_vaksin`) VALUES
(1, 'Moderna'),
(2, 'AstraZeneca');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'balita'),
(2, 'Ibu Hamil');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` char(20) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_daftar` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ke` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `tgl_lahir`, `kelamin`, `email`, `tgl_daftar`, `id_kategori`, `id_jenis`, `id_ke`, `alamat`) VALUES
(1, '12345', 'Rati Nduet', '2007-06-08', 'Laki-laki', 'ratinduet99@gmail.com', 'Friday, 03-Jun-2022 15:41:53', 1, 2, 1, 'Jl. Bromo2'),
(2, '53127346172819371', 'Hilarius', '2004-05-14', 'Perempuan', 'rival@gmail.com', 'Saturday, 04-Jun-2022 13:09:26', 1, 2, 1, 'jln simpang mega mendung');

-- --------------------------------------------------------

--
-- Table structure for table `tgl_vaksin`
--

CREATE TABLE `tgl_vaksin` (
  `id_tgl` int(11) NOT NULL,
  `tgl_vaksin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgl_vaksin`
--

INSERT INTO `tgl_vaksin` (`id_tgl`, `tgl_vaksin`) VALUES
(1, '2022-05-06'),
(2, '2022-07-15'),
(3, '2022-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin_ke`
--

CREATE TABLE `vaksin_ke` (
  `id_ke` int(11) NOT NULL,
  `vaksin_ke` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaksin_ke`
--

INSERT INTO `vaksin_ke` (`id_ke`, `vaksin_ke`) VALUES
(1, 'Tiga'),
(2, 'Dua');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `jadwal1`
--
ALTER TABLE `jadwal1`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenis_vaksin`
--
ALTER TABLE `jenis_vaksin`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD UNIQUE KEY `nis_2` (`nis`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `tgl_vaksin`
--
ALTER TABLE `tgl_vaksin`
  ADD PRIMARY KEY (`id_tgl`);

--
-- Indexes for table `vaksin_ke`
--
ALTER TABLE `vaksin_ke`
  ADD PRIMARY KEY (`id_ke`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal1`
--
ALTER TABLE `jadwal1`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_vaksin`
--
ALTER TABLE `jenis_vaksin`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tgl_vaksin`
--
ALTER TABLE `tgl_vaksin`
  MODIFY `id_tgl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaksin_ke`
--
ALTER TABLE `vaksin_ke`
  MODIFY `id_ke` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

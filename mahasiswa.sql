-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jul 2021 pada 15.34
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_matkul`
--

CREATE TABLE `daftar_matkul` (
  `nomeree` int(11) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `nama_matkul1` varchar(20) NOT NULL,
  `kode1` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_matkul`
--

INSERT INTO `daftar_matkul` (`nomeree`, `fakultas`, `nama_matkul1`, `kode1`) VALUES
(1, 'FTI', 'Teknologi Jaringan', '1A'),
(2, 'FTI', 'RSNA 1', '1E');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id1` int(12) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fakultas` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `semester` int(3) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id1`, `username`, `password`, `fakultas`, `nama`, `semester`, `tahun`) VALUES
(1, '002', '123789', 'Fakultas Teknologi Informasi ', 'Suprihadi', 3, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `Semester` int(11) NOT NULL,
  `Tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `sks`, `fakultas`, `nama`, `Semester`, `Tahun`) VALUES
(1, '672018296', '123456789', 19, 'Teknik Informatika', 'Yoel Chandra Eka Paksi', 3, 2021),
(2, '672018001', '123789', 12, 'Teknik Informatika', 'Amos Baruna', 3, 2021),
(3, '672018002', '2479', 7, 'Teknik Informatika', 'Paijo ', 3, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `kode` int(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kodematkul` varchar(50) NOT NULL,
  `Dosen` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `waktu1` int(11) NOT NULL,
  `waktu2` int(11) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `Tahun` varchar(11) NOT NULL,
  `share` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `banyak_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `matkul`, `kode`, `kelas`, `kodematkul`, `Dosen`, `hari`, `waktu1`, `waktu2`, `sks`, `semester`, `Tahun`, `share`, `prodi`, `fakultas`, `banyak_kelas`) VALUES
(1, 'Teknologi Jaringan', 1, 'A', '1A', 'Suprihadi', 'Senin', 9, 12, 6, '3', '2021', 'tidak', 'Teknik Informatika', 'FTI', '1'),
(2, 'Teknologi Jaringan', 1, 'A', '1A', 'Suprihadi', 'Kamis', 12, 13, 0, '3', '2021', 'tidak', 'Teknik Informatika', 'FTI', '2'),
(3, 'Pemrograman', 2, 'B', '1B', 'Paijo', 'Rabu', 12, 13, 3, '3', '2021', 'tidak ', 'Teknik Informatika', 'FTI ', '1'),
(4, 'ASD', 3, 'A', '1C', 'Hartanto', 'Rabu', 10, 11, 3, '3', '2021', 'tidak', 'Teknik Informatika', 'FTI', '1'),
(5, 'GIS', 4, 'A', '1D', 'Yoel', 'Jumat', 13, 14, 3, '3', '2021', 'ya', 'Sistem Informasi', 'FTI', '1'),
(6, 'RSNA 1', 5, 'A', '1E', 'Suprihadi', 'Rabu', 10, 13, 6, '1', '2021', 'ya', 'Teknik Informatika', 'FTI', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul_maha`
--

CREATE TABLE `matkul_maha` (
  `nomor` int(11) NOT NULL,
  `Nama_dosen` varchar(100) NOT NULL,
  `Matkul` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `waktu1` int(11) NOT NULL,
  `waktu2` int(11) NOT NULL,
  `nilai` varchar(2) NOT NULL,
  `sks` int(11) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `share` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `kode` int(50) NOT NULL,
  `banyak_kelas` varchar(11) NOT NULL,
  `nilai1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul_maha`
--

INSERT INTO `matkul_maha` (`nomor`, `Nama_dosen`, `Matkul`, `kelas`, `hari`, `waktu1`, `waktu2`, `nilai`, `sks`, `nama_mahasiswa`, `semester`, `tahun`, `prodi`, `share`, `fakultas`, `kode`, `banyak_kelas`, `nilai1`) VALUES
(131, 'Paijo', 'Pemrograman', 'B', 'Rabu', 12, 13, '0', 3, 'Amos Baruna', '3', '2021', 'Teknik Informatika', 'tidak ', 'FTI ', 2, '1', 0),
(132, 'Hartanto', 'ASD', 'A', 'Rabu', 10, 11, '0', 3, 'Amos Baruna', '3', '2021', 'Teknik Informatika', 'tidak', 'FTI', 3, '1', 0),
(154, 'Suprihadi', 'Teknologi Jaringan', 'A', 'Senin', 9, 12, 'A', 6, 'Amos Baruna', '3', '2021', 'Teknik Informatika', 'tidak', 'FTI', 1, '1', 4),
(155, 'Suprihadi', 'Teknologi Jaringan', 'A', 'Kamis', 12, 13, '0', 0, 'Amos Baruna', '3', '2021', 'Teknik Informatika', 'tidak', 'FTI', 1, '2', 0),
(156, 'Paijo', 'Pemrograman', 'B', 'Rabu', 12, 13, '0', 3, 'Yoel Chandra Eka Paksi', '3', '2021', 'Teknik Informatika', 'tidak ', 'FTI ', 2, '1', 0),
(157, 'Yoel', 'GIS', 'A', 'Jumat', 13, 14, '0', 3, 'Yoel Chandra Eka Paksi', '3', '2021', 'Sistem Informasi', 'ya', 'FTI', 4, '1', 0),
(158, 'Suprihadi', 'Teknologi Jaringan', 'A', 'Senin', 9, 12, '0', 6, 'Yoel Chandra Eka Paksi', '3', '2021', 'Teknik Informatika', 'tidak', 'FTI', 1, '1', 0),
(159, 'Suprihadi', 'Teknologi Jaringan', 'A', 'Kamis', 12, 13, '0', 0, 'Yoel Chandra Eka Paksi', '3', '2021', 'Teknik Informatika', 'tidak', 'FTI', 1, '2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_matkul`
--
ALTER TABLE `daftar_matkul`
  ADD UNIQUE KEY `nomeree` (`nomeree`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id1`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matkul_maha`
--
ALTER TABLE `matkul_maha`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id1` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `matkul_maha`
--
ALTER TABLE `matkul_maha`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

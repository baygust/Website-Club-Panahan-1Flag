-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 02:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_panahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kode_berita` int(6) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kode_berita`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(1, 'Turnamen tingkat nasional', 'Alhamdulillah Team 1FLAG berhasil meraih Juara di Kejuaraan TARGET DAY JAKARTA SELATAN yang diselenggarakan oleh PERPANI JAKARTA SELATAN.Juara yang di raih team 1FLAG DI ANTARANYA\r\n1.JUARA 1 INDIVIDU COMPOUND MEN YANG DI RAIH OLEH @adam_dhav \r\n2.JUARA 2 INDIVIDU COMPOUND MEN YANG DIRAIH OLEH @alfaresi_rafiih17 \r\n3.JUARA 1 INDIVIDU RECURVE MEN YANG DIRAIH OLEH @alghazi_basr \r\n4.JUARA 2 INDIVIDU REVURVE MEN YANG DIRAIH OLEH @rizqikusuma \r\n5.JUARA INDIVIDU RECURVE MEN YANG DIRAIH OLEH ANANDA @muchtarudinosama \r\n6.JUARA INDIVIDU RECURVE WOMEN YANG DIRAIH OLEH @queen_arfah \r\n7.JUARA INDIVU STD.BOW PURTI KATEGORI USIA 13/17THN YANG DI RAIH OLEH @sarrah_fadlyb .\r\nTERIMAKASIH UNTUK SEMUANYA YG TELAH MENAMBAH PRESTASI UNTUK 1FLAG,SYUKURI HASIL PERTANDINGAN HARI INI SEMOGA DI PERTANDINGAN SELANJUTNYA BISA TETAP KONSISTEN.', '1567529515.JPG', '2019-09-03'),
(2, 'cobain', '600+ Free Website Templates | HTML & Bootstrap 2019 - Colorlib\r\n\r\nhttps://colorlib.com â€º templates\r\nTerjemahkan halaman ini\r\nThe best source for free website templates based on Bootstrap 4 and clean HTML & CSS. We have over 600 free templates and more have been added every ...\r\nâ€ŽHTML & Bootstrap Website ... Â· â€Ž34 Best Free & Responsive ... Â· â€Ž26 Best Free Under ...\r\n', '1567537820.JPG', '2019-09-04'),
(3, 'coba lagi', 'Bawalah Pengaturan dengan Anda\r\n\r\nSinkronkan markah, kata sandi, dan lainnya di mana pun Anda menggunakan Firefox.Bawalah Pengaturan dengan Anda\r\n\r\nSinkronkan markah, kata sandi, dan lainnya di mana pun Anda menggunakan Firefox.\r\nSelalu Waspada akan Pembobolan Data\r\n\r\nFirefox Monitor memantau jika surel Anda telah muncul dalam pembobolan data dan memberitahu Anda jika muncul dalam pembobolan terbaru.\r\nDapatkan Firefox di Ponsel Anda\r\n\r\nUnduh Firefox untuk iOS atau Android dan sinkronkan data Anda di seluruh perangkat.', '1567610520.jpg', '2019-09-04'),
(4, 'coba lagij', 'Diterjemahkan dari bahasa Inggris-Klub Olahraga Atletik Floridsdorfer adalah klub sepak bola dari distrik ke-21 Wina di Floridsdorf. Floridsdorfer memenangkan kejuaraan sepakbola Austria pada tahun 1918 dan saat ini bermain di Liga Sepak Bola Austria Kedua. Warna klub biru dan putih. Wikipedia (Inggris)', '1567610856.jpg', '2019-09-04'),
(5, 'coba lageeeeeeeeeee', ' sides is one of:\r\n\r\n    t - for classes that set margin-top or padding-top\r\n    b - for classes that set margin-bottom or padding-bottom\r\n    l - for classes that set margin-left or padding-left\r\n    r - for classes that set margin-right or padding-right\r\n    x - for classes that set both *-left and *-right\r\n    y - for classes that set both *-top and *-bottom\r\n    blank - for classes that set a margin or padding on all 4 sides of the element\r\n\r\nWhere size is one of:\r\n\r\n    0 - for classes that eliminate the margin or padding by setting it to 0\r\n    1 - (by default) for classes that set the margin or padding to $spacer * .25\r\n    2 - (by default) for classes that set the margin or padding to $spacer * .5\r\n    3 - (by default) for classes that set the margin or padding to $spacer\r\n    4 - (by default) for classes that set the margin or padding to $spacer * 1.5\r\n    5 - (by default) for classes that set the margin or padding to $spacer * 3\r\n    auto - for classes that set the margin to ', '1567613383.jpg', '2019-09-04'),
(6, 'ada', 'adadadadada', '1567618481.png', '2019-09-05'),
(7, 'adad', 'adada', '1567618496.JPG', '2019-09-05'),
(8, 'sfsf', 'gsg', '1567618547.png', '2019-09-05'),
(9, 'sfsgd', 'hsdhs', '1567618567.png', '2019-09-05'),
(10, 'a', 's', '1567955578.jpeg', '2019-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `kode_gambar` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`kode_gambar`, `gambar`, `tanggal`) VALUES
(2, '1567609863.JPG', '2019-09-04'),
(3, '1567618724.png', '2019-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(6) NOT NULL,
  `kode_peserta` int(6) NOT NULL,
  `kode_kursus` int(6) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `kode_peserta`, `kode_kursus`, `status`, `tanggal_pesan`) VALUES
(45, 7, 26, 'belum terlaksana', '2019-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `kode_kursus` int(6) NOT NULL,
  `nama_kursus` varchar(50) NOT NULL,
  `jenis_kursus` varchar(20) NOT NULL,
  `kode_pengajar` int(6) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `max_peserta` int(2) NOT NULL,
  `waktu_mulai` varchar(10) NOT NULL,
  `waktu_selesai` varchar(10) NOT NULL,
  `biaya` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`kode_kursus`, `nama_kursus`, `jenis_kursus`, `kode_pengajar`, `status`, `tanggal`, `max_peserta`, `waktu_mulai`, `waktu_selesai`, `biaya`) VALUES
(26, 's', 'bronze', 10, 'tersedia', '2019-10-05', 2, '09:00 AM', '10:00 AM', 50000),
(27, 'b', 'silver', 10, 'tersedia', '2019-09-10', 2, '10:00 AM', '11:00 AM', 100000),
(28, 'a', 'silver', 10, 'sudah terlaksana', '2019-09-03', 1, '10:00 AM', '11:00 AM', 100000),
(29, 'q', 'silver', 10, 'sudah terlaksana', '2019-09-01', 1, '01:00 AM', '03:00 AM', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `hak_akses`) VALUES
('admin', 'admin', 'admin'),
('bayu', '123', 'peserta'),
('sultan', '12345', 'pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `kode_pengajar` int(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`kode_pengajar`, `username`, `nama`, `no_telp`, `email`, `alamat`) VALUES
(10, 'sultan', 'sultan', '9867987', 'huh@gmail.com', 'huh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `kode_peserta` int(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`kode_peserta`, `username`, `nama`, `no_telp`, `email`, `alamat`) VALUES
(7, 'bayu', 'bayu', '9867987987', 'bayu@gmail.com', 'jlkahvgsf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kode_berita`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`kode_gambar`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_peserta` (`kode_peserta`,`kode_kursus`),
  ADD KEY `kode_kursus` (`kode_kursus`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`kode_kursus`),
  ADD KEY `kode_pengajar` (`kode_pengajar`),
  ADD KEY `jenis_kursus` (`jenis_kursus`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`kode_pengajar`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`kode_peserta`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `kode_berita` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `kode_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `kode_kursus` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `kode_pengajar` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `kode_peserta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kode_peserta`) REFERENCES `peserta` (`kode_peserta`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`kode_kursus`) REFERENCES `kursus` (`kode_kursus`);

--
-- Constraints for table `kursus`
--
ALTER TABLE `kursus`
  ADD CONSTRAINT `kursus_ibfk_3` FOREIGN KEY (`kode_pengajar`) REFERENCES `pengajar` (`kode_pengajar`);

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

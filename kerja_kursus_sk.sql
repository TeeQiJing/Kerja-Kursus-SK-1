-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 07:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerja_kursus_sk`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `IdGuru` varchar(4) NOT NULL,
  `NamaGuru` varchar(255) NOT NULL,
  `KatalaluanGuru` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`IdGuru`, `NamaGuru`, `KatalaluanGuru`) VALUES
('G001', 'Ali bin Abu', 'ali12345'),
('G002', 'Muthu', 'muthu443'),
('G003', 'Pang Pei Ling', 'ppl12345'),
('G004', 'Lau Lim Siew', 'lls33933'),
('G005', 'Ahmad', 'ahmad122');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `IdKelas` varchar(4) NOT NULL,
  `Kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`IdKelas`, `Kelas`) VALUES
('K401', '4 Wawasan'),
('K402', '4 Bestari'),
('K501', '5 Wawasan'),
('K502', '5 Bestari');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `IdKeputusan` int(3) NOT NULL,
  `IdMurid` varchar(4) NOT NULL,
  `IdSoalan` varchar(4) NOT NULL,
  `JawapanMurid` varchar(1) NOT NULL,
  `Kebenaran` varchar(5) NOT NULL,
  `Tarikh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`IdKeputusan`, `IdMurid`, `IdSoalan`, `JawapanMurid`, `Kebenaran`, `Tarikh`) VALUES
(1, 'M001', 'S002', 'B', 'betul', '2021-08-23'),
(2, 'M001', 'S014', 'B', 'betul', '2021-08-23'),
(3, 'M002', 'S002', 'B', 'betul', '2021-08-23'),
(4, 'M002', 'S014', 'A', 'salah', '2021-08-23'),
(5, 'M002', 'S001', 'A', 'betul', '2021-08-23'),
(6, 'M002', 'S019', 'C', 'betul', '2021-08-23'),
(7, 'M003', 'S013', 'B', 'salah', '2021-08-23'),
(8, 'M003', 'S026', 'B', 'salah', '2021-08-23'),
(9, 'M003', 'S008', 'D', 'betul', '2021-08-23'),
(10, 'M003', 'S021', 'A', 'betul', '2021-08-23'),
(11, 'M003', 'S027', 'B', 'betul', '2021-08-23'),
(12, 'M004', 'S007', 'B', 'salah', '2021-08-23'),
(13, 'M004', 'S020', 'B', 'salah', '2021-08-23'),
(14, 'M004', 'S009', 'A', 'betul', '2021-08-23'),
(15, 'M004', 'S022', 'B', 'betul', '2021-08-23'),
(16, 'M005', 'S004', 'C', 'betul', '2021-08-23'),
(17, 'M005', 'S017', 'B', 'salah', '2021-08-23'),
(18, 'M005', 'S005', 'A', 'betul', '2021-08-23'),
(19, 'M005', 'S016', 'A', 'salah', '2021-08-23'),
(20, 'M001', 'S011', 'C', 'betul', '2021-08-23'),
(21, 'M001', 'S024', 'D', 'betul', '2021-08-23'),
(22, 'M001', 'S003', 'D', 'betul', '2021-08-23'),
(23, 'M001', 'S015', 'C', 'betul', '2021-08-23'),
(24, 'M001', 'S028', 'A', 'betul', '2021-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `IdMurid` varchar(4) NOT NULL,
  `NamaMurid` varchar(100) NOT NULL,
  `KatalaluanMurid` varchar(8) NOT NULL,
  `IdKelas` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`IdMurid`, `NamaMurid`, `KatalaluanMurid`, `IdKelas`) VALUES
('M001', 'Tee Qi Jing', 'jing1234', 'K501'),
('M002', 'Tee Qi Bin', 'bin12345', 'K401'),
('M003', 'Ali', 'ali88988', 'K402'),
('M004', 'Muthu', 'muthu677', 'K402'),
('M005', 'John', 'john5487', 'K401');

-- --------------------------------------------------------

--
-- Table structure for table `soalan`
--

CREATE TABLE `soalan` (
  `IdSoalan` varchar(4) NOT NULL,
  `NamaSoalan` varchar(255) NOT NULL,
  `PilihanA` varchar(255) NOT NULL,
  `PilihanB` varchar(255) NOT NULL,
  `PilihanC` varchar(255) NOT NULL,
  `PilihanD` varchar(255) NOT NULL,
  `Jawapan` varchar(1) NOT NULL,
  `IdGuru` varchar(4) NOT NULL,
  `IdTopik` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soalan`
--

INSERT INTO `soalan` (`IdSoalan`, `NamaSoalan`, `PilihanA`, `PilihanB`, `PilihanC`, `PilihanD`, `Jawapan`, `IdGuru`, `IdTopik`) VALUES
('S001', 'Apakah kelebihan menggunakan struktur modul atau subatur cara?', 'Lebih mudah untuk digunakan semula', 'Supaya projek menjadi lebih kompleks', 'Mengelakkan penggodaman', 'Lebih susah untuk menangani projek komputer', 'A', 'G003', '1.6'),
('S002', 'Yang manakah di bawah bukan teknik pemikiran komputasional dalam penyelesaian masalah?', 'Teknik Leraian', 'Teknik Hierarki', 'Teknik Pengecaman Corak', 'Teknik Algoritma', 'B', 'G001', '1.1'),
('S003', 'Yang manakah di bawah merupakan perwakilan algoritma?', 'Java', 'Python', 'Atur cara', 'Pseudokod', 'D', 'G001', '1.2'),
('S004', 'Yang manakah di bawah bukan jenis struktur kawalan?', 'Kawalan Urutan', 'Kawalan Pilihan', 'Kawalan Susunan', 'Kawalan Ulangan', 'C', 'G001', '1.4'),
('S005', 'Yang manakah di bawah merupakan pengisytiharan pemalar dalam bahasa pengaturcaraan Java?', 'final double pi = 3.142', 'const double pi = 3.142', 'static double pi = 3.142', 'define(\"pi\", 3.142)', 'A', 'G003', '1.3'),
('S006', 'Yang manakah di bawah bukan jenis ralat dalam atur cara?', 'Ralat Sintaks', 'Ralat Larian Masa', 'Ralat Masa Larian', 'Ralat Logik', 'B', 'G004', '1.5'),
('S007', 'Yang manakah di bawah merupakan metodologi umum yang terdapat bagi SDLC(Software Development Life Cycle)?', 'Model Gelaran', 'Model RAID', 'Model Air Terjun', 'Model Tingkap', 'C', 'G001', '1.7'),
('S008', 'Yang manakah di bawah bukan jenis sistem pengurusan/pemprosesan data?', 'Sistem Pangkalan Data', 'Sistem Pemprosesan Fail', 'Sistem Pemprosesan Manual ', 'Sistem Pemprosesan Automatik', 'D', 'G002', '2.1'),
('S009', 'Yang manakah di bawah bukan ciri-ciri kunci primer?', 'Nilai yang berubah dan tidak tetap', 'Tidak boleh dibiarkan kosong(null)', 'Mempunyai nilai unik', 'Tidak boleh mempunyai nilai yang sama', 'A', 'G003', '2.2'),
('S010', 'Yang manakah di bawah merupakan contoh DBMS(Sistem pengurusan pangkalan data)?', 'GUI', 'MySQL', 'Microsoft Office', 'Microsoft Word', 'B', 'G004', '2.3'),
('S011', 'Yang manakah di bawah merupakan langkah pertama dalam pembangunan pangkalan data untuk sistem maklumat?', 'Menyelenggara', 'Mereka bentuk', 'Merancang & Menganalisis', 'Membina', 'C', 'G001', '2.4'),
('S012', 'Yang manakah di bawah bukan sebab interaksi antara manusia dengan komputer diperlukan?', 'Meningkatkan produktiviti', 'Mengurangkan kos selepas jualan', 'Mendapat permintaan dalam pasaran', 'Meningkatkan kos pembangunan', 'D', 'G002', '3.1'),
('S013', 'Yang manakah di bawah bukan proses reka bentuk interaksi?', 'Membina User Interface(UI)', 'Mengenal pasti keperluan interaksi', 'Membangunkan reka bentuk alternatif', 'Membina prototaip interaksi', 'A', 'G003', '3.2'),
('S014', 'Yang manakah di bawah merupakan ciri-ciri penyelesaian masalah berkesan?', 'Maklumat', 'Kos', 'Penilaian', 'Penambahbaikan', 'B', 'G004', '1.1'),
('S015', 'Yang manakah di bawah merupakan kata kunci(key word) bagi pseudokod struktur kawalan pengulangan?', 'INPUT', 'JIKA', 'SELAGI', 'OUTPUT', 'C', 'G001', '1.2'),
('S016', 'Yang manakah di bawah bukan ciri-ciri bagi pemboleh ubah sejagat(Global Variable)?', 'Pengisytiharan yang dilakukan di luar mana-mana fungsi', 'Boleh diakses di mana-mana fungsi', 'Boleh digunakan hingga ke akhir program', 'Hanya boleh diakses dalam fungsi tertentu', 'D', 'G002', '1.3'),
('S017', 'Yang manakah di bawah merupakan operator logikal?', '!', '!=', '&', '|', 'A', 'G003', '1.4'),
('S018', 'Apakah nama ralat yang dikeluarkan jika terdapat pembahagian dengan digit 0?', 'Ralat Math', 'Ralat Masa Larian', 'Ralat Logik', 'Ralat Sintaks', 'B', 'G004', '1.5'),
('S019', 'Yang manakah di bawah merupakan cara pengistiharan tatasusunan yang betul?', 'int senaraiNum[] = {1, 89, 56, 87};', 'int senaraiNum[1, 89, 56, 87];', 'int [] senaraiNum = {1, 89, 56, 87};', 'senaraiNum = new int[1, 89, 56, 87];', 'C', 'G001', '1.6'),
('S020', 'Yang manakah di bawah bukan amalan terbaik pengaturcaraan?', 'Komen', 'Pemboleh ubah Bermakna', 'Terdapat Inden', 'Tidak memaparkan output', 'D', 'G002', '1.7'),
('S021', 'Yang manakah di bawah merupakan ciri-ciri data yang disimpan dalam pangkalan data?', 'Kelewahan data', 'Kelemahan data', 'Kelewatan data', 'Kekekalan data', 'A', 'G003', '2.1'),
('S022', 'Yang manakah di bawah merupakan pilihan yang paling sesuai untuk dijadikan sebuah entiti?', 'IdMurid', 'Murid', 'NoKpMurid', 'Tingkatan', 'B', 'G004', '2.2'),
('S023', 'Yang manakah di bawah bukan jenis data dalam Microsoft Access?', 'Memo', 'Text', 'Integer', 'Yes/No', 'C', 'G001', '2.3'),
('S024', 'Yang manakah di bawah merupakan jenis antara muka?', 'atribut', 'entiti', 'jadual', 'borang', 'D', 'G002', '2.4'),
('S025', 'Yang manakah di bawah bukan prinsip reka bentuk interaksi?', 'Boleh diggodam', 'Konsistensi', 'Boleh dipelajari', 'Kebolehan membuat pemerhatian', 'A', 'G003', '3.1'),
('S026', 'Apakah kelebihan menggunakan struktur modul atau subatur cara?', 'Lebih mudah untuk digunakan semula', 'Supaya projek menjadi lebih kompleks', 'Mengelakkan penggodaman', 'Lebih susah untuk menangani projek komputer', 'A', 'G001', '3.2'),
('S027', 'Yang manakah di bawah bukan jenis kekardinalan?', '1:1', 'M:1', 'M:N', '1:M', 'B', 'G001', '2.1'),
('S028', 'Yang manakah di bawah bukan komponen dalam analisi IPO', 'Mula', 'Input', 'Output', 'Proses', 'A', 'G001', '1.2'),
('S029', 'NamaSoalan1', 'PilihanA1', 'PilihanB1', 'PilihanC1', 'PilihanD1', 'A', 'G002', '3.1');

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `IdTopik` varchar(3) NOT NULL,
  `NamaTopik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`IdTopik`, `NamaTopik`) VALUES
('1.1', 'Strategi Penyelesaian Masalah'),
('1.2', 'Algoritma'),
('1.3', 'Pemboleh Ubah, Pemalar, dan Jenis Data'),
('1.4', 'Struktur Kawalan'),
('1.5', 'Amalan Terbaik Pengaturcaraan'),
('1.6', 'Struktur Data dan Modular'),
('1.7', 'Pembangunan Aplikasi'),
('2.1', 'Pangkalan Data Hubungan'),
('2.2', 'Reka Bentuk Pangkalan Data Hubungan'),
('2.3', 'Pembangunan Pangkalan Data Hubungan'),
('2.4', 'Pembangunan Sistem Pangkalan Data'),
('3.1', 'Reka Bentuk Interaksi'),
('3.2', 'Paparan dan Reka Bentuk Skrin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`IdGuru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`IdKelas`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`IdKeputusan`),
  ADD KEY `IdMurid` (`IdMurid`),
  ADD KEY `IdSoalan` (`IdSoalan`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`IdMurid`),
  ADD KEY `IdKelas` (`IdKelas`);

--
-- Indexes for table `soalan`
--
ALTER TABLE `soalan`
  ADD PRIMARY KEY (`IdSoalan`),
  ADD KEY `IdGuru` (`IdGuru`),
  ADD KEY `IdTopik` (`IdTopik`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`IdTopik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `IdKeputusan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_ibfk_1` FOREIGN KEY (`IdMurid`) REFERENCES `murid` (`IdMurid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_ibfk_2` FOREIGN KEY (`IdSoalan`) REFERENCES `soalan` (`IdSoalan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`IdKelas`) REFERENCES `kelas` (`IdKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soalan`
--
ALTER TABLE `soalan`
  ADD CONSTRAINT `soalan_ibfk_1` FOREIGN KEY (`IdGuru`) REFERENCES `guru` (`IdGuru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soalan_ibfk_2` FOREIGN KEY (`IdTopik`) REFERENCES `topik` (`IdTopik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

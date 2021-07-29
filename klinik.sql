-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2021 at 05:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksanaan`) VALUES
(2, 5, 9, '2021-06-04', 'Tenggorokan sakit, Batuk Berdarah ', 'Radang Tenggorokan   ', 'Rawat Jalan'),
(7, 15, 11, '2021-06-04', 'Muntah-Muntah, Lemas, Diare terus menerus ', 'Muntaber ', 'Rawat Jalan'),
(15, 4, 10, '2021-06-04', 'Pusing, Demam, Menggigil, Muncul ruam merah dan rasa gatal di kulit, Batuk', ' Skistosomiasis', 'Rawat Inap'),
(16, 7, 12, '2021-06-04', ' Buang Air Besar selalu berdarah ', ' Ambeien ', 'Rawat Jalan'),
(17, 16, 13, '2021-06-10', 'Batuk parah yang berlangsung selama lebih dari tiga minggu. Dada terasa sakit, Dahak ada darahnya, ', ' tuberkulosis paru (TBC) ', 'Rujuk'),
(18, 17, 14, '2021-06-10', 'demam dan nyeri sendi, sakit kepala, nyeri otot, pembengkakan sendi, dan ruam. ', ' Chikungunya ', 'Rawat Inap'),
(19, 18, 15, '2021-06-10', 'Demam tinggi, sakit kepala, ruam, nyeri otot dan sendi, serta muntah', 'Demam Berdarah Dengue (DBD)', 'Rawat Inap'),
(20, 19, 16, '2021-06-10', 'Demam ringan dan ruam yang dari area wajah, menyebar ke seluruh tubuh', ' Rubella (campak)', 'Rawat Jalan'),
(21, 20, 17, '2021-06-10', 'pusing, sembelit, diare, muntah, lemas, serta demam tinggi, munculnya ruam merah di area kulit tertentu', ' Tipes', 'Rawat Inap'),
(25, 21, 1, '2021-06-13', ' Pusing, Migrain', ' Vertigo', 'Rujuk'),
(28, 10, 9, '2021-06-04', NULL, NULL, NULL),
(30, 23, 1, '2021-06-13', NULL, NULL, NULL),
(31, 19, 1, '2021-06-10', NULL, NULL, NULL),
(32, 23, 1, '2021-06-13', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(1, 'Dr.H Fauzi, Sp.OG'),
(9, 'Dr.Hj.Hilmi, Sp.PG'),
(10, 'Dr.Suparman, Sp.M'),
(11, 'Dr. Rajiman, M.Kes, Sp.THT-KL'),
(12, 'Dr. Marthin Limba, Sp PD'),
(13, 'Dr. Bambang Surif, Sp A'),
(14, 'Dr. mansyur Abdillah, Sp B'),
(15, 'Dr. Jerremy Aria Beny, Sp OG, M. Kes'),
(16, 'Dr. Rida Niradita W,SpPD'),
(17, 'Dr. Darma Rianto, Sp P');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1, 'Ibuprofen'),
(2, 'Paramex'),
(4, 'Cyproheptasin'),
(10, ' Termorex'),
(11, 'Polysilane'),
(12, 'Ambeven'),
(13, 'Ardium'),
(14, 'Paracetamol'),
(15, 'Cetirizine'),
(16, 'Oralit'),
(17, 'Praziquantel'),
(18, 'Isoniazid'),
(19, 'Rifampisin'),
(20, 'Naproxen'),
(21, 'Transfusi trombosit'),
(22, 'Chloramphenicol'),
(23, 'Amoxicillin'),
(24, 'Cotrimoxazole');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(4, 'misbahul', 'L', 20),
(5, 'ahfidz fikri', 'L', 21),
(7, 'andika', 'L', 23),
(10, 'intan asdianti', 'P', 26),
(15, 'putri', 'P', 19),
(16, 'Aji Pribadi', 'L', 24),
(17, 'Alip Purnama', 'L', 26),
(18, 'Sella Oktaviani', 'L', 22),
(19, 'bagas arya', 'L', 26),
(20, 'bambang susilo', 'L', 30),
(21, 'Takumi', 'L', 22),
(23, 'Sugondis', 'L', 21);

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(14, 2, 1),
(20, 16, 12),
(22, 2, 14),
(24, 7, 14),
(25, 7, 16),
(27, 15, 17),
(28, 17, 19),
(29, 17, 18),
(30, 17, 14),
(31, 18, 20),
(32, 18, 1),
(33, 18, 14),
(34, 19, 14),
(35, 19, 21),
(36, 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(10, 'septian', 'e10adc3949ba59abbe56e057f20f883e', 'septian yanuar'),
(11, 'alfian', 'e10adc3949ba59abbe56e057f20f883e', 'alfianwinurato'),
(12, 'andika', 'd41d8cd98f00b204e9800998ecf8427e', 'andika prameswara'),
(14, 'Elsasari', 'e10adc3949ba59abbe56e057f20f883e', 'Elsa Puspitasari'),
(16, 'Widyamaloni', '7ac66c0f148de9519b8bd264312c4d64', 'Widya Maloni Tampubolon'),
(19, 'Aprilia', 'e10adc3949ba59abbe56e057f20f883e', 'Andi Aprilia Sidiuzdah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `FK__pasien` (`id_pasien`),
  ADD KEY `FK__dokter` (`id_dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `FK__berobat` (`id_berobat`),
  ADD KEY `FK__obat` (`id_obat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `FK__dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON UPDATE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `FK__berobat` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

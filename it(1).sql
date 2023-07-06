-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 02:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `bought`
--

CREATE TABLE `bought` (
  `id_bought` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `naziv_hrane` varchar(64) COLLATE utf32_bin NOT NULL,
  `ukupnaCena` int(11) NOT NULL,
  `adresa` varchar(64) COLLATE utf32_bin NOT NULL,
  `datetime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `bought`
--

INSERT INTO `bought` (`id_bought`, `id_user`, `naziv_hrane`, `ukupnaCena`, `adresa`, `datetime`) VALUES
(10, 1, '1*ZDRAVA ZDELA  ', 20000, 'Marka Oreskovica 40', '2023-07-05'),
(11, 1, '1*BIFTEK  ,2*JAJE NA OKO  ,1*PLJESKAVICA SA JAJETOM  ', 112200, 'Ribarska 1', '2023-07-05'),
(13, 1, '2*SALATA  ', 700, 'Zlatko', '2023-07-05'),
(14, 9, '1*SALATA  ,1*PALACINKE  ,2*PALACINKE  ', 950, 'Marka Oreskovica 40', '2023-07-05'),
(15, 9, '1*BATAK  ,1*PALACINKE  ,1*JAJE I AVOKADO  ,1*ZDRAVA ZDELA  ', 1078, 'Marka', '2023-07-04'),
(16, 1, '2*BECKA SNICLA  ', 1100, 'Marka Oreskovica', '2023-07-05'),
(17, 1, '1*SALATA  ', 350, 'Zlatko', '2023-07-05'),
(18, 9, '1*SALATA  ', 350, 'Miljka Orsica 21', '2023-07-06'),
(19, 11, '1*SALATA  ,1*BATAK  ', 780, 'Marsala Tita 23', '2023-07-06'),
(20, 9, '3*SALATA  ,2*PALACINKE  ', 1450, 'Miljka Orsica 21', '2023-07-06'),
(21, 9, '1*SALATA  ,3*BATAK  ,2*BIFTEK  ', 3120, 'Miljka Orsica 21', '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `narudzbine`
--

CREATE TABLE `narudzbine` (
  `id_nadrudzbine` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `narudzbina` int(60) NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `narudzbine`
--

INSERT INTO `narudzbine` (`id_nadrudzbine`, `id_user`, `email`, `narudzbina`, `date_time`) VALUES
(199, 11, 'sfilip@gmail.com', 2, '2023-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `omiljeno`
--

CREATE TABLE `omiljeno` (
  `id_omiljeno` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vozila` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `omiljeno`
--

INSERT INTO `omiljeno` (`id_omiljeno`, `id_user`, `id_vozila`) VALUES
(92, 1, 3),
(101, 11, 4),
(102, 11, 33),
(103, 9, 35),
(104, 9, 34),
(105, 9, 1),
(106, 9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `registration_token` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `forgotten_password_token` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_expires` datetime DEFAULT NULL,
  `is_banned` smallint(1) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `phoneNum`, `adress`, `registration_token`, `registration_expires`, `active`, `forgotten_password_token`, `forgotten_password_expires`, `is_banned`, `date_time`) VALUES
(1, 'chole@vts.su.ac.rs', '$2y$10$T2rAKmfqlxBUe34mh.b9u.jNfB9vUjQSaf9I/4/o5K22xh5E4bFJS', 'Zlatko', 'Covic', '0603579213', 'Marka Oreskovica 40', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 0, '2023-07-05 23:44:45'),
(7, 'workapppa@gmail.com', '$2y$10$ZtLdnlAcKM28Oqt8No1ATur.g2NNRPLX/FiKOIv/.uBAIwEo3eQHi', 'vladimir', 'vorkapic', '0612496477', 'Arsenija Carnojevica', '', '0000-00-00 00:00:00', 1, NULL, NULL, 0, '2023-07-05 23:45:06'),
(9, 'ssukic7@gmail.com', '$2y$10$v.qeY1eDDNGE/dht9YOJ5.U.U5bRdo64VZB7OFbkbIN1PCtLpKp0S', 'Radovan', 'Sukic', '0603574124', 'Miljka Orsica 21', '', '0000-00-00 00:00:00', 1, '', '0000-00-00 00:00:00', 0, '2023-07-06 02:22:52'),
(10, '0604578214', '$2y$10$ozEVRx1zcmSXOCie4Ta7UOu3SxEkpngRmFu0ab152pTllTom7.KmS', 'Kemal', 'Cebo', '', '', 'Marsala Tita 21', '2023-07-07 00:28:20', 0, NULL, NULL, 0, '2023-07-06 00:28:20'),
(11, 'sfilip@gmail.com', '$2y$10$C27JmL8vzCZ79oxSCjRv5eiig6GRu9aluORWdfjCJAVIE44uqYcBy', 'Ilija', 'Dragojevic', '0654758963', 'Marsala Tita 23', '', '0000-00-00 00:00:00', 1, NULL, NULL, 0, '2023-07-06 00:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `vozila`
--

CREATE TABLE `vozila` (
  `id_vozila` int(11) NOT NULL,
  `proizvodjac` varchar(64) COLLATE utf32_bin NOT NULL,
  `model` varchar(64) COLLATE utf32_bin NOT NULL,
  `cena` int(11) NOT NULL,
  `slika` varchar(64) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `vozila`
--

INSERT INTO `vozila` (`id_vozila`, `proizvodjac`, `model`, `cena`, `slika`) VALUES
(1, 'DORUCAK', 'ZDRAVA ZDELA', 249, 'good-bowl.jpg'),
(2, 'DORUCAK', 'SALATA', 350, 'salata.jpg'),
(3, 'RUCAK', 'BECKA SNICLA', 550, 'becka.jpg'),
(4, 'VECERA', 'PLJESKAVICA I POMFRIT', 600, 'burger-set1.jpg'),
(5, 'DORUCAK', 'PALACINKE', 200, 'pancakes1.jpg'),
(6, 'RUCAK', 'BATAK', 430, 'batak.jpg'),
(7, 'RUCAK', 'BIFTEK', 740, 'meal1.jpg'),
(8, 'RUCAK', 'JAJE U LEPINJI', 370, 'burger-jaje.jpg'),
(31, 'VECERA', 'SALATA', 450, 'salata.jpg'),
(33, 'DORUCAK', 'JAJE I AVOKADO', 199, 'eggs2.jpg'),
(34, 'DORUCAK', 'JAJE NA OKO', 150, 'eggs1.jpg'),
(35, 'DORUCAK', 'SALATA', 350, 'salata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vrste`
--

CREATE TABLE `vrste` (
  `id_vrsta` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf32_bin NOT NULL,
  `picture` varchar(20) COLLATE utf32_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `vrste`
--

INSERT INTO `vrste` (`id_vrsta`, `name`, `picture`) VALUES
(1, 'DORUCAK', 'pancakes1.jpg'),
(2, 'RUCAK', 'burger-set1.jpg'),
(3, 'VECERA', 'becka.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bought`
--
ALTER TABLE `bought`
  ADD PRIMARY KEY (`id_bought`),
  ADD KEY `prajmeriFK` (`id_user`);

--
-- Indexes for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD PRIMARY KEY (`id_nadrudzbine`),
  ADD KEY `proizvod_FK_1` (`narudzbina`),
  ADD KEY `idNar_FK_1` (`id_user`);

--
-- Indexes for table `omiljeno`
--
ALTER TABLE `omiljeno`
  ADD PRIMARY KEY (`id_omiljeno`),
  ADD KEY `foreighKey` (`id_vozila`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vozila`
--
ALTER TABLE `vozila`
  ADD PRIMARY KEY (`id_vozila`);

--
-- Indexes for table `vrste`
--
ALTER TABLE `vrste`
  ADD PRIMARY KEY (`id_vrsta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bought`
--
ALTER TABLE `bought`
  MODIFY `id_bought` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `narudzbine`
--
ALTER TABLE `narudzbine`
  MODIFY `id_nadrudzbine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `omiljeno`
--
ALTER TABLE `omiljeno`
  MODIFY `id_omiljeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vozila`
--
ALTER TABLE `vozila`
  MODIFY `id_vozila` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vrste`
--
ALTER TABLE `vrste`
  MODIFY `id_vrsta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bought`
--
ALTER TABLE `bought`
  ADD CONSTRAINT `prajmeriFK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `narudzbine`
--
ALTER TABLE `narudzbine`
  ADD CONSTRAINT `idNar_FK_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `proizvod_FK_1` FOREIGN KEY (`narudzbina`) REFERENCES `vozila` (`id_vozila`);

--
-- Constraints for table `omiljeno`
--
ALTER TABLE `omiljeno`
  ADD CONSTRAINT `foreighKey` FOREIGN KEY (`id_vozila`) REFERENCES `vozila` (`id_vozila`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

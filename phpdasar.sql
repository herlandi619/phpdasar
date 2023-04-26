-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 04:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(2, 'vava alamsyah', '213313', 'vavalasmyah@gmail.com', 'manajement', 'g2.jpg'),
(3, 'ahmad muklis', '213214', 'muklis@gmail.com', 'sastra enggres', 'g3.jpg'),
(4, 'nauval opal', '213215', 'opal123@gmail.com', 'Desain Grafis', 'g4.jpg'),
(5, 'fajar nur cahyo', '213216', 'fajar@gmail.com', 'teknik informasi', 'g5.jpg'),
(6, 'iqbal adji prigantoro', '213217', 'iqbaladji@gmail.com', 'teknik ekonomi', 'g6.jpg'),
(25, 'iqbal fahrozi', '41231', 'prigicool@gmail.com', 'teknik informatika', 'g2.jpg'),
(30, 'habi maulana', '712747', 'iben@gmail.com', 'sistem informasi', '6426b5a414062.jpeg'),
(31, 'renold herlandi', '2221333', 'herlandi619@gmail.com', 'Teknik informasi', '642816dceca03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'herlandi', '$2y$10$D5SXTe1kb9joU6WPF8GOU..RjGPrwMa5.mdCrwF7aZN720C.mtR9i'),
(2, 'jhin', '$2y$10$T6bCVYYqpAiuIoOf12T8GOyop7LkvpS/rcpb7g0mRfI7/dQ2mHzgW'),
(7, 'jhin002', '$2y$10$lfjRnJqF27u9V.X95I1soOciuq1anIdO1Yl6WcfEAK0Prfbh7MNDq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

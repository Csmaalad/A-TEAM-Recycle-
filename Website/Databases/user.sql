-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 01:58 AM
-- Server version: 5.5.29-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recyclemoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  `address` varchar(11) NOT NULL,
  `city` varchar(11) NOT NULL,
  `postcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `address`, `city`, `postcode`) VALUES
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('0', '0', '234234234', '0', '0'),
('0', '0', '0', '0', '0'),
('Steve@testm', '$2y$10$WaYa', 'Tester Addr', 'test', 'test');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

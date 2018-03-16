-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 12:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tresetiste`
--

-- --------------------------------------------------------

--
-- Table structure for table `passes`
--

CREATE TABLE `passes` (
  `id` int(10) UNSIGNED NOT NULL,
  `pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` double NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passes`
--

INSERT INTO `passes` (`id`, `pass`, `length`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Devna dozvola (od 06.00 do 18.00)', 0, 1800, NULL, NULL),
(2, 'Dan + Noć / 24 časa', 1, 3000, NULL, NULL),
(3, 'Dva dana i dve noći', 2, 4200, NULL, NULL),
(4, 'Set dozvola od tri dana (3 dana i 2 noći)', 3, 5400, NULL, NULL),
(5, 'Set dozvola od četri dana (4 dana i 3 noći)', 4, 7200, NULL, NULL),
(6, 'Set dozvola od pet dana (5 dana i 4 noći)', 5, 9000, NULL, NULL),
(7, 'Set dozvola od šest dana (6 dana i 5 noći)', 6, 11000, NULL, NULL),
(8, 'Set dozvola od sedam dana (7 dana i 6 noći)', 7, 12500, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passes`
--
ALTER TABLE `passes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passes`
--
ALTER TABLE `passes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

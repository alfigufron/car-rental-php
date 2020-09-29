-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 10:09 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(32) NOT NULL,
  `price` int(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `number`, `price`, `image`) VALUES
(1, 'Toyota Avanza', 'B 1234 CD', 200000, 'CAR31238866.jpg'),
(2, 'Daihatsu Xenia', 'B 4321 EF', 250000, 'CAR11198168.jpg'),
(3, 'Suzuki Ertiga', 'B 1324 GH', 300000, 'CAR25667154.jpg'),
(4, 'Toyota Sienta', 'B 3142 IJ', 500000, 'CAR14336182.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `date` varchar(12) NOT NULL,
  `start_date` varchar(12) NOT NULL,
  `end_date` varchar(12) NOT NULL,
  `price` int(20) NOT NULL,
  `note` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `car_id`, `date`, `start_date`, `end_date`, `price`, `note`, `status`) VALUES
('CRM-12312', 3, 1, '06/12/2020', '06/01/2020', '06/05/2020', 1000000, 'Tidak Ada Catatan', 'B'),
('CRM-18870', 5, 3, '06/12/2020', '06/09/2020', '06/30/2020', 6600000, 'Ini adalah Catatan', 'WA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `name`, `email`, `phone`, `address`) VALUES
(1, 'admin', 'superadmin', 1, 'Admin 1', '', '', ''),
(2, 'admincute2020', 'admincute', 1, 'Admin 2', '', '', ''),
(3, 'user01', 'pwuser01', 0, 'Serena Schaden', 'user01@gmail.com', '089675247929', 'Jalan Siliwangi No.27 RT 07 RW 18 Kelurahan Kalijati Kecamatan Bumi Indah Kota Bandung Jawa Barat | Kode Pos 45132'),
(5, 'user02', 'pwuser02', 0, 'Alfi Gufron', 'alfigufron21@gmail.com', '089675247929', 'Ini alamat lengkap user 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

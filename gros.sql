-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 11:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gros`
--

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` set('male','female','') NOT NULL,
  `dob` varchar(16) NOT NULL,
  `region` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `ward` varchar(30) NOT NULL,
  `village` varchar(30) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_dob` varchar(16) NOT NULL,
  `mother_village` varchar(50) NOT NULL,
  `primary_school` varchar(50) NOT NULL,
  `nida_no` varchar(18) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`member_id`, `fname`, `mname`, `lname`, `gender`, `dob`, `region`, `district`, `ward`, `village`, `mother_name`, `mother_dob`, `mother_village`, `primary_school`, `nida_no`, `date_created`) VALUES
(1, 'sarah', 'julius', 'john', 'female', '1993-02-21', 'mara', 'tarime', 'rebu', 'ronsoti', 'mkami julius john', '1969-07-19', 'ronsoti', 'nyamisangura', '19690719000123', '0000-00-00'),
(2, 'daudi', 'gitano', 'shanyangi', 'male', '1998-08-12', 'mara', 'serengeti', 'malulu', 'burunga', 'mary gitano shanyangi', '1973-10-07', 'bwitengi', 'burunga', '1998071900014234', '2022-06-15'),
(3, 'khamisi', 'juma', 'khamisi', 'male', '1998-08-12', 'dodoma', 'kondoa', 'chenene', 'chenene', 'halima juma shaban', '1969-07-19', 'chenene', 'chenene', '1969016945000132', '2022-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `plot_no` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_no` varchar(14) NOT NULL,
  `cvc_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `control_no` varchar(14) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `plot_no`, `email`, `phone`, `request_id`, `user_id`, `card_no`, `cvc_no`, `amount`, `control_no`, `payment_status`, `created_at`) VALUES
(4, 'khamisi juma khamisi', 'P.10459', 'khamisi@gmail.com', '255743563876', 18, 9, '0152521474836', 564, 5000, '440802475064', 'paid', '2022-06-03'),
(5, 'hafswa ismail', 'P.16276', 'hafswaismail4@gmail.com', '0758044012', 14, 7, '0152525654562', 567, 5000, '443417701809', 'paid', '2022-06-03'),
(6, 'peter fidery jackson', 'P.15384', 'peter13@gmail.com', '0718633403', 8, 3, '0152525895456', 394, 5000, '443345678912', 'paid', '2022-06-03'),
(7, 'regina james', 'P.18045', 'regina@gmail.com', '255778134820', 19, 10, '0165523454567', 546, 5000, '444239141491', 'paid', '2022-06-14'),
(8, 'zacharia mwihechi', 'P.18045', 'zacharia@gmail.com', '0734457643', 13, 5, '0152675454567', 564, 5000, '445330064708', 'paid', '2022-06-18'),
(9, 'gracious daniel meck', 'P.16983', 'gracious@gmail.com', '255764728197', 20, 12, '0152525895567', 678, 5000, '444827933390', 'paid', '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `plot_id` int(11) NOT NULL,
  `plot_no` varchar(50) NOT NULL,
  `plot_area` text NOT NULL,
  `plot_size` text NOT NULL,
  `plot_status` varchar(50) NOT NULL,
  `plot_owner` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`plot_id`, `plot_no`, `plot_area`, `plot_size`, `plot_status`, `plot_owner`, `date_created`) VALUES
(1, 'P.15384', 'meriwa', '30 sq.metre', 'available', 'not assigned', '2022-03-29'),
(3, 'P.10074', 'kisasa', '40 sq.metre', 'owned', 'melckzedeck daniel', '2022-03-30'),
(4, 'P.18045', 'iyumbu', '35 sq.metre', 'owned', 'regina james martine', '2022-03-30'),
(5, 'P.14580', 'hombolo', '30 x 25 sq.metre', 'available', 'not assigned', '2022-03-30'),
(6, 'P.10013', 'chamwino', '40 sq.metre', 'owned', 'Abdalah Chifule', '2022-03-30'),
(8, 'P.16276', 'nzuguni', '42 x 26 sq.metre', 'owned', 'hafswa ismail bakari', '2022-04-03'),
(9, 'P.10459', 'chimwaga', '43 x 32 sq metre', 'owned', 'khamisi juma khamisi', '2022-05-10'),
(10, 'P.16983', 'nkuhungu', '54 x 40 sq metre', 'owned', 'gracious james meck', '2022-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `ro_request`
--

CREATE TABLE `ro_request` (
  `request_id` int(11) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `plot_num` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `plot_owned` varchar(50) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `control_no` bigint(30) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `checked_by` varchar(50) NOT NULL,
  `request_status` varchar(50) NOT NULL,
  `approved_by` varchar(50) NOT NULL,
  `approved_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ro_request`
--

INSERT INTO `ro_request` (`request_id`, `user_address`, `plot_no`, `plot_num`, `user_id`, `name`, `purpose`, `plot_owned`, `date_created`, `control_no`, `payment_status`, `checked_by`, `request_status`, `approved_by`, `approved_date`) VALUES
(8, 'musoma', 1, 'P.15384', 3, 'peter13@gmail.com', 'agriculture', 'nothing', '2022-04-01', 443345678912, 'paid', 'janeth lendoyan john', 'accepted', 'melckzedeck daniel james', '2022-06-13 12:19:12'),
(11, 'arusha', 5, 'P.14580', 4, 'tumainiel@gmail.com', 'school', 'nothing', '2022-04-01', 448837125436, 'pending', 'NO', 'pending', 'No', '0000-00-00 00:00:00'),
(13, 'veyula', 4, 'P.18045', 5, 'zacharia@gmail.com', 'living', 'nothing', '2022-04-01', 445330064708, 'pending', 'NO', 'pending', 'No', '0000-00-00 00:00:00'),
(14, 'dar es Salaam', 8, 'P.16276', 7, 'hafswaismail4@gmail.com', 'agriculture', 'nothing', '2022-04-26', 443417701809, 'paid', 'janeth lendoyan john', 'accepted', 'rosemary george george', '2022-04-26 09:59:39'),
(18, 'katavi', 9, 'P.10459', 9, 'khamisi@gmail.com', 'business', 'no', '2022-06-03', 440802475064, 'pending', '', 'accepted', 'george yohana sendalo', '2022-06-18 09:23:15'),
(19, 'kahama', 4, 'P.18045', 10, 'regina@gmail.com', 'business', 'no', '2022-06-14', 444239141491, 'pending', '', 'accepted', 'rosemary george george', '2022-06-14 08:21:19'),
(20, 'mara', 10, 'P.16983', 12, 'gracious@gmail.com', 'business', 'no', '2022-06-18', 444827933390, 'pending', '', 'accepted', 'george yohana sendalo', '2022-06-18 09:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` set('male','female','') NOT NULL,
  `user_dob` varchar(30) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `residence` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `surname`, `lname`, `gender`, `user_dob`, `nationality`, `email`, `phone`, `residence`, `role`, `password`, `date_created`) VALUES
(1, 'melckzedeck', 'daniel', 'james', 'male', '1999-06-17', 'Tanzania', 'melckzedeck063@gmail.com', '071-863-4141', 'makulu', 'admin', '9b3ef3af7fe61c2cd598cb308c26041f', '2022-03-31'),
(3, 'peter', 'jackson', 'fidery', 'male', '2000-08-22', 'Tanzania', 'peter13@gmail.com', '0718633403', 'veyula', 'user', 'e3e7f312a36e128c29a42352bb4ff8d7', '2022-03-31'),
(4, 'tumainiel', 'japhet', 'temba', 'male', '2002-05-10', 'Tanzania', 'tumainiel@gmail.com', '0785324321', 'nkuhungu', 'user', '95c5a3c715e65e3bb7f9d58cd0de1cef', '2022-04-01'),
(5, 'zacharia', 'mwihechi', 'zacharia', 'male', '1997-08-05', 'Tanzania', 'zacharia@gmail.com', '0734457643', 'tarime', 'user', 'f64f4cd7d6f079540aba2cf5b771f5b5', '2022-04-01'),
(6, 'janeth', 'lendoyan', 'john', 'female', '2001-02-02', 'Tanzania', 'janeth.john@gmail.com', '0743568712', 'ihumwa', 'bursar', 'be1d871340f7c513e7e7617fb008ef32', '2022-04-03'),
(7, 'hafswa', 'ismail', 'bakari', 'female', '2022-06-26', 'Tanzania', 'hafswaismail4@gmail.com', '0758044012', 'dar es salaam', 'user', 'd17082e6ff03443d796245c5e13add5a', '2022-04-26'),
(8, 'rosemary', 'george', 'george', 'female', '1989-06-22', 'Tanzania', 'rosegeorge@gmail.com', '255 624 997 337', 'dodoma', 'commisioner', '5c967b958b1993032a02c006919fd1ab', '2022-04-26'),
(9, 'khamisi', 'juma', 'khamisi', 'male', '2019-11-01', 'Tanzania', 'khamisi@gmail.com', '255743563876', 'katavi', 'user', '055442fe0e6683330b09a3a05d57ccbe', '2022-06-01'),
(10, 'regina', 'james', 'martine', 'female', '1996-02-22', 'Tanzania', 'regina@gmail.com', '255778134820', 'kahama', 'user', 'b306c8ca795e4f57287d9b1d56cb9880', '2022-06-14'),
(11, 'george', 'yohana', 'sendalo', 'male', '2022-06-01', 'Tanzania', 'george@gmail.com', '255778134820', 'dodoma', 'commisioner', 'c630878c9717e8fabc0177ff81024b8a', '2022-06-18'),
(12, 'gracious', 'james', 'meck', 'female', '1997-08-20', 'Tanzania', 'gracious@gmail.com', '255764728197', 'mara', 'user', '58f3b19e30cd8f0e493b10f5cd6742f7', '2022-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`plot_id`);

--
-- Indexes for table `ro_request`
--
ALTER TABLE `ro_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plot_id` (`plot_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `plot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ro_request`
--
ALTER TABLE `ro_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`request_id`) REFERENCES `ro_request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ro_request`
--
ALTER TABLE `ro_request`
  ADD CONSTRAINT `plot_id` FOREIGN KEY (`plot_no`) REFERENCES `plots` (`plot_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ro_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

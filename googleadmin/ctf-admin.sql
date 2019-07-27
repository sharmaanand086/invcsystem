-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2019 at 08:46 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 5.6.40-6+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctf-admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `datatable`
--

CREATE TABLE `datatable` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `city` text NOT NULL,
  `time` text NOT NULL,
  `tagno` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatable`
--

INSERT INTO `datatable` (`id`, `date`, `city`, `time`, `tagno`) VALUES
(20, '1st August', 'Goa', '9.00 am to 1.00 pm  ', '2131321'),
(21, '1st August', 'Goa', '2.00 pm - 6.00 pm', '2131321');

-- --------------------------------------------------------

--
-- Table structure for table `datatablecity`
--

CREATE TABLE `datatablecity` (
  `id` int(11) NOT NULL,
  `city` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatablecity`
--

INSERT INTO `datatablecity` (`id`, `city`) VALUES
(5, 'Delhi'),
(2, 'Mumbai'),
(4, 'Chennai'),
(6, 'Pune'),
(7, 'Hyderabad'),
(8, 'Goa'),
(9, 'Chandigarh'),
(10, 'Kolkata'),
(11, 'Ahemdabad'),
(12, 'Surat');

-- --------------------------------------------------------

--
-- Table structure for table `referraladmin`
--

CREATE TABLE `referraladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referraladmin`
--

INSERT INTO `referraladmin` (`id`, `name`, `email`, `pass`) VALUES
(1, 'mazhar', 'mazhar@arfeenkhan.com', 'Mumbai@123'),
(2, 'anand', 'anand@arfeenkhan.com', 'admin@1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatable`
--
ALTER TABLE `datatable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatablecity`
--
ALTER TABLE `datatablecity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referraladmin`
--
ALTER TABLE `referraladmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datatable`
--
ALTER TABLE `datatable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `datatablecity`
--
ALTER TABLE `datatablecity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `referraladmin`
--
ALTER TABLE `referraladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

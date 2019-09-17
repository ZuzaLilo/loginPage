-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Sep 17, 2019 at 02:09 PM
-- Server version: 10.4.8-MariaDB-1:10.4.8+maria~bionic
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `username`, `email`, `password`) VALUES
(1, 'x', 'x@xmail.com', 'xyz'),
(2, 'boo', 'b@bmail.com', 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

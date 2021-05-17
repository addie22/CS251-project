-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 06:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byoulib_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminsite`
--

CREATE TABLE `adminsite` (
  `adminID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminsite`
--

INSERT INTO `adminsite` (`adminID`, `userName`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `bookName` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `bookCover` varchar(200) DEFAULT NULL,
  `suggestion` varchar(100) DEFAULT NULL,
  `descrip` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `isbn`, `bookName`, `author`, `category`, `price`, `status`, `bookCover`, `suggestion`, `descrip`) VALUES
(1, '9786163016560', 'เซเปียนส์: ประวัติย่อมนุษยชาติ Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 530, 'active', 'เซเปียนส์- ประวัติย่อมนุษยชาติ.jpg', 'suggestion', ''),
(2, '9786168221051', 'วิทยาศาสตร์: ประวัติศาสตร์การไขความจริงแห่งสรรพสิ่ง\r\nA Little History of Science', 'William Bynum', 'Education', 395, 'active', 'วิทยาศาสตร์- ประวัติศาสตร์การไขความจริงแห่งสรรพสิ่ง.jpg', 'suggestion', ''),
(3, '9786169160113', 'เจ้าชายน้อย Le Pettit Prince', 'Antoine de Saint-Exupéry', 'Fiction', 190, 'active', 'เจ้าชายน้อย.jpg', 'suggestion', ''),
(4, '9786168187111', 'สตีเฟน ฮอว์กิง ความคิดไร้ขีดจำกัด', 'ผู้จัดทำนิตยสาร BBC Focus และ BBC History', 'Biographies', 255, 'active', 'สตีเฟน ฮอว์กิง ความคิดไร้ขีดจำกัด.png', 'suggestion', ''),
(5, '9786160451692', 'ขุมทรัพย์สุดปลายฝัน', 'Paulo Coelho', 'fiction', 225, 'active', 'ขุมทรัพย์สุดปลายฝัน.png', 'suggestion', '');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `bookID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `startDate` timestamp NULL DEFAULT current_timestamp(),
  `returnDate` date DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT 'Not return'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`bookID`, `memberID`, `startDate`, `returnDate`, `status`) VALUES
(1, 1, '2021-05-16 17:00:00', '2021-06-01', 'returned'),
(1, 2, '2021-05-16 17:00:00', '2021-06-01', 'returned'),
(1, 1, '2021-05-17 15:53:23', '2021-06-01', 'returned');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `citizenID` varchar(13) NOT NULL,
  `phone` char(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `upDateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `userName`, `email`, `password`, `fullName`, `citizenID`, `phone`, `regDate`, `upDateDate`) VALUES
(1, 'adeenun', 'adeenunabdullee@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Adeenun Abdullee', '1959900663560', '0987056711', '2021-05-15 16:20:57', '0000-00-00 00:00:00'),
(2, 'nile', 'nile@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nile Thanakrit', '32493920990', '09342894', '2021-05-15 18:58:07', '0000-00-00 00:00:00'),
(3, 'caitlynfillae', 'meca.gurlyy@gmail.com', 'ed2b1f468c5f915f3f1cf75d7068baae', 'Kafeela Madaka', '1969900303555', '0632104421', '2021-05-16 12:32:47', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminsite`
--
ALTER TABLE `adminsite`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `memberID` (`memberID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminsite`
--
ALTER TABLE `adminsite`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 24, 2021 at 07:55 PM
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
  `descrip` text DEFAULT NULL,
  `borrowerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `isbn`, `bookName`, `author`, `category`, `price`, `status`, `bookCover`, `suggestion`, `descrip`, `borrowerID`) VALUES
(1, '9786163016560', 'เซเปียนส์: ประวัติย่อมนุษยชาติ Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'History', 530, 'active', 'เซเปียนส์- ประวัติย่อมนุษยชาติ.jpg', 'suggestion', 'heloo', NULL),
(2, '9786168221051', 'วิทยาศาสตร์: ประวัติศาสตร์การไขความจริงแห่งสรรพสิ่ง\r\nA Little History of Science', 'William Bynum', 'Education', 395, 'active', 'วิทยาศาสตร์- ประวัติศาสตร์การไขความจริงแห่งสรรพสิ่ง.jpg', 'suggestion', '', NULL),
(3, '9786169160113', 'เจ้าชายน้อย Le Pettit Prince', 'Antoine de Saint-Exupéry', 'Fiction', 190, 'active', 'เจ้าชายน้อย.jpg', 'suggestion', '', NULL),
(4, '9786168187111', 'สตีเฟน ฮอว์กิง ความคิดไร้ขีดจำกัด', 'ผู้จัดทำนิตยสาร BBC Focus และ BBC History', 'Biographies', 255, 'active', 'สตีเฟน ฮอว์กิง ความคิดไร้ขีดจำกัด.png', 'suggestion', '', NULL),
(5, '9786160451692', 'ขุมทรัพย์สุดปลายฝัน', 'Paulo Coelho', 'fiction', 225, 'active', 'ขุมทรัพย์สุดปลายฝัน.png', 'suggestion', '', NULL),
(6, '9786162610943', 'เป็นวัยรุ่นมันยาก', 'Val Emmich, Steven Levenson, Benj Paseak, Justin Pual', 'fiction', 295, 'active', 'เป็นวัยรุ่นมันยาก.png', 'suggestion', 'นี่เป็นเรื่องราวการเติบโตผ่านวัยหัวเลี้ยวหัวต่อที่พูดถึงการเยียวยาบาดแผลทางใจและการดิ้นรนเพื่อเป็นส่วนหนึ่ง ในยุคสมัยแห่งเทคโนโลยีที่ช่วยเชื่อมโยงผู้คนถึงกัน แต่กลับไม่อาจเติมเต็มความรู้สึกโดดเดี่ยว แปลกแยก', NULL),
(7, '12321435435', 'บันทึกนกไขลาน (ปกอ่อน)', 'Haruki', 'fiction', 290, 'active', 'บันทึกนกไขลาน.png', 'not suggestion', 'หนังสือมือหนึ่ง', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `bookID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `startDate` date DEFAULT current_timestamp(),
  `returnDate` date DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT 'Not return'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `memberID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `deliver_submit` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `memberID` int(11) NOT NULL,
  `penalty` int(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fines`
--

INSERT INTO `fines` (`memberID`, `penalty`, `status`) VALUES
(1, 0, 'Nofines');

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
(1, 'adeenun', 'adeenunabdullee@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Adeenun Abdullee', '1959900663560', '0987056711', '2021-05-15 16:20:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `bookID` int(11) NOT NULL,
  `pubName` varchar(100) NOT NULL,
  `pubAddress` varchar(255) NOT NULL,
  `pubPhone` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `memberID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `borrowerID` (`borrowerID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD KEY `memberID` (`memberID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD KEY `memberID` (`memberID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD KEY `bookID` (`bookID`),
  ADD KEY `memberID` (`memberID`);

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
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`borrowerID`) REFERENCES `member` (`memberID`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`);

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`);

--
-- Constraints for table `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

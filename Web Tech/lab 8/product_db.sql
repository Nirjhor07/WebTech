-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 05:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `ID` int(11) NOT NULL,
  `productName` varchar(40) NOT NULL,
  `buyingPrice` int(11) NOT NULL,
  `sellingPrice` int(11) NOT NULL,
  `productExpiredate` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`ID`, `productName`, `buyingPrice`, `sellingPrice`, `productExpiredate`, `image`) VALUES
(22, 'anything', 1200, 2000, '2023-07-21', 'Nirjhor.jpg'),
(23, 'Watch', 25, 65, '2023-07-21', 'watch.jpg'),
(24, 'boots', 1700, 2500, '2023-07-21', 'shoe.jpg'),
(25, 'lady bag ', 1200, 2000, '2023-07-19', 'bag.jpg'),
(27, 'money bag ', 1200, 2000, '2023-07-20', 'monebag.jpg'),
(28, 'shoe', 8500, 10000, '2027-10-27', 'handmade boot.jpg'),
(29, 'shoe', 8500, 10000, '2027-10-27', 'handmade boot.jpg'),
(30, 'egy', 0, 0, '2023-08-17', 'handmade boot.jpg'),
(31, 'anything', 0, 0, '2023-08-17', 'watch.jpg'),
(32, 'anything', 0, 0, '2023-08-26', 'shoe.jpg'),
(33, 'anything', 0, 0, '2023-08-26', 'shoe.jpg'),
(34, 'sega3a', 0, 0, '2023-08-17', 'watch.jpg'),
(35, 'jani na ', 1200000, 13000000, '2023-08-16', 'Aiub.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `registation_info`
--

CREATE TABLE `registation_info` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uploadPicture` varchar(400) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `religion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registation_info`
--

INSERT INTO `registation_info` (`ID`, `firstName`, `lastName`, `passWord`, `email`, `uploadPicture`, `contact`, `Gender`, `dob`, `religion`) VALUES
(13, 'akash', 'hossain', '$2y$10$nNEg53ceru.zwIFKR7RQ1ujRW92Wm6cIk', 'nirjhor07@gmail.com', '../uploads/monebag.jpg', '2564', 'Male', '2023-08-16', 'Islam'),
(14, 'ak', 'sh', '$2y$10$qAjQSbHu2QNOQspUSRTcDOLjLnJGz9IbS', 'nirjhor07@gmail.com', '../uploads/handmade boot.jpg', '67867867', 'Male', '2023-08-16', 'Islam'),
(15, 'ak', 'sh', '$2y$10$1t6R2569TrFWQi5vdC7tfOKutfZGgM2fR', 'nirjhor07@gmail.com', '../uploads/belt.jpg', '67867867', 'Male', '2023-08-16', 'Islam'),
(16, 'ak', 'sh', '$2y$10$hhKhWBLpeufX1qKjTFpJ3eawBtMCVdebd', 'nirjhor07@gmail.com', '../uploads/handmade boot.jpg', '01984321642', 'Male', '2023-08-09', 'Islam'),
(17, 'ak', 'sh', '$2y$10$qiMdNmQs0T4BzqbV0LiyhOXcjK70gOvfZ', 'nirjhor07@gmail.com', '../uploads/handmade boot.jpg', '01984321642', 'Male', '2023-08-09', 'Islam'),
(18, 'shamim ', 'vai', '$2y$10$Xemd.a8PiS2Fj.WrEMrB8.uFHkCRI0q8e', 'shamimvaiya@gmail.com', '../uploads/shoe.jpg', '67867867', 'Male', '2023-08-16', 'Islam'),
(19, 'shamim', 'asif', '$2y$10$sEOaGIT4IhSa0zqE0ZrDWu.9dmZQo4Rbu', 'asif@gmail.com', '../uploads/belt.jpg', '67867867', 'Male', '2023-08-10', 'Islam'),
(20, 'noha', 'nnn', '$2y$10$eHhurvHbwe3P.IIGhHiZ8uounlYLsTXu/ZdsbkuY5Jjkwp2SCNdfu', 'noha@gmail.com', '../uploads/watch.jpg', '01984321642', 'Female', '2023-08-17', 'Islam'),
(21, 'nuha', 'dsghy', '$2y$10$14JOj5CGv7PnsXmuyG3G.uUHtKYgfDwRVTFa367Y7Zw2VQswVRxNm', 'nuha123@gmail.com', '../uploads/shoe.jpg', '01984321642', 'Female', '2023-08-17', 'Islam'),
(22, 'Haider', 'Ali', '$2y$10$/CMjLWzyjwPKVpK3DZLM1u.ZzbvRA3Rze5uEResRTnr5LKe0cQkvK', 'ali@gmail.com', '../uploads/watch.jpg', '01984321642', 'Male', '2023-08-16', 'Islam'),
(23, 'Khalib', 'Bin Walid', '$2y$10$.NbsyLhxYUI94kK22gSks.vQqM4ImvVqxx8FzwRmt4P7Gq.KLnyhO', 'khalidbinwalid@gmail.com', '../uploads/R.jpg', '999999999', 'Male', '1724-10-27', 'Islam'),
(24, 'Khalib', 'Bin Walid', '$2y$10$Is6uNIsp32lNSF1mM3bDjeUpANiz9/4ta6f4v8u3b6TL9m1YDso/a', 'khalidbinwalid@gmail.com', '../uploads/R.jpg', '999999999', 'Male', '1724-10-27', 'Islam'),
(25, 'Khalib', 'Bin Walid', '$2y$10$3dqeqKQWnETfFABrou2n8OTSxonbyZDn1JZ.Z20GIFXFE//UvzFHS', 'khalidbinwalid@gmail.com', '../uploads/R.jpg', '999999999', 'Male', '1724-10-27', 'Islam'),
(26, 'Khalib', 'Bin Walid', '$2y$10$p4MVSsC8CMb6e30vdOACBOJY5Ti.GLZiH2iP5rte/gMJSeI/hvyqe', 'khalidbinwalid@gmail.com', '../uploads/R.jpg', '999999999', 'Male', '1724-10-27', 'Islam'),
(27, 'Khalib', 'Bin Walid', '$2y$10$T1oXB6ogRLYNkV2UvpJvMepksz2M7MQq3OrA95frVd1evveywfw2S', 'khalidbinwalid@gmail.com', '../uploads/R.jpg', '999999999', 'Male', '1724-10-27', 'Islam'),
(28, 'Admin', 'Admin', '$2y$10$pzxwaMtpwvaxgVsGNLvBBuFECrTf6Z16JuoVeHQpiXDYg9Y9trlBO', 'admin@gmail.com', '../uploads/R.jpg', '01984321642', 'Male', '2023-08-16', 'Islam'),
(29, 'Nirjhor', 'Akash', '$2y$10$6utUMJkEkGu/6.wzRUVHheWbeAxFi91oR42qUIF3IK9RsE2sb6VD6', 'nirjhorakash07@gmail.com', '../uploads/Nirjhor.jpg', '01871411854', 'Male', '1998-10-21', 'Islam'),
(30, 'shamim', 'vai', '$2y$10$wi/SPkqFe0k2Fq8ct0n5B.RISDUAffVf1AkqbCv33Oy7Y4GCpj1.y', 'shamimvaiya@gmail.com', '../uploads/Aiub.jpeg', '01984321642', 'Male', '2023-08-24', 'Islam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registation_info`
--
ALTER TABLE `registation_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `registation_info`
--
ALTER TABLE `registation_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

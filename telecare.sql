-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2017 at 10:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `did` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `type` enum('1','2') DEFAULT NULL COMMENT '1: ID Physician, 2: Refering Provider',
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `spec` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `addr` varchar(256) DEFAULT NULL,
  `state` varchar(10) NOT NULL,
  `lang` int(11) DEFAULT NULL,
  `dea` varchar(8) DEFAULT NULL,
  `npi` varchar(10) NOT NULL,
  `cv` varchar(2048) DEFAULT NULL,
  `message` text,
  `doctor_type` enum('MD','DO','ARNP','PA') DEFAULT NULL,
  `token` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `forget_token` varchar(1024) NOT NULL,
  `is_on_call_doctor` enum('0','1') NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`did`, `img`, `type`, `fname`, `lname`, `spec`, `email`, `fax`, `phone`, `addr`, `state`, `lang`, `dea`, `npi`, `cv`, `message`, `doctor_type`, `token`, `password`, `forget_token`, `is_on_call_doctor`, `updated`) VALUES
(25, '150264736415625990944442f93.jpg', '2', 'rubby', 'star', 0, 'rubby.star@hotmail.com', NULL, NULL, NULL, '22', 0, 'aa', '23', NULL, NULL, NULL, '6a5ceaf4b2235eea77c3445cd59e5338', 'f5cf915da2ba57ff580bf5f45aa19eae', '', '1', '2017-08-29 07:00:24'),
(31, '15027031911300259916e5745780.jpg', '1', 'james', 'smith', 0, 'james.smith.rb@outlook.com', NULL, NULL, NULL, '123', 0, 'aa', '123', NULL, NULL, NULL, '', 'f5cf915da2ba57ff580bf5f45aa19eae', '', '0', '2017-08-15 17:19:05'),
(34, '1502989886205865995ce3ece09a.jpg', '1', 'gaedong', 'shoe', 0, 'gaedongshoe@gmail.com', NULL, NULL, NULL, '111', 0, 'aa', '11', NULL, NULL, NULL, 'b16646dd06e1c73cd63697178ab23fba', 'a6c27d22c19b28883f6e25e117536873', '', '0', '2017-08-27 01:36:06'),
(35, '1502989926146835995ce6673430.png', '1', 'dffghh', 'dghjj', 0, 'lll@ll.ll', NULL, NULL, NULL, '9999999', 0, 'hhh', '33333', NULL, NULL, NULL, '', 'a73f86ae408af70b67141843e7130723', '', '0', '2017-08-17 17:12:06'),
(36, '1502990044220085995cedca56f8.png', '2', 'daddy', 'added', 0, 'ggg@ggg.ggg', NULL, NULL, NULL, 'adfadf', 0, 'added', '123123123', NULL, NULL, NULL, '81a8a56a848019e1009d2027180f2c64', '9cafeef08db2dd477098a0293e71f90a', '', '0', '2017-08-23 02:18:10'),
(37, '150343193510613599c8cfff0776.jpg', '', 'angel', 'an', 0, 'angel8280@yandex.com', NULL, '123456789', 'aa', '55', 0, 'xvb', '455', NULL, NULL, NULL, '1db3516bd17f7c3e486b51e6e058b7a5', 'f5cf915da2ba57ff580bf5f45aa19eae', '', '0', '2017-09-12 21:19:15'),
(38, '', NULL, '', '', NULL, '', '', '', NULL, '', NULL, '', '', NULL, NULL, NULL, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0', '2017-08-27 07:21:34'),
(39, '', NULL, 'test', 'test', NULL, 'test@test.com', '123', '1234', NULL, '123', NULL, '123', '123', '15038188451031559a2745d35f40.jpg', NULL, NULL, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0', '2017-08-27 07:27:25'),
(40, '15038190181284059a2750a88881.jpg', '2', 'aa', 'aa', 0, 'aa@test.test', NULL, NULL, NULL, '231', 0, 'adf', '123', '', NULL, NULL, '', '202cb962ac59075b964b07152d234b70', '', '0', '2017-08-27 07:30:18'),
(41, '', NULL, 'a', 'a', NULL, 'aaa@aaa.aaa', '77000023', '1234567890', NULL, 'state1', NULL, NULL, '123', '', '11', 'MD', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '0', '2017-08-27 19:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `pid` int(11) NOT NULL,
  `img` varchar(256) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `gender` enum('0','1') NOT NULL DEFAULT '0',
  `dob` date NOT NULL,
  `ssn` varchar(11) DEFAULT NULL,
  `addr` varchar(256) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `pwd` varchar(256) NOT NULL,
  `payment_type` enum('1','2') NOT NULL,
  `payment_addr` varchar(30) NOT NULL,
  `token` varchar(1024) NOT NULL,
  `forget_token` varchar(1024) NOT NULL,
  `did` int(11) DEFAULT NULL,
  `uploadfiles` text,
  `is_treated` enum('yes','no') NOT NULL DEFAULT 'no',
  `is_accepted` enum('yes','no') NOT NULL DEFAULT 'no',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`pid`, `img`, `fname`, `lname`, `gender`, `dob`, `ssn`, `addr`, `email`, `phone`, `pwd`, `payment_type`, `payment_addr`, `token`, `forget_token`, `did`, `uploadfiles`, `is_treated`, `is_accepted`, `updated`) VALUES
(1, '15027755099989599288d549e85.jpg', 'james', 'smith', '0', '2017-08-16', '234', 'aa', 'james.smith.rb@outlook.com', NULL, 'f5cf915da2ba57ff580bf5f45aa19eae', '1', '', 'df635e13d300fc215a035120b307ea01', '', 37, NULL, 'yes', 'no', '2017-08-29 07:00:48'),
(13, '1502998104281705995ee583f922.png', 'pplkhj', 'fhjnvff', '0', '1990-01-22', '22222222', 'yyyhh', 'ff@ff.ff', NULL, 'eed8cdc400dfd4ec85dff70a170066b7', '1', '', '30fbb4a595be295ec0c72a5a07f57068', '', 36, NULL, 'yes', 'no', '2017-08-23 02:18:09'),
(14, '150309938017606599779f411927.jpg', 'ffffff', 'ffffff', '0', '2017-08-18', '123123', 'ffffff', 'f111f@ff.ff', NULL, 'eed8cdc400dfd4ec85dff70a170066b7', '1', '', '', '', 36, NULL, 'yes', 'no', '2017-08-22 03:57:18'),
(15, '15030995202654859977a80ecfd0.jpg', 'ffffff', 'ffffff', '0', '2017-08-18', '123123', 'ffffff', 'f111211f@ff.ff', NULL, 'eed8cdc400dfd4ec85dff70a170066b7', '1', '', '', '', 36, NULL, 'no', 'no', '2017-08-22 03:57:29'),
(16, '15030995582645059977aa697e9f.jpg', 'ffffff', 'ffffff', '0', '2017-08-18', '123123', 'ffffff', '211f@ff.ff', NULL, 'eed8cdc400dfd4ec85dff70a170066b7', '1', '', '', '', 25, NULL, 'yes', 'no', '2017-08-31 22:20:37'),
(17, '150310609182545997942b1a657.jpg', 'song', 'guang', '0', '0000-00-00', '123', 'post', 'gadongsae@gmail.com', NULL, '698d51a19d8a121ce581499d7b701668', '1', '', '', '', NULL, NULL, 'no', 'no', '2017-08-19 01:28:11'),
(18, '15031062442017599794c41073f.jpg', 'a', 'b', '0', '0000-00-00', '123', 'asd', 'lnoslr106@yandex.com', NULL, '698d51a19d8a121ce581499d7b701668', '1', '', '', '', NULL, NULL, 'no', 'no', '2017-08-19 01:30:44'),
(19, '150310673513144599796afaa09b.jpg', 'su', 'ji', '1', '0000-00-00', '123', 'aed', 'ggg@g.com', NULL, '698d51a19d8a121ce581499d7b701668', '1', '', '', '', 37, NULL, 'no', 'no', '2017-08-29 02:15:19'),
(20, '150310715218353599798503d045.png', 'test', 'tes', '0', '2017-08-09', '123', 'aa', 'tse@asa.com', NULL, '47bce5c74f589f4867dbd57e9ca9f808', '1', '', '', '', 37, NULL, 'yes', 'no', '2017-08-22 20:06:46'),
(21, '1503110077278655997a3bdb0692.jpg', 'z', 'we', '0', '0000-00-00', '45', 'dgg', 'ayg@f.com', NULL, '6512bd43d9caa6e02c990b0a82652dca', '1', '', '', '', 34, NULL, 'no', 'no', '2017-08-20 20:41:06'),
(22, '1503110225177915997a451c056d.jpg', 'aa', 'aa', '0', '2017-08-09', '213', 'aa', 'aa@gmail.com', '1234567890', 'f5cf915da2ba57ff580bf5f45aa19eae', '1', '', '10d7e6c78389c0d7a6aa02b0070fcdf1', '', 37, '15040015302543659a53dfa0d43e.jpg,1504001541163759a53e0576d08.jpg,15040016661209059a53e823e78b.png,15040018723069959a53f50a2997.jpg,15040030322597959a543d85ed29.png,15040031422447259a544463354b.png,15040031581329759a54456cbce8.jpg,15040033131531859a544f1c94a3.jpg,15040033952415159a54543cd1de.png,1504003626517759a5462a3dc38.png,15040036461087859a5463e68aa7.png,15040036601123159a5464c43d37.png,15040037592052459a546af82b69.jpg,1504039804997959a5d37c1242a.png,15042120741429559a8746a5f282.exe,', 'yes', 'no', '2017-09-12 21:19:26'),
(23, '1503196197249285998f4253662f.jpg', 'ft', 'ft', '0', '1989-08-16', '1234567890', 'qwert', 'serf@fty.ccc', NULL, '343b1c4a3ea721b2d640fc8700db0f36', '1', '', '', '', 37, NULL, 'yes', 'no', '2017-08-22 20:06:46'),
(24, '15031969081915998f6ec26276.jpg', 'g', 'gg', '0', '0000-00-00', '66', 'sf', 'l@h.com', NULL, 'c4ca4238a0b923820dcc509a6f75849b', '1', '', '4af1a64aa0a5375278ec8e5392ba01d4', '', 36, NULL, 'no', 'no', '2017-08-22 21:48:05'),
(25, '1503197804270995998fa6c28803.jpg', 'aafasd', 'asdfasd', '0', '2017-08-23', '123', 'asdfasd', 'dd@ad.com', NULL, '0cc175b9c0f1b6a831c399e269772661', '1', '', '', '', 36, NULL, 'yes', 'no', '2017-08-22 01:49:58'),
(26, '1503197811162095998fa73c0f06.jpg', 'd', 't', '1', '0000-00-00', '45', 'xvj', 'fjg@fhj.com', NULL, 'b6d767d2f8ed5d21a44b0e5886680cb9', '1', '', '', '', 36, NULL, 'no', 'no', '2017-08-22 01:49:58'),
(27, '', '', '', '0', '0000-00-00', '', '', '', NULL, 'd41d8cd98f00b204e9800998ecf8427e', '1', '', '5af0e41145a04d0b57acccf3efe7dd2d', '', 25, NULL, 'no', 'no', '2017-08-26 23:59:48'),
(28, '1503198687256645998fddfb6101.jpg', 'd', 't', '1', '0000-00-00', '45', 'xvj', 'df@hj.com', NULL, 'c4ca4238a0b923820dcc509a6f75849b', '1', '', '', '', 25, NULL, 'yes', 'no', '2017-08-20 19:08:20'),
(29, '150334148911653599b2bb1936d8.jpg', 'in', 'fit', '1', '2001-03-22', '19294939293', 'digging this one ', 'aa@aa.aa', NULL, '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '1', '', '', '', 36, NULL, 'yes', 'no', '2017-08-22 01:48:14'),
(30, '', 'calin', 'blitiu', '0', '2017-01-01', NULL, NULL, 'calin.blitiu@outlook.com', NULL, 'f5cf915da2ba57ff580bf5f45aa19eae', '1', '', '', '', NULL, NULL, 'no', 'no', '2017-08-27 05:32:24'),
(31, '', 'aa', 'aa', '1', '2017-01-01', NULL, NULL, 'aa@aa.com', NULL, 'f5cf915da2ba57ff580bf5f45aa19eae', '1', '', '', '', NULL, NULL, 'no', 'no', '2017-08-27 05:39:19'),
(32, '15038124531033759a25b652fde6.jpg', 'aa', 'aa', '1', '2017-08-17', '31', 'dfad', 'aa@aa.dd', NULL, '4124bc0a9335c27f086f24ba207a4912', '1', '', '', '', NULL, NULL, 'no', 'no', '2017-08-27 05:40:53'),
(33, '', 'sg', 'star', '1', '2014-02-03', NULL, NULL, 'sg.star@gmail.com', NULL, 'f5cf915da2ba57ff580bf5f45aa19eae', '1', '', '133cdd77e925fd4fbcf111c65cab4608', '', NULL, NULL, 'no', 'no', '2017-08-30 17:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `note` text NOT NULL,
  `history` text NOT NULL,
  `res_date_from` datetime NOT NULL,
  `res_date_to` datetime NOT NULL,
  `opentok_session_id` text NOT NULL,
  `opentok_token` text NOT NULL,
  `room_id` text,
  `rec_videos` text,
  `duration` int(11) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `pid`, `date`, `note`, `history`, `res_date_from`, `res_date_to`, `opentok_session_id`, `opentok_token`, `room_id`, `rec_videos`, `duration`, `updated`) VALUES
(1, 1, '2017-08-02 00:00:00', 'test', 'test.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 20:47:08'),
(2, 1, '2017-08-15 18:25:16', 'test 1', 'test1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 20:59:40'),
(3, 1, '2017-08-02 13:25:57', 'aa', 'aa.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 21:03:10'),
(4, 1, '2017-08-17 06:35:23', 'test3', 'test3.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2_MX40NTkyNzc0Mn5-MTUwMzIzNjA3Mjk0OH5yb2QzRlpsYjViS1NNZ0MwTXRuekVpSjB-UH4', 'T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9YzBhN2E4YjhkNWRjZTkwYmE5NTAzMWMzMTQ0MTgzODNlMTdkOGUxMDpzZXNzaW9uX2lkPTJfTVg0ME5Ua3lOemMwTW41LU1UVXdNekl6TmpBM01qazBPSDV5YjJRelJscHNZalZpUzFOTlowTXdUWFJ1ZWtWcFNqQi1VSDQmY3JlYXRlX3RpbWU9MTUwMzIzNjA3MCZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzMjM2MDcwLjU1NTEyNjA0NDE1OQ==', NULL, NULL, NULL, '2017-08-20 13:34:30'),
(5, 13, '2017-08-18 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '15030118641806659962418a73d1.png,15030118641443559962418e6f13.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 23:18:01'),
(6, 13, '2017-08-18 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '1503012208176895996257080132.png,15030122081481459962570c57f8.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 23:23:29'),
(7, 13, '2017-08-18 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '150301330724204599629bb3f0ef.png,15030133136613599629c115a7c.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 23:41:53'),
(8, 13, '2017-08-18 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '1503013450561059962a4a40afc.png,15030135262069959962a9658e36.png', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-17 23:52:09'),
(9, 13, '2017-08-20 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1_MX40NTkyNzc0Mn5-MTUwMzIzNjEwNTA3OX5TcTAwZzFuZ1ptK2pmK0JCbmhhdldnUUp-UH4', 'T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9ZGFjNGQyNDk4NzYyZTgyZWIwYzgyOWU0ODg5MjI0NGVjNTBlMzYyZDpzZXNzaW9uX2lkPTFfTVg0ME5Ua3lOemMwTW41LU1UVXdNekl6TmpFd05UQTNPWDVUY1RBd1p6RnVaMXB0SzJwbUswSkNibWhoZGxkblVVcC1VSDQmY3JlYXRlX3RpbWU9MTUwMzIzNjEwMiZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzMjM2MTAyLjY3MjQxMTc1NjU3Nzk3', NULL, NULL, NULL, '2017-08-20 13:35:02'),
(10, 13, '2017-08-21 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumjgggg dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:11:59'),
(11, 13, '2017-08-21 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumjgggg dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:12:11'),
(12, 13, '2017-08-21 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillumjgggg dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:14:37'),
(13, 13, '2017-08-22 08:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1_MX40NTkyNzc0Mn5-MTUwMzQzNzcyNjAwNn41Z0ZjZGhyc0pibTZFMkFGY25TR3ljcyt-UH4', 'T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9MTA5NGQ3MTk3YzUyYWEyYTIzMTYzMTY2NDRiYjQ3MGM5M2VmNDBiNjpzZXNzaW9uX2lkPTFfTVg0ME5Ua3lOemMwTW41LU1UVXdNelF6TnpjeU5qQXdObjQxWjBaalpHaHljMHBpYlRaRk1rRkdZMjVUUjNsamN5dC1VSDQmY3JlYXRlX3RpbWU9MTUwMzQzNzcyNiZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzNDM3NzI2LjE1NjkxMzMzNDMyMTIw', NULL, NULL, NULL, '2017-08-22 21:35:26'),
(14, 13, '2017-08-23 05:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-22 17:11:27'),
(15, 13, '2017-08-21 00:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:23:27'),
(16, 13, '2017-08-21 00:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:23:58'),
(17, 13, '2017-08-21 00:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:24:23'),
(18, 13, '2017-08-21 00:00:00', 'The fact is I have a problem I don\'t like to see it on twitter and I\'m just saying that it doesn\'t even have \n\n', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:25:33'),
(19, 13, '2017-08-21 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-20 22:34:07'),
(20, 13, '2017-08-21 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2_MX40NTkyNzc0Mn5-MTUwMzM1MDIyNTg1Mn5RRmRFT2VRbHR0S3c4Q2g1NXZENXFBNHN-UH4', 'T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9MjdlYjU1OTA3NjcwMzg4N2E1MTA4ZGQzYzE1NjcyMjJjMTg2YWM3ODpzZXNzaW9uX2lkPTJfTVg0ME5Ua3lOemMwTW41LU1UVXdNek0xTURJeU5UZzFNbjVSUm1SRlQyVlJiSFIwUzNjNFEyZzFOWFpFTlhGQk5ITi1VSDQmY3JlYXRlX3RpbWU9MTUwMzM1MDIxOSZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzMzUwMjE5LjA2MzIxMTMxMDkxMDM=', NULL, NULL, NULL, '2017-08-21 21:16:59'),
(21, 24, '2017-08-26 00:00:00', 'g5vtb4c4bubrctnuvrv', '150333381023396599b0db27eb8f.jpg,15033338754557599b0df39f735.jpg15033338754557599b0df39f735.jpg,', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-22 05:09:10'),
(22, 24, '2017-08-31 00:00:00', 'g6f6hn 4cv7fnuvcgh65dbhcnic efficiency btc4gh5cgnu', '150333742031950599b1bcc0eff0.jpg,15033374766127599b1c04ceee6.jpg,150333751413052599b1c2a16b03.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2_MX40NTkyNzc0Mn5-MTUwMzM1MDIyNTg1Mn5RRmRFT2VRbHR0S3c4Q2g1NXZENXFBNHN-UH4', 'T1==cGFydG5lcl9pZD00NTkyNzc0MiZzaWc9MjdlYjU1OTA3NjcwMzg4N2E1MTA4ZGQzYzE1NjcyMjJjMTg2YWM3ODpzZXNzaW9uX2lkPTJfTVg0ME5Ua3lOemMwTW41LU1UVXdNek0xTURJeU5UZzFNbjVSUm1SRlQyVlJiSFIwUzNjNFEyZzFOWFpFTlhGQk5ITi1VSDQmY3JlYXRlX3RpbWU9MTUwMzM1MDIxOSZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzMzUwMjE5LjA2MzIxMTMxMDkxMDM=', NULL, NULL, NULL, '2017-08-22 07:01:45'),
(23, 1, '0000-00-00 00:00:00', 'g y  hB t t 6h &ht  y h u u..*h &h.j.j.i..*j.j....j.j.jh h h &h  h h h h h h h h h h  h h h h  h h h &&h g g yg g y  g g  g g y  g g g \n', '150343998923263599cac7518e4e.jpg,150344001121292599cac8b4e7c2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-22 22:13:41'),
(24, 1, '2017-07-31 00:00:00', 'g y  hB t t 6h &ht  y h u u..*h &h.j.j.i..*j.j....j.j.jh h h &h  h h h h h h h h h h  h h h h  h h h &&h g g yg g y  g g  g g y  g g g \n', '150343998923263599cac7518e4e.jpg,150344001121292599cac8b4e7c2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2_MX40NTk0Nzc1Mn5-MTUwMzk5MDQ2NjAyN350bVFNaGNjREwyczhrdmFaVFppWFdGT0t-UH4', 'T1==cGFydG5lcl9pZD00NTk0Nzc1MiZzaWc9ODY3Yzk2ODIwNWRhYzY1YjE4NDM3NzZhOTkzZTJlZWUyYzIxY2I2NzpzZXNzaW9uX2lkPTJfTVg0ME5UazBOemMxTW41LU1UVXdNems1TURRMk5qQXlOMzUwYlZGTmFHTmpSRXd5Y3pocmRtRmFWRnBwV0ZkR1QwdC1VSDQmY3JlYXRlX3RpbWU9MTUwMzk5MDQ2MCZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTAzOTkwNDYwLjc5MjcyMDA4MjMyMzUz', NULL, NULL, NULL, '2017-08-29 07:07:40'),
(25, 13, '2017-09-23 00:00:00', 'Lorem ipsum dolor sit er elit lamet, consectetaur cillium adipisicing pecu, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Nam liber te conscient to factor tum poen legum odioque civiuda.', '150345272112677599cde318a17c.jpg,150345272119418599cde318a5c3.jpg,', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-23 01:45:21'),
(26, 22, '2017-08-29 12:59:59', 'Lorem ipsum dolor sit er elit lamet, consectetaur ', '150345314124833599cdfd52399d.jpg,150345314119366599cdfd523da0.jpg,150345314131207599cdfd5241d2.jpg,', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1_MX40NTk0Nzc1Mn5-MTUwNDAzNzkwNjY3N35UMVFHeENhVUY2cm84Qk1zY3ozUjY1ZC9-UH4', 'T1==cGFydG5lcl9pZD00NTk0Nzc1MiZzaWc9ODMxYzZhMDAxNmRhYjhhNzJiNDJmMTI1MDVlMTA3NWRhYWRlNjJlYTpzZXNzaW9uX2lkPTFfTVg0ME5UazBOemMxTW41LU1UVXdOREF6Tnprd05qWTNOMzVVTVZGSGVFTmhWVVkyY204NFFrMXpZM296VWpZMVpDOS1VSDQmY3JlYXRlX3RpbWU9MTUwNDAzNzkwMSZyb2xlPXB1Ymxpc2hlciZub25jZT0xNTA0MDM3OTAxLjYxNTYxMjgzODI0MDM3', NULL, NULL, NULL, '2017-08-29 20:18:21'),
(27, 22, '2017-08-30 23:50:44', 'test', '15040687342913059a6447ef1826.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-30 04:52:16'),
(28, 22, '2017-08-30 06:55:56', 'test1', '1504069055446559a645bfb978f.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-30 04:57:37'),
(29, 22, '2017-08-31 23:55:57', 'test2', '15040692521209159a64684d9ffa.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', NULL, NULL, NULL, '2017-08-30 05:00:54'),
(30, 22, '2017-09-12 23:50:34', 'test2', '15040693922285659a64710464d2.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2_MX40NTk0Nzc1Mn5-MTUwNTI1MDg0NzQ1MX5Sd2F1akswTi9LTU14VUtFcW5KZ0ZabUR-fg', 'T1==cGFydG5lcl9pZD00NTk0Nzc1MiZzaWc9MDUyNjM0MzQwN2MwNGY1ODQ1M2I3ODUwMmU0MWE1ZWE4Y2RjNjE1ODpzZXNzaW9uX2lkPTJfTVg0ME5UazBOemMxTW41LU1UVXdOVEkxTURnME56UTFNWDVTZDJGMWFrc3dUaTlMVFUxNFZVdEZjVzVLWjBaYWJVUi1mZyZjcmVhdGVfdGltZT0xNTA1MjUxMzkzJnJvbGU9cHVibGlzaGVyJm5vbmNlPTE1MDUyNTEzOTMuOTEzNzIxMzEyODU1ODA=', '92477133ee065069dd35b902495d32d6', '72ad2aa6-f07b-4813-9f61-85d39fb06345,349213f4-f3bc-4fff-a267-3134a6d91237,e0881aef-9855-40b3-9175-85f284799699,878b7fc5-3227-4c71-b8c1-c4ee94d8eb67,22846532-7f55-4594-a9e8-4cbdc6b2a753,d17b32dd-818f-4560-bc04-6ae7d34c665c,89658714-23a5-40e2-90a9-a005e20fa23e,68dcdf07-97bf-4404-b64a-4b02ed51ca4a,30dad7fc-a341-46c3-a2ab-8099e6380db4,c138d51a-78d5-4911-9ed3-7b9986c52b60,2920d18b-a61f-4c66-94b1-7aa52ba1f512,ce02041d-a7cf-4ee7-a11c-9a1db1af3458,077d462f-f4d1-4186-ba8e-401891841806', 3109, '2017-09-12 21:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@codeinsect.com', '$2y$10$WQQRBQDkxV/98bqK.24Dp.uMVS6KcztVqdwwTrOBLIWLSeSqE2gii', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2017-03-03 12:08:39'),
(2, 'manager@codeinsect.com', '$2y$10$quODe6vkNma30rcxbAHbYuKYAZQqUaflBgc4YpV9/90ywd.5Koklm', 'Manager', '9890098900', 2, 0, 1, '2016-12-09 17:49:56', 1, '2017-02-10 17:23:53'),
(3, 'employee@codeinsect.com', '$2y$10$M3ttjnzOV2lZSigBtP0NxuCtKRte70nc8TY5vIczYAQvfG/8syRze', 'Employee', '9890098900', 3, 0, 1, '2016-12-09 17:50:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_table`
--
ALTER TABLE `doctor_table`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

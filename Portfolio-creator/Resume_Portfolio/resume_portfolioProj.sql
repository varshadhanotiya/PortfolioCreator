-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 02:11 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resume_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cabbrs` varchar(5) NOT NULL DEFAULT 'C',
  `cnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `profile_id` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `addrerss` varchar(40) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `link` varchar(40) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cabbrs`, `cnum`, `userid`, `profile_id`, `first_name`, `last_name`, `addrerss`, `country`, `city`, `state`, `pincode`, `mobile_no`, `email_id`, `link`, `DOB`) VALUES
('C', 101, 1, 'C101', 'Deepali', 'kumari', 'P-122/2 ', 'British Indian Ocean', 'Jaipur', 'Chandigarh', 123456, '1212121212', 'asc@gmi.com', 'https://sdfs', '2000-10-20'),
('C', 119, 18, 'C119', 'Manjuda', 'kumari', 'P-122/2 Gothic line', 'India', 'Jaipur', 'Rajasthan', 785698, '4556344567', 'asc@gmi.com', 'https://sdfs', '2021-04-08'),
('C', 129, 21, 'C129', 'manju', 'kuamri', 'p-122', 'Åland Islands', 'jaipur', 'Daman and Diu', 343434, '1212121212', 'asc@gmi.com', 'https://sdfs', '2021-05-21'),
('C', 130, 28, 'C130', 'Deeksha', 'Singh', '200 West Prajapati road', 'India', 'Jaipur', 'Rajasthan', 343434, '3465767546', 'DeekshaSingh@gmi.com', 'https://deeksha.github.com', '1999-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cabbrs` varchar(5) NOT NULL DEFAULT 'CU',
  `cnum` int(5) NOT NULL,
  `c_id` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cabbrs`, `cnum`, `c_id`, `name`, `email`, `mobile`, `message`) VALUES
('CU', 1, 'CU1', 'manju', 'mk@gmail.com', '3445657890', 'Nice website'),
('CU', 3, 'CU3', 'Rawal', 'rawal@gmail.com', '5465346535', 'Hellooo!!'),
('CU', 7, 'CU7', 'soumya', 'jaiswal@gmail.com', '5656565656', 'Any queries'),
('CU', 9, 'CU9', 'deepakshi', 'depu@gmail.com', '3456235467', 'nice');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `eabbrs` varchar(5) NOT NULL DEFAULT 'E',
  `enums` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `edu_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`eabbrs`, `enums`, `userid`, `edu_id`) VALUES
('E', 2, 1, 'E2'),
('E', 5, 18, 'E5'),
('E', 7, 28, 'E7');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `expabbrs` varchar(5) NOT NULL DEFAULT 'EXP',
  `expnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `exp_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`expabbrs`, `expnum`, `userid`, `exp_id`) VALUES
('EXP', 4, 1, 'EXP4'),
('EXP', 5, 18, 'EXP5'),
('EXP', 6, 28, 'EXP6');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userid` int(10) NOT NULL,
  `fabbrs` varchar(5) NOT NULL DEFAULT 'FB',
  `fnum` int(5) NOT NULL,
  `fdbk_id` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `reaction` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userid`, `fabbrs`, `fnum`, `fdbk_id`, `email`, `comment`, `reaction`) VALUES
(18, 'FB', 5, 'FB5', 'deepali@gmail.com', 'Easy to use.', 'love'),
(18, 'FB', 6, 'FB6', 'mk@gmail.com', 'Very Helpfull!! Thanku for your hard work.', 'like'),
(1, 'FB', 7, 'FB7', 'rawal@gmail.com', 'this website make my work easy', 'love'),
(28, 'FB', 8, 'FB8', 'Deeksha@gmail.com', 'Nice Webiste!!', 'like'),
(1, 'FB', 9, 'FB9', 'fryad', 'heheheh', 'haha');

-- --------------------------------------------------------

--
-- Table structure for table `hard_skills`
--

CREATE TABLE `hard_skills` (
  `habbrs` varchar(5) NOT NULL DEFAULT 'H',
  `hnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `hard_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hard_skills`
--

INSERT INTO `hard_skills` (`habbrs`, `hnum`, `userid`, `hard_id`) VALUES
('H', 1, 1, 'H1'),
('H', 3, 18, 'H3'),
('H', 4, 28, 'H4');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `intabbrs` varchar(5) NOT NULL DEFAULT 'IT',
  `intnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `int_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`intabbrs`, `intnum`, `userid`, `int_id`) VALUES
('IT', 2, 1, 'IT2'),
('IT', 3, 18, 'IT3'),
('IT', 6, 28, 'IT6');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `userid` int(5) NOT NULL,
  `langabbrs` varchar(5) NOT NULL DEFAULT 'LG',
  `langnum` int(5) NOT NULL,
  `lang_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`userid`, `langabbrs`, `langnum`, `lang_id`) VALUES
(18, 'LG', 13, 'LG13'),
(28, 'LG', 14, 'LG14'),
(1, 'LG', 7, 'LG7');

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE `objective` (
  `oabbrs` varchar(5) NOT NULL DEFAULT 'B',
  `onum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `obj_id` varchar(10) NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`oabbrs`, `onum`, `userid`, `obj_id`, `summary`) VALUES
('B', 4, 1, 'B4', 'Self-motivated Web Development professional with 1+ years of experience looking for programming work with Codeworld Company utilizing unmatched computer science abilities.'),
('B', 5, 18, 'B5', 'Looking for job'),
('B', 6, 21, 'B6', 'I am a web developer.'),
('B', 7, 28, 'B7', 'I would like to be a part of an organization where I could use and enhance my knowledge and talent for the development of both the organization and myself.');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projabbrs` varchar(5) NOT NULL DEFAULT 'PR',
  `projnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `proj_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projabbrs`, `projnum`, `userid`, `proj_id`) VALUES
('PR', 4, 1, 'PR4'),
('PR', 5, 18, 'PR5'),
('PR', 6, 28, 'PR6');

-- --------------------------------------------------------

--
-- Table structure for table `resp_achieve`
--

CREATE TABLE `resp_achieve` (
  `resabbrs` varchar(5) NOT NULL DEFAULT 'RA',
  `resnum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `resach_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resp_achieve`
--

INSERT INTO `resp_achieve` (`resabbrs`, `resnum`, `userid`, `resach_id`) VALUES
('RA', 6, 1, 'RA6'),
('RA', 7, 18, 'RA7'),
('RA', 9, 28, 'RA9');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `userid` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`userid`, `username`, `emailid`, `password`, `role`) VALUES
(1, 'deepali', 'hsfd12@gmail.com', 'deepali@123', 0),
(18, 'manju', 'mk@gmail.com', '123we', 0),
(21, 'yo', 'yo@sdf.com', 'yoyoyo', 0),
(22, 'somu', 'somu@gmail.com', 'somu123', 0),
(24, 'Soumya', 'soumyajaiswal1999@gmail.com', 'hydrabad123@', 1),
(25, 'Bhankar', 'mkbhankar2000@gmail.com', 'mk123@123', 1),
(26, 'Varsha', 'varshadhanotiya7026@gmail.com', 'varsha@123', 1),
(27, 'Paridhi', 'upadhyayparidhi5@gmail.com ', 'pari@123', 1),
(28, 'Deeksha', 'deeksha1999@gmail.com', 'deeksha123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soft_skills`
--

CREATE TABLE `soft_skills` (
  `sabbrs` varchar(5) NOT NULL DEFAULT 'S',
  `snum` int(5) NOT NULL,
  `userid` int(5) NOT NULL,
  `soft_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `soft_skills`
--

INSERT INTO `soft_skills` (`sabbrs`, `snum`, `userid`, `soft_id`) VALUES
('S', 72, 1, 'S72'),
('S', 73, 18, 'S73'),
('S', 74, 28, 'S74');

-- --------------------------------------------------------

--
-- Table structure for table `subeducate`
--

CREATE TABLE `subeducate` (
  `edu_id` varchar(10) NOT NULL,
  `sch_col_name` varchar(30) NOT NULL,
  `location` varchar(40) NOT NULL,
  `degree` varchar(20) NOT NULL,
  `field_of_study` varchar(20) NOT NULL,
  `start_year` date NOT NULL,
  `end_year` date NOT NULL,
  `percentage` float NOT NULL,
  `subedu_abbrs` varchar(5) DEFAULT 'SEDU',
  `subedu_num` int(5) NOT NULL,
  `subedu_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subeducate`
--

INSERT INTO `subeducate` (`edu_id`, `sch_col_name`, `location`, `degree`, `field_of_study`, `start_year`, `end_year`, `percentage`, `subedu_abbrs`, `subedu_num`, `subedu_id`) VALUES
('E2', 'Banasthali', 'Jaipur', 'Undergraduate', 'BCA', '2018-07-09', '2020-05-05', 78.78, 'SEDU', 17, 'SEDU17'),
('E5', 'KVS', 'mumbai', 'Undergraduate', 'BCA', '2021-05-28', '2021-07-24', 99.99, 'SEDU', 22, 'SEDU22'),
('E5', 'Du', 'delhi', 'Postgraduate', 'mtech', '2021-07-10', '2021-07-09', 90.09, 'SEDU', 23, 'SEDU23'),
('E5', 'DC model', 'ambala', '10th', 'commerce', '2021-05-08', '2021-05-21', 80, 'SEDU', 24, 'SEDU24'),
('E5', 'LPU', 'punjab', 'other', 'Mcom', '2021-05-29', '2021-05-13', 67.67, 'SEDU', 25, 'SEDU25'),
('E7', 'KVS', 'Agra Cantt, UP', '12th', 'science', '2018-03-31', '2019-03-31', 83, 'SEDU', 27, 'SEDU27'),
('E7', 'Delhi University', 'delhi', 'Undergraduate', 'BSC', '2018-07-07', '2020-04-14', 90, 'SEDU', 28, 'SEDU28');

-- --------------------------------------------------------

--
-- Table structure for table `subexperience`
--

CREATE TABLE `subexperience` (
  `exp_id` varchar(10) NOT NULL,
  `subexp_abbrs` varchar(5) NOT NULL DEFAULT 'SEXP',
  `subexp_num` int(5) NOT NULL,
  `subexp_id` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `organization` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `start_yrs` date NOT NULL,
  `end_yrs` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subexperience`
--

INSERT INTO `subexperience` (`exp_id`, `subexp_abbrs`, `subexp_num`, `subexp_id`, `designation`, `organization`, `location`, `start_yrs`, `end_yrs`, `description`) VALUES
('EXP5', 'SEXP', 13, 'SEXP13', 'Backend developer', 'Fry', 'delhi', '2021-05-29', '2021-06-04', 'Byee!! Catch you later'),
('EXP5', 'SEXP', 14, 'SEXP14', 'UI deigner', 'Code', 'JK', '2021-05-06', '2021-05-28', 'Hello!! I am UI designer'),
('EXP6', 'SEXP', 15, 'SEXP15', 'Web developer', 'Grooming Technology', 'mumbai, India', '2019-12-14', '2020-04-14', 'Designed and develop user-friendly website as an intern.\r\nFixed bugs from existing websites.'),
('EXP4', 'SEXP', 9, 'SEXP9', 'web', 'cognit', 'delhi', '2021-06-04', '2021-05-26', 'web application');

-- --------------------------------------------------------

--
-- Table structure for table `subhard_skills`
--

CREATE TABLE `subhard_skills` (
  `hard_id` varchar(10) NOT NULL,
  `shabbrs` varchar(5) NOT NULL DEFAULT 'SH',
  `subhnum` int(5) NOT NULL,
  `sub_hid` varchar(10) NOT NULL,
  `sh_skill` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subhard_skills`
--

INSERT INTO `subhard_skills` (`hard_id`, `shabbrs`, `subhnum`, `sub_hid`, `sh_skill`) VALUES
('H4', 'SH', 10, 'SH10', 'Java'),
('H4', 'SH', 11, 'SH11', 'Php'),
('H1', 'SH', 4, 'SH4', 'C++'),
('H1', 'SH', 5, 'SH5', 'Java'),
('H1', 'SH', 6, 'SH6', 'Python'),
('H1', 'SH', 7, 'SH7', 'HTML'),
('H4', 'SH', 8, 'SH8', 'C'),
('H4', 'SH', 9, 'SH9', 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `subinterest`
--

CREATE TABLE `subinterest` (
  `int_id` varchar(10) NOT NULL,
  `subint_abbrs` varchar(5) NOT NULL DEFAULT 'SIT',
  `subint_num` int(5) NOT NULL,
  `subint_id` varchar(10) NOT NULL,
  `intname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subinterest`
--

INSERT INTO `subinterest` (`int_id`, `subint_abbrs`, `subint_num`, `subint_id`, `intname`) VALUES
('IT3', 'SIT', 12, 'SIT12', 'kdrama'),
('IT2', 'SIT', 15, 'SIT15', 'Singing'),
('IT2', 'SIT', 16, 'SIT16', 'Reading Books'),
('IT6', 'SIT', 17, 'SIT17', 'Dancing'),
('IT6', 'SIT', 18, 'SIT18', 'Singing');

-- --------------------------------------------------------

--
-- Table structure for table `sublangauge`
--

CREATE TABLE `sublangauge` (
  `lang_id` varchar(10) NOT NULL,
  `sublang_abbr` varchar(5) NOT NULL DEFAULT 'SLG',
  `sublang_num` int(5) NOT NULL,
  `sublang_id` varchar(10) NOT NULL,
  `lread` varchar(25) NOT NULL,
  `langname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sublangauge`
--

INSERT INTO `sublangauge` (`lang_id`, `sublang_abbr`, `sublang_num`, `sublang_id`, `lread`, `langname`) VALUES
('LG13', 'SLG', 23, 'SLG23', 'read,speak', 'Greek'),
('LG13', 'SLG', 24, 'SLG24', 'read', 'Italian'),
('LG7', 'SLG', 25, 'SLG25', 'read,write,speak', 'Hindi'),
('LG7', 'SLG', 26, 'SLG26', 'read,write,speak', 'English'),
('LG14', 'SLG', 27, 'SLG27', 'read,write,speak', 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `subproject`
--

CREATE TABLE `subproject` (
  `proj_id` varchar(10) NOT NULL,
  `subproj_abbrs` varchar(5) NOT NULL DEFAULT 'SUBPR',
  `subproj_num` int(5) NOT NULL,
  `subproj_id` varchar(10) NOT NULL,
  `projname` varchar(30) NOT NULL,
  `clientname` varchar(30) NOT NULL,
  `start_yrs` date NOT NULL,
  `end_yrs` date NOT NULL,
  `urls` varchar(40) NOT NULL,
  `progress` varchar(15) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subproject`
--

INSERT INTO `subproject` (`proj_id`, `subproj_abbrs`, `subproj_num`, `subproj_id`, `projname`, `clientname`, `start_yrs`, `end_yrs`, `urls`, `progress`, `description`) VALUES
('PR4', 'SUBPR', 5, 'SUBPR5', 'Image scanner', 'manju', '2020-02-29', '2021-03-11', 'http://sdscanner.com', 'finished', 'A website which helps you in scanner objects near you.'),
('PR5', 'SUBPR', 7, 'SUBPR7', 'sensor', 'son jonk ki', '2021-05-22', '2021-05-28', 'http://sd', 'finished', 'deadline'),
('PR6', 'SUBPR', 8, 'SUBPR8', 'Global Cosmetics Company:', 'lakme', '2020-02-14', '2020-06-14', 'http://GlobalCosmetic.org.com', 'inprogress', 'Developed API platform for segmentation, personalized recommendations and omni-channel messaging that reduced cart-abandonment rate by 37%, leading to a $1.25M increase in online sales within 90 days of solution launch.');

-- --------------------------------------------------------

--
-- Table structure for table `subres_achieve`
--

CREATE TABLE `subres_achieve` (
  `resach_id` varchar(10) NOT NULL,
  `subresabbrs` varchar(5) NOT NULL DEFAULT 'SUBRA',
  `subresnum` int(5) NOT NULL,
  `subresach_id` varchar(10) NOT NULL,
  `resach_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subres_achieve`
--

INSERT INTO `subres_achieve` (`resach_id`, `subresabbrs`, `subresnum`, `subresach_id`, `resach_name`) VALUES
('RA7', 'SUBRA', 24, 'SUBRA24', 'web certificated'),
('RA7', 'SUBRA', 26, 'SUBRA26', 'exercise'),
('RA7', 'SUBRA', 27, 'SUBRA27', 'yoga'),
('RA6', 'SUBRA', 28, 'SUBRA28', 'Won Gold medal in tennis'),
('RA6', 'SUBRA', 29, 'SUBRA29', 'Participated in seminar'),
('RA9', 'SUBRA', 30, 'SUBRA30', 'Re-organized something to make it work better.'),
('RA9', 'SUBRA', 31, 'SUBRA31', 'Developed or implemented new procedures or systems.');

-- --------------------------------------------------------

--
-- Table structure for table `subsoft_skills`
--

CREATE TABLE `subsoft_skills` (
  `soft_id` varchar(10) NOT NULL,
  `softskills` varchar(100) NOT NULL,
  `subsabbrs` varchar(5) DEFAULT 'SS',
  `subsnum` int(5) NOT NULL,
  `sub_sid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subsoft_skills`
--

INSERT INTO `subsoft_skills` (`soft_id`, `softskills`, `subsabbrs`, `subsnum`, `sub_sid`) VALUES
('S73', 'team', 'SS', 138, 'SS138'),
('S73', 'time', 'SS', 142, 'SS142'),
('S73', 'manag', 'SS', 143, 'SS143'),
('S72', 'leadership', 'SS', 144, 'SS144'),
('S72', 'team work', 'SS', 145, 'SS145'),
('S72', 'time management', 'SS', 146, 'SS146'),
('S74', 'hardworking', 'SS', 147, 'SS147'),
('S74', 'Interpersonal Skills', 'SS', 148, 'SS148');

-- --------------------------------------------------------

--
-- Table structure for table `userimage`
--

CREATE TABLE `userimage` (
  `userid` int(10) NOT NULL,
  `img_abbres` varchar(5) NOT NULL DEFAULT 'IMG',
  `img_num` int(5) NOT NULL,
  `img_id` varchar(10) NOT NULL,
  `img_source` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userimage`
--

INSERT INTO `userimage` (`userid`, `img_abbres`, `img_num`, `img_id`, `img_source`) VALUES
(1, 'IMG', 1, 'IMG1', 0x75736572696d616765732f576861747341707020496d61676520323032312d30352d31322061742031372e30352e3437202831292e6a706567),
(22, 'IMG', 13, 'IMG13', 0x75736572696d616765732f576861747341707020496d61676520323032312d30352d31322061742031372e30352e3437202831292e6a706567),
(18, 'IMG', 14, 'IMG14', 0x75736572696d616765732f576861747341707020496d61676520323032312d30352d31322061742031372e30352e3437202831292e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `cnum` (`cnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `cnum` (`cnum`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`),
  ADD UNIQUE KEY `enums` (`enums`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exp_id`),
  ADD UNIQUE KEY `expnum` (`expnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fdbk_id`),
  ADD UNIQUE KEY `fnum` (`fnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `hard_skills`
--
ALTER TABLE `hard_skills`
  ADD PRIMARY KEY (`hard_id`),
  ADD UNIQUE KEY `hnum` (`hnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`int_id`),
  ADD UNIQUE KEY `intnum` (`intnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`lang_id`),
  ADD UNIQUE KEY `langnum` (`langnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`obj_id`),
  ADD UNIQUE KEY `onum` (`onum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`proj_id`),
  ADD UNIQUE KEY `projnum` (`projnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `resp_achieve`
--
ALTER TABLE `resp_achieve`
  ADD PRIMARY KEY (`resach_id`),
  ADD UNIQUE KEY `resnum` (`resnum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD PRIMARY KEY (`soft_id`),
  ADD UNIQUE KEY `snum` (`snum`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `subeducate`
--
ALTER TABLE `subeducate`
  ADD PRIMARY KEY (`subedu_id`),
  ADD UNIQUE KEY `subedu_num` (`subedu_num`),
  ADD KEY `edu_id` (`edu_id`);

--
-- Indexes for table `subexperience`
--
ALTER TABLE `subexperience`
  ADD PRIMARY KEY (`subexp_id`),
  ADD UNIQUE KEY `subexp_num` (`subexp_num`),
  ADD KEY `exp_id` (`exp_id`);

--
-- Indexes for table `subhard_skills`
--
ALTER TABLE `subhard_skills`
  ADD PRIMARY KEY (`sub_hid`),
  ADD UNIQUE KEY `subhnum` (`subhnum`),
  ADD KEY `hard_id` (`hard_id`);

--
-- Indexes for table `subinterest`
--
ALTER TABLE `subinterest`
  ADD PRIMARY KEY (`subint_id`),
  ADD UNIQUE KEY `subint_num` (`subint_num`),
  ADD KEY `int_id` (`int_id`);

--
-- Indexes for table `sublangauge`
--
ALTER TABLE `sublangauge`
  ADD PRIMARY KEY (`sublang_id`),
  ADD UNIQUE KEY `sublang_num` (`sublang_num`),
  ADD KEY `lang_id` (`lang_id`);

--
-- Indexes for table `subproject`
--
ALTER TABLE `subproject`
  ADD PRIMARY KEY (`subproj_id`),
  ADD UNIQUE KEY `subproj_num` (`subproj_num`),
  ADD KEY `proj_id` (`proj_id`);

--
-- Indexes for table `subres_achieve`
--
ALTER TABLE `subres_achieve`
  ADD PRIMARY KEY (`subresach_id`),
  ADD UNIQUE KEY `subresnum` (`subresnum`),
  ADD KEY `resach_id` (`resach_id`);

--
-- Indexes for table `subsoft_skills`
--
ALTER TABLE `subsoft_skills`
  ADD PRIMARY KEY (`sub_sid`),
  ADD UNIQUE KEY `subsnum` (`subsnum`),
  ADD KEY `soft_id` (`soft_id`);

--
-- Indexes for table `userimage`
--
ALTER TABLE `userimage`
  ADD PRIMARY KEY (`img_id`),
  ADD UNIQUE KEY `img_num` (`img_num`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `enums` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `expnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hard_skills`
--
ALTER TABLE `hard_skills`
  MODIFY `hnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `intnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `langnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `objective`
--
ALTER TABLE `objective`
  MODIFY `onum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `resp_achieve`
--
ALTER TABLE `resp_achieve`
  MODIFY `resnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `soft_skills`
--
ALTER TABLE `soft_skills`
  MODIFY `snum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `subeducate`
--
ALTER TABLE `subeducate`
  MODIFY `subedu_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subexperience`
--
ALTER TABLE `subexperience`
  MODIFY `subexp_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subhard_skills`
--
ALTER TABLE `subhard_skills`
  MODIFY `subhnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subinterest`
--
ALTER TABLE `subinterest`
  MODIFY `subint_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sublangauge`
--
ALTER TABLE `sublangauge`
  MODIFY `sublang_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subproject`
--
ALTER TABLE `subproject`
  MODIFY `subproj_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subres_achieve`
--
ALTER TABLE `subres_achieve`
  MODIFY `subresnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subsoft_skills`
--
ALTER TABLE `subsoft_skills`
  MODIFY `subsnum` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `userimage`
--
ALTER TABLE `userimage`
  MODIFY `img_num` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `language`
--
ALTER TABLE `language`
  ADD CONSTRAINT `language_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `objective`
--
ALTER TABLE `objective`
  ADD CONSTRAINT `objective_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `resp_achieve`
--
ALTER TABLE `resp_achieve`
  ADD CONSTRAINT `resp_achieve_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `soft_skills`
--
ALTER TABLE `soft_skills`
  ADD CONSTRAINT `soft_skills_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);

--
-- Constraints for table `subeducate`
--
ALTER TABLE `subeducate`
  ADD CONSTRAINT `subeducate_ibfk_1` FOREIGN KEY (`edu_id`) REFERENCES `education` (`edu_id`);

--
-- Constraints for table `subexperience`
--
ALTER TABLE `subexperience`
  ADD CONSTRAINT `subexperience_ibfk_1` FOREIGN KEY (`exp_id`) REFERENCES `experience` (`exp_id`);

--
-- Constraints for table `subinterest`
--
ALTER TABLE `subinterest`
  ADD CONSTRAINT `subinterest_ibfk_1` FOREIGN KEY (`int_id`) REFERENCES `interest` (`int_id`);

--
-- Constraints for table `sublangauge`
--
ALTER TABLE `sublangauge`
  ADD CONSTRAINT `sublangauge_ibfk_1` FOREIGN KEY (`lang_id`) REFERENCES `language` (`lang_id`);

--
-- Constraints for table `subproject`
--
ALTER TABLE `subproject`
  ADD CONSTRAINT `subproject_ibfk_1` FOREIGN KEY (`proj_id`) REFERENCES `project` (`proj_id`);

--
-- Constraints for table `subres_achieve`
--
ALTER TABLE `subres_achieve`
  ADD CONSTRAINT `subres_achieve_ibfk_1` FOREIGN KEY (`resach_id`) REFERENCES `resp_achieve` (`resach_id`);

--
-- Constraints for table `subsoft_skills`
--
ALTER TABLE `subsoft_skills`
  ADD CONSTRAINT `subsoft_skills_ibfk_1` FOREIGN KEY (`soft_id`) REFERENCES `soft_skills` (`soft_id`);

--
-- Constraints for table `userimage`
--
ALTER TABLE `userimage`
  ADD CONSTRAINT `userimage_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `signup` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

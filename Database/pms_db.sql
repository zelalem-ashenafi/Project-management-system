-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 08:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1+admin , 2 = users'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Administrator', 'admin', 'admin123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE `advisors` (
  `adv_id` varchar(6) NOT NULL,
  `adv_name` varchar(30) NOT NULL,
  `adv_phone` int(11) NOT NULL,
  `student_id` varchar(12) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `dept` varchar(35) NOT NULL,
  `isactivated` bit(1) NOT NULL DEFAULT b'0',
  `isnew` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`adv_id`, `adv_name`, `adv_phone`, `student_id`, `password`, `dept`, `isactivated`, `isnew`) VALUES
('adv01', 'Asrat Wondesen', 913345678, '', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('adv02', 'Gemechu Feysa', 941151515, '', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('adv03', 'Hirut Abera', 923234547, '', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('adv04', 'Alemneh Geta', 929050523, '', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('adv05', 'Hewan Gebru', 924454545, '', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `annoncements`
--

CREATE TABLE `annoncements` (
  `annonce_id` int(11) NOT NULL,
  `sender` varchar(25) NOT NULL,
  `receiver` varchar(25) NOT NULL,
  `Dept_name` varchar(25) DEFAULT NULL,
  `st_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `announce_text` varchar(250) DEFAULT NULL,
  `file_name` varchar(150) NOT NULL,
  `isread` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `committee_ID` varchar(5) NOT NULL,
  `committee_rep` varchar(30) NOT NULL,
  `committee_list` varchar(250) NOT NULL,
  `college` varchar(25) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `isactivated` bit(1) NOT NULL DEFAULT b'0',
  `isnew` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`committee_ID`, `committee_rep`, `committee_list`, `college`, `password`, `isactivated`, `isnew`) VALUES
('com01', 'Asefa Siraj', 'Asefa Siraj,Moges Girma,Ahmed Jemal', 'Computing College', 'e9bc0e13a8a16cbb07b175d92a113126', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_ID` varchar(15) NOT NULL,
  `department_head` varchar(30) NOT NULL,
  `Department` varchar(25) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `isactivated` bit(1) NOT NULL DEFAULT b'0',
  `isnew` bit(1) NOT NULL DEFAULT b'1',
  `giveCommittee` bit(1) NOT NULL DEFAULT b'0',
  `adv_mark` int(11) NOT NULL DEFAULT 20,
  `pres_mark` int(11) NOT NULL DEFAULT 25,
  `totpres_mark` int(11) NOT NULL DEFAULT 15,
  `doc_mark` int(11) NOT NULL DEFAULT 40,
  `isshow` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_ID`, `department_head`, `Department`, `password`, `isactivated`, `isnew`, `giveCommittee`, `adv_mark`, `pres_mark`, `totpres_mark`, `doc_mark`, `isshow`) VALUES
('Dep01', 'Alebachew', 'information system', 'e9bc0e13a8a16cbb07b175d92a113126', b'1', b'1', b'0', 0, 0, 0, 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `evaluators`
--

CREATE TABLE `evaluators` (
  `ev_id` varchar(6) NOT NULL,
  `ev_name` varchar(30) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `dept` varchar(35) NOT NULL,
  `isactivated` bit(1) NOT NULL DEFAULT b'0',
  `isnew` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluators`
--

INSERT INTO `evaluators` (`ev_id`, `ev_name`, `password`, `dept`, `isactivated`, `isnew`) VALUES
('eva01', 'Helen Bedlu', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('eva02', 'Kinde Asefa', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('eva03', 'Girma Tefera', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('eva04', 'Abdela Ahmed', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1'),
('eva05', 'Rahel Getachew', 'e9bc0e13a8a16cbb07b175d92a113126', 'information system', b'1', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `groupmembers`
--

CREATE TABLE `groupmembers` (
  `stud_id` varchar(13) NOT NULL,
  `stud_name` varchar(30) NOT NULL,
  `mark_presentation` double NOT NULL,
  `mark_ipresentation` int(11) NOT NULL,
  `mark_documentation` double NOT NULL,
  `mark_advisor` double NOT NULL,
  `leader_id` varchar(12) NOT NULL,
  `mark_total` double GENERATED ALWAYS AS (`mark_presentation` + `mark_ipresentation` + `mark_documentation` + `mark_advisor`) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `repository`
--

CREATE TABLE `repository` (
  `doc_id` int(11) NOT NULL,
  `proj_title` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `project_file` varchar(150) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repository`
--

INSERT INTO `repository` (`doc_id`, `proj_title`, `year`, `dept`, `project_file`, `rating`) VALUES
(34, 'LAN design for DBU', 2022, 'Information system', 'OB chapter 1.docx', 4.4),
(35, 'PMS', 2022, 'Information system', 'GROUPE ONE.docx', 5),
(84, 'LAN design for DBU', 2022, 'history', 'photo_2022-07-26_10-24-11.pdf', 4.5),
(86, 'OB', 2022, 'Information system', 'Organizational behavior.docx', 3.5),
(87, 'CCNA', 2022, 'information system', 'CISCO.docx', 3.8),
(88, 'Online Therapy', 2022, 'information system', 'Online Theraphy.docx', 2.5),
(90, 'Kebele Record Management', 2022, 'information system', 'Kebele Record Management.docx', 2),
(91, 'online  shopping', 2022, 'information system', 'online shoping.docx', 2.6),
(92, 'R&PMS', 2022, 'information system', 'RPMS.docx', 2.5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` varchar(12) NOT NULL,
  `stud_name` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `isactivated` bit(1) NOT NULL DEFAULT b'0',
  `isnew` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stud_eva`
--

CREATE TABLE `stud_eva` (
  `stud_id` varchar(12) NOT NULL,
  `ev_id` varchar(6) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `Proj_ID` int(11) NOT NULL,
  `Group_name` varchar(15) NOT NULL,
  `Leader_ID` varchar(25) NOT NULL,
  `title_file` varchar(250) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `tsubmission_date` datetime NOT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `Advisor` varchar(30) NOT NULL,
  `main_file` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisors`
--
ALTER TABLE `advisors`
  ADD PRIMARY KEY (`adv_id`);

--
-- Indexes for table `annoncements`
--
ALTER TABLE `annoncements`
  ADD PRIMARY KEY (`annonce_id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`committee_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_ID`);

--
-- Indexes for table `evaluators`
--
ALTER TABLE `evaluators`
  ADD PRIMARY KEY (`ev_id`);

--
-- Indexes for table `groupmembers`
--
ALTER TABLE `groupmembers`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `repository`
--
ALTER TABLE `repository`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `stud_eva`
--
ALTER TABLE `stud_eva`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`Proj_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `annoncements`
--
ALTER TABLE `annoncements`
  MODIFY `annonce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=419;

--
-- AUTO_INCREMENT for table `repository`
--
ALTER TABLE `repository`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `stud_eva`
--
ALTER TABLE `stud_eva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `Proj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

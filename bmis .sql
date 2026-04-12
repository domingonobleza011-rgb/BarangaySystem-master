-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2026 at 04:27 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `email`, `password`, `lname`, `fname`, `mi`, `role`) VALUES
(5, 'sanpedroiriga@gmail.com', '$2y$10$/XSpSj/6Zp.wAsXxJMqRsuSkC4Dr1Wbq9Y0OHkd0n8DSvUgkVkPNm', 'This', 'Is', 'Admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id_announcement` int NOT NULL,
  `event` varchar(1000) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `addedby` varchar(255) NOT NULL,
  `status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id_announcement`, `event`, `target`, `start_date`, `addedby`, `status`) VALUES
(17, 'dvfbdgnn', NULL, '2026-04-09', 'This, Is', 'archived'),
(20, 'fbtdvsvra', NULL, '2026-04-11', 'This, Is', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `id_blotter` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `blot_photo` mediumblob NOT NULL,
  `contact` varchar(20) NOT NULL,
  `narrative` mediumtext NOT NULL,
  `timeapplied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_blotter`
--

INSERT INTO `tbl_blotter` (`id_blotter`, `id_resident`, `lname`, `fname`, `mi`, `houseno`, `street`, `brgy`, `municipal`, `blot_photo`, `contact`, `narrative`, `timeapplied`) VALUES
(6, 41, 'domdom', 'US-Letter', '(', '111', 'El Chapo', 'sagrada', 'iriga', 0x657573656269612e6a7067, '09070560963', 'vtgujulughrevrhtdweefbwdwdetgtyrgr', '2026-03-30 12:40:37'),
(7, 41, 'domdom', 'US-Letter', '(', '111', 'El Chapo', 'sagrada', 'iriga', 0x657573656269612e6a7067, '09070560963', 'bdgmgjk.hkgnrhykjvfryjteqfr', '2026-03-30 12:53:15'),
(12, 43, 'domdom', 'yoe bro', 'hanep an', '111', '222', 'sagrada', 'iriga', 0x49442e6a7067, '09070560963', 'efrhgmy', '2026-04-02 09:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brgyid`
--

CREATE TABLE `tbl_brgyid` (
  `id_brgyid` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `bdate` varchar(255) NOT NULL,
  `res_photo` varchar(255) DEFAULT NULL,
  `inc_lname` varchar(255) NOT NULL,
  `inc_fname` varchar(255) NOT NULL,
  `inc_mi` varchar(255) NOT NULL,
  `inc_contact` varchar(255) NOT NULL,
  `inc_houseno` varchar(255) NOT NULL,
  `inc_street` varchar(255) NOT NULL,
  `inc_brgy` varchar(255) NOT NULL,
  `inc_municipal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_brgyid`
--

INSERT INTO `tbl_brgyid` (`id_brgyid`, `id_resident`, `lname`, `fname`, `mi`, `houseno`, `street`, `brgy`, `municipal`, `bplace`, `bdate`, `res_photo`, `inc_lname`, `inc_fname`, `inc_mi`, `inc_contact`, `inc_houseno`, `inc_street`, `inc_brgy`, `inc_municipal`) VALUES
(8, 41, 'domdom', 'US-Letter', '(', '111', 'El Chapo', 'sagrada', 'iriga', 'hibago', '2005-03-20', NULL, 'x 11\")', 'US-Letter', '(', '09070560963', 'iriga', 'hibago', '2005-03-20', 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bspermit`
--

CREATE TABLE `tbl_bspermit` (
  `id_bspermit` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mi` varchar(255) DEFAULT NULL,
  `bsname` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(252) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `bsindustry` varchar(255) DEFAULT NULL,
  `aoe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_bspermit`
--

INSERT INTO `tbl_bspermit` (`id_bspermit`, `id_resident`, `lname`, `fname`, `mi`, `bsname`, `houseno`, `street`, `brgy`, `municipal`, `bsindustry`, `aoe`) VALUES
(7, 41, 'domdom', 'US-Letter', '(', 'regegr', '111', 'El Chapo', 'sagrada', 'iriga', 'Mining', 465768);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clearance`
--

CREATE TABLE `tbl_clearance` (
  `id_clearance` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_clearance`
--

INSERT INTO `tbl_clearance` (`id_clearance`, `id_resident`, `lname`, `fname`, `mi`, `purpose`, `houseno`, `street`, `brgy`, `municipal`, `status`, `age`) VALUES
(3, 41, 'domdom', 'US-Letter', '(', 'Business Requirement', '111', 'El Chapo', 'sagrada', 'iriga', 'In a relationship', '18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hidden_announcements`
--

CREATE TABLE `tbl_hidden_announcements` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `announcement_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_hidden_announcements`
--

INSERT INTO `tbl_hidden_announcements` (`id`, `user_id`, `announcement_id`) VALUES
(1, 44, 19),
(2, 47, 19),
(3, NULL, 18),
(4, NULL, 17),
(5, NULL, 17),
(6, NULL, 17),
(7, NULL, 16),
(8, NULL, 17),
(9, NULL, 17),
(10, 44, 21),
(11, 44, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_indigency`
--

CREATE TABLE `tbl_indigency` (
  `id_indigency` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_indigency`
--

INSERT INTO `tbl_indigency` (`id_indigency`, `id_resident`, `lname`, `fname`, `mi`, `nationality`, `houseno`, `street`, `brgy`, `municipal`, `purpose`, `date`) VALUES
(3, 40, 'x 11', 'US-Letter', '(', 'batman', 'Blk. 14 Lot 25', 'El Chapo', 'sagrada', 'iriga', 'Job/Employment', '2005-03-20'),
(6, 41, 'domdom', 'US-Letter', '(', 'batman', '111', 'El Chapo', 'sagrada', 'iriga', 'Scholarship', '2005-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rescert`
--

CREATE TABLE `tbl_rescert` (
  `id_rescert` int NOT NULL,
  `id_resident` int NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `houseno` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rescert`
--

INSERT INTO `tbl_rescert` (`id_rescert`, `id_resident`, `lname`, `fname`, `mi`, `age`, `nationality`, `houseno`, `street`, `brgy`, `municipal`, `date`, `purpose`, `remarks`) VALUES
(111114, 41, 'domdom', 'US-Letter', '(', '18', 'batman', '111', 'El Chapo', 'sagrada', 'iriga', '2005-03-20', 'Business Establishment', ''),
(111115, 41, 'domdom', 'US-Letter', '(', '18', 'batman', '111', 'El Chapo', 'sagrada', 'iriga', '2005-03-20', 'Financial Transaction', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `id_resident` int NOT NULL,
  `res_photo` mediumblob,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `houseno` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `brgy` varchar(255) DEFAULT NULL,
  `municipal` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `bplace` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `family_role` varchar(255) NOT NULL,
  `voter` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `addedby` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`id_resident`, `res_photo`, `email`, `password`, `lname`, `fname`, `mi`, `age`, `sex`, `status`, `houseno`, `street`, `brgy`, `municipal`, `address`, `contact`, `bdate`, `bplace`, `nationality`, `family_role`, `voter`, `role`, `addedby`) VALUES
(44, NULL, 'sanpedroiriga@gmail.com', '$2y$10$U9NwKWS1EvsU2pptHVNKc.rN0OIJz3OffD93kPSrmj/eVnlq5g59q', 'tttbtg', 'efegr', 'egr', 23, 'Male', 'Single', 'efvsb', 'tntnuyu', 'San Pedrotyntynt', 'tyntyny', NULL, '09345678993', '2026-04-20', 'tntgdt', 'rbreb', 'Yes', 'Yes', 'resident', NULL),
(45, NULL, 'domingo@gmail.com', '$2y$10$l4lLh9egSDMvKztOCdU9Le9tEkoDC.Hl6vXwsSbA6rHy.zFwxcT4C', 'tttbtg', 'efegr', 'egr', 23, 'Male', 'Widowed', 'efvsb', 'tntnuyu', 'San Pedro', 'tyntyny', NULL, '09345678993', '2026-04-01', 'tntgdt', 'rbreb', 'Yes', 'Yes', 'resident', NULL),
(46, NULL, 'jeanrosenosipeda@gmail.com', '$2y$10$LjwvLAS62dT4TGsH51FVjubGqCCHL3y64l/a1SNGohqa9xP2Utqaa', 'x 11\")', 'US-Letter', '(', 18, 'Male', 'Single', 'Blk. 14 Lot 25', 'El Chapo', 'San Pedro', '11xc', NULL, '09070569634', '2026-04-01', 'hibago', 'rety', 'No', 'Yes', 'resident', 'Resident'),
(47, NULL, 'jeanrose@gmail.com', '$2y$10$6mA5wDiT272se0OHXvZRO.0dHJvMEmSi47meATDHQUI/D00ruW7Vu', 'x 11\")', 'US-Letter', '(', 18, 'Female', 'Widowed', 'Blk. 14 Lot 25', 'El Chapo', 'San Pedro', '11xc', NULL, '09070569634', '2026-04-01', 'hibago', 'rety', 'Yes', 'Yes', 'resident', 'Resident');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `addedby` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`, `lname`, `fname`, `mi`, `age`, `sex`, `address`, `contact`, `position`, `role`, `addedby`, `photo`) VALUES
(25, 'jenay@gmail.com', '$2y$10$cWTZbq6/JR5GxOYJ3b/EzOZ.x0Qgrijma0LV.bgIzhMkoCqvc7F9S', 'meow', 'meme', 'IOTAC', 18, 'Female', 'Sagrada, Iriga', '09070560963', 'Committee on Peace and Order', 'user', 'This, Is', 'uploads/1775869709_toolk-qr-code.png'),
(26, 'jenay@gmail.com', '$2y$10$TjYLzvzpgrK3zQr0Y/dSqO2oqoPyUoTFq.3fhyp5XlqHs0RHcLf96', 'meow', 'meme', 'IOTAC', 18, 'Female', 'Sagrada, Iriga', '09070560963', 'Committee on Tourism', 'user', 'This, Is', 'uploads/1775874111_eusebia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_youth`
--

CREATE TABLE `tbl_youth` (
  `id_youth` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mi` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `civil_status` enum('Single','Married','Solo Parent','Widowed') NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `educ_attain` varchar(100) NOT NULL,
  `emp_status` enum('Employed','Unemployed','Self-Employed','Student') NOT NULL,
  `skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_youth`
--

INSERT INTO `tbl_youth` (`id_youth`, `fname`, `lname`, `mi`, `age`, `sex`, `civil_status`, `contact_number`, `email_address`, `educ_attain`, `emp_status`, `skill_name`) VALUES
(7, 'US-Letter', 'x 11\")', '(', '18', 'Male', 'Single', '09070560963', 'domingonobleza011@gmail.com', 'college graduate', 'Employed', 'magkakan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`id_blotter`);

--
-- Indexes for table `tbl_brgyid`
--
ALTER TABLE `tbl_brgyid`
  ADD PRIMARY KEY (`id_brgyid`);

--
-- Indexes for table `tbl_bspermit`
--
ALTER TABLE `tbl_bspermit`
  ADD PRIMARY KEY (`id_bspermit`);

--
-- Indexes for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  ADD PRIMARY KEY (`id_clearance`);

--
-- Indexes for table `tbl_hidden_announcements`
--
ALTER TABLE `tbl_hidden_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_indigency`
--
ALTER TABLE `tbl_indigency`
  ADD PRIMARY KEY (`id_indigency`);

--
-- Indexes for table `tbl_rescert`
--
ALTER TABLE `tbl_rescert`
  ADD PRIMARY KEY (`id_rescert`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`id_resident`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_youth`
--
ALTER TABLE `tbl_youth`
  ADD PRIMARY KEY (`id_youth`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id_announcement` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `id_blotter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_brgyid`
--
ALTER TABLE `tbl_brgyid`
  MODIFY `id_brgyid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_bspermit`
--
ALTER TABLE `tbl_bspermit`
  MODIFY `id_bspermit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_clearance`
--
ALTER TABLE `tbl_clearance`
  MODIFY `id_clearance` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_hidden_announcements`
--
ALTER TABLE `tbl_hidden_announcements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_indigency`
--
ALTER TABLE `tbl_indigency`
  MODIFY `id_indigency` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_rescert`
--
ALTER TABLE `tbl_rescert`
  MODIFY `id_rescert` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111116;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `id_resident` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_youth`
--
ALTER TABLE `tbl_youth`
  MODIFY `id_youth` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

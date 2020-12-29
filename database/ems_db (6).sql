-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 21, 2020 at 07:42 AM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems_db`
--
CREATE DATABASE IF NOT EXISTS `ems_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ems_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
CREATE TABLE IF NOT EXISTS `admin_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `date` date DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `employee` text,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_notifications`
--

DROP TABLE IF EXISTS `emp_notifications`;
CREATE TABLE IF NOT EXISTS `emp_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `date` text,
  `emp_id` int(11) DEFAULT NULL,
  `admin` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_notifications`
--

INSERT INTO `emp_notifications` (`id`, `content`, `date`, `emp_id`, `admin`) VALUES
(5, 'New task has been assigned to you', 'October 15, 2020, 3:01 pm', 20037, 'ted gumede'),
(4, 'New task has been assigned to you', 'October 15, 2020, 2:52 pm', 20037, 'tebza Manyora'),
(6, 'New task ', 'October 15, 2020, 3:05 pm', 20037, 'ted gumede'),
(7, 'New task ', 'October 19, 2020, 9:33 am', 20038, 'tebza Manyora');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `SURNAME` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_NUMBER` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PHONE_NUMBER` char(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `EMAIL` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `USERNAME` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PASSWORD` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20015 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`ADMIN_ID`, `NAME`, `SURNAME`, `ID_NUMBER`, `PHONE_NUMBER`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
(20009, 'test', 'test', '2345345345', '0626422830', 'kapendakisala@gmail.com', 'oelif@mail.com', '$2y$10$jr0ki5x6p2rijDenWm29mO51y414MjWRgTD22koBkzFK.BTS8iJtS'),
(20010, 'test', 'test', '542345234', '32423423', 'teddy@mail.com', 'fundi@gmail.com', '$2y$10$QLBhKFNvz2ukg4GPmFFjeuLcOLxeDYcQ.zXcHkOeSQDH16CS1GMKy'),
(20012, 'Teddy', 'Kisala', '78652345677', '0626422830', 'teddykisala@gmail.com', 'kisala@sxm.co.za', '$2y$10$KPX5TvANZbP81D3.tomJQO2Jkc3uFpLdQOfoTqvocOVtAz3lqsfjy'),
(20013, 'tebza', 'Manyora', '232323', '0626422830', 'lenyorakisala@gmail.com', 'tebza@smx.co.za', '$2y$10$r82KxAT7yDm1KfgKLqbZvOI5fu0YCFGbqHhvXOIFJAxG4Mk8kaLqG'),
(20014, 'billy', 'mike', '123124214', '12421421', 'billy@mail.com', 'billy@sxm.co.za', '$2y$10$9fEXYk8fB4jpnwq4LHPQY.IRbYuWIe4kgaqAvGTz1uNcBxAMsujCm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcements`
--

DROP TABLE IF EXISTS `tbl_announcements`;
CREATE TABLE IF NOT EXISTS `tbl_announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(50) NOT NULL,
  `time` timestamp NOT NULL,
  `Agenda` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_announcements`
--

INSERT INTO `tbl_announcements` (`id`, `Date`, `time`, `Agenda`) VALUES
(7, '23/09/2020', '2020-10-10 11:03:00', 'Permance report due'),
(6, '23/09/2020', '2020-10-08 15:19:53', 'meeting on tuesday 30 october at 10pm'),
(8, '23/09/2020', '2020-10-19 07:41:33', 'meeting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `emp_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(175) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `surname` varchar(75) NOT NULL,
  `EMAIL_ADDRESS` varchar(150) DEFAULT NULL,
  `ID_NUMBER` char(20) DEFAULT NULL,
  `PHONE_NUMBER` char(13) DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `START_DATE` text,
  `SALARY` decimal(10,2) DEFAULT NULL,
  `ADDRESS_1` text,
  `ADDRESS_2` text,
  `CITY` text,
  `ZIP` char(5) DEFAULT NULL,
  `USERNAME` varchar(75) DEFAULT NULL,
  `PASSWORD` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`emp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20040 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_ID`, `Name`, `surname`, `EMAIL_ADDRESS`, `ID_NUMBER`, `PHONE_NUMBER`, `GENDER`, `AGE`, `position`, `START_DATE`, `SALARY`, `ADDRESS_1`, `ADDRESS_2`, `CITY`, `ZIP`, `USERNAME`, `PASSWORD`) VALUES
(20037, 'ted', 'gumede', 'devted19@gmail.com', '2342343', '34234', 'Male', 22, 'Mechanic', '2020-10-16', '234324.00', '149 high street Rosettenvilve', '', 'Johannesburg', '2190', 'tedgumede23@sxm.co.za', '$2y$10$gdTr78AWMwRSIdhVaiuf0uItmGwFeVTCU9ikPg7fgub8wE7pDdPGO'),
(20038, 'jared', 'Maake', 'kapendakisala@gmail.com', '3212214', '1241421', 'Male', 22, 'Mechanic', '2020-10-09', '4123421.00', '14212', '', 'Johannesburg', '2190', 'jerrymaake53@sxm.co.za', '$2y$10$Fu0MJI8.AcfqNzEcm9/ZfuBIM3usE1teKVT7yy0q283wRuteGDDmC'),
(20039, 'ted', 'dev', '18012621@rcconnect.co.za', '213213', '21321', 'Male', 22, 'Cleaner', '2020-10-16', '123123.00', '149 high street Rosettenvilve', '', 'Johannesburg', '2190', 'teddev23@sxm.co.za', '$2y$10$Hof8m8qf2GIlMvlJeLT.b.egH/LJ4pgpbv2vvO4eemdo/6usNHiOa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_increaserequest`
--

DROP TABLE IF EXISTS `tbl_increaserequest`;
CREATE TABLE IF NOT EXISTS `tbl_increaserequest` (
  `Req_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(75) DEFAULT NULL,
  `Emp_surname` varchar(75) DEFAULT NULL,
  `Position` varchar(75) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `Current_Salary` int(11) DEFAULT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Req_ID`),
  KEY `emp_ID` (`emp_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

DROP TABLE IF EXISTS `tbl_leave`;
CREATE TABLE IF NOT EXISTS `tbl_leave` (
  `leave_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Name` varchar(75) DEFAULT NULL,
  `Emp_surname` varchar(75) DEFAULT NULL,
  `Reason` varchar(75) DEFAULT NULL,
  `Number_of_Days` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`leave_ID`),
  KEY `emp_id` (`emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meetings`
--

DROP TABLE IF EXISTS `tbl_meetings`;
CREATE TABLE IF NOT EXISTS `tbl_meetings` (
  `Meeting_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(75) DEFAULT NULL,
  `Meeting_Date` date DEFAULT NULL,
  `Start_time` time DEFAULT NULL,
  `End_time` time DEFAULT NULL,
  PRIMARY KEY (`Meeting_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_meetings`
--

INSERT INTO `tbl_meetings` (`Meeting_ID`, `Subject`, `Meeting_Date`, `Start_time`, `End_time`) VALUES
(1, NULL, '2020-10-20', '12:23:00', '13:23:00'),
(2, 'staff', '2020-10-21', '14:24:00', '15:26:00'),
(3, 'new email and pass', '2020-10-20', '12:36:00', '13:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE IF NOT EXISTS `tbl_report` (
  `Report_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Report_name` varchar(75) DEFAULT NULL,
  `Emp_Name` varchar(75) DEFAULT NULL,
  `Emp_surname` varchar(75) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Position` varchar(75) DEFAULT NULL,
  `Job_Description` varchar(120) DEFAULT NULL,
  `Goals` varchar(75) DEFAULT NULL,
  `Comments` varchar(275) DEFAULT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Report_ID`),
  KEY `emp_ID` (`emp_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

DROP TABLE IF EXISTS `tbl_tasks`;
CREATE TABLE IF NOT EXISTS `tbl_tasks` (
  `task_ID` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(250) DEFAULT NULL,
  `task_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `duration` text NOT NULL,
  `employee` int(11) DEFAULT NULL,
  `description` text,
  `progress` int(11) NOT NULL,
  PRIMARY KEY (`task_ID`),
  KEY `employee` (`employee`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_ID`, `task_name`, `task_date`, `deadline`, `duration`, `employee`, `description`, `progress`) VALUES
(14, 'Hose removal', '2020-10-22', '2020-10-30', '8', 20037, 'Remove current hose', 0),
(13, 'Hose replacement', '2020-10-14', '2020-10-16', '2', 20037, 'Replace old Hose and install new ones ', 0),
(12, 'Pipe intallation', '2020-10-22', '2020-10-16', '6', 20037, 'Replace old Pipes and install new ones ', 0),
(15, 'bob', '2020-10-21', '2020-10-15', '6', 20038, 'test pipes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheet`
--

DROP TABLE IF EXISTS `tbl_timesheet`;
CREATE TABLE IF NOT EXISTS `tbl_timesheet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `Start_Time` text,
  `Finish_Time` text,
  `Regular_Hours` int(11) DEFAULT NULL,
  `Overtime_Hours` int(11) DEFAULT NULL,
  `Totalworked_hours` int(11) DEFAULT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `emp_ID` (`emp_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=390 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_timesheet`
--

INSERT INTO `tbl_timesheet` (`ID`, `Date`, `Start_Time`, `Finish_Time`, `Regular_Hours`, `Overtime_Hours`, `Totalworked_hours`, `emp_ID`) VALUES
(387, '2020-10-22', '16:18', '19:18', 3, 3, 6, 20037),
(388, '2020-10-20', '16:43', '20:43', 4, 4, 8, 20038),
(389, '2020-10-23', '16:44', '22:44', 6, 0, 6, 20037);

DELIMITER $$
--
-- Events
--
DROP EVENT `prune_table`$$
CREATE DEFINER=`root`@`localhost` EVENT `prune_table` ON SCHEDULE EVERY 2 WEEK STARTS '2020-10-08 18:31:04' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM tbl_announcements WHERE time < NOW() - 120$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 07, 2022 at 03:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(50) DEFAULT NULL,
  `emp_num` int(11) NOT NULL,
  `date_assign` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `emp_num`, `date_assign`) VALUES
(200, 'Sales and Marketing', 10007, '2011-11-06'),
(201, 'Operations and Production', 10001, '2015-09-23'),
(202, 'Finance and Administration', 10015, '2014-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_num` int(11) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `sex` enum('M','F') DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `job_code` int(11) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `date_assign` date DEFAULT NULL,
  `emp_salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_num`, `first_name`, `last_name`, `sex`, `birth_date`, `job_code`, `dept_id`, `date_assign`, `emp_salary`) VALUES
(10001, 'Charles', 'Miller', 'M', '1999-07-02', 504, 201, '2017-07-10', 63400),
(10002, 'Todd', 'Spencer', 'M', '1996-09-09', 505, 200, '2021-04-05', 62000),
(10003, 'Anthony', 'Webb', 'M', '1996-09-09', 505, 201, '2020-10-03', 62000),
(10004, 'François', 'Tremblay', 'M', '1986-05-27', 501, 201, '2021-09-13', 59850),
(10005, 'Kenneth', 'Snyder', 'M', '1970-04-19', 503, 201, '2019-01-18', 65000),
(10006, 'Ruth', 'Murphy', 'F', '1988-05-03', 510, 202, '2021-09-17', 54130),
(10007, 'Benjamin', 'Wright', 'M', '1976-02-12', 508, 200, '2018-05-09', 64250),
(10008, 'Frank', 'Harris', 'M', '2001-08-23', 500, 200, '2018-07-26', 60000),
(10009, 'Jack', 'Smith', 'M', '2001-08-23', 509, 201, '2014-05-26', 59500),
(10010, 'Michelle', 'Brooks', 'F', '1958-02-04', 506, 202, '2018-05-15', 54130),
(10011, 'Tim', 'Goyer', 'M', '1989-08-17', 502, 202, '2020-05-31', 64300),
(10012, 'Robert', 'Brown', 'M', '1989-05-07', 504, 201, '2016-08-23', 62500),
(10013, 'Edward', 'Francis', 'M', '1984-07-24', 507, 202, '2014-12-16', 63245),
(10014, 'Mark', 'Philips', 'M', '1980-02-24', 502, 200, '2021-03-02', 61580),
(10015, 'Kunkkink', 'Kamolprapa', 'F', '1998-12-12', 500, 202, '2016-10-01', 120000),
(10016, 'Aaron', 'Mitchell', 'M', '1998-12-12', 504, 201, '2013-10-18', 62800),
(10017, 'Ellie', 'Sullivan', 'F', '1982-04-18', 509, 201, '2021-10-24', 61500),
(10018, 'Kathleen', 'Owens', 'F', '1977-04-03', 500, 202, '2020-01-31', 61250),
(10019, 'Louis', 'Clark', 'M', '1967-02-14', 502, 200, '2020-05-18', 63150),
(10020, 'Patricia', 'West', 'F', '1991-06-24', 506, 202, '2018-11-14', 61500),
(10021, 'Samuel', 'Ng', 'M', '1987-12-29', 501, 201, '2022-10-04', 99999999),
(10023, 'test', 'test', 'M', '2004-01-08', 510, 201, NULL, 100000),
(10024, 'dummy', 'dummy', 'M', '2007-09-10', 502, 200, NULL, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_code` int(11) NOT NULL,
  `job_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_code`, `job_desc`) VALUES
(500, 'System Analysis'),
(501, 'Programmer'),
(502, 'Database Designer'),
(503, 'Electrical Engineer'),
(504, 'Mechanical Engineer'),
(505, 'Civil Engineer'),
(506, 'Clerical Support'),
(507, 'DSS Analyst'),
(508, 'Application Designer'),
(509, 'Bio Technician'),
(510, 'General Support');

-- --------------------------------------------------------

--
-- Table structure for table `job_history`
--

CREATE TABLE `job_history` (
  `emp_num` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date_assign` date NOT NULL,
  `job_code` int(11) NOT NULL,
  `emp_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_history`
--

INSERT INTO `job_history` (`emp_num`, `dept_id`, `date_assign`, `job_code`, `emp_salary`) VALUES
(10001, 201, '2011-07-10', 504, 55881),
(10001, 201, '2012-07-10', 504, 59206),
(10001, 201, '2013-07-10', 504, 61361),
(10001, 201, '2014-07-10', 504, 61648),
(10001, 201, '2015-07-10', 504, 62648),
(10001, 201, '2016-07-10', 504, 63000),
(10001, 201, '2017-07-10', 504, 63400),
(10002, 201, '2020-06-01', 505, 60000),
(10002, 201, '2021-04-05', 505, 62000),
(10003, 201, '2019-04-12', 505, 61000),
(10003, 201, '2020-10-03', 505, 62000),
(10004, 201, '2021-09-13', 501, 59850),
(10005, 201, '2019-01-18', 503, 65000),
(10006, 200, '2020-08-10', 507, 53120),
(10006, 200, '2021-09-17', 507, 54130),
(10006, 202, '2018-01-28', 510, 51000),
(10006, 202, '2019-09-23', 510, 52000),
(10007, 200, '2011-11-06', 508, 57500),
(10007, 200, '2012-11-10', 508, 58200),
(10007, 200, '2013-07-20', 508, 59600),
(10007, 200, '2014-07-08', 500, 61230),
(10007, 200, '2015-12-08', 500, 62500),
(10007, 200, '2016-03-28', 500, 63120),
(10007, 200, '2017-09-20', 500, 63890),
(10007, 200, '2018-05-09', 500, 64250),
(10008, 200, '2018-07-26', 500, 60000),
(10009, 201, '2013-01-07', 509, 58500),
(10009, 201, '2014-05-26', 509, 59500),
(10010, 202, '2018-05-15', 506, 54130),
(10011, 202, '2020-05-31', 502, 64300),
(10012, 201, '2013-08-23', 504, 60000),
(10012, 201, '2014-08-23', 504, 60200),
(10012, 201, '2015-08-23', 504, 61450),
(10012, 201, '2016-08-23', 504, 62500),
(10013, 200, '2013-12-16', 507, 63100),
(10013, 200, '2014-12-16', 507, 63245),
(10013, 202, '2011-12-16', 507, 61234),
(10013, 202, '2012-12-16', 507, 62200),
(10014, 200, '2021-03-02', 502, 61580),
(10015, 202, '2014-10-01', 510, 58500),
(10015, 202, '2015-10-01', 510, 59010),
(10015, 202, '2016-10-01', 510, 59350),
(10016, 201, '2012-10-18', 504, 62100),
(10016, 201, '2013-10-18', 504, 62800),
(10017, 201, '2021-10-24', 509, 61500),
(10018, 202, '2015-01-31', 500, 58900),
(10018, 202, '2016-01-31', 500, 59000),
(10018, 202, '2017-01-31', 500, 59580),
(10018, 202, '2018-01-31', 500, 60650),
(10018, 202, '2019-01-31', 500, 60980),
(10018, 202, '2020-01-31', 500, 61250),
(10019, 200, '2015-05-18', 502, 60150),
(10019, 200, '2016-05-18', 502, 61500),
(10019, 200, '2017-05-18', 502, 61850),
(10019, 200, '2018-05-18', 502, 62050),
(10019, 200, '2019-05-18', 502, 62900),
(10019, 200, '2020-05-18', 502, 63150),
(10020, 202, '2018-11-14', 506, 61500);

-- --------------------------------------------------------

--
-- Table structure for table `mgr_history`
--

CREATE TABLE `mgr_history` (
  `emp_num` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date_assign` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mgr_history`
--

INSERT INTO `mgr_history` (`emp_num`, `dept_id`, `date_assign`) VALUES
(1005, 201, '2020-08-24'),
(1007, 200, '2019-11-06'),
(1018, 200, '2017-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `salary_history`
--

CREATE TABLE `salary_history` (
  `emp_num` int(11) NOT NULL,
  `salary_start_date` date NOT NULL,
  `salary_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_history`
--

INSERT INTO `salary_history` (`emp_num`, `salary_start_date`, `salary_amt`) VALUES
(10001, '2011-07-10', 55881),
(10001, '2012-07-10', 59206),
(10001, '2013-07-10', 61361),
(10001, '2014-07-10', 61648),
(10001, '2015-07-10', 62648),
(10001, '2016-07-10', 63000),
(10001, '2017-07-10', 63400),
(10002, '2020-06-01', 60000),
(10002, '2021-04-05', 62000),
(10003, '2019-04-12', 61000),
(10003, '2020-10-03', 62000),
(10004, '2021-09-13', 59850),
(10005, '2019-01-18', 65000),
(10006, '2018-01-28', 51000),
(10006, '2019-09-23', 52000),
(10006, '2020-08-10', 53120),
(10006, '2021-09-17', 54130),
(10007, '2011-11-06', 57500),
(10007, '2012-11-10', 58200),
(10007, '2013-07-20', 59600),
(10007, '2014-07-08', 61230),
(10007, '2015-12-08', 62500),
(10007, '2016-03-28', 63120),
(10007, '2017-09-20', 63890),
(10007, '2018-05-09', 64250),
(10008, '2018-07-26', 60000),
(10009, '2013-01-07', 58500),
(10009, '2014-05-26', 59500),
(10010, '2018-05-15', 54130),
(10011, '2020-05-31', 64300),
(10012, '2013-08-23', 60000),
(10012, '2014-08-23', 60200),
(10012, '2015-08-23', 61450),
(10012, '2016-08-23', 62500),
(10013, '2011-12-16', 61234),
(10013, '2012-12-16', 62200),
(10013, '2013-12-16', 63100),
(10013, '2014-12-16', 63245),
(10014, '2021-03-02', 61580),
(10015, '2014-10-01', 58500),
(10015, '2015-10-01', 59010),
(10015, '2016-10-01', 59350),
(10016, '2012-10-18', 62100),
(10016, '2013-10-18', 62800),
(10017, '2021-10-24', 61500),
(10018, '2015-01-31', 58900),
(10018, '2016-01-31', 59000),
(10018, '2017-01-31', 59580),
(10018, '2018-01-31', 60650),
(10018, '2019-01-31', 60980),
(10018, '2020-01-31', 61250),
(10019, '2015-05-18', 60150),
(10019, '2016-05-18', 61500),
(10019, '2017-05-18', 61850),
(10019, '2018-05-18', 62050),
(10019, '2019-05-18', 62900),
(10019, '2020-05-18', 63150),
(10020, '2018-11-14', 61500);

-- --------------------------------------------------------

--
-- Table structure for table `sharp_emp`
--

CREATE TABLE `sharp_emp` (
  `id` int(11) NOT NULL,
  `employee_id` text DEFAULT NULL,
  `first_name` text NOT NULL,
  `middle_name` text DEFAULT NULL,
  `last_name` text NOT NULL,
  `phone` int(11) NOT NULL,
  `employee_image` text NOT NULL,
  `id_type` text NOT NULL,
  `id_number` text NOT NULL,
  `id_card_image` text NOT NULL,
  `residence_address` text NOT NULL,
  `residence_location` text NOT NULL,
  `residence_direction` text NOT NULL,
  `residence_gps` text NOT NULL,
  `next_of_kin` text NOT NULL,
  `relationship` text NOT NULL,
  `phone_of_kin` text NOT NULL,
  `kin_residence` text NOT NULL,
  `kin_residence_direction` text NOT NULL,
  `date_employed` date NOT NULL,
  `job_type` text NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `accounttype` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `accounttype`) VALUES
(1, 'Maxwell', 'Morrison', 'xxx2xy', '10a55271c201e41913764ff95b33248b', 'Admin'),
(3, 'Maxwell', 'Morrison', 'admins', '02adcdf2171dc7e5757cdd7c0b91fa03', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `emp_num` (`emp_num`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_num`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_code`);

--
-- Indexes for table `job_history`
--
ALTER TABLE `job_history`
  ADD PRIMARY KEY (`emp_num`,`dept_id`,`date_assign`),
  ADD KEY `emp_num` (`emp_num`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `job_code` (`job_code`);

--
-- Indexes for table `mgr_history`
--
ALTER TABLE `mgr_history`
  ADD PRIMARY KEY (`emp_num`,`dept_id`,`date_assign`),
  ADD KEY `emp_num` (`emp_num`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `salary_history`
--
ALTER TABLE `salary_history`
  ADD PRIMARY KEY (`emp_num`,`salary_start_date`),
  ADD KEY `emp_num` (`emp_num`);

--
-- Indexes for table `sharp_emp`
--
ALTER TABLE `sharp_emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10025;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `sharp_emp`
--
ALTER TABLE `sharp_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

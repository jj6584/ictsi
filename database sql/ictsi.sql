-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2016 at 05:15 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_mname` varchar(30) NOT NULL,
  `admin_lname` varchar(35) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_level` int(11) NOT NULL,
  `admin_status` int(11) NOT NULL DEFAULT '0',
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_username`, `admin_password`, `admin_level`, `admin_status`, `profile_pic`) VALUES
(2, 'Paul', 'C', 'Banjawan', 'sys_paul', 'a027184a55211cd23e3f3094f1fdc728df5e0500', 2, 0, ''),
(3, 'Juan', 'Cruz', 'Dela Cruz', '1001', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 32, 0, 'adminphoto.jpg'),
(4, 'Kim', 'Benson', 'Agonos', 'sys_kim', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 2, 0, ''),
(5, 'Jim', 'Varias', 'Melendez', '1003', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 31, 0, ''),
(6, 'joshua', 'tanedo', 'manaol', '1000', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 31, 0, 'WIN_20160113_14_55_32_Pro1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(60) NOT NULL,
  `announcement_desc` text NOT NULL,
  `announcement_status` int(11) NOT NULL,
  `hr_name` varchar(50) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcement_id`, `announcement_title`, `announcement_desc`, `announcement_status`, `hr_name`, `date_posted`) VALUES
(7, 'IMMEDIATE HIRING!', 'To all aspiring applicants, please go to the office for immediate hiring. \r\n\r\nWE ARE IN NEED OF THE FOLLOWING POSITIONS: \r\n- MOBILE DEVELOPER, WEB DEVELOPER, SENIOR JAVA PROGRAMMER\r\nFOR INQUIRIES, PLEASE CONTACT MS. LAARNI MARTINEZ  at lmartinez@ictsi.com \r\n', 0, '', '2016-02-06 02:39:47'),
(8, 'NEW JOB OPENING!', 'Job Title: HELLO asd\r\nJob Description: WORLD asd', 0, '', '2016-02-23 08:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `reset_pass` varchar(254) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `level` int(3) NOT NULL,
  `performance_status` int(11) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `position_name` varchar(150) NOT NULL,
  `date_hired` date NOT NULL,
  `under_id` int(11) NOT NULL,
  `city_add` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `sss_no` int(11) NOT NULL,
  `tin_no` varchar(50) NOT NULL,
  `poschoice1` varchar(255) NOT NULL,
  `poschoice2` varchar(255) NOT NULL,
  `salary` varchar(11) NOT NULL,
  `elementary` varchar(60) NOT NULL,
  `elem_de` varchar(255) NOT NULL,
  `elem_inc` varchar(255) NOT NULL,
  `highschool` varchar(60) NOT NULL,
  `hs_de` varchar(120) NOT NULL,
  `hs_inc` varchar(60) NOT NULL,
  `college` varchar(120) NOT NULL,
  `college_de` varchar(120) NOT NULL,
  `collegeprog` varchar(255) NOT NULL,
  `college_inc` varchar(60) NOT NULL,
  `technical_courses` varchar(120) NOT NULL,
  `tech_de` varchar(120) NOT NULL,
  `tech_inc` varchar(60) NOT NULL,
  `graduate_stud` varchar(120) NOT NULL,
  `graduate_de` varchar(120) NOT NULL,
  `graduate_inc` varchar(60) NOT NULL,
  `post_graduate` varchar(120) NOT NULL,
  `post_de` varchar(120) NOT NULL,
  `post_inc` varchar(60) NOT NULL,
  `licensure_exam` varchar(120) NOT NULL,
  `date_taken` varchar(60) NOT NULL,
  `rating` int(11) NOT NULL,
  `date_ava` varchar(60) NOT NULL,
  `reference` varchar(60) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `working_years` int(11) NOT NULL,
  `working_position` varchar(200) NOT NULL,
  `highest_att` varchar(255) NOT NULL,
  `profilepic` varchar(200) NOT NULL,
  `skypeuser` varchar(255) NOT NULL,
  `online` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `fname`, `mname`, `lname`, `gender`, `email`, `contact`, `birthday`, `password`, `reset_pass`, `verified`, `citizenship`, `religion`, `status`, `level`, `performance_status`, `reg_date`, `position_name`, `date_hired`, `under_id`, `city_add`, `state`, `sss_no`, `tin_no`, `poschoice1`, `poschoice2`, `salary`, `elementary`, `elem_de`, `elem_inc`, `highschool`, `hs_de`, `hs_inc`, `college`, `college_de`, `collegeprog`, `college_inc`, `technical_courses`, `tech_de`, `tech_inc`, `graduate_stud`, `graduate_de`, `graduate_inc`, `post_graduate`, `post_de`, `post_inc`, `licensure_exam`, `date_taken`, `rating`, `date_ava`, `reference`, `skills`, `working_years`, `working_position`, `highest_att`, `profilepic`, `skypeuser`, `online`) VALUES
(1, 'Joshua ', 'Tanedo', 'Manaol', 'Male', 'joshua.manaol@gmail.com', '09153192962', '1995-09-16', '5832369af19bad7b9485730637b6b0ccb579ed3a', '', '1', 'filipino', 'catholic', 2, 2, 1, '2015-11-17 04:08:13', 'WEB SUPPORT ENGINEER (JAVA)', '2016-02-17', 3, 'Antipolo', 'Agusan del Norte', 0, '', 'Web Developer', 'PHP SENIOR PROGRAMMER', '50000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Needs Few Weeks Notice', 'Newspaper Ad', 'Assembling equipment,Quality Assurance', 5, 'a', '', 'WIN_20160113_14_55_31_Pro.jpg', 'jj6584', 0),
(2, 'Paul', 'Caminade', 'Banjawan', 'Male', 'pcbanjawan@gmail.com', '123', '2016-01-26', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '', '1', 'filipino', 'catholic', 3, 2, 1, '2015-11-17 08:26:15', 'Network Administrator', '2016-02-04', 3, 'Bogo', 'Albay', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '10000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Arts (B.A.)', 'Information Technology,Computer Science', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Needs Few Weeks Notice', 'Walk-in', 'Data Analyst, Network Administrator', 1, 'janitorr', '', 'poll.jpg', 'pc.banjawan', 0),
(3, 'James', 'Cabi', 'Manuel', 'Male', 'james@gmail.com', '518901890', '1900-01-01', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', '', '1', 'american', 'islam', 3, 1, 0, '2015-11-18 08:07:30', '', '2016-02-24', 3, 'Alaminos', 'Agusan del Norte', 0, '', 'JAVA PROGRAMMER / ANALYST', 'Web Developer', '30000', '', '', '', '', '', '', 'FEU', 'Bachelor of Science (B.S.)', 'Engineering,Computer Engineering', '2002', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'School Campaign', 'Data Analyst,Android Developer', 0, '', '', '', '', 0),
(4, 'Lyra', 'C', 'Bertulfo', 'Female', 'lyra@gmail.com', '0921662626', '1900-01-01', '6228efa674da92e19efbfb3b25804b736858b580', '', '', 'filipino', 'catholic', 1, 1, 0, '2015-11-18 10:24:42', '', '0000-00-00', 0, 'Alaminos', 'Agusan del Norte', 0, '', 'JAVA PROGRAMMER / ANALYST', 'JAVA PROGRAMMER / ANALYST', '30000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2018', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'School Campaign', 'Data Analyst,Network Administrator', 0, '', '', '', '', 0),
(5, 'Maria', 'Morena', 'lacson', 'Female', 'maria@gmail.com', '091515155', '1916-10-13', 'e21fc56c1a272b630e0d1439079d0598cf8b8329', '', '', 'filipino', 'islam', 0, 1, 0, '2015-11-18 14:08:05', '', '0000-00-00', 0, 'Alaminos', 'Agusan del Norte', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '20000', '', '', '', '', '', '', 'Ateneo De manila', 'Bachelor of Science (B.S.)', 'Engineering,Industrial Engineering', '2013', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Software Developer', 0, '', '', '', '', 0),
(11, 'hsjs', 'gsjs', 'hsj', '', 'pahsk@gmail.com', '696939', '0000-00-00', '046827b58f128d5f522134b9c4ac3c6d68377055', '', '', 'hsjsj', 'bsjsja', 0, 0, 0, '2016-01-14 17:20:26', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'HR Administrators', 'PHP SENIOR PROGRAMMER', '0', '', '', '', '', '', '', 'hsusi', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '6464', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Data Analyst', 0, '', '', '', '', 0),
(12, 'Loydee', 'Valentin', 'De Leon', 'Female', 'loydee@gmail.com', '35616510561', '1900-01-02', 'e71debbbe16764f2f0192b0c52d935aec5173927', '', '', 'filipino', 'catholic', 0, 1, 0, '2016-01-14 17:47:12', '', '0000-00-00', 0, 'Quezon', 'Luzon', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '40000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Engineering,Industrial Engineering', '2013', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Network Administrator,Software Developer', 0, '', '', 'dee.jpg', '', 0),
(14, 'paul', 'van', 'banja', '', 'pcbanjawan1@gmail.com', '6413545', '0000-00-00', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '', '', 'filipino', 'catholic', 0, 0, 0, '2016-01-15 05:41:58', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'HR Administrators', 'ENGINEERING ADMIN SUPERVISOR', '0', '', '', '', '', '', '', 'feu', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '1998', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Data Analyst', 0, '', '', '', '', 0),
(17, 'jayjay', 'tanedo', 'manaol', '', 'jayjay@gmail.com', '09849494949', '1904-03-03', '51530f438db9e763053cc2b5e2a4bb381bdd6b90', '', '', 'Filipino', 'Catholic', 2, 1, 0, '2016-01-15 06:31:36', '', '0000-00-00', 3, 'Manila', 'Luzon', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '60000', '', '', '', '', '', '', 'FEU TECH', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2002', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Network Administrator,Software Developer', 0, '', '', '', '', 0),
(20, 'Hannylou', 'Acaba', 'Celestial', '', 'dichliebeich12@gmail.com', '09154440410', '1996-06-22', '9dfde54fcd839577c1d63fea8ac03d5921d5be5f', '', 'b5f3a39657f6a6b421086d8701f67785', 'Filipino', 'Catholic', 0, 1, 0, '2016-01-19 07:11:01', '', '0000-00-00', 0, 'Taguig', 'Manila', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '90000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Data Analyst,Mobile Developer,Software Developer,Chief Information Officer,Project Costing ,Operations', 0, '', '', '', '', 0),
(21, 'Vanessa', 'Vitug', 'Esmundo', '', 'essa0417@gmail.com', '09012312331', '1900-01-01', '79dc8e60dcc8e90a5b959c2fefe2d2d17bfb13dc', '', '1', 'filipino', 'catholic', 0, 1, 0, '2016-01-22 04:38:20', '', '0000-00-00', 0, 'Manila', 'Manila', 0, '', 'PHP SENIOR PROGRAMMER', 'Web Developer', '90000', '', '', '', '', '', '', 'FEU', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst,PHP Developer', 0, '', '', '', '', 0),
(43, 'g', 'f', 'g', 'Male', 'b', '5', '2016-01-26', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '', '', 'f', 'v', 0, 0, 0, '2016-01-25 17:03:46', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'HR Administrator', 'HR Administrator', '10000', '', '', '', '', '', '', 'd', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '8', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Data Analyst,Network Administrator', 0, '', '', '', '', 0),
(44, 'hs', 'js', 'sh', 'Male', 'shs', '6424', '2016-01-28', '54fd1711209fb1c0781092374132c66e79e2241b', '', '63efdcc98dc109f3970e609a56c47b0e', 'js', 'ns', 0, 0, 0, '2016-01-28 11:23:26', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'HR Administrator', 'HR Administrator', '10000', '', '', '', '', '', '', 'd', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '5', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Network Administrator,Software Developer,Project Costing ', 0, '', '', '', '', 0),
(45, 'Marjorry', 'Peralta', 'Idio', '', 'mrkjohnperalta@gmail.com', '09057929641', '1994-04-08', '1c9d32a00b2d7927a3289954242813e23a795a9d', '', '1', 'Filipino', 'catholic', 0, 1, 0, '2016-01-30 07:07:18', '', '0000-00-00', 0, 'Lagangilang', 'Abra', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '20000', '', '', '', '', '', '', 'AMA Computer College', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2013', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst,Network Administrator,Mobile Developer,Software Developer', 0, '', '', '', '', 0),
(46, 'Zac', 'Leonen', 'Peralta', '', 'markjohnidio@yahoo.com', '09057929641', '2015-01-02', 'ae3bb8a814542807191cc56d8f344ddaff251644', '', 'f85d7b90964317a809244a747805e5a6', 'Filipino', 'Catholic', 0, 1, 0, '2016-01-30 07:13:50', '', '0000-00-00', 0, 'Parañaque', 'MetroManila', 0, '', 'JAVA PROGRAMMER / ANALYST', 'Web Developer', '40000', '', '', '', '', '', '', 'SRSPC', 'Bachelor of Science (B.S.)', 'Engineering,Computer Engineering', '2018', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Network Administrator,Mobile Developer,Chief Information Officer', 0, '', '', '', '', 0),
(47, 'josh', 'tanedo', 'man', '', 'josh@gmail.com', '65505098490', '1900-01-01', 'c028c213ed5efcf30c3f4fc7361dbde0c893c5b7', '', 'fcfb3ca1ca97c2b339bf316e12adea18', 'Filipino', 'catholic', 0, 1, 0, '2016-01-30 07:19:21', '', '0000-00-00', 0, 'Malabon', 'MetroManila', 0, '', 'JAVA PROGRAMMER / ANALYST', 'Web Developer', '40000', '', '', '', '', '', '', 'FEU', 'Bachelor of Science (B.S.)', 'Engineering,Industrial Engineering', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst,Network Administrator', 0, '', '', '1.jpg', '', 0),
(48, 'jayjay', 'tan', 'tuie', '', 'jayjay@yahoo.com', '09154440410', '1901-02-03', '51530f438db9e763053cc2b5e2a4bb381bdd6b90', '', '197c8c5d2e4619a389604fe7839a78ec', 'filipino', 'catholic', 0, 1, 0, '2016-01-31 03:15:43', '', '0000-00-00', 0, 'Antipolo', 'Rizal', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '40000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2002', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst,Network Administrator,Mobile Developer', 0, '', '', '', '', 0),
(49, 'gen', 'add', 'boo', '', 'gen@gmail.com', '41232131312', '1903-01-01', '4739319abf9070ef0b0e2a73224820ae70488aa6', '', 'cb547038ff867f0a80b1945eb8a8aa88', 'f', 'asd', 0, 1, 0, '2016-01-31 03:22:59', '', '0000-00-00', 0, 'San', 'AgusandelSur', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '90000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst,Network Administrator,Mobile Developer', 0, '', '', '12557847_1048954108460367_952374487_o.jpg', '', 0),
(50, 'Keng', 'Banjawan', 'Matias', 'Male', 'alfredieselmatias@gmail.com', '64315', '2016-02-03', '81fe8bfe87576c3ecb22426f8e57847382917acf', '', '7ed967af27bb1cd5a9855dc3dccb1019', 'filipino', 'Catholic', 0, 0, 0, '2016-02-02 21:16:44', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'ENGINEERING ADMIN SUPERVISOR', 'HR Administrator', '10000', '', '', '', '', '', '', 'feu', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '1555', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Data Analyst,Mobile Developer', 0, '', '', '', '', 0),
(51, 'will', 'a', 'braun', 'Male', 'dfgh@gnail.com', '789', '2016-02-06', '1041179cbdda366fd7b0347f09255f775170e103', '', '335ee35b2c2663b7b238a6cc0b166ce5', 'ksjs', 'jsjs', 0, 0, 0, '2016-02-05 23:24:57', '', '0000-00-00', 0, 'Manila', 'Luzon', 0, '', 'HR Administrator', 'ENGINEERING ADMIN SUPERVISOR', '10000', '', '', '', '', '', '', 'g', 'Bachelor of Arts (B.A.)', 'Engineering,Civil Engineering', '596', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', 'Network Administrator,Software Developer', 0, '', '', '', '', 0),
(52, 'Meg', 'Verga', 'Pelagio', '', 'meg.pelagio@gmail.com', '09264160317', '1996-03-17', '6579d0daccd6d53dd36552cc435d3374ce4e2a19', '', '1', 'Filipino', 'Catholic', 0, 0, 0, '2016-02-06 01:56:38', '', '0000-00-00', 3, 'Mandaluyong', 'MetroManila', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '20000', '', '', '', '', '', '', 'FEU', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Analytical Skills,Budgeting,Diplomacy Skills,Evaluating,Maintaining Files,Verbal communication skills,Computing,Financial Assessment Skill,Decision making', 0, '', '', 'bebegerl.jpg', 'meggypeggyhaha', 0),
(53, 'james', 'tan', 'manuel', '', 'ugmeme123@gmail.com', '09264122339', '1901-01-01', 'a027184a55211cd23e3f3094f1fdc728df5e0500', '', '1', 'Filipino', 'Catholic', 3, 1, 0, '2016-02-06 08:22:06', '', '2016-02-19', 3, 'Pateros', 'MetroManila', 0, '', 'ENGINEERING ADMIN SUPERVISOR', 'Project Field Engineer (Renewable Energy)', '60000', '', '', '', '', '', '', 'Mapua', 'Bachelor of Science (B.S.)', 'Engineering,Civil Engineering', '2002', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Field works,Engineering', 0, '', '', '', '', 0),
(54, 'lou', 'van', 'luzz', '', 'lou@gmail.com', '09153192962', '1900-02-01', '7c222fb2927d828af22f592134e8932480637c0d', '', '1', 'filipino', 'catholic', 0, 1, 0, '2016-02-23 17:50:36', '', '0000-00-00', 0, 'Daguioman', 'Abra', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', '40000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies,Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Mobile Developer,Software Developer,Project Costing ', 1, '', '', '', '', 0),
(56, 'Yzabelle', 'Yza', 'Permalino', '', 'aits.feutech@gmail.com', '09057893456', '1900-01-01', '7c222fb2927d828af22f592134e8932480637c0d', '', '1', 'Filipino', 'Catholic', 0, 1, 0, '2016-02-24 07:07:51', '', '0000-00-00', 0, 'Makati', 'MetroManila', 0, '', 'ENGINEERING ADMIN SUPERVISOR', 'Design Engineering Manager', '40000,50000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Engineering,Civil Engineering', '2015', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Operations,Field works,Construction', 0, '', '', '', '', 0),
(57, 'Mark', 'Peralta', 'Idio', '', 'abc@yahoo.com', '09778340803', '1900-01-01', '7c222fb2927d828af22f592134e8932480637c0d', '', '1', 'Filipino', 'Catholic', 0, 1, 0, '2016-04-11 15:28:50', '', '0000-00-00', 0, 'Bunawan', 'AgusandelSur', 0, '', 'JAVA', 'Web', '10000,20000', '', '', '', '', '', '', 'FEU Tech', 'Bachelor', 'Computer', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Mobile Developer', 0, '', '', '', '', 0),
(58, 'van', 'cam', 'calimlim', '', 'van@gmail.com', '09153192964', '1903-02-03', 'f68d0079e464a531a371b5dee1c585790073547e', '', '176526aadd00d9e39b37fd5a54710714', 'Filipino', 'Catholic', 0, 1, 0, '2016-05-11 02:39:03', '', '0000-00-00', 0, 'Navotas', 'MetroManila', 0, '', 'HIRING FRESH GRADUATES OF INDUSTRIAL ENGINEERING', 'PROJECT MANAGER', '30000,40000', '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2014', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Diplomacy Skills,Evaluating,Verbal communication skills,Technical Skills', 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `archived_jobs`
--

CREATE TABLE IF NOT EXISTS `archived_jobs` (
  `id` int(11) NOT NULL,
  `a_job_id` int(11) NOT NULL,
  `a_job_app` int(11) NOT NULL,
  `a_video_link` text NOT NULL,
  `date_archived` date NOT NULL,
  `a_job_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archived_jobs`
--

INSERT INTO `archived_jobs` (`id`, `a_job_id`, `a_job_app`, `a_video_link`, `date_archived`, `a_job_name`) VALUES
(1, 4, 1, '', '2016-02-22', 'JAVA PROGRAMMER / ANALYST'),
(2, 5, 2, '', '2016-02-22', 'Release Manager'),
(3, 5, 1, '', '2016-02-22', 'Release Manager');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `fblink` varchar(50) NOT NULL,
  `twitterlink` varchar(50) NOT NULL,
  `banner` varchar(100) NOT NULL,
  `copyright` varchar(50) NOT NULL,
  `c1` text NOT NULL,
  `c2` text NOT NULL,
  `c3` text NOT NULL,
  `c4` text NOT NULL,
  `c5` text NOT NULL,
  `c6` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `content`, `fblink`, `twitterlink`, `banner`, `copyright`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`) VALUES
(1, 'International Container Terminal Services, Inc', 'International Container Terminal Services, Inc. is a port management company in the Philippines.\r\nIt was incorporated on December 24, 1987, and has been cited by the Asian Development Bank\r\nas one of the top five major maritime terminal operators in the world.', 'https://www.facebook.com/', 'https://www.twitter.com/', 'banner24.jpg', 'Copyright 2015', 'About.jpg', 'Mission.jpg', 'Vision.jpg', 'prom12.jpg', 'prom2.jpg', 'prom111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `c_emp`
--

CREATE TABLE IF NOT EXISTS `c_emp` (
  `c_emp_id` int(11) NOT NULL,
  `c_e_id` int(11) NOT NULL,
  `c_e_name` varchar(35) NOT NULL,
  `c_e_mname` varchar(35) NOT NULL,
  `c_e_lname` varchar(35) NOT NULL,
  `c_e_email` varchar(50) NOT NULL,
  `c_e_password` varchar(50) NOT NULL,
  `c_e_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_emp`
--

INSERT INTO `c_emp` (`c_emp_id`, `c_e_id`, `c_e_name`, `c_e_mname`, `c_e_lname`, `c_e_email`, `c_e_password`, `c_e_status`) VALUES
(1, 1005, 'Jeff', 'Manuel', 'Lopez', 'jeff@gmail.com', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 0),
(2, 1006, 'Anne', 'Cruz', 'Martin', 'anne@gmail.com', '96657fd33d4351fb0ec777fd7064e03b0adc3a35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `default_evalution`
--

CREATE TABLE IF NOT EXISTS `default_evalution` (
  `d_eval_id` int(11) NOT NULL,
  `default_eval` varchar(250) NOT NULL,
  `last_update` date NOT NULL,
  `d_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_evalution`
--

INSERT INTO `default_evalution` (`d_eval_id`, `default_eval`, `last_update`, `d_status`) VALUES
(1, '2', '2016-03-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE IF NOT EXISTS `evaluation` (
  `eval_id` int(11) NOT NULL,
  `eval_question` text NOT NULL,
  `eval_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`eval_id`, `eval_question`, `eval_status`) VALUES
(1, 'Measures effectiveness in planning, organizing and efficiently handling activities and eliminating unnecessary activities.', 0),
(2, 'Consider employee''s skill level, knowledge and understanding of all phases of the job and those requiring improved skills and/or experience.', 0),
(3, 'Is able to perform all functions of the job identified within the job description. Meets expectations in regard to the quality and quantity of work performed. Is knowledgeable of overall business operations and programs. \r\n', 0),
(4, 'Consistently provides excellent customer service and practices excellent customer service skills.', 0),
(5, 'Receives direction and feedback well from others. Informs supervisors, managers and co-workers of key issues as appropriate. \r\n', 0),
(6, '\r\nMaintains a positive working relationship with co-workers and managers. Demonstrates effective interpersonal skills while gaining respect and positively influencing others. Promotes teamwork within the work environment. ', 0),
(7, 'Is punctual and adheres to attendance standards consistently. Completes projects assigned on a timely basis. \r\n', 0),
(8, 'Wears appropriate attire and adheres to grooming standards. Demonstrates a professional image when representing the company. \r\n', 0),
(12, 'Follows all procedures which ensure a safe environment for themselves, co-workers and customers.', 0),
(13, 'hello?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `date_posted`) VALUES
(5, 'What is ICTSI Mobile App?', 'ICTSI Mobile App is a android application that you can use easily and conveniently with your mobile device.', '2016-01-24 05:58:40'),
(6, 'What can I do with the ICTSI Mobile App?', 'Search \r\nYou may search for jobs based on job title, skill, or keywords. \r\n\r\nBrowse \r\nYou can browse for jobs by categories such as Accounting/Finance, Admin/Human Resource, Sales/Marketing, Computer/IT, Engineering and others.\r\n\r\nSaved \r\nYou can save a job to be viewed later by clicking on the "floppy-disk" button in the job description page or in the applicant page. ', '2016-01-24 06:02:04'),
(7, 'How to apply for jobs?', 'Click on the "Apply" button after you have viewed the job description. On the next screen, ', '2016-01-24 06:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `file_applicant_transact`
--

CREATE TABLE IF NOT EXISTS `file_applicant_transact` (
  `file_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `hr_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `file_pc` varchar(200) DEFAULT NULL,
  `file_birth` varchar(200) DEFAULT NULL,
  `file_sss` varchar(200) DEFAULT NULL,
  `file_pagibig` varchar(200) DEFAULT NULL,
  `file_nbi` varchar(200) DEFAULT NULL,
  `file_pc_status` int(11) NOT NULL,
  `file_birth_status` int(11) NOT NULL,
  `file_sss_status` int(11) NOT NULL,
  `file_pagibig_status` int(11) NOT NULL,
  `file_nbi_status` int(11) NOT NULL,
  `file_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interview_sched`
--

CREATE TABLE IF NOT EXISTS `interview_sched` (
  `int_id` int(11) NOT NULL,
  `int_date` date NOT NULL,
  `time` varchar(60) NOT NULL,
  `day` varchar(60) NOT NULL,
  `req_cmt` text NOT NULL,
  `response` varchar(20) DEFAULT NULL,
  `int_user_id` int(11) NOT NULL,
  `int_job_id` int(11) NOT NULL,
  `int_hr_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `int_seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interview_sched`
--

INSERT INTO `interview_sched` (`int_id`, `int_date`, `time`, `day`, `req_cmt`, `response`, `int_user_id`, `int_job_id`, `int_hr_id`, `status`, `int_seen`) VALUES
(1, '2016-05-20', '14:00', 'Friday', 'Business Attire', '1', 1, 2, 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(60) NOT NULL,
  `job_desc` text NOT NULL,
  `job_requirement` text NOT NULL,
  `job_requisition_id` int(11) NOT NULL,
  `job_slots` int(11) NOT NULL,
  `work_area` varchar(255) NOT NULL,
  `work_exp` varchar(255) NOT NULL,
  `exp_salary` varchar(255) NOT NULL,
  `highest_att` varchar(255) NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `job_skills` varchar(255) NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_desc`, `job_requirement`, `job_requisition_id`, `job_slots`, `work_area`, `work_exp`, `exp_salary`, `highest_att`, `employment_type`, `job_skills`, `job_status`, `date_added`, `archived_status`) VALUES
(1, 'HR PAYROLL AND ADMIN SPECIALIST JOB', '<p>Payroll Side:</p>\r\n<ul>\r\n<li>Processes payroll requirements in the payroll system including encoding of performance bonuses</li>\r\n<li>Prepares monthly payable summary</li>\r\n<li>Assists in all employee concerns with the payroll</li>\r\n<li>Maintains Alphalist</li>\r\n<li>Computes final pay of resigned employees</li>\r\n<li>Admin Side</li>\r\n</ul>\r\n<p>Ensures that all physical plant requirements are met<br />Liaises with the suppliers and contractors in processing of deliverables and payments<br />Leads in the compliance of PEZA requirements</p>', '', 1, 2, 'Business Administration, Human Resource Development', '5 Year/s', '30000,40000', 'Bachelors/College Degree', 'Regular Full Time', 'Analytical Skills,Budgeting,Maintaining Files,Computing,Financial Assessment Skill', 1, '2016-04-12 14:29:27', 0),
(2, 'PROJECT MANAGER', '<p>- Knows installation of equipment</p>\r\n<p>- Spare parts and maintenance process methods</p>\r\n<p>- Modernization Project Oriented&nbsp;</p>', '', 2, 5, 'Engineering, Mechanical Engineering', '10 Year/s', '50000,20000', 'Bachelors/College Degree', 'Regular Full Time', 'Logical Thinking,Supervising operations,Repairing equipment,Inspecting buildings/equipment,Assembling equipment', 1, '2016-04-12 14:37:44', 0),
(3, 'HIRING FRESH GRADUATES OF INDUSTRIAL ENGINEERING', '<ul>\r\n<li>Knowledge in using graphic applications is an advantage</li>\r\n<li>Must have very good analytical, organizational, interpersonal and communication skills</li>\r\n<li>Must be flexible, has keen attention to detaills and goal oriented</li>\r\n</ul>', '', 3, 50, 'Engineering, Industrial Engineering', '1 Month/s', '20000,30000', 'Bachelors/College Degree', 'Regular Full Time', 'Analytical Skills,Evaluating,Using computers,Verbal communication skills', 1, '2016-04-12 14:42:13', 0),
(4, 'CHEMICAL FIELD ENGINEER', '<ul>\r\n<li>Atleast 10 years of experience</li>\r\n<li>Must be flexible</li>\r\n</ul>', '', 5, 15, 'Engineering, Chemical Engineering', '10 Year/s', '50000,20000', 'Bachelors/College Degree', 'Regular Full Time', 'Analytical Skills,Prioritization skills,Logical Thinking,Creative Thinking,Laboratory Skills', 1, '2016-04-12 15:34:00', 0),
(5, 'ANALYTICAL DEVELOPMENT SUPPORT', '<ul>\r\n<li>Responsible for leading aalytical improvement projects</li>\r\n<li>Responsible for ensuring that all methods are validated to current standards and ensuring the documentations are kept up to date</li>\r\n<li>Make recommendations for the implementation of new technlogies</li>\r\n<li>Lead the implementation of new testing technologies and methods</li>\r\n<li>Responsible for ensuring a consistent approach for the introduction analysis methods for new products to the site</li>\r\n<li>Support the lab manager in other lab tasks</li>\r\n</ul>', '', 4, 30, 'Engineering, Chemical Engineering', '5 Year/s', '40000,50000', 'Bachelors/College Degree', 'Regular Full Time', 'Analytical Skills,Evaluating,Verbal communication skills,Laboratory Skills,Quality Assurance', 1, '2016-04-12 15:41:30', 0),
(6, 'PLANT MACHINE OPERATOR', '<ul>\r\n<li>Responsible in maintaining periodic service or routing analysis at customer site as part of the client''s customer assistance to ensure that the products delivered are properly handled and used at proper time at optimum dosage and applies immediate corrective action if necessary</li>\r\n<li>Keeps manager informed of activities</li>\r\n<li>Represents client is servicing customers. Handles discussion with client and customers</li>\r\n</ul>', '', 5, 30, 'Engineering, Electronics and Communication Engineering', '5 Year/s', '30000,40000', 'Bachelors/College Degree', 'Regular Full Time', 'Diplomacy Skills,Verbal communication skills,Inspecting buildings/equipment,Maintenance Skills,Quality Assurance', 1, '2016-04-12 15:44:52', 0),
(7, 'TECHNICAL SUPERVISOR', '<ul>\r\n<li>Knowledgeable in implementation and documentation</li>\r\n<li>Excellent communication skills</li>\r\n<li>Hardworking</li>\r\n<li>leadership ability</li>\r\n</ul>', '', 6, 45, 'Engineering, Industrial Engineering', '5 Year/s', '40000,50000', 'Bachelors/College Degree', 'Regular Full Time', 'Verbal communication skills,Supervising operations,People management skills,Technical Skills', 1, '2016-04-12 15:49:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicant_transact`
--

CREATE TABLE IF NOT EXISTS `job_applicant_transact` (
  `id` int(11) NOT NULL,
  `job_id_tr` int(11) NOT NULL,
  `applicant_id_tr` int(11) NOT NULL,
  `date_applied` date NOT NULL,
  `app_status` varchar(40) NOT NULL,
  `video_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applicant_transact`
--

INSERT INTO `job_applicant_transact` (`id`, `job_id_tr`, `applicant_id_tr`, `date_applied`, `app_status`, `video_link`) VALUES
(1, 2, 1, '2016-05-11', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mp_request`
--

CREATE TABLE IF NOT EXISTS `mp_request` (
  `mp_id` int(11) NOT NULL,
  `job_position` varchar(50) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `skills_requirements` text NOT NULL,
  `work_expi` varchar(255) NOT NULL,
  `job_slots` int(11) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_id` int(11) NOT NULL,
  `employment_type` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mp_request`
--

INSERT INTO `mp_request` (`mp_id`, `job_position`, `dept_name`, `skills_requirements`, `work_expi`, `job_slots`, `date_add`, `emp_id`, `employment_type`, `status`) VALUES
(1, 'programmer', 'IT', 'Network Administrator', '1', 0, '0000-00-00 00:00:00', 3, 'Full Time', 1),
(14, 'IT Support', 'z', 'Mobile Developer,Software Developer,Chief Information Officer', '2', 2, '0000-00-00 00:00:00', 3, 'Full Time Employee', 1),
(15, 'IT programmer', 'ITE', 'Data Analyst,Network Administrator', '5', 3, '0000-00-00 00:00:00', 2, 'Full Time', 1),
(16, 'Sofware engr', 'ITE', 'Software Developer', '2', 2, '0000-00-00 00:00:00', 1, 'Full Time', 1),
(17, 'Oplan', 'ITE', 'Network Administrator', '2', 2, '2016-02-22 19:09:18', 1, 'Full Time', 1),
(18, 'asdad', 'asda', 'Mobile Developer', '2', 2, '2016-02-22 19:14:46', 1, 'Part Time', 1),
(19, 'IT sus', 'asdasd', 'Network Administrator,Mobile Developer', '2', 2, '2016-02-23 02:58:20', 1, 'Full Time', 1),
(20, 'JAVA PROGRAMMER', 'IT DEPARTMENT', 'Data Analyst,Software Developer,Java', '2', 5, '2016-02-23 07:19:36', 1, 'Full Time', 0),
(21, 'Java Pa', 'ITE', 'Java,Ruby,PHP Developer', '5', 1, '2016-02-24 09:30:29', 1, 'Full Time', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notifications_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `type_id`, `sender_id`, `receiver_id`, `seen`, `date_added`) VALUES
(1, 1, 3, 1, 0, '2016-02-19 09:23:24'),
(2, 11, 1, 3, 0, '2016-02-19 09:24:55'),
(3, 1, 3, 1, 0, '2016-02-23 02:49:19'),
(4, 1, 3, 55, 0, '2016-02-24 05:41:27'),
(5, 11, 55, 3, 0, '2016-02-24 05:42:35'),
(6, 1, 3, 1, 0, '2016-02-24 09:16:50'),
(7, 1, 3, 1, 0, '2016-02-24 09:36:10'),
(8, 11, 1, 3, 0, '2016-02-24 09:37:31'),
(9, 11, 3, 3, 0, '2016-02-24 09:40:43'),
(10, 11, 52, 3, 0, '2016-03-25 17:06:04'),
(11, 1, 3, 1, 0, '2016-05-11 02:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `percentageweight`
--

CREATE TABLE IF NOT EXISTS `percentageweight` (
  `id` int(11) NOT NULL,
  `skills` varchar(30) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `workexp` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentageweight`
--

INSERT INTO `percentageweight` (`id`, `skills`, `degree`, `salary`, `workexp`) VALUES
(1, '50', '10', '30', '10');

-- --------------------------------------------------------

--
-- Table structure for table `performance_transact`
--

CREATE TABLE IF NOT EXISTS `performance_transact` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `coemp_id` int(11) NOT NULL,
  `perf_status` int(11) NOT NULL DEFAULT '0',
  `perf_type` varchar(150) NOT NULL,
  `evaluated` varchar(150) NOT NULL,
  `finalresult` varchar(150) NOT NULL,
  `period` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referral_form`
--

CREATE TABLE IF NOT EXISTS `referral_form` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `years_expi` int(3) NOT NULL,
  `work_position` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savejobs`
--

CREATE TABLE IF NOT EXISTS `savejobs` (
  `savejobs_id` int(11) NOT NULL,
  `sj_app_id` int(11) NOT NULL,
  `sj_job_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savejobs`
--

INSERT INTO `savejobs` (`savejobs_id`, `sj_app_id`, `sj_job_id`) VALUES
(1, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, 'Analytical Skills'),
(2, 'Budgeting'),
(3, 'Diplomacy Skills'),
(4, 'Editing Skills'),
(5, 'Interviewing'),
(6, 'Evaluating'),
(7, 'Maintaining Files'),
(8, 'Prioritization skills'),
(9, 'Logical Thinking'),
(10, 'Using computers'),
(11, 'Verbal communication skills'),
(12, 'Computing'),
(13, 'Financial Assessment Skill'),
(14, 'Supervising operations'),
(15, 'Repairing equipment'),
(16, 'People management skills'),
(17, 'Leading teams'),
(18, 'Clerical Work'),
(19, 'Inspecting buildings/equipment'),
(20, 'Decision making'),
(21, 'Assembling equipment'),
(22, 'Technical Skills'),
(23, 'Problem Solving Skills'),
(24, 'Critical Thinking'),
(25, 'Creative Thinking'),
(26, 'Developing Skills'),
(27, 'Innovation Skills'),
(28, 'Laboratory Skills'),
(29, 'Maintenance Skills'),
(30, 'Quality Assurance'),
(31, 'Software'),
(32, 'Quality Control'),
(33, 'Software Knowledge'),
(34, 'Database Management');

-- --------------------------------------------------------

--
-- Table structure for table `skills_applicant_transact`
--

CREATE TABLE IF NOT EXISTS `skills_applicant_transact` (
  `id` int(11) NOT NULL,
  `skills_id_tr` int(11) NOT NULL,
  `applicant_id_tr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `id` int(11) NOT NULL,
  `state_id` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1642 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `state_id`, `city_name`) VALUES
(12, 'MetroManila', 'Caloocan'),
(13, 'MetroManila', 'Las Piñas'),
(14, 'MetroManila', 'Makati'),
(15, 'MetroManila', 'Malabon'),
(16, 'MetroManila', 'Mandaluyong'),
(17, 'MetroManila', 'Manila'),
(18, 'MetroManila', 'Marikina'),
(19, 'MetroManila', 'Muntinlupa'),
(20, 'MetroManila', 'Navotas'),
(21, 'MetroManila', 'Parañaque'),
(22, 'MetroManila', 'Pasay'),
(23, 'MetroManila', 'Pasig'),
(24, 'MetroManila', 'Quezon City'),
(25, 'MetroManila', 'San Juan'),
(26, 'MetroManila', 'Taguig'),
(27, 'MetroManila', 'Valenzuela'),
(31, 'AgusandelSur', 'Bunawan'),
(32, 'AgusandelSur', ' Esperanza'),
(33, 'AgusandelSur', ' La Paz'),
(34, 'AgusandelSur', ' Loreto'),
(35, 'AgusandelSur', ' Prosperidad'),
(36, 'AgusandelSur', ' Rosario'),
(37, 'AgusandelSur', ' San Francisco'),
(38, 'AgusandelSur', ' San Luis '),
(39, 'AgusandelSur', ' Santa Josefa'),
(40, 'AgusandelSur', ' Sibagat'),
(41, 'AgusandelSur', ' Talacogon'),
(42, 'AgusandelSur', ' Trento'),
(43, 'AgusandelSur', ' Veruela '),
(44, 'Abra', 'Bangued'),
(45, 'Abra', ' Boliney'),
(46, 'Abra', ' Bucay'),
(47, 'Abra', ' Bucloc'),
(48, 'Abra', ' Daguioman'),
(49, 'Abra', ' Danglas'),
(50, 'Abra', ' Dolores'),
(51, 'Abra', ' La Paz'),
(52, 'Abra', ' Lacub'),
(53, 'Abra', ' Lagangilang'),
(54, 'Abra', ' Lagayan'),
(55, 'Abra', ' Langiden'),
(56, 'Abra', ' Licuan-Baay'),
(57, 'Abra', ' Luba'),
(58, 'Abra', ' Malibcong'),
(59, 'Abra', ' Manabo'),
(60, 'Abra', ' Peñarrubia'),
(61, 'Abra', ' Pidigan'),
(62, 'Abra', ' Pilar'),
(63, 'Abra', ' Sallapadan'),
(64, 'Abra', ' San Isidro'),
(65, 'Abra', ' San Juan'),
(66, 'Abra', ' San Quintin'),
(67, 'Abra', ' Tayum'),
(68, 'Abra', ' Tineg'),
(69, 'Abra', ' Tubo'),
(70, 'Abra', ' Villaviciosa'),
(71, 'AgusandelNorte ', 'Buenavista'),
(72, 'AgusandelNorte ', ' Carmen'),
(73, 'AgusandelNorte ', ' Jabonga'),
(74, 'AgusandelNorte ', ' Kitcharao'),
(75, 'AgusandelNorte ', ' Las Nieves'),
(76, 'AgusandelNorte ', ' Magallanes'),
(77, 'AgusandelNorte ', ' Nasipit'),
(78, 'AgusandelNorte ', ' Remedios'),
(79, 'AgusandelNorte ', ' T. Romualdez'),
(80, 'AgusandelNorte ', ' Santiago'),
(81, 'AgusandelNorte ', ' Tubay '),
(82, 'Aklan', 'Altavas'),
(83, 'Aklan', ' Balete'),
(84, 'Aklan', ' Banga'),
(85, 'Aklan', ' Batan'),
(86, 'Aklan', ' Buruanga'),
(87, 'Aklan', ' Ibajay'),
(88, 'Aklan', ' Kalibo'),
(89, 'Aklan', ' Lezo'),
(90, 'Aklan', ' Libacao'),
(91, 'Aklan', ' Madalag'),
(92, 'Aklan', ' Makato'),
(93, 'Aklan', ' Malay'),
(94, 'Aklan', ' Malinao'),
(95, 'Aklan', ' Nabas'),
(96, 'Aklan', ' New Washington'),
(97, 'Aklan', ' Numancia'),
(98, 'Aklan', ' Tangalan '),
(99, 'Albay', 'Bacacay'),
(100, 'Albay', ' Camalig'),
(101, 'Albay', ' Daraga'),
(102, 'Albay', ' Guinobatan'),
(103, 'Albay', ' Jovellar'),
(104, 'Albay', ' Libon'),
(105, 'Albay', ' Malilipot'),
(106, 'Albay', ' Malinao'),
(107, 'Albay', ' Manito'),
(108, 'Albay', ' Oas'),
(109, 'Albay', ' Pio Duran'),
(110, 'Albay', ' Polangui'),
(111, 'Albay', ' Rapu-Rapu'),
(112, 'Albay', ' Santo Domingo'),
(113, 'Albay', ' Tiwi '),
(114, 'Antique', 'Anini-y'),
(115, 'Antique', ' Barbaza'),
(116, 'Antique', ' Belison'),
(117, 'Antique', ' Bugasong'),
(118, 'Antique', ' Caluya'),
(119, 'Antique', ' Culasi'),
(120, 'Antique', ' Hamtic'),
(121, 'Antique', ' Laua-an'),
(122, 'Antique', ' Libertad'),
(123, 'Antique', ' Pandan'),
(124, 'Antique', ' Patnongon'),
(125, 'Antique', ' San Jose'),
(126, 'Antique', ' San Remigio'),
(127, 'Antique', ' Sebaste'),
(128, 'Antique', ' Sibalom'),
(129, 'Antique', ' Tibiao'),
(130, 'Antique', ' Tobias'),
(131, 'Antique', ' Fornier'),
(132, 'Antique', ' Valderrama'),
(133, 'Apayao', 'Calanasan'),
(134, 'Apayao', ' Conner'),
(135, 'Apayao', ' Flora'),
(136, 'Apayao', ' Kabugao'),
(137, 'Apayao', ' Luna'),
(138, 'Apayao', ' Pudtol'),
(139, 'Apayao', ' Santa Marcela '),
(140, 'Aurora', 'Baler'),
(141, 'Aurora', ' Casiguran'),
(142, 'Aurora', ' Dilasag'),
(143, 'Aurora', ' Dinalungan'),
(144, 'Aurora', ' Dingalan'),
(145, 'Aurora', ' Dipaculao'),
(146, 'Aurora', ' Maria Aurora'),
(147, 'Aurora', ' San Luis'),
(148, 'Basilan', 'Akbar'),
(149, 'Basilan', ' Al-Barka'),
(150, 'Basilan', ' Hadji Mohammad Aju'),
(151, 'Basilan', ' Lantawan'),
(152, 'Basilan', ' Maluso'),
(153, 'Basilan', ' Sumisip'),
(154, 'Basilan', ' Tipo-Tipo'),
(155, 'Basilan', ' Tuburan'),
(156, 'Basilan', ' Ungkaya Pukan '),
(157, 'Bataan', 'Abucay'),
(158, 'Bataan', ' Bagac'),
(159, 'Bataan', ' Dinalupihan'),
(160, 'Bataan', ' Hermosa'),
(161, 'Bataan', ' Limay'),
(162, 'Bataan', ' Mariveles'),
(163, 'Bataan', ' Morong'),
(164, 'Bataan', ' Orani'),
(165, 'Bataan', ' Orion'),
(166, 'Bataan', ' Pilar'),
(167, 'Bataan', ' Samal '),
(168, 'Batanes', 'Basco'),
(169, 'Batanes', ' Itbayat'),
(170, 'Batanes', ' Ivana'),
(171, 'Batanes', ' Mahatao'),
(172, 'Batanes', ' Sabtang'),
(173, 'Batanes', ' Uyugan '),
(174, 'Batangas', 'Agoncillo'),
(175, 'Batangas', ' Alitagtag'),
(176, 'Batangas', ' Balayan'),
(177, 'Batangas', ' Balete'),
(178, 'Batangas', ' Bauan'),
(179, 'Batangas', ' Calaca'),
(180, 'Batangas', ' Calatagan'),
(181, 'Batangas', ' Cuenca'),
(182, 'Batangas', ' Ibaan'),
(183, 'Batangas', ' Laurel'),
(184, 'Batangas', ' Lemery'),
(185, 'Batangas', ' Lian'),
(186, 'Batangas', ' Lobo'),
(187, 'Batangas', ' Mabini'),
(188, 'Batangas', ' Malvar'),
(189, 'Batangas', ' Mataas na Kahoy'),
(190, 'Batangas', ' Nasugbu'),
(191, 'Batangas', ' Padre Garcia'),
(192, 'Batangas', ' Rosario'),
(193, 'Batangas', ' San Jose'),
(194, 'Batangas', ' San Juan'),
(195, 'Batangas', ' San Luis'),
(196, 'Batangas', ' San Nicolas'),
(197, 'Batangas', ' San Pascual'),
(198, 'Batangas', ' Santa Teresita'),
(199, 'Batangas', ' Santo Tomas'),
(200, 'Batangas', ' Taal'),
(201, 'Batangas', ' Talisay'),
(202, 'Batangas', ' Taysan'),
(203, 'Batangas', ' Tingloy'),
(204, 'Batangas', ' Tuy '),
(205, 'Benguet', 'Atok'),
(206, 'Benguet', ' Bakun'),
(207, 'Benguet', ' Bokod'),
(208, 'Benguet', ' Buguias'),
(209, 'Benguet', ' Itogon'),
(210, 'Benguet', ' Kabayan'),
(211, 'Benguet', ' Kapangan'),
(212, 'Benguet', ' Kibungan'),
(213, 'Benguet', ' La Trinidad'),
(214, 'Benguet', ' Mankayan'),
(215, 'Benguet', ' Sablan'),
(216, 'Benguet', ' Tuba'),
(217, 'Benguet', ' Tublay'),
(218, 'Biliran', 'Almeria'),
(219, 'Biliran', ' Biliran'),
(220, 'Biliran', ' Cabucgayan'),
(221, 'Biliran', ' Caibiran'),
(222, 'Biliran', ' Culaba'),
(223, 'Biliran', ' Kawayan'),
(224, 'Biliran', ' Maripipi'),
(225, 'Biliran', ' Naval '),
(226, 'Bohol', 'Alburquerque'),
(227, 'Bohol', ' Alicia'),
(228, 'Bohol', ' Anda'),
(229, 'Bohol', ' Antequera'),
(230, 'Bohol', ' Baclayon'),
(231, 'Bohol', ' Balilihan'),
(232, 'Bohol', ' Batuan'),
(233, 'Bohol', ' Bien Unido'),
(234, 'Bohol', ' Bilar'),
(235, 'Bohol', ' Buenavista'),
(236, 'Bohol', ' Calape'),
(237, 'Bohol', ' Candijay'),
(238, 'Bohol', ' Carmen'),
(239, 'Bohol', ' Catigbian'),
(240, 'Bohol', ' Clarin'),
(241, 'Bohol', ' Corella'),
(242, 'Bohol', ' Cortes'),
(243, 'Bohol', ' Dagohoy'),
(244, 'Bohol', ' Danao'),
(245, 'Bohol', ' Dauis'),
(246, 'Bohol', ' Dimiao'),
(247, 'Bohol', ' Duero'),
(248, 'Bohol', ' Garcia Hernandez'),
(249, 'Bohol', ' Guindulman'),
(250, 'Bohol', ' Inabanga'),
(251, 'Bohol', ' Jagna'),
(252, 'Bohol', ' Jetafe'),
(253, 'Bohol', ' Lila'),
(254, 'Bohol', ' Loay'),
(255, 'Bohol', ' Loboc'),
(256, 'Bohol', ' Loon'),
(257, 'Bohol', ' Mabini'),
(258, 'Bohol', ' Maribojoc'),
(259, 'Bohol', ' Panglao'),
(260, 'Bohol', ' Pilar'),
(261, 'Bohol', ' Pres. Carlos P. Garcia'),
(262, 'Bohol', ' Sagbayan'),
(263, 'Bohol', ' San Isidro'),
(264, 'Bohol', ' San Miguel'),
(265, 'Bohol', ' Sevilla'),
(266, 'Bohol', ' Sierra Bullones'),
(267, 'Bohol', ' Sikatuna'),
(268, 'Bohol', ' Talibon'),
(269, 'Bohol', ' Trinidad'),
(270, 'Bohol', ' Tubigon'),
(271, 'Bohol', ' Ubay'),
(272, 'Bohol', ' Valencia '),
(273, 'Bukidnon', 'Baungon'),
(274, 'Bukidnon', ' Cabanglasan'),
(275, 'Bukidnon', ' Damulog'),
(276, 'Bukidnon', ' Dangcagan'),
(277, 'Bukidnon', ' Don Carlos'),
(278, 'Bukidnon', ' Impasug-Ong'),
(279, 'Bukidnon', ' Kadingilan'),
(280, 'Bukidnon', ' Kalilangan'),
(281, 'Bukidnon', ' Kibawe'),
(282, 'Bukidnon', ' Kitaotao'),
(283, 'Bukidnon', ' Lantapan'),
(284, 'Bukidnon', ' Libona'),
(285, 'Bukidnon', ' Malitbog'),
(286, 'Bukidnon', ' Manolo Fortich'),
(287, 'Bukidnon', ' Maramag'),
(288, 'Bukidnon', ' Pangantucan'),
(289, 'Bukidnon', ' Quezon'),
(290, 'Bukidnon', ' San Fernando'),
(291, 'Bukidnon', ' Sumilao'),
(292, 'Bukidnon', ' Talakag'),
(293, 'Bulacan', 'Angat'),
(294, 'Bulacan', ' Balagtas'),
(295, 'Bulacan', ' Baliuag'),
(296, 'Bulacan', ' Bocaue'),
(297, 'Bulacan', ' Bulacan'),
(298, 'Bulacan', ' Bustos'),
(299, 'Bulacan', ' Calumpit'),
(300, 'Bulacan', ' Doña Remedios Trinidad'),
(301, 'Bulacan', ' Guiguinto'),
(302, 'Bulacan', ' Hagonoy'),
(303, 'Bulacan', ' Marilao'),
(304, 'Bulacan', ' Norzagaray'),
(305, 'Bulacan', ' Obando'),
(306, 'Bulacan', ' Pandi'),
(307, 'Bulacan', ' Paombong'),
(308, 'Bulacan', ' Plaridel'),
(309, 'Bulacan', ' Pulilan'),
(310, 'Bulacan', ' San Ildefonso'),
(311, 'Bulacan', ' San Miguel'),
(312, 'Bulacan', ' San Rafael'),
(313, 'Bulacan', ' Santa Maria '),
(314, 'Cagayan', 'Abulug'),
(315, 'Cagayan', ' Alcala'),
(316, 'Cagayan', ' Allacapan'),
(317, 'Cagayan', ' Amulung'),
(318, 'Cagayan', ' Aparri'),
(319, 'Cagayan', ' Baggao'),
(320, 'Cagayan', ' Ballesteros'),
(321, 'Cagayan', ' Buguey'),
(322, 'Cagayan', ' Calayan'),
(323, 'Cagayan', ' Camalaniugan'),
(324, 'Cagayan', ' Claveria'),
(325, 'Cagayan', ' Enrile'),
(326, 'Cagayan', ' Gattaran'),
(327, 'Cagayan', ' Gonzaga'),
(328, 'Cagayan', ' Iguig'),
(329, 'Cagayan', ' Lal-Lo'),
(330, 'Cagayan', ' Lasam'),
(331, 'Cagayan', ' Pamplona'),
(332, 'Cagayan', ' Peñablanca'),
(333, 'Cagayan', ' Piat'),
(334, 'Cagayan', ' Rizal'),
(335, 'Cagayan', ' Sanchez-Mira'),
(336, 'Cagayan', ' Santa Ana'),
(337, 'Cagayan', ' Santa Praxedes'),
(338, 'Cagayan', ' Santa Teresita'),
(339, 'Cagayan', ' Santo Niño'),
(340, 'Cagayan', ' Solana'),
(341, 'Cagayan', ' Tuao'),
(342, 'CamarinesNorte', 'Basud'),
(343, 'CamarinesNorte', ' Capalonga'),
(344, 'CamarinesNorte', ' Daet'),
(345, 'CamarinesNorte', ' Jose Panganiban'),
(346, 'CamarinesNorte', 'Labo'),
(347, 'CamarinesNorte', 'Mercedes'),
(348, 'CamarinesNorte', 'Paracale'),
(349, 'CamarinesNorte', 'San Lorenzo'),
(350, 'CamarinesNorte', 'Ruiz'),
(351, 'CamarinesNorte', 'San Vicente'),
(352, 'CamarinesNorte', 'Santa Elena'),
(353, 'CamarinesNorte', 'Talisay'),
(354, 'CamarinesNorte', 'Vinzons '),
(368, 'CamarinesSur', 'Iriga City'),
(369, 'CamarinesSur', ' Naga City'),
(370, 'CamarinesSur', ' Baao'),
(371, 'CamarinesSur', ' Balatan'),
(372, 'CamarinesSur', ' Bato'),
(373, 'CamarinesSur', ' Bombon'),
(374, 'CamarinesSur', ' Buhi'),
(375, 'CamarinesSur', ' Bula'),
(376, 'CamarinesSur', ' Cabusao'),
(377, 'CamarinesSur', ' Calabanga'),
(378, 'CamarinesSur', ' Camaligan'),
(379, 'CamarinesSur', ' Canaman'),
(380, 'CamarinesSur', ' Caramoan'),
(381, 'CamarinesSur', 'Del Gallego'),
(382, 'CamarinesSur', 'Gainza'),
(383, 'CamarinesSur', 'Garchitorena'),
(384, 'CamarinesSur', 'Goa'),
(385, 'CamarinesSur', 'Lagonoy'),
(386, 'CamarinesSur', 'Libmanan'),
(387, 'CamarinesSur', 'Lupi'),
(388, 'CamarinesSur', 'Magarao'),
(389, 'CamarinesSur', 'Milaor'),
(390, 'CamarinesSur', 'Minalabac'),
(391, 'CamarinesSur', 'Nabua'),
(392, 'CamarinesSur', 'Ocampo'),
(393, 'CamarinesSur', 'Pamplona'),
(394, 'CamarinesSur', 'Pasacao'),
(395, 'CamarinesSur', 'Pili'),
(396, 'CamarinesSur', 'Presentacion'),
(397, 'CamarinesSur', 'Ragay'),
(398, 'CamarinesSur', ' Sagñay'),
(399, 'CamarinesSur', 'San Fernando'),
(400, 'CamarinesSur', 'San Jose'),
(401, 'CamarinesSur', 'Sipocot'),
(402, 'CamarinesSur', 'Siruma'),
(403, 'CamarinesSur', 'Tigaon'),
(404, 'CamarinesSur', 'Tinambac '),
(405, 'Camiguin', 'Catarman '),
(406, 'Camiguin', ' Guinsiliban'),
(407, 'Camiguin', ' Mahinog'),
(408, 'Camiguin', ' Mambajao'),
(409, 'Camiguin', ' Sagay '),
(410, 'Capiz', 'Roxas City'),
(411, 'Capiz', ' Cuartero'),
(412, 'Capiz', ' Dao'),
(413, 'Capiz', ' Dumalag'),
(414, 'Capiz', ' Dumarao'),
(415, 'Capiz', ' Ivisan'),
(416, 'Capiz', ' Jamindan'),
(417, 'Capiz', ' Ma-ayon'),
(418, 'Capiz', ' Mambusao'),
(419, 'Capiz', ' Panay'),
(420, 'Capiz', ' Panitan'),
(421, 'Capiz', ' Pilar'),
(422, 'Capiz', ' Pontevedra'),
(423, 'Capiz', ' President Roxas'),
(424, 'Capiz', ' Sapi-an'),
(425, 'Capiz', ' Sigma'),
(426, 'Capiz', ' Tapaz '),
(427, 'Catanduanes', 'Bagamanoc'),
(428, 'Catanduanes', ' Baras'),
(429, 'Catanduanes', ' Bato'),
(430, 'Catanduanes', ' Caramoran'),
(431, 'Catanduanes', ' Gigmoto'),
(432, 'Catanduanes', ' Pandan'),
(433, 'Catanduanes', ' Panganiban'),
(434, 'Catanduanes', ' San Andres'),
(435, 'Catanduanes', ' San Miguel'),
(436, 'Catanduanes', ' Viga'),
(437, 'Catanduanes', ' Virac'),
(438, 'Cavite', 'Cavite City'),
(439, 'Cavite', ' Tagaytay City'),
(440, 'Cavite', ' Trece Martires City'),
(441, 'Cavite', ' Alfonso'),
(442, 'Cavite', ' Amadeo'),
(443, 'Cavite', ' Bacoor'),
(444, 'Cavite', ' Carmona'),
(445, 'Cavite', ' Dasmariñas'),
(446, 'Cavite', ' Gen. Mariano Alvarez'),
(447, 'Cavite', ' Gen. Emilio Aguinaldo'),
(448, 'Cavite', ' Gen. Trias'),
(449, 'Cavite', ' Imus'),
(450, 'Cavite', ' Indang'),
(451, 'Cavite', ' Kawit'),
(452, 'Cavite', ' Magallanes'),
(453, 'Cavite', ' Maragondon'),
(454, 'Cavite', ' Mendez'),
(455, 'Cavite', ' Naic'),
(456, 'Cavite', ' Noveleta'),
(457, 'Cavite', ' Rosario'),
(458, 'Cavite', ' Silang'),
(459, 'Cavite', ' Tanza'),
(460, 'Cavite', ' Ternate '),
(461, 'Cebu', 'Argao City'),
(462, 'Cebu', ' Bogo City'),
(463, 'Cebu', ' Carcar City'),
(464, 'Cebu', ' Cebu City'),
(465, 'Cebu', ' Danao City'),
(466, 'Cebu', ' Lapu-Lapu City'),
(467, 'Cebu', ' Mandaue City'),
(468, 'Cebu', ' Talisay City'),
(469, 'Cebu', ' Toledo City'),
(470, 'Cebu', ' Naga City'),
(471, 'Cebu', ' Alcantara'),
(472, 'Cebu', ' Alcoy'),
(473, 'Cebu', ' Alegria'),
(474, 'Cebu', ' Aloguinsan'),
(475, 'Cebu', ' Argao'),
(476, 'Cebu', ' Asturias'),
(477, 'Cebu', ' Badian'),
(478, 'Cebu', ' Balamban'),
(479, 'Cebu', ' Bantayan'),
(480, 'Cebu', ' Barili'),
(481, 'Cebu', ' Boljoon'),
(482, 'Cebu', ' Borbon'),
(483, 'Cebu', ' Carmen'),
(484, 'Cebu', ' Catmon'),
(485, 'Cebu', ' Compostela'),
(486, 'Cebu', ' Consolacion'),
(487, 'Cebu', ' Cordoba'),
(488, 'Cebu', ' Daanbantayan'),
(489, 'Cebu', ' Dalaguete'),
(490, 'Cebu', ' Dumanjug'),
(491, 'Cebu', ' Ginatilan'),
(492, 'Cebu', ' Liloan'),
(493, 'Cebu', ' Madridejos'),
(494, 'Cebu', ' Malabuyoc'),
(495, 'Cebu', ' Medellin'),
(496, 'Cebu', ' Minglanilla'),
(497, 'Cebu', ' Moalboal'),
(498, 'Cebu', ' Oslob'),
(499, 'Cebu', ' Pilar'),
(500, 'Cebu', ' Pinamungahan'),
(501, 'Cebu', ' Poro'),
(502, 'Cebu', ' Ronda'),
(503, 'Cebu', ' Samboan'),
(504, 'Cebu', ' San Fernando'),
(505, 'Cebu', ' San Francisco'),
(506, 'Cebu', ' San Remigio'),
(507, 'Cebu', ' Santa Fe'),
(508, 'Cebu', ' Santander'),
(509, 'Cebu', ' Sibonga'),
(510, 'Cebu', ' Sogod'),
(511, 'Cebu', ' Tabogon'),
(512, 'Cebu', ' Tabuelan'),
(513, 'Cebu', ' Tuburan'),
(514, 'Cebu', ' Tudela'),
(515, 'CompostellaValley', 'Compostela'),
(516, 'CompostellaValley', ' Laak'),
(517, 'CompostellaValley', ' Mabini'),
(518, 'CompostellaValley', ' Maco'),
(519, 'CompostellaValley', ' Maragusan'),
(520, 'CompostellaValley', ' Mawab'),
(521, 'CompostellaValley', ' Monkayo'),
(522, 'CompostellaValley', ' Montevista'),
(523, 'CompostellaValley', ' Nabunturan'),
(524, 'CompostellaValley', ' New Bataan'),
(525, 'CompostellaValley', ' Pantukan '),
(526, 'Cotabato', 'Kidapawan City'),
(527, 'Cotabato', ' Alamada'),
(528, 'Cotabato', ' Aleosan'),
(529, 'Cotabato', ' Antipas'),
(530, 'Cotabato', ' Arakan'),
(531, 'Cotabato', ' Banisilan'),
(532, 'Cotabato', ' Carmen'),
(533, 'Cotabato', ' Kabacan'),
(534, 'Cotabato', ' Libungan'),
(535, 'Cotabato', ' M''Lang'),
(536, 'Cotabato', ' Magpet'),
(537, 'Cotabato', ' Makilala'),
(538, 'Cotabato', ' Matalam'),
(539, 'Cotabato', ' Midsayap'),
(540, 'Cotabato', ' Pigkawayan'),
(541, 'Cotabato', ' Pikit'),
(542, 'Cotabato', ' President Roxas'),
(543, 'Cotabato', ' Tulunan '),
(544, 'DavaodelNorte', 'Island Garden City of Samal'),
(545, 'DavaodelNorte', ' Panabo City'),
(546, 'DavaodelNorte', ' Tagum City'),
(547, 'DavaodelNorte', ' Asuncion'),
(548, 'DavaodelNorte', ' Braulio E. Dujali'),
(549, 'DavaodelNorte', ' Carmen'),
(550, 'DavaodelNorte', ' Kapalong'),
(551, 'DavaodelNorte', ' New Corella'),
(552, 'DavaodelNorte', ' San Isidro'),
(553, 'DavaodelNorte', ' Santo Tomas'),
(554, 'DavaodelNorte', ' Talaingod '),
(555, 'DavaodelSur', 'Davao City'),
(556, 'DavaodelSur', ' Digos City'),
(557, 'DavaodelSur', ' Bansalan'),
(558, 'DavaodelSur', ' Don Marcelino'),
(559, 'DavaodelSur', ' Hagonoy'),
(560, 'DavaodelSur', ' Jose Abad Santos'),
(561, 'DavaodelSur', ' Kiblawan'),
(562, 'DavaodelSur', ' Magsaysay'),
(563, 'DavaodelSur', ' Malalag'),
(564, 'DavaodelSur', ' Malita'),
(565, 'DavaodelSur', ' Matanao'),
(566, 'DavaodelSur', ' Padada'),
(567, 'DavaodelSur', ' Santa Cruz'),
(568, 'DavaodelSur', ' Santa Maria'),
(569, 'DavaodelSur', ' Sarangani'),
(570, 'DavaodelSur', ' Sulop '),
(571, 'DavaoOriental', 'Mati City'),
(572, 'DavaoOriental', ' Baganga'),
(573, 'DavaoOriental', ' Banaybanay'),
(574, 'DavaoOriental', ' Boston'),
(575, 'DavaoOriental', ' Caraga'),
(576, 'DavaoOriental', ' Cateel'),
(577, 'DavaoOriental', ' Governor Generoso'),
(578, 'DavaoOriental', ' Lupon'),
(579, 'DavaoOriental', ' Manay'),
(580, 'DavaoOriental', ' San Isidro'),
(581, 'DavaoOriental', ' Tarragona '),
(582, 'DinagatIslands', 'Basilisia (Rizal)'),
(583, 'DinagatIslands', ' Cagdianao'),
(584, 'DinagatIslands', ' Dinagat'),
(585, 'DinagatIslands', ' Libjo (Albor)'),
(586, 'DinagatIslands', ' Loreto'),
(587, 'DinagatIslands', ' San Jose'),
(588, 'DinagatIslands', ' Tubajon '),
(589, 'EasternSamar', 'Borongan City'),
(590, 'EasternSamar', ' Arteche'),
(591, 'EasternSamar', ' Balangiga'),
(592, 'EasternSamar', ' Balangkayan'),
(593, 'EasternSamar', ' Can-avid'),
(594, 'EasternSamar', ' Dolores'),
(595, 'EasternSamar', ' General MacArthur'),
(596, 'EasternSamar', ' Giporlos'),
(597, 'EasternSamar', ' Guiuan'),
(598, 'EasternSamar', ' Hernani'),
(599, 'EasternSamar', ' Jipapad'),
(600, 'EasternSamar', ' Lawaan'),
(601, 'EasternSamar', ' Llorente'),
(602, 'EasternSamar', ' Maslog'),
(603, 'EasternSamar', ' Maydolong'),
(604, 'EasternSamar', ' Mercedes'),
(605, 'EasternSamar', ' Oras'),
(606, 'EasternSamar', ' Quinapondan'),
(607, 'EasternSamar', ' Salcedo'),
(608, 'EasternSamar', ' San Julian'),
(609, 'EasternSamar', ' San Policarpo'),
(610, 'EasternSamar', ' Sulat'),
(611, 'EasternSamar', ' Taft'),
(612, 'Guimaras', 'Buenavista'),
(613, 'Guimaras', ' Jordan'),
(614, 'Guimaras', ' Nueva Valencia'),
(615, 'Guimaras', ' San Lorenzo'),
(616, 'Guimaras', ' Sibunag '),
(617, 'Ifugao', 'Aguinaldo'),
(618, 'Ifugao', ' Alfonso Lista'),
(619, 'Ifugao', ' Asipulo'),
(620, 'Ifugao', ' Banaue'),
(621, 'Ifugao', ' Hingyon'),
(622, 'Ifugao', ' Hungduan'),
(623, 'Ifugao', ' Kiangan'),
(624, 'Ifugao', ' Lagawe'),
(625, 'Ifugao', ' Lamut'),
(626, 'Ifugao', ' Mayoyao'),
(627, 'Ifugao', ' Tinoc '),
(628, 'IlocosNorte', 'Laoag City'),
(629, 'IlocosNorte', ' Batac City'),
(630, 'IlocosNorte', ' Adams'),
(631, 'IlocosNorte', ' Bacarra'),
(632, 'IlocosNorte', ' Badoc'),
(633, 'IlocosNorte', ' Bangui'),
(634, 'IlocosNorte', ' Banna'),
(635, 'IlocosNorte', ' Burgos'),
(636, 'IlocosNorte', ' Carasi'),
(637, 'IlocosNorte', ' Currimao'),
(638, 'IlocosNorte', ' Dingras'),
(639, 'IlocosNorte', ' Dumalneg'),
(640, 'IlocosNorte', ' Marcos'),
(641, 'IlocosNorte', ' Nueva Era'),
(642, 'IlocosNorte', ' Pagudpud'),
(643, 'IlocosNorte', ' Paoay'),
(644, 'IlocosNorte', ' Pasuquin'),
(645, 'IlocosNorte', ' Piddig'),
(646, 'IlocosNorte', ' Pinili'),
(647, 'IlocosNorte', ' San Nicolas'),
(648, 'IlocosNorte', ' Sarrat'),
(649, 'IlocosNorte', ' Solsona'),
(650, 'IlocosNorte', ' Vintar'),
(651, 'IlocosSur', 'Candon City'),
(652, 'IlocosSur', ' Vigan City'),
(653, 'IlocosSur', ' Alilem'),
(654, 'IlocosSur', ' Banayoyo'),
(655, 'IlocosSur', ' Bantay'),
(656, 'IlocosSur', ' Burgos'),
(657, 'IlocosSur', ' Cabugao'),
(658, 'IlocosSur', ' Caoayan'),
(659, 'IlocosSur', ' Cervantes'),
(660, 'IlocosSur', ' Galimuyod'),
(661, 'IlocosSur', ' Gregorio Del Pilar'),
(662, 'IlocosSur', ' Lidlidda'),
(663, 'IlocosSur', ' Magsingal'),
(664, 'IlocosSur', ' Nagbukel'),
(665, 'IlocosSur', ' Narvacan'),
(666, 'IlocosSur', ' Quirino'),
(667, 'IlocosSur', ' Salcedo'),
(668, 'IlocosSur', ' San Emilio'),
(669, 'IlocosSur', ' San Esteban'),
(670, 'IlocosSur', ' San Ildefonso'),
(671, 'IlocosSur', ' San Juan'),
(672, 'IlocosSur', ' San Vicente'),
(673, 'IlocosSur', ' Santa'),
(674, 'IlocosSur', ' Santa Catalina'),
(675, 'IlocosSur', ' Santa Cruz'),
(676, 'IlocosSur', ' Santa Lucia'),
(677, 'IlocosSur', ' Santa Maria'),
(678, 'IlocosSur', ' Santiago'),
(679, 'IlocosSur', ' Santo Domingo'),
(680, 'IlocosSur', ' Sigay'),
(681, 'IlocosSur', ' Sinait'),
(682, 'IlocosSur', ' Sugpon'),
(683, 'IlocosSur', ' Suyo'),
(684, 'IlocosSur', ' Tagudin'),
(685, 'Ilo-ilo', 'Passi City'),
(686, 'Ilo-ilo', ' Iloilo City'),
(687, 'Ilo-ilo', ' Ajuy'),
(688, 'Ilo-ilo', ' Alimodian'),
(689, 'Ilo-ilo', ' Anilao'),
(690, 'Ilo-ilo', ' Badiangan'),
(691, 'Ilo-ilo', ' Balasan'),
(692, 'Ilo-ilo', ' Banate'),
(693, 'Ilo-ilo', ' Barotac Nuevo'),
(694, 'Ilo-ilo', ' Barotac Viejo'),
(695, 'Ilo-ilo', ' Batad'),
(696, 'Ilo-ilo', ' Bingawan'),
(697, 'Ilo-ilo', ' Cabatuan'),
(698, 'Ilo-ilo', ' Calinog'),
(699, 'Ilo-ilo', ' Carles'),
(700, 'Ilo-ilo', ' Concepcion'),
(701, 'Ilo-ilo', ' Dingle'),
(702, 'Ilo-ilo', ' Dueñas'),
(703, 'Ilo-ilo', ' Dumangas'),
(704, 'Ilo-ilo', ' Estancia'),
(705, 'Ilo-ilo', ' Guimbal'),
(706, 'Ilo-ilo', ' Igbaras'),
(707, 'Ilo-ilo', ' Janiuay'),
(708, 'Ilo-ilo', ' Lambunao'),
(709, 'Ilo-ilo', ' Leganes'),
(710, 'Ilo-ilo', ' Lemery'),
(711, 'Ilo-ilo', ' Leon'),
(712, 'Ilo-ilo', ' Maasin'),
(713, 'Ilo-ilo', ' Miagao'),
(714, 'Ilo-ilo', ' Mina'),
(715, 'Ilo-ilo', ' New Lucena'),
(716, 'Ilo-ilo', ' Oton'),
(717, 'Ilo-ilo', ' Pavia'),
(718, 'Ilo-ilo', ' Pototan'),
(719, 'Ilo-ilo', ' San Dionisio'),
(720, 'Ilo-ilo', ' San Enrique'),
(721, 'Ilo-ilo', ' San Joaquin'),
(722, 'Ilo-ilo', ' San Miguel'),
(723, 'Ilo-ilo', ' San Rafael'),
(724, 'Ilo-ilo', ' Santa Barbara'),
(725, 'Ilo-ilo', ' Sara'),
(726, 'Ilo-ilo', ' Tigbauan'),
(727, 'Ilo-ilo', ' Tubungan'),
(728, 'Ilo-ilo', ' Zarraga'),
(729, 'Isabela', 'Cauayan City'),
(730, 'Isabela', ' Santiago City'),
(731, 'Isabela', ' Alicia'),
(732, 'Isabela', ' Angadanan'),
(733, 'Isabela', ' Aurora'),
(734, 'Isabela', ' Benito Soliven'),
(735, 'Isabela', ' Burgos'),
(736, 'Isabela', ' Cabagan'),
(737, 'Isabela', ' Cabatuan'),
(738, 'Isabela', ' Cordon'),
(739, 'Isabela', ' Delfin Albano'),
(740, 'Isabela', ' Dinapigue'),
(741, 'Isabela', ' Divilacan'),
(742, 'Isabela', ' Echague'),
(743, 'Isabela', ' Gamu'),
(744, 'Isabela', ' Ilagan'),
(745, 'Isabela', ' Jones'),
(746, 'Isabela', ' Luna'),
(747, 'Isabela', ' Maconacon'),
(748, 'Isabela', ' Mallig'),
(749, 'Isabela', ' Naguilian'),
(750, 'Isabela', ' Palanan'),
(751, 'Isabela', ' Quezon'),
(752, 'Isabela', ' Quirino'),
(753, 'Isabela', ' Ramon'),
(754, 'Isabela', ' Reina Mercedes'),
(755, 'Isabela', ' Roxas'),
(756, 'Isabela', ' San Agustin'),
(757, 'Isabela', ' San Guillermo'),
(758, 'Isabela', ' San Isidro'),
(759, 'Isabela', ' San Manuel'),
(760, 'Isabela', ' San Mariano'),
(761, 'Isabela', ' San Mateo'),
(762, 'Isabela', ' San Pablo'),
(763, 'Isabela', ' Santa Maria'),
(764, 'Isabela', ' Santo Tomas'),
(765, 'Isabela', ' Tumauini '),
(766, 'Kalinga', 'Tabuk City'),
(767, 'Kalinga', ' Balbalan'),
(768, 'Kalinga', ' Lubuagan'),
(769, 'Kalinga', ' Pasil'),
(770, 'Kalinga', ' Pinukpuk'),
(771, 'Kalinga', ' Rizal'),
(772, 'Kalinga', ' Tanudan'),
(773, 'Kalinga', ' Tinglayan '),
(774, 'LaUnion', 'San Fernando City'),
(775, 'LaUnion', ' Agoo'),
(776, 'LaUnion', ' Aringay'),
(777, 'LaUnion', ' Bacnotan'),
(778, 'LaUnion', ' Bagulin'),
(779, 'LaUnion', ' Balaoan'),
(780, 'LaUnion', ' Bangar'),
(781, 'LaUnion', ' Bauang'),
(782, 'LaUnion', ' Burgos'),
(783, 'LaUnion', ' Caba'),
(784, 'LaUnion', ' Luna'),
(785, 'LaUnion', ' Naguilian'),
(786, 'LaUnion', ' Pugo'),
(787, 'LaUnion', ' Rosario'),
(788, 'LaUnion', ' San Gabriel'),
(789, 'LaUnion', ' San Juan'),
(790, 'LaUnion', ' Santo Tomas'),
(791, 'LaUnion', ' Santol'),
(792, 'LaUnion', ' Sudipen'),
(793, 'LaUnion', ' Tubao'),
(794, 'Laguna', 'Calamba City'),
(795, 'Laguna', ' San Pablo City'),
(796, 'Laguna', ' Santa Rosa City'),
(797, 'Laguna', ' Alaminos'),
(798, 'Laguna', ' Bay'),
(799, 'Laguna', ' Biñan'),
(800, 'Laguna', ' Cabuyao'),
(801, 'Laguna', ' Calauan'),
(802, 'Laguna', ' Cavinti'),
(803, 'Laguna', ' Famy'),
(804, 'Laguna', ' Kalayaan'),
(805, 'Laguna', ' Liliw'),
(806, 'Laguna', ' Los Baños'),
(807, 'Laguna', ' Luisiana'),
(808, 'Laguna', ' Lumban'),
(809, 'Laguna', ' Mabitac'),
(810, 'Laguna', ' Magdalena'),
(811, 'Laguna', ' Majayjay'),
(812, 'Laguna', ' Nagcarlan'),
(813, 'Laguna', ' Paete '),
(814, 'Laguna', ' Pagsanjan'),
(815, 'Laguna', ' Pakil'),
(816, 'Laguna', ' Pangil'),
(817, 'Laguna', ' Pila'),
(818, 'Laguna', ' Rizal'),
(819, 'Laguna', ' San Pedro'),
(820, 'Laguna', ' Santa Cruz'),
(821, 'Laguna', ' Santa Maria'),
(822, 'Laguna', ' Siniloan'),
(823, 'Laguna', ' Victoria '),
(824, 'LanaodelNorte', 'Iligan City'),
(825, 'LanaodelNorte', ' Bacolod'),
(826, 'LanaodelNorte', ' Baloi'),
(827, 'LanaodelNorte', ' Baroy'),
(828, 'LanaodelNorte', ' Kapatagan'),
(829, 'LanaodelNorte', ' Kauswagan'),
(830, 'LanaodelNorte', ' Kolambugan'),
(831, 'LanaodelNorte', ' Lala'),
(832, 'LanaodelNorte', ' Linamon'),
(833, 'LanaodelNorte', ' Magsaysay'),
(834, 'LanaodelNorte', ' Maigo'),
(835, 'LanaodelNorte', ' Matungao'),
(836, 'LanaodelNorte', ' Munai'),
(837, 'LanaodelNorte', ' Nunungan'),
(838, 'LanaodelNorte', ' Pantao Ragat'),
(839, 'LanaodelNorte', ' Pantar'),
(840, 'LanaodelNorte', ' Poona Piagapo'),
(841, 'LanaodelNorte', ' Salvador'),
(842, 'LanaodelNorte', ' Sapad'),
(843, 'LanaodelNorte', ' Sultan Naga Dimaporo'),
(844, 'LanaodelNorte', ' Tagoloan'),
(845, 'LanaodelNorte', ' Tangcal'),
(846, 'LanaodelNorte', ' Tubod'),
(847, 'LanaodelSur', 'Marawi City'),
(848, 'LanaodelSur', ' Bacolod-Kalawi'),
(849, 'LanaodelSur', ' Balabagan'),
(850, 'LanaodelSur', ' Balindong'),
(851, 'LanaodelSur', ' Bayang'),
(852, 'LanaodelSur', ' Binidayan'),
(853, 'LanaodelSur', ' Buadiposo-Buntong'),
(854, 'LanaodelSur', ' Bubong'),
(855, 'LanaodelSur', ' Bumbaran'),
(856, 'LanaodelSur', ' Butig'),
(857, 'LanaodelSur', ' Calanogas'),
(858, 'LanaodelSur', ' Ditsaan-Ramain'),
(859, 'LanaodelSur', ' Ganassi'),
(860, 'LanaodelSur', ' Kapai'),
(861, 'LanaodelSur', ' Kapatagan'),
(862, 'LanaodelSur', ' Lumba-Bayabao'),
(863, 'LanaodelSur', ' Lumbaca-Unayan'),
(864, 'LanaodelSur', ' Lumbatan'),
(865, 'LanaodelSur', ' Lumbayanague'),
(866, 'LanaodelSur', ' Madalum '),
(867, 'LanaodelSur', ' Madamba'),
(868, 'LanaodelSur', ' Maguing'),
(869, 'LanaodelSur', ' Malabang'),
(870, 'LanaodelSur', ' Marantao'),
(871, 'LanaodelSur', ' Marogong'),
(872, 'LanaodelSur', ' Masiu'),
(873, 'LanaodelSur', ' Mulondo'),
(874, 'LanaodelSur', ' Pagayawan'),
(875, 'LanaodelSur', ' Piagapo'),
(876, 'LanaodelSur', ' Poona Bayabao'),
(877, 'LanaodelSur', ' Pualas'),
(878, 'LanaodelSur', ' Saguiaran'),
(879, 'LanaodelSur', ' Sultan Dumalondong'),
(880, 'LanaodelSur', ' Picong'),
(881, 'LanaodelSur', ' Tagoloan Ii'),
(882, 'LanaodelSur', ' Tamparan'),
(883, 'LanaodelSur', ' Taraka'),
(884, 'LanaodelSur', ' Tubaran'),
(885, 'LanaodelSur', ' Tugaya'),
(886, 'LanaodelSur', ' Wao'),
(887, 'Leyte', 'Baybay City'),
(888, 'Leyte', ' Ormoc City'),
(889, 'Leyte', ' Tacloban City'),
(890, 'Leyte', ' Abuyog'),
(891, 'Leyte', ' Alangalang'),
(892, 'Leyte', ' Albuera'),
(893, 'Leyte', ' Babatngon'),
(894, 'Leyte', ' Barugo'),
(895, 'Leyte', ' Bato'),
(896, 'Leyte', ' Burauen'),
(897, 'Leyte', ' Calubian'),
(898, 'Leyte', ' Capoocan'),
(899, 'Leyte', ' Carigara'),
(900, 'Leyte', ' Dagami'),
(901, 'Leyte', ' Dulag'),
(902, 'Leyte', ' Hilongos'),
(903, 'Leyte', ' Hindang'),
(904, 'Leyte', ' Inopacan'),
(905, 'Leyte', ' Isabel'),
(906, 'Leyte', ' Jaro'),
(907, 'Leyte', ' Javier'),
(908, 'Leyte', ' Julita'),
(909, 'Leyte', ' Kananga'),
(910, 'Leyte', ' La Paz'),
(911, 'Leyte', ' Leyte'),
(912, 'Leyte', ' Macarthur'),
(913, 'Leyte', ' Mahaplag'),
(914, 'Leyte', ' Matag-ob'),
(915, 'Leyte', ' Matalom'),
(916, 'Leyte', ' Mayorga'),
(917, 'Leyte', ' Merida'),
(918, 'Leyte', ' Palo'),
(919, 'Leyte', ' Palompon'),
(920, 'Leyte', ' Pastrana'),
(921, 'Leyte', ' San Isidro'),
(922, 'Leyte', ' San Miguel'),
(923, 'Leyte', ' Santa Fe'),
(924, 'Leyte', ' Tabango'),
(925, 'Leyte', ' Tabontabon'),
(926, 'Leyte', ' Tanauan'),
(927, 'Leyte', ' Tolosa'),
(928, 'Leyte', ' Tunga'),
(929, 'Leyte', ' Villaba'),
(930, 'Maguindanao', 'Cotabato City'),
(931, 'Maguindanao', ' Ampatuan'),
(932, 'Maguindanao', ' Buluan'),
(933, 'Maguindanao', ' Datu Abdullah Sangki'),
(934, 'Maguindanao', ' Datu Anggal Midtimbang'),
(935, 'Maguindanao', ' Datu Paglas'),
(936, 'Maguindanao', ' Datu Piang'),
(937, 'Maguindanao', ' Datu Saudi-Ampatuan'),
(938, 'Maguindanao', ' Datu Unsay'),
(939, 'Maguindanao', ' Gen. S. K. Pendatun'),
(940, 'Maguindanao', ' Guindulungan'),
(941, 'Maguindanao', ' Mamasapano'),
(942, 'Maguindanao', ' Mangudadatu'),
(943, 'Maguindanao', ' Pagagawan'),
(944, 'Maguindanao', ' Pagalungan'),
(945, 'Maguindanao', ' Paglat'),
(946, 'Maguindanao', ' Pandag'),
(947, 'Maguindanao', ' Rajah Buayan'),
(948, 'Maguindanao', ' Shariff Aguak'),
(949, 'Maguindanao', ' South Upi'),
(950, 'Maguindanao', ' Sultan sa Barongis'),
(951, 'Maguindanao', ' Talayan'),
(952, 'Maguindanao', ' Talitay '),
(953, 'Marinduque', 'Boac'),
(954, 'Marinduque', ' Buenavista'),
(955, 'Marinduque', ' Gasan'),
(956, 'Marinduque', ' Mogpog'),
(957, 'Marinduque', ' Santa Cruz'),
(958, 'Marinduque', ' Torrijos '),
(959, 'Masbate', 'Masbate City'),
(960, 'Masbate', ' Aroroy'),
(961, 'Masbate', ' Baleno'),
(962, 'Masbate', ' Balud'),
(963, 'Masbate', ' Batuan'),
(964, 'Masbate', ' Cataingan'),
(965, 'Masbate', ' Cawayan'),
(966, 'Masbate', ' Claveria'),
(967, 'Masbate', ' Dimasalang'),
(968, 'Masbate', ' Esperanza'),
(969, 'Masbate', ' Mandaon'),
(970, 'Masbate', ' Milagros'),
(971, 'Masbate', ' Mobo'),
(972, 'Masbate', ' Monreal'),
(973, 'Masbate', ' Palanas'),
(974, 'Masbate', ' Pio V. Corpuz'),
(975, 'Masbate', ' Placer'),
(976, 'Masbate', ' San Fernando'),
(977, 'Masbate', ' San Jacinto'),
(978, 'Masbate', ' San Pascual'),
(979, 'Masbate', ' Uson'),
(980, 'MisamisOccidental', 'Oroquieta City'),
(981, 'MisamisOccidental', ' Ozamis City'),
(982, 'MisamisOccidental', ' Tangub City'),
(983, 'MisamisOccidental', ' Aloran'),
(984, 'MisamisOccidental', ' Baliangao'),
(985, 'MisamisOccidental', ' Bonifacio'),
(986, 'MisamisOccidental', ' Calamba'),
(987, 'MisamisOccidental', ' Clarin'),
(988, 'MisamisOccidental', ' Concepcion'),
(989, 'MisamisOccidental', ' Don Victoriano Chiongbian'),
(990, 'MisamisOccidental', ' Jimenez'),
(991, 'MisamisOccidental', ' Lopez Jaena'),
(992, 'MisamisOccidental', ' Panaon'),
(993, 'MisamisOccidental', ' Plaridel'),
(994, 'MisamisOccidental', ' Sapang Dalaga'),
(995, 'MisamisOccidental', ' Sinacaban'),
(996, 'MisamisOccidental', ' Tudela'),
(997, 'MisamisOriental', 'Cagayan de Oro'),
(998, 'MisamisOriental', ' Gingoog City'),
(999, 'MisamisOriental', ' El Salvador City'),
(1000, 'MisamisOriental', ' Alubijid'),
(1001, 'MisamisOriental', ' Balingasag'),
(1002, 'MisamisOriental', ' Balingoan'),
(1003, 'MisamisOriental', ' Binuangan'),
(1004, 'MisamisOriental', ' Claveria'),
(1005, 'MisamisOriental', ' El Salvador'),
(1006, 'MisamisOriental', ' Gitagum'),
(1007, 'MisamisOriental', ' Initao'),
(1008, 'MisamisOriental', ' Jasaan'),
(1009, 'MisamisOriental', ' Kinoguitan'),
(1010, 'MisamisOriental', ' Lagonglong'),
(1011, 'MisamisOriental', ' Laguindingan'),
(1012, 'MisamisOriental', ' Libertad'),
(1013, 'MisamisOriental', ' Lugait'),
(1014, 'MisamisOriental', ' Magsaysay'),
(1015, 'MisamisOriental', ' Manticao'),
(1016, 'MisamisOriental', ' Medina'),
(1017, 'MisamisOriental', ' Naawan'),
(1018, 'MisamisOriental', ' Opol'),
(1019, 'MisamisOriental', ' Salay'),
(1020, 'MisamisOriental', ' Sugbongcogon'),
(1021, 'MisamisOriental', ' Tagoloan'),
(1022, 'MisamisOriental', ' Talisayan'),
(1023, 'MisamisOriental', ' Villanueva '),
(1024, 'MountainProvince', 'Barlig'),
(1025, 'MountainProvince', ' Bauko'),
(1026, 'MountainProvince', ' Besao'),
(1027, 'MountainProvince', ' Bontoc'),
(1028, 'MountainProvince', ' Natonin'),
(1029, 'MountainProvince', ' Paracelis'),
(1030, 'MountainProvince', ' Sabangan'),
(1031, 'MountainProvince', ' Sadanga'),
(1032, 'MountainProvince', ' Sagada'),
(1033, 'MountainProvince', ' Tadian '),
(1034, 'NegrosOccidental', 'Bacolod City'),
(1035, 'NegrosOccidental', ' Bago City'),
(1036, 'NegrosOccidental', ' Cadiz City'),
(1037, 'NegrosOccidental', ' Escalante City'),
(1038, 'NegrosOccidental', ' Himamaylan City'),
(1039, 'NegrosOccidental', ' Kabankalan City'),
(1040, 'NegrosOccidental', ' La Carlota City'),
(1041, 'NegrosOccidental', ' Sagay City'),
(1042, 'NegrosOccidental', ' San Carlos City'),
(1043, 'NegrosOccidental', ' Silay City'),
(1044, 'NegrosOccidental', ' Sipalay City'),
(1045, 'NegrosOccidental', ' Talisay City'),
(1046, 'NegrosOccidental', ' Victorias City'),
(1047, 'NegrosOccidental', ' Binalbagan'),
(1048, 'NegrosOccidental', ' Calatrava'),
(1049, 'NegrosOccidental', ' Candoni'),
(1050, 'NegrosOccidental', ' Cauayan'),
(1051, 'NegrosOccidental', ' Enrique B. Magalona'),
(1052, 'NegrosOccidental', ' Hinigaran'),
(1053, 'NegrosOccidental', ' Hinoba-an'),
(1054, 'NegrosOccidental', ' Ilog'),
(1055, 'NegrosOccidental', ' Isabela'),
(1056, 'NegrosOccidental', ' La Castellana'),
(1057, 'NegrosOccidental', ' Manapla'),
(1058, 'NegrosOccidental', ' Moises Padilla'),
(1059, 'NegrosOccidental', ' Murcia'),
(1060, 'NegrosOccidental', ' Pontevedra'),
(1061, 'NegrosOccidental', ' Pulupandan'),
(1062, 'NegrosOccidental', ' Salvador Benedicto'),
(1063, 'NegrosOccidental', ' San Enrique'),
(1064, 'NegrosOccidental', ' Toboso'),
(1065, 'NegrosOccidental', ' Valladolid '),
(1066, 'NegrosOriental', 'Bais'),
(1067, 'NegrosOriental', ' Bayawan'),
(1068, 'NegrosOriental', ' Canlaon'),
(1069, 'NegrosOriental', ' Dumaguete'),
(1070, 'NegrosOriental', ' Guihulngan'),
(1071, 'NegrosOriental', ' Tanjay'),
(1072, 'NegrosOriental', ' Amlan'),
(1073, 'NegrosOriental', ' Ayungon'),
(1074, 'NegrosOriental', ' Bacong'),
(1075, 'NegrosOriental', ' Basay'),
(1076, 'NegrosOriental', ' Bindoy'),
(1077, 'NegrosOriental', ' Dauin'),
(1078, 'NegrosOriental', ' Jimalalud'),
(1079, 'NegrosOriental', ' La Libertad'),
(1080, 'NegrosOriental', ' Mabinay'),
(1081, 'NegrosOriental', ' Manjuyod'),
(1082, 'NegrosOriental', ' Pamplona'),
(1083, 'NegrosOriental', ' San Jose'),
(1084, 'NegrosOriental', ' Santa Catalina'),
(1085, 'NegrosOriental', ' Siaton'),
(1086, 'NegrosOriental', ' Sibulan'),
(1087, 'NegrosOriental', ' Tayasan'),
(1088, 'NegrosOriental', ' Valencia'),
(1089, 'NegrosOriental', ' Vallehermoso'),
(1090, 'NegrosOriental', ' Zamboanguita '),
(1091, 'NorthernSamar', 'Allen'),
(1092, 'NorthernSamar', ' Biri'),
(1093, 'NorthernSamar', ' Bobon'),
(1094, 'NorthernSamar', ' Capul'),
(1095, 'NorthernSamar', ' Catarman'),
(1096, 'NorthernSamar', ' Catubig'),
(1097, 'NorthernSamar', ' Gamay'),
(1098, 'NorthernSamar', ' Laoang'),
(1099, 'NorthernSamar', ' Lapinig'),
(1100, 'NorthernSamar', ' Las Navas'),
(1101, 'NorthernSamar', ' Lavezares'),
(1102, 'NorthernSamar', ' Lope de Vega'),
(1103, 'NorthernSamar', ' Mapanas'),
(1104, 'NorthernSamar', ' Mondragon'),
(1105, 'NorthernSamar', ' Palapag'),
(1106, 'NorthernSamar', ' Pambujan'),
(1107, 'NorthernSamar', ' Rosario'),
(1108, 'NorthernSamar', ' San Antonio'),
(1109, 'NorthernSamar', ' San Isidro'),
(1110, 'NorthernSamar', ' San Jose'),
(1111, 'NorthernSamar', ' San Roque'),
(1112, 'NorthernSamar', ' San Vicente'),
(1113, 'NorthernSamar', ' Silvino Lobos'),
(1114, 'NorthernSamar', ' Victoria '),
(1115, 'NuevaEcija', 'Cabanatuan City'),
(1116, 'NuevaEcija', ' Gapan City'),
(1117, 'NuevaEcija', ' Palayan City'),
(1118, 'NuevaEcija', ' San Jose City'),
(1119, 'NuevaEcija', ' Science City of Muñoz'),
(1120, 'NuevaEcija', ' Aliaga'),
(1121, 'NuevaEcija', ' Bongabon'),
(1122, 'NuevaEcija', ' Cabiao'),
(1123, 'NuevaEcija', ' Carranglan'),
(1124, 'NuevaEcija', ' Cuyapo'),
(1125, 'NuevaEcija', ' Gabaldon'),
(1126, 'NuevaEcija', ' General Mamerto Natividad'),
(1127, 'NuevaEcija', ' General Tinio'),
(1128, 'NuevaEcija', ' Guimba'),
(1129, 'NuevaEcija', ' Jaen'),
(1130, 'NuevaEcija', ' Laur'),
(1131, 'NuevaEcija', ' Licab'),
(1132, 'NuevaEcija', ' Llanera'),
(1133, 'NuevaEcija', ' Lupao'),
(1134, 'NuevaEcija', ' Nampicuan'),
(1135, 'NuevaEcija', ' Pantabangan'),
(1136, 'NuevaEcija', ' Peñaranda'),
(1137, 'NuevaEcija', ' Quezon'),
(1138, 'NuevaEcija', ' Rizal'),
(1139, 'NuevaEcija', ' San Antonio'),
(1140, 'NuevaEcija', ' San Isidro'),
(1141, 'NuevaEcija', ' San Leonardo'),
(1142, 'NuevaEcija', ' Santa Rosa'),
(1143, 'NuevaEcija', ' Santo Domingo'),
(1144, 'NuevaEcija', ' Talavera'),
(1145, 'NuevaEcija', ' Talugtug'),
(1146, 'NuevaEcija', ' Zaragoza   '),
(1147, 'NuevaVizcaya', 'Alfonso Castaneda'),
(1148, 'NuevaVizcaya', ' Ambaguio'),
(1149, 'NuevaVizcaya', ' Aritao'),
(1150, 'NuevaVizcaya', ' Bagabag'),
(1151, 'NuevaVizcaya', ' Bambang'),
(1152, 'NuevaVizcaya', ' Bayombong'),
(1153, 'NuevaVizcaya', ' Diadi'),
(1154, 'NuevaVizcaya', ' Dupax del Norte'),
(1155, 'NuevaVizcaya', ' Dupax del Sur'),
(1156, 'NuevaVizcaya', ' Kasibu'),
(1157, 'NuevaVizcaya', ' Kayapa'),
(1158, 'NuevaVizcaya', ' Quezon'),
(1159, 'NuevaVizcaya', ' Santa Fe'),
(1160, 'NuevaVizcaya', ' Solano'),
(1161, 'NuevaVizcaya', ' Villaverde '),
(1162, 'OccidentalMindoro', 'Abra de Ilog'),
(1163, 'OccidentalMindoro', ' Calintaan'),
(1164, 'OccidentalMindoro', ' Looc'),
(1165, 'OccidentalMindoro', ' Lubang'),
(1166, 'OccidentalMindoro', ' Magsaysay'),
(1167, 'OccidentalMindoro', ' Mamburao'),
(1168, 'OccidentalMindoro', ' Paluan'),
(1169, 'OccidentalMindoro', ' Rizal'),
(1170, 'OccidentalMindoro', ' Sablayan'),
(1171, 'OccidentalMindoro', ' San Jose'),
(1172, 'OccidentalMindoro', ' Santa Cruz'),
(1173, 'OrientalMindoro', 'Calapan City'),
(1174, 'OrientalMindoro', ' Baco'),
(1175, 'OrientalMindoro', ' Bansud'),
(1176, 'OrientalMindoro', ' Bongabong'),
(1177, 'OrientalMindoro', ' Bulalacao'),
(1178, 'OrientalMindoro', ' Gloria'),
(1179, 'OrientalMindoro', ' Mansalay'),
(1180, 'OrientalMindoro', ' Naujan'),
(1181, 'OrientalMindoro', ' Pinamalayan'),
(1182, 'OrientalMindoro', ' Pola'),
(1183, 'OrientalMindoro', ' Puerto Galera'),
(1184, 'OrientalMindoro', ' Roxas'),
(1185, 'OrientalMindoro', ' San Teodoro'),
(1186, 'OrientalMindoro', ' Socorro'),
(1187, 'OrientalMindoro', ' Victoria'),
(1188, 'Palawan', 'Puerto Princesa City'),
(1189, 'Palawan', ' Aborlan'),
(1190, 'Palawan', ' Agutaya'),
(1191, 'Palawan', ' Araceli'),
(1192, 'Palawan', ' Balabac'),
(1193, 'Palawan', ' Bataraza'),
(1194, 'Palawan', ' Brooke''s Point'),
(1195, 'Palawan', ' Busuanga'),
(1196, 'Palawan', ' Cagayancillo'),
(1197, 'Palawan', ' Coron'),
(1198, 'Palawan', ' Culion'),
(1199, 'Palawan', ' Cuyo'),
(1200, 'Palawan', ' Dumaran'),
(1201, 'Palawan', ' El Nido'),
(1202, 'Palawan', ' Kalayaan'),
(1203, 'Palawan', ' Linapacan'),
(1204, 'Palawan', ' Magsaysay'),
(1205, 'Palawan', '  Narra'),
(1206, 'Palawan', ' Quezon'),
(1207, 'Palawan', ' Rizal'),
(1208, 'Palawan', ' Roxas'),
(1209, 'Palawan', ' San Vicente'),
(1210, 'Palawan', ' Sofronio Española'),
(1211, 'Palawan', ' Taytay'),
(1212, 'Pampanga', 'Angeles City'),
(1213, 'Pampanga', ' City of San Fernando'),
(1214, 'Pampanga', '  Apalit'),
(1215, 'Pampanga', ' Arayat'),
(1216, 'Pampanga', ' Bacolor'),
(1217, 'Pampanga', ' Candaba'),
(1218, 'Pampanga', ' Floridablanca'),
(1219, 'Pampanga', ' Guagua'),
(1220, 'Pampanga', ' Lubao'),
(1221, 'Pampanga', ' Mabalacat'),
(1222, 'Pampanga', ' Macabebe'),
(1223, 'Pampanga', ' Magalang'),
(1224, 'Pampanga', ' Masantol'),
(1225, 'Pampanga', ' Mexico'),
(1226, 'Pampanga', ' Minalin'),
(1227, 'Pampanga', ' Porac'),
(1228, 'Pampanga', ' San Luis'),
(1229, 'Pampanga', ' San Simon'),
(1230, 'Pampanga', ' Santa Ana'),
(1231, 'Pampanga', ' Santa Rita'),
(1232, 'Pampanga', ' Santo Tomas'),
(1233, 'Pampanga', ' Sasmuan'),
(1234, 'Pangasinan', 'Alaminos City'),
(1235, 'Pangasinan', ' Dagupan City'),
(1236, 'Pangasinan', ' San Carlos City'),
(1237, 'Pangasinan', ' Urdaneta City'),
(1238, 'Pangasinan', ' Agno'),
(1239, 'Pangasinan', ' Aguilar'),
(1240, 'Pangasinan', ' Alcala'),
(1241, 'Pangasinan', 'Anda'),
(1242, 'Pangasinan', ' Asingan'),
(1243, 'Pangasinan', ' Balungao'),
(1244, 'Pangasinan', ' Bani'),
(1245, 'Pangasinan', ' Basista'),
(1246, 'Pangasinan', ' Bautista'),
(1247, 'Pangasinan', ' Bayambang'),
(1248, 'Pangasinan', ' Binalonan'),
(1249, 'Pangasinan', ' Binmaley'),
(1250, 'Pangasinan', ' Bolinao'),
(1251, 'Pangasinan', ' Bugallon'),
(1252, 'Pangasinan', ' Burgos'),
(1253, 'Pangasinan', ' Calasiao'),
(1254, 'Pangasinan', ' Dasol'),
(1255, 'Pangasinan', ' Infanta'),
(1256, 'Pangasinan', ' Labrador'),
(1257, 'Pangasinan', ' Laoac'),
(1258, 'Pangasinan', ' Lingayen'),
(1259, 'Pangasinan', ' Mabini'),
(1260, 'Pangasinan', ' Malasiqui'),
(1261, 'Pangasinan', ' Manaoag'),
(1262, 'Pangasinan', ' Mangaldan'),
(1263, 'Pangasinan', ' Mangatarem'),
(1264, 'Pangasinan', ' Mapandan'),
(1265, 'Pangasinan', ' Natividad'),
(1266, 'Pangasinan', ' Pozzorubio'),
(1267, 'Pangasinan', ' Rosales'),
(1268, 'Pangasinan', ' San Fabian'),
(1269, 'Pangasinan', ' San Jacinto'),
(1270, 'Pangasinan', ' San Manuel'),
(1271, 'Pangasinan', ' San Nicolas'),
(1272, 'Pangasinan', ' San Quintin'),
(1273, 'Pangasinan', ' Santa Barbara'),
(1274, 'Pangasinan', ' Santa Maria'),
(1275, 'Pangasinan', ' Santo Tomas'),
(1276, 'Pangasinan', ' Sison'),
(1277, 'Pangasinan', ' Sual'),
(1278, 'Pangasinan', ' Tayug'),
(1279, 'Pangasinan', ' Umingan'),
(1280, 'Pangasinan', ' Urbiztondo'),
(1281, 'Pangasinan', ' Villasis\r\n'),
(1282, 'Quezon', 'Lucena City'),
(1283, 'Quezon', ' Tayabas City'),
(1284, 'Quezon', ' Agdangan'),
(1285, 'Quezon', ' Alabat'),
(1286, 'Quezon', ' Atimonan'),
(1287, 'Quezon', ' Buenavista'),
(1288, 'Quezon', ' Burdeos'),
(1289, 'Quezon', ' Calauag'),
(1290, 'Quezon', ' Candelaria'),
(1291, 'Quezon', ' Catanauan'),
(1292, 'Quezon', ' Dolores'),
(1293, 'Quezon', ' General Luna'),
(1294, 'Quezon', ' General Nakar'),
(1295, 'Quezon', ' Guinayangan'),
(1296, 'Quezon', ' Gumaca'),
(1297, 'Quezon', ' Infanta'),
(1298, 'Quezon', ' Jomalig'),
(1299, 'Quezon', ' Lopez'),
(1300, 'Quezon', ' Lucban'),
(1301, 'Quezon', ' Macalelon'),
(1302, 'Quezon', ' Mauban'),
(1303, 'Quezon', ' Mulanay'),
(1304, 'Quezon', ' Padre Burgos'),
(1305, 'Quezon', ' Pagbilao'),
(1306, 'Quezon', ' Panukulan'),
(1307, 'Quezon', ' Patnanungan'),
(1308, 'Quezon', ' Perez'),
(1309, 'Quezon', ' Pitogo'),
(1310, 'Quezon', ' Plaridel'),
(1311, 'Quezon', ' Polillo'),
(1312, 'Quezon', ' Quezon'),
(1313, 'Quezon', ' Real'),
(1314, 'Quezon', ' Sampaloc'),
(1315, 'Quezon', ' San Andres'),
(1316, 'Quezon', ' San Antonio'),
(1317, 'Quezon', ' San Francisco'),
(1318, 'Quezon', ' San Narciso'),
(1319, 'Quezon', ' Sariaya'),
(1320, 'Quezon', ' Tagkawayan'),
(1321, 'Quezon', ' Tiaong'),
(1322, 'Quezon', ' Unisan'),
(1323, 'Quirino', 'Aglipay'),
(1324, 'Quirino', ' Cabarroguis'),
(1325, 'Quirino', ' Diffun'),
(1326, 'Quirino', ' Maddela'),
(1327, 'Quirino', ' Nagtipunan'),
(1328, 'Quirino', ' Saguday'),
(1329, 'Rizal', 'Antipolo City'),
(1330, 'Rizal', ' Angono'),
(1331, 'Rizal', ' Baras'),
(1332, 'Rizal', ' Binangonan'),
(1333, 'Rizal', ' Cainta'),
(1334, 'Rizal', ' Cardona'),
(1335, 'Rizal', ' Jalajala'),
(1336, 'Rizal', ' Morong'),
(1337, 'Rizal', ' Pililla'),
(1338, 'Rizal', ' Rodriguez'),
(1339, 'Rizal', ' San Mateo'),
(1340, 'Rizal', ' Tanay'),
(1341, 'Rizal', ' Taytay'),
(1342, 'Rizal', ' Teresa '),
(1343, 'Romblon', 'Alcantara'),
(1344, 'Romblon', ' Banton'),
(1345, 'Romblon', ' Cajidiocan'),
(1346, 'Romblon', ' Calatrava'),
(1347, 'Romblon', ' Concepcion'),
(1348, 'Romblon', ' Corcuera'),
(1349, 'Romblon', ' Ferrol'),
(1350, 'Romblon', ' Looc'),
(1351, 'Romblon', ' Magdiwang'),
(1352, 'Romblon', ' Odiongan'),
(1353, 'Romblon', ' Romblon'),
(1354, 'Romblon', ' San Agustin'),
(1355, 'Romblon', ' San Andres'),
(1356, 'Romblon', ' San Fernando'),
(1357, 'Romblon', ' San Jose'),
(1358, 'Romblon', ' Santa Fe'),
(1359, 'Romblon', ' Santa Maria '),
(1360, 'Samar', 'Catbalogan City'),
(1361, 'Samar', ' Calbayog City'),
(1362, 'Samar', '  Almagro'),
(1363, 'Samar', ' Basey'),
(1364, 'Samar', ' Calbiga'),
(1365, 'Samar', ' Daram'),
(1366, 'Samar', ' Gandara'),
(1367, 'Samar', ' Hinabangan'),
(1368, 'Samar', ' Jiabong'),
(1369, 'Samar', ' Marabut'),
(1370, 'Samar', ' Matuguinao'),
(1371, 'Samar', ' Motiong'),
(1372, 'Samar', ' Pagsanghan'),
(1373, 'Samar', ' Paranas'),
(1374, 'Samar', ' Pinabacdao'),
(1375, 'Samar', ' San Jorge'),
(1376, 'Samar', ' San Jose De Buan'),
(1377, 'Samar', ' San Sebastian'),
(1378, 'Samar', ' Santa Margarita'),
(1379, 'Samar', ' Santa Rita'),
(1380, 'Samar', ' Santo Niño'),
(1381, 'Samar', ' Tagapul-an'),
(1382, 'Samar', ' Talalora'),
(1383, 'Samar', ' Tarangnan'),
(1384, 'Samar', ' Villareal'),
(1385, 'Samar', ' Zumarraga'),
(1386, 'Sarangani', 'Alabel'),
(1387, 'Sarangani', ' Glan'),
(1388, 'Sarangani', ' Kiamba'),
(1389, 'Sarangani', ' Maasim'),
(1390, 'Sarangani', ' Maitum'),
(1391, 'Sarangani', ' Malapatan'),
(1392, 'Sarangani', ' Malungon '),
(1393, 'ShariffKabunsuan', 'Barira'),
(1394, 'ShariffKabunsuan', ' Buldon'),
(1395, 'ShariffKabunsuan', ' Datu Blah T. Sinsuat'),
(1396, 'ShariffKabunsuan', ' Datu Odin Sinsuat'),
(1397, 'ShariffKabunsuan', ' Kabuntalan'),
(1398, 'ShariffKabunsuan', ' Matanog'),
(1399, 'ShariffKabunsuan', ' Northern Kabuntalan'),
(1400, 'ShariffKabunsuan', ' Parang'),
(1401, 'ShariffKabunsuan', ' Sultan Kudarat'),
(1402, 'ShariffKabunsuan', ' Sultan Mastura'),
(1403, 'ShariffKabunsuan', ' Upi '),
(1404, 'Siquijor', 'Enrique Villanueva'),
(1405, 'Siquijor', ' Larena'),
(1406, 'Siquijor', ' Lazi'),
(1407, 'Siquijor', ' Maria'),
(1408, 'Siquijor', ' San Juan'),
(1409, 'Siquijor', ' Siquijor '),
(1410, 'Sorsogon', 'Sorsogon City'),
(1411, 'Sorsogon', ' Barcelona'),
(1412, 'Sorsogon', ' Bulan'),
(1413, 'Sorsogon', ' Bulusan'),
(1414, 'Sorsogon', ' Casiguran'),
(1415, 'Sorsogon', ' Castilla'),
(1416, 'Sorsogon', ' Donsol'),
(1417, 'Sorsogon', ' Gubat'),
(1418, 'Sorsogon', ' Irosin'),
(1419, 'Sorsogon', ' Juban'),
(1420, 'Sorsogon', ' Magallanes'),
(1421, 'Sorsogon', ' Matnog'),
(1422, 'Sorsogon', ' Pilar'),
(1423, 'Sorsogon', ' Prieto Diaz'),
(1424, 'Sorsogon', ' Santa Magdalena '),
(1425, 'SouthCotabato', 'General Santos City'),
(1426, 'SouthCotabato', ' Koronadal City'),
(1427, 'SouthCotabato', ' Banga'),
(1428, 'SouthCotabato', ' Lake Sebu'),
(1429, 'SouthCotabato', ' Norala'),
(1430, 'SouthCotabato', ' Polomolok'),
(1431, 'SouthCotabato', ' Santo Niño'),
(1432, 'SouthCotabato', ' Surallah'),
(1433, 'SouthCotabato', ' T''Boli'),
(1434, 'SouthCotabato', ' Tampakan'),
(1435, 'SouthCotabato', ' Tantangan'),
(1436, 'SouthCotabato', ' Tupi '),
(1437, 'SouthernLeyte', 'Maasin CIty'),
(1438, 'SouthernLeyte', ' Anahawan'),
(1439, 'SouthernLeyte', ' Bontoc'),
(1440, 'SouthernLeyte', ' Hinunangan'),
(1441, 'SouthernLeyte', ' Hinundayan'),
(1442, 'SouthernLeyte', ' Libagon'),
(1443, 'SouthernLeyte', ' Liloan'),
(1444, 'SouthernLeyte', ' Limasawa'),
(1445, 'SouthernLeyte', ' Macrohon'),
(1446, 'SouthernLeyte', ' Malitbog'),
(1447, 'SouthernLeyte', ' Padre Burgos'),
(1448, 'SouthernLeyte', ' Pintuyan'),
(1449, 'SouthernLeyte', ' Saint Bernard'),
(1450, 'SouthernLeyte', ' San Francisco'),
(1451, 'SouthernLeyte', ' San Juan'),
(1452, 'SouthernLeyte', ' San Ricardo'),
(1453, 'SouthernLeyte', ' Silago'),
(1454, 'SouthernLeyte', ' Sogod'),
(1455, 'SouthernLeyte', ' Tomas Oppus '),
(1456, 'SultanKudarat', 'Tacurong City'),
(1457, 'SultanKudarat', ' Bagumbayan'),
(1458, 'SultanKudarat', ' Columbio'),
(1459, 'SultanKudarat', ' Esperanza'),
(1460, 'SultanKudarat', ' Isulan'),
(1461, 'SultanKudarat', ' Kalamansig'),
(1462, 'SultanKudarat', ' Lambayong'),
(1463, 'SultanKudarat', ' Lebak'),
(1464, 'SultanKudarat', ' Lutayan'),
(1465, 'SultanKudarat', ' Palimbang'),
(1466, 'SultanKudarat', ' President Quirino'),
(1467, 'SultanKudarat', ' Sen. Ninoy Aquino '),
(1468, 'Sulu', 'Hadji Panglima Tahil'),
(1469, 'Sulu', ' Indanan'),
(1470, 'Sulu', ' Jolo'),
(1471, 'Sulu', ' Kalingalan Caluang'),
(1472, 'Sulu', ' Lugus'),
(1473, 'Sulu', ' Luuk'),
(1474, 'Sulu', ' Maimbung'),
(1475, 'Sulu', ' Old Panamao'),
(1476, 'Sulu', ' Omar'),
(1477, 'Sulu', ' Pandami'),
(1478, 'Sulu', ' Panglima Estino'),
(1479, 'Sulu', ' Pangutaran'),
(1480, 'Sulu', ' Parang'),
(1481, 'Sulu', ' Pata'),
(1482, 'Sulu', ' Patikul'),
(1483, 'Sulu', ' Siasi'),
(1484, 'Sulu', ' Talipao'),
(1485, 'Sulu', ' Tapul'),
(1486, 'Sulu', ' Tongkil '),
(1487, 'SurigaodelNorte', 'Surigao City'),
(1488, 'SurigaodelNorte', ' Alegria'),
(1489, 'SurigaodelNorte', ' Bacuag'),
(1490, 'SurigaodelNorte', ' Burgos'),
(1491, 'SurigaodelNorte', ' Claver'),
(1492, 'SurigaodelNorte', ' Dapa'),
(1493, 'SurigaodelNorte', ' Del Carmen'),
(1494, 'SurigaodelNorte', ' General Luna'),
(1495, 'SurigaodelNorte', ' Gigaquit'),
(1496, 'SurigaodelNorte', ' Mainit'),
(1497, 'SurigaodelNorte', ' Malimono'),
(1498, 'SurigaodelNorte', ' Pilar'),
(1499, 'SurigaodelNorte', ' Placer'),
(1500, 'SurigaodelNorte', ' San Benito'),
(1501, 'SurigaodelNorte', ' San Francisco'),
(1502, 'SurigaodelNorte', ' San Isidro'),
(1503, 'SurigaodelNorte', ' Santa Monica'),
(1504, 'SurigaodelNorte', ' Sison'),
(1505, 'SurigaodelNorte', ' Socorro'),
(1506, 'SurigaodelNorte', ' Tagana-an'),
(1507, 'SurigaodelNorte', ' Tubod '),
(1508, 'SurigaodelSur', 'Bislig City'),
(1509, 'SurigaodelSur', ' Tandag CIty'),
(1510, 'SurigaodelSur', ' Barobo'),
(1511, 'SurigaodelSur', ' Bayabas'),
(1512, 'SurigaodelSur', ' Cagwait'),
(1513, 'SurigaodelSur', ' Cantilan'),
(1514, 'SurigaodelSur', ' Carmen'),
(1515, 'SurigaodelSur', ' Carrascal'),
(1516, 'SurigaodelSur', ' Cortes'),
(1517, 'SurigaodelSur', ' Hinatuan'),
(1518, 'SurigaodelSur', ' Lanuza'),
(1519, 'SurigaodelSur', ' Lianga'),
(1520, 'SurigaodelSur', ' Lingig'),
(1521, 'SurigaodelSur', ' Madrid'),
(1522, 'SurigaodelSur', ' Marihatag'),
(1523, 'SurigaodelSur', ' San Agustin'),
(1524, 'SurigaodelSur', ' San Miguel'),
(1525, 'SurigaodelSur', ' Tagbina'),
(1526, 'SurigaodelSur', ' Tago'),
(1527, 'Tarlac', 'Tarlac City'),
(1528, 'Tarlac', ' Anao'),
(1529, 'Tarlac', ' Bamban'),
(1530, 'Tarlac', ' Camiling'),
(1531, 'Tarlac', ' Capas'),
(1532, 'Tarlac', ' Concepcion'),
(1533, 'Tarlac', ' Gerona'),
(1534, 'Tarlac', ' La Paz'),
(1535, 'Tarlac', ' Mayantoc'),
(1536, 'Tarlac', ' Moncada'),
(1537, 'Tarlac', ' Paniqui'),
(1538, 'Tarlac', ' Pura'),
(1539, 'Tarlac', ' Ramos'),
(1540, 'Tarlac', ' San Clemente'),
(1541, 'Tarlac', ' San Jose'),
(1542, 'Tarlac', ' San Manuel'),
(1543, 'Tarlac', ' Santa Ignacia'),
(1544, 'Tarlac', ' Victoria '),
(1545, 'Tawi-Tawi', 'Bongao'),
(1546, 'Tawi-Tawi', ' Languyan'),
(1547, 'Tawi-Tawi', ' Mapun'),
(1548, 'Tawi-Tawi', ' Panglima Sugala'),
(1549, 'Tawi-Tawi', ' Sapa-Sapa'),
(1550, 'Tawi-Tawi', ' Sibutu'),
(1551, 'Tawi-Tawi', ' Simunul'),
(1552, 'Tawi-Tawi', ' Sitangkai'),
(1553, 'Tawi-Tawi', ' South Ubian'),
(1554, 'Tawi-Tawi', ' Tandubas'),
(1555, 'Tawi-Tawi', ' Turtle Islands'),
(1556, 'Zambales', 'Olongapo City'),
(1557, 'Zambales', ' Botolan'),
(1558, 'Zambales', ' Cabangan'),
(1559, 'Zambales', ' Candelaria'),
(1560, 'Zambales', ' Castillejos'),
(1561, 'Zambales', ' Iba'),
(1562, 'Zambales', ' Masinloc'),
(1563, 'Zambales', ' Palauig'),
(1564, 'Zambales', ' San Antonio'),
(1565, 'Zambales', ' San Felipe'),
(1566, 'Zambales', ' San Marcelino'),
(1567, 'Zambales', ' San Narciso'),
(1568, 'Zambales', ' Santa Cruz'),
(1569, 'Zambales', ' Subic '),
(1570, 'ZamboangadelNorte', 'Dapitan City'),
(1571, 'ZamboangadelNorte', ' Dipolog City'),
(1572, 'ZamboangadelNorte', ' Bacungan'),
(1573, 'ZamboangadelNorte', ' Baliguian'),
(1574, 'ZamboangadelNorte', ' Godod'),
(1575, 'ZamboangadelNorte', ' Gutalac'),
(1576, 'ZamboangadelNorte', ' Jose Dalman'),
(1577, 'ZamboangadelNorte', ' Kalawit'),
(1578, 'ZamboangadelNorte', ' Katipunan'),
(1579, 'ZamboangadelNorte', ' La Libertad'),
(1580, 'ZamboangadelNorte', ' Labason'),
(1581, 'ZamboangadelNorte', ' Liloy'),
(1582, 'ZamboangadelNorte', ' Manukan'),
(1583, 'ZamboangadelNorte', ' Mutia'),
(1584, 'ZamboangadelNorte', ' Piñan'),
(1585, 'ZamboangadelNorte', ' Polanco'),
(1586, 'ZamboangadelNorte', ' Pres. Manuel A. Roxas'),
(1587, 'ZamboangadelNorte', ' Rizal'),
(1588, 'ZamboangadelNorte', ' Salug'),
(1589, 'ZamboangadelNorte', ' Sergio Osmeña Sr.'),
(1590, 'ZamboangadelNorte', ' Siayan'),
(1591, 'ZamboangadelNorte', ' Sibuco'),
(1592, 'ZamboangadelNorte', ' Sibutad'),
(1593, 'ZamboangadelNorte', ' Sindangan'),
(1594, 'ZamboangadelNorte', ' Siocon'),
(1595, 'ZamboangadelNorte', ' Sirawai'),
(1596, 'ZamboangadelNorte', ' Tampilisan '),
(1597, 'ZamboangadelSur', 'Pagadian City'),
(1598, 'ZamboangadelSur', ' Zamboanga City'),
(1599, 'ZamboangadelSur', ' Aurora');
INSERT INTO `tbl_city` (`id`, `state_id`, `city_name`) VALUES
(1600, 'ZamboangadelSur', ' Bayog'),
(1601, 'ZamboangadelSur', ' Dimataling'),
(1602, 'ZamboangadelSur', ' Dinas'),
(1603, 'ZamboangadelSur', ' Dumalinao'),
(1604, 'ZamboangadelSur', ' Dumingag'),
(1605, 'ZamboangadelSur', ' Guipos'),
(1606, 'ZamboangadelSur', ' Josefina'),
(1607, 'ZamboangadelSur', ' Kumalarang'),
(1608, 'ZamboangadelSur', ' Labangan'),
(1609, 'ZamboangadelSur', ' Lakewood'),
(1610, 'ZamboangadelSur', ' Lapuyan'),
(1611, 'ZamboangadelSur', ' Mahayag'),
(1612, 'ZamboangadelSur', ' Margosatubig'),
(1613, 'ZamboangadelSur', ' Midsalip'),
(1614, 'ZamboangadelSur', ' Molave'),
(1615, 'ZamboangadelSur', ' Pitogo'),
(1616, 'ZamboangadelSur', ' Ramon Magsaysay'),
(1617, 'ZamboangadelSur', ' San Miguel'),
(1618, 'ZamboangadelSur', ' San Pablo'),
(1619, 'ZamboangadelSur', ' Sominot'),
(1620, 'ZamboangadelSur', ' Tabina'),
(1621, 'ZamboangadelSur', ' Tambulig'),
(1622, 'ZamboangadelSur', ' Tigbao'),
(1623, 'ZamboangadelSur', ' Tukuran'),
(1624, 'ZamboangadelSur', ' Vincenzo A. Sagun'),
(1625, 'ZamboangaSibugay', 'Alicia'),
(1626, 'ZamboangaSibugay', ' Buug'),
(1627, 'ZamboangaSibugay', ' Diplahan'),
(1628, 'ZamboangaSibugay', ' Imelda'),
(1629, 'ZamboangaSibugay', ' Ipil'),
(1630, 'ZamboangaSibugay', ' Kabasalan'),
(1631, 'ZamboangaSibugay', ' Mabuhay'),
(1632, 'ZamboangaSibugay', ' Malangas'),
(1633, 'ZamboangaSibugay', ' Naga'),
(1634, 'ZamboangaSibugay', ' Olutanga'),
(1635, 'ZamboangaSibugay', ' Payao'),
(1636, 'ZamboangaSibugay', ' Roseller Lim'),
(1637, 'ZamboangaSibugay', ' Siay'),
(1638, 'ZamboangaSibugay', ' Talusan'),
(1639, 'ZamboangaSibugay', ' Titay'),
(1640, 'ZamboangaSibugay', ' Tungawan'),
(1641, 'MetroManila', 'Pateros');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `state_name`) VALUES
(4, 'Metro Manila'),
(6, 'Agusan del Sur '),
(7, 'Abra'),
(8, 'Agusan del Norte '),
(9, 'Aklan'),
(10, 'Albay'),
(11, 'Antique'),
(12, 'Apayao'),
(13, 'Aurora'),
(14, 'Basilan'),
(15, 'Bataan'),
(16, 'Batanes'),
(17, 'Batangas'),
(18, 'Benguet'),
(19, 'Biliran'),
(20, 'Bohol'),
(21, 'Bukidnon'),
(22, 'Bulacan'),
(23, 'Cagayan'),
(24, 'Camarines Norte'),
(26, 'Camarines Sur'),
(27, 'Camiguin'),
(28, 'Capiz'),
(29, 'Catanduanes'),
(30, 'Cavite'),
(31, 'Cebu'),
(32, 'Compostella Valley'),
(33, 'Cotabato'),
(34, 'Davao del Norte'),
(35, 'Davao del Sur'),
(36, 'Davao Oriental'),
(37, 'Dinagat Islands'),
(38, 'Eastern Samar'),
(39, 'Guimaras'),
(40, 'Ifugao'),
(41, 'Ilocos Norte'),
(42, 'Ilocos Sur '),
(43, 'Ilo - ilo'),
(44, 'Isabela'),
(45, 'Kalinga'),
(46, 'La Union'),
(47, 'Laguna'),
(48, 'Lanao del Norte'),
(49, 'Lanao del Sur'),
(50, 'Leyte'),
(51, 'Maguindanao'),
(52, 'Marinduque'),
(53, 'Masbate'),
(54, 'Misamis Occidental'),
(55, 'Misamis Oriental'),
(56, 'Mountain Province'),
(57, 'Negros Occidental'),
(58, 'Negros Oriental'),
(59, 'Northern Samar'),
(60, 'Nueva Ecija'),
(61, 'Nueva Vizcaya '),
(62, 'Occidental Mindoro'),
(63, 'Oriental Mindoro'),
(64, 'Palawan'),
(65, 'Pampanga'),
(66, 'Pangasinan'),
(67, 'Quezon'),
(68, 'Quirino'),
(69, 'Rizal'),
(70, 'Romblon'),
(71, 'Samar'),
(72, 'Sarangani'),
(73, 'Shariff Kabunsuan'),
(74, 'Siquijor'),
(75, 'Sorsogon'),
(76, 'South Cotabato'),
(77, 'Southern Leyte'),
(78, 'Sultan Kudarat'),
(79, 'Sulu'),
(80, 'Surigao del Norte'),
(81, 'Surigao del Sur'),
(82, 'Tarlac'),
(83, 'Tawi - Tawi'),
(84, 'Zambales'),
(85, 'Zamboanga del Norte'),
(86, 'Zamboanga del Sur'),
(87, 'Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `todo_list`
--

CREATE TABLE IF NOT EXISTS `todo_list` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT '0',
  `details` text NOT NULL,
  `owner` int(11) NOT NULL,
  `assigned_to` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo_list`
--

INSERT INTO `todo_list` (`id`, `title`, `date`, `start_time`, `end_time`, `status`, `details`, `owner`, `assigned_to`) VALUES
(10, 'asdsad', '2016-03-03', '13:00:00', '16:00:00', '1', 'asdasd', 3, '5,6'),
(11, 'fff', '2016-03-05', '14:00:00', '17:00:00', '1', 'asdasdasdas', 3, '6'),
(12, 'TESWTING', '2016-02-23', '21:00:00', '23:00:00', '0', 'ASD', 3, '5'),
(13, 'hello', '2016-02-27', '13:00:00', '17:00:00', '0', 'asda', 3, '6'),
(14, 'Interview', '2016-02-26', '15:00:00', '17:00:00', '0', 'interview idio and bla bla', 3, '6');

-- --------------------------------------------------------

--
-- Table structure for table `type_notifications`
--

CREATE TABLE IF NOT EXISTS `type_notifications` (
  `t_notification_id` int(11) NOT NULL,
  `t_notification_name` varchar(255) NOT NULL,
  `t_notification_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_notifications`
--

INSERT INTO `type_notifications` (`t_notification_id`, `t_notification_name`, `t_notification_desc`) VALUES
(1, 'Personal Interview', 'responded to a personal interview schedule.'),
(2, 'Online Interview', 'chose to have an Online interview.'),
(3, 'Police Clearance', 'uploaded a police clearance.'),
(4, 'Birth Certificate', 'uploaded a birth certificate'),
(5, 'SSS ID', 'uploaded an SSS id.'),
(6, 'PAGIBIG ID', 'uploaded a PAGIBIG id.'),
(7, 'NBI clearance', 'uploaded an NBI clearance'),
(8, 'Man power request', 'sent a manpower request'),
(9, 'Referral form', 'sent a employee refferal'),
(10, 'Evaluation', 'of evaluation is now available'),
(11, 'Interview success', 'you successfully interview this applicant'),
(12, 'No show', 'this applicant did not make it to the interview');

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE IF NOT EXISTS `workflow` (
  `workflow_id` int(11) NOT NULL,
  `workflow_name` varchar(254) NOT NULL,
  `1st` varchar(254) NOT NULL,
  `2nd` varchar(254) NOT NULL,
  `3rd` varchar(254) NOT NULL,
  `4th` varchar(254) NOT NULL,
  `5th` varchar(254) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `effective_date` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`workflow_id`, `workflow_name`, `1st`, `2nd`, `3rd`, `4th`, `5th`, `date_created`, `effective_date`) VALUES
(1, 'maminalatafi workflow', 'Screening', 'Exam', 'Human Resource Interview', 'Technical Interview', 'Deliverables', '2016-02-02 21:16:00', '2016-02-04 11:00:09'),
(20, 'bass', 'ansdk', 'lknalksndlklk', 'nasndlnasdnasdnn', 'nlasndlkasnd', 'lknlkasndkl', '2016-02-04 04:06:18', '2016-02-04 13:00:09'),
(21, 'ff', 'ff', 'ff', 'ff', 'ff', 'f', '2016-02-04 05:12:29', '2016-02-04 15:00:14'),
(22, 'theidio', 's', 'sd', 'ds', 's', 's', '2016-02-04 03:08:55', '2016-02-04 05:00:47'),
(23, 'paul', 'a', 'a', 'a', 'a', 'a', '2016-02-04 06:05:04', '2016-02-04 15:00:48'),
(24, 'Kax', 'screening', 'Exam', 'interview', 'techexm', 'deliverables', '2016-02-05 23:03:30', '2016-02-06 08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ictsi` (`email`);

--
-- Indexes for table `archived_jobs`
--
ALTER TABLE `archived_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_emp`
--
ALTER TABLE `c_emp`
  ADD PRIMARY KEY (`c_emp_id`),
  ADD UNIQUE KEY `c_e_id` (`c_e_id`);

--
-- Indexes for table `default_evalution`
--
ALTER TABLE `default_evalution`
  ADD PRIMARY KEY (`d_eval_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`eval_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_applicant_transact`
--
ALTER TABLE `file_applicant_transact`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `interview_sched`
--
ALTER TABLE `interview_sched`
  ADD PRIMARY KEY (`int_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_applicant_transact`
--
ALTER TABLE `job_applicant_transact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mp_request`
--
ALTER TABLE `mp_request`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`);

--
-- Indexes for table `percentageweight`
--
ALTER TABLE `percentageweight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_transact`
--
ALTER TABLE `performance_transact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_form`
--
ALTER TABLE `referral_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savejobs`
--
ALTER TABLE `savejobs`
  ADD PRIMARY KEY (`savejobs_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `skills_applicant_transact`
--
ALTER TABLE `skills_applicant_transact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo_list`
--
ALTER TABLE `todo_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_notifications`
--
ALTER TABLE `type_notifications`
  ADD PRIMARY KEY (`t_notification_id`);

--
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`workflow_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `archived_jobs`
--
ALTER TABLE `archived_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `c_emp`
--
ALTER TABLE `c_emp`
  MODIFY `c_emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `default_evalution`
--
ALTER TABLE `default_evalution`
  MODIFY `d_eval_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `file_applicant_transact`
--
ALTER TABLE `file_applicant_transact`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interview_sched`
--
ALTER TABLE `interview_sched`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `job_applicant_transact`
--
ALTER TABLE `job_applicant_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mp_request`
--
ALTER TABLE `mp_request`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `percentageweight`
--
ALTER TABLE `percentageweight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `performance_transact`
--
ALTER TABLE `performance_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_form`
--
ALTER TABLE `referral_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savejobs`
--
ALTER TABLE `savejobs`
  MODIFY `savejobs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `skills_applicant_transact`
--
ALTER TABLE `skills_applicant_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1642;
--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `todo_list`
--
ALTER TABLE `todo_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `type_notifications`
--
ALTER TABLE `type_notifications`
  MODIFY `t_notification_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `workflow_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

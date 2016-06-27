-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2015 at 07:06 AM
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
  `admin_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_mname`, `admin_lname`, `admin_username`, `admin_password`, `admin_level`, `admin_status`) VALUES
(1, 'Joshua', 'Tanedo', 'Manaol', 'joshua', '5832369af19bad7b9485730637b6b0ccb579ed3a', 32, 0),
(2, 'Paul', 'C', 'Banjawan', 'sys_paul', 'a027184a55211cd23e3f3094f1fdc728df5e0500', 2, 0),
(3, 'Juan', 'D', 'Dela Cruz', '1001', 'b7a875fc1ea228b9061041b7cec4bd3c52ab3ce3', 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE IF NOT EXISTS `applicants` (
  `id` int(11) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `citizenship` varchar(30) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `level` int(3) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `city_add` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `sss_no` int(11) NOT NULL,
  `tin_no` varchar(50) NOT NULL,
  `poschoice1` varchar(255) NOT NULL,
  `poschoice2` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL,
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
  `highest_att` varchar(255) NOT NULL,
  `profilepic` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `birthday`, `password`, `citizenship`, `religion`, `status`, `level`, `reg_date`, `height`, `weight`, `city_add`, `state`, `sss_no`, `tin_no`, `poschoice1`, `poschoice2`, `salary`, `elementary`, `elem_de`, `elem_inc`, `highschool`, `hs_de`, `hs_inc`, `college`, `college_de`, `collegeprog`, `college_inc`, `technical_courses`, `tech_de`, `tech_inc`, `graduate_stud`, `graduate_de`, `graduate_inc`, `post_graduate`, `post_de`, `post_inc`, `licensure_exam`, `date_taken`, `rating`, `date_ava`, `reference`, `skills`, `highest_att`, `profilepic`) VALUES
(1, 'Joshua', 'Tanedo', 'Manaol', 'joshua.manaol@gmail.com', '09153192962', '1995-09-16', '5832369af19bad7b9485730637b6b0ccb579ed3a', 'filipino', 'catholic', 0, 1, '2015-10-14 07:35:34', 184, 65, 'Antipolo', 'Agusan del Sur', 0, '', 'Release Manager', 'Web Developer', 50000, '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Computer Science', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Network Administrator', 'Bachelors/College Degree', ''),
(2, 'Marie', 'Ve', 'Pelagio', 'meg.pelagio@gmail.com', '09264160317', '1996-03-17', '6579d0daccd6d53dd36552cc435d3374ce4e2a19', 'Filipino', 'Catholic', 0, 1, '2015-10-14 07:39:36', 155, 51, 'Antipolo', 'Agusan del Norte', 0, '', 'HR Administrator', 'Web Developer', 70000, '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Walk-in', 'Mobile Developer', '', ''),
(3, 'Van', 'V', 'Calimlim', 'van@gmail.com', '09151652515', '1994-09-19', 'efa44987b6e36a90882a7df93eedc89343acdcb6', 'filipino', 'catholic', 0, 1, '2015-10-14 09:54:39', 165, 56, 'Batangas', 'Agusan del Norte', 0, '', 'Web Developer', 'Release Manager', 40000, '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2011', '', '', '', '', '', '', '', '', '', '', '', 0, 'Needs Few Weeks Notice', 'Newspaper Ad', 'Mobile Developer', '', ''),
(4, 'Mark', 'Peralta', 'Idio', 'mark@gmail.com', '096205105', '1901-01-02', 'f1b5a91d4d6ad523f2610114591c007e75d15084', 'filipino', 'catholic', 0, 1, '2015-10-15 05:23:21', 165, 65, 'Angeles', 'Agusan del Norte', 0, '', 'JAVA PROGRAMMER / ANALYST', 'Web Developer', 50000, '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'Newspaper Ad', 'Data Analyst', '', ''),
(5, 'Paul', 'Caminade', 'Banjawan', 'pcbanj@gmail.com', '09264122339', '1996-02-19', 'a2fafc544f8d1bf1cb71c4dd12f7dc49b4f8ba88', 'Filipino', 'Catholic', 0, 1, '2015-10-16 05:21:28', 156, 54, 'Alaminos', 'Agusan del Norte', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', 40000, '', '', '', '', '', '', 'FEU', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'School Campaign', 'Software Developer', '', '1461618_669719426383097_1010610250_n11.jpg'),
(6, 'Ruslie', 'Lapuz', 'DelaTorre', 'ruslie.delatorre@gmail.com', '09153192962', '1997-03-07', '6b8c53c5c138ab53e767983d78d20c63a3d23380', 'filipino', 'catholic', 0, 1, '2015-11-09 15:09:51', 156, 56, 'Antipolo', 'Agusan del Sur', 0, '', 'Web Developer', 'JAVA PROGRAMMER / ANALYST', 40000, '', '', '', '', '', '', 'FEU Institute of Technology', 'Bachelor of Science (B.S.)', 'Computer Studies, Information Technology', '2017', '', '', '', '', '', '', '', '', '', '', '', 0, 'Immediately', 'School Campaign', 'Software Developer', '', '');

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
  `copyright` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `content`, `fblink`, `twitterlink`, `banner`, `copyright`) VALUES
(1, 'International Container Terminal Services, Inc.', 'International Container Terminal Services, Inc. is a port management company in the Philippines.\r\nIt was incorporated on December 24, 1987, and has been cited by the Asian Development Bank\r\nas one of the top five major maritime terminal operators in the world.', 'https://www.facebook.com/', 'https://www.twitter.com/', 'banner111.jpg', 'CopyRight 2015');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `date_posted`) VALUES
(2, 'how to get money?', 'you need to work for it ganern!', '2015-10-09 18:03:15'),
(3, 'What if my bla bla', 'the bla bla', '2015-10-09 18:04:42'),
(4, 'Paano maging masaya?', 'Matulog ka.', '2015-10-11 18:37:19');

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
  `response` tinyint(4) DEFAULT NULL,
  `int_user_id` int(11) NOT NULL,
  `int_job_id` int(11) NOT NULL,
  `int_hr_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interview_sched`
--

INSERT INTO `interview_sched` (`int_id`, `int_date`, `time`, `day`, `req_cmt`, `response`, `int_user_id`, `int_job_id`, `int_hr_id`) VALUES
(4, '2015-10-22', '14:02', 'friday', 'asdsadsadsaa', NULL, 5, 4, 3),
(5, '2015-11-12', '08:00', 'Friday', 'Please a hard copy of your certificates. Thanks!', 0, 1, 8, 3);

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
  `work_area` varchar(255) NOT NULL,
  `work_exp` varchar(255) NOT NULL,
  `exp_salary` varchar(255) NOT NULL,
  `highest_att` varchar(255) NOT NULL,
  `employment_type` varchar(255) NOT NULL,
  `job_skills` varchar(255) NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT '1',
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_desc`, `job_requirement`, `job_requisition_id`, `work_area`, `work_exp`, `exp_salary`, `highest_att`, `employment_type`, `job_skills`, `job_status`, `date_added`) VALUES
(1, 'HR Administrator', '<div>We are looking for a Human Resource Manager to&nbsp; maintain the organization&#39;s human resources department by implementing&nbsp; human resources policies, programs and practices.</div><div>', '<ul><li>At least 7 years relevant experience in Human Resources and dealing with fellow employees</li><li>Experince from the field of Manufacturing Industry is a plus.</li><li>BPO experience is welcome</li><li>Has experience with NLRC and DOLE is a plus.</li><li>Must be a College graduate, prefereably Human Resoource Management, Marketing, Political Science, Engineering,Education, Law or other relevant courses.</li><li>Must be Mature and Responsible and can work with Minimal Supervision.</li><li> Must have very good oral and writting skills</li><li> Work is Monday to Saturday and must be willing to travel around the Philippines.</li></ul>', 68654, '', '', '0', '', '', 'Benefit Administration,Benchmarking,Business Reengineering,Employee Relations', 1, '2015-10-02 16:00:00'),
(3, 'Web Developer', 'some desc', '<ul><li>Candidate must possess at least a Bachelor&#39;s/College Degree , Computer Science/Information Technology or equivalent.</li><li>Required skill(s): Adobe BC, API integrations, jQuery, JSON scripts, JavaScript, CSS.</li><li>At least 4 year(s) of working experience in the related field is required for this position.</li><li>Full-Time position(s) available.</li></ul>', 55568, '', '', '0', '', '', 'Data Analyst,Web Programmer,Programmer', 1, '2015-10-09 18:10:50'),
(4, 'JAVA PROGRAMMER / ANALYST', 'Responsible in developing new programs in accordance to the given functional and technical specifications and in compliance to set Bank standards.He/she shall prepare test scripts and necessary program documentation and user manuals. He/she shall also assist users in the conduct of UAT.', '<ul><li>Graduate of any IT-related course.</li><li>At least&nbsp;<strong>three (3) years </strong>programming experience&nbsp;using&nbsp;<strong>Java (J2EE).</strong></li><li>Knowledgeable in mobile application development a plus.</li><li>Able to debug complex programs (multiple inputs/outputs, validation and online programs).</li><li>Full time positions available.</li></ul> ', 11515, '', '', '0', '', '', 'Software Developer,Data Analyst', 1, '2015-10-11 13:30:07'),
(5, 'Release Manager', 'some desc', '<ul><li>Bachelor&rsquo;s Degree in any IT related course or 10 years overall experience in an IT field</li><li>Preferred certifications: ITIL Foundations, ITIL Release Management, Software Quality Assurance, Project Management</li><li>5 years of overall software development/release/configuration management experience</li><li>Demonstrated ITIL best practices experience related to Release Management, Configuration Management, and Change Management</li><li>Experience in an enterprise development environment consisting of 3 or more separate environments (e.g. development, test, production)</li><li>Experience with both waterfall and Agile project methodologies with a full understanding of the Software Development Lifecycle</li></li></ul>', 15565, '', '', '0', '', '', 'Web Programmer,Mobile Developer,Data Analyst,Chief Information Officer', 1, '2015-10-11 13:37:53'),
(6, 'PHP SENIOR PROGRAMMER', 'We are looking to add an experienced php Developer to our growing team of Analyst Developers and QA testers.We are based in Santa Rosa, Laguna. We provide development and testing services for an Australian based client.', '<ul><li>Candidate must possess at least a Bachelor&#39;s/College Degree , Computer Science/Information Technology or equivalent.</li><li>Knowledge and mastery on the following software tools and systems<ul></ul></li><li>Must be able to communicate clearly</li><li>Excellent project management skills</li><li>Willing to work in Sto Tomas Batangas.</li><li>Willing to work on a project based employment&nbsp;</li></ul>', 111216, '', '', '0', '', '', 'Web Programmer,Software Developer', 1, '2015-10-11 13:47:18'),
(7, 'ENGINEERING ADMIN SUPERVISOR', '<ul><li>Responsible&nbsp;in developing new programsin accordance to the given functional and technical specifications and in compliance to set Bank standards.</li><li>He/she shall prepare test scripts and necessary program documentation and user manuals. He/she shall also assist users in the conduct of UAT.</li></ul>', '<ul><li>Candidate must possess at least a Bachelor&#39;s/College Degree , Engineering (Civil), Engineering (Computer/Telecommunication), Engineering (Electrical/Electronic), Engineering (Industrial), Engineering (Environmental/Health/Safety) or equivalent.</li><li>Required skill(s): Project Costing, MS Excel, MS Word.</li><li>Required language(s): English, Filipino</li><li>At least 1 year(s) of working experience in the related field is required for this position.</li><li>Applicants must be willing to work in 744 Romualdez St. Ermita Manila.</li><li>Preferably 1-4 Yrs Experienced Employees specializing in Engineering - Civil/Construction/Structural or equivalent.</li><li>Highly analytical, organized, w/ keen eye to details and technically equipped w/ maintenance and repair knowledge.</li><li>Professonal license - not required but is an advantage.&nbsp;</li><li>Willing to do fieldworks.</li><li>Full-Time position(s) available.</li></ul>', 55687, '', '', '0', '', '', 'Project Costing,Fieldworks,Construction,Operations', 1, '2015-10-11 13:58:39'),
(8, 'TAGAHUGAS', '<p>need malinis kamay</p>', '<p>as;lkdjasdmnsalkdkmnlsadlksadnlkasdmkl;</p>', 115515, '', '', '0', '', '', 'Network Administrator', 1, '2015-10-12 05:16:08'),
(9, 'iOS Developer', '<p>askdnaslkdnaslkdnasnd askjdnaskjdnasdaksdnasd</p>', '<ul>\r\n<li>sadmasdmasdasdjasdjasd</li>\r\n<li>asjdbasjdbjsadbjasdjasd</li>\r\n<li><em><strong>jasndkjasdjlansdkljasndlasd</strong></em></li>\r\n</ul>', 222654, '', '', '0', '', '', 'Network Administrator', 0, '2015-10-12 05:28:53'),
(10, 'Network admin', '<p>aslkjdnasiuodhsaoidjsa inhdsiauhd usapidh asupidhapiushdpiuas hdpiuashdpiusahdpiuashdiuqwhdiawphdpiasudhpasi hpuiahsdpiuahpiduhaspiudh aspiudhpaidhasdpi ahpwidapiwdhpiawhdpiawhidawhipdawipdawdwaidhiuhskjdhasjdawiudhasudihaskjasdiuwadiuawdpiuawhdiawuhdhasdaeadawdawdhawdiuahwdiuahdiuaadasdsdadas</p>', '', 6562626, 'Information Technology,Computer Scince', '5 Year/s', '0', 'Bachelors/College Degree', 'Regular Full Time', 'Network Administrator', 1, '2015-10-14 06:29:14'),
(11, 'Database Lord', '<p>asdlkjasdoiawiduh askjdhaso idhsaoidjoaisjdoaisdjaoiqwdhaiusdhauihjasdhasjkdasdasdkjsajkdsahdjasdjkashjjkhjhjkjasndaskjdasdkjlasdlkjsahdashdaskjdhaskjdhaskjdhaskjdasjdasdaskjdhasdkajhdawdaasdjkwdasdakjsdhwaasjdha wdkjahdajdawdja</p>', '', 10200205, 'Information Technology,Computer Scince', '10 Year/s', 'P 50, 000.00 above', 'Bachelors/College Degree', 'Regular Full Time', 'Data Analyst', 1, '2015-10-14 06:33:42'),
(12, 'Data Analyst lord', '<p>jasdjisandjasndjkasndas&nbsp;<img src="../tinymce/js/tinymce/plugins/emoticons/img/smiley-embarassed.gif" alt="embarassed" /></p>', '', 62605, 'Information Technology,Computer Scince', '5 Year/s', 'P 40, 000.00 - P 50, 000.00', 'Bachelors/College Degree', 'Regular Full Time', 'Data Analyst', 1, '2015-10-15 06:04:44'),
(13, 'Human Resource', '<p>some descritiopn asdadaasdjas;dja;d<a title="Google" href="http://www.google.com" target="_blank">click</a></p>', '', 545518, 'Human Resource Management', '5 Year/s', 'P 40, 000.00 - P 50, 000.00', 'Bachelors/College Degree', 'Regular Full Time', 'Project Costing ', 1, '2015-10-16 04:20:15'),
(14, 'Tagabantayt ', '<p>asldkjaslkdjaslkdj maganda</p>', '', 12321312, 'Information Technology,Computer Scince', '5 Year/s', 'P 20, 000.00 - P 30, 000.00', 'Bachelors/College Degree', 'Regular Full Time', 'Network Administrator', 1, '2015-10-16 05:32:27'),
(15, 'Network lord', '<p>asdadajsdbhaiujsdas</p>', '', 151616, 'Information Technology,Computer Scince', '5 Year/s', 'P 50, 000.00 above', 'Bachelors/College Degree', 'Regular Full Time', 'Network Administrator', 1, '2015-11-09 17:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `job_applicant_transact`
--

CREATE TABLE IF NOT EXISTS `job_applicant_transact` (
  `id` int(11) NOT NULL,
  `job_id_tr` int(11) NOT NULL,
  `applicant_id_tr` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_applicant_transact`
--

INSERT INTO `job_applicant_transact` (`id`, `job_id_tr`, `applicant_id_tr`) VALUES
(2, 4, 5),
(3, 6, 5),
(4, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `notificaiton_id` int(11) NOT NULL,
  `notificaiton_subject` varchar(255) NOT NULL,
  `notificaiton_target` varchar(255) NOT NULL,
  `app_id` int(11) NOT NULL,
  `hr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `savejobs`
--

CREATE TABLE IF NOT EXISTS `savejobs` (
  `savejobs_id` int(11) NOT NULL,
  `sj_app_id` int(11) NOT NULL,
  `sj_job_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savejobs`
--

INSERT INTO `savejobs` (`savejobs_id`, `sj_app_id`, `sj_job_id`) VALUES
(1, 1, 3),
(2, 1, 9),
(3, 1, 7),
(4, 1, 14),
(5, 5, 4),
(6, 5, 6),
(7, 5, 11),
(8, 5, 4),
(9, 1, 8),
(10, 1, 12),
(11, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`) VALUES
(1, 'Data Analyst'),
(2, 'Network Administrator'),
(3, 'Mobile Developer'),
(4, 'Software Developer'),
(5, 'Chief Information Officer'),
(6, 'Project Costing '),
(7, 'Operations'),
(8, 'Field works'),
(9, 'Construction');

-- --------------------------------------------------------

--
-- Table structure for table `skills_applicant_transact`
--

CREATE TABLE IF NOT EXISTS `skills_applicant_transact` (
  `id` int(11) NOT NULL,
  `skills_id_tr` int(11) NOT NULL,
  `applicant_id_tr` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills_applicant_transact`
--

INSERT INTO `skills_applicant_transact` (`id`, `skills_id_tr`, `applicant_id_tr`) VALUES
(2, 6, 1),
(3, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ictsi` (`email`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificaiton_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `interview_sched`
--
ALTER TABLE `interview_sched`
  MODIFY `int_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `job_applicant_transact`
--
ALTER TABLE `job_applicant_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificaiton_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `savejobs`
--
ALTER TABLE `savejobs`
  MODIFY `savejobs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `skills_applicant_transact`
--
ALTER TABLE `skills_applicant_transact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

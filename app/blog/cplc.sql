-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 03:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cplc`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_mode`
--

CREATE TABLE `apply_mode` (
  `id` int(11) NOT NULL,
  `apply_mode` varchar(15) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int(11) NOT NULL,
  `office_title` varchar(20) NOT NULL,
  `Stat` int(1) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_title`, `Stat`, `created_on`) VALUES
(1, 'President', 1, '2022-04-24 21:37:29'),
(2, 'Vice President 1', 1, '2022-04-24 21:38:23'),
(3, 'Vice President 2', 1, '2022-04-24 21:38:33'),
(4, 'Secretary 1', 1, '2022-04-24 21:38:42'),
(5, 'Secretary 2', 1, '2022-04-24 21:38:52'),
(6, 'Finance Director', 1, '2022-04-24 21:39:05'),
(7, 'Treasurer', 1, '2022-04-24 21:39:15'),
(8, 'Welfare Director', 1, '2022-04-24 21:39:23'),
(9, 'Membership Director', 1, '2022-04-24 21:39:33'),
(10, 'Tail Twister', 1, '2022-04-24 21:39:48'),
(11, 'Tamer', 1, '2022-04-24 21:39:53'),
(12, 'IPP', 1, '2022-05-02 15:36:14'),
(13, 'Leo Advisor', 1, '2022-05-02 15:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `service_yr`
--

CREATE TABLE `service_yr` (
  `id` int(11) NOT NULL,
  `service_yr` varchar(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_yr`
--

INSERT INTO `service_yr` (`id`, `service_yr`, `start_date`, `end_date`, `created_on`) VALUES
(1, '2022/2023', '2022-07-01', '2023-06-30', '2022-04-27 06:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `AdminUserName` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminEmailId` varchar(255) NOT NULL,
  `Is_Active` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `AdminUserName`, `AdminPassword`, `AdminEmailId`, `Is_Active`, `CreationDate`, `UpdationDate`) VALUES
(1, 'admin', '1234', 'phpgurukulofficial@gmail.com', 1, '2018-05-27 17:51:00', '2022-04-20 06:42:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblbod`
--

CREATE TABLE `tblbod` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `service_yr_id` int(11) NOT NULL,
  `bod_type` int(1) NOT NULL,
  `Stat` int(1) NOT NULL DEFAULT 1,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbod`
--

INSERT INTO `tblbod` (`id`, `member_id`, `office_id`, `service_yr_id`, `bod_type`, `Stat`, `last_update`) VALUES
(1, 1, 1, 1, 1, 1, '2022-05-02 16:06:21'),
(2, 2, 12, 1, 1, 1, '2022-05-02 16:06:38'),
(3, 3, 12, 1, 1, 1, '2022-05-02 16:08:50'),
(4, 3, 13, 1, 2, 1, '2022-05-02 16:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 'Project', 'Information about Clubs Projects', '2022-04-20 07:07:30', NULL, 1),
(2, 'Events', 'Information about Various Events within and accross Club, Regions, District and Multiple District', '2022-04-20 21:34:03', NULL, 1),
(3, 'Meetings', 'Meetings', '2022-04-20 22:10:53', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmembers`
--

CREATE TABLE `tblmembers` (
  `id` int(11) NOT NULL,
  `member_type_id` int(11) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `e_mail` varchar(30) NOT NULL,
  `pri_num` varchar(15) NOT NULL,
  `member_since` varchar(5) NOT NULL,
  `state_origin` varchar(30) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT 1,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmembers`
--

INSERT INTO `tblmembers` (`id`, `member_type_id`, `full_name`, `address`, `e_mail`, `pri_num`, `member_since`, `state_origin`, `city`, `dob`, `gender`, `occupation`, `marital_status`, `photo`, `stat`, `last_updated`) VALUES
(1, 2, 'Benjamin Akawu Ikwen', '11 Bassey Street', 'akawuben@gmail.com', '+2348133314846', ' 2019', 'Cross River', 'Obudu', '1996-04-21', 'Male', 'Student', 'Single', '32c0fe21c85d91f08140728434127298.jpg', 1, '2022-04-25 21:53:30'),
(2, 2, 'Lawrence Asinyang', 'Imang Street by Enebong', 'lawrenceasinyang@gmail.com', '09069351146', ' 2019', 'Akwa Ibom', 'Ibesikpo', '1996-03-07', 'Male', 'Student', 'Single', '9af30af60ea4ddc10732bec2fcf2d260.jpg', 1, '2022-05-23 12:27:39'),
(3, 1, 'Miriam Edu Egere', 'Ikot Ishie calabar', 'miriameduegere@gmail.com', '+2348133314846', ' 2015', 'Cross River', 'Abi', '1982-06-09', 'Female', 'Lecturer', 'Married', '7526e3c0cb45a7dc409c7fb913a0b06d.jpg', 1, '2022-05-24 11:54:46'),
(4, 1, 'Imaobong Akak', '11 Bassey Street', 'akawuben@gmail.com', '+2348133314846', ' 2013', 'Cross River', 'calabar', '2022-05-24', 'Female', 'Student', 'Female', '5c642ec854a6a92a56d7ebf0b9648eea.jpg', 1, '2022-05-24 11:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblmembertype`
--

CREATE TABLE `tblmembertype` (
  `id` int(11) NOT NULL,
  `member_type` varchar(9) NOT NULL,
  `Stat` int(1) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmembertype`
--

INSERT INTO `tblmembertype` (`id`, `member_type`, `Stat`, `created_on`) VALUES
(1, 'Lions', 1, '2022-04-21 19:43:16'),
(2, 'Omega Leo', 1, '2022-04-21 19:43:43'),
(3, 'Alpha Leo', 1, '2022-04-23 19:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `Description` longtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
(1, 'aboutus', 'About News Portal', '<br>', '2018-06-30 18:01:03', '2022-05-13 20:06:36'),
(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>', '2018-06-30 18:01:36', '2018-06-30 19:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(7, 'Jasprit Bumrah ruled out of England T20I series due to injury', 3, 4, '<p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\"><span style=\"margin: 0px; padding: 0px; font-weight: 700;\">The Indian Cricket Team has received a huge blow right ahead of the commencement of the much-awaited series against England. Star speedster Jasprit Bumrah has been ruled out of the forthcoming 3-match T20I series as he suffered an injury in his left thumb.</span></p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The 24-year-old pacer picked up a niggle during India’s first T20I match against Ireland played on June 27 at the Malahide cricket ground in Dublin. As per the reports, he is likely to be available for the ODI series against England scheduled to start from July 12.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">In the first, Bumrah exhibited a phenomenal performance with the ball. In his quota of four overs, he conceded 19 runs and picked 2 wickets at an economy rate of 4.75.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">Post his injury, he arrived at team’s optional training session on Thursday but didn’t train. Later, he was rested in the second face-off along with MS Dhoni, Shikhar Dhawan and Bhuvneshwar Kumar.</p><p style=\"margin-bottom: 15px; padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">As of now, no replacement has been announced. However, Umesh Yadav may be be given chance in the team in Bumrah’s absence.</p><p style=\"padding: 0px; font-size: 16px; font-family: PTSans, sans-serif;\">The first T20I match between India and England will be played at Old Trafford, Manchester on July 3.</p>', '2018-06-30 18:49:23', '2018-08-28 15:57:32', 1, 'Jasprit-Bumrah-ruled-out-of-England-T20I-series-due-to-injury', '6d08a26c92cf30db69197a1fb7230626.jpg'),
(10, 'Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal', 7, 9, '<h1 style=\"box-sizing: inherit; margin-top: 0px; padding: 0px; font-family: Roboto, sans-serif; font-size: 38px; line-height: normal; letter-spacing: -0.5px; color: rgb(51, 51, 51);\"><span itemprop=\"headline\" style=\"box-sizing: inherit;\">Tata Steel, Thyssenkrupp Finalise Landmark Steel Deal</span>Tata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel DealTata Steel, Thyssenkrupp Finalise Landmark Steel Deal</h1>', '2018-06-30 19:08:56', '2018-08-28 15:59:59', 1, 'Tata-Steel,-Thyssenkrupp-Finalise-Landmark-Steel-Deal', '505e59c459d38ce4e740e3c9f5c6caf7.jpg'),
(11, 'UNs Jean Pierre Lacroix thanks India for contribution to peacekeeping', 6, 8, '<p>UNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeepingUNs Jean Pierre Lacroix thanks India for contribution to peacekeeping<br></p>', '2018-06-30 19:10:36', '2018-08-28 16:01:35', 1, 'UNs-Jean-Pierre-Lacroix-thanks-India-for-contribution-to-peacekeeping', '27095ab35ac9b89abb8f32ad3adef56a.jpg'),
(12, 'Shah holds meeting with NE states leaders in Manipur', 6, 7, '<p><span style=\"color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">New Delhi: BJP president Amit Shah today held meetings with his party leaders who are in-charge of 11 Lok Sabha seats spread across seven northeast states as part of a drive to ensure that it wins the maximum number of these constituencies in the general election next year.</span><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><br style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\"><webviewcontentdata style=\"box-sizing: inherit; color: rgb(25, 25, 25); font-family: &quot;Noto Serif&quot;; font-size: 16px;\">Shah held separate meetings with Lok Sabha toli (group) of Arunachal Pradesh, Tripura, Meghalaya, Mizoram, Nagaland, Sikkim and Manipur in Manipur, the partys media head Anil Baluni said.<br style=\"box-sizing: inherit;\"><br style=\"box-sizing: inherit;\">Baluni said that Shah was in West Bengal for two days before he arrived in Manipur. The BJP chief would reach Odisha tomorrow.</webviewcontentdata><br></p>', '2018-06-30 19:11:44', '2018-08-28 16:01:43', 1, 'Shah-holds-meeting-with-NE-states-leaders-in-Manipur', '7fdc1a630c238af0815181f9faa190f5.jpg'),
(13, 'KDDDIGI', 1, 1, '<p>HJUGDSGIDCIUCD</p><p>NKHGSGIDUHSHDSI</p>', '2022-04-23 07:56:09', NULL, 1, 'KDDDIGI', 'f18d474726d627cba44f52d2c1efecc0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(1, 1, 'Diabetes', 'Diabetes Awareness Campaign', '2022-04-20 22:08:14', NULL, 1),
(2, 1, 'Hunger Relief', 'Feeding the Hungry', '2022-04-20 22:09:01', NULL, 1),
(3, 1, 'Vision', 'Sight care sensitization  and care', '2022-04-20 22:09:44', NULL, 1),
(4, 2, 'Public Installation', 'Fund Raising Ceremony and Public Installation of Serving Board of Directors', '2022-04-20 22:11:58', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_activity`
--

CREATE TABLE `upcoming_activity` (
  `id` int(11) NOT NULL,
  `activity_type` int(11) NOT NULL,
  `member_type` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `location` varchar(40) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_mode`
--
ALTER TABLE `apply_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_yr`
--
ALTER TABLE `service_yr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbod`
--
ALTER TABLE `tblbod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `office_id` (`office_id`),
  ADD KEY `service_yr_id` (`service_yr_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmembers`
--
ALTER TABLE `tblmembers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_type` (`member_type_id`);

--
-- Indexes for table `tblmembertype`
--
ALTER TABLE `tblmembertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `upcoming_activity`
--
ALTER TABLE `upcoming_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_type` (`activity_type`),
  ADD KEY `member_type` (`member_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_mode`
--
ALTER TABLE `apply_mode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service_yr`
--
ALTER TABLE `service_yr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbod`
--
ALTER TABLE `tblbod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmembers`
--
ALTER TABLE `tblmembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblmembertype`
--
ALTER TABLE `tblmembertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `upcoming_activity`
--
ALTER TABLE `upcoming_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbod`
--
ALTER TABLE `tblbod`
  ADD CONSTRAINT `tblbod_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `tblmembers` (`id`),
  ADD CONSTRAINT `tblbod_ibfk_2` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`),
  ADD CONSTRAINT `tblbod_ibfk_3` FOREIGN KEY (`service_yr_id`) REFERENCES `service_yr` (`id`);

--
-- Constraints for table `tblmembers`
--
ALTER TABLE `tblmembers`
  ADD CONSTRAINT `tblmembers_ibfk_1` FOREIGN KEY (`member_type_id`) REFERENCES `tblmembertype` (`id`);

--
-- Constraints for table `upcoming_activity`
--
ALTER TABLE `upcoming_activity`
  ADD CONSTRAINT `upcoming_activity_ibfk_1` FOREIGN KEY (`activity_type`) REFERENCES `tblcategory` (`id`),
  ADD CONSTRAINT `upcoming_activity_ibfk_2` FOREIGN KEY (`member_type`) REFERENCES `tblmembertype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

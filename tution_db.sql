-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2018 at 07:02 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tution_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fullName`, `user_name`, `email`, `password`, `role`, `image`, `status`) VALUES
(1, 'Abdul Kuddus', 'Kuddus', 'kuddus@gmail.com', 'c33367701511b4f6020ec61ded352059', 'admin', 'images/4e184c5161.jpg', 0),
(2, 'Amjad Maji', 'Amzad', 'amzad@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'moderator', 'images/4e184c5161.jpg', 1),
(3, 'Amjad Hossain', 'maji', 'maji1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055maji', 'editor', 'images/c303b4d686.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `city_name`) VALUES
(1, 'Dhaka'),
(2, 'Chittagong'),
(3, 'Khulna'),
(4, 'Jessore'),
(5, 'Shylet');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `class_name`) VALUES
(1, 'class 1'),
(2, 'class 2'),
(3, 'class 3'),
(4, 'class 4'),
(5, 'class 5'),
(6, 'class 6'),
(7, 'class 7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `mobile`, `message`, `status`) VALUES
(2, '12345679', 'A quick brown fox jumps over the lazy dog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_days`
--

CREATE TABLE `tbl_days` (
  `id` int(11) NOT NULL,
  `days_in_week` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_days`
--

INSERT INTO `tbl_days` (`id`, `days_in_week`) VALUES
(1, '3'),
(2, '4'),
(3, '5'),
(4, '6'),
(5, '1'),
(6, '2'),
(7, '7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL,
  `living_place` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `education_background` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `teacher_id`, `department`, `living_place`, `university`, `education_background`) VALUES
(8, 11, 'CSE', 'Foys lake', 'University of Science and Technology , Chittagong', 'Bangla');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_duration`
--

CREATE TABLE `tbl_duration` (
  `id` int(11) NOT NULL,
  `duration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_duration`
--

INSERT INTO `tbl_duration` (`id`, `duration`) VALUES
(1, '2'),
(2, '3'),
(3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer_image`
--

CREATE TABLE `tbl_footer_image` (
  `id` int(11) NOT NULL,
  `image_hints` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_footer_image`
--

INSERT INTO `tbl_footer_image` (`id`, `image_hints`, `image`, `status`) VALUES
(1, 'tution advertise', 'footerImage/08829fa76b.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gardian`
--

CREATE TABLE `tbl_gardian` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gardian`
--

INSERT INTO `tbl_gardian` (`id`, `designation`, `user_name`, `full_name`, `email`, `mobile`, `password`, `status`) VALUES
(1, 'gardian', 'munsi', 'Md Kuddus', 'kuddus4@gmail.com', '12345687', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medium`
--

CREATE TABLE `tbl_medium` (
  `id` int(11) NOT NULL,
  `medium` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medium`
--

INSERT INTO `tbl_medium` (`id`, `medium`) VALUES
(1, 'Bangla'),
(2, 'National'),
(3, 'British'),
(4, 'Open School'),
(5, 'Madrasha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_link`
--

CREATE TABLE `tbl_social_link` (
  `id` int(11) NOT NULL,
  `linkName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_social_link`
--

INSERT INTO `tbl_social_link` (`id`, `linkName`, `icon`) VALUES
(1, 'www.facebook.com', '&lt;i class=&quot;fab fa-facebook-square&quot;&gt;&lt;/i&gt;'),
(2, 'www.facebook.com', '&lt;i class=&quot;fab fa-facebook-square&quot;&gt;&lt;/i&gt;'),
(3, 'www.facebook.com', '&lt;i class=&quot;fab fa-facebook-square&quot;&gt;&lt;/i&gt;'),
(4, 'www.facebook.com/kuddusmunsi37', '&lt;i class=&quot;fab fa-facebook-square&quot;&gt;&lt;/i&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `member_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `teacher_code` varchar(255) NOT NULL,
  `newRegistration` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `designation`, `user_name`, `full_name`, `mobile`, `email`, `password`, `image`, `member_type`, `status`, `teacher_code`, `newRegistration`) VALUES
(10, 'tutor', 'dummy', 'dummy', 'dummy', 'dummy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'dummy', 'free', 0, '1001', '1'),
(11, 'tutor', 'kuddus', 'Md Abdul Kuddus', '12345679', 'kuddus@gmail.com', 'c33367701511b4f6020ec61ded352059', 'admin/teacherimage/ca2d4ea91c.jpg', '2', 1, '1002', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_expectation`
--

CREATE TABLE `tbl_teacher_expectation` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `expected_city` varchar(50) DEFAULT NULL,
  `expected_area` varchar(255) DEFAULT NULL,
  `expected_class` varchar(255) DEFAULT NULL,
  `expected_subject` varchar(255) DEFAULT NULL,
  `expected_salary` varchar(50) DEFAULT NULL,
  `expected_time` varchar(50) DEFAULT NULL,
  `expected_day_inweek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teacher_expectation`
--

INSERT INTO `tbl_teacher_expectation` (`id`, `teacher_id`, `expected_city`, `expected_area`, `expected_class`, `expected_subject`, `expected_salary`, `expected_time`, `expected_day_inweek`) VALUES
(2, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 9, 'chittagong', 'Jamal Khan', 'class7 , class10, class8,class9', 'maths, physics, bilogoy', '5000', '6pm 7pm', '3days'),
(4, 11, 'chittagong', 'Jamal Khan', 'class7 , class10, class8,class9', 'chemistry,hiremath', '6000', '6pm', '3days');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_request`
--

CREATE TABLE `tbl_teacher_request` (
  `id` int(11) NOT NULL,
  `teacher_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gardian_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teacher_request`
--

INSERT INTO `tbl_teacher_request` (`id`, `teacher_code`, `teacher_user_name`, `gardian_id`, `status`) VALUES
(5, '1002', 'kuddus', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutions`
--

CREATE TABLE `tbl_tutions` (
  `id` int(11) NOT NULL,
  `teacher_university` varchar(50) DEFAULT NULL,
  `tution_at` varchar(20) DEFAULT NULL,
  `tution_class` varchar(50) NOT NULL,
  `tution_group` varchar(50) DEFAULT NULL,
  `tution_medium` varchar(20) NOT NULL,
  `tution_subject` varchar(50) NOT NULL,
  `tution_salary` varchar(10) NOT NULL,
  `teacher_gender` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `tution_code` varchar(50) NOT NULL DEFAULT '1001'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tutions`
--

INSERT INTO `tbl_tutions` (`id`, `teacher_university`, `tution_at`, `tution_class`, `tution_group`, `tution_medium`, `tution_subject`, `tution_salary`, `teacher_gender`, `status`, `tution_code`) VALUES
(1, 'CU', 'foyslake', 'class7', 'not availabe', 'Bangla', 'Math', '2000', 'male', 0, '1001'),
(12, 'CUET', 'Chittagong', 'class10', 'commerce', 'Bangla', 'physics', '3000', 'female', 1, '1002'),
(14, 'CU', 'Chittagong', 'class10', 'commerce', 'Bangla', 'maths', '3000', 'male', 1, '1004');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tutions_details`
--

CREATE TABLE `tbl_tutions_details` (
  `id` int(11) NOT NULL,
  `tutions_id` int(11) NOT NULL,
  `tution_location` varchar(50) NOT NULL,
  `days_in_week` varchar(20) NOT NULL,
  `tution_time` varchar(20) NOT NULL,
  `tution_duration` varchar(50) NOT NULL,
  `tution_media_fee` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tutions_details`
--

INSERT INTO `tbl_tutions_details` (`id`, `tutions_id`, `tution_location`, `days_in_week`, `tution_time`, `tution_duration`, `tution_media_fee`) VALUES
(1, 12, 'GEC', '1', '6pm', '3', '50%'),
(2, 14, 'foys lake', '3', '4pm', '2', '30%');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tution_request`
--

CREATE TABLE `tbl_tution_request` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tution_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tution_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tution_salary` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tution_location` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tution_request`
--

INSERT INTO `tbl_tution_request` (`id`, `teacher_id`, `tution_code`, `tution_class`, `tution_salary`, `tution_location`, `status`) VALUES
(8, '8', '1004', '', '3000', 'foys lake', 1),
(9, '8', '1002', '', '3000', 'GEC', 1),
(11, '9', '1004', 'class10', '3000', 'foys lake', 1),
(12, '11', '1004', 'class10', '3000', 'foys lake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tution_rules`
--

CREATE TABLE `tbl_tution_rules` (
  `id` int(11) NOT NULL,
  `rules` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_tution_rules`
--

INSERT INTO `tbl_tution_rules` (`id`, `rules`) VALUES
(4, 'à§§) à¦Ÿà¦¿à¦‰à¦¶à¦¨ à¦ªà§‡à¦¤à§‡ à¦¹à¦²à§‡ à¦…à¦¬à¦¶à§à¦¯à¦‡ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦“à§Ÿà§‡à¦¬à¦¸à¦¾à¦‡à¦Ÿà§‡ à¦°à§‡à¦œà¦¿à¦¸à§à¦Ÿà§à¦°à§‡à¦¶à¦¨ à§§à§¦à§¦% à¦¸à¦®à§à¦ªà¦¨à§à¦¨ à¦•à¦°à¦¤à§‡ à¦¹à¦¬à§‡à¥¤'),
(5, 'à§¨.à¦…à¦­à¦¿à¦­à¦¾à¦¬à¦•à§‡à¦° à¦¸à¦¾à¦¥à§‡ à¦¸à¦¾à¦•à§à¦·à¦¾à§Ž  à¦•à¦°à§‡ à¦Ÿà¦¿à¦‰à¦¶à¦¨ à¦¨à¦¿à¦¶à§à¦šà¦¿à¦¤ à¦¹à¦²à§‡ à¦†à¦ªà¦¨à¦¾à¦•à§‡ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾à¦° à¦¨à¦¿à¦°à§à¦§à¦¾à¦°à¦¿à¦¤ à¦«à§€ à¦…à¦¨à§à¦¯à¦¾à§Ÿà§€ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾ à¦«à§€  à¦¦à¦¿à¦¤à§‡ à¦¹à¦¬à§‡à¥¤ à¦¤à¦¾à¦°à¦ªà¦° à¦Ÿà¦¿à¦‰à¦¶à¦¨ à¦ à¦¯à§‹à¦—à¦¦à¦¾à¦¨ à¦•à¦°à¦¤à§‡ à¦ªà¦¾à¦°à¦¬à§‡à¦¨'),
(6, 'à§©)à¦ªà§à¦°à¦¥à¦® à¦®à¦¾à¦¸à§‡à¦° à¦¸à§à¦¯à¦¾à¦²à¦¾à¦°à¦¿ à¦ªà¦¾à¦“à§Ÿà¦¾à¦° à¦†à¦—à§‡ à¦Ÿà¦¿à¦‰à¦¶à¦¨ à¦šà¦²à§‡ à¦¸à¦®à§à¦ªà§‚à¦°à§à¦£ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾ à¦«à¦¿ à¦«à§‡à¦°à¦¤ à¦¦à§‡à¦“à§Ÿà¦¾ à¦¹à¦¬à§‡à¥¤'),
(7, 'à§ª.à¦†à¦ªà¦¨à¦¾à¦° à¦¬à§à¦¯à¦¾à¦•à§à¦¤à¦¿à¦—à¦¤ à¦•à¦¾à¦°à¦¨à§‡  à¦¬à¦¾ à¦†à¦ªà¦¨à¦¿ à¦ à¦¿à¦•à¦®à¦¤à§‹ à¦ªà§œà¦¾à¦¤à§‡ à¦¨à¦¾ à¦ªà¦¾à¦°à¦¾à¦° à¦•à¦¾à¦°à¦¨à§‡  à¦¯à¦¦à¦¿ à¦†à¦ªà¦¨à¦¾à¦° à¦Ÿà¦¿à¦‰à¦¶à¦¨  à¦šà¦²à§‡ à¦¯à¦¾à§Ÿ à¦¬à¦¾ à¦†à¦ªà¦¨à¦¿ à¦¨à¦¿à¦œà§‡ à¦¯à¦¦à¦¿ à¦Ÿà¦¿à¦‰à¦¶à¦¨  à¦›à§‡à§œà§‡ à¦¦à§‡à¦¨ à¦¸à§‡à¦•à§à¦·à§‡à¦¤à§à¦°à§‡ à¦®à¦¿à¦¡à¦¿à§Ÿà¦¾  à¦«à¦¿ à¦«à§‡à¦°à¦¤ à¦¦à§‡à¦“à§Ÿà¦¾ à¦¹à¦¬à§‡à¦¨à¦¾à¥¤');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university`
--

CREATE TABLE `tbl_university` (
  `id` int(11) NOT NULL,
  `versity_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university`
--

INSERT INTO `tbl_university` (`id`, `versity_name`) VALUES
(1, 'ustc'),
(2, 'premier');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_university_for_teacher`
--

CREATE TABLE `tbl_university_for_teacher` (
  `id` int(11) NOT NULL,
  `versity_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_university_for_teacher`
--

INSERT INTO `tbl_university_for_teacher` (`id`, `versity_name`) VALUES
(1, 'University of Science and Technology , Chittagong'),
(2, 'Premier University'),
(3, 'Chittagong Independent University'),
(4, 'Chittagong University'),
(5, 'Chittagong University of Engineering and Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_days`
--
ALTER TABLE `tbl_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_duration`
--
ALTER TABLE `tbl_duration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer_image`
--
ALTER TABLE `tbl_footer_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gardian`
--
ALTER TABLE `tbl_gardian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_medium`
--
ALTER TABLE `tbl_medium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social_link`
--
ALTER TABLE `tbl_social_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_teacher_expectation`
--
ALTER TABLE `tbl_teacher_expectation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_code` (`teacher_id`);

--
-- Indexes for table `tbl_teacher_request`
--
ALTER TABLE `tbl_teacher_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tutions`
--
ALTER TABLE `tbl_tutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tution_code` (`tution_code`);

--
-- Indexes for table `tbl_tutions_details`
--
ALTER TABLE `tbl_tutions_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tution_request`
--
ALTER TABLE `tbl_tution_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tution_rules`
--
ALTER TABLE `tbl_tution_rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_university`
--
ALTER TABLE `tbl_university`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_university_for_teacher`
--
ALTER TABLE `tbl_university_for_teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_days`
--
ALTER TABLE `tbl_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_duration`
--
ALTER TABLE `tbl_duration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_footer_image`
--
ALTER TABLE `tbl_footer_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gardian`
--
ALTER TABLE `tbl_gardian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_medium`
--
ALTER TABLE `tbl_medium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_social_link`
--
ALTER TABLE `tbl_social_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_teacher_expectation`
--
ALTER TABLE `tbl_teacher_expectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_teacher_request`
--
ALTER TABLE `tbl_teacher_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tutions`
--
ALTER TABLE `tbl_tutions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_tutions_details`
--
ALTER TABLE `tbl_tutions_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_tution_request`
--
ALTER TABLE `tbl_tution_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_tution_rules`
--
ALTER TABLE `tbl_tution_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_university`
--
ALTER TABLE `tbl_university`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_university_for_teacher`
--
ALTER TABLE `tbl_university_for_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

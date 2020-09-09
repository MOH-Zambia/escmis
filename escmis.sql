-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 11, 2020 at 03:03 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propery0_ibenefits`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstrator`
--

CREATE TABLE `adminstrator` (
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advice`
--

CREATE TABLE `advice` (
  `adviceid` int(11) NOT NULL,
  `udate` datetime NOT NULL,
  `title` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `exlink` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `isshow` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `ADVISOR_ID` int(50) NOT NULL,
  `FNAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UNAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UPASS` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `TITLE` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `INTRO` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `PHOTO` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ACCEPT` tinyint(1) NOT NULL,
  `REG_DATE` varchar(35) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ADVISOR_ID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ARTICLE_ID` int(10) NOT NULL,
  `ARTICLE_TITLE` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ARTICLE_BODY` longtext COLLATE latin1_general_ci NOT NULL,
  `PUBLISH` tinyint(1) NOT NULL,
  `PUBLISH_DATE` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `SEO_ID` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `PROMO` varchar(20000) COLLATE latin1_general_ci NOT NULL,
  `ARTICLE_PIC` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `CATEGORY` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ARTICLE_SUMMARY` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `POPULARITY_SCORE` int(11) NOT NULL,
  `LEADERBOARD` varchar(20000) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE `Comments` (
  `id` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Website` varchar(1000) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `profileimg` varchar(600) NOT NULL,
  `Article_ID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_admin_settings`
--

CREATE TABLE `escmis_admin_settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `numrows` varchar(255) NOT NULL,
  `admintitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_comments`
--

CREATE TABLE `escmis_comments` (
  `comments` longtext NOT NULL,
  `CNT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_custom_requirements`
--

CREATE TABLE `escmis_custom_requirements` (
  `USER_ID` int(50) NOT NULL,
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `FUNCTIONAL_DOMAIN` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ACTOR` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `BUSINESS_PROCESS` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `WHERE_RELEVANT` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `AS_A` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `SO_THAT` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `PRIORITY` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `FREQUENCY` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `EXPORT_EXCEL` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `EXPORT_PDF` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `OTHER_CRITERIA` varchar(2000) COLLATE latin1_general_ci DEFAULT NULL,
  `REG_DATE` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `CNT` int(11) NOT NULL,
  `DUPLICATE` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `DUPLICATE_NOTE` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_email_templates`
--

CREATE TABLE `escmis_email_templates` (
  `t_id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `template_title` varchar(255) NOT NULL,
  `templates` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_known_missing_requirements`
--

CREATE TABLE `escmis_known_missing_requirements` (
  `receiving_business_process` varchar(1000) NOT NULL,
  `storage_and_inventory_management` varchar(200) NOT NULL,
  `dispensing` varchar(200) NOT NULL,
  `requisition` varchar(200) NOT NULL,
  `order_processing` varchar(200) NOT NULL,
  `transport` varchar(200) NOT NULL,
  `forecasting` varchar(200) NOT NULL,
  `CNT` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `reg_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `escmis_user`
--

CREATE TABLE `escmis_user` (
  `USER_ID` int(50) NOT NULL,
  `FULLNAME` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `USERNAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UPASS` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `TITLE` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PROVINCE` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `PHOTO` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ACCEPT` tinyint(1) NOT NULL,
  `REG_DATE` varchar(35) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logsheet`
--

CREATE TABLE `logsheet` (
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `my_date` varchar(35) NOT NULL,
  `status` varchar(70) NOT NULL DEFAULT 'PENDING',
  `user_id` varchar(100) NOT NULL,
  `counting` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MEMBER_BENEFIT_LIMITS_UBUMI_INPATIENT`
--

CREATE TABLE `MEMBER_BENEFIT_LIMITS_UBUMI_INPATIENT` (
  `POLICY_NUMBER` varchar(30) NOT NULL,
  `MONTH` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `MEMBER_ID` bigint(20) NOT NULL,
  `INCIDENT_LIMIT` varchar(15) NOT NULL,
  `HOSPITALIZATION` varchar(15) NOT NULL,
  `PHARMACY` varchar(15) NOT NULL,
  `LAB_AND_PATHOLOGY` varchar(15) NOT NULL,
  `RADIOLOGY` varchar(15) NOT NULL,
  `REHABILITATION` varchar(15) NOT NULL,
  `PROTHESIS_AND_DEVICES` varchar(15) NOT NULL,
  `SCHEME_ID` bigint(20) NOT NULL,
  `COVER_TYPE` varchar(30) NOT NULL,
  `INCIDENT_LIMIT_NOW` varchar(15) NOT NULL,
  `HOSPITALIZATION_NOW` varchar(15) NOT NULL,
  `PHARMACY_NOW` varchar(15) NOT NULL,
  `LAB_AND_PATHOLOGY_NOW` varchar(15) NOT NULL,
  `RADIOLOGY_NOW` varchar(15) NOT NULL,
  `REHABILITATION_NOW` varchar(15) NOT NULL,
  `PROTHESIS_AND_DEVICES_NOW` varchar(15) NOT NULL,
  `INSURANCE` varchar(100) NOT NULL,
  `MEMBER_NAME` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MEMBER_BENEFIT_LIMITS_UBUMI_OUTPATIENT`
--

CREATE TABLE `MEMBER_BENEFIT_LIMITS_UBUMI_OUTPATIENT` (
  `POLICY_NUMBER` varchar(30) NOT NULL,
  `MONTH` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `MEMBER_ID` bigint(20) NOT NULL,
  `GP_CONSULTATION` varchar(15) NOT NULL,
  `SPECIALIST_CONSULTATION` varchar(15) NOT NULL,
  `PHARMACY_ACUTE_MEDICATION` varchar(15) NOT NULL,
  `CHRONIC_MEDICATION` varchar(15) NOT NULL,
  `LAB_AND_PATHOLOGY` varchar(15) NOT NULL,
  `RADIOLOGY` varchar(15) NOT NULL,
  `REHABILITATION` varchar(15) NOT NULL,
  `SPECIALIZED_RADIOLOGY` varchar(15) NOT NULL,
  `SCHEME_ID` bigint(20) NOT NULL,
  `COVER_TYPE` varchar(30) NOT NULL,
  `GP_CONSULTATION_NOW` varchar(15) NOT NULL,
  `SPECIALIST_CONSULTATION_NOW` varchar(15) NOT NULL,
  `PHARMACY_ACUTE_MEDICATION_NOW` varchar(15) NOT NULL,
  `CHRONIC_MEDICATION_NOW` varchar(15) NOT NULL,
  `LAB_AND_PATHOLOGY_NOW` varchar(15) NOT NULL,
  `RADIOLOGY_NOW` varchar(15) NOT NULL,
  `REHABILITATION_NOW` varchar(15) NOT NULL,
  `SPECIALIZED_RADIOLOGY_NOW` varchar(15) NOT NULL,
  `INSURANCE` varchar(100) NOT NULL,
  `MEMBER_NAME` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsid` int(11) NOT NULL,
  `ndate` datetime NOT NULL,
  `title` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `exlink` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `isshow` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `imglink` varchar(300) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `PARTNER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `CITY` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ADDRESS1` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ADDRESS2` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `TELL_NO` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `LOGO` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ACCEPT` tinyint(1) NOT NULL,
  `REG_DATE` datetime NOT NULL,
  `PERSON` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `DESIGNATION` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `UNAME` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `PASSWORD` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `FAX` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `WEB` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `DESCRIPTION` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `SHOWHOME` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `FTP` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `FTPUSER` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `FTPPASSWORD` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdflog`
--

CREATE TABLE `pdflog` (
  `NID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UDATE` date NOT NULL,
  `ISDELETE` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `PDF` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `COMMENT` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `YEND` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `INSURANCE` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `related_posts`
--

CREATE TABLE `related_posts` (
  `ARTICLE_ID` int(10) NOT NULL,
  `RELATED_POST_ID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Reply_for_comments`
--

CREATE TABLE `Reply_for_comments` (
  `id` int(11) NOT NULL,
  `Article_ID` varchar(500) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Website` varchar(1000) NOT NULL,
  `profileimg` varchar(1000) NOT NULL,
  `Comments_ID` int(11) NOT NULL,
  `Reply` varchar(1000) NOT NULL,
  `Reply_Id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ADVISOR_ID` int(11) NOT NULL,
  `SUB_DATE` varchar(35) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_comments`
--

CREATE TABLE `tbl_blog_comments` (
  `bl_comments_id` int(11) NOT NULL,
  `read_status` varchar(154) NOT NULL DEFAULT '0',
  `bl_id` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_comment` longtext,
  `created_date` datetime NOT NULL,
  `bl_status` varchar(30) NOT NULL,
  `commenter_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bl_comment_follower_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `grav_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistics_admin`
--

CREATE TABLE `tbl_statistics_admin` (
  `st_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `page` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `browser` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walola_blog`
--

CREATE TABLE `tbl_walola_blog` (
  `bl_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_tag` varchar(255) NOT NULL,
  `blog_url` varchar(255) NOT NULL,
  `blog_description` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `viewers_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walola_blog_ads`
--

CREATE TABLE `tbl_walola_blog_ads` (
  `ad_id` int(11) NOT NULL,
  `ad_link` text NOT NULL,
  `ad_type` varchar(50) NOT NULL,
  `advertisement_image` text NOT NULL,
  `ad_script` text NOT NULL,
  `lib_link` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_walola_user`
--

CREATE TABLE `tbl_walola_user` (
  `user_id` int(11) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `lib_name` varchar(255) NOT NULL,
  `introducer_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `your_self` text NOT NULL,
  `testimonial_text` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL,
  `random_id` varchar(30) NOT NULL,
  `am_public_key` varchar(255) NOT NULL,
  `am_private_key` varchar(255) NOT NULL,
  `am_associate_tag` varchar(255) NOT NULL,
  `clickbank_affiliate_id` varchar(255) NOT NULL,
  `youtube_apikey` text NOT NULL,
  `payza_email` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `walola_key` varchar(255) NOT NULL,
  `empower_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `NID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `EMPLOYEE_ID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `FNAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `LNAME` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `COMPANY` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `INSURANCE` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `EMAIL` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `PHOTO` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ACCEPT` tinyint(1) NOT NULL,
  `REG_DATE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstrator`
--
ALTER TABLE `adminstrator`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `advice`
--
ALTER TABLE `advice`
  ADD UNIQUE KEY `adviceid` (`adviceid`),
  ADD UNIQUE KEY `adviceid_2` (`adviceid`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`ADVISOR_ID`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ARTICLE_ID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escmis_admin_settings`
--
ALTER TABLE `escmis_admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escmis_custom_requirements`
--
ALTER TABLE `escmis_custom_requirements`
  ADD PRIMARY KEY (`CNT`);

--
-- Indexes for table `escmis_email_templates`
--
ALTER TABLE `escmis_email_templates`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `escmis_known_missing_requirements`
--
ALTER TABLE `escmis_known_missing_requirements`
  ADD PRIMARY KEY (`CNT`);

--
-- Indexes for table `escmis_user`
--
ALTER TABLE `escmis_user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `logsheet`
--
ALTER TABLE `logsheet`
  ADD PRIMARY KEY (`counting`),
  ADD KEY `counting` (`counting`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD UNIQUE KEY `newsid` (`newsid`),
  ADD UNIQUE KEY `newsid_2` (`newsid`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`PARTNER_ID`);

--
-- Indexes for table `pdflog`
--
ALTER TABLE `pdflog`
  ADD PRIMARY KEY (`PDF`),
  ADD UNIQUE KEY `PDF` (`PDF`);

--
-- Indexes for table `Reply_for_comments`
--
ALTER TABLE `Reply_for_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blog_comments`
--
ALTER TABLE `tbl_blog_comments`
  ADD PRIMARY KEY (`bl_comments_id`);

--
-- Indexes for table `tbl_statistics_admin`
--
ALTER TABLE `tbl_statistics_admin`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_walola_blog`
--
ALTER TABLE `tbl_walola_blog`
  ADD PRIMARY KEY (`bl_id`);

--
-- Indexes for table `tbl_walola_blog_ads`
--
ALTER TABLE `tbl_walola_blog_ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `tbl_walola_user`
--
ALTER TABLE `tbl_walola_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `USER_ID` (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advice`
--
ALTER TABLE `advice`
  MODIFY `adviceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `ADVISOR_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ARTICLE_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Comments`
--
ALTER TABLE `Comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escmis_admin_settings`
--
ALTER TABLE `escmis_admin_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escmis_custom_requirements`
--
ALTER TABLE `escmis_custom_requirements`
  MODIFY `CNT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escmis_email_templates`
--
ALTER TABLE `escmis_email_templates`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escmis_known_missing_requirements`
--
ALTER TABLE `escmis_known_missing_requirements`
  MODIFY `CNT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `escmis_user`
--
ALTER TABLE `escmis_user`
  MODIFY `USER_ID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logsheet`
--
ALTER TABLE `logsheet`
  MODIFY `counting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `PARTNER_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reply_for_comments`
--
ALTER TABLE `Reply_for_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog_comments`
--
ALTER TABLE `tbl_blog_comments`
  MODIFY `bl_comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_statistics_admin`
--
ALTER TABLE `tbl_statistics_admin`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_walola_blog`
--
ALTER TABLE `tbl_walola_blog`
  MODIFY `bl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_walola_blog_ads`
--
ALTER TABLE `tbl_walola_blog_ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_walola_user`
--
ALTER TABLE `tbl_walola_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

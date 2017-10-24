-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 03:28 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cv_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `pincode` int(10) NOT NULL,
  `carrer_objective` longtext NOT NULL,
  `deg_course` varchar(255) NOT NULL,
  `deg_institution` varchar(255) NOT NULL,
  `deg_place` varchar(255) NOT NULL,
  `deg_yop` varchar(255) NOT NULL,
  `deg_parcentage` varchar(255) NOT NULL,
  `hsc_course` varchar(255) NOT NULL,
  `hsc_institution` varchar(255) NOT NULL,
  `hsc_place` varchar(255) NOT NULL,
  `hsc_yop` varchar(255) NOT NULL,
  `hsc_parcentage` varchar(255) NOT NULL,
  `sslc_course` varchar(255) NOT NULL,
  `sslc_institution` varchar(255) NOT NULL,
  `sslc_place` varchar(255) NOT NULL,
  `sslc_yop` varchar(255) NOT NULL,
  `sslc_parcentage` varchar(255) NOT NULL,
  `tech_skill` longtext NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_disc` longtext NOT NULL,
  `inplant_train` longtext NOT NULL,
  `conference_title` varchar(255) NOT NULL,
  `conference_disc` longtext NOT NULL,
  `achievements` longtext NOT NULL,
  `aoi` longtext NOT NULL,
  `language` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `material_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `declaration` text NOT NULL,
  `sign` varchar(255) NOT NULL,
  `word_file` varchar(255) NOT NULL DEFAULT 'filename.doc',
  `pdf_file` varchar(255) NOT NULL DEFAULT 'filename.pdf',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 09:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `id_user` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `id_user`, `name`, `type`, `link`, `created_at`) VALUES
(1, 'RPL3-8621594', 'Khai Zulfa', 'facebook', 'https://facebook.com/', '2020-06-02 10:53:45'),
(2, 'RPL3-8621594', '@khaiz18._', 'instagram', '', '2020-06-02 10:55:03'),
(3, 'RPL3-8621594', '@khaiz.18_', 'twitter', '', '2020-06-14 14:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `years` varchar(10) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `link_instagram` text NOT NULL,
  `link_group_wa` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `update_by_id_user` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`id`, `class`, `school`, `years`, `instagram`, `link_instagram`, `link_group_wa`, `email`, `logo`, `status`, `update_by_id_user`, `created_at`, `updated_at`) VALUES
(1, 'Eclasse', 'Hogwarts University', '2017-2020', '@eclasse', 'https://instagram.com', 'wa.me/', 'eclasse@gmail.com', '', 'profile', 'RPL3-8621594', '2020-06-05 14:24:48', '2020-06-19 13:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_note`
--

CREATE TABLE `tbl_note` (
  `id` int(11) NOT NULL,
  `id_note` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `plain_note` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_note`
--

INSERT INTO `tbl_note` (`id`, `id_note`, `id_user`, `note`, `plain_note`, `status`, `created_at`) VALUES
(10, '392584', 'RPL3-8621594', '<p>Besok siang kumpul di aula jam 3 sore ya teman teman</p>', 'Besok siang kumpul di aula jam 3 sore ya teman teman', 1, '2020-06-15 06:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tweet`
--

CREATE TABLE `tbl_tweet` (
  `id` int(11) NOT NULL,
  `id_tweet` varchar(16) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `tweet` text NOT NULL,
  `plain_tweet` text NOT NULL,
  `likes` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tweet`
--

INSERT INTO `tbl_tweet` (`id`, `id_tweet`, `id_user`, `tweet`, `plain_tweet`, `likes`, `created_at`) VALUES
(20, '3329481961265058', 'RPL3-8621594', '<p>halo</p>', 'halo', 0, '2020-06-10 11:11:06'),
(21, '4136898294305706', 'RPL3-8942167', '<p>Hey There, I am using Eclasse!</p>', 'Hey There, I am using Eclasse!', 0, '2020-06-15 14:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `loc_of_birth` varchar(500) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text NOT NULL,
  `profil_picture` text NOT NULL,
  `bio` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(5) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_user`, `username`, `password`, `name`, `loc_of_birth`, `date_of_birth`, `email`, `phone`, `gender`, `address`, `profil_picture`, `bio`, `created_at`, `updated_at`, `last_login`, `status`, `level`) VALUES
(1, 'RPL3-8621594', 'khaizulfa', '$2y$10$lWoTYuCmQfOeWfFqvHwLHuD2Z2gdQufWZnIVsqWCd/GNufuRyqkJa', 'Khaizuddin Zulfa', 'Kendal', '2020-05-01', 'khaizulfa18@gmail.com', '0895383063231', 1, 'Candiroto rt17 rw1', 'CC_20200122_0815191.png', 'Stray Dogs\n#KTBFFH', '2020-06-02 14:31:46', '2020-06-18 15:59:23', '0000-00-00 00:00:00', 1, 3),
(14, 'RPL3-7183596', 'Sabo1807', '$2y$10$RMPUOtDTPodN0/A9wqBQWePrTy2jr6gKcRlMMIy8zKMR8B04aYFuO', 'Sabo', 'Goa Kingdom', '2020-06-10', 'sabo@gmail.com', '089120312012', 1, 'Kamabaka Kingdom', 'no-photo.png', 'Revolution Army Head Commander', '2020-06-18 15:37:05', '2020-06-18 15:37:05', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Indexes for table `tbl_note`
--
ALTER TABLE `tbl_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tweet`
--
ALTER TABLE `tbl_tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_note`
--
ALTER TABLE `tbl_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tweet`
--
ALTER TABLE `tbl_tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

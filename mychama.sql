-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2018 at 01:36 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychama`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--


DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `bank_name` varchar(150) NOT NULL,
  `chama_user` varchar(200) NOT NULL,
  `pp_username` varchar(150) NOT NULL,
  `acc_name` varchar(200) NOT NULL,
  `acc_number` varchar(100) NOT NULL,
  PRIMARY KEY (`acc_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`bank_name`, `chama_user`, `pp_username`, `acc_name`, `acc_number`) VALUES
('KCB bank', 'testaccount@gmail.com', 'testaccount@gmail.com', 'test account', '0123456789'),
('Co-op bank', 'kinix@gmail.com', 'kimelinxn95@gmail.com', 'Investment', '12345678'),
('Co-op bank', 'someone@smtp.com', 'paypal@gmail.com', 'Test Accounts', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_contributions`
--

DROP TABLE IF EXISTS `mychama_contributions`;
CREATE TABLE IF NOT EXISTS `mychama_contributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `amount` varchar(6) NOT NULL,
  `f_type` varchar(200) NOT NULL,
  `f_often` varchar(200) NOT NULL,
  `when_n` varchar(200) NOT NULL,
  `f_fine` varchar(200) NOT NULL,
  `f_why` varchar(200) NOT NULL,
  `chama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_contributions`
--

INSERT INTO `mychama_contributions` (`id`, `name`, `amount`, `f_type`, `f_often`, `when_n`, `f_fine`, `f_why`, `chama`) VALUES
(1, 'FindPata Contribution', '150', 'One Time Contribution', 'Once a Week (Weekly)', 'Every Sunday of the Week', 'Fixed Amount Fine of', 'for each unpaid contribution', 'someone@smtp.com'),
(2, 'Investing', '50', 'Regular Contribution', 'Once a Week (Weekly)', 'Every Monday of the Week', 'Fixed Amount Fine of', 'for each unpaid contribution', 'kinix@gmail.com'),
(3, 'Contribution', '50', 'One Time Contribution', 'Once a Month (Monthly)', 'Every Monday of the Week', 'Fixed Amount Fine of', 'for each unpaid contribution', 'testaccount@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_fines`
--

DROP TABLE IF EXISTS `mychama_fines`;
CREATE TABLE IF NOT EXISTS `mychama_fines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_id` varchar(11) NOT NULL,
  `chama` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `payment_gross` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_fines`
--

INSERT INTO `mychama_fines` (`id`, `trans_id`, `chama`, `item_name`, `payment_gross`, `mobile`, `name`, `date`) VALUES
(1, 'MKCD3HKU4R', 'kinix@gmail.com', 'Loan ID 3', '5000', '254708649931', 'Dedan Kimathi', '2019-11-12 08:58:49'),
(2, 'MKCDN8RHWP', 'kinix@gmail.com', 'Loan ID 3', '5000', '254708649931', 'Dedan Kimathi', '2019-11-12 09:00:48'),
(3, 'MKCIFF0DHN', 'kinix@gmail.com', 'Loan ID 50', '3000', '254712345678', 'Dedan Kimathi', '2019-11-12 10:02:09'),
(4, 'MKCGB8RXPW', 'kinix@gmail.com', 'Loan ID 50', '5000', '254708649931', 'Dedan Kimathi', '2019-11-12 10:02:39'),
(5, 'MKC6BTV51T', 'kinix@gmail.com', 'Loan ID 50', '5000', '254708649931', 'Dedan Kimathi', '2019-11-12 10:02:57'),
(6, 'MKCHX4PCOZ', 'kinix@gmail.com', 'Loan ID 3', '5050', '254708649931', 'Dedan Kimathi', '2019-11-12 10:06:13'),
(7, 'MKCPJY3RS5', 'kinix@gmail.com', 'Loan ID 3', '5050', '254708649931', 'Dedan Kimathi', '2019-11-12 10:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_loans`
--

DROP TABLE IF EXISTS `mychama_loans`;
CREATE TABLE IF NOT EXISTS `mychama_loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `fine` int(12) NOT NULL,
  `amount` int(12) NOT NULL,
  `chama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_loans`
--

INSERT INTO `mychama_loans` (`id`, `name`, `fine`, `amount`, `chama`) VALUES
(1, 'Biashara', 50, 15000, 'kinix@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_members`
--

DROP TABLE IF EXISTS `mychama_members`;
CREATE TABLE IF NOT EXISTS `mychama_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `chama` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_members`
--

INSERT INTO `mychama_members` (`id`, `name`, `mobile`, `email`, `role`, `chama`, `username`, `password`) VALUES
(1, 'Dedan Kimathi', '0708649931', 'kim@gmail.com', 'Treasurer', 'someone@smtp.com', 'kim@gmail.com', '12345678'),
(2, 'Test User', '0712345679', 'test@gmail.com', 'Chair Person', 'someone@smtp.com', 'test@gmail.com', '0712345678'),
(3, 'Dedan Kimathi', '0708649931', 'kim@gmail.com', 'Member', 'kinix@gmail.com', 'kim@gmail.com', '12345678'),
(4, 'Nixon Kimeli', '0720704936', 'dekut@gmail.com', 'Member', 'kinix@gmail.com', 'test@gmail.com', '0722345678'),
(5, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(6, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(7, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(8, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(9, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(10, 'Test User', '0708649931', 'emmanuelmuema52@gmail.com', 'Member', 'kinix@gmail.com', 'emmanuelmuema52@gmail.com', '0708649931'),
(11, 'Nixon Kimeli', '0720704936', 'kimelinxn95@gmail.com', 'Member', 'kinix@gmail.com', 'kimelinxn95@gmail.com', '0720704936');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_merry`
--

DROP TABLE IF EXISTS `mychama_merry`;
CREATE TABLE IF NOT EXISTS `mychama_merry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `amount` int(5) NOT NULL,
  `number` varchar(15) NOT NULL,
  `chama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_merry`
--

INSERT INTO `mychama_merry` (`id`, `name`, `date`, `amount`, `number`, `chama`) VALUES
(1, 'Dedan Kimathi', '2018-10-31 00:00:00', 100, '0708649931', 'kinix@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_users`
--

DROP TABLE IF EXISTS `mychama_users`;
CREATE TABLE IF NOT EXISTS `mychama_users` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `g_name` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_users`
--

INSERT INTO `mychama_users` (`first_name`, `last_name`, `email`, `password`, `g_name`, `status`) VALUES
('Kinix', 'Kimeli', 'kinix@gmail.com', '23D7M19VU6', 'Invest', 'new'),
('First', 'Last', 'someone1@gmail.com', 'Birdk108', 'Group name', 'new'),
('First', 'Last', 'someone@smtp.com', '1234', 'Group name', 'new'),
('Test', 'Account', 'test@gmail.com', '0787654321', 'Tester', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `mychama_user_loans`
--

DROP TABLE IF EXISTS `mychama_user_loans`;
CREATE TABLE IF NOT EXISTS `mychama_user_loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `mobile` int(20) NOT NULL,
  `amount` int(12) NOT NULL,
  `loan_name` varchar(200) NOT NULL,
  `reason` varchar(2000) NOT NULL,
  `chama` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return_date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mychama_user_loans`
--

INSERT INTO `mychama_user_loans` (`id`, `name`, `mobile`, `amount`, `loan_name`, `reason`, `chama`, `user`, `date`, `return_date`, `status`) VALUES
(1, 'Nixon Kimeli', 708649931, 10000, 'Biashara', 'I need to grow my business', 'kinix@gmail.com', 'test@gmail.com', '2018-11-04 22:30:31', '2019-02-03', 'paid'),
(2, 'Dedan Kimathi', 708649931, 3000, 'Biashara', 'I want school fees', 'kinix@gmail.com', 'kim@gmail.com', '2018-11-05 17:41:10', '2019-02-03', 'paid'),
(3, 'Dedan Kimathi', 708649931, 5000, 'Biashara', 'I want to expand my business', 'kinix@gmail.com', 'kim@gmail.com', '2018-11-12 08:44:05', '2019-02-10', 'paid'),
(4, 'Dedan Kimathi', 708649931, 2000, 'Biashara', 'I have a farm project', 'kinix@gmail.com', 'kim@gmail.com', '2018-11-14 01:17:37', '2019-02-12', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `trans_id` varchar(12) NOT NULL,
  `chama` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `payment_gross` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`trans_id`, `chama`, `item_name`, `payment_gross`, `payment_status`, `mobile`, `name`, `date`) VALUES
('MJ3R0GEOCS', 'kinix@gmail.com', 'Investing', '1000', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-04 22:17:05'),
('MJ3JHVHTKW', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-04 22:25:13'),
('MJ333K7SU5', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Nixon Kimeli', '2018-11-04 22:25:57'),
('MJ3ZVXJ32Q', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0720704936', 'Nixon Kimeli', '2018-11-04 22:28:02'),
('MJ3YYO2891', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Nixon Kimeli', '2018-11-05 18:42:47'),
('MJ3N8FXC3P', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Nixon Kimeli', '2018-11-05 18:47:40'),
('MJ3836WI00', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Nixon Kimeli', '2018-11-05 19:38:39'),
('MJ34A4CR0Y', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-05 19:50:44'),
('MJ3PM715MZ', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-12 08:36:17'),
('MJ3OR3WD8Y', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-12 08:39:42'),
('MJ3XKMZ5DN', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Nixon Kimeli', '2018-11-12 08:40:22'),
('MJ3NREGXUK', 'kinix@gmail.com', 'Loan ID 3', '5000', 'Complete', '254708649931', 'Dedan Kimathi', '2018-11-12 08:45:31'),
('MKCD3HKU4R', 'kinix@gmail.com', 'Loan ID 3', '5000', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 08:58:49'),
('MKCDN8RHWP', 'kinix@gmail.com', 'Loan ID 3', '5000', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 09:00:48'),
('MKC45SV6GZ', 'kinix@gmail.com', 'Loan ID 3', '5000', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 09:38:32'),
('MKCLZC2A6Z', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254708649931', 'Dedan Kimathi', '2018-11-13 10:40:23'),
('MKCVNS8J7S', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Dedan Kimathi', '2018-11-13 10:35:32'),
('MKCCTKLH7Y', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Dedan Kimathi', '2018-11-13 10:32:24'),
('MKC6BTV51T', 'kinix@gmail.com', 'Loan ID 3', '5050', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 10:03:01'),
('MKCHX4PCOZ', 'kinix@gmail.com', 'Loan ID 3', '5050', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 10:06:13'),
('MKCPJY3RS5', 'kinix@gmail.com', 'Loan ID 3', '5050', 'Complete', '254708649931', 'Dedan Kimathi', '2019-11-12 10:06:52'),
('MKCW7U6VWT', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-12 10:28:46'),
('MKCA2PW867', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0725632415', 'Nixon Kimeli', '2018-11-12 11:34:21'),
('MKC5GFKZZ6', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0715912799', 'Nixon Kimeli', '2018-11-12 13:21:01'),
('MKCK0WX0QG', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0791494683', 'Dedan Kimathi', '2018-11-12 13:21:59'),
('MKCO3Y0IF1', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254708649931', 'Dedan Kimathi', '2018-11-13 10:38:37'),
('MKC94DZMEC', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Test User', '2018-11-13 10:21:13'),
('MKC6OAYRLJ', 'kinix@gmail.com', 'Loan ID 4', '2000', 'Complete', '254708649931', 'Dedan Kimathi', '2018-11-14 01:27:39'),
('MKCDMX4ZPN', 'kinix@gmail.com', 'Investing', '50', 'Complete', '0708649931', 'Test User', '2018-11-13 10:23:46'),
('MKCANISMYM', 'kinix@gmail.com', 'Loan ID 2', '3000', 'Complete', '254712345678', 'Dedan Kimathi', '2018-11-13 10:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

DROP TABLE IF EXISTS `total`;
CREATE TABLE IF NOT EXISTS `total` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `chama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`id`, `amount`, `chama`) VALUES
(1, 62800, 'kinix@gmail.com'),
(2, 8700, 'testaccount@gmail.com'),
(3, 8700, 'tests@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

DROP TABLE IF EXISTS `withdrawals`;
CREATE TABLE IF NOT EXISTS `withdrawals` (
  `trans_id` varchar(12) NOT NULL,
  `chama` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `payment_gross` varchar(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`trans_id`, `chama`, `item_name`, `payment_gross`, `payment_status`, `mobile`, `name`, `date`) VALUES
('MJ3EJZAYJE', 'kinix@gmail.com', 'Investing', '1000', 'Complete', '0708649931', 'Dedan Kimathi', '2018-11-07 10:56:25'),
('MJ3E4RZQVS', 'kinix@gmail.com', 'Investing', '500', 'Complete', '0708649931', 'Nixon Kimeli', '2018-11-07 10:59:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

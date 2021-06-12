-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 10:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslog`
--

CREATE TABLE `accesslog` (
  `sl_no` bigint(20) NOT NULL,
  `action_page` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_done` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_account_name`
--

CREATE TABLE `acc_account_name` (
  `account_id` int(11) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acc_account_name`
--

INSERT INTO `acc_account_name` (`account_id`, `account_name`, `account_type`) VALUES
(1, 'Employee Salary', 0),
(3, 'Example', 1),
(4, 'Loan Expense', 0),
(5, 'Loan Income', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_coa`
--

CREATE TABLE `acc_coa` (
  `HeadCode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHeadName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `HeadLevel` int(11) NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `IsTransaction` tinyint(1) NOT NULL,
  `IsGL` tinyint(1) NOT NULL,
  `HeadType` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `IsBudget` tinyint(1) NOT NULL,
  `IsDepreciation` tinyint(1) NOT NULL,
  `DepreciationRate` decimal(18,2) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UpdateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acc_coa`
--

INSERT INTO `acc_coa` (`HeadCode`, `HeadName`, `PHeadName`, `HeadLevel`, `IsActive`, `IsTransaction`, `IsGL`, `HeadType`, `IsBudget`, `IsDepreciation`, `DepreciationRate`, `CreateBy`, `CreateDate`, `UpdateBy`, `UpdateDate`) VALUES
('502020000001', '145454-HmIsahaq', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2018-12-17 15:10:19', '', '0000-00-00 00:00:00'),
('4021403', 'AC', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:55', '', '0000-00-00 00:00:00'),
('50202', 'Account Payable', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:43', '', '0000-00-00 00:00:00'),
('10203', 'Account Receivable', 'Current Asset', 2, 1, 0, 0, 'A', 0, 0, '0.00', '', '0000-00-00 00:00:00', 'admin', '2013-09-18 15:29:35'),
('1020201', 'Advance', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, '0.00', 'Zoherul', '2015-05-31 13:29:12', 'admin', '2015-12-31 16:46:32'),
('102020103', 'Advance House Rent', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-10-02 16:55:38', 'admin', '2016-10-02 16:57:32'),
('10202', 'Advance, Deposit And Pre-payments', 'Current Asset', 2, 1, 0, 0, 'A', 0, 0, '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-12-31 16:46:24'),
('4020602', 'Advertisement and Publicity', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:51:44', '', '0000-00-00 00:00:00'),
('1010410', 'Air Cooler', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-05-23 12:13:55', '', '0000-00-00 00:00:00'),
('4020603', 'AIT Against Advertisement', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:09', '', '0000-00-00 00:00:00'),
('1', 'Assets', 'COA', 0, 1, 0, 0, 'A', 0, 0, '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('1010204', 'Attendance Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:49:31', '', '0000-00-00 00:00:00'),
('40216', 'Audit Fee', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2017-07-18 12:54:30', '', '0000-00-00 00:00:00'),
('4021002', 'Bank Charge', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:21:03', '', '0000-00-00 00:00:00'),
('30203', 'Bank Interest', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'Obaidul', '2015-01-03 14:49:54', 'admin', '2016-09-25 11:04:19'),
('1010104', 'Book Shelf', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:11', '', '0000-00-00 00:00:00'),
('1010407', 'Books and Journal', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:45:37', '', '0000-00-00 00:00:00'),
('102010207', 'Brac Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-01-18 10:10:31', '', '0000-00-00 00:00:00'),
('4020604', 'Business Development Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:29', '', '0000-00-00 00:00:00'),
('4020606', 'Campaign Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:52:57', 'admin', '2016-09-19 14:52:48'),
('4020502', 'Campus Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:46:53', 'admin', '2017-04-27 17:02:39'),
('40212', 'Car Running Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:28:43', '', '0000-00-00 00:00:00'),
('10201', 'Cash & Cash Equivalent', 'Current Asset', 2, 1, 0, 1, 'A', 0, 0, '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:57:55'),
('1020102', 'Cash At Bank', 'Cash & Cash Equivalent', 3, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-19 13:43:59', 'admin', '2015-10-15 15:32:42'),
('1020101', 'Cash In Hand', 'Cash & Cash Equivalent', 3, 1, 1, 1, 'A', 0, 0, '0.00', '2', '2018-07-31 12:56:28', 'admin', '2016-05-23 12:05:43'),
('30101', 'Cash Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:26', '', '0000-00-00 00:00:00'),
('1010207', 'CCTV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:24', '', '0000-00-00 00:00:00'),
('102020102', 'CEO Current A/C', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-09-25 11:54:54', '', '0000-00-00 00:00:00'),
('102010206', 'City Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-01-18 10:09:32', '', '0000-00-00 00:00:00'),
('1010101', 'Class Room Chair', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:45:29', '', '0000-00-00 00:00:00'),
('4021407', 'Close Circuit Cemera', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:35', '', '0000-00-00 00:00:00'),
('4020601', 'Commision on Admission', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:51:21', 'admin', '2016-09-19 14:42:54'),
('1010206', 'Computer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:09', '', '0000-00-00 00:00:00'),
('4021410', 'Computer (R)', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-03-24 12:38:52', 'Zoherul', '2016-03-24 12:41:40'),
('1010102', 'Computer Table', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:45:44', '', '0000-00-00 00:00:00'),
('301020401', 'Continuing Registration fee - UoL (Income)', 'Registration Fee (UOL) Income', 4, 1, 1, 0, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:40:40', '', '0000-00-00 00:00:00'),
('4020904', 'Contratuall Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:34', '', '0000-00-00 00:00:00'),
('403', 'Cost of Sale', 'Expence', 0, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-07-08 10:37:16', '', '0000-00-00 00:00:00'),
('30102', 'Credit Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:34', '', '0000-00-00 00:00:00'),
('4020709', 'Cultural Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'nasmud', '2017-04-29 12:45:10', '', '0000-00-00 00:00:00'),
('102', 'Current Asset', 'Assets', 1, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-12-06 13:54:42', 'admin', '2018-07-07 11:23:00'),
('502', 'Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21'),
('102030101', 'cusL-0001-Walkin', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2019-01-08 09:14:48', '', '0000-00-00 00:00:00'),
('102030102', 'cusL-0002-Rahat Khan', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-09-07 19:16:14', '', '0000-00-00 00:00:00'),
('102030103', 'cusL-0003-Ali riza Selcuk', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '3', '2020-09-07 19:45:33', '', '0000-00-00 00:00:00'),
('102030104', 'cusL-0004-test', 'Customer Receivable', 4, 1, 1, 0, 'A', 0, 0, '0.00', '5', '2020-12-20 15:19:37', '', '0000-00-00 00:00:00'),
('1020301', 'Customer Receivable', 'Account Receivable', 3, 1, 0, 1, 'A', 0, 0, '0.00', '2', '2019-01-08 09:15:08', 'admin', '2018-07-07 12:31:42'),
('40100002', 'cw-Chichawatni', 'Store Expenses', 2, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-08-02 16:30:41', '', '0000-00-00 00:00:00'),
('1020202', 'Deposit', 'Advance, Deposit And Pre-payments', 3, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:40:42', '', '0000-00-00 00:00:00'),
('4020605', 'Design & Printing Expense', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:55:00', '', '0000-00-00 00:00:00'),
('4020404', 'Dish Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:21', '', '0000-00-00 00:00:00'),
('40215', 'Dividend', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2016-09-25 14:07:55', '', '0000-00-00 00:00:00'),
('4020403', 'Drinking Water Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:10', '', '0000-00-00 00:00:00'),
('1010211', 'DSLR Camera', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:53:17', 'admin', '2016-01-02 16:23:25'),
('102010205', 'Dutch-Bangla Bank', 'Cash At Bank', 4, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-01-18 09:49:13', '', '0000-00-00 00:00:00'),
('502020000007', 'E3Y1WJMB-John Maria', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-27 05:55:58', '', '0000-00-00 00:00:00'),
('502020000010', 'E4Y91CAX-onlineorder', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-02-03 11:20:44', '', '0000-00-00 00:00:00'),
('502020000004', 'E97E9SJT-Manik Hassan', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-09 14:32:22', '', '0000-00-00 00:00:00'),
('4020908', 'Earned Leave', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:38', '', '0000-00-00 00:00:00'),
('502020000006', 'EBK2UPRA-John Carlos', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-27 05:51:09', '', '0000-00-00 00:00:00'),
('4020607', 'Education Fair Expenses', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:53:42', '', '0000-00-00 00:00:00'),
('502020000011', 'EK9BYZVY-test sdafdssdfds', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-02-24 14:07:53', '', '0000-00-00 00:00:00'),
('1010602', 'Electric Equipment', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:44:51', '', '0000-00-00 00:00:00'),
('1010203', 'Electric Kettle', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:49:07', '', '0000-00-00 00:00:00'),
('10106', 'Electrical Equipment', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:43:44', '', '0000-00-00 00:00:00'),
('4020407', 'Electricity Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:59:31', '', '0000-00-00 00:00:00'),
('10202010501', 'employ', 'Salary', 5, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:47:10', '', '0000-00-00 00:00:00'),
('405', 'Entertainment', 'Expence', 1, 1, 1, 0, 'E', 1, 1, '1.00', '2', '2020-01-18 07:49:00', '', '0000-00-00 00:00:00'),
('502020000012', 'ENVBUZKE-kabirkhan', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2020-10-12 10:57:33', '', '0000-00-00 00:00:00'),
('502020000002', 'EQLAJFUW-AinalHaque', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2018-12-17 15:08:43', '', '0000-00-00 00:00:00'),
('2', 'Equity', 'COA', 0, 1, 0, 0, 'L', 0, 0, '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('502020000009', 'EU3APTYY-JohnDoe', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-27 06:02:46', '', '0000-00-00 00:00:00'),
('502020000005', 'EW9PM201-test emp', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-09 14:38:15', '', '0000-00-00 00:00:00'),
('502020000008', 'EXL9WSCL-Mitchel Santner', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2019-01-27 05:58:55', '', '0000-00-00 00:00:00'),
('4', 'Expence', 'COA', 0, 1, 0, 0, 'E', 0, 0, '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('502020000003', 'EY2T1OWA-jahangirAhmad', 'Account Payable', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'John Doe', '2018-12-17 15:11:13', '', '0000-00-00 00:00:00'),
('4020903', 'Faculty,Staff Salary & Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:21', '', '0000-00-00 00:00:00'),
('4021404', 'Fax Machine', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:34:15', '', '0000-00-00 00:00:00'),
('4020905', 'Festival & Incentive Bonus', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:48', '', '0000-00-00 00:00:00'),
('1010103', 'File Cabinet', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:02', '', '0000-00-00 00:00:00'),
('40210', 'Financial Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-08-20 12:24:31', 'admin', '2015-10-15 19:20:36'),
('1010403', 'Fire Extingushier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:39:32', '', '0000-00-00 00:00:00'),
('4021408', 'Furniture', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:47', '', '0000-00-00 00:00:00'),
('10101', 'Furniture & Fixturers', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'anwarul', '2013-08-20 16:18:15', 'anwarul', '2013-08-21 13:35:40'),
('4020406', 'Gas Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:59:20', '', '0000-00-00 00:00:00'),
('20201', 'General Reserve', 'Reserve & Surplus', 2, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-25 14:07:12', 'admin', '2016-10-02 17:48:49'),
('10105', 'Generator', 'Non Current Assets', 2, 1, 1, 1, 'A', 0, 0, '0.00', 'Zoherul', '2016-02-27 16:02:35', 'admin', '2016-05-23 12:05:18'),
('4021414', 'Generator Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-06-16 10:21:05', '', '0000-00-00 00:00:00'),
('40213', 'Generator Running Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:29:29', '', '0000-00-00 00:00:00'),
('10103', 'Groceries and Cutleries', 'Non Current Assets', 2, 1, 1, 1, 'A', 0, 0, '0.00', '2', '2018-07-12 10:02:55', '', '0000-00-00 00:00:00'),
('1010408', 'Gym Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:46:03', '', '0000-00-00 00:00:00'),
('4020907', 'Honorarium', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:26', '', '0000-00-00 00:00:00'),
('40205', 'House Rent', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-08-24 10:26:56', '', '0000-00-00 00:00:00'),
('40100001', 'HP-Hasilpur', 'Academic Expenses', 2, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-07-29 03:44:23', '', '0000-00-00 00:00:00'),
('4020702', 'HR Recruitment Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:55:49', '', '0000-00-00 00:00:00'),
('4020703', 'Incentive on Admission', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:56:09', '', '0000-00-00 00:00:00'),
('3', 'Income', 'COA', 0, 1, 0, 0, 'I', 0, 0, '0.00', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
('5020302', 'Income Tax Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2016-09-19 11:18:17', 'admin', '2016-09-28 13:18:35'),
('102020302', 'Insurance Premium', 'Prepayment', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-09-19 13:10:57', '', '0000-00-00 00:00:00'),
('4021001', 'Interest on Loan', 'Financial Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:20:53', 'admin', '2016-09-19 14:53:34'),
('4020401', 'Internet Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:56:55', 'admin', '2015-10-15 18:57:32'),
('10107', 'Inventory', 'Non Current Assets', 1, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-07 15:21:58', '', '0000-00-00 00:00:00'),
('102010309', 'iyzico', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:32:35', '', '0000-00-00 00:00:00'),
('10205010101', 'Jahangir', 'Hasan', 1, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2018-07-07 10:40:56', '', '0000-00-00 00:00:00'),
('1010210', 'LCD TV', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:52:27', '', '0000-00-00 00:00:00'),
('30103', 'Lease Sale', 'Store Income', 1, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2018-07-08 07:51:52', '', '0000-00-00 00:00:00'),
('5', 'Liabilities', 'COA', 0, 1, 0, 0, 'L', 0, 0, '0.00', 'admin', '2013-07-04 12:32:07', 'admin', '2015-10-15 19:46:54'),
('50203', 'Liabilities for Expenses', 'Current Liabilities', 2, 1, 0, 0, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:59', '', '0000-00-00 00:00:00'),
('4020707', 'Library Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2017-01-10 15:34:54', '', '0000-00-00 00:00:00'),
('4021409', 'Lift', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:36:12', '', '0000-00-00 00:00:00'),
('50101', 'Long Term Borrowing', 'Non Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2013-07-04 12:32:26', 'admin', '2015-10-15 19:47:40'),
('4020608', 'Marketing & Promotion Exp.', 'Promonational Expence', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:53:59', '', '0000-00-00 00:00:00'),
('4020901', 'Medical Allowance', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:11:33', '', '0000-00-00 00:00:00'),
('1010411', 'Metal Ditector', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'Zoherul', '2016-08-22 10:55:22', '', '0000-00-00 00:00:00'),
('4021413', 'Micro Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-05-12 14:53:51', '', '0000-00-00 00:00:00'),
('30202', 'Miscellaneous (Income)', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'anwarul', '2014-02-06 15:26:31', 'admin', '2016-09-25 11:04:35'),
('4020909', 'Miscellaneous Benifit', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:53', '', '0000-00-00 00:00:00'),
('4020701', 'Miscellaneous Exp', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-09-25 12:54:39', '', '0000-00-00 00:00:00'),
('40207', 'Miscellaneous Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2014-04-26 16:49:56', 'admin', '2016-09-25 12:54:19'),
('1010401', 'Mobile Phone', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-29 10:43:30', '', '0000-00-00 00:00:00'),
('102020101', 'Mr Ashiqur Rahman', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-12-31 16:47:23', 'admin', '2016-09-25 11:55:13'),
('1010212', 'Network Accessories', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-02 16:23:32', '', '0000-00-00 00:00:00'),
('102020106', 'new head dfhgfh', 'Advance', 3, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2020-01-16 06:25:10', '', '0000-00-00 00:00:00'),
('4020408', 'News Paper Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-01-02 15:55:57', '', '0000-00-00 00:00:00'),
('101', 'Non Current Assets', 'Assets', 1, 1, 0, 0, 'A', 0, 0, '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 15:29:11'),
('501', 'Non Current Liabilities', 'Liabilities', 1, 1, 0, 0, 'L', 0, 0, '0.00', 'anwarul', '2014-08-30 13:18:20', 'admin', '2015-10-15 19:49:21'),
('406', 'Office Accessories', 'Expence', 1, 1, 1, 0, 'E', 1, 1, '1.00', '2', '2020-01-18 07:51:32', '', '0000-00-00 00:00:00'),
('1010404', 'Office Decoration', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:40:02', '', '0000-00-00 00:00:00'),
('10102', 'Office Equipment', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'anwarul', '2013-12-06 18:08:00', 'admin', '2015-10-15 15:48:21'),
('4021401', 'Office Repair & Maintenance', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:15', '', '0000-00-00 00:00:00'),
('30201', 'Office Stationary (Income)', 'Other Income', 2, 1, 1, 1, 'I', 0, 0, '0.00', 'anwarul', '2013-07-17 15:21:06', 'admin', '2016-09-25 11:04:50'),
('1020103', 'Online Payment', 'Cash & Cash Equivalent', 2, 1, 0, 1, 'A', 0, 0, '0.00', '2', '2020-10-18 14:26:41', '', '0000-00-00 00:00:00'),
('102010308', 'Orange Money payment', 'Online Payment', 2, 1, 0, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:32:11', '', '0000-00-00 00:00:00'),
('402', 'Other Expenses', 'Expence', 1, 1, 0, 0, 'E', 0, 0, '0.00', '2', '2018-07-07 14:00:16', 'admin', '2015-10-15 18:37:42'),
('302', 'Other Income', 'Income', 1, 1, 0, 0, 'I', 0, 0, '0.00', '2', '2018-07-07 13:40:57', 'admin', '2016-09-25 11:04:09'),
('40211', 'Others (Non Academic Expenses)', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'Obaidul', '2014-12-03 16:05:42', 'admin', '2015-10-15 19:22:09'),
('30205', 'Others (Non-Academic Income)', 'Other Income', 2, 1, 0, 1, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:23:49', 'admin', '2015-10-15 17:57:52'),
('10104', 'Others Assets', 'Non Current Assets', 2, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2016-01-29 10:43:16', '', '0000-00-00 00:00:00'),
('4020910', 'Outstanding Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 11:56:50', '', '0000-00-00 00:00:00'),
('4021405', 'Oven', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:34:31', '', '0000-00-00 00:00:00'),
('4021412', 'PABX-Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 14:40:18', '', '0000-00-00 00:00:00'),
('4020902', 'Part-time Staff Salary', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:12:06', '', '0000-00-00 00:00:00'),
('102010301', 'Paypal', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:27:41', '', '0000-00-00 00:00:00'),
('102010306', 'Paystack Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:30:55', '', '0000-00-00 00:00:00'),
('102010307', 'Paytm Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:31:23', '', '0000-00-00 00:00:00'),
('1010202', 'Photocopy & Fax Machine', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:47:27', 'admin', '2016-05-23 12:14:40'),
('4021411', 'Photocopy Machine Repair', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'Zoherul', '2016-04-24 12:40:02', 'admin', '2017-04-27 17:03:17'),
('3020503', 'Practical Fee', 'Others (Non-Academic Income)', 3, 1, 1, 1, 'I', 0, 0, '0.00', 'admin', '2017-07-22 18:00:37', '', '0000-00-00 00:00:00'),
('1020203', 'Prepayment', 'Advance, Deposit And Pre-payments', 3, 1, 0, 1, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:40:51', 'admin', '2015-12-31 16:49:58'),
('1010201', 'Printer', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:47:15', '', '0000-00-00 00:00:00'),
('407', 'Product Purchase', 'Expence', 0, 1, 0, 0, 'E', 0, 0, '0.00', '2', '2020-01-23 07:09:10', '', '0000-00-00 00:00:00'),
('3020502', 'Professional Training Course(Oracal-1)', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, '0.00', 'nasim', '2017-06-22 13:28:05', '', '0000-00-00 00:00:00'),
('30207', 'Professional Training Course(Oracal)', 'Other Income', 2, 1, 0, 1, 'I', 0, 0, '0.00', 'nasim', '2017-06-22 13:24:16', 'nasim', '2017-06-22 13:25:56'),
('1010208', 'Projector', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:44', '', '0000-00-00 00:00:00'),
('40206', 'Promonational Expence', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-07-11 13:48:57', 'anwarul', '2013-07-17 14:23:03'),
('40214', 'Repair and Maintenance', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:32:46', '', '0000-00-00 00:00:00'),
('202', 'Reserve & Surplus', 'Equity', 1, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2016-09-25 14:06:34', 'admin', '2016-10-02 17:48:57'),
('20102', 'Retained Earnings', 'Share Holders Equity', 2, 1, 1, 1, 'L', 0, 0, '0.00', 'admin', '2016-05-23 11:20:40', 'admin', '2016-09-25 14:05:06'),
('4020708', 'River Cruse', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2017-04-24 15:35:25', '', '0000-00-00 00:00:00'),
('102010311', 'RMA PAYMENT GATEWAY', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:33:12', '', '0000-00-00 00:00:00'),
('102020105', 'Salary', 'Advance', 4, 1, 0, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:46:44', '', '0000-00-00 00:00:00'),
('40209', 'Salary & Allowances', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-12-12 11:22:58', '', '0000-00-00 00:00:00'),
('404', 'Sale Discount', 'Expence', 1, 1, 1, 0, 'E', 0, 0, '0.00', '2', '2018-07-19 10:15:11', '', '0000-00-00 00:00:00'),
('303', 'Sale Income', 'Income', 0, 1, 1, 1, 'I', 0, 0, '0.00', '2', '2020-01-23 06:58:20', '', '0000-00-00 00:00:00'),
('1010406', 'Security Equipment', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:41:30', '', '0000-00-00 00:00:00'),
('20101', 'Share Capital', 'Share Holders Equity', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'anwarul', '2013-12-08 19:37:32', 'admin', '2015-10-15 19:45:35'),
('201', 'Share Holders Equity', 'Equity', 1, 1, 0, 0, 'L', 0, 0, '0.00', '', '0000-00-00 00:00:00', 'admin', '2015-10-15 19:43:51'),
('50201', 'Short Term Borrowing', 'Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:50:30', '', '0000-00-00 00:00:00'),
('102010310', 'SIPS Office', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:32:54', '', '0000-00-00 00:00:00'),
('4020906', 'Special Allowances', 'Salary & Allowances', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:13:13', '', '0000-00-00 00:00:00'),
('50102', 'Sponsors Loan', 'Non Current Liabilities', 2, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:48:02', '', '0000-00-00 00:00:00'),
('4020706', 'Sports Expense', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'nasmud', '2016-11-09 13:16:53', '', '0000-00-00 00:00:00'),
('102010304', 'Square Payments', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:29:32', '', '0000-00-00 00:00:00'),
('102010302', 'SSLCommerz', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:28:06', '', '0000-00-00 00:00:00'),
('401', 'Store Expenses', 'Expence', 1, 1, 0, 0, 'E', 0, 0, '0.00', '2', '2018-07-07 13:38:59', 'admin', '2015-10-15 17:58:46'),
('301', 'Store Income', 'Income', 1, 1, 0, 0, 'I', 0, 0, '0.00', '2', '2018-07-07 13:40:37', 'admin', '2015-09-17 17:00:02'),
('102010305', 'Stripe Payment', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:29:59', '', '0000-00-00 00:00:00'),
('3020501', 'Students Info. Correction Fee', 'Others (Non-Academic Income)', 3, 1, 1, 0, 'I', 0, 0, '0.00', 'admin', '2015-10-15 17:24:45', '', '0000-00-00 00:00:00'),
('1010601', 'Sub Station', 'Electrical Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:44:11', '', '0000-00-00 00:00:00'),
('502020501', 'sup_002-Kamal Hossain', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, '0.00', '2', '2020-01-18 10:49:49', '', '0000-00-00 00:00:00'),
('502020504', 'sup_002-Supplier_1', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, '0.00', '2', '2020-09-08 14:26:40', '', '0000-00-00 00:00:00'),
('502020502', 'sup_003-Maruf', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, '0.00', '2', '2020-01-18 10:56:31', '', '0000-00-00 00:00:00'),
('502020503', 'sup_004-Saiful', 'Suppliers', 4, 1, 1, 0, 'L', 0, 0, '0.00', '2', '2020-01-18 10:57:04', '2', '2020-01-21 13:10:59'),
('5020205', 'Suppliers', 'Account Payable', 3, 1, 0, 1, 'L', 0, 0, '0.00', '2', '2018-12-15 06:50:12', '', '0000-00-00 00:00:00'),
('4020704', 'TB Care Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-10-08 13:03:04', '', '0000-00-00 00:00:00'),
('4020501', 'TDS on House Rent', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:44:07', 'admin', '2016-09-19 14:40:16'),
('502030201', 'TDS Payable House Rent', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-19 11:19:42', 'admin', '2016-09-28 13:19:37'),
('502030203', 'TDS Payable on Advertisement Bill', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-28 13:20:51', '', '0000-00-00 00:00:00'),
('502030202', 'TDS Payable on Salary', 'Income Tax Payable', 4, 1, 1, 0, 'L', 0, 0, '0.00', 'admin', '2016-09-28 13:20:17', '', '0000-00-00 00:00:00'),
('4021402', 'Tea Kettle', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:33:45', '', '0000-00-00 00:00:00'),
('4020402', 'Telephone Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:57:59', '', '0000-00-00 00:00:00'),
('1010209', 'Telephone Set & PABX', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:51:57', 'admin', '2016-10-02 17:10:40'),
('102020104', 'Test', 'Advance', 4, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2018-07-05 11:42:48', '', '0000-00-00 00:00:00'),
('40203', 'Travelling & Conveyance', 'Other Expenses', 2, 1, 1, 1, 'E', 0, 0, '0.00', 'admin', '2013-07-08 16:22:06', 'admin', '2015-10-15 18:45:13'),
('4021406', 'TV', 'Repair and Maintenance', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 19:35:07', '', '0000-00-00 00:00:00'),
('102010303', 'Two Checkout', 'Online Payment', 2, 1, 1, 0, 'A', 0, 0, '0.00', '2', '2020-10-18 14:28:29', '', '0000-00-00 00:00:00'),
('1010205', 'UPS', 'Office Equipment', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:50:38', '', '0000-00-00 00:00:00'),
('40204', 'Utility Expenses', 'Other Expenses', 2, 1, 0, 1, 'E', 0, 0, '0.00', 'anwarul', '2013-07-11 16:20:24', 'admin', '2016-01-02 15:55:22'),
('4020503', 'VAT on House Rent Exp', 'House Rent', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:49:22', 'admin', '2016-09-25 14:00:52'),
('5020301', 'VAT Payable', 'Liabilities for Expenses', 3, 1, 0, 1, 'L', 0, 0, '0.00', 'admin', '2015-10-15 19:51:11', 'admin', '2016-09-28 13:23:53'),
('1010409', 'Vehicle A/C', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'Zoherul', '2016-05-12 12:13:21', '', '0000-00-00 00:00:00'),
('1010405', 'Voltage Stablizer', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-03-27 10:40:59', '', '0000-00-00 00:00:00'),
('1010105', 'Waiting Sofa - Steel', 'Furniture & Fixturers', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2015-10-15 15:46:29', '', '0000-00-00 00:00:00'),
('4020405', 'WASA Bill', 'Utility Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2015-10-15 18:58:51', '', '0000-00-00 00:00:00'),
('1010402', 'Water Purifier', 'Others Assets', 3, 1, 1, 0, 'A', 0, 0, '0.00', 'admin', '2016-01-29 11:14:11', '', '0000-00-00 00:00:00'),
('4020705', 'Website Development Expenses', 'Miscellaneous Expenses', 3, 1, 1, 0, 'E', 0, 0, '0.00', 'admin', '2016-10-15 12:42:47', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_customer_income`
--

CREATE TABLE `acc_customer_income` (
  `ID` int(11) NOT NULL,
  `Customer_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_glsummarybalance`
--

CREATE TABLE `acc_glsummarybalance` (
  `ID` int(11) NOT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `FYear` int(11) DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_income_expence`
--

CREATE TABLE `acc_income_expence` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Student_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL,
  `Paymode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Perpose` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci NOT NULL,
  `StoreID` int(11) NOT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `IsApprove` tinyint(4) NOT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_temp`
--

CREATE TABLE `acc_temp` (
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Debit` decimal(18,2) NOT NULL,
  `Credit` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acc_transaction`
--

CREATE TABLE `acc_transaction` (
  `ID` int(11) NOT NULL,
  `VNo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VDate` date DEFAULT NULL,
  `COAID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Narration` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Debit` decimal(18,2) DEFAULT NULL,
  `Credit` decimal(18,2) DEFAULT NULL,
  `StoreID` int(11) NOT NULL,
  `IsPosted` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateBy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `IsAppove` char(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acn_account_transaction`
--

CREATE TABLE `acn_account_transaction` (
  `account_tran_id` int(11) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `transaction_description` varchar(255) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `tran_date` date NOT NULL,
  `payment_id` int(11) NOT NULL,
  `create_by_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `add_on_id` int(11) NOT NULL,
  `add_on_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`add_on_id`, `add_on_name`, `price`, `is_active`) VALUES
(1, 'souc', '5.00', 1),
(2, 'Butter', '10.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `award_id` int(11) NOT NULL,
  `award_name` varchar(50) NOT NULL,
  `aw_description` varchar(200) NOT NULL,
  `awr_gift_item` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `awarded_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_summary`
--

CREATE TABLE `bank_summary` (
  `bank_id` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deposite_id` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `ac_type` varchar(50) DEFAULT NULL,
  `dr` float DEFAULT NULL,
  `cr` float DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` bigint(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `total_amount` float NOT NULL,
  `discount` float NOT NULL,
  `service_charge` float NOT NULL,
  `shipping_type` int(11) DEFAULT NULL COMMENT '1=home,2=pickup,3=none',
  `delivarydate` datetime DEFAULT NULL,
  `VAT` float NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_date` date NOT NULL,
  `bill_time` time NOT NULL,
  `bill_status` tinyint(1) NOT NULL COMMENT '0=unpaid, 1=paid',
  `payment_method_id` tinyint(4) NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_card_payment`
--

CREATE TABLE `bill_card_payment` (
  `row_id` bigint(20) NOT NULL,
  `bill_id` bigint(20) NOT NULL,
  `multipay_id` int(11) DEFAULT NULL,
  `card_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `terminal_name` int(11) NOT NULL,
  `bank_name` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_basic_info`
--

CREATE TABLE `candidate_basic_info` (
  `can_id` varchar(20) NOT NULL,
  `first_name` varchar(11) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `alter_phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `present_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `parmanent_address` varchar(100) CHARACTER SET latin1 NOT NULL,
  `picture` text DEFAULT NULL,
  `ssn` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidate_basic_info`
--

INSERT INTO `candidate_basic_info` (`can_id`, `first_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `ssn`, `state`, `city`, `zip`) VALUES
('150073689333S', 'Rishab ', 'Pant', 'pant@bdtask.com', '987654323456', '976544564567', 'South Ferri Ghat,Padma River,Chandpur', 'South Ferri Ghat,Padma River,Chandpur', './application/modules/circularprocess/assets/images/2017-07-22/hum1.jpg', '', '', '', 0),
('150078881074S', 'Mr', 'Kabir', 'kabir@gmail.com', '01955110016', '01730164623', 'Mirpur', 'Shariatpur', './application/modules/circularprocess/assets/images/2017-09-14/145.jpg', '', '', '', 0),
('150080778404S', 'Tory', 'Burhan', 'tory@bdtask.com', '123456789078', '876543456789', 'South Ferri Ghat,Padma River,Chandpur', '231,East Patalipur,Sonamuri', './application/modules/circularprocess/assets/images/2017-09-09/chr.jpg', '', '', '', 0),
('15052929747581L', 'Jasim', 'Uddin', 'jassim@gmail.com', '01621815163', '14645541', 'Barishal', 'Dhanmonci', './application/modules/circularprocess/assets/images/2017-09-18/1458.jpg', '', '', '', 0),
('15386317585979L', 'Md', 'Sala uddin', 'salauddin@gmail.com', '03123165', '5465464', 'ijlkjo', '555', './application/modules/circularprocess/assets/images/2018-10-04/isa.png', '1212313', '', '', 0),
('154020580259L', 'sdfsd', 'fsdf', 'fsdf@gmail.com', '234234', '234234', 'fsdf', 'sdfsdf', './application/modules/circularprocess/assets/images/2018-10-22/log.jpg', '234234', '', '', 0),
('15402730915417L', 'A.', 'Zabbar', 'jabbar@gmail.com', '03216456', '21545', 'khilkhet,dhaka', '545', './application/modules/circularprocess/assets/images/2018-10-23/ava.png', '12645', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_education_info`
--

CREATE TABLE `candidate_education_info` (
  `can_edu_id` int(11) NOT NULL,
  `can_id` varchar(30) NOT NULL,
  `degree_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `university_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cgp` varchar(30) CHARACTER SET latin1 NOT NULL,
  `comments` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `sequencee` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_interview`
--

CREATE TABLE `candidate_interview` (
  `can_int_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `job_adv_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `interviewer_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `written_total_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mcq_total_marks` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_marks` varchar(30) NOT NULL,
  `recommandation` varchar(50) CHARACTER SET latin1 NOT NULL,
  `selection` varchar(50) CHARACTER SET latin1 NOT NULL,
  `details` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_selection`
--

CREATE TABLE `candidate_selection` (
  `can_sel_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `selection_terms` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_shortlist`
--

CREATE TABLE `candidate_shortlist` (
  `can_short_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `job_adv_id` int(11) NOT NULL,
  `date_of_shortlist` varchar(50) CHARACTER SET latin1 NOT NULL,
  `interview_date` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_workexperience`
--

CREATE TABLE `candidate_workexperience` (
  `can_workexp_id` int(11) NOT NULL,
  `can_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `company_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `duties` varchar(30) CHARACTER SET latin1 NOT NULL,
  `supervisor` varchar(50) CHARACTER SET latin1 NOT NULL,
  `sequencee` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `common_setting`
--

CREATE TABLE `common_setting` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `powerbytxt` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `common_setting`
--

INSERT INTO `common_setting` (`id`, `address`, `email`, `phone`, `logo`, `powerbytxt`) VALUES
(1, '98 Green Road, Farmgate, Dhaka-1215.', 'support@bdtask.com', '0123456789', 'assets/img/2020-01-06/b4.png', '© 2019 Hungry All Right Reserved. Developed by BDTASK.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currencyid` int(11) NOT NULL,
  `currencyname` varchar(50) NOT NULL,
  `curr_icon` varchar(50) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1 COMMENT '1=left.2=right',
  `curr_rate` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currencyid`, `currencyname`, `curr_icon`, `position`, `curr_rate`) VALUES
(1, 'BDT', '৳', 2, '83.00'),
(2, 'USD', '$', 1, '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `customer_id` int(11) NOT NULL,
  `cuntomer_no` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favorite_delivery_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`customer_id`, `cuntomer_no`, `customer_name`, `customer_email`, `password`, `customer_token`, `customer_address`, `customer_phone`, `customer_picture`, `favorite_delivery_address`, `is_active`) VALUES
(1, 'cusL-0001', 'Walkin', 'test@gmail.com', NULL, 'cO_Sa2fwscE:APA91bEFDD0sbV52pZPwJEl8MEUCcHBg2wIGjKfelfbiytAj4nJlPsKf8sSupfElBq-nm36DCkjYDEoUcA7qvtzKu4vDqjutF23f6Y_0uw4L_PlJIrtl61y4s-t5OKFAmdaU9OUQTtYS', 'dhaka', '8801717426371', NULL, 'ddd', 1),
(2, 'cusL-0002', 'Rahat Khan', '123589384948@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Not Set', '123589384948', NULL, 'Not Set', 1),
(3, 'cusL-0003', 'Jamil', 'jamil@gmail.com', NULL, NULL, 'Dhaka', '01684964913', NULL, 'Dhaka', 1),
(5, 'cusL-0004', 'test', 'a@a.com', '1bbd886460827015e5d605ed44252251', NULL, 'House 12 road 12', '01886585506', 'assets/img/user/2051847052_1608455974.png', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_membership_map`
--

CREATE TABLE `customer_membership_map` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `active_date` date NOT NULL,
  `active_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` bigint(20) NOT NULL,
  `saleinvoice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `marge_order_id` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `cutomertype` int(11) NOT NULL,
  `isthirdparty` int(11) NOT NULL DEFAULT 0 COMMENT '0=normal,1>all Third Party',
  `waiter_id` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `cookedtime` time NOT NULL DEFAULT '00:15:00',
  `table_no` int(11) DEFAULT NULL,
  `tokenno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customerpaid` decimal(10,2) DEFAULT 0.00,
  `customer_note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `anyreason` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL COMMENT '1=Pending, 2=Processing, 3=Ready, 4=Served,5=Cancel',
  `nofification` int(11) NOT NULL DEFAULT 0 COMMENT '0=unseen,1=seen',
  `orderacceptreject` int(11) DEFAULT NULL,
  `isupdate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `customer_type_id` int(11) NOT NULL,
  `customer_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`customer_type_id`, `customer_type`, `ordering`) VALUES
(1, 'Walk In Customer', 0),
(2, 'Online Customer', 0),
(3, 'Third Party', 0),
(4, 'Take Way', 0),
(99, 'QR Customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_table`
--

CREATE TABLE `custom_table` (
  `custom_id` int(11) NOT NULL,
  `custom_field` varchar(100) NOT NULL,
  `custom_data_type` int(11) NOT NULL,
  `custom_data` text NOT NULL,
  `employee_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_table`
--

INSERT INTO `custom_table` (`custom_id`, `custom_field`, `custom_data_type`, `custom_data`, `employee_id`) VALUES
(9, 'Teacher Name', 2, 'Abdul Halim', 'EF6MQRAX'),
(12, 'Primary School', 1, 'Test Primary School', 'E4ZNFBIC'),
(13, 'High School Name', 2, 'Taker Hat High school', 'E4ZNFBIC'),
(14, 'Versity Name', 3, 'Nu', 'E4ZNFBIC'),
(15, 'Company Name', 1, 'Bdtask', 'ER6RJAY8'),
(16, 'House Name', 3, 'Shikder Bari', 'ER6RJAY8'),
(17, 'Person name', 2, 'Tuhin', 'ER6RJAY8'),
(21, 'customfield1', 1, 'custom value1', 'E0LHJ447'),
(22, 'dsfsdf', 1, 'sdfdsf', 'E0LHJ447'),
(23, 'dsfsd', 1, 'fdsfsdf', 'E0LHJ447'),
(24, '', 1, '', 'E0LHJ447'),
(25, '', 1, '', 'E0LHJ447'),
(34, 'isahadf', 1, '23424', 'ELPGMMRL'),
(35, 'dfsdf', 1, 'dfgdfg', 'ELPGMMRL'),
(36, 'hhh', 1, 'sdfsdf', 'ELPGMMRL'),
(37, 'fdfgdfg', 1, 'dfg', 'ELPGMMRL'),
(38, 'dfgdfg', 1, '', 'ELPGMMRL'),
(39, 'First isahaq', 1, 'sdfsdf', 'E4K0I0DA'),
(40, 'sdfsadf', 1, 'sdfsdf', 'EYOBEEFQ'),
(41, 'fsdfsadf', 1, '234234324', 'EHBEEFQQ'),
(43, 'My Mother', 1, 'Ma', 'E4Y9T7CJ'),
(44, 'rrrr', 2, '07-08-2018', 'E78PIKVA'),
(52, 'Chinese Cuisine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EU3APTYY'),
(54, 'French Suicine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EXL9WSCL'),
(55, 'Chinese Cuisine', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'E3Y1WJMB'),
(56, 'Kitchen Lead', 1, 'coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides ', 'EBK2UPRA');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `department_name`, `parent_id`) VALUES
(8, 'ACCOUNTING', 0),
(9, 'Human Resource', 0),
(10, 'Delivery department', 0),
(11, 'Garage and Parking', 0),
(12, 'Manager', 0),
(13, 'Restaurant', 0),
(14, 'Waiter', 13),
(15, 'Senior Accountant', 8),
(16, 'Kitchen Manager', 12),
(17, 'Chef', 13);

-- --------------------------------------------------------

--
-- Table structure for table `duty_type`
--

CREATE TABLE `duty_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duty_type`
--

INSERT INTO `duty_type` (`id`, `type_name`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Contructual'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE `email_config` (
  `email_config_id` int(11) NOT NULL,
  `smtp_host` varchar(200) DEFAULT NULL,
  `smtp_port` varchar(200) DEFAULT NULL,
  `smtp_password` varchar(200) DEFAULT NULL,
  `protocol` text NOT NULL,
  `mailpath` text NOT NULL,
  `mailtype` text NOT NULL,
  `sender` text NOT NULL,
  `api_key` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`email_config_id`, `smtp_host`, `smtp_port`, `smtp_password`, `protocol`, `mailpath`, `mailtype`, `sender`, `api_key`, `status`) VALUES
(1, 'ssl://smtp.googlemail.com', '465', '123456789', 'smtp', '/usr/sbin/sendmail', 'html', 'ainalcse@gmail.com', '22c4c92a-e5a8-4293-b64c-befc9248521e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_benifit`
--

CREATE TABLE `employee_benifit` (
  `id` int(11) NOT NULL,
  `bnf_cl_code` varchar(100) NOT NULL,
  `bnf_cl_code_des` varchar(250) NOT NULL,
  `bnff_acural_date` date NOT NULL,
  `bnf_status` tinyint(4) NOT NULL,
  `employee_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `emp_his_id` int(11) NOT NULL,
  `employee_id` varchar(30) NOT NULL,
  `pos_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `alter_phone` varchar(30) DEFAULT NULL,
  `present_address` varchar(100) DEFAULT NULL,
  `parmanent_address` varchar(100) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `degree_name` varchar(30) DEFAULT NULL,
  `university_name` varchar(50) DEFAULT NULL,
  `cgp` varchar(30) DEFAULT NULL,
  `passing_year` varchar(30) DEFAULT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `working_period` varchar(30) DEFAULT NULL,
  `duties` varchar(30) DEFAULT NULL,
  `supervisor` varchar(30) DEFAULT NULL,
  `signature` text DEFAULT NULL,
  `is_admin` int(2) NOT NULL DEFAULT 0,
  `dept_id` int(11) DEFAULT NULL,
  `division_id` int(11) NOT NULL,
  `maiden_name` varchar(50) DEFAULT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `citizenship` int(11) NOT NULL,
  `duty_type` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `original_hire_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_reason` text NOT NULL,
  `voluntary_termination` int(11) NOT NULL,
  `rehire_date` date NOT NULL,
  `rate_type` int(11) NOT NULL,
  `rate` float NOT NULL,
  `pay_frequency` int(11) NOT NULL,
  `pay_frequency_txt` varchar(50) NOT NULL,
  `hourly_rate2` float NOT NULL,
  `hourly_rate3` float NOT NULL,
  `home_department` varchar(100) NOT NULL,
  `department_text` varchar(100) NOT NULL,
  `class_code` varchar(50) DEFAULT NULL,
  `class_code_desc` varchar(100) DEFAULT NULL,
  `class_acc_date` date DEFAULT NULL,
  `class_status` tinyint(4) DEFAULT NULL,
  `is_super_visor` int(11) DEFAULT NULL,
  `super_visor_id` varchar(30) NOT NULL,
  `supervisor_report` text NOT NULL,
  `dob` date NOT NULL,
  `gender` int(11) NOT NULL,
  `country` varchar(120) DEFAULT NULL,
  `marital_status` int(11) NOT NULL,
  `ethnic_group` varchar(100) NOT NULL,
  `eeo_class_gp` varchar(100) NOT NULL,
  `ssn` varchar(50) DEFAULT NULL,
  `work_in_state` int(11) NOT NULL,
  `live_in_state` int(11) NOT NULL,
  `home_email` varchar(50) NOT NULL,
  `business_email` varchar(50) NOT NULL,
  `home_phone` varchar(30) NOT NULL,
  `business_phone` varchar(30) NOT NULL,
  `cell_phone` varchar(30) NOT NULL,
  `emerg_contct` varchar(30) NOT NULL,
  `emrg_h_phone` varchar(30) NOT NULL,
  `emrg_w_phone` varchar(30) NOT NULL,
  `emgr_contct_relation` varchar(50) NOT NULL,
  `alt_em_contct` varchar(30) NOT NULL,
  `alt_emg_h_phone` varchar(30) NOT NULL,
  `alt_emg_w_phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_history`
--

INSERT INTO `employee_history` (`emp_his_id`, `employee_id`, `pos_id`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `alter_phone`, `present_address`, `parmanent_address`, `picture`, `degree_name`, `university_name`, `cgp`, `passing_year`, `company_name`, `working_period`, `duties`, `supervisor`, `signature`, `is_admin`, `dept_id`, `division_id`, `maiden_name`, `state`, `city`, `zip`, `citizenship`, `duty_type`, `hire_date`, `original_hire_date`, `termination_date`, `termination_reason`, `voluntary_termination`, `rehire_date`, `rate_type`, `rate`, `pay_frequency`, `pay_frequency_txt`, `hourly_rate2`, `hourly_rate3`, `home_department`, `department_text`, `class_code`, `class_code_desc`, `class_acc_date`, `class_status`, `is_super_visor`, `super_visor_id`, `supervisor_report`, `dob`, `gender`, `country`, `marital_status`, `ethnic_group`, `eeo_class_gp`, `ssn`, `work_in_state`, `live_in_state`, `home_email`, `business_email`, `home_phone`, `business_phone`, `cell_phone`, `emerg_contct`, `emrg_h_phone`, `emrg_w_phone`, `emgr_contct_relation`, `alt_em_contct`, `alt_emg_h_phone`, `alt_emg_w_phone`) VALUES
(162, 'EY2T1OWA', '4', 'jahangir', NULL, 'Ahmad', 'jahangir@gmail.com', '0195511016', NULL, NULL, NULL, './application/modules/employee/assets/images/2018-09-20/pra.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 15, 3, NULL, 'New York', 'New', 234234, 0, 1, '2018-09-19', '2018-09-19', '2018-09-19', 'sdfasdf', 2, '2018-09-26', 1, 323, 2, '234', 324234, 2523, '234', '234532', '', '', '1970-01-01', 1, NULL, '0', 'dfasdfsdf', '2018-09-19', 1, 'Bangladesh', 2, 'sunni', '234324', '23423', 1, 1, 'u@gmail.com', 'b@gmail.com', 'dsfsdf', 'dsfdsf', 'sdfsdf', '42342323', '234234', '234234', '2343', '234', '324234', '324324'),
(165, '145454', '6', 'Hm', NULL, 'Isahaq', 'hmisahaq@gmail.com', '2344098234', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 6, NULL, 'Alabama', 'deom', 3243, 0, 1, '2018-09-20', '2018-09-20', '2018-09-29', 'fsdf', 1, '2018-09-29', 1, 234, 3, '234', 0, 0, '', '', '', '', '1970-01-01', 1, NULL, '0', '324', '2018-09-29', 1, 'Bangladesh', 1, 'sdfsdf', '', '23423', 1, 1, '234', 'sd', '82309423', '', '234', '324234', '34242', '546456', '', '', '', ''),
(166, 'EQLAJFUW', '6', 'Ainal', '', 'Haque', 'ainal@gmail.com', '01715234991', NULL, NULL, NULL, './application/modules/hrm/assets/images/2019-01-22/u.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 0, NULL, 'Alabama', '', 0, 1, 1, '2018-11-12', '2018-11-12', '2018-11-12', '', 1, '2018-11-12', 1, 100, 1, '', 0, 0, '', '', '', '', '2018-11-12', 1, NULL, '0', '', '2018-11-12', 1, 'Bangladesh', 1, '', '', '3425', 1, 1, '', '', '017123657332', '', '017123657332', '017123657332', '017123657332', '017123657332', '', '', '', ''),
(168, 'E97E9SJT', '6', 'Manik ', '', 'Hassan', 'manik@gmail.com', '01913251229', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 14, 0, NULL, 'Alabama', 'Dhaka', 143325, 1, 1, '2019-01-01', '2019-01-01', '2021-01-31', 'sdfs', 1, '2022-01-09', 1, 100, 1, '', 0, 0, '', '', '', '', '2019-01-09', 1, NULL, '0', '', '1970-01-01', 1, 'Bangladesh', 1, '', '', 'e4dfg', 1, 1, '', '', '34353636', '', '3636', '345345', '3453', '3453', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `employee_performance`
--

CREATE TABLE `employee_performance` (
  `emp_per_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `note` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `note_by` varchar(50) CHARACTER SET latin1 NOT NULL,
  `number_of_star` varchar(50) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_payment`
--

CREATE TABLE `employee_salary_payment` (
  `emp_sal_pay_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_salary` varchar(50) CHARACTER SET latin1 NOT NULL,
  `total_working_minutes` varchar(50) CHARACTER SET latin1 NOT NULL,
  `working_period` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_due` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payment_date` varchar(50) CHARACTER SET latin1 NOT NULL,
  `paid_by` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_setup`
--

CREATE TABLE `employee_salary_setup` (
  `e_s_s_id` int(11) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sal_type` varchar(30) NOT NULL,
  `salary_type_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `create_date` date DEFAULT NULL,
  `update_date` datetime(6) DEFAULT NULL,
  `update_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gross_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee_sal_pay_type`
--

CREATE TABLE `employee_sal_pay_type` (
  `emp_sal_pay_type_id` int(11) UNSIGNED NOT NULL,
  `payment_period` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `att_id` int(10) UNSIGNED NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sign_in` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `sign_out` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `staytime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `voucher_no` varchar(50) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_item`
--

CREATE TABLE `expense_item` (
  `id` int(11) NOT NULL,
  `expense_item_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `foodvariable`
--

CREATE TABLE `foodvariable` (
  `availableID` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `availtime` varchar(50) NOT NULL,
  `availday` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `grand_loan`
--

CREATE TABLE `grand_loan` (
  `loan_id` int(11) NOT NULL,
  `employee_id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `permission_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `loan_details` varchar(30) CHARACTER SET latin1 NOT NULL,
  `amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `interest_rate` varchar(30) CHARACTER SET latin1 NOT NULL,
  `installment` varchar(30) CHARACTER SET latin1 NOT NULL,
  `installment_period` varchar(30) CHARACTER SET latin1 NOT NULL,
  `repayment_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date_of_approve` varchar(30) CHARACTER SET latin1 NOT NULL,
  `repayment_start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `loan_status` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ingredient_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uom_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ingredient_name`, `uom_id`, `is_active`) VALUES
(2, 'Oil', 2, 1),
(3, 'Onion', 1, 1),
(4, 'Ginger', 1, 1),
(5, 'Beef Meat', 1, 1),
(6, 'Mutton', 1, 1),
(7, 'Sugar', 1, 1),
(8, 'Egg', 7, 1),
(9, 'ground beef', 9, 1),
(10, 'Worcestershire', 10, 1),
(11, 'salt', 1, 1),
(12, 'hamburger buns', 7, 1),
(13, 'mayonnaise', 3, 1),
(14, 'tomato', 1, 1),
(15, 'Wheat', 1, 1),
(16, 'Corn Meal', 1, 1),
(17, 'soy oil', 2, 1),
(18, 'yeast', 5, 1),
(19, 'Soybean oil', 2, 1),
(20, 'Sodium caseinate', 5, 1),
(21, 'Pork and beef', 1, 1),
(22, '7 UP', 2, 1),
(23, 'COCA COLA', 2, 1),
(24, 'Fizz UP', 2, 1),
(25, 'Red Bull', 2, 1),
(26, 'Pepsi', 2, 1),
(27, 'Rice', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `CategoryImage` varchar(255) DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `CategoryIsActive` int(11) DEFAULT NULL,
  `offerstartdate` date DEFAULT '0000-00-00',
  `offerendate` date NOT NULL DEFAULT '0000-00-00',
  `isoffer` int(11) DEFAULT 0,
  `parentid` int(11) DEFAULT 0,
  `UserIDInserted` int(11) NOT NULL DEFAULT 0,
  `UserIDUpdated` int(11) NOT NULL DEFAULT 0,
  `UserIDLocked` int(11) NOT NULL DEFAULT 0,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `item_foods`
--

CREATE TABLE `item_foods` (
  `ProductsID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(200) DEFAULT NULL,
  `bigthumb` varchar(255) NOT NULL,
  `medium_thumb` varchar(255) NOT NULL,
  `small_thumb` varchar(255) NOT NULL,
  `component` text DEFAULT NULL,
  `descrip` text DEFAULT NULL,
  `itemnotes` varchar(255) DEFAULT NULL,
  `productvat` int(11) DEFAULT 0,
  `special` int(11) NOT NULL DEFAULT 0,
  `OffersRate` int(11) NOT NULL DEFAULT 0 COMMENT '1=offer rate',
  `offerIsavailable` int(11) NOT NULL DEFAULT 0 COMMENT '1=offer available,0=No Offer',
  `offerstartdate` date DEFAULT '0000-00-00',
  `offerendate` date DEFAULT '0000-00-00',
  `Position` int(11) DEFAULT NULL,
  `kitchenid` int(11) NOT NULL,
  `cookedtime` time NOT NULL DEFAULT '00:00:00',
  `ProductsIsActive` int(11) DEFAULT NULL,
  `UserIDInserted` int(11) NOT NULL DEFAULT 0,
  `UserIDUpdated` int(11) NOT NULL DEFAULT 0,
  `UserIDLocked` int(11) NOT NULL DEFAULT 0,
  `DateInserted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateUpdated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DateLocked` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_advertisement`
--

CREATE TABLE `job_advertisement` (
  `job_adv_id` int(10) UNSIGNED NOT NULL,
  `pos_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adv_circular_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `circular_dadeline` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adv_file` tinytext CHARACTER SET latin1 NOT NULL,
  `adv_details` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `phrase` varchar(100) NOT NULL,
  `english` varchar(255) NOT NULL,
  `spanish` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `spanish`) VALUES
(2, 'login', 'Login', 'fghgf'),
(3, 'email', 'Email Address', NULL),
(4, 'password', 'Password', NULL),
(5, 'reset', 'Reset', NULL),
(6, 'dashboard', 'Dashboard', NULL),
(7, 'home', 'Home', NULL),
(8, 'profile', 'Profile', NULL),
(9, 'profile_setting', 'Profile Setting', NULL),
(10, 'firstname', 'First Name', NULL),
(11, 'lastname', 'Last Name', NULL),
(12, 'about', 'About', ''),
(13, 'preview', 'Preview', NULL),
(14, 'image', 'Image', NULL),
(15, 'save', 'Save', NULL),
(16, 'upload_successfully', 'Upload Successfully!', NULL),
(17, 'user_added_successfully', 'User Added Successfully!', NULL),
(18, 'please_try_again', 'Please Try Again...', NULL),
(19, 'inbox_message', 'Inbox Messages', NULL),
(20, 'sent_message', 'Sent Message', NULL),
(21, 'message_details', 'Message Details', NULL),
(22, 'new_message', 'New Message', NULL),
(23, 'receiver_name', 'Receiver Name', NULL),
(24, 'sender_name', 'Sender Name', NULL),
(25, 'subject', 'Subject', NULL),
(26, 'message', 'Message', NULL),
(27, 'message_sent', 'Message Sent!', NULL),
(28, 'ip_address', 'IP Address', NULL),
(29, 'last_login', 'Last Login', NULL),
(30, 'last_logout', 'Last Logout', NULL),
(31, 'status', 'Status', NULL),
(32, 'delete_successfully', 'Delete Successfully!', NULL),
(33, 'send', 'Send', NULL),
(34, 'date', 'Date', NULL),
(35, 'action', 'Action', ''),
(36, 'sl_no', 'SL No.', NULL),
(37, 'are_you_sure', 'Are You Sure ? ', NULL),
(38, 'application_setting', 'Application Setting', NULL),
(39, 'application_title', 'Application Title', NULL),
(40, 'address', 'Address', ''),
(41, 'phone', 'Phone', NULL),
(42, 'favicon', 'Favicon', NULL),
(43, 'logo', 'Logo', NULL),
(44, 'language', 'Language', NULL),
(45, 'left_to_right', 'Left To Right', NULL),
(46, 'right_to_left', 'Right To Left', NULL),
(47, 'footer_text', 'Footer Text', NULL),
(48, 'site_align', 'Application Alignment', NULL),
(49, 'welcome_back', 'Welcome Back!', NULL),
(50, 'please_contact_with_admin', 'Please Contact With Admin', NULL),
(51, 'incorrect_email_or_password', 'Incorrect Email/Password', NULL),
(52, 'select_option', 'Select Option', NULL),
(53, 'ftp_setting', 'Data Synchronize [FTP Setting]', NULL),
(54, 'hostname', 'Host Name', NULL),
(55, 'username', 'User Name', NULL),
(56, 'ftp_port', 'FTP Port', NULL),
(57, 'ftp_debug', 'FTP Debug', NULL),
(58, 'project_root', 'Project Root', NULL),
(59, 'update_successfully', 'Update Successfully', NULL),
(60, 'save_successfully', 'Save Successfully!', NULL),
(61, 'delete_successfully', 'Delete Successfully!', NULL),
(62, 'internet_connection', 'Internet Connection', NULL),
(63, 'ok', 'Ok', NULL),
(64, 'not_available', 'Not Available', NULL),
(65, 'available', 'Available', NULL),
(66, 'outgoing_file', 'Outgoing File', NULL),
(67, 'incoming_file', 'Incoming File', NULL),
(68, 'data_synchronize', 'Data Synchronize', NULL),
(69, 'unable_to_upload_file_please_check_configuration', 'Unable to upload file! please check configuration', NULL),
(70, 'please_configure_synchronizer_settings', 'Please configure synchronizer settings', NULL),
(71, 'download_successfully', 'Download Successfully', NULL),
(72, 'unable_to_download_file_please_check_configuration', 'Unable to download file! please check configuration', NULL),
(73, 'data_import_first', 'Data Import First', NULL),
(74, 'data_import_successfully', 'Data Import Successfully!', NULL),
(75, 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data! please check configuration / SQL file.', NULL),
(76, 'download_data_from_server', 'Download Data from Server', NULL),
(77, 'data_import_to_database', 'Data Import To Database', NULL),
(79, 'data_upload_to_server', 'Data Upload to Server', NULL),
(80, 'please_wait', 'Please Wait...', NULL),
(81, 'ooops_something_went_wrong', ' Ooops something went wrong...', NULL),
(82, 'module_permission_list', 'Module Permission List', NULL),
(83, 'user_permission', 'User Permission', NULL),
(84, 'add_module_permission', 'Add Module Permission', NULL),
(85, 'module_permission_added_successfully', 'Module Permission Added Successfully!', NULL),
(86, 'update_module_permission', 'Update Module Permission', NULL),
(87, 'download', 'Download', NULL),
(88, 'module_name', 'Module Name', NULL),
(89, 'create', 'Create', NULL),
(90, 'read', 'Read', NULL),
(91, 'update', 'Update', NULL),
(92, 'delete', 'Delete', NULL),
(93, 'module_list', 'Module List', NULL),
(94, 'add_module', 'Add Module', NULL),
(95, 'directory', 'Module Direcotory', NULL),
(96, 'description', 'Description', NULL),
(97, 'image_upload_successfully', 'Image Upload Successfully!', NULL),
(98, 'module_added_successfully', 'Module Added Successfully', NULL),
(99, 'inactive', 'Inactive', NULL),
(100, 'active', 'Active', ''),
(101, 'user_list', 'User List', NULL),
(102, 'see_all_message', 'See All Messages', NULL),
(103, 'setting', 'Setting', NULL),
(104, 'logout', 'Logout', NULL),
(105, 'admin', 'Admin', NULL),
(106, 'add_user', 'Add User', NULL),
(107, 'user', 'User', NULL),
(108, 'module', 'Module', NULL),
(109, 'new', 'New', NULL),
(110, 'inbox', 'Inbox', NULL),
(111, 'sent', 'Sent', NULL),
(112, 'synchronize', 'Synchronize', NULL),
(113, 'data_synchronizer', 'Data Synchronizer', NULL),
(114, 'module_permission', 'Module Permission', NULL),
(115, 'backup_now', 'Backup Now!', NULL),
(116, 'restore_now', 'Restore Now!', NULL),
(117, 'backup_and_restore', 'Backup and Restore', NULL),
(118, 'captcha', 'Captcha Word', NULL),
(119, 'database_backup', 'Database Backup', NULL),
(120, 'restore_successfully', 'Restore Successfully', NULL),
(121, 'backup_successfully', 'Backup Successfully', NULL),
(122, 'filename', 'File Name', NULL),
(123, 'file_information', 'File Information', NULL),
(124, 'size', 'size', NULL),
(125, 'backup_date', 'Backup Date', NULL),
(126, 'overwrite', 'Overwrite', NULL),
(127, 'invalid_file', 'Invalid File!', NULL),
(128, 'invalid_module', 'Invalid Module', NULL),
(129, 'remove_successfully', 'Remove Successfully!', NULL),
(130, 'install', 'Install', NULL),
(131, 'uninstall', 'Uninstall', NULL),
(132, 'tables_are_not_available_in_database', 'Tables are not available in database.sql', NULL),
(133, 'no_tables_are_registered_in_config', 'No tables are registerd in config.php', NULL),
(134, 'enquiry', 'Enquiry', NULL),
(135, 'read_unread', 'Read/Unread', NULL),
(136, 'enquiry_information', 'Enquiry Information', NULL),
(137, 'user_agent', 'User Agent', NULL),
(138, 'checked_by', 'Checked By', NULL),
(139, 'new_enquiry', 'New Enquiry', NULL),
(140, 'crud', 'Crud', NULL),
(141, 'view', 'View', NULL),
(142, 'name', 'Name', NULL),
(143, 'add', 'Address', ''),
(144, 'ph', 'Phone', NULL),
(145, 'cid', 'SL No', NULL),
(146, 'view_atn', 'AttendanceView', NULL),
(147, 'mang', 'Employemanagement', NULL),
(148, 'designation', 'Designation', NULL),
(149, 'test', 'Test', NULL),
(150, 'sl', 'SL', NULL),
(151, 'bdtask', 'BDTASK', NULL),
(152, 'practice', 'Practice', NULL),
(153, 'branch_name', 'Branch Name', NULL),
(154, 'chairman_name', 'Chairman', NULL),
(155, 'b_photo', 'Photo', NULL),
(156, 'b_address', 'Address', NULL),
(157, 'position', 'Designation', NULL),
(158, 'advertisement', 'Advertisement', NULL),
(159, 'position_name', 'Position', NULL),
(160, 'position_details', 'Details', NULL),
(161, 'circularprocess', 'Recruitment', NULL),
(162, 'pos_id', 'Position', NULL),
(163, 'adv_circular_date', 'Publish Date', NULL),
(164, 'circular_dadeline', 'Dadeline', NULL),
(165, 'adv_file', 'Documents', NULL),
(166, 'adv_details', 'Details', NULL),
(167, 'attendance', 'Attendance', NULL),
(168, 'employee', 'Employee', NULL),
(169, 'emp_id', 'Employee Name', NULL),
(170, 'sign_in', 'Sign In', NULL),
(171, 'sign_out', 'Sign Out', NULL),
(172, 'staytime', 'Stay Time', NULL),
(173, 'abc', '1', 'Abc'),
(174, 'first_name', 'First Name', NULL),
(175, 'last_name', 'Last Name', NULL),
(176, 'alter_phone', 'Alternative Phone', NULL),
(177, 'present_address', 'Present Address', NULL),
(178, 'parmanent_address', 'Permanent Address', NULL),
(179, 'candidateinfo', 'Candidate Info', NULL),
(180, 'add_advertisement', 'Add Advertisement', NULL),
(181, 'advertisement_list', 'Manage Advertisement ', NULL),
(182, 'candidate_basic_info', 'Candidate Information', NULL),
(183, 'can_basicinfo_list', 'Manage Candidate', NULL),
(184, 'add_canbasic_info', 'Add New Candidate', NULL),
(185, 'candidate_education_info', 'Candidate Educational Info', NULL),
(186, 'can_educationinfo_list', 'Candidate Edu Info list', NULL),
(187, 'add_edu_info', 'Add Educational Info', NULL),
(188, 'can_id', 'Candidate Id', NULL),
(189, 'degree_name', 'Obtained Degree', NULL),
(190, 'university_name', 'University', NULL),
(191, 'cgp', 'CGPA', NULL),
(192, 'comments', 'Comments', NULL),
(193, 'signature', 'Signature', NULL),
(194, 'candidate_workexperience', 'Candidate Work Experience', NULL),
(195, 'can_workexperience_list', 'Work Experience list', NULL),
(196, 'add_can_experience', 'Add Work Experience', NULL),
(197, 'company_name', 'Company Name', NULL),
(198, 'working_period', 'Working Period', NULL),
(199, 'duties', 'Duties', NULL),
(200, 'supervisor', 'Supervisor', NULL),
(201, 'candidate_workexpe', 'Candidate Work Experience', NULL),
(202, 'candidate_shortlist', 'Candidate Shortlist', NULL),
(203, 'shortlist_view', 'Manage Shortlist', NULL),
(204, 'add_shortlist', 'Add Shortlist', NULL),
(205, 'date_of_shortlist', 'Shortlist Date', NULL),
(206, 'interview_date', 'Interview Date', NULL),
(207, 'submit', 'Submit', NULL),
(208, 'candidate_id', 'Your ID', NULL),
(209, 'job_adv_id', 'Job Position', NULL),
(210, 'sequence', 'Sequence', NULL),
(211, 'candidate_interview', 'Interview', NULL),
(212, 'interview_list', 'Interview list', NULL),
(213, 'add_interview', 'Add interview', NULL),
(214, 'interviewer_id', 'Interviewer', NULL),
(215, 'interview_marks', 'Viva Marks', NULL),
(216, 'written_total_marks', 'Written Total Marks', NULL),
(217, 'mcq_total_marks', 'MCQ Total Marks', NULL),
(218, 'recommandation', 'Recommandation', NULL),
(219, 'selection', 'Selection', NULL),
(220, 'details', 'Details', NULL),
(221, 'candidate_selection', 'Candidate Selection', NULL),
(222, 'selection_list', 'Selection List', NULL),
(223, 'add_selection', 'Add Selection', NULL),
(224, 'employee_id', 'Employee Id', NULL),
(225, 'position_id', '1', NULL),
(226, 'selection_terms', 'Selection Terms', NULL),
(227, 'total_marks', 'Total Marks', NULL),
(228, 'photo', 'Picture', NULL),
(229, 'your_id', 'Your ID', NULL),
(230, 'change_image', 'Change Photo', NULL),
(231, 'picture', 'Photograph', NULL),
(232, 'ad', 'Add', ''),
(233, 'write_y_p_info', 'Write Your Persoanal Information', NULL),
(234, 'emp_position', 'Employee Position', NULL),
(235, 'add_pos', 'Add Position', NULL),
(236, 'list_pos', 'List of Position', NULL),
(237, 'emp_salary_stup', 'Employee Salary SetUp', NULL),
(238, 'add_salary_stup', 'Add Salary Setup', NULL),
(239, 'list_salarystup', 'List of Salary Setup', NULL),
(240, 'emp_sal_name', 'Salary Name', NULL),
(241, 'emp_sal_type', 'Salary Type', NULL),
(242, 'emp_performance', 'Employee Performance', NULL),
(243, 'add_performance', 'Add Performance', NULL),
(244, 'list_performance', 'List of Performance', NULL),
(245, 'note', 'Note', NULL),
(246, 'note_by', 'Note By', NULL),
(247, 'number_of_star', 'Number of Star', NULL),
(248, 'updated_by', 'Updated By', NULL),
(249, 'emp_sal_payment', 'Manage Employee Salary', NULL),
(250, 'add_payment', 'Add Payment', NULL),
(251, 'list_payment', 'List of payment', NULL),
(252, 'total_salary', 'Total Salary', NULL),
(253, 'total_working_minutes', 'Working Hour', NULL),
(254, 'payment_due', 'Payment Type', NULL),
(255, 'payment_date', 'Date', NULL),
(256, 'paid_by', 'Paid By', NULL),
(257, 'view_employee_payment', 'Employee Payment List', NULL),
(258, 'sal_payment_type', 'Salary Payment Type', NULL),
(259, 'add_payment_type', 'Add Payment Type', NULL),
(260, 'list_payment_type', 'List of Payment Type', NULL),
(261, 'payment_period', 'Payment Period', NULL),
(262, 'payment_type', 'Payment Type', NULL),
(263, 'time', 'Punch Time', NULL),
(264, 'shift', 'Shift', NULL),
(265, 'location', 'Location', NULL),
(266, 'logtype', 'Log Type', NULL),
(267, 'branch', 'Location', NULL),
(268, 'student', 'Students', NULL),
(269, 'csv', 'CSV', NULL),
(270, 'save_successfull', 'Your Data Save Successfully', NULL),
(271, 'successfully_updated', 'Your Data Successfully Updated', NULL),
(272, 'atn_form', 'Attendance Form', NULL),
(273, 'atn_report', 'Attendance Reports', NULL),
(274, 'end_date', 'To', NULL),
(275, 'start_date', 'From', NULL),
(276, 'done', 'Done', NULL),
(277, 'employee_id_se', 'Write Employee Id or name here ', NULL),
(278, 'attendance_repor', 'Attendance Report', NULL),
(279, 'e_time', 'End Time', NULL),
(280, 's_time', 'Start Time', NULL),
(281, 'atn_datewiserer', 'Date Wise Report', NULL),
(282, 'atn_report_id', 'Date And Id base Report', NULL),
(283, 'atn_report_time', 'Date And Time report', NULL),
(284, 'payroll', 'Payroll', NULL),
(285, 'loan', 'Loan', NULL),
(286, 'loan_grand', 'Grant Loan', NULL),
(287, 'add_loan', 'Add Loan', NULL),
(288, 'loan_list', 'List of Loan', NULL),
(289, 'loan_details', 'Loan Details', NULL),
(290, 'amount', 'Amount', NULL),
(291, 'interest_rate', 'Interest Percentage', NULL),
(292, 'installment_period', 'Installment Period', NULL),
(293, 'repayment_amount', 'Repayment Total', NULL),
(294, 'date_of_approve', 'Approve Date', NULL),
(295, 'repayment_start_date', 'Repayment From', NULL),
(296, 'permission_by', 'Permitted By', NULL),
(297, 'grand', 'Grand', NULL),
(298, 'installment', 'Installment', NULL),
(299, 'loan_status', 'status', NULL),
(300, 'installment_period_m', 'Installment Period in Month', NULL),
(301, 'successfully_inserted', 'Your loan Successfully Granted', NULL),
(302, 'loan_installment', 'Loan Installment', NULL),
(303, 'add_installment', 'Add Installment', NULL),
(304, 'installment_list', 'List of Installment', NULL),
(305, 'loan_id', 'Loan No', NULL),
(306, 'installment_amount', 'Installment Amount', NULL),
(307, 'payment', 'Payment', NULL),
(308, 'received_by', 'Receiver', NULL),
(309, 'installment_no', 'Install No', NULL),
(310, 'notes', 'Notes', NULL),
(311, 'paid', 'Paid', NULL),
(312, 'loan_report', 'Loan Report', NULL),
(313, 'e_r_id', 'Enter Your Employee ID', NULL),
(314, 'leave', 'Leave', NULL),
(315, 'add_leave', 'Add Leave', NULL),
(316, 'list_leave', 'List of Leave', NULL),
(317, 'dayname', 'Weekly Leave Day', NULL),
(318, 'holiday', 'Holiday', NULL),
(319, 'list_holiday', 'List of Holidays', NULL),
(320, 'no_of_days', 'Number of Days', NULL),
(321, 'holiday_name', 'Holiday Name', NULL),
(322, 'set', 'SET', NULL),
(323, 'tax', 'Tax', NULL),
(324, 'tax_setup', 'Tax Setup', NULL),
(325, 'add_tax_setup', 'Add Tax Setup', NULL),
(326, 'list_tax_setup', 'List of Tax setup', NULL),
(327, 'tax_collection', 'Tax collection', NULL),
(328, 'start_amount', 'Start Amount', NULL),
(329, 'end_amount', 'End Amount', NULL),
(330, 'rate', 'Tax Rate', NULL),
(331, 'date_start', 'Date Start', NULL),
(332, 'amount_tax', 'Tax Amount', NULL),
(333, 'collection_by', 'Collection By', NULL),
(334, 'date_end', 'Date End', NULL),
(335, 'income_net_period', 'Income  Net period', NULL),
(336, 'default_amount', 'Default Amount', NULL),
(337, 'add_sal_type', 'Add Salary Type', NULL),
(338, 'list_sal_type', 'Salary Type List', NULL),
(339, 'salary_type_setup', 'Salary Type Setup', NULL),
(340, 'salary_setup', 'Salary SetUp', NULL),
(341, 'add_sal_setup', 'Add Salary Setup', NULL),
(342, 'list_sal_setup', 'Salary Setup List', NULL),
(343, 'salary_type_id', 'Salary Type', NULL),
(344, 'salary_generate', 'Salary Generate', NULL),
(345, 'add_sal_generate', 'Generate Now', NULL),
(346, 'list_sal_generate', 'Generated Salary List', NULL),
(347, 'gdate', 'Generate Date', NULL),
(348, 'start_dates', 'Start Date', NULL),
(349, 'generate', 'Generate ', NULL),
(350, 'successfully_saved_saletup', ' Set up Successfull', NULL),
(351, 's_date', 'Start Date', NULL),
(352, 'e_date', 'End Date', NULL),
(353, 'salary_payable', 'Payable Salary', NULL),
(354, 'tax_manager', 'Tax', NULL),
(355, 'generate_by', 'Generate By', NULL),
(356, 'successfully_paid', 'Successfully Paid', NULL),
(357, 'direct_empl', ' Employee', NULL),
(358, 'add_emp_info', 'Add New Employee', NULL),
(359, 'new_empl_pos', 'Add New Employee Position', NULL),
(360, 'manage', 'Manage Designation', NULL),
(361, 'ad_advertisement', 'ADD POSITION', NULL),
(362, 'moduless', 'Modules', NULL),
(363, 'next', 'Next', NULL),
(364, 'finish', 'Finish', NULL),
(365, 'request', 'Request', NULL),
(366, 'successfully_saved', 'Your Data Successfully Saved', NULL),
(367, 'sal_type', 'Salary Type', NULL),
(368, 'sal_name', 'Salary Name', NULL),
(369, 'leave_application', 'Leave Application', NULL),
(370, 'apply_strt_date', 'Application Start Date', NULL),
(371, 'apply_end_date', 'Application End date', NULL),
(372, 'leave_aprv_strt_date', 'Approve Start Date', NULL),
(373, 'leave_aprv_end_date', 'Approved End Date', NULL),
(374, 'num_aprv_day', 'Aproved Day', NULL),
(375, 'reason', 'Reason', NULL),
(376, 'approve_date', 'Approved Date', NULL),
(377, 'leave_type', 'Leave Type', NULL),
(378, 'apply_hard_copy', 'Application Hard Copy', NULL),
(379, 'approved_by', 'Approved By', NULL),
(380, 'notice', 'Notice Board', NULL),
(381, 'noticeboard', 'Notice Board', NULL),
(382, 'notice_descriptiion', 'Description', NULL),
(383, 'notice_date', 'Notice Date', NULL),
(384, 'notice_type', 'Notice Type', NULL),
(385, 'notice_by', 'Notice By', NULL),
(386, 'notice_attachment', 'Attachment', NULL),
(387, 'account_name', 'Account Name', ''),
(388, 'account_type', 'Account Type', ''),
(389, 'account_id', 'Account Name', ''),
(390, 'transaction_description', 'Description', NULL),
(391, 'payment_id', 'Payment', NULL),
(392, 'create_by_id', 'Created By', NULL),
(393, 'account', 'Account', ''),
(394, 'account_add', 'Add Account', ''),
(395, 'account_transaction', 'Transaction', ''),
(396, 'award', 'Award', NULL),
(397, 'new_award', 'New Award', NULL),
(398, 'award_name', 'Award Name', NULL),
(399, 'aw_description', 'Award Description', NULL),
(400, 'awr_gift_item', 'Gift Item', NULL),
(401, 'awarded_by', 'Award By', NULL),
(402, 'employee_name', 'Employee Name', NULL),
(403, 'employee_list', 'Atn List', NULL),
(404, 'department', 'Department', NULL),
(405, 'department_name', 'Department Name ', NULL),
(406, 'clockout', 'ClockOut', NULL),
(407, 'se_account_id', 'Select Account Name', NULL),
(408, 'division', 'Division', NULL),
(409, 'add_division', 'Add Division', NULL),
(410, 'update_division', 'Update Division', NULL),
(411, 'division_name', 'Division Name', NULL),
(412, 'division_list', 'Manage Division ', NULL),
(413, 'designation_list', 'Designation List', NULL),
(414, 'manage_designation', 'Manage Designation', NULL),
(415, 'add_designation', 'Add Designation', NULL),
(416, 'select_division', 'Select Division', NULL),
(417, 'select_designation', 'Select Designation', NULL),
(418, 'asset', 'Asset', NULL),
(419, 'asset_type', 'Asset Type', NULL),
(420, 'add_type', 'Add Type', NULL),
(421, 'type_list', 'Type List', NULL),
(422, 'type_name', 'Type Name', NULL),
(423, 'select_type', 'Select Type', NULL),
(424, 'equipment_name', 'Equipment Name', NULL),
(425, 'model', 'Model', NULL),
(426, 'serial_no', 'Serial No', NULL),
(427, 'equipment', 'Equipment', NULL),
(428, 'add_equipment', 'Add Equipment', NULL),
(429, 'equipment_list', 'Equipment List', NULL),
(430, 'type', 'Type', NULL),
(431, 'equipment_maping', 'Equipment Mapping', NULL),
(432, 'add_maping', 'Add Mapping', NULL),
(433, 'maping_list', 'Mapping List', NULL),
(434, 'update_equipment', 'Update Equipment', NULL),
(435, 'select_employee', 'Select Employee', NULL),
(436, 'select_equipment', 'Select Equipment', NULL),
(437, 'basic_info', 'Basic Information', NULL),
(438, 'middle_name', 'Middle Name', NULL),
(439, 'state', 'State', NULL),
(440, 'city', 'City', NULL),
(441, 'zip_code', 'Zip Code', NULL),
(442, 'maiden_name', 'Maiden Name', NULL),
(443, 'add_employee', 'Add Employee', NULL),
(444, 'manage_employee', 'Manage Employee', NULL),
(445, 'employee_update_form', 'Employee Update Form', NULL),
(446, 'what_you_search', 'What You Search', NULL),
(447, 'search', 'Search', NULL),
(448, 'duty_type', 'Duty Type', NULL),
(449, 'hire_date', 'Hire Date', NULL),
(450, 'original_h_date', 'Original Hire Date', NULL),
(451, 'voluntary_termination', 'Voluntary Termination', NULL),
(452, 'termination_reason', 'Termination Reason', NULL),
(453, 'termination_date', 'Termination Date', NULL),
(454, 're_hire_date', 'Re Hire Date', NULL),
(455, 'rate_type', 'Rate Type', NULL),
(456, 'pay_frequency', 'Pay Frequency', NULL),
(457, 'pay_frequency_txt', 'Pay Frequency Text', NULL),
(458, 'hourly_rate2', 'Hourly rate2', NULL),
(459, 'hourly_rate3', 'Hourly Rate3', NULL),
(460, 'home_department', 'Home Department', NULL),
(461, 'department_text', 'Department Text', NULL),
(462, 'benifit_class_code', 'Benifite Class code', NULL),
(463, 'benifit_desc', 'Benifit Description', NULL),
(464, 'benifit_acc_date', 'Benifit Accrual Date', NULL),
(465, 'benifit_sta', 'Benifite Status', NULL),
(466, 'super_visor_name', 'Supervisor Name', NULL),
(467, 'is_super_visor', 'Is Supervisor', NULL),
(468, 'supervisor_report', 'Supervisor Report', NULL),
(469, 'dob', 'Date of Birth', NULL),
(470, 'gender', 'Gender', NULL),
(471, 'marital_stats', 'Marital Status', NULL),
(472, 'ethnic_group', 'Ethnic Group', NULL),
(473, 'eeo_class_gp', 'EEO Class', NULL),
(474, 'ssn', 'SSN', NULL),
(475, 'work_in_state', 'Work in State', NULL),
(476, 'live_in_state', 'Live in State', NULL),
(477, 'home_email', 'Home Email', NULL),
(478, 'business_email', 'Business Email', NULL),
(479, 'home_phone', 'Home Phone', NULL),
(480, 'business_phone', 'Business Phone', NULL),
(481, 'cell_phone', 'Cell Phone', NULL),
(482, 'emerg_contct', 'Emergency Contact', NULL),
(483, 'emerg_home_phone', 'Emergency Home Phone', NULL),
(484, 'emrg_w_phone', 'Emergency Work Phone', NULL),
(485, 'emer_con_rela', 'Emergency Contact Relation', NULL),
(486, 'alt_em_contct', 'Alter Emergency Contact', NULL),
(487, 'alt_emg_h_phone', 'Alt Emergency Home Phone', NULL),
(488, 'alt_emg_w_phone', 'Alt Emergency  Work Phone', NULL),
(489, 'reports', 'Reports', NULL),
(490, 'employee_reports', 'Employee Reports', NULL),
(491, 'demographic_report', 'Demographic Report', NULL),
(492, 'posting_report', 'Positional Report', NULL),
(493, 'custom_report', 'Custom Report', NULL),
(494, 'benifit_report', 'Benifit Report', NULL),
(495, 'demographic_info', 'Demographical Information', NULL),
(496, 'positional_info', 'Positional Info', NULL),
(497, 'assets_info', 'Assets Information', NULL),
(498, 'custom_field', 'Custom Field', NULL),
(499, 'custom_value', 'Custom Data', NULL),
(500, 'adhoc_report', 'Adhoc Report', NULL),
(501, 'asset_assignment', 'Asset Assignment', NULL),
(502, 'assign_asset', 'Assign Assets', NULL),
(503, 'assign_list', 'Assign List', NULL),
(504, 'update_assign', 'Update Assign', NULL),
(505, 'citizenship', 'Citizenship', NULL),
(506, 'class_sta', 'Class status', NULL),
(507, 'class_acc_date', 'Class Accrual date', NULL),
(508, 'class_descript', 'Class Description', NULL),
(509, 'class_code', 'Class Code', NULL),
(510, 'return_asset', 'Return Assets', NULL),
(511, 'dept_id', 'Department ID', NULL),
(512, 'parent_id', 'Parent ID', NULL),
(513, 'equipment_id', 'Equipment ID', NULL),
(514, 'issue_date', 'Issue Date', NULL),
(515, 'damarage_desc', 'Damarage Description', NULL),
(516, 'return_date', 'Return Date', NULL),
(517, 'is_assign', 'Is Assign', NULL),
(518, 'emp_his_id', 'Employee History ID', NULL),
(519, 'damarage_descript', 'Damage Description', NULL),
(520, 'return', 'Return', NULL),
(521, 'return_successfull', 'Return Successfull', NULL),
(522, 'return_list', 'Return List', NULL),
(523, 'custom_data', 'Custom Data', NULL),
(524, 'passing_year', 'Passing Year', NULL),
(525, 'is_admin', 'Is Admin', NULL),
(526, 'zip', 'Zip Code', NULL),
(527, 'original_hire_date', 'Original Hire Date', NULL),
(528, 'rehire_date', 'Rehire Date', NULL),
(529, 'class_code_desc', 'Class Code Description', NULL),
(530, 'class_status', 'Class Status', NULL),
(531, 'super_visor_id', 'Supervisor ID', NULL),
(532, 'marital_status', 'Marital Status', NULL),
(533, 'emrg_h_phone', 'Emergency Home Phone', NULL),
(534, 'emgr_contct_relation', 'Emergency Contact Relation', NULL),
(535, 'id', 'ID', NULL),
(536, 'type_id', 'Equipment Type', NULL),
(537, 'custom_id', 'Custom ID', NULL),
(538, 'custom_data_type', 'Custom Data Type', NULL),
(539, 'role_permission', 'Role Permission', NULL),
(540, 'permission_setup', 'Permission Setup', NULL),
(541, 'add_role', 'Add Role', NULL),
(542, 'role_list', 'Role List', NULL),
(543, 'user_access_role', 'User Access Role', NULL),
(544, 'menu_item_list', 'Menu Item List', NULL),
(545, 'ins_menu_for_application', 'Ins Menu  For Application', NULL),
(546, 'menu_title', 'Menu Title', NULL),
(547, 'page_url', 'Page Url', NULL),
(548, 'parent_menu', 'Parent Menu', NULL),
(549, 'role', 'Role', NULL),
(550, 'role_name', 'Role Name', NULL),
(551, 'single_checkin', 'Single Check In', NULL),
(552, 'bulk_checkin', 'Bulk Check In', NULL),
(553, 'manage_attendance', 'Manage Attendance', NULL),
(554, 'attendance_list', 'Attendance List', NULL),
(555, 'checkin', 'Check In', NULL),
(556, 'checkout', 'Check Out', NULL),
(557, 'stay', 'Stay', NULL),
(558, 'attendance_report', 'Attendance Report', NULL),
(559, 'work_hour', 'Work Hour', NULL),
(560, 'cancel', 'Cancel', NULL),
(561, 'confirm_clock', 'Confirm Checkout', NULL),
(562, 'add_attendance', 'Add Attendance', NULL),
(563, 'upload_csv', 'Upload CSV', NULL),
(564, 'import_attendance', 'Import Attendance', NULL),
(565, 'manage_account', 'Manage Account', NULL),
(566, 'add_account', 'Add Account', NULL),
(567, 'add_new_account', 'Add New Account', NULL),
(568, 'account_details', 'Account Details', ''),
(569, 'manage_transaction', 'Manage Transaction', NULL),
(570, 'add_expence', 'Add Experience', NULL),
(571, 'add_income', 'Add Income', NULL),
(572, 'return_now', 'Return Now !!', NULL),
(573, 'manage_award', 'Manage Award', NULL),
(574, 'add_new_award', 'Add New Award', NULL),
(575, 'personal_information', 'Personal Information', NULL),
(576, 'educational_information', 'Educational Information', NULL),
(577, 'past_experience', 'Past Experience', NULL),
(578, 'basic_information', 'Basic Information', NULL),
(579, 'result', 'Result', NULL),
(580, 'institute_name', 'Institute Name', NULL),
(581, 'education', 'Education', NULL),
(582, 'manage_shortlist', 'Manage Short List', NULL),
(583, 'manage_interview', 'Manage Interview', NULL),
(584, 'manage_selection', 'Manage Selection', NULL),
(585, 'add_new_dept', 'Add New Department', NULL),
(586, 'manage_dept', 'Manage Department', NULL),
(587, 'successfully_checkout', 'Checkout Successful !', NULL),
(588, 'grant_loan', 'Grant Loan', NULL),
(589, 'successfully_installed', 'Successfully Installed', NULL),
(590, 'total_loan', 'Total Loan', NULL),
(591, 'total_amount', 'Total Amount', NULL),
(592, 'filter', 'Filter', NULL),
(593, 'weekly_holiday', 'Weekly Holiday', NULL),
(594, 'manage_application', 'Manage Application', NULL),
(595, 'add_application', 'Add Application', NULL),
(596, 'manage_holiday', 'Manage Holiday', NULL),
(597, 'add_more_holiday', 'Add More Holiday', NULL),
(598, 'manage_weekly_holiday', 'Manage Weekly Holiday', NULL),
(599, 'add_weekly_holiday', 'Add Weekly Holiday', NULL),
(600, 'manage_granted_loan', 'Manage Granted Loan', NULL),
(601, 'manage_installment', 'Manage Installment', NULL),
(602, 'add_new_notice', 'Add New Notice', NULL),
(603, 'manage_notice', 'Manage Notice', NULL),
(604, 'salary_type', 'Salary Type', NULL),
(605, 'manage_salary_generate', 'Manage Salary Generate', NULL),
(606, 'generate_now', 'Generate Now', NULL),
(607, 'add_salary_setup', 'Add Salary Setup', NULL),
(608, 'manage_salary_setup', 'Manage Salary Setup', NULL),
(609, 'add_salary_type', 'Add Salary Type', NULL),
(610, 'manage_salary_type', 'Manage Salary Type', NULL),
(611, 'manage_tax_setup', 'Manage Tax Setup', NULL),
(612, 'setup_tax', 'Setup Tax', NULL),
(613, 'add_more', 'Add More', NULL),
(614, 'tax_rate', 'Tax Rate', NULL),
(615, 'no', 'No', NULL),
(616, 'setup', 'Setup', NULL),
(617, 'biographicalinfo', 'Bio-Graphical Information', NULL),
(618, 'positional_information', 'Positional Information', NULL),
(620, 'benifits', 'Benifits', NULL),
(621, 'others_leave_application', 'Others Leave', NULL),
(622, 'add_leave_type', 'Add Leave Type', NULL),
(623, 'others_leave', 'Apply Leave', NULL),
(624, 'number_of_leave_days', 'Number of Leave Days', NULL),
(625, 'itemmanage', 'Food Management', NULL),
(626, 'manage_category', 'Manage Category', NULL),
(627, 'add_category', 'Add Category', NULL),
(628, 'category_list', 'Category List', NULL),
(629, 'manage_food', 'Manage Food', NULL),
(630, 'add_food', 'Add Food', NULL),
(631, 'food_list', 'Food List', NULL),
(632, 'category_name', 'Category Name', NULL),
(633, 'food_name', 'Food Name', NULL),
(634, 'category_subtitle', 'Category Subtitle', NULL),
(635, 'update_category', 'Update Category', NULL),
(636, 'update_fooditem', 'Update Food Item', NULL),
(713, 'food_list', 'Food List', NULL),
(714, 'food_name', 'Food Name', NULL),
(715, 'add_category', 'Add Category', NULL),
(716, 'add_food', 'Add Food', NULL),
(717, 'category_name', 'Category Name', NULL),
(718, 'category_list', 'Category List', NULL),
(719, 'itemmanage', 'Food Management', NULL),
(720, 'manage_category', 'Manage Category', NULL),
(721, 'manage_food', 'Manage Food', NULL),
(722, 'offerdate', 'Offer Start Date', NULL),
(723, 'manage_addons', 'Manage Adons', NULL),
(724, 'add_adons', 'Add Add-ons', NULL),
(725, 'menu_addons', 'Add-ons Menu', NULL),
(726, 'addons_list', 'Add-ons List', ''),
(727, 'assign_adons', 'Add-ons Assign', NULL),
(728, 'assign_adons_list', 'Add-ons Assign List', NULL),
(729, 'update_adons', 'Update Add-ons', NULL),
(730, 'item_name', 'Food Name', NULL),
(731, 'price', 'Price', NULL),
(732, 'offerenddate', 'Offer End Date', NULL),
(733, 'units', 'Unit and Ingredients', NULL),
(734, 'manage_unitmeasurement', 'Unit Measurement', NULL),
(735, 'unit_list', 'Unit Measurement List', NULL),
(736, 'unit_add', 'Add Unit', NULL),
(737, 'unit_update', 'Unit Update', NULL),
(738, 'unit_name', 'Unit Name', NULL),
(739, 'manage_ingradient', 'Manage Ingredients', NULL),
(740, 'ingradient_list', 'Ingredient List', NULL),
(741, 'add_ingredient', 'Add Ingredient', NULL),
(742, 'ingredient_name', 'Ingredient Name', NULL),
(743, 'unit_short_name', 'Short Name', NULL),
(744, 'update_ingredient', 'Update Ingredient', NULL),
(745, 'component', 'Components', NULL),
(746, 'vat_tax', 'Vat', NULL),
(747, 'addons_name', 'Add-ons Name ', ''),
(748, 'food_varient', 'Food Variant', NULL),
(749, 'food_availablity', 'Food Availablity', NULL),
(750, 'add_varient', 'Add Variant', NULL),
(751, 'varient_name', 'Variant Name', NULL),
(752, 'variant_list', 'Variant List', NULL),
(753, 'variant_edit', 'Update Variant', NULL),
(754, 'food_availablelist', 'Food Available List', NULL),
(755, 'add_availablity', 'Add Available Day & Time', NULL),
(756, 'edit_availablity', 'Update Available Day & Time', NULL),
(757, 'available_day', 'Available Day', NULL),
(758, 'available_time', 'Available Time', NULL),
(759, 'membership_management', 'Membership Management', NULL),
(760, 'membership_list', 'Membership List', NULL),
(761, 'membership_name', 'Membership Name', NULL),
(762, 'discount', 'Discount', NULL),
(763, 'other_facilities', 'Other Facilities', NULL),
(764, 'membership_add', 'Add Membership', NULL),
(765, 'membership_edit', 'Update Membership', NULL),
(766, 'payment_setting', 'Payment Method Setting', NULL),
(767, 'paymentmethod_list', 'Payment Method List', NULL),
(768, 'payment_add', 'Add Payment Method', NULL),
(769, 'payment_edit', 'Update Payment Method', NULL),
(770, 'payment_name', 'Payment Method Name', NULL),
(771, 'shipping_setting', 'Shipping Method Setting', NULL),
(772, 'shipping_list', 'Shipping Method List', NULL),
(773, 'shipping_name', 'Shipping Method Name', NULL),
(774, 'shipping_add', 'Add Shipping Method', NULL),
(775, 'shipping_edit', 'Update Shipping Method', NULL),
(776, 'shippingrate', 'Shipping Rate', NULL),
(777, 'supplier_manage', 'Supplier Manage', NULL),
(778, 'supplier_name', 'Supplier Name', NULL),
(779, 'supplier_list', 'Supplier List', NULL),
(780, 'mobile', 'Mobile', NULL),
(781, 'address', 'Address', ''),
(782, 'supplier_add', 'Add Supplier', NULL),
(783, 'supplier_edit', 'Update Supplier', NULL),
(784, 'purchase_item', 'Purchase Item', NULL),
(785, 'purchase', 'Purchase Manage', NULL),
(786, 'purchase_list', 'Purchase List', NULL),
(787, 'purchase_add', 'Add Purchase', NULL),
(788, 'purchase_edit', 'Update Purchase', NULL),
(789, 'quantity', 'Quantity', NULL),
(790, 'supplier_information', 'Supplier Information', NULL),
(791, 'add_new_order', 'Add New Order', NULL),
(792, 'pending_order', 'Pending Order', NULL),
(793, 'processing_order', 'Processing Order', NULL),
(794, 'cancel_order', 'Cancel Order', NULL),
(795, 'complete_order', 'Complete Order', NULL),
(796, 'pos_invoice', 'Pos Invoice', NULL),
(797, 'ordermanage', 'Manage Order', NULL),
(798, 'table_manage', 'Manage Table', NULL),
(799, 'table_edit', 'Update Table', NULL),
(800, 'table_list', 'Table List', NULL),
(801, 'table_name', 'Table Name', NULL),
(802, 'customer_type', 'Customer Type', NULL),
(803, 'customertype_list', 'Customer Type List', NULL),
(804, 'production', 'Production', NULL),
(805, 'add_table', 'Table Add', NULL),
(806, 'table_add', 'Add Table', NULL),
(807, 'add_new_table', 'Add Table', NULL),
(808, 'order_list', 'Order List', NULL),
(809, 'currency', 'Currency', NULL),
(810, 'currency_list', 'Currency List', NULL),
(811, 'currency_name', 'Currency Name', NULL),
(812, 'currency_add', 'Add Currency', NULL),
(813, 'currency_edit', 'Update Currency', NULL),
(814, 'currency_icon', 'Currency Icon', NULL),
(815, 'currency_rate', 'Conversation Rate', NULL),
(816, 'report', 'Report', NULL),
(817, 'purchase_report', 'Purchase Report', NULL),
(818, 'purchase_report_ingredient', 'Stock Report (Kitchen)', NULL),
(819, 'stock_report', 'Stock Report', NULL),
(820, 'sell_report', 'Sell Report', NULL),
(821, 'stock_report_product_wise', 'Stock Report (Product Wise)', NULL),
(822, 'accounts', 'Accounts', ''),
(823, 'c_o_a', 'Chart of Account', NULL),
(824, 'debit_voucher', 'Debit Voucher', NULL),
(825, 'credit_voucher', 'Credit Voucher', NULL),
(826, 'contra_voucher', 'Contra Voucher', NULL),
(827, 'journal_voucher', 'Journal Voucher', NULL),
(828, 'voucher_approval', 'Voucher Approval', NULL),
(829, 'account_report', 'Account Report', ''),
(830, 'voucher_report', 'Voucher Report', NULL),
(831, 'cash_book', 'Cash Book', NULL),
(832, 'bank_book', 'Bank Book', NULL),
(833, 'general_ledger', 'General Ledger', NULL),
(834, 'trial_balance', 'Trial Balance', NULL),
(835, 'profit_loss', 'Profit Loss', NULL),
(836, 'cash_flow', 'Cash Flow', NULL),
(837, 'coa_print', 'Coa Print', NULL),
(838, 'in_quantity', 'In Qnty', NULL),
(839, 'out_quantity', 'Out Qnty', NULL),
(840, 'stock', 'Stock', NULL),
(841, 'find', 'Find', NULL),
(842, 'from_date', 'From Date', NULL),
(843, 'to_date', 'To Date', NULL),
(844, 'approved', 'Approved', NULL),
(845, 'total_ammount', 'Total Amount', NULL),
(846, 'total_purchase', 'Total Purchase', NULL),
(847, 'total_sale', 'Total Sale', NULL),
(848, 'csv_file_informaion', 'CSV File Information', NULL),
(849, 'import_product_csv', 'Import product (CSV)', NULL),
(850, 'set_productionunit', 'Set Production Unit', NULL),
(851, 'production_set_list', 'Production Set List', NULL),
(852, 'production_add', 'Add Production', NULL),
(853, 'production_list', 'Production List', NULL),
(854, 'billing_from', 'Billing From', NULL),
(855, 'invoice', 'Invoice', NULL),
(856, 'invoice_no', 'Invoice No', NULL),
(857, 'billing_date', 'Billing Date', NULL),
(858, 'billing_to', 'Billing To', NULL),
(859, 'reservation', 'Reservation', NULL),
(860, 'take_reservation', 'Take A Reservation', NULL),
(861, 'update_table', 'Table Update', NULL),
(862, 'reserve_time', 'Reservation Table', NULL),
(863, 'reservation_table', 'Add Booking', NULL),
(864, 'table_setting', 'Table Setting', NULL),
(865, 'capacity', 'Capacity', NULL),
(866, 'icon', 'Icon', NULL),
(867, 'purchase_return', 'Purchase Return', NULL),
(868, 'purchase_qty', 'Purchase Qty', NULL),
(869, 'return_qty', 'Return Qty', NULL),
(870, 'total', 'Total', NULL),
(871, 'select', 'Select', NULL),
(872, 'return_invoice', 'Return Invoice', NULL),
(873, 'invoice_view', 'View Invoice', NULL),
(874, 'grand_total', 'Grand Total', NULL),
(875, 'supplier', 'Supplier', NULL),
(876, 'po_no', 'Invoice No', NULL),
(877, 'grant', 'Grant', NULL),
(878, 'hrm', 'Human Resource', NULL),
(879, 'departmentfrm', 'Add Department', NULL),
(880, 'benefits', 'Benefits', NULL),
(881, 'class', 'Class', NULL),
(882, 'biographical_info', 'Biographical Info', NULL),
(883, 'additional_address', 'Additional Address', ''),
(884, 'custom', 'Custom', NULL),
(885, 'pay_now', 'Pay Now ??', NULL),
(886, 'paymentmethod_setup', 'Payment Setup', NULL),
(887, 'add_paymentsetup', 'Add New Payment Setup', NULL),
(888, 'edit_setup', 'Update Setup', NULL),
(889, 'marchantid', 'Marchant ID', NULL),
(890, 'order_successfully', 'Your Payment was Completed!!!.', NULL),
(891, 'order_fail', 'Payment Incomplete!!!', NULL),
(892, 'voucher_no', 'Voucher No', NULL),
(893, 'remark', 'Remark', NULL),
(894, 'code', 'Code', NULL),
(895, 'debit', 'Debit', NULL),
(896, 'credit', 'Credit', NULL),
(897, 'template_name', 'Template Name ', NULL),
(898, 'sms_template', 'SMS Template', NULL),
(899, 'sms_template_warning', 'please use \"{id}\" format without quotation to set dynamic value inside template', NULL),
(900, 'userid', 'UserId', NULL),
(901, 'from', 'From', NULL),
(902, 'opening_cash_and_equivalent', 'Opening Cash && Equivalent', NULL),
(903, 'amount_in_Dollar', 'Amount In Dollar', NULL),
(904, 'pre_balance', 'Pre Balance', NULL),
(905, 'current_balance', 'Current Balance', NULL),
(906, 'with_details', 'With Details', NULL),
(907, 'credit_account_head', 'Credit Account Head', NULL),
(908, 'gl_head', 'GL Head', NULL),
(909, 'transaction_head', 'Transaction Head', NULL),
(910, 'confirm', 'Confirm', NULL),
(911, 's_rate', 'Rate', NULL),
(912, 'web_setting', 'Web Setting', NULL),
(913, 'banner_setting', 'Banner Setting', NULL),
(914, 'menu_setting', 'Menu Setting', NULL),
(915, 'widget_setting', 'Widget Setting', NULL),
(916, 'add_banner', 'Add Banner', NULL),
(917, 'bannertype', 'Add Banner Type', NULL),
(918, 'banner_list', 'Banner List', NULL),
(919, 'title', 'Title', NULL),
(920, 'subtitle', 'Sub Title', NULL),
(921, 'banner_type', 'Banner Type', NULL),
(922, 'link_url', 'Link URL', NULL),
(923, 'banner_edit', 'Banner Update', NULL),
(924, 'menu_name', 'Menu Name', NULL),
(925, 'menu_url', 'Menu Slug', NULL),
(926, 'sub_menu', 'Sub Menu', NULL),
(927, 'add_menu', 'Add Menu', NULL),
(928, 'parent_menu', 'Parent Menu', NULL),
(929, 'widget_name', 'Widget Name', NULL),
(930, 'widget_title', 'Widget Title', NULL),
(931, 'widget_desc', 'Description', NULL),
(932, 'add_widget', 'Add New', NULL),
(933, 'common_setting', 'Common Setting', NULL),
(934, 'bannersize', 'Banner Size', NULL),
(935, 'width', 'Width', NULL),
(936, 'height', 'Height', NULL),
(937, 'exclusive', 'Exclusive', NULL),
(938, 'best_Offers', 'BEST OFFERS', NULL),
(939, 'invalid_size', 'Invalid Size', NULL),
(940, 'confirm_reservation', 'Confirm Reservation', NULL),
(941, 'food_details', 'Food Details', NULL),
(942, 'email_setting', 'Email Setting', NULL),
(943, 'contact_email_list', 'Contact List', NULL),
(944, 'subscribelist', 'Subscribe List', NULL),
(945, 'contact_send', 'Your Contact Information Send Successfully.', NULL),
(946, 'couponlist', 'Coupon List', NULL),
(947, 'add_coupon', 'Add Coupon', NULL),
(948, 'coupon_Code', 'Coupon Code', NULL),
(949, 'coupon_rate', 'Coupon Value', NULL),
(950, 'coupon_startdate', 'Start Date', NULL),
(951, 'coupon_enddate', 'End Date', NULL),
(952, 'coupon_edit', 'Update Coupon', NULL),
(953, 'rating', 'Rating ', NULL),
(954, 'add_rating', 'Add Rating', NULL),
(955, 'reviewtxt', 'Review Text', NULL),
(956, 'rating_edit', 'Rating Update', NULL),
(957, 'customer_rating', 'Customer Rating', NULL),
(958, 'country_list', 'Country List', NULL),
(959, 'countryname', 'Country Name', NULL),
(960, 'add_country', 'Add Country', NULL),
(961, 'edit_country', 'Update Country', NULL),
(962, 'add_state', 'Add State', NULL),
(963, 'edit_state', 'State Update', NULL),
(964, 'state', 'State', NULL),
(965, 'city', 'City', NULL),
(966, 'add_city', 'Add City', NULL),
(967, 'edit_city', 'City Update', NULL),
(968, 'country', 'Country', NULL),
(969, 'state_list', 'State List', NULL),
(970, 'city_list', 'All City', NULL),
(971, 'server_setting', 'App Setting', NULL),
(972, 'netip', 'Your Local Host Full Url', NULL),
(973, 'ip_port', 'Your Online Url', NULL),
(974, 'onlinebdname', 'Online Database Name', NULL),
(975, 'dbuser', 'Database User', NULL),
(976, 'dbpassword', 'Database Password', NULL),
(977, 'dbhost', 'Database Host Name', NULL),
(978, 'social_setting', 'Social Setting', NULL),
(979, 'url_link', 'Url', NULL),
(980, 'sicon', 'Select Icon', NULL),
(981, 'ord_failed', 'Order Failed!!!', NULL),
(982, 'failed_msg', 'Order not placed due to some reason. Please Try Again!!!. Thank You !!!', NULL),
(983, 'ord_succ', 'Order Placed Successfully!!!', NULL),
(984, 'succ_smg', 'Are you Sure to Print This Invoice????', NULL),
(985, 'no_order_run', 'No Order Running', NULL),
(986, 'thirdpartycustomer_list', 'Third-Party Customers', NULL),
(987, '3rd_customer_list', 'Third-Party Customes List', ''),
(988, '3rdcompany_name', 'Company Name', ''),
(989, 'add_3rdparty_comapny', 'Add New Company', ''),
(990, 'update_3rdparty', 'Update Company', NULL),
(991, 'commision', 'Commission', NULL),
(992, 'list_of_card_terminal', 'Card Terminal List', NULL),
(993, 'add_new_terminal', 'Add New Terminal', NULL),
(994, 'update_terminal', 'Update Terminal', NULL),
(995, 'card_terminal_name', 'Card Terminal Name', NULL),
(996, 'list_of_bank', 'Bank List', NULL),
(997, 'add_bank', 'Add New Bank', NULL),
(998, 'update_bank', 'Update Bank', NULL),
(999, 'bank_name', 'Bank Name', NULL),
(1000, 'sell_report_filter', 'Sell Report Filtering', NULL),
(1001, 'sms_setting', 'SMS Setting', NULL),
(1002, 'sms_configuration', 'SMS Configuration', NULL),
(1003, 'sms_temp', 'SMS Template', NULL),
(1004, 'candidate_name', 'Candidate Name', NULL),
(1005, 'assign1_role', 'Assign Role', NULL),
(1006, 'customer_list', 'Customer List', NULL),
(1007, 'customer_name', 'Customer Name', NULL),
(1008, 'update_ord', 'Update Order', NULL),
(1009, 'final_report', 'Final Report', NULL),
(1010, 'ehrm', 'HRM', NULL),
(1011, 'add_expense_item', 'Add Expense Item', NULL),
(1012, 'manage_expense_item', 'Manage Expense Item', NULL),
(1013, 'add_expense', 'Add Expense', NULL),
(1014, 'manage_expense', 'Manage Expense', NULL),
(1015, 'expense_statement', 'Expense Statement', NULL),
(1016, 'expense_type', 'Expense Type', NULL),
(1017, 'expense_item_name', 'Expense Item Name', NULL),
(1018, 'expense', 'Expense', NULL),
(1020, 'signature_pic', 'Signature Picture', NULL),
(1021, 'branch1', 'Branch', NULL),
(1022, 'ac_no', 'A/C Number', ''),
(1023, 'ac_name', 'A/C Name', ''),
(1024, 'bank_transaction', 'Bank Transaction', NULL),
(1025, 'bank', 'Bank', NULL),
(1026, 'withdraw_deposite_id', 'Withdraw / Deposite ID', NULL),
(1027, 'bank_ledger', 'Bank Ledger', NULL),
(1028, 'note_name', 'Note Name', NULL),
(1029, 'balance', 'Balance', NULL),
(1030, 'previous_balance', 'Previous Credit Balance', NULL),
(1031, 'manage_supplier_ledger', 'Manage supplier ledger', NULL),
(1032, 'supplier_ledger', 'Supplier Ledger', NULL),
(1033, 'print', 'Print', NULL),
(1034, 'select_supplier', 'Select Supplier', NULL),
(1035, 'deposite_id', 'Deposite ID', NULL),
(1036, 'print_date', 'Print Date', NULL),
(1037, 'manage_bank', 'Manage Bank', NULL),
(1038, 'add_new_bank', 'Add New Bank', NULL),
(1039, 'bank_list', 'Bank List', NULL),
(1040, 'bank_edit', 'Bank Edit', NULL),
(1041, 'debit_plus', 'Debit (+)', NULL),
(1042, 'credit_minus', 'Credit (-)', NULL),
(1043, 'withdraw_deposite_id', 'Withdraw / Deposite ID', NULL),
(1044, 'cash_adjustment', 'Cash Adjustment', NULL),
(1045, 'adjustment_type', 'Adjustment Type', NULL),
(1046, 'supplier_payment', 'Supplier Payment', NULL),
(1047, 'prepared_by', 'Prepared By', NULL),
(1048, 'authorized_signature', 'Authorized Signature', NULL),
(1049, 'chairman', 'Chairman', NULL),
(1050, 'kitchen_dashboard', 'Kitchen Dashboard', NULL),
(1051, 'counter_dashboard', 'Counter Dashboard', NULL),
(1052, 'nw_order', 'New Order', NULL),
(1053, 'ongoingorder', 'On Going Order', NULL),
(1054, 'tdayorder', 'Today Order', NULL),
(1055, 'onlineord', 'Online Order ', NULL),
(1056, 'table', 'Table', NULL),
(1057, 'waiter', 'Waiter', NULL),
(1058, 'del_company', 'Delivary Company', NULL),
(1059, 'cookedtime', 'Cooking Time', NULL),
(1060, 'ord_num', 'Order Number', NULL),
(1061, 'cmplt', 'Complete', NULL),
(1062, 'sl_payment', 'Select Your Payment Method', NULL),
(1063, 'paymd', 'Payment Method', NULL),
(1064, 'crd_terminal', 'Card Terminal', NULL),
(1065, 'sl_bank', 'Select Bank', NULL),
(1066, 'lstdigit', 'Last 4 Digit', NULL),
(1067, 'cuspayment', 'Customer Payment', NULL),
(1068, 'cng_amount', 'Changes Amount', NULL),
(1069, 'pay_print', 'Pay Now & Print Invoice', NULL),
(1070, 'payn', 'Pay Now', NULL),
(1071, 'ordid', 'Order Id', NULL),
(1072, 'can_reason', 'Cancel Reason', NULL),
(1073, 'can_ord', 'Cancel Order', NULL),
(1074, 'close', 'Close', NULL),
(1075, 'add_customer', 'Add Customer', NULL),
(1076, 'fav_addesrr', 'Favourite Address', NULL),
(1077, 'tabltno', 'Table No', NULL),
(1078, 'ordate', 'Order Date', NULL),
(1079, 'payment_status', 'Payment Status', NULL),
(1080, 'ordtcoun', 'Order Time Coundown Board', NULL),
(1081, 'remtime', 'Remaining Time', NULL),
(1082, 'ordtime', 'Order time', NULL),
(1083, 'ord', 'Order', NULL),
(1084, 'tok', 'Token', NULL),
(1085, 'view_ord', 'View Order', NULL),
(1086, 'fdready', 'Food Ready', NULL),
(1087, 'fdnready', 'Food Not Ready', NULL),
(1088, 'foodrfs', 'Food is Ready for Served!!', NULL),
(1089, 'foodnrfs', 'Food Not Ready for Served', NULL),
(1090, 'ordready', 'Order Ready', NULL),
(1091, 'sele_by_date', 'sell By Date', NULL),
(1092, 'withdetails', 'With Details', NULL),
(1093, 'topeneqv', 'Total Opening Cash & Cash Equivalent', NULL),
(1094, 'cashopen', 'Cashflow from Operating Activities', ''),
(1095, 'payact', 'Payment for Other Operating Activities', NULL),
(1096, 'cash_gand_lie', 'Cash generated from Operating Activites before Changing in Opereating Assets &amp; Liabilities', NULL),
(1097, 'casfactive', 'Cashflow from Non Operating Activities', NULL),
(1098, 'cashnonlia', 'Cash generated from Non Operating Activites before Changing in Opereating Assets &amp; Liabilities', NULL),
(1099, 'incdre', 'Increase/Decrease in Operating Assets &amp; Liabilites', NULL),
(1100, 'Tincdre', 'Total Increase/Decrease', NULL),
(1101, 'netopenactv', 'Net Cash From Operating/Non Operating Activities', NULL),
(1102, 'cfact', 'Cash Flow from Investing Activities', NULL),
(1103, 'ncuia', 'Net Cash Used Investing Activities', NULL),
(1104, 'cfffa', 'Cash Flow from Financing Activities', NULL),
(1105, 'netcufa', 'Net  Cash Used Financing Activities', NULL),
(1106, 'ncio', 'Net Cash Inflow/Outflow', NULL),
(1107, 'pflos', 'Profit Loss', NULL),
(1108, 'clcEq', 'Closing Cash & Cash Equivalent:', NULL),
(1109, 'TcccE', 'Total Closing Cash & Cash Equivalent', NULL),
(1110, 'pp_by', 'Prepared By', NULL),
(1111, 'act', 'Accounts', NULL),
(1112, 'ausig', 'Authorized Signature', NULL),
(1113, 'particls', 'Particulars', NULL),
(1114, 'back', 'Back', NULL),
(1115, 'bk_vouchar', 'Bank Book Voucher', NULL),
(1116, 'errorajdata', 'Error get data from ajax', NULL),
(1117, 'reach_limit', 'You have reached the limit of adding', NULL),
(1118, 'inpt', 'inputs', NULL),
(1119, 'cantdel', 'There only one row you can\'t delete.', NULL),
(1120, 'slsuplier', 'Select Supplier', NULL),
(1121, 'ptype', 'Payment Type', NULL),
(1122, 'casp', 'Cash Payment', NULL),
(1123, 'bnkp', 'Bank Payment', NULL),
(1124, 'slbank', 'Select Bank', NULL),
(1125, 'cscrv', 'Cash Credit Voucher', NULL),
(1126, 'ac_code', 'Account Code', NULL),
(1127, 'ac_head', 'Account Head', NULL),
(1128, 'iword', 'In word', NULL),
(1129, 'ac_office', 'Accounts Officer', NULL),
(1130, 'latestv', 'Latest version', NULL),
(1131, 'after19', 'Auto Update Feature working On  after 1.9', NULL),
(1132, 'crver', 'Current version', NULL),
(1133, 'notesupdate', 'note: strongly recomanded to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before update.', NULL),
(1134, 'noupdates', 'No Update available', NULL),
(1135, 'lic_pur_key', 'Licence/Purchase key', NULL),
(1136, 'lifeord', 'Lifetime Orders', NULL),
(1137, 'tdaysell', 'Today Sell', NULL),
(1138, 'tcustomer', 'Total Customer', NULL),
(1139, 'tdeliv', 'Total Delivered', NULL),
(1140, 'treserv', 'Total Reservation', NULL),
(1141, 'latestord', 'Latest Order', NULL),
(1142, 'latest_reser', 'Latest Reservation', NULL),
(1143, 'ord_number', 'Order No.', NULL),
(1144, 'latestolorder', 'Latest Online Order', NULL),
(1145, 'monsalamntorder', 'Monthly Sales Amount and Order', NULL),
(1146, 'onlineofline', 'Online Vs Offline Order and sales', NULL),
(1147, 'pending_ord', 'Pending Order', NULL),
(1148, 'onlinesamnt', 'Online Sale Amount', NULL),
(1149, 'onlineordnum', 'Online Order number', NULL),
(1150, 'offsalamnt', 'Offline Sale Amount', NULL),
(1151, 'offlordnum', 'Offline Order number', NULL),
(1152, 'saleamnt', 'Sale Amount', NULL),
(1153, 'ordnumb', 'Order number', NULL),
(1154, 'store_name', 'Store Name', NULL),
(1155, 'opent', 'Opening Time', NULL),
(1156, 'closeTime', 'Close Time', NULL),
(1157, 'sldistype', 'Seletet Discount Type', NULL),
(1158, 'distype', 'Discount Type', NULL),
(1159, 'percent', 'Percent', NULL),
(1160, 'sl_se_ch_ty', 'Seletet Service Charge Type', NULL),
(1161, 'vatset', 'VAT Setting(%)', NULL),
(1162, 'mindeltime', 'Min. Delivary Time:', NULL),
(1163, 'dateformat', 'Date Format', NULL),
(1164, 'sedateformat', 'Seletet Date Format', NULL),
(1165, 'add_menu_item', 'Add Menu Item', NULL),
(1166, 'menu_title', 'Menue Title', NULL),
(1167, 'can_create', 'Can Create', NULL),
(1168, 'can_read', 'Can Read', NULL),
(1169, 'can_edit', 'Can Edit', NULL),
(1170, 'can_delete', 'Can Delete', NULL),
(1171, 'smsrankgateway', 'To get <b>50</b> free sms from smsrank.com click', NULL),
(1172, 'ranktext', ' and register in registration section click Already envato user and put your envato purchace key and product id  after registration put your username and password into the password and user name field this form.', NULL),
(1173, 'managementsection', 'This section is use Only for Store Management.', NULL),
(1174, 'width', 'Widht', NULL),
(1175, 'protocal', 'Protocol', NULL),
(1176, 'mailpath', 'MailPath', NULL),
(1177, 'Mail_type', 'MailType', NULL),
(1178, 'smtp_host', 'Smtp Host', NULL),
(1179, 'smtp_post', 'Smtp Port', NULL),
(1180, 'sender_email', 'Sender Email', NULL),
(1181, 'smtp_password', 'Smtp Password', NULL),
(1182, 'api_key', 'Api Key', NULL),
(1183, 'powered_by', 'Powered By Text', NULL),
(1184, 'item_information', 'Item Information', NULL),
(1185, 'size', 'Size', NULL),
(1186, 'qty', 'Qty.', NULL),
(1187, 'addons_name', 'Addons Name', NULL),
(1188, 'addons_qty', 'Addons Qty', NULL),
(1189, 'add_to_cart', 'Add To cart', NULL),
(1190, 'item', 'Item', NULL),
(1191, 'unit_price', 'Unit Price', NULL),
(1192, 'total_price', 'Total Price', NULL),
(1193, 'order_status', 'Order Status', NULL),
(1194, 'served', 'Served', NULL),
(1195, 'cancel_reason', 'Cancel Reason', NULL),
(1196, 'customer_order', 'Customer Notes', NULL),
(1197, 'customerpicktime', 'Customer Pick-up Date and time', NULL),
(1198, 'subtotal', 'Subtotal', NULL),
(1199, 'service_chrg', 'Service Charge', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `spanish`) VALUES
(1200, 'customer_paid_amount', 'Customer Paid Amount', NULL),
(1201, 'change_due', 'Change Due', NULL),
(1202, 'total_due', 'Total Due', NULL),
(1203, 'powerbybdtask', 'Powered  By: BDTASK, www.bdtask.com', NULL),
(1204, 'recept', 'Receipt  No', NULL),
(1205, 'orderno', 'Order No.', NULL),
(1206, 'ref_page', 'Refresh Page', NULL),
(1207, 'orderid', 'Orderid', NULL),
(1208, 'all', 'All', NULL),
(1209, 'vat_tax1', 'Vat/Tax', NULL),
(1210, 'ord_uodate_success', 'Order Update Successfully!!!', NULL),
(1211, 'do_print_token', 'Do you Want to Print Token No.???', NULL),
(1212, 'req_failed', 'Request Failed, Please check your code and try again!', NULL),
(1213, 'ord_places', 'Order Placed Successfully', NULL),
(1214, 'do_print_in', 'Do you Want to Print Invoice???', NULL),
(1215, 'ord_complte', 'Order Completed', NULL),
(1216, 'ord_com_sucs', 'Order Completed Successfully', NULL),
(1217, 'token_no', 'Token NO', NULL),
(1218, 'qr-order', 'QR Order', NULL),
(1219, 'cuschange', 'Customer Change', NULL),
(1220, 'order_successfully_placed', 'Order has been placed successfully!', NULL),
(1221, 'kitchen_setting', 'kitchen Setting', NULL),
(1222, 'kitchen_name', 'Kitchen Name', NULL),
(1223, 'kitchen_user_assign', 'Assign Kitchen User', NULL),
(1224, 'kitchen_list', 'Kitchen List', NULL),
(1225, 'add_kitchen', 'Add Kitchen', NULL),
(1226, 'kitchen_assign', 'Kitchen Assign', NULL),
(1227, 'kitchen_edit', 'Kitchen Edit', NULL),
(1228, 'please_try_again_userassign', 'This user is already assign in this kitchen', NULL),
(1229, 'select_kitchen', 'Select Kitchen', NULL),
(1230, 'memberid', 'Member Id', NULL),
(1231, 'member_name', 'Member Name', NULL),
(1232, 'add_member', 'Add New Member', NULL),
(1233, 'update_member', 'Update Member', NULL),
(1234, 'member_list', 'Member List', NULL),
(1235, 'order_successfully_placed', 'Order has been placed successfully!', NULL),
(1236, 'meminfo', 'Member Manage', NULL),
(1237, 'blocked', 'Blocked', NULL),
(1238, 'memberid_exist', 'Member ID Already Exists. Please Try Another.', NULL),
(1239, 'add_new_payment_type', 'Add New Payment Method', NULL),
(1240, 'sell_report_items', 'Sell Report Items', NULL),
(1241, 'sell_report_waiters', 'Sell Reort Waiters', NULL),
(1242, 'sell_report_delvirytype', 'Sell Report Delivery Type ', NULL),
(1243, 'sell_report_casher', 'Sell Report Casher', NULL),
(1244, 'ready_all_ietm', 'All Item Ready', NULL),
(1245, 'unpaid_sell', 'Unpaid Sell', NULL),
(1246, 'kitchen_sell', 'Kitchen Sell', NULL),
(1247, 'order_total', 'Order Total', NULL),
(1248, 'scharge_report', 'Service Charge Repoert', NULL),
(1249, 'seo_setting', 'Seo Setting', NULL),
(1250, 'seo_title', 'Title', NULL),
(1251, 'seo_keyword', 'Keyword', NULL),
(1252, 'seo_description', 'Description', NULL),
(1253, 'pos_setting', 'POS Setting', NULL),
(1254, 'buy_now', 'Buy Now', NULL),
(1255, 'purchase_key', 'Purchase Key', NULL),
(1256, 'kitchen_status', 'Kitchen Status', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_apply`
--

CREATE TABLE `leave_apply` (
  `leave_appl_id` int(11) NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `leave_type_id` int(2) NOT NULL,
  `apply_strt_date` varchar(20) NOT NULL,
  `apply_end_date` varchar(20) NOT NULL,
  `apply_day` int(11) NOT NULL,
  `leave_aprv_strt_date` varchar(20) NOT NULL,
  `leave_aprv_end_date` varchar(20) NOT NULL,
  `num_aprv_day` varchar(15) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `apply_hard_copy` text DEFAULT NULL,
  `apply_date` varchar(20) NOT NULL,
  `approve_date` varchar(20) NOT NULL,
  `approved_by` varchar(30) NOT NULL,
  `leave_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_apply`
--

INSERT INTO `leave_apply` (`leave_appl_id`, `employee_id`, `leave_type_id`, `apply_strt_date`, `apply_end_date`, `apply_day`, `leave_aprv_strt_date`, `leave_aprv_end_date`, `num_aprv_day`, `reason`, `apply_hard_copy`, `apply_date`, `approve_date`, `approved_by`, `leave_type`) VALUES
(1, 'E1Q5NMGS', 2, '21-12-2018', '23-12-2018', 0, '23-12-2018', '24-12-2018', 'NaN', '', NULL, '2018-12-17', '2018-12-17', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leave_type_id` int(2) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `leave_days` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leave_type_id`, `leave_type`, `leave_days`) VALUES
(2, 'Earn Leave', 5);

-- --------------------------------------------------------

--
-- Table structure for table `loan_installment`
--

CREATE TABLE `loan_installment` (
  `loan_inst_id` int(11) NOT NULL,
  `employee_id` varchar(21) CHARACTER SET latin1 NOT NULL,
  `loan_id` varchar(21) CHARACTER SET latin1 NOT NULL,
  `installment_amount` varchar(20) CHARACTER SET latin1 NOT NULL,
  `payment` varchar(20) CHARACTER SET latin1 NOT NULL,
  `date` varchar(20) CHARACTER SET latin1 NOT NULL,
  `received_by` varchar(20) CHARACTER SET latin1 NOT NULL,
  `installment_no` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '1',
  `notes` varchar(80) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan_installment`
--

INSERT INTO `loan_installment` (`loan_inst_id`, `employee_id`, `loan_id`, `installment_amount`, `payment`, `date`, `received_by`, `installment_no`, `notes`) VALUES
(1, 'EQLAJFUW', '2', '172', 'Card Payment', '2018-12-18', 'EQLAJFUW', '1', 'hyjg');

-- --------------------------------------------------------

--
-- Table structure for table `marital_info`
--

CREATE TABLE `marital_info` (
  `id` int(11) NOT NULL,
  `marital_sta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_info`
--

INSERT INTO `marital_info` (`id`, `marital_sta`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Divorced'),
(4, 'Widowed'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `membership_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `discount` float NOT NULL,
  `other_facilities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `membership_name`, `discount`, `other_facilities`, `create_by`, `create_date`, `update_by`, `update_date`) VALUES
(1, 'Premium Member', 20, 'Get a souse', 2, '2018-11-07', 2, '2018-11-07'),
(2, 'Silver Member', 18, '', 2, '2018-11-07', 2, '2018-11-07'),
(3, 'Gold Member', 20, '', 2, '2018-11-07', 2, '2018-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `menu_add_on`
--

CREATE TABLE `menu_add_on` (
  `row_id` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `add_on_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `directory` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `multipay_bill`
--

CREATE TABLE `multipay_bill` (
  `multipay_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `multipayid` varchar(30) DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `row_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menuqty` float NOT NULL,
  `add_on_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addonsqty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `varientid` int(11) NOT NULL,
  `food_status` int(11) DEFAULT 0,
  `allfoodready` int(11) DEFAULT NULL,
  `isupdate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentsetup`
--

CREATE TABLE `paymentsetup` (
  `setupid` int(11) NOT NULL,
  `paymentid` int(11) NOT NULL,
  `marchantid` varchar(255) DEFAULT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `Islive` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentsetup`
--

INSERT INTO `paymentsetup` (`setupid`, `paymentid`, `marchantid`, `password`, `email`, `currency`, `Islive`, `status`) VALUES
(1, 5, 'bdtas5e772deb8ff87', 'bdtas5e772deb8ff87@ssl', 'ainalcse@gmail.com', 'BDT', 0, 1),
(2, 3, '', '', 'tareq7500personal2@gmail.com', 'USD', 0, 1),
(3, 2, '901400787', '', 'ainalcse@gmail.com', 'USD', 0, 1),
(4, 6, '002020000000001', '002020000000001_KEY1', '1', '', 0, 1),
(5, 7, 'BE10000072', 'BE10000072', 'karmadorji@gmail.com', 'BTN', 0, 1),
(6, 8, 'sandbox-sq0idb-ShIOgPUIHSXxsjCPG4oh_A', 'EAAAEE3gxSvOVaHIq-5A5P_yFkUbkAfUM2-JiQju2FTxQ4n7epxmvKpaOhECxHcN', '5SNY8GNKAZM00', 'AUD', 0, 1),
(7, 9, 'sk_test_ol4WUcbGsqxNJItpeOi1ecDT00k5mDyC2G', 'pk_test_TrVFpmZBkgasCE6WTPkZgMPr00UzVVOqgp', 'ainalcse@gmail.com', 'USD', 0, 1),
(8, 10, 'sk_test_71353c2613675acb967ea532f4c4c8105ea175b8', 'pk_test_328da55755b88b1aaed96c5cda215b2fd887edb9', 'ainalcse@gmail.com', 'NGN', 0, 1),
(9, 11, NULL, '', '', '', 0, 0),
(10, 12, '7BUkXCbuHDcx1ZyQqmcKVtsLnFxF0r3f', 'vmUIfeoHXpZSKc20Wt50d6hqeIY5FcWtFR6prg0Ubak8IvmmZEFDDpQr5ZMEdnoS', '', 'XAF', 0, 1),
(12, 13, 'sandbox-5rd4uUC2yAz7LWDaalyJAOEsH2rxrqVB', 'sandbox-FsKRCZpk0BpdUss3wVsNLhvs5Ty5PSpi', '', 'TRY', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` tinyint(4) NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_method_id`, `payment_method`, `is_active`) VALUES
(1, 'Card Payment', 1),
(2, 'Two Checkout', 1),
(3, 'Paypal', 1),
(4, 'Cash Payment', 1),
(5, 'SSLCommerz', 1),
(6, 'SIPS Office', 1),
(7, 'RMA PAYMENT GATEWAY', 1),
(8, 'Square Payments', 1),
(9, 'Stripe Payment', 1),
(10, 'Paystack Payments', 1),
(11, 'Paytm Payments', 1),
(12, 'Orange Money payment', 1),
(13, 'iyzico', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_holiday`
--

CREATE TABLE `payroll_holiday` (
  `payrl_holi_id` int(11) UNSIGNED NOT NULL,
  `holiday_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `no_of_days` varchar(30) CHARACTER SET latin1 NOT NULL,
  `created_by` varchar(30) CHARACTER SET latin1 NOT NULL,
  `updated_by` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll_holiday`
--

INSERT INTO `payroll_holiday` (`payrl_holi_id`, `holiday_name`, `start_date`, `end_date`, `no_of_days`, `created_by`, `updated_by`) VALUES
(1, 'Eid Ul Azha', '2019-06-20', '2019-06-27', '8', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_tax_setup`
--

CREATE TABLE `payroll_tax_setup` (
  `tax_setup_id` int(11) UNSIGNED NOT NULL,
  `start_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_amount` varchar(30) CHARACTER SET latin1 NOT NULL,
  `rate` varchar(30) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pay_frequency`
--

CREATE TABLE `pay_frequency` (
  `id` int(11) NOT NULL,
  `frequency_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_frequency`
--

INSERT INTO `pay_frequency` (`id`, `frequency_name`) VALUES
(1, 'Weekly'),
(2, 'Biweekly'),
(3, 'Annual'),
(4, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `pos_id` int(10) UNSIGNED NOT NULL,
  `position_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `position_details` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`pos_id`, `position_name`, `position_details`) VALUES
(1, 'chef', 'Responsible for the pastry shop in a foodservice establishment. Ensures that the products produced in the pastry shop meet the quality standards in conjunction with the executive chef.'),
(2, 'HRM', 'Recruits and hires qualified employees, creates in-house job-training programs, and assists employees with their career needs.'),
(3, 'Kitchen manager', 'Supervises and coordinates activities concerning all back-of-the-house operations and personnel, including food preparation, kitchen and storeroom areas.'),
(4, 'Counter server', 'Responsible for providing quick and efficient service to customers. Greets customers, takes their food and beverage orders, rings orders into register, and prepares and serves hot and cold drinks.'),
(6, 'Waiter', 'Most waiters and waitresses, also called servers, work in full-service restaurants. They greet customers, take food orders, bring food and drinks to the tables and take payment and make change.'),
(7, 'Accounts', 'Play a key role in every restaurant. ');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `productionid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemquantity` int(11) NOT NULL,
  `savedby` int(11) NOT NULL,
  `saveddate` date NOT NULL,
  `productionexpiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `production_details`
--

CREATE TABLE `production_details` (
  `pro_detailsid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `ingredientid` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unitname` varchar(100) NOT NULL,
  `createdby` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` bigint(20) NOT NULL,
  `fk_prod_category_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pos_item_weight` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_short_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rec_retail_price` float DEFAULT NULL,
  `unit_per_case` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `case_discount` float DEFAULT NULL,
  `fk_company_id` int(11) DEFAULT NULL,
  `fk_client_id` int(11) DEFAULT NULL,
  `comparison_product` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` date NOT NULL,
  `create_by` int(11) NOT NULL,
  `p_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=product,2=pos_item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseitem`
--

CREATE TABLE `purchaseitem` (
  `purID` int(11) NOT NULL,
  `invoiceid` varchar(50) DEFAULT NULL,
  `suplierID` int(11) NOT NULL,
  `paymenttype` int(11) DEFAULT NULL,
  `bankid` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `details` text DEFAULT NULL,
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL,
  `savedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaseitem`
--

INSERT INTO `purchaseitem` (`purID`, `invoiceid`, `suplierID`, `paymenttype`, `bankid`, `total_price`, `paid_amount`, `details`, `purchasedate`, `purchaseexpiredate`, `savedby`) VALUES
(1, '5463453254', 1, 1, 0, '51200.00', '50000.00', '', '2020-09-08', '2020-10-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `detailsid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `indredientid` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unitname` varchar(80) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `totalprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `purchaseby` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `purchaseexpiredate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`detailsid`, `purchaseid`, `indredientid`, `quantity`, `unitname`, `price`, `totalprice`, `purchaseby`, `purchasedate`, `purchaseexpiredate`) VALUES
(1, 1, 5, '100.00', '', '500.00', '50000.00', 2, '2020-09-08', '2020-10-31'),
(2, 1, 4, '10.00', '', '120.00', '1200.00', 2, '2020-09-08', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `preturn_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `po_no` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `return_date` date NOT NULL,
  `totalamount` float NOT NULL,
  `totaldiscount` float NOT NULL,
  `return_reason` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `updatedate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_details`
--

CREATE TABLE `purchase_return_details` (
  `preturn_id` int(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_rate` float NOT NULL,
  `store_id` int(11) NOT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate_type`
--

CREATE TABLE `rate_type` (
  `id` int(11) NOT NULL,
  `r_type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_type`
--

INSERT INTO `rate_type` (`id`, `r_type_name`) VALUES
(1, 'Hourly'),
(2, 'Salary');

-- --------------------------------------------------------

--
-- Table structure for table `rest_table`
--

CREATE TABLE `rest_table` (
  `tableid` int(11) NOT NULL,
  `tablename` varchar(50) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `table_icon` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1=booked,0=free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rest_table`
--

INSERT INTO `rest_table` (`tableid`, `tablename`, `person_capicity`, `table_icon`, `status`) VALUES
(1, '1', 2, 'assets/img/icons/resttable/1.png', 1),
(2, '2', 4, 'assets/img/icons/resttable/4.png', 0),
(3, '3', 2, 'assets/img/icons/resttable/2.png', 1),
(4, '4', 5, 'assets/img/icons/resttable/table11.png', 1),
(5, '5', 6, 'assets/img/icons/resttable/table7.png', 0),
(6, '6', 3, 'assets/img/icons/resttable/3.png', 0),
(7, '7', 8, 'assets/img/icons/resttable/8.png', 0),
(8, '8', 4, 'assets/img/icons/resttable/4.png', 0),
(9, '9', 3, 'assets/img/icons/resttable/3.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_setup_header`
--

CREATE TABLE `salary_setup_header` (
  `s_s_h_id` int(11) UNSIGNED NOT NULL,
  `employee_id` varchar(30) CHARACTER SET latin1 NOT NULL,
  `salary_payable` varchar(30) CHARACTER SET latin1 NOT NULL,
  `absent_deduct` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tax_manager` varchar(30) CHARACTER SET latin1 NOT NULL,
  `status` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_sheet_generate`
--

CREATE TABLE `salary_sheet_generate` (
  `ssg_id` int(11) UNSIGNED NOT NULL,
  `employee_id` varchar(20) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `gdate` varchar(20) DEFAULT NULL,
  `start_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `end_date` varchar(30) CHARACTER SET latin1 NOT NULL,
  `generate_by` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `salary_type`
--

CREATE TABLE `salary_type` (
  `salary_type_id` int(10) UNSIGNED NOT NULL,
  `sal_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `emp_sal_type` varchar(50) CHARACTER SET latin1 NOT NULL,
  `default_amount` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sec_menu_item`
--

CREATE TABLE `sec_menu_item` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `is_report` tinyint(1) DEFAULT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_menu_item`
--

INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `parent_menu`, `is_report`, `createby`, `createdate`) VALUES
(1, 'manage_category', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(2, 'category_list', 'item_category', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(3, 'add_category', 'create', 'itemmanage', 2, 0, 2, '2018-11-05 00:00:00'),
(4, 'manage_food', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(5, 'food_list', 'item_food', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(6, 'add_food', 'index', 'itemmanage', 5, 0, 2, '2018-11-05 00:00:00'),
(7, 'food_varient', 'foodvarientlist', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(8, 'add_varient', 'addvariant', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(9, 'food_availablity', 'availablelist', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(10, 'add_availablity', 'addavailable', 'itemmanage', 5, 0, 2, '2018-11-07 00:00:00'),
(11, 'manage_addons', '', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(12, 'addons_list', 'menu_addons', 'itemmanage', 0, 0, 2, '2018-11-05 00:00:00'),
(13, 'add_adons', 'create', 'itemmanage', 8, 0, 2, '2018-11-05 00:00:00'),
(14, 'manage_unitmeasurement', '', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(15, 'unit_list', 'unitmeasurement', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(16, 'unit_add', 'create', 'units', 12, 0, 2, '2018-11-05 00:00:00'),
(17, 'manage_ingradient', '', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(18, 'ingradient_list', 'ingradient', 'units', 0, 0, 2, '2018-11-05 00:00:00'),
(19, 'add_ingredient', 'create', 'units', 15, 0, 2, '2018-11-05 00:00:00'),
(20, 'assign_adons_list', 'assignaddons', 'itemmanage', 8, 0, 2, '2018-11-06 00:00:00'),
(21, 'assign_adons', 'assignaddonscreate', 'itemmanage', 8, 0, 2, '2018-11-06 00:00:00'),
(28, 'membership_management', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(29, 'membership_list', 'index', 'setting', 28, 0, 2, '2018-11-12 00:00:00'),
(30, 'membership_add', 'create', 'setting', 29, 0, 2, '2018-11-12 00:00:00'),
(31, 'payment_setting', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(32, 'paymentmethod_list', 'index', 'setting', 31, 0, 2, '2018-11-12 00:00:00'),
(33, 'payment_add', 'create', 'setting', 32, 0, 2, '2018-11-12 00:00:00'),
(34, 'shipping_setting', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(35, 'shipping_list', 'index', 'setting', 34, 0, 2, '2018-11-12 00:00:00'),
(36, 'shipping_add', 'create', 'setting', 35, 0, 2, '2018-11-12 00:00:00'),
(37, 'supplier_manage', '', 'setting', 0, 0, 2, '2018-11-12 00:00:00'),
(38, 'supplier_list', 'index', 'setting', 37, 0, 2, '2018-11-12 00:00:00'),
(39, 'supplier_add', 'create', 'setting', 38, 0, 2, '2018-11-12 00:00:00'),
(40, 'purchase_item', 'index', 'purchase', 0, 0, 2, '2018-11-12 00:00:00'),
(41, 'purchase_add', 'create', 'purchase', 40, 0, 2, '2018-11-12 00:00:00'),
(42, 'table_manage', '', 'setting', 0, 0, 2, '2018-11-13 00:00:00'),
(43, 'add_new_table', 'create', 'setting', 44, 0, 2, '2018-11-13 00:00:00'),
(44, 'table_list', 'restauranttable', 'setting', 42, 0, 2, '2018-11-13 00:00:00'),
(45, 'ordermanage', 'index', 'ordermanage', 0, 0, 2, '2018-11-22 00:00:00'),
(46, 'add_new_order', 'neworder', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(47, 'order_list', 'orderlist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(48, 'pending_order', 'pendingorder', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(49, 'processing_order', 'processing', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(50, 'complete_order', 'completelist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(51, 'cancel_order', 'cancellist', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(52, 'pos_invoice', 'pos_invoice', 'ordermanage', 45, 0, 2, '2018-11-22 00:00:00'),
(53, 'c_o_a', 'treeview', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(54, 'debit_voucher', 'debit_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(55, 'credit_voucher', 'credit_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(56, 'contra_voucher', 'contra_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(57, 'journal_voucher', 'journal_voucher', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(58, 'voucher_approval', 'voucher_approval', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(59, 'account_report', '', 'accounts', 0, 0, 2, '2018-12-17 00:00:00'),
(60, 'voucher_report', 'coa', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(61, 'cash_book', 'cash_book', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(62, 'bank_book', 'bank_book', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(63, 'general_ledger', 'general_ledger', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(64, 'trial_balance', 'trial_balance', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(65, 'profit_loss', 'profit_loss_report', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(66, 'cash_flow', 'cash_flow_report', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(67, 'coa_print', 'coa_print', 'accounts', 59, 0, 2, '2018-12-17 00:00:00'),
(68, 'hrm', '', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(69, 'attendance', 'Home', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(70, 'atn_form', 'atnview', 'hrm', 69, 0, 2, '2018-12-18 00:00:00'),
(71, 'atn_report', 'attendance_list', 'hrm', 69, 0, 2, '2018-12-18 00:00:00'),
(72, 'award', 'Award_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(73, 'new_award', 'create_award', 'hrm', 72, 0, 2, '2018-12-18 00:00:00'),
(74, 'circularprocess', 'Candidate', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(75, 'add_canbasic_info', 'caninfo_create', 'hrm', 74, 0, 2, '2018-12-18 00:00:00'),
(76, 'can_basicinfo_list', 'canInfoview', 'hrm', 74, 0, 2, '2018-12-18 00:00:00'),
(77, 'candidate_basic_info', 'Candidate_select', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(78, 'candidate_shortlist', 'shortlist_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(79, 'candidate_interview', 'interview_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(80, 'candidate_selection', 'selection_form', 'hrm', 77, 0, 2, '2018-12-18 00:00:00'),
(81, 'department', 'Department_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(82, 'departmentfrm', 'create_dept', 'hrm', 81, 0, 2, '2018-12-18 00:00:00'),
(83, 'division', 'Division_controller', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(84, 'add_division', 'division_form', 'hrm', 83, 0, 2, '2018-12-18 00:00:00'),
(85, 'division_list', '', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(86, 'position', 'position_form', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(87, 'Direct_Empl', '', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(88, 'add_employee', 'employ_form', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(89, 'manage_employee', 'employee_view', 'hrm', 87, 0, 2, '2018-12-18 00:00:00'),
(90, 'emp_performance', 'emp_performance_form', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(91, 'emp_sal_payment', 'paymentview', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(92, 'leave', 'leave', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(93, 'weekly_holiday', 'weeklyform', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(94, 'holiday', 'holiday_form', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(95, 'others_leave_application', 'others_leave', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(96, 'add_leave_type', 'leave_type_form', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(97, 'leave_application', 'others_leave', 'hrm', 92, 0, 2, '2018-12-18 00:00:00'),
(98, 'loan', 'loan', 'hrm', 0, 0, 2, '2018-12-18 00:00:00'),
(99, 'loan_grand', 'create_grandloan', 'hrm', 98, 0, 2, '2018-12-18 00:00:00'),
(100, 'loan_installment', 'create_installment', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(101, 'manage_installment', 'installmentView', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(102, 'manage_granted_loan', 'loan_view', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(103, 'loan_report', 'loan_report', 'hrm', 98, 0, 2, '2018-12-19 00:00:00'),
(104, 'payroll', 'Payroll', 'hrm', 0, 0, 2, '2018-12-19 00:00:00'),
(105, 'salary_type_setup', 'create_salary_setup', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(106, 'manage_salary_setup', 'emp_salary_setup_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(107, 'salary_setup', 'create_s_setup', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(108, 'manage_salary_type', 'salary_setup_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(109, 'salary_generate', 'create_salary_generate', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(110, 'manage_salary_generate', 'salary_generate_view', 'hrm', 104, 0, 2, '2018-12-19 00:00:00'),
(111, 'purchase_return', 'return_form', 'purchase', 40, 0, 2, '2018-12-19 00:00:00'),
(112, 'return_invoice', 'return_invoice', 'purchase', 40, 0, 2, '2018-12-19 00:00:00'),
(113, 'report', 'reports', 'report', 0, 0, 2, '2018-12-19 00:00:00'),
(114, 'purchase_report', 'index', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(115, 'stock_report_product_wise', 'productwise', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(116, 'purchase_report_ingredient', 'ingredientwise', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(117, 'sell_report', 'sellrpt', 'report', 113, 0, 2, '2018-12-19 00:00:00'),
(118, 'table_setting', 'tablesetting', 'setting', 44, 0, 2, '2018-12-19 00:00:00'),
(119, 'customer_type', '', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(120, 'customertype_list', 'customertype', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(121, 'add_type', 'create', 'setting', 120, 0, 2, '2018-12-19 00:00:00'),
(122, 'currency', '', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(123, 'currency_list', 'currency', 'setting', 0, 0, 2, '2018-12-19 00:00:00'),
(124, 'currency_add', 'create', 'setting', 123, 0, 2, '2018-12-19 00:00:00'),
(125, 'production', '', 'production', 0, 0, 2, '2018-12-19 00:00:00'),
(126, 'production_set_list', 'production', 'production', 0, 0, 2, '2018-12-19 00:00:00'),
(127, 'set_productionunit', 'productionunit', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(128, 'production_add', 'create', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(129, 'production_list', 'addproduction', 'production', 126, 0, 2, '2018-12-19 00:00:00'),
(130, 'reservation', '', 'reservation', 0, 0, 2, '2018-12-19 00:00:00'),
(131, 'reservation_table', 'tablebooking', 'reservation', 130, 0, 2, '2018-12-19 00:00:00'),
(132, 'update_ord', 'updateorder', 'ordermanage', 45, 0, 2, '2019-12-11 00:00:00'),
(133, 'kitchen_dashboard', 'kitchen', 'ordermanage', 45, 0, 2, '2020-02-13 00:00:00'),
(134, 'counter_dashboard', 'counterboard', 'ordermanage', 45, 0, 2, '2020-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_permission`
--

CREATE TABLE `sec_role_permission` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `can_access` tinyint(1) NOT NULL,
  `can_create` tinyint(1) NOT NULL,
  `can_edit` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_role_permission`
--

INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES
(1, 1, 53, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(2, 1, 54, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(3, 1, 55, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(4, 1, 56, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(5, 1, 57, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(6, 1, 58, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(7, 1, 59, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(8, 1, 60, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(9, 1, 61, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(10, 1, 62, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(11, 1, 63, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(12, 1, 64, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(13, 1, 65, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(14, 1, 66, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(15, 1, 67, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(16, 1, 68, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(17, 1, 69, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(18, 1, 70, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(19, 1, 71, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(20, 1, 72, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(21, 1, 73, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(22, 1, 74, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(23, 1, 75, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(24, 1, 76, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(25, 1, 77, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(26, 1, 78, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(27, 1, 79, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(28, 1, 80, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(29, 1, 81, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(30, 1, 82, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(31, 1, 83, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(32, 1, 84, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(33, 1, 85, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(34, 1, 86, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(35, 1, 87, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(36, 1, 88, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(37, 1, 89, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(38, 1, 90, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(39, 1, 91, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(40, 1, 92, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(41, 1, 93, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(42, 1, 94, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(43, 1, 95, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(44, 1, 96, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(45, 1, 97, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(46, 1, 98, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(47, 1, 99, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(48, 1, 100, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(49, 1, 101, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(50, 1, 102, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(51, 1, 103, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(52, 1, 104, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(53, 1, 105, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(54, 1, 106, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(55, 1, 107, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(56, 1, 108, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(57, 1, 109, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(58, 1, 110, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(59, 1, 1, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(60, 1, 2, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(61, 1, 3, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(62, 1, 4, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(63, 1, 5, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(64, 1, 6, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(65, 1, 7, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(66, 1, 8, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(67, 1, 9, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(68, 1, 10, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(69, 1, 11, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(70, 1, 12, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(71, 1, 13, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(72, 1, 20, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(73, 1, 21, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(74, 1, 45, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(75, 1, 46, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(76, 1, 47, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(77, 1, 48, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(78, 1, 49, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(79, 1, 50, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(80, 1, 51, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(81, 1, 52, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(82, 1, 132, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(83, 1, 133, 1, 1, 1, 1, 2, '2020-10-12 10:27:03'),
(84, 1, 134, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(85, 1, 125, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(86, 1, 126, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(87, 1, 127, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(88, 1, 128, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(89, 1, 129, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(90, 1, 40, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(91, 1, 41, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(92, 1, 111, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(93, 1, 112, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(94, 1, 113, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(95, 1, 114, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(96, 1, 115, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(97, 1, 116, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(98, 1, 117, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(99, 1, 130, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(100, 1, 131, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(101, 1, 28, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(102, 1, 29, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(103, 1, 30, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(104, 1, 31, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(105, 1, 32, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(106, 1, 33, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(107, 1, 34, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(108, 1, 35, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(109, 1, 36, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(110, 1, 37, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(111, 1, 38, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(112, 1, 39, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(113, 1, 42, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(114, 1, 43, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(115, 1, 44, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(116, 1, 118, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(117, 1, 119, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(118, 1, 120, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(119, 1, 121, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(120, 1, 122, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(121, 1, 123, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(122, 1, 124, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(123, 1, 14, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(124, 1, 15, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(125, 1, 16, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(126, 1, 17, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(127, 1, 18, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(128, 1, 19, 0, 0, 0, 0, 2, '2020-10-12 10:27:03'),
(129, 2, 53, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(130, 2, 54, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(131, 2, 55, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(132, 2, 56, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(133, 2, 57, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(134, 2, 58, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(135, 2, 59, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(136, 2, 60, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(137, 2, 61, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(138, 2, 62, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(139, 2, 63, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(140, 2, 64, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(141, 2, 65, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(142, 2, 66, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(143, 2, 67, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(144, 2, 68, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(145, 2, 69, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(146, 2, 70, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(147, 2, 71, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(148, 2, 72, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(149, 2, 73, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(150, 2, 74, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(151, 2, 75, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(152, 2, 76, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(153, 2, 77, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(154, 2, 78, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(155, 2, 79, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(156, 2, 80, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(157, 2, 81, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(158, 2, 82, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(159, 2, 83, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(160, 2, 84, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(161, 2, 85, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(162, 2, 86, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(163, 2, 87, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(164, 2, 88, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(165, 2, 89, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(166, 2, 90, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(167, 2, 91, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(168, 2, 92, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(169, 2, 93, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(170, 2, 94, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(171, 2, 95, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(172, 2, 96, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(173, 2, 97, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(174, 2, 98, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(175, 2, 99, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(176, 2, 100, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(177, 2, 101, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(178, 2, 102, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(179, 2, 103, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(180, 2, 104, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(181, 2, 105, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(182, 2, 106, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(183, 2, 107, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(184, 2, 108, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(185, 2, 109, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(186, 2, 110, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(187, 2, 1, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(188, 2, 2, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(189, 2, 3, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(190, 2, 4, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(191, 2, 5, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(192, 2, 6, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(193, 2, 7, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(194, 2, 8, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(195, 2, 9, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(196, 2, 10, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(197, 2, 11, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(198, 2, 12, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(199, 2, 13, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(200, 2, 20, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(201, 2, 21, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(202, 2, 45, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(203, 2, 46, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(204, 2, 47, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(205, 2, 48, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(206, 2, 49, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(207, 2, 50, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(208, 2, 51, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(209, 2, 52, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(210, 2, 132, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(211, 2, 133, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(212, 2, 134, 1, 1, 1, 1, 2, '2020-10-12 10:27:45'),
(213, 2, 125, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(214, 2, 126, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(215, 2, 127, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(216, 2, 128, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(217, 2, 129, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(218, 2, 40, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(219, 2, 41, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(220, 2, 111, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(221, 2, 112, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(222, 2, 113, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(223, 2, 114, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(224, 2, 115, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(225, 2, 116, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(226, 2, 117, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(227, 2, 130, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(228, 2, 131, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(229, 2, 28, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(230, 2, 29, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(231, 2, 30, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(232, 2, 31, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(233, 2, 32, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(234, 2, 33, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(235, 2, 34, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(236, 2, 35, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(237, 2, 36, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(238, 2, 37, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(239, 2, 38, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(240, 2, 39, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(241, 2, 42, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(242, 2, 43, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(243, 2, 44, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(244, 2, 118, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(245, 2, 119, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(246, 2, 120, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(247, 2, 121, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(248, 2, 122, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(249, 2, 123, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(250, 2, 124, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(251, 2, 14, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(252, 2, 15, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(253, 2, 16, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(254, 2, 17, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(255, 2, 18, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(256, 2, 19, 0, 0, 0, 0, 2, '2020-10-12 10:27:45'),
(257, 3, 53, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(258, 3, 54, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(259, 3, 55, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(260, 3, 56, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(261, 3, 57, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(262, 3, 58, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(263, 3, 59, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(264, 3, 60, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(265, 3, 61, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(266, 3, 62, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(267, 3, 63, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(268, 3, 64, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(269, 3, 65, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(270, 3, 66, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(271, 3, 67, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(272, 3, 68, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(273, 3, 69, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(274, 3, 70, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(275, 3, 71, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(276, 3, 72, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(277, 3, 73, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(278, 3, 74, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(279, 3, 75, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(280, 3, 76, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(281, 3, 77, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(282, 3, 78, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(283, 3, 79, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(284, 3, 80, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(285, 3, 81, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(286, 3, 82, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(287, 3, 83, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(288, 3, 84, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(289, 3, 85, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(290, 3, 86, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(291, 3, 87, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(292, 3, 88, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(293, 3, 89, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(294, 3, 90, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(295, 3, 91, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(296, 3, 92, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(297, 3, 93, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(298, 3, 94, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(299, 3, 95, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(300, 3, 96, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(301, 3, 97, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(302, 3, 98, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(303, 3, 99, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(304, 3, 100, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(305, 3, 101, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(306, 3, 102, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(307, 3, 103, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(308, 3, 104, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(309, 3, 105, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(310, 3, 106, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(311, 3, 107, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(312, 3, 108, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(313, 3, 109, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(314, 3, 110, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(315, 3, 1, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(316, 3, 2, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(317, 3, 3, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(318, 3, 4, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(319, 3, 5, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(320, 3, 6, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(321, 3, 7, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(322, 3, 8, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(323, 3, 9, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(324, 3, 10, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(325, 3, 11, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(326, 3, 12, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(327, 3, 13, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(328, 3, 20, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(329, 3, 21, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(330, 3, 45, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(331, 3, 46, 1, 1, 1, 1, 2, '2020-10-12 10:29:13'),
(332, 3, 47, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(333, 3, 48, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(334, 3, 49, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(335, 3, 50, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(336, 3, 51, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(337, 3, 52, 1, 1, 1, 1, 2, '2020-10-12 10:29:13'),
(338, 3, 132, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(339, 3, 133, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(340, 3, 134, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(341, 3, 125, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(342, 3, 126, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(343, 3, 127, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(344, 3, 128, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(345, 3, 129, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(346, 3, 40, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(347, 3, 41, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(348, 3, 111, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(349, 3, 112, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(350, 3, 113, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(351, 3, 114, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(352, 3, 115, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(353, 3, 116, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(354, 3, 117, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(355, 3, 130, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(356, 3, 131, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(357, 3, 28, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(358, 3, 29, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(359, 3, 30, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(360, 3, 31, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(361, 3, 32, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(362, 3, 33, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(363, 3, 34, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(364, 3, 35, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(365, 3, 36, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(366, 3, 37, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(367, 3, 38, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(368, 3, 39, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(369, 3, 42, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(370, 3, 43, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(371, 3, 44, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(372, 3, 118, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(373, 3, 119, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(374, 3, 120, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(375, 3, 121, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(376, 3, 122, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(377, 3, 123, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(378, 3, 124, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(379, 3, 14, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(380, 3, 15, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(381, 3, 16, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(382, 3, 17, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(383, 3, 18, 0, 0, 0, 0, 2, '2020-10-12 10:29:13'),
(384, 3, 19, 0, 0, 0, 0, 2, '2020-10-12 10:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_tbl`
--

CREATE TABLE `sec_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `role_description` text NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_role_tbl`
--

INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES
(1, 'kitchen', 'manage kitchen', 2, '2020-10-12 10:27:03', 1),
(2, 'Counter', 'Display Order timing', 2, '2020-10-12 10:27:45', 1),
(3, 'Waiter', 'Order Taken and served food', 2, '2020-10-12 10:29:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sec_user_access_tbl`
--

CREATE TABLE `sec_user_access_tbl` (
  `role_acc_id` int(11) NOT NULL,
  `fk_role_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `storename` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `logoweb` varchar(255) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `opentime` varchar(255) DEFAULT NULL,
  `closetime` varchar(255) DEFAULT NULL,
  `vat` int(11) NOT NULL DEFAULT 0,
  `discount_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=amount,1=percent',
  `servicecharge` decimal(10,0) NOT NULL DEFAULT 0,
  `service_chargeType` int(11) NOT NULL DEFAULT 0 COMMENT '0=amount,1=percent',
  `currency` int(11) DEFAULT 0,
  `min_prepare_time` varchar(50) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `dateformat` text NOT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `powerbytxt` text DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `storename`, `address`, `email`, `phone`, `logo`, `logoweb`, `favicon`, `opentime`, `closetime`, `vat`, `discount_type`, `servicecharge`, `service_chargeType`, `currency`, `min_prepare_time`, `language`, `timezone`, `dateformat`, `site_align`, `powerbytxt`, `footer_text`) VALUES
(2, 'Bhojon Restaurant', 'Dhaka Restaurant', '98 Green Road, Farmgate, Dhaka-1215.', 'bdtask@gmail.com', '0123456789', 'assets/img/icons/2019-10-29/h.png', NULL, 'assets/img/icons/m.png', '9:00AM', '10:00PM', 15, 1, '20', 0, 2, '1:00 Hour', 'english', 'Asia/Dhaka', 'd/m/Y', 'LTR', 'Powered By: BDTASK, www.bdtask.com\r\n', '2017©Copyright');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `ship_id` int(11) NOT NULL,
  `shipping_method` varchar(150) NOT NULL,
  `shippingrate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`ship_id`, `shipping_method`, `shippingrate`, `is_active`) VALUES
(1, 'Home Delivary', '60.00', 1),
(2, 'Pickup', '0.00', 1),
(3, 'In the restaurant', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_configuration`
--

CREATE TABLE `sms_configuration` (
  `id` int(11) NOT NULL,
  `link` text NOT NULL,
  `gateway` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sms_from` varchar(200) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_configuration`
--

INSERT INTO `sms_configuration` (`id`, `link`, `gateway`, `user_name`, `password`, `sms_from`, `userid`, `status`) VALUES
(1, 'http://smsrank.com/', 'SMS Rank', 'rabbani', '123456', 'smsrank', '', 1),
(2, 'https://www.nexmo.com/', 'nexmo', '50489b88', 'z1cBmtrDeQrOaqhg', 'restaurant', '', 0),
(3, 'https://www.budgetsms.net/', 'budgetsms', 'user1', '1e753da74', 'budgetsms', '21547', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE `sms_template` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `default_status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`id`, `template_name`, `message`, `type`, `status`, `default_status`, `created_at`, `updated_at`) VALUES
(1, 'one', 'your Order {id} is cancel for some reason.', 'Cancel', 0, 0, '2019-01-01 19:08:07', '0000-00-00 00:00:00'),
(2, 'two', 'your order {id} is completed', 'CompleteOrder', 0, 1, '2019-01-01 20:58:19', '0000-00-00 00:00:00'),
(3, 'three', 'your order {id} is processing', 'Processing', 0, 1, '2018-11-08 19:00:46', '0000-00-00 00:00:00'),
(8, 'four', 'Your Order Has been Placed Successfully.', 'Neworder', 1, 0, '2019-01-01 20:59:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_emaillist`
--

CREATE TABLE `subscribe_emaillist` (
  `emailid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dateinsert` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` int(11) NOT NULL,
  `suplier_code` varchar(255) NOT NULL,
  `supName` varchar(100) NOT NULL,
  `supEmail` varchar(100) NOT NULL,
  `supMobile` varchar(50) NOT NULL,
  `supAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `suplier_code`, `supName`, `supEmail`, `supMobile`, `supAddress`) VALUES
(1, 'sup_002', 'Supplier_1', '', '5486454', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_ledger`
--

CREATE TABLE `supplier_ledger` (
  `id` int(20) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `deposit_no` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `cheque_no` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `d_c` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_ledger`
--

INSERT INTO `supplier_ledger` (`id`, `transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`, `d_c`) VALUES
(1, 'sup_002', 1, 'Adjustment ', NULL, '0.00', 'Previous adjustment with software', 'NA', 'NA', '2020-09-08', 1, 'c'),
(5, '5463453254', 1, '5463453254', NULL, '50000.00', 'Purchase From Supplier. ', NULL, NULL, '2020-09-08', 1, 'd'),
(4, '5463453254', 1, '5463453254', NULL, '51200.00', '', NULL, NULL, '2020-09-08', 1, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `synchronizer_setting`
--

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `synchronizer_setting`
--

INSERT INTO `synchronizer_setting` (`id`, `hostname`, `username`, `password`, `port`, `debug`, `project_root`) VALUES
(8, '70.35.198.244', 'softest3bdtask', 'Ux5O~MBJ#odK', '21', 'true', './public_html/');

-- --------------------------------------------------------

--
-- Table structure for table `table_setting`
--

CREATE TABLE `table_setting` (
  `settingid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `iconpos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_setting`
--

INSERT INTO `table_setting` (`settingid`, `tableid`, `iconpos`) VALUES
(1, 2, 'position: relative; left: 289px; top: 21px;'),
(2, 4, 'position: relative; left: 137px; top: 94px;'),
(3, 3, 'position: relative; left: -98px; top: 126px;'),
(4, 1, 'position: relative; left: -93px; top: 3px;'),
(5, 8, 'position: relative; left: -274px; top: 51px;'),
(6, 6, 'position: relative; left: -203px; top: 176px;'),
(7, 5, 'position: relative; left: 322px; top: 160px;'),
(8, 7, 'position: relative; left: -481px; top: 204px;'),
(9, 9, 'position: relative; left: -474px; top: 95px;');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `reserveid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tableid` int(11) NOT NULL,
  `person_capicity` int(11) NOT NULL,
  `formtime` time NOT NULL,
  `totime` time NOT NULL,
  `reserveday` date NOT NULL,
  `customer_notes` text DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=free,2=booked',
  `notif` int(11) NOT NULL DEFAULT 0 COMMENT '0=unseen,1=seen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblserver`
--

CREATE TABLE `tblserver` (
  `serverid` int(11) NOT NULL,
  `localhost_url` varchar(255) NOT NULL,
  `online_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblserver`
--

INSERT INTO `tblserver` (`serverid`, `localhost_url`, `online_url`) VALUES
(1, 'http://localhost/restaurant_v2', 'http://soft14.bdtask.com/restaurant_v2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_kitchen`
--

CREATE TABLE `tbl_assign_kitchen` (
  `assignid` int(11) NOT NULL,
  `kitchen_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bankid` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(200) DEFAULT NULL,
  `ac_number` varchar(200) DEFAULT NULL,
  `branch` varchar(200) DEFAULT NULL,
  `signature_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bankid`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`) VALUES
(1, 'Dutch-Bangla Bank', 'Ainal Haque', '110535764655', 'Mirpur 10', './application/modules/hrm/assets/images/2020-01-18/c.jpg'),
(2, 'City Bank', 'Kamal Hassan', '3869583', 'Uttara', './application/modules/hrm/assets/images/2020-01-18/e.jpg'),
(3, 'Brac Bank', 'Robiul Islam', '9356346', 'Motijeel', './application/modules/hrm/assets/images/2020-01-18/f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billingaddress`
--

CREATE TABLE `tbl_billingaddress` (
  `billaddressid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `DateInserted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_terminal`
--

CREATE TABLE `tbl_card_terminal` (
  `card_terminalid` int(11) NOT NULL,
  `terminal_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_card_terminal`
--

INSERT INTO `tbl_card_terminal` (`card_terminalid`, `terminal_name`) VALUES
(1, 'Nexus Terminal'),
(2, 'Brac Bank Terminal'),
(3, 'Visa-Master Terminal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `cityid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `stateid` int(11) NOT NULL,
  `cityname` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `countryid` int(11) NOT NULL,
  `countryname` varchar(70) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`countryid`, `countryname`, `status`) VALUES
(1, 'Bangladesh', 1),
(2, 'United State', 1),
(3, 'United Kingdom', 1),
(4, 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generatedreport`
--

CREATE TABLE `tbl_generatedreport` (
  `generateid` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `saleinvoice` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cutomertype` int(11) NOT NULL,
  `isthirdparty` int(11) NOT NULL DEFAULT 0,
  `waiter_id` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `table_no` int(11) DEFAULT NULL,
  `tokenno` varchar(30) DEFAULT NULL,
  `totalamount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `customerpaid` decimal(10,2) DEFAULT 0.00,
  `customer_note` text DEFAULT NULL,
  `anyreason` text DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL,
  `nofification` int(11) NOT NULL,
  `orderacceptreject` int(11) DEFAULT NULL,
  `reportDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kitchen`
--

CREATE TABLE `tbl_kitchen` (
  `kitchenid` int(11) NOT NULL,
  `kitchen_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kitchen_order`
--

CREATE TABLE `tbl_kitchen_order` (
  `ktid` int(11) NOT NULL,
  `kitchenid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `varient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posetting`
--

CREATE TABLE `tbl_posetting` (
  `possettingid` int(11) NOT NULL,
  `waiter` int(11) NOT NULL DEFAULT 0 COMMENT '1=show,0=hide',
  `tableid` int(11) NOT NULL DEFAULT 0 COMMENT '1=show,0=hide',
  `cooktime` int(11) NOT NULL DEFAULT 0 COMMENT '1=enable,0=disable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_posetting`
--

INSERT INTO `tbl_posetting` (`possettingid`, `waiter`, `tableid`, `cooktime`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `ratingid` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `reviewtxt` text DEFAULT NULL,
  `proid` int(11) NOT NULL,
  `rating` decimal(10,2) NOT NULL DEFAULT 0.00,
  `status` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `ratetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seoption`
--

CREATE TABLE `tbl_seoption` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_slug` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_seoption`
--

INSERT INTO `tbl_seoption` (`id`, `title`, `title_slug`, `keywords`, `description`) VALUES
(1, 'Bhojon Home page', 'home', 'restaurant,food,reservation', 'Best Restautant Management Software'),
(3, 'Menu', 'menu', 'Desert,Meet,fish,meet,bevarage', 'Menu Page'),
(4, 'Food Details', 'food_details', 'Meet,solt', 'Details foodÂ  information'),
(5, 'Reservation', 'reservation', 'Table,booking,reservation', 'Table Reservation'),
(6, 'Cart Page', 'cart_page', 'food,menu', 'Cart Page'),
(7, 'Checkout', 'checkout', 'Checkout', 'Checkout'),
(8, 'Login', 'login', 'Login', 'Login'),
(9, 'Registration', 'registration', 'Registration', 'Registration'),
(10, 'Payment information', 'payment_information', 'Online Payment information', 'Payment information'),
(11, 'Stripe Payment information', 'stripe_payment_information', 'Stripe Payment', 'Stripe Payment information'),
(12, 'About us', 'about_us', 'About restaurant', 'About us'),
(13, 'Contact Us', 'contact_us', 'Contact Us', 'Contact Us'),
(14, 'Privacy Policy', 'privacy_policy', 'privacy', 'Privacy Policy'),
(15, 'Our Terms', 'our_terms', 'Our Terms', 'Our Terms'),
(16, 'My Profile', 'my_profile', 'My Profile', 'My Profile'),
(17, 'My Order List', 'my_order_list', 'My Order List', 'My Order List'),
(18, 'View Order', 'view_order', 'View Order', 'View Order'),
(19, 'My Reservation', 'my_reservation', 'My Reservation', 'My Reservation');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shippingaddress`
--

CREATE TABLE `tbl_shippingaddress` (
  `shipaddressid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `country` varchar(150) DEFAULT NULL,
  `zip` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `DateInserted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slid` int(11) NOT NULL,
  `Sltypeid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slink` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `delation_status` int(11) NOT NULL DEFAULT 0,
  `width` int(11) NOT NULL DEFAULT 0,
  `height` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slid`, `Sltypeid`, `title`, `subtitle`, `image`, `slink`, `status`, `delation_status`, `width`, `height`) VALUES
(1, 1, 'Welcome To', 'Book Your Table', '', '#', 1, 0, 1920, 902),
(2, 1, 'Find Your', 'Best Cafe Deals', '', '#', 1, 0, 1920, 902),
(3, 1, 'Exclusive', 'Coffee Shop', '', '#', 1, 0, 1920, 902),
(4, 2, 'Discover', 'OUR STORY', '', '#', 1, 0, 263, 332),
(5, 2, 'Discover', 'OUR STORY', '', '#', 1, 0, 263, 332),
(6, 3, 'Discover', 'OUR MENU', '', '#', 1, 0, 263, 332),
(7, 3, 'Discover', 'OUR MENU', '', '#', 1, 0, 263, 177),
(8, 3, 'Discover', 'OUR MENU', '', '#', 1, 0, 263, 177),
(9, 4, 'right', 'ads', '', '#', 1, 0, 252, 621);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_type`
--

CREATE TABLE `tbl_slider_type` (
  `stype_id` int(11) NOT NULL,
  `STypeName` varchar(255) DEFAULT NULL,
  `delation_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider_type`
--

INSERT INTO `tbl_slider_type` (`stype_id`, `STypeName`, `delation_status`) VALUES
(1, 'Home Top Slider', 0),
(2, 'Home our story', 0),
(3, 'Home our menu', 0),
(4, 'Menu Page right Banner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sociallink`
--

CREATE TABLE `tbl_sociallink` (
  `sid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `socialurl` text DEFAULT NULL,
  `icon` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sociallink`
--

INSERT INTO `tbl_sociallink` (`sid`, `title`, `socialurl`, `icon`, `status`) VALUES
(1, 'Facebook', 'https://www.facebook.com', 'fab fa-facebook', 1),
(2, 'Twitter', 'https://www.twitter.com', 'fab fa-twitter', 1),
(3, 'Google Plus', 'https://plus.google.com', 'fab fa-google-plus', 1),
(4, 'Pinterest', 'https://www.pinterest.com/', 'fab fa-pinterest', 1),
(6, 'Linkedin', 'https://linkedin.com', 'fab fa-linkedin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES
(1, 2, 'Alabama', 1),
(2, 2, 'Alaska', 1),
(3, 2, 'Arizona', 1),
(4, 2, 'Arkansas', 1),
(5, 2, 'California', 1),
(6, 2, 'Florida', 1),
(7, 2, 'New Mexico', 1),
(8, 2, 'New York', 1),
(9, 2, 'Oklahoma', 1),
(10, 2, 'Texas', 1),
(11, 2, 'Virginia', 1),
(12, 1, 'Dhaka', 1),
(13, 1, 'Chittagong', 1),
(14, 1, 'Rajshahi', 1),
(15, 1, 'Khulna', 1),
(16, 1, 'Sylhet', 1),
(17, 1, 'Barishal', 1),
(18, 1, 'Rangpur', 1),
(19, 1, 'Mymensingh', 1),
(20, 4, 'West Bengal', 1),
(21, 4, 'Uttar Pradesh', 1),
(22, 4, 'Tripura', 1),
(23, 4, 'Telangana', 1),
(24, 4, 'Tamil Nadu', 1),
(25, 4, 'Sikkim', 1),
(26, 4, 'Rajasthan', 1),
(27, 4, 'Punjab', 1),
(28, 4, 'Odisha', 1),
(29, 4, 'Nagaland', 1),
(30, 4, 'Kerala', 1),
(31, 4, 'Haryana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thirdparty_customer`
--

CREATE TABLE `tbl_thirdparty_customer` (
  `companyId` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `address` text DEFAULT NULL,
  `commision` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_thirdparty_customer`
--

INSERT INTO `tbl_thirdparty_customer` (`companyId`, `company_name`, `address`, `commision`) VALUES
(1, 'Food Panda', 'Dhaka', '5.00'),
(2, 'pathao', 'Dhaka', '8.00'),
(3, 'Hungrynaki', 'Dhaka', '5.00'),
(4, 'Foodmart', 'Dhaka', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `tokenid` int(11) NOT NULL,
  `tokencode` varchar(50) NOT NULL,
  `tokenrate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tokenstartdate` date NOT NULL,
  `tokenendate` date NOT NULL,
  `tokenstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_updateitems`
--

CREATE TABLE `tbl_updateitems` (
  `updateid` int(11) NOT NULL,
  `ordid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `qty` float NOT NULL,
  `adonsqty` varchar(50) DEFAULT NULL,
  `addonsid` varchar(50) DEFAULT NULL,
  `varientid` int(11) NOT NULL,
  `insertdate` date DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waiterappcart`
--

CREATE TABLE `tbl_waiterappcart` (
  `weaterappid` int(11) NOT NULL,
  `waiterid` int(11) NOT NULL,
  `alladdOnsName` varchar(255) DEFAULT NULL,
  `total_addonsprice` decimal(10,2) DEFAULT 0.00,
  `totaladdons` int(11) DEFAULT NULL,
  `addons_name` varchar(255) DEFAULT NULL,
  `addons_id` int(11) DEFAULT NULL,
  `addons_price` double(10,2) DEFAULT 0.00,
  `addonsQty` int(11) DEFAULT NULL,
  `component` varchar(255) DEFAULT NULL,
  `destcription` text DEFAULT NULL,
  `itemnotes` varchar(255) DEFAULT NULL,
  `offerIsavailable` int(11) DEFAULT 0,
  `offerstartdate` date DEFAULT '0000-00-00',
  `OffersRate` int(11) DEFAULT NULL,
  `offerendate` date DEFAULT '0000-00-00',
  `price` decimal(10,2) DEFAULT 0.00,
  `ProductsID` int(11) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `productvat` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `variantName` varchar(255) NOT NULL,
  `variantid` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_widget`
--

CREATE TABLE `tbl_widget` (
  `widgetid` int(11) NOT NULL,
  `widget_name` varchar(100) NOT NULL,
  `widget_title` varchar(150) DEFAULT NULL,
  `widget_desc` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_widget`
--

INSERT INTO `tbl_widget` (`widgetid`, `widget_name`, `widget_title`, `widget_desc`, `status`) VALUES
(1, 'Footer left', '', '<p class=\"text-justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard.</p>', 1),
(2, 'footermiddle', 'Opening Time', '<p><strong>Monday - Wednesday</strong> 10:00 AM - 7:00 PM</p>\r\n<p><strong>Thursday - Friday</strong> 10:00 AM - 11:00 PM</p>\r\n<p><strong>Saturday</strong> 12:00 PM - 6:00 PM</p>\r\n<p><strong>Sunday</strong> Off</p>', 1),
(3, 'Footer right', 'Contact Us', '<p>356, Mannan Plaza ( 4th Floar ) Khilkhet Dhaka</p>\r\n<p><a href=\"../../hungry\">support@bdtask.com</a></p>\r\n<p><a href=\"../../hungry\">+88 01715 222 333</a></p>', 1),
(4, 'Our Store', 'Our Store', '<address>123 Suspendis matti,&nbsp;<br />Visaosang Building VST District,&nbsp;<br />NY Accums, North American</address>\r\n<p><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">0123-456-78910</a><a class=\"d-block\" href=\"http://soft9.bdtask.com/hungry-v1/\">support@domain.com</a></p>', 1),
(6, 'Reservation', 'BOOK YOUR TABLE', '<p>Integer vitae enim vel nisi feugiat ultricies. Phasellus hendrerit pharetra posuere. In hac habitasse platea dictumst. Integer diam nulla,</p>', 1),
(7, 'Our Menu text', 'Our Menu ', '<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>', 1),
(8, 'Specials', 'FOOD MENU', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The</p>', 1),
(9, 'story text', 'OUR STORY', '<p>Rosa is a restaurant, bar and coffee roastery located on a busy corner site in Farringdon\'s Exmouth Market. With glazed frontage on two sides of the building, overlooking the market and a bustling London inteon.</p>', 1),
(10, 'Professional', 'OUR EXPERT CHEFS', '', 1),
(11, 'Need Help Booking?', 'Need Help Booking?', '<p class=\"mb-2\">Just call our customer services at any time, we are waiting 24 hours to recieve your calls.</p>\r\n<p><a href=\"#\">+880 1712 123 123</a></p>', 1),
(12, 'Privacy', 'Privacy Policy', '<h2>What is Lorem Ipsum</h2>\r\n<p>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<h3>Contacting us :</h3>\r\n<p>If you have any questions about this Privacy Policy, the practices of this site, or your dealings with this site, please contact us.</p>', 1),
(13, 'termscondition', 'Terms of Use', '<h3>Web browser cookies</h3>\r\n<p>Our Site may use cache and \"cookies\" to enhance User experience. User\'s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</p>\r\n<h3>How we use collected information bdtask may collect and use Users personal information for the following purposes:</h3>\r\n<p>To run and operate our Site We may need your information display content on the Site correctly. To improve customer service Information you provide helps us respond to your customer service requests and support needs more efficiently. To personalize user experience We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site. To improve our Site We may use feedback you provide to improve our products and services. To run a promotion, contest, survey or other Site feature To send Users information they agreed to receive about topics we think will be of interest to them. To send periodic emails We may use the email address to send User information and updates pertaining to their order. It may also be used to respond to their inquiries, questions, and/or other requests.</p>', 1),
(14, 'map', 'Google Map', '<p>&lt;iframe style=\"border: 0;\" src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14599.578237069936!2d90.3654215!3d23.8223482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1583411739085!5m2!1sen!2sbd\" width=\"300\" height=\"150\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"&gt;&lt;/iframe&gt;</p>', 1),
(15, 'carousal1', 'carousal', '<p>show</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `top_menu`
--

CREATE TABLE `top_menu` (
  `menuid` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `menu_slug` varchar(70) NOT NULL,
  `parentid` int(11) NOT NULL,
  `entrydate` date NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top_menu`
--

INSERT INTO `top_menu` (`menuid`, `menu_name`, `menu_slug`, `parentid`, `entrydate`, `isactive`) VALUES
(1, 'Home', 'home', 0, '2019-12-31', 1),
(2, 'Reservation', 'reservation', 0, '2019-02-20', 1),
(3, 'Menu', 'menu', 0, '2019-01-26', 1),
(4, 'About Us', 'about', 0, '2019-11-25', 1),
(5, 'Contact Us', 'contact', 0, '2019-01-26', 1),
(6, 'Pages', 'pages', 0, '2019-11-28', 1),
(7, 'Cart', 'cart', 6, '2019-01-26', 1),
(8, 'Details', 'details', 7, '2020-01-15', 1),
(9, 'Logout', 'logout', 6, '2019-02-03', 1),
(10, 'My Profile', 'myprofile', 0, '2019-10-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit_of_measurement`
--

CREATE TABLE `unit_of_measurement` (
  `id` int(11) NOT NULL,
  `uom_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uom_short_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit_of_measurement`
--

INSERT INTO `unit_of_measurement` (`id`, `uom_name`, `uom_short_code`, `is_active`) VALUES
(1, 'Kilogram', 'kg.', 1),
(2, 'Liter', 'ltr.', 1),
(3, 'Gram', 'grm.', 1),
(4, 'tonne', 'tn.', 1),
(5, 'milligram', 'mg.', 1),
(6, 'carat', 'carat', 1),
(7, 'Per Pieces', 'pcs', 1),
(8, 'Per Cup', 'cup', 1),
(9, 'Pound', 'pnd.', 1),
(10, 'tablespoon', 'tspoon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usedcoupon`
--

CREATE TABLE `usedcoupon` (
  `cusedid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `couponcode` varchar(100) NOT NULL,
  `couponrate` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `waiter_kitchenToken` text DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_reset_token` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(14) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `about`, `waiter_kitchenToken`, `email`, `password`, `password_reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `counter`, `status`, `is_admin`) VALUES
(2, 'John', 'Doe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '', 'admin@example.com', '1bbd886460827015e5d605ed44252251', '', './assets/img/user/m2.png', '2020-10-14 10:14:00', '2020-09-08 20:29:33', '::1', NULL, 1, 1),
(3, NULL, NULL, NULL, NULL, 'a@a.com', '1bbd886460827015e5d605ed44252251', NULL, NULL, '2020-12-20 15:21:28', NULL, '::1', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `variant`
--

CREATE TABLE `variant` (
  `variantid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  `variantName` varchar(120) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_holiday`
--

CREATE TABLE `weekly_holiday` (
  `wk_id` int(11) NOT NULL,
  `dayname` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weekly_holiday`
--

INSERT INTO `weekly_holiday` (`wk_id`, `dayname`) VALUES
(1, 'Friday,Satarday,Sunday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslog`
--
ALTER TABLE `accesslog`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `acc_account_name`
--
ALTER TABLE `acc_account_name`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `acc_coa`
--
ALTER TABLE `acc_coa`
  ADD PRIMARY KEY (`HeadName`);

--
-- Indexes for table `acc_customer_income`
--
ALTER TABLE `acc_customer_income`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_glsummarybalance`
--
ALTER TABLE `acc_glsummarybalance`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_income_expence`
--
ALTER TABLE `acc_income_expence`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  ADD PRIMARY KEY (`account_tran_id`);

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`add_on_id`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`award_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_card_payment`
--
ALTER TABLE `bill_card_payment`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `candidate_basic_info`
--
ALTER TABLE `candidate_basic_info`
  ADD PRIMARY KEY (`can_id`);

--
-- Indexes for table `candidate_education_info`
--
ALTER TABLE `candidate_education_info`
  ADD PRIMARY KEY (`can_edu_id`);

--
-- Indexes for table `candidate_interview`
--
ALTER TABLE `candidate_interview`
  ADD PRIMARY KEY (`can_int_id`);

--
-- Indexes for table `candidate_selection`
--
ALTER TABLE `candidate_selection`
  ADD PRIMARY KEY (`can_sel_id`);

--
-- Indexes for table `candidate_shortlist`
--
ALTER TABLE `candidate_shortlist`
  ADD PRIMARY KEY (`can_short_id`);

--
-- Indexes for table `candidate_workexperience`
--
ALTER TABLE `candidate_workexperience`
  ADD PRIMARY KEY (`can_workexp_id`);

--
-- Indexes for table `common_setting`
--
ALTER TABLE `common_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyid`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_membership_map`
--
ALTER TABLE `customer_membership_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`customer_type_id`);

--
-- Indexes for table `custom_table`
--
ALTER TABLE `custom_table`
  ADD PRIMARY KEY (`custom_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `duty_type`
--
ALTER TABLE `duty_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_config`
--
ALTER TABLE `email_config`
  ADD PRIMARY KEY (`email_config_id`);

--
-- Indexes for table `employee_benifit`
--
ALTER TABLE `employee_benifit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`emp_his_id`);

--
-- Indexes for table `employee_performance`
--
ALTER TABLE `employee_performance`
  ADD PRIMARY KEY (`emp_per_id`);

--
-- Indexes for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  ADD PRIMARY KEY (`emp_sal_pay_id`);

--
-- Indexes for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  ADD PRIMARY KEY (`e_s_s_id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_item`
--
ALTER TABLE `expense_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodvariable`
--
ALTER TABLE `foodvariable`
  ADD PRIMARY KEY (`availableID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grand_loan`
--
ALTER TABLE `grand_loan`
  ADD PRIMARY KEY (`loan_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `item_foods`
--
ALTER TABLE `item_foods`
  ADD PRIMARY KEY (`ProductsID`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_apply`
--
ALTER TABLE `leave_apply`
  ADD PRIMARY KEY (`leave_appl_id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leave_type_id`);

--
-- Indexes for table `loan_installment`
--
ALTER TABLE `loan_installment`
  ADD PRIMARY KEY (`loan_inst_id`);

--
-- Indexes for table `marital_info`
--
ALTER TABLE `marital_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_add_on`
--
ALTER TABLE `menu_add_on`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `multipay_bill`
--
ALTER TABLE `multipay_bill`
  ADD PRIMARY KEY (`multipay_id`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`row_id`);

--
-- Indexes for table `paymentsetup`
--
ALTER TABLE `paymentsetup`
  ADD PRIMARY KEY (`setupid`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`);

--
-- Indexes for table `payroll_holiday`
--
ALTER TABLE `payroll_holiday`
  ADD PRIMARY KEY (`payrl_holi_id`);

--
-- Indexes for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  ADD PRIMARY KEY (`tax_setup_id`);

--
-- Indexes for table `pay_frequency`
--
ALTER TABLE `pay_frequency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`productionid`);

--
-- Indexes for table `production_details`
--
ALTER TABLE `production_details`
  ADD PRIMARY KEY (`pro_detailsid`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchaseitem`
--
ALTER TABLE `purchaseitem`
  ADD PRIMARY KEY (`purID`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`detailsid`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`preturn_id`);

--
-- Indexes for table `rate_type`
--
ALTER TABLE `rate_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rest_table`
--
ALTER TABLE `rest_table`
  ADD PRIMARY KEY (`tableid`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`role_id`);

--
-- Indexes for table `salary_setup_header`
--
ALTER TABLE `salary_setup_header`
  ADD PRIMARY KEY (`s_s_h_id`);

--
-- Indexes for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  ADD PRIMARY KEY (`ssg_id`);

--
-- Indexes for table `salary_type`
--
ALTER TABLE `salary_type`
  ADD PRIMARY KEY (`salary_type_id`);

--
-- Indexes for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  ADD PRIMARY KEY (`role_acc_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_template`
--
ALTER TABLE `sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe_emaillist`
--
ALTER TABLE `subscribe_emaillist`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`reserveid`);

--
-- Indexes for table `tblserver`
--
ALTER TABLE `tblserver`
  ADD PRIMARY KEY (`serverid`);

--
-- Indexes for table `tbl_assign_kitchen`
--
ALTER TABLE `tbl_assign_kitchen`
  ADD PRIMARY KEY (`assignid`);

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `tbl_billingaddress`
--
ALTER TABLE `tbl_billingaddress`
  ADD PRIMARY KEY (`billaddressid`);

--
-- Indexes for table `tbl_card_terminal`
--
ALTER TABLE `tbl_card_terminal`
  ADD PRIMARY KEY (`card_terminalid`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `tbl_generatedreport`
--
ALTER TABLE `tbl_generatedreport`
  ADD PRIMARY KEY (`generateid`);

--
-- Indexes for table `tbl_kitchen`
--
ALTER TABLE `tbl_kitchen`
  ADD PRIMARY KEY (`kitchenid`);

--
-- Indexes for table `tbl_kitchen_order`
--
ALTER TABLE `tbl_kitchen_order`
  ADD PRIMARY KEY (`ktid`);

--
-- Indexes for table `tbl_posetting`
--
ALTER TABLE `tbl_posetting`
  ADD PRIMARY KEY (`possettingid`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`ratingid`);

--
-- Indexes for table `tbl_seoption`
--
ALTER TABLE `tbl_seoption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shippingaddress`
--
ALTER TABLE `tbl_shippingaddress`
  ADD PRIMARY KEY (`shipaddressid`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  ADD PRIMARY KEY (`stype_id`);

--
-- Indexes for table `tbl_sociallink`
--
ALTER TABLE `tbl_sociallink`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `tbl_thirdparty_customer`
--
ALTER TABLE `tbl_thirdparty_customer`
  ADD PRIMARY KEY (`companyId`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`tokenid`);

--
-- Indexes for table `tbl_updateitems`
--
ALTER TABLE `tbl_updateitems`
  ADD PRIMARY KEY (`updateid`);

--
-- Indexes for table `tbl_waiterappcart`
--
ALTER TABLE `tbl_waiterappcart`
  ADD PRIMARY KEY (`weaterappid`);

--
-- Indexes for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  ADD PRIMARY KEY (`widgetid`);

--
-- Indexes for table `top_menu`
--
ALTER TABLE `top_menu`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usedcoupon`
--
ALTER TABLE `usedcoupon`
  ADD PRIMARY KEY (`cusedid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`variantid`);

--
-- Indexes for table `weekly_holiday`
--
ALTER TABLE `weekly_holiday`
  ADD PRIMARY KEY (`wk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslog`
--
ALTER TABLE `accesslog`
  MODIFY `sl_no` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_account_name`
--
ALTER TABLE `acc_account_name`
  MODIFY `account_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `acc_customer_income`
--
ALTER TABLE `acc_customer_income`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_glsummarybalance`
--
ALTER TABLE `acc_glsummarybalance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_income_expence`
--
ALTER TABLE `acc_income_expence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_transaction`
--
ALTER TABLE `acc_transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acn_account_transaction`
--
ALTER TABLE `acn_account_transaction`
  MODIFY `account_tran_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `add_on_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `award`
--
ALTER TABLE `award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_card_payment`
--
ALTER TABLE `bill_card_payment`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_education_info`
--
ALTER TABLE `candidate_education_info`
  MODIFY `can_edu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_interview`
--
ALTER TABLE `candidate_interview`
  MODIFY `can_int_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_selection`
--
ALTER TABLE `candidate_selection`
  MODIFY `can_sel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_shortlist`
--
ALTER TABLE `candidate_shortlist`
  MODIFY `can_short_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_workexperience`
--
ALTER TABLE `candidate_workexperience`
  MODIFY `can_workexp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_setting`
--
ALTER TABLE `common_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_membership_map`
--
ALTER TABLE `customer_membership_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_type`
--
ALTER TABLE `customer_type`
  MODIFY `customer_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `custom_table`
--
ALTER TABLE `custom_table`
  MODIFY `custom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `duty_type`
--
ALTER TABLE `duty_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_config`
--
ALTER TABLE `email_config`
  MODIFY `email_config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_benifit`
--
ALTER TABLE `employee_benifit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `emp_his_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `emp_per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_payment`
--
ALTER TABLE `employee_salary_payment`
  MODIFY `emp_sal_pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_salary_setup`
--
ALTER TABLE `employee_salary_setup`
  MODIFY `e_s_s_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `att_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_item`
--
ALTER TABLE `expense_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foodvariable`
--
ALTER TABLE `foodvariable`
  MODIFY `availableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grand_loan`
--
ALTER TABLE `grand_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_foods`
--
ALTER TABLE `item_foods`
  MODIFY `ProductsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1257;

--
-- AUTO_INCREMENT for table `leave_apply`
--
ALTER TABLE `leave_apply`
  MODIFY `leave_appl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leave_type_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_installment`
--
ALTER TABLE `loan_installment`
  MODIFY `loan_inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marital_info`
--
ALTER TABLE `marital_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_add_on`
--
ALTER TABLE `menu_add_on`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `multipay_bill`
--
ALTER TABLE `multipay_bill`
  MODIFY `multipay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `row_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentsetup`
--
ALTER TABLE `paymentsetup`
  MODIFY `setupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payroll_holiday`
--
ALTER TABLE `payroll_holiday`
  MODIFY `payrl_holi_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_tax_setup`
--
ALTER TABLE `payroll_tax_setup`
  MODIFY `tax_setup_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_frequency`
--
ALTER TABLE `pay_frequency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `pos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `productionid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_details`
--
ALTER TABLE `production_details`
  MODIFY `pro_detailsid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseitem`
--
ALTER TABLE `purchaseitem`
  MODIFY `purID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `preturn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_type`
--
ALTER TABLE `rate_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rest_table`
--
ALTER TABLE `rest_table`
  MODIFY `tableid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_setup_header`
--
ALTER TABLE `salary_setup_header`
  MODIFY `s_s_h_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_sheet_generate`
--
ALTER TABLE `salary_sheet_generate`
  MODIFY `ssg_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_type`
--
ALTER TABLE `salary_type`
  MODIFY `salary_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  MODIFY `role_acc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_template`
--
ALTER TABLE `sms_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscribe_emaillist`
--
ALTER TABLE `subscribe_emaillist`
  MODIFY `emailid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_ledger`
--
ALTER TABLE `supplier_ledger`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `settingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `reserveid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblserver`
--
ALTER TABLE `tblserver`
  MODIFY `serverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assign_kitchen`
--
ALTER TABLE `tbl_assign_kitchen`
  MODIFY `assignid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bankid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_billingaddress`
--
ALTER TABLE `tbl_billingaddress`
  MODIFY `billaddressid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_card_terminal`
--
ALTER TABLE `tbl_card_terminal`
  MODIFY `card_terminalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_generatedreport`
--
ALTER TABLE `tbl_generatedreport`
  MODIFY `generateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kitchen`
--
ALTER TABLE `tbl_kitchen`
  MODIFY `kitchenid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kitchen_order`
--
ALTER TABLE `tbl_kitchen_order`
  MODIFY `ktid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_posetting`
--
ALTER TABLE `tbl_posetting`
  MODIFY `possettingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `ratingid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_seoption`
--
ALTER TABLE `tbl_seoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_shippingaddress`
--
ALTER TABLE `tbl_shippingaddress`
  MODIFY `shipaddressid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_slider_type`
--
ALTER TABLE `tbl_slider_type`
  MODIFY `stype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sociallink`
--
ALTER TABLE `tbl_sociallink`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_thirdparty_customer`
--
ALTER TABLE `tbl_thirdparty_customer`
  MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `tokenid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_updateitems`
--
ALTER TABLE `tbl_updateitems`
  MODIFY `updateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_waiterappcart`
--
ALTER TABLE `tbl_waiterappcart`
  MODIFY `weaterappid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_widget`
--
ALTER TABLE `tbl_widget`
  MODIFY `widgetid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `top_menu`
--
ALTER TABLE `top_menu`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unit_of_measurement`
--
ALTER TABLE `unit_of_measurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usedcoupon`
--
ALTER TABLE `usedcoupon`
  MODIFY `cusedid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variant`
--
ALTER TABLE `variant`
  MODIFY `variantid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weekly_holiday`
--
ALTER TABLE `weekly_holiday`
  MODIFY `wk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

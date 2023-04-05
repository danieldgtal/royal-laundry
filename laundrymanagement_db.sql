-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 01:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundrymanagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_unit` int(11) NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Blouse', '2023-03-24 11:19:00', '2023-03-24 11:19:00'),
(2, 'Carpet', '2023-03-25 11:19:00', '2023-03-25 11:19:00'),
(3, 'Child', '2023-03-26 11:19:00', '2023-03-26 11:19:00'),
(4, 'Cobblers', '2023-03-27 11:19:00', '2023-03-27 11:19:00'),
(5, 'DC_Men_Natives', '2023-03-28 11:19:00', '2023-03-28 11:19:00'),
(6, 'DC_Skirts', '2023-03-29 11:19:00', '2023-03-29 11:19:00'),
(7, 'DC_Women_Natives', '2023-03-30 11:19:00', '2023-03-30 11:19:00'),
(8, 'Dress', '2023-03-31 11:19:00', '2023-03-31 11:19:00'),
(9, 'Express', '2023-04-01 11:19:00', '2023-04-01 11:19:00'),
(10, 'HouseHold', '2023-04-02 11:19:00', '2023-04-02 11:19:00'),
(11, 'Jacket', '2023-04-03 11:19:00', '2023-04-03 11:19:00'),
(12, 'Ladies_Pants', '2023-04-04 11:19:00', '2023-04-04 11:19:00'),
(13, 'Laundry', '2023-04-05 11:19:00', '2023-04-05 11:19:00'),
(14, 'LD_Men_Natives', '2023-04-06 11:19:00', '2023-04-06 11:19:00'),
(15, 'LD_Shirts', '2023-04-07 11:19:00', '2023-04-07 11:19:00'),
(16, 'LD_Women_Natives', '2023-04-08 11:19:00', '2023-04-08 11:19:00'),
(17, 'Men_Pants', '2023-04-09 11:19:00', '2023-04-09 11:19:00'),
(18, 'Men_Suits', '2023-04-10 11:19:00', '2023-04-10 11:19:00'),
(19, 'Others', '2023-04-11 11:19:00', '2023-04-11 11:19:00'),
(20, 'OverCoat', '2023-04-12 11:19:00', '2023-04-12 11:19:00'),
(21, 'Skirt_Suits', '2023-04-13 11:19:00', '2023-04-13 11:19:00'),
(22, 'Skirts', '2023-04-14 11:19:00', '2023-04-14 11:19:00'),
(23, 'Sports_jkt', '2023-04-15 11:19:00', '2023-04-15 11:19:00'),
(24, 'Sweaters', '2023-04-16 11:19:00', '2023-04-16 11:19:00'),
(25, 'T_Shirts', '2023-04-17 11:19:00', '2023-04-17 11:19:00'),
(26, 'TailorRepair', '2023-04-18 11:19:00', '2023-04-18 11:19:00'),
(27, 'TieAndMisc', '2023-04-19 11:19:00', '2023-04-19 11:19:00'),
(28, 'Uniform', '2023-04-20 11:19:00', '2023-04-20 11:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `invoice_date` date NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `date_issued` varchar(255) NOT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `package_unit` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discounted_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `category_id`, `package_unit`, `price`, `discounted_price`, `created_at`, `updated_at`) VALUES
(1, 'BLOUSE', 1, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'blouse+skirt', 1, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'COTTON BLOUSE(DELICATE)', 1, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'DELICATE BLOUSE', 1, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'TWIN SET BLOUSE', 1, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Carpet', 2, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'child native brocade 2pc', 3, '1', '900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'child native brocade 3pc', 3, '1', '1300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'chilld T.SHIRT', 3, '1', '450.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'dress', 3, '1', '700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'jacket', 3, '1', '1400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'jump suit child', 3, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'shirt', 3, '1', '550.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'singlet', 3, '1', '250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'skirt', 3, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'T-SHIRT', 3, '1', '450.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'tie child', 3, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Change of Stud', 4, '2', '1000.00', '1000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Cobblers', 4, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'jalamia', 5, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'native top', 5, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'skirt&blouse', 6, '1', '1700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'skirt&blouse', 6, '1', '1400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '2PCE WRAPPER&SCARF', 7, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'BLOUSE', 7, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'BLOUSE&SHORT', 7, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'BLOUSE&TROUSER', 7, '2', '1700.00', '1700.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'BLOUSE&WRAPPER', 7, '2', '1400.00', '1400.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'HEAD GEAR', 7, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'NATIVE DRESS +SCARF', 7, '1', '1300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'BRIDE\'S MAID\'S DRESS', 8, '1', '3750.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'day dress', 8, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'day dress+belt', 8, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'DAYDRESS', 8, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'DAYDRESS(DRYCLEANING)', 8, '1', '1550.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'DAYDRESS(LAUNDRY)', 8, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'DAYDRESS(SPECIAL)', 8, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'DAYDRESS(SUEDE)', 8, '1', '2600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'DELICATE DRESS&JACKET', 8, '2', '3750.00', '3750.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'DRESS&JACKET', 8, '2', '2450.00', '2450.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'dress+EMBODIMENT', 8, '1', '2100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'EVENING DRESS', 8, '1', '2350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'EVENING DRESS(SPECIAL)', 8, '1', '2600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'LITTLE BRIDE\'S DRESS', 8, '1', '1650.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'NIGHT DRESS', 8, '1', '800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'PLEATED DRESS', 8, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'TWIN SET DRESS', 8, '1', '2500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'TWIN SET NIGHT DRESS', 8, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 'WEDDING DRESS(DELICATE)', 8, '1', '7000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 'WEDDING DRESS(MULTIPLE)', 8, '1', '7000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 'WEDDING DRESS(SINGLE)', 8, '1', '6000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, 'Buba Express', 9, '1', '4000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 'BATH CURTAIN', 10, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, 'BEDSHEET', 10, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, 'BEDSHEET& 2PILLOW CASE', 10, '1', '1300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'BEDSHEET& 3PILLOW CASE', 10, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'BEDSHEET& 3PILLOW CASE', 10, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'BEDSHEET& 4PILLOW CASE', 10, '1', '1700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'BEDSHEET& 4PILLOW CASE', 10, '1', '1700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, 'BEDSPREAD', 10, '1', '800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, 'BEDSPREAD(DOUBLE)', 10, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 'BLANKET', 10, '1', '1800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 'CURTAIN(LARGE)', 10, '1', '4000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 'CURTAIN(LIGHT)', 10, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'CURTAIN(MEDIUM)', 10, '1', '3000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'DUVET', 10, '1', '2150.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'DUVET(DOUBLE)', 10, '1', '2500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'DUVET(KING SIZE)', 10, '1', '3000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'DUVET(SINGLE)', 10, '1', '2150.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'duvet(small)', 10, '1', '1900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'FACE TOWEL', 10, '1', '250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'HAT', 10, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'MAT', 10, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'NAPKIN', 10, '1', '250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'PILLOW', 10, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'PILLOW CASE', 10, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'pillow case', 10, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'SHOES', 10, '1', '1750.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'TABLE CLOTH', 10, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'TEDDY BEAR', 10, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'TOWEL(LARGE)', 10, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'TOWEL(MEDIUM)', 10, '1', '800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'TOWEL(SMALL)', 10, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'tower', 10, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 'tower big', 10, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'coast jacket', 11, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'jacket', 11, '1', '900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'JACKET(COTTON)', 11, '1', '1650.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 'jacket(dryclean)', 11, '1', '2900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 'JACKET(FEMALE)', 11, '1', '1450.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 'JACKET(JEAN)', 11, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'JACKET(MALE)', 11, '1', '1450.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'JACKET&CAMISOLE', 11, '2', '1700.00', '1700.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'WINTER JACKET', 11, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'female trouser', 12, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'BASE BALL CAP', 13, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'BATHROBE', 13, '1', '1850.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'BOXERS', 13, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'CAMISOLE', 13, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'CARDIGAN/JUMPER', 13, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'DELICATE CARDIGAN', 13, '1', '1300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'laundry bag', 13, '0', '0.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'LAWYER\'S WIG', 13, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'LAWYERS BIB/COLLAR', 13, '1', '400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'LAWYERS ROBE', 13, '1', '2500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'OVER ALL', 13, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'PANT(UNDER WEAR)', 13, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'PYJAMAS', 13, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'SINGLET', 13, '1', '400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'SOCKS', 13, '1', '200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'STAIN REMOVAL', 13, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'SWEAT SHIRT', 13, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'T-SHIRT', 13, '1', '950.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'T-SHIRT(DELICATE)', 13, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'CAP', 14, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'men brocade 2pc', 14, '1', '1800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'Men BROCADE 3PC', 14, '1', '2100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'MEN LACE 2PC', 14, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'Men Lace 3PC', 14, '1', '2300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'safari', 14, '1', '2250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'SAFARI 3PC', 14, '1', '2400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'shirt', 15, '1', '900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'shirt', 15, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'SHIRT(DELICATE)', 15, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'SHIRT(FOLD)', 15, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'SHIRT(HANG)', 15, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'SHIRT&TROUSER', 15, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '2PCE GEORGE', 16, '1', '1300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '2PCE WRAPPER&SCARF', 16, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '3PCE BLOUSE&SKIRT', 16, '3', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'BLOUSE', 16, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'BLOUSE&SHORT', 16, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'BLOUSE&TROUSER', 16, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'BLOUSE&WRAPPER', 16, '2', '1300.00', '1300.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'native blouse&wrapper&scarf', 16, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'native dress', 16, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'native skirt&blouse', 16, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'native skirt&blouse&scarf', 16, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'native skirt&wrapper&scarf', 16, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'DELICATE JEAN', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'FEMALE', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'Jean/chinos', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'MALE', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'SHORT', 17, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'trouser', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'TROUSER,BLOUSE&CAMISOLE', 17, '3', '1900.00', '1900.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'trouser(dryclean)', 17, '1', '2300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'TROUSER(JEAN)', 17, '1', '1350.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'TROUSER&IBO BUBA', 17, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '3PCE SUIT', 18, '3', '4400.00', '4400.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'men suit', 18, '3', '4500.00', '4500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'men suit', 18, '1', '3800.00', '3800.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'men suit 3PC', 18, '1', '4400.00', '4400.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'suit jacket', 18, '1', '2900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'TRACK SUIT', 18, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '3-SEATER SETTEE', 19, '1', '7500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'CHANGE OF SOLE', 19, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 'CHANGE OF STUD', 19, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 'CUSHION', 19, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 'CUSHION COVER', 19, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'DYING(CHANGE OF COLOUR)', 19, '1', '2000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 'GUMMING', 19, '1', '700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 'HALF SOLE&TOP HEEL', 19, '1', '1700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 'Just Test', 19, '1', '4800.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 'REPAIR', 19, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 'RUG FROM', 19, '1', '5000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 'singlet', 19, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 'TEDDY BEAR', 19, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 'TOP HEEL ONLY', 19, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 'LONG COAT', 20, '1', '2500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 'WAISTCOAT', 20, '1', '900.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 'WAISTCOAT&TROUSER', 20, '1', '1600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '2PCE SKIRT SUIT', 21, '2', '3800.00', '3800.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 'DELICATE SKIRT', 22, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 'SKIRT', 22, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 'skirt', 22, '1', '1050.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 'SKIRT(PLEATED)', 22, '1', '1400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 'SKIRT&WAISTCOAT', 22, '2', '2000.00', '2000.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 'jogging pant', 23, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 'jogging pant n top', 23, '1', '1400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 'SWEATER', 24, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 'SHIRT(DELICATE)', 25, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 'SHIRT&TROUSER', 25, '2', '1500.00', '1500.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 'T-SHIRT', 25, '1', '950.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 'ALTER WAIST', 26, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 'BUTTON HOLES FROM', 26, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 'CHANGE OF BUTTON', 26, '1', '200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 'CHANGE OF ELASTIC', 26, '1', '300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 'INCREASE LENGTH', 26, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 'INVISIBLE STITCH', 26, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 'MEND TORN ON HEM', 26, '1', '750.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'PRESS BUTTON(EACH)', 26, '1', '375.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 'RELINE', 26, '1', '6000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 'REPLACE HOOK&EYE', 26, '1', '200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 'REVERSE COLLAR', 26, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 'REVERSE CUFF', 26, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 'SHORTEN LENGTH(JACKET)', 26, '1', '3000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 'SHORTEN LENGTH(SKIRT)', 26, '1', '975.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 'SHORTEN LENGTH(TROUSER)', 26, '1', '1100.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 'SHORTEN SHIRT SLEEVE', 26, '1', '1600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 'SHORTEN SLEEVE LENGTH(JACKET)', 26, '1', '3000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 'SMALL PATCH FROM', 26, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 'TAKE IN SIDE (DRESS)', 26, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 'TAKE IN SIDE (JACKET)', 26, '1', '3000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 'TAKE IN SIDE (SHIRT)', 26, '1', '1600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 'TAKE IN SIDE(SKIRT)', 26, '1', '1250.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 'TAKE IN SIDE(TROUSER)', 26, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 'WELD PATCH FROM', 26, '1', '400.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 'ZIP', 26, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 'ZIP OVER 12\"', 26, '1', '1500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 'ZIP UP 12\"', 26, '1', '1000.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 'ZIP UP TO 30\"', 26, '1', '2300.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 'BOW TIE', 27, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 'MOUFLER', 27, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 'SCARF', 27, '1', '500.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 'SHAWL', 27, '1', '700.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 'TIE', 27, '1', '745.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 'uniform', 28, '1', '1200.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 'uniform(top)', 28, '1', '600.00', '0.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_16_111252_create_sessions_table', 1),
(7, '2023_02_22_151656_create_customers_table', 1),
(8, '2023_02_25_161670_create_branches_table', 1),
(9, '2023_02_26_165000_create_staffs_table', 1),
(10, '2023_03_05_184741_create_items_and_category_table', 1),
(11, '2023_03_06_223459_create_admins_table', 1),
(12, '2023_03_21_092042_create_pick_ups_table', 1),
(13, '2023_03_23_061631_create_orders_table', 1),
(14, '2023_03_27_092217_create_invoices_table', 1),
(15, '2023_03_28_182502_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `pickup_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `order_status` enum('pending','processing','completed','cancelled') NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `order_note` text DEFAULT NULL,
  `items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`items`)),
  `payment_proof` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pick_ups`
--

CREATE TABLE `pick_ups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `pickup_id` varchar(255) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `pickup_items` text DEFAULT NULL,
  `pickup_status` int(11) NOT NULL,
  `pickup_note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_email_unique` (`email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_item_id_foreign` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD KEY `customers_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pick_ups`
--
ALTER TABLE `pick_ups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pick_ups_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffs_email_unique` (`email`),
  ADD KEY `staffs_staff_id_foreign` (`staff_id`),
  ADD KEY `staffs_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pick_ups`
--
ALTER TABLE `pick_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pick_ups`
--
ALTER TABLE `pick_ups`
  ADD CONSTRAINT `pick_ups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staffs_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 12:33 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mianzi`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `region_id`, `district_id`, `address1`, `address2`, `phone`, `note`, `default`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'Kayunga', 'Busaana', '0773034311', 'Hello world', '1', '2020-08-25 21:00:00', '2020-08-26 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Material', '2020-08-08 14:18:31', '2020-08-08 14:18:31'),
(7, 'Size', '2020-08-08 14:18:43', '2020-08-08 14:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_value_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `product_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(25, 11, 8, '2020-08-08 14:20:06', '2020-08-08 14:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `value`, `created_at`, `updated_at`) VALUES
(7, 7, 'Small', '2020-08-08 14:18:55', '2020-08-08 14:18:55'),
(8, 7, 'Medium', '2020-08-08 14:19:13', '2020-08-08 14:19:13'),
(9, 7, 'Large', '2020-08-08 14:19:21', '2020-08-08 14:19:21'),
(10, 6, 'Soft', '2020-08-08 14:19:37', '2020-08-08 14:19:37'),
(11, 6, 'Hard', '2020-08-08 14:19:44', '2020-08-08 14:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `button`, `url`, `status`, `image`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Special Message', 'hello world', 'This is gallery page', 'Shop Now', 'www.mianzi.io', '1', '2020-08-05-5f29ea43704f7.jpg', 'slider', '2020-08-04 19:02:09', '2020-08-04 23:07:47'),
(3, 'Banner title', 'This is subtitle', 'This is banner description', 'Shop Now', 'www.mianzi.io', '1', '2020-08-04-5f29b0eb7a8de.jpg', 'slider', '2020-08-04 19:03:07', '2020-08-04 19:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(10, 1, 10, '89.00', 1, '2020-08-08 14:13:18', '2020-08-22 19:53:22'),
(11, 2, 11, '8900', 1, '2020-08-18 15:59:56', '2020-08-18 15:59:56'),
(12, 3, 3, '4000', 3, '2020-08-19 12:20:48', '2020-08-19 12:20:48'),
(13, 1, 13, '74500', 1, '2020-08-21 15:30:08', '2020-08-21 15:30:08'),
(14, 1, 4, '8900', 1, '2020-08-22 18:51:13', '2020-08-22 18:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `root` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `root`, `title`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, '0', 'Furniture', 'furniture', '2020-07-14-5f0d5f95119a1.jpg', '2020-07-14 04:24:47', '2020-07-14 04:32:37'),
(2, '0', 'Cookery', 'cookery', '2020-07-14-5f0d5f876fd9d.jpg', '2020-07-14 04:29:25', '2020-07-14 04:32:23'),
(3, '0', 'Seedling', 'seedling', '2020-07-14-5f0d5f60384a0.jpg', '2020-07-14 04:31:44', '2020-07-14 04:31:44'),
(4, '3', 'Sub Seedling', 'sub-seedling', '2020-07-14-5f0d665f1cf9a.jpg', '2020-07-14 05:01:35', '2020-07-14 05:01:35'),
(6, '3', 'sub seedling three', 'sub-seedling-three', '2020-07-14-5f0d6725d69df.jpg', '2020-07-14 05:04:53', '2020-07-14 05:04:53'),
(8, '3', 'sub seedling five', 'sub-seedling-five', '2020-07-14-5f0d67c0b7f1f.jpg', '2020-07-14 05:07:28', '2020-07-14 05:07:28'),
(10, '0', 'Main Category One', 'main-category-one', '2020-08-06-5f2c563b830e6.jpg', '2020-08-06 19:12:59', '2020-08-06 19:12:59'),
(11, '10', 'Sub Category One', 'sub-category-one', '2020-08-06-5f2c5663ba200.jpg', '2020-08-06 19:13:39', '2020-08-06 19:13:39'),
(12, '11', 'SUb SUb category one', 'sub-sub-category-one', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(13, '11', 'SUb SUb category two', 'sub-sub-category-two', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(14, '11', 'SUb SUb category three', 'sub-sub-category-three', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(15, '11', 'SUb SUb category four', 'sub-sub-category-four', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(16, '10', 'Sub Category Two', 'sub-category-two', '2020-08-06-5f2c5917166c2.jpg', '2020-08-06 19:25:11', '2020-08-06 19:25:11'),
(17, '10', 'Sub Category Three', 'sub-category-three', '2020-08-06-5f2c5917166c2.jpg', '2020-08-06 19:25:11', '2020-08-06 19:25:11'),
(18, '8', 'sub seedling three', 'sub-seedling-three', '2020-07-14-5f0d6725d69df.jpg', '2020-07-14 05:04:53', '2020-07-14 05:04:53'),
(19, '16', 'SUb SUb category one', 'sub-sub-category-one1', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(20, '16', 'SUb SUb category two', 'sub-sub-category-two2', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(21, '16', 'SUb SUb category three', 'sub-sub-category-three2', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(22, '16', 'SUb SUb category four', 'sub-sub-category-four2', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(23, '17', 'SUb SUb category one', 'sub-sub-category-one11', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(24, '17', 'SUb SUb category two', 'sub-sub-category-two21', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(25, '17', 'SUb SUb category three', 'sub-sub-category-three21', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(26, '17', 'SUb SUb category four', 'sub-sub-category-four21', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(27, '10', 'Sub Category Three', 'sub-category-threed', '2020-08-06-5f2c5917166c2.jpg', '2020-08-06 19:25:11', '2020-08-06 19:25:11'),
(28, '27', 'SUb SUb category one', 'sub-sub-category-one11s', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(29, '27', 'SUb SUb category two', 'sub-sub-category-two21d', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(30, '27', 'SUb SUb category three', 'sub-sub-category-three21d', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(31, '27', 'SUb SUb category four', 'sub-sub-category-four21d', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(32, '10', 'SUb SUb category four', 'sub-sub-category-four21df', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(33, '32', 'SUb SUb category two', 'sub-sub-category-two21dee', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(34, '32', 'SUb SUb category three', 'sub-sub-category-three21ddd', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37'),
(35, '32', 'SUb SUb category four', 'sub-sub-category-four21dxc', '2020-08-06-5f2c569dc9937.jpg', '2020-08-06 19:14:37', '2020-08-06 19:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-07-14 08:31:52', '2020-07-14 08:31:52'),
(2, 1, 3, '2020-07-14 08:31:52', '2020-07-14 08:31:52'),
(3, 3, 1, '2020-07-14 08:35:50', '2020-07-14 08:35:50'),
(5, 4, 2, '2020-07-14 08:39:52', '2020-07-14 08:39:52'),
(6, 4, 3, '2020-07-14 08:39:52', '2020-07-14 08:39:52'),
(7, 4, 4, '2020-07-14 08:39:52', '2020-07-14 08:39:52'),
(8, 4, 6, '2020-07-14 08:39:52', '2020-07-14 08:39:52'),
(9, 5, 1, '2020-07-14 08:44:34', '2020-07-14 08:44:34'),
(10, 5, 3, '2020-07-14 08:44:35', '2020-07-14 08:44:35'),
(11, 6, 1, '2020-07-14 08:45:09', '2020-07-14 08:45:09'),
(12, 6, 3, '2020-07-14 08:45:09', '2020-07-14 08:45:09'),
(13, 7, 1, '2020-07-14 08:48:39', '2020-07-14 08:48:39'),
(14, 7, 2, '2020-07-14 08:48:39', '2020-07-14 08:48:39'),
(15, 7, 4, '2020-07-14 08:48:39', '2020-07-14 08:48:39'),
(16, 8, 2, '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(17, 8, 3, '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(18, 8, 6, '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(24, 10, 6, '2020-07-14 11:55:02', '2020-07-14 11:55:02'),
(25, 9, 6, '2020-07-14 11:55:53', '2020-07-14 11:55:53'),
(26, 10, 4, '2020-07-14 12:18:10', '2020-07-14 12:18:10'),
(27, 10, 8, '2020-07-14 12:22:24', '2020-07-14 12:22:24'),
(28, 9, 2, '2020-07-27 19:34:43', '2020-07-27 19:34:43'),
(29, 11, 2, '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(30, 11, 6, '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(31, 12, 10, '2020-08-19 19:41:16', '2020-08-19 19:41:16'),
(33, 12, 3, '2020-08-19 19:54:49', '2020-08-19 19:54:49'),
(34, 13, 8, '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(35, 13, 10, '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(36, 13, 1, '2020-08-19 20:14:18', '2020-08-19 20:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, 9, '2020-08-06 21:50:05', '2020-08-06 21:50:05'),
(3, 1, 7, '2020-08-06 22:10:34', '2020-08-06 22:10:34'),
(4, 1, 8, '2020-08-06 22:10:59', '2020-08-06 22:10:59'),
(5, 1, 4, '2020-08-06 22:11:22', '2020-08-06 22:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `date_of_birth`, `email_verified_at`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Mark', 'Baraka', 'markbrightbaraka@gmail.com', '0772568963', NULL, NULL, NULL, '$2y$10$ks8LZWgcSkjhVP4.wuM1he5wdEj8peFbDotu.D6XsFfJrncehyUSm', NULL, '2020-07-18 07:56:38', '2020-07-18 07:56:38'),
(2, 'mark', 'bright', 'mark@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$59OFDjqQar6z/lTIk70KlePPFlAvkemteLepEPHBvPEzGqmpylvxW', NULL, '2020-07-18 12:39:46', '2020-07-18 12:39:46'),
(3, 'Mark', 'Baraka', 'ezaluku@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$3M.LqsrErse4bgNoQszHheWKWsLsLdOMIlNhHDyWNc4WIVQBcGN.a', NULL, '2020-08-19 11:56:21', '2020-08-19 11:56:21');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `region_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 2, 'Mayuged', '2020-07-16 07:48:30', '2020-07-16 08:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_01_124317_create_permission_tables', 1),
(5, '2020_04_03_131427_create_trackers_table', 1),
(6, '2020_04_03_132037_create_user_login_logs_table', 1),
(7, '2020_07_13_223641_create_products_table', 1),
(8, '2020_07_13_223842_create_categories_table', 1),
(9, '2020_07_13_223916_create_customers_table', 1),
(10, '2020_07_13_223930_create_regions_table', 1),
(11, '2020_07_13_223940_create_districts_table', 1),
(12, '2020_07_13_224013_create_attributes_table', 1),
(13, '2020_07_13_224049_create_attribute_values_table', 1),
(14, '2020_07_13_224108_create_attribute_products_table', 1),
(15, '2020_07_13_224119_create_addresses_table', 1),
(16, '2020_07_13_224141_create_shippings_table', 1),
(17, '2020_07_13_224207_create_shipping_prices_table', 1),
(18, '2020_07_13_224233_create_order_statuses_table', 1),
(19, '2020_07_13_224252_create_category_products_table', 1),
(20, '2020_07_13_224305_create_product_images_table', 1),
(21, '2020_07_13_224342_create_pickup_stations_table', 1),
(22, '2020_07_13_224404_create_coupons_table', 1),
(23, '2020_07_13_224414_create_wishlists_table', 1),
(24, '2020_07_13_224513_create_subscriptions_table', 1),
(25, '2020_07_13_230635_create_orders_table', 1),
(26, '2020_07_13_233726_create_blog_categories_table', 1),
(27, '2020_07_16_120836_create_order_products_table', 2),
(28, '2020_07_16_141840_create_shipping_price_table', 3),
(29, '2020_08_04_202711_create_banners_table', 4),
(31, '2020_08_05_175715_create_reviews_table', 5),
(32, '2020_08_05_193512_create_compares_table', 6),
(33, '2020_08_05_193539_create_carts_table', 6),
(34, '2020_08_18_213210_create_recently_vieweds_table', 7),
(35, '2020_08_18_220705_create_recently_vieweds_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', NULL, NULL),
(2, 'paid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-07-13 16:39:52', '2020-07-13 16:39:52'),
(2, 'user', 'web', '2020-07-13 16:39:52', '2020-07-13 16:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_stations`
--

CREATE TABLE `pickup_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_stations`
--

INSERT INTO `pickup_stations` (`id`, `district_id`, `name`, `address`, `close_to`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pickup station one', 'Muni university', 'Arua Hospital', '2020-07-16 08:46:05', '2020-07-16 08:46:05'),
(3, 2, 'Awiniri', '+256773034311', 'Arua Hospital', '2020-07-16 09:02:35', '2020-07-16 09:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sold` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `sku`, `slug`, `cover`, `description`, `information`, `qty`, `price`, `sale_price`, `type`, `featured`, `publish_date`, `status`, `sold`, `created_at`, `updated_at`) VALUES
(3, 'Special Message', '5f0d9896d8b54', 'special-message-3', '2020-07-14-5f0dd5c55f81f.jpg', '<span style=\"color: rgb(119, 119, 119); font-family: \"PT Sans\", sans-serif; letter-spacing: 0.7px;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '<h3 class=\"spec__header\" style=\"margin-bottom: 50px; font-family: Roboto, sans-serif; color: rgb(61, 70, 77); font-size: 28px;\">Specification</h3><div class=\"spec__section\" style=\"color: rgb(61, 70, 77); font-family: Roboto, sans-serif; font-size: 15px;\"><h4 class=\"spec__section-title\" style=\"margin-right: 0px; margin-bottom: 12px; margin-left: 0px; font-weight: 500; line-height: 20px; font-size: 18px; letter-spacing: -0.03em;\">General</h4><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235); border-top: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Material</div><div class=\"spec__value\">Aluminium, Plastic</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Engine Type</div><div class=\"spec__value\">Brushless</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Battery Voltage</div><div class=\"spec__value\">18 V</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Battery Type</div><div class=\"spec__value\">Li-lon</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Number of Speeds</div><div class=\"spec__value\">2</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Charge Time</div><div class=\"spec__value\">1.08 h</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Weight</div><div class=\"spec__value\">1.5 kg</div></div></div><div class=\"spec__section\" style=\"margin-top: 40px; color: rgb(61, 70, 77); font-family: Roboto, sans-serif; font-size: 15px;\"><h4 class=\"spec__section-title\" style=\"margin-right: 0px; margin-bottom: 12px; margin-left: 0px; font-weight: 500; line-height: 20px; font-size: 18px; letter-spacing: -0.03em;\">Dimensions</h4><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235); border-top: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Length</div><div class=\"spec__value\">99 mm</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Width</div><div class=\"spec__value\">207 mm</div></div><div class=\"spec__row\" style=\"padding: 8px 12px; display: flex; border-bottom: 1px solid rgb(235, 235, 235);\"><div class=\"spec__name\" style=\"width: 230px; flex-shrink: 0; padding-right: 30px; color: rgb(153, 153, 153);\">Height</div><div class=\"spec__value\">208 mm</div></div></div><div class=\"spec__disclaimer\" style=\"margin-top: 40px; line-height: 22px; color: rgb(153, 153, 153); font-family: Roboto, sans-serif;\">Information on technical characteristics, the delivery set, the country of manufacture and the appearance of the goods is for reference only and is based on the latest information available at the time of publication.</div>', '90', '5000', '4000', 'Physical', '1', NULL, '1', 9, '2020-07-14 08:35:50', '2020-08-05 14:54:50'),
(4, 'Product one', '5f0d9987f3376', 'product-one-4', '2020-07-14-5f0dd60387158.jpg', 'use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;', 'use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;use App\\Models\\Mianzi\\Category;', '0', '10000', '8900', 'Physical', '1', NULL, '1', NULL, '2020-07-14 08:39:51', '2020-08-06 21:02:49'),
(5, 'product two', '5f0d9aa2c65ed', 'product-two-5', '2020-07-14-5f0dd57a71b67.jpg', '$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);', '$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);', '90', '10000', '89900', 'Physical', '0', NULL, '1', NULL, '2020-07-14 08:44:34', '2020-07-14 12:55:38'),
(6, 'product two', '5f0d9ac577621', 'product-two-6', '2020-07-14-5f0dd3c49da94.jpg', '$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);', '$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);$file->move(storage_path(\'app\\public\\category\'), $imagename);', '90', '10000', '89900', 'Physical', '0', NULL, '1', NULL, '2020-07-14 08:45:09', '2020-07-14 12:48:20'),
(7, 'product four', '5f0d9b96ed5ea', 'product-four-7', '2020-07-14-5f0d9b96ec32f.jpg', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,', '4', '5000', '17690', 'Physical', '1', '2020-04-24', '1', NULL, '2020-07-14 08:48:38', '2020-07-24 22:30:47'),
(8, 'product five', '5f0d9c5a17aae', 'product-five-8', '2020-07-14-5f0d9c5a16416.jpg', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '4', '13000', '8900', 'Physical', '1', '2020-08-01', '1', NULL, '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(9, 'Special Message', '5f0db203bb9e9', 'special-message-9', '2020-07-14-5f0db203ab861.jpg', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '81', '5000', '89.00', 'Physical', '0', '2020-07-30', '1', NULL, '2020-07-14 10:24:19', '2020-07-14 12:44:37'),
(10, 'news article one', '5f0db2b25d0ec', 'news-article-one-10', '2020-07-14-5f0db2b25b05b.jpg', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);$image->move(\'product/gallary\', $imagenames);', '90', '12.00', '89.00', 'Physical', '1', '2020-07-31', '1', NULL, '2020-07-14 10:27:14', '2020-07-14 11:55:02'),
(11, 'bamboo basket', '99jal1n1zo', 'bamboo-basket-11', '2020-07-29-5f20af1c26c35.jpg', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;PT Sans&quot;, sans-serif; font-size: 14.6538px; letter-spacing: 0.732688px; background-color: rgb(249, 249, 249);\">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,</span>', '<span style=\"color: rgb(119, 119, 119); font-family: &quot;PT Sans&quot;, sans-serif; font-size: 14.6538px; letter-spacing: 0.732688px; background-color: rgb(249, 249, 249);\">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,</span>', '90', '10000', '8900', 'Physical', '1', '2020-07-30', '1', NULL, '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(13, 'Test product two', 'h7yBPInuYv', 'test-product-two-13', '2020-08-19-5f3d87902237a.jpg', '<span style=\"color: rgb(119, 119, 119); font-family: \"PT Sans\", sans-serif; font-size: 14.6538px; letter-spacing: 0.732688px; background-color: rgb(249, 249, 249);\">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,</span>', '<span style=\"color: rgb(119, 119, 119); font-family: \"PT Sans\", sans-serif; font-size: 14.6538px; letter-spacing: 0.732688px; background-color: rgb(249, 249, 249);\">Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem,</span>', '78', '80000', '74500', 'Physical', '1', '2020-08-28', '1', NULL, '2020-08-19 20:12:00', '2020-08-19 20:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 8, '-5f0d9c5a7d2a2.jpg', '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(12, 8, '-5f0d9c5aa25fe.jpg', '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(13, 8, '-5f0d9c5aafefe.jpg', '2020-07-14 08:51:54', '2020-07-14 08:51:54'),
(22, 10, '-5f0dccb2b54e8.jpg', '2020-07-14 12:18:10', '2020-07-14 12:18:10'),
(24, 10, '-5f0dccb2db847.jpg', '2020-07-14 12:18:10', '2020-07-14 12:18:10'),
(27, 9, '-5f0dd23f7df2d.jpg', '2020-07-14 12:41:51', '2020-07-14 12:41:51'),
(35, 6, '-5f0dd4da95a27.jpg', '2020-07-14 12:52:58', '2020-07-14 12:52:58'),
(36, 6, '-5f0dd55a4d9a2.jpg', '2020-07-14 12:55:06', '2020-07-14 12:55:06'),
(37, 5, '-5f0dd57a82963.jpg', '2020-07-14 12:55:38', '2020-07-14 12:55:38'),
(38, 5, '-5f0dd57a8e4e1.jpg', '2020-07-14 12:55:38', '2020-07-14 12:55:38'),
(39, 1, '-5f0dd59fdc912.jpg', '2020-07-14 12:56:15', '2020-07-14 12:56:15'),
(40, 1, '-5f0dd59ff09e5.jpg', '2020-07-14 12:56:15', '2020-07-14 12:56:15'),
(41, 1, '-5f0dd5a00737e.jpg', '2020-07-14 12:56:16', '2020-07-14 12:56:16'),
(42, 3, '-5f0dd5c57f940.jpg', '2020-07-14 12:56:53', '2020-07-14 12:56:53'),
(43, 3, '-5f0dd5c58f0aa.jpg', '2020-07-14 12:56:53', '2020-07-14 12:56:53'),
(44, 4, '-5f0dd603a56d2.jpg', '2020-07-14 12:57:55', '2020-07-14 12:57:55'),
(45, 4, '-5f0dd603af09d.jpg', '2020-07-14 12:57:55', '2020-07-14 12:57:55'),
(46, 7, '-5f1b60d1d8f2e.jpg', '2020-07-24 22:29:37', '2020-07-24 22:29:37'),
(47, 7, '-5f1b60d1eae26.jpg', '2020-07-24 22:29:37', '2020-07-24 22:29:37'),
(48, 7, '-5f1b60d2066c9.jpg', '2020-07-24 22:29:38', '2020-07-24 22:29:38'),
(49, 7, '-5f1b60d213032.jpg', '2020-07-24 22:29:38', '2020-07-24 22:29:38'),
(50, 11, '-5f20af1c68fea.jpg', '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(51, 11, '-5f20af1c722ac.jpg', '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(52, 11, '-5f20af1c7cd87.jpg', '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(53, 11, '-5f20af1c87189.jpg', '2020-07-28 23:05:00', '2020-07-28 23:05:00'),
(54, 12, '-5f3d805c93f3d.jpg', '2020-08-19 19:41:16', '2020-08-19 19:41:16'),
(55, 12, '-5f3d805cb0af8.jpg', '2020-08-19 19:41:16', '2020-08-19 19:41:16'),
(56, 12, '-5f3d805cbf501.jpg', '2020-08-19 19:41:16', '2020-08-19 19:41:16'),
(57, 12, '-5f3d805cccd7e.jpg', '2020-08-19 19:41:16', '2020-08-19 19:41:16'),
(58, 13, '-5f3d87908829b.jpg', '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(59, 13, '-5f3d8790957ae.jpg', '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(60, 13, '-5f3d8790a637f.jpg', '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(61, 13, '-5f3d8790b6034.jpg', '2020-08-19 20:12:00', '2020-08-19 20:12:00'),
(62, 13, '-5f3d8790df41d.jpg', '2020-08-19 20:12:00', '2020-08-19 20:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `recently_vieweds`
--

CREATE TABLE `recently_vieweds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_vieweds`
--

INSERT INTO `recently_vieweds` (`id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(14, 13, 'qDMqFgIPNldhhmhWwmSUFlcHcDPxazTLYVcIcgeP', '2020-08-19 21:13:34', '2020-08-19 21:13:34'),
(15, 11, 'qDMqFgIPNldhhmhWwmSUFlcHcDPxazTLYVcIcgeP', '2020-08-19 21:13:44', '2020-08-19 21:13:44'),
(16, 8, 'qDMqFgIPNldhhmhWwmSUFlcHcDPxazTLYVcIcgeP', '2020-08-19 21:28:33', '2020-08-19 21:28:33'),
(17, 13, 'y4TurxJDDYsyBvJUD6qN1Pw8Db72W0ifx1k7H23E', '2020-08-20 15:42:27', '2020-08-20 15:42:27'),
(18, 3, 'y4TurxJDDYsyBvJUD6qN1Pw8Db72W0ifx1k7H23E', '2020-08-20 15:50:07', '2020-08-20 15:50:07'),
(19, 6, 'y4TurxJDDYsyBvJUD6qN1Pw8Db72W0ifx1k7H23E', '2020-08-20 15:59:11', '2020-08-20 15:59:11'),
(20, 3, '1', '2020-08-20 16:38:23', '2020-08-20 16:38:23'),
(21, 11, 'aLqydfAFHmTCIxbibhGuYuQlN1ZfhqkdzjYLzeSv', '2020-08-21 13:16:59', '2020-08-21 13:16:59'),
(22, 13, 'aLqydfAFHmTCIxbibhGuYuQlN1ZfhqkdzjYLzeSv', '2020-08-21 13:20:31', '2020-08-21 13:20:31'),
(23, 7, 'aLqydfAFHmTCIxbibhGuYuQlN1ZfhqkdzjYLzeSv', '2020-08-21 13:22:28', '2020-08-21 13:22:28'),
(24, 4, 'aLqydfAFHmTCIxbibhGuYuQlN1ZfhqkdzjYLzeSv', '2020-08-21 13:22:46', '2020-08-21 13:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Eastern Regions', '2020-07-16 07:26:31', '2020-07-16 07:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `customer_id`, `product_id`, `rating`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '4', 'Hllo world and they alll laughed at hiim descpite the fact that they are the pnly ones who led', '1', '2020-08-05 15:40:56', '2020-08-05 15:40:56'),
(2, 1, 7, '5', 'Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt,', '1', '2020-08-05 15:51:36', '2020-08-05 15:51:36'),
(3, 1, 7, '5', '<!-- Sweet Alert -->\r\n@include(\'sweetalert::alert\')\r\n<!--- Sweet Alert -->', '0', '2020-08-05 15:53:45', '2020-08-05 15:53:45'),
(4, 1, 3, '4', 'hello world and they all alghed', '0', '2020-08-13 13:02:19', '2020-08-13 13:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2020-07-13 16:39:52', '2020-07-13 16:39:52'),
(2, 'user', 'web', '2020-07-13 16:39:53', '2020-07-13 16:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixed` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `status`, `fixed`, `created_at`, `updated_at`) VALUES
(1, 'Pickup Stations', '1', '0', '2020-07-14 07:07:01', '2020-07-14 07:25:44'),
(3, 'Home Delivery', '1', '1', '2020-07-16 11:28:19', '2020-07-16 11:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_prices`
--

CREATE TABLE `shipping_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `station_id` bigint(20) UNSIGNED NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_prices`
--

INSERT INTO `shipping_prices` (`id`, `shipping_id`, `station_id`, `fee`, `created_at`, `updated_at`) VALUES
(8, 3, 2, '23000', '2020-08-21 16:22:52', '2020-08-21 16:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `subscription_email`, `created_at`, `updated_at`) VALUES
(7, 'admin@admin.com', '2020-07-16 06:26:36', '2020-07-16 06:26:36'),
(8, 'admin@admin.com', '2020-07-16 06:26:36', '2020-07-16 06:26:36'),
(9, 'mark@gmail.com', '2020-07-16 06:27:06', '2020-07-16 06:27:06'),
(10, 'mark@gmail.com', '2020-07-16 06:27:06', '2020-07-16 06:27:06'),
(11, 'mark@gmail.com', '2020-07-16 06:30:01', '2020-07-16 06:30:01'),
(12, 'mark@gmail.com', '2020-07-16 06:30:01', '2020-07-16 06:30:01'),
(13, 'mark@gamil.dom', '2020-08-09 19:53:58', '2020-08-09 19:53:58'),
(14, 'mark@gamil.don', '2020-08-09 19:56:07', '2020-08-09 19:56:07'),
(15, 'hellelel@gmail.com', '2020-08-09 19:57:13', '2020-08-09 19:57:13'),
(16, 'half@famil.com', '2020-08-09 19:58:48', '2020-08-09 19:58:48'),
(17, 'hie@gail.com', '2020-08-09 20:01:25', '2020-08-09 20:01:25'),
(18, 'nnnnnnn@dede.co', '2020-08-09 20:03:47', '2020-08-09 20:03:47'),
(19, 'nnnnnnn@dede.cop', '2020-08-09 20:04:32', '2020-08-09 20:04:32'),
(20, 'hellelel@gmail.co', '2020-08-20 15:36:09', '2020-08-20 15:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_date` date NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`id`, `current_date`, `ip`, `hits`, `created_at`, `updated_at`) VALUES
(2, '2020-07-28', '127.0.0.1', NULL, '2020-07-28 18:34:14', '2020-07-28 18:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '0773034311', '1594992418.jpg', NULL, '$2y$10$I/w2WmC.ZYgkLmvhv1P9IOMneUGakTrCsvUBt3S/wDGlHmZ9qK0AG', NULL, '2020-07-13 16:39:53', '2020-07-17 13:26:58'),
(2, 'Mahantesh Kumbar', 'user@user.com', NULL, NULL, NULL, '$2y$10$GBsw7VAfEOzT7RZ6F0nOnOKAUdcwH8kOyZKDm7OBIO.GM8WX9YwPu', NULL, '2020-07-13 16:39:54', '2020-07-13 16:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_logs`
--

CREATE TABLE `user_login_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login_logs`
--

INSERT INTO `user_login_logs` (`id`, `subject`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-13 16:40:16', '2020-07-13 16:40:16'),
(2, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-14 03:53:15', '2020-07-14 03:53:15'),
(3, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-16 06:31:13', '2020-07-16 06:31:13'),
(4, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-16 15:38:29', '2020-07-16 15:38:29'),
(5, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-17 11:19:44', '2020-07-17 11:19:44'),
(6, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-17 11:44:20', '2020-07-17 11:44:20'),
(7, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-20 11:43:15', '2020-07-20 11:43:15'),
(8, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-24 22:25:54', '2020-07-24 22:25:54'),
(9, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-27 18:22:21', '2020-07-27 18:22:21'),
(10, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 1, '2020-07-28 18:20:16', '2020-07-28 18:20:16'),
(11, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0', 1, '2020-07-28 20:26:56', '2020-07-28 20:26:56'),
(12, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-03 12:20:04', '2020-08-03 12:20:04'),
(13, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-04 17:14:46', '2020-08-04 17:14:46'),
(14, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-05 13:56:13', '2020-08-05 13:56:13'),
(15, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-06 11:48:09', '2020-08-06 11:48:09'),
(16, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.0 Safari/537.36', 1, '2020-08-06 19:12:01', '2020-08-06 19:12:01'),
(17, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-06 23:01:31', '2020-08-06 23:01:31'),
(18, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-08 05:54:18', '2020-08-08 05:54:18'),
(19, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 1, '2020-08-08 14:01:16', '2020-08-08 14:01:16'),
(20, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 1, '2020-08-19 19:37:24', '2020-08-19 19:37:24'),
(21, 'User Login Succesfully. Email: admin@admin.com', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36', 1, '2020-08-21 16:21:25', '2020-08-21 16:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(27, 3, 1, '2020-08-01 19:46:13', '2020-08-01 19:46:13'),
(28, 4, 1, '2020-08-05 17:32:58', '2020-08-05 17:32:58'),
(29, 3, 1, '2020-08-05 17:58:05', '2020-08-05 17:58:05'),
(31, 4, 1, '2020-08-06 20:20:58', '2020-08-06 20:20:58'),
(32, 10, 1, '2020-08-06 21:49:52', '2020-08-06 21:49:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_reference_unique` (`reference`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_stations`
--
ALTER TABLE `pickup_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_vieweds`
--
ALTER TABLE `recently_vieweds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_prices`
--
ALTER TABLE `shipping_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pickup_stations`
--
ALTER TABLE `pickup_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `recently_vieweds`
--
ALTER TABLE `recently_vieweds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_prices`
--
ALTER TABLE `shipping_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login_logs`
--
ALTER TABLE `user_login_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

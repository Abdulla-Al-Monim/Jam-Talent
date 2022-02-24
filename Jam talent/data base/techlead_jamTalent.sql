-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 22, 2021 at 07:14 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techlead_jamTalent`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `back_job_contacts`
--

CREATE TABLE `back_job_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_type_of` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_messaging_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_infos`
--

CREATE TABLE `bank_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1 for bank 2 for Western Union',
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc` text COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `featured` int(11) NOT NULL DEFAULT '0' COMMENT '1 for fetured',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogtypes`
--

CREATE TABLE `blogtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogtypes`
--

INSERT INTO `blogtypes` (`id`, `name`, `name_ar`, `name_tr`, `created_at`, `updated_at`) VALUES
(1, 'WordPress', 'وورد', 'WordPress', '2021-12-21 13:37:36', '2021-12-21 13:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `book_mark_employers`
--

CREATE TABLE `book_mark_employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_mark_freelancers`
--

CREATE TABLE `book_mark_freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_mark_jobs`
--

CREATE TABLE `book_mark_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_mark_tasks`
--

CREATE TABLE `book_mark_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_tr` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `featured` int(11) NOT NULL DEFAULT '0' COMMENT '1 for fetured',
  `popular` int(11) NOT NULL DEFAULT '0' COMMENT '1 for popular',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_ar`, `name_tr`, `slug`, `image`, `desc`, `desc_ar`, `desc_tr`, `parent_id`, `featured`, `popular`, `created_at`, `updated_at`) VALUES
(5, 'web development', 'تطوير الشبكة', 'web Geliştirme', 'web-development', '1639388354.png', 'dfas', NULL, NULL, 0, 1, 1, '2021-12-13 15:39:15', '2021-12-13 15:39:15'),
(6, 'graphics design', 'graphics design', 'graphics design', 'graphics-design', '1639388465.png', 'graphics design', NULL, NULL, 0, 1, 1, '2021-12-13 15:41:05', '2021-12-13 15:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `chat_rooms`
--

CREATE TABLE `chat_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  `room_creator` int(11) DEFAULT NULL COMMENT '1 equal creator',
  `total_message` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Billed` int(11) NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `plan_name`, `Billed`, `rate`, `transaction_id`, `expired_date`, `status`, `created_at`, `updated_at`) VALUES
(7, 28, 'Basic', 2, '0', NULL, '2022-01-13', 0, '2021-12-13 15:50:23', '2021-12-13 15:50:23'),
(8, 15, 'Basic', 2, '0', NULL, '2022-01-19', 0, '2021-12-19 14:01:54', '2021-12-19 14:01:54'),
(9, 16, 'Extended', 2, '0', NULL, '2022-01-19', 0, '2021-12-19 15:35:55', '2021-12-19 15:35:55');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivary_orders`
--

CREATE TABLE `delivary_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revision` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employer_activities`
--

CREATE TABLE `employer_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_review` int(11) DEFAULT '0',
  `total_rating` int(11) DEFAULT '0',
  `average_rating` double(9,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_histories`
--

CREATE TABLE `employment_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_desciption` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_activities`
--

CREATE TABLE `freelancer_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_review` int(11) DEFAULT '0',
  `total_rating` int(11) DEFAULT '0',
  `average_rating` double(9,2) DEFAULT '0.00',
  `on_budget` int(11) DEFAULT '0' COMMENT '0 for no 1 for yes',
  `on_time` int(11) DEFAULT '0' COMMENT '0 for no 1 for yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_balances`
--

CREATE TABLE `freelancer_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balace` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `freelancer_id` int(11) DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 for pending approval 1 for confirm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_plans`
--

CREATE TABLE `membership_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name_tr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Billed` int(11) NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_desc` text COLLATE utf8mb4_unicode_ci,
  `s_desc_ar` text COLLATE utf8mb4_unicode_ci,
  `s_desc_tr` text COLLATE utf8mb4_unicode_ci,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `desc_ar` text COLLATE utf8mb4_unicode_ci,
  `desc_tr` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_plans`
--

INSERT INTO `membership_plans` (`id`, `plan_name`, `plan_name_ar`, `plan_name_tr`, `Billed`, `rate`, `s_desc`, `s_desc_ar`, `s_desc_tr`, `desc`, `desc_ar`, `desc_tr`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Basic', NULL, NULL, 2, '19', '<p>One time fee for one listing or task highlighted in search results.</p>', '<p>Arama sonu&ccedil;larında vurgulanan bir liste veya g&ouml;rev i&ccedil;in tek seferlik &uuml;cret</p>', '<p>Arama sonuçlarında vurgulanan bir liste veya görev için tek seferlik ücret</p>', '<p><strong>Features of Professional</strong></p>\r\n\r\n<ul>\r\n	<li>1 Listing</li>\r\n	<li>30 Days Visibility</li>\r\n	<li>Highlighted in Search Results</li>\r\n</ul>', '<p><strong>ميزات احترافي</strong></p>\r\n\r\n<ul>\r\n	<li>1 قائمة واحدة</li>\r\n	<li>30  يوم مرئي</li>\r\n	<li>مميزة في نتائج البحث</li>\r\n</ul>', '<p><strong>Özellikleri Profesyonel</strong></p>\r\n\r\n<ul>\r\n	<li>1 Dinleme</li>\r\n	<li>30  gün görünürlük</li>\r\n	<li>Arama sonucunda vurgulanan</li>\r\n</ul>', 1, '2021-12-08 16:14:58', '2021-12-08 16:14:58'),
(6, 'Standard', NULL, NULL, 2, '58', '<p>One time fee for one listing or task highlighted in search results.</p>', '<p>مجانا لمرة واحدة لقائمة واحدة أو مهمة مميزة في نتائج البحث.</p>', '<p>One-time fee for one listing or task highlighted in search results.</p>', '<p><strong>Features of Plus Team</strong></p>\r\n\r\n<ul>\r\n	<li>5 Listings</li>\r\n	<li>60 Days Visibility</li>\r\n	<li>Highlighted in Search Results</li>\r\n</ul>', '<p><strong>ميزات فريق بلس</strong></p>\r\n\r\n<ul>\r\n	<li>5 قائمة واحدة </li>\r\n	<li>30 يوم مرئي</li>\r\n	<li>مميزة في نتائج البحث</li>\r\n</ul>', '<p><strong>Özellikleri Artı Takım</strong></p>\r\n\r\n<ul>\r\n	<li>5 Dinleme</li>\r\n	<li>30 gün görünürlük</li>\r\n	<li>Arama sonucunda vurgulanan</li>\r\n</ul>', 1, '2021-12-08 16:16:24', '2021-12-08 16:16:24'),
(7, 'Extended', NULL, NULL, 2, '99', '<p>One time fee for one listing or task highlighted in search results.</p>', '<p>مجانا لمرة واحدة لقائمة واحدة أو مهمة مميزة في نتائج البحث.</p>', '<p>Arama sonuçlarında vurgulanan bir liste veya görev için tek seferlik ücret .</p>', '<p><strong>Features of Enterprise</strong></p>\r\n\r\n<ul>\r\n	<li>Unlimited Listings Listing</li>\r\n	<li>90 Days Visibility</li>\r\n	<li>Highlighted in Search Results</li>\r\n</ul>', '<p><strong>ميزات المؤسسة</strong></p>\r\n\r\n<ul>\r\n	<li>90 قائمة واحدة</li>\r\n	<li>30 يوم مرئي</li>\r\n	<li>مميزة في نتائج البحث</li>\r\n</ul>', '<p><strong>Arama sonucunda vurgulanan Girişim</strong></p>\r\n\r\n<ul>\r\n	<li>90 Dinleme</li>\r\n	<li>30  gün görünürlük</li>\r\n	<li>Arama sonucunda vurgulanan</li>\r\n</ul>', 1, '2021-12-08 16:17:27', '2021-12-08 16:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_03_07_140540_create_categories_table', 1),
(7, '2021_03_09_120046_create_sessions_table', 1),
(8, '2021_03_12_150541_create_skills_table', 1),
(9, '2021_03_14_031616_create_user_types_table', 1),
(10, '2021_03_14_032149_create_addresses_table', 1),
(11, '2021_03_14_032904_create_social_media_table', 1),
(12, '2021_03_14_154932_create_job_types_table', 1),
(13, '2021_03_14_164527_create_jobs_table', 1),
(14, '2021_03_14_180327_create_tasks_table', 1),
(15, '2021_03_16_064902_create_task_offers_table', 1),
(16, '2021_03_18_153056_create_job_applies_table', 1),
(17, '2021_03_18_174417_create_task_applies_table', 1),
(18, '2021_04_03_152652_create_delivary_orders_table', 1),
(19, '2021_04_06_143213_create_review_employers_table', 1),
(20, '2021_04_06_143226_create_review_freelancers_table', 1),
(21, '2021_04_07_044253_create_notes_table', 1),
(22, '2021_04_15_063824_create_book_mark_jobs_table', 1),
(23, '2021_04_15_063845_create_book_mark_tasks_table', 1),
(24, '2021_04_15_063909_create_book_mark_freelancers_table', 1),
(25, '2021_04_15_063927_create_book_mark_employers_table', 1),
(26, '2021_04_18_170859_create_orders_table', 1),
(27, '2021_04_27_090741_create_order_cancels_table', 1),
(28, '2021_05_10_041323_create_freelancer_activities_table', 1),
(29, '2021_05_10_154050_create_employer_activities_table', 1),
(30, '2021_05_15_043655_create_notifications_table', 1),
(31, '2021_05_27_184510_create_blogs_table', 1),
(32, '2021_05_29_042239_create_contacts_table', 1),
(33, '2021_06_03_054741_create_subscriptions_table', 1),
(34, '2021_06_04_123923_create_blogtypes_table', 1),
(35, '2021_06_06_105039_create_employment_histories_table', 1),
(36, '2021_07_15_065514_create_membership_plans_table', 1),
(37, '2021_07_15_172300_create_checkouts_table', 1),
(38, '2021_07_30_181438_create_order_checkouts_table', 1),
(39, '2021_08_01_162809_create_chat_rooms_table', 1),
(40, '2021_08_01_163057_create_messages_table', 1),
(41, '2021_08_14_171007_create_bank_infos_table', 1),
(42, '2021_08_16_175126_create_freelancer_balances_table', 1),
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_03_09_120046_create_sessions_table', 1),
(8, '2021_03_12_150541_create_skills_table', 1),
(9, '2021_03_14_031616_create_user_types_table', 1),
(10, '2021_03_14_032149_create_addresses_table', 1),
(11, '2021_03_14_032904_create_social_media_table', 1),
(12, '2021_03_14_154932_create_job_types_table', 1),
(13, '2021_03_14_164527_create_jobs_table', 1),
(14, '2021_03_14_180327_create_tasks_table', 1),
(15, '2021_03_16_064902_create_task_offers_table', 1),
(16, '2021_03_18_153056_create_job_applies_table', 1),
(17, '2021_03_18_174417_create_task_applies_table', 1),
(18, '2021_04_03_152652_create_delivary_orders_table', 1),
(19, '2021_04_06_143213_create_review_employers_table', 1),
(20, '2021_04_06_143226_create_review_freelancers_table', 1),
(21, '2021_04_07_044253_create_notes_table', 1),
(22, '2021_04_15_063824_create_book_mark_jobs_table', 1),
(23, '2021_04_15_063845_create_book_mark_tasks_table', 1),
(24, '2021_04_15_063909_create_book_mark_freelancers_table', 1),
(25, '2021_04_15_063927_create_book_mark_employers_table', 1),
(26, '2021_04_18_170859_create_orders_table', 1),
(27, '2021_04_27_090741_create_order_cancels_table', 1),
(28, '2021_05_10_041323_create_freelancer_activities_table', 1),
(29, '2021_05_10_154050_create_employer_activities_table', 1),
(30, '2021_05_15_043655_create_notifications_table', 1),
(31, '2021_05_27_184510_create_blogs_table', 1),
(32, '2021_05_29_042239_create_contacts_table', 1),
(33, '2021_06_03_054741_create_subscriptions_table', 1),
(35, '2021_06_06_105039_create_employment_histories_table', 1),
(37, '2021_07_15_172300_create_checkouts_table', 1),
(38, '2021_07_30_181438_create_order_checkouts_table', 1),
(39, '2021_08_01_162809_create_chat_rooms_table', 1),
(40, '2021_08_01_163057_create_messages_table', 1),
(41, '2021_08_14_171007_create_bank_infos_table', 1),
(42, '2021_08_16_175126_create_freelancer_balances_table', 1),
(43, '2021_03_07_140540_create_categories_table', 2),
(44, '2021_06_04_123923_create_blogtypes_table', 2),
(45, '2021_07_15_065514_create_membership_plans_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `priority` int(11) NOT NULL COMMENT '0 for low Priority 1 for Medium Priority 2 for High Priority',
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_type` int(11) NOT NULL COMMENT '1 for custom offer 2 for task',
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_type` int(11) DEFAULT '0' COMMENT '1 for day 0 for hour ',
  `status` int(11) DEFAULT '1' COMMENT '1 for active order 2 for Deliverd 3 for revision 4 for complete 5 for cancel request 6 for cancel',
  `delivary_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_cancels`
--

CREATE TABLE `order_cancels` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 for en active 1 for active',
  `cancel_request` int(11) NOT NULL COMMENT '1 for frelancer 2 employer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_checkouts`
--

CREATE TABLE `order_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `order_type` int(11) NOT NULL COMMENT '1 for custom offer 2 for task 3 for job',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_employers`
--

CREATE TABLE `review_employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL COMMENT '1 for 1-stat 2 for 2-stat 3 for 3-star 4 for 4-star 5 for 5-star',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 for en-complete 1 for complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_freelancers`
--

CREATE TABLE `review_freelancers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `on_budget` int(11) DEFAULT NULL COMMENT '0 for no 1 for yes',
  `on_time` int(11) DEFAULT NULL COMMENT '0 for no 1 for yes',
  `rating` int(11) DEFAULT NULL COMMENT '0 for 1 stat 1 for 2-star 3 for 3-star 4 for 4-star 5 for five star',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 for en-complete 1 for complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JtheWrpD0aVxZvLHtEyjS6UiETRoAGVc6HWCzJwz', NULL, '103.155.118.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTllmeTZpRE90dnhXVDQ4eml2aHZ5cFBPWXJFanRENXdtOWlvVkwwcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640097269),
('SfO9jIvUXD4CgKROXjskPhXdE2Zv2fUY28UreXB2', NULL, '103.155.118.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmZMdFNYemJXREFlblVyRm9vZ2pmYkthaWltWmduc3ZjVXh0OFBlWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640097270),
('iJm3d9yoDtTfCr51sY6FPAAZFA7xCgaN0PXtjryR', NULL, '103.155.118.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzVvN0JoWHBTUjhhZjc5d2JkWGRlS21Ubmg1ZzRDeDhtZHVlcHlPTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1640097273),
('7Zv2FAqyrPJ5gW9cyOzfSXUTL7DJNsm6IKKJdeax', 18, '103.155.118.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo4OntzOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImZ5bnBxZnh2SDdXcVBMdWw2d09ONFRSTWUwVnJLWG5udkdqTmduTUciO3M6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE4O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkTms3YmNoTGZtSW5wR2JuTVJUeC9pdUxnYVFUWndPUDM0dlpUanFJdDJZY3laTTQyQk9ZVGkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJE5rN2JjaExmbUlucEdibk1SVHgvaXVMZ2FRVFp3T1AzNHZaVGpxSXQyWWN5Wk00MkJPWVRpIjtzOjY6ImxvY2FsZSI7czoyOiJlbiI7fQ==', 1640099089),
('991Onak3kfHEDewPlA4s66kARNhQFs4DqhpXC4NI', 16, '103.155.118.227', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWWxhamdsd1EybWR1dEFoU0lMbjJNQWk1U1dJZ085MlU4dUlzankwRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRwLjNQMmZPTUhGNElHR0ZjdklWN3ZlWVRxS1I4LmpaSUpuSEQ3dFpjLm91T2R4Z1FCS0FJTyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkcC4zUDJmT01IRjRJR0dGY3ZJVjd2ZVlUcUtSOC5qWklKbkhEN3RaYy5vdU9keGdRQktBSU8iO30=', 1640098141),
('isq7cPiLMDdNarMBCfBqI9jfeleyv7G0ziloxuYm', NULL, '103.106.238.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieDdEd3F4cEVZcm1vNFN0WGNISnp1RU9vQWdMRVFPb3luMWlJVW5uUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxOTg6Imh0dHBzOi8vamFtdGFsZW50LnRlc3QudGVzdHNlcnZlci5qYW10YWxlbnQubmV0L2VtYWlsL3ZlcmlmeS8xNS9kMTk5MmFiNjM2YzBlMmEwMDBkYzkxNzI5MmM1NGYzN2I4NTVlYWE4P2V4cGlyZXM9MTYzOTkwNDE4OSZzaWduYXR1cmU9ODkwYWUwYjdkOTA2ODE1OTgwYzYwZTdiNTBhYzdiYTVjOTAwMjNkZjM2MTQxZGZjNmEzYzM0NDZjNDUyMDI5NCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ3OiJodHRwczovL2phbXRhbGVudC50ZXN0LnRlc3RzZXJ2ZXIuamFtdGFsZW50Lm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1640105084),
('4guuwGKGzc3q3Bo4o1czjHAnaKic9mcCjLFOtwUo', NULL, '103.216.193.97', 'Mozilla/5.0 (Linux; Android 11; SM-A225F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.104 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTNBSWtkdjQ0T1h2U1hRWEg4WkJtOGxCZDQyTDlEcVBNSnpSZ2JWZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1640117869),
('Ru5kprP5CRT0AWcyZseq3itPfaYQ3FbSmdyIKGeV', NULL, '162.142.125.194', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2l3eWdTaUh2VklRS0FTY3FDQXhkT0MyeU9tU3VTazVub1B6MTJmSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vd3d3LmphbS50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640120034),
('zIScwNXBPWHib8qszU6fKsc24EG7W6LyPLFKcnrJ', NULL, '162.142.125.194', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3hjeTRDOFdjc0pVTzVCUzNxUnM3MUtQdllzU2NkdENKTW5xWTB5TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly93d3cuamFtLnRlc3RzZXJ2ZXIuamFtdGFsZW50Lm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1640120034),
('XgePn6ouNnRFZN1p29pMpgf6zYbY0W0CU8GII1C5', NULL, '34.86.35.8', 'Expanse indexes the network perimeters of our customers. If you have any questions or concerns, please reach out to: scaninfo@expanseinc.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekFvOTNRQmdRVDhTYUVBVzg3MllwaDMxUUJiNE9JWHFMUFVCdkNjRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vamFtLnRlc3RzZXJ2ZXIuamFtdGFsZW50Lm5ldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1640135041),
('gxl4O1JXFLSflKIDqGWeWqt7O0WQigebUQvs92mQ', 16, '103.106.238.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiV01WY0hwcGhodlY4ZnRvZU41UFFjOGcyS2xKZEdsajhYSlp4eDR5ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTY7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRwLjNQMmZPTUhGNElHR0ZjdklWN3ZlWVRxS1I4LmpaSUpuSEQ3dFpjLm91T2R4Z1FCS0FJTyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkcC4zUDJmT01IRjRJR0dGY3ZJVjd2ZVlUcUtSOC5qWklKbkhEN3RaYy5vdU9keGdRQktBSU8iO30=', 1640163986),
('V6RolvBD8Egfsx0XCOcqM6x0mLNe38OxicBgVb7h', NULL, '103.106.238.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUhLakprNmpkaTBBeElFZDloU0FZeGw4VlFReEZWdFpWVnNCeEI3cSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640167596),
('vTgm0CMp3kdCEz4YIg8ICsXEs4Ph3heHB11aoN4y', NULL, '43.228.239.5', 'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQklUZHFKSEZOMEM4ZllpUGcxeXBDOXVHU0d1N1ZsYk1EWnM0b3ZodSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640167724),
('3GPUqO8VqY4MrhKJkmUla47IXN6VOtUG2pyLbhky', NULL, '193.187.113.131', 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30618)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWHhxdTl3VmZ1M09lbmo2TjU2b1VGN1hCNkpxMlNtOVVLMWJaMkV1eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1640167799),
('Flj1oilEo0OeV99EFHjeBNbPel1mDj5TO40SkMWX', NULL, '103.106.238.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNFRLV0pPU3VRZElXSzdnZkhlb3cyT2F0SmJVZEFWbHVMWVRGZVB2diI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1640178485),
('FJHrA0lHvKTsuyTjzbOUfoJPrWYK9vc1uDuMz2TZ', NULL, '103.106.238.77', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnhNVTQ2ZmFrcndITkNCQ0ZybmRYVWRQc1pRMGlZR3NqUU96ZXpqciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9qYW10YWxlbnQudGVzdC50ZXN0c2VydmVyLmphbXRhbGVudC5uZXQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1640178670);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skill_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `freelancer_id` int(11) DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_type` int(11) NOT NULL COMMENT '1 for fixed 2 for hourly ',
  `delivery_time` int(11) NOT NULL,
  `min_budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_applies`
--

CREATE TABLE `task_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `min_budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type` int(11) NOT NULL DEFAULT '0' COMMENT '1 for day 0 for hour ',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active',
  `delivary_time` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_offers`
--

CREATE TABLE `task_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1 for active 0 for en-active',
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1 for man 2 for woman',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hourly_rate` int(11) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `verified` int(11) NOT NULL DEFAULT '1',
  `user_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendation_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification_certificate_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendation_letter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `back_job_contacts`
--
ALTER TABLE `back_job_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_infos`
--
ALTER TABLE `bank_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogtypes`
--
ALTER TABLE `blogtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_mark_employers`
--
ALTER TABLE `book_mark_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_mark_freelancers`
--
ALTER TABLE `book_mark_freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_mark_jobs`
--
ALTER TABLE `book_mark_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_mark_tasks`
--
ALTER TABLE `book_mark_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivary_orders`
--
ALTER TABLE `delivary_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_activities`
--
ALTER TABLE `employer_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_histories`
--
ALTER TABLE `employment_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_activities`
--
ALTER TABLE `freelancer_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_balances`
--
ALTER TABLE `freelancer_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_plans`
--
ALTER TABLE `membership_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cancels`
--
ALTER TABLE `order_cancels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_checkouts`
--
ALTER TABLE `order_checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_employers`
--
ALTER TABLE `review_employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_freelancers`
--
ALTER TABLE `review_freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_applies`
--
ALTER TABLE `task_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_offers`
--
ALTER TABLE `task_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `back_job_contacts`
--
ALTER TABLE `back_job_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_infos`
--
ALTER TABLE `bank_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogtypes`
--
ALTER TABLE `blogtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_mark_employers`
--
ALTER TABLE `book_mark_employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_mark_freelancers`
--
ALTER TABLE `book_mark_freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_mark_jobs`
--
ALTER TABLE `book_mark_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_mark_tasks`
--
ALTER TABLE `book_mark_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chat_rooms`
--
ALTER TABLE `chat_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivary_orders`
--
ALTER TABLE `delivary_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employer_activities`
--
ALTER TABLE `employer_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employment_histories`
--
ALTER TABLE `employment_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freelancer_activities`
--
ALTER TABLE `freelancer_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `freelancer_balances`
--
ALTER TABLE `freelancer_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_plans`
--
ALTER TABLE `membership_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_cancels`
--
ALTER TABLE `order_cancels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_checkouts`
--
ALTER TABLE `order_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_employers`
--
ALTER TABLE `review_employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_freelancers`
--
ALTER TABLE `review_freelancers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_applies`
--
ALTER TABLE `task_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_offers`
--
ALTER TABLE `task_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

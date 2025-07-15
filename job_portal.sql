-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2025 at 05:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cv_path` varchar(255) NOT NULL,
  `status` enum('pending','shortlisted','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `job_post_id`, `phone`, `address`, `cv_path`, `status`, `created_at`, `updated_at`) VALUES
(10, 4, 9, '01866858344', '414/4, lake view road, south paikpara, dhaka', 'cvs/4nGyn5X5M59zBtvrI3XkLWzK5lisgw3hnCBX2qJW.png', 'pending', '2025-07-13 10:59:19', '2025-07-13 10:59:19'),
(11, 4, 8, '01866858344', '414/4, lake view road, south paikpara, dhaka', 'cvs/KMSGVobSwFpcPj2Iyo5RxKtEwVz7eNbtDVD26Buw.png', 'rejected', '2025-07-14 05:17:32', '2025-07-14 06:15:39'),
(12, 12, 9, '01866858344', '414/4, lake view road, south paikpara, dhaka', 'cvs/ShYhZjJkV3JQLXtlggWQOHzb78AL6u5rWqjp7VmM.png', 'pending', '2025-07-14 05:38:01', '2025-07-14 05:38:01'),
(13, 6, 9, '01866858344', 'Mirpur, Dhaka-1216', 'cvs/dy8BrRoSWksEAeau9LOuUVsB0tBydGcbjzNKud5Z.pdf', 'pending', '2025-07-14 08:48:48', '2025-07-14 08:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:18:{i:0;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:16:\"Job Details View\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:1;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"Delete Jobs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:2;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:9:\"Edit Jobs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:3;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:9:\"View Jobs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:4;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:11:\"Create Jobs\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:2;i:1;i:3;}}i:5;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:11:\"Delete User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:6;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:9:\"Edit User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:7;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:9:\"View User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:8;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:9:\"Edit Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:9;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:11:\"Delete Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:10;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:11:\"Create Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:11;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"View Permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:12;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:17:\"Delete Permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:13;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:15:\"Edit Permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:14;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"Create Permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:15;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:9:\"View Role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:3;}}i:16;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:9:\"Apply Job\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:16:\"See Applications\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"Candidate\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:8:\"Employer\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}}}', 1752563276);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `job_description` text DEFAULT NULL,
  `salary_range` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_type` enum('full-time','part-time','internship','contract') NOT NULL DEFAULT 'full-time',
  `job_level` enum('entry','mid','senior') DEFAULT NULL,
  `experience_required` int(11) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `employer_id`, `job_title`, `job_category`, `job_description`, `salary_range`, `company_name`, `location`, `job_type`, `job_level`, `experience_required`, `education_level`, `application_deadline`, `is_active`, `views`, `created_at`, `updated_at`, `user_id`) VALUES
(8, NULL, 'Software Engineer', 'IT & Software', 'Key Responsibilities:\r\nDesign and Development:\r\nCreating software solutions, including coding, debugging, and implementing new features.\r\nTesting and Quality Assurance:\r\nEnsuring software functions correctly and meets performance requirements through various testing methods.\r\nCollaboration:\r\nWorking with other engineers, designers, and stakeholders to define requirements and deliver solutions.\r\nMaintenance and Support:\r\nTroubleshooting and fixing software issues, as well as maintaining existing codebases.\r\nDocumentation:\r\nCreating and maintaining documentation for software design, code, and user guides.\r\nStaying Updated:\r\nKeeping abreast of new technologies and trends in software development. \r\nSkills Required:\r\nProgramming Languages: Proficiency in languages like Java, Python, C++, or others relevant to the role. \r\nProblem-solving: Ability to analyze and solve complex technical issues. \r\nSoftware Development Lifecycle (SDLC): Understanding of the stages involved in software development. \r\nCommunication and Collaboration: Ability to effectively communicate technical information and work in a team. \r\nAnalytical Skills: Ability to understand user needs and translate them into technical requirements.', '10000-20000', 'eGeneration PLC', 'Chittagang, Bangladesh', 'part-time', 'mid', 1, 'B.Sc. in CSE', '2025-07-31', 1, 0, '2025-07-13 05:13:58', '2025-07-13 05:13:58', 5),
(9, NULL, 'Marketing Executive', 'Marketing', 'A marketing executive is responsible for developing and implementing marketing strategies to promote a company\'s products or services. This includes conducting market research, managing marketing campaigns, and analyzing campaign performance. They work to increase brand awareness, drive sales, and build customer relationships. \r\nKey Responsibilities:\r\nDeveloping and Implementing Marketing Strategies:\r\nCreating and executing marketing plans to achieve business objectives. \r\nMarket Research:\r\nAnalyzing market trends, competitor activity, and customer preferences to inform marketing strategies. \r\nCampaign Management:\r\nOverseeing the planning, execution, and evaluation of marketing campaigns across various channels. \r\nContent Creation:\r\nDeveloping engaging content for websites, social media, and other marketing materials. \r\nAdvertising and Promotion:\r\nManaging advertising campaigns, both online and offline, to reach target audiences. \r\nBudget Management:\r\nControlling marketing expenses and ensuring efficient use of resources. \r\nPerformance Analysis:\r\nTracking and analyzing campaign performance metrics to assess effectiveness and identify areas for improvement. \r\nRelationship Management:\r\nBuilding and maintaining relationships with clients, partners, and other stakeholders. \r\nStaying Updated:\r\nKeeping abreast of the latest marketing trends, technologies, and best practices. \r\nSkills Required:\r\nCommunication Skills: Excellent written and verbal communication skills are essential for conveying marketing messages and building relationships. \r\nInterpersonal Skills: The ability to work effectively with colleagues, clients, and partners is crucial. \r\nAnalytical Skills: Strong analytical and data interpretation skills are needed to assess campaign performance and identify opportunities. \r\nCreativity and Innovation: The ability to develop creative marketing ideas and campaigns is important. \r\nStrategic Thinking: The capacity to develop and implement effective marketing strategies. \r\nProject Management: The ability to manage multiple projects simultaneously and meet deadlines. \r\nDigital Marketing Proficiency: Familiarity with various digital marketing channels and tools. \r\nCommercial Awareness: Understanding of business principles and market dynamics.', '50000-60000', 'eGeneration PLC', 'Dhaka, Banngladesh', 'full-time', 'senior', 4, 'BBA', '2025-07-31', 1, 0, '2025-07-13 05:19:19', '2025-07-14 06:18:14', 5);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_02_104355_create_permission_tables', 1),
(5, '2025_07_07_131510_create_job_posts_table', 1),
(6, '2025_07_10_131038_add_user_id_to_job_posts_table', 2),
(7, '2025_07_13_101712_add_job_category_to_job_posts_table', 2),
(8, '2025_07_13_130102_create_applications_table', 3),
(9, '2025_07_14_120347_add_status_to_applications_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Job Details View', 'web', '2025-07-09 04:32:27', '2025-07-09 06:41:52'),
(3, 'Delete Jobs', 'web', '2025-07-09 04:32:50', '2025-07-09 04:32:50'),
(4, 'Edit Jobs', 'web', '2025-07-09 04:33:07', '2025-07-09 04:33:07'),
(5, 'View Jobs', 'web', '2025-07-09 04:33:18', '2025-07-09 04:33:18'),
(6, 'Create Jobs', 'web', '2025-07-09 06:23:06', '2025-07-09 06:23:06'),
(7, 'Delete User', 'web', '2025-07-09 06:34:27', '2025-07-09 06:34:27'),
(8, 'Edit User', 'web', '2025-07-09 06:34:53', '2025-07-09 06:34:53'),
(9, 'View User', 'web', '2025-07-09 06:35:23', '2025-07-09 06:35:23'),
(10, 'Edit Role', 'web', '2025-07-09 06:43:54', '2025-07-09 06:43:54'),
(11, 'Delete Role', 'web', '2025-07-09 06:44:10', '2025-07-09 06:44:10'),
(12, 'Create Role', 'web', '2025-07-09 06:44:22', '2025-07-09 06:44:22'),
(13, 'View Permission', 'web', '2025-07-09 06:51:47', '2025-07-09 06:51:47'),
(14, 'Delete Permission', 'web', '2025-07-09 06:52:06', '2025-07-09 06:52:06'),
(15, 'Edit Permission', 'web', '2025-07-09 06:52:22', '2025-07-09 06:52:22'),
(16, 'Create Permission', 'web', '2025-07-09 06:52:40', '2025-07-09 06:52:40'),
(17, 'View Role', 'web', '2025-07-09 06:54:44', '2025-07-09 06:54:44'),
(21, 'Apply Job', 'web', '2025-07-13 05:43:11', '2025-07-13 05:43:11'),
(22, 'See Applications', 'web', '2025-07-13 09:23:22', '2025-07-13 09:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Candidate', 'web', '2025-07-09 04:33:41', '2025-07-09 04:33:41'),
(2, 'Employer', 'web', '2025-07-09 04:33:54', '2025-07-09 04:33:54'),
(3, 'Admin', 'web', '2025-07-09 06:57:53', '2025-07-09 06:57:53');

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
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 2),
(4, 3),
(5, 1),
(5, 2),
(5, 3),
(6, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(21, 1),
(22, 1);

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8MSJ5EL7peIz2X9NXYBxuV6LwrYdVW4w9RTqbMT7', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieHJOTWxXeDVXbDN1N2o4UzhmckdRcVZWY01iRVA1V2FSZUhBOEI0OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9qb2JzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==', 1752476895),
('GNW05XiHrfjwLKKJtl8lla82HuOosx7vGgVSqtu7', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWJoWUdaMVVHYklzT1BIYTZrU21mNzRiUFd5RWRRVWZtTWs5cVRmeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9lbXBsb3llci9qb2JzLzkvYXBwbGljYW50cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1752483159),
('onJQcngUpZTHeMtm9fkBZi7qKdG1f9Qp53otWYqC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFFwUk44TGtFVUFlYko5RWlTVk42RTZuMTl2T0gxRnp3eDk1cXJpWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1752483681);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@admin.com', NULL, '$2y$12$8r1LEGuiXskC5OXNqgx/OOiTKtOP/i.p7nv2aaDuDHrJoewfmU8hy', NULL, '2025-07-09 05:32:33', '2025-07-09 05:32:33'),
(4, 'Tanmoy Dhar Ripon', 'tanmoydhar1077@gmail.com', NULL, '$2y$12$/3gJC8djBy2OjUAgDJhakeofMtk/X92UGRfPyPKXfrTq1Pgx0ddUW', NULL, '2025-07-09 07:06:21', '2025-07-09 07:06:21'),
(5, 'eGeneration', 'egeneration@example.com', NULL, '$2y$12$.ja5OclbT12lGR9vgFp5Ge8WN.0j2sN3ayKHy8JNEZ5MU4t7NMQ6a', NULL, '2025-07-09 11:30:06', '2025-07-09 11:30:06'),
(6, 'Prince', 'prince@gmmail.com', NULL, '$2y$12$mhChWNvcBkN83AvysIXTBumvIXF.8vI.9vA8amLccKW1/hSIvOGfC', NULL, '2025-07-10 05:12:23', '2025-07-10 05:12:23'),
(7, 'Likhon', 'likhon@gmail.com', NULL, '$2y$12$SxrhjUrXIQoZtTLi005H0ehPhpmcs42B4Y2EIV1ofm4f7Geh1mpSC', NULL, '2025-07-10 05:13:29', '2025-07-10 05:13:29'),
(9, 'Tanmoy Dhar Ripon', 'tanmoy@gmail.com', NULL, '$2y$12$fL3Y1ISVk5fKRmttOPu/bejDLoeiNTAz/gLD1QI33VCY9ZwGRYxiW', NULL, '2025-07-10 05:47:04', '2025-07-10 05:47:04'),
(11, 'Super Admin', 'admin@example.com', NULL, '$2y$12$TcSH7.3sjtFzAWx39rmqUePb0RrXmRlMCCzA3yi.DS/ANOYwZAZy.', NULL, '2025-07-10 06:25:01', '2025-07-10 06:25:01'),
(12, 'Prince Saha', 'prince@gmail.com', NULL, '$2y$12$yq3uqGhPLqE9yMJgySnmT.BGRafhfba0N5uVPOHlU6/tSvXFE69py', NULL, '2025-07-14 05:37:04', '2025-07-14 05:37:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applications_user_id_job_post_id_unique` (`user_id`,`job_post_id`),
  ADD KEY `applications_job_post_id_foreign` (`job_post_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_posts_employer_id_foreign` (`employer_id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_job_post_id_foreign` FOREIGN KEY (`job_post_id`) REFERENCES `job_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD CONSTRAINT `job_posts_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

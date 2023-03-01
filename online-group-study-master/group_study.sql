-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_study`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `option_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 7, '2022-04-02 20:28:15', '2022-04-02 20:28:15'),
(2, 5, 12, 7, '2022-04-02 20:28:15', '2022-04-02 20:28:15'),
(3, 6, 16, 7, '2022-04-02 20:28:15', '2022-04-02 20:28:15'),
(4, 7, 20, 7, '2022-04-02 20:28:15', '2022-04-02 20:28:15'),
(5, 8, 24, 7, '2022-04-02 20:28:15', '2022-04-02 20:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_start_date` datetime DEFAULT NULL,
  `exam_end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `topic_id`, `user_id`, `exam_start_date`, `exam_end_date`, `created_at`, `updated_at`) VALUES
(1, 6, 7, '2022-04-03 02:25:42', '2022-04-03 02:28:15', '2022-04-02 20:25:42', '2022-04-02 20:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approve` int(11) NOT NULL DEFAULT 0,
  `admin_user_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `user_id`, `gname`, `is_approve`, `admin_user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BCS preparation 44', 0, 0, 1, '2022-03-07 10:21:38', '2022-03-07 10:21:38'),
(2, 1, 'job math preparation', 0, 0, 1, '2022-03-12 12:01:28', '2022-03-12 12:01:28'),
(3, 3, 'Job English Preparation', 0, 0, 1, '2022-03-16 04:07:58', '2022-03-16 04:07:58'),
(4, 4, 'Job Bangla preparation', 0, 0, 1, '2022-03-16 04:21:33', '2022-03-16 04:21:33'),
(5, 5, 'job science preparation', 0, 0, 1, '2022-03-16 04:23:42', '2022-03-16 04:23:42'),
(6, 6, 'job ict preparation', 0, 0, 1, '2022-03-16 04:28:21', '2022-03-16 04:28:21'),
(7, 7, 'Primary Job preparation', 0, 7, 1, '2022-03-17 20:28:13', '2022-03-17 20:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, '2022-03-15 07:09:37', '2022-03-15 07:09:37'),
(2, 2, 1, 0, '2022-03-15 07:10:14', '2022-03-15 07:10:14'),
(3, 2, 1, 0, '2022-03-15 07:10:25', '2022-03-15 07:10:25'),
(4, 2, 1, 0, '2022-03-15 07:11:09', '2022-03-15 07:11:09'),
(5, 2, 1, 0, '2022-03-15 07:11:22', '2022-03-15 07:11:22'),
(6, 1, 1, 1, '2022-03-15 07:12:16', '2022-03-15 07:12:16'),
(7, 1, 4, 1, '2022-03-16 09:00:18', '2022-03-16 09:00:18'),
(8, 7, 7, 1, '2022-03-17 20:28:13', '2022-03-17 20:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(6, '2022_01_23_151759_create_sessions_table', 1),
(7, '2022_01_28_170805_create_groups_table', 1),
(8, '2022_03_13_043623_create_group_members_table', 2),
(9, '2022_03_18_054332_create_topics_table', 3),
(10, '2022_03_18_124015_create_questions_table', 4),
(11, '2022_03_18_124956_create_options_table', 4),
(12, '2022_04_02_123530_create_exams_table', 5),
(13, '2022_04_02_123548_create_answers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_answer` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `is_answer`, `created_at`, `updated_at`) VALUES
(5, 3, 'এশিয়া', 1, '2022-04-02 04:50:22', '2022-04-02 04:50:22'),
(6, 3, 'ইউরোপ', 0, '2022-04-02 04:50:31', '2022-04-02 04:50:31'),
(7, 3, 'আমেরিকা', 0, '2022-04-02 04:50:40', '2022-04-02 04:50:40'),
(8, 4, 'বুধ', 0, '2022-04-02 10:05:30', '2022-04-02 10:05:30'),
(9, 4, 'মঙ্গল', 0, '2022-04-02 10:05:51', '2022-04-02 10:05:51'),
(10, 4, 'শুক্র', 1, '2022-04-02 10:05:59', '2022-04-02 10:05:59'),
(11, 4, 'ইউরেনাস', 0, '2022-04-02 10:06:18', '2022-04-02 10:06:18'),
(12, 5, 'উপবৃত্তাকার', 1, '2022-04-02 10:07:10', '2022-04-02 10:07:10'),
(13, 5, 'সর্পিলাকার', 0, '2022-04-02 10:07:30', '2022-04-02 10:07:30'),
(14, 5, 'বৃত্তাকার', 0, '2022-04-02 10:08:06', '2022-04-02 10:08:06'),
(15, 5, 'অর্ধবৃত্তাকার', 0, '2022-04-02 10:08:18', '2022-04-02 10:08:18'),
(16, 6, 'নক্ষত্র শুধু রাতে জ্বলে', 0, '2022-04-02 10:12:48', '2022-04-02 10:12:48'),
(17, 6, 'দিনে চাঁদ দেখা যায় না বলে?', 0, '2022-04-02 10:13:15', '2022-04-02 10:13:15'),
(18, 6, 'সূর্য রাতে কিরণ দেয় না', 0, '2022-04-02 10:13:51', '2022-04-02 10:13:51'),
(19, 6, 'সূর্যের প্রখর আলোর জন্য', 1, '2022-04-02 10:14:29', '2022-04-02 10:14:29'),
(20, 7, 'বুধ ও শুক্র', 1, '2022-04-02 10:15:10', '2022-04-02 10:15:10'),
(21, 7, 'শুক্র ও শনি', 0, '2022-04-02 10:15:24', '2022-04-02 10:15:24'),
(22, 7, 'বুধ ও বৃহস্পতি', 0, '2022-04-02 10:15:46', '2022-04-02 10:15:46'),
(23, 7, 'শুক্র ও ইউরেনাস', 0, '2022-04-02 10:16:05', '2022-04-02 10:16:05'),
(24, 8, '৯০', 0, '2022-04-02 10:17:21', '2022-04-02 10:17:21'),
(25, 8, '১৮০', 0, '2022-04-02 10:17:44', '2022-04-02 10:17:44'),
(26, 8, '২৭০', 0, '2022-04-02 10:17:57', '2022-04-02 10:17:57'),
(27, 8, '৩৬০', 1, '2022-04-02 10:18:06', '2022-04-02 10:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(11) NOT NULL,
  `group_member_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `topic_id`, `group_member_id`, `user_id`, `question`, `created_at`, `updated_at`) VALUES
(2, 5, 8, 7, 'বাংলাদেশের আয়তন কত?', '2022-04-02 04:49:23', '2022-04-02 04:49:23'),
(3, 5, 8, 7, 'সবচেয়ে বড় মহাদেশের নাম কি?', '2022-04-02 04:50:04', '2022-04-02 04:50:04'),
(4, 6, 8, 7, 'কোন গ্রহে এসিড বৃষ্টি হয়?', '2022-04-02 10:01:07', '2022-04-02 10:01:07'),
(5, 6, 8, 7, 'মহাবিশ্বে কোন গ্যালাক্সিগুলো বেশি উজ্জ্বল?', '2022-04-02 10:01:57', '2022-04-02 10:01:57'),
(6, 6, 8, 7, 'দিনের বেলায় নক্ষত্র দেখা যায় না কেন?', '2022-04-02 10:02:28', '2022-04-02 10:02:28'),
(7, 6, 8, 7, 'কোন দুটি গ্রহের কোন উপগ্রহ নেই?', '2022-04-02 10:02:59', '2022-04-02 10:02:59'),
(8, 6, 8, 7, 'পৃথিবীর কেন্দ্রে উৎপন্ন কোনের মান কত ডিগ্রী?', '2022-04-02 10:04:14', '2022-04-02 10:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('aPW8k8vFMsmA90FKpR4EEedxdg63gwteaBVl2Y9w', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXh2aGhZOTg1bGxTZVU3ZDg3b0Y3eUNmQ3NMZFBSOUZlSXdwb0s4MSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ncm91cC9zdHVkeS90b3BpY3MvNyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1648936352),
('go11z5aISTb6baIdznTeyYPJMrjMYFdzmZ1eEq27', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVzk0Wng2S1VxbFlGSVdheXhnamlPb1lsSUFrNWhNNTBQSlpueEZ0TiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlL2V4YW0vaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6NToiYWxlcnQiO2E6MDp7fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRzFhZ0VKUXpvd0tzUGVXZGFTYWYvLkZpTVprQmRlTGhUaXJ5eGRPMmt0bVJYUENYclA3cnUiO30=', 1648936747),
('VOwovDQSYNjTPeWMNLSsc4PS2050Gkn342Sb5HgV', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:98.0) Gecko/20100101 Firefox/98.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTUdkQ0Q2N3ppS3NjSzJxZ0pORk9udWFJY2t1Uzh3c2dsd0lLSzRseiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wcm9maWxlL2V4YW0vaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6NToiYWxlcnQiO2E6MDp7fXM6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkRzFhZ0VKUXpvd0tzUGVXZGFTYWYvLkZpTVprQmRlTGhUaXJ5eGRPMmt0bVJYUENYclA3cnUiO30=', 1648952896);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `group_member_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_no` int(11) NOT NULL,
  `duration` decimal(12,2) NOT NULL,
  `exam_start_date` datetime DEFAULT current_timestamp(),
  `exam_end_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `group_id`, `group_member_id`, `start_date`, `end_date`, `title`, `description`, `question_no`, `duration`, `exam_start_date`, `exam_end_date`, `status`, `created_at`, `updated_at`) VALUES
(5, 7, 8, '2022-04-02', '2022-04-08', 'বাংলাদেশ ও বিশ্ব রাজনীতি', 'বাংলাদেশ ও বিশ্ব রাজনীতি', 20, '10.00', '2022-04-02 17:24:23', '2022-04-02 17:24:23', 1, '2022-04-02 04:46:06', '2022-04-02 15:58:11'),
(6, 7, 8, '2022-04-12', '2022-04-19', 'মহাবিশ্ব ও আমাদের পৃথিবী', 'মহাবিশ্ব ও আমাদের পৃথিবী', 20, '1.00', '2022-04-02 20:04:29', '2022-04-02 20:04:29', 1, '2022-04-02 08:04:29', '2022-04-02 20:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Al Mamun', 'Al', 'Mamun', 'almamuncseru@gmail.com', NULL, '$2y$10$F1nHHpmrRY3u/JmDPjO.yukmC.BM5QnFAnqDRVAlMU2UMtEuzhkbm', NULL, NULL, NULL, NULL, NULL, '2022-03-07 10:21:03', '2022-03-07 10:21:03'),
(2, 'Arup susmita', 'Arup', 'susmita', 'arupcseru@gmail.com', NULL, '$2y$10$XFqdEXAuHD3juzu6w68G4eijBElLTR4rwyOnYW4ia5iG.jrRuAVom', NULL, NULL, NULL, NULL, NULL, '2022-03-12 23:55:55', '2022-03-12 23:55:55'),
(3, 'Arif jaman', 'Arif', 'jaman', 'arifcse@gmail.com', NULL, '$2y$10$0SCbOAr.cGXHrzyuL22XUOBdSSu.sKzkhXNUyFNulJg4GpV2h/8IG', NULL, NULL, NULL, NULL, NULL, '2022-03-16 03:48:19', '2022-03-16 03:48:19'),
(4, 'Mahadi abir', 'Mahadi', 'abir', 'abircse@gmail.com', NULL, '$2y$10$KS9MET0waAep26GO1A9Vue/vnTw.JDO1zQHGUTNrbuwHpxSgaWWKS', NULL, NULL, NULL, NULL, NULL, '2022-03-16 04:21:02', '2022-03-16 04:21:02'),
(5, 'Ashik ali', 'Ashik', 'ali', 'ashikcse@gmail.com', NULL, '$2y$10$lkwt8FhOqq3mHcefpdT8xe8g71jbDMLh6IE8Pwyy//UZ6dvgimgoe', NULL, NULL, NULL, NULL, NULL, '2022-03-16 04:23:07', '2022-03-16 04:23:07'),
(6, 'anik modak', 'anik', 'modak', 'anikcse@gmail.com', NULL, '$2y$10$RIrmk8k6nFliH5hIdEPVKuwZCGVZ30aRZBZ47ldf09TUk74uwclTW', NULL, NULL, NULL, NULL, NULL, '2022-03-16 04:27:52', '2022-03-16 04:27:52'),
(7, 'Md. Mominul Haque', 'Md. Mominul', 'Haque', 'mdtopu11@gmail.com', NULL, '$2y$10$G1agEJQzowKsPeWdaSaf/.FiMZkBdeLhTiryxdO2ktmRXPCXrP7ru', NULL, NULL, NULL, NULL, NULL, '2022-03-17 20:26:29', '2022-03-17 20:26:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

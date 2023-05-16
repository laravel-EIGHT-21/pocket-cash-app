-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pocketcashdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_transfers`
--

CREATE TABLE `api_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_acct_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `externalId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_transfers`
--

INSERT INTO `api_transfers` (`id`, `student_acct_no`, `amount`, `currency`, `reference_id`, `externalId`, `payer_number`, `status`, `transfer_date`, `transfer_month`, `transfer_year`, `created_at`, `updated_at`) VALUES
(1, '02399093', 45000, 'EUR', '2df7ae35-df03-4c51-868e-5daa7f69ba6e', '1102', '0779913330', 'SUCCESSFUL', '16 May 23', 'May 23', '23', '2023-05-16 10:55:26', '2023-05-16 10:55:26'),
(2, '01312446', 75000, 'EUR', 'ad355892-486e-41f8-b855-290d0e8c7772', '4239', '0758799682', 'SUCCESSFUL', '16 May 23', 'May 23', '23', '2023-05-16 11:06:00', '2023-05-16 11:06:00'),
(3, '02399093', 145000, 'EUR', 'a3c74035-5d4f-4dbd-a957-36f552258c3e', '6248', '0779913330', 'SUCCESSFUL', '16 May 23', 'May 23', '23', '2023-05-16 16:47:53', '2023-05-16 16:47:53'),
(4, '02399093', 5000, 'EUR', '6778c24b-07d3-4439-983c-17e2ea4a6d39', '2494', '0779913330', 'SUCCESSFUL', '16 May 23', 'May 23', '23', '2023-05-16 17:32:00', '2023-05-16 17:32:00'),
(5, '01312446', 75000, 'EUR', '1365148c-7c26-4d05-987e-01d758e569c7', '769', '0758799682', 'SUCCESSFUL', '16 May 23', 'May 23', '23', '2023-05-16 17:38:04', '2023-05-16 17:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_acct_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_amount` double DEFAULT NULL,
  `loan_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_payment_amount` double DEFAULT NULL,
  `loan_payment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_payment_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_payment_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `student_id`, `student_acct_no`, `loan_amount`, `loan_date`, `loan_month`, `loan_year`, `loan_payment_amount`, `loan_payment_date`, `loan_payment_month`, `loan_payment_year`, `created_at`, `updated_at`) VALUES
(1, 1, '02399093', 5000, '16 May 2023', 'May 2023', '2023', NULL, NULL, NULL, NULL, '2023-05-16 18:14:36', '2023-05-16 18:14:36');

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
(6, '2023_01_26_085056_create_sessions_table', 1),
(7, '2023_01_26_090400_add_status_to_users_table', 2),
(8, '2023_04_14_095051_create_schools_table', 2),
(9, '2023_04_14_095210_create_school_students_table', 2),
(10, '2023_04_14_095335_create_school_transactions_table', 2),
(11, '2023_04_27_185432_create_loans_table', 3),
(12, '2023_04_27_185456_create_withdrawals_table', 3),
(13, '2023_05_03_090452_create_questions_table', 4),
(14, '2023_05_04_093927_create_posts_table', 5),
(15, '2018_03_20_000001_create_mtn_momo_tokens_table', 6),
(16, '2023_05_09_135444_create_api_transfers_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mtn_momo_tokens`
--

CREATE TABLE `mtn_momo_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `access_token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bearer',
  `product` enum('collection','disbursement','remittance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mtn_momo_tokens`
--

INSERT INTO `mtn_momo_tokens` (`id`, `access_token`, `refresh_token`, `token_type`, `product`, `created_at`, `updated_at`, `expires_at`, `deleted_at`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE1VDExOjQyOjM3LjMxMCIsInNlc3Npb25JZCI6ImRlZWY3NDU0LTExYzQtNGU4OS1hZmVmLTUyY2Y3NTY2NzdjYSJ9.jQuKBvR4bhuLmVXYSMkn1TUouW3oFxgRpWMjBEiz7GGwDG2RCxiWh6EuomgX-hmLg-g2p1zf7fnWdKybFmXLXp74Ux9cK_1qEvuj55ei91YbCIcdIU08IQ5rC9EG0o8fK9r_S1Ryrcudn1ESDp2u54zUEhGHBfthhgoIDpqwYwhgCYKAJOJ_XkPXMOs_zi92dpz2uee6k13oL5Ea-R7aqR7lRgI1tPa8BGuF0wVh3TgHqf11LFmHVcl70Cwqwh8zbjkD9BD_bq10Q03lr5p7a9XnjyF_HCL-c3qGSemvTZZkRHKjjm5JeirLk4nNmrChby7glZubq-VIwfj9EVCx6w', NULL, 'Bearer', 'remittance', '2023-05-15 07:42:37', '2023-05-15 07:42:37', '2023-05-15 08:42:37', NULL),
(2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE1VDEzOjE1OjA2LjEwMyIsInNlc3Npb25JZCI6ImFlNDVlNmYxLWYxMDUtNGIwYy05OTVjLTJiODY5N2RhMGNjNiJ9.PxGqlJsct3MRwO3Y3qbY7gostG2qmkKZ4UrJW2B3Q9RyiBp4bGIjNwjn5iJ1fhBJmg2tBDCK2VyHMDc-x5hNT2c6Aco4j5qRMnMssMzie6b1u-4BT5MkvZEqDUhIu8vwcCzGawAdbNm1B2LWw-uosNJF0Gn6YDtDQ9wUFZPLPmpQrehMcaWqaiewp7pnE6D8Ejghu8ciTSEyyjt0x8iartL_P8soyjrEZMU2USoeiI9lPQT-6r1r4r8MCjxzKUORtXd5FkcDMulmTfyIpj-0gN8NNOI-BWQKYiACmq8pAHwYip3OIEnu9ChvcCcRXsJj18z1oGHfQKCsHkkqSTdRlg', NULL, 'Bearer', 'remittance', '2023-05-15 09:15:06', '2023-05-15 09:15:06', '2023-05-15 10:15:06', NULL),
(3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE1VDE5OjI5OjA0LjU2OSIsInNlc3Npb25JZCI6ImM0ZDVhZmY2LTY0YzYtNDY2NS05NjU3LWM4MzIxODQ1NGQ3MiJ9.g57LB3TkkvyirmSADsWHTpsLIdLFx2dhjvwvqzBRRNUQyN158pUUiyp7Rl8AgwSVJTQLLGn0gEpyc92pq0MK5-Lr3MMYZM5FPzb_solgeXOHlYIoacWwu330Hf18Uys5SpzjF_6L33jxCrwKnONdP7oahy_nQpzC6a0GA00FjY3L4UL0cg5qnhegJwU31YlIoz1VFaoznkKxQQHhGbuFIDDkfgn148PkeASU_MnBHLV9dB8gnwnitUHHST7l5xoG3IACQlHVtq5DjvbVQPgOPuGlvSuMCaAVxe6KCnvm79ad91xUf94ySJwxmTdwRSyW54Uh8_yu6a6csAg4kIu2sQ', NULL, 'Bearer', 'remittance', '2023-05-15 15:29:04', '2023-05-15 15:29:04', '2023-05-15 16:29:04', NULL),
(4, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE1VDIwOjU2OjM0LjE4NSIsInNlc3Npb25JZCI6Ijk3ODA2OGVlLTA3NTctNGQ1OS05YzIzLTRmZTllM2QyNGM5YSJ9.hWzsSc7qCMsG7nJs3zx1lM-Hhf9IZqgxXwCdAmHuRzwDN_HqoZ6IyKQqjXj4gQmR2n6f7z_vJjql_HA2Z1jx11iUeoTh5YionHwwuesQCDNZfo19H0H23cpcrRlFe3Q7Sw87P_zq8wXnCAcIS4cWEl5nKHt2d66syoq9B6-nR_vqDHnnu9PkLqGHyDUw7DWKo_F5s1To5aCFxTaxeWUhGZvsuPnDD6bIqUzsAiRgQhYZlLiAStPmpO9JSTqiItX9dTivbASTUuhRwYfj7JjaYBRc9sa3NFQ-x_47D7QDkhup_iWQr5AE6dhAhs3J5M1uh9MrfHd9vIpViDDLE72VdQ', NULL, 'Bearer', 'remittance', '2023-05-15 16:56:34', '2023-05-15 16:56:34', '2023-05-15 17:56:34', NULL),
(5, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE1VDIxOjI5OjQ1LjQ5NSIsInNlc3Npb25JZCI6IjMxYjUwYjhkLTMzOGItNDhmOC05ODFiLWMxZGUwMGQyYTliNiJ9.kxAJX9Ijp6or7u9hbxltNqTp1xXW5KprzX1FsrZsQZixNQiTmeWJTDjSa-mVrE--xLLsYlQYU6KvBzxpE0A-aUQ6Githt9ta5R8y-AfJTZB8dZkX2gWlr-hBr8oGcDFYyTX4GExi8BXu41e8Uc82_c1Tvs6Tp_YWsrldcdBlzYC8OKyHR9taSKY14xQuDEPKCfltmpWUUHxQCvqtvV-G653_8Yl6tnvq42vukt_PDdvQ22ViInhkoVsYIBCnHhpB-HMijWm6uDHH4eDOWN460G5KBMe-mk4o-inaqaRFdIe8DeuQ_JEhe_xGZxrMkzO_bUyNj2NxqGhlPPuSqRsAvw', NULL, 'Bearer', 'remittance', '2023-05-15 17:29:45', '2023-05-15 17:29:45', '2023-05-15 18:29:45', NULL),
(6, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE2VDE0OjU1OjI0LjYxNyIsInNlc3Npb25JZCI6Ijk4N2QzNDUwLTkyOWYtNDg5Zi1hZjE5LWUwM2M1ZjM4Y2VjNiJ9.jF0n6ixqo4ObB1pIx_soMzYzvXtQ65achO6Gtra_e384sN8ym9-VRMHEt11_5Ck5ObsQSdw1bSdgdG04TMmR3x5uEbmA7kJns0yxf6vBSSXOFKpI_-uAOPcPvoFa1O8gDOwz6M1twRoaFVY3c1StugMp36Vu_YNMNak1L-aKWOzriSZrTxLrJdpyR5a2IfbheSwbAtUgborVncyRwRv5ocycEzaoQi_-DlqEbmiJn0lJ5KfQYQ-VzQFa7lAmX1-vCyEfZ7h1lRmObGCVHZ-UD21KVjiODzBRKH7eHG-9hRK0q3EJTJw0xNm0Xig-ZeYzDkg1NvNt-Eyxc9g0E-nIgA', NULL, 'Bearer', 'remittance', '2023-05-16 10:55:25', '2023-05-16 10:55:25', '2023-05-16 11:55:25', NULL),
(7, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSMjU2In0.eyJjbGllbnRJZCI6IjkzYjU3YWMzLWI4NmYtNDA3NS05M2FjLWIxZDc0Mzc1ZWVkMiIsImV4cGlyZXMiOiIyMDIzLTA1LTE2VDIwOjQ3OjUwLjk3MSIsInNlc3Npb25JZCI6IjBmZjkxZTg0LWM0NDctNGUwZC1hM2JlLWQ1ZWIyYjYwYzdlZSJ9.at5ohXOHHzGrd3xcjEiLZ06M3zrd-emaqDq608gpA7lGDmDQ1y4M344Nz9wxWF8ja1pBAdN3Vg--7pGc8zB5bcQYyE-kJfvM2mkd7UODmNptTJvIeAz8LaqgRtYgAZEqmsfjZ7EWSWwQwd4XVPTQc2m0iZRIAAE_UV31UIMiPCU2QRX9mVdTbXGl4dM-4BqZ51ibDBFB8Xv5ZPy860yWTAm6bWx_YCAYgYYNgxu48DTX1m6k62QUBzJ_Q6R4MEc5oCuZy9hc6-8p888nJpFQ4NvNhPpMN7VlXUwibYVxjXvp0fvN_MTPH596fiIf7cACijCeWfAjotFYNmZAW4pCeA', NULL, 'Bearer', 'remittance', '2023-05-16 16:47:51', '2023-05-16 16:47:51', '2023-05-16 17:47:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('keynesnoah01@gmail.com', '$2y$10$irg7.XXL97a7O/ifQJu1Nem/ll4UhApBVtiUihamhmVEURjUnnkWu', '2023-04-13 04:42:33');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_logo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `email`, `password`, `phone1`, `phone2`, `address`, `school_id_no`, `school_logo_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akilibit Schools', 'akilibit@gmai.com', '$2y$10$AIAjbOLMRnntbIgpT0kAR.OBKii5vMhysphIcJgnYuNemPCao133G', '0762535622', '0777364777', 'Bukoto-Kisaasi road, Kampala', '01', '202304241311logo_schools.jpg', 1, NULL, '2023-04-24 07:35:57', '2023-04-24 10:11:23'),
(2, 'Bethany High School', 'bethanyhighschool@gmail.com', '$2y$10$AIAjbOLMRnntbIgpT0kAR.OBKii5vMhysphIcJgnYuNemPCao133G', '0877667777', '0773436425', 'Naalya', '02', '202304241312istockphoto-1171617683-1024x1024.jpg', 1, NULL, '2023-04-24 10:12:36', '2023-04-24 10:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `school_students`
--

CREATE TABLE `school_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_id` int(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_students`
--

INSERT INTO `school_students` (`id`, `name`, `acct_id`, `school_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JONNATHAN MAJORS', '02399093', 2, 1, '2023-04-27 05:05:33', '2023-04-29 09:33:24'),
(2, 'KEYNES NOAH', '01312446', 1, 1, '2023-04-27 05:07:27', '2023-04-27 05:11:48'),
(3, 'ALISON ALIA', '02500848', 2, 1, '2023-04-28 07:30:23', '2023-04-28 07:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `school_transactions`
--

CREATE TABLE `school_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_acct_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_amount` double DEFAULT NULL,
  `deposite_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposite_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_transactions`
--

INSERT INTO `school_transactions` (`id`, `student_acct_no`, `acct_amount`, `deposite_date`, `deposite_month`, `created_at`, `updated_at`) VALUES
(1, '02399093', 120000, '12 April 2023', NULL, NULL, NULL),
(2, '01312446', 90000, '12 April 2023', NULL, NULL, NULL),
(3, '02399093', 55000, '18 April 2023', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4a8SJwlypyYRAostmUkjyYAv1xSSvCjtv8VRVJw4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/114.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2VxbXNPd1hiVzIxaFJMNWVYMzRHR1VMRWZMUUNHcGN6elhEQzdKdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90cmFuc2Zlci9wb2NrZWsvY2FzaC9mb3JtIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1684269485),
('5MVZqmjUhouDomMUQnKtNq2WoAg0Nq3zEYvmrbnT', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiSHl2dTZaQXVhT2wwSmtabGJRY0ZTaDJtbkl3TWRqRU8wN2tUTU5HbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3L3N0dWRlbnQvYWNjb3VudC9kZXRhaWxzLzAyMzk5MDkzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MzoibG9naW5fc2Nob29sXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1684271676);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NOAH', 'keynesnoah01@gmail.com', NULL, '$2y$10$AIAjbOLMRnntbIgpT0kAR.OBKii5vMhysphIcJgnYuNemPCao133G', '0779913330', NULL, NULL, NULL, NULL, NULL, '202304151406459-4596317_black-user-icon-hd-png-download.jpg', 1, '2023-01-26 06:22:34', '2023-04-17 10:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_acct_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_amount` double DEFAULT NULL,
  `withdrawal_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `student_id`, `student_acct_no`, `withdrawal_amount`, `withdrawal_date`, `withdrawal_month`, `withdrawal_year`, `created_at`, `updated_at`) VALUES
(1, 1, '02399093', 50000, '16 May 2023', 'May 2023', '2023', '2023-05-16 18:13:07', '2023-05-16 18:13:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_transfers`
--
ALTER TABLE `api_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mtn_momo_tokens`
--
ALTER TABLE `mtn_momo_tokens`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_email_unique` (`email`);

--
-- Indexes for table `school_students`
--
ALTER TABLE `school_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_transactions`
--
ALTER TABLE `school_transactions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_transfers`
--
ALTER TABLE `api_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mtn_momo_tokens`
--
ALTER TABLE `mtn_momo_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_students`
--
ALTER TABLE `school_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school_transactions`
--
ALTER TABLE `school_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

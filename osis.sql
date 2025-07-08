-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3316
-- Generation Time: Jul 07, 2025 at 05:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osis`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE `absens` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint UNSIGNED NOT NULL,
  `id_divisi` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `id_divisi`, `nama`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(2, 1, 'Muhammad Kamal', 'Wakil Ketua', 'anggota/XWOCk6isve03MSF6xAoWJrOB2l2bKtbVvGUjwK4y.png', '2025-06-29 03:54:08', '2025-06-29 04:17:00'),
(3, 1, 'Obimael Jaday', 'Ketua OSIS', 'anggota/yZ6zI7duMpPz56FDk3b89lp4oa9oeA4A0eP94B9Q.png', '2025-06-29 04:00:08', '2025-06-29 04:17:06'),
(6, 3, 'minimarket', 'ketua', 'anggota/yiPxe5niu1hpwz6EktmRATYoxRKyMA85Is1hHhzY.png', '2025-06-29 04:24:46', '2025-06-29 04:24:46'),
(7, 1, 'vrquo', 'Waketos', 'anggota/SVL3EVrpnUH7JI3hT4r0CLNBtvMCwDgzQk38R95Z.png', '2025-06-29 04:24:57', '2025-06-29 18:58:09'),
(8, 1, 'alfamart', 'koor', 'anggota/dDL0gTjSEtB6zftZLETMcsbHScYLIqB3nQloX1uR.png', '2025-06-29 04:25:08', '2025-06-29 18:58:16'),
(9, 1, 'asfgnm', 'dfb', 'anggota/IwjdGvlCqNA3sDRMfLSWT67JpL86irkQsSCDESwo.png', '2025-06-29 18:57:47', '2025-06-29 18:57:47'),
(10, 1, 'efgfbng', 'gbngf', 'anggota/hCjDcu5ikkM1HNtUzy9eAu2GudSvRrktKWsNljrJ.png', '2025-06-29 18:58:02', '2025-06-29 18:58:02'),
(11, 3, 'wngmmtym', 'koor', 'anggota/uhlqpMSGpKHuJsBL2qUQw46DF5PRotbdPbxJbUTp.png', '2025-06-29 19:08:43', '2025-06-29 19:08:43'),
(12, 3, 'dwevfg bvf gb', 'cvd bre', 'anggota/lOXmeB7Fhk8VsnfsQr3CtUF2PQVErcW0K7CwpIa3.png', '2025-06-29 19:09:07', '2025-06-29 19:09:07'),
(13, 3, 'dwcvfb', 'gewgveh', 'anggota/DCSPVi0azZmp2HepTp7yuvKMeDNlwjpJ0nk1FLD2.png', '2025-06-29 19:09:30', '2025-06-29 19:09:30'),
(14, 3, 'ewgvberjnr', 'ernerdnmer', 'anggota/ygyxEQkBRewnf9ipXVKfok1a9MqWwBl7xWXixoR2.png', '2025-06-29 19:09:57', '2025-06-29 19:09:57'),
(17, 8, 'Muhammad Bevand Januartama', 'Koordinator', 'anggota/AHb02R6FS3wEFcYijL2LrScZNi7Uu5NEvgJfz1M2.png', '2025-06-30 04:01:02', '2025-06-30 04:01:02'),
(18, 8, 'Jasmine Attifiah', 'Anggota', 'anggota/kJQmeRleEscf16Cg8BmRZmpOveU0wxPVmf7ULb5P.png', '2025-06-30 04:02:20', '2025-06-30 04:03:43'),
(19, 8, 'Nayla Janeeta Deny', 'Anggota', 'anggota/m9zlblcqJSvhNrsZfMttO4wcq0zNAYOyxfKEscyt.png', '2025-06-30 04:02:57', '2025-06-30 04:02:57'),
(20, 8, 'Wazeera Nadifa', 'Anggota', 'anggota/Deeid37cpuAHk0n0f12zXWuhsn9j5ZyZbZ97VaaO.png', '2025-06-30 04:03:12', '2025-06-30 04:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_user@gmail.com|127.0.0.1', 'i:1;', 1751427598),
('laravel_cache_user@gmail.com|127.0.0.1:timer', 'i:1751427598;', 1751427598);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Inti Osis', 'divisi/n1ACF6H9LRcpA5X91TJmxBWv7FjzcxfBnv8uew9f.jpg', '2025-06-28 20:39:54', '2025-06-30 04:14:45'),
(3, 'Inti MPK', 'divisi/kLyX44mEHFuaETUaRG7hR4cPbkxZ4UB1HX0nmHgQ.jpg', '2025-06-28 20:40:14', '2025-06-30 04:14:53'),
(8, 'Kewirausahaan', 'divisi/n6QwB8G16Xy7RhiAsfnIJeYTpG9tLRU7achnLnAR.jpg', '2025-06-30 03:58:31', '2025-06-30 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `link_drive` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `nama_event`, `tanggal_mulai`, `tanggal_selesai`, `link_drive`, `deskripsi`, `created_at`, `updated_at`) VALUES
(15, 'SKATEL FESTIVAL', '2025-04-29', '2025-05-03', 'https://drive.google.com/drive/folders/1LGjCDpaeTDu13aBPk_L9YmdOfTqW2ea7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum malesuada, nunc nec rhoncus luctus, lacus sem vehicula tortor, eget malesuada risus nulla sed metus. Duis lacinia, sapien sed faucibus dictum, enim nisl pulvinar nisi, nec fermentum ligula lacus at tellus. Integer ac efficitur nisi. Etiam finibus dui nec purus faucibus, ac tincidunt lorem convallis. Cras sit amet nisl vel justo convallis tincidunt. Sed bibendum ipsum nec ex mattis, vel ornare est imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. Aliquam convallis augue nec suscipit accumsan. Phasellus quis neque quis augue cursus placerat at id purus. Curabitur rhoncus sed nunc a condimentum.\r\n\r\nSuspendisse potenti. Donec lacinia nulla a nulla pretium fermentum. Nulla facilisi. Proin tempor dolor vel lacus ullamcorper malesuada. Integer ac felis arcu. Maecenas dapibus convallis purus, nec dictum sem volutpat in. Vivamus bibendum, tortor nec dapibus congue, urna metus dapibus metus, eget tincidunt erat magna ac magna. Curabitur varius justo vitae odio suscipit, ac eleifend purus laoreet. Donec eget turpis sed ligula dapibus dictum. Pellentesque sed elit justo. Etiam in augue congue, aliquam justo ut, tincidunt nibh. Mauris eget arcu porttitor, malesuada arcu vel, dapibus turpis. Nulla in odio neque. Morbi sodales tincidunt libero nec laoreet. Integer rutrum posuere tellus, at gravida leo iaculis a.\r\n\r\nPraesent fermentum libero et facilisis tincidunt. Curabitur dapibus, tellus nec tempor sagittis, eros risus sagittis ex, nec faucibus justo neque at elit. Donec convallis felis felis, at varius nibh ultricies ac. Donec cursus luctus blandit. Proin iaculis imperdiet libero, in dapibus ex volutpat vel. Pellentesque sed velit mi. Vestibulum fermentum mauris a sem congue varius. Duis bibendum blandit leo, ac posuere odio imperdiet ac. Sed non malesuada odio. Integer fringilla ex eu feugiat fermentum. Sed quis vestibulum augue. Aenean laoreet libero ut nibh porta bibendum. Sed laoreet ligula sed pretium dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.\r\n\r\nPhasellus fermentum ipsum sit amet metus imperdiet efficitur. Etiam luctus nisi non suscipit convallis. In hac habitasse platea dictumst. Suspendisse fringilla tortor nec sem lacinia vulputate. Curabitur finibus tempor justo sed malesuada. Pellentesque cursus felis ac ipsum sodales, id suscipit lacus hendrerit. Nam in semper diam. Vestibulum sed diam id est tristique mattis. Duis at dui tempor, porttitor elit nec, suscipit erat. Aenean non lacinia lorem. Nam ultrices fermentum urna, nec lobortis sapien tristique vitae. Sed gravida tincidunt lacus ac gravida. Nulla in varius augue. Fusce vel eros a justo dignissim pretium. Integer eleifend sit amet ante in efficitur. Pellentesque consequat, enim vel convallis fermentum.', '2025-07-04 07:54:37', '2025-07-04 07:54:37'),
(16, 'CLASSMEET 2025', '2025-06-17', '2025-06-20', 'https://drive.google.com/drive/folders/1xgJuV5iiF25X-Dnho6pGx-rtXngaYOBq', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum malesuada, nunc nec rhoncus luctus, lacus sem vehicula tortor, eget malesuada risus nulla sed metus. Duis lacinia, sapien sed faucibus dictum, enim nisl pulvinar nisi, nec fermentum ligula lacus at tellus. Integer ac efficitur nisi. Etiam finibus dui nec purus faucibus, ac tincidunt lorem convallis. Cras sit amet nisl vel justo convallis tincidunt. Sed bibendum ipsum nec ex mattis, vel ornare est imperdiet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. Aliquam convallis augue nec suscipit accumsan. Phasellus quis neque quis augue cursus placerat at id purus. Curabitur rhoncus sed nunc a condimentum.\r\n\r\nSuspendisse potenti. Donec lacinia nulla a nulla pretium fermentum. Nulla facilisi. Proin tempor dolor vel lacus ullamcorper malesuada. Integer ac felis arcu. Maecenas dapibus convallis purus, nec dictum sem volutpat in. Vivamus bibendum, tortor nec dapibus congue, urna metus dapibus metus, eget tincidunt erat magna ac magna. Curabitur varius justo vitae odio suscipit, ac eleifend purus laoreet. Donec eget turpis sed ligula dapibus dictum. Pellentesque sed elit justo. Etiam in augue congue, aliquam justo ut, tincidunt nibh. Mauris eget arcu porttitor, malesuada arcu vel, dapibus turpis. Nulla in odio neque. Morbi sodales tincidunt libero nec laoreet. Integer rutrum posuere tellus, at gravida leo iaculis a.\r\n\r\nPraesent fermentum libero et facilisis tincidunt. Curabitur dapibus, tellus nec tempor sagittis, eros risus sagittis ex, nec faucibus justo neque at elit. Donec convallis felis felis, at varius nibh ultricies ac. Donec cursus luctus blandit. Proin iaculis imperdiet libero, in dapibus ex volutpat vel. Pellentesque sed velit mi. Vestibulum fermentum mauris a sem congue varius. Duis bibendum blandit leo, ac posuere odio imperdiet ac. Sed non malesuada odio. Integer fringilla ex eu feugiat fermentum. Sed quis vestibulum augue. Aenean laoreet libero ut nibh porta bibendum. Sed laoreet ligula sed pretium dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.\r\n\r\nPhasellus fermentum ipsum sit amet metus imperdiet efficitur. Etiam luctus nisi non suscipit convallis. In hac habitasse platea dictumst. Suspendisse fringilla tortor nec sem lacinia vulputate. Curabitur finibus tempor justo sed malesuada. Pellentesque cursus felis ac ipsum sodales, id suscipit lacus hendrerit. Nam in semper diam. Vestibulum sed diam id est tristique mattis. Duis at dui tempor, porttitor elit nec, suscipit erat. Aenean non lacinia lorem. Nam ultrices fermentum urna, nec lobortis sapien tristique vitae. Sed gravida tincidunt lacus ac gravida. Nulla in varius augue. Fusce vel eros a justo dignissim pretium. Integer eleifend sit amet ante in efficitur. Pellentesque consequat, enim vel convallis fermentum.', '2025-07-04 07:55:49', '2025-07-04 07:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `event_photos`
--

CREATE TABLE `event_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_photos`
--

INSERT INTO `event_photos` (`id`, `event_id`, `foto`, `created_at`, `updated_at`) VALUES
(33, 15, 'event_photos/Ajqp7tN2Dymf6ZW4DzOMWeMMUxaWcZZR13wYt1KR.jpg', '2025-07-04 07:54:37', '2025-07-04 07:54:37'),
(34, 15, 'event_photos/cz9XmyZNISwll3LxFBxDrGiPANSwq6kpCppwh853.jpg', '2025-07-04 07:54:55', '2025-07-04 07:54:55'),
(35, 15, 'event_photos/AVp9NvKe0SlWcZjT77CS2IQ1ydW9QIDOjBE9NfzV.jpg', '2025-07-04 07:54:55', '2025-07-04 07:54:55'),
(36, 15, 'event_photos/a84Rnx9Mbm6rV7w5IKC4Gn570NWYovyBf3JQ8K1H.jpg', '2025-07-04 07:54:55', '2025-07-04 07:54:55'),
(37, 15, 'event_photos/O82ghEernz7NzlZEauftKJyMgr2mmJi4xyj1gdeG.jpg', '2025-07-04 07:54:55', '2025-07-04 07:54:55'),
(38, 16, 'event_photos/L0yz426K2KS7ILkcVQidUwkWbbknW9yohHr9uCW0.png', '2025-07-04 07:55:49', '2025-07-04 07:55:49'),
(39, 16, 'event_photos/s16Gg4uu2RFAIxUvWoGRav6MzHIgiiQhofKCVIVA.jpg', '2025-07-04 07:56:03', '2025-07-04 07:56:03'),
(40, 16, 'event_photos/U7Tm1DiC5PN6razAUIhM16oldoNlym12ZUCjCv1e.jpg', '2025-07-04 07:56:03', '2025-07-04 07:56:03'),
(41, 16, 'event_photos/eeQdSsfscQB8KeBM8J0nJBK2CVBbUh4BPl0F1eCs.jpg', '2025-07-04 07:56:03', '2025-07-04 07:56:03'),
(42, 16, 'event_photos/qoULsatsMtcizoS1VdDBXrZ1yLUZEm7UGd9ZhEVY.jpg', '2025-07-04 07:57:01', '2025-07-04 07:57:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_29_034030_create_tokos_table', 1),
(5, '2025_06_29_034119_create_divisi_table', 1),
(6, '2025_06_29_034448_create_anggota_table', 1),
(7, '2025_06_30_113823_add_foto_to_divisi_table', 2),
(8, '2025_07_02_034158_create_absens_table', 3),
(9, '2025_07_02_040324_add_level_to_users_table', 3),
(10, '2025_07_03_113511_create_events_table', 4),
(11, '2025_07_03_113516_create_event_photos_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('08ivvTc4HMlmvwjxulNZouFwGHL6VyzcSSY958er', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkh2eHdaQnllUGVwNXZqQUNjZXRhcE5zVkJDYXZwNTdnNjliWnFlOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xOTVlLTE0MC0yMTMtMTAtMTc1Lm5ncm9rLWZyZWUuYXBwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751683455),
('6mXG3ZVOT5yC4kKxvFhFw1oYyB9sud0bXPS3pQeb', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnhCRHhLZGVDVmxhbXdwbmp4bUhzTVZMYzNobDFkcEtoaDJrMlJCYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xOTVlLTE0MC0yMTMtMTAtMTc1Lm5ncm9rLWZyZWUuYXBwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751683033),
('bb3L78bagEVu49dBswpYRmmL3YBlgc4njxK2F75j', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnVYMzVWUjBSTHV1VVhmaWJobnk2RktGc3FmejR3c1RXQ3doVUZCaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1751684077),
('dFZVRyfrnW3KtfaVlnfWiUfZO4yiF9WPXLG89nSv', NULL, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXNhT1c1YkJmcEZWbnBVQU1kQmhwcEVnWEF0NUprdlNNVlZYWTRyUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xOTVlLTE0MC0yMTMtMTAtMTc1Lm5ncm9rLWZyZWUuYXBwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751682991),
('hDKxfi4h3DyeR85tYKyGZUUCEJf7JkulCxClTSCe', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36 Edg/138.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielBGRzBsY05YbDBySm4yWWlmMWozcmpBWkFYa3lJRUtXVlRIR2ExQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ldmVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751810046),
('pnk0r3EBcaX282FHN2QTYwXqFeMcjXZQ1vGKSNDu', NULL, '127.0.0.1', 'WhatsApp/2.2526.2 W', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2pGbXdRb2xUdWVUWFVHSEUzSXRVb2x1R0g3TG1IMWJGVTJtcWNZbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xOTVlLTE0MC0yMTMtMTAtMTc1Lm5ncm9rLWZyZWUuYXBwL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1751682934);

-- --------------------------------------------------------

--
-- Table structure for table `tokos`
--

CREATE TABLE `tokos` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'kamal', 'kamal@gmail.com', NULL, '$2y$12$Tck01lLMYfNRKzVh3G6WD.6z1CmThK5lPGAFapkT2TY3KMJbnGvIG', 'user', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_id_divisi_foreign` (`id_divisi`);

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
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_photos_event_id_foreign` (`event_id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tokos`
--
ALTER TABLE `tokos`
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
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event_photos`
--
ALTER TABLE `event_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tokos`
--
ALTER TABLE `tokos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD CONSTRAINT `event_photos_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

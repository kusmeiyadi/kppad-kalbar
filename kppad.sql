-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2022 at 05:42 AM
-- Server version: 5.7.33
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kppad_kalbar`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'pengaduan', 'created', 85, 'App\\Models\\User\\Status', 6, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"PENDING\", \"pengaduan.kode\": \"#5M1L1L\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-28 16:23:11', '2022-03-28 16:23:11'),
(2, 'pengaduan', 'created', 1, 'App\\Models\\User\\Status', 6, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"PENDING\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 13:42:28', '2022-03-29 13:42:28'),
(3, 'pengaduan', 'created', 2, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 13:58:33', '2022-03-29 13:58:33'),
(4, 'pengaduan', 'created', 3, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 14:19:28', '2022-03-29 14:19:28'),
(5, 'pengaduan', 'created', 4, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 15:12:50', '2022-03-29 15:12:50'),
(6, 'pengaduan', 'created', 5, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 15:17:07', '2022-03-29 15:17:07'),
(7, 'pengaduan', 'created', 6, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENDING\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 15:20:41', '2022-03-29 15:20:41'),
(8, 'pengaduan', 'created', 7, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 15:21:07', '2022-03-29 15:21:07'),
(9, 'pengaduan', 'created', 8, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-29 15:24:04', '2022-03-29 15:24:04'),
(10, 'pengaduan', 'created', 9, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"VERIFIKASI\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-30 11:33:30', '2022-03-30 11:33:30'),
(11, 'pengaduan', 'created', 10, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-30 11:35:16', '2022-03-30 11:35:16'),
(12, 'pengaduan', 'created', 11, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2NxtMG\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-03-30 11:56:36', '2022-03-30 11:56:36'),
(13, 'pengaduan', 'created', 12, 'App\\Models\\User\\Status', 6, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"PENDING\", \"pengaduan.kode\": \"#jx0taR\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Dani Kusmeiyadi\"}}', '2022-04-04 21:12:09', '2022-04-04 21:12:09'),
(14, 'pengaduan', 'created', 13, 'App\\Models\\User\\Status', 27, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"PENDING\", \"pengaduan.kode\": \"#c5MVGP\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsuma bla bla bla\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-08 07:37:13', '2022-04-08 07:37:13'),
(15, 'pengaduan', 'created', 14, 'App\\Models\\User\\Status', 28, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"VERIFIKASI\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-08 09:30:49', '2022-04-08 09:30:49'),
(16, 'pengaduan', 'created', 15, 'App\\Models\\User\\Status', 30, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"VERIFIKASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-08 17:11:47', '2022-04-08 17:11:47'),
(17, 'pengaduan', 'created', 16, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-08 17:20:28', '2022-04-08 17:20:28'),
(18, 'pengaduan', 'created', 17, 'App\\Models\\User\\Status', 1, 'App\\Models\\User\\User', '{\"attributes\": {\"status\": \"VERIFIKASI\", \"pengaduan.kode\": \"#mB5Tq8\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-10 15:42:56', '2022-04-10 15:42:56'),
(19, 'pengaduan', 'created', 18, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#mB5Tq8\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-10 15:51:49', '2022-04-10 15:51:49'),
(20, 'pengaduan', 'created', 19, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#mB5Tq8\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-10 16:02:14', '2022-04-10 16:02:14'),
(21, 'pengaduan', 'created', 20, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#mB5Tq8\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-15 14:12:02', '2022-04-15 14:12:02'),
(22, 'pengaduan', 'created', 21, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"SELESAI\", \"pengaduan.kode\": \"#mB5Tq8\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-15 16:06:58', '2022-04-15 16:06:58'),
(23, 'pengaduan', 'created', 22, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#c5MVGP\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsuma bla bla bla\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-15 16:08:21', '2022-04-15 16:08:21'),
(24, 'pengaduan', 'created', 23, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#c5MVGP\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsuma bla bla bla\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-15 16:08:22', '2022-04-15 16:08:22'),
(25, 'pengaduan', 'created', 24, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#c5MVGP\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsuma bla bla bla\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-15 16:08:43', '2022-04-15 16:08:43'),
(26, 'pengaduan', 'created', 23, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 05:54:40', '2022-04-19 05:54:40'),
(27, 'pengaduan', 'created', 24, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:26:04', '2022-04-19 06:26:04'),
(28, 'pengaduan', 'created', 25, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"MEDIASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:34:48', '2022-04-19 06:34:48'),
(29, 'pengaduan', 'created', 26, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENYIDIKAN\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:36:26', '2022-04-19 06:36:26'),
(30, 'pengaduan', 'created', 27, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:37:30', '2022-04-19 06:37:30'),
(31, 'pengaduan', 'created', 28, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:38:50', '2022-04-19 06:38:50'),
(32, 'pengaduan', 'created', 29, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:39:14', '2022-04-19 06:39:14'),
(33, 'pengaduan', 'created', 30, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:40:41', '2022-04-19 06:40:41'),
(34, 'pengaduan', 'created', 31, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"MEDIASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:45:02', '2022-04-19 06:45:02'),
(35, 'pengaduan', 'created', 32, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"MEDIASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:45:34', '2022-04-19 06:45:34'),
(36, 'pengaduan', 'created', 33, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"MEDIASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:53:20', '2022-04-19 06:53:20'),
(37, 'pengaduan', 'created', 34, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"MEDIASI\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:54:22', '2022-04-19 06:54:22'),
(38, 'pengaduan', 'created', 35, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 06:58:49', '2022-04-19 06:58:49'),
(39, 'pengaduan', 'created', 36, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:01:26', '2022-04-19 07:01:26'),
(40, 'pengaduan', 'created', 37, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:10:56', '2022-04-19 07:10:56'),
(41, 'pengaduan', 'created', 38, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:17:05', '2022-04-19 07:17:05'),
(42, 'pengaduan', 'created', 39, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:23:08', '2022-04-19 07:23:08'),
(43, 'pengaduan', 'created', 40, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:29:48', '2022-04-19 07:29:48'),
(44, 'pengaduan', 'created', 41, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:37:25', '2022-04-19 07:37:25'),
(45, 'pengaduan', 'created', 42, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:41:19', '2022-04-19 07:41:19'),
(46, 'pengaduan', 'created', 43, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:44:02', '2022-04-19 07:44:02'),
(47, 'pengaduan', 'created', 44, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#gGkREo\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum bla bla bal\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:48:05', '2022-04-19 07:48:05'),
(48, 'pengaduan', 'created', 45, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:49:17', '2022-04-19 07:49:17'),
(49, 'pengaduan', 'created', 46, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PERSIDANGAN\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:55:05', '2022-04-19 07:55:05'),
(50, 'pengaduan', 'created', 47, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"PENGADILAN\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:56:28', '2022-04-19 07:56:28'),
(51, 'pengaduan', 'created', 48, 'App\\Models\\User\\Status', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"status\": \"SELESAI\", \"pengaduan.kode\": \"#2QPHzL\", \"pengaduan.slug\": \"kalimantan-barat\", \"pengaduan.provinsi\": \"Kalimantan Barat\", \"pengaduan.kronologi\": \"lorem ipsum capadocia\", \"pengaduan.pelapor.nama_p\": \"Khimshin\"}}', '2022-04-19 07:57:16', '2022-04-19 07:57:16'),
(52, 'admin', 'You have created User', 6, 'App\\Models\\Admin\\Admin', 1, 'App\\Models\\Admin\\Admin', '{\"attributes\": {\"name\": \"Admin\", \"email\": \"admin@kppad\", \"password\": \"$2y$10$HC7ue63igdHTrRXQn9mFr.TaYLzzWqgEXExPsMLTizZJh2LKdh7ky\"}}', '2022-05-15 16:11:41', '2022-05-15 16:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `status`, `image`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Kakomisioner', 'kakomisioner@kppad', '$2y$10$wjXPZVRoC/MFIox.4TumWuvuzrBEBae1q5BNuocGw4fgh1pAh7JXO', '082358177119', 1, 'anonymous-wallpaper.jpg', 'AdminLTE-3.0.2/dist/img/profile/anonymous-wallpaper.jpg', NULL, '2022-03-22 12:19:24'),
(2, 'Wakil Ketua Komisioner', 'wakakomisioner@kppad', '$2y$10$xtW7Y4m2BJC8nK6E/v3K2.yDPwdruTxiKmDa0v.Ad4.vLO.JVQSpe', '081257466118', 1, NULL, NULL, '2020-12-16 08:44:38', '2020-12-16 08:44:38'),
(3, 'Komisioner 2', 'komisioner2@kppad', '$2y$10$1PFD8S8TeBdSq4UnXuD4qeoC.oe0.y28cA2HjiyO4WyL6eV92WbAe', '081257466111', 1, NULL, NULL, '2021-03-16 06:34:39', '2021-03-16 06:34:39'),
(4, 'Komisioner 3', 'komisioner3@kppad', '$2y$10$7V9VpAlWsovqhV7vKkiSWepAHL/i9B6bSCCdNINLpw/3pveH4tDdm', '08235811909', 1, NULL, NULL, '2021-03-23 06:54:17', '2021-03-23 06:54:17'),
(5, 'Komisioner 1', 'komisioner1@kppad', '$2y$10$YuTJg3PkyxcGi2KKRs1p4.kXzfoJNn6RJ/YdKpEQW1EjW/hD/VPQO', '082358177119', 1, NULL, NULL, '2021-06-09 13:20:22', '2021-06-09 13:20:22'),
(6, 'Admin', 'admin@kppad', '$2y$10$HC7ue63igdHTrRXQn9mFr.TaYLzzWqgEXExPsMLTizZJh2LKdh7ky', '085689451235', 1, NULL, NULL, '2022-05-15 16:11:41', '2022-05-15 16:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `buktis`
--

CREATE TABLE `buktis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `filenames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buktis`
--

INSERT INTO `buktis` (`id`, `pengaduan_id`, `filenames`, `created_at`, `updated_at`) VALUES
(1, 1, 'January 22, 2019.jpg', '2022-03-16 14:03:38', '2022-03-16 14:03:38'),
(2, 6, 'contoh-poster-lingkungan-tentang-sampah.jpg', '2022-03-16 16:04:13', '2022-03-16 16:04:13'),
(3, 3, 'contoh-poster-lingkungan-tentang-sampah.jpg', '2022-04-10 15:59:04', '2022-04-10 15:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `fast_kegiatans`
--

CREATE TABLE `fast_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fast_kegiatans`
--

INSERT INTO `fast_kegiatans` (`id`, `title`, `color`, `start`, `end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kawal', '#c31d1d', '00:00:00', '12:00:00', '2022-04-24 12:49:23', '2022-04-24 12:49:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kamis`
--

CREATE TABLE `hubungi_kamis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pesan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubungi_kamis`
--

INSERT INTO `hubungi_kamis` (`id`, `nama`, `email`, `subjek`, `isi_pesan`, `created_at`, `updated_at`) VALUES
(1, 'Aliqa Ramadhan', 'aliqaramadhan@gmail.com', 'kosong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-05-11 07:47:34', '2021-05-11 07:47:34'),
(2, 'Aliqa Ramadhan', 'aliqaramadhan@gmail.com', 'kosong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-05-11 07:48:05', '2021-05-11 07:48:05'),
(3, 'Aliqa Ramadhan', 'aliqaramadhan@gmail.com', 'kosong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-05-11 07:48:43', '2021-05-11 07:48:43'),
(4, 'Aliqa Ramadhan', 'aliqaramadhan@gmail.com', 'kosong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-05-11 07:49:48', '2021-05-11 07:49:48'),
(5, 'Aliqa Ramadhan', 'aliqaramadhan@gmail.com', 'kosong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-05-11 07:50:12', '2021-05-11 07:50:12'),
(6, 'koko', 'kakomisioner@kppad', 'kokoooko', 'kokoooooko', '2022-03-22 13:33:55', '2022-03-22 13:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kasuses`
--

CREATE TABLE `jenis_kasuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kasus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kasuses`
--

INSERT INTO `jenis_kasuses` (`id`, `nama_kasus`, `created_at`, `updated_at`) VALUES
(1, 'Kejahatan Seksual', '2021-01-07 15:44:42', '2021-01-07 15:44:42'),
(2, 'Kekerasan Fisik', '2021-03-26 01:57:13', '2021-03-26 01:57:13'),
(3, 'Kekerasan Psikis', '2021-03-26 01:57:39', '2021-03-26 01:57:39'),
(4, 'Anak Berhadapan dengan Hukum (ABH)', '2021-03-26 02:28:05', '2021-03-26 02:28:05'),
(5, 'Trafficking', '2021-03-26 02:28:25', '2021-03-26 02:28:25'),
(6, 'Hak Kuasa Asuh dan Penelantaran', '2021-03-26 02:28:39', '2021-03-26 02:28:39'),
(7, 'Perlindungan (Pendidikan, Kesehatan, Agama, Sosial)', '2021-03-26 02:29:20', '2021-03-26 02:29:20'),
(8, 'Penculikan dan Anak Hilang', '2021-03-26 02:29:46', '2021-03-26 02:29:46'),
(9, 'Napza dan HIV/Aids', '2021-03-26 02:30:02', '2021-03-26 02:30:02'),
(10, 'Pekerja Anak', '2021-03-26 02:30:12', '2021-03-26 02:30:12'),
(11, 'Pornografi', '2021-03-26 02:30:22', '2021-03-26 02:30:22'),
(12, 'Hak Sipil', '2021-03-26 02:30:29', '2021-03-26 02:30:29'),
(13, 'ABK, Politik dan Perlindungan Khusus', '2021-03-26 02:30:51', '2021-03-26 02:30:51'),
(14, 'Konsultasi dll', '2021-03-26 02:31:01', '2021-03-26 02:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `title`, `color`, `start`, `end`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Donlado', '#bdd737', '2021-03-02 00:00:00', '2021-03-06 00:00:00', 'asdf', '2022-03-25 03:30:04', '2021-03-29 04:04:07', NULL),
(2, 'asdasd', '#000000', '2021-03-13 11:03:20', '2021-03-13 14:03:20', NULL, '2021-03-29 03:31:53', '2021-03-29 04:12:36', '2021-03-29 04:12:36'),
(3, 'asdfasdf', '#000000', '2021-03-17 11:03:20', '2021-03-17 15:03:20', NULL, '2021-03-29 03:33:07', '2021-03-29 04:12:04', '2021-03-29 04:12:04'),
(4, 'asdfasdf', '#000000', '2021-03-09 11:03:20', '2021-03-09 15:03:20', NULL, '2021-03-29 04:11:34', '2021-03-29 04:12:01', '2021-03-29 04:12:01'),
(5, 'asdasd', '#000000', '2021-03-10 11:03:20', '2021-03-10 14:03:20', NULL, '2021-03-29 04:11:39', '2021-03-29 04:12:32', '2021-03-29 04:12:32'),
(6, 'Baru', '#3788d8', '2022-03-23 00:00:00', '2022-03-27 00:00:00', 'Menemaknak jadlwa', '2022-03-27 16:26:13', '2022-03-18 16:42:49', NULL),
(7, 'Baru', '#000000', '2022-03-10 12:11:21', '2022-03-10 21:21:21', NULL, '2022-03-18 16:51:26', '2022-03-18 16:51:26', NULL),
(8, 'Baru', '#000000', '2022-03-02 12:11:21', '2022-03-02 21:21:21', NULL, '2022-03-18 16:51:49', '2022-03-18 16:51:49', NULL),
(9, 'Coba test yak', '#e20303', '2022-03-11 12:11:21', '2022-03-11 21:21:21', NULL, '2022-03-18 16:54:54', '2022-03-18 16:54:54', NULL),
(10, 'Jalan', '#9f1d5c', '2022-03-23 00:00:00', '2022-03-24 00:00:00', NULL, '2022-03-18 17:00:38', '2022-03-18 17:00:38', NULL),
(11, 'Baru', '#000000', '2022-03-01 12:11:21', '2022-03-01 21:21:21', NULL, '2022-03-18 17:21:37', '2022-03-18 17:21:37', NULL),
(12, 'kntl', '#d26a6a', '2022-02-28 12:11:23', '2022-02-28 12:31:23', NULL, '2022-03-19 11:50:36', '2022-03-19 11:50:36', NULL),
(13, 'Rian', '#963636', '2022-03-03 12:11:21', '2022-03-03 21:21:21', NULL, '2022-03-19 12:16:46', '2022-03-19 12:16:46', NULL),
(14, 'Rian', '#963636', '2022-03-04 12:11:21', '2022-03-04 21:21:21', NULL, '2022-03-19 12:48:43', '2022-03-19 12:48:43', NULL),
(15, 'Gigle', '#b48383', '2022-03-05 12:11:21', '2022-03-05 21:21:21', NULL, '2022-03-31 12:48:49', '2022-03-19 12:48:49', NULL),
(16, 'Mengawal korban', '#3788d8', '2022-04-14 00:00:00', '2022-04-16 00:00:00', 'Mengawal korban untuk mencek keadaan psikis', '2022-04-14 04:05:19', '2022-04-14 04:05:54', NULL),
(17, 'Tes', '#e41607', '2022-04-14 00:00:00', '2022-04-15 00:00:00', 'kosong', '2022-04-24 12:47:50', '2022-04-24 12:47:50', NULL),
(18, 'coba', '#3788d8', '2022-04-16 00:00:00', '2022-04-17 00:00:00', 'koko', '2022-04-24 12:48:52', '2022-04-24 12:48:52', NULL),
(19, 'Kawal', '#c31d1d', '2022-04-20 00:00:00', '2022-04-20 12:00:00', NULL, '2022-04-24 12:49:27', '2022-04-24 12:49:27', NULL),
(20, 'Kawal', '#c31d1d', '2022-04-21 00:00:00', '2022-04-21 12:00:00', NULL, '2022-04-24 12:49:32', '2022-04-24 12:49:32', NULL),
(21, 'Kawal', '#c31d1d', '2022-04-22 00:00:00', '2022-04-22 12:00:00', NULL, '2022-04-24 12:49:38', '2022-04-24 12:49:38', NULL),
(22, 'Melakukan sidak ke sekolah', '#3270ae', '2022-05-10 08:00:00', '2022-05-11 12:00:00', 'Sidak ke sekolah al mumtaz', '2022-05-16 07:44:16', '2022-05-16 07:44:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `korbans`
--

CREATE TABLE `korbans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelapor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_k` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_k` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_k` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu','Bahai','Kepercayaan Lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_k` text COLLATE utf8mb4_unicode_ci,
  `usia_k` int(11) DEFAULT NULL,
  `kewarganegaraan_k` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korbans`
--

INSERT INTO `korbans` (`id`, `pelapor_id`, `nama_k`, `jk_k`, `agama_k`, `status`, `alamat_k`, `usia_k`, `kewarganegaraan_k`, `created_at`, `updated_at`) VALUES
(1, 1, 'Listy', 'Wanita', 'Islam', 'SD Sederajat', NULL, 7, 'WNI', '2022-03-29 13:42:27', '2022-03-29 13:42:27'),
(2, 2, 'Alika', 'Wanita', 'Kristen Protestan', 'TK/PAUD/Sederajat', NULL, 5, 'WNI', '2022-04-04 21:12:08', '2022-04-04 21:12:08'),
(3, 3, 'Alika', 'Wanita', 'Islam', 'TK/PAUD/Sederajat', NULL, 8, 'WNI', '2022-04-08 07:37:13', '2022-04-08 07:37:13'),
(4, 4, 'juju', 'Wanita', 'Islam', 'TK/PAUD/Sederajat', NULL, 5, 'WNI', '2022-04-08 09:30:48', '2022-04-08 09:30:48'),
(5, 5, 'Alika', 'Wanita', 'Islam', 'TK/PAUD/Sederajat', NULL, 5, 'WNI', '2022-04-08 17:11:47', '2022-04-08 17:11:47'),
(6, 6, 'Alkatiri', 'Pria', 'Islam', 'SD Sederajat', NULL, 10, 'WNI', '2022-04-10 15:42:55', '2022-04-10 15:42:55');

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
(3, '2020_02_08_025128_create_notifications_table', 1),
(4, '2020_02_15_062059_create_posts_table', 1),
(5, '2020_02_15_062648_create_tags_table', 1),
(6, '2020_02_15_062827_create_categories_table', 1),
(7, '2020_02_15_063413_create_post_tags_table', 1),
(8, '2020_02_15_063421_create_category_posts_table', 1),
(9, '2020_02_15_063902_create_admins_table', 1),
(10, '2020_03_26_134849_create_permission_tables', 1),
(11, '2020_03_28_150355_create_pelapors_table', 1),
(12, '2020_03_29_022911_create_jenis_kasuses_table', 1),
(13, '2020_03_29_150428_create_korbans_table', 1),
(14, '2020_03_29_150445_create_terlapors_table', 1),
(15, '2020_03_31_023754_create_pengaduans_table', 1),
(16, '2020_04_03_132656_create_activity_log_table', 1),
(17, '2020_04_05_041450_create_kegiatans_table', 1),
(18, '2020_04_05_045230_create_buktis_table', 1),
(19, '2020_04_18_183821_create_statuses_table', 1),
(20, '2020_04_27_160838_create_fast_kegiatans_table', 1),
(21, '2020_12_15_150917_create_regulasi_table', 1),
(22, '2021_05_11_135045_create_hubungi_kami_table', 2),
(23, '2021_05_12_132656_create_activity_log_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin\\Admin', 1),
(2, 'App\\Models\\Admin\\Admin', 2),
(3, 'App\\Models\\Admin\\Admin', 3),
(3, 'App\\Models\\Admin\\Admin', 4),
(3, 'App\\Models\\Admin\\Admin', 5),
(4, 'App\\Models\\Admin\\Admin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02db4219-b3ae-4fed-8578-411427dfdfb7', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 6, '{\"pengaduan\":{\"id\":2,\"kode\":\"#jx0taR\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":13,\"pelapor_id\":2,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-05 04:12:08\",\"updated_at\":\"2022-04-08 04:12:08\"}}', '2022-05-15 16:47:20', '2022-04-04 21:12:11', '2022-05-15 16:47:20'),
('085dcc9a-5b59-47c0-a62c-3f35f4941125', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 6, '{\"pengaduan\":{\"id\":3,\"kode\":\"#c5MVGP\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":2,\"pelapor_id\":3,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsuma bla bla bla\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 14:37:13\",\"updated_at\":\"2022-04-11 14:37:13\"}}', '2022-05-15 16:47:20', '2022-04-08 07:37:14', '2022-05-15 16:47:20'),
('0a3b4a32-7e5d-40ff-b182-079b7926ad28', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 3, '{\"pengaduan\":{\"id\":6,\"kode\":\"#mB5Tq8\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. KETAPANG\",\"jenis_kasus_id\":3,\"pelapor_id\":6,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-10 22:42:55\",\"updated_at\":\"2022-04-13 22:42:55\"}}', NULL, '2022-04-10 15:42:57', '2022-04-10 15:42:57'),
('20ceeb07-b547-4ce9-b0e2-f4ea66dd219c', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":6,\"kode\":\"#mB5Tq8\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. KETAPANG\",\"jenis_kasus_id\":3,\"pelapor_id\":6,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-10 22:42:55\",\"updated_at\":\"2022-04-13 22:42:55\"}}', NULL, '2022-04-10 15:42:56', '2022-04-10 15:42:56'),
('42656bee-c85f-424d-ae42-13c9ef156f8c', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":5,\"kode\":\"#gGkREo\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":5,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum bla bla bal\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-09 00:11:47\",\"updated_at\":\"2022-04-12 00:11:47\"}}', NULL, '2022-04-08 17:11:49', '2022-04-08 17:11:49'),
('433cb0d5-a658-46bc-9d71-1583efd50d74', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":3,\"kode\":\"#c5MVGP\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":2,\"pelapor_id\":3,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsuma bla bla bla\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 14:37:13\",\"updated_at\":\"2022-04-11 14:37:13\"}}', NULL, '2022-04-08 07:37:14', '2022-04-08 07:37:14'),
('47a40f3c-a040-4a05-beab-9f6d1dabf193', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":1,\"kode\":\"#2NxtMG\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":7,\"pelapor_id\":1,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"audio\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-03-29 20:42:27\",\"updated_at\":\"2022-04-01 20:42:27\"}}', '2022-04-08 08:29:01', '2022-03-29 13:42:29', '2022-04-08 08:29:01'),
('48db09fb-7f06-423a-83cb-81b8495a8b87', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":1,\"kode\":\"#2NxtMG\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":7,\"pelapor_id\":1,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"audio\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-03-29 20:42:27\",\"updated_at\":\"2022-04-01 20:42:27\"}}', NULL, '2022-03-29 13:42:31', '2022-03-29 13:42:31'),
('4e1bb031-798c-4540-acd9-9184fd605207', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 6, '{\"pengaduan\":{\"id\":5,\"kode\":\"#gGkREo\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":5,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum bla bla bal\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-09 00:11:47\",\"updated_at\":\"2022-04-12 00:11:47\"}}', '2022-05-15 16:47:20', '2022-04-08 17:11:49', '2022-05-15 16:47:20'),
('54dd3020-7ff0-4789-a383-2c7ece6d2fcd', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":3,\"kode\":\"#c5MVGP\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":2,\"pelapor_id\":3,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsuma bla bla bla\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 14:37:13\",\"updated_at\":\"2022-04-11 14:37:13\"}}', NULL, '2022-04-08 07:37:14', '2022-04-08 07:37:14'),
('64a9772a-88f5-4899-b025-16b5d4314a3c', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":3,\"kode\":\"#c5MVGP\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":2,\"pelapor_id\":3,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsuma bla bla bla\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 14:37:13\",\"updated_at\":\"2022-04-11 14:37:13\"}}', '2022-04-08 08:29:01', '2022-04-08 07:37:13', '2022-04-08 08:29:01'),
('6c979a61-c1dd-497c-aa86-0a8456d56472', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":6,\"kode\":\"#mB5Tq8\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. KETAPANG\",\"jenis_kasus_id\":3,\"pelapor_id\":6,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-10 22:42:55\",\"updated_at\":\"2022-04-13 22:42:55\"}}', NULL, '2022-04-10 15:42:57', '2022-04-10 15:42:57'),
('6f587f56-4ab8-4b6b-9830-d9db2e4b41ac', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":6,\"kode\":\"#mB5Tq8\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. KETAPANG\",\"jenis_kasus_id\":3,\"pelapor_id\":6,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-10 22:42:55\",\"updated_at\":\"2022-04-13 22:42:55\"}}', NULL, '2022-04-10 15:42:57', '2022-04-10 15:42:57'),
('7464c938-783c-423f-a37b-36992e05b17e', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":2,\"kode\":\"#jx0taR\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":13,\"pelapor_id\":2,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-05 04:12:08\",\"updated_at\":\"2022-04-08 04:12:08\"}}', '2022-04-08 08:29:01', '2022-04-04 21:12:10', '2022-04-08 08:29:01'),
('78f8d19b-fa3b-439a-a834-b4f99033487a', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":4,\"kode\":\"#2QPHzL\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":4,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum capadocia\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 16:30:48\",\"updated_at\":\"2022-04-11 16:30:48\"}}', '2022-04-08 17:30:30', '2022-04-08 09:30:49', '2022-04-08 17:30:30'),
('84627a3d-c445-4134-aafb-51f327fd6596', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 6, '{\"pengaduan\":{\"id\":1,\"kode\":\"#2NxtMG\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":7,\"pelapor_id\":1,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"audio\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-03-29 20:42:27\",\"updated_at\":\"2022-04-01 20:42:27\"}}', '2022-05-15 16:47:20', '2022-03-29 13:42:31', '2022-05-15 16:47:20'),
('a4e9a51e-d157-4a6a-b7b1-91b66454c7d0', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":4,\"kode\":\"#2QPHzL\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":4,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum capadocia\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 16:30:48\",\"updated_at\":\"2022-04-11 16:30:48\"}}', NULL, '2022-04-08 09:30:50', '2022-04-08 09:30:50'),
('a7b25bfb-8b44-4f5b-a6fe-8804212c9761', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":5,\"kode\":\"#gGkREo\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":5,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum bla bla bal\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-09 00:11:47\",\"updated_at\":\"2022-04-12 00:11:47\"}}', NULL, '2022-04-08 17:11:49', '2022-04-08 17:11:49'),
('bf29d3ea-c65f-4228-bc77-4ebb0e201c07', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 1, '{\"pengaduan\":{\"id\":5,\"kode\":\"#gGkREo\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":5,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum bla bla bal\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-09 00:11:47\",\"updated_at\":\"2022-04-12 00:11:47\"}}', '2022-04-08 17:30:30', '2022-04-08 17:11:48', '2022-04-08 17:30:30'),
('bf93dba2-02c1-4f3c-8240-06fabf17adbd', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":4,\"kode\":\"#2QPHzL\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":4,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum capadocia\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 16:30:48\",\"updated_at\":\"2022-04-11 16:30:48\"}}', NULL, '2022-04-08 09:30:50', '2022-04-08 09:30:50'),
('ce233626-42e5-4acc-a9e0-6ec547449766', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 5, '{\"pengaduan\":{\"id\":2,\"kode\":\"#jx0taR\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":13,\"pelapor_id\":2,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-05 04:12:08\",\"updated_at\":\"2022-04-08 04:12:08\"}}', NULL, '2022-04-04 21:12:11', '2022-04-04 21:12:11'),
('cf18e35d-4b38-470b-9bde-c47b64dcbba2', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":1,\"kode\":\"#2NxtMG\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. MELAWI\",\"jenis_kasus_id\":7,\"pelapor_id\":1,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"audio\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-03-29 20:42:27\",\"updated_at\":\"2022-04-01 20:42:27\"}}', NULL, '2022-03-29 13:42:30', '2022-03-29 13:42:30'),
('cf3ffc83-39bd-4b81-8645-a4b5d838b491', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 6, '{\"pengaduan\":{\"id\":4,\"kode\":\"#2QPHzL\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":12,\"pelapor_id\":4,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"lorem ipsum capadocia\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-08 16:30:48\",\"updated_at\":\"2022-04-11 16:30:48\"}}', '2022-05-15 16:47:20', '2022-04-08 09:30:50', '2022-05-15 16:47:20'),
('d1d640b7-d861-4910-b34b-9ea52dcb9525', 'App\\Notifications\\NewPengaduanNotification', 'App\\Models\\Admin\\Admin', 4, '{\"pengaduan\":{\"id\":2,\"kode\":\"#jx0taR\",\"provinsi\":\"Kalimantan Barat\",\"kabupaten\":\"KAB. BENGKAYANG\",\"jenis_kasus_id\":13,\"pelapor_id\":2,\"user_id\":99,\"slug\":\"kalimantan-barat\",\"pasal\":null,\"kronologi\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\",\"is_approved\":0,\"file\":null,\"tipe\":\"Pengaduan\",\"komisioner_id\":null,\"created_at\":\"2022-04-05 04:12:08\",\"updated_at\":\"2022-04-08 04:12:08\"}}', NULL, '2022-04-04 21:12:11', '2022-04-04 21:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelapors`
--

CREATE TABLE `pelapors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_p` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identitas_p` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk_p` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama_p` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu','Bahai','Kepercayaan Lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kewarganegaraan_p` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak_p` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_p` text COLLATE utf8mb4_unicode_ci,
  `relasi_p` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelapors`
--

INSERT INTO `pelapors` (`id`, `nama_p`, `identitas_p`, `jk_p`, `agama_p`, `tempat_lahir`, `tanggal_lahir`, `kewarganegaraan_p`, `kontak_p`, `alamat_p`, `relasi_p`, `created_at`, `updated_at`) VALUES
(1, 'Dani Kusmeiyadi', '0', 'Pria', 'Islam', 'Nanga Pinoh', '1997-05-07', 'WNI', 'kusmeiyadi@gmail.com', 'Jl. Kemakmuran 8', NULL, '2022-03-29 13:42:27', '2022-03-29 13:42:27'),
(2, 'Dani Kusmeiyadi', '0', 'Pria', 'Islam', 'Pontianak', '2022-04-06', 'WNI', 'kusmeiyadi@gmail.com', 'Kemakmuran 8', NULL, '2022-04-04 21:12:08', '2022-04-04 21:12:08'),
(3, 'Khimshin', '2147483647', 'Pria', 'Islam', 'Nanga Pinoh', '2022-04-08', 'WNI', 'khimshin12@gmail.com', 'Kemakmuran', NULL, '2022-04-08 07:37:13', '2022-04-08 07:37:13'),
(4, 'Khimshin', '789564231', 'Pria', 'Islam', 'kuburaya', '2022-04-08', 'WNI', 'khimshin12@gmail.com', 'kemakmuran', NULL, '2022-04-08 09:30:48', '2022-04-08 09:30:48'),
(5, 'Khimshin', '786542315', 'Pria', 'Islam', 'Semabrang', '2022-04-15', 'WNI', 'khimshin12@gmail.com', 'Kemakmuran', NULL, '2022-04-08 17:11:46', '2022-04-08 17:11:46'),
(6, 'Khimshin', '2147483647', 'Pria', 'Islam', 'Ketapang', '2022-04-10', 'WNI', 'khimshin12@gmail.com', 'Kemakmuran', NULL, '2022-04-10 15:42:55', '2022-04-10 15:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduans`
--

CREATE TABLE `pengaduans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kabupaten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kasus_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pelapor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pasal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kronologi` text COLLATE utf8mb4_unicode_ci,
  `is_approved` tinyint(1) DEFAULT '0',
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` enum('Pengaduan','Non-pengaduan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `komisioner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaduans`
--

INSERT INTO `pengaduans` (`id`, `kode`, `provinsi`, `kabupaten`, `jenis_kasus_id`, `pelapor_id`, `user_id`, `slug`, `pasal`, `kronologi`, `is_approved`, `file`, `tipe`, `komisioner_id`, `created_at`, `updated_at`) VALUES
(1, '#2NxtMG', 'Kalimantan Barat', 'KAB. MELAWI', 7, 1, 99, 'kalimantan-barat', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, 'Pengaduan', NULL, '2022-03-29 13:42:27', '2022-03-29 13:49:14'),
(2, '#jx0taR', 'Kalimantan Barat', 'KAB. BENGKAYANG', 13, 2, 99, 'kalimantan-barat', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, 'Pengaduan', NULL, '2022-04-04 21:12:08', '2022-04-08 03:56:19'),
(3, '#c5MVGP', 'Kalimantan Barat', 'KAB. MELAWI', 2, 3, 99, 'kalimantan-barat', 'option1', 'lorem ipsuma bla bla bla', 1, NULL, 'Pengaduan', 5, '2022-04-08 07:37:13', '2022-04-10 16:00:14'),
(4, '#2QPHzL', 'Kalimantan Barat', 'KAB. BENGKAYANG', 12, 4, 99, 'kalimantan-barat', NULL, 'lorem ipsum capadocia', 1, NULL, 'Pengaduan', NULL, '2022-04-08 09:30:48', '2022-04-19 04:48:53'),
(5, '#gGkREo', 'Kalimantan Barat', 'KAB. BENGKAYANG', 12, 5, 99, 'kalimantan-barat', 'option1,option3', 'lorem ipsum bla bla bal', 1, NULL, 'Pengaduan', 5, '2022-04-08 17:11:47', '2022-04-11 17:32:19'),
(6, '#mB5Tq8', 'Kalimantan Barat', 'KAB. KETAPANG', 3, 6, 99, 'kalimantan-barat', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, NULL, 'Pengaduan', NULL, '2022-04-10 15:42:55', '2022-04-10 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'lihat pengguna', 'admin', NULL, NULL),
(2, 'lihat pengaduan', 'admin', '2020-12-16 08:42:42', '2020-12-16 08:42:42'),
(3, 'lihat log aktivitas', 'admin', '2021-03-26 12:14:15', '2021-03-26 12:14:15'),
(5, 'sunting pengguna', 'admin', '2022-04-14 05:45:22', '2022-04-14 05:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `regulasi`
--

CREATE TABLE `regulasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulasi`
--

INSERT INTO `regulasi` (`id`, `deskripsi`, `slug`, `kategori`, `upload_by`, `file`, `created_at`, `updated_at`) VALUES
(2, 'Peraturan Daerah 111', 'peraturan-daerah-111', 'Peraturan Daerah', 'KPPAD', '1608540218_pdf-test.pdf', '2020-12-21 08:43:38', '2020-12-21 09:38:58'),
(3, 'UNDANG-UNDANG', 'undang-undang', 'Undang-Undang', 'KPPAD', '1608798519_pdf-test.pdf', '2020-12-24 08:28:39', '2020-12-24 08:28:39'),
(4, 'Peraturan Pemerintah 11', 'peraturan-pemerintah-11', 'Peraturan Pemerintah', 'KPPAD', '1608798589_pdf-test.pdf', '2020-12-24 08:29:49', '2020-12-24 08:29:49'),
(5, 'Peraturan Presiden 12', 'peraturan-presiden-12', 'Peraturan Presiden', 'KPPAD', '1609472799_pdf-test.pdf', '2021-01-01 03:46:39', '2021-01-01 03:46:39'),
(6, 'peraturan bupati ini', 'peraturan-bupati-ini', 'Peraturan Bupati', 'KPPAD', '1609472970_pdf-test.pdf', '2021-01-01 03:49:30', '2021-01-01 03:49:30'),
(7, 'Peraturan Menteri 34', 'peraturan-menteri-34', 'Peraturan Menteri', 'KPPAD', '1609473230_pdf-test.pdf', '2021-01-01 03:53:50', '2021-01-01 03:53:50'),
(8, 'Peraturan Menteri 21', 'peraturan-menteri-21', 'Peraturan Menteri', 'KPPAD', '1610459478_gre_research_validity_data.pdf', '2021-01-12 13:51:18', '2021-01-12 13:51:18'),
(9, 'Peraturan Bupati 86', 'peraturan-bupati-86', 'Peraturan Bupati', 'KPPAD', '1621941434_kimiaumum_Sisi pravidya_F1051171028(1).pdf', '2021-05-25 11:17:14', '2021-05-25 11:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Ketua Komisioner', 'admin', NULL, NULL),
(2, 'Wakil Ketua Komisioner', 'admin', '2021-03-16 06:36:36', '2021-03-16 06:36:36'),
(3, 'Komisioner', 'admin', '2021-03-16 06:36:44', '2021-03-16 06:36:44'),
(4, 'Staf', 'admin', '2022-03-21 07:59:39', '2022-03-21 07:59:39');

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
(2, 1),
(3, 1),
(5, 1),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengaduan_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'VERIFIKASI',
  `isi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `pengaduan_id`, `status`, `isi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'PENDING', NULL, '2022-03-29 13:42:27', '2022-03-29 13:58:33', '2022-03-29 20:58:33'),
(2, 1, 'PENYIDIKAN', '<pre class=\"lang-html s-code-block\" style=\"margin-bottom: 0px; padding: 12px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: 1.30769; font-family: var(--ff-mono); font-size: 13px; vertical-align: baseline; box-sizing: inherit; width: auto; max-height: 600px; background-color: var(--highlight-bg); border-radius: 5px; color: var(--highlight-color); overflow-wrap: normal; text-align: left;\"><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><br></pre>', '2022-03-29 13:58:33', '2022-03-29 14:19:28', '2022-03-29 21:19:28'),
(3, 1, 'PERSIDANGAN', '<p style=\"text-align: left;\"><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Lorem Ipsum</span></strong><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify; white-space: normal;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</span></p><p><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify; white-space: normal;\"> type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 14:19:28', '2022-03-29 15:12:50', '2022-03-29 22:12:50'),
(4, 1, 'PERSIDANGAN', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;;\">Lorem Ipsum</span></span><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 15:12:50', '2022-03-29 15:17:07', '2022-03-29 22:17:07'),
(5, 1, 'PERSIDANGAN', '<p style=\"text-align: left; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;;\">Lorem Ipsum</span></span><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</span></p><p style=\"text-align: left; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">type specimen book. </span></p><p style=\"text-align: left; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\"><br></span></p><p style=\"text-align: left; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 15:17:07', '2022-03-29 15:20:41', '2022-03-29 22:20:41'),
(6, 1, 'PENDING', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;;\">Lorem Ipsum</span></span><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">type specimen book. </span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 15:20:41', '2022-03-29 15:21:07', '2022-03-29 22:21:07'),
(7, 1, 'PERSIDANGAN', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-weight: bolder; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;;\">Lorem Ipsum</span></span><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a</span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">type specimen book. </span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\"><br></span></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: unset; font-size: 15px; color: rgb(102, 102, 102); font-family: Lato-Regular; white-space: normal;\"><span style=\"margin: 0px; padding: 0px; font-family: &quot;Times New Roman&quot;; font-size: 14px; text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 15:21:07', '2022-03-29 15:24:04', '2022-03-29 22:24:04'),
(8, 1, 'PERSIDANGAN', '<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\"><br></span><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2022-03-29 15:24:04', '2022-03-30 11:33:30', '2022-03-30 18:33:30'),
(9, 1, 'VERIFIKASI', 'verifikasi', '2022-03-30 11:33:30', '2022-03-30 11:35:16', '2022-03-30 18:35:16'),
(10, 1, 'PENYIDIKAN', '<strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>', '2022-03-30 11:35:16', '2022-03-30 11:56:36', '2022-03-30 18:56:36'),
(11, 1, 'PERSIDANGAN', '<p><i><span style=\"margin: 0px; padding: 0px; font-weight: bolder; color: rgb(102, 102, 102); white-space: normal; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</span><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); white-space: normal; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </span></i></p><p style=\"text-align: left;\"><span style=\"color: rgb(102, 102, 102); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; white-space: normal;\"><i>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</i></span><br></p>', '2022-03-30 11:56:36', '2022-03-30 11:56:36', NULL),
(12, 2, 'VERIFIKASI', NULL, '2022-04-04 21:12:08', '2022-04-04 21:12:08', NULL),
(13, 3, 'VERIFIKASI', NULL, '2022-04-08 07:37:13', '2022-04-15 16:08:21', '2022-04-15 23:08:21'),
(14, 4, 'VERIFIKASI', NULL, '2022-04-08 09:30:48', '2022-04-19 06:36:26', '2022-04-19 13:36:26'),
(15, 5, 'VERIFIKASI', NULL, '2022-04-08 17:11:47', '2022-04-08 17:20:28', '2022-04-09 00:20:28'),
(17, 6, 'VERIFIKASI', NULL, '2022-04-10 15:42:55', '2022-04-10 15:51:49', '2022-04-10 22:51:49'),
(22, 3, 'PENYIDIKAN', '<p>masuk penyidiak n</p>', '2022-04-15 16:08:21', '2022-04-15 16:08:21', NULL),
(26, 4, 'PENYIDIKAN', '<p>asdfasdfffasdff</p>', '2022-04-19 06:36:26', '2022-04-19 07:49:17', '2022-04-19 14:49:17'),
(30, 5, 'PENGADILAN', '123asdf', '2022-04-19 06:40:41', '2022-04-19 06:45:02', '2022-04-19 13:45:02'),
(34, 5, 'MEDIASI', '<p>asd</p>', '2022-04-19 06:54:22', '2022-04-19 06:58:49', '2022-04-19 13:58:49'),
(40, 5, 'PENGADILAN', '<p>yuyuyu</p>', '2022-04-19 07:29:48', '2022-04-19 07:37:25', '2022-04-19 14:37:25'),
(46, 4, 'PERSIDANGAN', '<p>ff</p>', '2022-04-19 07:55:05', '2022-04-19 07:56:28', '2022-04-19 14:56:28'),
(47, 4, 'PENGADILAN', '<p>ini adalah pengadilan&nbsp;</p>', '2022-04-19 07:56:28', '2022-04-19 07:57:16', '2022-04-19 14:57:16'),
(48, 4, 'SELESAI', '<p>Pengaduan telah selsai&nbsp;</p>', '2022-04-19 07:57:16', '2022-04-19 07:57:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terlapors`
--

CREATE TABLE `terlapors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pelapor_id` bigint(20) UNSIGNED NOT NULL,
  `nama_t` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jk_t` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usia_t` int(11) DEFAULT NULL,
  `agama_t` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu','Bahai','Kepercayaan Lainnya') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak_t` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kewarganegaraan_t` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_t` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terlapors`
--

INSERT INTO `terlapors` (`id`, `pelapor_id`, `nama_t`, `jk_t`, `usia_t`, `agama_t`, `kontak_t`, `kewarganegaraan_t`, `alamat_t`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andre', 'Wanita', 23, 'Islam', NULL, 'WNI', 'Andre', '2022-03-29 13:42:27', '2022-03-29 13:42:27'),
(2, 2, 'Tretan', 'Pria', 57, 'Islam', NULL, 'WNI', 'Tretan', '2022-04-04 21:12:08', '2022-04-04 21:12:08'),
(3, 3, 'Zifara', 'Pria', 19, 'Islam', NULL, 'WNI', 'Zifara', '2022-04-08 07:37:13', '2022-04-08 07:37:13'),
(4, 4, 'Tretan', 'Pria', 56, 'Islam', NULL, 'WNI', 'Tretan', '2022-04-08 09:30:48', '2022-04-08 09:30:48'),
(5, 5, 'Zifara', 'Pria', 34, 'Islam', NULL, 'WNI', 'Zifara', '2022-04-08 17:11:47', '2022-04-08 17:11:47'),
(6, 6, 'Tretan', 'Wanita', 21, 'Kristen Protestan', NULL, 'WNI', 'Tretan', '2022-04-10 15:42:55', '2022-04-10 15:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nik`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khimshin', 'khimshin12@gmail.com', 2147483647, '2022-04-10 15:39:42', '$2y$10$849SZCrTvT4a.OhbUhUTie2XoC8DZiMaHGGMJaaA89yOwl1iaBHFu', NULL, '2022-04-10 15:37:45', '2022-04-10 15:39:42'),
(2, 'Tes', 'paradise@gmail.com', 2147483647, NULL, '$2y$10$lXqezX8F6Z.GufWQqWIACeq.hYP6fOjSxsBlcdnP5n8Ji3vyLbsr.', NULL, '2022-04-11 03:26:00', '2022-04-11 03:26:00'),
(3, 'asdfasdfjh', 'lkasjflkdasf@jaklsjdfklas', 2147483647, NULL, '$2y$10$xvE2SwonjFCkuB5KNtuZW.gEou88d5k5MuZmyJe9zppcLpyXqEgne', NULL, '2022-04-11 03:29:00', '2022-04-11 03:29:00'),
(4, 'asjdfklajsklfd', 'askdjfkalsf@aksjdlkfjal', 123456789, NULL, '$2y$10$QfYLHJ0lRtUimvGPmlviBehwEFpHC8zgZ12mTTAtRLjsd65xWnQZS', NULL, '2022-04-11 03:30:24', '2022-04-11 03:30:24'),
(5, 'Sisi Pravidya', 'sisipravidya89@gmail.com', 2147483647, NULL, '$2y$10$jLy/Bf4OI0WizB5HW27MF.GPE9XcM.2U85kWBI4EX61YjTFDtJUv6', NULL, '2022-04-24 12:29:19', '2022-04-24 12:29:19'),
(6, 'Sisi Pravidya', 'degohernandes@gmail.com', 2147483647, NULL, '$2y$10$zZ57RFl4hvVVRBGK5zSbpO28dFbZoVpvtHmKzEcRLsQgL5r.lgQw2', NULL, '2022-04-24 12:45:25', '2022-04-24 12:45:25'),
(7, 'Sisis Pravidya', 'dankussisprav12@gmail.com', 2147483647, NULL, '$2y$10$qQ39TCYC59oR8qt9geRzE.uURPfP71KcBLFSjset7E1aGk1LnsgGi', NULL, '2022-04-24 12:51:31', '2022-04-24 12:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `buktis`
--
ALTER TABLE `buktis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buktis_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indexes for table `fast_kegiatans`
--
ALTER TABLE `fast_kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kasuses`
--
ALTER TABLE `jenis_kasuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korbans`
--
ALTER TABLE `korbans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `korbans_pelapor_id_foreign` (`pelapor_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelapors`
--
ALTER TABLE `pelapors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengaduans_jenis_kasus_id_foreign` (`jenis_kasus_id`),
  ADD KEY `pengaduans_komisioner_id_foreign` (`komisioner_id`),
  ADD KEY `pengaduans_pelapor_id_foreign` (`pelapor_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulasi`
--
ALTER TABLE `regulasi`
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
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statuses_pengaduan_id_foreign` (`pengaduan_id`);

--
-- Indexes for table `terlapors`
--
ALTER TABLE `terlapors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terlapors_pelapor_id_foreign` (`pelapor_id`);

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
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buktis`
--
ALTER TABLE `buktis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fast_kegiatans`
--
ALTER TABLE `fast_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_kasuses`
--
ALTER TABLE `jenis_kasuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `korbans`
--
ALTER TABLE `korbans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pelapors`
--
ALTER TABLE `pelapors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduans`
--
ALTER TABLE `pengaduans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `terlapors`
--
ALTER TABLE `terlapors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buktis`
--
ALTER TABLE `buktis`
  ADD CONSTRAINT `buktis_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `korbans`
--
ALTER TABLE `korbans`
  ADD CONSTRAINT `korbans_pelapor_id_foreign` FOREIGN KEY (`pelapor_id`) REFERENCES `pelapors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `pengaduans`
--
ALTER TABLE `pengaduans`
  ADD CONSTRAINT `pengaduans_jenis_kasus_id_foreign` FOREIGN KEY (`jenis_kasus_id`) REFERENCES `jenis_kasuses` (`id`),
  ADD CONSTRAINT `pengaduans_komisioner_id_foreign` FOREIGN KEY (`komisioner_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `pengaduans_pelapor_id_foreign` FOREIGN KEY (`pelapor_id`) REFERENCES `pelapors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `statuses_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terlapors`
--
ALTER TABLE `terlapors`
  ADD CONSTRAINT `terlapors_pelapor_id_foreign` FOREIGN KEY (`pelapor_id`) REFERENCES `pelapors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

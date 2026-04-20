-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 20, 2026 at 05:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `alats`
--

CREATE TABLE `alats` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alats`
--

INSERT INTO `alats` (`id`, `nama`, `kode`, `jumlah`, `created_at`, `updated_at`, `kategori_id`) VALUES
(1, 'Laptop Lenovo', 'LAP001', 37, '2026-02-07 22:11:14', '2026-04-19 18:32:43', 4),
(2, 'Proyektor Epson', 'PRO001', 46, '2026-02-07 22:11:14', '2026-04-13 23:06:23', 4),
(3, 'Kamera Canon', 'CAM001', 42, '2026-02-07 22:11:14', '2026-04-19 17:45:21', 4),
(7, 'tes', 'tes', 20, '2026-02-10 20:43:31', '2026-04-08 19:06:46', 6),
(8, 'sapu', 'SAP001', 20, '2026-02-12 04:56:37', '2026-04-16 06:11:42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `detail_peminjamen`
--

CREATE TABLE `detail_peminjamen` (
  `id` bigint UNSIGNED NOT NULL,
  `peminjaman_id` bigint UNSIGNED NOT NULL,
  `alat_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_peminjamen`
--

INSERT INTO `detail_peminjamen` (`id`, `peminjaman_id`, `alat_id`, `jumlah`, `tgl_pengembalian`, `created_at`, `updated_at`) VALUES
(41, 51, 3, 5, '2026-04-16', '2026-04-13 17:51:33', '2026-04-13 17:51:33'),
(43, 53, 1, 5, '2026-04-17', '2026-04-15 18:13:22', '2026-04-15 18:13:22'),
(44, 54, 3, 2, '2026-04-18', '2026-04-15 18:13:39', '2026-04-15 18:13:39'),
(45, 55, 8, 5, '2026-04-17', '2026-04-15 18:13:50', '2026-04-15 18:13:50'),
(48, 58, 1, 2, '2026-04-17', '2026-04-16 04:30:30', '2026-04-16 04:30:30'),
(49, 59, 3, 3, '2026-04-18', '2026-04-16 04:30:41', '2026-04-16 04:30:41'),
(50, 60, 1, 2, '2026-04-17', '2026-04-16 04:41:57', '2026-04-16 04:41:57'),
(51, 61, 8, 5, '2026-04-18', '2026-04-16 04:42:10', '2026-04-16 04:42:10'),
(52, 62, 1, 1, '2026-04-19', '2026-04-16 05:17:03', '2026-04-16 05:17:03'),
(53, 63, 1, 3, '2026-04-23', '2026-04-16 06:11:54', '2026-04-16 06:11:54'),
(54, 64, 1, 3, '2026-04-23', '2026-04-16 06:11:55', '2026-04-16 06:11:55'),
(55, 65, 1, 4, '2026-04-23', '2026-04-16 06:42:18', '2026-04-16 06:42:18'),
(56, 66, 1, 1, '2026-04-27', '2026-04-19 18:32:43', '2026-04-19 18:32:43');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'kebersihan', '2026-02-07 22:11:14', '2026-02-12 05:14:34'),
(4, 'elektronik', '2026-02-09 20:27:11', '2026-02-09 20:27:11'),
(6, 'kebab', '2026-02-10 20:36:50', '2026-04-05 13:19:52'),
(8, 'martabak enak', '2026-04-16 05:05:28', '2026-04-16 05:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `aktivitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `aktivitas`, `created_at`, `updated_at`) VALUES
(1, 2, 'Approve peminjaman ID 60', '2026-04-16 06:03:37', '2026-04-16 06:03:37'),
(2, 2, 'Approve peminjaman ID 61', '2026-04-16 06:03:45', '2026-04-16 06:03:45'),
(3, 2, 'Approve peminjaman ID 62', '2026-04-16 06:12:13', '2026-04-16 06:12:13'),
(4, 2, 'Approve peminjaman ID 63', '2026-04-16 06:12:15', '2026-04-16 06:12:15'),
(5, 2, 'Approve peminjaman ID 64', '2026-04-16 06:12:17', '2026-04-16 06:12:17'),
(6, 2, 'Konfirmasi pembayaran denda ID 51', '2026-04-16 06:13:18', '2026-04-16 06:13:18'),
(7, 2, 'APPROVE - Laptop Lenovo - farhan', '2026-04-16 06:42:33', '2026-04-16 06:42:33'),
(8, 2, 'DENDA DIBAYAR - Kamera Canon - farhan', '2026-04-16 20:17:12', '2026-04-16 20:17:12');

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
(4, '2026_02_04_000539_create_alats_table', 1),
(5, '2026_02_04_001443_create_peminjamen_table', 1),
(6, '2026_02_04_001602_create_detail_peminjamen_table', 1),
(7, '2026_02_04_002454_create_kategoris_table', 1),
(8, '2026_02_04_011127_add_kategori_id_to_alats_table', 1),
(9, '2026_02_12_060451_create_logs_table', 2),
(10, '2026_03_31_020654_add_alat_id_to_peminjamen_table', 3),
(11, '2026_04_07_021624_add_tgl_pengembalian_to_detail_peminjamen_table', 4),
(12, '2026_04_13_013845_update_status_peminjamen_enum', 5),
(13, '2026_04_14_004501_add_denda_to_peminjamen_table', 5),
(14, '2026_04_14_060918_add_status_denda_to_peminjamen', 6);

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
-- Table structure for table `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `alat_id` bigint UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('menunggu','dipinjam','ditolak','dikembalikan') COLLATE utf8mb4_unicode_ci DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `denda` int NOT NULL DEFAULT '0',
  `status_denda` enum('belum_bayar','sudah_bayar') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_bayar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `user_id`, `alat_id`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `created_at`, `updated_at`, `denda`, `status_denda`) VALUES
(51, 9, 3, '2026-04-14', '2026-04-14', 'dikembalikan', '2026-04-13 17:51:33', '2026-04-16 06:13:18', 4000, 'sudah_bayar'),
(53, 9, 1, '2026-04-16', '2026-04-17', 'dikembalikan', '2026-04-15 18:13:22', '2026-04-16 06:11:37', 0, 'sudah_bayar'),
(54, 9, 3, '2026-04-16', '2026-04-18', 'dikembalikan', '2026-04-15 18:13:39', '2026-04-19 17:45:21', 4000, 'belum_bayar'),
(55, 9, 8, '2026-04-16', '2026-04-17', 'dikembalikan', '2026-04-15 18:13:50', '2026-04-16 06:11:42', 0, 'sudah_bayar'),
(58, 5, 1, '2026-04-16', '2026-04-12', 'dikembalikan', '2026-04-16 04:30:30', '2026-04-16 19:48:30', 10000, 'belum_bayar'),
(59, 5, 3, '2026-04-16', '2026-04-15', 'dikembalikan', '2026-04-16 04:30:41', '2026-04-16 20:17:12', 4000, 'sudah_bayar'),
(60, 5, 1, '2026-04-16', '2026-04-12', 'dikembalikan', '2026-04-16 04:41:57', '2026-04-16 19:46:07', 0, 'sudah_bayar'),
(61, 5, 8, '2026-04-16', '2026-04-12', 'dipinjam', '2026-04-16 04:42:10', '2026-04-16 06:03:45', 0, 'belum_bayar'),
(62, 9, 1, '2026-04-16', '2026-04-19', 'dipinjam', '2026-04-16 05:17:03', '2026-04-16 06:12:13', 0, 'belum_bayar'),
(63, 9, 1, '2026-04-16', '2026-04-23', 'dipinjam', '2026-04-16 06:11:54', '2026-04-16 06:12:15', 0, 'belum_bayar'),
(64, 9, 1, '2026-04-16', '2026-04-23', 'dipinjam', '2026-04-16 06:11:55', '2026-04-16 06:12:17', 0, 'belum_bayar'),
(65, 5, 1, '2026-04-16', '2026-04-23', 'dipinjam', '2026-04-16 06:42:18', '2026-04-16 06:42:33', 0, 'belum_bayar'),
(66, 5, 1, '2026-04-20', '2026-04-27', 'menunggu', '2026-04-19 18:32:42', '2026-04-19 18:32:42', 0, 'belum_bayar');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','staff','peminjam') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$lSPxq2em0jBZN2BKcIozHOTEJkUKHQ2v7Jy6DwX5uog/l34TSUmci', 'admin', '2XCefpQGpAsnfOtRE3UnpAbKq7MHy4rP2qSCGMZVkijxmHMHgc6CfOnsfSep', '2026-02-07 22:11:14', '2026-02-07 22:11:14'),
(2, 'Staff 1', 'staff1', 'staff1@gmail.com', NULL, '$2y$12$BYj32yVhDglcCV3isSnG6.aqTrQydWgTgv17YYpEXX3IDyE25NThy', 'staff', 'oY9Yqx9yan8KxVJQxdqcF63ROgAsinQqxT5Xfl2H4GC0USz6pGHtQXgRiYxm', '2026-02-07 22:11:14', '2026-04-06 16:40:48'),
(5, 'farhan', 'farhan', 'farhan123@gmail.com', NULL, '$2y$12$wJT4G6or0Q3wMAuWVlA3POjkj2llewNi/RzRsY9xnuF22RKHuo9DS', 'peminjam', 'Booi9xw1rBmiO588cU8PbmRyZoUxYPBJg3VCO8zqP7MIIBAWvaRWuUNTsXEz', '2026-02-09 20:30:24', '2026-03-30 17:03:35'),
(9, 'gupihana', 'gupihana', 'gupihana404@gmail.com', NULL, '$2y$12$yrEhJ.lvwiW0gVyobxp02.MuBStrphUyaOAS5mSPNXLlf3.obdV/u', 'peminjam', 'gCymAeTqs1n3128ogn0bkgugSeLbowwfasusIYGcCw2xFhjl7w2eLoMi1iSg', '2026-04-08 19:01:18', '2026-04-08 19:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alats_kode_unique` (`kode`),
  ADD KEY `alats_kategori_id_foreign` (`kategori_id`);

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
-- Indexes for table `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjamen_peminjaman_id_foreign` (`peminjaman_id`),
  ADD KEY `detail_peminjamen_alat_id_foreign` (`alat_id`);

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoris_nama_unique` (`nama`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_user_id_foreign` (`user_id`),
  ADD KEY `peminjamen_alat_id_foreign` (`alat_id`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alats`
--
ALTER TABLE `alats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alats`
--
ALTER TABLE `alats`
  ADD CONSTRAINT `alats_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `detail_peminjamen`
--
ALTER TABLE `detail_peminjamen`
  ADD CONSTRAINT `detail_peminjamen_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_peminjamen_peminjaman_id_foreign` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjamen` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_alat_id_foreign` FOREIGN KEY (`alat_id`) REFERENCES `alats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjamen_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

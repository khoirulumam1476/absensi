-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2019 at 02:01 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_guru` int(10) UNSIGNED NOT NULL,
  `id_kelas` int(10) UNSIGNED NOT NULL,
  `tanggal` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_guru`, `id_kelas`, `tanggal`, `created_at`, `updated_at`) VALUES
(16, 5, 10, '07/10/2019', '2019-07-08 05:32:06', '2019-07-08 05:32:06'),
(17, 5, 10, '07/02/2019', '2019-07-08 05:33:06', '2019-07-08 05:33:06'),
(18, 5, 10, '07/11/2019', '2019-07-09 06:12:37', '2019-07-09 06:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `detail_absensi`
--

CREATE TABLE `detail_absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_absensi` int(10) UNSIGNED NOT NULL,
  `id_siswa` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_absensi`
--

INSERT INTO `detail_absensi` (`id`, `id_absensi`, `id_siswa`, `status`, `created_at`, `updated_at`) VALUES
(9, 16, 1, 'H', '2019-07-08 05:32:06', '2019-07-08 05:32:06'),
(10, 16, 2, 'S', '2019-07-08 05:32:06', '2019-07-08 05:32:06'),
(11, 16, 6, 'I', '2019-07-08 05:32:06', '2019-07-08 05:32:06'),
(12, 17, 1, 'I', '2019-07-08 05:33:06', '2019-07-08 05:33:06'),
(13, 17, 2, 'A', '2019-07-08 05:33:06', '2019-07-08 05:33:06'),
(14, 17, 6, 'H', '2019-07-08 05:33:06', '2019-07-08 05:33:06'),
(15, 18, 1, 'S', '2019-07-09 06:12:37', '2019-07-09 06:12:37'),
(16, 18, 2, 'S', '2019-07-09 06:12:37', '2019-07-09 06:12:37'),
(17, 18, 6, 'S', '2019-07-09 06:12:37', '2019-07-09 06:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_guru` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nip`, `nama_guru`, `email_guru`, `ttl`, `jenis_kelamin`, `agama`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 0, '1755', 'Tapai Kolop', '', 'nyar dejeh', 'P', 'Katolik', '0987543757', 'Liprak', '2019-06-26 08:05:31', '2019-07-07 05:04:27'),
(5, 4, '212', 'Ronal Dikin', 'yahoo@gmail.com', 'Mayangan', 'L', 'Hindu', '081322280004', 'Kampung Ikan', '2019-07-06 03:45:04', '2019-07-07 05:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'J001', 'BAHASA', '2019-06-27 05:57:41', '2019-07-07 06:05:30'),
(6, 'J002', 'IPS', '2019-07-07 05:55:32', '2019-07-07 05:55:32'),
(7, 'J003', 'AGAMA', '2019-07-07 05:55:57', '2019-07-07 05:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kode_jurusan`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(8, 'K001', 'J001', 'X-BAHASA', '2019-07-07 05:58:43', '2019-07-07 05:58:43'),
(9, 'K002', 'J002', 'X-IPS', '2019-07-07 06:00:59', '2019-07-07 06:00:59'),
(10, 'K003', 'J003', 'X-AGAMA', '2019-07-07 06:01:42', '2019-07-07 06:01:42'),
(11, 'K004', 'J001', 'XI-BAHASA', '2019-07-07 06:02:27', '2019-07-07 06:02:27'),
(12, 'K005', 'J002', 'XI-IPS', '2019-07-07 06:02:57', '2019-07-07 06:02:57'),
(13, 'K006', 'J003', 'XI-AGAMA', '2019-07-07 06:03:20', '2019-07-07 06:03:20'),
(14, 'K007', 'J001', 'XII-BAHASA', '2019-07-07 06:04:10', '2019-07-07 06:04:10'),
(15, 'K008', 'J002', 'XII-IPS', '2019-07-07 06:04:29', '2019-07-07 06:04:29'),
(16, 'K009', 'J003', 'XII-AGAMA', '2019-07-07 06:04:53', '2019-07-07 06:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `nama_mapel`, `kkm`, `created_at`, `updated_at`) VALUES
(3, 'M002', 'MATEMATIKA', '65', '2019-07-07 06:06:15', '2019-07-07 06:06:15'),
(4, 'M001', 'BAHASA INDONESIA', '65', '2019-07-07 06:06:59', '2019-07-07 06:06:59'),
(5, 'M003', 'PPKN', '65', '2019-07-07 06:07:49', '2019-07-07 06:31:53');

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
(3, '2019_06_23_150153_create_siswa_table', 1),
(4, '2019_06_26_122317_create_siswa_table', 2),
(5, '2019_06_26_142134_create_guru_table', 3),
(6, '2019_06_26_145910_create_guru_table', 4),
(7, '2019_06_27_121136_create__jurusan_table', 5),
(8, '2019_06_27_125243_create_jurusan_table', 6),
(9, '2019_06_27_132339_create_mapel_table', 7),
(10, '2019_06_27_133328_create_mapel_table', 8),
(11, '2019_06_27_134404_create_kelas_table', 9),
(12, '2019_06_27_135313_create_kelas_table', 10);

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
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_wali` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `ttl`, `jenis_kelamin`, `agama`, `alamat`, `kelas`, `nama_wali`, `jenis_kelamin_wali`, `agama_wali`, `pekerjaan_wali`, `telepon_wali`, `created_at`, `updated_at`) VALUES
(1, '1002', 'ani', 'probolinggo, 30-09-1996', 'P', 'Islam', 'belakang sasa', 'X-IPS', 'aan', 'L', 'Islam', 'guru', '085259409507', '2019-06-26 05:30:12', '2019-07-07 06:21:19'),
(2, '1102', 'Dimas', 'probolinggo, 30-04-2001', 'L', 'Islam', 'banyuanyar', 'X-IPS', 'nana', 'P', 'Islam', 'guru', '085259409507', '2019-06-26 05:43:05', '2019-07-07 06:14:24'),
(3, '1234', 'jajan', 'probolinggo, 03-04-2001', 'L', 'Islam', 'Patalan Lor', 'X-AGAMA', 'sami', 'P', 'Islam', 'ibu rumah tangga', '085259409507', '2019-06-26 05:44:50', '2019-07-07 06:15:22'),
(6, '12345', 'SINGO EDAN', 'Grobogan, 30-06-1996', 'P', 'Islam', 'Jl. SIngosari', 'X-IPS', 'Pak SOngot', 'L', 'Islam', 'Petani', '082302003423', '2019-07-03 17:35:30', '2019-07-08 04:57:58'),
(7, '2341', 'dandi aja', 'probolinggo, 01-16-1994', 'L', 'Islam', 'dimanapun', 'K005', 'ibuk', 'Perempuan', 'Islam', 'tidur', '085259409507', '2019-07-07 06:17:46', '2019-07-07 06:17:46'),
(8, '2456', 'ningsi', 'malang, 13-02-1998', 'P', 'Islam', 'Jl. SIngosari', 'K006', 'nama', 'Laki-laki', 'Islam', 'Petani', '082302003423', '2019-07-07 06:19:26', '2019-07-07 06:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(48) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tapai', 'a@mail.com', NULL, '$2y$10$lGORjsxOQDUTxHJ8FoqkG.z7EdguL5qAXTUvz770PIik4oxy2rpri', '0zlNJMddPLo5HWqk5mOTxs7ttorgtMBydhqRxpM9R55Yt1ms51IGDWgPxMH3', '2019-07-05 21:32:11', '2019-07-05 21:32:11'),
(4, 'guru', 'Ronal Dikin', 'yahoo@gmail.com', NULL, '$2y$10$pLPEB20iQZD/ZwPsOnpQA.vEJElGhJDRbAJlq0AyY6NOYsNf25W3m', 'VMqxcvkEWmA9Kvo2I4GspxtM7pShWfiqapA0Lcfm8u7JWRMgD6JEFaJ8KwYI', '2019-07-06 03:45:04', '2019-07-06 03:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_absensi_id_absensi_foreign` (`id_absensi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_absensi`
--
ALTER TABLE `detail_absensi`
  ADD CONSTRAINT `detail_absensi_id_absensi_foreign` FOREIGN KEY (`id_absensi`) REFERENCES `absensi` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

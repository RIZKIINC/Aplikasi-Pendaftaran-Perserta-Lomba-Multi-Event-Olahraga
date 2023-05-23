-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2023 at 03:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang_olahraga`
--

CREATE TABLE `cabang_olahraga` (
  `id` bigint UNSIGNED NOT NULL,
  `cabor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cabang_olahraga`
--

INSERT INTO `cabang_olahraga` (`id`, `cabor`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 'Atletik', NULL, NULL, NULL),
(2, 'Billyard', NULL, NULL, NULL),
(3, 'Bola Basket', NULL, NULL, NULL),
(4, 'Bola Voli', NULL, NULL, NULL),
(5, 'Bola Tangan', NULL, NULL, NULL),
(6, 'Bulu Tangkis', NULL, NULL, NULL),
(7, 'Catur', NULL, NULL, NULL),
(8, 'Dance Sport', NULL, NULL, NULL),
(9, 'Drumband', NULL, NULL, NULL),
(10, 'Futsal', NULL, NULL, NULL),
(11, 'Menembak', NULL, NULL, NULL),
(12, 'Panahan', NULL, NULL, NULL),
(13, 'Panjat Tebing', NULL, NULL, NULL),
(14, 'Silat', NULL, NULL, NULL),
(15, 'Petanque', NULL, NULL, NULL),
(16, 'Renang', NULL, NULL, NULL),
(17, 'Sepak Bola', NULL, NULL, NULL),
(18, 'Sepak Takraw', NULL, NULL, NULL),
(19, 'Sepatu Roda', NULL, NULL, NULL),
(20, 'Shorinji Kempo', NULL, NULL, NULL),
(21, 'Squash', NULL, NULL, NULL),
(22, 'Tae kwon do', NULL, NULL, NULL),
(23, 'Tenis Meja', NULL, NULL, NULL),
(24, 'Tinju', NULL, NULL, NULL),
(25, 'Wushu', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_persons`
--

CREATE TABLE `contact_persons` (
  `id` bigint UNSIGNED NOT NULL,
  `kecamatan_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_persons`
--

INSERT INTO `contact_persons` (`id`, `kecamatan_id`, `nama`, `jabatan`, `email`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dewi', 'Sekretaris', 'Dewi@example.com', '081156488652', NULL, NULL),
(2, 2, 'Rizki Ilham', 'Bendahara', 'Rizki@example.com', '089963324598', NULL, NULL),
(3, 3, 'Putra Adytia', 'Sekretaris', 'Putra@example.com', '08783546988', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_cabor`
--

CREATE TABLE `event_cabor` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cabang_olahraga_id` bigint UNSIGNED NOT NULL,
  `nomor_olahraga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_cabor`
--

INSERT INTO `event_cabor` (`id`, `created_at`, `updated_at`, `cabang_olahraga_id`, `nomor_olahraga`, `nama_event`, `jenis_kelamin`) VALUES
(1, NULL, NULL, 1, '1', 'Lari 100 M Putra', 'Putra'),
(2, NULL, NULL, 1, '2', 'Lari 200 M Putra', 'Putra'),
(3, NULL, NULL, 1, '1', 'Lari 100 M Putri', 'Putri'),
(4, NULL, NULL, 1, '2', 'Lari 200 M Putri', 'Putri');

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
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint UNSIGNED NOT NULL,
  `namacamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kodepos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namakecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `namacamat`, `notelp`, `email`, `kodepos`, `alamat`, `namakecamatan`, `created_at`, `updated_at`) VALUES
(1, 'M Irman', '021-123456', 'Kemuning@example.com', '30151', 'Jl. Jend. Basuki Rachmat No.75, Pipa Jaya, Kec. Ilir Tim. I, Kota Palembang, Sumatera Selatan', 'Kemuning', NULL, NULL),
(2, 'Jokowi B', '021-987654', 'Plaju@example.com', '30119', 'Jl. DI. Panjaitan No.1, Bagus Kuning, Kec. Plaju, Kota Palembang, Sumatera Selatan', 'Plaju', NULL, NULL),
(3, 'Irfan C', '021-456789', 'Alangalanglebar@example.com', '30961', 'Jl. Bypass Alang-Alang Lebar, Talang Klp., Alang Alang Lebar, Kota Palembang, Sumatera Selatan', 'Alang Alang Lebar', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_23_132130_create_kecamatan_table', 1),
(6, '2023_05_23_132318_create_contact_persons_table', 1),
(7, '2023_05_23_132455_create_cabang_olahraga_table', 1),
(8, '2023_05_23_144947_create_event_cabor_table', 1),
(9, '2023_05_23_151628_create_peserta_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_event_cabor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttl` date NOT NULL,
  `nomor_kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_olahraga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama_event_cabor`, `kecamatan_id`, `nama`, `nik`, `ttl`, `nomor_kk`, `akta`, `foto`, `alamat`, `no_olahraga`, `domisili`, `no_ijazah`, `jk`, `created_at`, `updated_at`) VALUES
(1, 'Lari 100 M Putra', 1, 'Feisal', '123456789', '2000-01-01', '1234567890', 'Akta 1', 'foto1.jpg', 'Alamat Peserta 1', 'Olahraga 001', 'Domisili 1', 'No Ijazah 1', 'L', '2023-05-23 15:22:27', '2023-05-23 15:22:27'),
(2, 'Lari 200 M Putra', 2, 'Dono', '987654321', '1999-02-02', '0987654321', 'Akta 2', 'foto2.jpg', 'Alamat Peserta 2', 'Olahraga 002', 'Domisili 2', 'No Ijazah 2', 'L', '2023-05-23 15:22:27', '2023-05-23 15:22:27'),
(3, 'Lari 100 M Putri', 3, 'Indri', '456789123', '1998-03-03', '4567890123', 'Akta 3', 'foto3.jpg', 'Alamat Peserta 3', 'Olahraga 003', 'Domisili 3', 'No Ijazah 3', 'P', '2023-05-23 15:22:27', '2023-05-23 15:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `username`, `password`, `email`, `role`) VALUES
(1, NULL, NULL, 'Rizki Ilhami', '123456', 'john.doe@example.com', 'admin'),
(2, NULL, NULL, 'Feisal Dharma Yuda', '123456', 'jane1.smith@example.com', 'pegawai_kec'),
(3, NULL, NULL, 'Putra Aditya', '123456', 'james2.brown@example.com', 'pegawai_kec'),
(4, NULL, NULL, 'Adhiba Alya Firdaus', '123456', 'james3.brown@example.com', 'admin'),
(5, NULL, NULL, 'Putri Meylisa Maulidya', '123456', 'james4.brown@example.com', 'admin'),
(6, NULL, NULL, 'Arip', '123456', 'james5.brown@example.com', 'ketuapelaksana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang_olahraga`
--
ALTER TABLE `cabang_olahraga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_persons_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indexes for table `event_cabor`
--
ALTER TABLE `event_cabor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_cabor_nama_event_unique` (`nama_event`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peserta_nama_event_cabor_foreign` (`nama_event_cabor`),
  ADD KEY `peserta_kecamatan_id_foreign` (`kecamatan_id`);

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
-- AUTO_INCREMENT for table `cabang_olahraga`
--
ALTER TABLE `cabang_olahraga`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_persons`
--
ALTER TABLE `contact_persons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_cabor`
--
ALTER TABLE `event_cabor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_persons`
--
ALTER TABLE `contact_persons`
  ADD CONSTRAINT `contact_persons_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`),
  ADD CONSTRAINT `peserta_nama_event_cabor_foreign` FOREIGN KEY (`nama_event_cabor`) REFERENCES `event_cabor` (`nama_event`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

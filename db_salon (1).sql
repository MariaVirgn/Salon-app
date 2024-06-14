-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 13.49
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_06_12_160739_create_tb_admin_table', 1),
(2, '2024_06_12_161124_create_tb_cust_table', 2),
(3, '2024_06_12_163815_create_tb_jasa_table', 3),
(4, '2014_10_12_000000_create_users_table', 4),
(5, '2014_10_12_100000_create_password_resets_table', 4),
(6, '2019_08_19_000000_create_failed_jobs_table', 4),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(8, '2024_06_12_161055_create_tb_booking_table', 4),
(9, '2024_06_12_161458_create_tb_riwayat_table', 4),
(10, '2024_06_13_074323_create_tb_config_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$10$SJ4mJOcpuz2xj84EcxUWsOPod2HZsa3N.VqS4kKIBnPNgChnLTJza', '2024-06-13 03:19:50', '2024-06-13 03:19:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `id_cust` bigint(20) UNSIGNED NOT NULL,
  `id_jasa` bigint(20) UNSIGNED NOT NULL,
  `jam_booking` time NOT NULL,
  `tanggal_booking` date NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `val` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_cust`, `id_jasa`, `jam_booking`, `tanggal_booking`, `metode_pembayaran`, `val`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '18:00:00', '2024-06-14', 'Cash', 'N', NULL, '2024-06-12 23:19:55'),
(3, 3, 2, '12:00:00', '2024-06-14', 'Transfer', 'Y', NULL, '2024-06-13 03:21:56'),
(4, 3, 3, '17:16:00', '2024-06-21', 'Transfer', 'Y', '2024-06-13 02:58:17', '2024-06-13 02:58:46'),
(5, 3, 1, '18:13:00', '2024-06-15', 'cash', 'Y', '2024-06-14 06:12:39', '2024-06-14 06:12:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_config`
--

CREATE TABLE `tb_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_config`
--

INSERT INTO `tb_config` (`id`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta tempore nostrum quam maiores. Necessitatibus cum excepturi labore vitae neque. Magni voluptates quibusdam distinctio reiciendis odit! Deleniti ducimus expedita quos atque!', NULL, '2024-06-13 04:25:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cust`
--

CREATE TABLE `tb_cust` (
  `id_cust` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomor_cust` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_cust`
--

INSERT INTO `tb_cust` (`id_cust`, `username`, `email`, `nomor_cust`, `alamat`, `password`, `created_at`, `updated_at`) VALUES
(1, 'aldi', 'aldi@gmail.com', '089778900987', 'paingan, maguwoharjo', '$2y$10$2YOKrxzbDNRKndE.JRBsi.pvnR4Z1UrJ73/S42.R83b1CQTtIKJlS', '2024-06-12 21:14:40', '2024-06-13 03:29:56'),
(3, 'didi', 'didi@gmail.com', '09873276293', 'Klaten', '$2y$10$2YOKrxzbDNRKndE.JRBsi.pvnR4Z1UrJ73/S42.R83b1CQTtIKJlS', '2024-06-13 02:36:36', '2024-06-13 02:39:10'),
(4, 'komang', '938249924', '938249924', 'bali', '$2y$10$Lgh8rt2LBecfvVAC2LVWuu4TR/w2Zg0KP7GNyn2E4wxCOncHBl4PO', '2024-06-13 04:39:42', '2024-06-13 04:39:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jasa`
--

CREATE TABLE `tb_jasa` (
  `id_jasa` bigint(20) UNSIGNED NOT NULL,
  `nama_jasa` varchar(255) NOT NULL,
  `harga_jasa` int(11) NOT NULL,
  `deskripsi_jasa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_jasa`
--

INSERT INTO `tb_jasa` (`id_jasa`, `nama_jasa`, `harga_jasa`, `deskripsi_jasa`, `created_at`, `updated_at`) VALUES
(1, 'Potong Rambut', 50000, 'Potong Rambut dan Keramas', NULL, '2024-06-13 02:30:16'),
(2, 'Smoothing', 150000, 'Pelurusan Rambut', '2024-06-13 02:30:43', '2024-06-13 02:30:43'),
(3, 'Cat Rambut', 100000, 'Cat Rambut', '2024-06-13 02:57:27', '2024-06-13 02:57:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_booking` bigint(20) UNSIGNED NOT NULL,
  `harga_jasa_booking` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_booking`, `harga_jasa_booking`, `created_at`, `updated_at`) VALUES
(1, '60000', NULL, NULL),
(3, '2345', NULL, NULL),
(5, '50000', '2024-06-14 06:12:50', '2024-06-14 06:12:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `tb_admin_username_unique` (`username`);

--
-- Indeks untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `tb_booking_id_cust_foreign` (`id_cust`),
  ADD KEY `tb_booking_id_jasa_foreign` (`id_jasa`);

--
-- Indeks untuk tabel `tb_config`
--
ALTER TABLE `tb_config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_cust`
--
ALTER TABLE `tb_cust`
  ADD PRIMARY KEY (`id_cust`),
  ADD UNIQUE KEY `tb_cust_username_unique` (`username`);

--
-- Indeks untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD KEY `tb_riwayat_id_booking_foreign` (`id_booking`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_config`
--
ALTER TABLE `tb_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_cust`
--
ALTER TABLE `tb_cust`
  MODIFY `id_cust` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_jasa`
--
ALTER TABLE `tb_jasa`
  MODIFY `id_jasa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_id_cust_foreign` FOREIGN KEY (`id_cust`) REFERENCES `tb_cust` (`id_cust`),
  ADD CONSTRAINT `tb_booking_id_jasa_foreign` FOREIGN KEY (`id_jasa`) REFERENCES `tb_jasa` (`id_jasa`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD CONSTRAINT `tb_riwayat_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `tb_booking` (`id_booking`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

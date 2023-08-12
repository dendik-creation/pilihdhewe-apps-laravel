-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2023 pada 05.31
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting-app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `candidates`
--

INSERT INTO `candidates` (`id`, `user_id`, `event_id`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(130, 10, 59, 'Visi 1', 'Misi 1', '2023-08-07 19:52:57', '2023-08-07 19:52:57'),
(131, 11, 59, 'Visi 2', 'Misi 2', '2023-08-07 19:52:57', '2023-08-07 19:52:57'),
(132, 12, 59, 'Visi 3', 'Misi 3', '2023-08-07 19:52:57', '2023-08-07 19:52:57'),
(133, 8, 59, 'Visi 4', 'Misi 4', '2023-08-07 19:52:57', '2023-08-07 19:52:57'),
(134, 6, 60, 'Visi 1', 'Misi 1', '2023-08-07 19:54:22', '2023-08-07 19:54:22'),
(135, 17, 60, 'Visi 2', 'Misi 2', '2023-08-07 19:54:22', '2023-08-07 19:54:22'),
(136, 23, 60, 'Visi 3', 'Misi 3', '2023-08-07 19:54:22', '2023-08-07 19:54:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(59, 'Orang Cina', 'With Many Candidates Test Event', '2023-08-08', '2023-08-29', 'Active', '2023-08-07 19:52:57', '2023-08-07 20:30:20'),
(60, 'Lorem Jawir', 'Aku Punya Ini', '2023-08-09', '2023-08-25', 'Inactive', '2023-08-07 19:54:22', '2023-08-07 19:54:22');

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'X TJKT 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(2, 'X TJKT 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(3, 'X TJKT 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(4, 'X TJKT 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(5, 'X TO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(6, 'X TO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(7, 'X TO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(8, 'X TO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(9, 'X TE 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(10, 'X TE 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(11, 'X TE 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(12, 'X TE 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(13, 'XI TJKT 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(14, 'XI TJKT 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(15, 'XI TJKT 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(16, 'XI TJKT 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(17, 'XI TO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(18, 'XI TO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(19, 'XI TO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(20, 'XI TO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(21, 'XI TE 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(22, 'XI TE 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(23, 'XI TE 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(24, 'XI TE 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(25, 'XII TKJ 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(26, 'XII TKJ 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(27, 'XII TKJ 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(28, 'XII TKJ 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(29, 'XII TKRO 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(30, 'XII TKRO 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(31, 'XII TKRO 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(32, 'XII TKRO 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(33, 'XII TAV 1', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(34, 'XII TAV 2', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(35, 'XII TAV 3', '2023-07-05 07:47:41', '2023-07-05 07:47:41'),
(36, 'XII TAV 4', '2023-07-05 07:47:41', '2023-07-05 07:47:41');

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
(1, '2012_07_05_044332_create_kelas_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_19_053133_create_events_table', 1),
(7, '2023_06_19_053151_create_candidates_table', 1),
(8, '2023_06_19_053202_create_results_table', 1);

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
-- Struktur dari tabel `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number_card` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role` enum('admin','siswa') NOT NULL,
  `gender` enum('Laki-laki','Perempuan','Rahasia') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `number_card`, `name`, `gambar`, `kelas_id`, `role`, `gender`, `password`, `created_at`, `updated_at`) VALUES
(1, 'SMK-ADMIN', 'Administrator', 'https://drive.google.com/uc?id=1g-XZNlrZHoI2Bbcy_Jr3Fypj51x6gSh-', NULL, 'admin', 'Rahasia', '$2y$10$zPv18UIEQP2vYA8hqXVRr.Pq09CCx9.JkCRG2QK8u9aO9H.i23KCC', '2023-07-06 01:41:41', '2023-08-02 05:03:42'),
(5, 'SMK-0001', 'Adit Kompressor', 'https://drive.google.com/uc?id=1dSB62dNkMBpYFj64Hc_gfE2wfvAj75Rg', 25, 'siswa', 'Laki-laki', '$2y$10$sE/WT4LFCk8I9kt1.BQzCeeE0JwwpNQau5QTzeW1lkFMEFNd1nbC.', '2023-07-06 21:26:28', '2023-07-25 01:44:16'),
(6, 'SMK-0002', 'Nayla Bilaiks', 'https://drive.google.com/uc?id=1RmUUDJLEkF6GKx4yoNN9tHt0IGvBCrH2', 6, 'siswa', 'Perempuan', '$2y$10$0iMUdX/xomgk.obWCvoqyOcghAtJUHn8Z0I2je7uyyp.G9vKRkwEG', '2023-07-06 21:32:18', '2023-07-23 21:15:32'),
(7, 'SMK-0003', 'Zaki Indomie', 'https://drive.google.com/uc?id=1Q7TyEdvDeWraNGgzfwOyC6XGwEsZ8iI-', 27, 'siswa', 'Laki-laki', '$2y$10$PjT2/mj6aJWnThWhLSfgN.jS3.9lnQlYoVxl4hWaXred8v8Ec1AL6', '2023-07-06 21:33:12', '2023-08-02 08:33:38'),
(8, 'SMK-0004', 'Ilham Penyu', 'https://drive.google.com/uc?id=1_JgzYxTywhJwQpn9p8baqwrkDetG3gPk', 14, 'siswa', 'Laki-laki', '$2y$10$v1xpzh1D.QRXRdKES7Deg.CkQmrYPYXKj8MK4aZ7cnfKv8vodXRVG', '2023-07-07 00:12:10', '2023-07-28 08:59:03'),
(10, 'SMK-0005', 'Friska Martabak', 'https://drive.google.com/uc?id=1Me7xJ5ek_6_WX-RuOaZYDldCWENZDPFv', 34, 'siswa', 'Perempuan', '$2y$10$S85ArHz2PQKqVj5xF0HqCOhyprJ8LXozQCFliqHnSlDU98X/ykaPq', '2023-07-07 01:27:38', '2023-07-25 00:31:44'),
(11, 'SMK-0006', 'Yanto Jawa', 'https://drive.google.com/uc?id=1m8YvaiFCRL93eMmWtrmNVa2pEWAIHcoR', 26, 'siswa', 'Laki-laki', '$2y$10$6UL.Vd1exFndiIcquxkuW.ffsiVG5fspRF8GdpJ36A1HWgYAFJglu', '2023-07-10 07:16:54', '2023-08-03 00:11:46'),
(12, 'SMK-0007', 'Yanti Anak Baik', 'https://drive.google.com/uc?id=1RcbiwziKHGRlPaz3M44rQ_wLIo_ZxHUZ', 30, 'siswa', 'Perempuan', '$2y$10$ZLzjmtoneRwRxnTTneJqJuKc1IzcNxXeLDzGSX1QRCZAs.Rg46qjy', '2023-07-10 07:17:56', '2023-07-25 06:40:17'),
(14, 'SMK-0009', 'Reza Kecap', 'https://drive.google.com/uc?id=1kYizuTz2Kfg2qdYxx_iiOPQzxjkuHjUk', 32, 'siswa', 'Laki-laki', '$2y$10$LDUCx0ld9BjGii6KE8XJH.2CQ4ioMQk2YmZEBcb2p7dr2E/akGlbK', '2023-07-11 08:02:52', '2023-08-06 01:14:48'),
(16, 'SMK-0010', 'Dimas Hotwill', 'https://drive.google.com/uc?id=1kJahZtYcCdUU95acXJ8jmdQMgTh12UKh', 26, 'siswa', 'Laki-laki', '$2y$10$f5sJWFTcMYyoGqQzwfAgHetQL60BNcBJ4SA71zA012TKlNAgdtiSO', '2023-07-11 08:17:13', '2023-08-07 05:16:42'),
(17, 'SMK-0011', 'Malika Kecap Putih', 'https://drive.google.com/uc?id=1ic0rS6TtEUPnn-1EyLrgQuIXI1gQAwoF', 3, 'siswa', 'Perempuan', '$2y$10$BXsDdnhkALH7nIJVFplp0.xO7hRjHbY1eBtzuuMQbuwEgsxtHcGLy', '2023-07-15 00:44:32', '2023-07-25 20:14:51'),
(18, 'SMK-0012', 'Farhan Kebab', 'https://drive.google.com/uc?id=1RmUUDJLEkF6GKx4yoNN9tHt0IGvBCrH2', 7, 'siswa', 'Laki-laki', '$2y$10$oYcT1ad8uzB2/.FZdWUfgectA/oaYSUG2pqchZ3BCmnuuVp3Bd8si', '2023-07-19 01:39:51', '2023-07-23 21:15:32'),
(19, 'SMK-0013', 'Chrono Bola', 'https://drive.google.com/uc?id=1OkNbE4DkEcc5JDpR1NF_jqsSBV7nMcuj', 12, 'siswa', 'Laki-laki', '$2y$10$FzgqvRb/1FkAx0h9hXXePuS1Ssx7rBNQbrusynnQzkJioscN1kD82', '2023-07-20 00:22:54', '2023-07-31 08:04:42'),
(20, 'SMK-0014', 'Slamet Kopling', 'https://drive.google.com/uc?id=13yDVoQbhVcJGaXe_b1eI0cmiRoi_ZGLy', 7, 'siswa', 'Laki-laki', '$2y$10$K5ZeSfgmQleeZGRQIYaguu3fxdXo0MvINYd7/rLmj0LHGyigzBMP6', '2023-07-22 00:55:15', '2023-07-31 08:58:16'),
(21, 'SMK-0015', 'Rian Batagor', 'https://drive.google.com/uc?id=1rTKA-b4fc_OcvRd3bbmcK4gOpJqkDzZD', 20, 'siswa', 'Laki-laki', '$2y$10$kKSoeHxI22UMy1YNJxAIJOtzVCycab38dxvlfkHvYee/IJ/j060Q.', '2023-07-24 00:35:58', '2023-07-28 09:00:38'),
(22, 'SMK-0016', 'Sogyo Mogyo', 'https://drive.google.com/uc?id=1TDRRVCi62Aw3jMurvtdPCzu7SE90HvoM', 22, 'siswa', 'Perempuan', '$2y$10$GHpUzNDF3oTU4q4ZraJxuOxenPLc8qryUu1c3R4mGgZe39EvJ63pa', '2023-07-28 09:15:03', '2023-07-29 00:38:55'),
(23, 'SMK-0017', 'Alok Aseli', 'https://drive.google.com/uc?id=1pcr90Rg8M5Dmoz_wnjwR0RWlP6lBpc9a', 26, 'siswa', 'Laki-laki', '$2y$10$74R5peDVWN9/JoLavve2YeQbnRupeORxItZ3Z5nMe.Gm62c4Fgo6u', '2023-07-30 10:09:49', '2023-07-30 10:10:36'),
(24, 'SMK-0018', 'Masbro Original', 'https://drive.google.com/uc?id=1hqxf1a0ITHUz-z6xk9Tb3HZegSr9FQk5', 25, 'siswa', 'Laki-laki', '$2y$10$rGka6wKLMsykGb.Z/OSMre.u95P25cPD10Mbj.wzVaR/rfI5ytSTW', '2023-08-01 08:55:31', '2023-08-01 08:59:11');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_user_id_foreign` (`user_id`),
  ADD KEY `candidates_event_id_foreign` (`event_id`);

--
-- Indeks untuk tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_event_id_foreign` (`event_id`),
  ADD KEY `results_candidate_id_foreign` (`candidate_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_kelas_id_foreign` (`kelas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT untuk tabel `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `candidates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_candidate_id_foreign` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`),
  ADD CONSTRAINT `results_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2020 pada 14.19
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `clubs_masters`
--

CREATE TABLE `clubs_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `clubs_masters`
--

INSERT INTO `clubs_masters` (`id`, `club_name`, `points`, `created_at`, `updated_at`) VALUES
(1, 'chelsie', 1, '2020-03-08 13:15:43', '2020-03-08 13:15:43'),
(2, 'man utd', 3, '2020-03-08 13:15:43', '2020-03-08 13:15:43'),
(3, 'liverpool', 1, '2020-03-08 13:15:43', '2020-03-08 13:15:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `match_clubs`
--

CREATE TABLE `match_clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `club_name_home_id` bigint(20) NOT NULL,
  `club_name_away_id` bigint(20) NOT NULL,
  `score_home` int(11) NOT NULL,
  `score_away` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `match_clubs`
--

INSERT INTO `match_clubs` (`id`, `club_name_home_id`, `club_name_away_id`, `score_home`, `score_away`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 3, '2020-03-08 13:15:43', '2020-03-08 13:15:43'),
(2, 1, 3, 1, 1, '2020-03-08 13:15:43', '2020-03-08 13:15:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2020_03_07_202258_create_match_clubs', 1),
(8, '2020_03_07_202410_create_club_masters', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `clubs_masters`
--
ALTER TABLE `clubs_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `match_clubs`
--
ALTER TABLE `match_clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `clubs_masters`
--
ALTER TABLE `clubs_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `match_clubs`
--
ALTER TABLE `match_clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

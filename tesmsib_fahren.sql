-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Agu 2024 pada 10.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tesmsib_fahren`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `referrer_id` int(11) DEFAULT NULL,
  `new_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `referrals`
--

INSERT INTO `referrals` (`id`, `referrer_id`, `new_user_id`) VALUES
(20, 67, 68),
(21, 68, 69),
(22, 67, 70),
(23, 67, 72),
(24, 67, 75),
(25, 82, 83),
(26, 84, 85),
(27, 84, 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `referral_code` varchar(10) NOT NULL,
  `points` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `referral_code`, `points`, `created_at`, `updated_at`) VALUES
(67, 'fahren', 'BDL84A20FC', 200, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(68, 'userfahren', 'F2WR9DY0NL', 100, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(69, 'usernyauserfahren', 'IKUZAYSP2B', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(70, 'userfahren2', 'DCWPHZ17KA', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(72, 'userfahren3', 'M6720O1PR5', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(75, 'userfahren4', 'G01TKM57IA', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(80, 'fahrenbaru', 'FKP3ANWLIG', 0, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(81, 'adim', 'ZKDGMNFUVB', 0, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(82, 'zaki', '8EHOWDGP4B', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(83, 'userzaki', 'E7VC0WGTNR', 50, '2024-08-18 08:33:55', '2024-08-18 08:35:41'),
(84, 'witri', 'GLZ7KVNTIR', 100, '2024-08-18 08:34:51', '2024-08-18 08:36:03'),
(85, 'userwitri', '5WNQ19EZT3', 50, '2024-08-18 08:35:06', '2024-08-18 08:35:41'),
(86, 'userwitri2', '26QX9RYKSC', 50, '2024-08-18 08:36:03', '2024-08-18 08:36:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrer_id` (`referrer_id`),
  ADD KEY `new_user_id` (`new_user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referral_code` (`referral_code`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `referrals`
--
ALTER TABLE `referrals`
  ADD CONSTRAINT `referrals_ibfk_1` FOREIGN KEY (`referrer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `referrals_ibfk_2` FOREIGN KEY (`new_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019 年 7 朁E30 日 09:43
-- サーバのバージョン： 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `color`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `colors`
--

CREATE TABLE `colors` (
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` int(11) NOT NULL,
  `color1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_div` int(11) NOT NULL,
  `hue_div` int(11) NOT NULL,
  `gradation` int(11) NOT NULL,
  `memo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_flg` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `colors`
--

INSERT INTO `colors` (`color_id`, `user_id`, `color_name`, `division`, `color1`, `color2`, `color3`, `color4`, `color5`, `color6`, `image_div`, `hue_div`, `gradation`, `memo`, `delete_flg`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'test2', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 3, 5, 0, NULL, 1, 'hiro', 'hiro', '2019-07-18 21:24:47', '2019-07-18 21:25:36'),
(2, 2, 'test2', 2, '#ffffff', '#ffffff', '#000000', '#000000', '#000000', '#000000', 10, 5, 0, NULL, 0, 'hiro', 'hiro', '2019-07-18 21:27:44', '2019-07-21 17:21:04'),
(3, 2, 'test3', 3, '#8000ff', '#008040', '#800000', '#666666', '#2a2a2a', '#000000', 4, 1, 1, NULL, 0, 'hiro', 'hiro', '2019-07-18 23:59:57', '2019-07-19 00:05:51'),
(4, 2, 'test5', 5, '#ff0000', '#0000ff', '#5be4e8', '#00ffff', '#8000ff', '#000000', 11, 2, 1, NULL, 0, 'hiro', 'hiro', '2019-07-19 00:01:39', '2019-07-19 00:05:06'),
(5, 2, 'test4', 6, '#ffffff', '#e3e3e3', '#a1a1a1', '#666666', '#2a2a2a', '#000000', 13, 6, 1, NULL, 0, 'hiro', 'hiro', '2019-07-19 00:03:14', '2019-07-19 00:03:14'),
(6, 2, 'test1', 4, '#32a37b', '#ffffff', '#00ff40', '#ff80ff', NULL, NULL, 6, 7, 0, NULL, 0, 'hiro', 'hiro', '2019-07-19 00:03:56', '2019-07-19 00:03:56'),
(7, 2, 'test8', 3, '#c60005', '#f89cc4', '#fdcecf', NULL, NULL, NULL, 1, 1, 0, '新規作成', 0, 'hiro', 'hiro', '2019-07-19 00:13:04', '2019-07-19 00:13:04'),
(8, 2, 'test55', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 11, 3, 1, NULL, 0, 'hiro', 'hiro', '2019-07-19 00:22:08', '2019-07-19 00:22:08'),
(9, 2, 'test44', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 11, 3, 1, NULL, 0, 'hiro', 'hiro', '2019-07-19 00:23:50', '2019-07-19 00:23:50'),
(10, 2, 'test7/22', 4, '#ff0080', '#ff00ff', '#faade7', '#ffd9fb', '#000000', '#000000', 10, 1, 1, NULL, 0, 'hiro', 'hiro', '2019-07-21 15:53:01', '2019-07-24 17:34:16'),
(11, 2, 'test7/22-2', 2, '#6be7cb', '#ffffff', NULL, NULL, NULL, NULL, 7, 2, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 16:05:29', '2019-07-21 16:05:29'),
(12, 2, 'test7/22-3', 5, '#4242df', '#80ffff', '#6ab5ff', '#3780d9', '#8000ff', '#000000', 11, 2, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 17:03:35', '2019-07-24 16:43:53'),
(13, 2, '私の色です', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 8, 5, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 17:52:58', '2019-07-21 17:52:58'),
(14, 2, '私の色です2', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 12, 5, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 17:53:43', '2019-07-21 17:53:43'),
(15, 2, '雨にも負けず風にも負けず雪にも夏の暑さにも負けぬ丈夫な体を', 2, '#ffffff', '#ffffff', '#000000', '#000000', '#000000', '#000000', 12, 5, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 17:54:37', '2019-07-22 17:30:34'),
(16, 2, '雨にも負けず風にも負けず雪にも夏の暑さにも', 3, '#80ff80', '#ff8000', '#804040', '#000000', '#000000', '#000000', 11, 5, 0, NULL, 0, 'hiro', 'hiro', '2019-07-21 17:55:02', '2019-07-24 17:14:08'),
(17, 2, 'new', 6, '#ff8040', '#00ffff', '#008040', '#0000ff', '#800040', '#8080c0', 10, 4, 0, NULL, 0, 'hiro', 'hiro', '2019-07-22 20:34:26', '2019-07-24 16:40:57'),
(18, 2, 'test88', 2, '#ff80c0', '#ff8080', '#000000', '#000000', '#000000', '#000000', 11, 3, 0, NULL, 0, 'hiro', 'hiro', '2019-07-22 21:27:38', '2019-07-24 16:42:40'),
(19, 10, 'color1', 2, '#000000', '#ffffff', NULL, NULL, NULL, NULL, 13, 6, 0, NULL, 0, 'testUser', 'testUser', '2019-07-23 00:01:54', '2019-07-23 00:01:54'),
(20, 10, 'color2', 3, '#100ca9', '#ffffff', '#de0e13', NULL, NULL, NULL, 5, 4, 0, NULL, 1, 'testUser', 'testUser', '2019-07-23 00:05:53', '2019-07-23 00:11:05'),
(21, 10, 'color3', 4, '#00ff00', '#0080c0', '#ffffff', '#80ffff', NULL, NULL, 7, 2, 0, NULL, 1, 'testUser', 'testUser', '2019-07-23 00:08:51', '2019-07-23 00:11:01'),
(22, 10, 'color4', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 8, 3, 0, NULL, 1, 'testUser', 'testUser', '2019-07-23 00:10:41', '2019-07-23 00:10:55'),
(23, 10, 'color2', 3, '#cb070d', '#ffffff', '#5035cc', '#000000', '#000000', '#000000', 5, 4, 0, NULL, 0, 'testUser', 'testUser', '2019-07-23 00:11:23', '2019-07-25 01:06:15'),
(24, 10, 'color3', 4, '#a4a01e', '#1a5e24', '#63511b', '#311717', '#000000', '#000000', 8, 1, 0, NULL, 0, 'testUser', 'testUser', '2019-07-23 00:12:29', '2019-07-25 01:17:37'),
(25, 5, 'test1', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 11, 6, 0, NULL, 0, 'サトウのごはん', 'サトウのごはん', '2019-07-23 00:13:40', '2019-07-23 00:13:40'),
(26, 11, 'test7/18', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 12, 3, 0, NULL, 0, 'ttt', 'ttt', '2019-07-23 00:16:56', '2019-07-23 00:16:56'),
(27, 2, '私の色です5', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 9, 5, 0, NULL, 1, 'hiro', 'hiro', '2019-07-24 17:33:46', '2019-07-24 17:35:48'),
(28, 2, '私の色です5', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 11, 4, 0, NULL, 0, 'hiro', 'hiro', '2019-07-24 17:36:13', '2019-07-24 17:36:13'),
(29, 10, 'color4', 5, '#cafdfc', '#fedafe', '#f8fcbe', '#f980f9', '#696ce9', NULL, 1, 4, 0, NULL, 0, 'testUser', 'testUser', '2019-07-25 01:09:42', '2019-07-25 01:09:42'),
(30, 10, 'color5', 6, '#033700', '#057300', '#09b300', '#0dfd00', '#5eff55', '#a5ff9f', 4, 3, 0, NULL, 0, 'testUser', 'testUser', '2019-07-25 01:12:13', '2019-07-25 22:29:28'),
(31, 10, 'てｓてｓ', 2, '#ffffff', '#ffffff', NULL, NULL, NULL, NULL, 8, 3, 0, NULL, 1, 'testUser', 'testUser', '2019-07-25 22:24:10', '2019-07-25 22:24:17'),
(32, 10, 'メルヘン', 6, '#89edf8', '#fecec9', '#f4d0e8', '#bafee7', '#a5ff9f', '#e3e3e3', 1, 4, 0, '十代の女子向け\r\nゆめかわいい', 0, 'testUser', 'testUser', '2019-07-28 23:02:43', '2019-07-28 23:02:43');

-- --------------------------------------------------------

--
-- テーブルの構造 `hues`
--

CREATE TABLE `hues` (
  `hue_div` int(11) NOT NULL,
  `hue_word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_flg` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `hues`
--

INSERT INTO `hues` (`hue_div`, `hue_word`, `delete_flg`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '暖色系', 0, '', '', NULL, NULL),
(2, '寒色系', 0, '', '', NULL, NULL),
(3, '中間色', 0, '', '', NULL, NULL),
(4, '対照色', 0, '', '', NULL, NULL),
(5, '補色', 0, '', '', NULL, NULL),
(6, 'モノトーン', 0, '', '', NULL, NULL),
(7, 'カラフル', 0, '', '', NULL, NULL),
(8, 'その他', 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `images`
--

CREATE TABLE `images` (
  `image_div` int(11) NOT NULL,
  `image_word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_flg` int(11) NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `images`
--

INSERT INTO `images` (`image_div`, `image_word`, `delete_flg`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'かわいい', 0, '', '', NULL, NULL),
(2, '楽しい', 0, '', '', NULL, NULL),
(3, '格好良い', 0, '', '', NULL, NULL),
(4, '落ち着いた', 0, '', '', NULL, NULL),
(5, 'オシャレ', 0, '', '', NULL, NULL),
(6, '美味しそう', 0, '', '', NULL, NULL),
(7, '清潔感', 0, '', '', NULL, NULL),
(8, 'ナチュラル', 0, '', '', NULL, NULL),
(9, '高級', 0, '', '', NULL, NULL),
(10, '和風', 0, '', '', NULL, NULL),
(11, 'スポーティ', 0, '', '', NULL, NULL),
(12, 'エレガント', 0, '', '', NULL, NULL),
(13, 'その他', 0, '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_04_051915_create_mst_image_table', 1),
(4, '2019_07_04_052235_create_mst_hue_table', 1),
(5, '2019_07_04_053129_create_colors_table', 1),
(6, '2019_07_04_054745_create_colors_table', 2),
(7, '2019_07_05_042716_create_color_table', 3),
(8, '2019_07_05_043658_create_image_table', 4),
(9, '2019_07_05_043724_create_hue_table', 4),
(10, '2019_07_05_050022_create_color_table', 5),
(11, '2019_07_19_061727_create_dolor_table', 6),
(12, '2019_07_19_062343_create_color_table', 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hiro@hiro', '$2y$10$8u8LpgI6.KvbHBDo2GzKg.pv6mgblXbvUgvt8hpJx4iZ6cSCwkNra', '2019-07-22 16:08:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saito', 'saito@satio', NULL, '$2y$10$nb8gQ44JZGqvSyZbbP0BheMN7ytxcEpxZ.NXv71x/N85ink/Lrrqa', NULL, '2019-07-03 20:58:12', '2019-07-03 20:58:12'),
(2, 'hiro', 'hiro@hiro', NULL, '$2y$10$VCwg1c1BbqQSQbKlk.ncheKcjFxzbq5PbWhuY/9ykMn2EOUyXtkAa', NULL, '2019-07-08 00:08:49', '2019-07-08 00:08:49'),
(3, '涼香', 'suzuka@suzuka', NULL, '$2y$10$V2XVmE5D4494kOfLs1Jes.Bb5MKgVAHOaSOG2u.5P7XMJ5K1E9YcK', NULL, '2019-07-16 17:54:05', '2019-07-16 17:54:05'),
(4, 'はむ', 'hamu@hamu', NULL, '$2y$10$Wvx0Z3PY7zryEILhD5ex2uA0vBVdKGtC9eZLgS10ScDoBzn4cYJ3.', NULL, '2019-07-16 18:45:55', '2019-07-16 18:45:55'),
(5, 'サトウのごはん', 'sato@gohan', NULL, '$2y$10$hf5FmFnjYUDml4SACDzOJuhjuhOHJpv5KQHH15ndtR84tuJeutgUe', NULL, '2019-07-16 19:16:10', '2019-07-16 19:16:10'),
(6, '鈴木オート', 'suzuki@auto', NULL, '$2y$10$1PVhHsYzT2XYzjrCkzGxwevYQRAcxpgShKQ7bJfLuROxL9Bu.0U8.', NULL, '2019-07-16 20:41:34', '2019-07-16 20:41:34'),
(7, '洋服の青山', 'youhuku@aoyama', NULL, '$2y$10$Jj4hlWX/WpNo5gO6xekYue.DM7BJcY4htRB4rmHpjgG/Xw8Qu76Jq', NULL, '2019-07-16 20:49:38', '2019-07-16 20:49:38'),
(8, 'タケモトピアノ', 'takemoto@piano', NULL, '$2y$10$bu37JIOfoSzYcNWdMvgT8OD1uqDKgyODpF5WrGoEoyaJ.T.zX58vC', NULL, '2019-07-16 20:57:29', '2019-07-16 20:57:29'),
(9, '赤城乳業', 'akagi@nyugyo', NULL, '$2y$10$FLhpB2v7ou0hgJXfWlr/FOTPwiwDrYADD7Ik9forUIOEmXLdetgRK', NULL, '2019-07-16 21:01:58', '2019-07-16 21:01:58'),
(10, 'testUser', 'test@mail', NULL, '$2y$10$Jy1KV.wvhzL/8vzQgSY8V.M.qj2yHAwxGTtm4Fac9zJef3tJpuGcy', NULL, '2019-07-22 23:42:59', '2019-07-22 23:42:59'),
(11, 'ttt', 'tt@tt', NULL, '$2y$10$DzcPpD90GgeP6cHm41X4ku6R23H6Q1kpdhCBFmrzieo66PwEtxx7m', NULL, '2019-07-23 00:16:45', '2019-07-23 00:16:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`),
  ADD KEY `colors_image_div_foreign` (`image_div`),
  ADD KEY `colors_hue_div_foreign` (`hue_div`);

--
-- Indexes for table `hues`
--
ALTER TABLE `hues`
  ADD PRIMARY KEY (`hue_div`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_div`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_hue_div_foreign` FOREIGN KEY (`hue_div`) REFERENCES `hues` (`hue_div`),
  ADD CONSTRAINT `colors_image_div_foreign` FOREIGN KEY (`image_div`) REFERENCES `images` (`image_div`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

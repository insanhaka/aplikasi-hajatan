-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2021 pada 07.22
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajatan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fake_invitations`
--

CREATE TABLE `fake_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `man_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `man_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `man_parentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `man_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `women_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `women_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `women_parentname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `women_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couple_photo_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couple_photo_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_greeting` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_greeting` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `akad_time` date NOT NULL,
  `akad_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resepsi_time` date NOT NULL,
  `resepsi_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sales_status` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feature_package`
--

CREATE TABLE `feature_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invitation_themes`
--

CREATE TABLE `invitation_themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invitation_themes`
--

INSERT INTO `invitation_themes` (`id`, `name`, `code`, `thumbnail`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Test Undangan Satu', 'HJT-001', '1633055831_default-image.jpg', 'SAdmin', NULL, '2021-10-01 02:37:11', '2021-10-01 02:37:11'),
(2, 'Test Undangan Dua', 'HJT-002', '1633058027_default-image.jpg', 'SAdmin', 'SAdmin', '2021-10-01 03:13:47', '2021-10-01 04:12:26'),
(4, 'Test Undangan Tiga', 'HJT-003', '1633072221_default-image.jpg', 'SAdmin', NULL, '2021-10-01 07:10:21', '2021-10-01 07:10:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `name`, `uri`, `icon`, `type`, `parent_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pengguna', 'pengguna', '1632183150_userr.png', 'primary', NULL, 1, '2021-09-21 00:12:30', '2021-09-21 00:12:30'),
(2, 'Tema Undangan', 'tema-undangan', '1633071968_letter.png', 'primary', NULL, 1, '2021-10-01 01:50:54', '2021-10-01 07:06:08'),
(3, 'Contoh Undangan', 'contoh-undangan', '1633071859_portfolio.png', 'primary', NULL, 1, '2021-10-01 07:04:19', '2021-10-03 06:20:33'),
(4, 'Package', 'package', '1635826121_package.png', 'primary', NULL, 1, '2021-11-02 04:08:41', '2021-11-02 04:08:41'),
(5, 'Feature', 'feature', '1635826224_to-do-list.png', 'primary', NULL, 1, '2021-11-02 04:10:24', '2021-11-02 04:10:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_09_18_131535_create_permission_tables', 1),
(10, '2020_09_19_002404_create_rolesid_to_users_table', 1),
(11, '2020_09_22_152121_create_menus_table', 1),
(12, '2020_09_25_113001_create_menusid_to_permission_table', 1),
(13, '2021_10_01_064413_create_invitation_themes_table', 2),
(14, '2021_10_01_073349_create_fake_invitations_table', 3),
(15, '2021_10_16_221048_create_google_users_table', 4),
(16, '2021_10_23_102103_create_packages_table', 5),
(17, '2021_10_23_104411_create_package_features_table', 5),
(18, '2021_10_23_140517_create_feature_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02eef55df53374b2d0f02f2a957265b9e90de218eada910ada6777521d9390b92a2ee2eab6bfdade', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:56', '2021-09-26 01:25:56', '2022-09-26 08:25:56'),
('063003583d4d413bfa0c1954dd7e04da4288992ced0afae31d7a3b1d9755726b05924c90ee41b772', 8, 1, 'Token Name', '[]', 0, '2021-10-21 23:06:54', '2021-10-21 23:06:54', '2022-10-22 06:06:54'),
('06c24c14dc33340d9fa771648f70846c86e2e21d2030011d4fcd97863577cfb94b8a7dfaf7453185', 1, 1, 'Token Name', '[]', 0, '2021-09-26 03:05:22', '2021-09-26 03:05:22', '2022-09-26 10:05:22'),
('0d0dc1e6d1badf267b8302eb14afda58d9514be6224383a23365f7b2555ecd918053354a5dfcdac3', 3, 1, 'Token Name', '[]', 0, '2021-09-27 00:40:15', '2021-09-27 00:40:15', '2022-09-27 07:40:15'),
('0f4d708119d4b27f3f623c2028f7f401aad1bb05069dc1c932845ab26a60f02bb131371343d01b72', 8, 1, 'Token Name', '[]', 0, '2021-10-19 07:41:22', '2021-10-19 07:41:22', '2022-10-19 14:41:22'),
('162aa044a29e4cdc96f84a1288d4e4837f3facaaa733d1934980287aec843d2d4ba546422c04ccbc', 7, 1, 'Token Name', '[]', 0, '2021-10-14 07:50:10', '2021-10-14 07:50:10', '2022-10-14 14:50:10'),
('17284a657cf9aab3cb05beff506c4fe8e329c6de1047cfcfdf515173238daa4ab0df41258c37aa4e', 7, 1, 'Token Name', '[]', 0, '2021-09-27 04:50:58', '2021-09-27 04:50:58', '2022-09-27 11:50:58'),
('187fdf35a5f3228f544e90f11258f8ae725ac5eeb88db82d99ee9bb59fdc97e55bcbb374002c7150', 7, 1, 'Token Name', '[]', 0, '2021-10-03 00:36:37', '2021-10-03 00:36:37', '2022-10-03 07:36:37'),
('1ae2e444e1211171fde9cb08e27787180d2c4011f482859f9b61bfc52eea2cb8a92ec3b5299c4ce2', 7, 1, 'Token Name', '[]', 0, '2021-09-27 10:33:52', '2021-09-27 10:33:52', '2022-09-27 17:33:52'),
('1c63b0e580885704e7baa497c8fec1cbd7edcf3c7ef2b57078b7addf7d67737160c87476662708f9', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:20', '2021-09-26 01:25:20', '2022-09-26 08:25:20'),
('1fa92544be657c75e844ab7ca1e14314731c694ac50c90298cb99972be82b7fdefee92312ba19b32', 7, 1, 'Token Name', '[]', 0, '2021-10-17 11:24:54', '2021-10-17 11:24:54', '2022-10-17 18:24:54'),
('20489593ed5d1ef47fe65e532a358778e00280b9121830c67e9c17afb1e5d5975c9dfc2dd4659000', 7, 1, 'Token Name', '[]', 0, '2021-10-10 02:33:53', '2021-10-10 02:33:53', '2022-10-10 09:33:53'),
('20cb69e69e335c7e91afe8c798d6f44294373aa3818faef361534ecb612427e3f5666467a003acf7', 8, 1, 'Token Name', '[]', 0, '2021-10-23 03:17:12', '2021-10-23 03:17:12', '2022-10-23 10:17:12'),
('20f57ce723d1e2856b391e102f629e624522c3996a73d9c8c272785ad2f0548310fdfe74f638841a', 7, 1, 'Token Name', '[]', 0, '2021-10-01 07:22:03', '2021-10-01 07:22:03', '2022-10-01 14:22:03'),
('24d80d1e74c81ff0ebe4fdd11a4e61617664101fe347b0d91941ff39509a974ac562f222df79461f', 7, 1, 'Token Name', '[]', 0, '2021-10-13 00:23:00', '2021-10-13 00:23:00', '2022-10-13 07:23:00'),
('25ad71a1e8ca73a1ff3a5ba80343cb3bde96ee5a7cd2249e6e6a090099fc9033e48846dab2004247', 7, 1, 'Token Name', '[]', 0, '2021-09-29 01:03:21', '2021-09-29 01:03:21', '2022-09-29 08:03:21'),
('32ef612162c1605a1f9abf91e1be3d6844e5cfc209e1b51c7a3753c214e08471f5b226f446e6dc81', 1, 1, 'Token Name', '[]', 0, '2021-09-26 02:48:15', '2021-09-26 02:48:15', '2022-09-26 09:48:15'),
('3343ae460ba2513715ee3f4d9ac64d7dc741844b125cb5a14df3a7c4839bc9efbf347d78cb606eea', 7, 1, 'Token Name', '[]', 0, '2021-10-19 10:13:41', '2021-10-19 10:13:41', '2022-10-19 17:13:41'),
('337f4f542c150a55833f99d7f6e18e197735700c5edef6a223d1efe95148d39d0a46f247db91c5c0', 3, 1, 'Token Name', '[]', 0, '2021-09-27 04:29:56', '2021-09-27 04:29:56', '2022-09-27 11:29:56'),
('37bdb7764ddd8e3fc55294e34c5a0706a63bdd496a74bf30f0985c59cb0b87d877dac78ded4291f0', 7, 1, 'Token Name', '[]', 0, '2021-10-16 02:42:59', '2021-10-16 02:42:59', '2022-10-16 09:42:59'),
('3945559ec6416b57d0813456288135b55237b2b974748ea18cdb00c862b1ef6f974e5f50cb128fc4', 1, 1, 'Token Name', '[]', 0, '2021-09-27 01:53:39', '2021-09-27 01:53:39', '2022-09-27 08:53:39'),
('3e0f167688488d2a40f0b6c03822e3e9087b33fb43f9617ddf1ace40f92e538ad785b2cc27509d9e', 7, 1, 'Token Name', '[]', 0, '2021-10-04 09:17:03', '2021-10-04 09:17:03', '2022-10-04 16:17:03'),
('4178b9253cad5b33563a8588365687a9e1449f3e59f0cf9e985d9faf14aab18f18914a9d8d3bd810', 1, 1, 'Token Name', '[]', 0, '2021-09-25 16:07:18', '2021-09-25 16:07:18', '2022-09-25 23:07:18'),
('454cb6b82c10930476a394c23daa6a806c816ab0a473262b4bb1498456caedfba9809e81cad8ea8c', 7, 1, 'Token Name', '[]', 0, '2021-10-19 10:13:07', '2021-10-19 10:13:07', '2022-10-19 17:13:07'),
('4623d5813cdfe629b0f19866080e782dac8c5de223ce547549f58a9b2d800b46defc850310061747', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:03', '2021-09-26 01:25:03', '2022-09-26 08:25:03'),
('464b8ab1f53897e2709fdba049c3a76561050b02940359c060ff38d41bb8b59d35753009d125d1e3', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:36', '2021-09-26 01:25:36', '2022-09-26 08:25:36'),
('46c3fc532c16b16b782731af016f74bccca892a0be0b66dec2bf283bc4dc7a3281c7a725607a71fb', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:44', '2021-09-26 01:25:44', '2022-09-26 08:25:44'),
('479a52886ac618a4edf8a90c6bb6cfb8c353d89331737a341bc66a7608a3c2e5f49cd46b6473ba8a', 7, 1, 'Token Name', '[]', 0, '2021-10-18 23:50:14', '2021-10-18 23:50:14', '2022-10-19 06:50:14'),
('527a2c4957c1f31cec0e1a4f7a1060622cd67d2e35dcffab14a15a2c1aeb2025b2c22d2f6e3ccbc6', 7, 1, 'Token Name', '[]', 0, '2021-10-13 13:44:49', '2021-10-13 13:44:49', '2022-10-13 20:44:49'),
('54029d03b8b91b0c84bc6adb9cad614d9e51b49f1947d2ef3d1d11a2bf239e0512dd3141a0ed9d37', 7, 1, 'Token Name', '[]', 0, '2021-09-29 01:14:36', '2021-09-29 01:14:36', '2022-09-29 08:14:36'),
('5f695c699a61ba09120955939fc51816fe19663a22dd746e729bd33050783a37f4c5d27498dfaaa6', 7, 1, 'Token Name', '[]', 0, '2021-10-12 07:17:47', '2021-10-12 07:17:47', '2022-10-12 14:17:47'),
('6169a308edc60d23baa1e486673ae5aecc6c3be5186995389fbd65bfb71d6fe691c12e60f30c0e9b', 7, 1, 'Token Name', '[]', 0, '2021-10-06 04:49:36', '2021-10-06 04:49:36', '2022-10-06 11:49:36'),
('640326089e31075f7d41290c1055c255c31b528aeb9a8621f181c2cb981f36531499043150c3a411', 7, 1, 'Token Name', '[]', 0, '2021-10-09 20:03:31', '2021-10-09 20:03:31', '2022-10-10 03:03:31'),
('697a06cb35a58c4b27e54fddb691ae336b8648106363a59982d66d521ad754af86b732c2e9802757', 3, 1, 'Token Name', '[]', 0, '2021-09-27 04:10:12', '2021-09-27 04:10:12', '2022-09-27 11:10:12'),
('6a0a2531761a7a0f3d60f8efcc058bd6f102853dce1080bc5135fa23b87e238f710f16ed888ce70a', 7, 1, 'Token Name', '[]', 0, '2021-10-19 00:02:25', '2021-10-19 00:02:25', '2022-10-19 07:02:25'),
('6e966cd5614e1b838963b9258f1cc5e496578de5d349c53da43cc0300a2142871ecdc55c3a31d471', 7, 1, 'Token Name', '[]', 0, '2021-10-13 04:02:19', '2021-10-13 04:02:19', '2022-10-13 11:02:19'),
('6eb14c8c64469f95e23f87295e03850cf8a671fb8e344a58be5c3d4a0e7ed632c6d0db349e804001', 1, 1, 'Token Name', '[]', 0, '2021-09-25 13:25:25', '2021-09-25 13:25:25', '2022-09-25 20:25:25'),
('6f5195630b32520a85908f0041bd1da872d7e0684f32451423d9f93303e037e85996f9a9e835fef3', 1, 1, 'Token Name', '[]', 0, '2021-09-25 13:02:45', '2021-09-25 13:02:45', '2022-09-25 20:02:45'),
('718dc2b0c518e7c3e54de17feeea180c90e29118dac03fa13580f88dcc10b8b69c0d311e56087668', 7, 1, 'Token Name', '[]', 0, '2021-10-18 23:54:29', '2021-10-18 23:54:29', '2022-10-19 06:54:29'),
('7221d7419f91c6f6b83aee2813d5776ef882c7ebfd444d39cd4743de6b51fdb3918ba78d79c34174', 7, 1, 'Token Name', '[]', 0, '2021-10-16 13:02:54', '2021-10-16 13:02:54', '2022-10-16 20:02:54'),
('74a17b3751e6bd6f88e58448e1c06d13ab9d15733ea63f684bc7866136bf1478d4e0f0b84bf3fd19', 7, 1, 'Token Name', '[]', 0, '2021-10-19 00:11:27', '2021-10-19 00:11:27', '2022-10-19 07:11:27'),
('7705dca14ae1471a740824e55e7d4b37342a1b5756f4ad1e38c26b3322c55d480d484a31696daee3', 1, 1, 'Token Name', '[]', 0, '2021-09-25 16:00:40', '2021-09-25 16:00:40', '2022-09-25 23:00:40'),
('78b112354577f532a246c0545a1e8fb5ac26693b4fba90c318eb64e84e22f87e46385d21c169fead', 7, 1, 'Token Name', '[]', 0, '2021-10-19 00:32:08', '2021-10-19 00:32:08', '2022-10-19 07:32:08'),
('7c784ccad7fd375c5a64c20f4dc90e0c049a60335a8663c324a4c9582c18f9dacb0bc4c5bd99d6be', 7, 1, 'Token Name', '[]', 0, '2021-10-03 02:52:53', '2021-10-03 02:52:53', '2022-10-03 09:52:53'),
('7cf04757e8e61fc1a12ecf1642eb9f11af68f980ab02f45b2c6f70b47dc9bd4cd1422cc04342cd4d', 3, 1, 'Token Name', '[]', 0, '2021-09-27 01:25:13', '2021-09-27 01:25:13', '2022-09-27 08:25:13'),
('7d648184d6adbabecaa31f65a781604d1de4ed37e2c3a61f932c636d0586d83abfd0629e514cd608', 1, 1, 'Token Name', '[]', 0, '2021-09-26 03:04:37', '2021-09-26 03:04:37', '2022-09-26 10:04:37'),
('7e6e4f7d3d7e83dbe9b8cba4725edad172ce5520f03c42e6005588f692612328ecf5341a5cd3f0d6', 1, 1, 'Token Name', '[]', 0, '2021-09-25 16:04:29', '2021-09-25 16:04:29', '2022-09-25 23:04:29'),
('7f18063c8dc09e399ddb7aef03a4d946addce178e69bf897138b995b19619938c8c3fdd2a05b09b6', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:26:44', '2021-09-26 01:26:44', '2022-09-26 08:26:44'),
('7fb4bc4f81d13a6caab1da7d877f7cc43b32957afffbe025a2991f48e56bd1ae826b122df20dbb6f', 1, 1, 'Token Name', '[]', 0, '2021-09-26 13:51:34', '2021-09-26 13:51:34', '2022-09-26 20:51:34'),
('804ed717daf4e7421b244e472cbaccaf6e025226b569fe0e2e16a0f0899db6305e7a463f129cbb1a', 1, 1, 'Token Name', '[]', 0, '2021-09-26 02:15:39', '2021-09-26 02:15:39', '2022-09-26 09:15:39'),
('82b0ef74d978aa44b0643f78fea8e4877bc87701671ad1f9d2eeb80d1d40c99f26361c0d1c742a3d', 1, 1, 'Token Name', '[]', 0, '2021-09-25 16:05:07', '2021-09-25 16:05:07', '2022-09-25 23:05:07'),
('82c4bdfcd58ef253f502e5ba0bbdae3a249410bf5c8308d0d2d6a55e78ee977185134efdf3b9e71a', 7, 1, 'Token Name', '[]', 0, '2021-10-19 08:03:09', '2021-10-19 08:03:09', '2022-10-19 15:03:09'),
('85bd0a60e1f81130a64afb0b2b5b5ceadf12faf1873a878b8974e1897c891bdea22786298cb32227', 7, 1, 'Token Name', '[]', 0, '2021-10-07 09:43:42', '2021-10-07 09:43:42', '2022-10-07 16:43:42'),
('87e6c5585a39d348db9398e1cda9da0cd7834ed86f9fe15904a4f1dc3e43666111ec69f072278f99', 7, 1, 'Token Name', '[]', 0, '2021-10-18 23:57:16', '2021-10-18 23:57:16', '2022-10-19 06:57:16'),
('897c02615962d1d42b203c8d89e2d78458d0dfdfc60c8d58965001f1e61ed26aeafdbdd62ddcd40b', 3, 1, 'Token Name', '[]', 0, '2021-09-27 00:41:54', '2021-09-27 00:41:54', '2022-09-27 07:41:54'),
('8b00d763cd8a3c3b5d6b814719e9161355d944cdc9be55f26d92ef2666d8176362b7a5bf56d9cefd', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:31:32', '2021-09-26 01:31:32', '2022-09-26 08:31:32'),
('8b947abce063b211bcfdbb6cb442a08f86f0f706b6ffcbee5983f1f81662dc29ffe9cd4b9df1491b', 3, 1, 'Token Name', '[]', 0, '2021-09-27 00:39:10', '2021-09-27 00:39:10', '2022-09-27 07:39:10'),
('8cb3c724529ceeedc03a2615e9a3e381729592d9c0e8f1aa45655ca8434b9d1e715b9514ba668e2f', 7, 1, 'Token Name', '[]', 0, '2021-10-01 07:14:15', '2021-10-01 07:14:15', '2022-10-01 14:14:15'),
('9002b516a8dc748483ee772f442afb04fc356a15115e8568b12fa4255bdf8390e70bb6e2707f997e', 7, 1, 'Token Name', '[]', 0, '2021-09-27 07:37:48', '2021-09-27 07:37:48', '2022-09-27 14:37:48'),
('926e4854eb00c1026a5664c087a04dbe15cb75fe0b8da13794d1a75e7615e0a170130b9e88d3749c', 7, 1, 'Token Name', '[]', 0, '2021-09-29 01:52:53', '2021-09-29 01:52:53', '2022-09-29 08:52:53'),
('927d8f274c9c296a87e8c0e7269ee7a2d572e8932c3f70a6fcf5528ee6a72aba5b6bee0cf67885d5', 7, 1, 'Token Name', '[]', 0, '2021-10-03 03:11:18', '2021-10-03 03:11:18', '2022-10-03 10:11:18'),
('92910b17d93a699d4418010f6780d18c10b02582bb7d13c9a68eef68936fe5baaab732fc8f59e8f8', 1, 1, 'Token Name', '[]', 0, '2021-09-26 13:50:37', '2021-09-26 13:50:37', '2022-09-26 20:50:37'),
('92f8de4b4433b6990db2b8ad52ab7c11386b57002a2da4b4a804fcdd8b7e1a815add3ef3cef283ae', 3, 1, 'Token Name', '[]', 0, '2021-09-27 02:35:48', '2021-09-27 02:35:48', '2022-09-27 09:35:48'),
('979a403a16726f91e5653e379b8d93c139133816020369f415d778dfbded04e59711f875934250fc', NULL, 1, 'Token Name', '[]', 0, '2021-10-19 00:37:48', '2021-10-19 00:37:48', '2022-10-19 07:37:48'),
('97b58576c4bed3ae1a8fc2a432c773a9d7b499345fffc38d567d7c36d33a640c6dba82e5a9123404', 7, 1, 'Token Name', '[]', 0, '2021-10-14 06:52:48', '2021-10-14 06:52:48', '2022-10-14 13:52:48'),
('99cd966fd7491841e151b5c372bc4d5188fb25032b9d2eba4a330fe01f8344929702b3577ee2cd5a', 3, 1, 'Token Name', '[]', 0, '2021-09-27 01:40:54', '2021-09-27 01:40:54', '2022-09-27 08:40:54'),
('9bd0ac83ab8e3f0fa852ddb1a0ecc7027709d669ddd1d379306c4bd60b37290b88713d3931a703f0', 7, 1, 'Token Name', '[]', 0, '2021-09-27 09:46:07', '2021-09-27 09:46:07', '2022-09-27 16:46:07'),
('9c7ed998a79d35c36ef110d2dba730bd2e1a7ea48d49f2c162eba9f3738b0d1fa14934680a0dfcb2', 7, 1, 'Token Name', '[]', 0, '2021-10-17 02:13:43', '2021-10-17 02:13:43', '2022-10-17 09:13:43'),
('a086661df9e0b37b97c903db575c468e2d9b21e036d8afb8eb0d4abdd358e3ef64aae75fc5052609', 3, 1, 'Token Name', '[]', 0, '2021-09-27 01:44:17', '2021-09-27 01:44:17', '2022-09-27 08:44:17'),
('a313a17e735aa079a9510734a40fdde36372f8ce1b64889ed70496c5da48b0b7cf042e45de65bc20', 1, 1, 'Token Name', '[]', 0, '2021-09-26 03:16:16', '2021-09-26 03:16:16', '2022-09-26 10:16:16'),
('a5fecad1de0264a391791497ceb8ceb530db5fc5c685e5a51adab16a3e12f6e5e9fdea09fc9e4375', 7, 1, 'Token Name', '[]', 0, '2021-10-20 09:40:29', '2021-10-20 09:40:29', '2022-10-20 16:40:29'),
('a681a3e5e56b3da8b4b9a8e64ea160e171d662a41d1f8c2afd59227fe617e91b2aaacb958b9473cc', 7, 1, 'Token Name', '[]', 0, '2021-09-27 07:32:00', '2021-09-27 07:32:00', '2022-09-27 14:32:00'),
('a8ab87f2dc47261d71d10d705473ec5f838b2df6a8b517052192e0f16611134015fcd8a247c610ae', 7, 1, 'Token Name', '[]', 0, '2021-09-28 16:19:34', '2021-09-28 16:19:34', '2022-09-28 23:19:34'),
('a97c51caa3d30e04c89df36665006b759410e5136e62156bd28b66573b1d48c108b1b31867b876e9', 7, 1, 'Token Name', '[]', 0, '2021-10-07 09:41:19', '2021-10-07 09:41:19', '2022-10-07 16:41:19'),
('b26dd2622bd1f63c7f56f2f077e4d1de98bb5446b87da36b327aa06ae98ce0c505379fd1df145b26', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:51', '2021-09-26 01:25:51', '2022-09-26 08:25:51'),
('b3c050bc871355e00a203778f043b43978d848516fd34ce63ddd0b7341312e0c93e9f46431549474', 8, 1, 'Token Name', '[]', 0, '2021-10-21 23:05:27', '2021-10-21 23:05:27', '2022-10-22 06:05:27'),
('b65094c7aba89da5d2da5c60c03c38d4ff2533e54d0a158bba634d59ba0b7ef52b4c44e970d69132', 7, 1, 'Token Name', '[]', 0, '2021-10-01 08:11:24', '2021-10-01 08:11:24', '2022-10-01 15:11:24'),
('b6afcfb65e213e2e114a39f62fd2bd325f3bc05691a6aab48a97f4408a337ba0ee658bd4af76730c', 8, 1, 'Token Name', '[]', 0, '2021-10-21 23:39:24', '2021-10-21 23:39:24', '2022-10-22 06:39:24'),
('bdaf4b0e3ebc6caebcb3e8b94432dc978665e260886e1f8d50e751d7daebfa243564213477ae2d20', 7, 1, 'Token Name', '[]', 0, '2021-10-03 00:37:29', '2021-10-03 00:37:29', '2022-10-03 07:37:29'),
('bde1ed4d0ed597ccf6f74a8959e3e8a339fd7642e4b47a41d376c518b1b5db940de41632098d1299', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:26:48', '2021-09-26 01:26:48', '2022-09-26 08:26:48'),
('bead8107d769588730cc788a62ff0c8f84f7b900fa91148f4b9719d67404e8b439ff4180ebcb5b4a', 1, 1, 'Token Name', '[]', 0, '2021-09-25 16:07:31', '2021-09-25 16:07:31', '2022-09-25 23:07:31'),
('bfe34a40809e4bf88d3756ecad6663cfe02b8fd9148248561ab7a8ef18d6e0db71983c0d7a92c2b2', 7, 1, 'Token Name', '[]', 0, '2021-10-09 23:57:32', '2021-10-09 23:57:32', '2022-10-10 06:57:32'),
('c00c287b171151d9e15c50363cf67ef2a044938f5152124c549886bea7dfce64193d14f4d046b7d3', 1, 1, 'Token Name', '[]', 0, '2021-09-25 13:27:31', '2021-09-25 13:27:31', '2022-09-25 20:27:31'),
('c0fa8b5e379e670d3aa8ebe4fdb17798741a4776f8ef1f15c7516f573f18e7da3193fa93b5500fe0', 7, 1, 'Token Name', '[]', 0, '2021-10-14 06:52:27', '2021-10-14 06:52:27', '2022-10-14 13:52:27'),
('c51b9d797c260426024e8bfc2aa9f9817d44ce91ba02c422f66fc278d5e9c55951f8986bf8a2f78a', 3, 1, 'Token Name', '[]', 0, '2021-09-27 00:46:14', '2021-09-27 00:46:14', '2022-09-27 07:46:14'),
('c7bad35a36136ee1c1ae7880ef0fd244e353709956342b0556291c28b3b355eb4a16734fda54894d', 3, 1, 'Token Name', '[]', 0, '2021-09-25 13:28:11', '2021-09-25 13:28:11', '2022-09-25 20:28:11'),
('d554fcd52ceacf00e05b85311d0c265fa9723bc254ea7c87abec1942b23b79a99a6f80dcdf325151', 7, 1, 'Token Name', '[]', 0, '2021-10-06 07:30:21', '2021-10-06 07:30:21', '2022-10-06 14:30:21'),
('d56928123f40f9e467a8c03ee85ddff84260bf1a85b9b3c6291b92fd4f440405f69f18b023e3b673', 7, 1, 'Token Name', '[]', 0, '2021-09-29 00:15:24', '2021-09-29 00:15:24', '2022-09-29 07:15:24'),
('d797001f8bd9a1c6c412a792fdf7f65b28760692066469661485f2e946e5a7ec67026ade8e9c3f4e', 4, 1, 'Token Name', '[]', 0, '2021-09-27 10:29:26', '2021-09-27 10:29:26', '2022-09-27 17:29:26'),
('dab26fc0355ba7b6cab1e58db71fd1aa05dff2cf6da0938a51730bcbc1565bcae786bbbaa1c02838', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:30', '2021-09-26 01:25:30', '2022-09-26 08:25:30'),
('e1ac081fea94c1f182dde7f1cf3ae6a259926bcaf5fac3543fcf73d6b03ea51a439fb94983ed86b1', 1, 1, 'Token Name', '[]', 0, '2021-09-26 01:25:59', '2021-09-26 01:25:59', '2022-09-26 08:25:59'),
('e356dc6664ed939e4184058fc3368618fe2948cca57845f99bb938fcc4992e028475ee29de1e549a', 1, 1, 'Token Name', '[]', 0, '2021-09-26 13:50:38', '2021-09-26 13:50:38', '2022-09-26 20:50:38'),
('e46a8784348bda412584e6871a00e84a386e6e31b75ca5976551724d55e8c91d0c7ab82df5f2c69d', 7, 1, 'Token Name', '[]', 0, '2021-10-02 00:16:20', '2021-10-02 00:16:20', '2022-10-02 07:16:20'),
('e4fb6b8b9dfb8b646f14ca5c78d2a9dbc1f00446cf279592241908297cd75f70049b7b309baffd9e', 7, 1, 'Token Name', '[]', 0, '2021-09-29 01:19:30', '2021-09-29 01:19:30', '2022-09-29 08:19:30'),
('e51fd8c2cdaaec6e146bdd02b1007292484868426b685f78050b00082836d38c2daec7fb90d30638', 7, 1, 'Token Name', '[]', 0, '2021-10-01 07:19:40', '2021-10-01 07:19:40', '2022-10-01 14:19:40'),
('e9de1a9f1a7fe798cdc705c794c378c5f21eb2510069a7da1fac9d6ed27c3029441156a4d1ed7f41', 3, 1, 'Token Name', '[]', 0, '2021-09-29 01:15:06', '2021-09-29 01:15:06', '2022-09-29 08:15:06'),
('ec58a20f10d30787e612cb65c7f8eb6f169783541c8d302ca4aeaeac614abee36e61890de9901df2', 7, 1, 'Token Name', '[]', 0, '2021-10-19 23:38:31', '2021-10-19 23:38:31', '2022-10-20 06:38:31'),
('ed01b8118f7b8283590ce74ddbbb709c2cc96c3baa7db526dbb178cbc80dbcc5ecec01eb3e95073c', 7, 1, 'Token Name', '[]', 0, '2021-09-29 01:12:24', '2021-09-29 01:12:24', '2022-09-29 08:12:24'),
('ed702a8d4ee2f7afa443f00187ff0237183a8ab74873f549b8bd739672706f7bbf99a6260dd880d4', 7, 1, 'Token Name', '[]', 0, '2021-10-10 00:12:59', '2021-10-10 00:12:59', '2022-10-10 07:12:59'),
('efcc82f19c84aea31c4db2b8bdfcb165affc2336a585b4706c2f7194c01424cd43dd15f300bf5a98', 7, 1, 'Token Name', '[]', 0, '2021-10-03 02:52:14', '2021-10-03 02:52:14', '2022-10-03 09:52:14'),
('f111b15e85cfcf99deb6216d203af466898ac828aa5c48c3ae6f5e577026650933345fd279b16c00', 3, 1, 'Token Name', '[]', 0, '2021-09-27 00:54:56', '2021-09-27 00:54:56', '2022-09-27 07:54:56'),
('f13384c48783bfb9e33e6d8eea7fce6eda27216bfcb9b7739b4d77e13ecaae557f64446c3bf84050', 7, 1, 'Token Name', '[]', 0, '2021-09-27 04:34:50', '2021-09-27 04:34:50', '2022-09-27 11:34:50'),
('f20db1a4fbbf3b23fe75a81699dafb50a6f839fba9b252b0011dceb20ea8b5a8151bc7f0e6b3bcc2', 1, 1, 'Token Name', '[]', 0, '2021-09-26 02:45:02', '2021-09-26 02:45:02', '2022-09-26 09:45:02'),
('fa2ab52bc97daeb982b2fce2fae5bb112f749307278f6eb2d008a36e300c9298b476b6324271735f', 1, 1, 'Token Name', '[]', 0, '2021-09-27 10:29:03', '2021-09-27 10:29:03', '2022-09-27 17:29:03'),
('fed51f13e5183546c6fae3a91593c67c8fa398d7d0b2ee3ea472513fa415465beccd5c51e8ee2a64', 1, 1, 'Token Name', '[]', 0, '2021-09-26 03:27:48', '2021-09-26 03:27:48', '2022-09-26 10:27:48'),
('ff13ae1d2fab8e0fb809e09f13aa8182f6b0f08cd150e918717408be138fabbba925947f9de37d11', 7, 1, 'Token Name', '[]', 0, '2021-10-02 00:15:39', '2021-10-02 00:15:39', '2022-10-02 07:15:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'czYbMrY8FyYsZ1ZQnIE7BDLIyQ0vASXrP4eJGouS', NULL, 'http://localhost', 1, 0, 0, '2021-09-21 00:06:57', '2021-09-21 00:06:57'),
(2, NULL, 'Laravel Password Grant Client', 'NbUHz2BgjaLN8UGBUvCeTPjKqutCICdumfDhMyQy', 'users', 'http://localhost', 0, 1, 0, '2021-09-21 00:06:57', '2021-09-21 00:06:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-21 00:06:57', '2021-09-21 00:06:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `menu_id`) VALUES
(26, 'Supermin:/pengguna/view', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 1),
(27, 'Supermin:/pengguna/create', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 1),
(28, 'Supermin:/pengguna/edit', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 1),
(29, 'Supermin:/pengguna/delete', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 1),
(30, 'Supermin:/tema undangan/view', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 2),
(31, 'Supermin:/tema undangan/create', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 2),
(32, 'Supermin:/tema undangan/edit', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 2),
(33, 'Supermin:/tema undangan/delete', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 2),
(34, 'Supermin:/contoh undangan/view', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 3),
(35, 'Supermin:/contoh undangan/create', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 3),
(36, 'Supermin:/contoh undangan/edit', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 3),
(37, 'Supermin:/contoh undangan/delete', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 3),
(38, 'Supermin:/package/view', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 4),
(39, 'Supermin:/package/create', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 4),
(40, 'Supermin:/package/edit', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 4),
(41, 'Supermin:/package/delete', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 4),
(42, 'Supermin:/feature/view', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 5),
(43, 'Supermin:/feature/create', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 5),
(44, 'Supermin:/feature/edit', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 5),
(45, 'Supermin:/feature/delete', 'web', '2021-11-02 04:10:47', '2021-11-02 04:10:47', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Supermin', 'web', '2021-09-21 00:04:41', '2021-09-21 00:04:41'),
(2, 'Admin', 'web', '2021-09-21 16:44:17', '2021-09-21 16:44:17'),
(3, 'User', 'web', '2021-09-21 16:44:34', '2021-09-21 16:44:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `roles_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`, `is_active`, `roles_id`) VALUES
(1, 'Super Admin', 'SAdmin', 'sadmin@system.com', NULL, '$2y$10$vLpGCR8Bq1XOkuvEjMtiGeUv9CfpeMPg9eOIB4WMzhFDTWkYBB5Xe', NULL, 'PCeT3jBsVC1pl5NuTQIbOnahEAeTf8B3EUqKk4ohRWazkhw08KKa4toeIC8C', '2021-09-21 00:04:42', '2021-09-21 00:04:42', 1, 1),
(3, 'User Satu', 'user1', 'user1@contoh.com', NULL, '$2y$10$aYV9yaebEkoKBApJPnTRseSGVPKWc26WyULeZxWslWgMGIFSMIyQG', NULL, NULL, '2021-09-25 13:08:51', '2021-09-27 00:38:53', 1, 3),
(4, 'User Dua', 'user2', 'user2@contoh.com', NULL, '$2y$10$EEO9.HHfF2Fdy1hSKq.WVeDZXDXrDtzadC6t/p3RAPnhMh92tJA/W', NULL, NULL, '2021-09-25 13:10:18', '2021-09-25 13:10:18', 1, 3),
(5, 'User Tiga', 'user3', 'user3@contoh.com', NULL, '$2y$10$.JW9aEUo9H1ySuvRAqgEOOk4o8jwjzuLr29zwx/uMFhMK1aOa31f2', NULL, NULL, '2021-09-27 03:35:26', '2021-09-27 03:35:26', 1, 3),
(6, 'User Empat', 'user4', 'user4@contoh.com', NULL, '$2y$10$bo./gzYj3iW.NVeJ2LbXaO5fcDJsxyiBYjOtg9fRzUVm.i8nZffV.', NULL, NULL, '2021-09-27 03:37:40', '2021-09-27 03:37:40', 1, 3),
(7, 'Insan Hadi Karunia', 'insanhaka', 'insanhadikarunia@gmail.com', NULL, '$2y$10$FmdoNo.AjnUNl6DhUa.1L.g6WFL685UsT6T68g.AKMfEN/a.pDLai', NULL, NULL, '2021-09-27 04:34:23', '2021-09-27 04:34:23', 1, 3),
(8, 'Design Kominfo', NULL, 'kominfo.design@gmail.com', NULL, NULL, NULL, NULL, '2021-10-19 00:37:48', '2021-10-19 00:37:48', 1, 3);

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
-- Indeks untuk tabel `fake_invitations`
--
ALTER TABLE `fake_invitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fake_invitations_theme_id_foreign` (`theme_id`),
  ADD KEY `fake_invitations_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feature_package`
--
ALTER TABLE `feature_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_package_package_id_foreign` (`package_id`);

--
-- Indeks untuk tabel `invitation_themes`
--
ALTER TABLE `invitation_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fake_invitations`
--
ALTER TABLE `fake_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feature_package`
--
ALTER TABLE `feature_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invitation_themes`
--
ALTER TABLE `invitation_themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fake_invitations`
--
ALTER TABLE `fake_invitations`
  ADD CONSTRAINT `fake_invitations_theme_id_foreign` FOREIGN KEY (`theme_id`) REFERENCES `invitation_themes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fake_invitations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feature_package`
--
ALTER TABLE `feature_package`
  ADD CONSTRAINT `feature_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

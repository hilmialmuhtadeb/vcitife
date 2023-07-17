-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2021 pada 16.18
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcitife`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Kelulusan', 'kelulusan', '2021-07-15 04:46:51', '2021-07-15 04:46:51'),
(2, 'Kompetisi', 'kompetisi', '2021-07-15 04:46:51', '2021-07-15 04:46:51'),
(3, 'Penghargaan', 'penghargaan', '2021-07-15 04:46:51', '2021-07-15 04:46:51'),
(4, 'Pencapaian', 'pencapaian', '2021-07-15 04:46:51', '2021-07-15 04:46:51'),
(5, 'penganu', 'penganu', '2021-07-15 06:49:43', '2021-07-15 06:49:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `participant_manual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `participant_auto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(122, '2014_10_12_000000_create_users_table', 1),
(123, '2014_10_12_100000_create_password_resets_table', 1),
(124, '2019_08_19_000000_create_failed_jobs_table', 1),
(125, '2021_07_03_082108_create_products_table', 1),
(126, '2021_07_03_082243_create_orders_table', 1),
(127, '2021_07_03_082335_create_details_table', 1),
(128, '2021_07_03_083529_create_categories_table', 1),
(129, '2021_08_09_144856_create_ratings_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL DEFAULT 0,
  `summary` int(11) NOT NULL DEFAULT 0,
  `unique_number` int(11) NOT NULL,
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
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `thumbnail`, `price`, `discount`, `description`, `created_at`, `updated_at`) VALUES
(5, 1, 'Sertifikat C1', 'sertifikat-c1', 'images/products/F4UicVqfLjEXjns4YEyBkuoTGPYGpssQLLyLjf3a.jpg', 5000, NULL, 'Memiliki warna cerah sehingga pas digunakan untuk acara yang memiliki nuansa menyenangkan. Adanya objek-objek luar angkasa juga membuat desain sertifikat terlihat ramai.', '2021-07-16 00:17:49', '2021-07-16 00:17:49'),
(6, 3, 'Sertifikat C2', 'sertifikat-c2', 'images/products/mEFZjdFZHp3pjbbP0yZkkubPt6HRGNwxy5jo1j0G.png', 7000, 6000, 'Memiliki warna dasar berjenis pastel membuat sertifikat ini terlihat kekinian. warna tersebut juga menggambarkan sebuah keceriaan. Pas digunakan untuk acara yang santai.', '2021-07-16 00:19:48', '2021-07-16 00:19:48'),
(7, 2, 'Sertifikat C3', 'sertifikat-c3', 'images/products/P0thow9WUP7yKGIjYvqAWGRtQWzNgZFnZUGsXjA2.png', 5000, NULL, 'Warna dasar putih sebagaimana sertifikat pada umumnya membuat desain tersebut sangat aman digunakan untuk acara apapun. terdapat motif di ujung bawah membuat sertifikat ini sangat elegan digunakan sebagai penghargaan di ajang kesenian.', '2021-07-16 00:21:18', '2021-07-16 00:21:18'),
(8, 1, 'Sertifikat C4', 'sertifikat-c4', 'images/products/ec5E9ZtlI2jKBZUzBGGqmc1xRMOuzLW7yx9zFPbR.png', 3000, NULL, 'Memiliki desain yang tegas membuat sertifikat ini sangat direkomendasikan untuk acara formal ataupun acara tentang pengetahuan.', '2021-07-16 00:23:33', '2021-07-16 00:23:33'),
(9, 3, 'Sertifikat C5', 'sertifikat-c5', 'images/products/X5mlcAUEjUkp3ati6Fuilx9j846kxl6lK5vdlXaf.png', 6000, NULL, 'Terdapat corak di empat sudut dan memiliki background gambar bunga dengan warna samar. Sertifikat ini menggunakan jenis font Serif. memiliki 4 warna utama yaitu biru, ungu, merah muda, dan putih.', '2021-07-16 00:25:18', '2021-07-16 00:25:18'),
(10, 4, 'Sertifikat R2', 'sertifikat-r2', 'images/products/ePvSShM7hNhKWs75QbAZ60xhFgdydB7dENIQ76i9.png', 3500, 2000, 'Desain sangat minimalis dengan border hitam mengelilingi sertifikat. Menggunakan font dengan jenis serif membuat sertifikat ini pas digunakan untuk acara formal.', '2021-07-16 00:29:38', '2021-07-16 00:29:38'),
(11, 1, 'Sertifikat R3', 'sertifikat-r3', 'images/products/JFKypWgvntfxnbOGInOXTxVT6PFAmP6Cz7kWszD7.png', 3000, 2500, 'Terdiri dari 3 warna dasar yaitu putih, abu-abu, dan merah muda. Jenis font yang digunakan dalam penulisan nama merupakan tipikal font handwriting. terdapat ikon badge kelulusan pada bagian tengah bawah.', '2021-07-16 00:31:32', '2021-07-16 00:31:32'),
(12, 2, 'Sertifikat R4', 'sertifikat-r4', 'images/products/9ywbU28uc3str9yAtwniqIbHk6nithODWcd8yuFL.png', 4000, 3500, 'Memiliki font bold pada bagian nama dan dengan gaya tulisan yang santai membuat sertifikat ini cocok jika digunakan sebagai sertifikat kejuaraan e-sport. terdapat border yang memiliki motif pada bagian sudut.', '2021-07-16 00:54:00', '2021-07-16 00:54:00'),
(13, 1, 'Sertifikat R5', 'sertifikat-r5', 'images/products/y6oZszHxghXISzN2FQ5KSuGRgxyngHWbaykeWRDt.png', 4000, NULL, 'memiliki warna utama putih pada bagian background dan warna tosca pada bagian font membuat seritifikat ini sangat simpel.', '2021-07-16 00:56:07', '2021-07-16 00:56:07'),
(14, 3, 'Sertifikat R6', 'sertifikat-r6', 'images/products/XGgp5VSgSNL9X7kSf2gsQeCk99R31eATZshsc6ku.png', 3000, NULL, 'font yang digunakan memiliki bentuk seperti handwriting sehingga membuat nuansa ceria dan santai. cocok digunakan sebagai sertifikat penghargaan.', '2021-07-16 00:57:26', '2021-07-16 00:57:26'),
(15, 1, 'Sertifikat S1', 'sertifikat-s1', 'images/products/1782RLtIH8bNErlxUxiF73YjCsQEndZsNQp640lN.png', 4000, NULL, 'Warna background putih tulang dengan border tebal mengelilingi sertifikat membuat sertifikat ini terlihat sangat tegas. font bergaya kaku juga berhasil membuat sertifikat terlihat kokoh.', '2021-07-16 00:59:13', '2021-07-16 00:59:13'),
(16, 4, 'Sertifikat S2', 'sertifikat-s2', 'images/products/BJjDAGm3s7ejGCP8GnmR14ckGBK8kMyp9PfT9qqb.png', 3000, 2500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis ornare metus. Aenean semper neque nec lectus fringilla mollis. Nullam ac commodo urna, eu blandit odio. Vestibulum ipsum mauris, dapibus eget sem id, mollis volutpat arcu. Nulla in accumsan libero.', '2021-07-16 01:01:04', '2021-07-16 01:01:04'),
(17, 2, 'Sertifikat S3', 'sertifikat-s3', 'images/products/8zCWP0yOzpwXnH2qg9uvpBkT3h3th7rJCEJwNtkV.png', 3500, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis ornare metus. Aenean semper neque nec lectus fringilla mollis. Nullam ac commodo urna, eu blandit odio. Vestibulum ipsum mauris, dapibus eget sem id, mollis volutpat arcu. Nulla in accumsan libero.', '2021-07-16 01:02:11', '2021-07-16 01:02:11'),
(18, 4, 'Sertifikat S4', 'sertifikat-s4', 'images/products/f8O7J2MDgdkXJ7qSaqaYUbGHkUk8moig3rKgjCYR.png', 4000, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis ornare metus. Aenean semper neque nec lectus fringilla mollis. Nullam ac commodo urna, eu blandit odio. Vestibulum ipsum mauris, dapibus eget sem id, mollis volutpat arcu. Nulla in accumsan libero.', '2021-07-16 01:02:37', '2021-07-16 01:02:48'),
(19, 1, 'Sertifikat S5', 'sertifikat-s5', 'images/products/eBfWZGtbTgjVsSNsHGSt1guXdwOLczahPgOaCSyg.png', 4000, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis ornare metus. Aenean semper neque nec lectus fringilla mollis. Nullam ac commodo urna, eu blandit odio. Vestibulum ipsum mauris, dapibus eget sem id, mollis volutpat arcu. Nulla in accumsan libero.', '2021-07-16 01:03:16', '2021-07-16 01:03:16'),
(20, 4, 'Sertifikat S6', 'sertifikat-s6', 'images/products/O6qimc3Vyl6bNThzej50YB1gX5bbYL4vsf5Rv6sQ.png', 2500, 1300, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis ornare metus. Aenean semper neque nec lectus fringilla mollis. Nullam ac commodo urna, eu blandit odio. Vestibulum ipsum mauris, dapibus eget sem id, mollis volutpat arcu. Nulla in accumsan libero.', '2021-07-16 01:03:37', '2021-08-09 13:49:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `star` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `username`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin V-Citife', 'admin@vcitife.com', NULL, 'adminvcitife', '$2y$10$phVSsquzRXeUcg2ac7C2DO../rE72MxZHFwXHM7rtMt1DiGDj051W', 1, NULL, '2021-07-15 04:46:51', '2021-07-15 04:46:51'),
(2, 'Hilmi Almuhtade', 'hilmialmuhtadeb@gmail.com', NULL, 'hilmialmuhtadeb', '$2y$10$lhgNlpy7klUhfabZuHxoYOa6zwWTwfA0cfqw2sxPGKbbyaoRq2xE6', 1, NULL, '2021-07-15 04:46:51', '2021-07-15 06:31:44'),
(3, 'Rachita Amelia', 'rachitaamelia@gmail.com', NULL, 'rachitaamelia', '$2y$10$0YnOJTinf3uj2MewME0RDOemAu8Tnl6zojMHc2GGIcSWqMhu3TQVC', 0, NULL, '2021-07-15 05:15:42', '2021-07-15 05:15:42'),
(4, 'Dimas Choirul', 'dimaschoirul@gmail.com', NULL, 'dimaschoirul', '$2y$10$hKwrGrKHPwBWxa30uNescuhX2iej8i7ACWiYms.wcGJyNfKBolnry', 0, NULL, '2021-07-17 05:54:25', '2021-07-17 05:54:25'),
(5, 'adelia rizma reyhana', 'hanaaa@gmail.com', NULL, 'hanaaw', '$2y$10$Ta.3xv6xcvNPXEl/WyaCo.f8mWYTuhDdxoBq2rhE6rA49lfnoLtSu', 0, NULL, '2021-09-03 10:27:06', '2021-09-03 10:27:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

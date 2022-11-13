-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table ticketsystem.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instertion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.customers: ~0 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organisation_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `amount_tickets` int(11) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_organisation_id_foreign` (`organisation_id`),
  CONSTRAINT `events_organisation_id_foreign` FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.events: ~3 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `organisation_id`, `title`, `description`, `start_date`, `end_date`, `amount_tickets`, `price`, `city`, `address`, `zipcode`, `category`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Sport', 'Evenement met sport.', '2022-12-05 22:20:00', '2022-12-11 22:20:00', 1000, 12.00, 'Breda', 'sportlaan 12', '1234ab', 'Sport', '2022-11-13 21:20:51', '2022-11-13 21:20:51'),
	(2, 2, 'Muziek', 'Evenement met muziek.', '2024-06-13 22:21:00', '2024-08-24 22:21:00', 500, 11.00, 'Tilburg', 'Muziekstraat 89', '4321ba', 'Muziek', '2022-11-13 21:22:07', '2022-11-13 21:23:41'),
	(3, 3, 'Games', 'Evenement met games.', '2022-11-28 22:22:00', '2022-12-11 22:22:00', 200, 8.00, 'Rotterdam', 'Gamedijk 9', '3241ch', 'Games', '2022-11-13 21:22:59', '2022-11-13 21:23:46');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.migrations: ~10 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2022_09_18_110238_create_organisations_table', 1),
	(6, '2022_09_19_122052_create_events_table', 1),
	(7, '2022_09_26_110810_create_customers_table', 1),
	(8, '2022_09_26_111714_create_orders_table', 1),
	(9, '2022_09_26_112630_create_tickets_table', 1),
	(10, '2022_10_17_105958_add_payment_method_to_orders_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` enum('pending','paid','cancelled','refunded') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.orders: ~2 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`, `payment_method`) VALUES
	(1, 1, 'paid', '2022-11-13 21:23:18', '2022-11-13 21:23:18', 'paypal'),
	(2, 2, 'paid', '2022-11-13 21:25:58', '2022-11-13 21:25:58', 'creditcard');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.organisations
CREATE TABLE IF NOT EXISTS `organisations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.organisations: ~5 rows (approximately)
/*!40000 ALTER TABLE `organisations` DISABLE KEYS */;
INSERT INTO `organisations` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'Organisator1', 'organisator1@gmail.com', '0612345678', '2022-11-13 21:18:51', '2022-11-13 21:18:51'),
	(2, 'Organisator2', 'organisator2@gmail.com', '0623456781', '2022-11-13 21:18:58', '2022-11-13 21:18:58'),
	(3, 'Organisator3', 'organisator3@gmail.com', '0634567812', '2022-11-13 21:19:05', '2022-11-13 21:19:05'),
	(4, 'Organisator4', 'organisator4@gmail.com', '0645678123', '2022-11-13 21:19:17', '2022-11-13 21:19:17'),
	(5, 'Organisator5', 'organisator5@gmail.com', '0656781234', '2022-11-13 21:19:45', '2022-11-13 21:19:45');
/*!40000 ALTER TABLE `organisations` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL,
  `valid_until` timestamp NULL DEFAULT NULL,
  `scanned_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_event_id_foreign` (`event_id`),
  KEY `tickets_order_id_foreign` (`order_id`),
  CONSTRAINT `tickets_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  CONSTRAINT `tickets_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.tickets: ~15 rows (approximately)
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`id`, `event_id`, `order_id`, `valid_until`, `scanned_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, NULL, '2022-11-13 21:23:18', '2022-11-13 21:23:18'),
	(2, 1, 1, NULL, NULL, '2022-11-13 21:23:18', '2022-11-13 21:23:18'),
	(3, 1, 1, NULL, NULL, '2022-11-13 21:23:18', '2022-11-13 21:23:18'),
	(4, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(5, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(6, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(7, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(8, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(9, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(10, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(11, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(12, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(13, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(14, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58'),
	(15, 1, 2, NULL, NULL, '2022-11-13 21:25:58', '2022-11-13 21:25:58');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Dumping structure for table ticketsystem.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ticketsystem.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Koen', 'Koen@gmail.com', NULL, '$2y$10$e4Q5Q9yLZ.NIjr9.Za55Ye4rTihku.PM50fd0/l7xpv4R1Wm.vRiu', NULL, '2022-11-13 21:18:25', '2022-11-13 21:18:25'),
	(2, 'Koen2', 'koen2@gmail.com', NULL, '$2y$10$/8nNHRXjnYSwRD6lqEviZuMzaH4TlV.QedZ.f00aStzoKteQdx66u', NULL, '2022-11-13 21:25:38', '2022-11-13 21:25:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for antologiehudbycz
DROP DATABASE IF EXISTS `antologiehudbycz`;
CREATE DATABASE IF NOT EXISTS `antologiehudbycz` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `antologiehudbycz`;

-- Dumping structure for table antologiehudbycz.authors
DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bd` date NOT NULL,
  `deathdate` date NOT NULL,
  `bio` text COLLATE utf8_unicode_ci NOT NULL,
  `externalLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.authors: ~1 rows (approximately)
DELETE FROM `authors`;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` (`id`, `name`, `bd`, `deathdate`, `bio`, `externalLink`, `created_at`, `updated_at`) VALUES
	(108, 'First Author', '1875-01-23', '1912-01-23', 'This is A dummy  Biography', NULL, '2018-06-08 11:35:51', '2018-06-08 11:35:51');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.author_composition
DROP TABLE IF EXISTS `author_composition`;
CREATE TABLE IF NOT EXISTS `author_composition` (
  `author_id` int(10) unsigned NOT NULL,
  `composition_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `author_composition_author_id_foreign` (`author_id`),
  KEY `author_composition_composition_id_foreign` (`composition_id`),
  CONSTRAINT `author_composition_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `author_composition_composition_id_foreign` FOREIGN KEY (`composition_id`) REFERENCES `compositions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.author_composition: ~0 rows (approximately)
DELETE FROM `author_composition`;
/*!40000 ALTER TABLE `author_composition` DISABLE KEYS */;
/*!40000 ALTER TABLE `author_composition` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.author_video
DROP TABLE IF EXISTS `author_video`;
CREATE TABLE IF NOT EXISTS `author_video` (
  `author_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `author_video_author_id_foreign` (`author_id`),
  KEY `author_video_video_id_foreign` (`video_id`),
  CONSTRAINT `author_video_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE,
  CONSTRAINT `author_video_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.author_video: ~0 rows (approximately)
DELETE FROM `author_video`;
/*!40000 ALTER TABLE `author_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `author_video` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.compositions
DROP TABLE IF EXISTS `compositions`;
CREATE TABLE IF NOT EXISTS `compositions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `soundTrack` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.compositions: ~0 rows (approximately)
DELETE FROM `compositions`;
/*!40000 ALTER TABLE `compositions` DISABLE KEYS */;
/*!40000 ALTER TABLE `compositions` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.events
DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `period_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_period_id_foreign` (`period_id`),
  CONSTRAINT `events_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.events: ~0 rows (approximately)
DELETE FROM `events`;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.migrations: ~10 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_05_30_203614_create_periods_table', 1),
	(4, '2018_05_30_203719_create_videos_table', 1),
	(5, '2018_05_30_203800_create_events_table', 1),
	(6, '2018_05_30_203832_create_compositions_table', 1),
	(7, '2018_05_30_203846_create_authors_table', 1),
	(8, '2018_05_30_203857_create_photos_table', 1),
	(9, '2018_05_30_203904_create_author_composition_table', 1),
	(10, '2018_05_30_203919_create_author_video_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.periods
DROP TABLE IF EXISTS `periods`;
CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.periods: ~0 rows (approximately)
DELETE FROM `periods`;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.photos
DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author_id` int(10) unsigned DEFAULT NULL,
  `period_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_author_id_foreign` (`author_id`),
  KEY `photos_period_id_foreign` (`period_id`),
  KEY `photos_user_id_foreign` (`user_id`),
  CONSTRAINT `photos_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  CONSTRAINT `photos_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  CONSTRAINT `photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.photos: ~0 rows (approximately)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthDate` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isAdmin` bit(1) DEFAULT b'0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `birthDate`, `gender`, `address`, `phone`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Admin', 'admin@gmail.com', '$2y$10$1v270KK4auxxwInuKQ2X6Osp1grhJPidQu93i7FkmyWt04j/M6gV2', '1992-03-02', 'Male', 'Venohrady 178/63', '+420 777777777', b'1', NULL, '2018-06-02 14:43:51', '2018-06-03 10:03:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table antologiehudbycz.videos
DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table antologiehudbycz.videos: ~0 rows (approximately)
DELETE FROM `videos`;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

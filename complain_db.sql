-- -------------------------------------------------------------
-- TablePlus 5.9.0(538)
--
-- https://tableplus.com/
--
-- Database: u244677816_complain
-- Generation Time: 2024-03-24 16:33:46.4160
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `cities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `complaint_statuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `complaints` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_fault` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_complaint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complainant_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complaint_rut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `population` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contractor_id` bigint(20) unsigned DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complaints_contractor_id_foreign` (`contractor_id`),
  CONSTRAINT `complaints_contractor_id_foreign` FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comuna` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `contractors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `status` smallint(6) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contractors_user_id_foreign` (`user_id`),
  CONSTRAINT `contractors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `population` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sectors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `type_of_faults` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `complaint_statuses` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Open', 'open', NULL, NULL),
(2, 'Closed ', 'closed', NULL, NULL),
(3, 'Rejected', 'rejected', NULL, NULL),
(4, 'Pending', 'pending', NULL, NULL);

INSERT INTO `complaints` (`id`, `post_no`, `post_address`, `type_of_fault`, `date_of_complaint`, `complainant_name`, `complaint_rut`, `phone`, `image`, `comuna`, `sector`, `population`, `status`, `contractor_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', NULL, 'test', 'test', 'test', 'closed', NULL, '2024-03-23 17:01:35', NULL, '2024-03-23 12:15:04'),
(2, 'Post123', 'Test post address', 'internal fault option', '2023-12-03', 'hadi', 'test', '210321', NULL, 'comuna', 'sector1', 'population', 'pending', NULL, NULL, '2024-03-23 12:41:46', '2024-03-23 12:41:46'),
(3, 'Post123', 'Test post address', 'internal fault option', '2023-12-03', 'hadi', 'test', '210321', 'complaint_images/image_1711197899.jpeg', 'comuna', 'sector1', 'population', 'open', 1, NULL, '2024-03-23 12:44:59', '2024-03-23 18:25:18'),
(4, 'Post123', 'Test post address', NULL, '2023-12-03', 'hadi', 'test', '210321', 'complaint_images/image_1711198281.jpeg', '1', NULL, NULL, 'pending', NULL, NULL, '2024-03-23 12:51:21', '2024-03-23 18:42:55'),
(5, 'Post123', 'Test post address222', NULL, '2023-12-03', 'hadi222', 'test', '210321', 'complaint_images/CiXbSAPQgVSspjwBA7F1PpktuBlABMz512i4kaSs.jpg', '1', NULL, NULL, 'open', 1, NULL, '2024-03-23 12:59:50', '2024-03-23 18:54:18'),
(6, 'Post123', 'Test post address', NULL, '2023-12-03', 'hadi', 'test', '210321', 'complaint_images/xGcCnDNKKAppE02eNfbs25CNlpa6QhnMkjn9HFfK.jpg', NULL, NULL, NULL, 'open', 1, NULL, '2024-03-23 13:13:29', '2024-03-23 18:57:18'),
(7, 'Post123', 'Test post address', 'internal fault option', '2023-12-03', 'hadi', 'test', '210321', 'complaint_images/ZUvU5hOJJ0dHtteILZewoiOrv5QiqYDEOvBVV8cS.jpg', 'comuna', 'sector1', 'population', 'pending', 1, '2024-03-23 17:01:35', '2024-03-23 13:13:39', '2024-03-23 13:13:39');

INSERT INTO `comuna` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New 2', '2024-03-23 22:33:40', '2024-03-23 22:33:40'),
(2, 'TEST', '2024-03-23 22:34:16', '2024-03-23 22:34:16'),
(3, 'TESTESTSE', '2024-03-23 22:34:27', '2024-03-23 22:34:27');

INSERT INTO `contractors` (`id`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 6, 1, NULL, '2024-03-23 19:56:21', '2024-03-23 19:56:21');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2024_03_11_114718_create_settings_table', 1),
(10, '2024_03_23_075725_create_complaints_table', 1),
(11, '2024_03_23_080225_create_contractors_table', 1),
(12, '2024_03_23_081953_create_complaint_statuses_table', 1),
(13, '2024_03_23_082148_create_countries_table', 1),
(14, '2024_03_23_082203_create_cities_table', 1),
(15, '2024_03_23_083109_create_permission_tables', 2),
(16, '2024_03_23_085520_create_type_of_faults_table', 3),
(17, '2024_03_23_085530_create_comuna_table', 3),
(18, '2024_03_23_085534_create_sectors_table', 3),
(19, '2024_03_23_085538_create_population_table', 3),
(20, '2024_03_23_080226_create_complaints_table', 4);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6);

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('016fdead12c30f9f20fe465c734bd3021245b19cf6354e42900670d41b87177f11a651f203e58730', 2, 1, 'COMPLAINTSYSTEM', '[]', 0, '2024-03-23 12:08:39', '2024-03-23 12:08:39', '2025-03-23 12:08:39'),
('5fe55f0b65deacf6f429d65f51e1dcca2240d04d3437f53a7577ea583198eecb0e1867ec78262bfa', 2, 1, 'COMPLAINTSYSTEM', '[]', 0, '2024-03-23 12:33:12', '2024-03-23 12:33:12', '2025-03-23 12:33:12'),
('823965f1c64a4b7712538e3268175d739554729f0dad042c9eb006eabd67b0872d3cfe740c6ef17a', 2, 1, 'COMPLAINTSYSTEM', '[]', 0, '2024-03-23 12:08:57', '2024-03-23 12:08:57', '2025-03-23 12:08:57'),
('eb94fcc3799ac78406f1b56b0e036b496e836c555dd80f4fe5e1ebb796d5b0c3f8bcb82e3b711f60', 2, 1, 'COMPLAINTSYSTEM', '[]', 0, '2024-03-23 20:48:59', '2024-03-23 20:48:59', '2025-03-23 20:48:59');

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Complaint Management Personal Access Client', 'CpuDDfTmmkI1QTw9MrfJDLrAwdcRGuVuniRMMGBw', NULL, 'http://localhost', 1, 0, 0, '2024-03-23 12:08:17', '2024-03-23 12:08:17'),
(2, NULL, 'Complaint Management Password Grant Client', 'Fvpzh0YeSHVfNfo44YPjqaMaTU5WLsQtYUeQbwF8', 'users', 'http://localhost', 0, 1, 0, '2024-03-23 12:08:17', '2024-03-23 12:08:17');

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-23 12:08:17', '2024-03-23 12:08:17');

INSERT INTO `population` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'testestes', '2024-03-23 22:34:36', '2024-03-23 22:34:36'),
(2, 'gdsgd', '2024-03-23 22:34:40', '2024-03-23 22:34:40');

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-23 08:32:32', '2024-03-23 08:32:32'),
(2, 'contractor', 'web', '2024-03-23 08:32:32', '2024-03-23 08:32:32');

INSERT INTO `type_of_faults` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Test fault', '2024-03-23 22:46:30', '2024-03-23 22:46:30');

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin User', 'admin@example.com', '1234', NULL, '$2y$10$pOfAZBqrz2tb5WwPg.5X0.tgt07Uj7ALTljW9EWAS0XEh/RIY2OpW', NULL, '2024-03-23 08:35:03', '2024-03-23 08:35:03', NULL),
(2, 'Contractor 1', 'contractor1@example.com', '123456', NULL, '$2y$10$nrX1RMunooBOVMuQNNe6He3jrlHjQ.nUfUAkKW2Kw2HRPkDrmgyCi', NULL, '2024-03-23 08:35:03', '2024-03-23 08:35:03', NULL),
(3, 'Contractor 2', 'contractor2@example.com', '3214', NULL, '$2y$10$SPclHkBJ.4uf7D78uYpW7OwXHEb8c6SzRxLebDQjaD5EpHKEYwsZi', NULL, '2024-03-23 08:35:03', '2024-03-23 08:35:03', NULL),
(4, 'Test', 'test@gmail.com', NULL, NULL, '$2y$10$RneevP9cI9HtLwlA03tdCuN7EKnigICbNrcLCRy8HXX5Z8vxhgP/K', NULL, '2024-03-23 19:47:57', '2024-03-23 19:47:57', NULL),
(5, 'Kimberley Black', 'wufu@mailinator.com', NULL, NULL, '$2y$10$5HskjtYTl7is/wtxv0sC8.RSZXDvtMrxyJKnrU9zL/I6P3g07sRGK', NULL, '2024-03-23 19:55:48', '2024-03-23 19:55:48', NULL),
(6, 'Maryam Brock', 'gijybif@mailinator.com', NULL, NULL, '$2y$10$ugaeulJapLpdVhtKM6wkqOZRfCzMZmZV6.HCimu6iQNrLefXX7XA6', NULL, '2024-03-23 19:56:21', '2024-03-23 19:56:21', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para innova_tech_new
DROP DATABASE IF EXISTS `innova_tech_new`;
CREATE DATABASE IF NOT EXISTS `innova_tech_new` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `innova_tech_new`;

-- Volcando estructura para tabla innova_tech_new.address
DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `hood` varchar(100) NOT NULL,
  `param_city` int(10) unsigned DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `param_city` (`param_city`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_address_params` FOREIGN KEY (`param_city`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_address_params_2` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_address_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.address: ~0 rows (aproximadamente)
DELETE FROM `address`;

-- Volcando estructura para tabla innova_tech_new.carrusels
DROP TABLE IF EXISTS `carrusels`;
CREATE TABLE IF NOT EXISTS `carrusels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(2) unsigned NOT NULL,
  `image` varchar(255) NOT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_carrusels_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.carrusels: ~0 rows (aproximadamente)
DELETE FROM `carrusels`;

-- Volcando estructura para tabla innova_tech_new.faqs
DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `param_type` int(10) unsigned NOT NULL,
  `body` varchar(255) NOT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_type` (`param_type`),
  KEY `param_state` (`param_state`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_faqs_params` FOREIGN KEY (`param_type`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_faqs_params_2` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_faqs_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.faqs: ~0 rows (aproximadamente)
DELETE FROM `faqs`;

-- Volcando estructura para tabla innova_tech_new.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provider_id` int(10) unsigned NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `param_status` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_id` (`provider_id`),
  KEY `param_status` (`param_status`),
  CONSTRAINT `FK_orders_params_2` FOREIGN KEY (`param_status`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_orders_providers` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.orders: ~0 rows (aproximadamente)
DELETE FROM `orders`;

-- Volcando estructura para tabla innova_tech_new.order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(10) unsigned NOT NULL,
  `param_status` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `param_status` (`param_status`),
  CONSTRAINT `FK_order_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_order_details_params` FOREIGN KEY (`param_status`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_order_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.order_details: ~0 rows (aproximadamente)
DELETE FROM `order_details`;

-- Volcando estructura para tabla innova_tech_new.params
DROP TABLE IF EXISTS `params`;
CREATE TABLE IF NOT EXISTS `params` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paramtype_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `param_foreign` int(10) unsigned DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paramtype_id` (`paramtype_id`),
  KEY `param_state` (`param_state`),
  KEY `param_foreign` (`param_foreign`),
  CONSTRAINT `FK_params_param_types` FOREIGN KEY (`paramtype_id`) REFERENCES `param_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_params_params` FOREIGN KEY (`param_foreign`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_params_params_2` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.params: ~39 rows (aproximadamente)
DELETE FROM `params`;
INSERT INTO `params` (`id`, `paramtype_id`, `name`, `param_foreign`, `param_state`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Cliente', NULL, 5, '2023-07-14 15:56:35', '2023-07-14 15:56:37'),
	(2, 1, 'Administrador', NULL, 5, '2023-07-14 15:58:02', '2023-07-14 15:58:02'),
	(5, 2, 'Activo', NULL, 5, '2023-07-14 15:58:54', '2023-07-14 15:58:54'),
	(6, 2, 'Inactivo', NULL, 5, '2023-07-14 15:59:16', '2023-07-14 15:59:19'),
	(10, 3, 'Pendiente', NULL, 5, '2023-07-18 17:02:27', NULL),
	(11, 3, 'Cancelado', NULL, 5, '2023-07-18 17:02:44', NULL),
	(12, 3, 'Entregado', NULL, 5, '2023-07-18 17:03:12', NULL),
	(13, 3, 'Recibido', NULL, 5, '2023-07-19 15:36:16', NULL),
	(20, 4, 'Si', NULL, 5, '2023-07-15 04:16:59', '2023-07-15 04:17:03'),
	(21, 4, 'No', NULL, 5, '2023-07-15 04:18:18', '2023-07-15 04:18:19'),
	(25, 5, 'Colombia', NULL, 5, '2023-07-15 18:37:26', '2023-07-15 18:37:27'),
	(125, 6, 'Valle', 25, 5, '2023-07-15 18:38:26', '2023-07-15 18:38:27'),
	(126, 6, 'Cauca', 25, 5, '2023-07-15 21:10:46', '2023-07-15 21:10:47'),
	(127, 6, 'Antioquia', 25, 5, '2023-07-17 01:47:03', NULL),
	(165, 7, 'Cali', 125, 5, '2023-07-15 21:07:57', '2023-07-15 21:07:59'),
	(166, 7, 'Florida', 125, 5, '2023-07-15 21:07:58', '2023-07-15 21:08:00'),
	(167, 7, 'Guapi', 126, 5, '2023-07-15 21:11:17', '2023-07-15 21:11:18'),
	(168, 7, 'Medellín', 127, 5, '2023-07-17 01:48:31', NULL),
	(1415, 8, 'Quejas', NULL, 5, '2023-07-17 02:14:30', NULL),
	(1416, 8, 'Reclamos', NULL, 5, '2023-07-17 02:15:46', NULL),
	(1417, 8, 'Sugerencias', NULL, 5, '2023-07-17 02:17:39', NULL),
	(1418, 8, 'Peticion', NULL, 5, '2023-07-17 02:20:22', NULL),
	(1425, 9, 'Sonido', NULL, 5, '2023-07-21 21:20:39', NULL),
	(1575, 10, 'Sony', NULL, 5, '2023-07-21 21:17:10', NULL),
	(1775, 11, 'Azul', NULL, 5, '2023-07-17 00:48:36', NULL),
	(1776, 11, 'Rojo', NULL, 5, '2023-07-17 02:22:27', '2023-07-17 20:28:46'),
	(1777, 11, 'Verde', NULL, 5, '2023-07-18 17:13:32', NULL),
	(2075, 12, 'Diademas', NULL, 5, '2023-07-21 21:18:26', NULL),
	(2275, 13, 'Efectivo', NULL, 5, '2023-07-18 17:04:30', NULL),
	(2276, 13, 'Debito', NULL, 5, '2023-07-18 17:08:29', NULL),
	(2277, 13, 'Crédito', NULL, 5, '2023-07-18 17:08:55', NULL),
	(2285, 14, 'Domicilio', NULL, 5, '2023-07-18 17:10:08', NULL),
	(2286, 14, 'Punto físico', NULL, 5, '2023-07-18 17:12:17', NULL),
	(2290, 15, 'CC', NULL, 5, '2023-07-18 19:33:22', NULL),
	(2291, 15, 'CE', NULL, 5, '2023-07-18 19:33:28', NULL),
	(2292, 15, 'TI', NULL, 5, '2023-07-18 19:33:36', NULL),
	(2293, 15, 'NIT', NULL, 5, '2023-07-18 19:33:43', NULL),
	(2300, 16, 'Leído', NULL, 5, '2023-07-21 19:45:17', NULL),
	(2301, 16, 'No leído', NULL, 5, '2023-07-21 19:45:41', NULL);

-- Volcando estructura para tabla innova_tech_new.param_types
DROP TABLE IF EXISTS `param_types`;
CREATE TABLE IF NOT EXISTS `param_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `range_min` int(10) DEFAULT NULL,
  `range_max` int(10) DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_param_types_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.param_types: ~16 rows (aproximadamente)
DELETE FROM `param_types`;
INSERT INTO `param_types` (`id`, `name`, `range_min`, `range_max`, `param_state`, `created_at`, `updated_at`) VALUES
	(1, 'Roles', 1, 4, 6, '2023-07-14 15:54:31', '2023-07-14 15:54:34'),
	(2, 'Estados', 5, 9, 6, '2023-07-14 15:54:36', '2023-07-14 15:54:36'),
	(3, 'Estados de orden', 10, 19, 5, '2023-07-14 15:54:40', '2023-07-14 15:54:39'),
	(4, 'Suscripciones', 20, 24, 6, '2023-07-14 15:54:41', '2023-07-14 15:54:42'),
	(5, 'Paises', 25, 124, 5, '2023-07-14 15:54:46', '2023-07-14 15:54:46'),
	(6, 'Departamentos', 125, 164, 5, '2023-07-14 15:54:48', '2023-07-14 15:54:49'),
	(7, 'Ciudades', 165, 1414, 5, '2023-07-14 15:55:18', '2023-07-14 15:55:16'),
	(8, 'Tipos de PQRSF', 1415, 1424, 6, '2023-07-14 15:55:19', '2023-07-14 15:55:19'),
	(9, 'Etiquetas', 1425, 1574, 5, '2023-07-14 15:55:22', '2023-07-14 15:55:23'),
	(10, 'Marcas', 1575, 1774, 5, '2023-07-14 15:55:24', '2023-07-14 15:55:24'),
	(11, 'Colores', 1775, 2074, 5, '2023-07-14 15:55:26', '2023-07-14 15:55:26'),
	(12, 'Categorías', 2075, 2274, 5, '2023-07-14 15:55:29', '2023-07-14 15:55:29'),
	(13, 'Métodos de pago', 2275, 2284, 5, '2023-07-14 15:55:30', '2023-07-14 15:55:31'),
	(14, 'Métodos de envío', 2285, 2289, 5, '2023-07-14 15:55:32', '2023-07-14 15:55:33'),
	(15, 'Tipos de documento', 2290, 3299, 5, '2023-07-18 19:11:34', '2023-07-18 19:11:35'),
	(16, 'Estados de PQRS', 2300, 2304, 6, '2023-07-21 19:35:04', NULL);

-- Volcando estructura para tabla innova_tech_new.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount` int(3) unsigned DEFAULT NULL,
  `tax` int(3) unsigned DEFAULT NULL,
  `stock` int(10) unsigned DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `param_tags` varchar(50) DEFAULT NULL,
  `param_mark` int(10) unsigned DEFAULT NULL,
  `param_color` varchar(50) DEFAULT NULL,
  `param_category` int(10) unsigned DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_mark` (`param_mark`),
  KEY `param_category` (`param_category`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_products_params` FOREIGN KEY (`param_mark`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_products_params_2` FOREIGN KEY (`param_category`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_products_params_3` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.products: ~0 rows (aproximadamente)
DELETE FROM `products`;

-- Volcando estructura para tabla innova_tech_new.providers
DROP TABLE IF EXISTS `providers`;
CREATE TABLE IF NOT EXISTS `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nit` varchar(15) NOT NULL,
  `legal_name` varchar(100) DEFAULT NULL,
  `commercial_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_providers_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.providers: ~0 rows (aproximadamente)
DELETE FROM `providers`;

-- Volcando estructura para tabla innova_tech_new.ratings
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `starts` float unsigned NOT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `param_state` (`param_state`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_ratings_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ratings_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ratings_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.ratings: ~0 rows (aproximadamente)
DELETE FROM `ratings`;

-- Volcando estructura para tabla innova_tech_new.reports
DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_state` (`param_state`),
  CONSTRAINT `FK_reports_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.reports: ~0 rows (aproximadamente)
DELETE FROM `reports`;

-- Volcando estructura para tabla innova_tech_new.sales
DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `param_status` int(10) unsigned DEFAULT NULL,
  `param_paymethod` int(10) unsigned NOT NULL,
  `param_shipping` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_paymethod` (`param_paymethod`),
  KEY `param_shipping` (`param_shipping`),
  KEY `address_id` (`address_id`),
  KEY `user_id` (`user_id`),
  KEY `param_status` (`param_status`),
  CONSTRAINT `FK_sales_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_params` FOREIGN KEY (`param_paymethod`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_params_2` FOREIGN KEY (`param_shipping`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_params_3` FOREIGN KEY (`param_status`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.sales: ~0 rows (aproximadamente)
DELETE FROM `sales`;

-- Volcando estructura para tabla innova_tech_new.sales_details
DROP TABLE IF EXISTS `sales_details`;
CREATE TABLE IF NOT EXISTS `sales_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `qty` int(10) unsigned NOT NULL,
  `param_status` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `product_id` (`product_id`),
  KEY `param_status` (`param_status`),
  CONSTRAINT `FK_sales_details_params` FOREIGN KEY (`param_status`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_details_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_sales_details_sales` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.sales_details: ~0 rows (aproximadamente)
DELETE FROM `sales_details`;

-- Volcando estructura para tabla innova_tech_new.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document` varchar(15) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `param_type` int(10) unsigned DEFAULT NULL,
  `param_rol` int(10) unsigned DEFAULT NULL,
  `param_suscription` int(10) unsigned DEFAULT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `token` varchar(16) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `param_rol` (`param_rol`),
  KEY `param_suscription` (`param_suscription`),
  KEY `param_state` (`param_state`),
  KEY `param_type` (`param_type`),
  CONSTRAINT `FK__params` FOREIGN KEY (`param_rol`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__params_2` FOREIGN KEY (`param_suscription`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK__params_3` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_users_params` FOREIGN KEY (`param_type`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.users: ~0 rows (aproximadamente)
DELETE FROM `users`;

-- Volcando estructura para tabla innova_tech_new.wishlist
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `param_state` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `param_state` (`param_state`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `FK_wishlist_params` FOREIGN KEY (`param_state`) REFERENCES `params` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_wishlist_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_wishlist_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla innova_tech_new.wishlist: ~0 rows (aproximadamente)
DELETE FROM `wishlist`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

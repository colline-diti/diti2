-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 08:52 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diti`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets_accounts`
--

CREATE TABLE `assets_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asset_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `asset_types_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE `asset_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `available_stock`
--

CREATE TABLE `available_stock` (
  `stockDetails_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_in` int(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_stock`
--

INSERT INTO `available_stock` (`stockDetails_id`, `stock_id`, `item_id`, `quantity_in`) VALUES
(10, 0, 0, 40),
(11, 0, 0, 120),
(12, 0, 0, 100),
(13, 0, 0, 80),
(14, 0, 0, 50),
(15, 0, 0, 10),
(16, 0, 0, 100),
(17, 0, 0, 200),
(18, 0, 9, 120),
(19, 0, 9, 200);

-- --------------------------------------------------------

--
-- Table structure for table `category3`
--

CREATE TABLE `category3` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category3`
--

INSERT INTO `category3` (`category_id`, `category_name`, `unit_id`) VALUES
(2, 'Cups', 0),
(3, 'Sodas', 0),
(4, 'Rice', 0),
(5, 'Juice', 0),
(6, 'Equipment', 0),
(7, 'Vegetables', 0),
(8, 'Cooking oil', 5),
(9, 'Soap', 7),
(10, 'Cooking oil', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department3`
--

CREATE TABLE `department3` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department3`
--

INSERT INTO `department3` (`department_id`, `department_name`) VALUES
(1, 'Production'),
(2, 'Servicing'),
(3, 'Laundry');

-- --------------------------------------------------------

--
-- Table structure for table `discounts3`
--

CREATE TABLE `discounts3` (
  `discount_id` int(11) NOT NULL,
  `sales_id` varchar(69) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `total_bill` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `changes` int(11) NOT NULL,
  `blance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discounts3`
--

INSERT INTO `discounts3` (`discount_id`, `sales_id`, `discount_amount`, `total_bill`, `cash`, `changes`, `blance`, `created_at`, `updated_at`) VALUES
(1, 'S/1629461017', 60000, 82000, 59000, 566, 90, '2021-08-20 12:03:37', '2021-08-20 12:03:37'),
(2, 'S/1629461133', 60000, 82000, 59000, 566, 90, '2021-08-20 12:05:33', '2021-08-20 12:05:33'),
(3, 'S/1629461164', 60000, 82000, 59000, 566, 90, '2021-08-20 12:06:04', '2021-08-20 12:06:04'),
(4, 'S/1629461203', 60000, 82000, 59000, 566, 90, '2021-08-20 12:06:43', '2021-08-20 12:06:43'),
(5, 'S/1629461303', 60000, 82000, 59000, 566, 90, '2021-08-20 12:08:23', '2021-08-20 12:08:23'),
(6, 'S/1629461335', 5000, 4000, 50000, 566, 90, '2021-08-20 12:08:55', '2021-08-20 12:08:55'),
(7, 'S/1629461469', 7800, 4000, 5600, 566, 90, '2021-08-20 12:11:09', '2021-08-20 12:11:09'),
(8, 'S/1629471125', 34567, 78000, 56788, 21212, 788, '2021-08-20 14:52:05', '2021-08-20 14:52:05'),
(9, 'S/1629471167', 34567, 78000, 56788, 21212, 788, '2021-08-20 14:52:47', '2021-08-20 14:52:47'),
(10, 'S/1629771168', 7800, 78000, 8900, 69100, 0, '2021-08-24 02:12:48', '2021-08-24 02:12:48'),
(11, 'S/1629772551', 80000, 82000, 82000, 0, 0, '2021-08-24 02:35:52', '2021-08-24 02:35:52'),
(12, 'S/1629772879', 8900, 82000, 899, 81101, 0, '2021-08-24 02:41:19', '2021-08-24 02:41:19'),
(13, 'S/1629773044', 8900, 82000, 6788, 75212, 0, '2021-08-24 02:44:04', '2021-08-24 02:44:04'),
(14, 'S/1629773204', 0, 82000, 89000, 0, 7000, '2021-08-24 02:46:44', '2021-08-24 02:46:44'),
(15, 'S/1629773737', 0, 82000, 8900, 73100, 0, '2021-08-24 02:55:37', '2021-08-24 02:55:37'),
(16, 'S/1629778746', 7888, 82000, 77888, 4112, 0, '2021-08-24 04:19:06', '2021-08-24 04:19:06'),
(17, 'S/1629785573', 788, 82000, 89000, 0, 7000, '2021-08-24 06:12:54', '2021-08-24 06:12:54'),
(18, 'S/1629810998', 7800, 82000, 67888, 14112, 0, '2021-08-24 13:16:38', '2021-08-24 13:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `expeses_resturants`
--

CREATE TABLE `expeses_resturants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `particulars` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `ammount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `category_id`) VALUES
(1, 'Posho', 0),
(3, 'Fanta', 0),
(4, 'Mirinda', 0),
(5, 'Kayiso', 0),
(6, 'Super Rice', 0),
(7, 'Pastitan Rice', 0),
(8, 'Plates', 0),
(9, 'ggg', 4),
(10, 'jjj', 4),
(11, 'Kayiso', 4);

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

CREATE TABLE `item_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pattie Pollich I', 'Occaecati ut ut eveniet dolore numquam ea voluptate eius ea consequatur.', '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(2, 'Sam Jacobi', 'Nihil ut id sit corrupti sunt fugiat ducimus sed non.', '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(3, 'Brayan Schmeler', 'Quasi id et enim eos in ab tenetur id ullam aperiam deleniti sit consequatur ea.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(4, 'Alfred Nader', 'Sit earum mollitia esse sit aliquid eius similique eius perspiciatis.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(5, 'Fabian Kessler', 'Suscipit architecto voluptas labore nihil nesciunt ipsa blanditiis quos et officiis similique et sint illo maxime totam.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(6, 'Larissa Nikolaus', 'Sit optio quisquam est odio numquam dicta exercitationem vel laudantium dolorem voluptas sit.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(7, 'Jaden Friesen', 'Et non quia dolor non nisi quia eum dolores asperiores repellat consequatur dolores nihil similique inventore harum.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(8, 'Prof. Weldon Simonis MD', 'Labore iusto et et repellendus doloremque voluptates voluptas et distinctio quos unde quasi debitis est corporis quibusdam voluptatum sed omnis.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(9, 'Norval Ledner', 'Velit odio consequatur quis ad sed voluptas fuga aspernatur adipisci sunt autem culpa corporis est culpa magni cumque molestias qui.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(10, 'Branson Hill', 'Vel est accusamus magnam deserunt mollitia explicabo ut laudantium sunt nihil assumenda magnam.', '2021-08-19 00:50:51', '2021-08-19 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_12_000001_create_stock_tables_table', 1),
(6, '2021_08_12_000002_create_res_sales_tables_table', 1),
(7, '2021_08_12_000003_create_res_products_table', 1),
(8, '2021_08_12_000004_create_res_sections_table', 1),
(9, '2021_08_12_000005_create_stock_discharges_table', 1),
(10, '2021_08_12_000006_create_res_categories_table', 1),
(11, '2021_08_12_000007_create_reciepts_table', 1),
(12, '2021_08_12_000008_create_item_categories_table', 1),
(13, '2021_08_12_000009_create_asset_types_table', 1),
(14, '2021_08_12_000010_create_assets_accounts_table', 1),
(15, '2021_08_12_000011_create_payment_types_table', 1),
(16, '2021_08_12_000012_create_clients_table', 1),
(17, '2021_08_12_000013_create_sales_table', 1),
(18, '2021_08_12_000014_create_petty_cashes_table', 1),
(19, '2021_08_12_000015_create_restaurant_requisitions_table', 1),
(20, '2021_08_12_000016_create_tax_rates_table', 1),
(21, '2021_08_12_000017_create_expeses_resturants_table', 1),
(22, '2021_08_12_009001_add_foreigns_to_res_sales_tables_table', 1),
(23, '2021_08_12_009002_add_foreigns_to_res_products_table', 1),
(24, '2021_08_12_009003_add_foreigns_to_stock_discharges_table', 1),
(25, '2021_08_12_009004_add_foreigns_to_reciepts_table', 1),
(26, '2021_08_12_009006_add_foreigns_to_stock_tables_table', 1),
(27, '2021_08_12_009007_add_foreigns_to_assets_accounts_table', 1),
(28, '2021_08_12_009008_add_foreigns_to_sales_table', 1),
(29, '2021_08_12_009009_add_foreigns_to_petty_cashes_table', 1),
(30, '2021_08_12_180715_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'list ressections', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(2, 'view ressections', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(3, 'create ressections', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(4, 'update ressections', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(5, 'delete ressections', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(6, 'list rescategories', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(7, 'view rescategories', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(8, 'create rescategories', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(9, 'update rescategories', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(10, 'delete rescategories', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(11, 'list ressalestables', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(12, 'view ressalestables', 'web', '2021-08-19 00:50:35', '2021-08-19 00:50:35'),
(13, 'create ressalestables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(14, 'update ressalestables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(15, 'delete ressalestables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(16, 'list stocktables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(17, 'view stocktables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(18, 'create stocktables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(19, 'update stocktables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(20, 'delete stocktables', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(21, 'list resproducts', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(22, 'view resproducts', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(23, 'create resproducts', 'web', '2021-08-19 00:50:36', '2021-08-19 00:50:36'),
(24, 'update resproducts', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(25, 'delete resproducts', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(26, 'list stockdischarges', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(27, 'view stockdischarges', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(28, 'create stockdischarges', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(29, 'update stockdischarges', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(30, 'delete stockdischarges', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(31, 'list roles', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(32, 'view roles', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(33, 'create roles', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(34, 'update roles', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(35, 'delete roles', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(36, 'list permissions', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(37, 'view permissions', 'web', '2021-08-19 00:50:39', '2021-08-19 00:50:39'),
(38, 'create permissions', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(39, 'update permissions', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(40, 'delete permissions', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(41, 'list users', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(42, 'view users', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(43, 'create users', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(44, 'update users', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40'),
(45, 'delete users', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petty_cashes`
--

CREATE TABLE `petty_cashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `expeses_resturant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts_stock`
--

CREATE TABLE `receipts_stock` (
  `id` int(11) NOT NULL,
  `receipt_image` text NOT NULL,
  `uploadedby` text NOT NULL,
  `Date_rec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts_stock`
--

INSERT INTO `receipts_stock` (`id`, `receipt_image`, `uploadedby`, `Date_rec`) VALUES
(1, '1630302200.png', 'Darby Bruen', '2021-08-17'),
(2, '1630325537.png', 'Darby Bruen', '2021-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `reciepts`
--

CREATE TABLE `reciepts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `served_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_requisitions`
--

CREATE TABLE `restaurant_requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `dateofDelivery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `Particulars` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `res_categories`
--

CREATE TABLE `res_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `res_categories`
--

INSERT INTO `res_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quae aut quis soluta minus. Perferendis est accusamus quia. Ipsa sed beatae laboriosam magni asperiores in sed. Animi voluptatibus culpa dolores id. Aperiam porro enim voluptatibus nam non.', 'Culpa dolores soluta voluptatum consequatur inventore perspiciatis hic et ut.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(2, 'Dolorem qui odio delectus inventore nesciunt iure. Soluta rerum quasi sit. Tempora quidem perspiciatis odit corporis saepe aut illo. Qui rerum eveniet eligendi omnis. Cumque amet nihil quae iure quia. Cumque in adipisci quod et.', 'Repudiandae sunt est quia cumque ut est nisi similique eum reprehenderit aliquid a non et unde.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(3, 'Laudantium quo ut error voluptatem soluta id eos. Maiores beatae a aliquid et. Rerum exercitationem sed vitae ratione dolores pariatur eveniet.', 'Debitis porro iste ipsa quaerat ea soluta fugiat a qui.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(4, 'Odio nihil nostrum ducimus qui ut magnam. Pariatur nihil adipisci et. Ex nobis suscipit velit. Dolor blanditiis delectus sit totam officiis. Et quis nostrum rerum deleniti et nobis. Blanditiis vero nulla doloremque magnam natus vel.', 'Mollitia ut magni delectus voluptatem numquam quo earum iste provident mollitia dolorem quo eum ut sed magni at aut placeat.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(5, 'In dolorem fugiat libero ex voluptate quo. Beatae illo quaerat totam quia. Repellat tempore dolorem perferendis et minima ullam necessitatibus. Consequuntur sed placeat eos eveniet aliquam distinctio.', 'Eligendi quia deleniti ea nisi odio nihil odit quos sint et asperiores.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(6, 'Enim doloremque exercitationem nihil qui. Quo aut numquam amet minus veniam exercitationem. Eum totam earum consequatur laborum nulla. Quas numquam qui eius ut consequuntur reprehenderit. Dolor aut ullam quaerat atque rerum voluptas ut.', 'Illo rerum aut est et fuga ut ducimus assumenda nemo ullam enim assumenda vero itaque similique id.', '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(7, 'Adipisci voluptas laboriosam magni sit dolorum. Earum esse dolores aspernatur sunt pariatur eos qui. Et ea accusamus distinctio veniam eius id. Facere officia ab dignissimos consequatur omnis.', 'Architecto qui ipsam dolore quas deserunt consectetur ea eligendi qui officia recusandae iste illum.', '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(8, 'Sequi ut assumenda sit deserunt neque officia repellat. Accusantium ex natus ipsa corrupti consequatur maxime. Rerum itaque odit vel eius ut. Laborum accusamus doloribus aspernatur tenetur veniam.', 'Ea omnis molestiae vel est eos iste qui ipsam dolorum molestiae quisquam odio fuga blanditiis nulla eos dolorem et.', '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(9, 'Dolor perspiciatis expedita sed unde enim. Ut iste eius error perspiciatis. Velit saepe dolor ex nihil sunt. Esse quo quos tempore rerum et. Quo nihil est ut dolorem neque nisi. Quis et voluptatem cum qui ut ad.', 'Quo repellendus animi molestiae rerum rem aut quia incidunt ut id porro dolor.', '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(10, 'Dolor iure voluptates voluptatem voluptatem provident sapiente quia. Quibusdam quasi quisquam qui. Temporibus perspiciatis odit doloremque quis.', 'Dicta voluptas magni suscipit reiciendis harum nulla incidunt alias optio.', '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(11, 'Pariatur aut minus enim distinctio eum. Consequatur quod natus voluptate facere eum. Et ratione cum id voluptatem molestiae laboriosam. Sed sed quis voluptas praesentium corporis nobis.', 'Dolorem rem perferendis minus et labore commodi provident molestiae voluptatum voluptatem quis suscipit possimus voluptas.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(12, 'Ut consectetur reprehenderit eum aut in cupiditate quasi. Eum eos unde nisi aliquam sapiente explicabo et. Amet ullam harum vel laudantium. Quibusdam delectus architecto eum soluta aut fugit. Fugit quam ut assumenda nulla sunt voluptatibus aliquid.', 'Natus facilis occaecati veritatis et laudantium omnis exercitationem et esse et et repudiandae porro totam quia.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(13, 'Placeat quaerat nemo repellat aut minus est. Repellat rem quia commodi veritatis ipsum sapiente nesciunt illum. Qui nisi sed dolorem. Quos repellendus iure voluptates libero aut quo.', 'Esse aut culpa minus aut id natus omnis sed non ipsa quod autem aspernatur labore odit.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(14, 'Fugiat enim quod rerum ipsam vel provident ut. Animi aut autem omnis. Iure qui quis dolorem consequatur. Et aliquam cupiditate qui ullam animi. Dolor nulla et perferendis. Est aut id molestias consequatur. Rerum quisquam iste voluptas nostrum.', 'Ducimus culpa non quas optio aut voluptate dolorum alias molestiae consequuntur porro voluptate suscipit cumque aliquam est eligendi sed perferendis error.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(15, 'Illo distinctio dolor sint. Inventore rerum nemo quo sunt esse quaerat libero similique. Maxime sit maxime doloremque suscipit voluptates sit illum. Expedita quis temporibus ea nihil quasi. Distinctio aperiam et suscipit sit quidem mollitia dolore.', 'Dignissimos alias sint quaerat sed rem deserunt error consequatur totam qui repudiandae illum repudiandae placeat nihil qui facere velit.', '2021-08-19 00:50:49', '2021-08-19 00:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `res_products`
--

CREATE TABLE `res_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'test',
  `res_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `res_products`
--

INSERT INTO `res_products` (`id`, `product_name`, `product_price`, `category`, `res_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Lunch', 4000, 'Nam sapiente occaecati vitae voluptatem consequatur. Eligendi similique provident minima vitae. Molestiae minima id itaque officiis.', 6, '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(2, 'break fast', 78000, 'Numquam dicta odit ratione adipisci ullam est amet. Corporis exercitationem quis commodi aliquam voluptatum sit quaerat. Sed saepe incidunt doloremque sed accusantium debitis doloribus. Sint et a iure voluptatem enim sit.', 7, '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(3, 'Voluptatum accusantium aliquid eum suscipit ut ut. Consequuntur deserunt eius laudantium magni doloribus tempora. Omnis dolorem quo quis.', 0, 'Consequatur at facilis ipsum tempora. Commodi est accusantium dolor enim voluptas voluptas.', 8, '2021-08-19 00:50:46', '2021-08-19 00:50:46'),
(4, 'Quasi accusamus quos eos architecto. Ad fugit velit impedit porro et. Corrupti sed doloremque qui quo.', 0, 'Accusamus perspiciatis perferendis itaque dolor. Repellendus vel aut deleniti placeat iure voluptas quasi. Officiis sit quis sit molestiae at.', 9, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(5, 'Nemo deserunt doloribus molestiae reprehenderit. Harum rerum possimus eos sunt dolorem velit modi iusto. Odit nesciunt facere dolores debitis. Molestiae maxime odit pariatur consequatur qui doloribus.', 0, 'Id neque doloremque quis a. Mollitia nihil sit in inventore est voluptas in fugiat. Iure vitae voluptas est alias adipisci quisquam. Ut impedit ut voluptatem ut consectetur.', 10, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(7, 'Voluptatem ipsam alias aut aut qui ut. Dolorum quia voluptatem accusamus eius quo. Debitis impedit id perspiciatis consectetur aut autem. Excepturi tenetur nesciunt aut adipisci aspernatur ut. Vero provident et minus modi nulla.', 0, 'Delectus fugit repellendus quia molestiae officia quis. Vitae adipisci labore aliquid ipsa sequi velit. Vitae tenetur laboriosam et minus aliquam. Quo consequatur dolores tenetur delectus laborum debitis eos.', 12, '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(8, 'Aperiam placeat dolor consequatur amet possimus inventore consequuntur cum. Nemo non explicabo fugit velit qui.', 0, 'Eum veniam officia laboriosam at quibusdam voluptas aliquam. Maiores voluptates est est aut aut molestias. Cupiditate fuga sint sit consectetur sed. Et provident repellat quaerat ipsum est.', 13, '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(9, 'Deserunt repudiandae quia qui nulla voluptatum. Voluptatem labore neque porro facilis omnis amet. Ullam et quasi aspernatur exercitationem accusamus dolorem beatae fugiat.', 0, 'Consequatur aut nesciunt et reprehenderit quia dolore. Ipsa est quae aut voluptas molestiae est nobis. Magni praesentium in hic qui. Quia ut doloribus perspiciatis enim sint qui est eveniet.', 14, '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(10, 'At aut omnis in neque odio. Repellat est ipsa eos dignissimos id incidunt non. Sed et culpa porro rem. Porro placeat facilis neque consectetur aut.', 0, 'Nihil enim dolore est unde quia magnam. Consequatur ad vitae in quis eius. Aspernatur accusantium et qui. Eum quia nihil illo delectus quod.', 15, '2021-08-19 00:50:49', '2021-08-19 00:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `res_sales_tables`
--

CREATE TABLE `res_sales_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `res_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `res_sales_tables`
--

INSERT INTO `res_sales_tables` (`id`, `product_name`, `price`, `res_product_id`, `created_at`, `updated_at`) VALUES
(1, 'Nisi mollitia sit eaque error et omnis quae. Ut voluptatibus ut id unde. Dignissimos corrupti ipsam quis et aspernatur labore. Maiores illum dolor amet et et corporis.', 0, 1, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(2, 'Eius quis nihil distinctio culpa. Consequuntur facilis neque veritatis aliquam temporibus. Est quo reiciendis velit laboriosam. Quia qui dolor in modi minima cumque aut.', 0, 2, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(3, 'Deserunt molestiae quae quo omnis officiis quia. Dolore similique ducimus adipisci consectetur ipsam nemo. Et nihil beatae tempore ea et unde. Aut corporis id perferendis quam dignissimos unde repellat.', 0, 3, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(4, 'Dicta dolores rerum ea qui explicabo mollitia. Quis quaerat vero sit placeat officiis qui ut similique. Veniam reiciendis aliquam corporis laudantium aliquid commodi voluptatibus.', 0, 4, '2021-08-19 00:50:47', '2021-08-19 00:50:47'),
(5, 'Facilis consequuntur nobis nihil quas. Aut accusantium reiciendis et ratione fugit. Officia illo qui corporis qui architecto. Molestiae quia repellat enim aut possimus pariatur. Sit quae dolor natus corrupti. Ea aut omnis earum nemo et debitis dicta.', 0, 5, '2021-08-19 00:50:47', '2021-08-19 00:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `res_sections`
--

CREATE TABLE `res_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `res_sections`
--

INSERT INTO `res_sections` (`id`, `section_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ut consequatur commodi voluptatum totam eos cum laudantium. Temporibus odit et voluptatem velit deserunt officiis unde. Distinctio consequatur sint distinctio autem doloremque impedit dolores aut.', 'Dolores quia ad possimus sunt quis magni aperiam rem sunt dolor.', '2021-08-19 00:50:44', '2021-08-19 00:50:44'),
(2, 'Adipisci voluptate non facilis consequatur cumque. Est fugiat quia quibusdam eius id qui quibusdam. Non expedita et nemo aut. Quod inventore deserunt aut est.', 'Et nulla omnis libero consequatur consequatur porro et non ducimus reiciendis vel et.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(3, 'Nihil autem neque et optio sint fuga. Non officia omnis necessitatibus sunt et non. Fugit facilis odio aliquam omnis est soluta. Consequatur error quaerat consequatur est asperiores.', 'Ut totam molestiae autem odit sunt aliquam natus est libero facere sed.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(4, 'Distinctio ut dolor neque fugit vero laboriosam qui. Voluptas eos omnis eaque magni nam adipisci. Omnis id qui sint ea dolores repellendus sunt. A at modi error non dolores.', 'Est porro sint harum maxime similique repellat molestiae perferendis quasi aperiam maxime sint nisi voluptate hic facilis.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(5, 'Et et magnam quae. Ipsa autem assumenda est dolores nam. Est blanditiis blanditiis exercitationem voluptatem quasi quo. Doloribus quo aut molestiae rerum vero. Ea nihil voluptas eaque voluptatem rem.', 'Voluptatibus velit temporibus dolore enim omnis atque aut quis similique.', '2021-08-19 00:50:45', '2021-08-19 00:50:45'),
(6, 'Est iure nemo aut est porro eum est. Et dignissimos harum facilis est molestias. Autem soluta magnam quia. Nostrum quis et doloribus. Consequatur facere iusto voluptas sunt officiis.', 'Molestiae autem ut cum perspiciatis pariatur autem est omnis molestiae id.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(8, 'Quae ut pariatur tenetur deserunt nostrum et. Eos magni fugiat a nisi voluptatem. Sed non incidunt in fugit.', 'Exercitationem voluptatem voluptatem animi est provident non aut aut doloremque possimus qui odit aperiam dolor et aperiam.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(10, 'Vero qui velit maxime quibusdam. Alias aut quisquam dolorum nisi accusantium enim nobis officia. Ut rerum vel aut quaerat vitae. Expedita sed facere hic ex nam.', 'Nostrum voluptatem fugiat et autem vero quidem minima sed et ut iusto ullam cupiditate a occaecati beatae adipisci dolore.', '2021-08-19 00:50:51', '2021-08-19 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-08-19 00:50:37', '2021-08-19 00:50:37'),
(2, 'super-admin', 'web', '2021-08-19 00:50:40', '2021-08-19 00:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `discounts` int(11) NOT NULL,
  `clients_id` bigint(20) UNSIGNED NOT NULL,
  `payment_types_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales3`
--

CREATE TABLE `sales3` (
  `sales_id` varchar(69) NOT NULL,
  `product_name` text NOT NULL,
  `unit_cost` int(40) NOT NULL,
  `Quantity` int(89) NOT NULL,
  `served_by` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales3`
--

INSERT INTO `sales3` (`sales_id`, `product_name`, `unit_cost`, `Quantity`, `served_by`, `created_at`, `updated_at`) VALUES
('S/1629772551', 'break fast', 78000, 1, 'a', '2021-08-24 02:35:51', '2021-08-24 02:35:51'),
('S/1629772879', 'break fast', 78000, 1, 'a', '2021-08-24 02:41:19', '2021-08-24 02:41:19'),
('S/1629772986', 'break fast', 78000, 1, 'a', '2021-08-24 02:43:06', '2021-08-24 02:43:06'),
('S/1629773010', 'break fast', 78000, 1, 'a', '2021-08-24 02:43:30', '2021-08-24 02:43:30'),
('S/1629773044', 'break fast', 78000, 1, 'a', '2021-08-24 02:44:04', '2021-08-24 02:44:04'),
('S/1629773204', 'break fast', 78000, 1, 'a', '2021-08-24 02:46:44', '2021-08-24 02:46:44'),
('S/1629773520', 'break fast', 78000, 1, 'a', '2021-08-24 02:52:00', '2021-08-24 02:52:00'),
('S/1629773737', 'break fast', 78000, 1, 'a', '2021-08-24 02:55:37', '2021-08-24 02:55:37'),
('S/1629778746', 'Lunch', 4000, 1, 'a', '2021-08-24 04:19:06', '2021-08-24 04:19:06'),
('S/1629785573', 'break fast', 78000, 1, 'a', '2021-08-24 06:12:53', '2021-08-24 06:12:53'),
('S/1629810998', 'break fast', 78000, 1, 'a', '2021-08-24 13:16:38', '2021-08-24 13:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `stock_damages`
--

CREATE TABLE `stock_damages` (
  `damage_id` int(11) NOT NULL,
  `damage_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(200) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_damages`
--

INSERT INTO `stock_damages` (`damage_id`, `damage_date`, `item_id`, `quantity`, `remarks`, `user_id`) VALUES
(1, '2021-09-02', 0, 20, 'Transportation', 0),
(2, '2021-09-02', 0, 12, 'Handling', 0),
(3, '2021-09-02', 8, 13, 'Poor Handling', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_discharge3`
--

CREATE TABLE `stock_discharge3` (
  `stockDischarge_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_discharged` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `discharge_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_discharge3`
--

INSERT INTO `stock_discharge3` (`stockDischarge_id`, `item_id`, `quantity_discharged`, `department_id`, `discharge_date`, `user_id`) VALUES
(1, 0, 67, 0, '2021-08-03', 0),
(2, 0, 6, 0, '2021-08-17', 0),
(3, 0, 6, 0, '2021-08-10', 0),
(4, 0, 80, 0, '2021-08-31', 0),
(5, 0, 200, 0, '2021-09-01', 0),
(6, 0, 50, 0, '2021-09-01', 0),
(7, 0, 50, 0, '2021-09-01', 0),
(8, 3, 12, 2, '2021-09-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock_discharges`
--

CREATE TABLE `stock_discharges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity_issued` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Service',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issued_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_table_id` bigint(20) UNSIGNED NOT NULL,
  `res_section_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_discharges`
--

INSERT INTO `stock_discharges` (`id`, `quantity_issued`, `section`, `description`, `issued_by`, `stock_table_id`, `res_section_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'Est maxime ea optio libero quia distinctio facere. Quod praesentium est iusto distinctio praesentium tempora. Reiciendis ipsam voluptates vero. Et enim cum nihil alias ad aut.', 'Adipisci aut rerum magnam possimus recusandae qui et qui et possimus debitis enim voluptates omnis consequatur numquam mollitia ipsam sit dolor.', 'Beatae tenetur animi qui quas autem. Dolorem recusandae et non accusantium laudantium. Voluptatem rerum quidem est est animi. Odit eos debitis ut a et sit.', 6, 6, '2021-08-19 00:50:51', '2021-08-19 00:50:51'),
(3, 0, 'Molestiae sit itaque dolorum ipsam. Dolores et est sint et. Soluta sed voluptate fugit maiores sed. Aut ut rerum ea sed minima praesentium quaerat. Nulla dolorum culpa iure cupiditate dicta.', 'Molestias est nobis quisquam ipsam non nulla quia perferendis omnis.', 'Alias minus saepe itaque quam aspernatur accusantium modi. Quia nesciunt aut recusandae veritatis dolorem ut fuga. Non similique hic dicta. Adipisci molestias rerum voluptate eligendi enim eaque. Quo a aut quisquam. Odit sint maiores rem laudantium.', 8, 8, '2021-08-19 00:50:51', '2021-08-19 00:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `stock_entry`
--

CREATE TABLE `stock_entry` (
  `entry_id` int(11) NOT NULL,
  `Number` int(11) NOT NULL,
  `Remarks` text NOT NULL,
  `item_code` text NOT NULL,
  `Date_rec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_entry`
--

INSERT INTO `stock_entry` (`entry_id`, `Number`, `Remarks`, `item_code`, `Date_rec`) VALUES
(1, 45, 'fgfjfjhjhf', 'Item/1630268695', '2021-08-23'),
(2, 56, 'dddd', 'Item/1630283358', '2021-08-17'),
(3, 120, 'gg', 'Item/1630470647', '2021-09-01'),
(4, 150, 'none', 'Item/1630470728', '2021-09-01'),
(5, 300, 'Transportation', 'Item/1630478564', '2021-09-01'),
(6, 100, 'j', 'Item/1630488432', '2021-09-01'),
(7, 10, 'h', 'Item/1630488761', '2021-09-01'),
(8, 120, 'Transportation', 'Item/1630497702', '2021-09-21'),
(9, 200, 'none', 'Item/1630497776', '2021-09-01'),
(10, 120, 'none', 'Item/1630513214', '2021-09-01'),
(11, 200, 'none', 'Item/1630513367', '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `stock_table`
--

CREATE TABLE `stock_table` (
  `stock_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_receipt` varchar(12) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_tables`
--

CREATE TABLE `stock_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_price` bigint(20) NOT NULL,
  `item_category_id` bigint(20) UNSIGNED NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_tables`
--

INSERT INTO `stock_tables` (`id`, `item_name`, `quantity`, `unit`, `buying_price`, `item_category_id`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'Impedit qui nam ipsam aut tempore eos natus. Dolorum sit laborum cupiditate aut. Dolor qui et omnis officia delectus minus. Odit velit ut consectetur et. Eos culpa accusantium quisquam corrupti pariatur.', 66638, 'Sed numquam dolor enim. Ut omnis dolor at in sed doloremque est reprehenderit. Nihil voluptatum eum dolor amet omnis ut illum sit.', 91, 1, 'Perferendis molestiae voluptates non aut voluptas omnis magnam iste deserunt vel reprehenderit.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(2, 'Non aut sint blanditiis fugiat qui ipsa. Ipsam aspernatur qui molestiae sed velit qui consequuntur nulla. Ipsa tempora qui qui consectetur voluptas ad. Perferendis ipsa in eos veniam et.', 8, 'Nisi doloribus ex saepe qui. Porro architecto voluptate deleniti fugiat porro est. Quis consequatur nisi quod aut omnis odio reprehenderit.', 85, 2, 'Rem minus omnis autem harum deleniti doloremque debitis deleniti corporis magnam incidunt quis quam quaerat voluptas.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(3, 'Inventore vel amet repellat quasi labore qui fuga. Hic excepturi soluta nisi explicabo eveniet. Quis necessitatibus quas reprehenderit dolorem beatae. Quas magnam omnis omnis in repellendus doloribus.', 984073, 'Qui fugiat sit inventore ut. Quod ratione aut in. Voluptates quae et nam ducimus animi.', 406990, 3, 'Officia repellendus vel dolorum recusandae libero temporibus quam ut dolorem expedita harum iste dolores est quasi accusantium.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(4, 'Omnis ipsum mollitia id quaerat hic. Impedit ut esse ut quisquam est. Beatae dignissimos dicta ut nisi assumenda. Pariatur sed quisquam est quis.', 6, 'Deleniti sunt dolor pariatur perferendis ipsam nulla eos. Amet et qui ut suscipit et maxime error. Possimus non quia accusantium necessitatibus nesciunt vero libero. Omnis exercitationem libero aut laborum sapiente dolores et cum.', 2664, 4, 'Saepe suscipit quis dicta eos pariatur rerum qui et voluptas corporis nostrum exercitationem.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(5, 'Voluptas perferendis vel aperiam consequatur. Asperiores qui non ipsum sint reprehenderit. Quia laudantium vero sit voluptatem expedita. Cumque porro dolorum facilis et eum.', 46107577, 'Omnis ut voluptatem et. Consequatur ipsa omnis recusandae qui tempore pariatur magni. Id voluptas incidunt deleniti rerum molestiae repellendus.', 8, 5, 'Dolores dolorem non officiis quia expedita nihil eveniet magnam hic commodi esse consequatur ducimus.', '2021-08-19 00:50:48', '2021-08-19 00:50:48'),
(6, 'Id consectetur repudiandae ipsum qui. Omnis dolore aliquid alias doloremque. Architecto pariatur quis autem. Quo voluptates ut repudiandae minima deserunt atque eveniet.', 576665, 'Consequatur voluptatem ut consequuntur dolores aperiam labore. Sapiente quibusdam blanditiis omnis adipisci facilis. Nemo quia nihil voluptate velit quo vel reprehenderit eveniet.', 8268, 6, 'Doloremque temporibus quia dolores minus minus voluptatem perferendis totam doloremque voluptatem exercitationem.', '2021-08-19 00:50:49', '2021-08-19 00:50:49'),
(7, 'Eveniet officia ea vero rerum et deleniti. Eum numquam maxime omnis qui excepturi. Amet aut id sed cumque quibusdam aperiam non. At consequatur exercitationem ut at vel.', 3, 'Ut sunt fuga est nihil. Ullam molestiae adipisci iste quis. Totam at quis deserunt accusamus porro. Reprehenderit ab exercitationem quod quia sed rerum earum fuga. At est quos neque corrupti praesentium. Dolorum eius est cumque.', 231893143, 7, 'Ipsa quasi et reiciendis soluta est aut odit in ut fuga aut quasi quis.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(8, 'Quis optio aut quod officia. Modi nobis velit quas qui esse commodi. Aut et culpa voluptas vel sapiente praesentium cumque. Molestiae ut rem quisquam impedit velit. Saepe cum aut eum asperiores consequatur similique omnis molestiae.', 539555, 'Inventore quasi ut atque. Est temporibus nostrum porro omnis. Ut quisquam perferendis enim aut eaque.', 9303180, 8, 'Praesentium fugiat nostrum omnis et corporis inventore harum eaque nihil perspiciatis consequatur a explicabo.', '2021-08-19 00:50:50', '2021-08-19 00:50:50'),
(9, 'Exercitationem aut unde et et. Fugiat tempore aut non nobis vel culpa. Distinctio voluptatum natus ratione qui velit accusamus possimus. Cumque accusamus quas temporibus.', 3110, 'Velit voluptas omnis eum aliquam dicta in et. Laborum voluptatem et fugit doloribus esse. Sequi eum commodi qui nisi. Ut rem commodi corporis dolorum esse. Ut molestiae et ut nam ut. Optio a eaque qui totam facilis eaque necessitatibus praesentium.', 81854, 9, 'Et omnis dignissimos nisi distinctio enim ea laudantium ut et voluptates eos quia maxime dolores id quia sed laboriosam nihil dicta.', '2021-08-19 00:50:50', '2021-08-19 00:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tax_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit3`
--

CREATE TABLE `unit3` (
  `unit_id` int(11) NOT NULL,
  `unit_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit3`
--

INSERT INTO `unit3` (`unit_id`, `unit_name`) VALUES
(1, 'kgs'),
(2, 'jerricans'),
(3, 'bottles'),
(4, 'Pieces'),
(5, 'Litres'),
(7, 'Bars');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Darby Bruen', 'admin@admin.com', '2021-08-19 00:50:34', '$2y$10$IeKBWRJDNm6BUfxvyDqokuCSr0CbDVB1VL.okp/RZYVisXFZChaHy', 'OoacYESeTHIN5yajbdxLGWUYGWjWLQTxO1rUuSHjXp7idA2tgNpi6mPaQTpw', '2021-08-19 00:50:34', '2021-08-19 00:50:34'),
(2, 'Oceane Gaylord', 'jmaggio@collier.biz', '2021-08-19 00:50:43', '$2y$10$nbbEYgxZguxTZoxnBf6TUOqq31QShW0ujIoY1IM4IncQII.kPrgoC', '2Rm1SprYRA', '2021-08-19 00:50:44', '2021-08-19 00:50:44'),
(3, 'Emil Mayert', 'brown.krajcik@schmeler.com', '2021-08-19 00:50:44', '$2y$10$MrPfNY0tQoy7pdYTXjalVeOJvXGLE/7jGLhkiCVg7sSUUNmKbyYwK', 'QSrzQDjFzI', '2021-08-19 00:50:44', '2021-08-19 00:50:44'),
(4, 'Dr. Lawson Lesch', 'hansen.richie@keeling.org', '2021-08-19 00:50:44', '$2y$10$b03uAKxcSQcOrzm6DtVwueLawIEfFcn6oJmX7qlJ39e67mmahlL7m', '5p3SJ5I9wo', '2021-08-19 00:50:44', '2021-08-19 00:50:44'),
(5, 'Prof. Antonio D\'Amore', 'nels20@gmail.com', '2021-08-19 00:50:44', '$2y$10$rtYwc3bped/VUPPZ8AnpmuaQXnMUGicysaklHl9yUOZTH79yuW3f.', 'w4Be7poeeu', '2021-08-19 00:50:44', '2021-08-19 00:50:44'),
(6, 'Clemmie Tillman DDS', 'nayeli39@kassulke.org', '2021-08-19 00:50:44', '$2y$10$sDUzGGwpffjClsUZLwodEO5dzuF13CCzRPpQThqEj3LxMdaLU2ycu', 'U9Cxrfk7nb', '2021-08-19 00:50:44', '2021-08-19 00:50:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets_accounts`
--
ALTER TABLE `assets_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_accounts_asset_types_id_foreign` (`asset_types_id`);

--
-- Indexes for table `asset_types`
--
ALTER TABLE `asset_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_stock`
--
ALTER TABLE `available_stock`
  ADD PRIMARY KEY (`stockDetails_id`),
  ADD KEY `Items` (`item_id`),
  ADD KEY `stock_id` (`stock_id`);

--
-- Indexes for table `category3`
--
ALTER TABLE `category3`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department3`
--
ALTER TABLE `department3`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `discounts3`
--
ALTER TABLE `discounts3`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `expeses_resturants`
--
ALTER TABLE `expeses_resturants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category` (`category_id`);

--
-- Indexes for table `item_categories`
--
ALTER TABLE `item_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `petty_cashes_expeses_resturant_id_foreign` (`expeses_resturant_id`);

--
-- Indexes for table `receipts_stock`
--
ALTER TABLE `receipts_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reciepts_res_product_id_foreign` (`res_product_id`);

--
-- Indexes for table `restaurant_requisitions`
--
ALTER TABLE `restaurant_requisitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_categories`
--
ALTER TABLE `res_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `res_products`
--
ALTER TABLE `res_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `res_products_res_category_id_foreign` (`res_category_id`);

--
-- Indexes for table `res_sales_tables`
--
ALTER TABLE `res_sales_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `res_sales_tables_res_product_id_foreign` (`res_product_id`);

--
-- Indexes for table `res_sections`
--
ALTER TABLE `res_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_clients_id_foreign` (`clients_id`),
  ADD KEY `sales_payment_types_id_foreign` (`payment_types_id`);

--
-- Indexes for table `stock_damages`
--
ALTER TABLE `stock_damages`
  ADD PRIMARY KEY (`damage_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `stock_discharge3`
--
ALTER TABLE `stock_discharge3`
  ADD PRIMARY KEY (`stockDischarge_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `stock_discharges`
--
ALTER TABLE `stock_discharges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_discharges_stock_table_id_foreign` (`stock_table_id`),
  ADD KEY `stock_discharges_res_section_id_foreign` (`res_section_id`);

--
-- Indexes for table `stock_entry`
--
ALTER TABLE `stock_entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `stock_table`
--
ALTER TABLE `stock_table`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stock_tables`
--
ALTER TABLE `stock_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_tables_item_category_id_foreign` (`item_category_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit3`
--
ALTER TABLE `unit3`
  ADD PRIMARY KEY (`unit_id`);

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
-- AUTO_INCREMENT for table `assets_accounts`
--
ALTER TABLE `assets_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_types`
--
ALTER TABLE `asset_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `available_stock`
--
ALTER TABLE `available_stock`
  MODIFY `stockDetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category3`
--
ALTER TABLE `category3`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department3`
--
ALTER TABLE `department3`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts3`
--
ALTER TABLE `discounts3`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `expeses_resturants`
--
ALTER TABLE `expeses_resturants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item_categories`
--
ALTER TABLE `item_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts_stock`
--
ALTER TABLE `receipts_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reciepts`
--
ALTER TABLE `reciepts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_requisitions`
--
ALTER TABLE `restaurant_requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `res_categories`
--
ALTER TABLE `res_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `res_products`
--
ALTER TABLE `res_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `res_sales_tables`
--
ALTER TABLE `res_sales_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `res_sections`
--
ALTER TABLE `res_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_damages`
--
ALTER TABLE `stock_damages`
  MODIFY `damage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_discharge3`
--
ALTER TABLE `stock_discharge3`
  MODIFY `stockDischarge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_discharges`
--
ALTER TABLE `stock_discharges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_entry`
--
ALTER TABLE `stock_entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock_table`
--
ALTER TABLE `stock_table`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_tables`
--
ALTER TABLE `stock_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit3`
--
ALTER TABLE `unit3`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets_accounts`
--
ALTER TABLE `assets_accounts`
  ADD CONSTRAINT `assets_accounts_asset_types_id_foreign` FOREIGN KEY (`asset_types_id`) REFERENCES `asset_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `petty_cashes`
--
ALTER TABLE `petty_cashes`
  ADD CONSTRAINT `petty_cashes_expeses_resturant_id_foreign` FOREIGN KEY (`expeses_resturant_id`) REFERENCES `expeses_resturants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reciepts`
--
ALTER TABLE `reciepts`
  ADD CONSTRAINT `reciepts_res_product_id_foreign` FOREIGN KEY (`res_product_id`) REFERENCES `res_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `res_products`
--
ALTER TABLE `res_products`
  ADD CONSTRAINT `res_products_res_category_id_foreign` FOREIGN KEY (`res_category_id`) REFERENCES `res_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `res_sales_tables`
--
ALTER TABLE `res_sales_tables`
  ADD CONSTRAINT `res_sales_tables_res_product_id_foreign` FOREIGN KEY (`res_product_id`) REFERENCES `res_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_clients_id_foreign` FOREIGN KEY (`clients_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_payment_types_id_foreign` FOREIGN KEY (`payment_types_id`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_discharges`
--
ALTER TABLE `stock_discharges`
  ADD CONSTRAINT `stock_discharges_res_section_id_foreign` FOREIGN KEY (`res_section_id`) REFERENCES `res_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_discharges_stock_table_id_foreign` FOREIGN KEY (`stock_table_id`) REFERENCES `stock_tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_tables`
--
ALTER TABLE `stock_tables`
  ADD CONSTRAINT `stock_tables_item_category_id_foreign` FOREIGN KEY (`item_category_id`) REFERENCES `item_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

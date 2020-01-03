-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2019 at 11:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_e`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'irfanchowdhury80@gmail.com', '202cb962ac59075b964b07152d234b70', 'Irfan Chowdhury', '01829498634', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'Women', 'This is Special Women Category', 1, NULL, NULL),
(3, 'Child', 'This is Specialy Child Category', 1, NULL, NULL),
(4, 'Shoe', 'This Show Category', 1, NULL, NULL),
(5, 'Electronics', 'This Is Electronics<span style=\"white-space:pre\">	</span>', 1, NULL, NULL),
(6, 'Others', 'This Is others', 1, NULL, NULL),
(7, 'Furniture', 'This Is Furniture', 1, NULL, NULL),
(8, 'Sprorts', 'This Is  Sports', 1, NULL, NULL),
(9, 'Cloths', 'This Is Clothes', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customer_id`, `customer_name`, `customer_email`, `password`, `customer_number`, `created_at`, `updated_at`) VALUES
(1, 'Irfan Chowdhury', 'irfanchowdhury80@gmail.com', '123', '01829498634', NULL, NULL),
(2, 'Arman Ul Alam', 'arman@gmail.com', '123', '123456789', NULL, NULL),
(3, 'Shahed Shuzon', 'shuzon@gmail.com', '123', '123456789', NULL, NULL),
(4, 'Kawsar Uddin', 'kawsar@gmail.com', '123', '01821234567', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacture_tbl`
--

CREATE TABLE `manufacture_tbl` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacture_tbl`
--

INSERT INTO `manufacture_tbl` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'SAMSUNG', 'This is Samsung Brand', 1, NULL, NULL),
(2, 'ZARA', 'zara pants', 1, NULL, NULL),
(3, 'OTOBI', 'Otobi Furniture', 1, NULL, NULL),
(4, 'Apple', 'apple brand', 1, NULL, NULL),
(5, 'Adidas', 'addidas brand<span style=\"white-space:pre\">	</span>', 1, NULL, NULL),
(6, 'Chillor Rose', 'Women Brand', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_10_224115_create_admin_tbl', 1),
(4, '2019_05_12_021710_create_category_tbl_table', 2),
(5, '2019_05_14_063606_create_manufacture_tbl_table', 3),
(6, '2019_05_14_105145_create_products_tbl_table', 4),
(7, '2019_05_15_103521_create_slider_tbl_table', 5),
(8, '2019_05_17_155005_create_customer_tbl_table', 6),
(9, '2019_05_18_085126_create_shipping_tbl_table', 7),
(10, '2019_05_22_174905_create_payment_tbl_table', 8),
(11, '2019_05_22_175107_create_order_tbl_table', 8),
(12, '2019_05_22_175228_create_order_details_tbl_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details_tbl`
--

INSERT INTO `order_details_tbl` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(10, 8, 4, 'Samsung Galaxy S4', '23000', '2', NULL, NULL),
(11, 9, 6, 'Iwaki_Floor_TV_Unit', '42000', '1', NULL, NULL),
(12, 10, 3, 'Samsung-Galaxy-S10e', '42000', '1', NULL, NULL),
(13, 10, 4, 'Samsung Galaxy S4', '23000', '2', NULL, NULL),
(14, 10, 6, 'Iwaki_Floor_TV_Unit', '42000', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(8, 4, 10, 9, '46,000.00', 'done', '2019-05-23 14:35:43', NULL),
(10, 2, 12, 11, '214,000.00', 'pending', '2019-05-23 21:17:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(9, 'handcash', 'pending', '2019-05-23 14:35:43', NULL),
(10, 'bkash', 'pending', '2019-05-23 14:41:18', NULL),
(11, 'handcash', 'pending', '2019-05-23 21:17:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `category_id`, `manufacture_id`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'Samsung-Galaxy-S10e', 5, 1, 'Nice', 'So_Beautiful', 42000.00, 'image/6qM6Dy5jnhkjt9Iurw0c.jpg', '5.2\' inc', 'Blach, White', 1, NULL, NULL),
(4, 'Samsung Galaxy S4', 5, 1, 'Nice', 'So_Beautiful', 23000.00, 'image/L4aevwzTjmgFcu5A56un.jpg', '5.7\' Inc', 'Red , green', 1, NULL, NULL),
(5, 'Dinning_table_6_Seater', 7, 3, 'Nice', 'So_Beautiful', 33000.00, 'image/0ZqDPiCrcWTTqbPUPnHz.jpg', '5.2\' inc', 'Blach, White', 1, NULL, NULL),
(6, 'Iwaki_Floor_TV_Unit', 7, 3, 'Nice', 'So_Beautiful', 42000.00, 'image/iI9J8mr2MGYyspIZJJnI.jpg', '32\'c inc', 'Red , green', 1, NULL, NULL),
(7, 'Living-Room-Accent-Chairs', 7, 3, 'Nice', 'So_Beautiful', 53000.00, 'image/NouUzBb6QAGNfYpSOVvY.jpg', '10\' Inc', 'Red , green', 1, NULL, NULL),
(8, 'IPhone-10', 5, 4, 'Nice', 'So_Beautiful', 62000.00, 'image/cBHoN9NGjZWTs8VQ5uu3.jpg', '5.2\' inc', 'Red , green', 1, NULL, NULL),
(9, 'Adidas-Human-Race', 8, 5, 'Nice', 'So_Beautiful', 9863.00, 'image/HjSl63Ir2zVsxSzXXk0s.jpg', '9\' inc', 'Blach, White', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_tbl`
--

CREATE TABLE `shipping_tbl` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_tbl`
--

INSERT INTO `shipping_tbl` (`shipping_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_mobile_number`, `shipping_city`, `created_at`, `updated_at`) VALUES
(1, 'shuzon@gmail.com', 'Shuzon', 'Chy', 'Raoujan', '12345678911', 'Chittagong', NULL, NULL),
(2, 'Irfanchowdhury80@gmail.com', 'Irfan', 'Chy', 'Chittagong', '01829498634', 'Chittagong', NULL, NULL),
(3, 'shuzon@gmail.com', 'Irfan', 'Chowdhury', 'Raoujan', '01829498634', 'Chittagong', NULL, NULL),
(4, 'shuzon@gmail.com', 'Shuzon', 'Chowdhury', 'Chittagong', '12345678911', 'Chittagong', NULL, NULL),
(5, 'shuzon@gmail.com', 'Irfan', 'Chy', 'Raoujan', '12345678911', 'Muradpur', NULL, NULL),
(6, 'shuzon@gmail.com', 'Irfan', 'Chowdhury', 'Muradpur', '01829498634', 'Chittagong', NULL, NULL),
(7, 'Irfanchowdhury80@gmail.com', 'Irfan', 'Chowdhury', 'Muradpur', '01829498634', 'Chittagong', NULL, NULL),
(8, 'promichowdhury80@gmail.com', 'Promi', 'Chowdhury', 'muradpur', '01993678742', 'Chittagong', NULL, NULL),
(9, 'shahed@gmail.com', 'Shahed', 'Sultan', 'Kapashgula', '123456789', 'Chittagong', NULL, NULL),
(10, 'kawsar@gmail.com', 'Kawsar', 'Uddin', 'Bohoddarhat', '01821234567', 'Chittagong', NULL, NULL),
(11, 'Irfanchowdhury80@gmail.com', 'Irfan', 'Chowdhury', 'Muradpur', '01829498634', 'Chittagong', NULL, NULL),
(12, 'Irfanchowdhury80@gmail.com', 'Irfan', 'Chowdhury', 'Muradpur', '01829498634', 'Chittagong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE `slider_tbl` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(8, 'image/slider/DV7qayQ3hp0qjuSXX5wJ.jpg', '1', NULL, NULL),
(10, 'image/slider/G5SvmCuK81JQ76FTiCrT.png', '1', NULL, NULL),
(11, 'image/slider/2a2McB12zMaMwj5tuoFN.jpg', '1', NULL, NULL),
(12, 'image/slider/3kL1vLrc27LRV8XUao0p.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufacture_tbl`
--
ALTER TABLE `manufacture_tbl`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details_tbl`
--
ALTER TABLE `order_details_tbl`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping_tbl`
--
ALTER TABLE `shipping_tbl`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  ADD PRIMARY KEY (`slider_id`);

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
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `manufacture_tbl`
--
ALTER TABLE `manufacture_tbl`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details_tbl`
--
ALTER TABLE `order_details_tbl`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shipping_tbl`
--
ALTER TABLE `shipping_tbl`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slider_tbl`
--
ALTER TABLE `slider_tbl`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

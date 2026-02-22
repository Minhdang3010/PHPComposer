-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2026 at 07:07 AM
-- Server version: 5.7.39
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mocart_pro_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT '#',
  `button_text` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT 'Mua ngay',
  `position` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT 'hero',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `content`, `image`, `link`, `button_text`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khuyến mãi công nghệ', 'Laptop Mỏng Nhẹ <br> Giá Tốt Nhất', '', 'small-banner-1.jpg', 'product/show/1', 'Mua ngay', 'small', 1, '2026-01-13 08:58:09', '2026-01-13 16:58:05'),
(2, 'Ưu đãi cực hot', 'Bộ Sưu Tập Tai Nghe <br> Đang Giảm Giá ', '', 'small-banner-2.jpg', 'product', 'Khám phá ngay', 'small', 1, '2026-01-13 08:58:09', '2026-01-13 15:49:38'),
(3, 'Decor Trang Trí', 'Góc làm việc hiện đại <br>\r\nlên đến 50%', '', 'small-banner-3.jpg', 'product', 'Khám phá ngay', 'small', 1, '2026-01-13 08:58:09', '2026-01-13 15:51:43'),
(6, '', '', '', 'small-banner-4.jpg', '', '', 'small', 1, '2026-01-13 08:58:09', '2026-01-14 04:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `slug`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple-logo.png', 'apple', NULL, 1, '2026-01-13 08:58:09', '2026-01-15 01:58:56'),
(2, 'Asus', 'asus.jpg', 'asus', NULL, 1, '2026-01-13 08:58:09', '2026-01-15 01:59:04'),
(3, 'Dell', 'dell-logo.png', 'dell', NULL, 1, '2026-01-13 08:58:09', '2026-01-15 01:59:19'),
(4, 'HP', 'HP_logo.png', 'hp', NULL, 1, '2026-01-13 08:58:09', '2026-01-15 02:00:02'),
(5, 'Logitech', 'logo-logitech.jpg', 'logitech', NULL, 1, '2026-01-13 08:58:09', '2026-01-15 02:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laptop & Máy tính', 'electronics.svg', 'laptop-may-tinh', 1, '2026-01-13 09:03:39', '2026-01-13 09:03:39'),
(2, 'Tai nghe & Loa', 'music.svg', 'tai-nghe-loa', 1, '2026-01-13 09:03:39', '2026-01-13 09:03:39'),
(3, 'Bàn phím & Chuột', 'gift.svg', 'ban-phim-chuot', 1, '2026-01-13 09:03:39', '2026-01-13 09:03:39'),
(4, 'Bàn ghế Gaming', 'furniture.svg', 'ban-ghe-gaming', 1, '2026-01-13 09:03:39', '2026-01-13 09:03:39'),
(5, 'Máy chơi game', 'toy.svg', 'may-choi-game', 1, '2026-01-13 09:03:39', '2026-01-13 09:03:39'),
(6, 'Phụ kiện Mobile', 'phone.svg', 'phu-kien-mobile', 1, '2026-01-25 13:43:50', '2026-01-25 13:43:50'),
(7, 'Thiết bị mạng', 'router.svg', 'thiet-bi-mang', 1, '2026-01-25 13:43:50', '2026-01-25 13:43:50'),
(8, 'Đồng hồ thông minh', 'watch.svg', 'dong-ho-thong-minh', 1, '2026-01-25 13:43:50', '2026-01-25 13:43:50'),
(9, 'Camera & Webcam', 'camera.svg', 'camera-webcam', 1, '2026-01-25 13:43:50', '2026-01-25 13:43:50'),
(10, 'Ổ cứng & Lưu trữ', 'hdd.svg', 'o-cung-luu-tru', 1, '2026-01-25 13:43:50', '2026-01-25 13:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`) VALUES
(1, 'Space Gray', '#717378'),
(2, 'Silver', '#C0C0C0'),
(3, 'Black', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0: Fixed Amount, 1: Percentage',
  `value` decimal(15,2) NOT NULL,
  `min_order_value` decimal(15,2) DEFAULT '0.00',
  `expires_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL COMMENT 'Mô tả ngắn gọn hiển thị cho khách',
  `is_free_ship` tinyint(1) DEFAULT '0' COMMENT '1: Là mã Freeship, 0: Mã giảm giá thường',
  `usage_limit` int(11) DEFAULT '1000' COMMENT 'Tổng số lượt có thể dùng',
  `used_count` int(11) DEFAULT '0' COMMENT 'Đã dùng bao nhiêu lượt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `min_order_value`, `expires_at`, `status`, `description`, `is_free_ship`, `usage_limit`, `used_count`) VALUES
(1, 'WELCOME50', 1, '50.00', '0.00', '2026-12-31 23:59:59', 1, 'Giảm 50% cho khách hàng mới', 0, 100, 12),
(2, 'FREESHIP', 0, '30.00', '200.00', '2026-12-31 23:59:59', 1, 'Miễn phí vận chuyển cho đơn từ $200', 1, 500, 450),
(3, 'SALE10', 0, '10.00', '0.00', '2026-12-31 23:59:59', 1, 'Giảm $10 cho mọi đơn hàng', 0, 1000, 150),
(4, 'SALE20PERCENT', 1, '20.00', '100.00', '2026-12-31 23:59:59', 1, 'Giảm 20% cho đơn hàng từ $100', 0, 100, 0),
(5, 'BIGSAVE100', 0, '100.00', '500.00', '2026-12-31 23:59:59', 1, 'Giảm thẳng $100 cho đơn hàng từ $500', 0, 50, 0),
(6, 'FREESHIP2026', 0, '15.00', '50.00', '2026-12-31 23:59:59', 1, 'Miễn phí vận chuyển cho đơn từ $50', 1, 1000, 0),
(7, 'EXPIRED_CODE', 1, '10.00', '0.00', '2025-01-01 00:00:00', 1, 'Mã này đã hết hạn dùng', 0, 100, 5),
(8, 'SOLDOUT', 0, '50.00', '0.00', '2026-12-31 23:59:59', 1, 'Mã giảm $50 nhưng đã hết lượt', 0, 10, 10),
(9, 'DISABLED_CODE', 1, '15.00', '0.00', '2026-12-31 23:59:59', 0, 'Mã này không hoạt động', 0, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `subtotal` decimal(15,2) NOT NULL COMMENT 'Tổng tiền hàng trước giảm',
  `shipping_fee` decimal(15,2) DEFAULT '0.00',
  `discount_amount` decimal(15,2) DEFAULT '0.00',
  `total_price` decimal(15,2) NOT NULL COMMENT 'Thực thu: sub + ship - discount',
  `coupon_code` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL COMMENT 'Lưu code để truy vết, không chỉ ID',
  `payment_method` tinyint(4) DEFAULT '0' COMMENT '0: COD, 1: Banking, 2: Momo',
  `payment_status` tinyint(4) DEFAULT '0' COMMENT '0: Unpaid, 1: Paid',
  `status` tinyint(4) DEFAULT '0' COMMENT '0: Pending, 1: Confirmed, 2: Shipping, 3: Completed, 4: Cancelled',
  `note` mediumtext COLLATE utf8mb4_vietnamese_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address_id`, `order_code`, `subtotal`, `shipping_fee`, `discount_amount`, `total_price`, `coupon_code`, `payment_method`, `payment_status`, `status`, `note`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'DH2477', '1700.00', '0.00', '0.00', '1700.00', NULL, 0, 0, 0, '', '2026-02-03 07:56:20', '2026-02-03 07:56:20'),
(3, 1, 4, 'DH6056', '3400.00', '0.00', '0.00', '3400.00', NULL, 0, 0, 0, '', '2026-02-03 08:08:38', '2026-02-03 08:08:38'),
(4, 1, 5, 'DH8947', '850.00', '0.00', '0.00', '850.00', NULL, 0, 0, 0, '', '2026-02-03 08:56:22', '2026-02-03 08:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sku` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `variant_id`, `product_name`, `sku`, `quantity`, `price`) VALUES
(1, 2, 1, 'Macbook Air M2', 'SKU-1', 2, '850.00'),
(2, 3, 1, 'Macbook Air M2', 'SKU-1', 4, '850.00'),
(3, 4, 2, 'Macbook Pro M3', 'SKU-2', 1, '850.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_vietnamese_ci,
  `view_count` int(11) DEFAULT '0',
  `sold_count` int(11) DEFAULT '0' COMMENT 'Số lượng đã bán (Fake logic)',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `slug`, `thumbnail`, `description`, `view_count`, `sold_count`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Macbook Air M2', 'macbook-air-m2', 'macbook-air-m2.jpg', NULL, 0, 700, 1, '2026-01-13 08:58:09', '2026-01-15 16:53:03'),
(2, 1, 1, 'Macbook Pro M3', 'macbook-pro-m3', 'Macbook Pro M3.jpg', NULL, 0, 890, 1, '2026-01-13 08:58:09', '2026-01-15 08:19:10'),
(3, 2, 1, 'Airpods Pro 2', 'airpods-pro-2', 'Airpods Pro 2.jpg', NULL, 0, 560, 1, '2026-01-13 08:58:09', '2026-01-15 08:19:10'),
(4, 3, 1, 'Magic Mouse 2', 'magic-mouse-2', 'Magic Mouse 2.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(5, 2, 1, 'Airpods 3', 'airpods-3', 'Airpods 3.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(6, 1, 2, 'ROG Zephyrus G14', 'rog-zephyrus-g14', 'ROG Zephyrus G14.jpg', NULL, 0, 450, 1, '2026-01-13 08:58:09', '2026-01-15 08:19:10'),
(7, 1, 2, 'Asus Vivobook 15', 'asus-vivobook-15', 'Asus Vivobook 15.jpg', NULL, 0, 300, 1, '2026-01-13 08:58:09', '2026-01-15 08:19:10'),
(8, 3, 2, 'Chuột ROG Gladius', 'chuot-rog-gladius', 'Chuột ROG Gladius.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(9, 3, 2, 'Phím ROG Strix', 'phim-rog-strix', 'Phím ROG Strix.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(10, 5, 2, 'ROG Ally', 'rog-ally', 'ROG Ally.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(11, 1, 3, 'Dell XPS 13', 'dell-xps-13', 'Dell XPS 13.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(12, 1, 3, 'Dell Inspiron 14', 'dell-inspiron-14', 'Dell Inspiron 14.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(13, 1, 3, 'Alienware M16', 'alienware-m16', 'Alienware M16.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(14, 3, 3, 'Chuột Dell MS3320', 'chuot-dell-ms3320', 'Chuột Dell MS3320.webp', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(15, 3, 3, 'Phím Dell KB216', 'phim-dell-kb216', 'Phím Dell KB216.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(16, 1, 4, 'HP Pavilion 15', 'hp-pavilion-15', 'HP Pavilion 15.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(17, 1, 4, 'HP Omen 16', 'hp-omen-16', 'HP Omen 16.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(18, 1, 4, 'HP Envy x360', 'hp-envy-x360', 'HP Envy x360.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(19, 2, 4, 'Loa HP 400', 'loa-hp-400', 'Loa HP 400.webp', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(20, 3, 4, 'Chuột HP 150', 'chuot-hp-150', 'Chuột HP 150.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(21, 3, 5, 'Chuột G Pro X Superlight', 'g-pro-x-superlight', 'Chuột G Pro X Superlight.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(22, 3, 5, 'Phím G915 TKL', 'phim-g915-tkl', 'Phím G915 TKL.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(23, 2, 5, 'Tai nghe G733 RGB', 'tai-nghe-g733-rgb', 'Tai nghe G733 RGB.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(24, 2, 5, 'Loa Logitech Z906', 'loa-logitech-z906', 'Loa Logitech Z906.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08'),
(25, 3, 5, 'Webcam Logitech C922', 'webcam-logitech-c922', 'Webcam Logitech C922.jpg', NULL, 0, 0, 1, '2026-01-13 08:58:09', '2026-01-15 03:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL DEFAULT '5',
  `comment` text COLLATE utf8mb4_vietnamese_ci,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `sku` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `sale_price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`, `size_id`, `sku`, `price`, `sale_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'SKU-1', '1111111.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-30 08:58:09'),
(2, 2, NULL, NULL, 'SKU-2', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(3, 6, NULL, NULL, 'SKU-6', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(4, 7, NULL, NULL, 'SKU-7', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(5, 11, NULL, NULL, 'SKU-11', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(6, 12, NULL, NULL, 'SKU-12', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(7, 13, NULL, NULL, 'SKU-13', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(8, 16, NULL, NULL, 'SKU-16', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(9, 17, NULL, NULL, 'SKU-17', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(10, 18, NULL, NULL, 'SKU-18', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(11, 3, NULL, NULL, 'SKU-3', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(12, 5, NULL, NULL, 'SKU-5', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(13, 19, NULL, NULL, 'SKU-19', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(14, 23, NULL, NULL, 'SKU-23', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(15, 24, NULL, NULL, 'SKU-24', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(16, 4, NULL, NULL, 'SKU-4', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(17, 8, NULL, NULL, 'SKU-8', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(18, 9, NULL, NULL, 'SKU-9', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(19, 14, NULL, NULL, 'SKU-14', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(20, 15, NULL, NULL, 'SKU-15', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(21, 20, NULL, NULL, 'SKU-20', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(22, 21, NULL, NULL, 'SKU-21', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(23, 22, NULL, NULL, 'SKU-22', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(24, 25, NULL, NULL, 'SKU-25', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-13 08:58:09'),
(25, 10, NULL, NULL, 'SKU-10', '1000.00', '850.00', 100, '2026-01-13 08:58:09', '2026-01-29 08:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `config_key` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_vietnamese_ci,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'home_onsale_limit', '3', 'Số lượng sản phẩm hiển thị ở cột Giảm giá', '2026-01-15 08:19:10', '2026-01-17 08:20:29'),
(2, 'home_bestseller_limit', '3', 'Số lượng sản phẩm hiển thị ở cột Bán chạy', '2026-01-15 08:19:10', '2026-01-15 08:19:10'),
(3, 'home_toprated_limit', '3', 'Số lượng sản phẩm hiển thị ở cột Đánh giá cao', '2026-01-15 08:19:10', '2026-01-15 08:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`) VALUES
(1, '13 inch'),
(2, '14 inch'),
(3, '16 inch'),
(4, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `role` tinyint(4) DEFAULT '0' COMMENT '0: Customer, 1: Admin, 2: Staff',
  `balance` decimal(15,2) DEFAULT '0.00',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đỗ Minh Đăng', 'dominhdang3010@gmail.com', '$2y$10$3djqJor45Fna3q7T6amLXOsF2uqQ5Onu22uhPPYBn6N0Mb5oRDxCW', 0, '0.00', 1, '2026-01-25 12:58:27', '2026-01-25 12:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address_line` mediumtext COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `district` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ward` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `is_default` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `full_name`, `phone`, `address_line`, `city`, `district`, `ward`, `is_default`) VALUES
(4, 1, 'Đỗ Minh Đăng', '0982563450', '30 Hà Thị Khiêm', NULL, NULL, NULL, 0),
(5, 1, 'Đỗ Minh Đăng', '0982563450', 'FPT', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `is_used` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_code` (`order_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_order_address` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_key` (`config_key`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_address` FOREIGN KEY (`address_id`) REFERENCES `user_addresses` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variants_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_variants_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

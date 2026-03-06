-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2026 at 05:27 PM
-- Server version: 8.4.3
-- PHP Version: 8.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monowear`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blocks`
--

CREATE TABLE `tbl_blocks` (
  `block_id` int NOT NULL,
  `block_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_blocks`
--

INSERT INTO `tbl_blocks` (`block_id`, `block_name`, `block_code`, `block_content`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Thông tin header', 'info_header', '<p style=\"text-align:center\"><strong>Đ&acirc;y l&agrave; Header</strong></p>\r\n', 1, 1764513029, 1764636540),
(3, 'Thông tin footer', 'info_footer', '<p style=\"text-align:center\"><strong>Đ&acirc;y l&agrave; Footer</strong></p>\r\n', 1, 1764512081, 0),
(4, 'Thông tin liên hệ', 'info_contact', '<p style=\"text-align:center\"><strong>Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i</strong></p>\r\n', 1, 1764512109, 0),
(5, 'Hỗ trợ đổi trả', 'support_trade', '<p style=\"text-align:center\"><strong>Đổi trả tại đ&acirc;y</strong></p>\r\n', 1, 1764512142, 0),
(6, 'Chính sách bảo hành', 'warranty_policy', '<p>Bảo h&agrave;nh tại đ&acirc;y</p>\r\n', 1, 1764512194, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `active_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repass_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_member` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `username`, `password`, `fullname`, `email`, `tel`, `address`, `created_at`, `updated_at`, `active_token`, `repass_token`, `is_active`, `is_member`) VALUES
(11, NULL, '25f9e794323b453885f5181f1b624d0b', 'luuducvy', 'luuvy15899@gmail.com', 782199911, 'TP.HCM', 1766045462, 1766994172, NULL, '2f36fb921053c64af4aa3755ca7ab891', '0', '0'),
(35, 'luuvy15899', '25f9e794323b453885f5181f1b624d0b', 'luuducvy', 'luuvy15899@gmail.com', 782199911, '123123d1wadwadwa', 1766994104, 1766994172, '47f9f7df2fb8327fee3823fd3ccb1239', '2f36fb921053c64af4aa3755ca7ab891', '1', '1'),
(36, NULL, NULL, 'Lưu Đức Vỹ', 'luuvy15899@gmail.com', 782199911, 'TP.HCM', 1768919578, NULL, NULL, NULL, '0', '0'),
(37, NULL, NULL, 'Lưu Đức Vỹ', 'luuvy15899@gmail.com', 782199911, 'TP.HCM', 1769076587, NULL, NULL, NULL, '0', '0'),
(38, NULL, NULL, 'Lưu Đức Vỹ', 'luuvy15899@gmail.com', 782199911, 'tphcmaaaaaa', 1772281733, NULL, NULL, NULL, '0', '0'),
(39, NULL, NULL, 'aaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaa@gmail.com', 782199911, 'aaaaaaaa', 1772282478, NULL, NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `image_id` int NOT NULL,
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int NOT NULL,
  `object_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_id` int DEFAULT NULL,
  `is_main` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`image_id`, `image_url`, `file_name`, `file_size`, `object_type`, `object_id`, `is_main`, `created_at`, `user_id`) VALUES
(960, '../public/uploads/images/product/ao-thun-trang-tron.avif', 'ao-thun-trang-tron.avif', 16568, 'product', 67, '1', 1764152093, 1),
(961, '../public/uploads/images/product/ao-thun-trang-tron-details-1.avif', 'ao-thun-trang-tron-details-1.avif', 16322, 'product', 67, '0', 1764152097, 1),
(962, '../public/uploads/images/product/ao-thun-trang-tron-details-2.avif', 'ao-thun-trang-tron-details-2.avif', 9147, 'product', 67, '0', 1764152097, 1),
(963, '../public/uploads/images/product/ao-thun-trang-tron-details-3.avif', 'ao-thun-trang-tron-details-3.avif', 13225, 'product', 67, '0', 1764152097, 1),
(964, '../public/uploads/images/product/ao-thun-trang-tron-details-4.jpg', 'ao-thun-trang-tron-details-4.jpg', 95481, 'product', 67, '0', 1764152097, 1),
(965, '../public/uploads/images/product/short-kaki.avif', 'short-kaki.avif', 20782, 'product', 68, '1', 1764152176, 1),
(966, '../public/uploads/images/product/short-kaki-details-1.avif', 'short-kaki-details-1.avif', 17153, 'product', 68, '0', 1764152182, 1),
(967, '../public/uploads/images/product/short-kaki-details-2.avif', 'short-kaki-details-2.avif', 18179, 'product', 68, '0', 1764152182, 1),
(968, '../public/uploads/images/product/short-kaki-details-3.avif', 'short-kaki-details-3.avif', 109517, 'product', 68, '0', 1764152182, 1),
(969, '../public/uploads/images/product/short-kaki-details-4.avif', 'short-kaki-details-4.avif', 68541, 'product', 68, '0', 1764152182, 1),
(970, '../public/uploads/images/product/short-travel.avif', 'short-travel.avif', 9384, 'product', 69, '1', 1764152449, 1),
(971, '../public/uploads/images/product/short-travel-details-1.avif', 'short-travel-details-1.avif', 11431, 'product', 69, '0', 1764152455, 1),
(972, '../public/uploads/images/product/short-travel-details-2.avif', 'short-travel-details-2.avif', 39964, 'product', 69, '0', 1764152455, 1),
(973, '../public/uploads/images/product/short-travel-details-3.avif', 'short-travel-details-3.avif', 29824, 'product', 69, '0', 1764152455, 1),
(974, '../public/uploads/images/product/short-travel-details-4.avif', 'short-travel-details-4.avif', 23704, 'product', 69, '0', 1764152455, 1),
(1096, '../public/uploads/images/slider/slider.avif', 'slider.avif', 25170, 'slider', 21, '1', 1764666524, 1),
(1097, '../public/uploads/images/slider/slider2.avif', 'slider2.avif', 27839, 'slider', 22, '1', 1764666569, 1),
(1132, '../public/uploads/images/product/tat-co-trung-1.avif', 'tat-co-trung-1.avif', 22956, 'product', 73, '1', 1764937539, 1),
(1133, '../public/uploads/images/product/tat-co-trung-2.avif', 'tat-co-trung-2.avif', 56583, 'product', 73, '0', 1764937544, 1),
(1134, '../public/uploads/images/product/tat-co-trung-3.avif', 'tat-co-trung-3.avif', 21140, 'product', 73, '0', 1764937544, 1),
(1135, '../public/uploads/images/product/tat-co-trung-4.avif', 'tat-co-trung-4.avif', 23047, 'product', 73, '0', 1764937544, 1),
(1136, '../public/uploads/images/product/tat-co-trung-5.avif', 'tat-co-trung-5.avif', 74059, 'product', 73, '0', 1764937544, 1),
(1137, '../public/uploads/images/product/tat-chay-bo-co-ngan-active-cam-1.avif', 'tat-chay-bo-co-ngan-active-cam-1.avif', 27822, 'product', 74, '1', 1764938440, 1),
(1138, '../public/uploads/images/product/tat-chay-bo-co-ngan-active-cam-1-Copy(1).avif', 'tat-chay-bo-co-ngan-active-cam-1-Copy(1).avif', 27822, 'product', 74, '0', 1764938444, 1),
(1139, '../public/uploads/images/product/tat-chay-bo-co-ngan-active-cam-2.avif', 'tat-chay-bo-co-ngan-active-cam-2.avif', 32140, 'product', 74, '0', 1764938444, 1),
(1140, '../public/uploads/images/product/tat-chay-bo-co-ngan-active-cam-3.avif', 'tat-chay-bo-co-ngan-active-cam-3.avif', 44033, 'product', 74, '0', 1764938444, 1),
(1141, '../public/uploads/images/product/tat-chay-bo-co-ngan-active-cam-4.avif', 'tat-chay-bo-co-ngan-active-cam-4.avif', 33361, 'product', 74, '0', 1764938444, 1),
(1207, '../public/uploads/images/product/ao-dai-tay-cotton-compact-nau-chicory-coffee-1.avif', 'ao-dai-tay-cotton-compact-nau-chicory-coffee-1.avif', 15690, 'product', 85, '1', 1765096415, 1),
(1208, '../public/uploads/images/product/ao-dai-tay-cotton-compact-nau-chicory-coffee-2.avif', 'ao-dai-tay-cotton-compact-nau-chicory-coffee-2.avif', 15635, 'product', 85, '0', 1765096422, 1),
(1209, '../public/uploads/images/product/ao-dai-tay-cotton-compact-nau-chicory-coffee-3.avif', 'ao-dai-tay-cotton-compact-nau-chicory-coffee-3.avif', 38833, 'product', 85, '0', 1765096422, 1),
(1210, '../public/uploads/images/product/ao-dai-tay-cotton-compact-nau-chicory-coffee-4.avif', 'ao-dai-tay-cotton-compact-nau-chicory-coffee-4.avif', 20492, 'product', 85, '0', 1765096422, 1),
(1211, '../public/uploads/images/product/ao-dai-tay-cotton-compact-nau-chicory-coffee-5.avif', 'ao-dai-tay-cotton-compact-nau-chicory-coffee-5.avif', 16937, 'product', 85, '0', 1765096422, 1),
(1212, '../public/uploads/images/product/ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-3-den_83.avif', 'ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-3-den_83.avif', 11682, 'product', 86, '1', 1765096546, 1),
(1213, '../public/uploads/images/product/ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-4-den_68.avif', 'ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-4-den_68.avif', 13940, 'product', 86, '0', 1765096552, 1),
(1214, '../public/uploads/images/product/ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-977-den.avif', 'ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-977-den.avif', 15591, 'product', 86, '0', 1765096552, 1),
(1215, '../public/uploads/images/product/ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-985-den.avif', 'ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-985-den.avif', 14690, 'product', 86, '0', 1765096552, 1),
(1216, '../public/uploads/images/product/ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-997-den.avif', 'ao-giu-nhiet-mac-trong-essential-co-trung-brush-poly-997-den.avif', 13694, 'product', 86, '0', 1765096552, 1),
(1437, '../public/uploads/images/product/24CMCW.SM007_-_Xam_3.avif', '24CMCW.SM007_-_Xam_3.avif', 18013, 'product', 107, '1', 1765247967, 1),
(1438, '../public/uploads/images/product/24CMCW.SM007_-_Xam_2.avif', '24CMCW.SM007_-_Xam_2.avif', 12802, 'product', 107, '0', 1765247972, 1),
(1439, '../public/uploads/images/product/24CMCW.SM007_-_Xam_4.avif', '24CMCW.SM007_-_Xam_4.avif', 78062, 'product', 107, '0', 1765247972, 1),
(1440, '../public/uploads/images/product/24CMCW.SM007_-_Xam_7.avif', '24CMCW.SM007_-_Xam_7.avif', 16163, 'product', 107, '0', 1765247972, 1),
(1441, '../public/uploads/images/product/24CMCW.SM007_-_Xam_8.avif', '24CMCW.SM007_-_Xam_8.avif', 82265, 'product', 107, '0', 1765247972, 1),
(1452, '../public/uploads/images/product/ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-1.avif', 'ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-1.avif', 12187, 'product', 108, '1', 1765248219, 1),
(1453, '../public/uploads/images/product/ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-2.avif', 'ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-2.avif', 5193, 'product', 108, '0', 1765248223, 1),
(1454, '../public/uploads/images/product/ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-3.avif', 'ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-3.avif', 13173, 'product', 108, '0', 1765248223, 1),
(1455, '../public/uploads/images/product/ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-4.avif', 'ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-4.avif', 11562, 'product', 108, '0', 1765248223, 1),
(1456, '../public/uploads/images/product/ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-5.avif', 'ao-so-mi-essentials-100-cotton-dai-tay-mem-mai2-xanh-navy-5.avif', 11513, 'product', 108, '0', 1765248223, 1),
(1457, '../public/uploads/images/product/ao-so-mi-nam-casual-ke-soc-3-xanh_78.avif', 'ao-so-mi-nam-casual-ke-soc-3-xanh_78.avif', 38615, 'product', 109, '1', 1765248284, 1),
(1458, '../public/uploads/images/product/ao-so-mi-nam-casual-ke-soc-4-xanh_86.avif', 'ao-so-mi-nam-casual-ke-soc-4-xanh_86.avif', 34189, 'product', 109, '0', 1765248289, 1),
(1459, '../public/uploads/images/product/ao-so-mi-nam-casual-ke-soc-348-xanh.avif', 'ao-so-mi-nam-casual-ke-soc-348-xanh.avif', 272692, 'product', 109, '0', 1765248289, 1),
(1460, '../public/uploads/images/product/ao-so-mi-nam-casual-ke-soc-351-xanh.avif', 'ao-so-mi-nam-casual-ke-soc-351-xanh.avif', 17660, 'product', 109, '0', 1765248289, 1),
(1461, '../public/uploads/images/product/ao-so-mi-nam-casual-ke-soc-soc-xanh-trang-_1-2.avif', 'ao-so-mi-nam-casual-ke-soc-soc-xanh-trang-_1-2.avif', 26425, 'product', 109, '0', 1765248289, 1),
(1462, '../public/uploads/images/product/ao-polo-nam-cafe-den-1_84.avif', 'ao-polo-nam-cafe-den-1_84.avif', 24448, 'product', 110, '1', 1765248548, 1),
(1463, '../public/uploads/images/product/ao-polo-nam-cafe-den-2_55.avif', 'ao-polo-nam-cafe-den-2_55.avif', 5131, 'product', 110, '0', 1765248552, 1),
(1464, '../public/uploads/images/product/ao-polo-nam-cafe-den-3_82.avif', 'ao-polo-nam-cafe-den-3_82.avif', 20670, 'product', 110, '0', 1765248552, 1),
(1465, '../public/uploads/images/product/ao-polo-nam-cafe-den-4_13.avif', 'ao-polo-nam-cafe-den-4_13.avif', 18022, 'product', 110, '0', 1765248552, 1),
(1466, '../public/uploads/images/product/ao-polo-nam-cafe-den-5_33.avif', 'ao-polo-nam-cafe-den-5_33.avif', 51785, 'product', 110, '0', 1765248552, 1),
(1467, '../public/uploads/images/product/ao-polo-nam-premium-cotton-linen-1-_3-hong.avif', 'ao-polo-nam-premium-cotton-linen-1-_3-hong.avif', 30537, 'product', 111, '1', 1765248590, 1),
(1468, '../public/uploads/images/product/ao-polo-nam-premium-cotton-linen-1-_4-hong.avif', 'ao-polo-nam-premium-cotton-linen-1-_4-hong.avif', 37376, 'product', 111, '0', 1765248594, 1),
(1469, '../public/uploads/images/product/ao-polo-nam-premium-cotton-linen-1-Hong_3-2.avif', 'ao-polo-nam-premium-cotton-linen-1-Hong_3-2.avif', 72544, 'product', 111, '0', 1765248594, 1),
(1470, '../public/uploads/images/product/ao-polo-nam-premium-cotton-linen-Hong_3.avif', 'ao-polo-nam-premium-cotton-linen-Hong_3.avif', 134348, 'product', 111, '0', 1765248594, 1),
(1471, '../public/uploads/images/product/ao-polo-nam-premium-cotton-linen-Hong-1_1-2.avif', 'ao-polo-nam-premium-cotton-linen-Hong-1_1-2.avif', 42536, 'product', 111, '0', 1765248594, 1),
(1472, '../public/uploads/images/product/quan-chino-nam-7-inch-410-trang.avif', 'quan-chino-nam-7-inch-410-trang.avif', 13668, 'product', 112, '1', 1765261723, 1),
(1473, '../public/uploads/images/product/quan-chino-nam-7-inch-415-trang_13.avif', 'quan-chino-nam-7-inch-415-trang_13.avif', 10920, 'product', 112, '0', 1765261736, 1),
(1474, '../public/uploads/images/product/quan-chino-nam-7-inch-418-trang_68.avif', 'quan-chino-nam-7-inch-418-trang_68.avif', 22954, 'product', 112, '0', 1765261736, 1),
(1475, '../public/uploads/images/product/quan-chino-nam-7-inch-428-trang.avif', 'quan-chino-nam-7-inch-428-trang.avif', 9480, 'product', 112, '0', 1765261736, 1),
(1476, '../public/uploads/images/product/quan-chino-nam-7-inch-trang-1-1.avif', 'quan-chino-nam-7-inch-trang-1-1.avif', 7910, 'product', 112, '0', 1765261736, 1),
(1477, '../public/uploads/images/product/quan-short-phoi-mau-the-thao-tu-hao-viet-nam-1-_9-den.avif', 'quan-short-phoi-mau-the-thao-tu-hao-viet-nam-1-_9-den.avif', 70925, 'product', 113, '1', 1765261879, 1),
(1478, '../public/uploads/images/product/quan-short-phoi-mau-the-thao-tu-hao-viet-nam-1-_10-den.avif', 'quan-short-phoi-mau-the-thao-tu-hao-viet-nam-1-_10-den.avif', 25308, 'product', 113, '0', 1765261885, 1),
(1479, '../public/uploads/images/product/quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-080-den.avif', 'quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-080-den.avif', 19582, 'product', 113, '0', 1765261885, 1),
(1480, '../public/uploads/images/product/quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-084-den.avif', 'quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-084-den.avif', 43145, 'product', 113, '0', 1765261885, 1),
(1481, '../public/uploads/images/product/quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-089-den.avif', 'quan-short-the-thao-phoi-mau-the-thao-tu-hao-viet-nam-089-den.avif', 30820, 'product', 113, '0', 1765261885, 1),
(1482, '../public/uploads/images/product/quan-the-thao-nam-7-ultra-short-xanh-forest-night-1.avif', 'quan-the-thao-nam-7-ultra-short-xanh-forest-night-1.avif', 23992, 'product', 114, '1', 1765261990, 1),
(1483, '../public/uploads/images/product/quan-the-thao-nam-7-ultra-short-xanh-forest-night-2.avif', 'quan-the-thao-nam-7-ultra-short-xanh-forest-night-2.avif', 12756, 'product', 114, '0', 1765261995, 1),
(1484, '../public/uploads/images/product/quan-the-thao-nam-7-ultra-short-xanh-forest-night-3.avif', 'quan-the-thao-nam-7-ultra-short-xanh-forest-night-3.avif', 27490, 'product', 114, '0', 1765261995, 1),
(1485, '../public/uploads/images/product/quan-the-thao-nam-7-ultra-short-xanh-forest-night-4.avif', 'quan-the-thao-nam-7-ultra-short-xanh-forest-night-4.avif', 18090, 'product', 114, '0', 1765261995, 1),
(1486, '../public/uploads/images/product/quan-the-thao-nam-7-ultra-short-xanh-forest-night-5.avif', 'quan-the-thao-nam-7-ultra-short-xanh-forest-night-5.avif', 9244, 'product', 114, '0', 1765261995, 1),
(1492, '../public/uploads/images/product/quan-jeans-nam-basics-dang-slim-fit-den-wash-1_32-Copy(1).avif', 'quan-jeans-nam-basics-dang-slim-fit-den-wash-1_32-Copy(1).avif', 16265, 'product', 115, '1', 1765339869, 1),
(1493, '../public/uploads/images/product/quan-jeans-nam-basics-dang-slim-fit-den-wash-4_74-Copy(1).avif', 'quan-jeans-nam-basics-dang-slim-fit-den-wash-4_74-Copy(1).avif', 75358, 'product', 115, '0', 1765339886, 1),
(1494, '../public/uploads/images/product/quan-jeans-nam-basics-dang-slim-fit-den-wash-5_24-Copy(1).avif', 'quan-jeans-nam-basics-dang-slim-fit-den-wash-5_24-Copy(1).avif', 59920, 'product', 115, '0', 1765339886, 1),
(1495, '../public/uploads/images/product/quan-jeans-nam-basics-dang-slim-fit-den-wash-2_91-Copy(1).avif', 'quan-jeans-nam-basics-dang-slim-fit-den-wash-2_91-Copy(1).avif', 19800, 'product', 115, '0', 1765339886, 1),
(1496, '../public/uploads/images/product/quan-jeans-nam-basics-dang-slim-fit-den-wash-3_60-Copy(1).avif', 'quan-jeans-nam-basics-dang-slim-fit-den-wash-3_60-Copy(1).avif', 18242, 'product', 115, '0', 1765339886, 1),
(1502, '../public/uploads/images/product/Quan_Jeans_dang_OG_Slim-thuumb-2.avif', 'Quan_Jeans_dang_OG_Slim-thuumb-2.avif', 56950, 'product', 116, '1', 1765340187, 1),
(1503, '../public/uploads/images/product/Coolmate_x_Copper_Denim__Quan_Jeans_dang_OG_Slim8.avif', 'Coolmate_x_Copper_Denim__Quan_Jeans_dang_OG_Slim8.avif', 44106, 'product', 116, '0', 1765340200, 1),
(1504, '../public/uploads/images/product/Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__3_copy.avif', 'Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__3_copy.avif', 255112, 'product', 116, '0', 1765340200, 1),
(1505, '../public/uploads/images/product/Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__5_copy.avif', 'Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__5_copy.avif', 76258, 'product', 116, '0', 1765340200, 1),
(1506, '../public/uploads/images/product/Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__6_copy.avif', 'Coolmate_x_Copper_Jeans_-_OG_Slim__-_Xanh_nhat__6_copy.avif', 195449, 'product', 116, '0', 1765340200, 1),
(1507, '../public/uploads/images/product/quan-jeans-nam-basics-dang-regular-straight-den-1.avif', 'quan-jeans-nam-basics-dang-regular-straight-den-1.avif', 14752, 'product', 117, '1', 1765340298, 1),
(1508, '../public/uploads/images/product/quan-jeans-nam-basics-dang-regular-straight-den-2.avif', 'quan-jeans-nam-basics-dang-regular-straight-den-2.avif', 5744, 'product', 117, '0', 1765340303, 1),
(1509, '../public/uploads/images/product/quan-jeans-nam-basics-dang-regular-straight-den-3.avif', 'quan-jeans-nam-basics-dang-regular-straight-den-3.avif', 12406, 'product', 117, '0', 1765340303, 1),
(1510, '../public/uploads/images/product/quan-jeans-nam-basics-dang-regular-straight-den-4.avif', 'quan-jeans-nam-basics-dang-regular-straight-den-4.avif', 34446, 'product', 117, '0', 1765340303, 1),
(1511, '../public/uploads/images/product/quan-jeans-nam-basics-dang-regular-straight-den-5.avif', 'quan-jeans-nam-basics-dang-regular-straight-den-5.avif', 29112, 'product', 117, '0', 1765340303, 1),
(1512, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-1.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-1.avif', 62259, 'product', 118, '1', 1765340502, 1),
(1513, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-5.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-5.avif', 201775, 'product', 118, '0', 1765340506, 1),
(1514, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-4.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-4.avif', 151894, 'product', 118, '0', 1765340506, 1),
(1515, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-3.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-3.avif', 89453, 'product', 118, '0', 1765340506, 1),
(1516, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-2.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-vang-sang-2.avif', 74912, 'product', 118, '0', 1765340506, 1),
(1517, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-1_8.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-1_8.avif', 34448, 'product', 119, '1', 1765340556, 1),
(1518, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-5_2.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-5_2.avif', 155827, 'product', 119, '0', 1765340560, 1),
(1519, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-4_25.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-4_25.avif', 167730, 'product', 119, '0', 1765340560, 1),
(1520, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-3.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-3.avif', 32184, 'product', 119, '0', 1765340560, 1),
(1521, '../public/uploads/images/product/coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-2_67.avif', 'coolmate-x-copper-denim-quan-jeans-dang-straight-xanh-garment-2_67.avif', 21970, 'product', 119, '0', 1765340560, 1),
(1522, '../public/uploads/images/product/wristband-the-thao-den-1.avif', 'wristband-the-thao-den-1.avif', 61747, 'product', 120, '1', 1765340938, 1),
(1523, '../public/uploads/images/product/wristband-the-thao-den-2.avif', 'wristband-the-thao-den-2.avif', 46504, 'product', 120, '0', 1765340943, 1),
(1524, '../public/uploads/images/product/wristband-the-thao-den-3.avif', 'wristband-the-thao-den-3.avif', 19625, 'product', 120, '0', 1765340943, 1),
(1525, '../public/uploads/images/product/wristband-the-thao-den-4.avif', 'wristband-the-thao-den-4.avif', 33409, 'product', 120, '0', 1765340943, 1),
(1526, '../public/uploads/images/product/wristband-the-thao-den-1-Copy(1).avif', 'wristband-the-thao-den-1-Copy(1).avif', 61747, 'product', 120, '0', 1765340943, 1),
(1527, '../public/uploads/images/product/gaiter-mat-na-da-nang-chay-bo-graphic-camo-12-do_30.avif', 'gaiter-mat-na-da-nang-chay-bo-graphic-camo-12-do_30.avif', 23309, 'product', 121, '1', 1765341088, 1),
(1528, '../public/uploads/images/product/gaiter-mat-na-da-nang-chay-bo-graphic-camo-17-do.avif', 'gaiter-mat-na-da-nang-chay-bo-graphic-camo-17-do.avif', 33591, 'product', 121, '0', 1765341096, 1),
(1529, '../public/uploads/images/product/gaiter-mat-na-da-nang-chay-bo-graphic-camo-19-do.avif', 'gaiter-mat-na-da-nang-chay-bo-graphic-camo-19-do.avif', 14696, 'product', 121, '0', 1765341096, 1),
(1530, '../public/uploads/images/product/gaiter-mat-na-da-nang-chay-bo-graphic-camo-15-do.avif', 'gaiter-mat-na-da-nang-chay-bo-graphic-camo-15-do.avif', 31243, 'product', 121, '0', 1765341096, 1),
(1531, '../public/uploads/images/product/gaiter-mat-na-da-nang-chay-bo-graphic-camo-16-do.avif', 'gaiter-mat-na-da-nang-chay-bo-graphic-camo-16-do.avif', 26508, 'product', 121, '0', 1765341096, 1),
(1532, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-den-1_25.avif', 'tui-untility-duffle-size-vua-18l-den-1_25.avif', 19270, 'product', 122, '1', 1765341210, 1),
(1533, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-den-2_71.avif', 'tui-untility-duffle-size-vua-18l-den-2_71.avif', 13560, 'product', 122, '0', 1765341215, 1),
(1534, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-den-3_71.avif', 'tui-untility-duffle-size-vua-18l-den-3_71.avif', 38473, 'product', 122, '0', 1765341215, 1),
(1535, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-den-4_19.avif', 'tui-untility-duffle-size-vua-18l-den-4_19.avif', 38442, 'product', 122, '0', 1765341215, 1),
(1536, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-den-5_19.avif', 'tui-untility-duffle-size-vua-18l-den-5_19.avif', 212160, 'product', 122, '0', 1765341215, 1),
(1537, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-xam-1.avif', 'tui-untility-duffle-size-vua-18l-xam-1.avif', 23774, 'product', 123, '1', 1765341293, 1),
(1538, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-xam-2.avif', 'tui-untility-duffle-size-vua-18l-xam-2.avif', 17722, 'product', 123, '0', 1765341300, 1),
(1539, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-xam-3.avif', 'tui-untility-duffle-size-vua-18l-xam-3.avif', 27999, 'product', 123, '0', 1765341300, 1),
(1540, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-xam-4.avif', 'tui-untility-duffle-size-vua-18l-xam-4.avif', 76858, 'product', 123, '0', 1765341300, 1),
(1541, '../public/uploads/images/product/tui-untility-duffle-size-vua-18l-xam-5.avif', 'tui-untility-duffle-size-vua-18l-xam-5.avif', 19121, 'product', 123, '0', 1765341300, 1),
(1542, '../public/uploads/images/product/xam1DSCF9785_34.avif', 'xam1DSCF9785_34.avif', 8033, 'product', 124, '1', 1765341428, 1),
(1543, '../public/uploads/images/product/DSCF9804_57.avif', 'DSCF9804_57.avif', 21112, 'product', 124, '0', 1765341436, 1),
(1544, '../public/uploads/images/product/gang_tay_uv-3.avif', 'gang_tay_uv-3.avif', 20635, 'product', 124, '0', 1765341436, 1),
(1545, '../public/uploads/images/product/uv-sleevs-50-22.avif', 'uv-sleevs-50-22.avif', 46722, 'product', 124, '0', 1765341436, 1),
(1546, '../public/uploads/images/product/uv-sleevs-50-24_100.avif', 'uv-sleevs-50-24_100.avif', 36961, 'product', 124, '0', 1765341436, 1),
(1547, '../public/uploads/images/product/coc-giu-nhiet-coolmate-vang-1.avif', 'coc-giu-nhiet-coolmate-vang-1.avif', 5162, 'product', 125, '1', 1765341703, 1),
(1548, '../public/uploads/images/product/coc-giu-nhiet-coolmate-vang-5.avif', 'coc-giu-nhiet-coolmate-vang-5.avif', 4525, 'product', 125, '0', 1765341706, 1),
(1549, '../public/uploads/images/product/coc-giu-nhiet-coolmate-vang-4.avif', 'coc-giu-nhiet-coolmate-vang-4.avif', 8800, 'product', 125, '0', 1765341706, 1),
(1550, '../public/uploads/images/product/coc-giu-nhiet-coolmate-vang-3.avif', 'coc-giu-nhiet-coolmate-vang-3.avif', 10678, 'product', 125, '0', 1765341706, 1),
(1551, '../public/uploads/images/product/coc-giu-nhiet-coolmate-vang-2.avif', 'coc-giu-nhiet-coolmate-vang-2.avif', 5174, 'product', 125, '0', 1765341706, 1),
(1552, '../public/uploads/images/product/tui-tote-denim-_1.avif', 'tui-tote-denim-_1.avif', 45277, 'product', 126, '1', 1765341784, 1),
(1553, '../public/uploads/images/product/tui-tote-denim-_5.avif', 'tui-tote-denim-_5.avif', 22328, 'product', 126, '0', 1765341788, 1),
(1554, '../public/uploads/images/product/tui-tote-denim-_4.avif', 'tui-tote-denim-_4.avif', 119445, 'product', 126, '0', 1765341788, 1),
(1555, '../public/uploads/images/product/tui-tote-denim-_3.avif', 'tui-tote-denim-_3.avif', 35568, 'product', 126, '0', 1765341788, 1),
(1556, '../public/uploads/images/product/tui-tote-denim-_1-Copy(1).avif', 'tui-tote-denim-_1-Copy(1).avif', 45277, 'product', 126, '0', 1765341788, 1),
(1557, '../public/uploads/images/product/tui-tote-canvas-care-share-i-be-1_80.avif', 'tui-tote-canvas-care-share-i-be-1_80.avif', 8203, 'product', 127, '1', 1765341958, 1),
(1558, '../public/uploads/images/product/tui-tote-canvas-care-share-i-be-5_27.avif', 'tui-tote-canvas-care-share-i-be-5_27.avif', 11029, 'product', 127, '0', 1765341962, 1),
(1559, '../public/uploads/images/product/tui-tote-canvas-care-share-i-be-4_19.avif', 'tui-tote-canvas-care-share-i-be-4_19.avif', 23359, 'product', 127, '0', 1765341962, 1),
(1560, '../public/uploads/images/product/tui-tote-canvas-care-share-i-be-3_25.avif', 'tui-tote-canvas-care-share-i-be-3_25.avif', 54473, 'product', 127, '0', 1765341962, 1),
(1561, '../public/uploads/images/product/tui-tote-canvas-care-share-i-be-2_32.avif', 'tui-tote-canvas-care-share-i-be-2_32.avif', 14770, 'product', 127, '0', 1765341962, 1),
(1562, '../public/uploads/images/post/Xu-Huong-Thoi-Trang-Cong-So-2025-Cam-Nang-Cho-Nam-Nu-4.avif', 'Xu-Huong-Thoi-Trang-Cong-So-2025-Cam-Nang-Cho-Nam-Nu-4.avif', 53332, 'post', 107, '1', 1765342232, 1),
(1566, '../public/uploads/images/post/item-thoi-trang-y2k-nam-gioi-2456_773.avif', 'item-thoi-trang-y2k-nam-gioi-2456_773.avif', 29539, 'post', 108, '1', 1765342847, 1),
(1567, '../public/uploads/images/post/phong-cach-retro-qua-cac-thap-nien-1940-ivy-league.jpg', 'phong-cach-retro-qua-cac-thap-nien-1940-ivy-league.jpg', 179475, 'post', 109, '1', 1765343061, 1),
(1568, '../public/uploads/images/post/phong-cach-nang-dong-cho-nam-12.jpg', 'phong-cach-nang-dong-cho-nam-12.jpg', 53946, 'post', 110, '1', 1765343362, 1),
(1569, '../public/uploads/images/product/ao-polo-thethao.avif', 'ao-polo-thethao.avif', 13478, 'product', 128, '1', 1765791606, 1),
(1570, '../public/uploads/images/product/ao-polo-thethao-Copy(1).avif', 'ao-polo-thethao-Copy(1).avif', 13478, 'product', 128, '0', 1765791609, 1),
(1571, '../public/uploads/images/product/ao-polo-thethao-details-2.avif', 'ao-polo-thethao-details-2.avif', 21674, 'product', 128, '0', 1765791609, 1),
(1572, '../public/uploads/images/product/ao-polo-thethao-details-3.avif', 'ao-polo-thethao-details-3.avif', 11488, 'product', 128, '0', 1765791609, 1),
(1573, '../public/uploads/images/product/ao-polo-thethao-details-4.avif', 'ao-polo-thethao-details-4.avif', 30778, 'product', 128, '0', 1765791609, 1),
(1607, '../public/uploads/images/slider/noel25cm1920_x_600-1-Copy(1).avif', 'noel25cm1920_x_600-1-Copy(1).avif', 79030, 'slider', 25, '1', 1766734735, 1),
(1608, '../public/uploads/images/slider/Artboard_1.jpg', 'Artboard_1.jpg', 126720, 'slider', 26, '1', 1766734768, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int NOT NULL,
  `menu_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_slug` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_type` enum('product','post','page','custom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `object_id` int NOT NULL,
  `parent_id` int NOT NULL,
  `menu_order` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_title`, `menu_slug`, `menu_type`, `object_id`, `parent_id`, `menu_order`) VALUES
(55, 'Trang chủ', 'trang-chu', 'page', 7, 0, 1),
(57, 'Liên hệ', 'lien-he', 'page', 5, 0, 6),
(61, 'Blog', 'bai-viet', 'page', 8, 0, 7),
(63, 'Áo', 'san-pham/ao', 'product', 1, 0, 3),
(64, 'Quần', 'san-pham/quan', 'product', 2, 0, 4),
(65, 'Phụ kiện', 'san-pham/phu-kien', 'product', 3, 0, 5),
(66, 'Áo thun', 'san-pham/ao-thun', 'product', 4, 63, 1),
(67, 'Áo Sơ Mi', 'san-pham/ao-so-mi', 'product', 5, 63, 2),
(68, 'Áo Polo', 'san-pham/ao-polo', 'product', 12, 63, 3),
(69, 'Quần Short', 'san-pham/quan-short', 'product', 7, 64, 1),
(70, 'Quần Jean', 'san-pham/quan-jean', 'product', 6, 64, 2),
(71, 'Tất', 'san-pham/tat', 'product', 23, 65, 1),
(72, 'Khác', 'san-pham/khac', 'product', 24, 65, 2),
(74, 'Giới thiệu', 'gioi-thieu', 'page', 4, 0, 2),
(81, 'test', 'test', 'page', 31, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int NOT NULL,
  `order_code` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int NOT NULL,
  `total_amount` int NOT NULL,
  `order_date` int NOT NULL,
  `order_note` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` enum('COD','Online Payment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'COD',
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','processing','shipped','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `customer_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_code`, `product_quantity`, `total_amount`, `order_date`, `order_note`, `payment_method`, `shipping_address`, `status`, `customer_id`, `created_at`, `updated_at`) VALUES
(32, '#MNW-11', 1, 200000, 1766045462, NULL, 'COD', 'TP.HCM', 'pending', 11, 1766045462, 1768919550),
(65, '#MNW-359536', 1, 119200, 1766994235, NULL, 'COD', 'fweewfwefwf ewfwfwe', 'pending', 35, 1766994235, 1768918487),
(66, '#MNW-36', 2, 439000, 1768919578, 'AA', 'COD', 'TP.HCM', 'pending', 36, 1768919578, NULL),
(67, '#MNW-37', 3, 807300, 1769076587, '', 'COD', 'TP.HCM', 'pending', 37, 1769076587, NULL),
(68, '#MNW-38', 1, 188000, 1772281733, '', 'COD', 'tphcmaaaaaa', 'pending', 38, 1772281733, NULL),
(69, '#MNW-39', 1, 160000, 1772282478, '', 'COD', 'aaaaaaaa', 'pending', 39, 1772282478, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_items`
--

CREATE TABLE `tbl_order_items` (
  `item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_items`
--

INSERT INTO `tbl_order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(74, 65, 69, 1, 119200),
(75, 66, 126, 1, 299000),
(76, 66, 67, 1, 140000),
(77, 67, 128, 3, 269100),
(78, 68, 112, 1, 188000),
(79, 69, 85, 1, 160000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `page_id` int NOT NULL,
  `page_title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` enum('draft','published','pending','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `user_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`page_id`, `page_title`, `page_slug`, `page_content`, `page_status`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Giới thiệu', 'gioi-thieu', '<h1>Giới thiệu về MONOWEAR</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MONOWEAR</strong> l&agrave; thương hiệu thời trang nam được h&igrave;nh th&agrave;nh với mong muốn mang đến những sản phẩm đơn giản nhưng chỉn chu, hiện đại nhưng vẫn gần gũi với đời sống hằng ng&agrave;y của ph&aacute;i mạnh. Ch&uacute;ng t&ocirc;i tin rằng thời trang kh&ocirc;ng chỉ l&agrave; vẻ bề ngo&agrave;i, m&agrave; c&ograve;n l&agrave; c&aacute;ch mỗi người thể hiện sự tự tin, phong th&aacute;i v&agrave; c&aacute; t&iacute;nh ri&ecirc;ng của m&igrave;nh. Ch&iacute;nh v&igrave; vậy, MONOWEAR tập trung x&acirc;y dựng những thiết kế quần &aacute;o nam c&oacute; t&iacute;nh ứng dụng cao, ph&ugrave; hợp với nhiều độ tuổi, nhiều phong c&aacute;ch sống v&agrave; nhiều ho&agrave;n cảnh sử dụng kh&aacute;c nhau.</p>\r\n\r\n<p>Ngay từ những ng&agrave;y đầu, MONOWEAR đ&atilde; định hướng theo phong c&aacute;ch tối giản, gọn g&agrave;ng v&agrave; nam t&iacute;nh. C&aacute;c sản phẩm được thiết kế với form d&aacute;ng chuẩn, dễ mặc, dễ phối, gi&uacute;p người mặc lu&ocirc;n cảm thấy thoải m&aacute;i nhưng vẫn giữ được vẻ ngo&agrave;i lịch sự v&agrave; chỉnh chu. D&ugrave; l&agrave; đi l&agrave;m, đi học, dạo phố hay gặp gỡ bạn b&egrave;, trang phục của MONOWEAR lu&ocirc;n đ&aacute;p ứng tốt nhu cầu sử dụng hằng ng&agrave;y m&agrave; kh&ocirc;ng g&acirc;y cảm gi&aacute;c g&ograve; b&oacute; hay lỗi thời.</p>\r\n\r\n<p>Chất lượng lu&ocirc;n l&agrave; yếu tố được MONOWEAR đặt l&ecirc;n h&agrave;ng đầu. Ch&uacute;ng t&ocirc;i ch&uacute; trọng lựa chọn chất liệu vải ph&ugrave; hợp với kh&iacute; hậu v&agrave; th&oacute;i quen sinh hoạt, đảm bảo độ tho&aacute;ng m&aacute;t, bền đẹp v&agrave; dễ bảo quản. Mỗi sản phẩm đều trải qua qu&aacute; tr&igrave;nh ho&agrave;n thiện tỉ mỉ, từ đường may, form d&aacute;ng cho đến c&aacute;c chi tiết nhỏ, nhằm mang lại trải nghiệm sử dụng tốt nhất cho kh&aacute;ch h&agrave;ng. MONOWEAR kh&ocirc;ng chạy theo những xu hướng ngắn hạn, m&agrave; hướng đến sự bền vững v&agrave; gi&aacute; trị sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>B&ecirc;n cạnh sản phẩm, MONOWEAR lu&ocirc;n lấy kh&aacute;ch h&agrave;ng l&agrave;m trung t&acirc;m trong mọi hoạt động ph&aacute;t triển. Ch&uacute;ng t&ocirc;i lắng nghe &yacute; kiến, nhu cầu v&agrave; mong muốn của kh&aacute;ch h&agrave;ng để kh&ocirc;ng ngừng cải tiến chất lượng, thiết kế cũng như dịch vụ. Mục ti&ecirc;u của MONOWEAR kh&ocirc;ng chỉ l&agrave; b&aacute;n quần &aacute;o, m&agrave; c&ograve;n l&agrave; x&acirc;y dựng một thương hiệu thời trang nam đ&aacute;ng tin cậy, nơi kh&aacute;ch h&agrave;ng c&oacute; thể dễ d&agrave;ng t&igrave;m thấy những trang phục ph&ugrave; hợp với phong c&aacute;ch v&agrave; cuộc sống của m&igrave;nh.</p>\r\n\r\n<p>Với tinh thần kh&ocirc;ng ngừng đổi mới v&agrave; ho&agrave;n thiện, MONOWEAR mong muốn trở th&agrave;nh người bạn đồng h&agrave;nh l&acirc;u d&agrave;i của ph&aacute;i mạnh tr&ecirc;n h&agrave;nh tr&igrave;nh x&acirc;y dựng phong c&aacute;ch c&aacute; nh&acirc;n đơn giản, gọn g&agrave;ng nhưng vẫn cuốn h&uacute;t. Ch&uacute;ng t&ocirc;i tin rằng, khi kho&aacute;c l&ecirc;n m&igrave;nh trang phục ph&ugrave; hợp, mỗi người đ&agrave;n &ocirc;ng đều c&oacute; thể tự tin hơn trong c&ocirc;ng việc, cuộc sống v&agrave; những khoảnh khắc thường ng&agrave;y.</p>\r\n', 'published', 1, 1764331759, 1766456217),
(5, 'Liên hệ', 'lien-he', '<h1>Li&ecirc;n hệ MONOWEAR</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MONOWEAR</strong> lu&ocirc;n sẵn s&agrave;ng lắng nghe v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng trong mọi vấn đề li&ecirc;n quan đến sản phẩm, đơn h&agrave;ng v&agrave; dịch vụ. Nếu bạn cần tư vấn về size, chất liệu, t&igrave;nh trạng đơn h&agrave;ng hoặc c&oacute; bất kỳ thắc mắc n&agrave;o, đừng ngần ngại li&ecirc;n hệ với ch&uacute;ng t&ocirc;i qua c&aacute;c k&ecirc;nh th&ocirc;ng tin ch&iacute;nh thức của MONOWEAR. Đội ngũ hỗ trợ lu&ocirc;n nỗ lực phản hồi nhanh ch&oacute;ng, tận t&acirc;m nhằm mang đến trải nghiệm mua sắm thuận tiện v&agrave; h&agrave;i l&ograve;ng nhất cho kh&aacute;ch h&agrave;ng. MONOWEAR rất tr&acirc;n trọng mọi &yacute; kiến đ&oacute;ng g&oacute;p để kh&ocirc;ng ngừng cải thiện chất lượng sản phẩm v&agrave; dịch vụ, đồng thời mong muốn đồng h&agrave;nh c&ugrave;ng bạn trong việc x&acirc;y dựng phong c&aacute;ch thời trang nam đơn giản, hiện đại v&agrave; chỉn chu.</p>\r\n\r\n<p>Nếu bạn c&oacute; thắc mắc về sản phẩm, đơn h&agrave;ng hoặc cần được tư vấn th&ecirc;m, MONO WEAR lu&ocirc;n sẵn s&agrave;ng hỗ trợ bạn:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Hotline:&nbsp;</strong>0933.1999</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Email:</strong> support@monowear.vn</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Địa chỉ:</strong> Quận 4. TPHCM</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Facebook / Instagram:</strong> MONO WEAR</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Đừng ngần ngại li&ecirc;n hệ &ndash; đội ngũ của ch&uacute;ng t&ocirc;i lu&ocirc;n cố gắng phản hồi nhanh nhất để mang đến cho bạn trải nghiệm mua sắm h&agrave;i l&ograve;ng v&agrave; thuận tiện.</p>\r\n', 'published', 1, 1764331774, 1766456216),
(7, 'Trang chủ', 'trang-chu', '', 'published', 1, 1764636144, 1766456215),
(8, 'Blog', 'bai-viet', '', 'published', 1, 1764636209, 1766312332),
(31, 'Test', 'test', '', 'published', 1, 1766459862, NULL),
(32, 'Trang test', 'trang-test', '<p>aaaaaaaaaaaaaaa</p>\r\n', 'published', 1, 1768918277, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int NOT NULL,
  `post_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` enum('Nháp','Công khai','Chờ duyệt','Lưu trữ') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ duyệt',
  `post_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_name`, `post_desc`, `post_slug`, `post_status`, `post_details`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(107, 'Thời Trang Công Sở - Thanh Lịch', 'Thời trang công sở hướng đến sự tinh tế, chỉn chu', 'bai-viet/tho-trang-cong-so-thanh-lich-chuyen-nghiep-hien-dai', 'Công khai', '<p>Thời trang c&ocirc;ng sở hướng đến sự tinh tế v&agrave; chỉn chu, nơi mỗi bộ trang phục kh&ocirc;ng chỉ đ&aacute;p ứng y&ecirc;u cầu về t&iacute;nh chuy&ecirc;n nghiệp m&agrave; c&ograve;n phản &aacute;nh phong c&aacute;ch v&agrave; c&aacute; t&iacute;nh của người mặc. Trong m&ocirc;i trường l&agrave;m việc hiện đại, trang phục c&ocirc;ng sở kh&ocirc;ng c&ograve;n b&oacute; buộc trong những thiết kế cứng nhắc, m&agrave; được n&acirc;ng tầm với sự kết hợp h&agrave;i h&ograve;a giữa thẩm mỹ, sự thoải m&aacute;i v&agrave; t&iacute;nh ứng dụng cao.</p>\r\n\r\n<p>C&aacute;c thiết kế c&ocirc;ng sở thanh lịch thường tập trung v&agrave;o phom d&aacute;ng gọn g&agrave;ng, đường cắt may tinh xảo v&agrave; chất liệu cao cấp, mang lại cảm gi&aacute;c dễ chịu suốt cả ng&agrave;y d&agrave;i. Bảng m&agrave;u trung t&iacute;nh như trắng, be, x&aacute;m, đen hay pastel nhẹ nh&agrave;ng gi&uacute;p trang phục dễ phối, ph&ugrave; hợp với nhiều ho&agrave;n cảnh từ họp h&agrave;nh, l&agrave;m việc thường ng&agrave;y đến c&aacute;c sự kiện trang trọng nơi c&ocirc;ng sở.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ dừng lại ở vẻ ngo&agrave;i lịch sự, thời trang c&ocirc;ng sở c&ograve;n gi&uacute;p người mặc thể hiện sự tự tin, bản lĩnh v&agrave; t&aacute;c phong chuy&ecirc;n nghiệp. Mỗi chi tiết nhỏ &mdash; từ cổ &aacute;o, tay &aacute;o đến đường may &mdash; đều g&oacute;p phần tạo n&ecirc;n tổng thể h&agrave;i h&ograve;a, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng v&agrave; phong th&aacute;i thanh lịch.</p>\r\n\r\n<p>Thời trang c&ocirc;ng sở thanh lịch l&agrave; lựa chọn l&yacute; tưởng cho những ai theo đuổi phong c&aacute;ch sống hiện đại, đề cao sự chỉn chu v&agrave; tinh tế trong từng khoảnh khắc. Đ&acirc;y kh&ocirc;ng chỉ l&agrave; trang phục để đi l&agrave;m, m&agrave; c&ograve;n l&agrave; tuy&ecirc;n ng&ocirc;n về gu thẩm mỹ, sự chuy&ecirc;n nghiệp v&agrave; đẳng cấp của người mặc trong cuộc sống h&agrave;ng ng&agrave;y.</p>\r\n', 1, 6, 1765342300, 1766316047),
(108, 'Thời Trang Y2K - Cá Tính, Nổi Bật, Mang Đậm Chất Gen Z', 'Thời trang Y2K mang tinh thần táo bạo và đầy năng lượng', 'bai-viet/thoi-trang-y2k-ca-tinh-noi-bat-mang-dam-chat-gen-z', 'Công khai', '<p>Thời trang Y2K l&agrave; sự trở lại đầy ấn tượng của phong c&aacute;ch đầu những năm 2000, mang theo tinh thần trẻ trung, t&aacute;o bạo v&agrave; ph&oacute;ng kho&aacute;ng. Lấy cảm hứng từ văn h&oacute;a pop, &acirc;m nhạc, thời trang đường phố v&agrave; c&ocirc;ng nghệ của thập ni&ecirc;n cũ, Y2K kh&ocirc;ng chỉ l&agrave; xu hướng m&agrave; c&ograve;n l&agrave; tuy&ecirc;n ng&ocirc;n c&aacute; t&iacute;nh của thế hệ Gen Z &ndash; thế hệ d&aacute;m kh&aacute;c biệt v&agrave; kh&ocirc;ng ngại thể hiện bản th&acirc;n.</p>\r\n\r\n<p>C&aacute;c thiết kế Y2K thường nổi bật với phom d&aacute;ng &ocirc;m s&aacute;t hoặc croptop c&aacute; t&iacute;nh, quần cạp trễ, v&aacute;y ngắn, &aacute;o baby tee c&ugrave;ng những chi tiết đặc trưng như d&acirc;y k&eacute;o kim loại, logo nổi, họa tiết graphic, &aacute;nh kim hoặc chất liệu denim, da, vải b&oacute;ng. Bảng m&agrave;u đa dạng từ pastel ngọt ng&agrave;o đến c&aacute;c gam m&agrave;u nổi bật, neon, mang lại cảm gi&aacute;c năng động v&agrave; ph&aacute; c&aacute;ch.</p>\r\n\r\n<p>Kh&ocirc;ng tu&acirc;n theo khu&ocirc;n mẫu, thời trang Y2K khuyến kh&iacute;ch sự s&aacute;ng tạo v&agrave; tự do phối đồ. Người mặc c&oacute; thể dễ d&agrave;ng kết hợp nhiều lớp trang phục, phụ kiện bản to, k&iacute;nh r&acirc;m c&aacute; t&iacute;nh, t&uacute;i mini hay gi&agrave;y platform để tạo n&ecirc;n tổng thể ấn tượng v&agrave; kh&aacute;c biệt. Mỗi outfit Y2K l&agrave; một c&aacute;ch kể c&acirc;u chuyện ri&ecirc;ng, thể hiện phong c&aacute;ch sống tự tin, d&aacute;m thử nghiệm v&agrave; lu&ocirc;n bắt kịp xu hướng.</p>\r\n\r\n<p>Thời trang Y2K kh&ocirc;ng chỉ d&agrave;nh cho những buổi dạo phố hay chụp ảnh sống ảo, m&agrave; c&ograve;n l&agrave; c&aacute;ch để Gen Z khẳng định bản sắc c&aacute; nh&acirc;n trong nhịp sống hiện đại. C&aacute; t&iacute;nh, nổi bật v&agrave; đậm chất thời đại, Y2K ch&iacute;nh l&agrave; lựa chọn l&yacute; tưởng cho những ai muốn bứt ph&aacute; khỏi giới hạn, thể hiện c&aacute;i t&ocirc;i một c&aacute;ch mạnh mẽ v&agrave; đầy cảm hứng.</p>\r\n', 1, 13, 1765342943, 1766316128),
(109, 'Phong Cách Retro - Hoài Niệm, Cổ Điển, Đậm Chất Riêng', 'Phong cách Retro mang vẻ đẹp hoài niệm với cảm hứng từ những thập niên trước', 'bai-viet/phong-cach-retro-hoai-niem-co-dien-dam-chat-rieng', 'Công khai', '<p>Phong c&aacute;ch Retro mang trong m&igrave;nh hơi thở của qu&aacute; khứ, gợi nhắc về những gi&aacute; trị xưa cũ nhưng chưa bao giờ lỗi thời. Đ&oacute; l&agrave; sự giao thoa tinh tế giữa n&eacute;t ho&agrave;i niệm cổ điển v&agrave; tinh thần s&aacute;ng tạo hiện đại, tạo n&ecirc;n phong c&aacute;ch thời trang mang đậm dấu ấn c&aacute; nh&acirc;n v&agrave; chiều s&acirc;u cảm x&uacute;c.</p>\r\n\r\n<p>C&aacute;c thiết kế Retro thường lấy cảm hứng từ những thập ni&ecirc;n trước với phom d&aacute;ng đặc trưng, họa tiết chấm bi, kẻ sọc, hoa văn vintage c&ugrave;ng bảng m&agrave;u trầm ấm như n&acirc;u, be, xanh r&ecirc;u, đỏ đ&ocirc; hay v&agrave;ng mustard. Chất liệu vải được lựa chọn kỹ lưỡng, mang lại cảm gi&aacute;c mềm mại, tự nhi&ecirc;n v&agrave; gần gũi, gi&uacute;p t&ocirc;n l&ecirc;n vẻ đẹp thanh lịch v&agrave; cổ điển cho người mặc.</p>\r\n\r\n<p>Kh&ocirc;ng qu&aacute; ph&ocirc; trương, phong c&aacute;ch Retro chinh phục người y&ecirc;u thời trang bằng sự tinh giản v&agrave; tinh tế trong từng chi tiết. Mỗi bộ trang phục l&agrave; một c&acirc;u chuyện, phản &aacute;nh gu thẩm mỹ ri&ecirc;ng v&agrave; t&igrave;nh y&ecirc;u d&agrave;nh cho những gi&aacute; trị bền vững theo thời gian. Retro kh&ocirc;ng chạy theo xu hướng, m&agrave; tự tạo n&ecirc;n bản sắc ri&ecirc;ng, nhẹ nh&agrave;ng nhưng s&acirc;u lắng.</p>\r\n\r\n<p>Phong c&aacute;ch Retro ph&ugrave; hợp với những ai y&ecirc;u sự kh&aacute;c biệt, tr&acirc;n trọng n&eacute;t đẹp xưa v&agrave; muốn thể hiện c&aacute; t&iacute;nh một c&aacute;ch k&iacute;n đ&aacute;o nhưng đầy cuốn h&uacute;t. Ho&agrave;i niệm, cổ điển v&agrave; đậm chất ri&ecirc;ng, Retro ch&iacute;nh l&agrave; lựa chọn d&agrave;nh cho những t&acirc;m hồn y&ecirc;u sự tinh tế v&agrave; chiều s&acirc;u trong thời trang.</p>\r\n', 1, 14, 1765343186, 1766316183),
(110, 'Thời Trang Năng Động -Trẻ Trung, Linh Hoạt', 'Thời trang năng động mang đến sự thoải mái, phóng khoáng', 'bai-viet/thoi-trang-nang-dong-tre-trung-linh-hoat', 'Công khai', '<p>Thời trang c&ocirc;ng sở hướng đến sự tinh tế v&agrave; chỉn chu, nơi mỗi bộ trang phục kh&ocirc;ng chỉ đ&aacute;p ứng y&ecirc;u cầu về t&iacute;nh chuy&ecirc;n nghiệp m&agrave; c&ograve;n phản &aacute;nh phong c&aacute;ch v&agrave; c&aacute; t&iacute;nh của người mặc. Trong m&ocirc;i trường l&agrave;m việc hiện đại, trang phục c&ocirc;ng sở kh&ocirc;ng c&ograve;n b&oacute; buộc trong những thiết kế cứng nhắc, m&agrave; được n&acirc;ng tầm với sự kết hợp h&agrave;i h&ograve;a giữa thẩm mỹ, sự thoải m&aacute;i v&agrave; t&iacute;nh ứng dụng cao.</p>\r\n\r\n<p>C&aacute;c thiết kế c&ocirc;ng sở thanh lịch thường tập trung v&agrave;o phom d&aacute;ng gọn g&agrave;ng, đường cắt may tinh xảo v&agrave; chất liệu cao cấp, mang lại cảm gi&aacute;c dễ chịu suốt cả ng&agrave;y d&agrave;i. Bảng m&agrave;u trung t&iacute;nh như trắng, be, x&aacute;m, đen hay pastel nhẹ nh&agrave;ng gi&uacute;p trang phục dễ phối, ph&ugrave; hợp với nhiều ho&agrave;n cảnh từ họp h&agrave;nh, l&agrave;m việc thường ng&agrave;y đến c&aacute;c sự kiện trang trọng nơi c&ocirc;ng sở.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ dừng lại ở vẻ ngo&agrave;i lịch sự, thời trang c&ocirc;ng sở c&ograve;n gi&uacute;p người mặc thể hiện sự tự tin, bản lĩnh v&agrave; t&aacute;c phong chuy&ecirc;n nghiệp. Mỗi chi tiết nhỏ &mdash; từ cổ &aacute;o, tay &aacute;o đến đường may &mdash; đều g&oacute;p phần tạo n&ecirc;n tổng thể h&agrave;i h&ograve;a, t&ocirc;n l&ecirc;n v&oacute;c d&aacute;ng v&agrave; phong th&aacute;i thanh lịch.</p>\r\n\r\n<p>Thời trang c&ocirc;ng sở thanh lịch l&agrave; lựa chọn l&yacute; tưởng cho những ai theo đuổi phong c&aacute;ch sống hiện đại, đề cao sự chỉn chu v&agrave; tinh tế trong từng khoảnh khắc. Đ&acirc;y kh&ocirc;ng chỉ l&agrave; trang phục để đi l&agrave;m, m&agrave; c&ograve;n l&agrave; tuy&ecirc;n ng&ocirc;n về gu thẩm mỹ, sự chuy&ecirc;n nghiệp v&agrave; đẳng cấp của người mặc trong cuộc sống h&agrave;ng ng&agrave;y.</p>\r\n', 1, 4, 1765343363, 1766993468);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_categories`
--

CREATE TABLE `tbl_post_categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` enum('Hoạt động','Chờ duyệt','Tạm dừng') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_post_categories`
--

INSERT INTO `tbl_post_categories` (`category_id`, `category_name`, `category_desc`, `category_slug`, `category_status`, `created_at`, `updated_at`, `user_id`, `parent_id`) VALUES
(1, 'Thời trang năng động', '', 'bai-viet/thoi-trang-nang-dong', 'Hoạt động', 1763272873, 1766311686, 1, 0),
(2, 'Thời trang lịch lãm', '', 'bai-viet/thoi-trang-lich-lam', 'Hoạt động', 1763272873, 1766311695, 1, 0),
(3, 'Xu hướng thời trang', '', 'bai-viet/xu-huong-thoi-trang', 'Hoạt động', 1763311805, 1766311535, 1, 0),
(4, 'Thời trang năng động 2025', 'Thời trang cho giới trẻ', 'bai-viet/thoi-trang-nang-dong-2025', 'Hoạt động', 1763311847, 1766311693, 1, 1),
(6, 'Phong cách lịch lãm 2025', '', 'bai-viet/thoi-trang-lich-lam-2025', 'Hoạt động', 1763311889, 1766311700, 1, 2),
(13, 'Thời trang Y2K', 'Xu hướng', 'bai-viet/thoi-trang-y2k', 'Hoạt động', 1764157072, 1766311655, 1, 3),
(14, 'Thời trang Retro', '', 'bai-viet/thoi-trang-retro', 'Hoạt động', 1764157235, 1766311646, 1, 3),
(15, 'Thời trang Street', '', 'bai-viet-thoi-trang-street', 'Chờ duyệt', 1764157344, 1766993339, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int NOT NULL,
  `product_code` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_slug` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales` int DEFAULT NULL,
  `product_up_sales` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` enum('active','inactive','out_of_stock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_quantity` int NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_code`, `product_name`, `product_desc`, `product_price`, `product_slug`, `product_sales`, `product_up_sales`, `product_status`, `stock_quantity`, `product_details`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(67, 'MNW#465', 'Áo thun trắng trơn', 'Áo thun trắng trơn với thiết kế basic, tối giản nhưng luôn giữ được vẻ trẻ trung và hiện đại. Chất liệu cotton mềm mại, thoáng mát, mang lại cảm giác thoải mái khi mặc hằng ngày. Dễ phối đồ, phù hợp với nhiều phong cách và hoàn cảnh sử dụng khác nhau.\r\nForm áo chuẩn, đứng dáng, giúp tôn vóc dáng và tạo cảm giác gọn gàng khi mặc. Màu trắng tinh tế mang lại vẻ ngoài sạch sẽ, dễ kết hợp với nhiều trang phục khác nhau. Là lựa chọn lý tưởng cho tủ đồ cơ bản của nam giới.', 200000, 'san-pham/ao/ao-thun-trang-tron', 30, 'no', 'active', 10, '<p>&Aacute;o thun trắng trơn l&agrave; item thời trang cơ bản nhưng kh&ocirc;ng bao giờ lỗi mốt, ph&ugrave; hợp với mọi độ tuổi v&agrave; phong c&aacute;ch. Sản phẩm được sản xuất từ chất liệu cotton cao cấp, bề mặt vải mềm mịn, tho&aacute;ng kh&iacute; v&agrave; c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu d&ugrave; hoạt động cả ng&agrave;y d&agrave;i. Vải c&oacute; độ bền cao, &iacute;t x&ugrave; l&ocirc;ng, giữ m&agrave;u tốt sau nhiều lần giặt, đ&aacute;p ứng nhu cầu sử dụng l&acirc;u d&agrave;i.</p>\r\n\r\n<p>Thiết kế &aacute;o trơn đơn giản, kh&ocirc;ng họa tiết, mang đến vẻ ngo&agrave;i gọn g&agrave;ng, tinh tế v&agrave; dễ ứng dụng trong cuộc sống hằng ng&agrave;y. Form &aacute;o được may chuẩn, đứng d&aacute;ng, kh&ocirc;ng qu&aacute; rộng cũng kh&ocirc;ng qu&aacute; &ocirc;m, gi&uacute;p t&ocirc;n d&aacute;ng v&agrave; tạo sự thoải m&aacute;i khi vận động. C&aacute;c đường may chắc chắn, tỉ mỉ, đảm bảo độ bền v&agrave; t&iacute;nh thẩm mỹ cho sản phẩm.</p>\r\n\r\n<p>M&agrave;u trắng cơ bản gi&uacute;p chiếc &aacute;o dễ d&agrave;ng kết hợp với nhiều loại trang phục kh&aacute;c nhau như quần jeans, quần kaki, quần short hay quần t&acirc;y. Bạn c&oacute; thể mặc &aacute;o khi đi học, đi l&agrave;m, dạo phố, đi chơi hoặc phối layer c&ugrave;ng &aacute;o kho&aacute;c, sơ mi để tạo n&ecirc;n phong c&aacute;ch trẻ trung, năng động hoặc đơn giản, lịch sự. &Aacute;o thun trắng trơn kh&ocirc;ng chỉ l&agrave; lựa chọn an to&agrave;n m&agrave; c&ograve;n l&agrave; nền tảng để bạn x&acirc;y dựng nhiều outfit kh&aacute;c nhau theo c&aacute; t&iacute;nh ri&ecirc;ng.</p>\r\n\r\n<p>Với thiết kế tối giản, chất liệu thoải m&aacute;i v&agrave; t&iacute;nh ứng dụng cao, &aacute;o thun trắng trơn l&agrave; sản phẩm kh&ocirc;ng thể thiếu trong tủ đồ của nam giới hiện đại.</p>\r\n', 1, 4, 1764152113, 1768919492),
(68, 'MNW#488564', 'Quần Short Kaki Be', 'Quần Short Kaki Be là lựa chọn hoàn hảo cho những ai yêu thích phong cách đơn giản, trẻ trung nhưng vẫn giữ được sự gọn gàng và lịch sự. Với gam màu be trung tính, dễ phối đồ cùng nhiều kiểu áo và phụ kiện khác nhau, sản phẩm mang đến vẻ ngoài năng động, hiện đại cho người mặc. Chất liệu kaki cao cấp mềm mại, thoáng mát, ít nhăn cùng form dáng vừa vặn giúp quần luôn thoải mái khi sử dụng hằng ngày, đặc biệt phù hợp cho thời tiết nóng hoặc các hoạt động ngoài trời.', 159000, 'san-pham/quan/quan-short-kaki-be', 20, 'no', 'active', 10, '<p>Quần Short Kaki Be được thiết kế d&agrave;nh cho nam giới theo đuổi phong c&aacute;ch năng động, tối giản nhưng vẫn ch&uacute; trọng đến t&iacute;nh ứng dụng cao trong đời sống hằng ng&agrave;y. Form quần được may chuẩn, độ d&agrave;i vừa phải, kh&ocirc;ng qu&aacute; ngắn cũng kh&ocirc;ng qu&aacute; d&agrave;i, gi&uacute;p tạo cảm gi&aacute;c gọn g&agrave;ng, t&ocirc;n d&aacute;ng v&agrave; dễ vận động. Đ&acirc;y l&agrave; kiểu quần ph&ugrave; hợp với nhiều d&aacute;ng người, mang lại sự tự tin v&agrave; thoải m&aacute;i trong suốt qu&aacute; tr&igrave;nh mặc.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải kaki cao cấp với bề mặt vải mịn, d&agrave;y dặn vừa phải nhưng vẫn đảm bảo độ tho&aacute;ng kh&iacute; cần thiết. Vải c&oacute; độ bền cao, hạn chế x&ugrave; l&ocirc;ng, &iacute;t nhăn v&agrave; giữ form tốt ngay cả sau nhiều lần giặt. Khả năng thấm h&uacute;t mồ h&ocirc;i gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu, đặc biệt trong những ng&agrave;y h&egrave; n&oacute;ng bức hoặc khi di chuyển, vận động nhiều.</p>\r\n\r\n<p>Gam m&agrave;u be trung t&iacute;nh l&agrave; điểm cộng lớn của sản phẩm, mang lại cảm gi&aacute;c thanh lịch, sạch sẽ v&agrave; rất dễ phối đồ. Quần Short Kaki Be c&oacute; thể kết hợp linh hoạt với &aacute;o thun trơn để tạo phong c&aacute;ch trẻ trung, &aacute;o polo để tăng vẻ lịch sự hoặc &aacute;o sơ mi ngắn tay cho những buổi đi chơi, gặp gỡ bạn b&egrave;. D&ugrave; phối theo phong c&aacute;ch casual hay smart-casual, chiếc quần n&agrave;y vẫn giữ được sự h&agrave;i h&ograve;a v&agrave; hiện đại.</p>\r\n\r\n<p>Phần cạp quần được thiết kế chắc chắn, &ocirc;m vừa v&ograve;ng eo, gi&uacute;p quần đứng form khi mặc. Kh&oacute;a k&eacute;o trơn tru, c&uacute;c c&agrave;i bền bỉ, kết hợp c&ugrave;ng hệ thống t&uacute;i trước v&agrave; t&uacute;i sau tiện lợi, đ&aacute;p ứng nhu cầu đựng c&aacute;c vật dụng c&aacute; nh&acirc;n như điện thoại, v&iacute; hoặc ch&igrave;a kh&oacute;a. C&aacute;c đường may được gia c&ocirc;ng tỉ mỉ, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; t&iacute;nh thẩm mỹ của sản phẩm.</p>\r\n\r\n<p>Quần Short Kaki Be l&agrave; lựa chọn l&yacute; tưởng cho nhiều ho&agrave;n cảnh kh&aacute;c nhau như đi chơi, dạo phố, du lịch, c&agrave; ph&ecirc; cuối tuần hay c&aacute;c hoạt động ngo&agrave;i trời. Với thiết kế đơn giản nhưng tinh tế, sản phẩm kh&ocirc;ng chỉ mang lại sự thoải m&aacute;i khi mặc m&agrave; c&ograve;n gi&uacute;p người mặc x&acirc;y dựng phong c&aacute;ch thời trang gọn g&agrave;ng, nam t&iacute;nh v&agrave; hiện đại.</p>\r\n', 1, 7, 1764152216, 1766559171),
(69, 'MNW#449564', 'Quần Short Travel', 'Quần Short Travel được thiết kế dành cho những chuyến đi và lối sống năng động, mang đến sự thoải mái tối đa trong suốt quá trình di chuyển và vận động. Sản phẩm sở hữu form dáng gọn gàng, hiện đại, dễ mặc và phù hợp với nhiều dáng người, giúp người mặc luôn tự tin trong mọi hoàn cảnh. Chất liệu vải nhẹ, thoáng khí, thấm hút mồ hôi tốt và nhanh khô, hạn chế cảm giác bí bách khi mặc lâu hoặc trong điều kiện thời tiết nóng. Nhờ thiết kế đơn giản nhưng tiện dụng, Quần Short Travel dễ dàng phối hợp với áo thun, áo polo hay sơ mi ngắn tay, phù hợp mặc khi du lịch, dạo phố, hoạt động ngoài trời hoặc sinh hoạt hằng ngày, mang lại phong cách trẻ trung, năng động và linh hoạt.', 149000, 'san-pham/quan/quan-short-travel', 20, 'no', 'active', 10, '<p>Quần Short Travel l&agrave; item kh&ocirc;ng thể thiếu đối với những ai y&ecirc;u th&iacute;ch di chuyển, kh&aacute;m ph&aacute; v&agrave; trải nghiệm. Thiết kế quần hướng đến sự thoải m&aacute;i tối đa, gi&uacute;p người mặc linh hoạt trong mọi hoạt động từ đi bộ, di chuyển đường d&agrave;i, tham quan, đến c&aacute;c hoạt động ngo&agrave;i trời như picnic, d&atilde; ngoại hay du lịch biển.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu vải cao cấp, nhẹ v&agrave; tho&aacute;ng m&aacute;t, c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; kh&ocirc; nhanh, gi&uacute;p hạn chế cảm gi&aacute;c b&iacute; b&aacute;ch khi mặc trong thời gian d&agrave;i hoặc trong điều kiện thời tiết n&oacute;ng. Chất vải &iacute;t nhăn, dễ gấp gọn, rất tiện lợi khi mang theo trong vali hay balo du lịch.</p>\r\n\r\n<p>Form quần được thiết kế vừa vặn, độ d&agrave;i hợp l&yacute;, mang lại vẻ ngo&agrave;i gọn g&agrave;ng, năng động nhưng kh&ocirc;ng qu&aacute; ngắn. Phần cạp quần chắc chắn, &ocirc;m vừa v&ograve;ng eo, tạo cảm gi&aacute;c thoải m&aacute;i khi di chuyển li&ecirc;n tục. Một số chi tiết tiện &iacute;ch như t&uacute;i quần rộng r&atilde;i gi&uacute;p người mặc dễ d&agrave;ng mang theo c&aacute;c vật dụng c&aacute; nh&acirc;n cần thiết như điện thoại, v&iacute;, thẻ hoặc ch&igrave;a kh&oacute;a.</p>\r\n\r\n<p>Quần Short Travel c&oacute; thiết kế đơn giản, hiện đại, dễ d&agrave;ng kết hợp với nhiều loại trang phục kh&aacute;c nhau như &aacute;o thun, &aacute;o polo, &aacute;o sơ mi ngắn tay hay &aacute;o kho&aacute;c mỏng. D&ugrave; mặc trong những chuyến đi xa, dạo phố cuối tuần hay sinh hoạt hằng ng&agrave;y, sản phẩm vẫn mang lại phong c&aacute;ch trẻ trung, khỏe khoắn v&agrave; tiện dụng.</p>\r\n\r\n<p>Với t&iacute;nh ứng dụng cao, độ bền tốt v&agrave; sự thoải m&aacute;i khi mặc, Quần Short Travel l&agrave; lựa chọn l&yacute; tưởng cho những ai đang t&igrave;m kiếm một chiếc quần short đa năng, ph&ugrave; hợp với nhiều ho&agrave;n cảnh kh&aacute;c nhau, đặc biệt l&agrave; c&aacute;c chuyến du lịch v&agrave; hoạt động ngo&agrave;i trời.</p>\r\n', 1, 7, 1764152510, 1766559389),
(73, 'MNW#48481', 'Tất Cổ Trung', 'Tất Cổ Trung là phụ kiện thiết yếu trong sinh hoạt hằng ngày, được thiết kế với chiều cao cổ vừa phải giúp bảo vệ cổ chân và mang lại cảm giác thoải mái khi sử dụng. Sản phẩm có form dáng gọn gàng, ôm chân vừa vặn, không gây bó chặt, phù hợp mang trong thời gian dài. Chất liệu vải mềm mại, thoáng khí và thấm hút mồ hôi tốt giúp bàn chân luôn khô ráo, dễ chịu trong quá trình di chuyển và vận động.', 99000, 'san-pham/phu-kien/tat-co-trung', 20, 'no', 'active', 10, '<p>Tất Cổ Trung được thiết kế hướng đến sự tiện dụng v&agrave; thoải m&aacute;i trong qu&aacute; tr&igrave;nh sử dụng hằng ng&agrave;y. Với chiều cao cổ vừa phải, sản phẩm gi&uacute;p bảo vệ cổ ch&acirc;n, hạn chế cọ x&aacute;t với gi&agrave;y, đồng thời mang lại cảm gi&aacute;c gọn g&agrave;ng v&agrave; năng động khi mang. Đ&acirc;y l&agrave; kiểu tất ph&ugrave; hợp với nhiều phong c&aacute;ch thời trang kh&aacute;c nhau, từ casual, thể thao đến streetwear.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải mềm mại, tho&aacute;ng kh&iacute; v&agrave; c&oacute; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p b&agrave;n ch&acirc;n lu&ocirc;n kh&ocirc; r&aacute;o v&agrave; dễ chịu trong suốt thời gian sử dụng. Độ co gi&atilde;n linh hoạt gi&uacute;p tất &ocirc;m vừa b&agrave;n ch&acirc;n m&agrave; kh&ocirc;ng g&acirc;y b&oacute; chặt hay kh&oacute; chịu khi mang l&acirc;u. Chất vải bền bỉ, hạn chế x&ugrave; l&ocirc;ng v&agrave; giữ form tốt sau nhiều lần giặt.</p>\r\n\r\n<p>Thiết kế tất đơn giản nhưng tinh tế, đường may gọn g&agrave;ng, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; t&iacute;nh thẩm mỹ. Phần cổ tất được bo vừa phải, kh&ocirc;ng qu&aacute; chặt, gi&uacute;p cố định tất tốt m&agrave; kh&ocirc;ng để lại vết hằn tr&ecirc;n da. M&agrave;u sắc cơ bản, dễ phối với nhiều loại gi&agrave;y như sneaker, gi&agrave;y thể thao, gi&agrave;y lười hay gi&agrave;y casual.</p>\r\n\r\n<p>Tất Cổ Trung ph&ugrave; hợp sử dụng trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, đi chơi, tập luyện nhẹ hoặc sinh hoạt hằng ng&agrave;y. Với thiết kế đơn giản, dễ d&ugrave;ng v&agrave; độ bền cao, sản phẩm l&agrave; lựa chọn thiết thực, mang lại sự thoải m&aacute;i v&agrave; tiện lợi cho người sử dụng.</p>\r\n', 1, 23, 1764937563, 1766560158),
(74, 'MNW#48815', 'Tất Chạy Bộ Cổ Ngắn', 'Tất Chạy Bộ Cổ Ngắn được thiết kế chuyên dụng cho các hoạt động chạy bộ và vận động thường xuyên, mang đến cảm giác nhẹ, thoáng và linh hoạt khi sử dụng. Thiết kế cổ ngắn gọn gàng giúp hạn chế cọ xát, tạo sự thoải mái tối đa khi mang cùng giày chạy bộ. Chất liệu vải co giãn tốt, thấm hút mồ hôi hiệu quả, giúp bàn chân luôn khô ráo và dễ chịu trong suốt quá trình tập luyện, phù hợp cho cả chạy bộ, tập gym hoặc sinh hoạt năng động hằng ngày.', 99000, 'san-pham/phu-kien/tat-chay-bo-co-ngan', 20, 'no', 'out_of_stock', 10, '<p>Tất Chạy Bộ Cổ Ngắn l&agrave; phụ kiện kh&ocirc;ng thể thiếu đối với những người thường xuy&ecirc;n vận động, đặc biệt l&agrave; chạy bộ v&agrave; tập luyện thể thao. Thiết kế cổ ngắn gi&uacute;p tất &ocirc;m gọn cổ ch&acirc;n, mang lại cảm gi&aacute;c nhẹ nh&agrave;ng, kh&ocirc;ng vướng v&iacute;u, đồng thời tạo sự thoải m&aacute;i khi kết hợp với gi&agrave;y chạy bộ hoặc gi&agrave;y thể thao.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải thể thao cao cấp, mềm mại v&agrave; c&oacute; độ co gi&atilde;n linh hoạt, gi&uacute;p tất &ocirc;m s&aacute;t b&agrave;n ch&acirc;n nhưng kh&ocirc;ng g&acirc;y kh&oacute; chịu khi mang trong thời gian d&agrave;i. Khả năng thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p hạn chế t&igrave;nh trạng ẩm ướt, giảm m&ugrave;i v&agrave; mang lại cảm gi&aacute;c kh&ocirc; tho&aacute;ng ngay cả khi vận động cường độ cao.</p>\r\n\r\n<p>Thiết kế tất ch&uacute; trọng đến sự bền bỉ v&agrave; tiện dụng với đường may chắc chắn, hạn chế x&ugrave; l&ocirc;ng v&agrave; giữ form tốt sau nhiều lần giặt. Phần g&oacute;t v&agrave; mũi tất được gia cố gi&uacute;p tăng độ bền, hạn chế trượt tất khi di chuyển. Kiểu d&aacute;ng đơn giản, m&agrave;u sắc cơ bản dễ phối hợp với nhiều loại gi&agrave;y thể thao v&agrave; trang phục tập luyện.</p>\r\n\r\n<p>Tất Chạy Bộ Cổ Ngắn ph&ugrave; hợp sử dụng cho nhiều hoạt động như chạy bộ, tập gym, đi bộ, chơi thể thao hoặc sinh hoạt hằng ng&agrave;y. Với thiết kế gọn nhẹ, tho&aacute;ng kh&iacute; v&agrave; độ bền cao, sản phẩm mang đến sự thoải m&aacute;i, hỗ trợ tốt cho từng bước ch&acirc;n v&agrave; gi&uacute;p người d&ugrave;ng y&ecirc;n t&acirc;m vận động mỗi ng&agrave;y.</p>\r\n', 1, 23, 1764938487, 1769493120),
(85, 'MNW#48521', 'Áo thun dài tay Compact', 'Áo thun dài tay Compact mang phong cách tối giản, hiện đại, dễ mặc và phù hợp với nhiều hoàn cảnh sử dụng. Sản phẩm được làm từ chất liệu vải Compact cao cấp, bề mặt mềm mịn, dày dặn vừa phải, giúp giữ form tốt và tạo cảm giác thoải mái khi mặc suốt cả ngày. Thiết kế tay dài kết hợp form áo chuẩn mang lại vẻ ngoài gọn gàng, nam tính và lịch sự.\r\n\r\nÁo dễ dàng phối cùng nhiều loại trang phục như quần jeans, quần kaki hay quần tây, thích hợp mặc đi học, đi làm, dạo phố hoặc mặc trong môi trường máy lạnh. Với gam màu cơ bản và kiểu dáng trơn đơn giản, áo thun dài tay Compact là item nền tảng không thể thiếu trong tủ đồ của nam giới hiện đại.', 200000, 'san-pham/ao/ao-thun-special', 20, 'no', 'active', 10, '<p>&Aacute;o thun d&agrave;i tay Compact l&agrave; lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch phong c&aacute;ch đơn giản nhưng vẫn đề cao sự chỉn chu v&agrave; tiện dụng. Sản phẩm được may từ chất liệu vải Compact cao cấp, sợi vải được xử l&yacute; kỹ gi&uacute;p bề mặt mịn, &iacute;t x&ugrave; l&ocirc;ng, giữ form v&agrave; giữ m&agrave;u tốt sau nhiều lần giặt. Độ d&agrave;y vừa phải gi&uacute;p &aacute;o ph&ugrave; hợp mặc quanh năm, đặc biệt th&iacute;ch hợp cho thời tiết se lạnh hoặc m&ocirc;i trường m&aacute;y lạnh.</p>\r\n\r\n<p>Thiết kế &aacute;o trơn, tay d&agrave;i, form d&aacute;ng chuẩn, kh&ocirc;ng qu&aacute; &ocirc;m cũng kh&ocirc;ng qu&aacute; rộng, mang lại cảm gi&aacute;c thoải m&aacute;i khi vận động v&agrave; ph&ugrave; hợp với nhiều v&oacute;c d&aacute;ng kh&aacute;c nhau. Phần cổ &aacute;o được may chắc chắn, hạn chế bai gi&atilde;n, gi&uacute;p tổng thể &aacute;o lu&ocirc;n gọn g&agrave;ng v&agrave; bền đẹp theo thời gian.</p>\r\n\r\n<p>&Aacute;o thun d&agrave;i tay Compact dễ d&agrave;ng phối c&ugrave;ng quần jeans, quần kaki, quần t&acirc;y hoặc mặc layer c&ugrave;ng &aacute;o kho&aacute;c, &aacute;o sơ mi để tạo n&ecirc;n phong c&aacute;ch trẻ trung, năng động hoặc lịch sự, tối giản. Sản phẩm ph&ugrave; hợp mặc đi học, đi l&agrave;m, đi chơi hay sinh hoạt hằng ng&agrave;y. Với thiết kế basic, chất liệu bền đẹp v&agrave; t&iacute;nh ứng dụng cao, đ&acirc;y l&agrave; item kh&ocirc;ng thể thiếu trong tủ đồ nam giới hiện đại.</p>\r\n', 1, 4, 1765096530, 1766390667),
(86, 'MNW#74632', 'Áo thun giữ nhiệt', 'Sản phẩm được nghiên cứu và thiết kế nhằm đáp ứng cả yếu tố thẩm mỹ lẫn tính ứng dụng thực tế. Chất vải được chọn lọc kỹ lưỡng, có độ bền cao, ít nhăn và dễ bảo quản, giúp người mặc luôn cảm thấy dễ chịu và tự tin. Form dáng chuẩn giúp tôn lên vóc dáng nhưng không gây gò bó, phù hợp cho nhiều dáng người. Màu sắc trung tính, hiện đại, dễ kết hợp với các loại trang phục và phụ kiện khác nhau. Các đường may được hoàn thiện chắc chắn, tinh tế đến từng chi tiết, đảm bảo độ bền đẹp theo thời gian. Sản phẩm phù hợp để mặc đi làm, đi học, dạo phố hay gặp gỡ bạn bè, mang đến phong cách chỉn chu và cảm giác thoải mái trong mọi hoạt động.', 299000, 'san-pham/ao/ao-thun-giu-nhiet', 20, 'no', 'active', 10, '<p>Chất liệu: Vải giữ nhiệt mềm mịn, co gi&atilde;n tốt, lớp sợi mịn gi&uacute;p hạn chế tho&aacute;t nhiệt v&agrave; giữ ấm hiệu quả.<br />\r\nForm d&aacute;ng: &Ocirc;m vừa cơ thể, gọn g&agrave;ng, dễ mặc b&ecirc;n trong &aacute;o kho&aacute;c hay &aacute;o ngo&agrave;i m&agrave; kh&ocirc;ng bị cộm.<br />\r\nĐặc t&iacute;nh: Giữ nhiệt tốt, thấm h&uacute;t mồ h&ocirc;i nhanh, kh&ocirc; tho&aacute;ng, kh&ocirc;ng b&iacute; khi vận động. Vải đ&agrave;n hồi ổn định, &iacute;t bai d&atilde;o sau nhiều lần giặt.<br />\r\nCảm gi&aacute;c mặc: Ấm, nhẹ, mềm, &ocirc;m s&aacute;t nhưng thoải m&aacute;i, ph&ugrave; hợp thời tiết lạnh hoặc m&ocirc;i trường điều h&ograve;a mạnh.<br />\r\nỨng dụng: Mặc l&oacute;t b&ecirc;n trong &aacute;o kho&aacute;c, &aacute;o len, đồ c&ocirc;ng sở; d&ugrave;ng để giữ ấm khi đi l&agrave;m, đi học, di chuyển ngo&agrave;i trời.<br />\r\nPhong c&aacute;ch: Tối giản, gọn g&agrave;ng, ưu ti&ecirc;n c&ocirc;ng năng giữ ấm nhưng vẫn mang t&iacute;nh thẩm mỹ.</p>\r\n', 1, 4, 1765096620, 1766333635),
(107, 'MNW#456821', 'Áo Sơ Mi Xám', 'Áo sơ mi xám mang phong cách thanh lịch, hiện đại, là lựa chọn hoàn hảo cho nam giới yêu thích sự tối giản nhưng vẫn chỉn chu. Gam màu xám trung tính giúp tổng thể trang phục trở nên gọn gàng, nam tính và dễ tạo thiện cảm. Chất liệu vải cao cấp mềm mại, thoáng mát, ít nhăn, mang lại cảm giác thoải mái khi mặc suốt cả ngày dài.\r\n\r\nThiết kế form áo chuẩn, đường may tỉ mỉ giúp áo đứng dáng, tôn vóc dáng và phù hợp với nhiều dáng người khác nhau. Áo dễ phối cùng nhiều loại trang phục, thích hợp mặc đi làm, đi học, gặp gỡ đối tác hoặc dạo phố hằng ngày. Đây là item cơ bản nhưng không bao giờ lỗi mốt trong tủ đồ nam giới.', 299000, 'san-pham/ao/ao-so-mi-xam', 15, 'no', 'active', 10, '<p>&Aacute;o sơ mi x&aacute;m l&agrave; sự kết hợp h&agrave;i h&ograve;a giữa t&iacute;nh ứng dụng cao v&agrave; phong c&aacute;ch thời trang hiện đại. Sản phẩm được may từ chất liệu vải chọn lọc kỹ lưỡng, c&oacute; bề mặt mềm mịn, tho&aacute;ng kh&iacute; v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu trong mọi hoạt động. Vải c&oacute; độ bền cao, &iacute;t nhăn, &iacute;t bai d&atilde;o v&agrave; giữ m&agrave;u tốt sau nhiều lần giặt, đảm bảo &aacute;o lu&ocirc;n giữ được vẻ ngo&agrave;i mới mẻ theo thời gian.</p>\r\n\r\n<p>Thiết kế &aacute;o sơ mi trơn với gam m&agrave;u x&aacute;m trung t&iacute;nh mang đến vẻ ngo&agrave;i tinh tế, lịch sự nhưng kh&ocirc;ng qu&aacute; cứng nhắc. Form &aacute;o được nghi&ecirc;n cứu kỹ để ph&ugrave; hợp với v&oacute;c d&aacute;ng nam giới ch&acirc;u &Aacute;, gi&uacute;p che khuyết điểm v&agrave; t&ocirc;n l&ecirc;n sự gọn g&agrave;ng, nam t&iacute;nh. Phần cổ &aacute;o đứng form, tay &aacute;o vừa vặn, c&aacute;c chi tiết đường may được ho&agrave;n thiện cẩn thận, tạo cảm gi&aacute;c chỉn chu trong từng chi tiết nhỏ.</p>\r\n\r\n<p>&Aacute;o sơ mi x&aacute;m dễ d&agrave;ng kết hợp với nhiều phong c&aacute;ch kh&aacute;c nhau. Bạn c&oacute; thể phối c&ugrave;ng quần t&acirc;y để tạo vẻ ngo&agrave;i lịch l&atilde;m nơi c&ocirc;ng sở, kết hợp với quần kaki hoặc quần jeans để mang đến phong c&aacute;ch trẻ trung, năng động. Ngo&agrave;i ra, &aacute;o cũng c&oacute; thể mặc ri&ecirc;ng hoặc layer c&ugrave;ng &aacute;o kho&aacute;c, blazer để tăng th&ecirc;m t&iacute;nh thời trang. Với thiết kế đơn giản, m&agrave;u sắc dễ ứng dụng v&agrave; chất liệu bền đẹp, &aacute;o sơ mi x&aacute;m l&agrave; lựa chọn ph&ugrave; hợp cho cả m&ocirc;i trường l&agrave;m việc lẫn sinh hoạt hằng ng&agrave;y.</p>\r\n', 1, 5, 1765248015, 1766390762),
(108, 'MNW#65954', 'Áo Sơ Mi Cotton', 'Áo sơ mi cotton mang phong cách thanh lịch, hiện đại, phù hợp cho nam giới yêu thích sự đơn giản nhưng vẫn chỉn chu trong từng chi tiết. Sản phẩm được làm từ chất liệu cotton cao cấp, mềm mại, thoáng mát và thấm hút mồ hôi tốt, giúp người mặc luôn cảm thấy dễ chịu suốt cả ngày dài.\r\n\r\nThiết kế form áo chuẩn, đứng dáng, mang lại vẻ ngoài gọn gàng và nam tính. Áo dễ dàng phối cùng nhiều trang phục khác nhau, phù hợp mặc đi làm, đi học, gặp gỡ đối tác hoặc sử dụng trong sinh hoạt hằng ngày. Đây là item cơ bản không thể thiếu trong tủ đồ của nam giới hiện đại.', 299000, 'san-pham/ao/ao-so-mi-cotton', 0, 'no', 'active', 10, '<p>&Aacute;o sơ mi cotton l&agrave; lựa chọn l&yacute; tưởng cho những ai đề cao sự thoải m&aacute;i v&agrave; t&iacute;nh ứng dụng cao trong trang phục hằng ng&agrave;y. Sản phẩm được may từ chất liệu cotton chọn lọc, c&oacute; bề mặt vải mềm mịn, tho&aacute;ng kh&iacute; v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i vượt trội, gi&uacute;p người mặc lu&ocirc;n cảm thấy m&aacute;t mẻ ngay cả khi vận động nhiều hoặc trong thời tiết n&oacute;ng. Chất vải bền đẹp, &iacute;t nhăn, giữ form tốt v&agrave; giữ m&agrave;u ổn định sau nhiều lần giặt, đảm bảo &aacute;o lu&ocirc;n giữ được vẻ ngo&agrave;i chỉnh chu theo thời gian.</p>\r\n\r\n<p>Thiết kế &aacute;o sơ mi trơn mang phong c&aacute;ch tối giản, ph&ugrave; hợp với nhiều độ tuổi v&agrave; ho&agrave;n cảnh sử dụng. Form &aacute;o được nghi&ecirc;n cứu kỹ lưỡng để ph&ugrave; hợp với v&oacute;c d&aacute;ng nam giới, gi&uacute;p t&ocirc;n d&aacute;ng m&agrave; vẫn đảm bảo sự thoải m&aacute;i khi mặc. Phần cổ &aacute;o đứng form, tay &aacute;o vừa vặn, c&aacute;c đường may được ho&agrave;n thiện cẩn thận, tạo n&ecirc;n tổng thể gọn g&agrave;ng, lịch sự v&agrave; tinh tế.</p>\r\n\r\n<p>&Aacute;o sơ mi cotton dễ d&agrave;ng kết hợp với quần t&acirc;y, quần kaki hoặc quần jeans để tạo n&ecirc;n nhiều phong c&aacute;ch kh&aacute;c nhau, từ lịch l&atilde;m nơi c&ocirc;ng sở đến trẻ trung, năng động khi đi chơi. Ngo&agrave;i ra, &aacute;o cũng c&oacute; thể mặc ri&ecirc;ng hoặc phối c&ugrave;ng &aacute;o kho&aacute;c, blazer để tăng th&ecirc;m t&iacute;nh thời trang. Với thiết kế đơn giản, chất liệu tho&aacute;ng m&aacute;t v&agrave; độ bền cao, &aacute;o sơ mi cotton l&agrave; lựa chọn ho&agrave;n hảo cho tủ đồ cơ bản của nam giới.</p>\r\n', 1, 5, 1765248254, 1766392527),
(109, 'MNW#859445', 'Áo Sơ Mi Kẻ Sọc', 'Áo sơ mi kẻ sọc mang phong cách hiện đại, thanh lịch, giúp tạo điểm nhấn tinh tế cho trang phục hằng ngày. Họa tiết kẻ sọc thời trang không chỉ giúp tổng thể áo trở nên nổi bật mà còn tạo cảm giác vóc dáng gọn gàng, cao ráo hơn. Chất liệu vải mềm mại, thoáng mát, mang lại sự thoải mái khi mặc suốt cả ngày dài.\r\n\r\nThiết kế form áo chuẩn, đường may tỉ mỉ, phù hợp với nhiều dáng người và nhiều hoàn cảnh sử dụng. Áo dễ phối đồ, thích hợp mặc đi làm, đi học, gặp gỡ đối tác hoặc dạo phố.', 299000, 'san-pham/ao/ao-so-mi-ke-soc', 15, 'no', 'active', 10, '<p>&Aacute;o sơ mi kẻ sọc l&agrave; lựa chọn l&yacute; tưởng cho nam giới y&ecirc;u th&iacute;ch sự chỉn chu nhưng vẫn muốn thể hiện phong c&aacute;ch ri&ecirc;ng. Sản phẩm được may từ chất liệu vải cao cấp, c&oacute; độ mềm mịn, tho&aacute;ng kh&iacute; v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i tốt, gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu trong mọi điều kiện thời tiết. Vải c&oacute; độ bền cao, &iacute;t nhăn, giữ form v&agrave; giữ m&agrave;u tốt sau nhiều lần giặt, đảm bảo &aacute;o lu&ocirc;n đẹp theo thời gian.</p>\r\n\r\n<p>Họa tiết kẻ sọc được thiết kế tinh tế, c&acirc;n đối, mang đến vẻ ngo&agrave;i trẻ trung, hiện đại nhưng kh&ocirc;ng qu&aacute; cầu kỳ. Form &aacute;o được nghi&ecirc;n cứu để ph&ugrave; hợp với v&oacute;c d&aacute;ng nam giới, gi&uacute;p t&ocirc;n d&aacute;ng, che khuyết điểm v&agrave; tạo cảm gi&aacute;c gọn g&agrave;ng khi mặc. C&aacute;c chi tiết như cổ &aacute;o, tay &aacute;o v&agrave; đường may đều được ho&agrave;n thiện cẩn thận, mang lại sự chỉnh chu v&agrave; lịch sự cho tổng thể sản phẩm.</p>\r\n\r\n<p>&Aacute;o sơ mi kẻ sọc dễ d&agrave;ng kết hợp với quần t&acirc;y để tạo phong c&aacute;ch lịch l&atilde;m nơi c&ocirc;ng sở, hoặc phối c&ugrave;ng quần kaki, quần jeans cho vẻ ngo&agrave;i năng động, trẻ trung. Ngo&agrave;i ra, &aacute;o cũng c&oacute; thể mặc ri&ecirc;ng hoặc layer c&ugrave;ng &aacute;o kho&aacute;c, blazer để tăng th&ecirc;m điểm nhấn thời trang. Với thiết kế tinh tế, chất liệu thoải m&aacute;i v&agrave; t&iacute;nh ứng dụng cao, &aacute;o sơ mi kẻ sọc l&agrave; item kh&ocirc;ng thể thiếu trong tủ đồ nam giới hiện đại.</p>\r\n', 1, 5, 1765248346, 1766392612),
(110, 'MNW#857445', 'Áo Polo Cafes', 'Áo Polo Cafes mang phong cách trẻ trung, hiện đại, kết hợp giữa sự lịch sự của áo polo và cảm giác thoải mái khi mặc hằng ngày. Sản phẩm được làm từ chất liệu vải Cafes cao cấp, có khả năng thấm hút mồ hôi tốt, thoáng mát và hạn chế mùi, giúp người mặc luôn tự tin trong mọi hoạt động.\r\n\r\nThiết kế cổ bẻ thanh lịch, form áo chuẩn, tôn dáng nhưng không gây gò bó. Áo dễ phối đồ, phù hợp mặc đi làm, đi học, dạo phố hoặc tham gia các hoạt động ngoài trời.', 299000, 'san-pham/ao/ao-polo-cafe', 0, 'no', 'active', 10, '<p>&Aacute;o Polo Cafes l&agrave; lựa chọn l&yacute; tưởng cho nam giới y&ecirc;u th&iacute;ch phong c&aacute;ch gọn g&agrave;ng, năng động nhưng vẫn giữ được sự lịch sự cần thiết. Sản phẩm sử dụng chất liệu vải Cafes cao cấp, được xử l&yacute; từ sợi c&agrave; ph&ecirc; tự nhi&ecirc;n, mang lại bề mặt vải mềm mại, tho&aacute;ng kh&iacute; v&agrave; khả năng thấm h&uacute;t mồ h&ocirc;i hiệu quả. Đặc biệt, chất vải c&ograve;n gi&uacute;p hạn chế m&ugrave;i kh&oacute; chịu, nhanh kh&ocirc; v&agrave; th&acirc;n thiện với l&agrave;n da, ph&ugrave; hợp cho việc mặc suốt cả ng&agrave;y d&agrave;i.</p>\r\n\r\n<p>Thiết kế &aacute;o polo cổ bẻ kết hợp h&agrave;ng n&uacute;t tinh tế gi&uacute;p tổng thể trở n&ecirc;n nam t&iacute;nh v&agrave; hiện đại. Form &aacute;o được may chuẩn, &ocirc;m vừa vặn cơ thể nhưng vẫn đảm bảo sự thoải m&aacute;i khi vận động. C&aacute;c chi tiết như cổ &aacute;o, tay &aacute;o v&agrave; đường may đều được ho&agrave;n thiện tỉ mỉ, gi&uacute;p &aacute;o giữ form tốt v&agrave; bền đẹp theo thời gian.</p>\r\n\r\n<p>&Aacute;o Polo Cafes dễ d&agrave;ng phối c&ugrave;ng quần jeans, quần kaki hoặc quần short để tạo n&ecirc;n nhiều phong c&aacute;ch kh&aacute;c nhau, từ lịch sự khi đi l&agrave;m đến trẻ trung, năng động khi đi chơi. Ngo&agrave;i ra, &aacute;o cũng ph&ugrave; hợp cho c&aacute;c hoạt động ngo&agrave;i trời hoặc m&ocirc;i trường m&aacute;y lạnh. Với thiết kế hiện đại, chất liệu cao cấp v&agrave; t&iacute;nh ứng dụng cao, &aacute;o Polo Cafes l&agrave; item kh&ocirc;ng thể thiếu trong tủ đồ nam giới.</p>\r\n', 1, 12, 1765248581, 1766392667),
(111, 'MNW#695956', 'Áo Polo Cotton Linen', 'Áo Polo Cotton Linen mang phong cách thanh lịch, nhẹ nhàng và hiện đại, là lựa chọn lý tưởng cho những ngày thời tiết nóng hoặc môi trường cần sự thoải mái. Sản phẩm được làm từ chất liệu Cotton Linen cao cấp, kết hợp ưu điểm mềm mại của cotton và độ thoáng mát tự nhiên của linen, giúp áo nhẹ, thoáng khí và dễ chịu khi mặc cả ngày.\r\n\r\nThiết kế cổ polo gọn gàng, form áo chuẩn, tạo vẻ ngoài chỉn chu nhưng vẫn trẻ trung. Áo dễ phối đồ, phù hợp mặc đi làm, đi học, dạo phố hoặc gặp gỡ bạn bè.', 398000, 'san-pham/ao/ao-polo-cotton-linen', 20, 'no', 'active', 10, '<p>&Aacute;o Polo Cotton Linen l&agrave; sự kết hợp ho&agrave;n hảo giữa phong c&aacute;ch lịch sự v&agrave; cảm gi&aacute;c thoải m&aacute;i trong trang phục hằng ng&agrave;y. Sản phẩm sử dụng chất liệu Cotton Linen cao cấp, c&oacute; bề mặt vải mềm nhẹ, tho&aacute;ng kh&iacute;, thấm h&uacute;t mồ h&ocirc;i tốt v&agrave; hạn chế b&iacute; b&aacute;ch trong điều kiện thời tiết n&oacute;ng. Sự pha trộn giữa cotton v&agrave; linen gi&uacute;p &aacute;o giữ được độ mềm mại, đứng form vừa phải nhưng vẫn mang lại cảm gi&aacute;c m&aacute;t mẻ, tự nhi&ecirc;n khi mặc.</p>\r\n\r\n<p>Thiết kế &aacute;o polo cổ bẻ kết hợp h&agrave;ng n&uacute;t tinh tế mang đến vẻ ngo&agrave;i gọn g&agrave;ng, nam t&iacute;nh v&agrave; hiện đại. Form &aacute;o được may chuẩn, kh&ocirc;ng qu&aacute; &ocirc;m cũng kh&ocirc;ng qu&aacute; rộng, gi&uacute;p t&ocirc;n d&aacute;ng v&agrave; tạo sự thoải m&aacute;i khi vận động. C&aacute;c chi tiết như cổ &aacute;o, tay &aacute;o v&agrave; đường may được ho&agrave;n thiện cẩn thận, gi&uacute;p &aacute;o giữ form tốt v&agrave; bền đẹp theo thời gian.</p>\r\n\r\n<p>&Aacute;o Polo Cotton Linen dễ d&agrave;ng phối c&ugrave;ng quần jeans, quần kaki, quần t&acirc;y hoặc quần short để tạo n&ecirc;n nhiều phong c&aacute;ch kh&aacute;c nhau, từ lịch sự nơi c&ocirc;ng sở đến trẻ trung, năng động khi dạo phố. Ngo&agrave;i ra, &aacute;o cũng ph&ugrave; hợp mặc trong c&aacute;c buổi gặp gỡ, đi chơi hoặc c&aacute;c hoạt động ngo&agrave;i trời nhẹ nh&agrave;ng. Với thiết kế tinh tế, chất liệu tho&aacute;ng m&aacute;t v&agrave; t&iacute;nh ứng dụng cao, &aacute;o Polo Cotton Linen l&agrave; item kh&ocirc;ng thể thiếu trong tủ đồ nam giới hiện đại.</p>\r\n', 1, 12, 1765248637, 1766392766),
(112, 'MNW#456623', 'Quần Short Chino', 'Quần Short Chino mang phong cách lịch sự pha chút trẻ trung, là lựa chọn lý tưởng cho những ai yêu thích sự gọn gàng nhưng vẫn đề cao tính thoải mái. Với thiết kế form dáng hiện đại, dễ mặc, kết hợp cùng chất liệu chino mềm mại, thoáng mát, sản phẩm giúp người mặc luôn cảm thấy dễ chịu trong các hoạt động hằng ngày, từ đi làm, đi chơi đến dạo phố cuối tuần.', 188000, 'san-pham/quan/quan-short-chino', 0, 'no', 'active', 10, '<p>Quần Short Chino được thiết kế d&agrave;nh cho nam giới theo đuổi phong c&aacute;ch smart-casual, vừa lịch sự vừa năng động. Form quần được may chuẩn, độ d&agrave;i hợp l&yacute;, tạo cảm gi&aacute;c gọn g&agrave;ng v&agrave; t&ocirc;n d&aacute;ng, ph&ugrave; hợp với nhiều v&oacute;c d&aacute;ng kh&aacute;c nhau. Đ&acirc;y l&agrave; kiểu quần short c&oacute; thể thay thế cho quần short thể thao trong những dịp cần sự chỉn chu hơn.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải chino cao cấp với bề mặt vải mịn, mềm v&agrave; tho&aacute;ng kh&iacute;, mang lại cảm gi&aacute;c dễ chịu khi mặc trong thời gian d&agrave;i. Chất vải c&oacute; độ đứng form vừa phải, &iacute;t nhăn v&agrave; bền m&agrave;u, gi&uacute;p quần lu&ocirc;n giữ được vẻ ngo&agrave;i chỉnh chu ngay cả sau nhiều lần giặt. Khả năng thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p người mặc thoải m&aacute;i trong điều kiện thời tiết n&oacute;ng.</p>\r\n\r\n<p>Thiết kế quần tập trung v&agrave;o sự đơn giản v&agrave; tinh tế, với phần cạp chắc chắn, kh&oacute;a k&eacute;o mượt m&agrave;, c&uacute;c c&agrave;i bền bỉ. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, vừa tăng t&iacute;nh tiện dụng vừa giữ được vẻ ngo&agrave;i thanh lịch cho sản phẩm. C&aacute;c đường may được gia c&ocirc;ng tỉ mỉ, đảm bảo độ bền v&agrave; t&iacute;nh thẩm mỹ cao.</p>\r\n\r\n<p>Quần Short Chino rất dễ phối đồ: c&oacute; thể kết hợp c&ugrave;ng &aacute;o thun để tạo phong c&aacute;ch trẻ trung, &aacute;o polo cho vẻ ngo&agrave;i gọn g&agrave;ng hoặc &aacute;o sơ mi ngắn tay để ph&ugrave; hợp với những buổi gặp gỡ, dạo phố hay c&agrave; ph&ecirc; cuối tuần. Đ&acirc;y l&agrave; lựa chọn linh hoạt cho nhiều ho&agrave;n cảnh, mang lại phong c&aacute;ch hiện đại, lịch sự v&agrave; năng động cho người mặc.</p>\r\n', 1, 7, 1765261774, 1766559543),
(113, 'MNW#448564', 'Quần Short Phối Màu', 'Quần Short Phối Màu nổi bật với thiết kế trẻ trung, năng động, tạo điểm nhấn cá tính nhờ cách phối màu hài hòa và hiện đại. Sản phẩm mang đến cảm giác mới mẻ trong phong cách hằng ngày, đồng thời đảm bảo sự thoải mái khi mặc nhờ chất liệu mềm mại, thoáng mát và form dáng gọn gàng, dễ vận động. Đây là lựa chọn lý tưởng cho những ai yêu thích sự khác biệt nhưng vẫn muốn giữ vẻ ngoài thời trang và linh hoạt.', 188000, 'san-pham/quan/quan-short-phoi-mau', 0, 'yes', 'active', 10, '<p>Quần Short Phối M&agrave;u được thiết kế d&agrave;nh cho những người trẻ y&ecirc;u th&iacute;ch phong c&aacute;ch năng động, c&aacute; t&iacute;nh v&agrave; kh&ocirc;ng ngại thể hiện gu thời trang ri&ecirc;ng. Điểm nhấn của sản phẩm nằm ở c&aacute;ch phối m&agrave;u tinh tế, gi&uacute;p tổng thể quần trở n&ecirc;n nổi bật nhưng kh&ocirc;ng qu&aacute; rối mắt, dễ d&agrave;ng kết hợp với nhiều kiểu trang phục kh&aacute;c nhau.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải cao cấp, mềm nhẹ v&agrave; tho&aacute;ng kh&iacute;, mang lại cảm gi&aacute;c dễ chịu khi mặc trong thời gian d&agrave;i. Khả năng thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p người mặc lu&ocirc;n kh&ocirc; tho&aacute;ng, đặc biệt ph&ugrave; hợp trong những ng&agrave;y thời tiết n&oacute;ng hoặc khi tham gia c&aacute;c hoạt động ngo&agrave;i trời. Chất vải c&oacute; độ bền cao, hạn chế nhăn v&agrave; giữ form tốt sau nhiều lần giặt.</p>\r\n\r\n<p>Form quần được may gọn g&agrave;ng, độ d&agrave;i vừa phải, gi&uacute;p t&ocirc;n d&aacute;ng v&agrave; tạo cảm gi&aacute;c năng động. Phần cạp quần chắc chắn, &ocirc;m vừa v&ograve;ng eo, gi&uacute;p người mặc thoải m&aacute;i khi di chuyển. C&aacute;c chi tiết như t&uacute;i quần tiện lợi, đường may tỉ mỉ g&oacute;p phần n&acirc;ng cao t&iacute;nh ứng dụng v&agrave; độ bền của sản phẩm.</p>\r\n\r\n<p>Quần Short Phối M&agrave;u rất dễ phối đồ: c&oacute; thể kết hợp c&ugrave;ng &aacute;o thun trơn để l&agrave;m nổi bật thiết kế quần, hoặc phối với &aacute;o polo, &aacute;o sơ mi ngắn tay để tạo phong c&aacute;ch trẻ trung, hiện đại. Sản phẩm ph&ugrave; hợp mặc khi đi chơi, dạo phố, du lịch, gặp gỡ bạn b&egrave; hay c&aacute;c hoạt động ngo&agrave;i trời, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; nổi bật trong mọi ho&agrave;n cảnh.</p>\r\n', 1, 7, 1765261959, 1766582241),
(114, 'MNW#48564', 'Quần Short Ultra', 'Quần Short Ultra được thiết kế theo phong cách hiện đại, tối ưu cho sự thoải mái và linh hoạt trong mọi hoạt động hằng ngày. Sản phẩm nổi bật với form dáng gọn gàng, chất liệu nhẹ, thoáng khí và khả năng co giãn tốt, giúp người mặc dễ dàng vận động mà vẫn giữ được vẻ ngoài năng động, khỏe khoắn. Với thiết kế đơn giản nhưng tinh tế, Quần Short Ultra phù hợp mặc khi đi chơi, dạo phố, tập luyện nhẹ hoặc sinh hoạt thường ngày.', 188000, 'san-pham/quan/quan-short-ultra', 0, 'no', 'active', 10, '<p>Quần Short Ultra l&agrave; lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch phong c&aacute;ch năng động, hiện đại v&agrave; đề cao sự tiện dụng trong trang phục. Sản phẩm được thiết kế với form d&aacute;ng vừa vặn, độ d&agrave;i hợp l&yacute;, tạo cảm gi&aacute;c gọn g&agrave;ng v&agrave; gi&uacute;p t&ocirc;n d&aacute;ng người mặc m&agrave; kh&ocirc;ng g&acirc;y kh&oacute; chịu khi di chuyển.</p>\r\n\r\n<p>Chất liệu vải được lựa chọn kỹ lưỡng, mang đặc t&iacute;nh nhẹ, mềm v&agrave; tho&aacute;ng m&aacute;t, gi&uacute;p hạn chế cảm gi&aacute;c n&oacute;ng b&iacute; khi mặc trong thời gian d&agrave;i. Khả năng co gi&atilde;n linh hoạt hỗ trợ tốt cho c&aacute;c hoạt động thường ng&agrave;y, từ đi bộ, di chuyển đến c&aacute;c hoạt động vận động nhẹ. Đồng thời, vải c&oacute; độ bền cao, &iacute;t nhăn v&agrave; giữ form tốt sau nhiều lần giặt.</p>\r\n\r\n<p>Thiết kế Quần Short Ultra hướng đến sự tối giản nhưng vẫn ch&uacute; trọng đến t&iacute;nh ứng dụng. Phần cạp quần chắc chắn, &ocirc;m vừa v&ograve;ng eo, tạo cảm gi&aacute;c thoải m&aacute;i v&agrave; ổn định khi mặc. Hệ thống t&uacute;i quần được bố tr&iacute; hợp l&yacute;, tiện lợi để mang theo c&aacute;c vật dụng c&aacute; nh&acirc;n cần thiết. C&aacute;c đường may được gia c&ocirc;ng cẩn thận, đảm bảo độ bền v&agrave; t&iacute;nh thẩm mỹ cho sản phẩm.</p>\r\n\r\n<p>Quần Short Ultra dễ d&agrave;ng phối hợp với nhiều loại trang phục kh&aacute;c nhau như &aacute;o thun, &aacute;o polo hoặc &aacute;o thể thao, gi&uacute;p người mặc linh hoạt thay đổi phong c&aacute;ch. D&ugrave; sử dụng trong sinh hoạt hằng ng&agrave;y, đi chơi, dạo phố hay c&aacute;c hoạt động ngo&agrave;i trời, sản phẩm vẫn mang lại vẻ ngo&agrave;i trẻ trung, năng động v&agrave; hiện đại.</p>\r\n', 1, 7, 1765262034, 1766559727),
(115, 'MNW#899646', 'Quần Jean SlimFit Đen', 'Quần Jean SlimFit Đen mang phong cách hiện đại, nam tính với thiết kế ôm vừa gọn gàng, giúp tôn dáng nhưng vẫn đảm bảo sự thoải mái khi mặc. Gam màu đen basic dễ phối đồ, phù hợp với nhiều hoàn cảnh từ đi học, đi chơi đến dạo phố hay gặp gỡ bạn bè. Chất liệu jean bền bỉ, đứng form tốt, mang lại vẻ ngoài gọn gàng và phong cách cho người mặc.', 399000, 'san-pham/quan/quan-jean-slimfit-den', 15, 'no', 'active', 10, '<p>Quần Jean SlimFit Đen l&agrave; item thời trang cơ bản nhưng kh&ocirc;ng thể thiếu trong tủ đồ của nam giới hiện đại. Sản phẩm được thiết kế theo form slimfit &ocirc;m nhẹ theo d&aacute;ng ch&acirc;n, gi&uacute;p tạo cảm gi&aacute;c thon gọn, cao r&aacute;o m&agrave; kh&ocirc;ng qu&aacute; b&oacute;, mang lại sự thoải m&aacute;i khi di chuyển v&agrave; sinh hoạt hằng ng&agrave;y.</p>\r\n\r\n<p>Chất liệu jean cao cấp được lựa chọn kỹ lưỡng, c&oacute; độ d&agrave;y vừa phải, bền chắc v&agrave; giữ form tốt sau nhiều lần sử dụng. Bề mặt vải mềm hơn theo thời gian mặc, hạn chế nhăn v&agrave; &iacute;t bai gi&atilde;n, gi&uacute;p quần lu&ocirc;n giữ được vẻ ngo&agrave;i chỉnh chu. Gam m&agrave;u đen trơn mang lại cảm gi&aacute;c mạnh mẽ, nam t&iacute;nh v&agrave; rất dễ phối với nhiều kiểu trang phục kh&aacute;c nhau.</p>\r\n\r\n<p>Thiết kế quần tập trung v&agrave;o sự tối giản v&agrave; tinh tế, với phần cạp chắc chắn, kh&oacute;a k&eacute;o mượt, c&uacute;c c&agrave;i bền bỉ. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, vừa tăng t&iacute;nh tiện dụng vừa giữ được n&eacute;t đặc trưng của quần jean truyền thống. C&aacute;c đường may được gia c&ocirc;ng cẩn thận, đảm bảo độ bền cao v&agrave; t&iacute;nh thẩm mỹ cho sản phẩm.</p>\r\n\r\n<p>Quần Jean SlimFit Đen c&oacute; thể dễ d&agrave;ng kết hợp c&ugrave;ng &aacute;o thun để tạo phong c&aacute;ch trẻ trung, năng động; phối với &aacute;o polo hoặc &aacute;o sơ mi để mang lại vẻ ngo&agrave;i gọn g&agrave;ng, lịch sự hơn. Sản phẩm ph&ugrave; hợp mặc trong nhiều ho&agrave;n cảnh như đi học, đi chơi, dạo phố, c&agrave; ph&ecirc; hay c&aacute;c buổi gặp gỡ hằng ng&agrave;y, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; phong c&aacute;ch.</p>\r\n', 1, 6, 1765340094, 1766559811),
(116, 'MNW#899525', 'Quần Jean Slimfit Xanh', 'Quần Jean Slimfit Xanh sở hữu thiết kế hiện đại với form dáng ôm vừa, giúp tôn dáng nhưng vẫn mang lại cảm giác thoải mái khi mặc. Gam màu xanh jean trẻ trung, năng động, dễ phối đồ, phù hợp với nhiều phong cách khác nhau từ casual đến lịch sự. Chất liệu jean bền bỉ, đứng form tốt, là lựa chọn lý tưởng cho trang phục hằng ngày.', 399000, 'san-pham/quan/quan-jean-slimfit-xanh', 0, 'no', 'active', 10, '<p>Quần Jean Slimfit Xanh l&agrave; item cơ bản kh&ocirc;ng thể thiếu trong tủ đồ của nam giới, ph&ugrave; hợp với những ai y&ecirc;u th&iacute;ch phong c&aacute;ch gọn g&agrave;ng, trẻ trung v&agrave; hiện đại. Form quần slimfit được thiết kế &ocirc;m nhẹ theo d&aacute;ng ch&acirc;n, gi&uacute;p t&ocirc;n v&oacute;c d&aacute;ng, tạo cảm gi&aacute;c thon gọn m&agrave; kh&ocirc;ng g&acirc;y kh&oacute; chịu khi vận động hay di chuyển.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu jean cao cấp với độ d&agrave;y vừa phải, đảm bảo độ bền cao v&agrave; khả năng giữ form tốt sau nhiều lần sử dụng. Bề mặt vải mềm mại dần theo thời gian, hạn chế nhăn v&agrave; &iacute;t bai gi&atilde;n, mang lại sự thoải m&aacute;i khi mặc l&acirc;u. Gam m&agrave;u xanh jean tự nhi&ecirc;n tạo cảm gi&aacute;c năng động, dễ kết hợp với nhiều loại &aacute;o v&agrave; phụ kiện kh&aacute;c nhau.</p>\r\n\r\n<p>Thiết kế quần ch&uacute; trọng đến sự tối giản v&agrave; t&iacute;nh ứng dụng cao. Phần cạp quần chắc chắn, kh&oacute;a k&eacute;o trơn tru, c&uacute;c c&agrave;i bền bỉ gi&uacute;p quần lu&ocirc;n ổn định khi mặc. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, đ&aacute;p ứng nhu cầu sử dụng hằng ng&agrave;y m&agrave; vẫn giữ được n&eacute;t đặc trưng của quần jean truyền thống. Đường may được gia c&ocirc;ng cẩn thận, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; t&iacute;nh thẩm mỹ của sản phẩm.</p>\r\n\r\n<p>Quần Jean Slimfit Xanh dễ d&agrave;ng phối đồ với &aacute;o thun để tạo phong c&aacute;ch trẻ trung, năng động; kết hợp c&ugrave;ng &aacute;o polo hoặc &aacute;o sơ mi cho vẻ ngo&agrave;i gọn g&agrave;ng, lịch sự hơn. Sản phẩm ph&ugrave; hợp mặc khi đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc; hay gặp gỡ bạn b&egrave;, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; phong c&aacute;ch trong mọi ho&agrave;n cảnh.</p>\r\n', 1, 6, 1765340264, 1766559855),
(117, 'MNW#896425', 'Quần Jean Straight Đen', 'Quần Jean Straight Đen mang phong cách tối giản, hiện đại với form dáng ống đứng cổ điển, tạo cảm giác gọn gàng và dễ mặc cho nhiều vóc dáng. Gam màu đen basic giúp sản phẩm dễ phối đồ, phù hợp với nhiều phong cách từ trẻ trung, năng động đến lịch sự, chỉn chu. Chất liệu jean bền bỉ, đứng form tốt, là lựa chọn linh hoạt cho trang phục hằng ngày.', 399000, 'san-pham/quan/quan-jean-straight-den', 0, 'no', 'active', 10, '<p>Quần Jean Straight Đen l&agrave; item thời trang cơ bản nhưng kh&ocirc;ng bao giờ lỗi mốt, ph&ugrave; hợp với nam giới y&ecirc;u th&iacute;ch phong c&aacute;ch đơn giản, nam t&iacute;nh v&agrave; dễ ứng dụng. Thiết kế form ống đứng gi&uacute;p quần rơi thẳng từ h&ocirc;ng xuống ống, tạo cảm gi&aacute;c c&acirc;n đối cho d&aacute;ng người, đồng thời mang lại sự thoải m&aacute;i khi mặc so với c&aacute;c kiểu quần &ocirc;m s&aacute;t.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu jean cao cấp với độ d&agrave;y vừa phải, bền chắc v&agrave; c&oacute; khả năng giữ form tốt sau thời gian d&agrave;i sử dụng. Bề mặt vải &iacute;t nhăn, hạn chế bai gi&atilde;n, đồng thời trở n&ecirc;n mềm mại hơn theo thời gian mặc, gi&uacute;p người d&ugrave;ng lu&ocirc;n cảm thấy dễ chịu. Gam m&agrave;u đen trơn mang đến vẻ ngo&agrave;i mạnh mẽ, sạch sẽ v&agrave; rất dễ kết hợp với nhiều kiểu trang phục kh&aacute;c nhau.</p>\r\n\r\n<p>Thiết kế quần ch&uacute; trọng đến sự tối giản v&agrave; t&iacute;nh thực tế trong sử dụng. Phần cạp quần chắc chắn, kh&oacute;a k&eacute;o mượt m&agrave;, c&uacute;c c&agrave;i bền bỉ gi&uacute;p quần lu&ocirc;n ổn định khi mặc. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, vừa đảm bảo t&iacute;nh tiện dụng vừa giữ được n&eacute;t đặc trưng của quần jean truyền thống. C&aacute;c đường may được gia c&ocirc;ng cẩn thận, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; t&iacute;nh thẩm mỹ cho sản phẩm.</p>\r\n\r\n<p>Quần Jean Straight Đen dễ d&agrave;ng phối đồ với &aacute;o thun để tạo phong c&aacute;ch trẻ trung, năng động; kết hợp c&ugrave;ng &aacute;o polo hoặc &aacute;o sơ mi để mang lại vẻ ngo&agrave;i lịch sự, gọn g&agrave;ng hơn. Sản phẩm ph&ugrave; hợp mặc trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc; hay gặp gỡ bạn b&egrave;, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; phong c&aacute;ch trong mọi t&igrave;nh huống.</p>\r\n', 1, 6, 1765340357, 1766559930),
(118, 'MNW#889452', 'Quần Jean Copper Đen', 'Quần Jean Copper Đen sở hữu phong cách mạnh mẽ, cá tính với gam màu đen nam tính kết hợp cùng thiết kế hiện đại. Form dáng gọn gàng, dễ mặc giúp tôn vóc dáng nhưng vẫn đảm bảo sự thoải mái trong sinh hoạt hằng ngày. Chất liệu jean bền bỉ, đứng form tốt, phù hợp với nhiều phong cách khác nhau từ trẻ trung, năng động đến lịch sự, chỉn chu.', 399000, 'san-pham/quan/quan-jean-copper-den', 20, 'no', 'active', 10, '<p>Quần Jean Copper Đen l&agrave; lựa chọn d&agrave;nh cho nam giới y&ecirc;u th&iacute;ch phong c&aacute;ch c&aacute; t&iacute;nh, hiện đại nhưng vẫn đề cao t&iacute;nh ứng dụng cao trong trang phục hằng ng&agrave;y. Thiết kế quần mang d&aacute;ng vẻ gọn g&agrave;ng, gi&uacute;p tổng thể trang phục trở n&ecirc;n nam t&iacute;nh v&agrave; mạnh mẽ hơn, ph&ugrave; hợp với nhiều d&aacute;ng người kh&aacute;c nhau.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu jean cao cấp với độ d&agrave;y vừa phải, mang lại độ bền cao v&agrave; khả năng giữ form ổn định sau thời gian d&agrave;i sử dụng. Bề mặt vải hạn chế nhăn, &iacute;t bai gi&atilde;n v&agrave; trở n&ecirc;n mềm mại hơn theo thời gian mặc, gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu. Gam m&agrave;u đen trơn gi&uacute;p quần dễ phối đồ, đồng thời mang lại cảm gi&aacute;c sạch sẽ, hiện đại v&agrave; kh&ocirc;ng lỗi mốt.</p>\r\n\r\n<p>Thiết kế ch&uacute; trọng đến c&aacute;c chi tiết ho&agrave;n thiện như phần cạp quần chắc chắn, kh&oacute;a k&eacute;o trơn tru v&agrave; c&uacute;c c&agrave;i bền bỉ, đảm bảo sự ổn định khi mặc. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, vừa tiện dụng vừa giữ được n&eacute;t đặc trưng của quần jean. C&aacute;c đường may được gia c&ocirc;ng tỉ mỉ, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; gi&aacute; trị thẩm mỹ của sản phẩm.</p>\r\n\r\n<p>Quần Jean Copper Đen c&oacute; thể dễ d&agrave;ng kết hợp c&ugrave;ng &aacute;o thun để tạo phong c&aacute;ch trẻ trung, năng động; phối với &aacute;o polo hoặc &aacute;o sơ mi cho vẻ ngo&agrave;i gọn g&agrave;ng, lịch sự hơn. Sản phẩm ph&ugrave; hợp mặc khi đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc; hay gặp gỡ bạn b&egrave;, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; phong c&aacute;ch trong mọi ho&agrave;n cảnh.</p>\r\n', 1, 6, 1765340548, 1766559975),
(119, 'MNW#889485', 'Quần Jean Copper Xanh', 'Quần Jean Copper Xanh mang phong cách trẻ trung, hiện đại với gam màu xanh jean tự nhiên, dễ phối đồ và không bao giờ lỗi mốt. Thiết kế form dáng gọn gàng giúp tôn vóc dáng, tạo cảm giác nam tính nhưng vẫn đảm bảo sự thoải mái khi mặc. Chất liệu jean bền bỉ, đứng form tốt, phù hợp cho nhiều hoàn cảnh sử dụng hằng ngày.', 399000, 'san-pham/quan/quan-jean-copper-xanh', 0, 'yes', 'active', 10, '<p>Quần Jean Copper Xanh l&agrave; lựa chọn l&yacute; tưởng cho nam giới y&ecirc;u th&iacute;ch phong c&aacute;ch năng động, c&aacute; t&iacute;nh nhưng vẫn đề cao sự tiện dụng trong trang phục. Thiết kế quần mang d&aacute;ng vẻ gọn g&agrave;ng, hiện đại, gi&uacute;p tổng thể trang phục trở n&ecirc;n c&acirc;n đối v&agrave; dễ ứng dụng trong nhiều ho&agrave;n cảnh kh&aacute;c nhau.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu jean cao cấp với độ d&agrave;y vừa phải, mang lại độ bền cao v&agrave; khả năng giữ form ổn định sau thời gian d&agrave;i sử dụng. Bề mặt vải &iacute;t nhăn, hạn chế bai gi&atilde;n v&agrave; mềm mại hơn theo thời gian mặc, gi&uacute;p người mặc lu&ocirc;n cảm thấy dễ chịu d&ugrave; sử dụng trong thời gian d&agrave;i. Gam m&agrave;u xanh jean tự nhi&ecirc;n tạo cảm gi&aacute;c trẻ trung, năng động v&agrave; rất dễ phối với nhiều kiểu &aacute;o kh&aacute;c nhau.</p>\r\n\r\n<p>Thiết kế quần ch&uacute; trọng đến sự ho&agrave;n thiện ở từng chi tiết như phần cạp chắc chắn, kh&oacute;a k&eacute;o trơn tru, c&uacute;c c&agrave;i bền bỉ, gi&uacute;p quần lu&ocirc;n ổn định khi mặc. Hệ thống t&uacute;i trước v&agrave; t&uacute;i sau được bố tr&iacute; hợp l&yacute;, vừa đảm bảo t&iacute;nh tiện dụng vừa giữ được n&eacute;t đặc trưng của quần jean truyền thống. C&aacute;c đường may được gia c&ocirc;ng tỉ mỉ, chắc chắn, g&oacute;p phần n&acirc;ng cao độ bền v&agrave; t&iacute;nh thẩm mỹ cho sản phẩm.</p>\r\n\r\n<p>Quần Jean Copper Xanh dễ d&agrave;ng kết hợp c&ugrave;ng &aacute;o thun để tạo phong c&aacute;ch trẻ trung, năng động; phối với &aacute;o polo hoặc &aacute;o sơ mi cho vẻ ngo&agrave;i gọn g&agrave;ng, lịch sự hơn. Sản phẩm ph&ugrave; hợp mặc khi đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc; hay gặp gỡ bạn b&egrave;, gi&uacute;p người mặc lu&ocirc;n tự tin v&agrave; phong c&aacute;ch trong mọi ho&agrave;n cảnh.</p>\r\n', 1, 6, 1765340596, 1766582240);
INSERT INTO `tbl_products` (`product_id`, `product_code`, `product_name`, `product_desc`, `product_price`, `product_slug`, `product_sales`, `product_up_sales`, `product_status`, `stock_quantity`, `product_details`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(120, 'MNW#899653', 'Wrisbrand Cầu Lông', 'Wristband Cầu Lông là phụ kiện thể thao cần thiết dành cho người chơi cầu lông và các môn vận động tay, giúp thấm hút mồ hôi hiệu quả và hỗ trợ cổ tay khi thi đấu hoặc tập luyện. Thiết kế gọn nhẹ, ôm vừa cổ tay, mang lại cảm giác thoải mái, không vướng víu trong quá trình di chuyển và vung tay. Chất liệu mềm mại, co giãn tốt giúp người dùng luôn tự tin và tập trung vào từng pha cầu.', 99000, 'san-pham/phu-kien/wrisbrand-cau-long', 15, 'no', 'active', 10, '<p>Wristband Cầu L&ocirc;ng được thiết kế nhằm hỗ trợ tối đa cho người chơi trong qu&aacute; tr&igrave;nh tập luyện v&agrave; thi đấu. Phụ kiện n&agrave;y gi&uacute;p thấm h&uacute;t mồ h&ocirc;i ở cổ tay v&agrave; b&agrave;n tay, hạn chế t&igrave;nh trạng trơn trượt khi cầm vợt, từ đ&oacute; gi&uacute;p c&aacute;c động t&aacute;c đ&aacute;nh cầu trở n&ecirc;n chắc chắn v&agrave; ch&iacute;nh x&aacute;c hơn.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải thể thao cao cấp, mềm mại, tho&aacute;ng kh&iacute; v&agrave; c&oacute; độ co gi&atilde;n linh hoạt, gi&uacute;p wristband &ocirc;m vừa cổ tay m&agrave; kh&ocirc;ng g&acirc;y cảm gi&aacute;c b&oacute; chặt hay kh&oacute; chịu khi mang l&acirc;u. Khả năng thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p giữ cho cổ tay lu&ocirc;n kh&ocirc; r&aacute;o, tạo sự thoải m&aacute;i ngay cả khi vận động với cường độ cao.</p>\r\n\r\n<p>Thiết kế wristband đơn giản nhưng năng động, ph&ugrave; hợp với nhiều phong c&aacute;ch thể thao kh&aacute;c nhau. Đường may chắc chắn, giữ form tốt sau nhiều lần giặt, đảm bảo độ bền trong qu&aacute; tr&igrave;nh sử dụng. K&iacute;ch thước vừa vặn, dễ đeo, ph&ugrave; hợp cho cả người mới tập chơi lẫn người chơi cầu l&ocirc;ng thường xuy&ecirc;n.</p>\r\n\r\n<p>Wristband Cầu L&ocirc;ng kh&ocirc;ng chỉ ph&ugrave; hợp cho m&ocirc;n cầu l&ocirc;ng m&agrave; c&ograve;n c&oacute; thể sử dụng khi chơi tennis, tập gym, chạy bộ hoặc c&aacute;c hoạt động thể thao kh&aacute;c. Đ&acirc;y l&agrave; phụ kiện nhỏ gọn nhưng mang lại hiệu quả lớn, gi&uacute;p người chơi cảm thấy thoải m&aacute;i, tự tin v&agrave; n&acirc;ng cao trải nghiệm vận động mỗi ng&agrave;y.</p>\r\n', 1, 24, 1765341014, 1766560272),
(121, 'MNW#996634', 'Gaiter Đa Năng', 'Gaiter Đa Năng là phụ kiện tiện lợi dành cho những người yêu thích vận động và các hoạt động ngoài trời, giúp bảo vệ vùng cổ, mặt và đầu một cách linh hoạt. Sản phẩm được làm từ chất liệu vải nhẹ, mềm mại, co giãn tốt và thoáng khí, mang lại cảm giác thoải mái khi sử dụng trong thời gian dài. Với thiết kế đa năng, gaiter có thể biến đổi thành nhiều kiểu đeo khác nhau, phù hợp cho chạy bộ, đạp xe, du lịch, dã ngoại hoặc sinh hoạt hằng ngày.', 129000, 'san-pham/phu-kien/gaiter-da-nang', 0, 'no', 'active', 10, '<p>Gaiter Đa Năng được thiết kế để đ&aacute;p ứng nhu cầu bảo vệ v&agrave; tiện dụng trong nhiều ho&agrave;n cảnh kh&aacute;c nhau, đặc biệt l&agrave; khi tham gia c&aacute;c hoạt động ngo&agrave;i trời. Nhờ khả năng biến đổi linh hoạt, sản phẩm c&oacute; thể sử dụng như khăn qu&agrave;ng cổ, khẩu trang che mặt, băng đ&ocirc;, mũ tr&ugrave;m đầu hoặc khăn tr&ugrave;m cổ, mang lại sự tiện lợi tối đa cho người d&ugrave;ng.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải cao cấp, mỏng nhẹ v&agrave; mềm mại, gi&uacute;p tạo cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c với da. Độ co gi&atilde;n tốt gi&uacute;p gaiter &ocirc;m vừa khu&ocirc;n mặt v&agrave; cổ m&agrave; kh&ocirc;ng g&acirc;y cảm gi&aacute;c b&iacute; b&aacute;ch hay kh&oacute; chịu khi sử dụng l&acirc;u. Khả năng tho&aacute;ng kh&iacute; v&agrave; thấm h&uacute;t mồ h&ocirc;i hiệu quả gi&uacute;p người d&ugrave;ng lu&ocirc;n cảm thấy kh&ocirc; tho&aacute;ng trong qu&aacute; tr&igrave;nh vận động.</p>\r\n\r\n<p>Thiết kế gaiter đơn giản, gọn nhẹ, dễ gấp gọn v&agrave; mang theo khi di chuyển. Đường may chắc chắn, giữ form tốt sau nhiều lần sử dụng v&agrave; giặt giũ. M&agrave;u sắc v&agrave; họa tiết đa dạng, ph&ugrave; hợp với nhiều phong c&aacute;ch kh&aacute;c nhau từ thể thao, năng động đến casual hằng ng&agrave;y.</p>\r\n\r\n<p>Gaiter Đa Năng ph&ugrave; hợp sử dụng trong nhiều hoạt động như chạy bộ, đạp xe, leo n&uacute;i, du lịch, d&atilde; ngoại hoặc sinh hoạt thường ng&agrave;y. Đ&acirc;y l&agrave; phụ kiện nhỏ gọn nhưng mang lại nhiều c&ocirc;ng dụng, gi&uacute;p bảo vệ cơ thể khỏi bụi bẩn, gi&oacute; nhẹ v&agrave; &aacute;nh nắng, đồng thời tăng th&ecirc;m sự tiện lợi v&agrave; phong c&aacute;ch cho người sử dụng.</p>\r\n', 1, 24, 1765341150, 1766560328),
(122, 'MNW#789545', 'Túi UT Đen', 'Túi UT Đen sở hữu thiết kế tối giản, hiện đại với gam màu đen nam tính, dễ phối cùng nhiều phong cách trang phục khác nhau. Sản phẩm có form dáng gọn gàng, tiện lợi, đáp ứng tốt nhu cầu mang theo các vật dụng cá nhân hằng ngày. Chất liệu bền bỉ, đường may chắc chắn giúp túi sử dụng ổn định trong thời gian dài, phù hợp cho đi học, đi làm, dạo phố hay di chuyển thường ngày.', 499000, 'san-pham/phu-kien/tui-ut', 0, 'yes', 'active', 10, '<p>T&uacute;i UT Đen l&agrave; phụ kiện tiện dụng d&agrave;nh cho những ai y&ecirc;u th&iacute;ch sự gọn g&agrave;ng, đơn giản nhưng vẫn đảm bảo t&iacute;nh thẩm mỹ v&agrave; c&ocirc;ng năng sử dụng. Thiết kế t&uacute;i hướng đến phong c&aacute;ch hiện đại, dễ d&ugrave;ng, ph&ugrave; hợp với nhiều độ tuổi v&agrave; ho&agrave;n cảnh kh&aacute;c nhau.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu vải cao cấp, c&oacute; độ bền tốt, hạn chế sờn r&aacute;ch v&agrave; dễ vệ sinh. Bề mặt vải chắc chắn nhưng vẫn nhẹ, gi&uacute;p người d&ugrave;ng thoải m&aacute;i khi mang theo trong thời gian d&agrave;i. Gam m&agrave;u đen trơn mang lại vẻ ngo&agrave;i sạch sẽ, nam t&iacute;nh v&agrave; kh&ocirc;ng lỗi mốt, dễ d&agrave;ng kết hợp với nhiều kiểu trang phục từ casual đến năng động.</p>\r\n\r\n<p>T&uacute;i UT Đen được thiết kế với kh&ocirc;ng gian chứa đồ hợp l&yacute;, đủ để đựng c&aacute;c vật dụng c&aacute; nh&acirc;n như điện thoại, v&iacute;, ch&igrave;a kh&oacute;a, tai nghe hoặc c&aacute;c phụ kiện nhỏ cần thiết khi ra ngo&agrave;i. D&acirc;y đeo chắc chắn, dễ điều chỉnh độ d&agrave;i, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; linh hoạt trong qu&aacute; tr&igrave;nh sử dụng. Kh&oacute;a k&eacute;o trơn tru, an to&agrave;n, gi&uacute;p bảo quản đồ d&ugrave;ng b&ecirc;n trong tốt hơn.</p>\r\n\r\n<p>Với thiết kế gọn nhẹ v&agrave; t&iacute;nh ứng dụng cao, T&uacute;i UT Đen ph&ugrave; hợp sử dụng trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, dạo phố, du lịch ngắn ng&agrave;y hoặc sinh hoạt hằng ng&agrave;y. Đ&acirc;y l&agrave; phụ kiện thực tế, dễ sử dụng, gi&uacute;p người mang lu&ocirc;n chủ động v&agrave; gọn g&agrave;ng trong mọi hoạt động.</p>\r\n', 1, 24, 1765341267, 1766582197),
(123, 'MNW#668495', 'Túi UT Xám', 'Túi UT Trắng sở hữu thiết kế tối giản, hiện đại với gam màu đen nam tính, dễ phối cùng nhiều phong cách trang phục khác nhau. Sản phẩm có form dáng gọn gàng, tiện lợi, đáp ứng tốt nhu cầu mang theo các vật dụng cá nhân hằng ngày. Chất liệu bền bỉ, đường may chắc chắn giúp túi sử dụng ổn định trong thời gian dài, phù hợp cho đi học, đi làm, dạo phố hay di chuyển thường ngày.', 499000, 'san-pham/phu-kien/tui-ut-xam', 0, 'no', 'active', 10, '<p>T&uacute;i UT Đen l&agrave; phụ kiện tiện dụng d&agrave;nh cho những ai y&ecirc;u th&iacute;ch sự gọn g&agrave;ng, đơn giản nhưng vẫn đảm bảo t&iacute;nh thẩm mỹ v&agrave; c&ocirc;ng năng sử dụng. Thiết kế t&uacute;i hướng đến phong c&aacute;ch hiện đại, dễ d&ugrave;ng, ph&ugrave; hợp với nhiều độ tuổi v&agrave; ho&agrave;n cảnh kh&aacute;c nhau.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu vải cao cấp, c&oacute; độ bền tốt, hạn chế sờn r&aacute;ch v&agrave; dễ vệ sinh. Bề mặt vải chắc chắn nhưng vẫn nhẹ, gi&uacute;p người d&ugrave;ng thoải m&aacute;i khi mang theo trong thời gian d&agrave;i. Gam m&agrave;u đen trơn mang lại vẻ ngo&agrave;i sạch sẽ, nam t&iacute;nh v&agrave; kh&ocirc;ng lỗi mốt, dễ d&agrave;ng kết hợp với nhiều kiểu trang phục từ casual đến năng động.</p>\r\n\r\n<p>T&uacute;i UT Trắng được thiết kế với kh&ocirc;ng gian chứa đồ hợp l&yacute;, đủ để đựng c&aacute;c vật dụng c&aacute; nh&acirc;n như điện thoại, v&iacute;, ch&igrave;a kh&oacute;a, tai nghe hoặc c&aacute;c phụ kiện nhỏ cần thiết khi ra ngo&agrave;i. D&acirc;y đeo chắc chắn, dễ điều chỉnh độ d&agrave;i, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; linh hoạt trong qu&aacute; tr&igrave;nh sử dụng. Kh&oacute;a k&eacute;o trơn tru, an to&agrave;n, gi&uacute;p bảo quản đồ d&ugrave;ng b&ecirc;n trong tốt hơn.</p>\r\n\r\n<p>Với thiết kế gọn nhẹ v&agrave; t&iacute;nh ứng dụng cao, T&uacute;i UT Trắng ph&ugrave; hợp sử dụng trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, dạo phố, du lịch ngắn ng&agrave;y hoặc sinh hoạt hằng ng&agrave;y. Đ&acirc;y l&agrave; phụ kiện thực tế, dễ sử dụng, gi&uacute;p người mang lu&ocirc;n chủ động v&agrave; gọn g&agrave;ng trong mọi hoạt động.</p>\r\n', 1, 24, 1765341349, 1766560418),
(124, 'MNW#889425', 'Găng Tay Chống Nắng', 'Găng Tay Chống Nắng được thiết kế nhằm bảo vệ đôi tay khỏi tác động của ánh nắng mặt trời trong quá trình di chuyển và sinh hoạt hằng ngày. Sản phẩm sử dụng chất liệu vải nhẹ, thoáng khí, co giãn tốt, mang lại cảm giác thoải mái khi đeo trong thời gian dài. Thiết kế ôm vừa tay, tiện lợi, phù hợp sử dụng khi đi xe máy, chạy bộ, tập luyện thể thao hoặc các hoạt động ngoài trời khác.', 99000, 'san-pham/phu-kien/gang-tay-chong-nang', 0, 'yes', 'active', 10, '<p>Găng Tay Chống Nắng l&agrave; phụ kiện cần thiết gi&uacute;p bảo vệ v&ugrave;ng da tay khỏi &aacute;nh nắng v&agrave; m&ocirc;i trường b&ecirc;n ngo&agrave;i, đặc biệt ph&ugrave; hợp trong điều kiện thời tiết nắng n&oacute;ng. Thiết kế găng tay hướng đến sự tiện dụng v&agrave; thoải m&aacute;i, gi&uacute;p người d&ugrave;ng y&ecirc;n t&acirc;m khi di chuyển hoặc tham gia c&aacute;c hoạt động ngo&agrave;i trời.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu vải cao cấp, mềm mại v&agrave; nhẹ, mang lại cảm gi&aacute;c dễ chịu khi tiếp x&uacute;c với da. Khả năng tho&aacute;ng kh&iacute; v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p hạn chế cảm gi&aacute;c b&iacute; b&aacute;ch khi đeo l&acirc;u. Độ co gi&atilde;n linh hoạt gi&uacute;p găng tay &ocirc;m vừa b&agrave;n tay, kh&ocirc;ng g&acirc;y b&oacute; chặt, đảm bảo sự linh hoạt trong cử động.</p>\r\n\r\n<p>Thiết kế găng tay gọn g&agrave;ng, dễ đeo v&agrave; th&aacute;o, đường may chắc chắn gi&uacute;p sản phẩm bền bỉ trong qu&aacute; tr&igrave;nh sử dụng. Kiểu d&aacute;ng đơn giản, m&agrave;u sắc dễ phối hợp với nhiều phong c&aacute;ch trang phục kh&aacute;c nhau, từ năng động, thể thao đến sinh hoạt hằng ng&agrave;y.</p>\r\n\r\n<p>Găng Tay Chống Nắng ph&ugrave; hợp sử dụng khi đi xe m&aacute;y, chạy bộ, đạp xe, tập luyện thể thao hoặc l&agrave;m việc ngo&agrave;i trời. Với thiết kế tiện lợi, nhẹ nh&agrave;ng v&agrave; t&iacute;nh ứng dụng cao, sản phẩm gi&uacute;p bảo vệ đ&ocirc;i tay, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; tự tin cho người sử dụng trong mọi hoạt động.</p>\r\n', 1, 24, 1765341518, 1766582212),
(125, 'MNW#745266', 'Cốc Giữ Nhiệt', 'Cốc Giữ Nhiệt là sản phẩm tiện ích dành cho cuộc sống hiện đại, giúp giữ nóng hoặc giữ lạnh đồ uống trong thời gian dài, đáp ứng nhu cầu sử dụng hằng ngày tại nhà, văn phòng hoặc khi di chuyển. Với thiết kế gọn gàng, chắc chắn cùng chất liệu an toàn, cốc mang lại sự tiện lợi, dễ sử dụng và giúp người dùng luôn thưởng thức đồ uống ở nhiệt độ lý tưởng mọi lúc, mọi nơi.', 99000, 'san-pham/phu-kien/coc-giu-nhiet', 0, 'no', 'out_of_stock', 10, '<p>Cốc Giữ Nhiệt được thiết kế nhằm mang lại trải nghiệm sử dụng tiện lợi v&agrave; thoải m&aacute;i cho người d&ugrave;ng trong sinh hoạt hằng ng&agrave;y. Sản phẩm ph&ugrave; hợp để đựng c&aacute;c loại đồ uống n&oacute;ng như c&agrave; ph&ecirc;, tr&agrave;, hoặc đồ uống lạnh như nước lọc, nước tr&aacute;i c&acirc;y, gi&uacute;p duy tr&igrave; nhiệt độ ổn định trong thời gian d&agrave;i.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu cao cấp, bền bỉ v&agrave; an to&agrave;n cho sức khỏe, gi&uacute;p hạn chế &aacute;m m&ugrave;i v&agrave; dễ vệ sinh sau khi sử dụng. Cấu tạo chắc chắn gi&uacute;p cốc giữ nhiệt hiệu quả, đồng thời mang lại cảm gi&aacute;c cầm nắm thoải m&aacute;i, kh&ocirc;ng g&acirc;y n&oacute;ng tay khi đựng đồ uống n&oacute;ng hay đọng nước b&ecirc;n ngo&agrave;i khi đựng đồ uống lạnh.</p>\r\n\r\n<p>Thiết kế cốc hiện đại, tối giản, dễ mang theo khi đi l&agrave;m, đi học, du lịch hoặc d&atilde; ngoại. Nắp cốc được thiết kế k&iacute;n, gi&uacute;p hạn chế r&ograve; rỉ nước khi di chuyển. K&iacute;ch thước gọn g&agrave;ng ph&ugrave; hợp đặt trong balo, t&uacute;i x&aacute;ch hoặc ngăn đựng cốc tr&ecirc;n xe.</p>\r\n\r\n<p>Cốc Giữ Nhiệt l&agrave; lựa chọn l&yacute; tưởng cho những ai y&ecirc;u th&iacute;ch sự tiện lợi v&agrave; muốn duy tr&igrave; th&oacute;i quen uống nước, c&agrave; ph&ecirc; hay tr&agrave; một c&aacute;ch khoa học. Với t&iacute;nh ứng dụng cao, độ bền tốt v&agrave; thiết kế đẹp mắt, sản phẩm kh&ocirc;ng chỉ phục vụ nhu cầu sử dụng hằng ng&agrave;y m&agrave; c&ograve;n l&agrave; m&oacute;n phụ kiện hữu &iacute;ch trong cuộc sống năng động hiện đại.</p>\r\n', 1, 24, 1765341774, 1772373985),
(126, 'MNW#895641', 'Túi Tote Denim', 'Túi Tote Denim mang phong cách trẻ trung, năng động với chất liệu denim cá tính, dễ phối cùng nhiều trang phục khác nhau. Thiết kế túi rộng rãi, chắc chắn, đáp ứng tốt nhu cầu mang theo các vật dụng cá nhân hằng ngày. Với kiểu dáng đơn giản nhưng thời trang, Túi Tote Denim phù hợp sử dụng khi đi học, đi làm, dạo phố, cà phê hay mua sắm, mang lại sự tiện lợi và phong cách cho người sử dụng.', 299000, 'san-pham/phu-kien/tui-tote-denim', 0, 'yes', 'out_of_stock', 10, '<p>T&uacute;i Tote Denim l&agrave; phụ kiện thời trang mang đậm tinh thần năng động, hiện đại, ph&ugrave; hợp với lối sống trẻ trung v&agrave; linh hoạt. Sản phẩm được thiết kế theo kiểu d&aacute;ng tote đơn giản, dễ sử dụng nhưng vẫn tạo điểm nhấn nhờ chất liệu denim khỏe khoắn v&agrave; bền bỉ.</p>\r\n\r\n<p>Chất liệu denim cao cấp gi&uacute;p t&uacute;i c&oacute; độ d&agrave;y vừa phải, chịu lực tốt v&agrave; giữ form ổn định trong qu&aacute; tr&igrave;nh sử dụng. Bề mặt vải chắc chắn, &iacute;t sờn r&aacute;ch, đồng thời dễ vệ sinh, ph&ugrave; hợp cho việc sử dụng hằng ng&agrave;y. Gam m&agrave;u denim đặc trưng mang lại vẻ ngo&agrave;i c&aacute; t&iacute;nh, kh&ocirc;ng lỗi mốt v&agrave; dễ kết hợp với nhiều phong c&aacute;ch trang phục kh&aacute;c nhau.</p>\r\n\r\n<p>T&uacute;i Tote Denim c&oacute; kh&ocirc;ng gian chứa đồ rộng r&atilde;i, cho ph&eacute;p đựng s&aacute;ch vở, t&agrave;i liệu, v&iacute;, điện thoại, b&igrave;nh nước hoặc c&aacute;c vật dụng c&aacute; nh&acirc;n cần thiết. Quai t&uacute;i được may chắc chắn, dễ cầm tay hoặc đeo vai, mang lại cảm gi&aacute;c thoải m&aacute;i khi di chuyển. Thiết kế mở gi&uacute;p thao t&aacute;c lấy v&agrave; cất đồ nhanh ch&oacute;ng, tiện lợi.</p>\r\n\r\n<p>Sản phẩm ph&ugrave; hợp sử dụng trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc;, mua sắm hoặc du lịch ngắn ng&agrave;y. Với thiết kế bền đẹp, t&iacute;nh ứng dụng cao v&agrave; phong c&aacute;ch trẻ trung, T&uacute;i Tote Denim l&agrave; lựa chọn l&yacute; tưởng cho những ai đang t&igrave;m kiếm một chiếc t&uacute;i vừa tiện lợi vừa thời trang trong cuộc sống hằng ng&agrave;y</p>\r\n', 1, 24, 1765341838, 1772373984),
(127, 'MNW#848945', 'Túi Canvas', 'Túi Canvas mang phong cách đơn giản, trẻ trung và thân thiện, là lựa chọn lý tưởng cho nhu cầu sử dụng hằng ngày. Sản phẩm được làm từ chất liệu canvas dày dặn, bền chắc, có khả năng chịu lực tốt, giúp đựng đồ gọn gàng và tiện lợi. Với thiết kế linh hoạt, dễ phối đồ, Túi Canvas phù hợp sử dụng khi đi học, đi làm, dạo phố, mua sắm hoặc sinh hoạt thường ngày.', 299000, 'san-pham/phu-kien/tui-canvas', 20, 'yes', 'out_of_stock', 10, '<p>T&uacute;i Canvas l&agrave; phụ kiện được nhiều người y&ecirc;u th&iacute;ch nhờ sự tiện dụng, bền bỉ v&agrave; phong c&aacute;ch tối giản, dễ ứng dụng trong cuộc sống hằng ng&agrave;y. Thiết kế t&uacute;i hướng đến sự gọn g&agrave;ng, thoải m&aacute;i khi sử dụng nhưng vẫn đảm bảo t&iacute;nh thẩm mỹ v&agrave; thời trang.</p>\r\n\r\n<p>Sản phẩm được l&agrave;m từ chất liệu vải canvas cao cấp, c&oacute; độ d&agrave;y vừa phải, bề mặt vải chắc chắn v&agrave; bền bỉ, gi&uacute;p t&uacute;i giữ form tốt trong qu&aacute; tr&igrave;nh sử dụng. Chất liệu canvas th&acirc;n thiện, dễ vệ sinh v&agrave; c&oacute; khả năng chịu lực tốt, ph&ugrave; hợp để mang theo nhiều vật dụng c&aacute; nh&acirc;n m&agrave; kh&ocirc;ng lo biến dạng.</p>\r\n\r\n<p>T&uacute;i Canvas c&oacute; kh&ocirc;ng gian chứa đồ rộng r&atilde;i, dễ d&agrave;ng đựng s&aacute;ch vở, t&agrave;i liệu, v&iacute;, điện thoại, b&igrave;nh nước hoặc c&aacute;c vật dụng cần thiết khi ra ngo&agrave;i. Quai t&uacute;i chắc chắn, dễ cầm hoặc đeo vai, mang lại cảm gi&aacute;c thoải m&aacute;i khi sử dụng trong thời gian d&agrave;i. Thiết kế đơn giản gi&uacute;p t&uacute;i dễ phối với nhiều phong c&aacute;ch trang phục kh&aacute;c nhau, từ năng động, casual đến tối giản.</p>\r\n\r\n<p>T&uacute;i Canvas ph&ugrave; hợp sử dụng trong nhiều ho&agrave;n cảnh như đi học, đi l&agrave;m, dạo phố, c&agrave; ph&ecirc;, mua sắm hoặc du lịch ngắn ng&agrave;y. Với độ bền cao, t&iacute;nh ứng dụng tốt v&agrave; phong c&aacute;ch trẻ trung, sản phẩm l&agrave; phụ kiện tiện lợi, đ&aacute;p ứng nhu cầu sử dụng hằng ng&agrave;y của người d&ugrave;ng hiện đại.</p>\r\n', 1, 24, 1765342000, 1772373984),
(128, 'MNW#48985', 'Áo Polo Thể Thao', 'Áo Polo Thể Thao mang phong cách hiện đại, năng động, là lựa chọn lý tưởng cho những ai yêu thích sự thoải mái nhưng vẫn muốn giữ vẻ ngoài gọn gàng, lịch sự. Sản phẩm được thiết kế với form dáng vừa vặn, dễ mặc, dễ vận động, kết hợp cùng chất liệu vải thể thao cao cấp có khả năng thấm hút mồ hôi tốt, thoáng khí và co giãn linh hoạt. Nhờ đó, áo luôn mang lại cảm giác dễ chịu trong suốt quá trình sử dụng, kể cả khi vận động nhiều hay di chuyển ngoài trời. Với thiết kế cổ polo khỏe khoắn, áo không chỉ phù hợp cho các hoạt động thể thao mà còn có thể mặc đi chơi, dạo phố hay sinh hoạt hằng ngày, giúp người mặc luôn tự tin và năng động.', 299000, 'san-pham/ao/ao-polo-the-thao', 10, 'no', 'out_of_stock', 10, '<p>&Aacute;o Polo Thể Thao được thiết kế d&agrave;nh cho nam giới y&ecirc;u th&iacute;ch lối sống năng động nhưng vẫn đề cao sự chỉn chu trong phong c&aacute;ch ăn mặc. Form &aacute;o được nghi&ecirc;n cứu kỹ lưỡng, &ocirc;m vừa cơ thể, kh&ocirc;ng qu&aacute; b&oacute; cũng kh&ocirc;ng qu&aacute; rộng, gi&uacute;p t&ocirc;n d&aacute;ng tự nhi&ecirc;n v&agrave; tạo cảm gi&aacute;c thoải m&aacute;i khi vận động.</p>\r\n\r\n<p>Sản phẩm sử dụng chất liệu vải thể thao cao cấp với bề mặt mềm mịn, nhẹ v&agrave; tho&aacute;ng kh&iacute;. Khả năng thấm h&uacute;t mồ h&ocirc;i tốt gi&uacute;p cơ thể lu&ocirc;n kh&ocirc; r&aacute;o, hạn chế b&aacute;m m&ugrave;i, đặc biệt ph&ugrave; hợp khi chơi thể thao, vận động ngo&agrave;i trời hoặc di chuyển trong thời gian d&agrave;i. Chất vải c&oacute; độ co gi&atilde;n nhẹ, hỗ trợ c&aacute;c chuyển động linh hoạt m&agrave; kh&ocirc;ng g&acirc;y cảm gi&aacute;c g&ograve; b&oacute;.</p>\r\n\r\n<p>Thiết kế cổ polo khỏe khoắn, đứng form, mang lại vẻ ngo&agrave;i lịch sự hơn so với &aacute;o thun th&ocirc;ng thường. Phần tay &aacute;o gọn g&agrave;ng, bo nhẹ gi&uacute;p tổng thể &aacute;o tr&ocirc;ng năng động v&agrave; trẻ trung. C&aacute;c đường may được gia c&ocirc;ng chắc chắn, tỉ mỉ, đảm bảo độ bền đẹp ngay cả khi sử dụng v&agrave; giặt giũ thường xuy&ecirc;n.</p>\r\n\r\n<p>&Aacute;o Polo Thể Thao rất dễ phối đồ: c&oacute; thể kết hợp c&ugrave;ng quần thể thao cho c&aacute;c buổi tập, quần short cho những ng&agrave;y năng động hoặc quần jeans, kaki để tạo phong c&aacute;ch casual hiện đại. Đ&acirc;y l&agrave; lựa chọn l&yacute; tưởng cho những ai muốn sở hữu một chiếc &aacute;o đa năng, vừa ph&ugrave; hợp vận động vừa c&oacute; thể mặc hằng ng&agrave;y.</p>\r\n', 1, 12, 1765791642, 1772373983);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_categories`
--

CREATE TABLE `tbl_product_categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` enum('Hoạt động','Chờ duyệt','Tạm dừng') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_categories`
--

INSERT INTO `tbl_product_categories` (`category_id`, `category_name`, `category_desc`, `category_slug`, `category_status`, `created_at`, `updated_at`, `user_id`, `parent_id`) VALUES
(1, 'Áo', 'Áo nam', 'san-pham/ao', 'Hoạt động', 1763272873, 1766119301, 1, 0),
(2, 'Quần', 'Quần nam', 'san-pham/quan', 'Hoạt động', 1763272873, 1764933012, 1, 0),
(3, 'Phụ kiện', 'Phụ kiện nam', 'san-pham/phu-kien', 'Hoạt động', 1763311805, 1764933049, 1, 0),
(4, 'Áo Thun', 'Áo thun nam', 'san-pham/ao-thun', 'Hoạt động', 1763311847, 1765354754, 1, 1),
(5, 'Áo Sơ Mi', 'Áo sơ mi', 'san-pham/ao-so-mi', 'Hoạt động', 1763311853, 1764932990, 1, 1),
(6, 'Quần Jean', 'Quần Jean nam', 'san-pham/quan-jean', 'Hoạt động', 1763311889, 1764933022, 1, 2),
(7, 'Quần Short', 'Quần Short', 'san-pham/quan-short', 'Hoạt động', 1763311897, 1764933034, 1, 2),
(12, 'Áo Polo', 'Áo nam đẹp', 'san-pham/ao-polo', 'Hoạt động', 1763637077, 1764933080, 1, 1),
(23, 'Tất', 'Tất nam', 'san-pham/tat', 'Hoạt động', 1764936711, 1765355562, 1, 3),
(24, 'Khác', 'Các phụ kiện khác', 'san-pham/khac', 'Hoạt động', 1765105359, 1765355647, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_reviews`
--

CREATE TABLE `tbl_product_reviews` (
  `review_id` int NOT NULL,
  `product_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_review` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_rating` tinyint DEFAULT NULL,
  `review_status` enum('Công khai','Nháp','Chờ duyệt') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ duyệt',
  `created_at` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product_reviews`
--

INSERT INTO `tbl_product_reviews` (`review_id`, `product_id`, `user_id`, `fullname`, `product_review`, `product_rating`, `review_status`, `created_at`) VALUES
(49, 67, NULL, 'Nguyễn Văn Long', 'Chất lượng ổn áp, mặc rất thoải mái. Đúng như mô tả trên shop.', 5, 'Công khai', 1766645492),
(50, 67, NULL, 'Lê Hoàng Nam', 'Áo form đẹp, dễ phối đồ. Mình khá hài lòng với lần mua này.', 4, 'Công khai', 1766645663),
(51, 67, NULL, 'Phạm Quốc Bảo', 'Giao hàng nhanh, sản phẩm không bị lỗi. Sẽ ủng hộ thêm.', 5, 'Công khai', 1766645678),
(52, 67, NULL, 'Trần Thị Ngọc', 'Chất vải mềm, mặc mát. Shop tư vấn rất nhiệt tình.', 5, 'Công khai', 1766645691),
(53, 67, NULL, 'Vũ Minh Tuấn', 'Mặc lên nhìn gọn gàng, lịch sự. Phù hợp đi làm hằng ngày.', 4, 'Công khai', 1766645701),
(54, 67, NULL, 'Đỗ Thanh Tâm', 'Sản phẩm giống hình, đường may chắc chắn. Rất đáng tiền.', 3, 'Công khai', 1766645713),
(55, 67, NULL, 'Nguyễn Hữu Phước', 'Mua lần thứ hai vẫn rất hài lòng. Monowear làm khá tốt', 5, 'Công khai', 1766649364),
(56, 67, NULL, 'Hoàng Gia Huy', 'Áo đẹp, không bị nhăn nhiều sau khi giặt. Sẽ quay lại mua tiếp.', 5, 'Công khai', 1766649378),
(57, 85, NULL, 'Nguyễn Đức Anh', 'Sản phẩm đẹp, mặc rất vừa người. Chất lượng đúng như mong đợi.', 5, 'Công khai', 1766649410),
(58, 85, NULL, 'Trần Minh Khoa', 'Áo form chuẩn, chất vải ổn. Giao hàng khá nhanh.', 5, 'Công khai', 1766649427),
(59, 85, NULL, 'Lê Thanh Bình', 'Mặc lên nhìn gọn gàng, dễ phối đồ. Rất hài lòng với sản phẩm.', 4, 'Công khai', 1766649451),
(60, 85, NULL, 'Phạm Gia Bảo', 'Sản phẩm đúng mô tả, không có lỗi. Sẽ ủng hộ shop lâu dài.', 5, 'Công khai', 1766649460),
(61, 85, NULL, 'Võ Thị Thanh Trúc', 'Chất vải mềm, mặc thoải mái cả ngày. Shop phục vụ tốt', 5, 'Công khai', 1766649473),
(62, 86, NULL, 'Hoàng Minh Tuấn', 'Áo mặc rất thoải mái, form đẹp. Phù hợp mặc hằng ngày.', 5, 'Công khai', 1766649523),
(63, 86, NULL, 'Nguyễn Thị Bích Ngọc', 'Sản phẩm đẹp, màu sắc đúng hình. Rất hài lòng khi nhận hàng.', 5, 'Công khai', 1766649532),
(64, 86, NULL, 'Trần Quốc Việt', 'Chất lượng ổn, đường may chắc chắn. Giá hợp lý.', 4, 'Công khai', 1766649540),
(65, 86, NULL, 'Lê Phương Anh', 'Mặc lên nhìn lịch sự, gọn gàng. Shop tư vấn khá nhiệt tình.', 5, 'Công khai', 1766649548),
(66, 86, NULL, 'Đặng Văn Hưng', 'Áo không bị nhăn nhiều, dễ giặt. Sẽ mua thêm lần sau.', 5, 'Công khai', 1766649555),
(67, 86, NULL, 'Phạm Thùy Linh', 'Chất vải mát, mặc dễ chịu. Trải nghiệm mua hàng rất tốt', 5, 'Công khai', 1766649566),
(68, 107, NULL, 'Nguyễn Thành Đạt', 'Áo đẹp, form chuẩn. Mặc lên nhìn rất ổn.', 5, 'Công khai', 1766649624),
(69, 107, NULL, 'Trần Thị Lan Anh', 'Chất vải mềm, không gây khó chịu. Rất đáng mua.', 5, 'Công khai', 1766649633),
(70, 107, NULL, 'Lê Quang Huy', 'Sản phẩm đúng mô tả, giao hàng nhanh.', 3, 'Công khai', 1766649641),
(71, 107, NULL, 'Phạm Minh Trí', 'Đường may chắc chắn, mặc thoải mái cả ngày.', 5, 'Công khai', 1766649652),
(72, 107, NULL, 'Võ Ngọc Khánh', 'Áo dễ phối đồ, phù hợp nhiều hoàn cảnh', 5, 'Công khai', 1766649660),
(73, 108, NULL, 'Nguyễn Hoàng Phúc', 'Áo mặc rất thoải mái, form gọn gàng. Rất ưng ý.', 4, 'Công khai', 1766649738),
(74, 108, NULL, 'Trần Thị Mỹ Linh', 'Sản phẩm đẹp, chất vải ổn. Đúng như hình mô tả.', 5, 'Công khai', 1766649747),
(75, 108, NULL, 'Lê Quốc Khánh', 'Áo form chuẩn, dễ phối đồ. Phù hợp đi làm.', 4, 'Công khai', 1766649756),
(76, 108, NULL, 'Phạm Thanh Tùng', 'Chất lượng tốt, đường may chắc chắn. Giá hợp lý.', 4, 'Công khai', 1766649765),
(77, 108, NULL, 'Đặng Thùy Dương', 'Mặc mát, không bí. Rất thích kiểu dáng này', 5, 'Công khai', 1766649784),
(78, 108, NULL, 'Vũ Đức Thành', 'Giao hàng nhanh, đóng gói cẩn thận.', 5, 'Công khai', 1766649913),
(79, 108, NULL, 'Nguyễn Thị Thu Trang', 'Áo đẹp, mặc lên nhìn lịch sự. Sẽ ủng hộ thêm lần nữa.', 4, 'Công khai', 1766649921),
(80, 109, NULL, 'Nguyễn Văn Khánh', 'Áo mặc rất thoải mái, chất vải ổn. Đúng mong đợi.', 5, 'Công khai', 1766649942),
(81, 109, NULL, 'Trần Minh Đức', 'Form áo đẹp, đường may chắc chắn. Giá hợp lý.', 5, 'Công khai', 1766649950),
(82, 109, NULL, 'Lê Thị Thanh Nga', 'Màu sắc giống hình, mặc lên nhìn gọn gàng.', 5, 'Công khai', 1766649958),
(83, 109, NULL, 'Phạm Quốc Hùng', 'Sản phẩm tốt, giao hàng nhanh. Sẽ ủng hộ tiếp.', 5, 'Công khai', 1766649966),
(84, 109, NULL, 'Đặng Ngọc Bích', 'Chất vải mềm, mặc dễ chịu cả ngày.', 5, 'Công khai', 1766649977),
(85, 109, NULL, 'Võ Hoàng Long', 'Áo dễ phối đồ, phù hợp nhiều hoàn cảnh ', 5, 'Công khai', 1766649987),
(86, 110, NULL, 'Nguyễn Minh Trí', 'Áo mặc thoải mái, form chuẩn. Rất hài lòng.', 4, 'Công khai', 1766650019),
(87, 110, NULL, 'Trần Thảo My', 'Chất vải mát, màu sắc đẹp. Đúng như hình.', 5, 'Công khai', 1766650028),
(88, 110, NULL, 'Lê Anh Tuấn', 'Sản phẩm ổn, đường may chắc chắn. Giá hợp lý.', 5, 'Công khai', 1766650036),
(89, 110, NULL, 'Phạm Ngọc Hân', 'Mặc lên nhìn gọn gàng, lịch sự. Phù hợp đi làm.', 5, 'Công khai', 1766650044),
(90, 110, NULL, 'Đặng Quốc Bảo', 'Áo đẹp, không bị nhăn nhiều sau khi giặt.', 5, 'Công khai', 1766650056),
(91, 110, NULL, 'Vũ Thị Kim Oanh', 'Shop giao hàng nhanh, đóng gói cẩn thận.', 5, 'Công khai', 1766650064),
(92, 110, NULL, 'Hoàng Thanh Phong', 'Dễ phối đồ, mặc đi làm hay đi chơi đều ổn', 5, 'Công khai', 1766650076),
(93, 111, NULL, 'Nguyễn Quang Huy', 'Áo mặc rất dễ chịu, form chuẩn. Mình khá ưng.', 5, 'Công khai', 1766650207),
(94, 111, NULL, 'Trần Thị Thu Hằng', 'Chất vải mềm, màu sắc đẹp. Đúng như mô tả.', 4, 'Công khai', 1766650299),
(95, 111, NULL, 'Lê Minh Nhật', 'Sản phẩm ổn, đường may chắc chắn. Giá hợp lý.', 5, 'Công khai', 1766650308),
(96, 111, NULL, 'Phạm Thanh Hà', 'Mặc lên nhìn gọn gàng, lịch sự. Phù hợp đi làm.', 5, 'Công khai', 1766650315),
(97, 111, NULL, 'Đặng Văn Toàn', 'Giao hàng nhanh, đóng gói cẩn thận.', 5, 'Công khai', 1766650322),
(98, 111, NULL, 'Võ Thị Ngọc Lan', 'Áo dễ phối đồ, mặc rất thoải mái', 5, 'Công khai', 1766650332),
(99, 128, NULL, 'Nguyễn Đức Long', 'Áo mặc thoải mái, form đẹp. Rất đáng mua.', 5, 'Công khai', 1766650421),
(100, 128, NULL, 'Trần Mỹ Duyên', 'Chất vải mềm, màu sắc đúng hình. Mình rất thích', 5, 'Công khai', 1766650431),
(101, 128, NULL, 'Lê Quốc Tuấn', 'Sản phẩm ổn, đường may chắc chắn. Giá hợp lý.', 4, 'Công khai', 1766650441),
(102, 128, NULL, 'Phạm Thanh Nhàn', 'Mặc lên nhìn gọn gàng, lịch sự. Phù hợp đi làm.', 5, 'Công khai', 1766650448),
(103, 128, NULL, 'Đặng Minh Quân', 'Áo không bị nhăn nhiều, dễ giặt.', 5, 'Công khai', 1766650457),
(104, 128, NULL, 'Vũ Thị Thanh Vân', 'Giao hàng nhanh, đóng gói cẩn thận', 5, 'Công khai', 1766650524),
(105, 128, NULL, 'Hoàng Anh Dũng', 'Dễ phối đồ, mặc đi chơi hay đi làm đều ổn', 5, 'Công khai', 1766650537),
(106, 68, NULL, 'Nguyễn Văn Thành', 'Quần form chuẩn, mặc rất thoải mái. Chất vải đứng form.', 5, 'Công khai', 1766650566),
(107, 68, NULL, 'Trần Minh Hoàng', 'Quần đẹp, đường may chắc chắn. Mặc đi làm rất hợp.', 5, 'Công khai', 1766650577),
(108, 68, NULL, 'Lê Thị Ngọc Anh', 'Chất vải mềm, không bị khó chịu khi ngồi lâu.', 4, 'Công khai', 1766650585),
(109, 68, NULL, 'Phạm Quốc Tuấn', 'Quần đúng size, màu sắc giống hình. Rất hài lòng.', 5, 'Công khai', 1766650592),
(110, 68, NULL, 'Đặng Thanh Bình', 'Mặc lên gọn gàng, dễ phối áo. Giá hợp lý.', 5, 'Công khai', 1766650600),
(111, 68, NULL, 'Vũ Hoàng Nam', 'Quần không bị nhăn nhiều, giặt xong mặc lại vẫn ổn', 5, 'Công khai', 1766650609),
(112, 68, NULL, 'Nguyễn Thị Thu Hương', 'Mua cho chồng mặc rất vừa, nhìn lịch sự và trẻ trung', 4, 'Công khai', 1766650618),
(113, 69, NULL, 'Nguyễn Hoàng Sơn', 'Quần mặc rất thoải mái, form gọn gàng. Phù hợp đi làm.', 5, 'Công khai', 1766650649),
(114, 69, NULL, 'Trần Thị Mai Anh', 'Chất vải đẹp, không bị cứng. Màu sắc đúng hình.', 5, 'Công khai', 1766650657),
(115, 69, NULL, 'Lê Quốc Huy', 'Quần đúng size, đường may chắc chắn. Rất đáng tiền.', 5, 'Công khai', 1766650665),
(116, 69, NULL, 'Phạm Thanh Phong', 'Mặc lên nhìn lịch sự, dễ phối áo. Sẽ mua thêm.', 5, 'Công khai', 1766650674),
(117, 69, NULL, 'Đặng Minh Thư', 'Quần ít nhăn, giặt xong vẫn giữ form tốt', 5, 'Công khai', 1766650683),
(118, 112, NULL, 'Nguyễn Văn Phú', 'Quần mặc rất thoải mái, form chuẩn. Chất vải ổn.', 5, 'Công khai', 1766650723),
(119, 112, NULL, 'Trần Minh Tài', 'Đường may chắc chắn, mặc đứng form. Phù hợp đi làm.', 4, 'Công khai', 1766650733),
(120, 112, NULL, 'Lê Thị Bảo Trân', 'Chất vải mềm, không bị khó chịu khi mặc lâu.', 5, 'Công khai', 1766650751),
(121, 112, NULL, 'Phạm Quốc Cường', 'Quần đúng size, màu sắc giống hình. Rất hài lòng.', 5, 'Công khai', 1766650774),
(122, 112, NULL, 'Đặng Thanh Hải', 'Mặc lên gọn gàng, dễ phối đồ. Giá hợp lý.', 5, 'Công khai', 1766650787),
(123, 112, NULL, 'Vũ Thị Kim Chi', 'Quần ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766650797),
(124, 113, NULL, 'Nguyễn Trọng Nghĩa', 'Quần form đẹp, mặc rất thoải mái. Đi làm hay đi chơi đều ổn.', 5, 'Công khai', 1766650852),
(125, 113, NULL, 'Trần Quốc Bảo', 'Chất vải tốt, đường may chắc chắn. Đúng như mô tả.', 5, 'Công khai', 1766650862),
(126, 113, NULL, 'Lê Thị Hạnh', 'Mặc lên gọn gàng, không bị cấn hay khó chịu.', 4, 'Công khai', 1766650870),
(127, 113, NULL, 'Phạm Minh Khôi', 'Quần đúng size, màu sắc đẹp. Rất hài lòng với sản phẩm.', 5, 'Công khai', 1766650879),
(128, 113, NULL, 'Đặng Hoàng Nam', 'Ít nhăn, giữ form tốt sau khi giặt. Đáng tiề', 5, 'Công khai', 1766650887),
(129, 113, NULL, 'Vũ Ngọc Anh', 'Quần dễ phối áo, mặc nhìn lịch sự.', 5, 'Công khai', 1766650926),
(130, 113, NULL, 'Nguyễn Thành Công', 'Chất vải ổn, mặc cả ngày vẫn thấy thoải mái.', 5, 'Công khai', 1766650934),
(131, 113, NULL, 'Hoàng Thị Thuỳ Dung', 'Mua làm quà cũng rất hợp, người nhận rất thích', 5, 'Công khai', 1766650944),
(132, 114, NULL, 'Nguyễn Đức Phát', 'Quần form chuẩn, mặc rất thoải mái. Chất vải ổn.', 5, 'Công khai', 1766650967),
(133, 114, NULL, 'Trần Minh Quân', 'Đường may chắc chắn, mặc đứng form. Phù hợp đi làm.', 3, 'Công khai', 1766650975),
(134, 114, NULL, 'Lê Thị Kim Ngân', 'Chất vải mềm, không bị khó chịu khi ngồi lâu.', 5, 'Công khai', 1766650983),
(135, 114, NULL, 'Phạm Quốc Thắng', 'Quần đúng size, màu sắc giống hình. Rất hài lòng.', 5, 'Công khai', 1766650990),
(136, 114, NULL, 'Đặng Văn Lộc', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766650999),
(137, 114, NULL, 'Vũ Thị Thu Hiền', 'Dễ phối áo, mặc lên nhìn lịch sự và gọn gàng.', 4, 'Công khai', 1766651007),
(138, 115, NULL, 'Nguyễn Minh Tân', 'Quần mặc rất thoải mái, form gọn gàng. Rất ưng ý.', 5, 'Công khai', 1766651027),
(139, 115, NULL, 'Trần Thị Bảo Ngọc', 'Chất vải mềm, màu sắc đẹp. Đúng như mô tả.', 5, 'Công khai', 1766651036),
(140, 115, NULL, 'Lê Quốc Việt', 'Quần đúng size, đường may chắc chắn. Đáng tiền.', 5, 'Công khai', 1766651045),
(141, 115, NULL, 'Phạm Thanh Dũng', 'Mặc lên nhìn lịch sự, dễ phối áo. Phù hợp đi làm.', 4, 'Công khai', 1766651055),
(142, 115, NULL, 'Đặng Hoàng Phúc', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766651066),
(143, 115, NULL, 'Vũ Minh Anh', 'Chất vải ổn, mặc cả ngày vẫn thoải mái.', 5, 'Công khai', 1766651076),
(144, 115, NULL, 'Nguyễn Thị Thanh Tuyền', 'Mua cho người nhà mặc rất vừa, ai cũng khen', 5, 'Công khai', 1766651084),
(145, 116, NULL, 'Nguyễn Văn Hòa', 'Quần form chuẩn, mặc rất dễ chịu. Chất vải ổn.', 5, 'Công khai', 1766651122),
(146, 116, NULL, 'Trần Minh Lộc', 'Đường may chắc chắn, mặc đứng form. Phù hợp đi làm.', 5, 'Công khai', 1766651130),
(147, 116, NULL, 'Lê Thị Phương Thảo', 'Chất vải mềm, không bị khó chịu khi mặc lâu.', 5, 'Công khai', 1766651137),
(148, 116, NULL, 'Phạm Quốc Khánh', 'Quần đúng size, màu sắc giống hình. Rất hài lòng.', 5, 'Công khai', 1766651145),
(149, 116, NULL, 'Đặng Thùy Linh', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766651154),
(150, 117, NULL, 'Nguyễn Thành Luân', 'Quần form đẹp, mặc rất thoải mái. Đi làm hay đi chơi đều ổn.', 5, 'Công khai', 1766651191),
(151, 117, NULL, 'Trần Thị Thu Phương', 'Chất vải mềm, mặc không bị khó chịu.', 5, 'Công khai', 1766651204),
(152, 117, NULL, 'Lê Minh Đức', 'Quần đúng size, đường may chắc chắn. Đáng tiền.', 5, 'Công khai', 1766651214),
(153, 117, NULL, 'Phạm Quốc Hào', 'Mặc lên gọn gàng, dễ phối áo. Rất ưng.', 5, 'Công khai', 1766651230),
(154, 117, NULL, 'Đặng Văn Khang', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766651245),
(155, 117, NULL, 'Vũ Thị Ngọc Ánh', 'Màu sắc đẹp, giống hình. Rất hài lòng.', 5, 'Công khai', 1766651253),
(156, 118, NULL, 'Nguyễn Hữu Tín', 'Quần form chuẩn, mặc thoải mái. Chất vải ổn áp.', 5, 'Công khai', 1766651280),
(157, 118, NULL, 'Trần Minh Nhật', 'Đường may chắc chắn, mặc đứng form. Phù hợp đi làm.', 5, 'Công khai', 1766651291),
(158, 118, NULL, 'Lê Thị Thanh Vân', 'Chất vải mềm, không bị khó chịu khi mặc lâu.', 5, 'Công khai', 1766651299),
(159, 118, NULL, 'Phạm Quốc Đạt', 'Quần đúng size, màu sắc giống hình. Rất hài lòng.', 5, 'Công khai', 1766651308),
(160, 118, NULL, 'Đặng Hoàng Long', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766651316),
(161, 118, NULL, 'Vũ Minh Khoa', 'Mặc lên gọn gàng, dễ phối áo. Nhìn khá lịch sự.', 5, 'Công khai', 1766651324),
(162, 118, NULL, 'Nguyễn Thị Kim Oanh', 'Mua cho người nhà mặc rất vừa, ai cũng khen', 5, 'Công khai', 1766651331),
(163, 119, NULL, 'Nguyễn Văn Duy', 'Quần mặc thoải mái, form gọn gàng. Rất dễ phối áo.', 5, 'Công khai', 1766651364),
(164, 119, NULL, 'Trần Thị Ngọc Mai', 'Chất vải mềm, màu sắc đẹp. Đúng như hình shop đăng.', 5, 'Công khai', 1766651373),
(165, 119, NULL, 'Lê Quốc Thịnh', 'Quần đúng size, đường may chắc chắn. Đáng tiền.', 5, 'Công khai', 1766651382),
(166, 119, NULL, 'Phạm Minh Tuấn', 'Mặc lên nhìn lịch sự, phù hợp đi làm hằng ngày.', 5, 'Công khai', 1766651390),
(167, 119, NULL, 'Đặng Thanh Phúc', 'Ít nhăn, giữ form tốt sau khi giặt', 5, 'Công khai', 1766651398),
(168, 119, NULL, 'Vũ Thị Thanh Huyền', 'Mua cho người thân mặc rất vừa, ai cũng khen', 5, 'Công khai', 1766651406),
(169, 73, NULL, 'Nguyễn Minh Khang', 'Tất mềm, mang rất êm chân. Không bị hầm hay bí.', 5, 'Công khai', 1766651474),
(170, 73, NULL, 'Trần Thị Thu Uyên', 'Chất vải tốt, co giãn vừa phải. Mang cả ngày vẫn thoải mái', 5, 'Công khai', 1766651482),
(171, 73, NULL, 'Lê Quốc Bảo', 'Tất dày dặn, form ôm chân. Không bị tuột khi đi bộ nhiều.', 5, 'Công khai', 1766651491),
(172, 73, NULL, 'An', 'Màu sắc đẹp, giống hình. Giặt không bị xù hay bai.', 5, 'Công khai', 1766651503),
(173, 73, NULL, 'Đặng Văn Hòa', 'Mang với giày thể thao rất ổn, thấm hút mồ hôi tốt', 5, 'Công khai', 1766651511),
(174, 73, NULL, 'Vũ Thị Kim Ngân', 'Tất mềm, không bị cấn hay đau cổ chân.', 5, 'Công khai', 1766651519),
(175, 73, NULL, 'Nguyễn Hoàng Long', 'Giá hợp lý, chất lượng tốt so với mong đợi', 5, 'Công khai', 1766651530),
(176, 74, NULL, 'Nguyễn Thành Đạt', 'Tất mang êm, không bị bí chân. Chất vải khá ổn.', 5, 'Công khai', 1766651616),
(177, 74, NULL, 'Trần Thị Bích Ngọc', 'Co giãn tốt, ôm chân vừa phải. Mang rất thoải mái.', 5, 'Công khai', 1766651625),
(178, 74, NULL, 'Lê Minh Tuấn', 'Tất dày vừa, không bị tuột khi đi lại nhiều.', 5, 'Công khai', 1766651634),
(179, 74, NULL, 'Phạm Quốc Huy', 'Thấm hút mồ hôi tốt, mang với giày thể thao rất hợp', 5, 'Công khai', 1766651642),
(180, 74, NULL, 'Đặng Hoàng Phúc', 'Màu sắc đẹp, giặt không bị xù hay bai.', 5, 'Công khai', 1766651650),
(181, 74, NULL, 'Vũ Thị Thanh Thảo', 'Mang lâu không bị đau cổ chân. Rất dễ chịu', 5, 'Công khai', 1766651660),
(182, 74, NULL, 'Nguyễn Văn Phúc', 'Giá hợp lý, chất lượng ổn so với tầm giá.', 5, 'Công khai', 1766651670),
(183, 74, NULL, 'Hoàng Kim Anh', 'Mua nhiều đôi dùng hằng ngày rất tiện', 5, 'Công khai', 1766651679),
(184, 120, NULL, 'Nguyễn Quang Vinh', 'Tất mang rất êm, không bị hầm chân. Thoải mái cả ngày.', 5, 'Công khai', 1766651714),
(185, 120, NULL, 'Trần Thị Lan Phương', 'Chất vải mềm, co giãn tốt. Mang rất dễ chịu.', 4, 'Công khai', 1766651721),
(186, 120, NULL, 'Lê Minh Quân', 'Tất ôm chân vừa phải, không bị tuột khi đi nhiều.', 5, 'Công khai', 1766651730),
(187, 120, NULL, 'Phạm Quốc Thái', 'Thấm hút mồ hôi tốt, mang với giày thể thao rất ổn', 5, 'Công khai', 1766651738),
(188, 120, NULL, 'Đặng Văn Kiên', 'Giặt không bị xù, form vẫn giữ tốt.', 5, 'Công khai', 1766651745),
(189, 120, NULL, 'Vũ Thị Kim Oanh', 'Mang lâu không bị cấn hay đau cổ chân.', 4, 'Công khai', 1766651754),
(190, 120, NULL, 'Nguyễn Thanh Bình', 'Giá hợp lý, mua nhiều đôi dùng hằng ngày rất tiện', 4, 'Công khai', 1766651763),
(191, 121, NULL, 'Nguyễn Hoàng Nam', 'Gaiter nhẹ, thoáng. Đeo không bị bí hay khó chịu.', 5, 'Công khai', 1766651791),
(192, 121, NULL, 'Trần Thị Minh Anh', 'Chất vải mềm, co giãn tốt. Dùng che nắng rất ổn.', 5, 'Công khai', 1766651800),
(193, 121, NULL, 'Lê Quốc Huy', 'Đeo vừa cổ, không bị tuột. Màu sắc giống hình.', 5, 'Công khai', 1766651808),
(194, 121, NULL, 'Phạm Thanh Tùng', 'Thấm hút mồ hôi tốt, dùng đi xe máy hay thể thao đều tiện', 5, 'Công khai', 1766651816),
(195, 121, NULL, 'Đặng Minh Phúc', 'Giặt nhanh khô, không bị bai hay xù.', 5, 'Công khai', 1766651824),
(196, 121, NULL, 'Vũ Thị Ngọc Trâm', 'Đeo lâu không bị nóng hay khó thở.', 5, 'Công khai', 1766651833),
(197, 121, NULL, 'Nguyễn Văn Khoa', 'Giá hợp lý, dùng hằng ngày rất tiện', 5, 'Công khai', 1766651841),
(198, 122, NULL, 'Nguyễn Minh Quân', 'Túi gọn nhẹ, màu đen đẹp. Đựng đồ rất tiện khi ra ngoài.', 5, 'Công khai', 1766651887),
(199, 122, NULL, 'Trần Thị Thu Hà', 'Chất liệu chắc chắn, đường may gọn gàng. Dùng hằng ngày rất ổn.', 5, 'Công khai', 1766651894),
(200, 122, NULL, 'Lê Quốc Huy', 'Túi vừa size, đeo thoải mái. Phù hợp đi làm hay đi chơi.', 5, 'Công khai', 1766651902),
(201, 122, NULL, 'Phạm Thanh Tùng', 'Thiết kế đơn giản nhưng đẹp, dễ phối đồ', 5, 'Công khai', 1766651909),
(202, 122, NULL, 'Đặng Minh Phúc', 'Khóa kéo mượt, túi không bị xẹp khi để đồ.', 5, 'Công khai', 1766651916),
(203, 122, NULL, 'Vũ Thị Ngọc Anh', 'Đựng điện thoại, ví rất vừa. Màu đen nhìn sang.', 5, 'Công khai', 1766651923),
(204, 122, NULL, 'Nguyễn Văn Khoa', 'Giá hợp lý, chất lượng tốt so với mong đợi', 5, 'Công khai', 1766651944),
(205, 123, NULL, 'Nguyễn Thành Long', 'Túi nhỏ gọn nhưng đựng được khá nhiều đồ. Rất tiện mang theo.', 5, 'Công khai', 1766651974),
(206, 123, NULL, 'Trần Minh Đức', 'Chất vải dày, form túi cứng cáp. Đeo lên nhìn gọn gàng.', 5, 'Công khai', 1766651983),
(207, 123, NULL, 'Lê Thị Thanh Trà', 'Màu đen dễ phối đồ, dùng đi đâu cũng hợp.', 5, 'Công khai', 1766651995),
(208, 123, NULL, 'Phạm Quốc Bảo', 'Khóa kéo chắc chắn, sử dụng mượt. Hài lòng với sản phẩm', 5, 'Công khai', 1766652007),
(209, 123, NULL, 'Đặng Hoàng Nam', 'Túi nhẹ, đeo lâu không bị mỏi vai.', 5, 'Công khai', 1766652016),
(210, 123, NULL, 'Vũ Ngọc Mai', 'Đựng vừa điện thoại, ví, chìa khóa. Rất tiện khi ra ngoài.', 5, 'Công khai', 1766652026),
(211, 123, NULL, 'Nguyễn Văn Phúc', 'Giá hợp lý, chất lượng tốt so với tầm tiền', 5, 'Công khai', 1766652034),
(212, 124, NULL, 'Nguyễn Hoàng Phát', 'Túi gọn nhẹ, đeo rất thoải mái. Phù hợp dùng hằng ngày.', 5, 'Công khai', 1766652056),
(213, 124, NULL, 'Trần Thị Bích Trâm', 'Chất liệu ổn, đường may chắc chắn. Nhìn khá sang.', 5, 'Công khai', 1766652064),
(214, 124, NULL, 'Lê Minh Tuấn', 'Túi vừa size, đựng được nhiều đồ cần thiết.', 5, 'Công khai', 1766652071),
(215, 124, NULL, 'Phạm Quốc Dũng', 'Thiết kế đơn giản nhưng tiện dụng, dễ phối đồ', 5, 'Công khai', 1766652081),
(216, 124, NULL, 'Đặng Thanh Bình', 'Khóa kéo mượt, sử dụng không bị kẹt.', 5, 'Công khai', 1766652091),
(217, 124, NULL, 'Vũ Thị Thu Hương', 'Túi nhẹ, đeo lâu không bị mỏi vai.', 5, 'Công khai', 1766652099),
(218, 124, NULL, 'Nguyễn Văn Hùng', 'Màu đen đẹp, không bị phai sau thời gian sử dụng.', 5, 'Công khai', 1766652107),
(219, 124, NULL, 'Hoàng Kim Anh', 'Giá hợp lý, dùng đi chơi hay đi làm đều ổn', 5, 'Công khai', 1766652115),
(220, 125, NULL, 'Nguyễn Minh Tuấn', 'Cốc giữ nhiệt tốt, nước nóng để lâu vẫn ấm. Thiết kế đẹp.', 5, 'Công khai', 1766652141),
(221, 125, NULL, 'Trần Thị Lan Anh', 'Cốc chắc tay, nắp kín không bị rò nước. Rất tiện mang theo.', 5, 'Công khai', 1766652149),
(222, 125, NULL, 'Lê Quốc Huy', 'Chất liệu tốt, dễ vệ sinh. Mình khá hài lòng', 5, 'Công khai', 1766652203),
(223, 125, NULL, 'Đặng Minh Phúc', 'Cốc gọn nhẹ, bỏ balo không chiếm nhiều chỗ.', 5, 'Công khai', 1766652212),
(224, 125, NULL, 'Vũ Thị Ngọc Mai', 'Giữ lạnh lâu, nước mát cả buổi. Rất thích sản phẩm này.', 4, 'Công khai', 1766652223),
(225, 125, NULL, 'Nguyễn Văn Khoa', 'Giá hợp lý, chất lượng đúng như mô tả', 5, 'Công khai', 1766652235),
(226, 126, NULL, 'Nguyễn Hoàng Long', 'Cốc giữ nhiệt tốt, dùng cả ngày vẫn còn ấm.', 5, 'Công khai', 1766652256),
(227, 126, NULL, 'Trần Thị Bảo Ngọc', 'Thiết kế đẹp, cầm chắc tay. Nắp đậy kín.', 5, 'Công khai', 1766652263),
(228, 126, NULL, 'Lê Minh Khánh', 'Giữ nóng lạnh đều ổn, rất tiện mang theo.', 5, 'Công khai', 1766652271),
(229, 126, NULL, 'Phạm Quốc Thắng', 'Chất liệu tốt, không bị ám mùi. Dễ vệ sinh', 5, 'Công khai', 1766652280),
(230, 126, NULL, 'Đặng Thanh Hải', 'Cốc gọn nhẹ, bỏ balo rất vừa.', 5, 'Công khai', 1766652288),
(231, 126, NULL, 'Vũ Thị Kim Chi', 'Giá hợp lý, dùng hằng ngày rất tiện', 5, 'Công khai', 1766652296),
(232, 127, NULL, 'Nguyễn Minh Khoa', 'Túi canvas dày dặn, form đứng. Đựng đồ khá thoải mái.', 5, 'Công khai', 1766652353),
(233, 127, NULL, 'Trần Thị Thu Hà', 'Chất vải canvas chắc chắn, đường may gọn gàng.', 5, 'Công khai', 1766652367),
(234, 127, NULL, 'Lê Quốc Bảo', 'Túi nhẹ, dễ đeo. Phù hợp đi học hoặc đi làm hằng ngày.', 5, 'Công khai', 1766652374),
(235, 127, NULL, 'Phạm Thanh Tùng', 'Thiết kế đơn giản, dễ phối đồ', 5, 'Công khai', 1766652384),
(236, 127, NULL, 'Đặng Minh Phúc', 'Túi đựng được nhiều đồ mà không bị xệ form.', 5, 'Công khai', 1766652393),
(237, 127, NULL, 'Vũ Thị Ngọc Anh', 'Màu sắc đẹp, giống hình. Dùng lâu vẫn thấy ổn.', 5, 'Công khai', 1766652401),
(238, 127, NULL, 'Nguyễn Văn Long', 'Giá hợp lý, chất lượng tốt so với tầm tiền', 5, 'Công khai', 1766652410),
(239, 127, 10, 'luuducvy', 'Chắc chắn mình sẽ tiếp tục ủng hộ lần sau. Quá hài lòng với sản phẩm này', 5, 'Nháp', 1766652707),
(240, 127, 10, 'luuducvy', 'Quá tuyệt vời !', 5, 'Chờ duyệt', 1766652730),
(251, 114, 10, 'aaaaaaaaaa', '', 4, 'Công khai', 1766751477),
(252, 67, NULL, 'luuducvy', 'Tuyet voi', 5, 'Công khai', 1766976985),
(253, 68, NULL, 'tam', 'ewefwe', 5, 'Nháp', 1766993256),
(254, 128, NULL, 'Lưu Đức Vỹ', 'test\r\n', 5, 'Công khai', 1768918129);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sliders`
--

CREATE TABLE `tbl_sliders` (
  `slider_id` int NOT NULL,
  `image_id` int NOT NULL,
  `slider_title` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_desc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` enum('Công khai','Chờ duyệt') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chờ duyệt',
  `display_order` tinyint(1) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_sliders`
--

INSERT INTO `tbl_sliders` (`slider_id`, `image_id`, `slider_title`, `slider_desc`, `slider_url`, `slider_status`, `display_order`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 1096, 'Black Friday 1', 'Bùng nổ giảm giá', '', 'Chờ duyệt', 1, 1, 1764666539, 1768918431),
(22, 1097, 'Black Friday 2', 'Giảm  giá kinh hoàng', '', 'Chờ duyệt', 2, 1, 1764666582, 1768918430),
(25, 1607, 'Giáng Sinh', 'Giáng Sinh', '', 'Công khai', 3, 1, 1766734738, 1766734746),
(26, 1608, 'Collection', 'Collection', '', 'Công khai', 4, 1, 1766734785, 1768918430);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive','banned') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_role` enum('Quản lí hệ thống','Quản lí bài viết','Quản lí trang','Quản lí sản phẩm','Quản lí giao diện','Quản lí bán hàng') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `login_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `password_hash`, `status`, `user_role`, `fullname`, `email`, `tel`, `address`, `created_at`, `updated_at`, `login_at`) VALUES
(1, 'luuvy15899', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí hệ thống', 'Lưu Vỹ', 'luuvy15899@gmail.com', 782199911, 'TP.Hồ Chí Minh', 1763272873, 1768918544, 1772373956),
(3, 'baochau123', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí trang', 'Trần Bảo Châu', 'baochay1@gmail.com', 78254462, 'Hà Tiên', 1763284013, 1766213286, 1766392203),
(4, 'salemai123', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí bài viết', 'Phạm Thu Mai', 'mai.sale@example.com', 977884411, '12 Lý Thái Tổ, Hà Nội', 1763287270, 1766993681, 1766993689),
(6, 'tech_phuc', 'e10adc3949ba59abbe56e057f20f883e', 'banned', 'Quản lí trang', 'Đặng Minh Phúc', 'phuc.tech@example.com', 987445210, 'Trần Phú, Nha Trang', 1763287484, 1763912762, NULL),
(8, 'toan_sales', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí bài viết', 'Lưu Khánh Toàn', 'toan.sales@company.com', 912348899, 'Hải Châu, Đà Nẵng', 1763289827, 1763290978, NULL),
(9, 'anhkhoa_mkt', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí sản phẩm', 'Đỗ Anh Khoa', 'khoa.mkt@company.com', 905112234, 'Bình Thạnh, TP.HCM', 1763290047, 1763290984, NULL),
(10, 'yen_hr', 'db111a6aa20c23996979b27caaa933a9', 'active', 'Quản lí sản phẩm', 'Phạm Ngọc Yến', 'yen.hr@company.com', 932335566, 'Đống Đa, Hà Nội', 1763290077, 1763290991, NULL),
(11, 'tuan_techlead', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí giao diện', 'Lý Tuấn Hạo', 'tuan.lead@company.com', 974128899, 'Hải Châu, Đà Nẵng', 1763290106, 1763290999, 1766310179),
(12, 'kimanh_cs', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'Quản lí giao diện', 'Hà Kim Ánh', 'kimanh.cs@company.com', 987746655, 'Trần Hưng Đạo, TP.Huế', 1763290127, 1763291004, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  ADD PRIMARY KEY (`block_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_post_categories`
--
ALTER TABLE `tbl_post_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_product_reviews`
--
ALTER TABLE `tbl_product_reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD PRIMARY KEY (`slider_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  MODIFY `block_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1611;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `page_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `tbl_post_categories`
--
ALTER TABLE `tbl_post_categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_product_reviews`
--
ALTER TABLE `tbl_product_reviews`
  MODIFY `review_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_blocks`
--
ALTER TABLE `tbl_blocks`
  ADD CONSTRAINT `tbl_blocks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD CONSTRAINT `tbl_media_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_order_items`
--
ALTER TABLE `tbl_order_items`
  ADD CONSTRAINT `tbl_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD CONSTRAINT `tbl_pages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_post_categories`
--
ALTER TABLE `tbl_post_categories`
  ADD CONSTRAINT `tbl_post_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_product_categories` (`category_id`);

--
-- Constraints for table `tbl_product_categories`
--
ALTER TABLE `tbl_product_categories`
  ADD CONSTRAINT `tbl_product_categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_sliders`
--
ALTER TABLE `tbl_sliders`
  ADD CONSTRAINT `tbl_sliders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_sliders_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `tbl_media` (`image_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

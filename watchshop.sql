-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 28 déc. 2020 à 10:30
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `watchshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `danh_gia_saos`
--

CREATE TABLE `danh_gia_saos` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_star` double DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_sp` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `danh_gia_saos`
--

INSERT INTO `danh_gia_saos` (`id`, `number_star`, `id_user`, `id_sp`, `created_at`, `updated_at`) VALUES
(5, 2, 16, 13, '2020-12-23 22:09:16', '2020-12-23 22:09:16'),
(6, 5, 58, 19, '2020-12-28 01:56:32', '2020-12-28 01:56:32');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hoa_dons`
--

CREATE TABLE `hoa_dons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_khach_hang` bigint(20) UNSIGNED DEFAULT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `ngay_giao_hang` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trang_thai` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `id_khach_hang`, `ngay_dat_hang`, `ngay_giao_hang`, `trang_thai`, `created_at`, `updated_at`) VALUES
(41, 26, NULL, '24/12/2020', 0, '2020-12-23 22:54:43', '2020-12-23 22:54:43'),
(42, 27, NULL, '24/12/2020', 0, '2020-12-23 22:56:21', '2020-12-23 22:56:21'),
(43, 28, NULL, '20/12/2020', 0, '2020-12-28 01:58:03', '2020-12-28 01:58:03'),
(44, 29, NULL, '27/2/2020', 0, '2020-12-28 02:08:10', '2020-12-28 02:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `hoa_don_chi_tiets`
--

CREATE TABLE `hoa_don_chi_tiets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_hoa_don` bigint(20) UNSIGNED DEFAULT NULL,
  `id_san_pham` bigint(20) UNSIGNED DEFAULT NULL,
  `tong_so_luong` int(11) DEFAULT NULL,
  `tong_gia` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hoa_don_chi_tiets`
--

INSERT INTO `hoa_don_chi_tiets` (`id`, `id_hoa_don`, `id_san_pham`, `tong_so_luong`, `tong_gia`, `created_at`, `updated_at`) VALUES
(66, 41, 19, 1, 5900000, '2020-12-23 22:54:43', '2020-12-23 22:54:43'),
(67, 42, 19, 1, 5900000, '2020-12-23 22:56:21', '2020-12-23 22:56:21'),
(68, 42, 18, 1, 3900000, '2020-12-23 22:56:21', '2020-12-23 22:56:21'),
(69, 43, 19, 1, 5900000, '2020-12-28 01:58:03', '2020-12-28 01:58:03'),
(70, 44, 19, 1, 5900000, '2020-12-28 02:08:10', '2020-12-28 02:08:10'),
(71, 44, 15, 1, 3760000, '2020-12-28 02:08:10', '2020-12-28 02:08:10'),
(72, 44, 14, 1, 4900000, '2020-12-28 02:08:10', '2020-12-28 02:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `khach_hangs`
--

CREATE TABLE `khach_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `so_dien_thoai` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ghi_chu` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `khach_hangs`
--

INSERT INTO `khach_hangs` (`id`, `ho_ten`, `so_dien_thoai`, `email`, `dia_chi`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(12, 'nguyen van tuan', 909090900, 'nvtuan@gmail.com', 'Vi thuy - Hau Giang', 'Gói can thận nhé', '2020-12-08 02:32:31', '2020-12-08 02:32:31'),
(13, 'manmantyty', 123456789, 'man3@gmail.com', 'Hậu Giang', 'cẩn thận!', '2020-12-08 03:15:07', '2020-12-08 03:15:07'),
(24, 'lâm minh mẫn', 123456789, NULL, 'Cà mau', 'gói cẩn thận', '2020-12-23 02:37:52', '2020-12-23 02:37:52'),
(25, 'nhan triệu vĩ', 944173707, 'nhantrieuvi@gmail.com', 'hậu giang', 'gói quà cẩn thận!', '2020-12-23 21:48:48', '2020-12-23 21:48:48'),
(26, 'nhan triệu vĩ', 9090909, 'vi1@gmail.com', 'Hậu Giang', 'nhớ gói cho đẹp nhe', '2020-12-23 22:54:43', '2020-12-23 22:54:43'),
(27, 'lâm minh mẫn', 979868968, 'man3@gmail.com', 'cà mau mau', 'gói cho cẩn thận ák', '2020-12-23 22:56:21', '2020-12-23 22:56:21'),
(28, 'nhan triệu vĩ', 944173707, 'nhantrieuvi@gmail.com', 'hậu giang', 'gói cẩn thận nhé đồ đắt tiền lắm đó', '2020-12-28 01:58:03', '2020-12-28 01:58:03'),
(29, 'nhan triệu vĩ 1234', 944173999, 'vi1@gmail.com', 'sóc trăng', 'gói cho đẹp', '2020-12-28 02:08:10', '2020-12-28 02:08:10');

-- --------------------------------------------------------

--
-- Structure de la table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `fullname`, `address`, `email`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(1, 'vĩ', 'cần thơ', 'vi1@gmail.com', '0909909090', 'hihi', '2020-10-25 19:41:49', '2020-10-25 19:41:49'),
(3, 'lâm minh mẫn', 'cà mau', 'man3@gmail.com', '0944173701', 'tôi cần liên hệ với quản lí website ngay là lặp tức', '2020-12-28 02:01:06', '2020-12-28 02:01:06');

-- --------------------------------------------------------

--
-- Structure de la table `loai_san_phams`
--

CREATE TABLE `loai_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai_sp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loai_san_phams`
--

INSERT INTO `loai_san_phams` (`id`, `ten_loai_sp`, `created_at`, `updated_at`) VALUES
(6, 'Đồng hồ thông minh', '2020-03-15 05:54:03', '2020-03-15 05:54:03'),
(8, 'Đồng hồ trẻ em', '2020-03-15 05:54:16', '2020-03-15 05:54:16'),
(10, 'Đồng hồ nam', '2020-12-23 21:57:42', '2020-12-23 21:57:42'),
(11, 'Đồng hồ nữ', '2020-12-23 21:57:52', '2020-12-23 21:57:52');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_03_11_140543_create_quyen_truy_caps_table', 1),
(4, '2020_03_11_144354_create_loai_san_phams_table', 3),
(5, '2020_03_11_145717_create_san_phams_table', 4),
(6, '2020_03_11_150301_create_san_phams_table', 5),
(7, '2020_03_11_150501_create_xuat_xus_table', 6),
(8, '2020_03_11_151042_create_san_phams_table', 7),
(10, '2020_03_11_151726_create_hoa_dons_table', 9),
(11, '2020_03_11_152510_create_hoa_don_chi_tiets_table', 10),
(12, '2020_03_11_144203_create_users_table', 11),
(13, '2020_03_16_134034_create_slide_banners_table', 12),
(14, '2020_10_26_022435_create_lien_hes_table', 13),
(18, '2020_03_11_151338_create_khach_hangs_table', 15),
(19, '2020_11_05_021519_create_danh_gia_saos_table', 16);

-- --------------------------------------------------------

--
-- Structure de la table `quyen_truy_caps`
--

CREATE TABLE `quyen_truy_caps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_quyen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mieu_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quyen_truy_caps`
--

INSERT INTO `quyen_truy_caps` (`id`, `ten_quyen`, `mieu_ta`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '<p><strong>Admin</strong> l&agrave; phải l&agrave;m c&ocirc;ng việc quản trị, điều h&agrave;nh c&aacute;c c&ocirc;ng việc, trong bộ phận hoặc tổ chức n&agrave;o. Admin ở ngo&agrave;i đời thường, thương nắm chức trưởng ph&ograve;ng nh&acirc;n sự hoặc chức trợ l&yacute; cho gi&aacute;m đốc. Những người n&agrave;y thường c&oacute; quyền lực gần tuyệt đối tại c&aacute;c bộ phận nh&acirc;n sự trong c&ocirc;ng ty.</p>', '2020-03-12 06:32:58', '2020-03-12 06:32:58'),
(2, 'Nhân Viên', '<p><strong>Nh&acirc;n vi&ecirc;n</strong>&nbsp;l&agrave; thuật ngữ chỉ những người l&agrave;m c&ocirc;ng việc m&ocirc;i giới, x&acirc;y dựng chiến lược tiếp thị, kết nối kh&aacute;ch h&agrave;ng nhằm ti&ecirc;u thụ sản phẩm của đơn vị m&igrave;nh, từ đ&oacute; tạo ra doanh thu v&agrave; lợi nhuận. C&ugrave;ng với sự ph&aacute;t triển vượt bậc của ng&agrave;nh Nh&agrave; h&agrave;ng - Kh&aacute;ch sạn (NHKS), nhu cầu tuyển dụng nh&acirc;n vi&ecirc;n kinh doanh tr&ecirc;n thị trường n&agrave;y rất cao.</p>', '2020-03-12 06:34:51', '2020-03-12 06:34:51'),
(3, 'Khách Hàng', '<p>Kh&aacute;ch h&agrave;ng được đ&aacute;nh gi&aacute; sao</p>', '2020-12-28 01:20:07', '2020-12-28 01:20:07');

-- --------------------------------------------------------

--
-- Structure de la table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_loai_sp` bigint(20) UNSIGNED DEFAULT NULL,
  `id_xuat_xu` bigint(20) UNSIGNED DEFAULT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia_nhap` int(11) DEFAULT NULL,
  `gia_ban` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `xuat_xu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mieu_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `san_phams`
--

INSERT INTO `san_phams` (`id`, `id_loai_sp`, `id_xuat_xu`, `ten_san_pham`, `hinh_anh`, `gia_nhap`, `gia_ban`, `so_luong`, `xuat_xu`, `mieu_ta`, `created_at`, `updated_at`) VALUES
(13, 10, 4, 'Đồng hồ Nam Citizen BI5000-87L', 'citizen-bi5000-87l.jpg', 2000000, 2580000, 20, NULL, '<ul>\r\n	<li>Đường k&iacute;nh mặt: 39 mm</li>\r\n	<li>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></li>\r\n	<li>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</li>\r\n	<li>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Kim loại</a></li>\r\n	<li>Độ rộng d&acirc;y: 21 mm</li>\r\n	<li>Tiện &iacute;ch Lịch ng&agrave;y</li>\r\n	<li>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></li>\r\n	<li>Nguồn năng lượng: Pin</li>\r\n	<li>Thời gian sử dụng pin: Khoảng 2 năm</li>\r\n</ul>', '2020-12-23 22:07:31', '2020-12-23 22:07:31'),
(14, 10, 9, 'Đồng hồ Nam Orient FAL00002B0 - Cơ tự động', 'orient-fal00002b0-co-tu-dong.jpg', 4000000, 4900000, 20, NULL, '<ul>\r\n	<li><strong>Đường k&iacute;nh mặt: 42.4 mm</strong></li>\r\n	<li><strong>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></strong></li>\r\n	<li><strong>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</strong></li>\r\n	<li><strong>Độ d&agrave;y mặt: D&agrave;y 12.1 mm</strong></li>\r\n	<li><strong>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Kim loại</a></strong></li>\r\n	<li><strong>Độ rộng d&acirc;y: 21.7 mm</strong></li>\r\n	<li><strong>Tiện &iacute;ch Lịch ng&agrave;y, Lịch thứ</strong></li>\r\n	<li><strong>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></strong></li>\r\n	<li><strong>Đối tượng sử dụng: Nam</strong></li>\r\n	<li><strong>Thương hiệu: Nhật Bản</strong></li>\r\n</ul>', '2020-12-23 22:14:09', '2020-12-23 22:17:55'),
(15, 10, 9, 'Đồng hồ Nam Citizen AW1211-12A - Eco-Drive', 'citizen-aw1211-12a.jpg', 3000000, 3760000, 20, NULL, '<p>Đường k&iacute;nh mặt: 42 mm</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></p>\r\n\r\n<p>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#da\" target=\"_blank\">Da</a></p>\r\n\r\n<p>Độ rộng d&acirc;y: 20 mm</p>\r\n\r\n<p>Tiện &iacute;ch Lịch ng&agrave;y</p>\r\n\r\n<p>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n\r\n<p>Nguồn năng lượng:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/dong-ho-ecodrive-la-gi-1167617\" target=\"_blank\">Eco-Drive (Năng lượng &aacute;nh s&aacute;ng)</a></p>\r\n\r\n<p>Đối tượng sử dụng: Nam</p>\r\n\r\n<p>Thương hiệu: Nhật Bản</p>', '2020-12-23 22:22:08', '2020-12-23 22:22:08'),
(16, 10, 9, 'Đồng hồ Nam Citizen AN3610-55L', 'citizen-an3610-55l.jpg', 3000000, 4032000, 20, NULL, '<p>Đường k&iacute;nh mặt: 41 mm</p>\r\n\r\n<ul>\r\n	<li>Chất liệu mặt:\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></p>\r\n	</li>\r\n	<li>Chất liệu khung viền:\r\n	<p>Th&eacute;p kh&ocirc;ng gỉ</p>\r\n	</li>\r\n	<li>Chất liệu d&acirc;y:\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Hợp kim</a></p>\r\n	</li>\r\n	<li>Độ rộng d&acirc;y:\r\n	<p>20 mm</p>\r\n	</li>\r\n	<li>Tiện &iacute;ch\r\n	<p>Lịch ng&agrave;y, Bấm giờ thể thao</p>\r\n	</li>\r\n	<li>Chống nước:\r\n	<p><a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n	</li>\r\n	<li>Nguồn năng lượng:\r\n	<p>Pin</p>\r\n	</li>\r\n	<li>Thời gian sử dụng pin:\r\n	<p>Khoảng 2 năm</p>\r\n	</li>\r\n	<li>Đối tượng sử dụng:\r\n	<p>Nam</p>\r\n	</li>\r\n</ul>', '2020-12-23 22:25:50', '2020-12-23 22:25:50'),
(17, 10, 10, 'Đồng hồ Nam MVW ML004-03', 'mvw-ml004-03.jpg', 1000000, 1490000, 20, NULL, '<p>Đường k&iacute;nh mặt: 40 mm</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Sapphire\" target=\"_blank\">K&iacute;nh Sapphire</a></p>\r\n\r\n<p>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>Độ d&agrave;y mặt: D&agrave;y 8.5 mm</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#da\" target=\"_blank\">Da</a></p>\r\n\r\n<p>Độ rộng d&acirc;y: 19 mm</p>\r\n\r\n<p>Tiện &iacute;ch Lịch ng&agrave;y</p>\r\n\r\n<p>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n\r\n<p>Nguồn năng lượng: Pin</p>\r\n\r\n<p>Thời gian sử dụng pin: Khoảng 2 năm</p>', '2020-12-23 22:31:21', '2020-12-23 22:32:34'),
(18, 10, 9, 'Đồng hồ Nam Orient RA-AC0F02S10B - Cơ tự động', 'orient-ra-ac0f02s10b.jpg', 3000000, 3900000, 20, NULL, '<p>Đường k&iacute;nh mặt: 41.6 mm</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></p>\r\n\r\n<p>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>Độ d&agrave;y mặt: D&agrave;y 11.7 mm</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Kim loại</a></p>\r\n\r\n<p>Tiện &iacute;ch Lịch ng&agrave;y</p>\r\n\r\n<p>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n\r\n<p>Đối tượng sử dụng: Nam</p>\r\n\r\n<p>Thương hiệu: Nhật Bản</p>\r\n\r\n<p>Nơi sản xuất (t&ugrave;y từng l&ocirc; h&agrave;ng): Trung Quốc</p>', '2020-12-23 22:36:40', '2020-12-23 22:36:40'),
(19, 10, 9, 'Đồng hồ Nam Citizen NH8366-83A - Cơ tự động', 'citizen-nh8366-83a.jpg', 4500000, 5900000, 20, NULL, '<p>Đường k&iacute;nh mặt: 41.1 mm</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></p>\r\n\r\n<p>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>Độ d&agrave;y mặt: D&agrave;y 11.1 mm</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Hợp kim</a></p>\r\n\r\n<p>Độ rộng d&acirc;y: 19.6 mm</p>\r\n\r\n<p>Tiện &iacute;ch Lịch ng&agrave;y, thứ</p>\r\n\r\n<p>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n\r\n<p>Đối tượng sử dụng: Nam</p>\r\n\r\n<p>Thương hiệu: Nhật Bản</p>', '2020-12-23 22:39:52', '2020-12-23 22:39:52'),
(20, 10, 9, 'Đồng hồ Nam Citizen NH8360-80J - Cơ tự động', 'dong-ho-nam-citizen-nh8360-80j.jpg', 4000000, 4872000, 20, NULL, '<p>Đường k&iacute;nh mặt: 41 mm</p>\r\n\r\n<p>Chất liệu mặt:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-tung-loai-mat-kinh-dong-ho-deo-tay-1171925#Khoang\" target=\"_blank\">K&iacute;nh kho&aacute;ng (Mineral)</a></p>\r\n\r\n<p>Chất liệu khung viền: Th&eacute;p kh&ocirc;ng gỉ</p>\r\n\r\n<p>Độ d&agrave;y mặt: D&agrave;y 11 mm</p>\r\n\r\n<p>Chất liệu d&acirc;y:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-cac-chat-lieu-day-dong-ho-deo-tay-1171917#kimloai\" target=\"_blank\">Kim loại</a></p>\r\n\r\n<p>Độ rộng d&acirc;y: 20 mm</p>\r\n\r\n<p>Tiện &iacute;ch Lịch ng&agrave;y, Lịch thứ</p>\r\n\r\n<p>Chống nước:&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cac-he-so-chong-nuoc-cua-dong-ho-thoi-trang-1168222#50m\" target=\"_blank\">5 ATM - Rửa tay, đi mưa, tắm</a></p>\r\n\r\n<p>Đối tượng sử dụng: Nam</p>\r\n\r\n<p>Thương hiệu: Nhật Bản</p>', '2020-12-23 22:46:42', '2020-12-23 22:46:42'),
(21, 10, 4, 'đồng hồ', 'citizen-an3610-55l.jpg', 2000000, 3000000, 20, NULL, '<p>đẹp lắm</p>', '2020-12-28 02:10:42', '2020-12-28 02:10:42');

-- --------------------------------------------------------

--
-- Structure de la table `slide_banners`
--

CREATE TABLE `slide_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED DEFAULT NULL,
  `hinh_anh_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slide_banners`
--

INSERT INTO `slide_banners` (`id`, `id_san_pham`, `hinh_anh_slide`, `created_at`, `updated_at`) VALUES
(12, 20, '4.jpg', '2020-12-23 23:33:56', '2020-12-23 23:33:56');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_truy_cap` bigint(20) UNSIGNED DEFAULT NULL,
  `ho_ten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinh_anh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dien_thoai` int(11) DEFAULT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_truy_cap`, `ho_ten`, `hinh_anh`, `username`, `password`, `email`, `gioi_tinh`, `ngay_sinh`, `dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(16, 1, 'Nhan Triệu Vĩ', 'nhanvien.jpg', 'nhantrieuvi', '$2y$10$A/UTb0j2BMelNRsEA7O08eEVyx9c5iEF6wmBzfe72hU4SuOB1hupW', 'vi@gmail.com', 'Nam', '2020-03-07', 312345678, 'Hậu Giang', '2020-03-15 20:03:58', '2020-10-21 01:31:11'),
(17, 2, 'Lâm Minh Mẫn', 'user.jpg', 'mandeptrai', '$2y$10$slR8qsDdBOebA.4K3d1nLO/W5kvRuQhk.ye1keHoHMtw7xZzjRzeS', 'man@gmail.com', 'Nam', '2020-03-16', 326827373, 'Cà mau', '2020-03-15 20:17:46', '2020-03-15 20:17:46'),
(57, 3, 'nguyễn văn tuấn', NULL, 'tuantkd', '$2y$10$JqH0cNwBMMy4FONWnuk6HeG8VgclrJ2iyhHtg9fGsD0Hmpdbul2te', 'tuan@gmail.com', NULL, NULL, 909909090, 'hậu giang', '2020-12-28 01:22:58', '2020-12-28 01:22:58'),
(58, 3, 'nhan triệu vĩ', NULL, 'nhantrieuvi1234', '$2y$10$EYgiqUq03ZCJyw1DYw3JeezIu70uXwJB0zJqPrKVGRNoiuMzRVNKu', 'nhantrieuvi@gmail.com', NULL, NULL, 944173707, 'hậu giang', '2020-12-28 01:56:05', '2020-12-28 01:56:05');

-- --------------------------------------------------------

--
-- Structure de la table `xuat_xus`
--

CREATE TABLE `xuat_xus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `xuat_xu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `xuat_xus`
--

INSERT INTO `xuat_xus` (`id`, `xuat_xu`, `thong_tin`, `created_at`, `updated_at`) VALUES
(4, 'USA', '<p>MỸ</p>', '2020-03-16 20:49:28', '2020-03-16 20:49:28'),
(8, 'KOREA', '<p>H&agrave;n Quốc</p>', '2020-12-23 22:15:30', '2020-12-23 22:15:30'),
(9, 'Japan', '<p>Nhật Bản</p>', '2020-12-23 22:16:06', '2020-12-23 22:16:06'),
(10, 'China', '<p>Trung Quốc</p>', '2020-12-23 22:16:23', '2020-12-23 22:16:23'),
(11, 'Việt Nam', '<p>Việt Nam</p>', '2020-12-23 22:16:59', '2020-12-23 22:16:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_gia_saos_id_user_foreign` (`id_user`),
  ADD KEY `danh_gia_saos_id_sp_foreign` (`id_sp`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_dons_id_khach_hang_foreign` (`id_khach_hang`);

--
-- Index pour la table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_chi_tiets_id_hoa_don_foreign` (`id_hoa_don`),
  ADD KEY `hoa_don_chi_tiets_id_san_pham_foreign` (`id_san_pham`);

--
-- Index pour la table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quyen_truy_caps`
--
ALTER TABLE `quyen_truy_caps`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_phams_id_loai_sp_foreign` (`id_loai_sp`),
  ADD KEY `san_phams_id_xuat_xu_foreign` (`id_xuat_xu`);

--
-- Index pour la table `slide_banners`
--
ALTER TABLE `slide_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slide_banners_id_san_pham_foreign` (`id_san_pham`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ten_tai_khoan_unique` (`username`),
  ADD KEY `users_id_truy_cap_foreign` (`id_truy_cap`);

--
-- Index pour la table `xuat_xus`
--
ALTER TABLE `xuat_xus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `quyen_truy_caps`
--
ALTER TABLE `quyen_truy_caps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `slide_banners`
--
ALTER TABLE `slide_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `xuat_xus`
--
ALTER TABLE `xuat_xus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  ADD CONSTRAINT `danh_gia_saos_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danh_gia_saos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `hoa_dons_id_khach_hang_foreign` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hangs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  ADD CONSTRAINT `hoa_don_chi_tiets_id_hoa_don_foreign` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_dons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiets_id_san_pham_foreign` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_id_loai_sp_foreign` FOREIGN KEY (`id_loai_sp`) REFERENCES `loai_san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_phams_id_xuat_xu_foreign` FOREIGN KEY (`id_xuat_xu`) REFERENCES `xuat_xus` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `slide_banners`
--
ALTER TABLE `slide_banners`
  ADD CONSTRAINT `slide_banners_id_san_pham_foreign` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_truy_cap_foreign` FOREIGN KEY (`id_truy_cap`) REFERENCES `quyen_truy_caps` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

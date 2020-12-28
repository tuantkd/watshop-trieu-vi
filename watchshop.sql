-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 10:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_gia_saos`
--

CREATE TABLE `danh_gia_saos` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_star` double DEFAULT NULL,
  `id_sp` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gia_saos`
--

INSERT INTO `danh_gia_saos` (`id`, `number_star`, `id_sp`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '2020-12-06 09:23:28', '2020-12-06 09:23:28'),
(2, 2, 5, '2020-12-06 09:43:00', '2020-12-06 09:43:00'),
(3, 4, 5, '2020-12-06 09:43:07', '2020-12-06 09:43:07'),
(4, 5, 5, '2020-12-06 09:43:12', '2020-12-06 09:43:12'),
(5, 3, 5, '2020-12-06 09:43:44', '2020-12-06 09:43:44'),
(6, 5, 5, '2020-12-06 09:43:49', '2020-12-06 09:43:49'),
(7, 2, 5, '2020-12-06 09:43:53', '2020-12-06 09:43:53'),
(8, 1, 5, '2020-12-06 09:49:01', '2020-12-06 09:49:01'),
(9, 5, 5, '2020-12-06 09:49:10', '2020-12-06 09:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `hoa_dons`
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
-- Dumping data for table `hoa_dons`
--

INSERT INTO `hoa_dons` (`id`, `id_khach_hang`, `ngay_dat_hang`, `ngay_giao_hang`, `trang_thai`, `created_at`, `updated_at`) VALUES
(25, 10, NULL, '8/12/2020', 0, '2020-12-06 20:41:12', '2020-12-06 20:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don_chi_tiets`
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
-- Dumping data for table `hoa_don_chi_tiets`
--

INSERT INTO `hoa_don_chi_tiets` (`id`, `id_hoa_don`, `id_san_pham`, `tong_so_luong`, `tong_gia`, `created_at`, `updated_at`) VALUES
(40, 25, 7, 1, 7000000, '2020-12-06 20:41:12', '2020-12-06 20:41:12'),
(41, 25, 10, 1, 2000000, '2020-12-06 20:41:12', '2020-12-06 20:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `khach_hangs`
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
-- Dumping data for table `khach_hangs`
--

INSERT INTO `khach_hangs` (`id`, `ho_ten`, `so_dien_thoai`, `email`, `dia_chi`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Văn Tuấn', 924577049, 'nguyenvantuan9a7@gmail.com', 'Ấp 3, Xã Vị Thủy, Huyện Vị Thủy, Tỉnh Hậu Giang', 'Gói hàng cẩn thận', '2020-12-06 20:41:12', '2020-12-06 20:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
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
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `fullname`, `address`, `email`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(1, 'vĩ', 'cần thơ', 'vi1@gmail.com', '0909909090', 'hihi', '2020-10-25 19:41:49', '2020-10-25 19:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_phams`
--

CREATE TABLE `loai_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai_sp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_san_phams`
--

INSERT INTO `loai_san_phams` (`id`, `ten_loai_sp`, `created_at`, `updated_at`) VALUES
(6, 'Đồng hồ thông minh', '2020-03-15 05:54:03', '2020-03-15 05:54:03'),
(7, 'Đồng hồ thời trang', '2020-03-15 05:54:10', '2020-03-15 05:54:10'),
(8, 'Đồng hồ trẻ em', '2020-03-15 05:54:16', '2020-03-15 05:54:16'),
(9, 'Dây đeo', '2020-03-15 05:54:21', '2020-03-15 05:54:21');

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
(17, '2020_11_05_021519_create_danh_gia_saos_table', 14),
(18, '2020_03_11_151338_create_khach_hangs_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `quyen_truy_caps`
--

CREATE TABLE `quyen_truy_caps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_quyen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mieu_ta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quyen_truy_caps`
--

INSERT INTO `quyen_truy_caps` (`id`, `ten_quyen`, `mieu_ta`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '<p><strong>Admin</strong> l&agrave; phải l&agrave;m c&ocirc;ng việc quản trị, điều h&agrave;nh c&aacute;c c&ocirc;ng việc, trong bộ phận hoặc tổ chức n&agrave;o. Admin ở ngo&agrave;i đời thường, thương nắm chức trưởng ph&ograve;ng nh&acirc;n sự hoặc chức trợ l&yacute; cho gi&aacute;m đốc. Những người n&agrave;y thường c&oacute; quyền lực gần tuyệt đối tại c&aacute;c bộ phận nh&acirc;n sự trong c&ocirc;ng ty.</p>', '2020-03-12 06:32:58', '2020-03-12 06:32:58'),
(2, 'Nhân Viên', '<p><strong>Nh&acirc;n vi&ecirc;n</strong>&nbsp;l&agrave; thuật ngữ chỉ những người l&agrave;m c&ocirc;ng việc m&ocirc;i giới, x&acirc;y dựng chiến lược tiếp thị, kết nối kh&aacute;ch h&agrave;ng nhằm ti&ecirc;u thụ sản phẩm của đơn vị m&igrave;nh, từ đ&oacute; tạo ra doanh thu v&agrave; lợi nhuận. C&ugrave;ng với sự ph&aacute;t triển vượt bậc của ng&agrave;nh Nh&agrave; h&agrave;ng - Kh&aacute;ch sạn (NHKS), nhu cầu tuyển dụng nh&acirc;n vi&ecirc;n kinh doanh tr&ecirc;n thị trường n&agrave;y rất cao.</p>', '2020-03-12 06:34:51', '2020-03-12 06:34:51'),
(3, 'Khách Hàng', NULL, '2020-10-07 01:25:06', '2020-10-07 01:25:06');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
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
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `id_loai_sp`, `id_xuat_xu`, `ten_san_pham`, `hinh_anh`, `gia_nhap`, `gia_ban`, `so_luong`, `xuat_xu`, `mieu_ta`, `created_at`, `updated_at`) VALUES
(5, 6, 4, 'Apple Watch s3', 'apple s3 42.jpg', 1000000, 2000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:51:25', '2020-03-16 20:51:25'),
(6, 6, 4, 'Apple Watch s5', '1.jpg', 2000000, 3000000, 100, NULL, '<ul>\r\n	<li>M&agrave;n h&igrave;nh</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh\r\n	<p>OLED</p>\r\n	</li>\r\n	<li>\r\n	<p>K&iacute;ch thước m&agrave;n h&igrave;nh</p>\r\n\r\n	<p>1.57 inch</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ ph&acirc;n giải</p>\r\n\r\n	<p>324 x 394 pixels</p>\r\n	</li>\r\n	<li>\r\n	<p>Chất liệu mặt</p>\r\n\r\n	<p>Ion-X strengthened glass</p>\r\n	</li>\r\n	<li>\r\n	<p>Đường k&iacute;nh mặt</p>\r\n\r\n	<p>40 mm</p>\r\n	</li>\r\n	<li>Cấu h&igrave;nh</li>\r\n	<li>CPU\r\n	<p>Apple S5 64 bit</p>\r\n	</li>\r\n	<li>\r\n	<p>Bộ nhớ trong</p>\r\n\r\n	<p>32 GB</p>\r\n	</li>\r\n	<li>\r\n	<p>Hệ điều h&agrave;nh</p>\r\n\r\n	<p>watchOS 6.0</p>\r\n	</li>\r\n	<li>\r\n	<p>Kết nối được với hệ điều h&agrave;nh</p>\r\n\r\n	<p>iOS 13 trở l&ecirc;n</p>\r\n	</li>\r\n	<li>\r\n	<p>Cổng sạc</p>\r\n\r\n	<p>Đế sạc nam ch&acirc;m</p>\r\n	</li>\r\n	<li>Pin</li>\r\n	<li>Thời gian sử dụng pin\r\n	<p>Khoảng 18 giờ, Khoảng 2 ng&agrave;y</p>\r\n	</li>\r\n	<li>\r\n	<p>Thời gian sạc</p>\r\n\r\n	<p>Khoảng 1 giờ</p>\r\n	</li>\r\n	<li>\r\n	<p>Dung lượng pin</p>\r\n\r\n	<p>Đang cập nhật</p>\r\n	</li>\r\n	<li>Tiện &iacute;ch &amp; kết nối</li>\r\n	<li>T&iacute;nh năng cho sức khỏe\r\n	<p>Đo nhịp tim, T&iacute;nh lượng calories ti&ecirc;u thụ, Đếm số bước ch&acirc;n, T&iacute;nh qu&atilde;ng đường chạy, Chế độ luyện tập</p>\r\n	</li>\r\n	<li>\r\n	<p>Hiển thị th&ocirc;ng b&aacute;o</p>\r\n\r\n	<p>Cuộc gọi, Nội dung tin nhắn, Tin nhắn, Zalo, Messenger (Facebook), Line, Viber</p>\r\n	</li>\r\n	<li>\r\n	<p>Kết nối</p>\r\n\r\n	<p>Bluetooth v5.0, Wifi,&nbsp;GPS, Hỗ trợ eSim</p>\r\n	</li>\r\n	<li>\r\n	<p>Camera</p>\r\n\r\n	<p>Kh&ocirc;ng c&oacute;</p>\r\n	</li>\r\n	<li>\r\n	<p>Tiện &iacute;ch kh&aacute;c</p>\r\n\r\n	<p>Hỗ trợ eSIM, Nghe gọi tr&ecirc;n đồng hồ, M&agrave;n h&igrave;nh lu&ocirc;n hiển thị, Nghe nhạc với tai nghe Bluetooth, Định vị, La b&agrave;n, Đồng hồ bấm giờ, Điều khiển chơi nhạc, Rung th&ocirc;ng b&aacute;o, Thay mặt đồng hồ, Nhận cuộc gọi, T&igrave;m điện thoại, B&aacute;o thức, Ph&aacute;t hiện t&eacute; ng&atilde;, Dự b&aacute;o thời tiết, Từ chối cuộc gọi, Đếm bước ch&acirc;n, Đồng hồ đếm ngược</p>\r\n	</li>\r\n	<li>D&acirc;y đeo</li>\r\n	<li>Độ d&agrave;i d&acirc;y\r\n	<p>Đang cập nhật</p>\r\n	</li>\r\n	<li>\r\n	<p>Độ rộng d&acirc;y</p>\r\n\r\n	<p>Đang cập nhật</p>\r\n	</li>\r\n	<li>\r\n	<p>D&acirc;y c&oacute; thể th&aacute;o rời</p>\r\n\r\n	<p>C&oacute;</p>\r\n	</li>\r\n	<li>\r\n	<p>Chất liệu d&acirc;y</p>\r\n\r\n	<p>Silicon</p>\r\n	</li>\r\n	<li>Th&ocirc;ng tin kh&aacute;c</li>\r\n	<li>Chất liệu khung viền\r\n	<p>Kh&ocirc;ng</p>\r\n	</li>\r\n	<li>\r\n	<p>Ng&ocirc;n ngữ</p>\r\n\r\n	<p>Tiếng Anh, Tiếng Việt</p>\r\n	</li>\r\n	<li>\r\n	<p>K&iacute;ch thước</p>\r\n\r\n	<p>Đường k&iacute;nh 40 mm - D&agrave;y 10.7 mm</p>\r\n	</li>\r\n	<li>\r\n	<p>Trọng lượng</p>\r\n\r\n	<p>30 gram</p>\r\n	</li>\r\n</ul>', '2020-03-16 20:52:35', '2020-03-17 18:47:32'),
(7, 6, 6, 'mi band 4', 'mi band 4.jpg', 4000000, 7000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:53:32', '2020-03-16 20:53:32'),
(8, 7, 5, 'MVW', 'Đồng hồ Nam MVW MP001-02.jpg', 3000000, 4000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:54:18', '2020-03-16 20:54:18'),
(9, 8, 5, 'mimi', 'trẻ em 1.jpg', 1000000, 2000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:55:02', '2020-03-16 21:15:21'),
(10, 8, 5, 'hihi', 'trẻ em 2.jpg', 1000000, 2000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:55:43', '2020-03-16 20:55:43'),
(11, 9, 4, 'dây đeo', 'dây nâu.jpg', 1000000, 2000000, 100, NULL, '<p>đẹp</p>', '2020-03-16 20:56:14', '2020-03-16 20:56:14'),
(12, 9, 5, 'lala', 'dây samsun.jpg', 1000000, 5000000, 100, NULL, '<p>đẹp&nbsp;</p>', '2020-03-16 20:57:05', '2020-03-16 20:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `slide_banners`
--

CREATE TABLE `slide_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_san_pham` bigint(20) UNSIGNED DEFAULT NULL,
  `hinh_anh_slide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_banners`
--

INSERT INTO `slide_banners` (`id`, `id_san_pham`, `hinh_anh_slide`, `created_at`, `updated_at`) VALUES
(8, 9, 'bg-2.jpg', '2020-03-16 21:24:17', '2020-03-16 21:24:17'),
(9, 12, 'bg-2.jpg', '2020-03-16 21:25:42', '2020-03-16 21:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_truy_cap`, `ho_ten`, `hinh_anh`, `username`, `password`, `email`, `gioi_tinh`, `ngay_sinh`, `dien_thoai`, `dia_chi`, `created_at`, `updated_at`) VALUES
(16, 1, 'Nhan Triệu Vĩ', 'nhanvien.jpg', 'nhantrieuvi', '$2y$10$A/UTb0j2BMelNRsEA7O08eEVyx9c5iEF6wmBzfe72hU4SuOB1hupW', 'vi@gmail.com', 'Nam', '2020-03-07', 312345678, 'Hậu Giang', '2020-03-15 20:03:58', '2020-10-21 01:31:11'),
(17, 2, 'Lâm Minh Mẫn', 'user.jpg', 'mandeptrai', '$2y$10$slR8qsDdBOebA.4K3d1nLO/W5kvRuQhk.ye1keHoHMtw7xZzjRzeS', 'man@gmail.com', 'Nam', '2020-03-16', 326827373, 'Cà mau', '2020-03-15 20:17:46', '2020-03-15 20:17:46'),
(38, 3, 'nguyễn văn tuấn', NULL, 'tuantung', '$2y$10$oXi26uMBiycHLdZ1FNB1gO0hBqEa253crBWFGzLWp.r3QnH.I7N3C', 'tuan1234', NULL, NULL, 91234569, 'cái bè', '2020-10-21 01:32:38', '2020-10-21 01:32:38'),
(39, 3, 'nhan triệu vĩ', NULL, 'trieuvi', '$2y$10$0Oq.zP/iGfWfCkXmePe3UuV6DV4n1YquMYQ2t8hmK2PcG37FirbsG', 'vi4@gmail.com', NULL, NULL, 909909093, 'cái bè', '2020-10-25 21:13:40', '2020-10-25 21:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `xuat_xus`
--

CREATE TABLE `xuat_xus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `xuat_xu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `xuat_xus`
--

INSERT INTO `xuat_xus` (`id`, `xuat_xu`, `thong_tin`, `created_at`, `updated_at`) VALUES
(4, 'USA', '<p>MỸ</p>', '2020-03-16 20:49:28', '2020-03-16 20:49:28'),
(5, 'HÀN QUỐC', '<p>nước h&agrave;n</p>', '2020-03-16 20:50:02', '2020-03-16 20:50:02'),
(6, 'Trung Quốc', '<p>trung quốc</p>', '2020-03-16 20:50:42', '2020-03-16 20:50:42'),
(7, 'Apple Store1', '<p>jvj</p>', '2020-10-07 01:47:35', '2020-10-07 01:47:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_gia_saos_id_sp_foreign` (`id_sp`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_dons_id_khach_hang_foreign` (`id_khach_hang`);

--
-- Indexes for table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hoa_don_chi_tiets_id_hoa_don_foreign` (`id_hoa_don`),
  ADD KEY `hoa_don_chi_tiets_id_san_pham_foreign` (`id_san_pham`);

--
-- Indexes for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quyen_truy_caps`
--
ALTER TABLE `quyen_truy_caps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_phams_id_loai_sp_foreign` (`id_loai_sp`),
  ADD KEY `san_phams_id_xuat_xu_foreign` (`id_xuat_xu`);

--
-- Indexes for table `slide_banners`
--
ALTER TABLE `slide_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slide_banners_id_san_pham_foreign` (`id_san_pham`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ten_tai_khoan_unique` (`username`),
  ADD KEY `users_id_truy_cap_foreign` (`id_truy_cap`);

--
-- Indexes for table `xuat_xus`
--
ALTER TABLE `xuat_xus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `khach_hangs`
--
ALTER TABLE `khach_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loai_san_phams`
--
ALTER TABLE `loai_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quyen_truy_caps`
--
ALTER TABLE `quyen_truy_caps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `slide_banners`
--
ALTER TABLE `slide_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `xuat_xus`
--
ALTER TABLE `xuat_xus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danh_gia_saos`
--
ALTER TABLE `danh_gia_saos`
  ADD CONSTRAINT `danh_gia_saos_id_sp_foreign` FOREIGN KEY (`id_sp`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hoa_dons`
--
ALTER TABLE `hoa_dons`
  ADD CONSTRAINT `hoa_dons_id_khach_hang_foreign` FOREIGN KEY (`id_khach_hang`) REFERENCES `khach_hangs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hoa_don_chi_tiets`
--
ALTER TABLE `hoa_don_chi_tiets`
  ADD CONSTRAINT `hoa_don_chi_tiets_id_hoa_don_foreign` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_dons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hoa_don_chi_tiets_id_san_pham_foreign` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_id_loai_sp_foreign` FOREIGN KEY (`id_loai_sp`) REFERENCES `loai_san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `san_phams_id_xuat_xu_foreign` FOREIGN KEY (`id_xuat_xu`) REFERENCES `xuat_xus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slide_banners`
--
ALTER TABLE `slide_banners`
  ADD CONSTRAINT `slide_banners_id_san_pham_foreign` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_truy_cap_foreign` FOREIGN KEY (`id_truy_cap`) REFERENCES `quyen_truy_caps` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

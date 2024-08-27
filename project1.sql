-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2024 at 09:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `thoi_gian_binh_luan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `noi_dung` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `id_san_pham`, `id_nguoi_dung`, `thoi_gian_binh_luan`, `noi_dung`) VALUES
(107, 25, 2, '2024-07-29 08:15:00', 'hàng cũng tạm :'),
(108, 38, 3, '2024-07-29 08:15:46', 'AE ăn nói hẳn hoi không tao ban hết nhé :V'),
(120, 25, 2, '2024-07-31 10:49:25', 'Ae im để t cmt xem dài không '),
(130, 28, 2, '2024-07-31 14:30:57', '521521'),
(131, 29, 2, '2024-08-04 07:55:03', '412421'),
(132, 29, 2, '2024-08-04 07:55:55', '412421'),
(133, 7, 2, '2024-08-04 07:59:00', 'Hơi đen'),
(134, 7, 2, '2024-08-04 07:59:14', 'hơi khê'),
(135, 45, 2, '2024-08-07 13:53:56', 'đã mua hết 😗');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `tieu_de_blog` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_blog` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_blog` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dang_blog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `url` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `id_nguoi_dung`, `tieu_de_blog`, `img_blog`, `mo_ta_blog`, `ngay_dang_blog`, `url`) VALUES
(4, 2, 'Những thủ thuật với bàn phím IOS', 'img_1.jpg', 'Biết cách xử lý với bàn phím ios', '2024-07-28 10:55:23', 'https://www.blogcongnghe.vn/nhung-thu-thuat-voi-ban-phim-ios/'),
(6, 2, '15 Trang web tốt nhất có giúp bạn học mọi thứ', 'img4.png', 'Chỉ tốn 15 phút có thể khiến bạn trở thành con người khác', '2024-07-30 10:30:00', 'https://www.blogcongnghe.vn/15-trang-web-tot-nhat-co-the-giup-ban-hoc-du-thu-tren-doi/');

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vu`
--

INSERT INTO `chuc_vu` (`id`, `ten_chuc_vu`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `anh_danh_muc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `name`, `anh_danh_muc`) VALUES
(1, 'NVIDIA', 'logo_nvidia.png'),
(18, 'AMD', 'AMD_logo.png'),
(19, 'MSI', 'Msi_Logo.png'),
(29, 'intel', 'logo_intel.png'),
(31, 'Asus', 'asus_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `ten_nguoi_dung` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(40) NOT NULL,
  `dia_chi` varchar(40) NOT NULL,
  `so_dien_thoai` varchar(50) NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1.Thanh toán trực tiếp 2.Chuyển khoản 3.Thanh toán online',
  `madh` varchar(50) NOT NULL,
  `ngaydathang` varchar(50) DEFAULT NULL,
  `id_trang_thai` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `iduser`, `ten_nguoi_dung`, `email`, `dia_chi`, `so_dien_thoai`, `pttt`, `madh`, `ngaydathang`, `id_trang_thai`) VALUES
(115, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD688562', '08:37:53pm 07/08/2024', 4),
(116, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD24912', '08:52:21pm 07/08/2024', 5),
(117, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD763707', '08:07:48am 08/08/2024', 3),
(121, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '03621548103', 1, 'CARD621403', '09:12:19pm 12/08/2024', 5),
(122, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '0362154444', 1, 'CARD954243', '09:18:02pm 12/08/2024', 2),
(123, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD546169', '11:12:27pm 13/08/2024', 3),
(124, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '0362154444', 1, 'CARD764671', '11:19:46pm 13/08/2024', 2),
(125, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD519559', '10:35:09pm 14/08/2024', 4),
(126, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '0362154444', 1, 'CARD87880', '09:05:08am 15/08/2024', 2),
(127, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '0362154444', 1, 'CARD125443', '09:10:46am 15/08/2024', 5),
(128, 20, 'user2', 'thanhnt@adu.com', 'Hà Nội', '0362154444', 2, 'CARD633739', '09:11:56am 15/08/2024', 1),
(129, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD981932', '04:08:27pm 20/08/2024', 4),
(130, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD678166', '09:20:34pm 22/08/2024', 1),
(131, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 2, 'CARD409255', '09:20:44pm 22/08/2024', 1),
(132, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD798584', '02:10:35am 27/08/2024', 1),
(133, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD784354', '02:16:23am 27/08/2024', 1),
(134, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD370924', '02:18:10am 27/08/2024', 1),
(135, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD972346', '02:18:13am 27/08/2024', 1),
(136, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD988298', '02:18:40am 27/08/2024', 1),
(137, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD481196', '02:19:12am 27/08/2024', 1),
(138, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD24000', '02:19:42am 27/08/2024', 1),
(139, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD335932', '02:20:01am 27/08/2024', 1),
(140, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 1, 'CARD964559', '02:20:44am 27/08/2024', 1),
(141, 2, 'admin', 'thanhntph42151@fpt.edu.vn', 'Hồ Chí Minh', '0383655954', 2, 'CARD518873', '02:24:41am 27/08/2024', 2);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang_detail`
--

CREATE TABLE `don_hang_detail` (
  `id_ctdh` int NOT NULL,
  `id_sp` int NOT NULL,
  `id_dh` int NOT NULL,
  `sl` int NOT NULL,
  `tong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hang_detail`
--

INSERT INTO `don_hang_detail` (`id_ctdh`, `id_sp`, `id_dh`, `sl`, `tong`) VALUES
(52, 35, 115, 5, 27900000),
(53, 37, 115, 2, 32000000),
(54, 36, 115, 3, 3990000),
(55, 45, 116, 152, 10990000),
(56, 38, 117, 6, 28599000),
(60, 45, 121, 2, 10990000),
(61, 37, 122, 2, 32000000),
(62, 44, 123, 1, 23590000),
(63, 45, 124, 7, 10990000),
(64, 35, 125, 1, 27900000),
(65, 35, 126, 2, 27900000),
(66, 45, 127, 1, 10990000),
(67, 45, 128, 1, 10990000),
(68, 45, 129, 2, 10990000),
(69, 36, 130, 1, 3990000),
(70, 36, 131, 1, 3990000),
(71, 37, 132, 1, 32000000),
(72, 35, 133, 1, 27900000),
(73, 37, 134, 1, 32000000),
(74, 37, 137, 1, 32000000),
(75, 36, 138, 1, 3990000),
(76, 36, 139, 1, 3990000),
(77, 36, 140, 1, 3990000),
(78, 29, 141, 1, 8900000);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idpro` int NOT NULL,
  `dongia` double(10,0) NOT NULL DEFAULT '0',
  `soluong` int NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `id_donhang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` int NOT NULL,
  `tai_khoan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_chuc_vu` int NOT NULL DEFAULT '1',
  `sdt` varchar(11) NOT NULL,
  `dia_chi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ban` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `tai_khoan`, `mat_khau`, `email`, `id_chuc_vu`, `sdt`, `dia_chi`, `ban`) VALUES
(2, 'admin', '1', 'thanhntph42151@fpt.edu.vn', 2, '0383655954', 'Hồ Chí Minh', 0),
(3, 'user', '1', 'okechua@gmail.com', 1, '0385745321', 'Hà Nội', 1),
(20, 'user2', '1', 'thanhnt@adu.com', 1, '0362154444', 'Hà Nội', 0),
(21, 'admin2', '1', 'thanhnt@gmail.com', 2, '0383655941', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gia_san_pham` double NOT NULL,
  `anh_san_pham` varchar(255) NOT NULL,
  `so_luong` int NOT NULL,
  `mo_ta` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `id_danh_muc` int NOT NULL
) ;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten_san_pham`, `gia_san_pham`, `anh_san_pham`, `so_luong`, `mo_ta`, `ngay_dang`, `id_danh_muc`) VALUES
(7, 'Bản tối màu hiệu suất cao cấp', 4200000, 'img1.jpg', 40, 'Thông số kỹ thuật:\r\n\r\nNhân đồ họa 	NVIDIA® GeForce RTX™ 4060 Ti.\r\n\r\nBus tiêu chuẩn	PCI Express 4.0.\r\n\r\nXung nhịp	Chế độ OC: 2625 MHz.\r\n\r\nChế độ mặc định: 2595 MHz (Boost).\r\n\r\nNhân CUDA	4352.\r\n\r\nTốc độ bộ nhớ	18 Gbps.\r\n\r\nOpenGL	OpenGL®4.6.\r\n\r\nBộ nhớ Video	8GB GDDR6.\r\n\r\nGiao thức bộ nhớ	128-bit.\r\n\r\nĐộ phân giải	Độ phân giải tối đa 7680 x 4320.\r\n\r\nGiao thức:	\r\nCó x 1 (Native HDMI 2.1).\r\nCó x 3 (Native DisplayPort 1.4a).\r\n\r\nHỗ trợ: HDCP (2.3). \r\n\r\nSố lượng màn hình tối đa: hỗ trợ 4. \r\n\r\nHỗ trợ NVlink/ Crossfire: Không.\r\n\r\nPhụ kiện	\r\n1 x Thẻ sưu tập\r\n1 x Hướng dẫn nhanh\r\n1 x Thẻ cảm ơn\r\nPhần mềm	ASUS GPU Tweak III & GeForce Game Ready Driver & Studio Driver: vui lòng tải xuống tất cả phần mềm từ trang web hỗ trợ.\r\nKích thước	227.2 x 123.24 x 49.6 mm\r\nPSU kiến nghị	650W\r\nKết nối nguồn	1 x 8 pin\r\nKhe cắm	2.5 khe', '1111-11-11', 31),
(25, 'Card màn hình Nvdia', 11000000, 'img1.jpg', 92, 'Thông số kỹ thuật: \r\n\r\nThương hiệu:	Asus\r\nBảo hành:	36 tháng\r\nModel:	ASUS Dual Radeon RX 6600 V3 8GB \r\nCore Clock:	\r\nChế độ OC: up to 2491 MHz (Boost Clock)/up to 2064 MHz (Game Clock)\r\nChế độ Gaming: up to 2491 MHz (Boost Clock)/up to 2044 MHz (Game Clock)\r\nChipset:	Radeon™ RX 6600\r\nGiao thức kết nối:	PCI-E 4.0\r\nNhân xử lý:	1792\r\nBộ nhớ:	\r\nDung lượng: 8GB\r\nLoại: GDDR6\r\nTốc độ: 14 Gbps\r\nGiao thức: 128-bit\r\nĐộ phân giải kỹ thuật số tối đa:	7680 x 4320\r\nSố màn hình hỗ trợ xuất tối đa:	4\r\nCổng xuất hình:	\r\nYes x 1 (Native HDMI 2.1)\r\nYes x 3 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.3)\r\nPhiên bản DirectX:	12 Ultimate\r\nPhiên bản OpenGL:	4.6\r\nKích thước:	219.2 x 121.2 x 40.5 mm\r\n8.6 x 4.8 x 1.59 inch\r\nPSU đề nghị:	500W\r\nĐầu cấp nguồn:	1 x 8-pin\r\nSlot	2.1 Slot', '2222-02-02', 31),
(27, 'Card phần cứng', 1000000, 'img3.jpg', 40, 'VGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 cung cấp khả năng xử lý đồ hoạ mạnh mẽ với GPU GeForce GTX 1650, RAM 4GB cùng bus bộ nhớ lên tới 128-bit. Độ phân giải hình ảnh được xử lý thông qua dòng VGA MSI này luôn sở hữu độ sắc nét cực cao, tối đa hỗ trợ lên đến 7680x4320. Kết hợp với đó là chuẩn kết nối PCI Express x16 3.0 và hỗ trợ kết nối đa màn hình lên đến 3, mang lại hiệu suất ấn tượng trong khi xử lý mọi tác vụ.\r\n\r\nVGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 - Khả năng xử lý đồ hoạ mạnh mẽ, thiết kế độc đáo\r\nDòng sản phẩm VGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 được thiết kế để đáp ứng nhu cầu hình ảnh cao cấp của người dùng về một trải nghiệm gaming mượt mà và hiệu quả công việc đồ họa. Với công nghệ tản nhiệt được tối ưu hóa, cùng với hai cánh quạt và lõi bằng nhôm, GeForce GTX 1650 4GB D6 Ventus XS OCV3 không chỉ cung cấp khả năng tản nhiệt hiệu quả mà còn đảm bảo sự ổn định suốt quá trình xử lý đồ hoạ. \r\n\r\nCơ chế tản nhiệt thông minh, quản lý nhiệt độ VGA luôn ở mức ổn định\r\nVGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 chứng tỏ khả năng tản nhiệt vượt trội thông qua hệ thống tản nhiệt ép đùn bằng nhôm được thiết kế tinh xảo. Cơ chế tản nhiệt này của GeForce GTX 1650 4GB D6 Ventus XS OCV3 giúp tối ưu hóa diện tích tiếp xúc với GPU và RAM, từ đó hỗ trợ quá trình truyền nhiệt được hiệu quả hơn. ', '2011-02-22', 31),
(28, 'Card đồ họa bản mới', 120000000, 'img4.jpg', 71, 'Thông tin sản phẩm\r\nThông số kỹ thuật:\r\nNhân đồ họa 	GeForce RTX™ 4070 Ti SUPER\r\nBus tiêu chuẩn	PCI-E 4.0\r\nXung nhịp	2640 MHz (Reference card: 2610 MHz)\r\nNhân CUDA	8448\r\nTốc độ bộ nhớ	21 Gbps\r\nOpenGL	OpenGL®4.6\r\nDirectX	12 Ultimate\r\nBộ nhớ Video	16GB GDDR6X\r\nGiao thức bộ nhớ	256-bit\r\nĐộ phân giải	Độ phân giải tối đa 7680 x 4320\r\nSố lượng màn hình tối đa hỗ trợ	4\r\nCổng xuất hình	\r\nHDMI 2.1 x 1\r\n\r\nDisplayPort 1.4a x 3\r\n\r\nKích thước	L=261 W=126 H=50 mm\r\nPSU kiến nghị	750W\r\nKết nối nguồn	1 x 16 pin\r\nPhụ kiện	1 x Hướng dẫn nhanh\r\n1 x Cáp chuyển đổi (1 ra 2)\r\nĐánh giá chi tiết Card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G \r\nMột sản phẩm thuộc dòng RTX 4070 Ti SUPER nên bạn có thể yên tâm về hiệu năng của chiếc card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G đem lại, cho một nhu cầu chuyên nghiệp và khắt khe nhất từ người dùng từ PC gaming hay PC thiết kế đều có thể vận hành cách mượt mà.', '1222-02-02', 31),
(29, 'Card đồ họa GTX bản tintan ', 8900000, 'img5.jpg', 36, 'Cực cứng cáp hiệu năng ổn định', '2019-11-02', 29),
(30, 'Card Graphic 4060', 12900000, 'img6.jpg', 127, 'Thông tin sản phẩm\r\nThông số kỹ thuật:\r\nNhân đồ họa 	GeForce RTX™ 4070 Ti SUPER\r\nBus tiêu chuẩn	PCI-E 4.0\r\nXung nhịp	2640 MHz (Reference card: 2610 MHz)\r\nNhân CUDA	8448\r\nTốc độ bộ nhớ	21 Gbps\r\nOpenGL	OpenGL®4.6\r\nDirectX	12 Ultimate\r\nBộ nhớ Video	16GB GDDR6X\r\nGiao thức bộ nhớ	256-bit\r\nĐộ phân giải	Độ phân giải tối đa 7680 x 4320\r\nSố lượng màn hình tối đa hỗ trợ	4\r\nCổng xuất hình	\r\nHDMI 2.1 x 1\r\n\r\nDisplayPort 1.4a x 3\r\n\r\nKích thước	L=261 W=126 H=50 mm\r\nPSU kiến nghị	750W\r\nKết nối nguồn	1 x 16 pin\r\nPhụ kiện	1 x Hướng dẫn nhanh\r\n1 x Cáp chuyển đổi (1 ra 2)\r\nĐánh giá chi tiết Card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G \r\nMột sản phẩm thuộc dòng RTX 4070 Ti SUPER nên bạn có thể yên tâm về hiệu năng của chiếc card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G đem lại, cho một nhu cầu chuyên nghiệp và khắt khe nhất từ người dùng từ PC gaming hay PC thiết kế đều có thể vận hành cách mượt mà.', '1999-11-12', 31),
(35, 'Card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G (GV-N407TSEAGLE OC-16GD)', 27900000, 'img9.webp', 96, 'Thông tin sản phẩm\r\nThông số kỹ thuật:\r\nNhân đồ họa 	GeForce RTX™ 4070 Ti SUPER\r\nBus tiêu chuẩn	PCI-E 4.0\r\nXung nhịp	2640 MHz (Reference card: 2610 MHz)\r\nNhân CUDA	8448\r\nTốc độ bộ nhớ	21 Gbps\r\nOpenGL	OpenGL®4.6\r\nDirectX	12 Ultimate\r\nBộ nhớ Video	16GB GDDR6X\r\nGiao thức bộ nhớ	256-bit\r\nĐộ phân giải	Độ phân giải tối đa 7680 x 4320\r\nSố lượng màn hình tối đa hỗ trợ	4\r\nCổng xuất hình	\r\nHDMI 2.1 x 1\r\n\r\nDisplayPort 1.4a x 3\r\n\r\nKích thước	L=261 W=126 H=50 mm\r\nPSU kiến nghị	750W\r\nKết nối nguồn	1 x 16 pin\r\nPhụ kiện	1 x Hướng dẫn nhanh\r\n1 x Cáp chuyển đổi (1 ra 2)\r\nĐánh giá chi tiết Card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G \r\nMột sản phẩm thuộc dòng RTX 4070 Ti SUPER nên bạn có thể yên tâm về hiệu năng của chiếc card màn hình GIGABYTE GeForce RTX 4070 Ti SUPER EAGLE OC 16G đem lại, cho một nhu cầu chuyên nghiệp và khắt khe nhất từ người dùng từ PC gaming hay PC thiết kế đều có thể vận hành cách mượt mà.', '2004-10-10', 31),
(36, 'VGA MSI GeForce GTX 1650 4GB D6 VENTUS XS OCV3', 3990000, 'img8.webp', 1043, 'VGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 cung cấp khả năng xử lý đồ hoạ mạnh mẽ với GPU GeForce GTX 1650, RAM 4GB cùng bus bộ nhớ lên tới 128-bit. Độ phân giải hình ảnh được xử lý thông qua dòng VGA MSI này luôn sở hữu độ sắc nét cực cao, tối đa hỗ trợ lên đến 7680x4320. Kết hợp với đó là chuẩn kết nối PCI Express x16 3.0 và hỗ trợ kết nối đa màn hình lên đến 3, mang lại hiệu suất ấn tượng trong khi xử lý mọi tác vụ.\r\n\r\nVGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 - Khả năng xử lý đồ hoạ mạnh mẽ, thiết kế độc đáo\r\nDòng sản phẩm VGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 được thiết kế để đáp ứng nhu cầu hình ảnh cao cấp của người dùng về một trải nghiệm gaming mượt mà và hiệu quả công việc đồ họa. Với công nghệ tản nhiệt được tối ưu hóa, cùng với hai cánh quạt và lõi bằng nhôm, GeForce GTX 1650 4GB D6 Ventus XS OCV3 không chỉ cung cấp khả năng tản nhiệt hiệu quả mà còn đảm bảo sự ổn định suốt quá trình xử lý đồ hoạ. \r\n\r\nCơ chế tản nhiệt thông minh, quản lý nhiệt độ VGA luôn ở mức ổn định\r\nVGA MSI GeForce GTX 1650 4GB D6 Ventus XS OCV3 chứng tỏ khả năng tản nhiệt vượt trội thông qua hệ thống tản nhiệt ép đùn bằng nhôm được thiết kế tinh xảo. Cơ chế tản nhiệt này của GeForce GTX 1650 4GB D6 Ventus XS OCV3 giúp tối ưu hóa diện tích tiếp xúc với GPU và RAM, từ đó hỗ trợ quá trình truyền nhiệt được hiệu quả hơn. ', '2002-10-10', 31),
(37, 'Card màn hình SAPPHIRE Radeon RX 7700XT NITRO + Gaming OC 12GB GDDR6', 32000000, 'img10.jpg', 26, 'Chip đồ họa: Geforce RTX 4070TI\r\nBộ nhớ trong: 12Gb\r\nKiểu bộ nhớ: GDDR6X\r\nTốc độ bộ nhớ: 21 Gbps\r\nGiao diện bộ nhớ: 192 bit\r\nEngine Clock: 2670 MHz (Reference Card: 2610 MHz)\r\nCUDA Core: 7680\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2022-10-10', 29),
(38, 'Card đồ họa Gigabyte GeForce RTX 4070 Ti AERO OC (12GB/ GDDR6X/ 192 bit)', 28599000, 'img12.jpg', 0, 'Chip đồ họa: Geforce RTX 4070TI\r\nBộ nhớ trong: 12Gb\r\nKiểu bộ nhớ: GDDR6X\r\nTốc độ bộ nhớ: 21 Gbps\r\nGiao diện bộ nhớ: 192 bit\r\nEngine Clock: 2640 MHz (Reference Card: 2610 MHz)\r\nCUDA Core: 7680\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2021-11-10', 18),
(39, 'Card đồ họa Asus Dual Radeon RX 6600 V2 (8GB/ GDDR6/ 128 bit)', 4200000, 'img13.jpg', 21, 'Chip đồ họa: Radeon RX 6600\r\nBộ nhớ trong: 8Gb\r\nKiểu bộ nhớ: GDDR6\r\nTốc độ bộ nhớ: 14 Gbps\r\nGiao diện bộ nhớ: 128 bit\r\nEngine Clock: OC mode : up to 2491 MHz (Boost Clock)/up to 2064 MHz (Game Clock)\r\nDefault mode : up to 2491 MHz (Boost Clock)/up to 2044 MHz (Game Clock)\r\nCUDA Core: 1792\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2014-01-02', 31),
(40, 'Card đồ họa Inno3D RTX 4070 Ti SUPER TWIN X2 OC (16GB/ GDDR6X/ 256 bit)', 25000000, 'img14.jpg', 42, 'Chip đồ họa: Geforce RTX 4070TI Super\r\nBộ nhớ trong: 16Gb\r\nKiểu bộ nhớ: GDDR6X\r\nTốc độ bộ nhớ: 21 Gbps\r\nGiao diện bộ nhớ: 256 bit\r\nEngine Clock: Boost Clock (MHz):2640 MHz,Base Clock (MHz):\r\n2340 MHz\r\nCUDA Core: 8448\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2022-02-02', 31),
(41, 'Card đồ họa AiVision GeForce RTX 2060', 6100000, 'img15.jpg', 45, 'Chip đồ họa: Geforce RTX 4060TI\r\nBộ nhớ trong: 16Gb\r\nKiểu bộ nhớ: GDDR6\r\nTốc độ bộ nhớ: 18 Gbps\r\nGiao diện bộ nhớ: 128 bit\r\nEngine Clock: 2595 MHz (Reference card: 2535 MHz)\r\nCUDA Core: 4352\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2024-07-07', 18),
(42, 'Card màn hình VGA LEADTEK WinFast GTX 1650 GDDR6 LP', 5699000, 'img16.jpg', 60, 'NVIDIA ® Turing ® GPU\r\n896 lõi CUDA\r\nBộ nhớ GDDR6 4GB\r\nGiao diện bộ nhớ 128 bit\r\nTốc độ bộ nhớ 12 Gbps\r\nĐồng hồ cơ bản: 1410 MHz\r\nTăng xung nhịp: 1590 MHz\r\nQUẠT kép', '2004-07-07', 19),
(43, 'Card đồ họa Gigabyte AORUS GeForce RTX 4060 ELITE', 11190000, 'img17.jpg', 71, 'Chip đồ họa: Geforce RTX 4060\r\nBộ nhớ trong: 8Gb\r\nKiểu bộ nhớ: GDDR6\r\nTốc độ bộ nhớ: 17 Gbps\r\nGiao diện bộ nhớ: 128 bit\r\nEngine Clock: 2640 MHz (Reference card: 2460 MHz)\r\nCUDA Core: 3072\r\nDirectX: 12 Ultimate\r\nChuẩn khe cắm: PCI Express 4.0', '2021-07-07', 31),
(44, 'Card đồ họa Inno3D RTX 4070 Ti SUPER TWIN X2 OC', 23590000, 'img18.jpg', 83, 'Dung lượng bộ nhớ: 8GB GDDR6X\r\nCore Clock: 1800 MHz (Reference Card: 1770 MHz)\r\nBăng thông: 256 bit\r\nKết nối: DisplayPort 1.4a *2, HDMI 2.1 *2\r\nNguồn yêu cầu: 750W', '2024-07-07', 29),
(45, 'Card màn hình MSI GeForce RTX 4060 GAMING X 8G MLG', 10990000, 'img20.webp', 56, 'Thông số kỹ thuật:\r\nNhân đồ họa 	NVIDIA® GeForce RTX™ 4060\r\nChuẩn giao tiếp	PCI Express® Gen 4 x16 (sử dụng x8)\r\nXung nhịp	Extreme Performance: 2610MHz (MSI Center)\r\nBoost: 2595 MHz\r\nCuda Core	3072 Units\r\nTốc độ Bộ nhớ	17 Gbps\r\nBộ nhớ	8GB GDDR6\r\nBus bộ nhớ	128-bit\r\nCổng xuất hình	- DisplayPort x 3 (v1.4a)\r\n- HDMI™ x 1 (Hỗ trợ HDR 4K@120Hz và HDR 8K@60Hz và Tốc độ làm mới có thể thay đổi (VRR) như được chỉ định trong HDMI™ 2.1a)\r\nHỗ trợ HDCP	Y\r\nSự tiêu thụ điện	115W\r\nCổng kết nối	8-pin x 1\r\nNguồn khuyến nghị	550W\r\nKích thước VGA	247 x 130 x 41 mm\r\nCân nặng (VGA / Package)	587 g / 1000 g\r\nHỗ trợ phiên bản DIRECTX	12 Ultimate\r\nHỗ trợ phiên bản OPENGL	4.6\r\nTối đa cổng xuất hình	4\r\nCông nghệ G-SYNC	Y\r\nĐộ phân giải tối đa	7680 x 4320', '2024-07-07', 31),
(46, 'VGA COLORFUL RTX 3070 NB 8G-V (8GB GDDR6, 256-bit, HDMI+DP, 2x8-pin)', 10990000, 'img19.jpg', 71, 'COLORFUL RTX 3070 NB 8G-V\r\n\r\nDung lượng bộ nhớ: 8GB GDDR6\r\n\r\nCore Clock: Base：Base:1500Mhz; Boost:1725Mhz\r\n\r\nBăng thông: 256 bit\r\n\r\nKết nối: 3DP+HDMI\r\n\r\nĐánh giá VGA COLORFUL RTX 3070 NB 8G-V (8GB GDDR6, 256-bit, HDMI+DP, 2x8-pin)\r\nVGA Colorful GeForce RTX 3070 NB 8G V là một trong những sản phẩm nổi bật của dòng card đồ họa RTX 30 series từ Colorful. Với hiệu năng mạnh mẽ và giá thành hợp lý, sản phẩm này đã nhanh chóng thu hút được sự quan tâm của đông đảo game thủ và những người làm công việc đồ họa. Trong bài viết này, chúng ta sẽ đi sâu vào từng khía cạnh của VGA này để hiểu rõ hơn về sức mạnh và những tính năng nổi bật của nó.', '2024-08-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id` int NOT NULL,
  `trang_thai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai`
--

INSERT INTO `trang_thai` (`id`, `trang_thai`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Đã hủy đơn'),
(4, 'Bắt đầu vận chuyển'),
(5, 'Đã nhận hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binhluan_nguoidung` (`id_nguoi_dung`),
  ADD KEY `fk_binhluan_sanpham` (`id_san_pham`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_user` (`id_nguoi_dung`);

--
-- Indexes for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_status` (`id_trang_thai`),
  ADD KEY `lk_user_donhang` (`iduser`);

--
-- Indexes for table `don_hang_detail`
--
ALTER TABLE `don_hang_detail`
  ADD PRIMARY KEY (`id_ctdh`),
  ADD KEY `lk_sp` (`id_sp`),
  ADD KEY `lk_dh` (`id_dh`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idpro` (`idpro`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nguoidung_chucvu` (`id_chuc_vu`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sanpham_danhmuc` (`id_danh_muc`);

--
-- Indexes for table `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chuc_vu`
--
ALTER TABLE `chuc_vu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `don_hang_detail`
--
ALTER TABLE `don_hang_detail`
  MODIFY `id_ctdh` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_binhluan_nguoidung` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_binhluan_sanpham` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `lk_user` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `lk_status` FOREIGN KEY (`id_trang_thai`) REFERENCES `trang_thai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_user_donhang` FOREIGN KEY (`iduser`) REFERENCES `nguoi_dung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hang_detail`
--
ALTER TABLE `don_hang_detail`
  ADD CONSTRAINT `lk_dh` FOREIGN KEY (`id_dh`) REFERENCES `don_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_sp` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `nguoi_dung` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `gio_hang_ibfk_2` FOREIGN KEY (`idpro`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `fk_nguoidung_chucvu` FOREIGN KEY (`id_chuc_vu`) REFERENCES `chuc_vu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sanpham_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danh_muc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

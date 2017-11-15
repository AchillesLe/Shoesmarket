-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 10:04 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ourwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `housenumber` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streetname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `countyname` int(11) DEFAULT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `name`) VALUES
(1, 'Quận 1'),
(2, 'Quận 12'),
(3, 'Quận Thủ Đức'),
(4, 'Quận 9'),
(5, 'Quận Gò Vấp'),
(6, '	Quận Bình Thạnh'),
(7, '	Quận Tân Bình'),
(8, 'Quận Tân Phú'),
(9, 'Quận Phú Nhuận'),
(10, 'Quận 2'),
(11, '	Quận 3'),
(12, '	Quận 10'),
(13, '	Quận 11'),
(14, 'Quận 4'),
(15, '	Quận 5'),
(16, 'Quận 6'),
(17, 'Quận 8'),
(18, 'Quận Bình Tân'),
(19, 'Quận 7'),
(20, '	Huyện Củ Chi'),
(21, 'Huyện Hóc Môn'),
(22, 'Huyện Bình Chánh'),
(23, '	Huyện Nhà Bè'),
(24, '	Huyện Cần Giờ'),
(25, 'Ngoài Thành phố');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `idbill` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `cost` float NOT NULL,
  `shipfee` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `total` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 là đang xử lý 1 là hoàn thành 2 là huỷ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `nameFrom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailFrom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nameTo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mailTo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `nameFrom`, `mailFrom`, `nameTo`, `mailTo`, `title`, `content`, `created_at`) VALUES
(1, 'Achilles', 'yuriboykasgu@gmail.com', 'seller2', 'cusocdoitoi@gmail.com', 'sadasds', '<p>SSSSSSSSSCCCCCCCCCCCCCCCCCCCCCC XXXXXXXXXXXXXXXXXXXX</p>', '2017-11-14 08:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `emailtemplates`
--

CREATE TABLE `emailtemplates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emailtemplates`
--

INSERT INTO `emailtemplates` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'mail phạt khi giao hàng trễ', '<p>BBBBBBBBBBB</p>', '2017-11-13 08:50:04', '2017-11-13 01:50:04'),
(4, 'Mail phạt khi rating 1 *', '<p>Kính gửi anh&nbsp;[Ten] , tài khoản của anh&nbsp;có hiện tượng rating 1 * 2 lần ,có khả năng khách hàng không hài lòng với hàng của anh cung cấp&nbsp; , có thể do hàng kém chất lượng hay dịch vụ giao hàng kém . Để bảo vệ uy tín của website chúng tôi tạm thời khoá tài khoản của anh , nếu anh muốn mở lại tài khoản thì mời an lên trụ sở địa chỉ : 138&nbsp; trần hưng đạo&nbsp; để làm thủ tục nộp phạt và mở lại tài khoản cho anh .Xin cảm ơn .</p>', '2017-11-13 01:37:38', '2017-11-13 01:37:38'),
(5, 'AAAAAAA', '<p>SSSSSSSSSCCCCCCCCCCCCCCCCCCCCCC XXXXXXXXXXXXXXXXXXXX</p>', '2017-11-13 08:45:31', '2017-11-13 01:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `idrole` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `idrole`, `username`, `phone`, `address`, `image`, `status`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '01656500786', 'thành phố hồ chí minh', NULL, 0, 'Achilles', 'lvbao96@gmail.com', '$2y$10$x8hFufyu8vGvcH51zsTmhuXEHsZEUIO2j02XRF1HFAPMjwImAEyEa', 'rKJn7tlPsKm2PmcGaF5DWfIAQ94VhR3Sap7FG8KZpDRUBO0gBKr8VZVjAX3u', '2017-11-15 08:46:07', '2017-11-15 08:46:07'),
(2, 2, 'quanlykhang', '01234567895', 'thành phố hồ chí minh', NULL, 0, 'Khang', 'ngduykhang@gmail.com', '$2y$10$x8hFufyu8vGvcH51zsTmhuXEHsZEUIO2j02XRF1HFAPMjwImAEyEa', NULL, '2017-11-14 16:07:13', '2017-11-14 16:07:13'),
(3, 2, 'nhanvien', '01524225554', 'Cà Mau', NULL, 0, 'Vân', 'vandom123@gmail.com', '$2y$10$x8hFufyu8vGvcH51zsTmhuXEHsZEUIO2j02XRF1HFAPMjwImAEyEa', NULL, '2017-11-14 16:07:43', '2017-11-14 16:07:43'),
(4, 2, 'HaiAnh', '01562885226', '157 nguyễn tri phương thành phố hồ chí minh', NULL, 0, 'Lê Trần Hải Anh', 'haianh2103@gmail.com', '$2y$10$x8hFufyu8vGvcH51zsTmhuXEHsZEUIO2j02XRF1HFAPMjwImAEyEa', NULL, '2017-11-14 16:07:58', '2017-11-14 16:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `shipfee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0 is active 1 is block',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newquantity` int(11) NOT NULL,
  `money` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `newquantity`, `money`) VALUES
(1, 'Kim Cương', 100, 1000000),
(2, 'vàng', 75, 700000),
(3, 'bạc', 10, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalize`
--

CREATE TABLE `penalize` (
  `id` int(11) NOT NULL,
  `idseller` int(11) NOT NULL,
  `idemployee` int(11) NOT NULL,
  `money` float NOT NULL DEFAULT '0',
  `reason` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idseller` int(11) DEFAULT NULL,
  `idprotype` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_meta` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0 là đang hiển thị còn 1 là không hiển thị.',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `idtype` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namemeta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdelete` int(1) DEFAULT '0' COMMENT '1 là xoá',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `idtype`, `name`, `namemeta`, `description`, `isdelete`, `created_at`, `updated_at`) VALUES
(1, 1, 'giày Converse ', 'giay-Converse ', 'Cái tên Converse tuy quen tai ở Việt Nam từ hơn một thập kỷ đổ lại đây, nhưng trên thế giới thì tuổi thọ của thương hiệu này đã lên đến hơn cả một thế kỷ', 0, '2017-10-16 05:46:26', '2017-10-16 05:46:26'),
(2, 4, 'NaBo', 'nabo', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', 1, '2017-10-15 22:46:33', '2017-11-03 10:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `idseller` int(11) DEFAULT NULL,
  `onestar` int(11) DEFAULT '0',
  `twostar` int(11) DEFAULT '0',
  `threestar` int(11) DEFAULT '0',
  `fourstar` int(11) DEFAULT '0',
  `fivestar` int(11) DEFAULT '0',
  `average` float DEFAULT NULL,
  `total` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `idseller` int(11) NOT NULL,
  `idemployee` int(11) DEFAULT '0' COMMENT '0 là paypal ,khác 0 là nhan vien',
  `namepackage` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newquantity` int(11) NOT NULL,
  `money` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'quanly'),
(2, 'nhanvien');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(1) NOT NULL DEFAULT '0' COMMENT '0 là nam 1 nữ',
  `identification` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsquantity` int(11) NOT NULL DEFAULT '0',
  `isblock` int(1) NOT NULL DEFAULT '1' COMMENT '0 là acive 1 là block',
  `reason` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `name`, `username`, `email`, `password`, `address`, `phone`, `sex`, `identification`, `newsquantity`, `isblock`, `reason`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'seller1', 'seller1', 'lvbao96@gmail.com', '', 'hồ chí minh cyti', '01245782352', 0, '012453785', 10, 0, '', NULL, NULL, '2017-11-03 03:42:27', '2017-11-15 01:55:46'),
(3, 'seller2', 'seller2', 'cusocdoitoi@gmail.com', '', 'Đà nẵng', '01425333441', 0, '174522851', 5, 1, 'Hàng kém chất lượng', NULL, NULL, '2017-11-03 14:23:24', '2017-11-07 08:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `shipfeeseller`
--

CREATE TABLE `shipfeeseller` (
  `id` int(11) NOT NULL,
  `idseller` int(11) NOT NULL,
  `idCounty` int(11) NOT NULL,
  `shipfee` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isdelete` int(1) DEFAULT '0' COMMENT '1 là xoá',
  `namemeta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ten khong dau',
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `isdelete`, `namemeta`, `description`) VALUES
(1, 'giày thể thao', 1, 'giay-the-thao', 'Giày thể thao là tên chung dành cho các loại được thiết kế chủ yếu dành cho các hoạt động thể thao, nhưng trong các năm gần đây, giày thể thao được sử dụng trong các hoạt động hàng ngày.'),
(2, 'giày thời trang', 0, 'giay-thoi-trang', 'Chúng ta đã thưởng thức rất nhiều những gợi ý về xu hướng giày thời trang Xuân Hè 2017, nơi những đôi giày được được thiết kế dạng dây đan với nhau, liên kết với phần cấu trúc bên dưới và chúng được kết hợp với vớ, dù là vớ dài hoặc hở gót chúng đều phù hợp .'),
(3, 'giày da', 0, 'giay-da', 'Khi nói đến da hầu hết mọi người đều nghĩ rằng chúng ta đang đề cập đến da bò, nhưng thật ra nó có thể là bất kì loại da động vật nào đã trải qua quá trình thuộc để tạo thành chất liệu cuối cùng (gọi chung là Da).\r\nDa thuộc của bê non thì vẫn gọi là da bê đơn giản bởi vì da thuộc đó được làm từ con bê.'),
(4, 'giày boot', 0, 'giay-boot', 'Giày có cổ cao , đa dạng về màu sắc cũng nhưng size , phù hợp vs người trẻ tuổi .');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isblock` int(1) DEFAULT '0',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remerber_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `phone`, `isblock`, `email`, `password`, `remerber_token`, `created_at`, `updated_at`) VALUES
(3, 'haithanhf', 'Bao', '01656500786', 0, 'lvbao96@gmail.com', '', NULL, '2017-10-14 09:17:56', '2017-11-15 01:56:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_bill` (`idnews`),
  ADD KEY `user_bill` (`iduser`),
  ADD KEY `county_bill` (`countyname`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_bill` (`idproduct`),
  ADD KEY `bill_detail_bill` (`idbill`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `role_employees` (`idrole`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_new` (`idproduct`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `penalize`
--
ALTER TABLE `penalize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forfeit_seller` (`idseller`),
  ADD KEY `forfeit_employee` (`idemployee`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_product` (`idseller`),
  ADD KEY `producttype_product` (`idprotype`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_producttype` (`idtype`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_rating` (`idseller`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_seller` (`idseller`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `shipfeeseller`
--
ALTER TABLE `shipfeeseller`
  ADD PRIMARY KEY (`id`),
  ADD KEY `county_shipfeeseller` (`idCounty`),
  ADD KEY `seller_shipfeeseller` (`idseller`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emailtemplates`
--
ALTER TABLE `emailtemplates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penalize`
--
ALTER TABLE `penalize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `county_bill` FOREIGN KEY (`countyname`) REFERENCES `county` (`id`),
  ADD CONSTRAINT `new_bill` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `user_bill` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`);

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `bill_detail_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `product_detail_bill` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `role_employees` FOREIGN KEY (`idrole`) REFERENCES `role` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `product_new` FOREIGN KEY (`idproduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `penalize`
--
ALTER TABLE `penalize`
  ADD CONSTRAINT `forfeit_employee` FOREIGN KEY (`idemployee`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `forfeit_seller` FOREIGN KEY (`idseller`) REFERENCES `seller` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `producttype_product` FOREIGN KEY (`idprotype`) REFERENCES `producttype` (`id`),
  ADD CONSTRAINT `seller_product` FOREIGN KEY (`idseller`) REFERENCES `seller` (`id`);

--
-- Constraints for table `producttype`
--
ALTER TABLE `producttype`
  ADD CONSTRAINT `type_producttype` FOREIGN KEY (`idtype`) REFERENCES `type` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `supplier_rating` FOREIGN KEY (`idseller`) REFERENCES `seller` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_seller` FOREIGN KEY (`idseller`) REFERENCES `seller` (`id`);

--
-- Constraints for table `shipfeeseller`
--
ALTER TABLE `shipfeeseller`
  ADD CONSTRAINT `county_shipfeeseller` FOREIGN KEY (`idCounty`) REFERENCES `county` (`id`),
  ADD CONSTRAINT `seller_shipfeeseller` FOREIGN KEY (`idseller`) REFERENCES `seller` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

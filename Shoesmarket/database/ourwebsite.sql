-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 08:12 AM
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
  `idbill` int(11) NOT NULL,
  `idnews` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `total` float NOT NULL,
  `address` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'địa chỉ nhận',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ghi chú'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idseller` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`id`, `name`, `value`) VALUES
(1, '5 %', 0.05),
(2, '9 %', 0.09),
(3, '10 %', 10),
(4, '15 %', 0.15);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`) VALUES
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
(24, '	Huyện Cần Giờ');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `idemployee` int(11) NOT NULL,
  `idrole` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`idemployee`, `idrole`, `username`, `password`, `name`, `email`, `address`, `phone`) VALUES
(1, 1, 'admin', '123456', 'Bảo', 'lvbao.cnntt.sgu@gmail.com', 'thành phố hồ chí minh', '01656500786'),
(2, 3, 'quanlykhang', '123456', 'Khang', 'ngduykhang@gmail.com', 'thành phố hồ chí minh', '01234567895'),
(3, 2, 'nhanvien', '123456', 'Vân', 'vandom123@gmail.com', 'Cà Mau', '01524225554');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `idseller` int(11) DEFAULT NULL,
  `idprotype` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_meta` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `price_promotion` decimal(10,0) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iddiscount` int(11) DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`id`, `idtype`, `name`, `namemeta`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'giày Converse ', 'giay-Converse ', 'Cái tên Converse tuy quen tai ở Việt Nam từ hơn một thập kỷ đổ lại đây, nhưng trên thế giới thì tuổi thọ của thương hiệu này đã lên đến hơn cả một thế kỷ', '2017-10-16 05:46:26', '2017-10-16 05:46:26'),
(2, 4, 'NaBo', 'nabo', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2017-10-15 22:46:33', '2017-10-15 23:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `idrating` int(11) NOT NULL,
  `idseller` int(11) DEFAULT NULL,
  `onestar` int(11) NOT NULL DEFAULT '0',
  `twostar` int(11) NOT NULL DEFAULT '0',
  `threestar` int(11) NOT NULL DEFAULT '0',
  `fourstar` int(11) NOT NULL DEFAULT '0',
  `fivestar` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idrole`, `name`) VALUES
(1, 'admin'),
(2, 'nhanvien'),
(3, 'quanly');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `idseller` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newsquantity` int(11) NOT NULL DEFAULT '0',
  `isVip` int(1) NOT NULL DEFAULT '1' COMMENT '0 là vip 1 là khong phai vip',
  `isblock` int(1) NOT NULL DEFAULT '1' COMMENT '0 là acive 1 là block',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`idseller`, `name`, `username`, `password`, `address`, `phone`, `email`, `identification`, `newsquantity`, `isVip`, `isblock`, `created_at`, `updated_at`) VALUES
(1, 'Le van A', 'mrA', '', '273 An Dương Vương , quận 5 ,TP Hồ chí minh ', '01657421638', 'FNV@gmail.com', '1746603451', 0, 0, 1, '2017-10-27 09:32:19', '2017-10-27 09:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `namemeta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ten khong dau',
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `namemeta`, `description`) VALUES
(1, 'giày thể thao', 'giay-the-thao', 'Giày thể thao là tên chung dành cho các loại được thiết kế chủ yếu dành cho các hoạt động thể thao, nhưng trong các năm gần đây, giày thể thao được sử dụng trong các hoạt động hàng ngày.'),
(2, 'giày thời trang', 'giay-thoi-trang', 'Chúng ta đã thưởng thức rất nhiều những gợi ý về xu hướng giày thời trang Xuân Hè 2017, nơi những đôi giày được được thiết kế dạng dây đan với nhau, liên kết với phần cấu trúc bên dưới và chúng được kết hợp với vớ, dù là vớ dài hoặc hở gót chúng đều phù hợp .'),
(3, 'giày da', 'giay-da', 'Khi nói đến da hầu hết mọi người đều nghĩ rằng chúng ta đang đề cập đến da bò, nhưng thật ra nó có thể là bất kì loại da động vật nào đã trải qua quá trình thuộc để tạo thành chất liệu cuối cùng (gọi chung là Da).\r\nDa thuộc của bê non thì vẫn gọi là da bê đơn giản bởi vì da thuộc đó được làm từ con bê.'),
(4, 'giày boot', 'giay-boot', 'Giày có cổ cao , đa dạng về màu sắc cũng nhưng size , phù hợp vs người trẻ tuổi .');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remerber_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isblock` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `fullname`, `phone`, `address`, `email`, `username`, `password`, `remerber_token`, `isblock`, `created_at`, `updated_at`) VALUES
(3, 'Bao', 'Lê Văn Bảo', '01656500786', 'THHCM', 'lvbao96@gmail.com', 'haithanhf', '', NULL, 0, '2017-10-14 09:17:56', '2017-10-15 22:00:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idbill`),
  ADD KEY `new_bill` (`idnews`),
  ADD KEY `user_bill` (`iduser`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_comments` (`idseller`),
  ADD KEY `customer_comments` (`iduser`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_bill` (`idproduct`),
  ADD KEY `bill_detail_bill` (`idbill`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`idemployee`),
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD KEY `seller_product` (`idseller`),
  ADD KEY `producttype_product` (`idprotype`),
  ADD KEY `discount_product` (`iddiscount`);

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
  ADD PRIMARY KEY (`idrating`),
  ADD KEY `supplier_rating` (`idseller`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`idseller`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `idbill` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `idemployee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `idrating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `idseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `new_bill` FOREIGN KEY (`idnews`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `user_bill` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `customer_comments` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`),
  ADD CONSTRAINT `seller_comments` FOREIGN KEY (`idseller`) REFERENCES `seller` (`idseller`);

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `bill_detail_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`idbill`),
  ADD CONSTRAINT `product_detail_bill` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `role_employees` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `product_new` FOREIGN KEY (`idproduct`) REFERENCES `product` (`idproduct`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `discount_product` FOREIGN KEY (`iddiscount`) REFERENCES `discount` (`id`),
  ADD CONSTRAINT `producttype_product` FOREIGN KEY (`idprotype`) REFERENCES `producttype` (`id`),
  ADD CONSTRAINT `seller_product` FOREIGN KEY (`idseller`) REFERENCES `seller` (`idseller`);

--
-- Constraints for table `producttype`
--
ALTER TABLE `producttype`
  ADD CONSTRAINT `type_producttype` FOREIGN KEY (`idtype`) REFERENCES `type` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `supplier_rating` FOREIGN KEY (`idseller`) REFERENCES `seller` (`idseller`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

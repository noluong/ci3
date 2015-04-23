-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 01:47 AM
-- Server version: 5.5.39
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `photo` varchar(225) NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `com` varchar(225) NOT NULL,
  `number_view` int(11) NOT NULL,
  `priority` int(10) unsigned NOT NULL DEFAULT '1',
  `is_special` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `photo`, `thumb`, `title`, `title_seo`, `summary`, `content`, `keywords`, `description`, `com`, `number_view`, `priority`, `is_special`, `is_active`, `created`, `updated`) VALUES
(1, 4, 'vay-tin-dung-theo-luong.jpg', '', 'Vay theo bảng lương', 'vay-theo-bang-luong', 'Vay theo bảng lương không cần giấy tạm trú', '<p>Yêu cầu:</p>\r\n\r\n<p>*  Nam/Nữ từ 20 – 60 tuổi<br />\r\n*  Có thu nhập từ 3tr/tháng  trở lên<br />\r\n*  Đang sống và làm việc ở TPHCM, Bình Dương, Đồng Nai, Long An, Tiền Giang ...· </p>\r\n\r\n<p> Hồ sơ :</p>\r\n\r\n<p><strong>1/  Hộ khẩu photo (nguyên cả quyển )</strong></p>\r\n\r\n<p><strong>2/  CMND photo</strong></p>\r\n\r\n<p><strong>3/  Hợp đồng lao động photo</strong></p>\r\n\r\n<p><strong>4/  Phiếu lương 3 tháng gần nhất có mộc của công ty. (nếu nhận tiền qua thẻ ATM) sao kê 3 tháng lương gần nhất có mộc ngân hàng</strong></p>\r\n\r\n<p><strong>5/  1 tấm ảnh 3×4</strong></p>\r\n\r\n<p><strong>LƯU Ý: KHÔNG CẦN GIẤY TẠM TRÚ </strong></p>\r\n', 'Vay theo bảng lương không cần giấy tạm trú', 'Vay theo bảng lương không cần giấy tạm trú', 'consumer', 0, 1, 0, 1, '2015-04-18 17:44:17', '2015-04-20 23:04:11'),
(2, 4, 'vay-theo-bao-hiem-nhan-tho.jpg', '', 'Vay theo bảo hiểm nhân thọ', 'vay-theo-bao-hiem-nhan-tho', 'Vay theo bảo hiểm nhân thọ', '<p>Yêu cầu:</p>\r\n\r\n<h1>*  Nam/Nữ từ 20 – 60 tuổi<br />\r\n*  Đang sống và làm việc ở TPHCM, Bình Dương, Đồng Nai, Long An, Tiền Giang ...·   </h1>\r\n\r\n<h1>Hồ sơ :</h1>\r\n\r\n<p><strong>1/  Hộ khẩu photo (nguyên cả quyển )</strong></p>\r\n\r\n<p><strong>2/  CMND photo</strong></p>\r\n\r\n<p><strong>3/  Hợp đồng bảo hiểm photo</strong></p>\r\n\r\n<p><strong>4/  Phiếu đóng phí bảo hiểm 2 kì gần nhất photo</strong></p>\r\n\r\n<p><strong>5/  1 tấm ảnh 3×4</strong></p>\r\n', 'Vay theo bảo hiểm nhân thọ', 'Vay theo bảo hiểm nhân thọ', 'consumer', 0, 2, 0, 1, '2015-04-18 17:44:17', '2015-04-19 17:23:58'),
(3, 4, 'vay-tieu-dung-theo-hoa-don-tien-dien.jpg', '', 'Vay theo hóa đơn điện', 'vay-theo-hoa-don-dien', 'Vay theo hóa đơn điện', '<p>fdfgdsghsfgh</p>\r\n', 'Vay theo hóa đơn điện', 'Vay theo hóa đơn điện', 'consumer', 0, 3, 0, 1, '2015-04-18 18:08:53', '2015-04-19 17:24:14'),
(4, 4, 'vay-theo-ho-kinh-doanh-ca-the.jpg', '', 'Vay theo hộ kinh doanh cá thể', 'vay-theo-ho-kinh-doanh-ca-the', 'Vay theo hộ kinh doanh cá thể', '<p>Yêu cầu:</p>\r\n\r\n<h1>*  Nam/Nữ từ 20 – 60 tuổi</h1>\r\n\r\n<h1>*  Đang sống và làm việc ở TPHCM, Bình Dương, Đồng Nai, Long An, Tiền Giang ...·   </h1>\r\n\r\n<h1>Hồ sơ :</h1>\r\n\r\n<p><strong>     1/  Hộ khẩu photo ( nguyên cả quyển )</strong></p>\r\n\r\n<p><strong>     2/  CMND photo</strong></p>\r\n\r\n<p><strong>     3/  Giấy phép kinh doanh photo</strong></p>\r\n\r\n<p><strong>     4/  1 tấm ảnh 3×4</strong></p>\r\n', 'Vay theo hộ kinh doanh cá thể', 'Vay theo hộ kinh doanh cá thể', 'consumer', 0, 4, 0, 1, '2015-04-18 18:26:18', '2015-04-19 17:24:24'),
(5, 4, 'vay-tin-chap-tieu-dung.jpg', '', 'Vay theo tín chấp tiêu dùng khác', 'vay-theo-tin-chap-tieu-dung-khac', 'Vay theo tín chấp tiêu dùng khác', '<p>Yêu cầu:</p>\r\n\r\n<h1>Nam/Nữ từ 20 – 60 tuổi</h1>\r\n\r\n<h1>Đang sống và làm việc ở TPHCM, Bình Dương, Đồng Nai, Long An, Tiền Giang ...·   </h1>\r\n\r\n<h1>Hồ sơ :</h1>\r\n\r\n<p><strong>1/  Hộ khẩu photo ( nguyên cả quyển )</strong></p>\r\n\r\n<p><strong>2/  CMND photo</strong></p>\r\n\r\n<p><strong>3/  Hợp đồng tín dụng photo</strong></p>\r\n\r\n<p><strong>4/  1 tấm ảnh 3×4</strong></p>\r\n', 'Vay theo tín chấp tiêu dùng khác', 'Vay theo tín chấp tiêu dùng khác', 'consumer', 0, 5, 0, 1, '2015-04-18 18:26:51', '2015-04-19 17:24:34'),
(6, 6, '', '', 'Tư vấn vay tín dụng tiêu dùng', 'tu-van-vay-tin-dung-tieu-dung', 'Tư vấn vay tín dụng tiêu dùng', '<p>Tư vấn vay tín dụng tiêu dùng</p>\r\n', 'Tư vấn vay tín dụng tiêu dùng', 'Tư vấn vay tín dụng tiêu dùng', 'advisory', 0, 1, 0, 1, '2015-04-19 16:51:20', '2015-04-20 23:05:09'),
(7, 5, 'vay-tieu-dung-theo_luong.jpg', '', 'Giới thiệu VPBank Online, nhận quà liền tay', 'gioi-thieu-vpbank-online-nhan-qua-lien-tay', 'Từ nay đến 30/6/2015, VPBank triển khai chương trình “Trải kiệm Online – nối dài bạn hữu” với nhiều ưu đãi hấp dẫn dành tặng cho khách hàng giới thiệu dịch vụ ngân hàng trực tuyến VPBank Online và VPBank Mobile cho bạn bè.', '<p>Từ nay đến 30/6/2015, VPBank triển khai chương trình “Trải kiệm Online – nối dài bạn hữu” với nhiều ưu đãi hấp dẫn dành tặng cho khách hàng giới thiệu dịch vụ ngân hàng trực tuyến VPBank Online và VPBank Mobile cho bạn bè. </p>\r\n\r\n<p>Theo đó, với mỗi lần giới thiệu thành công, VPBank sẽ tặng ngay tiền mặt lên đến 30.000 VNĐ vào tài khoản cuả người giới thiệu và người được giới thiệu, cùng 12 tháng miễn phí sử dụng VPBank Online và VPBank Mobile cho khách hàng mới. </p>\r\n\r\n<p>Đặc biệt, chương trình không giới hạn số lần nhận thưởng. 100 khách hàng đầu tiên giới thiêụ thành công dịch vụ cho 30 người bạn của mình sẽ nhận thêm phần thưởng tiền mặt 200.000 VNĐ. </p>\r\n\r\n<p><strong>Để tham gia chương trình, khách hàng làm theo hướng dẫn sau: </strong></p>\r\n\r\n<p>Bước 1: Đăng nhập VPBank Online và VPBank Mobile để nhận Mã giới thiệu (MGT). Mỗi khách hàng sẽ có một MGT duy nhất và không trùng lặp. </p>\r\n\r\n<p>Bước 2:  Chia sẻ và giới thiệu cho bạn bè đăng ký dịch vụ VPBank Online, VPBank Mobile và mã MTG của bạn. </p>\r\n\r\n<p>Bước 3: Với mỗi lần người được giới thiệu nhập mã MGT của quý khách vào màn hình “Nhập mã người giới thiệu” trong lần đăng nhập dịch vụ đầu tiên, quý khách sẽ được ghi nhận tặng tiền. </p>\r\n\r\n<p>Bước 4: Quà tặng tiền mặt sẽ ngay lập tức được chuyển vào tài khoản của quý khách và người bạn được giới thiệu. </p>\r\n', 'Giới thiệu VPBank Online, nhận quà liền tay asdf ', 'Giới thiệu VPBank Online, nhận quà liền tay sdf ', 'news', 0, 1, 1, 1, '2015-04-19 12:57:40', '2015-04-20 23:59:37'),
(10, 0, '', '', 'vay tín dụng tiêu dùng', 'vay-tin-dung-tieu-dung', 'Bài viết vay tín dụng tiêu dùng', '<p>Bài viết vay tín dụng tiêu dùng</p>\r\n', 'Bài viết vay tín dụng tiêu dùng', 'Bài viết vay tín dụng tiêu dùng', 'tieudung', 0, 1, 0, 1, '2015-04-21 00:32:27', '2015-04-21 00:37:44');

-- --------------------------------------------------------

--
-- Table structure for table `news_list`
--

CREATE TABLE IF NOT EXISTS `news_list` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `com` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_list`
--

INSERT INTO `news_list` (`id`, `title`, `title_seo`, `priority`, `is_active`, `com`, `created`, `updated`) VALUES
(1, 'Khuyến măĩ', 'Khuyến măĩ', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hotline` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `analytics` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `keywords`, `description`, `company_name`, `email`, `phone`, `hotline`, `address`, `map`, `analytics`, `created`, `updated`) VALUES
(1, 'Vay tín dụng tiêu dùng', 'Vay tín dụng tiêu dùng', 'Vay tín dụng tiêu dùng', 'Vay tín dụng tiêu dùng', 'noluong@gmail.com', '0902499473', '0902499473', '211/17 Hoàng Hoa Thám - P5- Phú Nhuận - TPHCM', '10.802824, 106.647522', 'test test', '2015-04-18 00:00:00', '2015-04-21 01:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
`id` int(10) unsigned NOT NULL,
  `photo` varchar(225) NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_seo` varchar(255) NOT NULL,
  `link` varchar(225) NOT NULL,
  `com` varchar(225) NOT NULL,
  `priority` int(10) unsigned NOT NULL DEFAULT '1',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `photo`, `thumb`, `title`, `title_seo`, `link`, `com`, `priority`, `is_active`, `created`, `updated`) VALUES
(2, 'vay-thu-tuc-don-gian-vpbank1.jpg', '', '', '', 'http://google.com', '', 2, 1, '2015-04-20 23:42:49', '2015-04-20 23:56:59'),
(3, 'slider-vay-tieu-dung-moi-doi-tuong-vpbank1.jpg', '', '', '', 'http://google.com', '', 1, 1, '2015-04-20 23:44:16', '2015-04-20 23:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) unsigned NOT NULL COMMENT 'primary key',
  `mail_address` varchar(255) NOT NULL COMMENT 'member mail_address login',
  `password` varchar(255) NOT NULL COMMENT 'member password',
  `name` varchar(255) NOT NULL COMMENT 'member name',
  `role` enum('normal','master') NOT NULL DEFAULT 'normal',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: deavtive, 1:active',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mail_address`, `password`, `name`, `role`, `is_active`, `created`, `updated`) VALUES
(1, 'noluong@gmail.com', '$2y$10$CpiWCdkuN2BxjQoil2WoJOBmSDr1T6TctJYnXzf9hiLoosUyDGSU.', 'Lương thị trung nở', 'master', 1, '2015-04-12 00:00:00', '2015-04-15 21:08:36'),
(2, 'kemdaupt135@gmail.com', '$2y$10$CpiWCdkuN2BxjQoil2WoJOBmSDr1T6TctJYnXzf9hiLoosUyDGSU.', 'Lương thị trung nở', 'master', 1, '2015-04-12 00:00:00', '2015-04-12 00:00:00'),
(3, 'admin@gmail.com', '$2y$10$CpiWCdkuN2BxjQoil2WoJOBmSDr1T6TctJYnXzf9hiLoosUyDGSU.', 'Administrator', 'master', 1, '2015-04-12 00:00:00', '2015-04-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_list`
--
ALTER TABLE `news_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news_list`
--
ALTER TABLE `news_list`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'primary key',AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

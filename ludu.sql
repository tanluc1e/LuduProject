CREATE DATABASE ludu;
use ludu;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `user_name` varchar(12) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `admins` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '123456');

--
-- Set password hash
--

UPDATE admins
SET password = MD5(password);

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `pname` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `catname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(1, 'Fruit'),
(2, 'Flower'),
(3, 'Packaging');

CREATE TABLE `order_detail` (
  `orderid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `adres` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date_order` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `pname` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pdescription` longtext COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `product` (`id`, `categoryid`, `pname`, `pdescription`, `image`, `price`) VALUES
(1, 1, 'Xoài Úc', 'Cây xoài Úc có nguồn gốc từ Australia, giống xoài Úc ở tỉnh Khánh Hoà là giống xoài ghép với tổ hợp lai gốc ghép địa phương xoài Canh Nông với mắt ghép xoài R2E2 du nhập từ Úc', '../Ludu/images/product/xoai.jpg', 100),
(2, 1, 'Táo Mỹ', 'Tại Mỹ, táo Envy được trồng chủ yếu tại tiểu bang Washington. - Giống táo này có quả to tròn, vỏ màu đỏ điểm thêm các sọc màu vàng, thịt giòn, ngọt, thơm đã trở thành giống táo cao cấp nhất, đặc biệt táo Envy khi cắt ra vẫn giữ được màu trắng không bị thâm như những loại táo khác.', '../Ludu/images/product/tao.jpg', 100),
(3, 1, 'Nho Mỹ', 'Nho đen không hạt Mỹ được nhập khẩu từ Mỹ quả thon dài màu đen sẫm, không hạt và rất ngọt. Nho đen không hạt Mỹ nhìn sang trọng lịch sự và thường được dùng làm quà biếu.', '../Ludu/images/product/nho.jpg', 140),
(4, 1, 'Dưa hấu Nhật Bản', 'Những quả dưa hấu đặc biệt này có xuất xứ từ Tottori, một tỉnh nằm ở vùng Chugoku trên đảo Honshu, Nhật Bản.', '../Ludu/images/product/duahau.jpg', 200),
(5, 1, 'Cherry đỏ Canada', 'Trái Cherry là loại trái cây nhập khẩu sạch, rất ngon miệng và có giá trị dinh dưỡng rất cao. Do đó giá bán Cherry thường không rẻ nên trái Cherry thường được dùng làm quà biếu, quà tặng Tết.', '../Ludu/images/product/chery.webp', 85),
(6, 1, 'Dưa Lưới Vàng', 'Giống dưa lưới vàng có nguồn gốc từ Tân Cương, Trung Quốc có các vết lưới màu trắng đan xen với nhau, hiện rõ trên vỏ dưa. Đối với dưa Việt Nam, khi chín lưới chằng chịt hơn.', '../Ludu/images/product/dualuoi.jpg', 170),
(7, 2, 'Bó Hoa Hồng', 'Hoa hồng luôn được gắn liền với một tình yêu cháy bỏng, nồng nàn hay nét đẹp kiêu sa, quyến rũ. Tuy nhiên, hoa hồng còn được biết đến như biểu tượng của tình mẫu tử thiêng liêng. Bó hoa hồng tình yêu rực rỡ tặng mẹ trong những ngày lễ đặc biệt sẽ là món quà tuyệt vời thay lời cảm ơn chân thành của bạn đến “đấng sinh thành”.', '../Ludu/images/product/hoahong.jpg', 300),
(8, 2, 'Bó Hoa Tulip', 'Hoa Tulip tượng trưng cho sự nổi tiếng, giàu có và tình yêu hoàn hảo. Có lẽ vì nó nở vào mùa xuân, khi bóng tối của những ngày đông đã bị xóa nhòa, Tulip còn trở thành biểu tượng cho cuộc sống vĩnh hằng.', '../Ludu/images/product/hoatulip.jpg', 255),
(9, 2, 'Bó Hoa Hướng Dương', 'Hoa hướng dương tượng trưng cho sự đáng yêu, trung thành và trường thọ. Phần lớn ý nghĩa của hoa hướng dương bắt nguồn từ chính cái tên của nó, chính là mặt trời - một biểu tượng mãnh liệt của sự sống.', '../Ludu/images/product/hoahuongduong.jpg', 210),
(10, 2, 'Bó Hoa Ly', 'Hoa Ly từ lâu đã được mệnh danh là một loài hoa thanh cao và quý phái, nó không những tượng trưng cho sắc đẹp, đức hạnh mà còn là sự kiêu hãnh và cả tình yêu cao thượng, chung thủy. Chính bởi vậy, hoa Ly không chỉ thích hợp để dành tặng mẹ, người yêu mà còn rất thích hợp cho ngày chúc mừng, tốt nghiệp, khai trương...', '../Ludu/images/product/hoaly.jpeg', 205),
(11, 2, 'Bó Hoa Cẩm Chướng', 'Hoa cẩm chướng cũng có nhiều ý nghĩa rất hay. Hãy cùng tìm hiểu nhé. Ý nghĩa chung: Sự ái mộ - Sự thôi miên, quyến rũ - Tình yêu của phụ nữ - Niềm tự hào - Sắc đẹp - Tình yêu trong sáng và sâu đậm, thiết tha. Hoa cẩm chướng vàng: Sự từ chối, sự khinh thường, thất vọng, hối hận.', '../Ludu/images/product/hoacamchuong.jpg', 240),
(12, 2, 'Bó Hoa Đồng Tiền', 'Trong những dịp xuân về tết đến, hoa đồng tiền mang trên mình ý nghĩa tài lộc và may mắn. Từ xa xưa, mọi người tin rằng vào ngày Tết nếu có một chậu hoa đồng tiền trong nhà sẽ giúp gia chủ làm ăn phát đạt, gặp nhiều thành công. Bên cạnh đó, nó còn giúp hoá giải điềm xấu và mang lại vận may cho gia chủ.', '../Ludu/images/product/hoadongtien.jpeg', 190),
(13, 3, 'Túi Gói Hoa (CPP)', NULL, '../Ludu/images/product/baobi_1.png', 30),
(14, 3, 'Túi Gói Hoa (OPP - Đen)', NULL, '../Ludu/images/product/baobi_2.png', 32),
(15, 3, 'Túi Gói Hoa (OPP - Hồng)', NULL, '../Ludu/images/product/baobi_3.png', 30);

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_mail` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

INSERT INTO `users` (`id`, `user_mail`, `user_name`, `password`, `date`, `address`, `phone`) VALUES
(1, 'tanluc1@gmail.com', 'tanluc1', '123456', '2022-6-20 17:00:44', 'Nha Trang', 0362015200);
INSERT INTO `users` (`id`, `user_mail`, `user_name`, `password`, `date`, `address`, `phone`) VALUES
(2, 'tanluc2@gmail.com', 'tanluc2', '12345678', '2022-6-20 17:00:44', 'Sai Gon', 0362015211);
INSERT INTO `users` (`id`, `user_mail`, `user_name`, `password`, `date`, `address`, `phone`) VALUES
(3, 'theduy1@gmail.com', 'theduy1', '123456', '2022-6-20 17:20:44', 'Hue', 0362015288);
INSERT INTO `users` (`id`, `user_mail`, `user_name`, `password`, `date`, `address`, `phone`) VALUES
(4, 'theduy2@gmail.com', 'theduy2', '1234567', '2022-6-20 17:10:44', 'Ha Noi', 0362015299);

UPDATE users
SET password = MD5(password);

ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);


ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderid`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `user_mail` (`user_mail`);

ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

ALTER TABLE `order_detail`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 03:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terket`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `image`, `link`, `status`) VALUES
(3, 'iPad Gen 8', 'ipad8.png', 'http://localhost/terket/', 'active'),
(5, 'iPhone 12 Pro Max', 'iphone12promax.png', 'http://localhost/terket/', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'apple', 'active'),
(2, 'Samsung', 'active'),
(3, 'xiaomi', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `brand_id`, `item_name`, `description`, `image`, `price`, `stock`, `status`) VALUES
(5, 1, 'iPad Gen 8 2020', '<p>iPad baru memadukan kemampuan luar biasa dengan kemudahan penggunaan dan fleksibilitas yang tak tertandingi. Dengan chip A12 Bionic yang andal, dukungan untuk Apple Pencil dan Smart Keyboard, dan berbagai hal hebat yang bisa Anda lakukan dengan iPadOS 14, kini semakin banyak alasan untuk menyukai iPad.</p>', 'ipad8.png', 7299000, 6, 'active'),
(6, 1, 'iPhone 12 Pro Max', '<p>iPhone 12 Pro Max. Layar Super Retina XDR 6,7 inci yang lebih besar.1 Ceramic Shield dengan ketahanan jatuh empat kali lebih baik.2 Fotografi pencahayaan rendah yang menakjubkan dengan sistem kamera Pro terbaik di iPhone, dan rentang zoom optik 5x. Mampu merekam, mengedit, dan memutar video sekelas sinema dengan Dolby Vision. Potret mode Malam dan pengalaman AR di level berikutnya dengan LiDAR Scanner. Chip A14 Bionic yang andal. Dan aksesori MagSafe baru untuk kemudahan pemasangan dan pengisian daya nirkabel yang lebih cepat.3 Untuk berjuta kemungkinan spektakuler.</p>', 'iphone12promax.png', 17799000, 12, 'active'),
(7, 1, 'Apple Watch 6', '<p>Apple Watch Series 6 memungkinkan Anda mengukur kadar oksigen darah dengan sensor dan aplikasi baru yang revolusioner.1 Pantau detak jantung Anda. Lihat metrik kebugaran Anda pada layar Retina Selalu Aktif yang disempurnakan, kini 2,5 kali lebih terang di luar ruang ketika pergelangan Anda tak terangkat. Atur rutinitas waktu tidur dan pantau tidur Anda. Jawab panggilan dan pesan langsung dari pergelangan tangan Anda. Perangkat canggih untuk hidup yang lebih sehat, lebih aktif, dan lebih terhubung.</p>', 'applewatch6.png', 7399000, 5, 'active'),
(8, 1, 'Airpods Pro', '<p>AirPods Pro adalah satu-satunya headphone in-ear dengan Peredam Kebisingan Aktif yang terus beradaptasi dengan telinga Anda dan pas dikenakan &mdash; mencegah suara luar agar Anda dapat fokus pada apa yang sedang Anda dengarkan. Mikrofon hadap luar mendeteksi suara dari luar. AirPods Pro menghalaunya dengan anti-bising equalizer, mencegah suara luar masuk ke dalam. Mikrofon hadap dalam mendengarkan suara yang tidak diinginkan di dalam telinga Anda, dan juga dihilangkan dengan anti-kebisingan. Pencegahan kebisingan terus melakukan penyesuaian 200 kali per detik untuk menghadirkan suara yang benar-benar impresif, sehingga Anda dapat menikmati musik, podcast, dan panggilan dengan optimal.</p>', 'airpodspro.png', 3899000, 5, 'active'),
(9, 2, 'Samsung Galaxy S21+ Ultra 5G', '<p>Introducing Galaxy S21 Ultra 5G. Designed with a unique contour-cut camera to create a revolution in photography &mdash; letting you capture cinematic 8K video and snap epic stills, all in one go. And with Galaxy&#39;s fastest chipset, strongest glass, 5G and an all-day battery, Ultra easily lives up to its name.</p>', 'samsungs21ultra5g.png', 9599000, 8, 'active'),
(10, 2, 'Samsung Tab S7', '<p><strong>The beauty in simplicity</strong></p><p>Enjoy the sleekness of the Galaxy Tab S7 FE 5G in your hands. The simple, unibody design looks refined with the minimal camera housing on the rear, and the slim form factor keeps your grip comfortable. In your choice of four iconic colors: Mystic Black, Mystic Silver, Mystic Green and Mystic Pink.</p>', 'samsungtabs7.png', 9499000, 3, 'active'),
(11, 2, 'Samsung Galaxy Watch 4', '<p>Most of us want to know more about ourselves, so we can be the best version of ourselves. That&#39;s why we engineered the all-new Galaxy Watch4 to be the companion to your journey towards a healthier you.&nbsp;<a href=\"https://www.samsung.com/id/watches/galaxy-watch/galaxy-watch4-pink-gold-bluetooth-sm-r860nzdaxse/#desc-section\">1</a></p>', 'galaxywatch4.png', 2999000, 6, 'active'),
(12, 3, 'Mi Smartband 6', '<p>Berkat layar AMOLED berukuran besar yang pertama kali disematkan pada varian ini, kamu bisa menggunakan gambar orang tercinta, hewan peliharaan, atau karya seni favoritmu sebagai latar belakang layar. Setiap kali melirik pergelangan tangan, harimu jadi makin berwarna.</p>', 'mismartband6.png', 599000, 12, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `transaction_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`transaction_id`, `item_id`, `quantity`, `price`) VALUES
(13, 7, 1, 7399000),
(13, 8, 2, 3899000),
(15, 11, 2, 2999000),
(16, 12, 4, 599000),
(17, 7, 1, 7399000),
(20, 9, 1, 9599000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_confirmation`
--

CREATE TABLE `payment_confirmation` (
  `confirmation_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`, `price`, `status`) VALUES
(1, 'Sumatera Utara', 36000, 'active'),
(3, 'DKI Jakarta', 3000, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `province_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `province_id`, `name`, `phone_number`, `address`, `transaction_date`, `status`) VALUES
(13, 2, 1, 'Customer 2', '083652147890', 'Jalan contoh 123A', '2021-09-05 11:20:37', 2),
(15, 2, 1, 'Customer 2', '083652147890', 'Jalan street', '2021-09-05 14:34:28', 0),
(16, 4, 3, 'Customer 4', '086532417890', 'Jalan sana deket sini', '2021-09-05 16:30:21', 2),
(17, 2, 1, 'Customer 2', '083652147891', 'Jalan', '2021-09-06 10:29:39', 0),
(20, 3, 3, 'Customer 3', '083652147890', 'jln', '2021-09-06 11:09:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `address`, `phone_number`, `password`, `status`) VALUES
(1, 'admin', 'admin@terket.com', 'Cokro Street, Medan, Indonesia', '081234567890', '$2y$10$goNATQFVP6DlfAcuQpNJ2eHE0zc5LyJPcZj6LUpzZcY3g7sfh/3zq', 'active'),
(2, 'Customer 1', 'cust@gmail.com', 'Diponegoro Street, Medan, North Sumatra, Indonesia', '083652147890', '$2y$10$ryu8Mw3B1gykXJNCM9YIweS1NpUpfvjw1bwvdjgvQX/4DGB2YvepW', 'active'),
(3, 'Customer 3', 'cust3@gmail.com', 'Over There street', '08967452130', '$2y$10$PYzac1xrkElAi/OYvPJT0Ofqzi5sO.yoCYkXL6THhGG2mcE3E8Uv.', 'active'),
(4, 'Customer 4', 'cust4@gmail.com', 'Street there', '03652147890', '$2y$10$VSebFSaItZ7YTc.PUy4RQuYNy5vOqxsijv0LmdfNwd8QD.ql3qH2S', 'active'),
(5, 'Test User', 'user@gmail.com', 'South Sumatra Street', '03652147890', '$2y$10$XdD/iALESE8VZ6QOvV7SZeqHffNk3ARhPsM9P6IuzWUk.SrFuzWva', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_user_fk` (`user_id`),
  ADD KEY `cart_item_fk` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_fk` (`brand_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD KEY `order_item_item_fk` (`item_id`),
  ADD KEY `order_item_transaction_id` (`transaction_id`);

--
-- Indexes for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD PRIMARY KEY (`confirmation_id`),
  ADD KEY `payment_confirmation_fk` (`transaction_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `transaction_province_fk` (`province_id`),
  ADD KEY `transaction_user_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  MODIFY `confirmation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_item_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_fk` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_item_fk` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_transaction_id` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_confirmation`
--
ALTER TABLE `payment_confirmation`
  ADD CONSTRAINT `payment_confirmation_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_province_fk` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 10:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storeIAS`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO gallery (id, image) VALUES
(2, 'w2.jpg'),
(3, 'w3.jpg'),
(4, 'w4.jpg'),
(5, 'w5.jpg'),
(6, 'w6.jpg'),
(7, 'w7.jpg'),
(8, 'w8.jpg'),
(9, 'w9.jpg'),
(11, 'w10.jpg'),
(12, 'w11.jpg'),
(13, 'w12.jpg'),
(14, 'w13.jpg');
-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `phone`, `message`) VALUES
(2, 3, 'sat', 'satria@gmail.com', 888, 'nice'),
(3, 4, 'bar', 'akbar@gmail.com', 833, 'good'),
(4, 6, 'nu', 'ibnu@gmail.com', 883, 'woah'),
(5, 8, 'git', 'agirka@gmail.com', 881, 'hmm'),
(6, 10, 'le', 'leonardi@gmail.com', 821, 'Trash');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO orders (id, user_id, name, number, email, method, address, total_products, total_price, placed_on, payment_status) VALUES
(1, 7, 'akbar', '11111', 'akbar@gmail.com', 'cash or duel', 'jkt', '1', 99999, '2026-08-29', 'pending'),
(9, 4, 'ibnu gay', '22222', 'ibnugay@gmail.com', 'paytm', 'jkt', '1', 7995000, '2027-09-02', 'pending'),
(10, 4, 'satria', '33333', 'satria@gmail.com', 'paytm', 'bdg', '1', 705000, '2028-09-02', 'pending'),
(11, 4, 'test', '12345', 'test@gmail.com', 'paytm', 'jkt', '1', 75000, '2029-09-02', 'pending'),
(12, 4, 'test', '123456', 'test@gmail.com', 'paytm', 'jkt', '1', 75000, '2030-09-02', 'pending'),
(13, 4, 'test', '12345', 'test@gmail.com', 'cash on delivery', 'jkt', '1', 75000, '1923-09-02', 'completed'),
(14, 4, 'test', '12345', 'test@gmail.com', 'paytm', 'jkt', '1', 75000, '1975-09-02', 'completed'),
(15, 4, 'test', '12345', 'test@gmail.com', 'paytm', 'jkt', '1', 75000, '1999-09-02', 'completed');
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO products (id, name, details, price, image_01) VALUES
(10, 'p wanita 1', 'good', 99.999, 'p-wanita-1.png'),
(11, 'p wanita 2', 'good', 199.999, 'p-wanita-2.png'),
(13, 'p wanita 3', 'good', 299.999, 'p-wanita-3.png'),
(15, 'p pria 1', 'good', 399.999, 'p-pria-1.png'),
(16, 'p pria 2', 'good', 499.999, 'p-pria-2.png'),
(17, 'p pria 3', 'good', 599.999, 'p-pria-3.png'),
(18, 'cosplay', 'good', 999.999, 'cosplay.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, 'satria_baja-hitam', 'satria@gmail.com', '$2y$10$4F7F0Cs9YwQl/Dc94Tb8duVEeJqrw02XAzWy5ZFUNiujDoMH7LDGa', 1, 1, 1693290624),
(4, 'ibnu', 'ibnu@gmail.com', '$2y$10$4F7F0Cs9YwQl/Dc94Tb8duVEeJqrw02XAzWy5ZFUNiujDoMH7LDGa', 2, 1, 1693290653),
(11, 'dodi', 'dodi@gmail.com', '$2y$10$LFPIfkdxDEgW9B7PHP2HHuRQLt17C9rPKmcOs9EXx9pIl0eRA4e3u', 1, 1, 1693315004),
(12, 'yohanes', 'yohanes@gmail.com', '$2y$10$30eH0bsC7du33aUG/801r.vZmQhvi80.IGFWLLjAdlRCXc2BeF1mm', 1, 1, 1723711211),
(13, 'Yohanes2', 'yohanes2@gmail.com', '$2y$10$WGBndXbhmO8BaKeOBNkyQuEvn6tniob.vxVQiNjrUZDwa14BGpXoK', 2, 1, 1723711459),
(14, 'satria_baja-hitam', 'satria1@admin.com', '$2y$10$k9AghH4UHuC1FD3aTq31WOJXZWxgGzlBcVY4ExYe272ww0CB7gz4q', 1, 1, 1693305797),
(15, 'admin2', 'admin@gmail.com', '$2y$10$LiCzyCPNXZeVO6df0YlkL.fS50FZ.ICWC4YF/KG41wVbSn.kZUddK', 2, 1, 1725024752),
(16, 'akbar', 'akbar@gmail.com', '$2y$10$KX2RxIrk2t/cjwi9TV38IOu2WtKHTmu0yrH/dIn0HYXFggHb/ZOn2', 2, 1, 1725024752);

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
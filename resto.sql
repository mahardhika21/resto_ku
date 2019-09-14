-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 02:40 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_token`
--

CREATE TABLE `api_token` (
  `id_api` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(250) NOT NULL,
  `status_token` varchar(15) NOT NULL,
  `experied_time` datetime NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_token`
--

INSERT INTO `api_token` (`id_api`, `id_user`, `token`, `status_token`, `experied_time`, `insert_at`) VALUES
(1, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1bmlxdWVJZCI6IjEiLCJyb2xlIjoia2FzaXIiLCJ0aW1lU3RhbXAiOiIyMDE5LTA5LTE0IDEwOjEyOjIxIn0.Miyqwb2-KRwGe_VxaJgXQgLhfg2VQAY6nJcekqnD-v8', 'true', '2019-09-14 13:12:21', '2019-09-14 08:12:21'),
(2, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMSIsInJvbGUiOiJrYXNpciIsInRpbWVTdGFtcCI6IjIwMTktMDktMTQgMTA6MTk6NTYiLCJleHBlcmllZF90aW1lIjoiMjAxOS0wOS0xNCAxMzoxOTo1NiJ9.Pyj5-mgy0Uv7DOv_J5hd2rqLhEKcdKa4WWNQm9s-Kqg', 'true', '2019-09-14 13:19:56', '2019-09-14 08:19:56'),
(3, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMSIsInJvbGUiOiJrYXNpciIsInRpbWVTdGFtcCI6IjIwMTktMDktMTQgMTA6NTE6MDEiLCJleHBlcmllZF90aW1lIjoiMjAxOS0wOS0xNCAxMzo1MTowMSJ9.AWfrbhuuMp_HmoKJeFCLgY9J9WXdzq9UOX47HXRT7lA', 'true', '2019-09-14 13:51:01', '2019-09-14 08:51:01'),
(4, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoiMSIsInJvbGUiOiJrYXNpciIsInRpbWVTdGFtcCI6IjIwMTktMDktMTQgMDM6NTM6NDYiLCJleHBlcmllZF90aW1lIjoiMjAxOS0wOS0xNCAxODo1Mzo0NiJ9.wIYL3WBf6xMfG3PzFNjjAZ56vFW9Y0dvi5agbZBKT5Q', 'true', '2019-09-14 18:53:47', '2019-09-14 08:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `detail_reservation`
--

CREATE TABLE `detail_reservation` (
  `id_detai` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `name_menu` varchar(250) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `desc_reserv` text NOT NULL,
  `det_price` decimal(10,0) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `insert_by` varchar(15) NOT NULL,
  `updated_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_reservation`
--

INSERT INTO `detail_reservation` (`id_detai`, `id_reservation`, `name_menu`, `id_menu`, `desc_reserv`, `det_price`, `insert_at`, `updated_at`, `insert_by`, `updated_by`) VALUES
(1, 4, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-13 16:42:24', '0000-00-00 00:00:00', 'waiter01', ''),
(24, 13, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:17:07', '0000-00-00 00:00:00', 'kasir01', ''),
(25, 13, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:17:07', '0000-00-00 00:00:00', 'kasir01', ''),
(26, 13, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:17:07', '0000-00-00 00:00:00', 'kasir01', ''),
(27, 13, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:17:07', '0000-00-00 00:00:00', 'kasir01', ''),
(28, 13, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:17:07', '0000-00-00 00:00:00', 'kasir01', ''),
(34, 5, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:25:50', '0000-00-00 00:00:00', 'waiter01', ''),
(35, 5, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:25:50', '0000-00-00 00:00:00', 'waiter01', ''),
(36, 5, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:25:50', '0000-00-00 00:00:00', 'waiter01', ''),
(37, 6, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:26:33', '0000-00-00 00:00:00', 'waiter01', ''),
(38, 6, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:26:33', '0000-00-00 00:00:00', 'waiter01', ''),
(39, 6, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 11:26:34', '0000-00-00 00:00:00', 'waiter01', ''),
(40, 12, 'steak ayam', 8, 'makanan', '21000', '2019-09-14 12:06:13', '0000-00-00 00:00:00', 'waiter01', ''),
(41, 12, 'es jeruk', 6, 'minuman', '5000', '2019-09-14 12:06:13', '0000-00-00 00:00:00', 'waiter01', ''),
(42, 13, 'steak ayam', 8, 'makanan', '21000', '2019-09-14 12:07:06', '0000-00-00 00:00:00', 'waiter01', ''),
(48, 14, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 12:23:06', '0000-00-00 00:00:00', 'waiter01', ''),
(49, 15, 'Nasi Ayam Kecap', 5, 'makanan', '18000', '2019-09-14 12:29:07', '0000-00-00 00:00:00', 'waiter01', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(11) NOT NULL,
  `title_logs` varchar(15) NOT NULL,
  `desc_logs` text NOT NULL,
  `url_logs` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id_logs`, `title_logs`, `desc_logs`, `url_logs`, `id_user`, `insert_at`) VALUES
(1, 'login user', 'user admin login system', '/home/backend/login', 2, '2019-09-13 00:36:48'),
(2, 'login user', 'user admin login system', '/home/backend/login', 2, '2019-09-13 04:23:33'),
(3, 'login user', 'user admin login system', '/home/backend/login', 2, '2019-09-13 06:02:23'),
(4, 'update data men', 'admin admin meperbarui data menu Nasi Ayam Kecap', '/home/backend/update_data_menu', 2, '2019-09-13 11:24:12'),
(5, 'update data men', 'admin admin meperbarui data menu Nasi Ayam Kecap', '/admin/backend/update_data_menu', 2, '2019-09-13 11:58:25'),
(6, 'update data pro', 'user level admin dengan username admin melakukan memperbarui profile', '/admin/backend/update_data_menu', 2, '2019-09-13 11:59:44'),
(7, 'update data pro', 'user level admin dengan username admin melakukan memperbarui profile', '/admin/backend/update_data_menu', 2, '2019-09-13 11:59:47'),
(8, 'login user', 'user waiter login system', '/admin/backend/login', 3, '2019-09-13 12:21:03'),
(9, 'update data pro', 'user level waiter dengan username waiter01 melakukan memperbarui profile', '/admin/backend/update_data_menu', 3, '2019-09-13 12:47:54'),
(10, 'update data pro', 'user level waiter dengan username waiter01 melakukan memperbarui profile', '/admin/backend/update_data_menu', 3, '2019-09-13 12:56:26'),
(11, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-13 17:58:21'),
(12, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 00:17:50'),
(13, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 06:56:05'),
(14, 'login api', ' user kasir login ', '/api/LoginToken', 1, '2019-09-14 08:51:01'),
(15, 'login api', ' user kasir login ', '/api/LoginToken', 1, '2019-09-14 08:53:46'),
(16, 'access api deta', 'kasir access detail menu', '/api/detail', 1, '2019-09-14 08:56:07'),
(17, 'access api deta', 'kasir access detail menu', '/api/detail', 1, '2019-09-14 08:56:42'),
(18, 'access api deta', 'kasir access detail menu', '/api/detail', 1, '2019-09-14 08:57:16'),
(19, 'access api deta', 'kasir access detail menu', '/api/detail', 1, '2019-09-14 08:58:03'),
(20, 'access api deta', 'kasir access detail menu', '/api/detail', 1, '2019-09-14 08:58:41'),
(21, 'update data pro', 'user level kasir dengan username kasir01 melakukan memperbarui profile', '/admin/backend/update_data_menu', 1, '2019-09-14 09:04:10'),
(22, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 11:22:31'),
(23, 'login user', 'user waiter login system', '/admin/backend/login', 3, '2019-09-14 11:22:44'),
(24, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 11:52:37'),
(25, 'login user', 'user admin login system', '/admin/backend/login', 2, '2019-09-14 11:57:14'),
(26, 'insert data men', 'admin admin memasukan data menu es jeruk', '/admin/backend/insert_data_menu', 2, '2019-09-14 11:59:38'),
(27, 'insert data men', 'admin admin memasukan data menu es alpukatt', '/admin/backend/insert_data_menu', 2, '2019-09-14 12:02:25'),
(28, 'update data men', 'admin admin meperbarui data menu es alpukat', '/admin/backend/update_data_menu', 2, '2019-09-14 12:02:35'),
(29, 'insert data men', 'admin admin memasukan data menu steak ayam', '/admin/backend/insert_data_menu', 2, '2019-09-14 12:04:34'),
(30, 'update data men', 'admin admin meperbarui data menu es alpukat', '/admin/backend/update_data_menu', 2, '2019-09-14 12:04:45'),
(31, 'update data men', 'admin admin meperbarui data menu es alpukat', '/admin/backend/update_data_menu', 2, '2019-09-14 12:05:07'),
(32, 'update data men', 'admin admin meperbarui data menu es alpukat', '/admin/backend/update_data_menu', 2, '2019-09-14 12:05:20'),
(33, 'update data men', 'admin admin meperbarui data menu es alpukat', '/admin/backend/update_data_menu', 2, '2019-09-14 12:05:35'),
(34, 'login user', 'user waiter login system', '/admin/backend/login', 3, '2019-09-14 12:05:55'),
(35, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 12:10:44'),
(36, 'login user', 'user waiter login system', '/admin/backend/login', 3, '2019-09-14 12:20:08'),
(37, 'paymen data', 'kasir waiter01 melakukan proses pembayaran pesanan dengan id pemesanan ERP09142019-003', '/admin/backend/ajax_delete_menu', 3, '2019-09-14 12:20:25'),
(38, 'update data res', 'admin waiter01 meperbarui data menu ', '/admin/backend/update_data_menu', 3, '2019-09-14 12:22:03'),
(39, 'update data res', 'admin waiter01 meperbarui data menu ', '/admin/backend/update_data_menu', 3, '2019-09-14 12:22:09'),
(40, 'update data res', 'admin waiter01 meperbarui data pemesanan dengan id14', '/admin/backend/update_data_menu', 3, '2019-09-14 12:23:06'),
(41, 'update data res', 'admin waiter01 meperbarui data pemesanan dengan id14', '/admin/backend/update_data_menu', 3, '2019-09-14 12:23:06'),
(42, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 12:26:34'),
(43, 'login user', 'user waiter login system', '/admin/backend/login', 3, '2019-09-14 12:28:15'),
(44, 'insert data res', 'user waiter waiter01 memasukan data reservation dengan nomorERP09142019-004', '/waiter/backend/insert_reservation', 3, '2019-09-14 12:29:07'),
(45, 'login user', 'user kasir login system', '/admin/backend/login', 1, '2019-09-14 12:29:20'),
(46, 'paymen data', 'kasir kasir01 melakukan proses pembayaran pesanan dengan id pemesanan 15', '/admin/backend/ajax_delete_menu', 1, '2019-09-14 12:29:47'),
(47, 'paymen data', 'kasir kasir01 melakukan proses pembayaran pesanan dengan id pemesanan 15', '/admin/backend/ajax_delete_menu', 1, '2019-09-14 12:33:52'),
(48, 'paymen data', 'kasir kasir01 melakukan proses pembayaran pesanan dengan id pemesanan 14', '/kasir/backend/ajax_payment', 1, '2019-09-14 12:38:59'),
(49, 'print laporan', 'user kasir01 melakukan print lapoaran', '/base/reservation_report', 1, '2019-09-14 12:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `name_menu` varchar(250) NOT NULL,
  `desc_menu` text NOT NULL,
  `type_menu` varchar(15) NOT NULL,
  `price_menu` decimal(10,0) NOT NULL,
  `img_menu` varchar(250) NOT NULL,
  `status_menu` varchar(15) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `insert_by` varchar(15) NOT NULL,
  `updated_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `desc_menu`, `type_menu`, `price_menu`, `img_menu`, `status_menu`, `insert_at`, `updated_at`, `insert_by`, `updated_by`) VALUES
(5, 'Nasi Ayam Kecap', '- dadasdcccd', 'makanan', '18000', '/assets/img/menu/nasi-ayam-hainan1.jpg', 'true', '2019-09-13 11:58:25', '2019-09-13 13:58:25', 'admin', 'admin'),
(6, 'es jeruk', '- es jeruk segar', 'minuman', '5000', '/assets/img/menu/5073465_883456c2-4b44-41f6-b654-d3ad4b172b28_700_700.jpg', 'true', '2019-09-14 11:59:37', '0000-00-00 00:00:00', 'admin', ''),
(7, 'es alpukat', '- es alpukat segar', 'makanan', '8500', '/assets/img/menu/es-alpukat-kocok-foto-resep-utama1.jpg', 'false', '2019-09-14 12:05:35', '2019-09-14 14:05:35', 'admin', 'admin'),
(8, 'steak ayam', '- steak ayam nikmat', 'makanan', '21000', '/assets/img/menu/photo.jpg', 'true', '2019-09-14 12:04:33', '0000-00-00 00:00:00', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `reservation_number` varchar(15) NOT NULL,
  `chair_reserv` varchar(250) NOT NULL,
  `amount_resev` decimal(10,0) NOT NULL,
  `status_resev` varchar(15) NOT NULL,
  `list_reserv` text,
  `pay_amount` decimal(10,0) NOT NULL,
  `change_amount` decimal(10,0) NOT NULL,
  `id_user` int(11) NOT NULL,
  `updated_by` varchar(17) DEFAULT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `reservation_number`, `chair_reserv`, `amount_resev`, `status_resev`, `list_reserv`, `pay_amount`, `change_amount`, `id_user`, `updated_by`, `insert_at`, `updated_at`) VALUES
(4, 'ERP09132019-001', '12', '18000', 'canceled', '', '0', '0', 3, NULL, '2019-09-14 00:54:58', '0000-00-00 00:00:00'),
(5, 'ERP09132019-002', '132w', '54000', 'canceled', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 12:12:08', '0000-00-00 00:00:00'),
(6, 'ERP09132019-003', '141', '54000', 'complete', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '55000', '1000', 3, 'kasir01', '2019-09-14 11:26:33', '0000-00-00 00:00:00'),
(7, '', '14', '36000', '', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 11:11:37', '0000-00-00 00:00:00'),
(8, '', '14', '36000', '', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 11:12:25', '0000-00-00 00:00:00'),
(9, '', '14', '54000', '', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 11:12:38', '0000-00-00 00:00:00'),
(10, '', '13', '54000', '', '<li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li><li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 11:12:55', '0000-00-00 00:00:00'),
(11, '', '13', '18000', '', '<li>Nasi Ayam Kecap</li>', '0', '0', 1, NULL, '2019-09-14 11:13:14', '0000-00-00 00:00:00'),
(12, 'ERP09142019-001', '13', '26000', 'complete', '<li>steak ayam</li><li>es jeruk</li>', '28000', '2000', 3, 'kasir01', '2019-09-14 12:11:08', '0000-00-00 00:00:00'),
(13, 'ERP09142019-002', '12', '21000', 'complete', '<li>steak ayam</li>', '21000', '0', 3, 'kasir01', '2019-09-14 12:11:57', '0000-00-00 00:00:00'),
(14, 'ERP09142019-003', '22', '18000', 'complete', '<li>Nasi Ayam Kecap</li>', '20000', '2000', 3, 'kasir01', '2019-09-14 12:38:59', '0000-00-00 00:00:00'),
(15, 'ERP09142019-004', '123', '18000', 'complete', '<li>Nasi Ayam Kecap</li>', '18000', '0', 3, 'kasir01', '2019-09-14 12:33:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `status_user` varchar(15) NOT NULL,
  `register_by` varchar(15) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `username`, `password`, `level`, `phone`, `status_user`, `register_by`, `insert_at`, `updated_at`) VALUES
(1, 'naruto1', 'kasir01', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kasir', '083867859130', 'true', 'root', '2019-09-14 09:04:10', '0000-00-00 00:00:00'),
(2, 'admin', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', '1232313', 'true', '', '2019-09-13 11:59:44', NULL),
(3, 'rotan', 'waiter01', 'f242b6e2fc09b48085192a7403e10499dbd80f44', 'waiter', '123231', 'true', '', '2019-09-13 12:47:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_token`
--
ALTER TABLE `api_token`
  ADD PRIMARY KEY (`id_api`);

--
-- Indexes for table `detail_reservation`
--
ALTER TABLE `detail_reservation`
  ADD PRIMARY KEY (`id_detai`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_logs`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_token`
--
ALTER TABLE `api_token`
  MODIFY `id_api` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detail_reservation`
--
ALTER TABLE `detail_reservation`
  MODIFY `id_detai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id_logs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

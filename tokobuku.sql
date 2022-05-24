-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 09:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `fullname`, `email`) VALUES
(47, 'aldi', 'aldi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(500) NOT NULL,
  `release_year` varchar(5) NOT NULL,
  `pages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` decimal(3,0) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `description`, `release_year`, `pages`, `price`, `discount`, `stock`) VALUES
(1, 'horor', 'seram', '2020', 12, 200000, '1', 7),
(15, 'MIU', 'miu book', '2004', 100, 80000, '10', 51);

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_author_id`, `author_id`, `book_id`) VALUES
(1, 47, 1),
(14, 47, 15);

-- --------------------------------------------------------

--
-- Table structure for table `book_bookcat`
--

CREATE TABLE `book_bookcat` (
  `book_bookcat_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_bookcat`
--

INSERT INTO `book_bookcat` (`book_bookcat_id`, `book_id`, `book_category_id`) VALUES
(2, 1, 1),
(13, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `book_category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`book_category_id`, `name`) VALUES
(1, 'horor');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_member` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `no_member`, `gender`, `phone`, `address`) VALUES
(135, 'aldi', 'aldi@gmail.com', '08218189', 'male', '88978', 'jl.kaliurang'),
(136, 'andre', 'andre@gmail.com', '08127345', 'male', '38282', 'jl.sejati');

-- --------------------------------------------------------

--
-- Table structure for table `d_pembelian`
--

CREATE TABLE `d_pembelian` (
  `d_pembelian_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `buy_price_pcs` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `d_penjualan`
--

CREATE TABLE `d_penjualan` (
  `d_penjualan_id` int(11) NOT NULL,
  `id_masker` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `total_price` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_penjualan`
--

INSERT INTO `d_penjualan` (`d_penjualan_id`, `id_masker`, `amount`, `total_price`, `penjualan_id`) VALUES
(1, 1, 1, 198000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `nip`, `password`, `name`, `gender`, `phone`, `email`, `address`, `level_id`) VALUES
(1, '123456', '$2y$10$ZN0I4u5syv2GT3qhloUJEeCLFV9rpTMm.Kt4N3FUOT/RUYcr5rF7K', 'admin', 'Laki-laki', '85820051165', 'admin@gmail.com', 'jl.barbarsari', 1),
(2, '102341', '$2y$10$hZC1irjs4FMitKRy/ePVDuFmUmIlhICBJC0LsGoyBMrWdggoZxFHK', 'Siweb', 'Laki-laki', '123123123123', 'pel@gmail.com', 'asdas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `name`) VALUES
(1, 'Admin'),
(2, 'Supplier'),
(3, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `masker`
--

CREATE TABLE `masker` (
  `id_masker` int(11) NOT NULL,
  `nama_masker` varchar(30) NOT NULL,
  `harga_masker` int(11) NOT NULL,
  `stok_masker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `name`, `email`, `gender`, `phone`, `address`) VALUES
(2, 'admin', 'admin@gmail.com', 'Wanita', '123123123123', 'Jl.Masuka 2'),
(3, 'Frans Siregar', 'Fransiskus351@gmail.com', 'Pria', '85820051165', 'jl.barbarsari'),
(7, 'Siweb', 'frans123@gmail.com', 'Pria', '089012345832', 'jl.barbarsari'),
(8, 'ipo', 'ipo@gmail.com', 'Pria', '02380218301', 'jl.masdfas');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `pembelian_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `kode_beli` varchar(50) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `buy_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `kode_jual` varchar(50) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `sale_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `kode_jual`, `pelanggan_id`, `id_user`, `sale_date`) VALUES
(1, 'PNJ000000001', 136, 52, '2022-05-19 21:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'agus', 'agus@gmail.com', '08981890', 'jl.medan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `level_id`) VALUES
(20, 'Frans Siregar', 'frans@gmail.com', '$2y$10$ZciTzzZR4OVQwP40osBEaOa9XnQ7Kp3curye4K8Cxv1mrncevqWlC', 1),
(21, 'pelanggan', 'pelanggan@gmail.com', '$2y$10$y9GIY0blCXseab0i6SixgeWEpDDSWNQ8ODFAjm7aEQeARVnlMJD7u', 3),
(22, 'Opep Siregar', 'opep@gmail.com', '$2y$10$E8P2glIrKgiY2DmZUHRDRupjA4pDx/W4m/.q5lsxayTHJwfkLs8hi', 1),
(23, 'Admin Masker Maulana', 'admin@gmail.com', '$2y$10$M7tlSbhoDB4RjgEREdJCIeTLATKVw9ykJwfdKwj9IjFgF.pfxXt0G', 1),
(24, 'Supplier', 'sup@gmail.com', '$2y$10$lT0yMI4Cya.quYkQH5PQ.eu.I0Eb5pIAMtzIxa5e8qZHV/5UBEE8a', 2),
(26, 'igo', 'igo@gmail.com', '$2y$10$vZ9Smt0M5ERo/qbj7xFukOZZzsuzMUC8ulsYBDTJGBU84NPekZXoG', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`book_author_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_bookcat`
--
ALTER TABLE `book_bookcat`
  ADD PRIMARY KEY (`book_bookcat_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`book_category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  ADD PRIMARY KEY (`d_pembelian_id`);

--
-- Indexes for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  ADD PRIMARY KEY (`d_penjualan_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `masker`
--
ALTER TABLE `masker`
  ADD PRIMARY KEY (`id_masker`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`pembelian_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `penjualan_ibfk_1` (`id_user`),
  ADD KEY `customer_id` (`pelanggan_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `book_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_bookcat`
--
ALTER TABLE `book_bookcat`
  MODIFY `book_bookcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `book_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1249;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `d_pembelian`
--
ALTER TABLE `d_pembelian`
  MODIFY `d_pembelian_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d_penjualan`
--
ALTER TABLE `d_penjualan`
  MODIFY `d_penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `masker`
--
ALTER TABLE `masker`
  MODIFY `id_masker` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `pembelian_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_author`
--
ALTER TABLE `book_author`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

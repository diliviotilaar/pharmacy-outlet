-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 11:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `product_name`, `product_price`, `id`) VALUES
('vio', 'Antiprestin 20mg', 60000, 144),
('vio', 'Vitacimin Vitamin C 500mg', 3000, 145),
('vio', 'Vitacimin Vitamin C 500mg', 3000, 146),
('vio', 'Praxion Paracetamol', 28000, 147);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `username` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`username`, `product_name`, `product_price`, `status`, `id`, `date`) VALUES
('vio', 'Amoxicillin Trihydrate 500mg', 6000, 'selesai', 131, '2023-05-24 10:35:34'),
('vio', 'Vitacimin Vitamin C 500mg', 3000, 'dikirim', 132, '2023-05-24 10:35:34'),
('vio', 'Amoxicillin Trihydrate 500mg', 6000, 'selesai', 137, '2023-05-24 10:58:52'),
('vio', 'Vitacimin Vitamin C 500mg', 3000, 'dikirim', 138, '2023-05-24 11:06:23'),
('vio', 'Dumin Parasetamol', 10000, 'selesai', 139, '2023-05-24 11:06:23'),
('vio', 'Setraline 50mg', 40000, 'diproses', 140, '2023-05-24 11:09:46'),
('vio', 'Amoxicillin Trihydrate 500mg', 6000, 'diproses', 141, '2023-05-24 11:31:25'),
('vio', 'Paracetamol 500mg', 2500, 'dikirim', 142, '2023-05-24 11:31:25'),
('vio', 'Cefadroxil 500mg', 17000, 'selesai', 143, '2023-05-24 11:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('admin', 'admin'),
('juan', 'juan'),
('chris', 'chris'),
('vio', 'vio'),
('yori', 'yori'),
('guest', 'guest'),
('petra', 'petra');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `product_price`, `kategori`, `id`) VALUES
('Amoxicillin Trihydrate 500mg', 6000, 'Antibiotik', 1),
('Vitacimin Vitamin C 500mg', 3000, 'Vitamin', 2),
('Setraline 50mg', 40000, 'Antidepressan', 3),
('Paracetamol 500mg', 2500, 'Antipiretik', 4),
('Ibuprofen 200mg', 71000, 'Antiinflamasi', 5),
('Cefadroxil 500mg', 17000, 'Antibiotik', 6),
('Cefixime 200mg', 150000, 'Antibiotik', 7),
('Dohixat', 5900, 'Antibiotik', 8),
('Tetrasiklin 500mg', 148500, 'Antibiotik', 9),
('Alprazolam 1mg', 160000, 'Antidepressan', 10),
('Amitriptyline 10 mg', 18000, 'Antidepressan', 11),
('Antiprestin 20mg', 60000, 'Antidepressan', 13),
('Stablon', 107000, 'Antidepressan', 14),
('Blackmores Vitamin D3', 147500, 'Vitamin', 15),
('EsterC', 72500, 'Vitamin', 16),
('Imboost Vitamin C', 26000, 'Vitamin', 17),
('VitalongC', 32500, 'Vitamin', 18),
('Dumin Parasetamol', 10000, 'Antipiretik', 19),
('Praxion Paracetamol', 28000, 'Antipiretik', 20),
('Propyrethic Paracetamol', 54000, 'Antipiretik', 21),
('Sanmol Paracetamol', 1650, 'Antipiretik', 22),
('Arcoxia 90mg', 190000, 'Antiinflamasi', 23),
('Dexaharsen 0,5', 1722, 'Antiinflamasi', 24),
('Lameson 8mg', 58000, 'Antiinflamasi', 25),
('Mefenamat 500mg', 15000, 'Antiinflamasi', 26),
('Triamcinolone 4mg', 150000, 'Antiinflamasi', 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

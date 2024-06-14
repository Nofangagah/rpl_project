-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 13.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CNAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CNAME`) VALUES
(0, 'Sparepart'),
(1, 'Accesories'),
(2, 'Gasoline'),
(3, 'Motherboard'),
(4, 'Processor'),
(5, 'Power Supply'),
(6, 'Headset'),
(7, 'CPU'),
(9, 'Others');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `CUST_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`CUST_ID`, `FIRST_NAME`, `LAST_NAME`, `PHONE_NUMBER`) VALUES
(9, 'Hailee', 'Steinfield', '09394566543'),
(11, 'A Walk in Customer', NULL, NULL),
(14, 'Chuchay', 'Jusay', '09781633451'),
(15, 'Kimbert', 'Duyag', '09956288467'),
(16, 'Dieqcohr', 'Rufino', '09891344576'),
(18, 'amba', 'tukam', '6969696'),
(19, 'asu', 'sila', '1111'),
(20, 'novan', 'tukam', '12342212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employee`
--

CREATE TABLE `employee` (
  `EMPLOYEE_ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `GENDER` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL,
  `JOB_ID` int(11) DEFAULT NULL,
  `HIRED_DATE` varchar(50) NOT NULL,
  `LOCATION_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `employee`
--

INSERT INTO `employee` (`EMPLOYEE_ID`, `FIRST_NAME`, `LAST_NAME`, `GENDER`, `EMAIL`, `PHONE_NUMBER`, `JOB_ID`, `HIRED_DATE`, `LOCATION_ID`) VALUES
(1, 'Bang', 'Jarwo', 'Male', 'admin@gmail.com', '0123456789', 1, '0000-00-00', 113),
(2, 'Josuey', 'Mag-asos', 'Male', 'jmagaso@yahoo.com', '09091245761', 2, '2019-01-28', 156),
(4, 'Monica', 'Empinado', 'Female', 'monicapadernal@gmail.com', '09123357105', 1, '2019-03-06', 158),
(6969, 'novan', 'gagah', 'male', 'blablabla@gmail.com', '12345678', 1, '20-11-2003', 156);

-- --------------------------------------------------------

--
-- Struktur dari tabel `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_TITLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_TITLE`) VALUES
(1, 'Manager'),
(2, 'Cashier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `LOCATION_ID` int(11) NOT NULL,
  `PROVINCE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`LOCATION_ID`, `PROVINCE`, `CITY`) VALUES
(111, 'Jawa Timur', 'Surabaya'),
(112, 'Negros Occidental', 'Bacolod City'),
(113, 'Daerah Istimewa Yogyakarta', 'S'),
(114, 'Daerah Istimewa Yogyakarta', 'Sleman'),
(115, 'DKI Jakarta', 'Jakarta Selatan'),
(116, 'Jawa Tengah', 'Semarang'),
(126, 'Negros Occidental', 'Binalbagan'),
(130, 'Cebu', 'Bogo City'),
(131, 'Negros Occidental', 'Himamaylan'),
(132, 'Negros', 'Jupiter'),
(133, 'Aincrad', 'Floor 91'),
(134, 'negros', 'binalbagan'),
(135, 'hehe', 'tehee'),
(136, 'PLANET YEKOK', 'KOKEY'),
(137, 'Camiguin', 'Catarman'),
(138, 'Camiguin', 'Catarman'),
(139, 'Negros Occidental', 'Binalbagan'),
(140, 'Batangas', 'Lemery'),
(141, 'Capiz', 'Panay'),
(142, 'Camarines Norte', 'Labo'),
(143, 'Camarines Norte', 'Labo'),
(144, 'Camarines Norte', 'Labo'),
(145, 'Camarines Norte', 'Labo'),
(146, 'Capiz', 'Pilar'),
(147, 'Negros Occidental', 'Moises Padilla'),
(148, 'a', 'a'),
(149, '1', '1'),
(150, 'Negros Occidental', 'Himamaylan'),
(151, 'Masbate', 'Mandaon'),
(152, 'Aklanas', 'Madalagsasa'),
(153, 'Batangas', 'Mabini'),
(154, 'Bataan', 'Morong'),
(155, 'Jawa Barat', 'Bandung'),
(156, 'Negros Occidental', 'Bacolod'),
(157, 'Camarines Norte', 'Labo'),
(158, 'Negros Occidental', 'Binalbagan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager`
--

CREATE TABLE `manager` (
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `manager`
--

INSERT INTO `manager` (`FIRST_NAME`, `LAST_NAME`, `LOCATION_ID`, `EMAIL`, `PHONE_NUMBER`) VALUES
('Erick', 'Cesar', 113, 'admin@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_CODE` varchar(20) NOT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `DESCRIPTION` varchar(250) NOT NULL,
  `QTY_STOCK` int(50) DEFAULT NULL,
  `ON_HAND` int(250) NOT NULL,
  `PRICE` int(50) DEFAULT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `SUPPLIER_ID` int(11) DEFAULT NULL,
  `DATE_STOCK_IN` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`PRODUCT_ID`, `PRODUCT_CODE`, `NAME`, `DESCRIPTION`, `QTY_STOCK`, `ON_HAND`, `PRICE`, `CATEGORY_ID`, `SUPPLIER_ID`, `DATE_STOCK_IN`, `image`) VALUES
(1, '20191001', 'baut', 'tes', 1, 1, 32999, 0, 11, '20-2-2022', ''),
(33, '11', 'knapot', 'mbeer parah ni', 1, 1, 150000, 2, 11, '20024-02-06', ''),
(34, '88', 'lampu', 'lampu motor', 2, 1, 1000, 9, 16, '20-2-2022', 'lampu.jpg'),
(36, '11', 'bang gagah', 'wkwk', 1, 1, 2, 2, 16, '2024-10-22', ''),
(37, '00', 'test', 'test', 1, 1, 1, 9, 15, '2022-02-01', ''),
(44, '11', 'AHM oil', 'oli brand ahm', 1, 1, 100000, 7, 11, '2024-05-30', ''),
(45, '11', 'AHM oil', 'oli brand ahm', 1, 1, 100000, 7, 11, '2024-05-30', ''),
(46, '88', 'a', 'a', 1, 1, 1, 6, 15, '1111-11-11', ''),
(47, '00', 'test', 'tambha test', 1, 1, 1000, 9, 11, '2024-02-02', ''),
(48, '00', 'test', 'tambha test', 1, 1, 1000, 9, 11, '2024-02-02', ''),
(49, '00', 'test', 'tambha test', 1, 1, 1000, 9, 11, '2024-02-02', ''),
(50, '00', 'test', 'tambha test', 1, 1, 1000, 9, 11, '2024-02-02', ''),
(51, '00', 'test', 'tambha test', 1, 1, 1000, 9, 11, '2024-02-02', ''),
(52, '100', 'novan gagah', 'ahha', 1, 1, 100000, 1, 12, '1111-11-11', ''),
(53, '100', 'novan gagah', 'ahha', 1, 1, 100000, 1, 12, '1111-11-11', ''),
(54, '100', 'novan gagah', 'ahha', 1, 1, 100000, 1, 12, '1111-11-11', ''),
(55, '100', 'novan gagah', 'ahha', 1, 1, 100000, 1, 12, '1111-11-11', ''),
(56, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(57, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(58, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(59, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(60, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(61, '00', 'test', 'test', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(62, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(63, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(64, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(65, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(66, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(67, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(68, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(69, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(70, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(71, '69', 'testing', 'tes', 1, 1, 1000, 9, 11, '1111-11-11', ''),
(72, '200191001', 'baut', 'baut', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(73, '200191001', 'baut', 'baut', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(74, '200191001', 'baut', 'baut', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(75, '200191001', 'baut', 'baut', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(76, '200191001', 'baut', 'baut', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(77, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(78, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(79, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(80, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(81, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(82, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(83, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(84, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(85, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(86, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(87, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', ''),
(88, '200191001', 'baut', 'dd', 1, 1, 32999, 0, 11, '2222-02-22', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `trans_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`, `transaction_id`, `trans_detail_id`) VALUES
(1, 33, 3, 10000, '2024-05-17', 20, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `SUPPLIER_ID` int(11) NOT NULL,
  `COMPANY_NAME` varchar(50) DEFAULT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `PHONE_NUMBER` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`SUPPLIER_ID`, `COMPANY_NAME`, `LOCATION_ID`, `PHONE_NUMBER`) VALUES
(11, 'Astra Honda Motor (AHM)', 114, '0823456789'),
(12, 'Global Petro America', 115, '09635877412'),
(13, 'Suzuki Genuie Part (SGP)', 111, '09587855685'),
(15, 'Mandiri Corp', 116, '09124033805'),
(16, 'Kawasaki Parts', 155, '09775673257');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `TRANS_ID` int(50) NOT NULL,
  `CUST_ID` int(11) DEFAULT NULL,
  `NUMOFITEMS` varchar(250) NOT NULL,
  `SUBTOTAL` varchar(50) NOT NULL,
  `LESSVAT` varchar(50) NOT NULL,
  `NETVAT` varchar(50) NOT NULL,
  `ADDVAT` varchar(50) NOT NULL,
  `GRANDTOTAL` varchar(250) NOT NULL,
  `CASH` varchar(250) NOT NULL,
  `DATE` varchar(50) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `tax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`, `tax`) VALUES
(3, 16, '3', '456,982.00', '48,962.36', '408,019.64', '48,962.36', '456,982.00', '500000', '2019-03-19', '0318160336', 0),
(4, 11, '2', '1,967.00', '210.75', '1,756.25', '210.75', '1,967.00', '2000', '2019-03-18', '0318160622', 0),
(5, 14, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2019-03-18', '0318170309', 0),
(6, 15, '1', '77,850.00', '8,341.07', '69,508.93', '8,341.07', '77,850.00', '80000', '2019-03-18', '0318170352', 0),
(7, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170511', 0),
(8, 16, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170524', 0),
(9, 14, '1', '1,718.00', '184.07', '1,533.93', '184.07', '1,718.00', '2000', '2019-03-18', '0318170551', 0),
(10, 11, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '500', '2019-03-18', '0318170624', 0),
(11, 9, '2', '1,148.00', '123.00', '1,025.00', '123.00', '1,148.00', '2000', '2019-03-18', '0318170825', 0),
(12, 9, '1', '5,500.00', '589.29', '4,910.71', '589.29', '5,500.00', '6000', '2019-03-18 19:40 pm', '0318194016', 0),
(13, 11, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2022-07-14 14:12 pm', '0714141333', 0),
(14, 16, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1000', '2022-07-14 15:54 pm', '0714155515', 0),
(15, 11, '2', '1,128.00', '120.86', '1,007.14', '120.86', '1,128.00', '1128', '2022-07-14 16:08 pm', '0714160904', 0),
(16, 9, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2022-07-14 16:10 pm', '0714161034', 0),
(17, 11, '1', '859.00', '92.04', '766.96', '92.04', '859.00', '900', '2024-05-15 14:29 pm', '0515142950', 0),
(18, 11, '1', '1,000.00', '107.14', '892.86', '107.14', '1,000.00', '900', '2024-05-17 05:55 am', '051781217', 0),
(19, 14, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550', '2024-05-17 10:15 am', '0517101604', 0),
(20, 14, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '289', '2024-05-17 10:16 am', '0517101624', 0),
(21, 16, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '289', '2024-05-18 11:08 am', '0518110856', 0),
(24, 18, '4', '100', '20', '100', '100', '100', '100', '2024-5-19', '0714141333', 0),
(25, 16, '2', '839.00', '89.89', '749.11', '89.89', '839.00', '1000', '2024-05-21 11:56 am', '0521115626', 0),
(26, 19, '1', '150,000.00', '16,071.43', '133,928.57', '16,071.43', '150,000.00', '1500000', '2024-05-21 12:02 pm', '0521120231', 0),
(77, 18, '3', '1000', '1000', '1000', '1000', '1000', '1000', '2024-05-21 17:00 pm', '0517101624', 0),
(78, 11, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1500000', '2024-05-21 12:51 pm', '0521125151', 0),
(79, 18, '1', '77,850.00', '8,341.07', '69,508.93', '8,341.07', '77,850.00', '10000', '2024-05-21 13:55 pm', '0521135527', 0),
(80, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '55000', '2024-05-21 14:11 pm', '0521141210', 0),
(81, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '100', '2024-05-21 14:12 pm', '0521141225', 0),
(82, 9, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1', '2024-05-21 14:37 pm', '0521143729', 0),
(83, 11, '2', '850,000.00', '91,071.43', '758,928.57', '91,071.43', '850,000.00', '1', '2024-05-28 14:39 pm', '0528143944', 0),
(84, 19, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1', '2024-05-28 14:57 pm', '0528152602', 0),
(85, 19, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1', '2024-05-28 14:57 pm', '0528152609', 0),
(86, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550000', '2024-05-28 15:26 pm', '0528152632', 0),
(87, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '550000', '2024-05-28 15:31 pm', '0528153146', 0),
(88, 19, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1000000', '2024-05-28 15:34 pm', '0528153433', 0),
(89, 18, '1', '289.00', '30.96', '258.04', '30.96', '289.00', '500000', '2024-05-28 15:37 pm', '0528153750', 0),
(90, 15, '1', '859.00', '92.04', '766.96', '92.04', '859.00', '1000000', '2024-05-28 15:39 pm', '0528153919', 0),
(91, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1', '2024-05-28 16:26 pm', '0528164344', 0),
(92, 18, '1', '550.00', '58.93', '491.07', '58.93', '550.00', '1000000', '2024-05-28 16:43 pm', '0528164402', 0),
(93, 18, '1', '550', '', '', '', '610.5', '611', '2024-06-01 21:21 pm', '0601212212', 61),
(94, 20, '1', '550', '', '', '', '610.5', '615', '2024-06-01 21:28 pm', '0601212849', 61),
(95, 18, '1', '100,000', '', '', '', '111', '111000', '2024-06-05 20:22 pm', '0605202248', 11),
(96, 19, '1', '1', '', '', '', '1.11', '1000000', '2024-06-05 20:26 pm', '0605202644', 0),
(97, 19, '2', '65,998', '', '', '', '72.15', '100000', '2024-06-05 20:46 pm', '0605204707', 7),
(98, 19, '1', '32,999', '', '', '', '35.52', '40000', '2024-06-07 18:42 pm', '0607184238', 4),
(99, 18, '1', '32,999', '', '', '', '35.52', '36629', '2024-06-07 18:43 pm', '0607184339', 4),
(100, 18, '1', '100,000', '', '', '', '111', '111000', '2024-06-07 18:50 pm', '0607185047', 11),
(101, 18, '1', '100,000', '', '', '', '111', '111000', '2024-06-07 18:50 pm', '0607185128', 11),
(102, 20, '1', '32,999', '', '', '', '35.52', '3500000', '2024-06-07 18:56 pm', '0607185700', 4),
(103, 19, '1', '100,000', '', '', '', '111', '111000', '2024-06-07 19:03 pm', '0607190330', 11),
(104, 18, '2', '65,998', '', '', '', '72.15', '10000', '2024-06-07 19:04 pm', '0607190433', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `ID` int(11) NOT NULL,
  `TRANS_D_ID` varchar(250) NOT NULL,
  `PRODUCTS` varchar(250) NOT NULL,
  `QTY` varchar(250) NOT NULL,
  `PRICE` varchar(250) NOT NULL,
  `EMPLOYEE` varchar(250) NOT NULL,
  `ROLE` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`) VALUES
(7, '0318160336', 'Lenovo ideapad 20059', '2', '32999', 'Prince Ly', 'Manager'),
(8, '0318160336', 'Predator Helios 300 Gaming Laptop', '5', '77850', 'Prince Ly', 'Manager'),
(9, '0318160336', 'A4tech OP-720', '6', '289', 'Prince Ly', 'Manager'),
(10, '0318160622', 'Newmen E120', '2', '550', 'Prince Ly', 'Manager'),
(11, '0318160622', 'A4tech OP-720', '3', '289', 'Prince Ly', 'Manager'),
(12, '0318170309', 'Newmen E120', '1', '550', 'Prince Ly', 'Manager'),
(13, '0318170352', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Prince Ly', 'Manager'),
(14, '0318170511', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(15, '0318170524', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(16, '0318170551', 'Fantech EG1', '2', '859', 'Prince Ly', 'Manager'),
(17, '0318170624', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(18, '0318170825', 'A4tech OP-720', '1', '289', 'Prince Ly', 'Manager'),
(19, '0318170825', 'Fantech EG1', '1', '859', 'Prince Ly', 'Manager'),
(20, '0318194016', 'Newmen E120', '10', '550', 'Josuey', 'Cashier'),
(21, '0714141333', 'Newmen E120', '1', '550', 'Prince Ly', 'Manager'),
(22, '0714155515', 'Newmen E120', '1', '550', 'Erick', 'Manager'),
(23, '0714160904', 'Newmen E120', '1', '550', 'Erick', 'Manager'),
(24, '0714160904', 'A4tech OP-720', '2', '289', 'Erick', 'Manager'),
(25, '0714161034', 'Newmen E120', '1', '550', 'Josuey', 'Cashier'),
(26, '0515142950', 'Fantech EG1', '1', '859', 'Josuey', 'Cashier'),
(27, '051781217', 'lampu', '1', '1000', 'Erick', 'Manager'),
(28, '0517101604', 'Newmen E120', '1', '550', 'Erick', 'Manager'),
(29, '0517101624', 'A4tech OP-720', '1', '289', 'Erick', 'Manager'),
(30, '0518110856', 'A4tech OP-720', '1', '289', 'Erick', 'Manager'),
(31, '0518111015', 'Lenovo ideapad 20059', '1', '32999', 'Erick', 'Manager'),
(32, '051983630', 'Newmen E120', '1', '550', 'Josuey', 'Cashier'),
(33, '051983630', 'A4tech OP-720', '1', '289', 'Josuey', 'Cashier'),
(34, '0521115626', 'Newmen E120', '1', '550', 'Erick', 'Manager'),
(35, '0521115626', 'A4tech OP-720', '1', '289', 'Erick', 'Manager'),
(36, '0521120231', 'knapot', '1', '150000', 'Erick', 'Manager'),
(37, '0521125151', 'Newmen E120', '1', '550', 'Erick', 'Manager'),
(38, '0521135527', 'Predator Helios 300 Gaming Laptop', '1', '77850', 'Erick', 'Manager'),
(39, '0521141210', 'Knalpot', '1', '550', 'Josuey', 'Cashier'),
(40, '0521141225', 'Knalpot', '1', '550', 'Josuey', 'Cashier'),
(41, '0521143729', 'Knalpot', '1', '550', 'Josuey', 'Cashier'),
(42, '0528143944', 'Yoshimura R11', '1', '500000', 'Mikhail Char', 'Manager'),
(43, '0528143944', 'Shock Absorber', '1', '350000', 'Mikhail Char', 'Manager'),
(44, '0528152602', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(45, '0528152609', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(46, '0528152632', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(47, '0528153146', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(48, '0528153433', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(49, '0528153750', 'A4tech OP-720', '1', '289', 'Mikhail Char', 'Manager'),
(50, '0528153919', 'Oli', '1', '859', 'Mikhail Char', 'Manager'),
(51, '0528164344', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(52, '0528164402', 'Knalpot', '1', '550', 'Mikhail Char', 'Manager'),
(53, '0601212212', 'Knalpot', '1', '550', 'Erick', 'Manager'),
(54, '0601212849', 'Knalpot', '1', '550', 'Erick', 'Manager'),
(55, '0605202248', 'AHM oil', '1', '100000', 'Bang', 'Manager'),
(56, '0605202644', 'a', '1', '1', 'Bang', 'Manager'),
(57, '0605204707', 'baut', '1', '32999', 'Bang', 'Manager'),
(58, '0605204707', 'baut', '1', '32999', 'Bang', 'Manager'),
(59, '0607184238', 'baut', '1', '32999', 'Bang', 'Manager'),
(60, '0607184339', 'baut', '1', '32999', 'Bang', 'Manager'),
(61, '0607185047', 'novan gagah', '1', '100000', 'Bang', 'Manager'),
(62, '0607185128', 'novan gagah', '1', '100000', 'Bang', 'Manager'),
(63, '0607185700', 'baut', '1', '32999', 'Bang', 'Manager'),
(64, '0607190330', 'novan gagah', '1', '100000', 'Bang', 'Manager'),
(65, '0607190433', 'baut', '1', '32999', 'Bang', 'Manager'),
(66, '0607190433', 'baut', '1', '32999', 'Bang', 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`TYPE_ID`, `TYPE`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `EMPLOYEE_ID` int(11) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `TYPE_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID`, `EMPLOYEE_ID`, `USERNAME`, `PASSWORD`, `TYPE_ID`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(7, 2, 'user', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2),
(9, 4, 'mncpdrnl', '8cb2237d0679ca88db6464eac60da96345513964', 2),
(69, 6969, 'nopan', 'novangagah', 1),
(70, NULL, 'ambatukam', '00deaac2074a25ce397c236443d084965ec63473', NULL),
(71, NULL, '', '$2y$10$4paTAmKGsvYdfltSGUIMd.Bx49vti1UqDo5Ri6UuW8e', NULL),
(72, NULL, '', '$2y$10$A2JaP5KqrQjzN8McZtKurO5hsk.aj5kMKCGA6UkoGWq', 1),
(73, NULL, '', '$2y$10$aQ9ho9rWjyrJUfstF0u6M.d.8mrJYPLMjOk3ovE86zw', 2),
(76, NULL, '', '$2y$10$rF6/HyzihTKmhBN55ph5guQQQvAAHqyl9w0LfOCqQHB', NULL),
(77, 4, 'amba', '$2y$10$cOALSJHwrz1oyohNv0TUxOecsbjhkAGdv5GGzF7aDGV', 2),
(80, NULL, 'anto', '$2y$10$HvmH6T.pvu.8lBujiy3TFuLBXAXGZoudv5TXRVQLTTr', NULL),
(82, NULL, 'nofan', '$2y$10$TI/kDH9rmmJTMoKBlPNp9e.NZb0OvvL5NJ/D15HT3Cb', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CUST_ID`);

--
-- Indeks untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`),
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`),
  ADD KEY `JOB_ID` (`JOB_ID`);

--
-- Indeks untuk tabel `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`LOCATION_ID`);

--
-- Indeks untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD UNIQUE KEY `PHONE_NUMBER` (`PHONE_NUMBER`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `SUPPLIER_ID` (`SUPPLIER_ID`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `sales_ibfk_3` (`trans_detail_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD KEY `LOCATION_ID` (`LOCATION_ID`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TRANS_ID`),
  ADD KEY `TRANS_DETAIL_ID` (`TRANS_D_ID`),
  ADD KEY `CUST_ID` (`CUST_ID`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TRANS_D_ID` (`TRANS_D_ID`) USING BTREE;

--
-- Indeks untuk tabel `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`TYPE_ID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`),
  ADD KEY `EMPLOYEE_ID` (`EMPLOYEE_ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `CUST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `EMPLOYEE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6970;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `LOCATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `PRODUCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `SUPPLIER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TRANS_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`JOB_ID`) REFERENCES `job` (`JOB_ID`);

--
-- Ketidakleluasaan untuk tabel `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `category` (`CATEGORY_ID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`SUPPLIER_ID`) REFERENCES `supplier` (`SUPPLIER_ID`);

--
-- Ketidakleluasaan untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`PRODUCT_ID`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`TRANS_ID`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`trans_detail_id`) REFERENCES `transaction_details` (`ID`);

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`LOCATION_ID`);

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`CUST_ID`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`TRANS_D_ID`) REFERENCES `transaction_details` (`TRANS_D_ID`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`TYPE_ID`) REFERENCES `type` (`TYPE_ID`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employee` (`EMPLOYEE_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

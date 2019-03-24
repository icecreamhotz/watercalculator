-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 01:24 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waterfee`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` char(36) NOT NULL,
  `bill_metertotal` int(6) NOT NULL,
  `rate_id` char(36) NOT NULL,
  `vil_id` char(36) NOT NULL,
  `emp_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `bill_metertotal`, `rate_id`, `vil_id`, `emp_id`, `created_at`) VALUES
('4158b33c-4d88-11e9-ad49-12345678900a', 5, 'e33ced28-4cab-11e9-97c6-12345678900a', '6897f733-4ccc-11e9-a3af-12345678900a', 'ed3e019b-4cac-11e9-a3af-12345678900a', '2019-03-23 16:25:21'),
('46626a09-4d88-11e9-ad49-12345678900a', 5, 'e33ced28-4cab-11e9-97c6-12345678900a', '6897f733-4ccc-11e9-a3af-12345678900a', 'ed3e019b-4cac-11e9-a3af-12345678900a', '2019-03-23 16:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` char(36) NOT NULL,
  `cus_username` varchar(30) NOT NULL,
  `cus_password` char(80) NOT NULL,
  `cus_name` varchar(30) NOT NULL,
  `cus_lastname` varchar(30) NOT NULL,
  `vil_id` char(36) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_username`, `cus_password`, `cus_name`, `cus_lastname`, `vil_id`, `created_at`, `updated_at`) VALUES
('42fa63ec-4cac-11e9-a3af-12345678900a', 'icecreamhot', '18d164a35d70eaef296252ce97916ed6', 'anucha', 'phudtapranee', NULL, '2019-03-22 14:10:35', '2019-03-22 14:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` char(36) NOT NULL,
  `emp_username` varchar(30) NOT NULL,
  `emp_password` char(80) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_lastname` varchar(30) NOT NULL,
  `emptype_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `emp_username`, `emp_password`, `emp_name`, `emp_lastname`, `emptype_id`, `created_at`, `updated_at`) VALUES
('ed3e019b-4cac-11e9-a3af-12345678900a', 'employee01', '18d164a35d70eaef296252ce97916ed6', 'Peter', 'Parker', '9a5dd536-4cab-11e9-97c6-12345678900a', '2019-03-22 14:15:20', '2019-03-22 14:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `emptypes`
--

CREATE TABLE `emptypes` (
  `emptype_id` char(36) NOT NULL,
  `emptype_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emptypes`
--

INSERT INTO `emptypes` (`emptype_id`, `emptype_name`) VALUES
('9a570aea-4cab-11e9-97c6-12345678900a', 'admin'),
('9a5dd536-4cab-11e9-97c6-12345678900a', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(8);

-- --------------------------------------------------------

--
-- Table structure for table `paytypes`
--

CREATE TABLE `paytypes` (
  `paytype_id` char(36) NOT NULL,
  `paytype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paytypes`
--

INSERT INTO `paytypes` (`paytype_id`, `paytype_name`) VALUES
('541f3567-4cab-11e9-97c6-12345678900a', 'unit'),
('5420fb81-4cab-11e9-97c6-12345678900a', 'packages');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` char(36) NOT NULL,
  `rate_price` decimal(6,2) NOT NULL,
  `rate_status` smallint(1) NOT NULL DEFAULT '0',
  `paytype_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`rate_id`, `rate_price`, `rate_status`, `paytype_id`, `created_at`, `updated_at`) VALUES
('3f735784-4d9d-11e9-ad49-12345678900a', '10.35', 1, '541f3567-4cab-11e9-97c6-12345678900a', '2019-03-23 19:00:06', '2019-03-23 19:00:06'),
('3f861f91-4d9d-11e9-ad49-12345678900a', '100.30', 1, '5420fb81-4cab-11e9-97c6-12345678900a', '2019-03-23 19:00:06', '2019-03-23 19:00:06'),
('9dd939a1-4d9b-11e9-ad49-12345678900a', '150.00', 1, '5420fb81-4cab-11e9-97c6-12345678900a', '2019-03-23 18:55:38', '2019-03-23 18:55:38'),
('df995f6e-4d9d-11e9-ad49-12345678900a', '3.65', 0, '541f3567-4cab-11e9-97c6-12345678900a', '2019-03-23 19:00:06', '2019-03-23 19:00:06'),
('dfadba30-4d9d-11e9-ad49-12345678900a', '250.36', 0, '5420fb81-4cab-11e9-97c6-12345678900a', '2019-03-23 19:00:06', '2019-03-23 19:00:06'),
('e33ced28-4cab-11e9-97c6-12345678900a', '12.25', 1, '541f3567-4cab-11e9-97c6-12345678900a', '2019-03-23 18:55:38', '2019-03-23 18:55:38');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `vil_id` char(36) NOT NULL,
  `vil_homenumber` varchar(10) NOT NULL,
  `vil_name` varchar(30) NOT NULL,
  `vil_lastname` varchar(30) NOT NULL,
  `vil_telephone` char(10) NOT NULL,
  `paytype_id` char(36) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`vil_id`, `vil_homenumber`, `vil_name`, `vil_lastname`, `vil_telephone`, `paytype_id`, `created_at`, `updated_at`) VALUES
('61934b68-4d46-11e9-ad49-12345678900a', '460', 'Sornruk', 'Panurk', '0896999999', '5420fb81-4cab-11e9-97c6-12345678900a', '2019-03-23 08:33:49', '2019-03-23 08:33:49'),
('6897f733-4ccc-11e9-a3af-12345678900a', '560', 'Anuchaz', 'Phudtapranee', '0850300073', '541f3567-4cab-11e9-97c6-12345678900a', '2019-03-23 08:18:59', '2019-03-23 08:18:59'),
('b61ddd1c-4d3e-11e9-ad49-12345678900a', '262', 'Kiadtisak', 'Lowongsa', '0695555555', '5420fb81-4cab-11e9-97c6-12345678900a', '2019-03-23 07:38:55', '2019-03-23 07:38:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `village_bill_id` (`vil_id`),
  ADD KEY `employee_bill_id` (`emp_id`),
  ADD KEY `rate_bill_id` (`rate_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`),
  ADD KEY `village_customer_id` (`vil_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `emptypes_employee_id` (`emptype_id`);

--
-- Indexes for table `emptypes`
--
ALTER TABLE `emptypes`
  ADD PRIMARY KEY (`emptype_id`);

--
-- Indexes for table `paytypes`
--
ALTER TABLE `paytypes`
  ADD PRIMARY KEY (`paytype_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `paytype_rates_id` (`paytype_id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`vil_id`),
  ADD KEY `paytype_village_id` (`paytype_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`vil_id`) REFERENCES `villages` (`vil_id`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bills_ibfk_3` FOREIGN KEY (`rate_id`) REFERENCES `rates` (`rate_id`),
  ADD CONSTRAINT `employee_bill_id` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `rate_bill_id` FOREIGN KEY (`rate_id`) REFERENCES `rates` (`rate_id`),
  ADD CONSTRAINT `village_bill_id` FOREIGN KEY (`vil_id`) REFERENCES `villages` (`vil_id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`vil_id`) REFERENCES `villages` (`vil_id`),
  ADD CONSTRAINT `village_customer_id` FOREIGN KEY (`vil_id`) REFERENCES `villages` (`vil_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`emptype_id`) REFERENCES `emptypes` (`emptype_id`),
  ADD CONSTRAINT `emptypes_employee_id` FOREIGN KEY (`emptype_id`) REFERENCES `emptypes` (`emptype_id`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `paytype_rates_id` FOREIGN KEY (`paytype_id`) REFERENCES `paytypes` (`paytype_id`),
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`paytype_id`) REFERENCES `paytypes` (`paytype_id`);

--
-- Constraints for table `villages`
--
ALTER TABLE `villages`
  ADD CONSTRAINT `paytype_village_id` FOREIGN KEY (`paytype_id`) REFERENCES `paytypes` (`paytype_id`),
  ADD CONSTRAINT `villages_ibfk_1` FOREIGN KEY (`paytype_id`) REFERENCES `paytypes` (`paytype_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

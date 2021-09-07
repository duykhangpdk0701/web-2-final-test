-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 07, 2021 lúc 08:38 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Fruit', 'The kind that can be eaten without cooking'),
(2, 'Green Vegetables', 'The kind used to make salads or soups'),
(3, 'Spices', 'The kind used to enhance teh taste of food'),
(4, 'Can not eat', 'The kind you cannot put in you mouth'),
(5, 'can eat', 'The kind used to put in your mounth');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Fullname` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `Password`, `Fullname`, `Address`, `City`) VALUES
(1, 'pdk073101', 'Phùng Duy Khang', 'TP. Buôn Ma Thuột', 'Đăk Lăk'),
(2, 'pdk073101', 'Richard', 'TP. Buôn Ma Thuột', 'Đăk Lăk'),
(3, 'pdk073101', 'asdfasdf', 'adsfasdf', 'asdfasdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES
(1, 1, 5, 30000),
(1, 2, 1, 20000),
(4, 1, 1, 30000),
(4, 2, 1, 20000),
(8, 1, 2, 30000),
(8, 2, 1, 20000),
(9, 1, 4, 30000),
(9, 2, 2, 20000),
(10, 1, 1, 30000),
(11, 1, 1, 30000),
(12, 1, 1, 30000),
(12, 2, 1, 20000),
(12, 3, 1, 30000),
(37, 1, 1, 30000),
(38, 2, 1, 20000),
(39, 2, 1, 20000),
(40, 1, 2, 30000),
(41, 1, 1, 30000),
(41, 2, 1, 20000),
(42, 1, 1, 30000),
(42, 2, 1, 20000),
(45, 1, 1, 30000),
(45, 2, 1, 20000),
(46, 1, 1, 30000),
(46, 2, 1, 20000),
(47, 1, 1, 30000),
(47, 2, 1, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES
(1, 1, '2021-08-28', 170000, NULL),
(4, 1, '2021-08-28', 50000, NULL),
(8, 2, '2021-08-28', 80000, NULL),
(9, 2, '2021-08-28', 160000, NULL),
(10, 2, '2021-08-28', 30000, NULL),
(11, 1, '2021-09-03', 30000, NULL),
(12, 1, '2021-09-04', 80000, NULL),
(24, 1, '2021-09-04', 60000, NULL),
(25, 1, '2021-09-04', 30000, NULL),
(26, 1, '2021-09-04', 30000, NULL),
(27, 1, '2021-09-04', 30000, NULL),
(28, 1, '2021-09-04', 30000, NULL),
(29, 1, '2021-09-04', 30000, NULL),
(30, 1, '2021-09-04', 30000, NULL),
(31, 1, '2021-09-04', 30000, NULL),
(32, 1, '2021-09-04', 30000, NULL),
(33, 1, '2021-09-04', 30000, NULL),
(34, 1, '2021-09-04', 30000, NULL),
(35, 1, '2021-09-04', 30000, NULL),
(36, 1, '2021-09-04', 30000, NULL),
(37, 1, '2021-09-04', 50000, NULL),
(38, 1, '2021-09-04', 50000, NULL),
(39, 1, '2021-09-04', 20000, NULL),
(40, 1, '2021-09-04', 80000, NULL),
(41, 1, '2021-09-04', 50000, NULL),
(42, 1, '2021-09-04', 50000, NULL),
(43, 1, '2021-09-04', 50000, NULL),
(44, 1, '2021-09-04', 50000, NULL),
(45, 1, '2021-09-04', 50000, NULL),
(46, 1, '2021-09-04', 50000, NULL),
(47, 2, '2021-09-04', 50000, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vegetable`
--

CREATE TABLE `vegetable` (
  `VegetableID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `VegetableName` varchar(30) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vegetable`
--

INSERT INTO `vegetable` (`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES
(1, 2, 'Tomato', 'Kg', 15, '../images/tomato.png', 30000),
(2, 2, 'Potato', 'Kg', 25, '../images/potato.png', 20000),
(3, 1, 'water melon', 'kg', 0, '../images/water melon.png', 30000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`VegetableID`),
  ADD KEY `FK_VegetableID` (`VegetableID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `FK_CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegetableID`),
  ADD KEY `FK_CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  MODIFY `VegetableID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `FK_VegetableID` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Các ràng buộc cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `FK_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

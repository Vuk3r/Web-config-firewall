CREATE DATABASE IF NOT EXISTS students;
use students;
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: db
-- Thời gian đã tạo: Th10 16, 2024 lúc 02:50 AM
-- Phiên bản máy phục vụ: 5.7.44
-- Phiên bản PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `students`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `ID` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`ID`, `Password`) VALUES
('22GIT202', '123'),
('23NS001', '231'),
('23NS002', '123'),
('23NS003', '123'),
('23NS004', '123'),
('23NS005', '123'),
('23NS006', '123'),
('23NS007', '123'),
('23NS008', '123'),
('23NS009', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address_info`
--

CREATE TABLE `address_info` (
  `ID` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Full Address` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `District` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Ward` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Residential` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `address_info`
--

INSERT INTO `address_info` (`ID`, `Full Address`, `City`, `District`, `Ward`, `Residential`) VALUES
('22GIT202', '222 Đ. Nguyen Van Linh, Thac Gian, Thanh Khe, Da Nang, Viet Nam', 'DA NANG', 'THANH KHE', 'THAC GIAN', 'To 23'),
('23NS002', '223 Washin Machine Wall Street Basing se ', 'Wall Street', 'Machine', 'Basing se', 'Whasing'),
('23NS003', '38 Đ. Phan Chu Trinh, Phường Vĩnh Ninh, Thành phố Huế, Việt Nam', 'Huế', 'Phường Vĩnh Ninh', 'Phường Vĩnh Ninh', 'tổ 23'),
('23NS004', '42 Đ. Nguyễn Trãi, Đà Nẵng Quận 1 phường 2 tổ 13', 'Đà Nẵng', 'Quận 1', 'Phường 2', 'Tổ 13'),
('23NS005', '222 Đ. Nguyễn Văn Linh, Bình Định, Hải Châu Phường 1 Tổ 21', 'Bình Định', 'Quận Hải Châu', 'Phường 1', 'Tổ 21'),
('23NS006', '101 Đ. Trần Hưng Đạo, Bình Định, Quận Long Biên, Phường Lê Hồng Phong', 'Bình Định', 'Quận Long Biên', 'Phường Lê Hồng Phong', 'Tổ 7'),
('23NS007', '15 Đ. Hùng Vương Quy Nhơn Quận Hải Châu Phường 1', 'Quy Nhơn', 'Quận Hải Châu', 'Phường 1', 'Tổ 21'),
('23NS008', '59 Đ. Lý Tự Trọng, Huế,Phường 1', 'Huế', 'Thành phố Huế', 'Phường 1', 'Tổ 13'),
('23NS009', '38 Đ. Phan Chu Trinh, Hà Nội,Thanh Khê,Minh Khai Tổ 7', 'Hà Nội', 'Quận Thanh Khê', 'Phường Minh Khai', 'Tổ 7');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact_info`
--

CREATE TABLE `contact_info` (
  `ID` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Private Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Private Phone` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Family Phone` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Facebook` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contact_info`
--

INSERT INTO `contact_info` (`ID`, `Private Email`, `Private Phone`, `Family Phone`, `Facebook`) VALUES
('22GIT202', 'vuongnguyen3509@gmail.com', '0348265423', '0345687345', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS002', 'schultzcasey@gmail.com', '259-131-6522x571', '(586)328-3945x7444', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS003', 'lorraine74@gmail.com', '822.273.0446x57599', '(809)692-6038x48247', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS004', 'lwalker@yahoo.com', '+1-670-226-7426x3176', '883.150.9166', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS005', 'fdorsey@gmail.com', '7210701341', '(310)801-6320x2133', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS006', 'beardphillip@ray.com', '+1-823-495-4944x067', '373.897.2107x577', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS007', 'tphelps@hotmail.com', '982.684.4480', '949.168.4508x4580', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS008', 'vlopez@west.com', '773.195.0042x431', '619-513-3919x48042', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ'),
('23NS009', 'tbennett@suarez-evans.net', '9320702400', '+1-140-501-7832x5467', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `private_info`
--

CREATE TABLE `private_info` (
  `ID` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Full Name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Day Of Birth` date NOT NULL,
  `Gender` varchar(14) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CCCD` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Region` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `private_info`
--

INSERT INTO `private_info` (`ID`, `Full Name`, `Day Of Birth`, `Gender`, `CCCD`, `Region`) VALUES
('22GIT202', 'Nguyen Quang Vuong', '2004-11-10', 'male', '035647864', 'Phat Giao'),
('23NS002', 'Daniel Dudley', '1989-12-17', 'Female', '146495752', 'Central'),
('23NS003', 'Dennis Nguyen', '1981-06-13', 'Female', '515414682', 'North'),
('23NS004', 'Robin Moore', '1977-01-08', 'Male', '840095417', 'Central'),
('23NS005', 'Jerome Gonzales', '1977-04-26', 'Male', '165255534', 'South'),
('23NS006', 'Colton Price', '1966-07-26', 'Male', '579950680', 'Central'),
('23NS007', 'Tyler Ross', '1982-03-28', 'Male', '888071350', 'South'),
('23NS008', 'Henry Cooper', '1996-12-29', 'Male', '352251012', 'South'),
('23NS009', 'Jeremy Smith', '1967-04-05', 'Female', '371407042', 'Central');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `school_info`
--

CREATE TABLE `school_info` (
  `ID` varchar(9) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Full Name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Class` varchar(5) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Major` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Course` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Faculty` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `school_info`
--

INSERT INTO `school_info` (`ID`, `Full Name`, `Class`, `Major`, `Email`, `Course`, `Faculty`) VALUES
('22GIT202', 'Nguyen Quang Vuong', '24GIT', 'Vi Mach Ban Dan', '23git202@gmail.com', '2024 - 2028', 'Khoa Khoa Hoc May Tinh'),
('23NS002', 'Gina Franklin', '4A4', 'Biology', 'alyssalloyd@yahoo.com', '2022', 'Business'),
('23NS003', 'Paul Lane', '3A6', 'Biology', 'jasonmoore@yahoo.com', '2024', 'Arts'),
('23NS004', 'David Johnson', '9A1', 'IT', 'zimmermankenneth@chung-adams.net', '2024', 'Science'),
('23NS005', 'Mary Dickerson', '9A3', 'Biology', 'zavalakimberly@sharp-johnson.net', '2024', 'Science'),
('23NS006', 'Dustin Foster', '4A5', 'Biology', 'rachel72@yahoo.com', '2025', 'Science'),
('23NS007', 'Gregory Garcia', '10A3', 'IT', 'bdavis@stafford.com', '2023', 'Engineering'),
('23NS008', 'Rachel Harris', '3A1', 'Physics', 'antonio57@patel.com', '2020', 'Engineering'),
('23NS009', 'Walter Hinton', '10A5', 'Chemistry', 'codydouglas@yang.net', '2023', 'Arts');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `address_info`
--
ALTER TABLE `address_info`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `private_info`
--
ALTER TABLE `private_info`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

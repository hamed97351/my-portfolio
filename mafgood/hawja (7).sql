-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 نوفمبر 2024 الساعة 13:01
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hawja`
--

-- --------------------------------------------------------

--
-- بنية الجدول `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`) VALUES
(3, 'qwer', 'admin@admin.com', 'sadzxczxczxczxczxczxczxc'),
(4, 'qwer', 'admin@admin.com', 'sadzxczxczxczxczxczxczxc');

-- --------------------------------------------------------

--
-- بنية الجدول `found_document`
--

CREATE TABLE `found_document` (
  `id` int(11) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `found_document`
--

INSERT INTO `found_document` (`id`, `document_type`, `document_number`, `date`, `contact`, `location`, `description`, `image`, `user_id`) VALUES
(3023, 'بطاقة قومية', '2454266', '2024-11-06', '0215583556', 'كريمة', 'في المدرسة', 'images/document/document10.jfif', NULL),
(3025, 'عقد زواج', '2454266', '2024-11-08', '098634635', 'كسلا', 'في السوق', 'images/document/document11.jfif', 24),
(3028, 'رخصة قيادة', '54328', '2024-11-15', '0109777543765', 'الابيض', 'في تاكسي', 'images/document/document5.jfif', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `found_others`
--

CREATE TABLE `found_others` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `other_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `found_others`
--

INSERT INTO `found_others` (`id`, `name`, `other_type`, `description`, `date`, `location`, `contact`, `image`, `user_id`) VALUES
(7001, 'اhp', 'لابتوب', 'مستعمل استعمال خفيف', '2023-10-06', 'الفتيحاب', '011777543765', 'images/others/others7.JPEG', NULL),
(7010, 'THINKPAD', 'لابتوب', 'جديد', '2024-11-06', 'حلفا', '011777543765', 'images/document/others4.jfif', 4),
(7011, 'redmi', 'phone', 'ram 4 ', '2024-11-06', 'ام روابة', '9867467', 'images/document/others2.jfif', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `found_people`
--

CREATE TABLE `found_people` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `found_people`
--

INSERT INTO `found_people` (`id`, `name`, `gender`, `description`, `date`, `location`, `contact`, `image`, `user_id`) VALUES
(1082, 'hamed', 'male', 'يرتدي نظارة', '2024-11-14', 'الدويم', '011777543765', 'images/document/people12.jpeg', 52),
(1083, 'mustafa', 'male', 'يرتدي جلابية', '2024-11-22', 'ام روابة', '0109777543765', 'images/document/people10.jpeg', 52),
(1084, 'ahmed', 'male', 'يرتدي قميص كاروهات', '2024-11-21', 'تندلتي', '987534565780', 'images/document/people9.jpeg', 52);

-- --------------------------------------------------------

--
-- بنية الجدول `found_vehicles`
--

CREATE TABLE `found_vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `found_vehicles`
--

INSERT INTO `found_vehicles` (`id`, `name`, `vehicle_type`, `plate_number`, `chassis`, `model`, `color`, `location`, `date`, `contact`, `image`, `user_id`) VALUES
(5008, 'bajaj', 'jance', 'sd7553276545', '5543ff', '2013', 'blue', 'السوق العربي', '2024-11-07', '987534565780', 'images/vehicles3.jfif', NULL),
(5013, 'suzuki', 'jn', 'rt5567', '5543ff', '2013', 'blue', 'السوق العربي', '2024-11-01', '011777543765', 'images/document/vehicles10.jpeg', NULL),
(5016, 'manuficture', 'جامبو', 'rt5567', 'rr7664436', '2020', 'ابيض', 'القطينة', '2024-11-21', '0124587762437', 'images/vehicles5.jpg', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `lost_document`
--

CREATE TABLE `lost_document` (
  `id` int(11) NOT NULL,
  `document_type` varchar(100) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lost_document`
--

INSERT INTO `lost_document` (`id`, `document_type`, `document_number`, `date`, `contact`, `location`, `description`, `image`, `user_id`) VALUES
(4001, 'رخصة قيادة', '87654321', '2023-09-21', '0987654321', 'القضارف', 'تم فقدها في المستشفى', 'images/document/document7.jfif', NULL),
(4002, 'بطاقة قومية', '24542', '2024-11-13', '0215583556', 'مروي', 'تم فقد البطاقة داخل الباص السياحي', 'images/document10.jfif', NULL),
(4003, 'رقم وطني', '2454266', '2024-11-08', '0987654323', 'الحلفايا', 'تم فقدها في الموقف العام', 'images/document/document9.jfif', 24);

-- --------------------------------------------------------

--
-- بنية الجدول `lost_others`
--

CREATE TABLE `lost_others` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `other_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lost_others`
--

INSERT INTO `lost_others` (`id`, `name`, `other_type`, `description`, `date`, `location`, `contact`, `image`, `user_id`) VALUES
(8000, 'iphone', 'هاتف', '250g', '2023-12-16', 'كرري', '0109777543765', 'images/document/others9.jpeg', NULL),
(8005, 'redmi', 'هاتف', 'جديد', '2024-02-10', 'عطبرة', '098674653', 'images/document/others2.jfif', NULL),
(8006, 'HP', 'لابتوب', '16 ram  1tera', '2024-11-06', 'ام روابة', '01987466936', 'images/document/others4.jfif', 24);

-- --------------------------------------------------------

--
-- بنية الجدول `lost_people`
--

CREATE TABLE `lost_people` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lost_people`
--

INSERT INTO `lost_people` (`id`, `name`, `gender`, `description`, `date`, `location`, `contact`, `image`, `user_id`) VALUES
(2028, 'waled', 'male', 'يرتدي طاقية', '2024-11-20', 'امدرمان', '011777543765', 'images/document/people7.jpeg', 52),
(2030, 'maher', 'male', 'يرتدي جلابية', '2024-11-05', 'دنقلا', '0109777543765', 'images/document/people6.jpeg', 52),
(2031, 'osman', 'male', 'يرتدي نظارة', '2023-12-10', 'ربك', '0109777543765', 'images/document/people12.jpeg', 52);

-- --------------------------------------------------------

--
-- بنية الجدول `lost_vehicles`
--

CREATE TABLE `lost_vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `contact` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `lost_vehicles`
--

INSERT INTO `lost_vehicles` (`id`, `name`, `vehicle_type`, `plate_number`, `chassis`, `model`, `color`, `location`, `date`, `contact`, `image`, `user_id`) VALUES
(6000, 'manuficture', 'جامبو', 'B1234', 'C1234', '2020', 'أحمر', 'الحديقة', '2023-09-15', '098754532473', 'images/vehicles/vehicles6.JPG', NULL),
(6013, 'suzuki', 'jn', 'hs98436', '34568754d', '2019', 'red', 'sennar', '2024-11-04', '01014574376', 'images/document/vehicles5.jpg', 52),
(6014, 'bajaj', 'janci', 'rt5567', '5543ff', '2020', 'blue', 'دنقلا', '2024-11-06', '987534565780', 'images/document/vehicles3.jfif', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT 'Unknown',
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(15) DEFAULT 'N/A',
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `type`, `is_admin`) VALUES
(1, 'qwer', 'qw@1234.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '012345678', 'user', NULL),
(2, 'qwer', 'qw@1234.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e', '012345678', 'user', NULL),
(3, 'qwer', 'qw@1234.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e8', '012345678', 'user', NULL),
(4, 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '012345678', 'admin', NULL),
(5, 'qwer', 'qwer@email.com', '20730d719598df766a6c4843f164a0401aa0423fd2ea597187e58396add60a7e', '012376043277', 'user', NULL),
(6, 'qwer', 'qw@1234.com', 'd8542eff16ab03c0f185f7668c0ef747f01a4505a1506111d3c9bd9cd6478f61', '012345678', 'user', NULL),
(7, 'hamed', 'hamed@ahmed.com', '314ffd6162923d94123a7010c7c67be278592e5922ac5e3e404d65aa01608293', '098', 'user', NULL),
(8, 'hamed', 'hamed@ahmed.com', '314ffd6162923d94123a7010c7c67be278592e5922ac5e3e404d65aa01608293', '09', 'user', NULL),
(9, 'hamed', 'hamed@ahmed.com', 'aaa9402664f1a41f40ebbc52c9993eb66aeb366602958fdfaa283b71e64db123', '09', 'user', NULL),
(10, 'hamed', 'hamed@ahmed.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '01865368645', 'user', NULL),
(11, 'hamed', 'hamed@ahmed.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '0101', 'user', NULL),
(12, 'hamed', 'hamed@ahmed.com', 'a73ab888363736220eb589458721088241ee10059b1f5898a13fe9c2e14fcd8c', '123', 'user', NULL),
(13, 'ahamd', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0964042519', 'user', NULL),
(14, 'ahamd', 'ibrahim519@gamil', '3cc0dde6b4284a98707191660f2db528fcc273a1eb3feff8df4c6353c8d5e06d', '0964042519', 'user', NULL),
(15, 'ahamd', 'ibrahim519@gamil', '3cc0dde6b4284a98707191660f2db528fcc273a1eb3feff8df4c6353c8d5e06d', '0964042519', 'user', NULL),
(16, 'Ø§Ø¨Ø±Ø§Ù‡ÙŠÙ…', 'ibrahim719@gamil', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '0123345697', 'user', NULL),
(17, 'ibrahim', 'ibrahim741@gmail', '9e4633d8746b59a6aec1c82f2f7c49fc3e49ac70b6b3803f96752dff8c481af2', '0123345697', 'user', NULL),
(18, 'ahamd', 'ibrahim919@gamil', '3cc0dde6b4284a98707191660f2db528fcc273a1eb3feff8df4c6353c8d5e06d', '0123345697', 'user', NULL),
(24, 'Ø§Ø¨Ø±Ø§Ù‡ÙŠÙ…', 'ibrahimworld690@gmail.om', '86cfab0defb473eaf8e60c1d9f19842ac524c4efac58c7fe7190229de2fcb55d', '012313381', 'user', 0),
(28, '', 'Admin@gmail.com', 'Admin', '', 'user', 1),
(29, 'ahamd', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '0123456789', 'user', 0),
(30, 'ahamd', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0123456789', 'user', 0),
(31, '', 'Admin@gmail.com', 'Admin', '', 'ِadmin', 1),
(32, 'ahamd', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '0123456789', 'user', 0),
(33, 'ahamd', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '0964042519', 'user', 0),
(34, 'ahamd', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '0123456789', 'user', 0),
(35, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0123456789', 'user', 0),
(36, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '02145789335', 'user', 0),
(37, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0964042519', 'user', 0),
(38, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0964042519', 'user', 0),
(39, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0964042519', 'user', 0),
(40, 'ahamd', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '0964042519', 'user', 0),
(41, '', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'user', 1),
(42, 'ahamd', 'Admin@gmail.com', '378107dd2274e4d960610207ebba5f5deec7964592b105463aee69374f1baa18', '0123456987', 'user', 0),
(43, '', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(44, '', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(45, '', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(46, 'Admin', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(47, 'Admin', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(48, 'Admin', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(49, 'Admin', 'Admin@gmail.com', 'c1c224b03cd9bc7b6a86d77f5dace40191766c485cd55dc48caf9ac873335d6f', '', 'admin', NULL),
(50, 'Admin', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', 'admin', NULL),
(51, 'Admin', 'Admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '', 'admin', NULL),
(52, 'hamed', 'hamed@ahmed.com', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '123456', 'user', 0),
(53, 'faisal', 'ali@ali.com', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '0123456789', 'user', 0),
(54, 'omer', 'hamed@ahmed.com', '23f9194bae2863c6d91656260a3f7a637a65db287fa21a3ce75129d98c19b842', 'jhgf', 'user', 0),
(55, 'jgf', 'hamed@ahmed.com', 'ac1b9bdf7dc088d7559b5e976ec472b1f174a1f52dc12abf98df8c96cd86e48d', 'hff', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found_document`
--
ALTER TABLE `found_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found_others`
--
ALTER TABLE `found_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found_people`
--
ALTER TABLE `found_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `found_vehicles`
--
ALTER TABLE `found_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_document`
--
ALTER TABLE `lost_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_others`
--
ALTER TABLE `lost_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_people`
--
ALTER TABLE `lost_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_vehicles`
--
ALTER TABLE `lost_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found_document`
--
ALTER TABLE `found_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3032;

--
-- AUTO_INCREMENT for table `found_others`
--
ALTER TABLE `found_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7017;

--
-- AUTO_INCREMENT for table `found_people`
--
ALTER TABLE `found_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1088;

--
-- AUTO_INCREMENT for table `found_vehicles`
--
ALTER TABLE `found_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5026;

--
-- AUTO_INCREMENT for table `lost_document`
--
ALTER TABLE `lost_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4008;

--
-- AUTO_INCREMENT for table `lost_others`
--
ALTER TABLE `lost_others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8010;

--
-- AUTO_INCREMENT for table `lost_people`
--
ALTER TABLE `lost_people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2039;

--
-- AUTO_INCREMENT for table `lost_vehicles`
--
ALTER TABLE `lost_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6023;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

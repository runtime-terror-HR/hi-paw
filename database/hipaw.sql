-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 مارس 2020 الساعة 17:59
-- إصدار الخادم: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hipaw`
--

-- --------------------------------------------------------

--
-- بنية الجدول `adopted_feedback`
--

CREATE TABLE `adopted_feedback` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_table` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `adopted_feedback`
--

INSERT INTO `adopted_feedback` (`id`, `user_id`, `user_table`, `feedback`) VALUES
(7, 10, 'guardian', ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, ad voluptate repellendus blanditiis nostrum tempore!'),
(8, 10, 'guardian', ' Very Good. Wish you all the best!'),
(9, 10, 'guardian', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, consequatur! Nihil porro quis modi facilis laborum distinctio voluptas odio laboriosam, deleniti illo dicta. Recusandae fuga nostrum cum odit saepe?'),
(10, 10, 'guardian', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, consequatur! Nihil porro quis modi facilis laborum distinctio voluptas odio laboriosam, deleniti illo dicta. Recusandae fuga nostrum cum odit saepe?'),
(11, 10, 'guardian', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, consequatur! Nihil porro quis modi facilis laborum distinctio voluptas odio laboriosam, deleniti illo dicta. Recusandae fuga nostrum cum odit saepe?'),
(12, 10, 'guardian', ' Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, consequatur! Nihil porro quis modi facilis laborum distinctio voluptas odio laboriosam, deleniti illo dicta. Recusandae fuga nostrum cum odit saepe?'),
(13, 24, 'adopter', 'cool'),
(14, 8, 'guardian', 'ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•ðŸ’•'),
(15, 27, 'adopter', 'Spectacular ðŸ”¥ðŸ”¥'),
(16, 10, 'guardian', 'hhahahah');

-- --------------------------------------------------------

--
-- بنية الجدول `adopted_note`
--

CREATE TABLE `adopted_note` (
  `id` int(20) NOT NULL,
  `adopter_id` int(10) NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pet_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `adopter`
--

CREATE TABLE `adopter` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` int(10) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `adopter`
--

INSERT INTO `adopter` (`id`, `name`, `password`, `number`, `email`, `city`) VALUES
(24, 'Hiba', '123123123123', 0, 'hibaalkurd@gmail.com', 'Nablus'),
(25, 'hey', '123123123123', 0, 'hey@gmail.com', 'Nablus'),
(26, 'emma', '123123123123', 0, 'emma@gmail.com', 'Hebron'),
(27, 'Ruwaa\'', '1234567890', 0, 'ruwaa.tareq@gmail.com', 'Nablus');

-- --------------------------------------------------------

--
-- بنية الجدول `guardian`
--

CREATE TABLE `guardian` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(10) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `guardian`
--

INSERT INTO `guardian` (`id`, `name`, `password`, `number`, `email`, `city`) VALUES
(8, 'yasmeen', '123123123123', NULL, 'kgkanassar17@gmail.com', 'Nablus'),
(9, 'hey', '123123123123', NULL, 'hey@gmail.com', 'Nablus'),
(10, 'ruwaa', '123123123123', NULL, 'walaakord@gmail.com', 'Nablus'),
(11, 'John', '123123123123', NULL, 'john@gmail.com', 'Hebron'),
(12, 'fgh', '123123123123', NULL, 'g@g.com', 'Nablus');

-- --------------------------------------------------------

--
-- بنية الجدول `location`
--

CREATE TABLE `location` (
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `map` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `location`
--

INSERT INTO `location` (`city`, `map`) VALUES
('Hebron', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13602.775286258338!2d35.1085807798724!3d31.532568251846502!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502e427ecc463fb%3A0xbe464d5c6a2f134c!2z2KfZhNiu2YTZitmE!5e0!3m2!1sar!2s!4v1575542508792!5m2!1sar!2s\" frameborder=\"0\"style=\"border:0;\"width=\"100%\"height=\"400px></iframe>\r\n'),
('Jenin', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28815.616963746845!2d35.31994574758419!3d32.45747108993864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cfed5525459a7%3A0x8af2eaf8c123e9a4!2z2KzZhtmK2YY!5e0!3m2!1sar!2s!4v1575542552758!5m2!1sar!2s\" frameborder=\"0\"style=\"border:0;\"width=\"100%\"height=\"400px></iframe>\r\n'),
('Jerusalem', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217027.54125255998!2d35.31544738132594!3d31.796241905835135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502d7d634c1fc4b%3A0xd96f623e456ee1cb!2z2KfZhNmC2K_Ys9iMINil2LPYsdin2KbZitmE!5e0!3m2!1sar!2s!4v1575542621715!5m2!1sar!2s\" frameborder=\"0\"style=\"border:0;\"width=\"100%\"height=\"400px></iframe>'),
('Nablus', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27002.037448945535!2d35.26518895757283!3d32.22430834308981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ce0f650425697%3A0x7f0ba930bd153d84!2z2YbYp9io2YTYsw!5e0!3m2!1sar!2s!4v1575542382093!5m2!1sar!2s\" frameborder=\"0\"style=\"border:0;\"width=\"100%\"height=\"400px></iframe>\r\n'),
('Ramallah', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54191.55911475639!2d35.240901762340435!3d31.907346048080573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502d54cda2d58d1%3A0xbf6d4d17cc8b2c76!2z2LHYp9mFINin2YTZhNmH!5e0!3m2!1sar!2s!4v1575542591760!5m2!1sar!2s\" frameborder=\"0\"style=\"border:0;\"width=\"100%\"height=\"400px></iframe>\r\n');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(20) NOT NULL,
  `guardian_id` int(10) NOT NULL,
  `adopter_id` int(10) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `msg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `request_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `messages`
--

INSERT INTO `messages` (`id`, `guardian_id`, `adopter_id`, `sender_id`, `msg`, `request_id`) VALUES
(28, 11, 26, 11, 'hi', 8),
(29, 11, 26, 26, 'hey', 8),
(30, 11, 26, 11, 'how are you?', 8),
(31, 11, 26, 11, 'good', 8),
(32, 11, 26, 11, '??', 8),
(33, 11, 26, 26, 'now?', 8),
(34, 11, 26, 26, 'good', 8);

-- --------------------------------------------------------

--
-- بنية الجدول `pet`
--

CREATE TABLE `pet` (
  `id` int(10) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `age_years` int(2) NOT NULL,
  `age_months` int(2) NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `food` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` int(10) NOT NULL,
  `story` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `health` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `liked` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pet`
--

INSERT INTO `pet` (`id`, `name`, `type`, `age_years`, `age_months`, `gender`, `size`, `food`, `owner`, `story`, `health`, `details`, `city`, `photo`, `alone`, `liked`) VALUES
(10, 'Mickey', 'dog', 5, 0, 'male', 'M', 'both', 11, 'My elderly parents adopted Mickey at a shelter in Spring Hill, Florida. I had to relocate my parents and Mickey to NY. My parents cannot keep Mickey at the Assisted Living Facility. There are no family members that can keep Mickey. He is an awesome dog. He is trained on a WeWe pad. Mickey is up to d', '', '                                ', 'Hebron', 'uploadedPhotos/10.png', 'inside loose', NULL),
(17, 'Simon', 'cat', 2, 0, 'male', 'S', 'both', 8, '   Simon is a sweetheart. He is a healthy, strong, growing male kitten. He is 5 months old. He is extremely cuddly and likes to nuzzle into you whenever you\'ll let him. He has a lot of energy, as all kittens do, and a hearty appetite. Sometimes I think he acts like a puppy because he loves affection', '', '                                ', 'Nablus', 'uploadedPhotos/17.png', 'inside loose', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `pet_color`
--

CREATE TABLE `pet_color` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pet_color`
--

INSERT INTO `pet_color` (`id`, `pet_id`, `color`) VALUES
(8, 10, 'paige'),
(17, 17, 'grey');

-- --------------------------------------------------------

--
-- بنية الجدول `pet_goodwith`
--

CREATE TABLE `pet_goodwith` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `good_with` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pet_goodwith`
--

INSERT INTO `pet_goodwith` (`id`, `pet_id`, `good_with`) VALUES
(14, 10, 'Dogs'),
(15, 10, 'Cats'),
(16, 10, 'Children under 5');

-- --------------------------------------------------------

--
-- بنية الجدول `pet_is`
--

CREATE TABLE `pet_is` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `petis` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pet_is`
--

INSERT INTO `pet_is` (`id`, `pet_id`, `petis`) VALUES
(31, 10, 'Active'),
(32, 10, 'Friendly'),
(33, 10, 'Affectionate '),
(56, 17, 'Active'),
(57, 17, 'Calm'),
(58, 17, 'Friendly');

-- --------------------------------------------------------

--
-- بنية الجدول `pet_likes`
--

CREATE TABLE `pet_likes` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `likes` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pet_likes`
--

INSERT INTO `pet_likes` (`id`, `pet_id`, `likes`) VALUES
(16, 10, 'To be held or carried '),
(17, 10, 'To be brushed'),
(18, 10, 'To hunt'),
(19, 10, 'To be petted'),
(36, 17, 'To be held or carried '),
(37, 17, 'To be brushed'),
(38, 17, 'To be with people'),
(39, 17, 'To be petted');

-- --------------------------------------------------------

--
-- بنية الجدول `request`
--

CREATE TABLE `request` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `guardian_id` int(10) NOT NULL,
  `adopter_id` int(10) NOT NULL,
  `adopted` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `request`
--

INSERT INTO `request` (`id`, `pet_id`, `guardian_id`, `adopter_id`, `adopted`, `message`) VALUES
(8, 10, 11, 26, NULL, 'New Request! Check Your Email.');

-- --------------------------------------------------------

--
-- بنية الجدول `saved_pets`
--

CREATE TABLE `saved_pets` (
  `id` int(10) NOT NULL,
  `pet_id` int(10) NOT NULL,
  `adopter_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `saved_pets`
--

INSERT INTO `saved_pets` (`id`, `pet_id`, `adopter_id`) VALUES
(42, 10, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopted_feedback`
--
ALTER TABLE `adopted_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopted_note`
--
ALTER TABLE `adopted_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`city`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_msg_adopter` (`adopter_id`),
  ADD KEY `fk_foreign_msg_guardian` (`guardian_id`),
  ADD KEY `fk_foreign_req` (`request_id`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_pet_owner` (`owner`) USING BTREE;

--
-- Indexes for table `pet_color`
--
ALTER TABLE `pet_color`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_petid` (`pet_id`);

--
-- Indexes for table `pet_goodwith`
--
ALTER TABLE `pet_goodwith`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_pet_good` (`pet_id`);

--
-- Indexes for table `pet_is`
--
ALTER TABLE `pet_is`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_pet_is` (`pet_id`);

--
-- Indexes for table `pet_likes`
--
ALTER TABLE `pet_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_pet_likes` (`pet_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_foreign_pet_id_request` (`pet_id`),
  ADD KEY `fk_foreign_guardian_id` (`guardian_id`),
  ADD KEY `fk_foreign_adopter_id` (`adopter_id`);

--
-- Indexes for table `saved_pets`
--
ALTER TABLE `saved_pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_petidd` (`pet_id`),
  ADD KEY `fk_foreign_adopter` (`adopter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopted_feedback`
--
ALTER TABLE `adopted_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `adopted_note`
--
ALTER TABLE `adopted_note`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adopter`
--
ALTER TABLE `adopter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pet_color`
--
ALTER TABLE `pet_color`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pet_goodwith`
--
ALTER TABLE `pet_goodwith`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pet_is`
--
ALTER TABLE `pet_is`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pet_likes`
--
ALTER TABLE `pet_likes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `saved_pets`
--
ALTER TABLE `saved_pets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_foreign_msg_adopter` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`id`),
  ADD CONSTRAINT `fk_foreign_msg_guardian` FOREIGN KEY (`guardian_id`) REFERENCES `guardian` (`id`),
  ADD CONSTRAINT `fk_foreign_req` FOREIGN KEY (`request_id`) REFERENCES `request` (`id`);

--
-- القيود للجدول `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `fk_foreign_key_name` FOREIGN KEY (`owner`) REFERENCES `guardian` (`id`);

--
-- القيود للجدول `pet_color`
--
ALTER TABLE `pet_color`
  ADD CONSTRAINT `fk_foreign_petid` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- القيود للجدول `pet_goodwith`
--
ALTER TABLE `pet_goodwith`
  ADD CONSTRAINT `fk_foreign_pet_good` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- القيود للجدول `pet_is`
--
ALTER TABLE `pet_is`
  ADD CONSTRAINT `fk_foreign_pet_is` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- القيود للجدول `pet_likes`
--
ALTER TABLE `pet_likes`
  ADD CONSTRAINT `fk_foreign_pet_id` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`),
  ADD CONSTRAINT `fk_foreign_pet_likes` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- القيود للجدول `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_foreign_adopter_id` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`id`),
  ADD CONSTRAINT `fk_foreign_guardian_id` FOREIGN KEY (`guardian_id`) REFERENCES `guardian` (`id`),
  ADD CONSTRAINT `fk_foreign_pet_id_request` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);

--
-- القيود للجدول `saved_pets`
--
ALTER TABLE `saved_pets`
  ADD CONSTRAINT `fk_foreign_adopter` FOREIGN KEY (`adopter_id`) REFERENCES `adopter` (`id`),
  ADD CONSTRAINT `fk_foreign_petidd` FOREIGN KEY (`pet_id`) REFERENCES `pet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

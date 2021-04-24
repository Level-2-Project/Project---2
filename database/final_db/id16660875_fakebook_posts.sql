-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 24 апр 2021 в 12:48
-- Версия на сървъра: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id16660875_fakebook_posts`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` varchar(5000) DEFAULT NULL,
  `comment_created` datetime NOT NULL,
  `comment_deleated` datetime DEFAULT NULL,
  `comment_image` varchar(200) DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_text`, `comment_created`, `comment_deleated`, `comment_image`, `post_id`) VALUES
(28, 24, 'Споделете с нас.', '2021-04-23 14:14:23', NULL, 'uploads/comments_uploads/', 52),
(29, 26, 'Привет', '2021-04-23 14:19:41', NULL, 'uploads/comments_uploads/', 49),
(31, 27, 'И ние така мислим. А сме още в началото. ', '2021-04-24 15:45:18', NULL, 'uploads/comments_uploads/', 62);

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `text`, `image`, `created_at`, `deleted_at`) VALUES
(49, 24, 'Добър ден!', 'uploads/posts_uploads/20201101_132302.jpg', '2021-04-23 14:06:27', NULL),
(50, 24, 'Как сте днес?', 'uploads/posts_uploads/', '2021-04-23 14:07:40', NULL),
(51, 25, 'Здравей, аз съм Алекс!', 'uploads/posts_uploads/1.jpg', '2021-04-23 14:08:34', NULL),
(52, 25, 'Имам въпрос...', 'uploads/posts_uploads/', '2021-04-23 14:13:05', NULL),
(55, 26, 'Някой може ли да ми каже какво мога да правя във &quot;фейкбук&quot;?', 'uploads/posts_uploads/', '2021-04-24 15:24:57', NULL),
(56, 27, 'Здравей Иван, в Fakebook освен, че можеш да си създадеш профил и да влизаш в него когато поискаш, можеш също така да споделяш с останалите каквото поискаш. ', 'uploads/posts_uploads/', '2021-04-24 15:32:35', NULL),
(57, 27, 'А всяка публикация може да бъде коментирана от регистрирани потребители. Освен това, към коментарите и публикациите можете д прикачвате снимка.', 'uploads/posts_uploads/', '2021-04-24 15:34:07', NULL),
(58, 27, 'И още нещо за публикациите - те могат да бъдат харесвани от регистрирани потрбители.', 'uploads/posts_uploads/', '2021-04-24 15:35:18', NULL),
(59, 27, 'Всеки потребител, който не е влязъл в профила си може само да преглежда публикациите и коментарите.', 'uploads/posts_uploads/', '2021-04-24 15:36:42', NULL),
(60, 27, 'И незабравяй да излизаш от профила си!', 'uploads/posts_uploads/', '2021-04-24 15:40:06', NULL),
(61, 27, 'Много ще се радваме ако споделиш с приятели.', 'uploads/posts_uploads/', '2021-04-24 15:41:37', NULL),
(62, 26, 'Лол... Звучи страхотно.', 'uploads/posts_uploads/', '2021-04-24 15:43:45', NULL);

-- --------------------------------------------------------

--
-- Структура на таблица `posts_likes`
--

CREATE TABLE `posts_likes` (
  `like_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts_likes`
--

INSERT INTO `posts_likes` (`like_id`, `post_id`, `user_id`) VALUES
(52, 49, 24),
(53, 50, 24),
(54, 51, 25),
(55, 49, 25),
(56, 50, 25),
(57, 52, 24),
(58, 60, 26),
(59, 62, 27);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`) VALUES
(24, 'Radoslav Conev', '$2y$10$0nZrxWQn1SUrXfPOW19DPuFnE.3JIj4V1nCJFeqkKt5pndYYhlVky', 'rrc@gmail.com'),
(25, 'Александър Младенов', '$2y$10$Tbu1kDJxL8GpeQJNpn3t0OqmquSh44jNE1Asq3yWLT4LJTCpAgFZa', 'alelksmladenov1811@gmail.com'),
(26, 'Ivan Trudowvic', '$2y$10$p46ZHtd5oXmnxG.BYsIt1.eqmt0/4jZP3w1qws8UaCyAxj3mFrzmK', 'iv.221@yahoo.com'),
(27, 'Fakeadmin', '$2y$10$8Ov8wy/u/XDjRcn9.jgyBuG2g3t0NhwnERdBlihG/EShgd9cA4fYG', '222adm@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

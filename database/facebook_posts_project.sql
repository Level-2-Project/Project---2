-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 апр 2021 в 18:43
-- Версия на сървъра: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_posts_project`
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
(6, 1, '121212121212', '2021-03-22 15:35:02', NULL, '', 5),
(7, 2, '3434343434343', '2021-03-22 15:36:11', NULL, '', 5),
(8, 2, 'test#12', '2021-03-30 14:33:11', NULL, 'uploads/comments_uploads/', 5),
(9, 2, 'test for long post 1', '2021-04-05 16:32:16', NULL, 'uploads/comments_uploads/', 5),
(10, 2, 'test for long post 2', '2021-04-05 16:35:34', NULL, 'uploads/comments_uploads/', 6),
(11, 2, 'test comment on no words', '2021-04-05 17:14:15', NULL, 'uploads/comments_uploads/', 17),
(12, 2, 'test comment on no words with picture', '2021-04-05 17:30:48', NULL, 'uploads/comments_uploads/', 17),
(13, 2, 'picture', '2021-04-05 17:31:11', NULL, 'uploads/comments_uploads/flag-of-bulgaria.png', 17),
(14, 2, 'picture for hall of fame', '2021-04-05 17:32:16', NULL, 'uploads/comments_uploads/Sports-Hall-of-Fame-2.png', 37);

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
(5, 2, '22222', '', '2021-03-22 15:34:58', NULL),
(6, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in sagittis odio. Integer dictum leo non ultricies semper. Donec porttitor magna in viverra finibus. Donec id placerat arcu. Phasellus hendrerit efficitur mi lobortis bibendum. Aenean rhoncus urna ac mi commodo, non porttitor massa faucibus. Sed imperdiet pellentesque luctus. Mauris porttitor, odio sit amet venenatis aliquet, libero felis faucibus risus, sed egestas odio eros vitae turpis. Cras at libero et turpis commodo laoreet sodales vitae est. Sed justo nibh, aliquam et vestibulum in, aliquet a libero. Donec vel accumsan magna, ut scelerisque eros. Vestibulum nulla metus, porta in molestie a, semper ac tellus. Pellentesque lectus leo, hendrerit at ligula eu, tempus ultrices sem. Quisque lacinia dictum mi, non dignissim arcu egestas at. Aenean efficitur faucibus varius.\r\n\r\nVivamus at turpis velit. Pellentesque blandit, quam et dictum ornare, risus ante pulvinar magna, eu mollis nunc sem vitae massa. Praesent porta faucibus maximus. Nullam eget maximus mauris. Mauris non augue et nisi commodo tempus sit amet sed nisl. Vivamus nibh ipsum, porttitor non leo eu, varius venenatis justo. Cras risus nulla, fringilla porttitor purus ut, commodo posuere diam. Suspendisse quis lectus eget dolor volutpat volutpat. Aliquam erat volutpat. Suspendisse sed nisi in ex tristique lobortis. Proin in arcu vel diam pellentesque vulputate nec eget sapien. Aenean sed orci porta, cursus justo nec, consectetur nulla. Maecenas imperdiet finibus lacus. Suspendisse gravida mauris a lorem hendrerit maximus.', '', '2021-03-22 16:02:26', NULL),
(8, 2, 'Nunc consequat eu nunc at bibendum. Mauris eget lacus luctus, ornare massa eu, luctus ante. Suspendisse tempor orci ut ipsum dictum, nec luctus orci porta. Aenean ornare viverra odio in dignissim. Donec velit nulla, ornare vel leo eget, vulputate mollis lacus. Nunc malesuada gravida est eget auctor. Praesent dapibus velit sed quam suscipit, non luctus lectus egestas. Ut ut diam neque. Duis ultricies dolor in urna lobortis, eu sagittis dui hendrerit. Etiam vestibulum sollicitudin suscipit.\r\n\r\nSed mattis in sapien sed pellentesque. Sed sollicitudin arcu et orci imperdiet, sed eleifend felis porttitor. Donec efficitur, orci id rutrum gravida, magna nulla porttitor sem, vel faucibus massa risus vel ipsum. Curabitur pellentesque tortor in est varius, vel sodales lorem mollis. Nullam et leo ante. Fusce feugiat metus id augue efficitur, id pulvinar nunc consequat. Aenean non massa faucibus, ornare felis id, semper leo. Proin sollicitudin arcu a lacus ullamcorper semper. Donec sagittis lectus at libero sodales aliquam. Sed eleifend pharetra mauris nec luctus. Aenean at nunc a mi egestas volutpat quis eu dolor. Nam vel', '', '2021-03-22 16:03:16', NULL),
(9, 2, 'Nunc consequat eu nunc at bibendum. Mauris eget lacus luctus, ornare massa eu, luctus ante. Suspendisse tempor orci ut ipsum dictum, nec luctus orci porta. Aenean ornare viverra odio in dignissim. Donec velit nulla, ornare vel leo eget, vulputate mollis lacus. Nunc malesuada gravida est eget auctor. Praesent dapibus velit sed quam suscipit, non luctus lectus egestas. Ut ut diam neque. Duis ultricies dolor in urna lobortis, eu sagittis dui hendrerit. Etiam vestibulum sollicitudin suscipit.\r\n\r\nSed mattis in sapien sed pellentesque. Sed sollicitudin arcu et orci imperdiet, sed eleifend felis porttitor. Donec efficitur, orci id rutrum gravida, magna nulla porttitor sem, vel faucibus massa risus vel ipsum. Curabitur pellentesque tortor in est varius, vel sodales lorem mollis. Nullam et leo ante. Fusce feugiat metus id augue efficitur, id pulvinar nunc consequat. Aenean non massa faucibus, ornare felis id, semper leo. Proin sollicitudin arcu a lacus ullamcorper semper. Donec sagittis lectus at libero sodales aliquam. Sed eleifend pharetra mauris nec luctus. Aenean at nunc a mi egestas volutpat quis eu dolor. Nam vel', '', '2021-03-22 16:03:18', NULL),
(13, 2, 'Първия пост написан от бутона \"пост\"', '', '2021-03-24 00:00:00', NULL),
(14, 2, 'Втория пост от бутона', '', '2021-03-24 03:59:05', NULL),
(15, 2, '3th post', '', '2021-03-24 05:01:48', NULL),
(17, 1, 'Нямам думи.', '', '2021-03-24 05:05:02', NULL),
(18, 9, 'arhhh mql', '', '2021-03-24 05:07:18', NULL),
(19, 9, 'hiii', '', '2021-03-24 05:07:57', NULL),
(20, 9, 'have a nice day', '', '2021-03-24 17:09:55', NULL),
(25, 2, 'image test 2', 'uploads/posts_uploads/3-планета.jpg', '2021-03-27 13:58:33', NULL),
(27, 2, 'like test #1', '', '2021-03-30 12:57:53', NULL),
(28, 1, 'image test after comment build', 'uploads/posts_uploads/cloud.jpg', '2021-03-30 14:04:38', NULL),
(29, 1, 'image test #3', NULL, '2021-03-30 14:07:51', NULL),
(30, 1, 'image test #5', 'uploads/posts_uploads/', '2021-03-30 14:08:34', NULL),
(31, 1, '123456', 'uploads/posts_uploads/', '2021-03-30 14:18:47', NULL),
(32, 2, 'image 655656', 'uploads/posts_uploads/20201102_153720.jpg', '2021-03-30 14:26:36', NULL),
(33, 2, 'image test', 'uploads/posts_uploads/', '2021-03-30 14:41:51', NULL),
(34, 1, 'image test#100000', 'uploads/posts_uploads/', '2021-03-30 14:54:08', NULL),
(35, 1, 'image test', 'uploads/posts_uploads/', '2021-03-30 15:01:21', NULL),
(36, 11, 'Прекрасно приложение!!', 'uploads/posts_uploads/6-луна.jpg', '2021-03-31 21:19:32', NULL),
(37, 2, 'post and comements with pictures ', 'uploads/posts_uploads/Sports-Hall-of-Fame-2.png', '2021-04-05 17:31:47', NULL);

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
(22, 13, 1),
(24, 5, 1),
(25, 8, 2),
(27, 9, 1),
(32, 6, 2),
(34, 6, 1),
(35, 17, 1),
(36, 28, 1),
(37, 29, 1),
(38, 30, 1),
(39, 31, 1),
(40, 17, 2);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`) VALUES
(1, 'Радослав Цонев', '1234567890', 'rts.conev@gmail.com'),
(2, 'Александър Младенов', '0987654321', 'aleksmladenov1811@gmail.com'),
(8, 'Bob Conev', 'bobemalkopile', '2019@gmail.com'),
(9, 'Piperka Coneva', 'piperkaemalkopile', '2019@gmail.com'),
(10, 'Archie Mladenov', 'Archie1803', 'archiemladenov1803@gmail.com'),
(11, 'Петя Цонева', '1234567890', 'test@mail.de');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

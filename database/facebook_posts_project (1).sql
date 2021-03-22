-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 март 2021 в 18:27
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
  `created_at` datetime NOT NULL,
  `deleated_at` datetime DEFAULT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `comment_text`, `created_at`, `deleated_at`, `post_id`) VALUES
(6, 1, '121212121212', '2021-03-22 15:35:02', NULL, 5),
(7, 2, '3434343434343', '2021-03-22 15:36:11', NULL, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `text`, `created_at`, `deleted_at`) VALUES
(5, 2, '22222', '2021-03-22 15:34:58', NULL),
(6, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in sagittis odio. Integer dictum leo non ultricies semper. Donec porttitor magna in viverra finibus. Donec id placerat arcu. Phasellus hendrerit efficitur mi lobortis bibendum. Aenean rhoncus urna ac mi commodo, non porttitor massa faucibus. Sed imperdiet pellentesque luctus. Mauris porttitor, odio sit amet venenatis aliquet, libero felis faucibus risus, sed egestas odio eros vitae turpis. Cras at libero et turpis commodo laoreet sodales vitae est. Sed justo nibh, aliquam et vestibulum in, aliquet a libero. Donec vel accumsan magna, ut scelerisque eros. Vestibulum nulla metus, porta in molestie a, semper ac tellus. Pellentesque lectus leo, hendrerit at ligula eu, tempus ultrices sem. Quisque lacinia dictum mi, non dignissim arcu egestas at. Aenean efficitur faucibus varius.\r\n\r\nVivamus at turpis velit. Pellentesque blandit, quam et dictum ornare, risus ante pulvinar magna, eu mollis nunc sem vitae massa. Praesent porta faucibus maximus. Nullam eget maximus mauris. Mauris non augue et nisi commodo tempus sit amet sed nisl. Vivamus nibh ipsum, porttitor non leo eu, varius venenatis justo. Cras risus nulla, fringilla porttitor purus ut, commodo posuere diam. Suspendisse quis lectus eget dolor volutpat volutpat. Aliquam erat volutpat. Suspendisse sed nisi in ex tristique lobortis. Proin in arcu vel diam pellentesque vulputate nec eget sapien. Aenean sed orci porta, cursus justo nec, consectetur nulla. Maecenas imperdiet finibus lacus. Suspendisse gravida mauris a lorem hendrerit maximus.', '2021-03-22 16:02:26', NULL),
(8, 2, 'Nunc consequat eu nunc at bibendum. Mauris eget lacus luctus, ornare massa eu, luctus ante. Suspendisse tempor orci ut ipsum dictum, nec luctus orci porta. Aenean ornare viverra odio in dignissim. Donec velit nulla, ornare vel leo eget, vulputate mollis lacus. Nunc malesuada gravida est eget auctor. Praesent dapibus velit sed quam suscipit, non luctus lectus egestas. Ut ut diam neque. Duis ultricies dolor in urna lobortis, eu sagittis dui hendrerit. Etiam vestibulum sollicitudin suscipit.\r\n\r\nSed mattis in sapien sed pellentesque. Sed sollicitudin arcu et orci imperdiet, sed eleifend felis porttitor. Donec efficitur, orci id rutrum gravida, magna nulla porttitor sem, vel faucibus massa risus vel ipsum. Curabitur pellentesque tortor in est varius, vel sodales lorem mollis. Nullam et leo ante. Fusce feugiat metus id augue efficitur, id pulvinar nunc consequat. Aenean non massa faucibus, ornare felis id, semper leo. Proin sollicitudin arcu a lacus ullamcorper semper. Donec sagittis lectus at libero sodales aliquam. Sed eleifend pharetra mauris nec luctus. Aenean at nunc a mi egestas volutpat quis eu dolor. Nam vel', '2021-03-22 16:03:16', NULL),
(9, 2, 'Nunc consequat eu nunc at bibendum. Mauris eget lacus luctus, ornare massa eu, luctus ante. Suspendisse tempor orci ut ipsum dictum, nec luctus orci porta. Aenean ornare viverra odio in dignissim. Donec velit nulla, ornare vel leo eget, vulputate mollis lacus. Nunc malesuada gravida est eget auctor. Praesent dapibus velit sed quam suscipit, non luctus lectus egestas. Ut ut diam neque. Duis ultricies dolor in urna lobortis, eu sagittis dui hendrerit. Etiam vestibulum sollicitudin suscipit.\r\n\r\nSed mattis in sapien sed pellentesque. Sed sollicitudin arcu et orci imperdiet, sed eleifend felis porttitor. Donec efficitur, orci id rutrum gravida, magna nulla porttitor sem, vel faucibus massa risus vel ipsum. Curabitur pellentesque tortor in est varius, vel sodales lorem mollis. Nullam et leo ante. Fusce feugiat metus id augue efficitur, id pulvinar nunc consequat. Aenean non massa faucibus, ornare felis id, semper leo. Proin sollicitudin arcu a lacus ullamcorper semper. Donec sagittis lectus at libero sodales aliquam. Sed eleifend pharetra mauris nec luctus. Aenean at nunc a mi egestas volutpat quis eu dolor. Nam vel', '2021-03-22 16:03:18', NULL);

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
(1, 'Радослав Цонев', '12345', 'rts.conev@gmail.com'),
(2, 'Александър Младенов', '0987654321', 'aleksmladenov1811@gmail.com');

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
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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

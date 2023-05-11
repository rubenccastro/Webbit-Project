-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 03:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(16) NOT NULL,
  `description` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'welcome', 'The \"Welcome\" category is a space where users can introduce themselves and share a bit about who they are. This category is a great place to post when you are new to a community or platform, as it allows other members to get to know you and welcome you into Webbit.', 1),
(2, 'werhgear', 'haerheraheh', 2),
(3, 'Games', 'Games', 2),
(4, 'Culture', 'Culture\r\n', 2),
(5, 'Portugal', 'Portugal', 2),
(6, 'Sweden', 'SW', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `created_in`) VALUES
(4, 'sehrthethrrhst', 2, 14, '2023-05-11 13:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `karmapoints`
--

CREATE TABLE `karmapoints` (
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `vote_value` int(11) NOT NULL DEFAULT 0,
  `votestate` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karmapoints`
--

INSERT INTO `karmapoints` (`users_id`, `posts_id`, `vote_value`, `votestate`) VALUES
(2, 9, 1, 'up'),
(2, 8, 1, 'up'),
(2, 10, 1, 'up'),
(1, 11, 1, 'up'),
(1, 10, 1, 'up'),
(1, 9, 1, 'up'),
(1, 8, 1, 'up');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `karmapoints` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `user_id`, `karmapoints`, `category_id`, `created_in`) VALUES
(8, '  Lorem ipsum dolor sit amet, consectetur adipisci', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur mattis felis id viverra. Curabitur orci eros, rhoncus vitae luctus ac, dapibus eu sapien. Vivamus sodales dui magna, vel facilisis dui aliquam sed. Curabitur ornare metus eu lorem tincidunt fermentum. Duis porttitor nisl ac magna mattis suscipit. Nulla cursus ipsum eu est varius, sed semper ante facilisis. Nulla dictum in leo eu euismod. Nunc interdum, orci eget auctor vestibulum, lectus turpis posuere risus, vitae aliquet urna orci rhoncus purus. Maecenas sed faucibus lacus, vel tincidunt ex. Phasellus risus leo, iaculis quis efficitur quis, pulvinar eget urna.\r\n\r\nPraesent et enim orci. In eget erat efficitur diam posuere viverra in in diam. Nam sollicitudin risus ac libero molestie dapibus. Praesent luctus ullamcorper tristique. Cras odio leo, eleifend ac accumsan et, egestas sed augue. Proin iaculis eleifend molestie. Donec eu placerat diam, nec fermentum massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ipsum et odio commodo dapibus ut in ante. Sed gravida semper libero in porttitor. Fusce nec varius felis. Nulla eleifend eleifend magna a consectetur. Mauris et risus feugiat, tristique libero at, convallis augue. In lorem ligula, aliquam eu eros ut, congue euismod ante. Ut at sodales sem.\r\n\r\nCras auctor quam quis ante rhoncus, at tincidunt lacus lacinia. Quisque eu nibh eu tellus porttitor congue. Nulla malesuada sit amet odio et gravida. Nullam suscipit viverra libero, quis malesuada magna finibus eu. Nam viverra nec purus ut convallis. Donec placerat nunc eget nunc tristique feugiat. Quisque tristique dolor purus, quis pellentesque augue porta vel. In viverra, neque sed sagittis tempus, lorem lorem interdum augue, vitae convallis neque nibh a magna. Donec porttitor purus eget eros egestas volutpat. Aenean feugiat lorem nec justo pretium vulputate. Morbi pulvinar ipsum et tortor venenatis, malesuada tincidunt augue volutpat. Aenean condimentum aliquet turpis. Cras aliquam vulputate orci, et lacinia elit hendrerit at. In ullamcorper sit amet nisl eu semper. Mauris commodo metus sed ante molestie dictum. Cras consequat urna eget semper vulputate.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae efficitur urna. Fusce eleifend congue cursus. Duis sit amet feugiat tellus. Nam a gravida nunc. Nam pulvinar vel nisi vel tincidunt. Praesent pulvinar non purus quis tristique. In hac habitasse platea dictumst. Quisque est nisi, efficitur dapibus aliquet sit amet, tincidunt eget felis. Nullam nec placerat orci, eget porttitor ipsum. Duis ullamcorper arcu id nisi faucibus mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan tempus laoreet. Nulla at nibh justo. Nunc a condimentum diam. ', 2, 2, 1, '2023-05-10 22:18:57'),
(9, '  Lorem ipsum dolor sit amet, consectetur adipisci', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur mattis felis id viverra. Curabitur orci eros, rhoncus vitae luctus ac, dapibus eu sapien. Vivamus sodales dui magna, vel facilisis dui aliquam sed. Curabitur ornare metus eu lorem tincidunt fermentum. Duis porttitor nisl ac magna mattis suscipit. Nulla cursus ipsum eu est varius, sed semper ante facilisis. Nulla dictum in leo eu euismod. Nunc interdum, orci eget auctor vestibulum, lectus turpis posuere risus, vitae aliquet urna orci rhoncus purus. Maecenas sed faucibus lacus, vel tincidunt ex. Phasellus risus leo, iaculis quis efficitur quis, pulvinar eget urna.\r\n\r\nPraesent et enim orci. In eget erat efficitur diam posuere viverra in in diam. Nam sollicitudin risus ac libero molestie dapibus. Praesent luctus ullamcorper tristique. Cras odio leo, eleifend ac accumsan et, egestas sed augue. Proin iaculis eleifend molestie. Donec eu placerat diam, nec fermentum massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ipsum et odio commodo dapibus ut in ante. Sed gravida semper libero in porttitor. Fusce nec varius felis. Nulla eleifend eleifend magna a consectetur. Mauris et risus feugiat, tristique libero at, convallis augue. In lorem ligula, aliquam eu eros ut, congue euismod ante. Ut at sodales sem.\r\n\r\nCras auctor quam quis ante rhoncus, at tincidunt lacus lacinia. Quisque eu nibh eu tellus porttitor congue. Nulla malesuada sit amet odio et gravida. Nullam suscipit viverra libero, quis malesuada magna finibus eu. Nam viverra nec purus ut convallis. Donec placerat nunc eget nunc tristique feugiat. Quisque tristique dolor purus, quis pellentesque augue porta vel. In viverra, neque sed sagittis tempus, lorem lorem interdum augue, vitae convallis neque nibh a magna. Donec porttitor purus eget eros egestas volutpat. Aenean feugiat lorem nec justo pretium vulputate. Morbi pulvinar ipsum et tortor venenatis, malesuada tincidunt augue volutpat. Aenean condimentum aliquet turpis. Cras aliquam vulputate orci, et lacinia elit hendrerit at. In ullamcorper sit amet nisl eu semper. Mauris commodo metus sed ante molestie dictum. Cras consequat urna eget semper vulputate.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae efficitur urna. Fusce eleifend congue cursus. Duis sit amet feugiat tellus. Nam a gravida nunc. Nam pulvinar vel nisi vel tincidunt. Praesent pulvinar non purus quis tristique. In hac habitasse platea dictumst. Quisque est nisi, efficitur dapibus aliquet sit amet, tincidunt eget felis. Nullam nec placerat orci, eget porttitor ipsum. Duis ullamcorper arcu id nisi faucibus mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan tempus laoreet. Nulla at nibh justo. Nunc a condimentum diam. ', 2, 2, 1, '2023-05-10 22:19:12'),
(10, '  Lorem ipsum dolor sit amet, consectetur adipisci', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur mattis felis id viverra. Curabitur orci eros, rhoncus vitae luctus ac, dapibus eu sapien. Vivamus sodales dui magna, vel facilisis dui aliquam sed. Curabitur ornare metus eu lorem tincidunt fermentum. Duis porttitor nisl ac magna mattis suscipit. Nulla cursus ipsum eu est varius, sed semper ante facilisis. Nulla dictum in leo eu euismod. Nunc interdum, orci eget auctor vestibulum, lectus turpis posuere risus, vitae aliquet urna orci rhoncus purus. Maecenas sed faucibus lacus, vel tincidunt ex. Phasellus risus leo, iaculis quis efficitur quis, pulvinar eget urna.\r\n\r\nPraesent et enim orci. In eget erat efficitur diam posuere viverra in in diam. Nam sollicitudin risus ac libero molestie dapibus. Praesent luctus ullamcorper tristique. Cras odio leo, eleifend ac accumsan et, egestas sed augue. Proin iaculis eleifend molestie. Donec eu placerat diam, nec fermentum massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ipsum et odio commodo dapibus ut in ante. Sed gravida semper libero in porttitor. Fusce nec varius felis. Nulla eleifend eleifend magna a consectetur. Mauris et risus feugiat, tristique libero at, convallis augue. In lorem ligula, aliquam eu eros ut, congue euismod ante. Ut at sodales sem.\r\n\r\nCras auctor quam quis ante rhoncus, at tincidunt lacus lacinia. Quisque eu nibh eu tellus porttitor congue. Nulla malesuada sit amet odio et gravida. Nullam suscipit viverra libero, quis malesuada magna finibus eu. Nam viverra nec purus ut convallis. Donec placerat nunc eget nunc tristique feugiat. Quisque tristique dolor purus, quis pellentesque augue porta vel. In viverra, neque sed sagittis tempus, lorem lorem interdum augue, vitae convallis neque nibh a magna. Donec porttitor purus eget eros egestas volutpat. Aenean feugiat lorem nec justo pretium vulputate. Morbi pulvinar ipsum et tortor venenatis, malesuada tincidunt augue volutpat. Aenean condimentum aliquet turpis. Cras aliquam vulputate orci, et lacinia elit hendrerit at. In ullamcorper sit amet nisl eu semper. Mauris commodo metus sed ante molestie dictum. Cras consequat urna eget semper vulputate.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae efficitur urna. Fusce eleifend congue cursus. Duis sit amet feugiat tellus. Nam a gravida nunc. Nam pulvinar vel nisi vel tincidunt. Praesent pulvinar non purus quis tristique. In hac habitasse platea dictumst. Quisque est nisi, efficitur dapibus aliquet sit amet, tincidunt eget felis. Nullam nec placerat orci, eget porttitor ipsum. Duis ullamcorper arcu id nisi faucibus mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan tempus laoreet. Nulla at nibh justo. Nunc a condimentum diam. ', 2, 2, 1, '2023-05-10 22:19:16'),
(11, '  Lorem ipsum dolor sit amet, consectetur adipisci', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur mattis felis id viverra. Curabitur orci eros, rhoncus vitae luctus ac, dapibus eu sapien. Vivamus sodales dui magna, vel facilisis dui aliquam sed. Curabitur ornare metus eu lorem tincidunt fermentum. Duis porttitor nisl ac magna mattis suscipit. Nulla cursus ipsum eu est varius, sed semper ante facilisis. Nulla dictum in leo eu euismod. Nunc interdum, orci eget auctor vestibulum, lectus turpis posuere risus, vitae aliquet urna orci rhoncus purus. Maecenas sed faucibus lacus, vel tincidunt ex. Phasellus risus leo, iaculis quis efficitur quis, pulvinar eget urna.\r\n\r\nPraesent et enim orci. In eget erat efficitur diam posuere viverra in in diam. Nam sollicitudin risus ac libero molestie dapibus. Praesent luctus ullamcorper tristique. Cras odio leo, eleifend ac accumsan et, egestas sed augue. Proin iaculis eleifend molestie. Donec eu placerat diam, nec fermentum massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed ipsum et odio commodo dapibus ut in ante. Sed gravida semper libero in porttitor. Fusce nec varius felis. Nulla eleifend eleifend magna a consectetur. Mauris et risus feugiat, tristique libero at, convallis augue. In lorem ligula, aliquam eu eros ut, congue euismod ante. Ut at sodales sem.\r\n\r\nCras auctor quam quis ante rhoncus, at tincidunt lacus lacinia. Quisque eu nibh eu tellus porttitor congue. Nulla malesuada sit amet odio et gravida. Nullam suscipit viverra libero, quis malesuada magna finibus eu. Nam viverra nec purus ut convallis. Donec placerat nunc eget nunc tristique feugiat. Quisque tristique dolor purus, quis pellentesque augue porta vel. In viverra, neque sed sagittis tempus, lorem lorem interdum augue, vitae convallis neque nibh a magna. Donec porttitor purus eget eros egestas volutpat. Aenean feugiat lorem nec justo pretium vulputate. Morbi pulvinar ipsum et tortor venenatis, malesuada tincidunt augue volutpat. Aenean condimentum aliquet turpis. Cras aliquam vulputate orci, et lacinia elit hendrerit at. In ullamcorper sit amet nisl eu semper. Mauris commodo metus sed ante molestie dictum. Cras consequat urna eget semper vulputate.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vitae efficitur urna. Fusce eleifend congue cursus. Duis sit amet feugiat tellus. Nam a gravida nunc. Nam pulvinar vel nisi vel tincidunt. Praesent pulvinar non purus quis tristique. In hac habitasse platea dictumst. Quisque est nisi, efficitur dapibus aliquet sit amet, tincidunt eget felis. Nullam nec placerat orci, eget porttitor ipsum. Duis ullamcorper arcu id nisi faucibus mollis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan tempus laoreet. Nulla at nibh justo. Nunc a condimentum diam. ', 2, 1, 2, '2023-05-10 22:19:24'),
(12, 'egafh', 'afdhdfh', 2, 0, 1, '2023-05-11 12:16:09'),
(13, 'afdhdfahfdh', 'sfhgadfsh', 2, 0, 1, '2023-05-11 12:53:01'),
(14, 'wICKED', 'Wicked\r\n', 2, 0, 3, '2023-05-11 13:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `karmapoints` int(11) NOT NULL DEFAULT 0,
  `description` varchar(256) DEFAULT NULL,
  `country` varchar(256) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `created_in` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `karmapoints`, `description`, `country`, `role_id`, `created_in`) VALUES
(1, 'admin', '$2y$10$IecB2KqGacpkVUTNVpiqv.Oue0uK/sRU1abbVEcgQ5tk3Sqbg9DPS', 'admin@webbit.com', 0, NULL, NULL, 1, '2023-05-09 16:17:36'),
(2, 'ruben', '$2y$10$BVrX3ySM435f7j7bEXI1zONtugvtjfca0nD.toMI9jm97wGK9xy9.', 'ruben@teste.com', 0, NULL, NULL, 1, '2023-05-09 23:47:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `karmapoints`
--
ALTER TABLE `karmapoints`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `karmapoints`
--
ALTER TABLE `karmapoints`
  ADD CONSTRAINT `karmapoints_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `karmapoints_ibfk_2` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

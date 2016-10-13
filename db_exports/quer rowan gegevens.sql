-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 okt 2016 om 12:42
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quer`
--

--
-- Gegevens worden geëxporteerd voor tabel `advertisements`
--

INSERT INTO `advertisements` (`id`, `user_id`, `event_id`, `private_description`, `price`, `created_at`, `updated_at`) VALUES
(9, 12, 22, 'asdfasdf', '3.0000', '2016-10-07 11:19:03', '2016-10-07 11:19:03'),
(10, 12, 23, 'dfsdf', '1.0000', '2016-10-07 11:21:35', '2016-10-07 11:21:35'),
(12, 13, 24, 'erqwerqwer', '3.0000', '2016-10-08 18:29:10', '2016-10-08 18:29:10');

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `location`, `city`, `url`, `date_start_sell`, `date_event`, `image`, `tags`, `categorie_id`, `code`, `created_at`, `updated_at`) VALUES
(6, 'testtest 3', 'hoi ik ben rowan', 'asdfa', 'asdf', 'http://www.google.com', '2016-01-01 01:00:00', '1991-01-02 01:01:00', '06-10-2016_6.jpg', NULL, 1, 1, '2016-10-06 10:43:13', '2016-10-06 10:43:13'),
(7, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_7.jpg', NULL, 0, 0, '2016-10-06 16:59:45', '2016-10-06 16:59:45'),
(8, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_8.jpg', NULL, 0, 0, '2016-10-06 17:00:01', '2016-10-06 17:00:01'),
(9, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_9.jpg', NULL, 0, 0, '2016-10-06 17:00:04', '2016-10-06 17:00:04'),
(10, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_10.jpg', NULL, 0, 0, '2016-10-06 17:00:07', '2016-10-06 17:00:07'),
(11, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_11.jpg', NULL, 0, 0, '2016-10-06 17:00:10', '2016-10-06 17:00:10'),
(12, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_12.jpg', NULL, 0, 0, '2016-10-06 17:00:13', '2016-10-06 17:00:13'),
(13, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_13.jpg', NULL, 0, 0, '2016-10-06 17:00:15', '2016-10-06 17:00:15'),
(14, 'asdfasd', 'dfdafa', 'jhg', 'jhg', 'https://www.google.be/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=specifieren', '2016-10-20 13:04:00', '2016-03-02 01:00:00', '06-10-2016_14.jpg', NULL, 0, 0, '2016-10-06 17:00:17', '2016-10-06 17:00:17'),
(15, 'sadfasdf', 'asdfasdfas', 'asdfasdf', 'asdfasdf', 'http://www.google.com', '2016-02-01 13:00:00', '2016-01-01 01:01:00', NULL, NULL, 0, 0, '2016-10-07 08:43:08', '2016-10-07 08:43:08'),
(16, 'fgdfg', 'sdfgdsfg', 'dsfgdsfg', 'dsfgdsfg', 'http://www.google.com', '2017-03-01 13:00:00', '2016-01-02 01:01:00', '07-10-2016_16.jpg', NULL, 0, 0, '2016-10-07 10:46:36', '2016-10-07 10:46:36'),
(17, 'fgdfg', 'sdfgdsfg', 'dsfgdsfg', 'dsfgdsfg', 'http://www.google.com', '2017-03-01 13:00:00', '2016-01-02 01:01:00', '07-10-2016_17.jpg', NULL, 0, 0, '2016-10-07 10:48:24', '2016-10-07 10:48:24'),
(18, 'fgdfg', 'sdfgdsfg', 'dsfgdsfg', 'dsfgdsfg', 'http://www.google.com', '2017-03-01 13:00:00', '2016-01-02 01:01:00', '07-10-2016_18.jpg', NULL, 0, 0, '2016-10-07 10:48:47', '2016-10-07 10:48:47'),
(19, 'event 2', 'asdfsadf', 'asdfsadfasdf', 'aasdfasdf', 'http://www.google.com', '2017-02-01 01:01:00', '2016-02-02 14:00:00', '07-10-2016_19.JPG', NULL, 0, 0, '2016-10-07 11:04:40', '2016-10-07 11:04:40'),
(20, 'test honderduzend', 'dfasdf', 'dsfsdf', 'sdfsd', 'http://www.google.com', '2016-03-02 14:00:00', '2016-01-01 01:01:00', '07-10-2016_20.jpg', NULL, 0, 0, '2016-10-07 11:07:30', '2016-10-07 11:07:30'),
(21, 'dfsdf', 'sdfsdfs', 'sdfsdf', 'sdfsdf', 'http://www.google.com', '2016-01-01 02:00:00', '2016-02-02 14:00:00', '07-10-2016_21.JPG', NULL, 0, 0, '2016-10-07 11:09:00', '2016-10-07 11:09:00'),
(22, 'testtest 343', 'fgdsfgsdfg', 'fsgsdfgsdfg', 'sdfgsdfgsdfg', 'http://www.google.com', '2016-02-01 01:00:00', '2016-02-01 14:01:00', '07-10-2016_22.jpg', NULL, 0, 0, '2016-10-07 11:18:18', '2016-10-07 11:18:18'),
(23, 'yrydrydry34', 'dfgsdfg', 'dfgsdfg', 'sdfgdsfg', 'http://www.google.com', '2016-01-02 01:01:00', '2017-02-01 01:00:00', '07-10-2016_23.jpg', NULL, 0, 0, '2016-10-07 11:21:29', '2016-10-07 11:21:29'),
(24, 'Super vet Feest!', 'asdfasdfasdf', 'adfasdf', 'asdfasdf', 'http://www.google.com', '2016-01-01 01:01:00', '2016-01-01 02:00:00', '08-10-2016_24.jpg', NULL, 0, 0, '2016-10-08 18:29:06', '2016-10-08 18:29:06');

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_03_131149_events', 1),
('2016_10_03_131236_advertisements', 1),
('2016_10_03_131308_phases', 1),
('2016_10_03_131327_contracts', 1),
('2016_10_03_131625_reviews', 1),
('2016_10_03_131831_usr_adv', 1),
('2016_10_03_142134_categories', 1);

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `country`, `city`, `postal_code`, `street`, `house_number`, `phone_number`, `email`, `password`, `is_admin`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'Rowan', 'van Ekeren', 'rowanvanekeren', 'Netherlands', 'Rosmalen', '5241AT', 'Begoniastraat', '9', '645305361', 'rowanvanekeren@gmail.com', '$2y$10$w72aNVFz0TWIXaZK4HQeFeekS916cTvYaadA3J2mj8mHz7hUGLMBy', 0, '07-10-2016_rowanvanekeren.jpg', 'TfyS45lBOY5bJqSnfuvnNrqjX4uC7nx2l6Tu1M4IoPXss44AzVvllie42mS1', '2016-10-07 10:37:32', '2016-10-13 06:38:53'),
(13, 'joep', 'van t hek', 'joepie', 'Netherlands', 'Rosmalen', '5241AT', 'Begoniastraat 9', '3', '645305361', 'rowanvanekeren@gmil.com', '$2y$10$UEhJU51Ralu6Er5DutN92e2pD..1Gp6LJczePExzJhhoYx15rpLAG', 0, '08-10-2016_joepie.png', '1fNQa0VXJZQkyxuSFAibQEZRZqoCN2fWGMILGwG0k7RiHk8tKSwqy47AF0Xy', '2016-10-08 18:27:55', '2016-10-08 18:47:40');

--
-- Gegevens worden geëxporteerd voor tabel `usr_adv`
--

INSERT INTO `usr_adv` (`id`, `advertisement_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 10, 12, '2016-10-07 11:21:35', '2016-10-07 11:21:35'),
(10, 11, 12, '2016-10-07 11:22:48', '2016-10-07 11:22:48'),
(11, 12, 13, '2016-10-08 18:29:10', '2016-10-08 18:29:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

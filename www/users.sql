-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Апр 16 2025 г., 14:35
-- Версия сервера: 8.4.4
-- Версия PHP: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`) VALUES
(1, 'vmf@gmail.com', 'user', '$2y$10$QDx3nHJToWUFuzYtIZPKLOyHG/ERxX5aVCFc1p5S7OtI/wlu1pIAy'),
(3, 'retyu@ya.ru', 'user', '$2y$10$3Vvz2gXP2my0tNgiKzwWjuWgl8UAJBdO2kSYFtysNcvDPMrMmoVdy'),
(4, 'rtyui@ya.ru', 'user', '$2y$10$aQ.HzJiqhGRJoMjjV0VWGe6vC4k056Iv89/LWH1FIp3bHnKsx/nwy'),
(5, 'bfjkh@ya.ru', 'user', '$2y$10$irsuLjlIgaqKJ36uM579P.pUOb7BvX5lnZr7KIgGHNwWAB9EPtPBu'),
(6, 'tyu7@ya.com', 'user', '$2y$10$YH2LOMIIvdTQegzLFZvh6umXhgjIEjvgJfk5FQ0N6egKVu5ZRTM4G'),
(7, 'tlortyhl@mail.ru', 'user', '$2y$10$gI0XtHcufC9/QkVcNJEp4e5rdJC8wr2bOPcpwP5OCdBlddO.9z1CO');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Апр 28 2025 г., 11:54
-- Версия сервера: 8.4.5
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
  `password` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `recovery_code` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `recovery_code`, `name`, `surname`, `city`, `country`) VALUES
(3, 'retyu@ya.ru', 'user', '$2y$10$3Vvz2gXP2my0tNgiKzwWjuWgl8UAJBdO2kSYFtysNcvDPMrMmoVdy', 'YaDAxSPi4WI5v82TJwzuGgHKROn6oV', NULL, NULL, NULL, NULL),
(4, 'rtyui@ya.ru', 'user', '$2y$10$aQ.HzJiqhGRJoMjjV0VWGe6vC4k056Iv89/LWH1FIp3bHnKsx/nwy', NULL, NULL, NULL, NULL, NULL),
(5, 'bfjkh@ya.ru', 'user', '$2y$10$irsuLjlIgaqKJ36uM579P.pUOb7BvX5lnZr7KIgGHNwWAB9EPtPBu', NULL, NULL, NULL, NULL, NULL),
(6, 'tyu7@ya.com', 'user', '$2y$10$YH2LOMIIvdTQegzLFZvh6umXhgjIEjvgJfk5FQ0N6egKVu5ZRTM4G', NULL, NULL, NULL, NULL, NULL),
(7, 'tlortyhl@mail.ru', 'user', '$2y$10$gI0XtHcufC9/QkVcNJEp4e5rdJC8wr2bOPcpwP5OCdBlddO.9z1CO', NULL, NULL, NULL, NULL, NULL),
(8, 'eret@mail.com', 'user', '$2y$10$M.ZrZH..2SgHZovkS8jeS.4QILkDkYM.X.UxmpxbdaOA7rBmKzJHm', NULL, NULL, NULL, NULL, NULL),
(9, 'etyu@ya.ru', 'user', '$2y$10$5mkzU444GSsm4y.ra0UY5eNQOXcb.bWbve/6jKSqIpjUWk3gL4FdK', NULL, NULL, NULL, NULL, NULL),
(10, 'ya@ya.ru', 'user', '$2y$10$6i5GML7IR50jOraX3asTJuO1rHbmFXN2sJ1rEa0KtKKo8gu3zxNvC', '2z7cJpdWT0mufDQ1bi8StvGhLeKEA3', NULL, NULL, NULL, NULL),
(11, 'er@er.com', 'admin', '$2y$10$epgYBZjjI8fDdl4MuXyi1.s6jEXZcf7FVAH56fkA6upefhSi7Qt.C', NULL, 'Виктор', 'Бобров', 'Санкт-Петербург', 'Россия'),
(12, 'qw@qw.ru', 'user', '$2y$10$hn1TKRShDZuf4jRNYSBf..9zKMLjEZUuFnAesZlWg2i0Z6E7TA3oC', NULL, '1', 'Qw', 'Boston', 'USA');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

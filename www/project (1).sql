-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Июн 05 2025 г., 10:13
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
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `name`, `description`) VALUES
(1, 'Sergei', 'Тестовое описание');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Собаки'),
(2, 'Программирование'),
(3, 'Отдых');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post` int UNSIGNED DEFAULT NULL,
  `user` int UNSIGNED DEFAULT NULL,
  `timestamp` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `post`, `user`, `timestamp`) VALUES
(1, 'Hello', 18, 11, 1748505604),
(2, 'Комментарий. Главный', 18, 11, 1748508078),
(3, 'Очень смешно!', 18, 10, 1748509095),
(4, 'И не говори)', 18, 11, 1748509375),
(5, 'Comment 1', 15, 13, 1748513944),
(6, 'С днюхой!))', 12, 13, 1748513969);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `time`) VALUES
(3, 'Виктор', 'er@ty.com', 'Привет 2', 1749112924),
(4, 'КОля', 'uy@we.ru', '123456', 1749117361),
(5, 'КОля', 'uy@we.ru', '123456', 1749117377),
(6, 'КОля', 'uy@we.ru', '123456', 1749117919),
(7, 'КОля', 'uy@we.ru', '123456', 1749118105),
(8, 'КОля', 'uy@we.ru', '123456', 1749118261),
(9, 'КОля', 'uy@we.ru', '123456', 1749118308),
(10, 'КОля', 'uy@we.ru', '123456', 1749118315);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_520_ci,
  `cover` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cover_small` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `timestamp` int UNSIGNED DEFAULT NULL,
  `edit_t_ime` int UNSIGNED DEFAULT NULL,
  `edit_time` int UNSIGNED DEFAULT NULL,
  `cat` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `cover`, `cover_small`, `timestamp`, `edit_t_ime`, `edit_time`, `cat`) VALUES
(1, 'PHP', '<p>Отличный курс по PHP !&nbsp;</p>\r\n', '122232409842.png', '290-122232409842.png', NULL, 1748335907, 1748341490, 2),
(5, 'лучшее место в области', '<p>В общем, это лучшее место в ЛО, на наш вкус😊 Есть, с чем сравнить. Здесь все условия для восстановления сил: тишина, удаленность от соседей, купель и баня при желании. Можно покататься на лодке или сапах по Вуоксе (но мы не рискнули). Дом встретил теплом, светом, атмосферной музыкой и приятными ароматами. Дороговато, в сравнении даже с Охта парком, но почти полное отсутствие соседей с лихвой перекрывает этот финансовый минус. Не могу сказать, что собака в восторге, ведь она расслабляется только в своей берлоге на любимом диване. Ну а нам очень понравилось! Местечко называется Lagom и находится рядом с чудесным Приозерском</p>\r\n', '718644127157.jpg', '290-718644127157.jpg', 1747830187, NULL, 1748516665, 3),
(6, 'Домик в области', '<p>Еще фото с отпуска😎 Иногда мне кажется, что Молли очень маленькая. Но потом смотрю на фото, и она уже не кажется такой миниатюрной</p>\r\n', '215410531941.jpg', '290-215410531941.jpg', 1747830234, NULL, 1748516680, 1),
(7, 'Ура! Молли в эфире!', '<p>Очень давно не было инфы, а у Молли вот что приключилось 👀 Эти красные лапы не от переедания и не от щенячьего корма. Но будем последовательны. Эта краснота преследует ее целый год. И собака до такой степени расчесала кожу, что выдрала почти все волосы на задних лапах🤨 Мы решили все-таки поехать к ветеринару. Классный доктор! Зависали мы у него целый час, пока он смотрел в свои микроскопы и тыкал в нас ультрафиолетом. Вспотели и устали. Собака распыхтелась. Оказалось, что это долбаный грибок и какой-то невидимый кожный клещ. А еще мы узнали, что шампунь для лап у нас не с хлоргексидином, а с говном😕 И теперь Молли лечится специальными шампунями и таблетками. Пожелайте ей удачи🤞🏻 P.S. Это не критично и не опасно. Просто кто-то год назад потрогал ее грязными лапами.</p>\r\n', '106584307967.jpg', '290-106584307967.jpg', 1747830271, NULL, 1748516584, 1),
(8, 'Мы это сделали 💪🏻 ', '\r\n\r\nПрошли через огонь, воду и медные трубы, осень и зиму! По уши в грязи и с дрожащими от холода руками. 10000 нервных клеток потрачено, ведь нам достался сложный экземпляр😆 Образец непослушания и оплот своеволия. \r\n\r\nСегодня был последний день дрессировки 🥳', '616728053553.jpg', '290-616728053553.jpg', 1747830479, NULL, NULL, 1),
(9, 'Шок', 'Вчера забыли дать игруху с вкуснотой, и Моль начала выть😵‍💫\r\nВот что бывает, когда у собаки ломается система😁', '417812461095.jpg', '290-417812461095.jpg', 1747830519, NULL, NULL, 1),
(10, 'Молли пошла на поправку 🎉 ', '\r\nУ нее был жуткий кашель - заразили мохнатые друзья☹️ У нас эпидемия собачьего аденовируса.\r\nЕздили в ветеринарку, где Молли свернула весы 🤦🏽‍♀️ (кстати, она весит почти 33 кг, кто хочет взять на ручки?)\r\nПьет антибиотики и отхаркивающее. Уже не кашляет. Сторонимся собак и отучили от палок с помощью намордника.', '547250897768.jpg', '290-547250897768.jpg', 1747830548, NULL, NULL, 1),
(11, 'Молли катается)', 'Собака-путешественница 🐶 \r\nВ машину уже не боится залезать, раньше была целая проблема', '392217583018.jpg', '290-392217583018.jpg', 1747830585, NULL, NULL, 1),
(12, 'Днюха!!', 'Поздравляем Молли с первой косточкой 🦴 \r\nСегодня ей год 🎉 \r\nПостов уже будет чуть меньше, собака-то взрослая😆\r\nОстаются проблемы с тянучестью на улице, в остальном - лучшая собака😍', '365212894668.jpg', '290-365212894668.jpg', 1747830611, NULL, NULL, 1),
(13, 'Опыт', 'Иногда, когда хочется посмотреть, чем занята Молли, можно обнаружить, что и она будто смотрит на тебя😆\r\nНаверное, это связано с тем, что как-то раз Сережа наругал ее из камеры🤪\r\nВ любом случае, любопытная ситуация😮', '535884853171.jpg', '290-535884853171.jpg', 1747830655, NULL, NULL, 1),
(14, 'Молли на тусе)', '<p>Это Молли ищет того, кого можно подоставать 😆</p>\r\n', '295170472971.jpg', '290-295170472971.jpg', 1747830681, NULL, 1748515544, 1),
(15, 'Великий день!!!', '<p>Ох ты ж! Сегодня два года, как Молли живет с нами 🐶 Когда ее нам привезли, кстати, была такая же погода: дождь и холодрыга. Может, и неслучайно, ведь она только и делает, что бесконечно греет нам душу☺️</p>\r\n', '600266911297.jpg', '290-600266911297.jpg', 1747830716, NULL, 1748345451, 1),
(18, 'Опыт', '<p>Иногда, когда хочется посмотреть, чем занята Молли, можно обнаружить, что и она будто смотрит на тебя😆 Наверное, это связано с тем, что как-то раз Сережа наругал ее из камеры🤪 В любом случае, любопытная ситуация😮</p>\r\n', '535884853171.jpg', '290-535884853171.jpg', 1747830655, NULL, 1748345438, 1),
(19, 'Наш дракон готов встречать Новый год🐉', '<p><strong>А вот запоздалый подарок на НГ</strong> 🎄&nbsp;<br />\r\nС ошейниками мы уже успели намучиться. Пара уже растрепались (они дешевые, им можно), кожаный уже мал (но он был узкий и неудобный), широкий с совами прекрасен (но он красит😩)<br />\r\nКороче, морока. Поэтому мы решили купить качественный и долговечный.</p>\r\n\r\n<p><br />\r\nВот этот - офигенный. Крепкий, прошитый на сто раз. Широкий. Большое и толстое кольцо для поводка. И он, конечно, невероятно красив! Это тоже важно😆</p>\r\n\r\n<p><br />\r\nПотом сервис - на высоте! Куча подарков в комплекте. Приятных и неожиданных.<br />\r\nКому интересно - <strong>https://sharik-dog.com</strong></p>\r\n\r\n<p><br />\r\nВ планах поменять поводок. Он тоже был дешевым и на первое время. Сейчас он выглядит как кошмар.</p>\r\n', '556616761477.jpg', '290-556616761477.jpg', 1747983331, NULL, 1748345363, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `section` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `section`, `name`, `value`) VALUES
(1, 'contacts', 'about_title', 'Обо мне'),
(2, 'contacts', 'about_text', '<p>Занимаюсь разработкой современных сайтов и приложений. Мне нравится делать интересные и современные проекты. Этот сайт я сделал в рамках обучения в школе онлайн обучения WebCademy. Чуть позже я обновлю в нём свой контент. А пока посмотрите, как тут всё классно!</p>'),
(3, 'contacts', 'services_title', 'НАПРАВЛЕНИЯ, КОТОРЫМИ Я ЗАНИМАЮСЬ'),
(4, 'contacts', 'services_text', '<ul>\r\n	<li>Верстка сайтов</li>\r\n	<li>Frontend</li>\r\n	<li>UI/UX дизайн</li>\r\n</ul>'),
(5, 'contacts', 'contacts_title', 'Контакты'),
(6, 'contacts', 'contacts_text', '<p><strong>Email:</strong>&nbsp;<a href=\"mailto:hi@digitalnomad.pro\">hi@digitalnomad.pro</a></p>\r\n\r\n<p><strong>Мобильный:</strong>&nbsp;<a href=\"tel:+79055557788\">+7 (905) 555-77-9</a>9</p>\r\n\r\n<p><strong>Адрес:</strong> Москва, Пресненская набережная, д. 6, стр. 2</p>');

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
  `country` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `avatar_small` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `role`, `password`, `recovery_code`, `name`, `surname`, `city`, `country`, `avatar`, `avatar_small`) VALUES
(10, 'ya@ya.ru', 'user', '$2y$10$6i5GML7IR50jOraX3asTJuO1rHbmFXN2sJ1rEa0KtKKo8gu3zxNvC', '2z7cJpdWT0mufDQ1bi8StvGhLeKEA3', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'er@er.ru', 'admin', '$2y$10$epgYBZjjI8fDdl4MuXyi1.s6jEXZcf7FVAH56fkA6upefhSi7Qt.C', NULL, 'Сергей', 'Козлов', '', '', '552247593034.jpg', '48-552247593034.jpg'),
(13, 'us@us.ru', 'user', '$2y$10$NQYIkbYx8KQnqQU5vDCwf.OZhs9zk1fMQ4MT0ZDs1WUNp6qU5fbuK', NULL, 'SERGE', 'KOZLOV', 'Санкт-Петербург', 'Россия', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

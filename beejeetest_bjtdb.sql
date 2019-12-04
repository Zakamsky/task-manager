-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 04 2019 г., 15:43
-- Версия сервера: 5.5.60-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `beejeetest_bjtdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `t_tasks`
--

CREATE TABLE `t_tasks` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `user_id` bigint(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `task_email` varchar(255) DEFAULT NULL,
  `task_date` int(64) NOT NULL,
  `task_text` longtext NOT NULL,
  `task_status` int(1) NOT NULL,
  `task_edited` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `t_tasks`
--

INSERT INTO `t_tasks` (`id`, `user_id`, `user_name`, `task_email`, `task_date`, `task_text`, `task_status`, `task_edited`) VALUES
(1, 0, 'John Doe', 'johndoe@email.com', 1575317434, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque ducimus in praesentium provident, repellendus voluptatem voluptatum! Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 1, NULL),
(2, 0, 'John Doe', 'johndoe@email.com', 1575317449, 'new text', 1, 1),
(3, 0, 'test tester', 'tester@test.ts', 1575317604, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda at atque aut autem dicta dolor, itaque molestiae mollitia quas, quos temporibus unde, voluptatem voluptatum\r\nTEST NEW.', 1, 1),
(4, 0, 'test tester', 'tester@test.ts', 1575318085, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium assumenda at atque aut autem dicta dolor, itaque molestiae mollitia quas, quos temporibus unde, voluptatem voluptatum.\r\n', 0, NULL),
(7, 0, 'test-tess', 'tester@test.ts', 1575318290, 'Doloremque ducimus in praesentium provident, repellendus voluptatem voluptatum! Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 0, NULL),
(8, 0, 'test-tess', 'tester@test.ts', 1575318311, 'Doloremque ducimus in praesentium provident, repellendus voluptatem voluptatum! Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 0, NULL),
(11, 0, 'test100500', 'alex.zakamsky@gmail.com', 1575319723, 'Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 0, NULL),
(10, 0, 'test tester', 'alex.zakamsky@gmail.com', 1575318361, 'Doloremque ducimus in praesentium provident, repellendus voluptatem voluptatum! Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 1, NULL),
(12, 0, 'test100500', 'alex.zakamsky@gmail.com', 1575319787, 'Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. Ad debitis eaque expedita, illum nobis sint!', 0, NULL),
(13, 0, 'Pedro Sanchez', 'sanchez@gmail.com', 1575324802, 'Doloremque ducimus in praesentium provident, repellendus voluptatem voluptatum! Architecto consequatur illo ipsum maxime nulla, ratione recusandae reiciendis ut veniam voluptatem voluptatum. ', 0, NULL),
(14, 0, 'test tester', 'alex.zakamsky@gmail.com', 1575379304, '///...///', 0, NULL),
(15, 3, 'test tester', 'alex.zakamsky@gmail.com', 1575379357, '///...///', 0, NULL),
(16, 3, 'azaza', 'zaza@mail.ru', 1575415377, 'test <script>alert(â€˜testâ€™);</script> test', 1, 1),
(17, 8, 'Cat', 'lostflame@yandex.ru', 1575470115, 'Este es el texto de verificaciÃ³n. Quiero saber cÃ³mo se mostrarÃ¡', 1, NULL),
(18, 8, 'Cat', 'lostflame@yandex.ru', 1575470199, '', 0, NULL),
(19, 8, 'test', 'test@test.com', 1575470420, 'text trabajo\r\ncomprobarÃ', 1, 1),
(20, 8, 'Cat', 'lostflame@yandex.ru', 1575470594, ' <script>alert(â€˜testâ€™);</script>\r\neste es un nuevo desafÃ­o\r\nNEW TEXT', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `t_users`
--

CREATE TABLE `t_users` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `user_login` varchar(32) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_passhash` varchar(64) NOT NULL,
  `user_salt` varchar(8) NOT NULL,
  `user_regdate` int(64) NOT NULL,
  `user_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `t_users`
--

INSERT INTO `t_users` (`id`, `user_login`, `user_email`, `user_passhash`, `user_salt`, `user_regdate`, `user_status`) VALUES
(3, 'admin', 'alex.zakamsky@gmail.com', '395406e6f8a3ae145907acc13a2bd597', '5a8c8f9d', 1575223994, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `t_tasks`
--
ALTER TABLE `t_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `t_tasks`
--
ALTER TABLE `t_tasks`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

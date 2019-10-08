-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Окт 08 2019 г., 09:07
-- Версия сервера: 10.1.10-MariaDB
-- Версия PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `base_name`
--

-- --------------------------------------------------------

--
-- Структура таблицы `i_news`
--

CREATE TABLE `i_news` (
  `id` int(11) NOT NULL,
  `url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `created` varchar(200) NOT NULL,
  `pre_img` text NOT NULL,
  `gallery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `i_news`
--

INSERT INTO `i_news` (`id`, `url`, `type`, `title`, `text`, `created`, `pre_img`, `gallery`) VALUES
(1, 'one', '1', 'Первая', 'Пинг', '1.1.2019', '9.19/1.jpeg', '9.19/1.jpeg 9.19/2.jpeg 9.19/3.jpeg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `i_news`
--
ALTER TABLE `i_news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `i_news`
--
ALTER TABLE `i_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

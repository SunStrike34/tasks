-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 28 2023 г., 02:24
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `comments`
--

-- --------------------------------------------------------

--
-- Структура таблицы `data_comments`
--

CREATE TABLE `data_comments` (
  `id_com` int(10) NOT NULL,
  `author` varchar(25) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `data_comments`
--

INSERT INTO `data_comments` (`id_com`, `author`, `comment`) VALUES
(1, 'Вадим', 'Всем Привет!'),
(2, 'dad', 'hello!'),
(3, 'mam', 'hello, dady!'),
(4, 'bro', 'hey!'),
(5, 'Леша', 'Всем привет! Как дела?'),
(6, 'вфв', 'виыв'),
(7, 'xfbds', 'dgnsgmszmg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `data_comments`
--
ALTER TABLE `data_comments`
  ADD PRIMARY KEY (`id_com`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `data_comments`
--
ALTER TABLE `data_comments`
  MODIFY `id_com` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

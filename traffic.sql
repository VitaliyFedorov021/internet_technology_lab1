-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 29 2022 г., 00:31
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `traffic`
--
CREATE DATABASE IF NOT EXISTS `traffic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `traffic`;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `ID_Client` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ID_Client`, `name`, `login`, `password`, `IP`, `balance`) VALUES
(1, 'Виталий', 'vitaliy.fedorov@nure.ua', '88005555535', '1.1.1.1', 102),
(2, 'Семён', 'semen.maratov1@nure.ua', '12345678', '10.24.0.0', 899),
(3, 'Владислав', 'vladyslav.starichenko@nure.ua', 'gerf62fbsQ', '172.31.255.255', -37),
(4, 'Антон', 'anton.gromov@nure.ua', '65jsdkvbsdhk275', '100.127.255.255', 48),
(5, 'Максим', 'maksym.illarionov@nure.ua', '67829jav7gns4', '88.88.88.88', 2948),
(6, 'Олег', 'oleg.maslov@nure.ua', 'we74uyascb1FvnE', '172.16.0.0', -8958);

-- --------------------------------------------------------

--
-- Структура таблицы `seanse`
--

CREATE TABLE `seanse` (
  `ID_Seanse` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `stop` datetime NOT NULL,
  `in_traffic` int(11) NOT NULL,
  `out_traffic` int(11) NOT NULL,
  `FID_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `seanse`
--

INSERT INTO `seanse` (`ID_Seanse`, `start`, `stop`, `in_traffic`, `out_traffic`, `FID_Client`) VALUES
(1, '2022-02-12 06:23:33', '2022-02-24 09:14:12', 87654726, 34534, 3),
(2, '2022-09-01 13:05:32', '2022-09-08 03:17:23', 792715, 127582, 5),
(3, '2022-04-06 23:42:06', '2022-04-19 21:13:53', 689176836, 5667104, 2),
(4, '2022-11-30 03:17:23', '2022-12-12 13:05:32', 127765, 3847, 1),
(5, '2022-06-20 09:14:12', '2022-07-04 23:42:06', 96271763, 1287576, 2),
(6, '2022-07-14 23:23:34', '2022-07-29 18:22:57', 2847437, 92757, 4),
(7, '2022-01-12 22:42:08', '2023-01-19 12:23:08', 325781862, 485813, 6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Индексы таблицы `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`ID_Seanse`),
  ADD KEY `FID_Client` (`FID_Client`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `ID_Client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `seanse`
--
ALTER TABLE `seanse`
  MODIFY `ID_Seanse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_ibfk_1` FOREIGN KEY (`FID_Client`) REFERENCES `client` (`ID_Client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

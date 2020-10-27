-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 14 2020 г., 14:54
-- Версия сервера: 10.4.8-MariaDB
-- Версия PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `midterm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Post_Id` int(11) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`ID`, `User_Id`, `Post_Id`, `Text`) VALUES
(1, 1, 5, 'WoW!!!\r\nSo interesting content)\r\nThank you!!!'),
(2, 3, 4, 'sada'),
(3, 3, 5, 'thanks'),
(4, 3, 1, 'Nice)'),
(5, 3, 3, 'I hope this is end soon');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Post` varchar(1024) NOT NULL,
  `Publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`ID`, `User_Id`, `Title`, `Description`, `Post`, `Publish_date`) VALUES
(1, 1, 'Amazon Kinesis', 'Why Amazon Kinesis is importance in your business?', 'With Amazon Kinesis, you can simply collect, process, and analyze streaming data in real time to deliver timely insights and respond quickly to new information. The core capabilities of Amazon Kinesis enable you to cost-effectively process streaming data at any scale and provide flexibility in choosing the tools that best suit your application\'s needs. Amazon Kinesis provides the ability to collect real-time data such as video and audio streams, application logs, website browsing history, and IoT telemetry for machine learning, analytics, and other applications. Amazon Kinesis allows you to process and analyze data as it comes in and respond instantly, rather than waiting for all the data to be collected to start processing it.', '2020-10-13'),
(3, 2, 'Kazakhstan Coronavirus', 'Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.', 'The virus that causes COVID-19 is mainly transmitted through droplets generated when an infected person coughs, sneezes, or exhales. These droplets are too heavy to hang in the air, and quickly fall on floors or surfaces.\r\nYou can be infected by breathing in the virus if you are within close proximity of someone who has COVID-19, or by touching a contaminated surface and then your eyes, nose or mouth.', '2020-10-13'),
(4, 3, 'Somebody That I Used to Know - Walk off the Earth', 'A collection of songs about life, love, loss and straight-up kicking ass. Ranging from top 40 pop to', 'Now and then I think of when we were together\r\nLike when you said you felt so happy you could die\r\nTold myself that you were right for me\r\nBut felt so lonely in your company\r\nBut that was love and it\'s an ache I still remember\r\nYou can get addicted to a certain kind of sadness\r\nLike resignation to the end, always the end\r\nSo when we found that we could not make sense\r\nWell you said that we would still be friends\r\nBut I\'ll admit that I was glad it was over\r\nBut you didn\'t have to cut me off\r\nMake out like it never happened and that we were nothing\r\nAnd I don\'t even need your love\r\nBut you treat me like a stranger and that feels so rough\r\nNo, you didn\'t have to stoop so low\r\nHave your friends collect your records and then change your number\r\nI guess that I don\'t need that though\r\nNow you\'re just somebody that I used to know\r\nNow you\'re just somebody that I used to know\r\nNow you\'re just somebody that I used to know\r\nNow and then I think of all the times you screwed me over\r\nBut had me believing it was always som', '2020-10-14'),
(5, 3, 'Max Korzh passion', 'Max Korzh (full name Maksim Anatolievich Korzh, Russian: Максим Анатольевич Корж, born November 23, ', 'At a young age Max Korzh was enrolled into music school by his parents. At the age of 16, Korzh started his first band called “Lun Clan”, alongside his friends but the band didn\'t last long and dissolved. Korzh was a part of a couple other projects, although none of them proved to be successful. In his teen years he used to record songs in Belarusian.\r\n\r\nShortly after Korzh followed the path of becoming a beatmaker making music for other artists but to no critical success. This made him decide to record his own songs over his own instrumentals.\r\n\r\nKorzh recorded his first solo song while studying at Belarusian State University; the biggest university in Belarus. During the 3rd year of studying at the university he decided to drop out and concentrate on his music career. He borrowed $300 dollars from his mom, went to a studio and recorded \"Nebo Pomozhet Nam\" (English: \"Sky Will Help Us\") and posted it on VKontakte, the biggest Russian social network. Shortly after he was enlisted in the military. When he retur', '2020-10-14');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Full_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Email`, `Password`, `Full_Name`) VALUES
(1, 'bekezhani44@gmail.com', 'IITU2020', 'Issabek Bekezhan'),
(2, 'aiza01@gmail.com', '2020Aiza', 'Aiza Mukhtar'),
(3, 'farys.fox@gmail.com', 'Fariza2020', 'Fariza Akynova'),
(4, 'foxychmoxy@gmail.com', 'Zaur1', 'Zaurbekov Almas');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

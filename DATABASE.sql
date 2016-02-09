-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2016 г., 02:04
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mathtest`
--
CREATE DATABASE IF NOT EXISTS `mathtest` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mathtest`;

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(1, 1, 'Минск');
INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(2, 2, 'Брюссель');
INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(3, 3, 'Берлин');
INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(4, 4, 'Львов');
INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(5, 4, 'Запорожье');
INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES(6, 5, 'Париж');

-- --------------------------------------------------------

--
-- Структура таблицы `city_language`
--

DROP TABLE IF EXISTS `city_language`;
CREATE TABLE IF NOT EXISTS `city_language` (
  `city_id` int(10) unsigned NOT NULL,
  `language_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `city_language`
--

INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(1, 1);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(1, 2);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(2, 3);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(2, 4);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(2, 5);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(3, 5);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(4, 6);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(5, 2);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(5, 6);
INSERT INTO `city_language` (`city_id`, `language_id`) VALUES(6, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES(1, 'Беларусь');
INSERT INTO `countries` (`id`, `name`) VALUES(2, 'Бельгия');
INSERT INTO `countries` (`id`, `name`) VALUES(3, 'Германия');
INSERT INTO `countries` (`id`, `name`) VALUES(4, 'Украина');
INSERT INTO `countries` (`id`, `name`) VALUES(5, 'Франция');

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`) VALUES(1, 'белорусский');
INSERT INTO `languages` (`id`, `name`) VALUES(2, 'русский');
INSERT INTO `languages` (`id`, `name`) VALUES(3, 'французский');
INSERT INTO `languages` (`id`, `name`) VALUES(4, 'нидерландский');
INSERT INTO `languages` (`id`, `name`) VALUES(5, 'немецкий');
INSERT INTO `languages` (`id`, `name`) VALUES(6, 'украинский');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_02_03_212744_create_countries_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_02_03_212828_create_cities_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_02_03_212911_create_languages_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_02_03_213118_create_citylang_table', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

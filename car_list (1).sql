-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 10.0.121.154
-- Время создания: Май 16 2023 г., 10:55
-- Версия сервера: 5.7.37-40
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `a0589591_ddql`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car_list`
--

CREATE TABLE `car_list` (
  `dc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mark_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `folder_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `modification_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transmission` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `owners` int(11) NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `run` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `recommended_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `optional_equipment_price` int(11) NOT NULL,
  `license_plate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `manager` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock_days` int(11) NOT NULL,
  `purchase_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `expenses_repair` int(11) NOT NULL,
  `expenses_resources` int(11) NOT NULL,
  `last_price_change` int(11) NOT NULL,
  `autoteka_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `car_order_manager` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vehiclemodification` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `extras` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `car_list`
--

INSERT INTO `car_list` (`dc_name`, `vin`, `mark_id`, `folder_id`, `modification_id`, `body_type`, `transmission`, `owners`, `color`, `year`, `run`, `price`, `recommended_price`, `purchase_price`, `optional_equipment_price`, `license_plate`, `comment`, `manager`, `stock_days`, `purchase_type`, `expenses_repair`, `expenses_resources`, `last_price_change`, `autoteka_url`, `car_order_manager`, `vehiclemodification`, `extras`) VALUES
('ДЦ СКС-Лада_АМ_склад бу ам', 'SJNFCAE11U1291832', 'Nissan', 'Note, I', '1.6 AT (110 л.с.)', 'Хэтчбек 5 дв.', 'Автоматическая КП', 2, 'Красный', 2008, 181820, 549000, 0, 549000, 0, 'Х599СА31', 'Окрасы, плюсы и минусы', 'Стрелков Михаил Михайлович', 1, 'Агентский договор', 0, 0, 1, 'https://autoteka.ru/report/web/uuid/6cbd4077-6ffd-4754-98d2-14377647236e', 'Елисеев Иван Алексеевич', '', ''),
('ДЦ СКС-Лада_АМ_склад новые ам', 'XTA219040P0938083', 'LADA (ВАЗ)', 'Granta, I Рестайлинг', 'Euro-2 1.6 MT (90 л.с.)', 'Седан', 'Механическая КП', 0, 'Черный', 2023, 0, 836500, 836500, 786310, 69238, '', 'аморт кап,защита карт,накладки на пороги итд', '', 18, '', 0, 0, 0, '', 'Елисеев Иван Алексеевич', '1.6 5MT COMFORT 22 (21-F5N)', 'Glonass, Без ЦЗ, Легкосплавные диски'),
('ДЦ СКС-Лада_АМ_склад новые ам', 'XTA219040P0938013', 'LADA (ВАЗ)', 'Granta, I Рестайлинг', 'Euro-2 1.6 MT (90 л.с.)', 'Седан', 'Механическая КП', 0, 'Черный', 2023, 0, 536500, 836500, 786310, 69238, '', 'аморт кап,защита карт,накладки на пороги итд', '', 18, '', 0, 0, 0, '', '', '1.6 5MT COMFORT 22 (21-F5N)', 'Glonass, Без ЦЗ, Легкосплавные диски'),
('ДЦ СКС-Лада_АМ_склад новые ам', 'XTA219040P0938063', 'LADA (ВАЗ)', 'Granta, I Рестайлинг', 'Euro-2 1.6 MT (90 л.с.)', 'Седан', 'Механическая КП', 0, 'Черный', 2023, 0, 636500, 836500, 786310, 69238, '', 'аморт кап,защита карт,накладки на пороги итд', '', 18, '', 0, 0, 0, '', '', '1.6 5MT COMFORT 22 (21-F5N)', 'Glonass, Без ЦЗ, Легкосплавные диски');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

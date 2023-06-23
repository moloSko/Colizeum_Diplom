-- --------------------------------------------------------
-- Хост:                         89.108.76.61
-- Версия сервера:               8.0.31 - MySQL Community Server - GPL
-- Операционная система:         Linux
-- HeidiSQL Версия:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных Python_work
CREATE DATABASE IF NOT EXISTS `Python_work` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Python_work`;

-- Дамп структуры для таблица Python_work.pc
CREATE TABLE IF NOT EXISTS `pc` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(999) DEFAULT NULL,
  `stat` int DEFAULT '0',
  `characteristic` varchar(999) DEFAULT NULL,
  `number` int DEFAULT NULL,
  `img` varchar(999) DEFAULT NULL,
  `categori` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы Python_work.pc: ~10 rows (приблизительно)
INSERT INTO `pc` (`id`, `name`, `comment`, `stat`, `characteristic`, `number`, `img`, `categori`) VALUES
	(1, 'Компьютерный зал', 'Общий зал', 4, 'Процессор: i5-9400F<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS TUF Gaming K7<br>Наушники: ASUS TUF Gaming H3<br>Коврики: ASUS ROG Sheath', 6, '../image/main_pick_pc_6.png', 'comp'),
	(2, 'Компьютерный зал', 'Общий зал', 2, 'Процессор: i5-9400F<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS TUF Gaming K7<br>Наушники: ASUS TUF Gaming H3<br>Коврики: ASUS ROG Sheath', 4, '../image/main_pick_pc_4.png', 'comp'),
	(3, 'Компьютерный зал', 'Общий зал', 1, 'Процессор: i5-9400F<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS TUF Gaming K7<br>Наушники: ASUS TUF Gaming H3<br>Коврики: ASUS ROG Sheath', 4, '../image/main_pick_pc_4.png', 'comp'),
	(4, 'Буткемп Комната', 'Буткемп', 0, 'Процессор: i5-12400f<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS ROG Strix Flare<br>Наушники: ASUS ROG Delta<br>Коврики: ASUS ROG Sheath<br>', 2, '../image/main_pick_pc.png', 'comp'),
	(5, 'Буткемп Комната', 'Буткемп', 1, 'Процессор: i5-12400f<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS ROG Strix Flare<br>Наушники: ASUS ROG Delta<br>Коврики: ASUS ROG Sheath<br>', 2, '../image/main_pick_pc.png', 'comp'),
	(6, 'Буткемп Комната', 'Буткемп', 2, 'Процессор: i5-12400f<br>Видеокарта: ASUS RTX2060<br>Оперативная память: 16GB<br>Мониторы: 165 Гц , 27 дюймов<br>Мышь: ASUS ROG Gladius II Origin<br>Клавиатура: ASUS ROG Strix Flare<br>Наушники: ASUS ROG Delta<br>Коврики: ASUS ROG Sheath<br>', 2, '../image/main_pick_pc.png', 'comp'),
	(7, 'TV 65 Комната', 'TV 65"', 1, 'Игровая консоль: PS 4<br>Телевизор: Samsung QN65Q7F<br>', 2, '../image/main_pick_tv_2.jpg', 'cons'),
	(8, 'TV 65 Комната', 'TV 65"', 1, 'Игровая консоль: Xbox One<br>Телевизор: Samsung QN65Q7F<br>', 2, '../image/main_pick_tv_2.jpg', 'cons'),
	(9, 'TV+ 65 Комната', 'TV+ 65"', 0, 'Игровая консоль: PS 4<br>Геймпад: Nacon Revolution Pro Controller 2<br>Наушники: ASUS ROG Delta<br>Телевизор: Samsung QN65Q7F<br>', 2, '../image/main_pick_tv_2.jpg', 'cons'),
	(10, 'TV+ 65 Комната', 'TV+ 65"', 0, 'Игровая консоль: Xbox One<br>Геймпад: Xbox Elite Wireless Controller<br>Наушники: ASUS ROG Delta<br>Телевизор: Samsung QN65Q7F<br>', 2, '../image/main_pick_tv_2.jpg', 'cons'),
	(11, 'TV+ 65 Комната', 'TV+ 65"', 1, 'Игровая консоль: Xbox One<br>Геймпад: Xbox Elite Wireless Controller<br>Наушники: ASUS ROG Delta<br>Телевизор: Samsung QN65Q7F<br>', 2, '../image/main_pick_tv_2.jpg', 'cons');

-- Дамп структуры для таблица Python_work.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` varchar(999) DEFAULT NULL,
  `description` varchar(999) DEFAULT NULL,
  `price` int DEFAULT '0',
  `time_stat` int DEFAULT '0',
  `stat` int DEFAULT '0',
  `hall` varchar(50) DEFAULT NULL,
  `img` varchar(999) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы Python_work.services: ~6 rows (приблизительно)
INSERT INTO `services` (`id`, `comment`, `description`, `price`, `time_stat`, `stat`, `hall`, `img`) VALUES
	(1, 'Компьютерный зал', 'Игровые компьютеры', 150, 3600, 0, '[1,2,3]', '../image/price_gif_4.gif'),
	(2, 'Буткемп Комната', 'Игровые компьютеры', 240, 3600, 0, '[4,5,6]', '../image/price_gif_2.gif'),
	(3, 'TV 65 Комната', 'Playstation 5', 310, 3600, 0, '[7]', '../image/price_img_2.jpg'),
	(4, 'TV 65 Комната', 'Xbox One X', 310, 3600, 0, '[8]', '../image/main_pick_tv_3.jpg'),
	(5, 'TV+ 65 Комната', 'Playstation 5 + Кальян', 400, 3600, 0, '[9]', '../image/price_img_2.jpg'),
	(6, 'TV+ 65 Комната', 'Xbox One X + Кальян', 400, 3600, 0, '[10]', '../image/main_pick_tv_3.jpg');

-- Дамп структуры для таблица Python_work.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int NOT NULL,
  `fio` varchar(120) DEFAULT NULL,
  `post` varchar(50) DEFAULT NULL,
  `stat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Дамп данных таблицы Python_work.staff: ~0 rows (приблизительно)

-- Дамп структуры для таблица Python_work.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `FIO` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `login` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` int unsigned DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT '0',
  `mail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `join_date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `lvl_rank` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- Дамп данных таблицы Python_work.users: ~0 rows (приблизительно)
INSERT INTO `users` (`id`, `FIO`, `login`, `password`, `phone`, `mail`, `join_date`, `user_ip`, `stat`, `lvl_rank`) VALUES
	(1, 'Кирилл Малик', 'admin', 123, '0', 'kpyk98@mail.ru', '2023-06-22', '127.0.0.1', NULL, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

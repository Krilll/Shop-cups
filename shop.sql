-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2019 г., 02:05
-- Версия сервера: 8.0.12
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_guest` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `ordered` int(1) DEFAULT NULL,
  `in_work` int(1) DEFAULT NULL,
  `sent` int(1) DEFAULT NULL,
  `exist` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_product`, `id_user`, `id_guest`, `count`, `ordered`, `in_work`, `sent`, `exist`) VALUES
(1, 1, 2, 0, 6, 1, 1, NULL, 1),
(2, 2, 2, 0, 4, 1, 1, NULL, 1),
(3, 7, 2, 0, 2, 1, 1, 1, 1),
(9, 10, 2, 0, 2, 1, NULL, NULL, 0),
(11, 6, 2, 0, 5, 1, NULL, NULL, 1),
(12, 8, 2, 0, 3, 1, NULL, NULL, 1),
(23, 6, 2, 0, 1, NULL, NULL, NULL, 1),
(24, 9, 2, 0, 1, NULL, NULL, NULL, 1),
(25, 10, 2, 0, 1, NULL, NULL, NULL, 1),
(29, 1, NULL, 1, 3, NULL, NULL, NULL, 1),
(30, 2, NULL, 1, 1, NULL, NULL, NULL, 1),
(31, 3, NULL, 1, 1, NULL, NULL, NULL, 1),
(32, 4, NULL, 1, 1, NULL, NULL, NULL, 1),
(41, 1, NULL, 19, 1, NULL, NULL, NULL, 1),
(42, 2, NULL, 19, 2, NULL, NULL, NULL, 1),
(44, 1, NULL, 21, 1, NULL, NULL, NULL, 1),
(45, 1, NULL, 22, 2, NULL, NULL, NULL, 1),
(47, 6, NULL, 22, 1, NULL, NULL, NULL, 1),
(52, 1, NULL, 23, 1, NULL, NULL, NULL, 1),
(54, 1, NULL, 25, 1, NULL, NULL, NULL, 1),
(55, 5, NULL, 26, 1, NULL, NULL, NULL, 1),
(58, 3, 2, NULL, 1, NULL, NULL, NULL, 1),
(59, 4, 2, NULL, 1, NULL, NULL, NULL, 1),
(60, 1, 8, 28, 2, 1, NULL, NULL, 1),
(61, 2, 8, 28, 1, 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `cookie` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guests`
--

INSERT INTO `guests` (`id`, `cookie`) VALUES
(1, 'Tuesday 26th 2019f March 2019 11:0:47 PM'),
(12, 'Wednesday 27th 2019f March 2019 03:0:52 PM'),
(15, 'Wednesday 27th 2019f March 2019 03:0:39 PM'),
(16, 'Wednesday 27th 2019f March 2019 03:0:20 PM'),
(17, 'Wednesday 27th 2019f March 2019 03:0:26 PM'),
(19, 'Wednesday 27th 2019f March 2019 04:0:20 PM'),
(21, 'Wednesday 27th 2019f March 2019 04:0:27 PM'),
(22, 'Wednesday 27th 2019f March 2019 04:0:45 PM'),
(23, 'Wednesday 27th 2019f March 2019 05:0:22 PM'),
(26, 'Wednesday 27th 2019f March 2019 05:0:47 PM'),
(28, 'Wednesday 27th 2019f March 2019 05:0:08 PM');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(4) NOT NULL,
  `image` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `volume` int(11) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `volume`, `description`) VALUES
(1, 'Кружка \"Газ\"', 356, 'item1.jpg', 320, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ac dui quam. Aenean sed est turpis. Nulla vitae sodales lorem. Vivamus mollis malesuada tellus, at laoreet sapien ornare quis. Aenean vulputate sed felis id commodo. Aliquam porttitor tincidunt ipsum, quis bibendum nibh euismod non. Vestibulum ut gravida felis. Nunc diam dui, blandit in nunc a, vulputate interdum ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum egestas quis magna id auctor. Vestibulum a odio dapibus, egestas mauris a, suscipit nisl. '),
(2, 'Кружка \"Марко\"', 178, 'item2.jpg', 320, 'Praesent ultrices, sapien non ornare vulputate, nisl augue varius ipsum, in feugiat eros diam tristique odio. Donec posuere est ac leo sagittis imperdiet. Mauris tempus mattis molestie. Sed dolor magna, pretium non neque a, vestibulum efficitur tellus. Duis rutrum velit non ipsum imperdiet, non sodales nisl vestibulum. Cras convallis suscipit consequat. Nam augue nisi, mollis et sapien vitae, commodo fermentum ipsum. Cras elit dui, finibus eget bibendum ut, mattis at sem. '),
(3, 'Кружка \"Dot\"', 190, 'item3.jpg', 330, 'Ut dictum tempus lectus, a rutrum ex viverra cursus. Aliquam convallis lorem non tellus posuere interdum. Sed pharetra enim lacus, ut venenatis nisl porta vitae. Etiam eget purus sem. Pellentesque aliquam, ex id lobortis tempus, lacus dui placerat arcu, non maximus ipsum sem sed odio. Nam dui leo, dapibus vel nisi in, pellentesque eleifend metus. Praesent tempor euismod enim, efficitur pharetra nisl interdum vitae. Duis id purus eget velit aliquam vestibulum. '),
(4, 'Кружка \"Головоломка\"', 203, 'item4.jpg', 350, 'Aenean felis nisl, vestibulum ac dui vel, faucibus dapibus sem. Etiam sit amet sem et neque elementum gravida. Aliquam vehicula, tellus ac commodo elementum, orci metus aliquam eros, ut blandit elit ipsum nec dolor. Aliquam eros odio, iaculis ac metus non, vestibulum varius ante. Vestibulum condimentum auctor viverra. In vel euismod nulla, nec eleifend lacus. In hac habitasse platea dictumst. Duis ullamcorper porttitor tellus, sit amet pulvinar sapien vehicula nec. '),
(5, 'Кружка \"Тайм-менеджмент\"', 203, 'item5.jpg', 400, 'Sed imperdiet volutpat pharetra. Phasellus libero sem, posuere vitae mi non, laoreet fermentum urna. Aliquam id porta risus. Morbi nec dolor sagittis, egestas orci dignissim, fermentum lacus. Nulla dictum dui tempus auctor gravida. In commodo egestas arcu, sagittis pharetra ligula ornare non. Proin faucibus mauris vitae libero euismod maximus. '),
(6, 'Кружка \"Power\"', 265, 'item6.jpg', 320, 'Suspendisse tempus gravida augue a ultrices. Aliquam tincidunt, libero vitae rhoncus pulvinar, nibh neque congue ex, eget molestie sapien nulla id ipsum. Curabitur laoreet vitae diam at vestibulum. Mauris vestibulum nulla eget ex tincidunt rutrum. Aliquam mi sapien, lobortis eu pellentesque id, malesuada sit amet ex. Vestibulum eleifend commodo suscipit. Ut a purus vitae tellus consequat pulvinar. In hac habitasse platea dictumst.'),
(7, 'Кружка \"Мел\"', 274, 'item7.jpg', 300, 'Quisque nec lacus fringilla, lobortis nunc ac, tincidunt orci. In hac habitasse platea dictumst. Nunc ultricies dui in iaculis euismod. Cras quis odio vestibulum, tempus ex sit amet, lobortis metus. Maecenas vestibulum quis sapien non laoreet. Nulla malesuada feugiat mi. Sed rutrum lectus id urna viverra, non aliquet velit varius. '),
(8, 'Кружка \"Ангел\"', 305, 'item8.jpg', 300, 'Vivamus iaculis at erat vitae condimentum. Aenean finibus libero vel massa viverra laoreet. Integer pharetra elit et eros iaculis mattis. Cras a pretium lorem. Suspendisse scelerisque fringilla ex. Praesent elementum imperdiet lorem, in elementum lacus porttitor ut. Sed lobortis magna sit amet purus molestie posuere. Aliquam eget cursus erat. Integer vulputate leo ut leo dictum congue. Etiam sit amet nunc tristique, tempor eros in, cursus orci. '),
(9, 'Кружка \"Неочевидное\"', 356, 'item9.jpg', 360, 'Integer nibh nisl, malesuada a bibendum ac, dignissim nec tellus. Integer quis sapien quis leo luctus convallis. Donec augue mi, finibus sed lectus ac, pretium iaculis nulla. Quisque nibh lacus, vulputate vel fermentum vitae, elementum vitae neque. Praesent aliquam vehicula porttitor. Aenean dictum vehicula nisi, at mollis lectus imperdiet ac.'),
(10, 'Кружка \"Эврика!\"', 356, 'item10.jpg', 320, 'Proin at fringilla magna. Integer ullamcorper nunc vitae lorem dignissim interdum. Proin erat leo, auctor id dui quis, laoreet ornare risus. Quisque tortor quam, ornare ac dolor ac, consequat tempor mi. Aliquam at dolor et est faucibus imperdiet. Phasellus scelerisque iaculis magna, eu consectetur risus congue et. Nullam nec tellus in sem sodales ullamcorper sed finibus justo. ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `name` varchar(15) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `lastName`, `telephone`, `password`, `role`) VALUES
(1, 'admin', 'Админ', 'Админ', '+7 (111) 11-11-111', '3cf108a4e0a498347a5a75a792f2321221232f297a57a5a743894a0e4a801fc3', 1),
(2, 'user', 'Пользователь', 'Пользователь', '+7 (222) 22-22-222', 'ee32c060ac0caa70b04e25091bbc11eeee11cbb19052e40b07aac0ca060c23ee', NULL),
(8, '0', 'Гость', 'Какой-то', '+7 (444) 44-44-444', '0', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_product` (`id_product`),
  ADD KEY `basket_user` (`id_user`);

--
-- Индексы таблицы `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

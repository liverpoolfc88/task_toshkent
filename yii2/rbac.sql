-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2020 г., 14:59
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rbac`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '40', 1606198836);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/admin/*', 2, NULL, NULL, NULL, 1606198781, 1606198781),
('/admin/user/*', 2, NULL, NULL, NULL, 1606198811, 1606198811),
('/rbac/*', 2, NULL, NULL, NULL, 1606198791, 1606198791),
('admin', 1, NULL, NULL, NULL, 1606198768, 1606198819);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', '/admin/*'),
('admin', '/admin/user/*'),
('admin', '/rbac/*');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('Author', 0x4f3a32353a226170705c636f6d706f6e656e74735c417574686f7252756c65223a333a7b733a343a226e616d65223b733a363a22417574686f72223b733a393a22637265617465644174223b693a313539303430393031353b733a393a22757064617465644174223b693a313539303430393031353b7d, 1590409015, 1590409015);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1590378515),
('m140506_102106_rbac_init', 1590384227),
('m140602_111327_create_menu_table', 1590384177),
('m160312_050000_create_user', 1590384177),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1590384227),
('m180523_151638_rbac_updates_indexes_without_prefix', 1590384228),
('m200409_110543_rbac_update_mssql_trigger', 1590384228),
('m200525_033944_create_post', 1590378518);

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `user_id`) VALUES
(1, 'Lfc', 'Liverpool fc', NULL),
(2, 'Man utd fc', 'Manchestr Yunayted fc', NULL),
(3, 'ChelseaFc', 'Chelsea FC', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(1024) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `role` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `access_token`, `email`, `status`, `role`, `created_at`, `updated_at`) VALUES
(91, 'sardor', 'rfXasWEl3sOpzcDus5qClheX4KZ_PEe9', '$2y$13$exS5MC.ywqSgw9g6oITOUOPc5M/vl8AIy4D8FKSTME9cbaAvv/hhC', NULL, '', 'sardor88.88@mail.ru', 10, 'admin', 1606293902, 1606293902),
(92, 'laylo', 'r03glVixtksyO2azW6d2Lpx9Laiaci_r', '$2y$13$NzPKg.qE3/zwbkgZ9cg2oOLaawwyJ6hWCs.gtdxqI51O.t.bV1Com', NULL, 'Pg0QjLTSRz4TRYDCwHoykjugMT2tt58m4_B8g9VaJlXOygdbmNGM0t1AMmIYRg-iWBSzq85_YcKggC8qDonSJfJKNqTNT5TeXLt_LfXa3VRlr1nnv3COa_-B7EKF4qLz9-As0W0N0meFLiL9vAYlzStqj1jdQC9WG-S9G-PbDJV97UsLEoR63j6Ya9faBokLwr_Ib8t6HZxbRAbTUJLwgSN2dnDOw7ocj2wXfO4O8tSTRFMtjZgRZkknAlhlU6e', 'laylo@mail.ru', 10, 'klient', 1606297668, 1606297668),
(93, 'asaloy', 'NzLiC5Uyh4B80jHeGGTayJu-KZeyNV6X', '$2y$13$TXFjzpfJw0j/4ajRkJkPmO5Z3kq0w/0HrfrKk416ysHzqdu9BPuEm', NULL, '1uA_-cVyXmVC3GoaRRatjcDmo7CWrHgQnsM9NFg2DmrZpFICtHXTcH1ZAr24SRYL4nr2LbpC_Seb7k6y_kY3xY8NcvBTXkFaaHWdXAvTy_XXM8hBcxSBpBgDs2XS83UWGDzrj-DOCkZ9bW-WKmiTvFpakPK1f34BpkpZ4k1fwGpFdR_aa_CpvLX3JVyKHsd7MLq-c-kMlH9HEvt5uZMKrdfWg6dwrXtVX1jlFCtB464YEgNtkLzyYCVpBzqLNtC', 'asal@q.uz', 10, 'klient', 1606299820, 1606299820),
(94, 'shaxlo', 'vcbJyJGlqsVu0NkRa9AupdYMiBG1H6MF', '$2y$13$8qszmaiA2t/BHi43i/Pi3O2JVCm7Zd4.BCALnXgEbaygU5FT/4yua', NULL, 'meI-_wdridWCG9qC-Zsdnd5vf99Wb77vEsMAm0ADYDClWqCAN_eAep1OHQ5My1YlcMTu6I2Srjn8PjOBppqQ9jjrGcIwpMLhlEs2eFTQsVF-oqb4VUT-c4xHpuVxURGJKzZNEQJWULgmib9jjKPJ5Rij3VgLCcmAZCH9EuCCzyrB0SAt30vEeiKfYIY1iFVsvbZ1GChdxu-dqdYOEuJiKZBjjj64oHM5K8BO9QFbq64mBreC1XikAkGzYoeYdu9', 'shax@maa.uz', 10, 'klient', 1606300806, 1606300806);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

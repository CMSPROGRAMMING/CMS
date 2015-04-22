# -------------------------------------------------------
#
# Tworzenie bazy danych
#

CREATE DATABASE IF NOT EXISTS Bazacms DEFAULT CHARSET=utf8;

# -------------------------------------------------------
#
# Wybieranie bazy danych
#

USE Bazacms;

# -------------------------------------------------------
#
# Struktura tabeli `module`
#
CREATE TABLE IF NOT EXISTS `module` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL COMMENT 'Nazwa modułu',
	`path` VARCHAR(100) NOT NULL COMMENT 'ścieżka modułu',
	`active` TINYINT(1) NOT NULL COMMENT 'Czy aktywny moduł czy nie?',
	`language` CHAR(5) NOT NULL COMMENT 'WYbór języka xx-xx',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

# -------------------------------------------------------
#
# Struktura tabeli `group`
#
CREATE TABLE IF NOT EXISTS `group` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL COMMENT 'Nazwa grupy',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;
# -------------------------------------------------------
#
# Struktura tabeli `group_permissions`
#
CREATE TABLE IF NOT EXISTS `group_permissions` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
    `id_module` INTEGER NOT NULL COMMENT 'Numer modułu',
	`id_group` INTEGER NOT NULL COMMENT 'Numer grupy',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;
# -------------------------------------------------------
#
# Struktura tabeli `user`
#
CREATE TABLE IF NOT EXISTS `user` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(60) NOT NULL COMMENT 'Imię użytownika',
	`last_name` VARCHAR(60) NOT NULL COMMENT 'Nazwisko użytkownika',
	`login` VARCHAR(50) NOT NULL COMMENT 'Login użytkownika',
	`password` VARCHAR(50) NOT NULL COMMENT 'Hasło użytkownika',
	`mail` VARCHAR(100) NOT NULL COMMENT 'E-mail użytkownika',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Sys_logs`
--

CREATE TABLE IF NOT EXISTS `sys_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa kontrolera',
  `user` varchar(50) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa usera',
  `query` varchar(300) COLLATE utf8_polish_ci NOT NULL COMMENT 'Zapytanie',
  `message` varchar(300) COLLATE utf8_polish_ci NOT NULL COMMENT 'Błąd',
  `ip` varchar(16) COLLATE utf8_polish_ci NOT NULL COMMENT 'IP Usera',
  `time` varchar(30) COLLATE utf8_polish_ci NOT NULL COMMENT 'Godzina zdarzenia',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

# -------------------------------------------------------
#
# Struktura tabeli `session`
#
CREATE TABLE IF NOT EXISTS `session` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `s_key` VARCHAR(100) NOT NULL COMMENT 'klucz losowy',
  `s_time` VARCHAR(50) NOT NULL COMMENT 'Czas aktywacji',
  `user` INTEGER NOT NULL COMMENT 'Użytkownik',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

--
-- Struktura tabeli dla tabeli `website_contact`
--

CREATE TABLE IF NOT EXISTS `website_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(100) NOT NULL COMMENT 'Nazwa',
  `mail` int(100) NOT NULL COMMENT 'Mail',
  `phone` varchar(20) COLLATE utf8_polish_ci NOT NULL COMMENT 'Telefon',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;



--
-- Struktura tabeli dla tabeli `website_info`
--

CREATE TABLE IF NOT EXISTS `website_info` (
  `name` varchar(300) COLLATE utf8_polish_ci NOT NULL COMMENT 'Nazwa firmy',
  `city` varchar(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'Miasto',
  `post` varchar(10) COLLATE utf8_polish_ci NOT NULL COMMENT 'Kod',
  `street` varchar(100) COLLATE utf8_polish_ci NOT NULL COMMENT 'Ulica',
  `facebook` varchar(300) COLLATE utf8_polish_ci NOT NULL COMMENT 'Link Facebook'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

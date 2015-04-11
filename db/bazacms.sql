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

# -------------------------------------------------------
#
# Struktura tabeli `session`
#
CREATE TABLE IF NOT EXISTS `session` (
	`id` INTEGER NOT NULL AUTO_INCREMENT,
    `` VARCHAR(60) NOT NULL COMMENT 'Imię użytownika',
	`` VARCHAR(60) NOT NULL COMMENT 'Nazwisko użytkownika',
	PRIMARY KEY (id)
) DEFAULT CHARSET=utf8;

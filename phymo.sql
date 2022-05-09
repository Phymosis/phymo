-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2022 at 04:19 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS phymo;
USE phymo;

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(15) NOT NULL,
  `login` varchar(20)  NOT NULL,
  `email` varchar(320) NOT NULL
) ;


INSERT INTO `accounts` (`id`, `password`, `name`, `login`, `email`) VALUES
(1, 'password1', 'user01', 'user01login', '');

CREATE TABLE `post` (
  `id` int NOT NULL,
  `msg` text NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idowner` int NOT NULL,
  `likes` int NOT NULL,
  `temporality` datetime NOT NULL,
  `parentid` int DEFAULT NULL
) ;

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;


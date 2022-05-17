/* FILE AUTO GENERATED FOR SQL TEMPLATE ON PHYMOS WEB DEV PROJECT */

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS phymo;
USE phymo;

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(8192) NOT NULL
) ;


INSERT INTO `accounts` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'julien.cohen-scali@epita.fr', '87de6d5904f1aaf54e90c401cd11a165a690316e4c20558033182b7600ad89d6915c6c6a50455688cd9aeaab106a329b53bf640482a6b6da44dfcf30f5ed4d82');

CREATE TABLE `post` (
  `id` int NOT NULL,
  `idowner` int NOT NULL,
  `parentid` int DEFAULT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg` text NOT NULL,
  `likes` int NOT NULL
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


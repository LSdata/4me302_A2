/* Author: Linnea Stragefors, 2015*/

drop database me302vehicle;

CREATE DATABASE me302vehicle
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

use me302vehicle;

CREATE TABLE `users` (
	`id` INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	`loginUserName` varchar(70) DEFAULT NULL,
	`loginProvider` varchar(70) DEFAULT NULL
);


INSERT INTO `users` (`id`, `loginUserName`, `loginProvider`) VALUES
(null, 'Linnea123s', 'Twitter'),
(null, 'empty', 'none'),
(null, 'empty', 'none'),
(null, 'Linnea S', 'Google'),
(null, 'empty', 'none'),
(null, 'Linnea Strågefors', 'Facebook'),
(null, 'empty', 'none')
;

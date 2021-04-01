create database test;

use test;

CREATE TABLE `nis` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY  (`id`)
);
create database test;

use test;

CREATE TABLE `nis` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `nis` varchar(12) NOT NULL
  PRIMARY KEY  (`id`)
);
# TatyanaGoncharova.github.io
в папке localhost необходимо создать директорию chat.dev и скопировать файлы index.php и style.css
Сайт http://localhost/chat.dev/index.php
Перед запуском необходимо создать БД gbook и таблицу msgs:

DROP TABLE IF EXISTS `msgs`;
CREATE TABLE `msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  `msg` text,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

подключение к БД
$user = 'root';
$password = 'root';
$db = 'gbook';
$host = 'localhost';
$port = 3306;

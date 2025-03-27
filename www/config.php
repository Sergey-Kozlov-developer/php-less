<?php


define('DB_HOST', "database");
define('DB_NAME', 'films'); // название БД(которую создали)
define('DB_USER', 'root');
define('DB_PASSWORD', 'tiger');
define('HOST', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', dirname(__FILE__) . '/');

$categories = [
	"Драма",
	"Комедия",
	"Комиксы",
	"Триллер",
	"Фантастика",
	"Боевик",
	"Фэнтези",
	"Без категории"
];

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
// Поддерживаемые типы изображений
$allowed_file_types = ['image/jpeg', 'image/png', 'image/gif'];
// Поддерживаемые расширения изображений
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

// макисмальный размер файла для загрузки
define('MAX_UPLOAD_FILE_SIZE', 10 * 1024 * 1024);

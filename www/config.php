<?php

define('DB_HOST', "database");
define('DB_NAME', 'project'); // название БД(которую создали)
define('DB_USER', 'root');
define('DB_PASSWORD', 'tiger');

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}
define('HOST', $protocol . $_SERVER['HTTP_HOST'] . '/');
define('ROOT', dirname(__FILE__) . '/');

<?php

require_once('config.php');
require_once('db.php');

/* -----------------
// Router 
-------------------*/
// 1. подготовка строки с запросом для routes
$uri = $_SERVER['REQUEST_URI'];
$uri = rtrim($uri, "/");
$uri = filter_var($uri, FILTER_SANITIZE_URL); // удаляет лишние символы, кроме допустимых в запросе
$uri = substr($uri, 1); // удаление 1го слеша
$uri = explode('?', $uri); // разбивает на массив по разделителю ? (в нашем случае знак ?)

// 2. routes
switch ($uri[0]) {
	case '':
		require(ROOT . 'modules/main/index.php');
		break;
	case 'about':
		require(ROOT . 'modules/about/index.php');
		break;
	case 'blog':
		require(ROOT . 'modules/blog/index.php');
		break;
	case 'contacts':
		require(ROOT . 'modules/contacts/index.php');
		break;
	default:
		require(ROOT . 'modules/main/index.php');
		break;
}

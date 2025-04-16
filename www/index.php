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
	// ------------- USERS ----------------- //

	case 'login':
		require(ROOT . 'modules/login/login.php');
		break;
	case 'registration':
		require(ROOT . 'modules/login/registration.php');
		break;
	case 'logout':
		require(ROOT . 'modules/login/logout.php');
		break;
	case 'lost-password':
		require(ROOT . 'modules/login/lost-password.php');
		break;
	case 'set-new-password':
		require(ROOT . 'modules/login/set-new-password.php');
		break;
	case 'profile':
		require(ROOT . 'modules/profile/index.php');
		break;
	case 'profile-edit':
		require(ROOT . 'modules/profile/profile-edit.php');
		break;

	// ------------- OTHERS ----------------- //
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

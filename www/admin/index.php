<?php

require_once "./../config.php";
require_once "./../db.php";
require_once ROOT . "libs/resize-and-crop.php";

$_SESSION['errors'] = array();
$_SESSION['success'] = array();

session_start();

/* ..........................................

РОУТЕР // ROUTE - МАРШРУТ

............................................. */

// Обработка запроса
$uri = $_SERVER['REQUEST_URI'];

$uriArray = explode('?', $uri); // разбиваем на 2 части по символу ?
$uri = $uriArray[0]; // получаем /admin/blog
$uri = rtrim($uri, "/"); // обрезаем слеш в конце /admin/blog/ => /admin/blog
$uri = substr($uri, 1); // обрезаем слеш в начале /admin/blog => admin/blog
$uri = filter_var($uri, FILTER_SANITIZE_URL);

// разбиваем строку запроса по символу / и получаем массив admin/blog => ['admin', 'blog']
$moduleNameArr = explode('/', $uri);
$uriModule = $moduleNameArr[1]; // модуль который надо запустить



// print_r($uriArray);
// die();

// Роутер
switch ($uriModule) {

	case '':
		require(ROOT . "admin/modules/admin/index.php");
		break;

	// ::::::::::::::::::: BLOG :::::::::::::::::::
	case 'blog':
		require ROOT . "admin/modules/blog/index.php";
		break;
	case 'post-new':
		require ROOT . "admin/modules/blog/post-new.php";
		break;
	case 'post-edit':
		require ROOT . "admin/modules/blog/post-edit.php";
		break;
	case 'post-delete':
		require ROOT . "admin/modules/blog/post-delete.php";
		break;

	default:
		require ROOT . "admin/modules/admin/index.php";
		break;
}

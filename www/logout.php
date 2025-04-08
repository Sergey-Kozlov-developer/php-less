<?php
// Старт сессии
session_start();
// очистка сессии
$_SESSION = [];
// удаление сессионного cookie
if (ini_get("session.use_cookies")) {
	$params = session_get_cookie_params();
	setcookie(
		session_name(),
		'',
		time() - 42000,
		$params['path'],
		$params['domain'],
		$params['secure'],
		$params['httponly'],
	);
}

// уничтожение сессии
session_destroy();
// перенаправление на главную страницу
header('Location: ./index.php');
exit;

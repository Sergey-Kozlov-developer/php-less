<?php

$pageTitle = "Вход на сайт";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// 1. POST 
if (isset($_POST['login'])) {
	// 2. заполненность полей
	if (trim($_POST['email']) == '') {
		// Ошибка! email пуст
		$errors[] = ["title" => "Введите email", "desc" => "<p>Email обязателен для регистрации на сайте</p>"];
	} else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors[] = ["title" => "Введите корректный email"];
	}

	if (trim($_POST['password']) == '') {
		// Ошибка! password пуст
		$errors[] = ["title" => "Введите password"];
	}
	// если ошибок нет
	if (empty($errors)) {
		// 3. ищем нужного пользователя в БД по email 
		$user = R::findOne('users', 'email = ?', array($_POST['email']));
		if ($user) {
			// 4. соответствие пароля
			// проверка пароля
			if (password_verify($_POST['password'], $user['password'])) {
				// 5. вход пользователя на сайт
				// пароль верен
				// вход на сайт
				$success[] = ["title" => "Верный пароль"];
			} else {
				// пароль не верен 
				$errors[] = ["title" => "Неверный пароль"];
			}
		} else {
			// email не найден
			$errors[] = ["title" => "Неверный email"];
		}
	}
}



ob_start();
include ROOT . 'templates/login/form-login.tpl';

$content = ob_get_contents();

ob_end_clean();

// генерация страниц
include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

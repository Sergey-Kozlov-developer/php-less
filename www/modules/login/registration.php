<?php

$pageTitle = "Регистрация";

// проверка на заполненность полей почты и пароля
// и дальнейщей регистрации
if (isset($_POST['register'])) {
	// проверка email
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
	// проверка на минимальную длину пароля
	$password = trim($_POST['password']);
	if (empty($password)) {
		$errors[] = ["title" => "Введите пароль"];
	} else {
		$minLength = 4; // Минимальная длина пароля

		if (strlen($password) < $minLength) {
			$errors[] = ["title" => "Пароль слишком короткий", "desc" => "Минимальная длина пароля: {$minLength} символа"];
		}
	}

	// проверка на существующий email
	if (R::count('users', 'email = ?', array($_POST['email'])) > 0) {
		$errors[] = [
			"title" => "Пользователь с таким email уже зарегистрирован",
			"desc" => '<p>Используйте другой email или воспользуйтесь
			<a href="' . HOST . 'lost-password">восстановлением пароля</a></p>'
		];
	}

	// регистрация пользователей, если нет ошибок
	if (empty($errors)) {
		$user = R::dispense('users');
		$user->email = $_POST['email'];
		$user->role = 'user';
		// password_hash для шифрования пароля
		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$result = R::store($user); // сохраняем пользователя в БД
		if (is_int($result)) {
			// сообщение об успехе
			$success[] = ["title" => "Регистрация прошла успешно"];
		} else {
			$errors[] = ["title" => "Что-то пошло не так, повторите регистрацию"];
		}
	}
}

ob_start();
include ROOT . 'templates/login/form-registration.tpl';

$content = ob_get_contents();

ob_end_clean();

// генерация страниц
include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

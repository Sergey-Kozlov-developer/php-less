<?php

$pageTitle = "Установить новый пароль";
// 1. пришли по ссылки с email
if (!empty($_GET['email']) && !empty($_GET['code'])) {
	// найти user по email в БД
	$user = R::findOne('users', 'email = ?', array($_GET['email']));

	if (!$user) {
		header("Location: " . HOST . "lost-password");
	}
} // 2. если отправлена форма с новым паролем
else if (!empty($_POST['set-new-password'])) {
	// найти user по email в БД
	$user = R::findOne('users', 'email = ?', array($_POST['email']));
	// пользователь найден
	if ($user) {
		// проверить секретный еод на верность
		if ($user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '') {
			// смена пароля
			$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$user->recovery_code = '';
			R::store($user);

			// показываем сообщение об успехе и вход на сайт
			$success[] = ['title' => 'Пароль успешно обновлен'];

			$newPasswordReady = true;
		} else {
			$errors[] = ['title' => 'Неверный код'];
		}
	}
} else {
	// 3. перенаправляем на lost-password
	header("Location: " . HOST . "lost-password");
	die();
}





ob_start();
include ROOT . 'templates/login/set-new-password.tpl';

$content = ob_get_contents();

ob_end_clean();

// генерация страниц
include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

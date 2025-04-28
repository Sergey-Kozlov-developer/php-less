<?php

$pageTitle = "Установить новый пароль";
$pageClass = "authorization-page";

// 1) Пришли по секретной ссылке с EMAIl
if (!empty($_GET['email']) && !empty($_GET['code'])) {

    // Найти юзера по email в БД
    $user = R::findOne('users', 'email = ?', array($_GET['email']));

    if (!$user) {
        header("Location: " . HOST . "lost-password");
    }
}
// 2) Если отправлена форма с новым паролем
else if (!empty($_POST['set-new-password'])) {

    // Найти юзера по email в БД
    $user = R::findOne('users', 'email = ?', array($_POST['email']));

    // Если пользователь был найден
    if ($user) {
        // Проверить Секретный код на верность
        if ($user->recovery_code === $_POST['resetCode'] && $user->recovery_code != '' && $user->recovery_code != NULL ) {
            // Смена пароля
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->recovery_code = '';
            R::store($user);

            // Сообщение об успехе и вход на сайт
            $success[] = ['title' => 'Пароль успешно обновлен!'];

            $newPasswordReady = true;
        } else {
            $_SESSION['errors'][] = ['title' => 'Неверный код'];
        }
    }
}
// 3) Перенаправляем на loat-password
else {
    header("Location: " . HOST . "lost-password");
    die();
}

ob_start();
include ROOT . 'templates/login/set-new-password.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

<?php

$pageTitle = "Вход на сайт";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// 1. Проверка на отправку формы входа
if (isset($_POST['login'])) {

    // 2. Заполненность полей
    if ( trim($_POST['email']) == '' ) {
        $errors[] = ['title' => 'Введите Email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>'];
    } else if ( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
        $errors[] = ['title' => 'Введите корректный Email'];
    }

    if ( trim($_POST['password']) == '' ) {
        $errors[] = ['title' => 'Введите пароль'];
    }

    // Если поля заполнены, ошибок нет
    if (empty($errors)){
        // 3. Ищем нужного юзера в БД по email
        $user = R::findOne('users', 'email = ?', array($_POST['email']));

        if ( $user ) {
            // 4. Сравнение пароля
            if ( password_verify($_POST['password'], $user->password) ) {
                // Пароль верен!
                // Вход на сайт!
                // 5. Вход пользователя на сайт
                $success[] = ['title' => 'Верный пароль!'];
            } else {
                // Пароль не верен
                $errors[] = ['title' => 'Неверный пароль'];
            }
        } else {
            // Email не найден
            $errors[] = ['title' => 'Неверный email'];

        }

    }

}

ob_start();
include ROOT . 'templates/login/form-login.tpl';
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/login/login-page.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

<?php

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

// Проверка есть ли параметр с ID пользователя
if (isset($uriArray[1])) {
    // ID был передан, находим юзера в БД
    // Загружаем данные юзера из БД по его ID
    $user = R::load('users', $uriArray[1]);

} else {
    // Если не было дополнительного параметра

    // Проверка вошел пользователь или нет
    if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        // Пользователь залогинен и показываем его профиль
        $user = R::load('users', $_SESSION['logged_user']['id']);

    } else {
        // Пользователь не залогинен, показываем приглашение к регистрации
        $userNotLoggedIn = true;
    }

}



include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/profile/profile.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

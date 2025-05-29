<?php

function getUserComments($userId){
    $sqlQuery = 'SELECT
                        comments.id, comments.text, comments.post, comments.user, comments.timestamp,
                        posts.title
                FROM `comments`
                LEFT JOIN `posts` ON comments.post = posts.id
                WHERE comments.user = ?';

    return R::getAll($sqlQuery, [$userId]);

}

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

// Проверка есть ли параметр с ID пользователя
if (isset($uriGet)) {
    // ID был передан, находим юзера в БД
    // Загружаем данные юзера из БД по его ID
    $user = R::load('users', $uriGet);
    
    // Загружаем комментари пользователя
    $comments = getUserComments($uriGet);


} else {
    // Если не было дополнительного параметра

    // Проверка вошел пользователь или нет
    if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        // Пользователь залогинен и показываем его профиль
        $user = R::load('users', $_SESSION['logged_user']['id']);

        // Загружаем комментари пользователя
        $comments = getUserComments($_SESSION['logged_user']['id']);

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

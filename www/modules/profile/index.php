<?php

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

// Загружаем данные юзера из БД по его ID
$user = R::load('users', $uriGet);

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/profile/profile.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

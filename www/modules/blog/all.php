<?php

$pageTitle = "Блог - все записи";

$pagination = pagination(6, 'posts');

// Выводим все посты
$posts = R::find('posts', 'ORDER BY id DESC ' . $pagination['sql_pages_limit']);

// Центральный шаблон для модуля
ob_start();
include ROOT . 'templates/blog/all-posts.tpl';
$content = ob_get_contents();
ob_end_clean();

// Центральный шаблон для модуля
include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/blog/index.tpl';
include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

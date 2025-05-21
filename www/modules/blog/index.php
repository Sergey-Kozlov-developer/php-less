<?php

$pageTitle = "Блог - все записи";

if ( isset($uriGet) ) {
    // Выводим отдельный пост
    $post = R::load('posts', $uriGet);

    // Центральный шаблон для модуля
    ob_start();
    include ROOT . 'templates/blog/single-post.tpl';
    $content = ob_get_contents();
    ob_end_clean();



} else {
    // кол-во постов на странице
    $results_per_page = 2;
    // текущая страница

    // номер текущей запрашиваемой страницы берем из GET
    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = intval($_GET['page']);
    }
    // опредялем с какого поста начать вывод
    $starting_limit_number = ($page_number - 1) * $results_per_page;

    // считаем кол-во страниц пагинации
    $number_of_results = R::count('posts');
    $number_of_pages = ceil($number_of_results / $results_per_page);


    // запрос в БД на вывод постов
    $posts = R::find('posts', "ORDER BY id DESC LIMIT {$starting_limit_number}, {$results_per_page}");

    // Центральный шаблон для модуля
    ob_start();
    include ROOT . 'templates/blog/all-posts.tpl';
    $content = ob_get_contents();
    ob_end_clean();

}



// Центральный шаблон для модуля
include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/blog/index.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
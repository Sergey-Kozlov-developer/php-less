<?php

$details = R::find('about', 1);

// echo "<pre>";
// print_r($details);
// echo $details[1]['name'];
// echo $details[1]['description'];
// echo "</pre>";

$about_name = $details[1]['name'];
$about_desc = $details[1]['description'];

$page_name = "Главная страница";
$page_text = "Текст главной страницы......";
// добавляем шаблон в буфер
ob_start();
include ROOT . 'templates/main/main.tpl';

$content = ob_get_contents();

ob_end_clean();

// генерация страниц
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/template.tpl';
include ROOT . 'templates/_parts/_footer.tpl';

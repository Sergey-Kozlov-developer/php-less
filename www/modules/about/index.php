<?php
$page_name = "О сайте";
$page_text = "Текст страницы о сайте......";
// добавляем шаблон в буфер
ob_start();
include ROOT . 'templates/about/about.tpl';

$content = ob_get_contents();

ob_end_clean();

// генерация страниц
include ROOT . 'templates/_parts/_header.tpl';
include ROOT . 'templates/template.tpl';
include ROOT . 'templates/_parts/_footer.tpl';

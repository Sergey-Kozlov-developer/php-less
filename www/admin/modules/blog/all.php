<?php

$posts = R::find('posts', 'ORDER BY id DESC');

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/blog/all.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';
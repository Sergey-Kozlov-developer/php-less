<?php

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/blog/post-delete.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';
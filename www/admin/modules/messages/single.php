<?php

$message = R::load('messages', $_GET['id']);
$message->status = NULL;
R::store($message);

$messagesNewCounter = R::count('messages', 'status = ?', ['new']);

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/messages/single.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';

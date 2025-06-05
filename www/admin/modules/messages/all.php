<?php

// print_r($_GET);
// die();

// Проверка запроса на удаление
if ( isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $message = R::load('messages', $_GET['id']);
    // Удаление файла
    if (!empty($message['file_name_src'])) {
        $fileFolderLocation = ROOT . 'usercontent/contact-form/';
        unlink($fileFolderLocation . $message->file_name_src);
    }
    R::trash($message);
    $_SESSION['success'][] = ['title' => 'Сообщение было удалено'];

}

$messages = R::find('messages', 'ORDER BY id DESC');

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/messages/all.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';

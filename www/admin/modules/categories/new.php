<?php

if (isset($_POST['submit'])) {

    // Проверка на заполненность - Заголовок
    if (trim($_POST['title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите заголовок поста'];
    }

    if (empty($_SESSION['errors'])) {
        $cat = R::dispense('categories');
        $cat->title = $_POST['title'];
        R::store($cat);
        $_SESSION['success'][] = ['title' => 'Категория была успешно создана'];
        header('Location: ' . HOST . 'admin/category');
        exit();
    }

}

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/categories/new.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';
<?php

$post = R::load('posts', $_GET['id']);


if (isset($_POST['post-delete'])) {

    // Удаление обложки
    if (!empty($post['cover'])) {
        $coverFolderLocation = ROOT . 'usercontent/blog/';
        unlink($coverFolderLocation . $post->cover);
        unlink($coverFolderLocation . $post->cover_small);
    }

    R::trash($post);
    $_SESSION['success'][] = ['title' => 'Пост был удален'];
    header('Location:' . HOST . 'admin/blog');
    exit();
}

// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/blog/delete.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';

<?php

if (isset($_POST['submit'])) {
    $comment = R::dispense('comments');
    $comment->text = $_POST['comment'];
    $comment->post = $_POST['id'];
    $comment->user = $_SESSION['logged_user']['id'];
    $comment->timestamp = time();
    R::store($comment);
    header("Location: " . HOST . "blog/" . $_POST['id']);
} else {
    header("Location: " . HOST );
}

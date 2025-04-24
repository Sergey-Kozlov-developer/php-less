<?php

// $content = "Main page";

$pageTitle = "Профиль пользователя";

// ob_start();
// include ROOT . 'templates/about/about.tpl';
// $content = ob_get_contents();
// ob_end_clean();

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/profile/profile-edit.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';

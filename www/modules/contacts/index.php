<?php

$pageTitle = "Контакты";
// $pageClass = "";

$contacts = R::load('contacts', 1);

include ROOT . 'templates/_page-parts/_head.tpl';
include ROOT . 'templates/_parts/_header.tpl';

include ROOT . 'templates/contacts/contacts.tpl';

include ROOT . 'templates/_parts/_footer.tpl';
include ROOT . 'templates/_page-parts/_foot.tpl';
<?php


// Получаем массив с нужными настройками
$settingsArray = R::find('settings', ' section LIKE ? ', ['settings']);

// Создаем массив который наполним
$settings = [];

foreach ($settingsArray as $key => $value) {
    $settings[$value['name']] = $value['value'];
}



<?php

// Если форма отправлена
if (isset($_POST['submit'])) {

    // Проверка на заполненность - Заголовок
    if (trim($_POST['contacts_title']) == '') {
        $_SESSION['errors'][] = ['title' => 'Введите заголовок контактов'];
    }

    // Проверка на заполненность - Содержимое
    if (trim($_POST['contacts_text']) == '') {
        $_SESSION['errors'][] = ['title' => 'Заполните содержимое контактов'];
    }

    if (empty($_SESSION['errors'])) {

        function trimElement ($item){
            return trim($item);
        }

        $_POST = array_map('trimElement', $_POST);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['about_title'], 'about_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['about_text'], 'about_text']);

        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['services_title'], 'services_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['services_text'], 'services_text']);

        $res[] =  R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['contacts_title'], 'contacts_title']);
        $res[] = R::exec('UPDATE settings SET value = ? WHERE name = ? ', [$_POST['contacts_text'], 'contacts_text']);

        // Сделать проверку. Если хотя бы 1 является пустым массивом, тогда - НЕ УСПЕХ!!!!
        $fail = false;
        foreach ($res as $value) {
            if (is_array($value) && empty($value)) {
                $fail = true;
            }
        }

        // Проверка на ошибку при сохранении и вывод нтификации
        if ($fail) {
            $_SESSION['errors'][] = [
                'title' => 'Данные не сохранились',
                'desc' => 'Если ошибка повторяется, обратитесь к администратору сайта.'
            ];
        } else {
            $_SESSION['success'][] = ['title' => 'Контакты успешно обновлены'];
        }

    }
}

// Получаем массив с нужными настройками
$settingsContacts = R::find('settings', ' section LIKE ? ', ['contacts']);

// Для вывода в шаблоне нашими ключами должны стать значения из поля 'name':
// about_title, about_text, services_title и т.д.
// Значит надо сформировать новый массив с такими ключами из 'name' и значениями из 'value'

// Создаем массив который наполним
$contacts = [];

foreach ($settingsContacts as $key => $value) {
    $contacts[$value['name']] = $value['value'];
}

// print_r($contacts);
// die();




// Центральный шаблон для модуля
ob_start();
include ROOT . 'admin/templates/contacts/edit.tpl';
$content = ob_get_contents();
ob_end_clean();

// Шаблон страницы
include ROOT . 'admin/templates/template.tpl';

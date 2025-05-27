<?php

function updateUserandGoToProfile($user){
    if (isset($_POST['updateProfile'])) {

        // Проверить поля на заполненность
        if (trim($_POST['name']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите имя'];
        }
        if (trim($_POST['surname']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите фамилию'];
        }
        if (trim($_POST['email']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите Email'];
        }

        // Обновить инфу в БД
        if (empty($_SESSION['errors'])) {
            $user->name = htmlentities($_POST['name']);
            $user->surname = htmlentities($_POST['surname']);
            $user->email = htmlentities($_POST['email']);
            $user->city = htmlentities($_POST['city']);
            $user->country = htmlentities($_POST['country']);

            // Если передано изображение - уменьшаем, сохраняем, записываем в БД
            if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['tmp_name'] !== '') {
                // Обрабатываем картинку, сохраняем, и получаем имя файла
                $avatarFileName = saveUploadedImg('avatar', [160, 160], 12, 'avatars', [160, 160], [48, 48]);

                // Если новое изображение успешно загружено тогда удаляем старое
                if ($avatarFileName) {
                    // Удаляем старое изображение
                    if (file_exists(ROOT . 'usercontent/avatars/' . $user->avatar) && !empty($user->avatar)){
                        unlink(ROOT . 'usercontent/avatars/' . $user->avatar);
                    }
                    if (file_exists(ROOT . 'usercontent/avatars/' . $user->avatarSmall) && !empty($user->avatarSmall)  ) {
                        unlink(ROOT . 'usercontent/avatars/' . $user->avatarSmall);
                    }
                }

                // Сохраняем имя файла в БД
                $user->avatar = $avatarFileName[0];
                $user->avatarSmall = $avatarFileName[1];
            }

            // Удаление аватарки
            if ( isset($_POST['delete-avatar']) && $_POST['delete-avatar'] == 'on') {

                // Удалить файлы аватарки
                $avatarFolderLocation = ROOT . 'usercontent/avatars/';
                unlink($avatarFolderLocation . $user->avatar);
                unlink($avatarFolderLocation . '48-' . $user->avatar);

                // Удалить записи в БД
                $user->avatar = '';
                $user->avatarSmall = '';

            }

            R::store($user);
            $_SESSION['logged_user'] = $user;

            header('Location: ' . HOST . 'profile');
            exit();

        }
    }
}

// Проверка на что что юзер залогинен
if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
    // Юзер залогинен

    // Проверка на роль Юзера (пользователь или админ)
    if ($_SESSION['logged_user']['role'] === 'user') {
        // Это обычный пользователь
        $user = R::load('users', $_SESSION['logged_user']['id']);
        // Обновляем данные пользователя, после оптравки формы
        updateUserandGoToProfile($user);

    } else if ($_SESSION['logged_user']['role'] === 'admin' ) {
        // Это Администратор сайта

        // Делаем проверку на дополнительный параметр - ID пользователя для редактирования

        if (isset($uriGet)) {
            // Редактирование чужого профиля
            // Загружаем данные о профиле
            $user = R::load('users', intval($uriGet));

            // Обновляем данные пользователя, после оптравки формы
            updateUserandGoToProfile($user);

        } else {
            // Редактирование своего профиля
            $user = R::load('users', $_SESSION['logged_user']['id']);

            // Обновляем данные пользователя, после оптравки формы
            updateUserandGoToProfile($user);

        }








    }

} else {
    header('Location: ' . HOST . 'login');
    exit();
}

// Запрос данных из БД по Юзеру


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

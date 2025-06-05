<?php

// Поиск названия модуля для Админки
function getModuleNameForAdmin()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    /*
    * /admin/blog?id=15
    * /admin/blog/
    */
    $uriArr = explode('?', $uri); // Разбиваем запрос по символу '?' чтобы отсечь GET запрос
    $uri = $uriArr[0]; // /admin/blog?id=15 => /admin/blog
    $uri = rtrim($uri, "/"); // Обрезаем слеш в конце /admin/blog/ => /admin/blog
    $uri = substr($uri, 1); // Обрезаем слеш в начале /admin/blog => admin/blog
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    $moduleNameArr = explode('/', $uri);
    // Разбиваем строку запроса по символу / и получаем массив
    // admin/blog => ['admin', 'blog']

    // Достаем имя модуля который надо запустить admin/blog => blog
    $uriModule = isset($moduleNameArr[1]) ? $moduleNameArr[1] : null;

    return $uriModule; // blog
}

// Поиск названия модуля
function getModuleName()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    /*
    * /admin/blog?id=15
    * /admin/blog/
    */
    $uriArr = explode('?', $uri); // Разбиваем запрос по символу '?' чтобы отсечь GET запрос
    $uri = $uriArr[0]; // /admin/blog?id=15 => /admin/blog
    $uri = rtrim($uri, "/"); // Обрезаем слеш в конце /admin/blog/ => /admin/blog
    $uri = substr($uri, 1); // Обрезаем слеш в начале /admin/blog => admin/blog
    $uri = filter_var($uri, FILTER_SANITIZE_URL);

    $moduleNameArr = explode('/', $uri);
    // Разбиваем строку запроса по символу / и получаем массив
    // admin/blog => ['admin', 'blog']

    $uriModule = $moduleNameArr[0]; // Достаем имя модуля который надо запустить admin/blog => blog

    return $uriModule; // blog
}

// Аналог get запроса из URI
function getUriGet()
{
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, "/"); // 'site.ru/' => 'site.ru'
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri); // ['profile/15', 'id=20']
    $uri = $uri[0];
    $uriArr = explode('/', $uri); // ['profile', '15']
    $uriGet = isset($uriArr[1]) ? $uriArr[1] : null;
    return $uriGet; // profile/15 => 15
}

function getUriGetParam (){
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, "/"); // 'site.ru/' => 'site.ru'
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri); // ['blog/cat/5', 'id=20']
    $uri = $uri[0];
    $uriArr = explode('/', $uri); // ['blog', 'cat', '15']
    $uriGet = isset($uriArr[2]) ? $uriArr[2] : null;
    return $uriGet; // blog/cat/15 => 15
}

function rus_date()
{
    // Перевод
    $translate = array(
        "am" => "дп",
        "pm" => "пп",
        "AM" => "ДП",
        "PM" => "ПП",
        "Monday" => "Понедельник",
        "Mon" => "Пн",
        "Tuesday" => "Вторник",
        "Tue" => "Вт",
        "Wednesday" => "Среда",
        "Wed" => "Ср",
        "Thursday" => "Четверг",
        "Thu" => "Чт",
        "Friday" => "Пятница",
        "Fri" => "Пт",
        "Saturday" => "Суббота",
        "Sat" => "Сб",
        "Sunday" => "Воскресенье",
        "Sun" => "Вс",
        "January" => "Января",
        "Jan" => "Янв",
        "February" => "Февраля",
        "Feb" => "Фев",
        "March" => "Марта",
        "Mar" => "Мар",
        "April" => "Апреля",
        "Apr" => "Апр",
        "May" => "Мая",
        "May" => "Мая",
        "June" => "Июня",
        "Jun" => "Июн",
        "July" => "Июля",
        "Jul" => "Июл",
        "August" => "Августа",
        "Aug" => "Авг",
        "September" => "Сентября",
        "Sep" => "Сен",
        "October" => "Октября",
        "Oct" => "Окт",
        "November" => "Ноября",
        "Nov" => "Ноя",
        "December" => "Декабря",
        "Dec" => "Дек",
        "st" => "ое",
        "nd" => "ое",
        "rd" => "е",
        "th" => "ое"
    );
    // если передали дату, то переводим ее
    if (func_num_args() > 1) {
        return strtr(date(func_get_arg(0), func_get_arg(1)), $translate);
    }
    // иначе генерируем текущее время
    else {
        return strtr(date(func_get_arg(0)), $translate);
    }
}

// pagination(6, 'posts');
// pagination(6, 'posts', [' cat = ? ', [4] ]);
function pagination($results_per_page, $type, $params = null)
{
    // 18 постов
    // по 6 постов на страницу
    // Итого 3 страницы

    // Считаем количество результатов (постов например)
    // Проверка переданы ли дополнительные параметры, например категория в блоге или нет
    if (empty($params)) {
        // Если параметров нет, то просто смотрим сколько постов в блоге
        $number_of_results = R::count($type);
    } else {
        // Если параметры есть - тогда смотрим сколько постов в блоге !!!в данной категории!!!
        $number_of_results = R::count($type, $params[0], $params[1]);
    }

    // Считаем количество страниц пагинации
    $number_of_pages = ceil($number_of_results / $results_per_page); // 20 / 6 = 4

    // Определяем текущий номер запрашиваемой страницы
    if (!isset($_GET['page'])) {
        $page_number = 1;
    } else {
        $page_number = $_GET['page'];
    }

    // Если запросили страницу котьорой не существует, то показываем последнюю доступнуюю
    if ($page_number > $number_of_pages) {
        $page_number = $number_of_pages;
    }

    // Определяем с какого поста начать вывод
    $starting_limit_number = ($page_number - 1) * $results_per_page;
    // формируем подстроку для sql запроса
    $sql_pages_limit = "LIMIT {$starting_limit_number}, $results_per_page";

    // return $sql_pages_limit;

    // Результирующий массив с данными
    $result['number_of_pages'] = $number_of_pages; // 3
    $result['page_number'] = $page_number; // 2
    $result['sql_pages_limit'] = $sql_pages_limit; // LIMIT 6, 6

    return $result;
}

// Работа с файлами
// Сохранение изображения

// saveUploadedImg('cover', [600, 300], 12, 'blog', [1110, 460], [290, 230]);
function saveUploadedImg($inputFileName, $minSize, $maxFileSizeMb, $folderName, $fullSize, $smallSize)
{

    /*
    1. Имя файла из формы (avatar / cover / project) | string
    2. Минимальный размер изображения по ширине и высоте | array
    3. Максимальный размер файла в Мб | integer
    4. Имя директории для размещения файла | string
    5. Размеры большой версии изображения | array
    6. Размеры маленькой превьюшки | array
    */

    // Если передано изображение - уменьшаем, сохраняем, записываем в БД
    // Работа с файлом фотографии для аватара пользователя

    // 1. Записываем параметры файла в переменные
    $fileName = $_FILES[$inputFileName]["name"];
    $fileTmpLoc = $_FILES[$inputFileName]["tmp_name"];
    $fileType = $_FILES[$inputFileName]["type"];
    $fileSize = $_FILES[$inputFileName]["size"];
    $fileErrorMsg = $_FILES[$inputFileName]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    // 2. Проверка файла на корректность
    // 2.1 Проверка на маленький размер изображения
    list($width, $height) = getimagesize($fileTmpLoc);
    if ($width < $minSize[0] || $height < $minSize[1]) {
        $_SESSION['errors'][] = [
            'title' => 'Изображение слишком маленького размера. ',
            'desc' => 'Загрузите изображение c размерами от 600x300 или более .'
        ];
    }

    // 2.2 Проверка на большой вес файла
    if ($fileSize > ($maxFileSizeMb * 1024 * 1024)) {
        $_SESSION['errors'][] = ['title' => 'Файл изображения не должен быть более 12 Mb'];
    }

    // 2.3 Проверка на формат файла
    if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
        $_SESSION['errors'][]  = ['title' => 'Неверный формат файла', 'desc' => '<p>Файл изображения должен быть в формате gif, jpg, jpeg, или png.</p>',];
    }

    // 2.4 Проверка ошиьбки при загрузке
    if ($fileErrorMsg == 1) {
        $_SESSION['errors'][] = ['title' => 'При загрузке изображения произошла ошибка. Повторите попытку'];
    }

    // Если нет ошибок - двигаемся дальше
    if (empty($_SESSION['errors'])) {

        // Прописываем путь для хранения изображения
        $imgFolderLocation = ROOT . "usercontent/{$folderName}/";

        $db_file_name =
            rand(100000000000, 999999999999) . "." . $fileExt;
        $filePathFullSize = $imgFolderLocation . $db_file_name;
        $filePathSmallSize = $imgFolderLocation . $smallSize[0] . '-' . $db_file_name;

        // Обработать фотографию
        // 1. Обрезать до 160х160
        $resultFullSize = resize_and_crop($fileTmpLoc, $filePathFullSize, $fullSize[0], $fullSize[1]);
        // 2. Обрезать до 48х48
        $resultSmallSize = resize_and_crop($fileTmpLoc, $filePathSmallSize, $smallSize[0], $smallSize[1]);

        if ($resultFullSize != true || $resultSmallSize != true) {
            $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
            return false;
        }

        return [$db_file_name, $smallSize[0] . '-' . $db_file_name];
    }
}

// saveUploadedFile('file', 12, 'contact-form');
function saveUploadedFile($inputFileName, $maxFileSizeMb, $folderName)
{

    // 1. Записываем параметры файла в переменные
    $fileName = $_FILES[$inputFileName]["name"];
    $fileTmpLoc = $_FILES[$inputFileName]["tmp_name"];
    $fileType = $_FILES[$inputFileName]["type"];
    $fileSize = $_FILES[$inputFileName]["size"];
    $fileErrorMsg = $_FILES[$inputFileName]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);

    // 2.2 Проверка на большой вес файла
    if ($fileSize > ($maxFileSizeMb * 1024 * 1024)) {
        $_SESSION['errors'][] = ['title' => 'Файл изображения не должен быть более 12 Mb'];
    }

    // 2.3 Проверка на формат файла
    if (!preg_match("/\.(gif|jpg|jpeg|png|pdf|zip|rar|doc|docx)$/i", $fileName)) {
        $_SESSION['errors'][]  = ['title' => 'Неверный формат файла', 'desc' => '<p>Файл должен быть в формате gif, jpg, jpeg, png, rar, zip, doc, docx, pdf.</p>',];
    }
    // 2.4 Проверка ошибки при загрузке
    if ($fileErrorMsg == 1) {
        $_SESSION['errors'][] = ['title' => 'При загрузке изображения произошла ошибка. Повторите попытку'];
    }

    // Если нет ошибок - двигаемся дальше
    if (empty($_SESSION['errors'])) {

        // Прописываем путь для хранения файла
        $fileFolderLocation = ROOT . "usercontent/{$folderName}/";

        $db_file_name =
            rand(100000000000, 999999999999) . "." . $fileExt;
        $newFilePath = $fileFolderLocation . $db_file_name;

        // Перемещаем загруженный файл
        $result = move_uploaded_file($fileTmpLoc, $newFilePath);

        if ($result != true) {
            $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла'];
            return false;
        }

        return [$db_file_name, $fileName];
    }
}

// Вывод похожих постов posts
function get_related_posts($postTitle)
{


    $wordsArray = explode(' ', $postTitle);
    $wordsArray = array_unique($wordsArray);

    // Массив со стоп словами (предлоги, союзы, можно добавить другие "общие" слова)
    $stopWords = ['и', 'на', 'в', 'а', 'под', 'если', 'за', '-', 'что', 'самом', 'деле', 'означает'];

    // Новый обработанный массив
    $newWordsArray = array();

    foreach ($wordsArray as $word) {

        // переводим в нижний регистр
        $word = mb_strtolower($word);

        // Удаляем кавычки и лишние символы
        $word = str_replace('"', "", $word);
        $word = str_replace("'", "", $word);
        $word = str_replace("»", "", $word);
        $word = str_replace("«", "", $word);
        $word = str_replace(",", "", $word);
        $word = str_replace(".", "", $word);

        // Проверяем наличие слова в стоп списке
        if (!in_array($word, $stopWords)) {

            // Обрезаем окончания
            if (mb_strlen($word) > 4) {
                $word = mb_substr($word, 0, -2);
            } else if (mb_strlen($word) > 3) {
                $word = mb_substr($word, 0, -1);
            }

            // Добавляем символ шаблона
            $word = '%' . $word . '%';

            // Добавляем слова в новый массив
            $newWordsArray[] = $word;
        }
    }

    // SQL запрос который нужно сформировать
    // $relatedPosts = R::getAll('SELECT * FROM `posts` WHERE title LIKE ? OR title LIKE ?', ['%Москва%', '%Ford%']);

    $sqlQuery = 'SELECT id, title, cover_small FROM `posts` WHERE ';

    for ($i = 0; $i < count($newWordsArray); $i++) {
        if ($i + 1 == count($newWordsArray)) {
            // Последний цикл
            $sqlQuery .= 'title LIKE ?';
        } else {
            $sqlQuery .= 'title LIKE ? OR ';
        }
    }

    $sqlQuery .= ' order by RAND() LIMIT 3';

    return R::getAll($sqlQuery, $newWordsArray);
}
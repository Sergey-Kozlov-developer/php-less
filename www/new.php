<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/create_film.php');



if ($_SERVER['REQUEST_METHOD'] === "POST") {


	function createFilm()
	{

		// Валидация формы
		trimPostValues(); // убирает пробельные символы
		// ошибки на незаполненность полей
		$errors = validate_film_form($_POST);
		if (!empty($errors)) return $errors;

		// Работа с изображением фильма
		$thumb_name = null;
		// добавление изображения фильма
		if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] !== '') {
			// загрузка фото
			$file_name = upload_photo();
			if (is_array($file_name) && !empty($errors)) return $file_name;

			// создаем preview изображения
			$photo_path = ROOT . 'data/films/' . $file_name;
			$thumb_name = create_thumbs($photo_path);
			if (is_array($thumb_name) && !empty($errors)) return $thumb_name;
			if (!$thumb_name) return ['Ошибка при создании превью'];
		}
		// добавление фильма в БД
		// добавляем фильм в БД
		$result = create_film($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $thumb_name);
		if (is_array($result) && !empty($errors)) return $result;

		if ($result) {
			$_SESSION['success'][] = "Фильм успешно добавлен";
			// очистка POST при успешном добавлении фильма
			unset($_POST);
			header('Location: ' . HOST . "film.php?id={$result}");
			exit;
		} else {
			return ["Ошибка при добавлении фильма"];
		}
	}

	$_SESSION['errors'] = createFilm();
}
$page_title = "Добавить фильм";


include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');

?>



<main class="main">
	<div class="container">
		<?php include(ROOT . "templates/errors.tpl"); ?>
		<?php include(ROOT . "templates/form-new.tpl"); ?>
	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

?>
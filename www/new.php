<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/create_film.php');



if ($_SERVER['REQUEST_METHOD'] === "POST") {

	trimPostValues(); // убирает пробельные символы

	// ошибки на незаполненность полей
	$errors = array();

	if ($_POST['title'] === '') {
		$errors[] = "Необходимо ввести название фильма";
	}

	if (!isset($_POST['genre'])) {
		$errors[] = "Необходимо ввести жанр фильма";
	}

	if ($_POST['year'] === '') {
		$errors[] = "Необходимо ввести год фильма";
	}

	if (!ctype_digit($_POST['year'])) {
		$errors[] = "Год введен неправильно. Введите число";
	}

	$file_name = null;
	// добавление изображения фильма

	if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] !== '') {
		// загрузка фото
		$file_name = upload_photo();
	}

	if (is_array($file_name)) {
		$errors = array_merge($errors, $file_name);
	}

	// добавление фильма в БД
	if (empty($errors)) {
		// добавляем фильм в БД
		$result = create_film($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $file_name);

		if (is_array($result)) {
			$errors = $result;
		} else {
			$filmID = $result;
			// очистка POST при успешном добавлении фильма
			unset($_POST);
		}
	}
}
$page_title = "Добавить фильм";


include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');

?>



<main class="main">
	<div class="container">
		<?php if (isset($filmID)): ?>
			<div class="alert-wrapper">
				<div class="alert alert--success">Фильм был добавлен. ID фильма: <?= $filmID ?></div>
			</div>
		<?php endif; ?>


		<?php include(ROOT . "templates/form-new.tpl"); ?>
	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

?>
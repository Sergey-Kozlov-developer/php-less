<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/create_film.php');



if ($_SERVER['REQUEST_METHOD'] === "POST") {
	// Валидация формы
	trimPostValues(); // убирает пробельные символы
	// ошибки на незаполненность полей
	$errors = validate_film_form($_POST);
	// Работа с изображением фильма
	$file_name = null;
	// добавление изображения фильма
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] !== '') {
		// загрузка фото
		$file_name = upload_photo();
		if (is_array($file_name)) {
			$errors = array_merge($errors, $file_name);
		} else {
			// создаем preview изображения
			$photo_path = ROOT . 'data/films/' . $file_name;
			$thumb_name = create_thumbs($photo_path);
			if (is_array($thumb_name)) {
				$errors = array_merge($errors, $thumb_name);
			}
		}
	}
	// добавление фильма в БД
	if (empty($errors)) {
		// добавляем фильм в БД
		$result = create_film($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $thumb_name);

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
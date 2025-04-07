<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/update_film.php');

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}

// Редактирование фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// валидация формы
	trimPostValues();
	// ошибки на незаполненность полей
	$errors = validate_film_form($_POST);
	// изображение фильма BD
	$film = get_film($_GET['id']);
	$file_name = $film['photo'];
	// добавление изображения фильма
	if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] !== '') {
		// загрузка фото
		$file_name = upload_photo();
	}
	if (is_array($file_name)) {
		$errors = array_merge($errors, $file_name);
	}

	if (empty($errors)) {
		// Добавляем фильм в БД
		$result = update_film($_GET['id'], $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $file_name);

		if ($result === true) {
			// удаление старой фотографии
			if (is_file(ROOT . 'data/films/' . $film['photo'])) {
				unlink(ROOT . 'data/films/' . $film['photo']);
			}
			// очиска POST
			unset($_POST);
		}
	}
}

$film = get_film($_GET['id']);

if ($film) {
	$page_title = $film['title'];
}

include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">

		<?php if (isset($result) && $result === true): ?>
			<div class="alert-wrapper">
				<div class="alert alert--success">Фильм успешно обновлён</div>
			</div>
		<?php elseif (isset($result) && $result === false): ?>
			<div class="alert-wrapper">
				<div class="alert alert--error">Ошибка обновления фильма</div>
			</div>
		<?php elseif (isset($result) && $result): ?>
			<div class="alert-wrapper">
				<div class="alert alert--warning"><?= $result ?></div>
			</div>
		<?php endif; ?>

		<?php if ($film): ?>

			<h1 class="title-1 mb-20">Редактировать фильм</h1>
			<?php include(ROOT . 'templates/form-edit.tpl'); ?>

		<?php else: ?>
			<div class="alert-wrapper">
				<div class="alert alert--warning">Такого фильма не существует</div>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/update_film.php');

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}

// Удаление фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	trimPostValues();

	$errors = array();

	if ($_POST['title'] === '') {
		$errors[] = "Необходимо ввести название фильма";
	}

	if (!isset($_POST['genre']) || $_POST['genre'] === '') {
		$errors[] = "Необходимо выбрать жанр фильма";
	}

	if ($_POST['year'] === '') {
		$errors[] = "Необходимо год фильма";
	}

	if (!ctype_digit($_POST['year'])) {
		$errors[] = "Год введен неправильно. Введите целое число";
	}

	if (empty($errors)) {
		// Добавляем фильм в БД
		$result = update_film($_GET['id'], $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

		if ($result === true) {
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

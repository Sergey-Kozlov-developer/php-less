<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/delete_film.php');


if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}
// удаление фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === "POST") {

	// удаление изображения фильма
	$film = get_film($_GET['id']);
	if (is_file(ROOT . 'data/films/' . $film['photo'])) {
		unlink(ROOT . 'data/films/' . $film['photo']);
	}
	if (is_file(ROOT . 'data/films/min/' . $film['photo'])) {
		unlink(ROOT . 'data/films/min/' . $film['photo']);
	}
	if (is_file(ROOT . 'data/films/big/' . $film['photo'])) {
		unlink(ROOT . 'data/films/big/' . $film['photo']);
	}


	// удаление фильма из БД
	$result = delete_film($_GET['id']);

	if ($result) {
		header('Location: ' . HOST);
		exit;
	} else {
		$error = "Ошибка при удалении фильма";
	}
}

$film = get_film($_GET['id']);



include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">

		<?php echo isset($error) ? $error : null ?>

		<?php if (isset($error)): ?>
			<div class="alert-wrapper">
				<div class="alert alert--error"><?= $error ?></div>
			</div>
		<?php endif; ?>

		<?php if ($film): ?>

			<h1 class="title-1">Удалить фильм?</h1>
			<?php include(ROOT . 'templates/form-delete.tpl'); ?>

		<?php else: ?>

			<div class="alert-wrapper">
				<div class="alert alert--warning">Такого фильма не существует</div>
			</div>

		<?php endif; ?>


	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

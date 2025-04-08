<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/delete_film.php');


// проверка на админа
if (!isAdmin()) {
	$_SESSION['errors'][] = 'Доступ запрещен';
	header('Location: ./login.php');
	exit;
}

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}
// удаление фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === "POST") {

	// удаление изображения фильма
	$film = get_film($_GET['id']);
	if (is_file(ROOT . 'data/films/' . $film['photo'])) unlink(ROOT . 'data/films/' . $film['photo']);

	if (is_file(ROOT . 'data/films/min/' . $film['photo'])) unlink(ROOT . 'data/films/min/' . $film['photo']);

	if (is_file(ROOT . 'data/films/big/' . $film['photo'])) unlink(ROOT . 'data/films/big/' . $film['photo']);

	// удаление фильма из БД
	$result = delete_film($_GET['id']);

	if ($result) {
		$_SESSION['success'][] = "Фильм успешно удалён";
		header('Location: ' . HOST);
		exit;
	} else {
		$_SESSION['errors'][] = "Ошибка при удалении фильма";
	}
}

$film = get_film($_GET['id']);
if ($film) $page_title = $film['title'];


include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">

		<?php include(ROOT . "templates/errors.tpl"); ?>

		<?php if ($film): ?>
			<h1 class="title-1">Удалить фильм?</h1>
			<?php include(ROOT . 'templates/form-delete.tpl'); ?>
		<?php else: ?>
			<div class="alert-wrapper">
				<?php echo notify("Такого фильма не существует") ?>
			</div>
		<?php endif; ?>


	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

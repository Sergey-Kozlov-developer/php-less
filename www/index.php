<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/films.php');
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

	if (empty($errors)) {
		// добавляем фильм в БД
		$result = create_film($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);

		if (is_array($result)) {
			$errors = $result;
		} else {
			$filmID = $result;
			// очистка POST при успешном добавлении фильма
			unset($_POST);
		}
	}
}

// соединение к БД и получаем данные из БД
$films = get_all_films(@$_GET['genre']);

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
		<?php include(ROOT . 'templates/nav-categories.tpl');  ?>

		<?php if (empty($films)): ?>
			<!-- Фильмов нет -->
			<div class="alert-wrapper">
				<div class="alert alert--warning">Фильмы для отображения отсутствуют!</div>
			</div>
		<?php else: ?>

			<div class="cards-small-wrapper">

				<?php

				foreach ($films as $film) {

					include(ROOT . 'templates/card-small.tpl');
				}


				?>

			</div>
		<?php endif; ?>

		<?php include(ROOT . "templates/form-new.tpl"); ?>
	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

?>
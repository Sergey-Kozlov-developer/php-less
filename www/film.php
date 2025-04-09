<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/get_films_by_ids.php');

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}

$film = get_film($_GET['id']);

if ($film) {
	$page_title = $film['title'];
}

// Получить последние ID просмотренных фильмов
$filmsIds = getRecentFilmsFromCookies();

// Получить данные о фильмах из БД
if (!empty($filmsIds)) {
	$films = get_films_by_ids($filmsIds);
}

// Сохранить фильм в COOKIES
if (isset($film) && isset($film['id'])) {
	saveToRecentFilms($film['id']);
}

include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">
		<?php include(ROOT . 'templates/nav-categories.tpl'); ?>

		<?php include(ROOT . 'templates/errors.tpl'); ?>

		<?php if ($film): ?>
			<?php include(ROOT . 'templates/film.tpl'); ?>

			<?php if (isset($films) && !empty($films)): ?>
				<h2 class="title-1 mb-20">Недавно смотрели</h2>
				<div class="cards-small-wrapper">
					<?php foreach ($films as $film) include(ROOT . 'templates/card-small.tpl'); ?>
				</div>
			<?php endif; ?>

		<?php else: ?>
			<div class="alert-wrapper">
				<div class="alert alert--warning">Такого фильма не существует</div>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

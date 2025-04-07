<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}

$film = get_film($_GET['id']);



include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">
		<?php include(ROOT . 'templates/nav-categories.tpl'); ?>
		<?php include(ROOT . "templates/errors.tpl"); ?>

		<?php if ($film): ?>
			<?php include(ROOT . 'templates/film.tpl'); ?>
		<?php else: ?>
			<div class="alert-wrapper">
				<div class="alert alert--warning">Такого фильма не существует</div>
			</div>
		<?php endif; ?>


	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

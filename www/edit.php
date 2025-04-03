<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');


if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}
// удаление фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === "POST") {
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

		<?php echo isset($error) ? $error : null ?>

		<?php /* if (isset($error)): ?>
			<div class="alert-wrapper">
				<div class="alert alert--error"><?= $error ?></div>
			</div>
		<?php endif; */ ?>

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

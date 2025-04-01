<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/films.php');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	echo "Был POST запрос";
	p($_POST);
}

// соединение к БД и получаем данные из БД
$films = get_all_films(@$_GET['genre']);

include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');

?>



<main class="main">
	<div class="container">

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
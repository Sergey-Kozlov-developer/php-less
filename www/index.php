<?php

require_once('config.php');
require_once('./functions/all.php');
require_once('./models/films/films.php');




// соединение к БД и получаем данные из БД
$films = get_all_films(@$_GET['genre']);

// Переключение темы
if (isset($_GET['theme']) && $_GET['theme'] === 'dark') {
	$_SESSION['theme'] = 'dark';
} else if (isset($_GET['theme']) && $_GET['theme'] === 'light') {
	$_SESSION['theme'] = 'light';
}

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

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

?>
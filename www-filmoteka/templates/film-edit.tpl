<article class="film">

	<?php

	$imgSrc = HOST . "assets/img/no-photo.png";
	if ($film['photo']) {
		$imgSrc = HOST . 'data/films/big/' . $film['photo'];
	}

	?>

	<img src="<?= $imgSrc ?>" alt="<?= $film['title'] ?>" class="film__img" />

	<!-- Desc -->
	<div class="film__desc">

		<h1 class="film__title">
			<?= $film['title'] ?>
		</h1>

		<div class="film__badges">
			<div class="badge"><?= $film['genre'] ?></div>
			<div class="badge"><?= $film['year'] ?></div>
		</div>

		<div class="film__text">
			<p>
				<?= $film['description'] ?>
			</p>
		</div>
	</div>
	<!-- // Desc -->
</article>
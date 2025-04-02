<article class="film">

	<img src="<?= HOST ?>assets/img/no-photo.png" alt="<?= $film['title'] ?>" class="film__img" />

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
		<?php /* 
		<div class="film__footer">
			<a href="edit.html" class="btn btn--edit">Редактировать</a>
			<a href="delete.html" class="btn btn--delete">Удалить</a>
		</div>
			*/ ?>
	</div>
	<!-- // Desc -->
</article>

<div class="back-wrapper">
	<a href="<?= HOST ?>" class="btn btn--secondary">Назад</a>
</div>
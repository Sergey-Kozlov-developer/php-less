<article class="card-small">
	<img src="<?= HOST ?>assets/img/no-photo.png" alt="Film" class="card-small-img" />

	<h2 class="card-small-title">
		<?= $film['title']; ?>
	</h2>

	<div class="card-small-badge">
		<div class="badge"><?= $film['genre']; ?></div>
		<div class="badge"><?= $film['year']; ?></div>
	</div>

	<?php
	/*

	 <div class="card-small-readmore">
		 <a href="film.html" class="btn btn--secondary">Подробнее</a>
	 </div>
 
	 <div class="card-small-admin-btns">
		 <a href="edit.html" class="btn btn--edit">Редактировать</a>
		 <a href="delete.html" class="btn btn--delete">Удалить</a>
	 </div>

	 */

	?>
</article>
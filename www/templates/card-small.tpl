<article class="card-small">
	<img src="<?= HOST ?>assets/img/no-photo.png" alt="Film" class="card-small-img" />

	<h2 class="card-small-title">
		<?= $film['title']; ?>
	</h2>

	<div class="card-small-badge">
		<div class="badge"><?= $film['genre']; ?></div>
		<div class="badge"><?= $film['year']; ?></div>
	</div>

	<div class="card-small-readmore">
		<a href="<?= HOST ?>film.php?id=<?= $film['id'] ?>" class="btn btn--secondary">Подробнее</a>
	</div>

	<div class="card-small-admin-btns">
		<!-- <a href="edit.html" class="btn btn--edit">Редактировать</a> -->
		<a href="<?= HOST ?>delete.php?id=<?= $film['id'] ?>" class="btn btn--delete">Удалить</a>
	</div>


</article>
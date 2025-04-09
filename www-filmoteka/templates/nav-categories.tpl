<div class="categories">
	<a href="<?= HOST ?>">Все фильмы</a>
	<?php foreach ($categories as $cat): ?>
		<a href="<?= HOST ?>index.php?genre=<?= $cat ?>"><?= $cat ?></a>
	<?php endforeach; ?>
</div>
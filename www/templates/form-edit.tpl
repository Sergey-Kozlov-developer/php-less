<?php include(ROOT . 'templates/film-edit.tpl'); ?>

<?php if (isset($errors)): ?>
	<div class="alert-wrapper">
		<?php foreach ($errors as $error): ?>
			<div class="alert alert--error"><?= $error ?></div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>


<form action="" method="POST" class="form" enctype="multipart/form-data">

	<?php
	function selectedOption($cat, $film)
	{
		if (isset($_POST['genre']) && $_POST['genre'] === $cat) {
			return 'selected';
		} else if (!isset($_POST['genre']) && $film['genre'] === $cat) {
			return 'selected';
		} else if (isset($_POST['genre']) && $_POST['genre'] === "" && $film['genre'] === $cat) {
			return 'selected';
		}
	}
	?>

	<label class="form__group">
		<p class="form__label">Название фильма</p>
		<input
			name="title"
			type="text"
			class="form__input"
			placeholder="Введите название фильма"
			value="<? echo (isset($_POST['title']) && $_POST['title'] !== "" ? $_POST['title'] : $film['title']) ?>">
	</label>

	<div class="form__row">

		<label class="form__group">
			<p class="form__label">Жанр</p>
			<select name="genre" id="" class="form__input form__input--select">
				<option value="" disabled <?php echo (isset($film['genre']) && $film['genre'] !== "") ? "" : 'selected' ?>>Выберите жанр</option>
				<?php foreach ($categories as $cat): ?>
					<option value="<?= $cat ?>" <?php selectedOption($cat, $film); ?>><?= $cat ?></option>
				<?php endforeach; ?>
			</select>
		</label>

		<label class="form__group">
			<p class="form__label">Год</p>
			<input
				name="year"
				type="text"
				class="form__input"
				placeholder="Год премьеры"
				value="<? echo (isset($_POST['year']) && $_POST['year'] !== ""  && ctype_digit($_POST['year']) ? $_POST['year'] : $film['year']) ?>">>
		</label>
	</div>

	<label class="form__group">
		<p class="form__label">Описание фильма</p>
		<textarea name="description" id="" class="form__textarea" placeholder="Описание фильма"><? echo (isset($_POST['description']) && $_POST['description'] !== "" ? $_POST['description'] : $film['description']) ?></textarea>
	</label>

	<label class="form__group">
		<input type="file" name="photo">
	</label>

	<div class="flex-btns-row">
		<a href=<?= HOST ?> class="btn btn--secondary">Отмена</a>
		<button class="btn btn--edit">Сохранить</button>
	</div>
</form>
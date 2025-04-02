<h3 class="title-1 mt-20">Новый фильм</h3>

<?php if (isset($errors)): ?>
	<div class="alert-wrapper">
		<?php foreach ($errors as $error): ?>
			<div class="alert alert--error"><?= $error ?></div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>


<form action="" method="POST" class="form" enctype="multipart/form-data">

	<label class="form__group">
		<p class="form__label">Название фильма</p>
		<!-- value in input сохраняет текст в форме -->
		<input
			name="title"
			type="text"
			class="form__input"
			placeholder="Введите название фильма"

			value="<?php echo isset($_POST['title']) && $_POST['title'] !== '' ? $_POST['title'] : ""; ?>">
	</label>

	<div class="form__row">
		<label class="form__group">
			<p class="form__label">Жанр</p>
			<select name="genre" id="" class="form__input form__input--select">
				<option value="" disabled <?php echo (isset($_POST['genre']) && $_POST['genre'] !== "") ?: 'selected' ?>>Выберите жанр</option>
				<?php foreach ($categories as $cat): ?>
					<option value="<?= $cat ?>" <?php echo (isset($_POST['genre']) && $_POST['genre'] === $cat) ? 'selected' : '' ?>><?= $cat ?></option>
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
				value="<?php echo isset($_POST['year']) && $_POST['year'] !== '' && ctype_digit($_POST['year']) ? $_POST['year'] : ""; ?>">
		</label>
	</div>

	<label class="form__group">
		<p class="form__label">Описание фильма</p>
		<!-- php в textarea надо в одну строчку иначе textarea добавляет пробелы -->
		<textarea name="description" id="" class="form__textarea" placeholder="Описание фильма"><?php echo isset($_POST['description']) && $_POST['description'] !== '' ? $_POST['description'] : ""; ?></textarea>
	</label>

	<label class="form__group">
		<input type="file" name="photo">
	</label>

	<button class="btn">Сохранить</button>
</form>
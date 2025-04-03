<?php include(ROOT . 'templates/film-edit.tpl'); ?>

<form action="" method="POST" class="form" enctype="multipart/form-data">

	<label class="form__group">
		<p class="form__label">Название фильма</p>
		<input type="text" class="form__input" placeholder="Введите название фильма">
	</label>

	<div class="form__row">

		<label class="form__group">
			<p class="form__label">Жанр</p>
			<select name="" id="" class="form__input form__input--select">
				<option value="">Выберите жанр</option>
				<option value="Документальный">Документальный</option>
				<option value="Комедия">Комедия</option>
				<option value="Драма">Драма</option>
				<option value="Детектив">Детектив</option>
				<option value="Фэнтези">Фэнтези</option>
			</select>
		</label>

		<label class="form__group">
			<p class="form__label">Год</p>
			<input type="text" class="form__input" placeholder="Год премьеры">
		</label>
	</div>

	<label class="form__group">
		<p class="form__label">Описание фильма</p>
		<textarea name="" id="" class="form__textarea" placeholder="Описание фильма"></textarea>
	</label>

	<label class="form__group">
		<input type="file">
	</label>

	<div class="flex-btns-row">
		<a href=<?= HOST ?> class="btn btn--secondary">Отмена</a>
		<button class="btn btn--edit">Сохранить</button>
	</div>
</form>
<h3 class="title-1 mt-20">Новый фильм</h3>

<form action="" class="form">

	<label class="form__group">
		<p class="form__label">Название фильма</p>
		<input type="text" class="form__input" placeholder="Введите название фильма">
	</label>

	<div class="form__row">
		<label class="form__group">
			<p class="form__label">Жанр</p>
			<select name="" id="" class="form__input form__input--select">
				<option value="" disabled selected>Выберите жанр</option>
				<?php foreach ($categories as $cat): ?>
					<option value="<?= $cat ?>"><?= $cat ?></option>
				<?php endforeach; ?>
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

	<button class="btn">Сохранить</button>
</form>
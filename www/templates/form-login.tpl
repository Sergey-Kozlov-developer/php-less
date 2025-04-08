<h1 class="title-1">Вход для администратора</h1>
<form action="" method="POST" class="form">

	<?php
	$username = '';
	if (isset($_POST['username']) && $_POST['username'] !== '') {
		$username = $_POST['username'];
	}
	?>

	<label class="form__group">
		<p class="form__label">Логин</p>
		<input
			name="username"
			type="text"
			class="form__input"
			placeholder="Логин"
			autocomplete="off"
			value="<?= $username ?>">
	</label>

	<label class="form__group">
		<p class="form__label">Пароль</p>
		<input name="password" type="password" class="form__input" placeholder="Пароль">
	</label>

	<button class="btn">Войти</button>
</form>
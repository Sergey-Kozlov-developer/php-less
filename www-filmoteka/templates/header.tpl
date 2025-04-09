<header class="header">
	<div class="container header__row">
		<a href="<?= HOST ?>" class="logo">Фильмотека</a>
		<nav class="nav">
			<a href="<?= HOST ?>" class="nav-link">Главная</a>
			<?php if (isAdmin()): ?>
				<a href="<?= HOST ?>new.php" class="nav-link">Добавить фильм</a>
				<a href="<?= HOST ?>logout.php" class="nav-link">Выход</a>
			<?php else: ?>

				<a href="<?= HOST ?>login.php" class="nav-link">Вход</a>
			<?php endif; ?>


			<?php if (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark'): ?>
				<a href="index.php?theme=light">☀️ Светлая тема</a>
			<?php else: ?>
				<a href="index.php?theme=dark">🌘 Тёмная тема</a>
			<?php endif; ?>

		</nav>
	</div>
</header>
<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/users/login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	// Валидация формы
	trimPostValues();
	$errors = validate_login_form($_POST);
	if (!empty($errors)) $_SESSION['errors'] = $errors;

	if (empty($errors)) {
		$user = login($_POST['username'], $_POST['password']);

		// Неверные данные
		if (!$user) {
			$_SESSION['errors'][] = "Неверные данные для входа";
			$_POST = [];
		}

		// Верные данные
		if ($user) {
			$_SESSION['user_role'] = $user['role'];
			$_SESSION['success'][] = 'Вы успешно зашли на сайт!';
			header('Location: ./index.php');
			exit;
		}
	}
}

include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');

?>

<main class="main">
	<div class="container">

		<?php include(ROOT . 'templates/errors.tpl'); ?>
		<?php include(ROOT . 'templates/form-login.tpl'); ?>

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

<?php
require_once('./config.php');
require_once('./functions/all.php');
require_once('./models/films/get_film.php');
require_once('./models/films/update_film.php');

if (!isset($_GET['id'])) {
	header("Location: /");
	exit();
}

// Редактирование фильма если была отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	function updateFilm()
	{

		// валидация формы
		trimPostValues();
		// ошибки на незаполненность полей
		$errors = validate_film_form($_POST);
		if (!empty($errors)) return $errors;

		// изображение фильма BD
		$film = get_film($_GET['id']);
		$file_name = $film['photo'];
		// добавление изображения фильма

		if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] !== '') {
			// загрузка фото
			$file_name = upload_photo();
			if (is_array($file_name) && !empty($errors)) return $file_name;

			// создаем preview изображения
			$photo_path = ROOT . 'data/films/' . $file_name;
			$thumb_name = create_thumbs($photo_path);
			if (is_array($thumb_name) && !empty($errors)) return $thumb_name;
			if (!$thumb_name) return ['Ошибка при создании превью'];

			// удаление старой фотографии
			if (is_file(ROOT . 'data/films/' . $film['photo'])) {
				unlink(ROOT . 'data/films/' . $film['photo']);
			}
			if (is_file(ROOT . 'data/films/min/' . $film['photo'])) {
				unlink(ROOT . 'data/films/min/' . $film['photo']);
			}
			if (is_file(ROOT . 'data/films/big/' . $film['photo'])) {
				unlink(ROOT . 'data/films/big/' . $film['photo']);
			}
		}

		// Добавляем фильм в БД
		$result = update_film($_GET['id'], $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description'], $file_name);

		return $result;
	}

	$result = updateFilm();

	if (is_array($result) && !empty($result)) $_SESSION['errors'] = $result;

	if ($result === false) $_SESSION['errors'][] = "Ошибка при редактировании фильма";

	if ($result === true) $_SESSION['success'][] = "Фильм успешно обновлен";
}

$film = get_film($_GET['id']);

if ($film) $page_title = $film['title'];


include(ROOT . 'templates/head.tpl');
include(ROOT . 'templates/header.tpl');
?>

<main class="main">
	<div class="container">

		<?php include(ROOT . "templates/errors.tpl"); ?>

		<?php if ($film): ?>
			<h1 class="title-1 mb-20">Редактировать фильм</h1>
			<?php include(ROOT . 'templates/form-edit.tpl'); ?>
		<?php else: ?>
			<div class="alert-wrapper">
				<?php echo notify('Такого фильма не существует'); ?>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php
include(ROOT . 'templates/footer.tpl');

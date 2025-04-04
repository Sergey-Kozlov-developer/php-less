<?php

function upload_photo()
{

	// Проверка на ошибки при загрузке файла
	if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
		return ['Ошибка при загрузке файла'];
	}

	// Проверка на тип файла
	$file_type = mime_content_type($_FILES['photo']['tmp_name']);
	$allowed_file_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
	if (!in_array($file_type, $allowed_file_types)) {
		return ['Недопустимый тип файла. Загрузите изображение в формате jpg или png'];
	}

	// Проверка на расширение файла
	$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp']; // Разрешенные расширения
	$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
	if (!in_array(strtolower($extension), $allowed_extensions)) {
		return ['Недопустимое расширение файла'];
	}

	// Проверка на размер файла
	if ($_FILES['photo']['size'] > 10 * 1024 * 1024) {
		return ['Файл слишком большой. Максимальный размер файла 10Мб'];
	}

	// Проверка на размер изображения
	if (!getimagesize($_FILES['photo']['tmp_name'])) {
		return ['Ошибка при загрузке файла. Изображение не имеет размеров'];
	}

	// Проверка на существование директории data/films/
	createDirectoryIfNotExists(ROOT . 'data/films/');

	// Перемещение файла в директорию
	if ($extension === 'jpeg') {
		$extension = 'jpg';
	}

	$file_name = uniqid() . '.' . $extension;

	$upload_path = ROOT . 'data/films/' . $file_name;

	if (!move_uploaded_file($_FILES['photo']['tmp_name'], $upload_path)) {
		return ['Ошибка при сохранении файла'];
	}

	return $file_name;
}

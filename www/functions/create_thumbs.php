<?php

function create_thumbs($photo_path)
{
	// проверка на существование директорий data/films/min и data/films/big 
	createDirectoryIfNotExists(ROOT . 'data/films/min');
	createDirectoryIfNotExists(ROOT . 'data/films/big');


	// получить имя файла без расширения

	$filename = pathinfo($photo_path, PATHINFO_FILENAME);


	// создать маленькое превью
	$thumb_path = ROOT . 'data/films/min/' . $filename;
	$thumb_name = resize_and_crop($photo_path, $thumb_path, 300, 500);

	if (!$thumb_name) {
		return ['Ошибка при создании превью'];
	}


	// создать большое превью
	$thumb_path = ROOT . 'data/films/big/' . $filename;
	$thumb_name = resize_and_crop($photo_path, $thumb_path, 600, 1000);
	if (!$thumb_name) {
		return ['Ошибка при создании превью'];
	}

	// вернуть имя превью
	return $thumb_name;
}

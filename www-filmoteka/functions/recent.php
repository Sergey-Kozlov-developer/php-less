<?php

function saveToRecentFilms($id)
{

	// Название cookie для хранения массива фильмов
	$cookie_name = 'film_ids';

	$ids = [];

	// Получаем текущий массив фильмов из cookie (если есть)
	if (isset($_COOKIE[$cookie_name])) {
		// Распаковываем данные из cookie в массив
		$ids = json_decode($_COOKIE[$cookie_name]);
		//Если в cookie "не массив" то оставляем пустой массив
		if (!is_array($ids)) $ids = [];
	}

	// Убираем фильм, если он уже есть в массиве (чтобы избежать дубликатов)
	$key = array_search($id, $ids);
	if ($key !== false) {
		unset($ids[$key]);
	}

	// Добавляем новый ID в начало массива
	array_unshift($ids, $id);

	// Ограничиваем массив до 4 элементов
	if (count($ids) > 4) {
		array_pop($ids); // Удаляем последний элемент массива
	}

	// Сохраняем массив в cookie
	setcookie($cookie_name, json_encode($ids), time() + 3600 * 24 * 30, '/');
}

function getRecentFilmsFromCookies()
{

	// Название cookie для хранения массива фильмов
	$cookie_name = 'film_ids';

	$ids = [];

	// Получаем текущий массив фильмов из cookie (если есть)
	if (isset($_COOKIE[$cookie_name])) {
		// Распаковываем данные из cookie в массив
		$ids = json_decode($_COOKIE[$cookie_name]);
		//Если в cookie "не массив" то оставляем пустой массив
		if (!is_array($ids)) $ids = [];
	}

	$ids = array_map('intval', $ids);

	return $ids;
}

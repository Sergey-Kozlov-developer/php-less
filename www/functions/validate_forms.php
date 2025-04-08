<?php

function validate_film_form($data)
{
	$errors = array();

	if ($data['title'] === '') {
		$errors[] = "Необходимо ввести название фильма";
	}

	if (!isset($data['genre'])) {
		$errors[] = "Необходимо ввести жанр фильма";
	}

	if ($data['year'] === '') {
		$errors[] = "Необходимо ввести год фильма";
	}

	if (!ctype_digit($data['year'])) {
		$errors[] = "Год введен неправильно. Введите число";
	}

	return $errors;
}

function validate_login_form($data)
{
	$errors = array();

	if ($data['username'] === '') {
		$errors[] = "Необходимо ввести логин пользователя";
	}
	if ($data['password'] === '') {
		$errors[] = "Необходимо ввести пароль пользователя";
	}

	return $errors;
}

<?php

function create_film($title, $genre, $year, $description, $photo_name)
{
	global $categories;
	// проверка категории в массиве $categories
	$genre = array_search($genre, $categories);
	$genre = ($genre === false) ? "Без категории" : $categories[$genre];

	$pdo = db_connect();
	try {
		// SQL запрос с параметрами
		$query = "INSERT INTO films (title, genre, year, description, photo) VALUES (:title, :genre, :year, :description, :photo)";

		// подготовка запроса
		$stmt = $pdo->prepare($query);
		// привязываем параметры
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);
		$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
		$stmt->bindValue(':year', $year, PDO::PARAM_INT);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);

		if ($photo_name) {
			$stmt->bindValue(':photo', $photo_name, PDO::PARAM_STR);
		} else if ($photo_name === null) {
			$stmt->bindValue(':photo', $photo_name, PDO::PARAM_NULL);
		}


		// выполняем запрос
		$stmt->execute();

		// получаем id нового фильма
		return $pdo->lastInsertId();


		//code...
	} catch (PDOException $er) {
		// throw new Exception("Ошибка добавления фильма: " . $er->getMessage());
		return ["Ошибка добавления фильма"];
	}
}

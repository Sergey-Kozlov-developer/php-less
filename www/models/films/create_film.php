<?php

function create_film($title, $genre, $year, $description)
{

	$pdo = db_connect();
	try {
		// SQL запрос с параметрами
		$query = "INSERT INTO films (title, genre, year, description) VALUES (:title, :genre, :year, :description)";

		// подготовка запроса
		$stmt = $pdo->prepare($query);
		// привязываем параметры
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);
		$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
		$stmt->bindValue(':year', $year, PDO::PARAM_INT);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);

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

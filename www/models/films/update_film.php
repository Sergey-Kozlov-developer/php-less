<?php

function update_film($id, $title, $genre, $year, $description)
{

	$pdo = db_connect(); // Подключение к БД через PDO

	// Проверяем, является ли $id числом
	if (!is_numeric($id) || $id <= 0) {
		return false;
	}

	try {

		// Получаем текущие данные фильма
		$query = "SELECT title, genre, year, description FROM `films` WHERE id = :id";
		$stmt = $pdo->prepare($query);
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		$currentFilm = $stmt->fetch(PDO::FETCH_ASSOC);

		// Если фильм не найден
		if (!$currentFilm) {
			return "Фильм с таким ID не найден";
		}

		// Проверяем, изменились ли данные
		if (
			$currentFilm['title'] === $title &&
			$currentFilm['genre'] === $genre &&
			$currentFilm['year'] == $year &&
			$currentFilm['description'] === $description
		) {
			return "Данные фильма уже актуальны, обновление не требуется";
		}

		// SQL-запрос с подготовленными параметрами
		$query = "UPDATE `films` SET title = :title, genre = :genre, year = :year, description = :description WHERE id = :id";

		// Подготавливаем запрос
		$stmt = $pdo->prepare($query);

		// Привязываем параметр
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->bindValue(':title', $title, PDO::PARAM_STR);
		$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
		$stmt->bindValue(':year', $year, PDO::PARAM_INT);
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);

		// Выполняем запрос
		$stmt->execute();

		// Получаем количество затронутых строк
		return ($stmt->rowCount() > 0);
	} catch (PDOException $e) {
		error_log("Ошибка обновления фильма: " . $e->getMessage());
		// echo "Ошибка обновления фильма: " . $e->getMessage();
		return false;
	}
}

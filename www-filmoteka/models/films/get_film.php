<?php

function get_film($id)
{

	$pdo = db_connect(); // Подключение к БД через PDO

	// Проверяем, является ли $id числом
	if (!is_numeric($id) || $id <= 0) {
		return null;
	}

	try {

		// SQL-запрос с подготовленными параметрами
		$query = "SELECT * FROM `films` WHERE id = :id LIMIT 1";

		// Подготавливаем запрос
		$stmt = $pdo->prepare($query);

		// Привязываем параметр
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);

		// Выполняем запрос
		$stmt->execute();

		// Получаем одну запись
		$film = $stmt->fetch(PDO::FETCH_ASSOC);

		return $film ?: null; // Возвращаем null, если фильм не найден

	} catch (PDOException $e) {
		error_log("Ошибка в get_film(): " . $e->getMessage());
		return null;
	}
}

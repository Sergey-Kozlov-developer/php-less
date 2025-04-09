<?php

function delete_film($id)
{
	$pdo = db_connect(); // Подключение к БД через PDO

	// Проверяем, является ли $id числом
	if (!is_numeric($id) || $id <= 0) {
		return false;
	}

	// SQL-запрос с подготовленными параметрами
	$query = "DELETE FROM `films` WHERE id = :id";

	try {

		// Подготавливаем запрос
		$stmt = $pdo->prepare($query);

		// Привязываем параметр
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);

		// Выполняем запрос
		$stmt->execute();

		if ($stmt->rowCount() === 0) {
			error_log("Фильм с ID {$id} не найден.");
			return false;
		}

		return true;
	} catch (PDOException $e) {
		error_log("Ошибка при удалении фильма: " . $e->getMessage());
		return false;
	}
}

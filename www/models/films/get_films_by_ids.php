<?php

function get_films_by_ids($ids, $limit = 4)
{

	// Фильтруем массив: оставляем только числовые значения
	$ids = array_filter($ids, 'is_numeric');

	// Проверяем, остались ли валидные ID
	if (empty($ids)) {
		return []; // Если нет ID, возвращаем пустой массив
	}

	$pdo = db_connect(); // Подключение к БД через PDO

	// Создаем строку с плейсхолдерами (?, ?, ?)
	$placeholders = implode(',', array_fill(0, count($ids), '?'));

	$query = "SELECT * FROM `films`
		WHERE id IN ($placeholders)
		ORDER BY FIELD (`id`, $placeholders )
		LIMIT ? ";

	try {

		// Подготавливаем запрос
		$stmt = $pdo->prepare($query);

		$params = array_merge($ids, $ids, [$limit]);

		// Выполняем запрос
		$stmt->execute($params);

		// Получаем результат
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		error_log("Ошибка в get_films_by_ids(): " . $e->getMessage());
		return [];
	}
}

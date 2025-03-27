<?php

function get_all_films($cat = null)
{
	try {
		// подключение к БД
		$pdo = db_connect();
		// SQL запрос
		$query = "SELECT * FROM `films`";
		// sql запрос на основе есть доп условия или нет
		// в данном случаее сортировка по категориям, добавляем условие WHERE
		if (!empty($cat)) {
			$query .= " WHERE genre = :genre"; // :genre сполособ получения из placeholder разметки
		}
		// всегда сортируем по id по убыванию
		$query .= " ORDER BY `id` DESC";

		// подготовка запроса
		$stmt = $pdo->prepare($query);

		// если есть категория, привязываем параметры
		if (!empty($cat)) {
			$stmt->bindValue(":genre", $cat, PDO::PARAM_STR);
		}


		//выполняем запрос
		$stmt->execute();
		// получаем и возвращаем результат в виде ассоциативного массива
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		error_log("ошибка в get_all_films(): " . $e->getMessage());
		return [];
	}
}

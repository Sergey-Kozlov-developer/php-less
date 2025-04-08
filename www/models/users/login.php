<?php

function login($username, $password)
{

	$pdo = db_connect(); // Подключение к БД через PDO

	try {

		// SQL-запрос с подготовленным выражением
		$query = "SELECT * FROM `users` WHERE username = :username LIMIT 1";

		// Подготавливаем запрос
		$stmt = $pdo->prepare($query);

		// Привязываем параметр
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);

		// Выполняем запрос
		$stmt->execute();

		// Получаем пользователя
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		// Если пользователь не найден, возвращаем false
		if (!$user) {
			return false;
		}

		// Проверяем пароль
		if ($password === $user['password']) {
			return $user; // Если пароль верный, возвращаем данные пользователя
		}

		// Если пароль не совпал
		return false;
	} catch (PDOException $e) {
		error_log("Ошибка в login(): " . $e->getMessage());
		return false;
	}
}

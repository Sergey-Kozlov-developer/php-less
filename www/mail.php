<?php

if (
	!empty(trim($_POST['name']))
	&& !empty(trim($_POST['email']))
	&& filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
	&& !empty(trim($_POST['message']))
) {
	$mail_to = "info@mail.com"; // Email куда отправлено письмо
	$email_from = "info@gmail.com"; // указываем от кого отправлено письмо email
	$name_from = "Личный сайт портфолио"; // указываем от кого отправлено письмо, имя
	$subject = "Сообщение с сайта"; // тема письма

	//формируем текст письма
	$message = "Вам пришло новое сообщение с сайта: <br><br>\n" .
		"<strong>Имя отправителя: </strong>" . strip_tags(trim($_POST["name"])) . "<br>\n" .
		"<strong>Email отправителя: </strong>" . strip_tags(trim($_POST["email"])) . "<br>\n" .
		"<strong>Сообщение: </strong>" . strip_tags(trim($_POST["message"]));
	// формируем тему письма
	$subject = "=?utf-8?B?" . base64_encode("Сообщение с сайта!") . "?=";
	// формируем доп заголовки письма
	$headers = "MIME-Version: 1.0" . PHP_EOL .
		"Content-Type: text/html; charset=utf-8" . PHP_EOL .
		"From: " . "=?utf-8?B?" . base64_encode($name_from) . "?=" . "<" . $email_from . ">" . PHP_EOL .
		"Reply-To: " . $email_from . PHP_EOL;

	$mailResult = mail($mail_to, $subject, $message, $headers);

	// сообщаем на frontend об отправке. закодируем в JSON

	if ($mailResult) {
		$response = [
			"status" => true,
			"message" => "Отправлено успешно"
		];
	} else {
		$response = [
			"status" => false,
			"message" => "Произошла ошибка"
		];
	}
	echo json_encode($response);
} else {
	$response = [
		"status" => false,
		"message" => []
	];
	if (empty(trim($_POST["name"]))) {
		$response["message"][] = "Поле 'имя' не может быть пустым";
	}
	if (empty(trim($_POST["email"]))) {
		$response["message"][] = "Поле 'email' не может быть пустым";
	}
	if (!filter_var((trim($_POST["email"], FILTER_VALIDATE_EMAIL)))) {
		$response["message"][] = "Введите верный формат email";
	}
	if (empty(trim($_POST["message"]))) {
		$response["message"][] = "Поле 'сообщение' не может быть пустым";
	}

	echo json_encode($response);
}

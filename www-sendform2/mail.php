<?php


// echo "Hello";
// 2. распечатаем полученные данные из формы
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// 3 распечатаем отдельно элементы из $_POST
// echo $_POST['name'];
// echo "<br>";
// echo $_POST['email'];
// echo "<br>";
// echo $_POST['message'];
// echo "<br>";

/** ===============ВАРИАНТ 1 ================ */
// mail('info@mail.com', "Сообщение с сайта", $_POST["message"]);


/** ===============ВАРИАНТ 2 ================ */

// trim() обрезает лишние пробелы
// формируем текст письма
/*
$message = "Вам пришло новое сообщение с сайта: <br><br>\n" .
	"<strong>Имя отправителя: </strong>" . strip_tags(trim($_POST["name"])) . "<br>\n" .
	"<strong>Email отправителя: </strong>" . strip_tags(trim($_POST["email"])) . "<br>\n" .
	"<strong>Сообщение: </strong>" . strip_tags(trim($_POST["message"]));

//отправляем письмо
mail("info@mail.com", "Сообщение с сайта", $message);
 */
/** ===============ВАРИАНТ 3 ================ */
$mail_to = "info@mail.com";
$email_from = "info@gmail.com";
$name_from = "Личный сайт портфолио";
$subject = "Сообщение с сайта";
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

if ($mailResult) {
	header("Location: thankyou.html");
} else {

	header("Location: error.html");
}

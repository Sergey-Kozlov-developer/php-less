<?php
require_once('./config.php');



?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php if (isset($page_title) && $page_title): ?>
		<title><?= $page_title ?> - Фильмотека</title>
	<?php else: ?>
		<title>Фильмотека</title>
	<?php endif; ?>

	<link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="./assets/img/favicon/site.webmanifest">

	<link rel="stylesheet" href="./assets/css/main.css" />
	<!-- <link rel="stylesheet" href="./css/dark-theme.css" /> -->
</head>

<body>
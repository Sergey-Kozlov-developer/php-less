<!-- Разные миксины по одному, которые понадобятся. Для логотипа, бейджа, и т.д.-->

<?php

// connect bD 
$link = mysqli_connect('database', "root", "tiger", "filmoteka");

// connect BD
if (mysqli_connect_error()) {
	die("Ошибка подключения к базе данных");
}
// добавляем фильм в БД 
if (array_key_exists('newFilm', $_POST)) {
	$query = "INSERT INTO `films` (`title`, `genre`, `year`) VALUES (
		'" . mysqli_real_escape_string($link, $_POST['title']) . "',
		'" . mysqli_real_escape_string($link, $_POST['genre']) . "',
		'" . mysqli_real_escape_string($link, $_POST['year']) . "'
		)";
	// вставляем значения в bD
	$result = mysqli_query($link, $query);
	// if (mysqli_query($link, $query)) {
	// 	echo "Фильм добавлен";
	// } else {
	// 	echo "Произошла ошибка добавления";
	// }
}


$query = "SELECT * FROM `films`";
$films = [];
// сохраняем полученные данные из БД в массив
if ($result = mysqli_query($link, $query)) {
	while ($row = mysqli_fetch_array($result)) {
		$films[] = $row;
	}
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<title>[Имя и фамилия] - Фильмотека</title>
	<!--[if IE
			]><meta http-equiv="X-UA-Compatible" content="IE=edge"
		/><![endif]-->
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<!-- build:cssVendor css/vendor.css -->
	<link rel="stylesheet" href="libs/normalize-css/normalize.css" />
	<link rel="stylesheet" href="libs/bootstrap-4-grid/grid.min.css" />
	<link
		rel="stylesheet"
		href="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.css" />
	<!-- endbuild -->
	<!-- build:cssCustom css/main.css -->
	<link rel="stylesheet" href="./css/main.css" />
	<!-- endbuild -->
	<link
		href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&amp;subset=cyrillic-ext"
		rel="stylesheet" />
	<!--[if lt IE 9
			]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script
		><![endif]-->
</head>

<body class="index-page">
	<div class="container user-content section-page">
		<div class="title-1">Фильмотека</div>

		<?php
		foreach ($films as $key => $value) {
		?>

			<div class="card mb-20">
				<h4 class="title-4"><?php echo $films[$key]['title'] ?></h4>
				<div class="badge"><?php echo $films[$key]['genre'] ?></div>
				<div class="badge"><?php echo $films[$key]['year'] ?></div>
			</div>

		<?php
		}

		?>

		<div class="panel-holder mt-80 mb-40">
			<!-- проверка на добавления фильма в бд -->
			<?php
			if ($result) {
				echo "<p>Фильм успешно добавлен</p>";
			} else {
				echo "<p>Произошла ошибка!</p>";
			}
			?>
			<!--  -->
			<div class="title-3 mt-0">Добавить фильм</div>
			<form action="index.php" method="POST">
				<div class="notify notify--error mb-20">
					Название фильма не может быть пустым.
				</div>
				<div class="form-group">
					<label class="label">Название фильма<input
							class="input"
							name="title"
							type="text"
							placeholder="Такси 2" /></label>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="label">Жанр<input
									class="input"
									name="genre"
									type="text"
									placeholder="комедия" /></label>
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label">Год<input
									class="input"
									name="year"
									type="text"
									placeholder="2000" /></label>
						</div>
					</div>
				</div>
				<input
					class="button"
					type="submit"
					name="newFilm"
					value="Добавить" />
			</form>
		</div>
	</div>
	<!-- build:jsLibs js/libs.js -->
	<script src="libs/jquery/jquery.min.js"></script>
	<!-- endbuild -->
	<!-- build:jsVendor js/vendor.js -->
	<script src="libs/jquery-custom-scrollbar/jquery.custom-scrollbar.js"></script>
	<script
		async
		defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIr67yxxPmnF-xb4JVokCVGgLbPtuqxiA"></script>
	<!-- endbuild -->
	<!-- build:jsMain js/main.js -->
	<script src="js/main.js"></script>
	<!-- endbuild -->
	<script
		defer="defer"
		src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>

</html>
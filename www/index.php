<?php



// запрос в бд для получения инфы
// $query = "SELECT * FROM users";

// if ($result = mysqli_query($link, $query)) {
// // echo "Запрос был успешен!";
// $row = mysqli_fetch_array($result); // обходит всю таблицу и создает массив с полями
// print_r($row);

// echo "Пользователь №" . $row['id'] . ". Email пользователя: " . $row["email"] . ". Пароль: " . $row["password"] . ".";
// }

// добавляем в БД
// $query = "INSERT INTO `users` (`email`, `password`) VALUES ('joker@mail.ru', '777')";

// mysqli_query($link, $query);

// изменяем/обновляем данные в БД. обязательтно указывать WHERE чтобы изменения были только в одном месте
// в случае измения в одном ряду, использовать LIMIT
// $query = "UPDATE `users` SET `email` = 'joker@hotmail.com' WHERE `id` = 2 LIMIT 1";

// mysqli_query($link, $query);


// вывод нескольких записей или всех
// $query = "SELECT * FROM `users`";

// if ($result = mysqli_query($link, $query)) {

// while ($row = mysqli_fetch_array($result)) {

// Примеры запросов для выборки данных из БД
// $query = "SELECT * FROM `users` WHERE `id` = 1";
// $query = "SELECT * FROM `users` WHERE `email` LIKE '%gmail.com'";
// $query = "SELECT * FROM `users` WHERE `email` LIKE '%man%'";
// $query = "SELECT * FROM `users` WHERE `id` > 2";
// $query = "SELECT * FROM `users` WHERE `id` >= 2 AND `email` LIKE '%gmail.com'";

// if ($result = mysqli_query($link, $query)) {

// 	while ($row = mysqli_fetch_array($result)) {
// 		echo "<pre><";
// 		print_r($row);
// 		echo "/pre>";
// 	}
// }


// Обработка нестандартных символов. Защита от взлома
// mysqli_real_escape_string экранирует символ '
// $name = "Brayen O'Konor";
// $query = "SELECT * FROM `users` WHERE `name` = '" . $name . "'";
// $query = "SELECT * FROM `users` WHERE `name` = '" . mysqli_real_escape_string($link, $name) . "'";

// if ($result = mysqli_query($link, $query)) {

// 	while ($row = mysqli_fetch_array($result)) {
// 		echo "<pre><";
// 		print_r($row);
// 		echo "/pre>";
// 	}
// }

// подключаем БД
$link = mysqli_connect('database', "root", "tiger", "mini-site");



if (mysqli_connect_error()) {
	die("Ошибка подключения к базе данных");
}

// мини проект формы для добавления пользователей в бд и будем ее выводить
$query = "SELECT * FROM `users`";
$users = [];

if ($result = mysqli_query($link, $query)) {
	while ($row = mysqli_fetch_array($result)) {
		$users[] = $row;
	}
}
// print_r($users);

// add user to DB from Form

print_r($_POST);

?>
<h1>ТАБЛИЦА С ПОЛЬЗОВАТЕЛЯМИ</h1>
<table border="1">
	<thead>
		<tr>
			<th>ID</th>
			<th>Имя</th>
			<th>Email</th>
			<th>Пароль</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($users as $key => $value) {
		?>
			<tr>

				<td><?php echo $users[$key]['id'] ?></td>
				<td><?php echo $users[$key]['name'] ?></td>
				<td><?php echo $users[$key]['email']; ?></td>
				<td><?php echo $users[$key]['password']; ?></td>
			</tr>
		<?php
		}
		?>

	</tbody>
</table>

<h2>ФОРМА ДОБАВЛЕНИЯ ПОЛЬЗОВАТЕЛЕЙ</h2>
<form action="index.php" method="POST">
	<input type="text" placeholder="Введите имя" name="name">
	<input type="text" placeholder="Введите email" name="name">
	<input type="password" placeholder="Введите пароль" name="name">
	<input type="submit" value="Добавить пользователя" name="add-user">
</form>
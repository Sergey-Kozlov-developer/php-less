<?php



// соединение с базой данных
$db = new PDO('mysql:host=database;dbname=films', 'root', 'tiger');
$sql = "SELECT * FROM films";
$result = $db->query($sql);

$result->bindColumn('id', $id);
$result->bindColumn('title', $title);
$result->bindColumn('genre', $genre);
$result->bindColumn('year', $year);
echo "<h2>Вывод записей из резудьтата по одной: </h2>";

while ($result->fetch(PDO::FETCH_ASSOC)) {
	echo "ID: {$id} <br>";
	echo "Название: {$title} <br>";
	echo "Жанр: {$genre} <br>";
	echo "Год: {$year} <br>";
}


###################################
// варианты sql запрос формируется на основании данных,
// получаемых от пользователя.
#####################################
// Получение данных без защиты от SQL инъекций
// Так не стоит делать, если данные приходят от пользователя 
$db = new PDO('mysql:host=database;dbname=profile', 'root', 'tiger');
$username = 'Yura';
$password = '123456';

$username = htmlentities($username);
$password = htmlentities($password);

$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";

$result = $db->query($sql);

if ($result->rowCount() == 1) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']} <br>";
	echo "Пароль пользователя: {$user['password']}";
}
###############################################
// С защитой от SQL инъекций - (в Ручном режиме)
// Так делать нежелательно, но допустимо

$db = new PDO('mysql:host=database;dbname=profile', 'root', 'tiger');
// Допустим мы получили из массива $POST указанные ниже переменные
$username = 'Yura';
$password = '123456';

$username = htmlentities($username);
$password = htmlentities($password);

// Избавляем от лишних кавычек
// Экранируем все символы
$username = $db->quote($username);
$username = strtr($username, array('_' => '\_', '%' => '\%'));
$password = $db->quote($password);
$password = strtr($password, array('_' => '\_', '%' => '\%'));

$sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";

$result = $db->query($sql);

if ($result->rowCount() == 1) {
	$user = $result->fetch(PDO::FETCH_ASSOC);
	echo "Имя пользователя: {$user['name']} <br>";
	echo "Пароль пользователя: {$user['password']}";
}
#######################

// С защитой от SQL инъекций - (в Автоматическом режиме)

// 1-й вариант

$sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";

$stmt = $db->prepare($sql);

$username = 'Yura';
$password = '123456';

$username = htmlentities($username);
$password = htmlentities($password);

$stmt->bindValue(':username', $username);
$stmt->bindValue(':password', $password);
$stmt->execute();

//Если не хотим для каждого значения вызывать метод bindValue,
// то можно сразу писать в ->execute
// $stmt->execute(array(':username' => $username, ':password' => $password));
$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);

echo "<h2>Выборка записи с автоматической защитой от инъекции</h2>";
$stmt->fetch();
echo "Имя пользователя: {$name} <br>";
echo "Email пользователя: {$email} <br>";

// 2-1 вариант

$sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";

$stmt = $db->prepare($sql);

$username = 'Yura';
$password = '123456';

$username = htmlentities($username);
$password = htmlentities($password);

$stmt->bindValue(1, $username);
$stmt->bindValue(2, $password);
$stmt->execute();
//Или можно короче сделать
// $stmt->execute(array($username, $password));

$stmt->bindColumn('name', $name);
$stmt->bindColumn('email', $email);

echo "<h2>Выборка записи с автоматической защитой от инъекции</h2>";
$stmt->fetch();
echo "Имя пользователя: {$name} <br>";
echo "Email пользователя: {$email} <br>";

########################
// ВСТАВКА ДАННЫХ В БД

$db = new PDO('mysql:host=database;dbname=profile', 'root', 'tiger');

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $db->prepare($sql);

$username = "Yura";
$useremail = "reno@mail.com";

$stmt->bindValue(':name', $username);
$stmt->bindValue(':email', $useremail);
$stmt->execute();


echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";
echo "<p>ID вставленной записи: " . $db->lastInsertId() . "</p>";

######################
// Обновление данных
$db = new PDO('mysql:host=database;dbname=profile', 'root', 'tiger');

$sql = "UPDATE users SET name = :name WHERE id = :id";

$stmt = $db->prepare($sql);

$username = "New Flash";
$id = 2;

$stmt->bindValue(':name', $username);
$stmt->bindValue(':id', $id);
$stmt->execute();

echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";
echo "<p>ID вставленной записи: " . $db->lastInsertId() . "</p>";
//Если надо обновить несколько строк, то делается так:
$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";


####################
// Удаление данных

$db = new PDO('mysql:host=database;dbname=profile', 'root', 'tiger');

$sql = "DELETE FROM users WHERE name = :name";
$stmt = $db->prepare($sql);

$username = "New Flash";

$stmt->bindValue(':name', $username);
$stmt->execute();

echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";

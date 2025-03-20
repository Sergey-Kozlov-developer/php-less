<?php
echo "<strong>_POST array:</strong> <br>";
print_r($_POST);
echo "<br><br><br>";
?>

<form action="index.php" method="post">
    <input type="text" name="userName" placeholder="Ваше имя"><br>
    <input type="text" name="userEmail" placeholder="Ваш Email"><br>
    <textarea name="message" id="" cols="30" rows="10" placeholder="Сообщение"></textarea><br>
    <input type="submit" value="Отправить форму!">
</form>
<?php



if (!empty($_POST['userName']) && !empty($_POST['userEmail']) && !empty($_POST['message']) && !empty($_POST)) {
    $message = "Вам пришло новое сообщение с сайта \n"
        . "От пользователя: " . $_POST['userName'] . "\n"
        . "Email отправителя: " . $_POST['userEmail'] . "\n"
        . "Сообщение: " . $_POST['message'] . "\n";


    $headers = "From: info@webcademy.ru";
    $resultMail = mail("info@rightblog.ru", "Сообщение с сайта", $message, $headers);
    if ($resultMail) {
        echo "Сообщение отправлено успешно!";
    } else {
        echo "Что то пошло не так. Письмо не отправлено.";
        // var_dump($resultMail);
    }
} else {
    echo "Пожалуйста, заполните все поля.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LAMP STACK</title>
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/svg+xml">
    <!-- <link rel="stylesheet" href="/assets/css/bulma.min.css"> -->
</head>

<body>

    <?php

    echo "<strong>_POST array:</strong> <br>";
    print_r($_POST);
    echo "<br><br><br>";

    if (!empty($_POST)) {

        $message = "Вам пришло новое сообщение с сайта: \n "
            . "Имя отправителя: " . $_POST['userName'] . "\n"
            . "Email отправителя: " .  $_POST['userEmail'] . "\n"
            . "Сообщение: \n  " . $_POST['message'];

        $headers = "From: info@webcademy.ru";

        $resultMail = mail("info@rightblog.ru", "Сообщение с сайта", $message, $headers);

        if ($resultMail) {
            echo "Сообщение отправлено успешно!";
        } else {
            echo "Что то пошло не так. Письмо не отправлено.";
        }
    }

    ?>
    <form action="index.php" method="post">
        <input type="text" name="userName" placeholder="Ваше имя"><br>
        <input type="text" name="userEmail" placeholder="Ваш Email"><br>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Сообщение"></textarea><br>
        <input type="submit" value="Отправить форму!">
    </form>



</body>

</html>
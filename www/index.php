<!-- 1 Проверка на отправку формы, заполнены ли все поля формы -->
<!-- 1.2 отправка почты -->

<!-- 2 если форма отправлена и поле пустое -->
<!-- 2.1 показываем сообщение "Заполните имя" и тд -->

<?php
$mail_to = "info@mail.com";
$email_from = "info@gmail.com";
$name_from = "Личный сайт портфолио";
$subject = "Сообщение с сайта";

if (
    isset($_POST['submit'])
    && !empty(trim($_POST['name']))
    && !empty(trim($_POST['email']))
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
    && !empty(trim($_POST['message']))
) {
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
        // показ нотификации успех
        $success = true;
        // сброс POST массива
        foreach ($_POST as $key => $value) {
            unset($_POST[$key]);
        }
    } else {

        // показ нотификации ошибка
        $failure = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous" />

    <title>Форма обратной связи</title>
</head>

<body>
    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <!-- Content -->
                <div class="card p-3">
                    <form method="POST" action="index.php">
                        <div class="badge badge-success">Версия 2</div>
                        <h1 class="mb-4">Форма обратной связи</h1>

                        <pre><?php print_r($_POST) ?></pre>

                        <?php if (isset($success) && $success): ?>
                            <div class="alert alert-success" role="alert">
                                Сообщение отправлено успешно!
                            </div>
                        <?php endif; ?>

                        <?php if (isset($failure) && $failure): ?>
                            <div class="alert alert-danger" role="alert">
                                Что-то пошло не так. Соообщение не было
                                отправлено. Попробуйте еще раз.
                            </div>
                        <?php endif; ?>


                        <div class="form-group">
                            <label for="name">Имя</label>
                            <!--                        проверка на заполненность имени-->
                            <?php if (isset($_POST['submit']) && empty(trim($_POST['name']))): ?>

                                <div class="alert alert-danger" role="alert">Заполните поле "Имя"</div>
                            <?php endif; ?>


                            <input name="name" type="text" class="form-control" id="name"
                                value="<?php echo isset($_POST['submit']) && !empty(trim($_POST['name'])) ? trim($_POST['name']) : "" ?>" />
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <!--                        проверка на заполненность email-->
                            <?php if (isset($_POST['submit']) && empty(trim($_POST['email']))): ?>
                                <div class="alert alert-danger" role="alert">Заполните поле "Email"</div>
                            <?php endif; ?>

                            <?php if (isset($_POST['submit']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)): ?>
                                <div class="alert alert-danger" role="alert">Заполните поле "Email"</div>
                            <?php endif; ?>

                            <div class="alert alert-danger" role="alert">
                                Введен неверный формат "Email"
                            </div>
                            <input name="email" type="text" class="form-control" id="email" value="<?php echo isset($_POST['submit']) && !empty(trim($_POST['email'])) ? trim($_POST['email']) : "" ?>" />
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <!--                        проверка на заполненность message-->
                            <?php if (isset($_POST['submit']) && empty(trim($_POST['message']))): ?>
                                <div class="alert alert-danger" role="alert">Заполните поле "Сообщение"</div>
                            <?php endif; ?>
                            <textarea id="message" name="message" class="form-control" rows="5">
                            <?php echo isset($_POST['submit']) && !empty(trim($_POST['name'])) ? trim($_POST['name']) : "" ?>
                            </textarea>
                        </div>

                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary">
                            Отправить
                        </button>
                        <button type="reset" class="btn btn-light">
                            Сбросить
                        </button>
                    </form>
                </div>
                <!-- // Content -->
            </div>
            <!-- // col-6 -->
        </div>
        <!-- // row -->
    </div>
    <!-- // container -->
</body>

</html>
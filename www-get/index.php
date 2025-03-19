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

    echo "<strong>GET array: </strong> <br>";
    print_r($_GET);
    echo "<br><br><br>";

    ?>
    <form action="index.php" method="get">
        <select name="brand" id="">
            <option value="select">Выберите производителя</option>
            <?php if ($_GET['brand'] == 'samsung'): ?>
                <option value="samsung" selected>Samsung</option>
            <?php else: ?>
                <option value="samsung">Samsung</option>
            <?php endif; ?>
            <?php if ($_GET['brand'] == 'apple'): ?>
                <option value="apple" selected>apple</option>
            <?php else: ?>
                <option value="apple">apple</option>
            <?php endif; ?>
            <?php if ($_GET['brand'] == 'htc'): ?>
                <option value="htc" selected>htc</option>
            <?php else: ?>
                <option value="htc">htc</option>
            <?php endif; ?>
            <?php if ($_GET['brand'] == 'nokia'): ?>
                <option value="nokia" selected>nokia</option>
            <?php else: ?>
                <option value="nokia">nokia</option>
            <?php endif; ?>
        </select>
        <input type="submit" value="Send Form">
    </form>
    <?php
    if (!empty($_GET)) {
        echo "_GET не пустой";
        echo "<h1>Телефоны марки " . $_GET["brand"] . "</h1>";
    }
    ?>


</body>

</html>
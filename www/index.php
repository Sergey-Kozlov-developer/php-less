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
    <!-- <form action="index.php" method="get">
    <input type="text" name="country" placeholder="country"><br>
    <input type="text" name="product" placeholder="product"><br>
    <input type="text" name="brand" placeholder="brand"><br>
    <input type="text" name="model" placeholder="model"><br>
    <input type="text" name="color" placeholder="color"><br>
    <input type="submit" value="Send Form">
</form> -->
    <form action="index.php" method="get">
        <select name="brand" id="">
            <option value="select">Выберите производителя</option>
            <?php if ($_GET['brand'] == 'samsung'): ?>
                <option value="samsung" selected>Samsung</option>
            <?php else: ?>
                <option value="samsung">samsung</option>
            <?php endif; ?>

            <option value="samsung">samsung</option>
            <option value="apple">apple</option>
            <option value="htc">htc</option>
            <option value="nokia">nokia</option>
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
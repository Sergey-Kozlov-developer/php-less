<?php

require ROOT . 'libs/rb-mysql.php';
R::setup('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD); //for both mysql or mariaDB
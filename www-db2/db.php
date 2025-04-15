<?php


require "libs/rb-mysql.php";
R::setup('mysql:host=database;dbname=school', 'root', 'tiger');

// R::freeze(TRUE); // замораживает БД во избежании обновления в продакшене

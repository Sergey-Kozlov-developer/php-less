<?php
require "db.php";

// создаем нове записи bd 
$course = R::dispense('courses');
$course->title = "Курс по верстке";
$course->tuts = 10;
$course->homework = 8;
$course->level = "Для новичков";
$course->title = "Курс по React";
$course->tuts = 101;
$course->homework = 8;
$course->level = "Для новичков";
$course->title = "Курс по Laravel";
$course->tuts = 1034;
$course->homework = 23;
$course->level = "Для midle";
R::store($course);

// получение всех записей
$courses = R::find('courses');

foreach ($courses as $course) {
	echo "ID: " . $course->id . "<br>";
	echo "Название : " . $course->title . "<br>";
	echo "Кол-во уроков : " . $course->tuts . "<br>";
	echo "Уровень: " . $course->level . "<br>";
	echo "<hr>";
}

/// обновление в БД 
$course = R::load('courses', 2);
// print_r($course);
echo "ID: " . $course->id . "<br>";
echo "Название : " . $course->title . "<br>";
echo "Кол-во уроков : " . $course->tuts . "<br>";
echo "Уровень: " . $course->level . "<br>";
echo "<hr>";
$course->title = "Laravel - уровень 3";
R::store($course);

// удаление из БД 
$course = R::load('courses', 2);
R::trash($course);

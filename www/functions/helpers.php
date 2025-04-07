<?php
function p($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}
function pd($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
	die();
}

function trimPostValues()
{
	foreach ($_POST as $key => $value) {
		$_POST[$key] = trim($value);
	}
}

function createDirectoryIfNotExists($path)
{
	if (!is_dir($path)) {
		mkdir($path, 0777, true);
	}
}

function notify($text, $type = 'warning')
{
	switch ($type) {
		case 'success':
			return "<div class='alert alert--success'>{$text}</div>";

		case 'error':
			return "<div class='alert alert--error'>{$text}</div>";

		case 'warning':
		default:
			echo "<div class='alert alert--warning'>{$text}</div>";
	}
}

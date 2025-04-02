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

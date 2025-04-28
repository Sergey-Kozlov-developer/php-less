<?php

// $protocol = $_SERVER['SERVER_PROTOCOL'];

if ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$protocol = 'https://';
} else {
	$protocol = 'http://';
}

echo '$protocol => ' . $protocol;
echo '<br><br><br>';

echo '<pre>';
print_r($_SERVER);
echo '</pre>';

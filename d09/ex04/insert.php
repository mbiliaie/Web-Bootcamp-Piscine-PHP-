<?php
foreach ($_GET as $key => $value)
{
	$file = 'list.csv';
	file_put_contents($file, $_GET[$key] . ';' . $_GET[$key] . PHP_EOL, FILE_APPEND | LOCK_EX);
}
?>
<?php

$nm =  $_GET["name"];
$act = $_GET["action"];
$expTime = 30 * 86400; // expiration time  - thirty days (30 * 86400 seconds)

if ($nm && $act)
{
	switch ($act):
	 	case 'del':
	 		setcookie($nm, NULL, -1);
	 		break;
	 	case 'set':
	 		setcookie($nm, $_GET["value"], time() + $expTime);
	 		break;
	 	case 'get':
	 		if (($nm = $_COOKIE[$nm]))
	 			echo "$nm\n";
	endswitch;
}
?>
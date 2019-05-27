<?php
	$imp = $_GET;
	foreach ($imp as $elem => $equals) {
		echo $elem.': '.$equals;
		echo "\n";
	}
?>
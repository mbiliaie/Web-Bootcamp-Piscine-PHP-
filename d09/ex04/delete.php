<?php
// to delete a task from lis.csv
foreach ($_GET as $key => $value)
{
	$txt = file_get_contents('list.csv');
	$mtx = explode("\n", $txt);
	foreach ($mtx as $v)
	{
		$sv = explode(";", $v);
		if ($sv[1] == $value)
		{
			$line = $sv[1] . ";" . $sv[1] . "\n";
			$file = str_replace($line, '', $file);
			file_put_contents('list.csv', $file);
		}
	}
}
?>
<?php

function ft_is_sort($tab)
{

	$check = $tab;
	$i = -1;
	sort($check);
	$counter = count($check);

	while (++$i < $counter)
	{
		if ($check[$i] != $tab[$i])
			return (0);
	}
	return (1);
}

?>
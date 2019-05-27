<?php

class NightsWatch
{
	static $warriors = array();

	public function recruit($someone)
	{
		if ($someone instanceof IFighter)
		{
			array_push(self::$warriors, $someone);
		}
	}
	public function fight()
	{
		foreach(self::$warriors as $fighter)
		{
			$fighter->fight();
		}
	}
}

?>
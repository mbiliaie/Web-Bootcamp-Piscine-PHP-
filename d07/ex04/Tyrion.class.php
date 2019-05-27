<?php

class Tyrion extends Lannister
{
	public $name;

	public function sleepWith($lover)
	{

		$this->$name = get_class($lover);
		if ($this->$name == "Jaime")
		{
			echo ("Not even if I'm drunk !" . PHP_EOL);
			return;
		}
		elseif ($this->$name == "Sansa")
		{
			echo ("Let's do this." . PHP_EOL);
			return;
		}
		elseif ($this->$name == "Cersei")
		{
			echo ("Not even if I'm drunk !" . PHP_EOL);
			return;
		}
	}	
}

?>
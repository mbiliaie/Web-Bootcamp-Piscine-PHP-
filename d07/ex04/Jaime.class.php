<?php

class Jaime extends Lannister
{
	public $name; 
	
	public function sleepWith($lover)
	{
		$this->$name = get_class($lover);
		if ($this->$name  == "Tyrion")
		{
			echo "Not even if I'm drunk !" . PHP_EOL;
			return;
		}
		elseif ($this->$name  == "Sansa")
		{
			echo "Let's do this." . PHP_EOL;
			return;
		}
		elseif ($this->$name == "Cersei")
		{
			echo "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL;
			return;
		}
	}	
}

?>
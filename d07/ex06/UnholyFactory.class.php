<?php

class Unholyfactory
{

	private $_taken = array();

	public function absorb($victim)
	{
		if (get_parent_class($victim) != 'Fighter')
		{
			echo "(Factory can't absorb this, it's not a fighter)";
			echo PHP_EOL;
			return ;
		}
		if (!in_array( $victim, $this->_taken))
		{
			$this->_taken[$victim->getName()] = $victim;
			echo "(Factory taken a fighter of type " . $victim->getName() . ")";
			echo PHP_EOL;
		}
		else
		{
			echo "(Factory already taken a fighter of type " . $victim->getName() . ")";
			echo PHP_EOL;
		}
	}
	public function fabricate($unit)
	{	
		if(!array_key_exists($unit, $this->_taken))
		{
			echo "(Factory hasn't taken any fighter of type $unit)";
			echo PHP_EOL;
		}
		else
		{
			echo "(Factory fabricates a fighter of type $unit)";
			echo PHP_EOL;
			return (clone $this->_taken[$unit]);
		}
	}
}

?>
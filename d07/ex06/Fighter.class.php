<?php

abstract class Fighter
{
	protected $_unit;
	public function __construct($txt)
	{
		$this->_unit = $txt;
		return;
	}
	public function getName()
	{
		return ($this->_unit);
	}
	abstract public function fight($target);
}

?>
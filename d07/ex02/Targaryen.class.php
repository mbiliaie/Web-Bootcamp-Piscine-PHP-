<?php

class Targaryen
{
	public function resistsFire()
	{
		return False;
	}

	public function getBurned() {
		if ($this->resistsFire() == false)
		{
			return "burns alive";
		}
		else
		{
			return "emerges naked but unharmed";
		}
	}
}

?>
<?php
namespace Hasiera\Component\Utils;

class Bag
{
	private $bag;
	
	public function set($name, $value, $force = false)
	{
		if ($force)
			$this->bag[$name] = $value;
		else if (isset($this->bag[$name]))
			throw new BagException("Name is already used.");
		else
			$this->bag[$name] = $value;
	}
	
	public function get($name)
	{
		if (!isset($this->bag[$name]))
			throw new BagException("Name is unknown.");
			return $this->bag[$name];
	}
}


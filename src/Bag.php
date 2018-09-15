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
	
	public function keys()
	{
		return array_keys($this->bag);
	}
	
	public function toArray()
	{
		return $this->bag;
	}
	
	public function getIterator()
	{
		return new BagIterator($this);
	}
}


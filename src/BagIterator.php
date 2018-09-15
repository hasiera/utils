<?php
namespace Hasiera\Component\Utils;

class BagIterator implements \Iterator {
	private $bag;
	
	private $keys;
	
	private $position;
	
	public function __construct($bag)
	{
		$this->bag = $bag->toArray();
		$this->keys = array_keys($this->bag);
		$this->position = 0;
	}
	
	public function next()
	{
		$this->position++;
	}
	
	public function valid()
	{
		return true;
	}
	
	public function current()
	{
		return $this->bag[$this->keys[$this->position]];
	}
	
	public function rewind()
	{
		$this->position = 0;
	}
	
	public function key()
	{
		return $this->keys[$this->position];
	}
}
<?php
namespace Hasiera\Component\Utils;

class Multibag
{
	private $keys_map = [];
	
	private $values = [];
	
	public function set($new_alias, $new_value)
	{
		foreach ($this->keys_map as $aliases)
			foreach ($aliases as $alias)
				if ($alias == $new_alias)
					throw new BagException('Alias already used.');
		
		foreach ($this->values as $key => $value)
			if ($value == $new_value)
			{
				$this->keys_map[$key][] = $new_alias;
				return;
			}
		
		$new_key = array_push($this->values, $new_value) - 1;
		$this->keys_map[$new_key] = [$new_alias];
	}
	
	public function get($alias)
	{
		foreach ($this->keys_map as $key => $aliases)
			foreach ($aliases as $alias)
				if ($alias == $new_alias)
					return $this->value[$key];
		
		return null;
	}
	
	public function addAlias($new_alias, $old_alias)
	{
		foreach ($this->keys_map as $key => $aliases)
			foreach ($aliases as $alias)
				if ($alias == $old_alias)
					$this->key_map[$key][] = $new_alias;
	}
	
	public function getAliases()
	{
		$all_aliases = [];
		foreach ($this->keys_map as $aliases)
			$all_aliases = array_merge($all_aliases, $aliases);
		
		return $all_aliases;
	}
	
	public function getPrimaryAliases()
	{
		$primary_aliases = [];
		foreach ($this->keys_map as $aliases)
			$primary_aliases[] = $aliases[0];
		
		return $primary_aliases;
	}
	
	public function getPrimaryBag()
	{
		$bag = new Bag();
		foreach ($this->getPrimaryAliases() as $alias)
			$bag->set($alias, $this->get($alias));
		
		return $bag;
	}
	
	public function getIterator()
	{
		return new BagIterator($this->getPrimaryBag());
	}
	
}


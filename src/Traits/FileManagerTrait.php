<?php
namespace Hasiera\Component\Utils\Traits;

trait FileManagerTrait {
	private $files = [];
	
	public function addFile($filename)
	{
		$this->files[] = $filename;
	}
}


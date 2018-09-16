<?php
namespace Hasiera\Component\Utils;

interface ConfigurationInterface
{
	function addFile($filename);
	
	function process();
	
	function get(): Bag;
}


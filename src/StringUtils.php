<?php
namespace Hasiera\Component\Utils;

class StringUtils
{
	public static function startsWith(string $haystack, string $needle)
	{
		$length = strlen($needle);
		return (substr($haystack, 0, $length) === $needle);
	}
	
	public static function endsWith(string $haystack, string $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}
		
		return (substr($haystack, -$length) === $needle);
	}
}


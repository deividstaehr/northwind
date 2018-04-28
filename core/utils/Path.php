<?php

namespace core\utils;

class Path
{
	private static $paths = [];

	private function __construct() { }

	public static function registry($path)
	{
        if (is_array($path)) {
            self::$paths = array_merge(self::$paths, $path);
        }
    }
    
	public static function find($prop = null)
    {
        $prop = strtoupper($prop);
        if ($prop != null) {
            return array_key_exists($prop, self::$paths) ? self::$paths[$prop] : null;
        } 
        return self::$paths;
    }
}
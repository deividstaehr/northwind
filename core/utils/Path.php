<?php

namespace core\utils;

class Path
{
    private static $paths;

    private function __construct() {}

    public static function load($field)
    {
        return (isset(self::$paths[$field])) ? self::$paths[$field] : null;
    }

    public static function registry($arr)
    {
        self::$paths = (is_array($arr)) ? array_merge(self::$paths, $arr) : self::$paths;
    }
}
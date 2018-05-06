<?php

namespace core\utils;

class Get
{
	private function __construct() { }

	public static function all()
	{
        return $_GET;
    }

    public static function return($column)
	{
        return $_GET[$column];
    }

    public static function add($arrayData)
	{
        $_GET[arrayData[0]] = arrayData[1];
    }
}
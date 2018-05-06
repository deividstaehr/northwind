<?php

namespace core\utils;

use core\utils\Path;

class Redirect
{
	private function __construct() { }

	public static function to($url)
	{
        $to = Path::find('root_link').$url;

        header("Location: {$to}");
    }
}
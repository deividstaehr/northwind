<?php

namespace core\utils;

class Post
{
    private function __construct() { }

    public static function all()
    {
        return $_POST;
    }

    public static function get($column)
    {
        return $_POST[$column];
    }

    public static function add($arrayData)
    {
        $_POST[arrayData[0]] = arrayData[1];
    }
}
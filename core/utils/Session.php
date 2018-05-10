<?php

namespace core\utils;

class Session
{
	private function __construct() { }

	public static function all()
	{
        self::start();

        return $_SESSION;
    }

    public static function get($prop)
	{
        self::start();

        return isset($_SESSION[$prop])
            ? $_SESSION[$prop]
            : null;
    }

    public static function start()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function free()
	{
        session_destroy();
        session_regenerate_id();
    }

    public static function remove($prop)
    {
        unset($_SESSION[$prop]);
    }

    public static function add($prop, $value)
	{
        self::start();

        $_SESSION[$prop] = $value;
    }

    public static function newMessage($message)
    {
        self::add('message', $message);
    }
}
<?php

namespace core;

use core\Path;

final class PDOFactory
{
    private static $path_config = null;

    private function __construct() {}

    public static function make($dbinfo)
    {
        $db = self::parseIniFile($dbinfo);
        
        $user = isset($db['user']) ? $db['user'] : null;
        $pass = isset($db['pass']) ? $db['pass'] : null;
        $name = isset($db['name']) ? $db['name'] : null;
        $host = isset($db['host']) ? $db['host'] : null;
        $type = isset($db['type']) ? $db['type'] : null;
        $port = isset($db['port']) ? $db['port'] : null;
        
        switch ($type)
        {
            case 'pgsql':
                $port = $port ? $port : '5432';
                $pdo = new \PDO("pgsql:dbname={$name};user={$user}; password={$pass};host=$host;port={$port}");
                break;
            case 'mysql':
                $port = $port ? $port : '3306';
                $pdo = new \PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
                break;
            default:
                throw new \Exception("Driver not found ('$type')");
                break;
        }
        
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        
        return $pdo;
    }

    public static function parseIniFile($database)
    {
        self::$path_config = Path::find('base');

        $iniFile = self::$path_config."config/{$database}.ini";
        if (file_exists($iniFile)) return parse_ini_file($iniFile);
        
        throw new \Exception("File not found ('{$database}.ini')");
    }
}
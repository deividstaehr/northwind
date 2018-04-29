<?php

namespace core\database;

use core\utils\Path;

class PDOFactory
{
    private function __construct() {}

    public static function make()
    {
        $db = self::parseDatabaseIniFile($dbinfo = 'database');
   
        $user  = isset($db['user']) ? $db['user'] : NULL;
        $pass  = isset($db['pass']) ? $db['pass'] : NULL;
        $name  = isset($db['name']) ? $db['name'] : NULL;
        $host  = isset($db['host']) ? $db['host'] : NULL;
        $type  = isset($db['type']) ? $db['type'] : NULL;
        $port  = isset($db['port']) ? $db['port'] : NULL;
        
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
                throw new \Exception("Driver não encrontrado ('{$type}')");
                break;
        }
        
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        
        return $pdo;
    }

    private function parseDatabaseIniFile()
    {
        $iniFile = Path::find('root')."core/config/{$database}.ini";
        
        if (file_exists($iniFile)) {
            return parse_ini_file($iniFile);
        } else {
            throw new \Exception("Arquivo não encrontrado ('{$database}.ini')");
        }
    }
}
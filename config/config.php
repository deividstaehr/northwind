<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Content-type: text/html; charset=UTF-8');

$basePath   = dirname(__DIR__) . '/';
$publicPath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)).'/';

require_once $basePath . 'vendor/autoload.php';

core\Path::register([ 
    'BASE'       => $basePath,
    'PAGES_PATH' => $publicPath
]);

$app = new core\Router;
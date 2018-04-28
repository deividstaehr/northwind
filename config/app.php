<?php

ini_set( 'display_errors', '1' );

$root = dirname(__DIR__).'/';
$project = 'northwind';

// autoload
require_once $root.'vendor/autoload.php';

core\utils\Path::registry([
    'PROJECT_NAME' => 'northwind',
    'ROOT' => $root,
    'STYLE_DIR' => '/'.$project.'/public/assets/css/',
    'SCRIPT_DIR' => '/'.$project.'/public/assets/js/',
    'PAGES' => $root.'public/pages/'
]);

$loader = new Twig_Loader_Filesystem($root.'public/pages');
$twig = new Twig_Environment($loader, []);

// slim: https://www.slimframework.com
$slim = new \Slim\Slim();

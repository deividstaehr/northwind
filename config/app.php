<?php

$root = dirname(__DIR__).'/';

// autoload
require_once $root.'vendor/autoload.php';

// twig: https://twig.symfony.com
$loader = new Twig_Loader_Filesystem($root.'public/pages');
$twig = new Twig_Environment($loader, ['cache' => $root.'cache']);

// slim: https://www.slimframework.com
$slim = new \Slim\Slim();

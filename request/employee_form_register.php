<?php

require_once dirname(__DIR__).'/vendor/autoload.php';

ini_set( 'display_errors', '1' );

$app = new \Slim\Slim();


$res = new \Slim\Http\Response();
$res->setStatus(400);
$res->write('You made a bad request');
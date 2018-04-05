<?php

require_once '../config/config.php';

$page = new core\Page;
$page->render();


var_dump($page);

/*
$app->get('/', function(){
    
});


$app->dispatch();
*/
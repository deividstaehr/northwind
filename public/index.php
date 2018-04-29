<?php

require_once __DIR__.'/../config/app.php';

$slim->get('/', function() {
    $home = new app\controllers\HomeController;
    $home->index();
});


$slim->run();
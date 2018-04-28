<?php

require_once __DIR__.'/../config/app.php';

$slim->get('/', function () use ($twig) {
    dump($twig->render('home.html', ['message' => 'teste']));
});

$slim->run();
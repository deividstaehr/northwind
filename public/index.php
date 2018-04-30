<?php

require_once __DIR__.'/../config/app.php';

$slim->get('/', function() {
    $homeTpl = new app\controllers\HomeController;
    $homeTpl->index();
});

// Grupo para rotas relativas a funcionario
$slim->group('/employee', function() use ($slim) {
    
    // Listagem
    $slim->get('/', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->list();
        // $class = new app\models\Employee;
        // dump($class);
        // dump($class->all());
    });

    // Cadastro
    $slim->get('/register', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->makeFormRegister();
    });
});

$slim->run();
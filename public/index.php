<?php

require_once __DIR__.'/../config/app.php';

$slim->get('/', function() {
    $controller = new app\controllers\HomeController;
    $controller->index();
});

// Grupo para rotas relativas a funcionario
$slim->group('/employee', function() use ($slim) {
    
    // Listagem
    $slim->get('/', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->employeeList();
    });

    // Cadastro
    $slim->get('/register', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->makeFormRegister();
    });
    
    // Alterar
    $slim->get('/update/:id', function($id) {
        $controller = new app\controllers\EmployeeController($id);
        //$controller->makeFormUpdate();
        dump($controller);
    });
});

// Rotas para POST
$slim->group('/employee', function() use ($slim) {
    // Cadastro
    $slim->post('/register', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->register();

        exit();
    });
    
    // Delete
    $slim->post('/delete', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->delete();

        exit();
    });
});

$slim->get('/territory_all', function(){
    $controller = new app\controllers\TerritoryController;
    
    echo $controller->getAllFromArray(core\utils\Get::return('codigo'));
});

$slim->run();
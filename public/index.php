<?php

require_once __DIR__.'/../config/app.php';

$slim->get('/', function() {
    $controller = new app\controllers\HomeController;
    $controller->index();
});

/**
 * 
 * F U N C I O N A R I O
 * 
 */
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
        $controller->makeFormUpdate();
    });
});

// Rotas para POST
$slim->group('/employee', function() use ($slim) {
    // Cadastro
    $slim->post('/register', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->create();

        exit();
    });
    
    // Delete
    $slim->post('/delete', function() {
        $controller = new app\controllers\EmployeeController;
        $controller->delete();

        exit();
    });
    
    // Update
    $slim->post('/update/:id', function($id) {
        $controller = new app\controllers\EmployeeController($id);
        $controller->update();
    
        exit();
    });
});



/**
 * 
 * R E G I A O
 * 
 */


// Grupo para rotas relativas a regioes
$slim->group('/region', function() use ($slim) {
    // Listagem
    $slim->get('/', function() {
        $controller = new app\controllers\RegionController;
        $controller->regionList();
    });

    // Cadastro
    $slim->get('/register', function() {
        $controller = new app\controllers\RegionController;
        $controller->makeFormRegister();
    });
    
    // Alterar
    $slim->get('/update/:id', function($id) {
        $controller = new app\controllers\RegionController($id);
        $controller->makeFormUpdate();
    });
});

// Rotas para POST
$slim->group('/region', function() use ($slim) {
    // Cadastro
    $slim->post('/register', function() {
        $controller = new app\controllers\RegionController;
        $controller->create();

        exit();
    });
    
    // Delete
    $slim->post('/delete', function() {
        $controller = new app\controllers\RegionController;
        $controller->delete();

        exit();
    });
    
    // Update
    $slim->post('/update/:id', function($id) {
        $controller = new app\controllers\RegionController($id);
        $controller->update();
    
        exit();
    });
});

/**
 * 
 * T E R R I T O R I O
 * 
 */


// Grupo para rotas relativas a territorio
$slim->group('/territory', function() use ($slim) {
    // Listagem
    $slim->get('/', function() {
        $controller = new app\controllers\TerritoryController;
        $controller->territoryList();
    });

    // Cadastro
    $slim->get('/register', function() {
        $controller = new app\controllers\TerritoryController;
        $controller->makeFormRegister();
    });
    
    // Alterar
    $slim->get('/update/:id', function($id) {
        $controller = new app\controllers\TerritoryController($id);
        $controller->makeFormUpdate();
    });
});

// Rotas para POST
$slim->group('/territory', function() use ($slim) {
    // Cadastro
    $slim->post('/register', function() {
        $controller = new app\controllers\TerritoryController;
        $controller->create();

        exit();
    });
    
    // Delete
    $slim->post('/delete', function() {
        $controller = new app\controllers\TerritoryController;
        $controller->delete();

        exit();
    });
    
    // Update
    $slim->post('/update/:id', function($id) {
        $controller = new app\controllers\TerritoryController($id);
        $controller->update();
    
        exit();
    });
});

$slim->run();
<?php

namespace app\controllers;

use core\application\Controller;
use app\views\EmployeeDataGridView;
use app\models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        parent::__construct(new EmployeeDataGridView);
        $this->setModel(new Employee);
    }

    public function list()
    {
        $employees = $this->model->all('obj', [
            'IDFuncionario',
            'Nome',
            'Sobrenome',
            'Titulo',
            'DataNac',
            'DataAdmissao',
            'Pais',
            'Cidade',
            'TelefoneResidencial'
        ]);
        $this->view->makeGrid($employees);
        $this->view->render();
    }
}
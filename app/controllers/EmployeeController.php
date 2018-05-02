<?php

namespace app\controllers;

use core\application\Controller;
use app\views\EmployeeDataGridView;
use app\views\EmployeeRegisterView;
use app\models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->setModel(new Employee);
    }
    
    public function index()
    {
        $this->view->render();
    }

    public function employeeList()
    {
        $this->setView(new EmployeeDataGridView);
        
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
        
        // formata a data para: dia-mes-ano
        foreach ($employees as $employee) {
            $employee->DataNac      = (new \DateTime($employee->DataNac))->format("d/m/Y");
            $employee->DataAdmissao = (new \DateTime($employee->DataAdmissao))->format("d/m/Y");
        }
        
        $this->view->makeGrid($employees);
        $this->view->render();
    }
    
    public function makeFormRegister()
    {
        $this->setView(new EmployeeRegisterView);
        
        $this->view->makeForm($this->model->max() + 1);
  
        $this->view->render();
    }
    
    public function register()
    {
        dump($_POST);
    }
}
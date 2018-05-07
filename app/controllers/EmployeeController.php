<?php

namespace app\controllers;

use core\application\Controller;
use core\utils\Post;
use core\utils\Get;
use core\utils\Redirect;
use core\utils\Session;

use app\views\EmployeeDataGridView;
use app\views\EmployeeRegisterView;
use app\models\Employee;
use app\controllers\RegionController;

class EmployeeController extends Controller
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setModel(new Employee($id));
    }
    
    public function index()
    {
        $this->view->render();
    }

    public function employeeList()
    {
        $this->setView(new EmployeeDataGridView);
        
        $employees = $this->model->all([
            'codigo',
            'nome',
            'sobrenome',
            'titulo',
            'dt_nascimento',
            'dt_admissao',
            'pais',
            'cidade',
            'fone'
        ]);
        
        // formata a data para: dia-mes-ano
        foreach ($employees as $employee) {
            $employee->dt_nascimento = (new \DateTime($employee->dt_nascimento))->format("d/m/Y");
            $employee->dt_admissao = (new \DateTime($employee->dt_admissao))->format("d/m/Y");
        }
        
        $this->view->makeGrid($employees);
        $this->view->render();
    }
    
    public function makeFormRegister()
    {
        $this->setView(new EmployeeRegisterView);

        $id = $this->model->max() + 1;

        $regionController = new RegionController;
        $regionAll = $regionController->getAll();
                
        $this->view->makeForm($id, $regionAll);
  
        $this->view->render();
    }

    public function makeFormUpdate()
    {
        $this->setView(new EmployeeUpdateView);
        
        $this->view->makeForm();
  
        $this->view->render();
    }
    
    public function register()
    {
        $post = Post::all();
        $data = array();
        
        foreach($post as $key => $value) {
            if ($key != 'codigo_regiao') {
                $data[$key] = $value;
            }
        }
        
        $this->model->fromArray($data);
        $this->model->store();

        Session::newMessage('Funcionário cadastrado com sucesso!');
        Redirect::to('employee/register');
    }
    
    public function delete()
    {
        $post = Post::all();
        
        $this->model->fromArray([
            $this->model->getPkeyColumn() => $post['id']
        ]);
        
        $this->model->delete();
        
        Session::newMessage('Funcionário deletado');
        Redirect::to('employee');
    }
}
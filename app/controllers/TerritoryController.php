<?php

namespace app\controllers;

use core\application\Controller;
use core\utils\Post;
use core\utils\Session;
use core\utils\Redirect;

use app\models\Territory;
use app\views\TerritoryDataGridView;
use app\views\TerritoryRegisterView;
use app\views\TerritoryUpdateView;

class TerritoryController extends Controller
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setModel(new Territory($id));
    }
    
    public function territoryList()
    {
        $this->setView(new TerritoryDataGridView);
        
        $territories = $this->model->rawQuery("
            SELECT ter.codigo AS codigo,
                   ter.descricao AS descricao,
                   reg.descricao AS regiao
              FROM tb_territorios as ter
              JOIN tb_regioes as reg
                   ON ter.codigo_regiao = reg.codigo
        ");
        
        $this->view->makeGrid($territories);
        $this->view->render();
    }
    
    public function makeFormRegister()
    {
        $this->setView(new TerritoryRegisterView);

        $id = $this->model->max() + 1;
                
        $this->view->makeForm($id);
  
        $this->view->render();
    }
    
    public function makeFormUpdate()
    {
        $this->setView(new RegionUpdateView);
        
        $this->view->makeForm($this->model->getData());
  
        $this->view->render();
    }
    
    public function create()
    {
        $post = Post::all();
        
        $this->model->fromArray($post);
        $this->model->store();

        Session::newMessage('Território cadastrado com sucesso!');
        Redirect::to('region/register');
    }
    
    public function delete()
    {
        $post = Post::all();
        
        $this->model->fromArray([
            $this->model->getPkeyColumn() => $post['id']
        ]);
        
        $this->model->delete();
        
        Session::newMessage('Território deletado');
        Redirect::to('territory');
    }
    
    public function update()
    {
        $post = Post::all();
        $id = [$this->model->getPkeyColumn() => $this->model->getData()->codigo];
       
        $this->model->fromArray(array_merge($post, $id));
        $this->model->update();

        Session::newMessage('Território alterado com sucesso!');
        Redirect::to('region');
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
}
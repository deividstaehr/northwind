<?php

namespace app\controllers;

use core\application\Controller;
use core\utils\Post;
use core\utils\Session;
use core\utils\Redirect;

use app\models\Region;
use app\views\RegionDataGridView;
use app\views\RegionRegisterView;
use app\views\RegionUpdateView;

class RegionController extends Controller
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setModel(new Region($id));
    }
    
    public function regionList()
    {
        $this->setView(new RegionDataGridView);
        
        $regions = $this->model->all();
        
        $this->view->makeGrid($regions);
        $this->view->render();
    }
    
    public function makeFormRegister()
    {
        $this->setView(new RegionRegisterView);

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

        Session::newMessage('Região cadastrada com sucesso!');
        Redirect::to('region/register');
    }
    
    public function delete()
    {
        $post = Post::all();
        
        $this->model->fromArray([
            $this->model->getPkeyColumn() => $post['id']
        ]);
        
        $this->model->delete();
        
        Session::newMessage('Região deletada');
        Redirect::to('region');
    }
    
    public function update()
    {
        $post = Post::all();
        $id = [$this->model->getPkeyColumn() => $this->model->getData()->codigo];
       
        $this->model->fromArray(array_merge($post, $id));
        $this->model->update();

        Session::newMessage('Região alterada com sucesso!');
        Redirect::to('region');
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
}
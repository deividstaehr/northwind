<?php

namespace app\controllers;

use core\application\Controller;

use app\models\Region;

class RegionController extends Controller
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setModel(new Region($id));
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
}
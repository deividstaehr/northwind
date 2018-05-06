<?php

namespace app\controllers;

use core\application\Controller;

use app\models\Territory;

class TerritoryController extends Controller
{
    public function __construct($id = null)
    {
        parent::__construct();
        $this->setModel(new Territory($id));
    }
    
    public function getAllFromArray($where)
    {
        $all = $this->model->all();

        $str = '';

        foreach ($all as $data) {
            if ($data->codigo_regiao == $where) {
                $str .= '<option value="'.$data->codigo.'">'.$data->descricao.'</option>';
            }
        }

        return $str;
    }
}
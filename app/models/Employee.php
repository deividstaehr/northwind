<?php

namespace app\models;

use core\application\Model;

class Employee extends Model
{
    protected $table_name = 'tb_funcionarios';
    protected $pkey = 'codigo';

    public function __construct($id = null)
    {
        parent::__construct($id);
    }


}
<?php

namespace app\models;

use core\application\Model;

class Employee extends Model
{
    protected $table_name = 'funcionarios';
    protected $pkey = 'IDFuncionario';

    public function __construct($id = null)
    {
        parent::__construct($id);
    }


}
<?php

namespace app\models;

use core\application\Model;

class Territory extends Model
{
    protected $table_name = 'tb_territorios';
    protected $pkey = 'codigo';

    public function __construct($id = null)
    {
        parent::__construct($id);
    }


}
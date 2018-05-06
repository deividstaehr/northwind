<?php

namespace app\models;

use core\application\Model;

class Region extends Model
{
    protected $table_name = 'tb_regioes';
    protected $pkey = 'codigo';

    public function __construct($id = null)
    {
        parent::__construct($id);
    }


}
<?php

namespace app;

use core\Model;

class Employee extends Model
{
    protected $table_name = 'funcionario';
    protected $pkey = 'id';

    public function __construct()
    {
        parent::__construct();
    }
}
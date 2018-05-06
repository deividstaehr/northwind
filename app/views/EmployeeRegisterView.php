<?php

namespace app\views;

use core\application\View;
use core\utils\Path;

class EmployeeRegisterView extends View
{
    protected $template_name = 'employee_form_register';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeForm($nextId, $data)
    {
        $this->add([
            'max' => $nextId, 
            'regioes' => $data
        ]);
    }
}
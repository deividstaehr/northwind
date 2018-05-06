<?php

namespace app\views;

use core\application\View;
use core\utils\Path;

class EmployeeUpdateView extends View
{
    protected $template_name = 'employee_form_update';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeForm($nextId)
    {
        $this->add(['max' => $nextId]);
    }
}
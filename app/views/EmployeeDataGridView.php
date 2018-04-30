<?php

namespace app\views;

use core\application\View;

use core\utils\Path;

class EmployeeDataGridView extends View
{
    protected $template_name = 'employee_list';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeGrid($arr)
    {
        $this->add(['employees' => $arr]);
    }
}
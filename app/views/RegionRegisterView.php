<?php

namespace app\views;

use core\application\View;
use core\utils\Path;

class RegionRegisterView extends View
{
    protected $template_name = 'region_form_register';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeForm($nextId)
    {
        $this->add([
            'max' => $nextId
        ]);
    }
}
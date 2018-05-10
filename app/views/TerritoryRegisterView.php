<?php

namespace app\views;

use core\application\View;

class TerritoryRegisterView extends View
{
    protected $template_name = 'territory_form_register';

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
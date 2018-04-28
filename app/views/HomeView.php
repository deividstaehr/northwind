<?php

namespace app\views;

use core\application\View;

class HomeView extends View
{
    protected $template_name = 'home';

    public function __construct()
    {
        parent::__construct();
    }
}
<?php

namespace app\views;

use core\application\View;

use core\utils\Path;

class HomeView extends View
{
    protected $template_name = 'home';

    public function __construct()
    {
        parent::__construct();
    }
}
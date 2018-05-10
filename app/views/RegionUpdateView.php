<?php

namespace app\views;

use core\application\View;
use core\utils\Path;

class RegionUpdateView extends View
{
    protected $template_name = 'region_form_update';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeForm($data)
    {
        $this->add(['regions' => $data]);
    }
}
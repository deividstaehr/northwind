<?php

namespace app\views;

use core\application\View;

use core\utils\Path;

class RegionDataGridView extends View
{
    protected $template_name = 'region_list';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeGrid($arr)
    {
        $this->add(['regions' => $arr]);
    }
}
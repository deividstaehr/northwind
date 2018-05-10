<?php

namespace app\views;

use core\application\View;

use core\utils\Path;

class TerritoryDataGridView extends View
{
    protected $template_name = 'territory_list';

    public function __construct()
    {
        parent::__construct();
    }

    public function makeGrid($arr)
    {
        $this->add(['territories' => $arr]);
    }
}
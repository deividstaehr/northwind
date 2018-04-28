<?php

namespace app\controllers;

use core\application\Controller;
use app\views\HomeView;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct(new HomeView);
    }
}
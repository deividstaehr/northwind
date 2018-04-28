<?php

namespace core\application;

class Controller
{
    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render();
    }
}
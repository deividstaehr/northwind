<?php

namespace core\application;

class Controller
{
    protected $model;
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function index()
    {
        $this->view->render();
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }
}
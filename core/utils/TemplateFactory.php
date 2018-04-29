<?php

namespace core\utils;

use core\utils\Path;

class TemplateFactory
{
    private function __construct() {}

    public static function make($tpl)
    {
        $loader = new \Twig_Loader_Filesystem(Path::find('root').'public/pages');
        //$twig = new \Twig_Environment($loader, ['cache' => Path::find('root').'cache']);
        $twig = new \Twig_Environment($loader, array()); // sem cache

        return $twig->load($tpl);
    }
}
<?php

namespace core\application;

use core\utils\Path;
use core\utils\TemplateFactory;

class View
{
    private $template;
    private $dataReplace;

    public function __construct($assets = null)
    {
        $this->template = TemplateFactory::make($this->getTemplateFileName());
        $this->html = '';
        $this->dataReplace = array();

        if (is_null($assets)) {
            $this->add([
                'csspath' => Path::find('style_dir'),
                'jspath'=> Path::find('script_dir')
            ]);
        }
    }

    public function render()
    {
        echo $this->template->render($this->dataReplace);
    }

    private function add($arr)
    {
        if (is_array($arr)) {
            $data = array_merge($this->dataReplace, $arr);

            $this->dataReplace = $data;
        }
    }

    public function getTemplateFileName()
    {
        return $this->template_name.'.html';
    }
}
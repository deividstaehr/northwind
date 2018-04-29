<?php

namespace core\application;

use core\utils\Path;
use core\utils\TemplateFactory;

class View
{
    private $template;
    private $dataReplace;

    public function __construct($config = null)
    {
        $this->template = TemplateFactory::make($this->getTemplateFileName());
        $this->html = '';
        $this->dataReplace = array();

        if (is_null($config)) {
            $this->add([
                'cssPath' => Path::find('style_dir'),
                'jsPath'  => Path::find('script_dir'),
                'rootLink'    => Path::find('root_link')
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
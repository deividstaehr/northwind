<?php

namespace core;

use core\Path;

final class Page
{
    /**
     * Extensao padrao
     */
    const _EXT = '.html';

    /**
     * Diretorio base
     */
    const _BASE = 'pages/';

    /**
     * String para css
     */
    private $strCss = "<link rel='stylesheet' href='{{ base }}";

    /**
     * String para javascript
     */
    private $strJs = "<script src='{{ base }}";

    /**
     * Paginas que serao carregadas
     */
    private $pages = [
        'head' => [
            'file_name' => null,
            'file_content' => null
        ],
        'body' => [],
        'footer' => [
            'file_name' => null,
            'file_content' => null
        ]
    ];

    /**
     * Parametros que serao substituidos
     */
    private $params = [];

    /**
     * Configuracao de css e javascript
     */
    private $config = [
        'styles' => '',
        'scripts' => ''
    ];

    public function __construct()
    {
        $this->styles(['main']);
        $this->scripts(['bootstrap.min']);

        $this->configure([
            'head' => 'head',
            'footer' => 'footer'
        ]);
    }

    /**
     * Gera o conteudo e mostra em tela
     */
    public function render()
    {
        echo $this->getHeadContent();

        //echo $this->getFooterContent();
    }

    /**
     * Seta o arquivo de body
     */
    public function setBody($page)
    {

    }

    /**
     * Configura o head e o footer
     */
    public function configure($arr)
    {
        if (is_array($arr) && (isset($arr['head']) && isset($arr['footer']))) {
            $head = self::_BASE.$arr['head'].self::_EXT;
            $footer = self::_BASE.$arr['footer'].self::_EXT;

            if (file_exists($head) && file_exists($footer)) {
                // file_name
                $this->pages['head']['file_name'] = $head;
                $this->pages['footer']['file_name'] = $footer;

                // file_content
                $headContent = file_get_contents($this->pages['head']['file_name']);
                $footerContent = file_get_contents($this->pages['footer']['file_name']);
                
                $this->pages['head']['file_content'] = $this->simpleReplace([
                    'param' => 'styles',
                    'value' => $this->config['styles']
                ], $headContent);

                $this->pages['footer']['file_content'] = $this->simpleReplace([
                    'param' => 'scripts',
                    'value' => $this->config['scripts']
                ], $footerContent);
            }
        }
    }

    public function styles($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $style) {
                $css = $this->simpleReplace([
                    'param' => 'base',
                    'value' => self::_BASE
                ],$this->strCss.$style.".css'>");

                $this->config['styles'] .= $css;
            }
        }
    }

    public function scripts($arr)
    {
        if (is_array($arr)) {
            foreach ($arr as $script) {
                $js = $this->simpleReplace([
                    'param' => 'base',
                    'value' => self::_BASE
                ],$this->strJs.$script.".js'>");

                $this->config['scripts'] .= $js;
            }
        }
    }

    /**
     * Serve apenas para substituicoes simples
     * 
     * @param 
     *      $arr['param'] -> nome da variavel
     *      $arr['value'] -> valor da variavel
     */
    public function simpleReplace($arr, $content)
    {
        if (is_array($arr)) {
            $regex = "/{{ {$arr['param']} }}/i";
            $result = preg_replace($regex, $arr['value'], $content); 
            
            return $result;
        }
    }

    public function getHeadContent()
    {
        return $this->pages['head']['file_content'];
    }

    public function getFooterContent()
    {
        return $this->pages['footer']['file_content'];
    }
}
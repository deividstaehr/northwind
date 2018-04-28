<?php

/* base.html */
class __TwigTemplate_64889aab2e0efd9bb6916a23e3e6d5da735f115ed787dcb3a6f7228342491970 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
            'style' => array($this, 'block_style'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"pt-br\">
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 5
        $this->displayBlock('styles', $context, $blocks);
        // line 9
        echo "    </head>
    <body>
        <!-- HEADER -->
        <header id=\"header\">
            ";
        // line 13
        $this->displayBlock('header', $context, $blocks);
        // line 16
        echo "        </header>
        <!-- /HEADER -->

        <!-- CONTENT -->
        <section id=\"content\">
            ";
        // line 21
        $this->displayBlock('content', $context, $blocks);
        // line 24
        echo "        </section>
        <!-- /CONTENT -->

        <!-- FOOTER -->
        <footer id=\"footer\">
            ";
        // line 29
        $this->displayBlock('footer', $context, $blocks);
        // line 32
        echo "        </footer>
        <!-- /FOOTER -->

        ";
        // line 35
        $this->displayBlock('style', $context, $blocks);
        // line 40
        echo "    </body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 5
    public function block_styles($context, array $blocks = array())
    {
        // line 6
        echo "            <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, ($context["csspath"] ?? null), "html", null, true);
        echo "bootstrap.min.css\" />
            <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["csspath"] ?? null), "html", null, true);
        echo "main.css\" />
        ";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
        // line 14
        echo "            
            ";
    }

    // line 21
    public function block_content($context, array $blocks = array())
    {
        // line 22
        echo "            
            ";
    }

    // line 29
    public function block_footer($context, array $blocks = array())
    {
        // line 30
        echo "            
            ";
    }

    // line 35
    public function block_style($context, array $blocks = array())
    {
        // line 36
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, ($context["jspath"] ?? null), "html", null, true);
        echo "jquery.js\"></script>
            <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, ($context["jspath"] ?? null), "html", null, true);
        echo "bootstrap.min.js\"></script>
            <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, ($context["jspath"] ?? null), "html", null, true);
        echo "main.js\"></script>
        ";
    }

    public function getTemplateName()
    {
        return "base.html";
    }

    public function getDebugInfo()
    {
        return array (  133 => 38,  129 => 37,  124 => 36,  121 => 35,  116 => 30,  113 => 29,  108 => 22,  105 => 21,  100 => 14,  97 => 13,  91 => 7,  86 => 6,  83 => 5,  78 => 4,  73 => 40,  71 => 35,  66 => 32,  64 => 29,  57 => 24,  55 => 21,  48 => 16,  46 => 13,  40 => 9,  38 => 5,  34 => 4,  29 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "base.html", "/var/www/html/northwind/public/pages/base.html");
    }
}

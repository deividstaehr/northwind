<?php

/* home.html */
class __TwigTemplate_f6f75a9cd71b756dc05b737a985001ae7ef77be1f06983eaeacb0549eeabd76e extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2>";
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
        echo "</h2>";
    }

    public function getTemplateName()
    {
        return "home.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home.html", "/var/www/html/northwind/public/pages/home.html");
    }
}

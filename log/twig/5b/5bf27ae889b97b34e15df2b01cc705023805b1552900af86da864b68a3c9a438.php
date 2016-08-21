<?php

/* index.html */
class __TwigTemplate_c0d00a130a3dfffeefcfd02b393e7ba8e91f4f1749fe91327653accc96e3791c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html", "index.html", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "\t<h1>";
        echo twig_escape_filter($this->env, (isset($context["go"]) ? $context["go"] : null), "html", null, true);
        echo "</h1>
";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "layout.html" %}*/
/* {% block content %}*/
/* 	<h1>{{ go }}</h1>*/
/* {% endblock %}*/

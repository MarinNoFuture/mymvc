<?php

/* index.html */
class __TwigTemplate_c0d00a130a3dfffeefcfd02b393e7ba8e91f4f1749fe91327653accc96e3791c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title></title>
</head>
<body>
<h1>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["res"]) ? $context["res"] : null), "html", null, true);
        echo "</h1>
<h1>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["go"]) ? $context["go"] : null), "html", null, true);
        echo "</h1>
</body>
</html>";
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
        return array (  31 => 8,  27 => 7,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/* 	<title></title>*/
/* </head>*/
/* <body>*/
/* <h1>{{ res }}</h1>*/
/* <h1>{{ go }}</h1>*/
/* </body>*/
/* </html>*/

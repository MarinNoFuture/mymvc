<?php

/* layout.html */
class __TwigTemplate_d5cfb49bd4fac9828b376c299caf915a9a686dfde80b7ff5fbb2d99769882d80 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title>twig learn</title>
</head>
<body>
<header>header</header>
<content>
\t";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 10
        echo "\t\t
</content>
<footer>footer</footer>
</body>
</html>";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "\t";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  43 => 10,  40 => 9,  32 => 10,  30 => 9,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/* <head>*/
/* 	<title>twig learn</title>*/
/* </head>*/
/* <body>*/
/* <header>header</header>*/
/* <content>*/
/* 	{% block content %}*/
/* 	{% endblock %}		*/
/* </content>*/
/* <footer>footer</footer>*/
/* </body>*/
/* </html>*/

<?php

/* _framework/default.html.twig */
class __TwigTemplate_f6d2ccea9fcac3afe66ac8f4302372617b4fd6be1767372f92505c0d760e07d7 extends Twig_Template
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
        echo "<!doctype html>
<html>
<head>
    <title>Gephart - PHP framework</title>
    <link href=\"https://fonts.googleapis.com/css?family=Material+Icons|Source+Code+Pro:300,400,700,900|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900|Source+Serif+Pro:400,700\" rel=\"stylesheet\">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: \"Source Sans Pro\", sans-serif;
            color: #222;
            text-align: center;
        }

        h1 {
            font-family: \"Source Serif Pro\", serif;
        }
        header {
            background: #eee;
            padding: 32px 0;
        }
        main {
            padding: 32px;
        }
        p {
            margin-bottom: 24px;
        }
        a {
            color: #e79636;
            text-decoration: none;
            transition: color .2s;
        }
        a:hover {
            color: #d78626;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <img class=\"logo\"
         src=\"data:image/png;base64,";
        // line 45
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('base64_encode')->getCallable(), array(call_user_func_array($this->env->getFunction('file_get_contents')->getCallable(), array((($context["_template_dir"] ?? null) . "_framework/assets/img/logo-big.png"))))), "html", null, true);
        echo "\">
</header>
<main>
    <p>Now it's up to you!</p>
    <p><a href=\"https://www.gephart.cz\" target=\"_blank\">www.gephart.cz</a></p>
</main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "_framework/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 45,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_framework/default.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/_framework/default.html.twig");
    }
}

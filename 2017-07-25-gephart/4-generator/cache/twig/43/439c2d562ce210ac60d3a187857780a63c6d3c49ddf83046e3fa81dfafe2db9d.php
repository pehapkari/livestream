<?php

/* admin/login.html.twig */
class __TwigTemplate_3c3d16cf8f539c24561523e4564317607ade804f097e08446399ca6f6d40beb1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html>
<head>
    <meta charset=\"utf-8\"/>
    <base href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["_base_uri"] ?? null), "html", null, true);
        echo "\"/>
    <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    <link rel=\"stylesheet\" href=\"assets/admin/css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"assets/admin/css/bootstrap-theme.css\">
    <script src=\"assets/admin/js/bootstrap.js\"></script>
</head>
<body>
<div class=\"container\">

    <div class=\"jumbotron\">
        <h1>Login</h1>

        <form action=\"";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_route"] ?? null), "generateUrl", array(0 => "admin_login"), "method"), "html", null, true);
        echo "\" method=\"post\">
            <div class=\"form-group\">
                <label for=\"exampleInputEmail1\">Email</label>
                <input type=\"email\" name=\"email\" class=\"form-control\" id=\"exampleInputEmail1\" placeholder=\"Email\">
            </div>
            <div class=\"form-group\">
                <label for=\"exampleInputPassword1\">Password</label>
                <input type=\"password\" name=\"password\" class=\"form-control\" id=\"exampleInputPassword1\" placeholder=\"Password\">
            </div>
            <button type=\"submit\" class=\"btn btn-default\">Submit</button>
        </form>
    </div>
</div>
</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Admin";
    }

    public function getTemplateName()
    {
        return "admin/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 6,  45 => 18,  30 => 6,  26 => 5,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/login.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/login.html.twig");
    }
}

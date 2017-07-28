<?php

/* admin/default.html.twig */
class __TwigTemplate_1a082138b3e9fa1eb97a16332d362ed4ea69b496467cdc10705813c9171a2763 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
    <script src=\"assets/admin/js/jquery-3.2.0.min.js\"></script>
    <script src=\"assets/admin/js/bootstrap.js\"></script>
</head>
<body>
<div id=\"wrap\">

    <div id=\"user\">
        <div class=\"dropdown\">
            <span class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                <img src=\"http://www.gravatar.com/avatar/";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('md5')->getCallable(), array(twig_get_attribute($this->env, $this->getSourceContext(), ($context["user"] ?? null), "username", array()))), "html", null, true);
        echo "?s=64&d=mm\"/>
                ";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["user"] ?? null), "username", array()), "html", null, true);
        echo "
                <span class=\"caret\"></span>
            </span>
            <ul class=\"dropdown-menu dropdown-menu-right\">
                <li><a href=\"";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_logout"), "method"), "html", null, true);
        echo "\"><i class=\"glyphicon glyphicon-off\"></i> Odhlásit</a></li>
            </ul>
        </div>
    </div>

    <div id=\"menu\">
        <div class=\"container-fluid\">
            <div id=\"logo\">
                <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_homepage"), "method"), "html", null, true);
        echo "\">
                    <img src=\"img/logo-invert.png\" alt=\"Gephart\"/>
                </a>
            </div>
            <ul>
                ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menu_list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["menu_item"]) {
            // line 38
            echo "                    <li>
                        <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "link", array()), "html", null, true);
            echo "\" ";
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "active", array())) {
                echo "class=\"active\"";
            }
            echo ">
                            ";
            // line 40
            if (twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "icon", array())) {
                // line 41
                echo "                                <i class=\"glyphicon glyphicon-";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "icon", array()), "html", null, true);
                echo "\"></i>
                            ";
            } else {
                // line 43
                echo "                                <i class=\"glyphicon glyphicon-asterisk\"></i>
                            ";
            }
            // line 45
            echo "                            ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "title", array()), "html", null, true);
            echo "
                        </a>
                    </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['menu_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "            </ul>
        </div>
    </div>

    <div id=\"content\">
        <div class=\"container-fluid\">
            ";
        // line 55
        $this->displayBlock('content', $context, $blocks);
        // line 56
        echo "        </div>
    </div>

    ";
        // line 59
        $this->displayBlock('javascripts', $context, $blocks);
        // line 60
        echo "
</div><!-- /#wrap -->
</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Admin";
    }

    // line 55
    public function block_content($context, array $blocks = array())
    {
    }

    // line 59
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "admin/default.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 59,  146 => 55,  140 => 6,  133 => 60,  131 => 59,  126 => 56,  124 => 55,  116 => 49,  105 => 45,  101 => 43,  95 => 41,  93 => 40,  85 => 39,  82 => 38,  78 => 37,  70 => 32,  59 => 24,  52 => 20,  48 => 19,  32 => 6,  28 => 5,  22 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/default.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/default.html.twig");
    }
}

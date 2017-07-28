<?php

/* admin/homepage.html.twig */
class __TwigTemplate_d0f46dd0174ac760a38388e8c208e3bd33aa9c818776d10839f9181cfd7fe4a1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/default.html.twig", "admin/homepage.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/default.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    <h1>Nástěnka</h1>

    <div class=\"row\">
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["menu_list"] ?? null));
        foreach ($context['_seq'] as $context["menu_key"] => $context["menu_item"]) {
            if (($context["menu_key"] != "homepage")) {
                // line 9
                echo "            <div class=\"col-xs-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">";
                // line 12
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "title", array()), "html", null, true);
                echo "</h3>
                    </div>
                    <div class=\"panel-body\">
                        <a href=\"";
                // line 15
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["menu_item"], "link", array()), "html", null, true);
                echo "\">Přejít na modul</a>
                    </div>
                </div>
            </div>
        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['menu_key'], $context['menu_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </div>

";
    }

    public function getTemplateName()
    {
        return "admin/homepage.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 20,  53 => 15,  47 => 12,  42 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/homepage.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/homepage.html.twig");
    }
}

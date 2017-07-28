<?php

/* _framework/line_extension.html.twig */
class __TwigTemplate_c0d3af746da81b37f312fab24ea811e8cbf46777ab05aec65a80c1fb11c5cd9d extends Twig_Template
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
        echo "<div class=\"_gf-line__box
    ";
        // line 2
        if (($context["content"] ?? null)) {
            echo "_gf-line__box--hover";
        }
        echo "\"
    ";
        // line 3
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["extension"] ?? null), "attrs", array())) {
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["extension"] ?? null), "attrs", array());
        }
        // line 4
        echo ">
            <span class=\"_gf-line__box__title\">
                ";
        // line 6
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["extension"] ?? null), "icon", array())) {
            // line 7
            echo "                    <img class=\"_gf-line__ico\" src=\"";
            echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["extension"] ?? null), "icon", array());
            echo "\">
                ";
        }
        // line 9
        echo "
                ";
        // line 10
        echo twig_get_attribute($this->env, $this->getSourceContext(), ($context["extension"] ?? null), "title", array());
        echo "
            </span>

    ";
        // line 13
        if (($context["content"] ?? null)) {
            // line 14
            echo "        <div class=\"_gf-line__box__hover\">
            ";
            // line 15
            echo ($context["content"] ?? null);
            echo "
        </div>
    ";
        }
        // line 18
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "_framework/line_extension.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 18,  58 => 15,  55 => 14,  53 => 13,  47 => 10,  44 => 9,  38 => 7,  36 => 6,  32 => 4,  28 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_framework/line_extension.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/_framework/line_extension.html.twig");
    }
}

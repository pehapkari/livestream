<?php

/* admin/generator/snippet/item.html.twig */
class __TwigTemplate_2e2b6e2f110a638f1228866917780b238a74a5b5666f85398c8660f02fafb7e5 extends Twig_Template
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
        echo "
<div class=\"col-xs-3 js-generator-item\">
    <div class=\"panel panel-default\">
        <div class=\"panel-heading\">
            <h3 class=\"panel-title\">
                <input ";
        // line 6
        if (($context["item"] ?? null)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "name", array()), "html", null, true);
            echo "\"";
        }
        // line 7
        echo "                        type=\"text\" name=\"items[";
        echo twig_escape_filter($this->env, ($context["iterator"] ?? null), "html", null, true);
        echo "][name]\" class=\"form-control\" placeholder=\"Název\">
            </h3>
        </div>
        <div class=\"panel-body\">
            <div class=\"form-group\">
                <input ";
        // line 12
        if (($context["item"] ?? null)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "slug", array()), "html", null, true);
            echo "\"";
        }
        // line 13
        echo "                       type=\"text\" name=\"items[";
        echo twig_escape_filter($this->env, ($context["iterator"] ?? null), "html", null, true);
        echo "][slug]\" class=\"form-control\" placeholder=\"Slug\">
            </div>
            <div class=\"form-group\">
                <select type=\"text\" name=\"items[";
        // line 16
        echo twig_escape_filter($this->env, ($context["iterator"] ?? null), "html", null, true);
        echo "][type]\" class=\"form-control\">
                    <option ";
        // line 17
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "text"))) {
            echo "selected";
        }
        echo ">text</option>
                    <option ";
        // line 18
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "textarea"))) {
            echo "selected";
        }
        echo ">textarea</option>
                    <option ";
        // line 19
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "bool"))) {
            echo "selected";
        }
        echo ">bool</option>
                    <option ";
        // line 20
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "date"))) {
            echo "selected";
        }
        echo ">date</option>
                    <option ";
        // line 21
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "file"))) {
            echo "selected";
        }
        echo ">file</option>
                    <option ";
        // line 22
        if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == "image"))) {
            echo "selected";
        }
        echo ">image</option>
                    <optgroup label=\"Vazba\">
                        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["relation_module"]) {
            // line 25
            echo "                            <option value=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["relation_module"], "entityName", array()), "html", null, true);
            echo "\"
                                    ";
            // line 26
            if ((($context["item"] ?? null) && (twig_get_attribute($this->env, $this->getSourceContext(), ($context["item"] ?? null), "type", array()) == twig_get_attribute($this->env, $this->getSourceContext(), $context["relation_module"], "entityName", array())))) {
                echo "selected";
            }
            echo ">
                                ";
            // line 27
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["relation_module"], "name", array()), "html", null, true);
            echo "
                            </option>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['relation_module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "                    </optgroup>
                </select>
            </div>
            <span class=\"btn btn-sm btn-danger js-generator-item-remove\"><i class=\"glyphicon glyphicon-remove\"></i></span>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/generator/snippet/item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 30,  110 => 27,  104 => 26,  99 => 25,  95 => 24,  88 => 22,  82 => 21,  76 => 20,  70 => 19,  64 => 18,  58 => 17,  54 => 16,  47 => 13,  41 => 12,  32 => 7,  26 => 6,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/generator/snippet/item.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/generator/snippet/item.html.twig");
    }
}

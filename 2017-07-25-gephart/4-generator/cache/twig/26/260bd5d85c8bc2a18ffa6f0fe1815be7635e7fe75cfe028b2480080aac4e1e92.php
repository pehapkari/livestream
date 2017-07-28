<?php

/* _framework/error/blocks/trace.html.twig */
class __TwigTemplate_50a685f266dfeddc652d0a5bf28257c172ba8decdbb1e050f8e8713e80d92ac2 extends Twig_Template
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
        echo "<table>
    ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["traces"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["trace"]) {
            // line 3
            echo "        <tr><td>";
            echo twig_escape_filter($this->env, $context["trace"], "html", null, true);
            echo "</td></tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['trace'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</table>";
    }

    public function getTemplateName()
    {
        return "_framework/error/blocks/trace.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_framework/error/blocks/trace.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/_framework/error/blocks/trace.html.twig");
    }
}

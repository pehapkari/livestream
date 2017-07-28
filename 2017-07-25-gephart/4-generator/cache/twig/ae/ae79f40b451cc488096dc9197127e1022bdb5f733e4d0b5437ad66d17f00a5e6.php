<?php

/* _framework/error/blocks/file.html.twig */
class __TwigTemplate_5fdb30e1b0057b7e39abd5b8fbff28c85929d11f54a85c48a61b29f344f93066 extends Twig_Template
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
        ob_start();
        // line 2
        echo "<pre><code class=\"php\">
    ";
        // line 3
        $context["lines_num"] = array("from" => (($context["errline"] ?? null) - 10), "to" => (($context["errline"] ?? null) + 10));
        // line 4
        echo "    ";
        $context["file_lines"] = twig_split_filter($this->env, ($context["file"] ?? null), "
");
        // line 5
        echo "
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["file_lines"] ?? null));
        foreach ($context['_seq'] as $context["line_number"] => $context["file_line"]) {
            if ((($context["line_number"] >= twig_get_attribute($this->env, $this->getSourceContext(), ($context["lines_num"] ?? null), "from", array())) && ($context["line_number"] <= twig_get_attribute($this->env, $this->getSourceContext(), ($context["lines_num"] ?? null), "to", array())))) {
                // line 7
                echo "        ";
                $context["line_number"] = ($context["line_number"] + 1);
                // line 8
                echo "
        ";
                // line 9
                if (($context["line_number"] == ($context["errline"] ?? null))) {
                    // line 10
                    echo "            <div class='line-problem' style='background:rgba(212,0,0,.1)'>
        ";
                }
                // line 12
                echo "
        <span class='line-number'>";
                // line 13
                echo twig_escape_filter($this->env, $context["line_number"], "html", null, true);
                echo ".</span>";
                echo twig_escape_filter($this->env, $context["file_line"], "html", null, true);
                echo "<br/>

        ";
                // line 15
                if (($context["line_number"] == ($context["errline"] ?? null))) {
                    // line 16
                    echo "            </div>
        ";
                }
                // line 18
                echo "    ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['line_number'], $context['file_line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "</code></pre>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "_framework/error/blocks/file.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 19,  66 => 18,  62 => 16,  60 => 15,  53 => 13,  50 => 12,  46 => 10,  44 => 9,  41 => 8,  38 => 7,  33 => 6,  30 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_framework/error/blocks/file.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/_framework/error/blocks/file.html.twig");
    }
}

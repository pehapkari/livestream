<?php

/* admin/generator/new.html.twig */
class __TwigTemplate_bf87647cc6f57ab6fc8ec9ca59068da034c1f8b126305de5d189f58db9d1b932 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/generator/default.html.twig", "admin/generator/new.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin/generator/default.html.twig";
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
<h1>Generátor - Nový modul</h1>

<form action=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_route"] ?? null), "generateUrl", array(0 => "admin_generator_new"), "method"), "html", null, true);
        echo "\" method=\"post\">
    <table class=\"table table-bordered\">
        <tr>
            <th width=\"50%\">Název modulu</th>
            <th>Slug - Jednotné číslo</th>
            <th>Slug - Množné číslo</th>
        </tr>
        <tr>
            <td>
                <input type=\"text\" class=\"form-control\" name=\"name\" required=\"required\">
            </td>
            <td>
                <input type=\"text\" class=\"form-control\" name=\"slug_singular\" required=\"required\">
            </td>
            <td>
                <input type=\"text\" class=\"form-control\" name=\"slug_plural\" required=\"required\">
            </td>
        </tr>
    </table>

    <button type=\"submit\" class=\"btn btn-info\">Vytvořit</button>
</form>

";
    }

    public function getTemplateName()
    {
        return "admin/generator/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/generator/new.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/generator/new.html.twig");
    }
}

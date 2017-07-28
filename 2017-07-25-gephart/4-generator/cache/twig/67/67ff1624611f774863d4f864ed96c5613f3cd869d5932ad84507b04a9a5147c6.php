<?php

/* admin/generator/edit.html.twig */
class __TwigTemplate_52751e074002789b827f35092f9d3ee14dca47f4c3ce9227075d19418c33c7fd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/generator/default.html.twig", "admin/generator/edit.html.twig", 1);
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
    <h1>Generátor - Úprava modulu</h1>

    <form action=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_route"] ?? null), "generateUrl", array(0 => "admin_generator"), "method"), "html", null, true);
        echo "\" method=\"post\">
        <table class=\"table table-bordered\">
            <tr>
                <th width=\"50%\">Název modulu</th>
                <th>Slug - Jednotné číslo</th>
                <th>Slug - Množné číslo</th>
            </tr>
            <tr>
                <td>
                    <input value=\"";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["module"] ?? null), "name", array()), "html", null, true);
        echo "\" type=\"text\" class=\"form-control\" name=\"name\" required=\"required\">
                </td>
                <td>
                    <input value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["module"] ?? null), "slugSingular", array()), "html", null, true);
        echo "\" type=\"text\" class=\"form-control\" name=\"slug_singular\" required=\"required\">
                </td>
                <td>
                    <input value=\"";
        // line 22
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["module"] ?? null), "slugPlural", array()), "html", null, true);
        echo "\" type=\"text\" class=\"form-control\" name=\"slug_plural\" required=\"required\">
                </td>
            </tr>
        </table>


        <div>

            <ul class=\"nav nav-tabs\" id=\"tabs\" role=\"tablist\">
                <li role=\"presentation\" class=\"active\"><a href=\"#items\" aria-controls=\"home\" role=\"tab\"
                                                          data-toggle=\"tab\">Položky</a></li>
                <li role=\"presentation\"><a href=\"#anothers\" aria-controls=\"profile\" role=\"tab\" data-toggle=\"tab\">Nastavení</a>
                </li>
            </ul>

            <div class=\"tab-content\">
                <div role=\"tabpanel\" class=\"tab-pane fade in active\" id=\"items\">

                    <div class=\"panel panel-default\">
                        <div class=\"panel-body\">
                            <div class=\"row js-generator-items\">
                                ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 44
            echo "                                    ";
            $this->loadTemplate("admin/generator/snippet/item.html.twig", "admin/generator/edit.html.twig", 44)->display(array_merge($context, array("iterator" => twig_get_attribute($this->env, $this->getSourceContext(), $context["loop"], "index0", array()), "item" => $context["item"])));
            // line 45
            echo "                                ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 46
        echo "                            </div>
                            <p>
                                <button class=\"btn btn-sm btn-success js-generator-item-new\">Přidat položku</button>
                            </p>
                        </div>
                    </div>

                </div>

                <div role=\"tabpanel\" class=\"tab-pane fade\" id=\"anothers\">

                    <div class=\"panel panel-default\">
                        <div class=\"panel-body\">
                            <div class=\"checkbox\">
                                <label>
                                    <input ";
        // line 61
        if (twig_get_attribute($this->env, $this->getSourceContext(), ($context["module"] ?? null), "inMenu", array())) {
            echo "checked";
        }
        echo " type=\"checkbox\" name=\"in_menu\"
                                           value=\"1\">
                                    Zobrazit v menu
                                </label>
                            </div>

                            <div class=\"form-group\">
                                <label for=\"form_edit_icon\">Ikonka</label>
                                <input value=\"";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["module"] ?? null), "icon", array()), "html", null, true);
        echo "\" name=\"icon\" class=\"form-control\" id=\"form_edit_icon\">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button class=\"btn btn-info\">Uložit</button>
    </form>

";
    }

    public function getTemplateName()
    {
        return "admin/generator/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 69,  135 => 61,  118 => 46,  104 => 45,  101 => 44,  84 => 43,  60 => 22,  54 => 19,  48 => 16,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/generator/edit.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/generator/edit.html.twig");
    }
}

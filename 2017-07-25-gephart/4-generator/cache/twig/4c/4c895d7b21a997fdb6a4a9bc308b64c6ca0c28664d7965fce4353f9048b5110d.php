<?php

/* admin/generator/index.html.twig */
class __TwigTemplate_ae1be84f06a69cb07e14bad4cd171e2a87b901d0fef799940c2b4e0369720389 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin/generator/default.html.twig", "admin/generator/index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
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
    <h1>Generátor</h1>

    <p>
        <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_new"), "method"), "html", null, true);
        echo "\" class=\"btn btn-success\">Nový modul</a>
    </p>

    <div class=\"row noselect\">
        ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            // line 13
            echo "            <div class=\"col-lg-4 col-md-6 js-generator-module\" data-generator-module_id=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "id", array()), "html", null, true);
            echo "\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <div class=\"pull-right\">
                            <span class=\"btn btn-xs btn-info js-generator-module-move\"><small><i class=\"glyphicon glyphicon-move\"></i></small></span>
                        </div>
                        <h3 class=\"panel-title\">";
            // line 19
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "name", array()), "html", null, true);
            echo "</h3>
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table table-bordered\">
                            <tr>
                                <th>Entita:</th>
                                <td>
                                    ";
            // line 26
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["modules_status"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "entityName", array()), array(), "array"), "entity", array())) {
                // line 27
                echo "                                        existuje
                                    ";
            } else {
                // line 29
                echo "                                        neexistuje
                                    ";
            }
            // line 31
            echo "                                </td>
                                <td><button class=\"btn btn-xs btn-warning js-generator-entitysync-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat</button></td>
                            </tr>
                            <tr>
                                <th>Repozitář:</th>
                                <td>
                                    ";
            // line 37
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["modules_status"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "entityName", array()), array(), "array"), "repository", array())) {
                // line 38
                echo "                                        existuje
                                    ";
            } else {
                // line 40
                echo "                                        neexistuje
                                    ";
            }
            // line 42
            echo "                                </td>
                                <td><button class=\"btn btn-xs btn-warning js-generator-repositorysync-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat</button></td>
                            </tr>
                            <tr>
                                <th>Tabulka:</th>
                                <td>
                                    ";
            // line 48
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["modules_status"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "entityName", array()), array(), "array"), "table", array())) {
                // line 49
                echo "                                        existuje
                                    ";
            } else {
                // line 51
                echo "                                        neexistuje
                                    ";
            }
            // line 53
            echo "                                </td>
                                <td><button class=\"btn btn-xs btn-warning js-generator-tablesync-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat</button></td>
                            </tr>
                            <tr>
                                <th>Controller:</th>
                                <td>
                                    ";
            // line 59
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["modules_status"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "entityName", array()), array(), "array"), "controller", array())) {
                // line 60
                echo "                                        existuje
                                    ";
            } else {
                // line 62
                echo "                                        neexistuje
                                    ";
            }
            // line 64
            echo "                                </td>
                                <td><button class=\"btn btn-xs btn-warning js-generator-controllersync-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat</button></td>
                            </tr>
                            <tr>
                                <th>Šablony:</th>
                                <td>
                                    ";
            // line 70
            if (twig_get_attribute($this->env, $this->getSourceContext(), twig_get_attribute($this->env, $this->getSourceContext(), ($context["modules_status"] ?? null), twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "entityName", array()), array(), "array"), "view", array())) {
                // line 71
                echo "                                        existuje
                                    ";
            } else {
                // line 73
                echo "                                        neexistuje
                                    ";
            }
            // line 75
            echo "                                </td>
                                <td><button class=\"btn btn-xs btn-warning js-generator-viewsync-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat</button></td>
                            </tr>
                        </table>
                        <a href=\"";
            // line 79
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_edit", 1 => array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "id", array()))), "method"), "html", null, true);
            echo "\" class=\"btn btn-info\"><i class=\"glyphicon glyphicon-pencil\"></i></a>
                        <a href=\"";
            // line 80
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_delete", 1 => array("id" => twig_get_attribute($this->env, $this->getSourceContext(), $context["module"], "id", array()))), "method"), "html", null, true);
            echo "\" class=\"btn btn-danger\" onclick=\"return confirm('Opravdu chcete nenávratně smazat?')\"><i class=\"glyphicon glyphicon-remove\"></i></a>
                        <span class=\"btn btn-warning js-generator-all-show\" data-toggle=\"modal\" data-target=\"#generator-modal\">Generovat vše</span>
                    </div>
                </div>
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "    </div>

    <!-- Modal -->
    <div class=\"modal fade\" id=\"generator-modal\" tabindex=\"-1\">
        <div class=\"modal-dialog\" role=\"document\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
                    <h4 class=\"modal-title\" id=\"generator-modal-label\">Generování</h4>
                </div>
                <div class=\"modal-body\" id=\"generator-modal-content\">
                    Načítání ...
                </div>
                <div class=\"modal-footer\">
                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Zavřít</button>
                    <!--<button type=\"button\" class=\"btn btn-primary\">Uložit</button>-->
                </div>
            </div>
        </div>
    </div>


    <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/atom-one-light.min.css\">
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js\"></script>


";
    }

    // line 115
    public function block_javascripts($context, array $blocks = array())
    {
        // line 116
        echo "
    ";
        // line 117
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

    <script src=\"assets/admin/js/drag-arrange.js\"></script>
    <script>
        \$('.js-generator-module').arrangeable({dragSelector: '.js-generator-module-move'});
    </script>


";
    }

    public function getTemplateName()
    {
        return "admin/generator/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  209 => 117,  206 => 116,  203 => 115,  173 => 86,  161 => 80,  157 => 79,  151 => 75,  147 => 73,  143 => 71,  141 => 70,  133 => 64,  129 => 62,  125 => 60,  123 => 59,  115 => 53,  111 => 51,  107 => 49,  105 => 48,  97 => 42,  93 => 40,  89 => 38,  87 => 37,  79 => 31,  75 => 29,  71 => 27,  69 => 26,  59 => 19,  49 => 13,  45 => 12,  38 => 8,  32 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/generator/index.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/generator/index.html.twig");
    }
}

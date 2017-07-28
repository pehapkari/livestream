<?php

/* admin/generator/js/index.js.twig */
class __TwigTemplate_851a19960a7b12f4be1e2014bf2546acbeb92b28b1f515b72f04d1b050a8f25a extends Twig_Template
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
        echo "\$(function () {

    \$(\"body\").on(\"click\", \".js-generator-item-new\", function () {
        var iterator = \$(\".js-generator-item\").length;
        \$.get(\"";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_item_new"), "method"), "html", null, true);
        echo "\", {
            \"iterator\": iterator
        }, function (html) {
            \$(\".js-generator-items\").append(html);
        });

        return false;
    });

    \$(\"body\").on(\"click\", \".js-generator-item-remove\", function () {
        \$(this).parents(\".js-generator-item\").remove();
    });

    \$(\"body\").on(\"click\", \".js-generator-all-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        if (confirm('Opravdu chcete vše vygenerovat? Přijdete o všechny ruční úpravy.')) {
            var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
            \$.get(\"";
        // line 23
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_entitysync"), "method"), "html", null, true);
        echo "\", {
                \"id\": id
            }, function () {
                \$(\"#generator-modal-content\").html(\"Entita vygenerována.<br/>\");
                \$.get(\"";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_repositorysync"), "method"), "html", null, true);
        echo "\", {
                    \"id\": id
                }, function () {
                    \$(\"#generator-modal-content\").append(\"Repozitář vygenerován.<br/>\");
                    \$.get(\"";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_tablesync"), "method"), "html", null, true);
        echo "\", {
                        \"id\": id
                    }, function () {
                        \$(\"#generator-modal-content\").append(\"Tabulka synchronizována.<br/>\");
                        \$.get(\"";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_controllersync"), "method"), "html", null, true);
        echo "\", {
                            \"id\": id
                        }, function () {
                            \$(\"#generator-modal-content\").append(\"Controller vygenerován.<br/>\");
                            \$.get(\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_viewsync"), "method"), "html", null, true);
        echo "\", {\"id\": id}, function () {
                                \$(\"#generator-modal-content\").append(\"Šablona vygenerována.<br/>\");
                                \$(\"#generator-modal-label\").html(\"Hotovo\");
                            });
                        });
                    });
                });
            });
        }
    });

    \$(\"body\").on(\"click\", \".js-generator-tablesync-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
        if (confirm('Generováním přijdete o veškeré ruční úpravy. Opravdu chcete?')) {
            \$.get(\"";
        // line 55
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_tablesync"), "method"), "html", null, true);
        echo "\", {
                \"id\": id
            }, function (html) {
                \$(\"#generator-modal-label\").html(\"Tabulka byla synchronizována:\");
                \$(\"#generator-modal-content\").html(\"<pre><code class='sql'>\" + html + \"</code></pre>\");
                \$('#generator-modal-content pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        } else {
            event.stopPropagation();
            return false;
        }

    });

    \$(\"body\").on(\"click\", \".js-generator-entitysync-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
        if (confirm('Generováním přijdete o veškeré ruční úpravy. Opravdu chcete?')) {
            \$.get(\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_entitysync"), "method"), "html", null, true);
        echo "\", {
                \"id\": id
            }, function (html) {
                \$(\"#generator-modal-label\").html(\"Entita byla vygenerována:\");
                \$(\"#generator-modal-content\").html(\"<pre><code class='php'>\" + html + \"</code></pre>\");
                \$('#generator-modal-content pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        } else {
            event.stopPropagation();
            return false;
        }
    });

    \$(\"body\").on(\"click\", \".js-generator-repositorysync-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
        if (confirm('Generováním přijdete o veškeré ruční úpravy. Opravdu chcete?')) {
            \$.get(\"";
        // line 96
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_repositorysync"), "method"), "html", null, true);
        echo "\", {
                \"id\": id
            }, function (html) {
                \$(\"#generator-modal-label\").html(\"Repozitáž by vygenerován:\");
                \$(\"#generator-modal-content\").html(\"<pre><code class='php'>\" + html + \"</code></pre>\");
                \$('#generator-modal-content pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        } else {
            event.stopPropagation();
            return false;
        }
    });

    \$(\"body\").on(\"click\", \".js-generator-controllersync-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
        if (confirm('Generováním přijdete o veškeré ruční úpravy. Opravdu chcete?')) {
            \$.get(\"";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_controllersync"), "method"), "html", null, true);
        echo "\", {
                \"id\": id
            }, function (html) {
                \$(\"#generator-modal-label\").html(\"Controller byl vygenerován:\");
                \$(\"#generator-modal-content\").html(\"<pre><code class='php'>\" + html + \"</code></pre>\");
                \$('#generator-modal-content pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        } else {
            event.stopPropagation();
            return false;
        }
    });

    \$(\"body\").on(\"click\", \".js-generator-viewsync-show\", function () {
        \$(\"#generator-modal-label\").html(\"Probíhá generování ...\");
        \$(\"#generator-modal-content\").html(\"Načítání ...\");
        var id = \$(this).parents(\".js-generator-module\").data(\"generator-module_id\");
        if (confirm('Generováním přijdete o veškeré ruční úpravy. Opravdu chcete?')) {
            \$.get(\"";
        // line 136
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_viewsync"), "method"), "html", null, true);
        echo "\", {\"id\": id}, function (html) {
                \$(\"#generator-modal-label\").html(\"Šablona byla vygenerována:\");
                \$(\"#generator-modal-content\").html(\"<pre><code class='php'>\" + html + \"</code></pre>\");
                \$('#generator-modal-content pre code').each(function (i, block) {
                    hljs.highlightBlock(block);
                });
            });
        } else {
            event.stopPropagation();
            return false;
        }
    });


    \$(\"body\").on(\"drag.end.arrangeable\", function(){
        var sorts = [];

        \$('.js-generator-module').each(function(){
            sorts.push(\$(this).data(\"generator-module_id\"));
        });

        \$.get(\"";
        // line 157
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["_router"] ?? null), "generateUrl", array(0 => "admin_generator_ajax_savesortmodules"), "method"), "html", null, true);
        echo "\", {
            \"sorts\": sorts
        });
    });

});";
    }

    public function getTemplateName()
    {
        return "admin/generator/js/index.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 157,  186 => 136,  163 => 116,  140 => 96,  117 => 76,  93 => 55,  74 => 39,  67 => 35,  60 => 31,  53 => 27,  46 => 23,  25 => 5,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "admin/generator/js/index.js.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/admin/generator/js/index.js.twig");
    }
}

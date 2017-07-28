<?php

/* _framework/line.html.twig */
class __TwigTemplate_8264c6ed77af19549f1d1cc2486a3ff05334028166c420e01430a06872fbb410 extends Twig_Template
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
        echo "<div class=\"_gf-line\">
    <img class=\"_gf-line__logo\"
         src=\"data:image/png;base64,";
        // line 3
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('base64_encode')->getCallable(), array(call_user_func_array($this->env->getFunction('file_get_contents')->getCallable(), array((($context["_template_dir"] ?? null) . "_framework/assets/img/logo.png"))))), "html", null, true);
        echo "\">

    ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["extension"], "align", array()) == "left")) {
                // line 6
                echo "        ";
                $context["content"] = twig_get_attribute($this->env, $this->getSourceContext(), $context["extension"], "content", array());
                // line 7
                echo "        ";
                $this->loadTemplate("_framework/line_extension.html.twig", "_framework/line.html.twig", 7)->display($context);
                // line 8
                echo "    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "
    <div style=\"float:right\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["extensions"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        foreach ($context['_seq'] as $context["_key"] => $context["extension"]) {
            if ((twig_get_attribute($this->env, $this->getSourceContext(), $context["extension"], "align", array()) == "right")) {
                // line 12
                echo "            ";
                $context["content"] = twig_get_attribute($this->env, $this->getSourceContext(), $context["extension"], "content", array());
                // line 13
                echo "            ";
                $this->loadTemplate("_framework/line_extension.html.twig", "_framework/line.html.twig", 13)->display($context);
                // line 14
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['extension'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "    </div>
</div>

<script>
    var _gf_hovering  = document.getElementsByClassName(\"_gf-line__box--hover\");
    console.log(_gf_hovering.length);
    for (var i= 0; i < _gf_hovering.length; i++) {
        _gf_hovering[i].addEventListener(\"mouseenter\", function(){
            var children = this.children;
            var line_height = document.getElementsByClassName(\"_gf-line\")[0].clientHeight;
            for (var j=0;j<children.length;j++) {
                if (children[j].className == \"_gf-line__box__hover\") {

                    children[j].style.left = \"auto\";
                    children[j].style.right = -1+\"px\";
                    children[j].style.maxWidth = \"10000px\";
                    children[j].style.height = \"auto\";

                    var left = children[j].offsetLeft + this.offsetLeft;
                    var top = children[j].offsetTop + window.innerHeight;

                    if (left < 0) {
                        children[j].style.right = \"auto\";
                        children[j].style.left = -this.offsetLeft-1+\"px\";
                        children[j].style.maxWidth = window.innerWidth+\"px\";
                    }

                    if (top < 0) {
                        children[j].style.height = window.innerHeight - line_height + \"px\";
                    }
                }
            }
        });
    }
</script>

<style>
    ";
        // line 52
        $this->loadTemplate("_framework/assets/css/main.css", "_framework/line.html.twig", 52)->display($context);
        // line 53
        echo "</style>";
    }

    public function getTemplateName()
    {
        return "_framework/line.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 53,  125 => 52,  86 => 15,  76 => 14,  73 => 13,  70 => 12,  59 => 11,  55 => 9,  45 => 8,  42 => 7,  39 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_framework/line.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/pehapkari-livestream/4-generator/template/_framework/line.html.twig");
    }
}

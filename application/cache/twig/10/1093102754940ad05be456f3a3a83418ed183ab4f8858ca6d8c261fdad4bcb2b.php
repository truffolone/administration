<?php

/* users/add.twig */
class __TwigTemplate_adcdb8f0aaa11cec0e1c912e8978e42eef654bb6659ebe8a482a5b7cf6cca405 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/default.twig", "users/add.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/default.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Index";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
    <style type=\"text/css\">
        .important { color: #336699; }
    </style>
";
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "    <h1>Aggiungi un Utente</h1>
    <p class=\"important\">
        Utente
    </p>
";
    }

    public function getTemplateName()
    {
        return "users/add.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  49 => 10,  39 => 5,  36 => 4,  30 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layouts/default.twig\" %}

{% block title %}Index{% endblock %}
{% block head %}
    {{ parent() }}
    <style type=\"text/css\">
        .important { color: #336699; }
    </style>
{% endblock %}
{% block content %}
    <h1>Aggiungi un Utente</h1>
    <p class=\"important\">
        Utente
    </p>
{% endblock %}", "users/add.twig", "/var/www/html/echosystem/administration/application/views/users/add.twig");
    }
}

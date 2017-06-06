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
            'content_title' => array($this, 'block_content_title'),
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
        echo "Aggiungi Utente";
    }

    // line 5
    public function block_content_title($context, array $blocks = array())
    {
        echo "Aggiungi un Utente";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    <div class=\"col-md-6\">
        ";
        // line 9
        echo form_open();
        echo "
            <div class=\"form-group col-md-3\">
                <label for=\"email\">Email <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"username\">Username <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"text\" name=\"username\" class=\"form-control\" id=\"username\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password\">Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
            </div>
            <div class=\"form-group col-md-12\">
                <input class=\"btn btn-default btn-info pull-right\" type=\"submit\" value=\"Crea L'utente\" id=\"submit\">
            </div>
        ";
        // line 31
        echo form_close();
        echo "
    </div>
    <div class=\"col-md-6\"></div>
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
        return array (  73 => 31,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,  11 => 1,);
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

{% block title %}Aggiungi Utente{% endblock %}

{% block content_title %}Aggiungi un Utente{% endblock %}

{% block content %}
    <div class=\"col-md-6\">
        {{ form_open() }}
            <div class=\"form-group col-md-3\">
                <label for=\"email\">Email <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"username\">Username <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"text\" name=\"username\" class=\"form-control\" id=\"username\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password\">Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
            </div>
            <div class=\"form-group col-md-12\">
                <input class=\"btn btn-default btn-info pull-right\" type=\"submit\" value=\"Crea L'utente\" id=\"submit\">
            </div>
        {{ form_close() }}
    </div>
    <div class=\"col-md-6\"></div>
{% endblock %}", "users/add.twig", "/var/www/html/echosystem/administration/application/views/users/add.twig");
    }
}

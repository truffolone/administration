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
            <div class=\"col-lg-12\">
                <h2 class=\"page-header\">Dati Utente</h2>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"email\">Email <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute(($context["formValues"] ?? null), "email", array()), "html", null, true);
        echo "\" placeholder=\"email@example.com\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"username\">Username <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"text\" name=\"username\" class=\"form-control\" id=\"username\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["formValues"] ?? null), "username", array()), "html", null, true);
        echo "\" placeholder=\"Username\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password\">Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password_confirm\">Conferma Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" required>
            </div>
            <div class=\"col-lg-12\">
                <h2 class=\"page-header\">Gruppi Utente</h2>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"groups\">Gruppi Utenti:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <select multiple=\"multiple\" name=\"groups[]\" id=\"groups\" class=\"form-control\">
                    ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 46
            echo "                        <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
            echo "\"";
            if (twig_in_filter($this->getAttribute($context["group"], "id", array()), $this->getAttribute(($context["formValues"] ?? null), "groups", array()))) {
                echo " selected=\"selected\"";
            }
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "name", array()), "html", null, true);
            echo "</option>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "                </select>
            </div>
            <div class=\"form-group col-md-12\">
                <input class=\"btn btn-default btn-info pull-right\" type=\"submit\" value=\"Crea L'utente\" id=\"submit\">
            </div>
        ";
        // line 53
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
        return array(  119 => 53,  112 => 48,  97 => 46,  93 => 45,  68 => 23,  59 => 17,  48 => 9,  45 => 8,  42 => 7,  36 => 5,  30 => 3,  11 => 1,);
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
            <div class=\"col-lg-12\">
                <h2 class=\"page-header\">Dati Utente</h2>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"email\">Email <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" value=\"{{ formValues.email }}\" placeholder=\"email@example.com\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"username\">Username <span class=\"text-danger\">*</span>:</label>
            </div>
            <div class=\"form-group col-md-9\">
                <input type=\"text\" name=\"username\" class=\"form-control\" id=\"username\" value=\"{{ formValues.username }}\" placeholder=\"Username\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password\">Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password\" name=\"password\" required>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"password_confirm\">Conferma Password <span class=\"text-danger\">*</span>:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <input type=\"password\" class=\"form-control\" id=\"password_confirm\" name=\"password_confirm\" required>
            </div>
            <div class=\"col-lg-12\">
                <h2 class=\"page-header\">Gruppi Utente</h2>
            </div>
            <div class=\"form-group col-md-3\">
                <label for=\"groups\">Gruppi Utenti:</label>
            </div> 
            <div class=\"form-group col-md-9\">
                <select multiple=\"multiple\" name=\"groups[]\" id=\"groups\" class=\"form-control\">
                    {% for group in groups %}
                        <option value=\"{{ group.id }}\"{% if group.id in formValues.groups %} selected=\"selected\"{% endif %}>{{ group.name }}</option>
                    {% endfor %}
                </select>
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

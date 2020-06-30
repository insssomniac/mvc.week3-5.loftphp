<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* users.html */
class __TwigTemplate_e0821755077c827f6c85eaa8fff395c0350200d1b728132acd97eb218b35d40a extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/css/normalize.css\">
    <link rel=\"stylesheet\" href=\"/css/main.css\">
    <title>Yet Another Interesting Blog | Welcome</title>
</head>

<body>
<div class=\"wrapper\">
    <section class=\"top-line\">
        <div class=\"container top-line__container\">
            <header class=\"header\">
                <div class=\"header__col--align--right text-grey\">
                    <div class=\"header__menu-item\">
                        Вы вошли как&nbsp;<b>";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 18), "html", null, true);
        echo "</b>&nbsp;&nbsp;::&nbsp;&nbsp;<a href=\"/logout\">Выйти</a>
                    </div>
                    <div class=\"header__menu-item\">
                        <a href=\"/admin/users\">Администрирование</a>
                    </div>
                    <div class=\"header__menu-item\">
                        <a href=\"/\">На главную</a>
                    </div>
                </div>
            </header>
            <div class=\"top-line__title\">
                <h1 class=\"main-title\">Yet Another Interesting Blog</h1>
            </div>
        </div>
    </section>

    <main class=\"main-content\">
        <div class=\"container\">
            <ul class=\"users\">
                <li class=\"users__item\">
                    <div class=\"users__col text-bold\">
                        User ID
                    </div>
                    <div class=\"users__col text-bold\">
                        Name
                    </div>
                    <div class=\"users__col text-bold\">
                        Email
                    </div>
                    <div class=\"users__col text-bold\">
                        Registered at
                    </div>
                    <div class=\"users__col text-bold\">
                        Actions
                    </div>
                </li>
                ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 55
            echo "                <li class=\"users__item\">
                    <div class=\"users__col\">
                        ";
            // line 57
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 57), "html", null, true);
            echo "
                    </div>
                    <div class=\"users__col\">
                        ";
            // line 60
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "name", [], "any", false, false, false, 60), "html", null, true);
            echo "
                    </div>
                    <div class=\"users__col\">
                        ";
            // line 63
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 63), "html", null, true);
            echo "
                    </div>
                    <div class=\"users__col\">
                        ";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "registered_at", [], "any", false, false, false, 66), "html", null, true);
            echo "
                    </div>
                    <div class=\"users__col\">
                        <a href=\"/admin/deleteUser/?user_id=";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 69), "html", null, true);
            echo "\" class=\"btn btn--small btn--white btns--margin\">Delete user</a>
                        <a href=\"/admin/deleteUserPosts/?user_id=";
            // line 70
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 70), "html", null, true);
            echo "\" class=\"btn btn--small btn--white btns--margin\">Delete posts</a>
                    </div>
                </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "            </ul>
        </div>
    </main>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "users.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 74,  131 => 70,  127 => 69,  121 => 66,  115 => 63,  109 => 60,  103 => 57,  99 => 55,  95 => 54,  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "users.html", "C:\\OpenServer\\domains\\mvc.week3-5.loftphp\\app\\Views\\users.html");
    }
}

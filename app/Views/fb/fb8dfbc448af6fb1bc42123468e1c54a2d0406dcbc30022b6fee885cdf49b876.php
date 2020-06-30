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

/* blog.html */
class __TwigTemplate_989502faf0b8a900276561fe4a5fe0c4c77e66222bf5e5a4a49972a95d461d17 extends \Twig\Template
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
    <link rel=\"stylesheet\" href=\"css/normalize.css\">
    <link rel=\"stylesheet\" href=\"css/main.css\">
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
                    ";
        // line 20
        if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAdmin", [], "method", false, false, false, 20) == true)) {
            // line 21
            echo "                    <div class=\"header__menu-item\">
                        <a href=\"/admin/users\">Администрирование</a>
                    </div>
                    ";
        }
        // line 25
        echo "                </div>
            </header>
            <div class=\"top-line__title\">
                <h1 class=\"main-title\">Yet Another Interesting Blog</h1>
            </div>
        </div>
    </section>

    <main class=\"main-content\">
        <div class=\"container\">
            <ul class=\"posts\">
                ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 37
            echo "                <li class=\"posts__item\">
                    ";
            // line 38
            if (twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 38)) {
                // line 39
                echo "                    <div class=\"posts__picture-wrap\">
                        <img class=\"post__img\" src=\"/images/";
                // line 40
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "image", [], "any", false, false, false, 40), "html", null, true);
                echo "\">
                    </div>
                    ";
            }
            // line 43
            echo "                    <div class=\"posts__content\">
                        <h2 class=\"posts__title\">";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 44), "html", null, true);
            echo "</h2>
                        <div class=\"posts__author-date-container\">
                            ";
            // line 46
            $context["author"] = twig_get_attribute($this->env, $this->source, $context["post"], "author", [], "any", false, false, false, 46);
            // line 47
            echo "                            <div class=\"posts__author\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["author"] ?? null), "name", [], "any", false, false, false, 47), "html", null, true);
            echo "</div>
                            <div class=\"posts__date\">";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "created_at", [], "any", false, false, false, 48), "html", null, true);
            echo "</div>
                        </div>

                        <div class=\"posts__text\">
                            <p>";
            // line 52
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "text", [], "any", false, false, false, 52), "html", null, true);
            echo "</p>
                        </div>
                        ";
            // line 54
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAdmin", [], "method", false, false, false, 54) == true)) {
                // line 55
                echo "                        <a href=\"/admin/deletePost/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 55), "html", null, true);
                echo "\" class=\"btn btn--regular btn--white\">Удалить пост</a>
                        ";
            }
            // line 57
            echo "                    </div>
                </li>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 60
            echo "                    Постов пока нет
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "            </ul>
        </div>
        <section class=\"inner-section\">
            <div class=\"container\">
                <h2 class=\"inner-section__title\">Добавить пост</h2>
                <form class=\"form\" enctype=\"multipart/form-data\" action=\"/blog/createPost\" method=\"post\">
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"title\" placeholder=\"Заголовок поста\" class=\"form__input\">
                    </div>
                    <div class=\"form__row\">
                        <textarea type=\"text\" class=\"form__input form__input--textarea\" name=\"text\" placeholder=\"Очень интересный текст ;)\"></textarea>
                    </div>
                    <div class=\"form__btns\">
                        <div class=\"file-upload\">
                            <input type=\"file\" name=\"image\" id=\"file\" class=\"input-file\">
                            <label for=\"file\" class=\"btn btn-tertiary labelFile\">
                                <span class=\"fileName\">Загрузить файл</span>
                            </label>
                        </div>
                        <button type=\"reset\" class=\"form__btn btn btn--regular btn--gray\">Очистить</button>
                        <button type=\"submit\" class=\"form__btn btn btn--regular btn--red\">Отправить</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "blog.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 62,  143 => 60,  136 => 57,  130 => 55,  128 => 54,  123 => 52,  116 => 48,  111 => 47,  109 => 46,  104 => 44,  101 => 43,  95 => 40,  92 => 39,  90 => 38,  87 => 37,  82 => 36,  69 => 25,  63 => 21,  61 => 20,  56 => 18,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "blog.html", "C:\\OpenServer\\domains\\mvc.week3-5.loftphp\\app\\Views\\blog.html");
    }
}

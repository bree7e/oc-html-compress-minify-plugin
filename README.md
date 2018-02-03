# HTML compress/minify plugin for October CMS

## Description

A [Twig](http://twig.sensiolabs.org/) extension for [voku/HtmlMin](https://github.com/voku/HtmlMin).

Plugin uses [HTML compresstwig package](https://packagist.org/packages/voku/html-compress-twig)

## Usage

* Tag
```twig
{% htmlcompress %} <foo>bar</foo> {% endhtmlcompress %}
```
* Function
```twig
{{ htmlcompress(' <foo>bar</foo>') }}
```
* Filter
```twig
{{ ' <foo>bar</foo>' | htmlcompress }}
```

## Demo theme example
Default layout `default.htm`
```twig
{% htmlcompress %} 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>October CMS - {{ this.page.title }}</title>
        <meta name="description" content="{{ this.page.meta_description }}">
        <meta name="title" content="{{ this.page.meta_title }}">
        <meta name="author" content="OctoberCMS">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="generator" content="OctoberCMS">
        <link rel="icon" type="image/png" href="{{ 'assets/images/october.png'|theme }}">
        <link href="{{ 'assets/css/vendor.css'|theme }}" rel="stylesheet">
        <link href="{{ 'assets/css/theme.css'|theme }}" rel="stylesheet">
        {% styles %}
    </head>
    <body>

        <!-- Header -->
        <header id="layout-header">
            {% partial 'site/header' %}
        </header>

        <!-- Content -->
        <section id="layout-content">
            {% page %}
        </section>

        <!-- Footer -->
        <footer id="layout-footer">
            {% partial 'site/footer' %}
        </footer>

        <!-- Scripts -->
        <script src="{{ 'assets/vendor/jquery.js'|theme }}"></script>
        <script src="{{ 'assets/vendor/bootstrap.js'|theme }}"></script>
        <script src="{{ 'assets/javascript/app.js'|theme }}"></script>
        {% framework extras %}
        {% scripts %}

    </body>
</html>
{% endhtmlcompress %}
```
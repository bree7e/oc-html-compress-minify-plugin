<?php namespace Bree7e\HtmlCompress;

use Event;
use System\Classes\PluginBase;
use voku\helper\HtmlMin;
use voku\twig\MinifyHtmlExtension;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name' => 'HTML comressor/minifyer plugin',
            'description' => 'Add twig extension to comress HTML code',
            'author' => 'Alexandr Vetrov',
            'icon' => 'icon-compress',
            'homepage' => 'https://github.com/bree7e/oc-html-compress-minify-plugin',
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('cms.page.beforeRenderPage', function ($controller, $page) {
            $twig = $controller->getTwig();
            $minifier = new HtmlMin();
            $twig->addExtension(new MinifyHtmlExtension($minifier, true));
        });
    }

}

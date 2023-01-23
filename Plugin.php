<?php namespace WebVPF\FullScreen;

use System\Classes\PluginBase;
use App;
use Event;

class Plugin extends PluginBase
{
    public function pluginDetails(): array
    {
        return [
            'name'        => 'webvpf.fullscreen::lang.plugin.name',
            'description' => 'webvpf.fullscreen::lang.plugin.description',
            'author'      => 'WebVPF',
            'icon'        => 'icon-maximize'
        ];
    }

    public function boot(): void
    {
        if (!App::runningInBackend()) {
            return;
        }

        Event::listen('backend.page.beforeDisplay', function($controller) {
            $controller->addJs('/plugins/webvpf/fullscreen/assets/js/script.js', 'WebVPF.FullScreen');
        });
    }

    public function registerQuickActions(): array
    {
        return [
            'fullscreen' => [
                'label' => 'webvpf.fullscreen::lang.fullscreen',
                'icon' => 'icon-maximize',
                'url' => 'javascript:;',
                'attributes' => [
                    'id' => 'fullscreen',
                ],
            ],
        ];
    }
}

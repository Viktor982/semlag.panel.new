<?php

namespace NPDashboard\Providers;

use Illuminate\Validation\DatabasePresenceVerifier;
use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class ValidationServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $illuminateContainer = $container['illuminateContainer'];
        $fs = $illuminateContainer['files'];
        $loader = new FileLoader($fs, realpath(__DIR__.'/../../lang'));
        $translator = new Translator($loader, 'br');
        $validation = new Factory($translator, $illuminateContainer);
        $databaseManager = $container['database']->getDatabaseManager();
        $presence = new DatabasePresenceVerifier($databaseManager);
        $validation->setPresenceVerifier($presence);

        $validation->extend('captcha', function ($attribute, $value, $parameters, $validator) use($container){
            return $container['captcha']->validate();
        });

        $container['validation'] = $validation;
    }
}
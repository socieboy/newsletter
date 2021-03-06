<?php

namespace Socieboy\Newsletter\Providers;

use Illuminate\Support\ServiceProvider;

class NotifierServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(
            'Socieboy\Newsletter\Notifications\NotifierInterface',
            'Socieboy\Newsletter\Notifications\Notifier'
        );

    }
}
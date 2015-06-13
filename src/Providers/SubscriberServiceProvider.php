<?php

namespace Socieboy\Newsletter\Providers;

use Illuminate\Support\ServiceProvider;

class SubscriberServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(
            'Socieboy\Newsletter\SubscriberInterface',
            'Socieboy\Newsletter\SubscriberList'
        );

    }
}
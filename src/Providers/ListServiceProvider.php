<?php

namespace Socieboy\Newsletter\Providers;

use Illuminate\Support\ServiceProvider;

class ListServiceProvider  extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Socieboy\Newsletter\Lists\ListsInterface',
            'Socieboy\Newsletter\Lists\Lists'
        );
    }

} 
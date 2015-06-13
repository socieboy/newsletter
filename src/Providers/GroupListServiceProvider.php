<?php

namespace Socieboy\Newsletter\Providers;


use Illuminate\Support\ServiceProvider;

class GroupListServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'Socieboy\Newsletter\Groups\GroupListInterface',
            'Socieboy\Newsletter\Groups\GroupList'
        );

    }


} 
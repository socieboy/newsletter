<?php

namespace Socieboy\Newsletter;

use Illuminate\Support\ServiceProvider;

class NewsletterServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{

        $this->publishes([
            __DIR__.'/Config/newsletter.php' => base_path('config/newsletter.php'),
        ]);

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{

        $this->app->bind(
            'Socieboy\Newsletter\Providers\NotifierServiceProvider',
            'Socieboy\Newsletter\Providers\SubscriberServiceProvider',
            'Socieboy\Newsletter\Providers\GroupListServiceProvider'
        );

	}

}

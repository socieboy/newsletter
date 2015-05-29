<?php namespace Socieboy\Newsletter;

use Illuminate\Support\ServiceProvider;

class NewsletterServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind(
            'Socieboy\Newsletter\NotifierServiceProvider',
            'Socieboy\Newsletter\SubscriberServiceProvider'
        );
	}

}

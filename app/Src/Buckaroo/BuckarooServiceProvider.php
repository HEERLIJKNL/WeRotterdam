<?php namespace App\Src\Buckaroo;

use Illuminate\Support\ServiceProvider;

class BuckarooServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/views', 'buckaroo');
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('App\Src\Buckaroo\Buckaroo',function($app){
			return new Buckaroo();
		});
	}

}

<?php namespace Parsidev\Novinways;

use Illuminate\Support\ServiceProvider;
use SoapClient;

class NovinwaysServiceProvider extends ServiceProvider {

	protected $defer = true;

    public function boot() {
        $this->publishes([
            __DIR__ . '/../../config/novinways.php' => config_path('novinways.php'),
        ]);
    }

    public function register() {
        $this->app->singleton('novinways', function($app) {
            $config = config('novinways');
            return new Novinways($config, new SoapClient($config['webServiceUrl'], array('encoding' => 'UTF-8')));
        });
    }

    public function provides() {
        return ['novinways'];
    }

}

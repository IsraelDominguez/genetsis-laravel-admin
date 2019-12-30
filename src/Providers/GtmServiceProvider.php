<?php namespace Genetsis\Admin\Providers;

use Genetsis\Admin\Utils\GTM\Gtm;
use Illuminate\Support\Facades\App;

class GtmServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('GtmEvents', function(){
            return App::make(config('genetsis_admin.gtm'));
        });
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['GtmEvents', config('genetsis_admin.gtm')];
    }
}

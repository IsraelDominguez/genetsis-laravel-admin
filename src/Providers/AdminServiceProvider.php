<?php namespace Genetsis\Admin\Providers;

use Genetsis\Admin\Commands\CreateAdminUser;
use Genetsis\Admin\Commands\GenetsisAdminInstall;
use Genetsis\Admin\Extensions\AdminMenu;

class AdminServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->handleRoutes();
        $this->publishResources();
        $this->handleCommands();

        $this->app->singleton('AdminMenu', function(){
            return new AdminMenu();
        });

        \AdminMenu::add('genetsis-admin::partials.admin_menu');

//        $admin_menu = $this->app->make('AdminMenu');
//        $admin_menu->add('genetsis-admin::partials.admin_menu');
    }

    private function handleRoutes() {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../Routes/auth.php');
    }

    private function publishResources() {
        $this->publishes([
            __DIR__.'/../../config/admin_theme.php' => config_path('admin_theme.php')
        ], 'config');


        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'genetsis-admin');
        $this->publishes([
            __DIR__.'/../../resources/assets' => resource_path('assets/vendor/genetsis-admin/admin'),
        ]);
    }

    private function handleCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdminUser::class
            ]);
        }
    }
}
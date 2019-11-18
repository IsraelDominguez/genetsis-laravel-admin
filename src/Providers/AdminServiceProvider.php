<?php namespace Genetsis\Admin\Providers;

use Genetsis\Admin\Commands\CreateAdminUser;
use Genetsis\Admin\Commands\CreatePermissions;
use Genetsis\Admin\Commands\GenetsisAdminInstall;
use Genetsis\Admin\Commands\InstallAdmin;
use Genetsis\Admin\Commands\ManageDruidApps;
use Genetsis\Admin\Commands\ManageUsers;
use Genetsis\Admin\Extensions\AdminMenu;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Middlewares\RoleOrPermissionMiddleware;

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
        $this->handleRoutes();
        $this->publishResources();
        $this->handleCommands();
        $this->handleMigrations();

        $this->app['router']->aliasMiddleware('role', RoleMiddleware::class);
        $this->app['router']->aliasMiddleware('permission', PermissionMiddleware::class);
        $this->app['router']->aliasMiddleware('role_or_permission', RoleOrPermissionMiddleware::class);

        \AdminMenu::add('genetsis-admin::partials.admin_menu', [], 1);

        if (config('genetsis_admin.manage_admin_users'))
            \AdminMenu::add('genetsis-admin::partials.menu.users_menu', [], 5);

        if (config('genetsis_admin.manage_druid_apps'))
            \AdminMenu::add('genetsis-admin::partials.menu.apps_menu', [], 10);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AdminMenu', function(){
            return new AdminMenu();
        });
    }

    private function handleMigrations() {
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    private function handleRoutes() {
        $this->loadRoutesFrom(__DIR__.'/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../Routes/auth.php');
    }

    private function publishResources() {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'genetsis-admin');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/admin_theme.php' => config_path('admin_theme.php'),
                __DIR__ . '/../../config/genetsis_admin.php' => config_path('genetsis_admin.php')
            ], 'config');

            $this->publishes([
                __DIR__ . '/../../resources/assets' => resource_path('assets/vendor/genetsis-admin/admin'),
            ]);
        }
    }

    private function handleCommands() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateAdminUser::class,
                InstallAdmin::class,
                ManageDruidApps::class,
                ManageUsers::class
            ]);
        }
    }
}

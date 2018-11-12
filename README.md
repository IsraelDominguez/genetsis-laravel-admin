s# laravel-genetsis-Admin

Publish config theme and then add the themes, Default Roles: SuperAdmin, Admin

php artisan vendor:publish --tag=config

php artisan vendor:publish --provider="Genetsis\Admin\Providers\AdminServiceProvider"

## Laravel Activity Log
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider" --tag="config"

## Laravel Permissions
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"

php artisan migrate --seed

php artisan genetsis-admin:create-user

## Usage
First, add the `Spatie\Permission\Traits\HasRoles` trait to your `User` model(s):

Change the User model class in config/auth.php to Genetsis\Admin\Models\User::class
Change the Role model class in config/permissions.php Genetsis\Admin\Models\Role::class

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```
<?php namespace Genetsis\Admin\Models;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use HasRoles;
    use LogsActivity;

    protected $guard_name = 'web';

    /**
     * The attributes used to be logged y LogsActivity
     *
     * @var array
     */
    protected static $logAttributes = ['name', 'email','roles'];

    /**
     * Only log attributes that changed
     *
     * @var bool
     */
    protected static $logOnlyDirty = true;
}

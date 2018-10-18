<?php namespace Genetsis\Admin\Facades;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends \App\User
{
    use HasRoles;
    use LogsActivity;

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

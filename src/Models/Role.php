<?php namespace Genetsis\Admin\Models;

use Spatie\Activitylog\Traits\LogsActivity;

class Role extends \Spatie\Permission\Models\Role
{
    use LogsActivity;
}

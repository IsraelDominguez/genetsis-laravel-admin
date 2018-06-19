<?php namespace Genetsis\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class AdminMenuFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'AdminMenu';
    }
}
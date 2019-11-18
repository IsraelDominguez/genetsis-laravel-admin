<?php namespace Genetsis\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ManageDruidAppsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage_druidapps']);

        $role_superadmin = \Spatie\Permission\Models\Role::findByName('SuperAdmin');

        $role_superadmin->givePermissionTo('manage_druidapps');
    }
}

<?php namespace Genetsis\Admin\Database\Seeds;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superadmin = \Spatie\Permission\Models\Role::findByName('SuperAdmin');

        Permission::create(['name' => 'manage_users']);

        $role_superadmin->givePermissionTo('manage_users');
    }
}

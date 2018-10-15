<?php namespace Genetsis\Admin\Database\Seeds;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Role::create(['name' => 'SuperAdmin']);
        \Spatie\Permission\Models\Role::create(['name' => 'Admin']);
    }
}

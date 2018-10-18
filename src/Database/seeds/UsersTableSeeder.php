<?php
namespace Genetsis\Admin\Database\Seeds;

use Genetsis\Admin\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Data Marketing',
            'email' => 'datamarketing@genetsis.com',
            'password' => bcrypt('genetsis'),
        ]);

        $user = User::find(1);
        $user->assignRole('SuperAdmin');
    }
}

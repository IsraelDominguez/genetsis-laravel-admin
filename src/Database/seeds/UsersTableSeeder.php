<?php
namespace Genetsis\Admin\Database\Seeds;

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
            'name' => 'Data Marketing',
            'email' => 'datamarketing@genetsis.com',
            'password' => bcrypt('genetsis'),
        ]);
    }
}

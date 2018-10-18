<?php

namespace Genetsis\Admin\Commands;

use App\User;
use Genetsis\Admin\Database\Seeds\RolesSeeder;
use Genetsis\Admin\Database\Seeds\UsersTableSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genetsis-admin:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial setup: publish resource and create an admin user ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            Artisan::call('db:seed', ['--class' => RolesSeeder::class, '--force' => true]);

            if ($this->confirm('Do you wish to create the Default Admin User?')) {
                Artisan::call('db:seed', ['--class' => UsersTableSeeder::class, '--force' => true]);
            } else {
                $email = $this->ask('What is Admin User email?');
                $name = $this->ask('What is Admin User Full name?', false);
                $password = $this->secret('What is password?');

                $rules = array(
                    'email' => 'required|email',
                    'password'  => 'required',
                );
                $validator = \Validator::make(compact('email', 'name', 'password'), $rules);
                if ($validator->fails()) {
                    throw new \Exception($validator->messages());
                }

                $user = new \Genetsis\Admin\Models\User();
                $user->email = $email;
                $user->name = $name;
                $user->password = bcrypt($password);
                $user->save();

                $user->assignRole('SuperAdmin');
            }

            $this->info('Admin User created');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

    }
}
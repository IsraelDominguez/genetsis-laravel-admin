<?php

namespace Genetsis\Admin\Commands;

use Genetsis\Admin\Database\Seeds\ManageUsersSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ManageUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genetsis-admin:manage-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage Users';

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

            Artisan::call('db:seed', ['--class' => ManageUsersSeeder::class, '--force' => true]);
            $this->info('Manage Users Permissions');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

    }
}

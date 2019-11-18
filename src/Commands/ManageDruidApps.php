<?php

namespace Genetsis\Admin\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ManageDruidApps extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genetsis-admin:manage-druidapps';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manage Druid Apps';

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

            Artisan::call('db:seed', ['--class' => ManageDruidApps::class, '--force' => true]);
            $this->info('Manage Druid Apps Permissions');

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }

    }
}

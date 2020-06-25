<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDruidAppsTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        if (!Schema::hasTable('druid_apps')) {
            Schema::create('druid_apps', function (Blueprint $table) {
                $table->string('client_id', 20)->unique()->comment('Client ID in Druid');;
                $table->string('secret', 300)->nullable();
                $table->string('name', 100);
                $table->binary('logo')->nullable()->comment('base64 image');

                $table->primary('client_id');
            });

            \Illuminate\Support\Facades\DB::statement("ALTER TABLE `druid_apps` CHANGE `logo` `logo` LONGBLOB NULL DEFAULT NULL COMMENT 'base64 image';");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('druid_apps');
    }
}

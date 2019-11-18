<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrypointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('entrypoints', function (Blueprint $table) {
            $table->string('key', 200)->unique();
            $table->string('name', 200);
            $table->string('client_id', 20)->comment('Client ID in Druid');
            $table->text('ids')->comment('Json with ids fields');
            $table->text('fields')->comment('Json with data fields');

            $table->primary('key');

            $table->foreign('client_id')->references('client_id')->on('druid_apps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('entrypoints');
    }
}

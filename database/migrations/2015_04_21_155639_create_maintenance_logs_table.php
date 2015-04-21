<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_logs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->smallInteger('user_id')->unsigned();
            $table->foreign(
                'user_id'
                )->references(
                'id'
                )->on(
                'users'
                );
            $table->smallInteger('maint_type_id')->unsigned();
            $table->foreign(
                'maint_type_id'
                )->references(
                'id'
                )->on(
                'maintenance_types'
                );
            $table->smallInteger('vehicle_id')->unsigned();
            $table->foreign(
                'vehicle_id'
                )->references(
                'id'
                )->on(
                'vehicles'
                );
            $table->decimal('cost', 8, 2)->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maintenance_logs');
    }

}

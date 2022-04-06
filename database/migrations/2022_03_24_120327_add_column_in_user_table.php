<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('desc')->nullable();
            $table->unsignedBigInteger('state_id')->foreign('state_id')
            ->references('id')
            ->on('states')->nullable(); 
            $table->unsignedBigInteger('city_id')->foreign('city_id')
            ->references('id')
            ->on('cities')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

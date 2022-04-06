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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->enum('ad_type', ['sell', 'buy'])->default('sell');
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->longText('desc')->nullable();
            $table->enum('pet_gender', ['m', 'f'])->default('m');
            $table->string('pet_age')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->unsignedBigInteger('pet_id')->foreign('pet_id')
            ->references('id')
            ->on('pets');  
            $table->unsignedBigInteger('bread_id')->foreign('bread_id')
            ->references('id')
            ->on('pet_breads');  
            $table->unsignedBigInteger('state_id')->foreign('state_id')
            ->references('id')
            ->on('states');  
            $table->unsignedBigInteger('city_id')->foreign('city_id')
            ->references('id')
            ->on('cities ');  
            $table->unsignedBigInteger('user_id')->foreign('user_id')
            ->references('id')
            ->on('users'); 
            $table->timestamp('expiry')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
};

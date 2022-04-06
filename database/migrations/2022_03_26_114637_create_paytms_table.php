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
        Schema::create('paytms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('email')->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
            $table->integer('fee')->nullable();
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->default(0)->nullable();
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
        Schema::dropIfExists('paytms');
    }
};

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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();
            $table->string("amount");
            $table->unsignedBigInteger('paytm_id')->foreign('paytm_id')
            ->references('id')
            ->on('paytms');
            $table->unsignedBigInteger('post_id')->foreign('post_id')
            ->references('id')
            ->on('posts');
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
        Schema::dropIfExists('payment_histories');
    }
};

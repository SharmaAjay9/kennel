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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('file_original_name',255);
            $table->string('file_name',255);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
            $table->string('file_size',15);
            $table->string('extension',15);
            $table->string('type',15);
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
        Schema::dropIfExists('uploads');
    }
};

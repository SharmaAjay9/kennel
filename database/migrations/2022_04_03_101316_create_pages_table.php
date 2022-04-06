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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string("type",50)->nullable();
            $table->string("title",255)->nullable();
            $table->string("slug",255)->nullable();
            $table->longtext("content",50)->nullable();
            $table->string("meta_title",50)->nullable();
            $table->longtext("meta_description")->nullable();
            $table->longtext("keywords")->nullable();
            $table->string("meta_image",255)->nullable();
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
        Schema::dropIfExists('pages')->nullable();
    }
};

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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title')
                  ->nullable();
            $table->string('description')
                  ->nullable()
                  ->default("");
            $table->string('addr_cep')
                  ->nullable();
            $table->string('addr_number')
                  ->nullable();
            $table->string('complement')
                  ->nullable();
            $table->integer('bedrooms')
                  ->nullable();
            $table->integer('rooms')
                  ->nullable();
            $table->integer('garage')
                  ->nullable();
            $table->integer('pool')
                  ->nullable();
            $table->json('images')
                  ->nullable();
            $table->boolean('is_rented')
                  ->nullable()
                  ->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
};

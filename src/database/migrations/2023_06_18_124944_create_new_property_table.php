<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::dropIfExists('property');

        Schema::create('property', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('property_type');
            $table->string('description');
            $table->integer('size');
            $table->integer('price');
            $table->integer('rentsale');
            $table->string('city');
            $table->string('street');
            $table->string('postcode');
            $table->unsignedBigInteger('user_id');
            $table->text('longDescription')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('property');
    }
};

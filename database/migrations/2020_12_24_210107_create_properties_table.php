<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
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
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable(true);
            $table->string('name');
            $table->text('description');
            $table->boolean('featured')->default(false);
            $table->string('operation');
            $table->integer('prixvisite');
            $table->string('town');
            $table->string('city');
            $table->string('address');
            $table->bigInteger('price');
            $table->integer('rooms');
            $table->integer('bedrooms');
            $table->integer('leavingrooms');
            $table->integer('bathrooms');
            $table->integer('kitchens');

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('properties');
    }
}

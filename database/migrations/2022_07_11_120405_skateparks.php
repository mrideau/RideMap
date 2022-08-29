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
        Schema::create('skateparks', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('title');
            $table->longText('description');
            $table->string('address');
            $table->string('city');
            $table->string('postcode');
            $table->string('coordinates');
//            $table->string('email')->nullable();
//            $table->string('phone_number')->nullable();
//            $table->string('website_url')->nullable();
//            $table->string('gallery_id')->nullable();
//            $table->string('image_id')->nullable();
//            $table->string('price')->nullable();
//            $table->date('date')->nullable();
//            $table->json('information');
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
        Schema::drop('skateparks');
    }
};

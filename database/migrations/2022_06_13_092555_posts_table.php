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
            $table->string('slug')->primary();
            $table->string('type');
            $table->string('title', 100);
            $table->longText('description');
            $table->string('address', 128)->nullable();
            $table->string('city', 64);
            $table->string('postcode', 10);
            $table->string('coordinates');
            $table->string('email', 100)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website_url')->nullable();
            $table->string('gallery_id')->nullable();
            $table->string('image_id')->nullable();
            $table->string('price')->nullable();
            $table->date('date')->nullable();
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
        Schema::drop('posts');
    }
};

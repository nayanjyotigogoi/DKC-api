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
        Schema::create('goodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('korean_name')->nullable();
            $table->enum('category', ['stationery', 'apparel', 'accessories', 'collectibles'])->default('accessories');
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->enum('availability', ['available', 'limited', 'sold-out'])->default('available');
            $table->string('image_path')->nullable();
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->json('tags')->nullable();
            $table->integer('sort_order')->default(0);
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
        Schema::dropIfExists('goodies');
    }
};

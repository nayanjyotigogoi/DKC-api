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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('korean_title')->nullable();
            $table->string('date');
            $table->dateTime('date_iso');
            $table->string('time')->nullable();
            $table->string('location')->nullable();
            $table->string('category')->nullable();
            $table->enum('status', ['upcoming', 'live', 'completed'])->default('upcoming');
            $table->text('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->json('highlights')->nullable();
            $table->string('image')->nullable();
            $table->string('color')->default('#8B1E24');
            $table->boolean('is_featured')->default(false);
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
        Schema::dropIfExists('events');
    }
};

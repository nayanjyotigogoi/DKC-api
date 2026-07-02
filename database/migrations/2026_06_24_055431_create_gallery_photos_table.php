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
        Schema::create('gallery_photos', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->enum('category', ['events', 'members', 'culture', 'campus'])->default('events');
            $table->string('event_name')->nullable();
            $table->year('year')->nullable();
            $table->enum('aspect', ['portrait', 'landscape', 'square'])->default('landscape');
            $table->string('image_path')->nullable();
            $table->string('color')->nullable();
            $table->string('icon')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
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
        Schema::dropIfExists('gallery_photos');
    }
};

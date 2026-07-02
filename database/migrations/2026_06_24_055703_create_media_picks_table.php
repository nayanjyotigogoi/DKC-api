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
        Schema::create('media_picks', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Drama', 'Movie', 'Book', 'Music', 'Other'])->default('Drama');
            $table->string('title');
            $table->string('korean_title')->nullable();
            $table->text('description')->nullable();
            $table->string('tag')->nullable();
            $table->string('streaming_platform')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('media_picks');
    }
};

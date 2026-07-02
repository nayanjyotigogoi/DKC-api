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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('initials', 4)->nullable();
            $table->string('role')->nullable();
            $table->string('department')->nullable();
            $table->string('joined_month')->nullable();
            $table->year('joined_year')->nullable();
            $table->text('quote')->nullable();
            $table->string('dream')->nullable();
            $table->string('favourite_word')->nullable();
            $table->string('photo_path')->nullable();
            $table->boolean('is_spotlight')->default(false);
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
        Schema::dropIfExists('members');
    }
};

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
        Schema::create('magazine_issues', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('issue_label');
            $table->year('year');
            $table->string('month');
            $table->string('cover_color')->default('#8B1E24');
            $table->string('cover_accent')->default('#FAF3ED');
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('page_count')->default(0);
            $table->string('pdf_path')->nullable();
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
        Schema::dropIfExists('magazine_issues');
    }
};

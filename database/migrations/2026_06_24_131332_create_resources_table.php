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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // study-materials | vocabulary | grammar | korean-culture | practice | books | links
            $table->text('description')->nullable();
            $table->longText('content')->nullable();    // in-app markdown content
            $table->string('url')->nullable();           // external URL (type=link)
            $table->string('file_path')->nullable();     // downloads
            $table->string('type')->default('article');  // article | link | download | exercise
            $table->string('difficulty')->nullable();    // beginner | intermediate | advanced
            $table->string('author')->nullable();
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
        Schema::dropIfExists('resources');
    }
};

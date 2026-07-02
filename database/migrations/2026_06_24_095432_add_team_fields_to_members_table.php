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
        Schema::table('members', function (Blueprint $table) {
            $table->boolean('is_team')->default(false)->after('is_spotlight');
            $table->string('korean_role')->nullable()->after('role');  // e.g. 회장, 부회장
            $table->string('color', 20)->nullable()->after('photo_path'); // avatar bg color
        });
    }

    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['is_team', 'korean_role', 'color']);
        });
    }
};

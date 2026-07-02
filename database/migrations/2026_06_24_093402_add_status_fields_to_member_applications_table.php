<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::table('member_applications', function (Blueprint $table) {
            $table->enum('current_status', ['du_student', 'other_student', 'working', 'other'])
                  ->default('du_student')->after('phone');
            $table->string('institution')->nullable()->after('current_status');
            $table->string('occupation')->nullable()->after('institution');
            $table->string('organization')->nullable()->after('occupation');
        });

        // Make academic fields nullable without doctrine/dbal
        DB::statement('ALTER TABLE member_applications MODIFY department VARCHAR(255) NULL');
        DB::statement('ALTER TABLE member_applications MODIFY year_of_study VARCHAR(50) NULL');
    }

    public function down()
    {
        Schema::table('member_applications', function (Blueprint $table) {
            $table->dropColumn(['current_status', 'institution', 'occupation', 'organization']);
        });
        DB::statement('ALTER TABLE member_applications MODIFY department VARCHAR(255) NOT NULL');
        DB::statement('ALTER TABLE member_applications MODIFY year_of_study VARCHAR(50) NOT NULL');
    }
};

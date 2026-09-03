<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE fun_facts MODIFY COLUMN type ENUM('fun_fact', 'did_you_know', 'club_tip') NOT NULL DEFAULT 'fun_fact'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE fun_facts MODIFY COLUMN type ENUM('fun_fact', 'did_you_know') NOT NULL DEFAULT 'fun_fact'");
    }
};

<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('goodie_orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('roll_number')->nullable();
            $table->string('phone')->nullable();
            $table->text('items'); // JSON: [{id, name, price}]
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, collected, cancelled
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('goodie_orders');
    }
};

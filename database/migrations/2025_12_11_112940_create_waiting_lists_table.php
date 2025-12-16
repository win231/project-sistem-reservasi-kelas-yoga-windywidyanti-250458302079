<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('waiting_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('class_schedule_id')->constrained('class_schedules')->cascadeOnDelete();
            $table->timestamp('registered_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
            // Unique constraint: user hanya bisa satu waiting list per jadwal
            $table->unique(['user_id', 'class_schedule_id']);
            // Index untuk pencarian FIFO by jadwal
            $table->index(['class_schedule_id', 'registered_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waiting_lists');
    }
};

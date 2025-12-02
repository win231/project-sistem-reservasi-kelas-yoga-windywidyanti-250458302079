<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            // Relasi ke Member (User)
            // siapa yang booking
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // Relasi ke Jadwal Kelas
            // kelas mana yang di-booking
            $table->foreignId('class_schedule_id')->constrained('class_schedules')->cascadeOnDelete();
            $table->enum('status', ['confirmed', 'cencelled', 'completed'])->default('confirmed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

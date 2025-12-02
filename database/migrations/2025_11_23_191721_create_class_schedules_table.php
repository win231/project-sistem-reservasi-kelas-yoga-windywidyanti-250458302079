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
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('instructor_id')->constrained('users');
            $table->string('location'); // nama ruangan
            $table->string('location_image')->nullable(); // foto ruangan
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('max_capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_schedules');
    }
};
